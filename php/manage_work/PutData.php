<?php
    require __DIR__.'/BaseWorker.php';
	class PutData  extends BaseWorker{
		public $put_num;
		public function __construct()
		{
			$beanstalkd_arr ='127.0.0.1:7999';
			$tube_name      ='test';
			$this->put_num  =10;
			parent::__construct($beanstalkd_arr,$tube_name);
            $this->pheanstalk->useTube($tube_name)->put(json_encode(array('test','tset')), Pheanstalk_PheanstalkInterface::DEFAULT_PRIORITY, 10);
		}

		function run()
		{
				$this->pheanstalk->kick(5);
			// while ($this->put_num -- ) {
	            $this->pheanstalk->useTube('test')->put(json_encode(array('test','tset')), Pheanstalk_PheanstalkInterface::DEFAULT_PRIORITY, 10);
			// }
		}
	}
	$worker = new PutData;
	$worker->run();