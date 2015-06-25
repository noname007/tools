<?php
	/**
	* 			
	*/
	require __DIR__.'/BaseWorker.php';
	class TubeInfo extends BaseWorker
	{	
		public function __construct(){
			$beanstalkd_arr = '127.0.0.1:';
			$param = getopt('p:');
			$beanstalkd_arr .= $param['p'];
			$this->tube_name='test';
			parent::__construct($beanstalkd_arr,$this->tube_name);
		}
		public function run(){
			$_sys = $this->pheanstalk->stats();
			echo '---------------------------beanstalk:',$this->beandstalk_addr,'----------------------------',"\n";
			foreach ($_sys as $key => $value) {
				printf('%-34s | %30s%s', $key,$value,"\n");
			}
			echo '-------------------------------------------------------------------------------------------',"\n";
			
			$_tubes = $this->pheanstalk->listTubes();
			foreach ($_tubes as $k => $v) {
				$_tube_info = $this->pheanstalk->statsTube($v);
				
				echo '------------------------------tube:',$v,'----------------------------------',"\n";
				foreach ($_tube_info as $key => $value) {
					printf('%-34s|%30s%s', $key,$value,"\n");
				}
				echo '----------------------------------------------------------------------------',"\n";
			}
		}
	}
	$tube=new TubeInfo;
	$tube->run();
