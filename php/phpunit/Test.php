<?php
    class Test extends PHPUnit_Framework_Testcase{
        /**
         *@dataProvider add_data
         */
        function testAdd($a,$b,$c){
            $this->assertEquals($c,$a+$b);

        }

        function add_data(){
            return [
                [1,2,3],
                [1,1,2],
                [0,1,2],
                [0,1,2],
                [0,1,1],
                [0,2,2],
            ];
        }

        /**
         * @dataProvider minus_data 
         */
        function testMinus($expected,$a,$b){
            $this->assertEquals($expected,$a-$b);

        }

        function minus_data(){
            return[
                [2,3,1],
                [1,3,2],
                [0,2,1],
                [-1,1,2],
                [1,1,2],
            ];
        }
    }