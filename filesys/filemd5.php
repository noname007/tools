<?php
	/**
	 * @author company Sevenga
	 * @author Zhen Yang <yz0437@gmail.com>
	 * @copyright 2014
	 * @Additional instructions 文件同步工具
	 */	
	
	class FileMd5{
		private  $md5_file = './md5/';
		public  $md5filename = '';
		private $dir_absolute_pos;
		private $file_handler;
		private  $file_md5_content;
		function __construct($dir='./',$md5filename='md5')
		{
			$this->md5filename = $md5filename;
			if(is_dir($dir))
			{
				$this->dir_absolute_pos = $dir;
				$this->file_handler = fopen($this->md5_file.$md5filename.'.php', 'w+');
				if(!$this->file_handler)
				{
					echo 'open '.$this->md5_file.$md5filename.'error!';
				}else{
					fwrite($this->file_handler,"<?php");
					fwrite($this->file_handler,"\n");
					fwrite($this->file_handler,"$$md5filename=array(\n");
				}
			}
			else
			{
				echo  'Not a directory!';
			}
		}
		function __destruct()
		{
			$this->file_md5_content .= ");\n";
			fwrite($this->file_handler,$this->file_md5_content);
			fclose($this->file_handler);
		}
		function travel($file_relative_pos = '')
		{
			$opendirfail = 1;
			if($handle=opendir($this->dir_absolute_pos.$file_relative_pos))
			{

				while(($dir_file = readdir($handle))!== false)
				{
					if($dir_file =='.' || $dir_file == '..' || $dir_file == '.git')
					{
						continue;
					}
			
					$temp = $file_relative_pos.'/'.$dir_file;
					if(is_dir($this->dir_absolute_pos.'/'.$temp))
					{
						$this->travel($temp);
					}
					else
						$this->gen_file_md5($temp);
				}
			}
			else
			{
				return array('sucess'=>0,'res'=>'read dir info fail!');
			}	
		}
		function set_dir($dir)
		{
			$this->dir_absolute_pos = trim($dir,'/');
		}
		function travel_dir()
		{
			$this->dir_absolute_pos = trim($this->dir_absolute_pos,'/');
			$this->travel();
		}
		function gen_file_md5($file_relative_pos)
		{	
			$file = $this->dir_absolute_pos.$file_relative_pos;
			$stat = stat($file);
			$this->file_md5_content .= "	'".$file_relative_pos."'=>array('size'=>".round($stat['size']/1024).",'md5'=>'".md5_file($file)."'),\n";
		}
	}
	/**
	* 
	*/
	class FileSys
	{
		public $dest;
		public $sour;
		private $filemd5;

		function __construct($sour,$dest)
		{
			$this->sour = $sour;
			$this->dest = $dest;
		}
	}

	//dest 有的，不用管。都有的s->d
	$dir_sour = './';
	$dir_dest = 'D:/test';
	$dir_sour = trim($dir_sour,'/');

	$filemd5 = new FileMd5($dir_sour,'sour');
	$filemd5->travel_dir();
	$filemd5_dest = new FileMd5($dir_dest,'dest');
	$filemd5_dest->travel_dir();
	unset($filemd5_dest);
	unset($filemd5);
	require 'md5/sour.php';
	require 'md5/dest.php';
	// $dest = $dest;
	// $sour = $sour;
	// var_dump($dest);
	$copy_process_info = false;
	const ALL          = 1;
	const DEBUGE       = 2;
	foreach ($sour as $itemkey => $v)
	{
		if(is_null($dest[$itemkey]['md5']))
		{
			$dir = $dir_dest.substr($itemkey,0,strripos($itemkey,'/'));
			if(!file_exists($dir))
			{
				if($copy_process_info)
				{
					echo "mkdir:".$dir;
					echo "copy $itemkey...","n";
				}
				mkdir($dir);
			}
			copy($dir_sour.$itemkey,$dir_dest.$itemkey);
		}
		else if($v['md5'] != $dest[$itemkey]['md5'])
		{
			if($copy_process_info)
			{
				echo "copy $itemkey...","\n";
			}
			copy($dir_sour.$itemkey,$dir_dest.$itemkey);
		}else{
			if($copy_process_info)
			{
				echo "file $itemkey is same!","\n";
			}
		}
	}
