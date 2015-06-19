<?php
	$sh = mysql_connect('127.0.0.1','root','123a123a') or die('fail db');
	$dbname = 'cq_server';
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
	
	function generate_attr($attr_arr,$classname)
	{

		$temp = '';
		foreach ($attr_arr['c'] as $key => $value) 
		{
			$temp .= 
<<<EOF
	public	\$$value;

EOF;
		}
		
		$str = 
<<<EOF
<?php
class $tablename extends Tableyz
{

EOF;
		$str.=$temp;
		$pk = join($attr_arr['pk'],'\',\'');
		$columns =  join($attr_arr['columns'],'\',\'');
		$str .=
<<<EOF

	function __construct(){
		parent::__construct($tablename,array('$pk')),array('$columns'));
	}

EOF;

$str .=
<<<EOF

	public static function get_by_sql(\$columns,\$conditions,\$other_sql_option)
	{
		return parent::get_by_sql(\$this->tablename,\$columns,\$conditions,\$other_sql_option);
	}

	public static function wrapper(\$res)
	{
		return parent::wrapper(\$res,__CLASS__);
	}
}

EOF;
		return $str;
	}

	$classname = ucfirst($tablename);
	echo $res = generate_attr($field_name,$tablename);
	$hd = fopen( $classname.'.php','w+');
	fwrite( $hd,$res);