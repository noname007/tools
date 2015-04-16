<?php
	// require_once 'timestate.log';
$data = file_get_contents('timestate.log');
$data = explode("\n",$data);

$state = array();
// echo floatval('12121.21');
// exit;
// $temp = explode(' ',$data[0]);

// var_dump($temp);
// exit;
foreach ($data as  $record) {
	$temp = explode(' ',$record);
	$key = $temp[2].' '.$temp[3];
	if(!isset($state[$key]))
	{
		// echo $key,"\n";
		$state[$key]['time'] = floatval($temp[5]);
		$state[$key]['count'] = 1;
		$state[$key]['name']=$key;
	}
	else
	{
		$state[$key]['time'] += floatval($temp[5]);
		$state[$key]['count'] += 1;
	}
}
// var_dump($temp);
// var_dump($state);

foreach ($state as $key =>$behavior)
{
	$state[$key]['ave'] = $behavior['time']/$behavior['count'];
}
// var_dump($state);


function cmp($a,$b)
{
	return $a['ave']<=$b['ave'] ? -1:1;
}
usort($state,"cmp");
var_dump($state);
$res =var_export($state,1);
file_put_contents('res.log',$res);

// file_put_contents(filename, data);
