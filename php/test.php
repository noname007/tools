<?php
	class pa
	{
		private $a='12122';
		function __construct()
		{
			// echo $a;
			self::model();
			// static::model();
		}
		static function model($name= __CLASS__)
		{
			echo $name;
		}



		public  function remove()
		{
			var_dump(get_object_vars($this));
		}

	}

	class b extends pa
	{
		static function model($name= __CLASS__)
		{
			echo $name;
		}
		function remove()
		{
			parent::remove();
		}
	}
	// (new b)->remove();

	// $a= array();
	// if(!$a)
	// 	var_dump($a);

	// echo array_sum(
	// 	array(
	// 		array('con'=>1),
	// 		array('con'=>1)
	// 	)
	// );	

	function AA($a,$b)
	{
		// echo $a.$b;
	}
	// AA(1,2,5);
	// echo strtotime("2016-06-07 00:00:00");
	// require_once 'test1/test1.php';

	array_rand_value(array(1,2,3,4,5,6));