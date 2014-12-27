<?php
/**
 * @author company Sevenga
 * @author Zhen Yang <yz0437@gmail.com>
 * @copyright 2014
 * @Additional instructions :Log
 */
class Log
{
	private static $obj;
    private $logsFile;
    private $logPath='';
    public $extra='';

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

	function  write2($data,$file='applicatiion',$path='')
	{  
        $this->logPath = $path;
        if(!isset($this->logsFile[$this->logPath.$file]))
		{
            $this->logsFile[$this->logPath.$file]= fopen($this->logPath.$file.'.rb', 'w+');
		}
        fwrite($this->logsFile[$this->logPath.$file],$data."\n");
        return $this;
	}

    static function  write($data,$file='applicatiion',$path='./')
    {
        return self::getInstance()->write2($data,$file,$path);
    }
}