<?php
	class Readfromconsole{
		private static $cmd_fh;
        const DEBUG = 0;
        const YES = 1;
        const NO  = 0;
		public function __construct()
		{
            self::$cmd_fh = fopen('php://stdin','r');
            // var_dump()
		}

        public function __destruct()
        {
            fclose(self::$cmd_fh);
        }

        function read_data($callback)
        {
            $read = 0;
            $rule_read_cmd = array('y'=>self::YES,'n'=>self::NO);
            $res = array();
            $temp = array();
            // $res = ar
            while(($line = (fgets(self::$cmd_fh))) !== false )
            {
                $line = trim($line);
                if(self::DEBUG)
                {
                    echo $line,"\n";
                }
                if($line == '('){
                    $read = 1;
                    continue;
                }else if($line == ')'){
                    $read = 0;
                    if(call_user_func($callback,$temp)){
                        $res[] = $temp;
                    }
                    $temp = array();
                    continue;
                }else if ($read != 1){
                    // $temp['date'] = substr($line,0,19);
                    continue;
                }
                list($key,$value) = explode('=>',$line);
                $temp[trim(trim($key),"'")] = trim(trim($value),"'");
            }

            if(!feof(self::$cmd_fh)){
                echo "Error: unexpected fgets() fail\n";
            }

            return $res;
        }
	}
	$obj = new Readfromconsole;
    // $param = getopt('a:');
    // $app_id = $param['a'];
    // $app_id = '';
    // $channel_id = 10;
    // fget(Readfromconsole::$cmd_fh);
    // 
$date_id = array (
  '0000699075010010201505201341560990447360' => 
  array (
    0 => '0000699075010010201505201341560990447360',
    1 => '3',
  ),
  '0000699075010010201505201342570712864058' => 
  array (
    0 => '0000699075010010201505201342570712864058',
    1 => '3',
  ),
);
    $order = array_keys($date_id);
    $data = ($obj->read_data(
            // 幸亏 有闭包。。。。，回调。。。
            function ($temp) use(&$order){
                return isset($temp['app_order_id']) && in_array($temp['app_order_id'],$order,1);
            }));

    $https = array();
    foreach ($data as $key => $order) {
        echo  'http://***/api/server/verify_order_'.$date_id[$order['app_order_id']][1].'?'.http_build_query($order).PHP_EOL;
    }
