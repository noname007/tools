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

	// array_rand_value(array(1,2,3,4,5,6));

	var_dump(microtime(1));//0.94505900 1419596928
	// 0.94505900 1419596928

// <?php
    echo $stime=microtime(true); //获取程序开始执行的时间

    echo "本PHP程序的运行时间为";

    echo $etime=microtime(true);//获取程序执行结束的时间
    $total=$etime-$stime;   //计算差值
    echo $total;
    $str_total = var_export($total, TRUE);
    var_dump($str_total);
    // if(substr_count($str_total,"E")){
        $float_total = floatval(substr($str_total,5));
        // $total = $float_total/100000;
    	echo "$total".'秒';
    // }
    $a = true;
    $b = '';
    var_dump(isset($a,$b));
