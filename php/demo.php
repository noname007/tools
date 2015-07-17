<?php
    require __DIR__.DIRECTORY_SEPARATOR.'TuiTuiOrderValidator.php';
    $params = $_SERVER["QUERY_STRING"];
    $sign_index = strpos($params, '&sign');
    $params = substr($params, 0, $sign_index);

    $rsa_public_key = "请在此处填写你的rsa_public_key";
    $obj = new TuituiOrderValidator($rsa_public_key);

    if(!$obj->verify($params, ($_GET['sign']))) {
        echo 'fail';
    }else{
        echo 'success';
    }

?>    