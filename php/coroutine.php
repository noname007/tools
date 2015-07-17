<?php
	// 参考资料  php协程
	// http://blog.csdn.net/cszhouwei/article/details/41446687
	
	
	function my_range($start, $end, $step = 1) {
	    for ($i = $start; $i <= $end; $i += $step) {
	        yield $i;
	    }
	}
	
	/*
	 class Generator
	 */
	$a = my_range(1, 10);
	// var_dump($a);


	foreach ($a as $num) {
	    // echo $num, "\n";
	}


	// function gen() {
	//     $ret = (yield 'yield1');
	//     var_dump($ret);
	//     echo "[gen]", $ret, "\n";
	//     $ret = (yield 'yield2');
	//     echo "[gen]", $ret, "\n";
	//     // yield 11111111111;
	// }

	// $gen = gen();
	// var_dump($gen);
	// $ret = $gen->current();
	// echo "[main]", $ret, "\n";
	// var_dump($ret);
	// $ret = $gen->send("send1");
	// var_dump($ret);
	// echo "[main]", $ret, "\n";
	// $ret = $gen->send("send2");
	// echo "[main]", $ret, "\n";
	// $ret = $gen->send("send777777");
	// echo "[main]", $ret, "\n";


// 概念
//  http://blog.csdn.net/ixidof/article/details/6187991
//  http://www.zhihu.com/question/20511233
//  
//  
//  
//  
//  鸟哥
//  http://www.laruence.com/2015/05/28/3038.html
//  
//  
 class Task {
    protected $taskId;
    protected $coroutine;
    protected $sendValue = null;
    protected $beforeFirstYield = true;
 
    public function __construct($taskId, Generator $coroutine) {
        $this->taskId = $taskId;
        $this->coroutine = $coroutine;
    }
 
    public function getTaskId() {
        return $this->taskId;
    }
 
    public function setSendValue($sendValue) {
        $this->sendValue = $sendValue;
    }
 
    public function run() {
        if ($this->beforeFirstYield) {
            $this->beforeFirstYield = false;
            return $this->coroutine->current();
        } else {
            $retval = $this->coroutine->send($this->sendValue);
            $this->sendValue = null;
            return $retval;
        }
    }
 
    public function isFinished() {
        return !$this->coroutine->valid();
    }
}


// function gen() {
//     yield 'foo';
//     yield 'bar';
// }
 
// $gen = gen();
// var_dump($gen->send('something'));
// 
// 
// 如之前提到的在send之前, 当$gen迭代器被创建的时候一个renwind()方法已经被隐式调用
// 所以实际上发生的应该类似:
//$gen->rewind();
//var_dump($gen->send('something'));
 
//这样renwind的执行将会导致第一个yield被执行, 并且忽略了他的返回值.
//真正当我们调用yield的时候, 我们得到的是第二个yield的值! 导致第一个yield的值被忽略.
//string(3) "bar"
//
//

class Scheduler {
    protected $maxTaskId = 0;
    protected $taskMap = []; // taskId => task
    protected $taskQueue;
 
    public function __construct() {
        $this->taskQueue = new SplQueue();
    }
 
    public function newTask(Generator $coroutine) {
        $tid = ++$this->maxTaskId;
        $task = new Task($tid, $coroutine);
        $this->taskMap[$tid] = $task;
        $this->schedule($task);
        return $tid;
    }
 
    public function schedule(Task $task) {
        $this->taskQueue->enqueue($task);
    }
 
    public function run() {
        while (!$this->taskQueue->isEmpty()) {
            $task = $this->taskQueue->dequeue();
            $task->run();
 
            if ($task->isFinished()) {
                unset($this->taskMap[$task->getTaskId()]);
            } else {
                $this->schedule($task);
            }
        }
    }
}


function task1() {
    for ($i = 1; $i <= 10; ++$i) {
        echo "This is task 1 iteration $i.\n";
        yield;
    }
}
 
function task2() {
    for ($i = 1; $i <= 5; ++$i) {
        echo "This is task 2 iteration $i.\n";
        yield;
    }
}
 
$scheduler = new Scheduler;
 
$scheduler->newTask(task1());
$scheduler->newTask(task2());
 
$scheduler->run();