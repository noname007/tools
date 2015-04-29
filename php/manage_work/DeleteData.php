<?php
    require __DIR__.'/BaseWorker.php';
	class DeleteData extends BaseWorker{
        const CHANGE_PATTEN = 2000;
        static private  $cmd_fh;
        private $tube_name;
        private $patten='';
        public function __construct()
		{
			$beanstalkd_arr = '127.0.0.1:7999';
			$this->tube_name='test';
            self::$cmd_fh = fopen('php://stdin','r');
			parent::__construct($beanstalkd_arr,$this->tube_name);
		}
        public function __destruct()
        {
            fclose(self::$cmd_fh);
        }

        protected function process_job(&$job)
		{
            $data = $job->getData();
            if(strpos($data,$this->patten)!== false)
            {
                echo 'Delete data ',($data),' ?';
                $this->proc_status($this->read_cmd_input(),$job,$data);
            }

		}

        public function run()
        {
            $this->input_patten();
            parent::run();
        }

        protected function input_patten()
        {
            $status = 0;
            while(!$status)
            {
                echo '请输入要删除的文件的特征',"\n";
                $this->patten = rtrim(fgets(self::$cmd_fh));
                echo "特征是(the finger is): ",$this->patten,'?';
                $status = $this->read_cmd_input(array('y'=>1,'n'=>0));
            }
            $this->kick_buried_delayed_job();
        }
        
        private function kick_buried_delayed_job()
        {
            $stats = $this->pheanstalk->statsTube($this->tube_name);
            $this->pheanstalk->useTube($this->tube_name);
            $this->log('kick result:'.$this->pheanstalk->kick($stats['current-jobs-delayed'] + $stats['current-jobs-buried']));
        }

        protected function proc_status($status,&$job)
        {
            if($status == self::PUT_STATUS) {
                echo 'skip',"\n";
                $this->pheanstalk->release($job,Pheanstalk_PheanstalkInterface::DEFAULT_PRIORITY,1);
            }else if($status == self::DELETE_STATUS){
                $this->log('delete job'.$job->getData());
                $this->pheanstalk->delete($job);
            }else if($status == self::WORKER_EXIT_STATUS){
                $this->pheanstalk->release($job,Pheanstalk_PheanstalkInterface::DEFAULT_PRIORITY,1);
                $this->log('[Worker {'.get_class($this).'} exit!]');
                exit;
            }else if($status == self::CHANGE_PATTEN){
                $this->input_patten();
            }
        }
        /**
         * [read_cmd_input n select 1]
         * @param  array  $rule_read_cmd [description]
         * @return [type]                [description]
         */
        protected function read_cmd_input($rule_read_cmd = array())
        {
            if(empty($rule_read_cmd))
                $rule_read_cmd = array('y'=>self::DELETE_STATUS,'n'=>self::PUT_STATUS,'exit'=>self::WORKER_EXIT_STATUS,'change'=>self::CHANGE_PATTEN);/*结束读取的操作,及对应的返回值*/
            $cmd = '';
            
            $rule_read_cmd_key = array_keys($rule_read_cmd);
            $rule_read_cmd_str = join(',',$rule_read_cmd_key);
            echo '[',$rule_read_cmd_str,']';
            while(!in_array($cmd,$rule_read_cmd,1)){
                $cmd =  rtrim(strtolower(fgets(self::$cmd_fh)));
                // echo '0000',$cmd,'0000';
                if(!isset($rule_read_cmd[$cmd]))
                {
                    echo 'again [',$rule_read_cmd_str,']';
                }else{
                    return $rule_read_cmd[$cmd];
                }
            }
        }
    }
    $worker = new DeleteData;
    $worker->run();


