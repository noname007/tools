<?php
require_once(__DIR__.'/../components/Curl.php');
class BaseWorker{
    const PUT_STATUS         = 1;
    const DELETE_STATUS      = 2;
    const WORKER_EXIT_STATUS = -1024;
    public $queue_data;
    public $beandstalk_addr;
    private $_curl;
    protected $pheanstalk;
    // private $_m;/*仿照Yii componet的写*/
    public function __construct() 
    {
        $param = getopt('h:p:t:');
        $addr = isset($param['h'])?$param['h'] : '127.0.0.1';
        isset($param['p']) or die('no port');
        isset($param['t']) or die('no tubename');
        $this->tube_name = $param['t'];
        $addr .= $param['p'];
        date_default_timezone_set('PRC');
        $pheanstalk_path = __DIR__.'/../../vendor/pheanstalk';
        require_once($pheanstalk_path . '/pheanstalk_init.php');
        $this->log(' [starting] at ' .  $addr);
        $this->beandstalk_addr = $addr;
        $this->pheanstalk = new Pheanstalk_Pheanstalk($addr);
        if(empty($this->pheanstalk))
        {
            $this->log('init pheanstalk failed '.$addr.'  '.$pheanstalk_path);
            exit;
        }
        $this->watch($this->tube_name);
        $this->log('starting beanstalk '.$this->beandstalk_addr);
    }

    public function __get($name){
        $name  = 'get'.ucfirst($name);
        if(method_exists($this,$name)){
            return call_user_func(array($this,$name));
        }else{
            throw new Exception("Function not exist");
        }
    }

    public function getCurl(){
        $this->_curl = New Curl;
        $this->_curl->init();
    }

    public function __destruct() 
    {
        $this->log('ending' . $this->beandstalk_addr);
    }
    
    public static function curTime()
    {
        return date('Y-m-d H:i:s');
    }

    protected function log($txt) 
    {
        echo '[',self::curTime(),']'.$txt . "\n";
    }
    /**
     * [watch description]
     * @param  [string/array] $tube_name [监控一个/组tube]
     * @return [type]            [description]
     */
    public function watch($tube_name)
    {
        if(!empty($tube_name) && is_string($tube_name))
        {
            $this->pheanstalk->watch($tube_name);
        }else if(is_array($tube_name)){
            foreach ($tube_name as $key => $value) {
                $this->pheanstalk->watch($value);
            }
        }
        return $this;
    }

    public function run() 
    {
        while(1) 
        {
            try {
                $job = $this->pheanstalk->reserve();
                if($job) {
                    $this->process_job($job);
                }
            } catch(Exception $e) {
                $this->log(self::curTime() . ' [beanstalkd exception] ' . $e->getMessage());
                sleep(1);
            }
        }
    }

    /**
     * [proc_status description]
     * @param  [type] &$worker_process_res [description]
     * @param  [type] &$job                [description]
     * @return [type]                      [description]
     */
  
    public function run_shell($shell)
    {
        return exec($shell);
    }
}
