<?php
/**
 * @author company Sevenga
 * @author Zhen Yang <yz0437@gmail.com>
 * @copyright 2014
 * @Additional instructions  提取module act作为生成测试脚本
 */


require 'Log.php';
require 'modules/includes.php';
// print_r(get_class_methods('ModActivityCollection'));

$a = get_declared_classes();
$methodnum = 0;
foreach($a as $v)
{
	$t = new ReflectionClass($v);
	if($t->isUserDefined()&&($classname = $t->getName()) != 'Log')
	{
		$modact[$classname] =get_class_methods($classname);
		$methodnum += count($modact[$classname]);
		echo $classname," ",count($modact[$classname]),"\n";
	}
}
echo $methodnum,"\n";

function write($modact)
{
	$linefeed = PHP_EOL;
	$space    = '	';

	foreach ($modact as  $modname=>$acts) 
	{
		$content           = 'class '.$modname.$linefeed.$linefeed;      
		$lambdaContent     = 'class '.$modname."LambdaConfig".$linefeed.$linefeed;

		foreach ($acts as $actname => $act)
		{
			$content       .= $space.'def '.$act.$linefeed;                
			$content       .= 
<<<EOF
		{'mod'=>'$modname','act'=>'$act'}
EOF;
			$content       .= $linefeed;
			$content       .= $space.'end'.$linefeed.$linefeed;
			
			$lambdaContent .= $space.'def '.$act.'(robot)'.$linefeed;
			$lambdaContent .=
<<<EOF
		lambda{
			|response_data|
			#puts response_data		
		}
EOF;
			$lambdaContent .= $linefeed;
			$lambdaContent .= $space.'end'.$linefeed.$linefeed;


		}
		$content           .= 'end'.$linefeed;                           
		$lambdaContent     .= 'end'.$linefeed;                           
		Log::write($content,$modname,'./param/');
		Log::write($lambdaContent,$modname."LambdaConfig",'./lambda/');
	}
}
write($modact);


