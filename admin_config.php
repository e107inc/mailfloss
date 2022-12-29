<?php

// Generated e107 Plugin Admin Area 

require_once('../../class2.php');
if (!getperms('P')) 
{
	e107::redirect('admin');
	exit;
}

// e107::lan('mailfloss',true);


class mailfloss_adminArea extends e_admin_dispatcher
{

	protected $modes = array(	
	
		'main'	=> array(
			'controller' 	=> 'mailfloss_ui',
			'path' 			=> null,
			'ui' 			=> 'mailfloss_form_ui',
			'uipath' 		=> null
		),
		

	);	
	
	
	protected $adminMenu = array(

		'main/list'			=> array('caption'=> "Log", 'perm' => 'P'),
	//	'main/create'		=> array('caption'=> LAN_CREATE, 'perm' => 'P'),
			
		'main/prefs' 		=> array('caption'=> LAN_PREFS, 'perm' => 'P'),	

		// 'main/div0'      => array('divider'=> true),
		'main/test'		=> array('caption'=> 'Test', 'perm' => 'P'),
		
	);

	protected $adminMenuAliases = array(
		'main/edit'	=> 'main/list'				
	);	
	
	protected $menuTitle = 'Mailfloss';
}




				
class mailfloss_ui extends e_admin_ui
{
			
		protected $pluginTitle		= 'Mailfloss';
		protected $pluginName		= 'mailfloss';
	//	protected $eventName		= 'mailfloss-mailfloss'; // remove comment to enable event triggers in admin. 		
		protected $table			= 'mailfloss';
		protected $pid				= 'mailfloss_id';
		protected $perPage			= 10; 
		protected $batchDelete		= true;
		protected $batchExport     = true;
	//	protected $batchCopy		= true;

	//	protected $sortField		= 'somefield_order';
	//	protected $sortParent      = 'somefield_parent';
	//	protected $treePrefix      = 'somefield_title';

	//	protected $tabs				= array('Tabl 1','Tab 2'); // Use 'tab'=>0  OR 'tab'=>1 in the $fields below to enable. 
		
	//	protected $listQry      	= "SELECT * FROM `#tableName` WHERE field != '' "; // Example Custom Query. LEFT JOINS allowed. Should be without any Order or Limit.
	
		protected $listOrder		= 'mailfloss_id DESC';
	
		protected $fields 		= array (
			'checkboxes'              => array (  'title' => '',  'type' => null,  'data' => null,  'width' => '5%',  'thclass' => 'center',  'forced' => 'value',  'class' => 'center',  'toggle' => 'e-multiselect',  'readParms' =>  array (),  'writeParms' =>  array (),),
			'mailfloss_id'            => array (  'title' => LAN_ID, 'type'=>'number', 'data' => 'int',  'width' => '5%',  'readonly' => 'value',  'help' => '',  'readParms' =>  array (),  'writeParms' =>  array (),  'class' => 'left',  'thclass' => 'left',),
			'mailfloss_date'         => array (  'title' => LAN_DATE,  'type' => 'datestamp',  'data' => 'int', 'filter'=>true, 'width' => 'auto',  'readonly' => '1',  'help' => '',  'readParms' =>  array (),  'writeParms' =>  array (),  'class' => 'left',  'thclass' => 'left',),
			'mailfloss_email'         => array (  'title' => LAN_EMAIL,  'type' => 'email',  'data' => 'safestr',  'width' => 'auto',  'readonly' => 'value',  'help' => '',  'readParms' =>  array (),  'writeParms' =>  array (),  'class' => 'left',  'thclass' => 'left',),
			'mailfloss_suggestion'    => array (  'title' => 'Suggestion',  'type' => 'text',  'data' => 'safestr',  'width' => 'auto',  'readonly' => 'value',  'help' => '',  'readParms' =>  array (),  'writeParms' =>  array (),  'class' => 'left',  'thclass' => 'left',),
			'mailfloss_status'        => array (  'title' => 'Status',  'type' => 'text',  'data' => 'safestr',  'width' => 'auto',  'readonly' => 'value',  'help' => '',  'readParms' =>  array (),  'writeParms' =>  array (),  'class' => 'left',  'thclass' => 'left',),
			'mailfloss_reason'        => array (  'title' => 'Reason',  'type' => 'text',  'data' => 'safestr',  'width' => 'auto',  'readonly' => 'value',  'help' => '',  'readParms' =>  array (),  'writeParms' =>  array (),  'class' => 'left',  'thclass' => 'left',),
			'mailfloss_role'          => array (  'title' => 'Role',  'type' => 'boolean',  'data' => 'int',  'width' => 'auto',  'filter' => 'value',  'readonly' => 'value',  'help' => '',  'readParms' =>  array (),  'writeParms' =>  array (),  'class' => 'left',  'thclass' => 'left',),
			'mailfloss_disposable'    => array (  'title' => 'Disposable',  'type' => 'boolean',  'data' => 'int',  'width' => 'auto',  'filter' => 'value',  'readonly' => 'value',  'help' => '',  'readParms' =>  array (),  'writeParms' =>  array (),  'class' => 'left',  'thclass' => 'left',),
			'mailfloss_free'          => array (  'title' => 'Free',  'type' => 'boolean',  'data' => 'int',  'width' => 'auto',  'filter' => 'value',  'readonly' => 'value',  'help' => '',  'readParms' =>  array (),  'writeParms' =>  array (),  'class' => 'left',  'thclass' => 'left',),
			'mailfloss_passed'        => array (  'title' => 'Passed',  'type' => 'boolean',  'data' => 'int',  'width' => 'auto',  'filter' => 'value',  'readonly' => 'value',  'help' => '',  'readParms' =>  array (),  'writeParms' =>  array (),  'class' => 'left',  'thclass' => 'left',),
			'mailfloss_domain'        => array (  'title' => 'Domain',  'type' => 'text',  'data' => 'safestr',  'width' => 'auto',  'readonly' => 'value',  'help' => '',  'readParms' =>  array (),  'writeParms' =>  array (),  'class' => 'left',  'thclass' => 'left',),
			'mailfloss_meta'          => array (  'title' => 'Meta',  'type' => 'method',  'data' => 'str',  'width' => 'auto',  'readonly' => 'value',  'help' => '',  'readParms' =>  array (),  'writeParms' =>  array (),  'class' => 'left',  'thclass' => 'left',  'filter' => false,  'batch' => false,),
			'mailfloss_uri'           => array (  'title' => 'URI',  'type' => 'text',  'data' => 'safestr',  'width' => 'auto',  'readonly' => 'value',  'help' => '',  'readParms' =>  array (),  'writeParms' =>  array (),  'class' => 'left',  'thclass' => 'left',),
			'options'                 => array (  'title' => LAN_OPTIONS,  'type' => null,  'data' => null,  'width' => '10%',  'thclass' => 'center last',  'class' => 'center last',  'forced' => 'value',  'readParms' =>  array (),  'writeParms' =>  array (),),
		);		
		
		protected $fieldpref = array();
		

	//	protected $preftabs        = array('General', 'Other' );
		protected $prefs = array(
			'active'		=> array('title'=> 'Active', 'tab'=>0, 'type'=>'boolean', 'data' => 'str', 'help'=>'When enabled mailfloss will be used for email validation', 'writeParms' => array()),
			'apikey'		=> array('title'=> 'Apikey', 'tab'=>0, 'type'=>'text', 'data' => 'str', 'help'=>'Enter your mailfloss api key', 'writeParms' => array()),
		); 

	
		public function init()
		{
			// This code may be removed once plugin development is complete. 
			if(!e107::isInstalled('mailfloss'))
			{
				e107::getMessage()->addWarning("This plugin is not yet installed. Saving and loading of preference or table data will fail.");
			}
			
			// Set drop-down values (if any). 
	
		}

		
		// ------- Customize Create --------
		
		public function beforeCreate($new_data,$old_data)
		{
			return $new_data;
		}
	
		public function afterCreate($new_data, $old_data, $id)
		{
			// do something
		}

		public function onCreateError($new_data, $old_data)
		{
			// do something		
		}		
		
		
		// ------- Customize Update --------
		
		public function beforeUpdate($new_data, $old_data, $id)
		{
			return $new_data;
		}

		public function afterUpdate($new_data, $old_data, $id)
		{
			// do something	
		}
		
		public function onUpdateError($new_data, $old_data, $id)
		{
			// do something		
		}		
		
		// left-panel help menu area. (replaces e_help.php used in old plugins)
		public function renderHelp()
		{
		/*	$caption = LAN_HELP;
			$text = 'Some help text';

			return array('caption'=>$caption,'text'=> $text);*/

		}
			

		// optional - a custom page.  
		public function testPage()
		{
			if(!empty($_POST['testGo']))
			{
				$result = mailfloss_module::getResponse($_POST['testEmail']);
				e107::getMessage()->setTitle("Result",E_MESSAGE_INFO)->addInfo($result);

				$arr = e107::unserialize($result);
				mailfloss_module::log($arr);
			}

			$frm = $this->getUI();

			$text = $frm->open('test');
			$text .= "<div class='input-group input-xlarge'>";
			$text .= $frm->text('testEmail', '', 80, ['size'=>'xlarge','placeholder'=>'fakeEmail@nowhere.com']);
			$text .= "<span class='input-group-btn'>";
			$text .= $frm->button('testGo', LAN_TEST, 'submit', '', ['class'=>'btn btn-primary']);
			$text .= "</span>";
			$text .= "</div>";
			$text .= $frm->close();

			return $text;
			
		}
		
	/*
	
	 // Handle batch options as defined in mailfloss_form_ui::mailfloss_meta;  'handle' + action + field + 'Batch'
	 // @important $fields['mailfloss_meta']['batch'] must be true for this method to be detected. 
	 // @param $selected
	 // @param $type
	function handleListMailflossMetaBatch($selected, $type)
	{

		$ids = implode(',', $selected);

		switch($type)
		{
			case 'custombatch_1':
				// do something
				e107::getMessage()->addSuccess('Executed custombatch_1');
				break;

			case 'custombatch_2':
				// do something
				e107::getMessage()->addSuccess('Executed custombatch_2');
				break;

		}


	}

	
	 // Handle filter options as defined in mailfloss_form_ui::mailfloss_meta;  'handle' + action + field + 'Filter'
	 // @important $fields['mailfloss_meta']['filter'] must be true for this method to be detected. 
	 // @param $selected
	 // @param $type
	function handleListMailflossMetaFilter($type)
	{

		$this->listOrder = 'mailfloss_meta ASC';
	
		switch($type)
		{
			case 'customfilter_1':
				// return ' mailfloss_meta != 'something' '; 
				e107::getMessage()->addSuccess('Executed customfilter_1');
				break;

			case 'customfilter_2':
				// return ' mailfloss_meta != 'something' '; 
				e107::getMessage()->addSuccess('Executed customfilter_2');
				break;

		}


	}
	
		
		
	*/
			
}
				


class mailfloss_form_ui extends e_admin_form_ui
{

	
	// Custom Method/Function 
	function mailfloss_meta($curVal,$mode)
	{

		 		
		switch($mode)
		{
			case 'read': // List Page
				return $curVal;
			break;
			
			case 'write': // Edit Page
				return $this->text('mailfloss_meta',$curVal, 255, 'size=large');
			break;
			
			case 'filter':
				return array('customfilter_1' => 'Custom Filter 1', 'customfilter_2' => 'Custom Filter 2');
			break;
			
			case 'batch':
				return array('custombatch_1' => 'Custom Batch 1', 'custombatch_2' => 'Custom Batch 2');
			break;
		}
		
		return null;
	}

}		
		
		
new mailfloss_adminArea();

require_once(e_ADMIN."auth.php");
e107::getAdminUI()->runPage();

require_once(e_ADMIN."footer.php");
exit;

