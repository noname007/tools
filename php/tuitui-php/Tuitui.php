<?php
    require __DIR__.'/HttpRequest.php';
    class Tuitui
    {
        private $app_id;
        private $check_user_url;
        private $check_order_url;
        private $user_id;
        private $secret_key;


        public function __construct($user_id,$app_id, $secret_key,$check_user_url,$check_order_url){
            $this->app_id = $app_id;
            $this->check_user_url = $check_user_url;
            $this->check_order_url= $check_order_url;
            $this->user_id= $user_id;
            $this->secret_key= $secret_key;
        }

        function check_user($login_token) {
            $params = "app_id=$this->app_id&channel_id=10&user_id=$this->user_id&login_token=$login_token";
            $sign = sha1($params . "&secret_key=".$this->secret_key);
            $params .= "&sign=" . $sign;
            $url = $this->check_user_url.$params;
            $msg = HttpRequest::get_method($url);
            $array_result = json_decode($msg['msg'], true);
            if (!empty($array_result)&&$array_result['ret'] == 0) {
               return true;
            }
            return false;
        }

        function check_order_validation(&$params){
            $url =$this->check_order_url.http_build_query($params);
            $msg = HttpRequest::get_method($url);
            $array_result = json_decode($msg['msg'], true);
            if (!empty($array_result)&&$array_result['ret'] == 0) {
                return true;
            }
            return false;
        }
    }


   
    