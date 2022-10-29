<?php

if(e107::pref('mailfloss','active', false) && e107::pref('mailfloss','apikey', false))
{
	e107::getOverride()->replace('check_email', 'mailfloss_module::check');
}

class mailfloss_module
{

	public static function getResponse($email)
	{
		e107::getMessage()->addDebug("Running Mailfloss");
		$apikey = e107::pref('mailfloss','apikey');
		return e107::getFile()->getRemoteContent('https://api.mailfloss.com/verify?email='.$email.'&api_key='.$apikey);
	}


	public static function check($email)
	{
		if(empty($email))
		{
			return false;
		}

		if($response = self::getResponse($email))
		{
			if($result = e107::unserialize($response))
			{
				self::log($result);

				if($result['passed'] === true)
				{
					return $email;
				}

				return false;
			}
		}

		// fall back.
		if(filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			return $email;
		}

		return false;
	}


	private static function log($data)
	{
		$fields = ['email', 'suggestion', 'status', 'reason', 'role', 'disposable', 'free', 'passed', 'domain', 'meta'];

		$insert = [];
		foreach($fields as $fld)
		{
			$key = 'mailfloss_'.$fld;
			$insert[$key] = $data[$fld];
		}

		if(!e107::getDb()->insert('mailfloss', $insert))
		{
			e107::getMessage()->addDebug("Mailfloss insert failed");
		}

	}

}