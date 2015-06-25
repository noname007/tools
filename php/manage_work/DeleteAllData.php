<?php
    require __DIR__.'/BaseWorker.php';
	class DeleteData extends BaseWorker{
        
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


