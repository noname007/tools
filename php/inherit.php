<?php

    class A1{
        function table_name(){
            echo __CLASS__,PHP_EOL;
            // echo get_class($this),PHP_EOL;
        }
        function process(){
            echo __CLASS__,"process",PHP_EOL;
            // echo get_class($this),"process",PHP_EOL;
            $this->table_name();
            // parent::process();
        }
    }

    class A2 extends A1{
        function table_name(){
            echo __CLASS__,PHP_EOL;
            // echo get_class($this),PHP_EOL;
        }
        function process(){
            echo __CLASS__,"process",PHP_EOL;
            $this->table_name();
            parent::process();
        }
    }

    class A3 extends A2{
        function table_name(){
            echo __CLASS__,PHP_EOL;
            // echo get_class($this),"process",PHP_EOL;
            // echo get_class($this),PHP_EOL;
        }
        function process(){
            echo __CLASS__,"process",PHP_EOL;
            $this->table_name();
            parent::process();
        }
    }

    $a = new A3;
    $a->process();
