<?php
	$sh = mysql_connect('127.0.0.1','root','123a123a') or die('fail db');
	$dbname = 'cq_server';
	// $tables = mysql_list_tables($dbname);
	// while($rows = mysql_fetch_row($tables))
	// {
	// 	// var_dump($rows);
	// }
	mysql_select_db($dbname);
	$tablename = 'activity_setting';
	$q = 'show columns from '.$tablename;
	$res = mysql_query($q);
	while($row = mysql_fetch_assoc($res))
	{
		// var_dump($row);
		if(empty($row['Key']))
		{	
			$field_name['columns'][]= $row['Field'];
		}
		else{
			$field_name['pk'][]= $row['Field'];
		}
		$field_name['c'][]= $row['Field'];

	}
	
	function generate_attr($attr_arr,$tablename)
	{
		$linefeed = PHP_EOL;
		$prefix = '    ';
		$tab ='    ';
		$str='<?php'.PHP_EOL;
		$str .= 'class '.$tablename.' extends Table{'.PHP_EOL;
		foreach ($attr_arr['c'] as $key => $value) 
		{
			$str .= $prefix.'public'.$tab.'$'.$value.';'.$linefeed;
		}
		$str .= $prefix.'function __construct(){'.PHP_EOL;
		$str .= $prefix.$prefix.'parent::__construct(\''.$tablename.'\',array(\''.join($attr_arr['pk'],'\',\'').'\'),array(\''.join($attr_arr['columns'],'\',\'').'\'));'.$linefeed;
		return $str.$prefix.'}'.PHP_EOL.'}'.PHP_EOL;
	}
	// echo "\n";
	// echo join($field_name['pk'],'\',\'');
	$h = fopen($tablename.'.php', 'w');
	fwrite($h, generate_attr($field_name,$tablename));