<?php

if(e107::pref('mailfloss','active', false) && e107::pref('mailfloss','apikey', false) && !getperms('0'))
{
	e107::getOverride()->replace('check_email', 'mailfloss_module::check');
}

class mailfloss_module
{
	static $cached = false;

	public static function getResponse($email)
	{
		$sess = e107::getSession('mailfloss');

		if($cached = $sess->get($email))
		{
			e107::getMessage()->addDebug("Using Mailfloss Cache");
			self::$cached = true;
			return $cached;
		}

		if($row = e107::getDb()->retrieve('mailfloss', '*', 'mailfloss_email = "'.$email.'" LIMIT 1'))
		{
			$ret = [];
			unset($row['mailfloss_uri']);
			foreach($row as $key=>$val)
			{
				$name = str_replace('mailfloss_', '', $key);

				if($name === 'passed' || $name === 'disposable' || $name === 'free' || $name === 'role')
				{
					$ret[$name] = (bool) $val;
				}
				else
				{
					$ret[$name] = $val;
				}
			}

			e107::getMessage()->addDebug("Using Mailfloss Table Log Cache".print_a($row,true));
			self::$cached = true;

			return e107::serialize($ret, 'json');
		}

		e107::getMessage()->addDebug("Running Mailfloss");

		$apikey = e107::pref('mailfloss','apikey');

		$url = "https://api.mailfloss.com/verify?email=".$email."&api_key=".$apikey;

		if($response = e107::getFile()->getRemoteContent($url))
		{
			$sess->set($email, $response);
		}

		return $response;
	}


	public static function check($email)
	{
		if(empty($email))
		{
			return false;
		}

		$email = filter_var($email, FILTER_VALIDATE_EMAIL);

		if(strpos($email,'@') === false)
		{
			return false;
		}

		$response = self::getResponse($email);

		if(!empty($response))
		{
			if($result = e107::unserialize($response))
			{
				if(e107::pref('mailfloss', 'unknown', false) && ($result['status'] === 'unknown'))
				{
					$result['status'] = 'passed';
				}

				if(!empty($result['status']) && ($result['status'] === 'passed'))
				{
					$result['passed'] = true;
				}

				e107::getMessage()->addDebug(print_a($result,true));
				$log = $result;
				$log['email'] = $email; // include original email in case of an empty result.

				self::log($log);

				if($result['passed'] === true)
				{
					return $email;
				}

				return false;
			}

			e107::getMessage()->addDebug($response);
		}
		else
		{
			e107::getMessage()->addDebug("No response from Mailfloss");
		}

		// fall back.
		if(filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			return $email;
		}

		return false;
	}


	public static function log($data)
	{
		if(self::$cached) // log only actual lookups, not cached data check.
		{
			return false;
		}

		$fields = ['email', 'suggestion', 'status', 'reason', 'role', 'disposable', 'free', 'passed', 'domain', 'meta'];

		$insert = [];
		foreach($fields as $fld)
		{
			$key = 'mailfloss_'.$fld;
			$insert[$key] = $data[$fld];
		}



		$insert['mailfloss_date'] = time();
		$insert['mailfloss_uri'] = $_SERVER['REQUEST_URI'];

	// file_put_contents(e_PLUGIN."mailfloss/mailfloss.log", date('c')."\n". print_r($insert,true)."\n\n", FILE_APPEND);

		if(!e107::getDb()->insert('mailfloss', $insert))
		{
			e107::getMessage()->addDebug("Mailfloss insert failed");
		}

	}

}