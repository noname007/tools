<?php
function begin_xhprof()
{
	xhprof_enable(XHPROF_FLAGS_MEMORY | XHPROF_FLAGS_CPU);
}


function end_xhprof($namespace='xhprof') {
    $xhprof_data        = xhprof_disable();
    //让数据收集程序在后台运行
    if (function_exists('fastcgi_finish_request')) {
        fastcgi_finish_request();
    }
    //保存xhprof数据
    include_once "../phprof/xhprof_lib/utils/xhprof_lib.php";  
	include_once "../phprof/xhprof_lib/utils/xhprof_runs.php";  

	$objXhprofRun = new XHProfRuns_Default(); 
	$run_id = $objXhprofRun->save_run($xhprof_data, $namespace);
}
