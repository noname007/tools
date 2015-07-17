<?php
    class SingletonCActiveRecord{
        private static $_SingletonCActiveRecord =null;
        public function get_instance(){
            if(is_null(self::$_SingletonCActiveRecord)){
                static::set_singleton($_SingletonCActiveRecord);
            }
            return $_SingletonCActiveRecord;
        }
        static function set_singleton($obj){
            if($obj instanceof static){
                self::$_SingletonCActiveRecord = $obj;
                var_dump($obj);
            }
        }
    }


class SingletonCActiveRecord1 extends SingletonCActiveRecord{

}

class SingletonCActiveRecord2 extends SingletonCActiveRecord{

}
    $b =  new SingletonCActiveRecord2;
    $a = new SingletonCActiveRecord1;
    $a->set_singleton($b);