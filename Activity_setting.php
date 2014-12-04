<?php
class  extends Tableyz
{
	public	$id;
	public	$name;
	public	$serial_number;
	public	$type;
	public	$reward_detail;
	public	$message;
	public	$description;
	public	$open_at;
	public	$close_at;
	public	$enabled;

	function __construct(){
		parent::__construct(,array('id','type')),array('name','serial_number','reward_detail','message','description','open_at','close_at','enabled'));
	}

	public static function get_by_sql($columns,$conditions,$other_sql_option)
	{
		return parent::get_by_sql($this->tablename,$columns,$conditions,$other_sql_option);
	}

	public static function wrapper($res)
	{
		return parent::wrapper($res,__CLASS__);
	}
}
