<?php
    require __DIR__.DIRECTORY_SEPARATOR.'TuiTuiOrderValidator.php';
    $config = include __DIR__.'/config.php';
    
    $user_id = '11111111111';
    $query_string = $_SERVER["QUERY_STRING"];

    

    $rsa_public_key = $config['rsa_public_key'];
    $app_id = $config['app_id'];
    $secret_key =$config['secret_key'];
    $check_user_url = $config['check_user_url'];
    $check_order_url =$config['check_order_url'];


    $params = $query_string;
    $sign_index = strpos($params, '&sign');
    $params = substr($params, 0, $sign_index);

    $obj = new TuituiOrderValidator($rsa_public_key);

    $tuitui = new Tuitui($user_id,$app_id, $secret_key,$check_user_url,$check_order_url);

    if(!$obj->verify($params, ($_GET['sign'])) || $tuitui->check_order_validation($_GET)) {
        echo 'fail';
    }else{
        echo 'success';
    }
?>    