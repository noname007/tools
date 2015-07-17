<?php
    class A{
        public $login_count=null;
        function add(){
            // $this->dfkad += 1;
            $this->login_count = !isset($this->login_count)? 1 : $this->login_count + 1;

        }
    }

    $a = new A;

    $a->add();
    var_dump($a);

    echo 1,2,3,4,5;
date_default_timezone_set('prc');
    function getDiffDays($start, $end=0)
    {
        $start_date = new DateTime( date('Y-m-d', strtotime($start)));
        if($end == 0)
            $end = self::curDate();
        $end_date = new DateTime( date('Y-m-d', strtotime($end)));
        return $end_date->diff($start_date)->days;
    }
    echo getDiffDays('2015-07-14 14:36:31','2015-07-15 14:36:31');