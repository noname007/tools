<?php
	function import($classname,$import_config,$root = '')
	{
		if(empty($classname))
			return false;
		if(empty($root))
			$root = dirname(__FILE__);
		$import_config = str_replace('.', DIRECTORY_SEPARATOR, $import_config);
		foreach ($import_config as $value) 
		{	

			$filename = $root.$value.$classname.'.php';
			if(file_exists($filename))
			{
				require_once $filename;
			}
		}
	}
	$import_config = array(
		'.sdk.',
		'.model.'
	);
	
	function __autoload($classname)
	{
		global $import_config;
		import($classname,$import_config);		
	}
	// new A;