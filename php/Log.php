<?php
/**
 * @author company Sevenga
 * @author Zhen Yang <yz0437@gmail.com>
 * @copyright 2014
 * @Additional instructions :refine Module Function
 */
class Log
{
	private static $obj;
    public $logFile;
    private $logsFile;
    private $logPath='./';

	function __construct()
	{
		date_default_timezone_set('PRC');
	}
	static function getInstance()
	{
		if(!self::$obj)
		{
			self::$obj = new self();
		}
		return self::$obj;
	}
	function  write2($data,$file='applicatiion')
	{
        if(!isset($this->logsFile[$file]))
		{
            $this->logsFile[$file]= fopen($this->logPath.$file.'.log', 'a+');
		}
        fwrite($this->logsFile[$file],'['.date('Y-m-d H:i:s').'] '.$data."\n");
        return $this;
	}
    static function  write($data,$file='applicatiion')
    {
        return self::getInstance()->write2($data,$file);
        // return $this;
    }
    function travel_arr($arr,&$result='',$symbolL='')
    {
        $symbolLTemp = $symbolL;
        $symbolL .= '|';
        foreach ($arr as $key => $value) {
            if(is_array($value))
            {
                if(!is_numeric($key))
                {      
                    $result .= $symbolL.$key."\n";
                    $this->travel_arr($value,$result,$symbolL.'  ');
                }
                else
                {
                    $result .= $symbolLTemp."[\n";
                    $this->travel_arr($value,$result,$symbolLTemp . '  ');
                    $result .=  $symbolLTemp."]\n";
                    break;
                }
            }
            else
            {
                $result .= $symbolL.$key."\n";
            }
        }
        return $result;
    }
}