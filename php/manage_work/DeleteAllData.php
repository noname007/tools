<?php
    require __DIR__.'/BaseWorker.php';
	class DeleteData extends BaseWorker{
        public function __construct(){
            $param = getopt('h:p:t:');
            $beanstalkd_arr =isset($param['h'])?$param['h'] : '127.0.0.1';
            isset($param['p']) or die('no port');
            isset($param['t']) or die('no tubename');
            $this->tube_name = $param['t'];
            $beanstalkd_arr .= $param['p'];
            date_default_timezone_set('PRC');
    		parent::__construct($beanstalkd_arr,'');
		}


        public function __destruct()
        {
            parent::__destruct();
        }

        public function run()
        {
            $tubes = $this->pheanstalk->listTubes();
            var_dump($tubes);
            echo 'tube name: ',$this->tube_name,PHP_EOL;
            if($this->tube_name == 'default' || $this->tube_name == 'test'){
                die('tube name'.$this->tube_name);
            }
            $this->watch($this->tube_name);
            $this->kick_buried_delayed_job($this->tube_name);
            while($job = $this->pheanstalk->reserve()){
                $this->log('delete job :'.$job->getData());
                $this->pheanstalk->delete($job);
                $this->kick_buried_delayed_job($this->tube_name);
            }
        }
        private function kick_buried_delayed_job($tube_name)
        {
            $stats = $this->pheanstalk->statsTube($tube_name);
            $this->pheanstalk->useTube($tube_name);
            $this->log('kick'.$tube_name.' result:'.$this->pheanstalk->kick($stats['current-jobs-delayed'] + $stats['current-jobs-buried']));
            return $stats['current-jobs-delayed'] + $stats['current-jobs-buried'];
        }
    }
    $worker = new DeleteData;
    $worker->run();


