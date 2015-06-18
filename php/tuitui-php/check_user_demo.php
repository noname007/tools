<?php
    require __DIR__.DIRECTORY_SEPARATOR.'Tuitui.php';
    $config = include __DIR__.'/config.php';


    $user_id = '11111111111';
    $login_token = 'dfjakldjaldfk';



    $app_id = $config['app_id'];
    $secret_key =$config['secret_key'];
    $check_user_url = $config['check_user_url'];
    $check_order_url =$config['check_order_url'];


    $obj = new Tuitui($user_id,$app_id, $secret_key,$check_user_url,$check_order_url);

    if($obj->check_user($login_token)) {
        echo 'success';
    }else{
        echo 'fail'.PHP_EOL;
    }
?>    