<?php
	// echo '';
	// gethostb
	// echo gethostbyname('www.baidu.com');
	// echo http_build_query(array(
	// 'version'=>'12.26.0.4',
	// 'auth_key'=>'703E4FADBA8753563A33C341A81F2342',
	// 'auth_time'=>'1420341443',
	// 'ios_payment'=>'false',
	// 'parameter'=>'eyJhY3QiOiJ1cGRhdGVfdXNlcl9pbmZvIiwibW9kIjoiUGxheWVyIn0=',
	// 'platform'=>'ZH',
	// 'randkey'=>'81a4ca065',
	// 'uid'=>'100201 from users and select * from users;--'));

	// $str = '【毅诚科技】推推游戏验证码：%s（该验证码有效期为10分钟，请及时进行校验）；再次提醒，请勿将验证码泄露给其他人。';
	// // echo sprintf($str,'11111111');


	// function gen_vcode(){
 //        $vcode = '';
 //        $v_len = 6;
 //        do{
 //            $vcode .= rand(0,9);
 //        }while(--$v_len);
 //        return $vcode;
 //    }
 //    // date_default_timezone_set('prc');
    // echo gen_vcode();
// echo strtotime(date('Y-m-d H:i:s'));
// echo time();
// empty($a)

// $res = json_decode('{"status":"0","msgid":"2015052815531063191","msg":"\u53d1\u9001\u6210\u529f"}',1);

// if(isset($res['status']) && $res['status'] == '0'){
// 	echo 1;
// }else{echo 2333;}
// $
// if()

// isset($a);
// 
// 
// 
// 
// 
// 
// 
// 
// 
// echo str_pad(uniqid('zuse',1),35,'0',STR_PAD_RIGHT);
// zuse55719a05d06234.5644757000000000
// zuse556708dc783ad6.45004944

// 
// 
// 
// 
// 
// 
// 
// var_dump(in_array(1,array('1'),1));
// 
// try{
//      throw new Exception("用户保存到数据库失败");
//  }catch(Exception $e){
//     echo $e->getMessage();
//  }
//  
// //  
//  $res = array_map(function($a){
//     return array('ddddd'=>12345,$a[1]);
//  },array(array(1,2),[1,3,4],[12,56]));


//  // print_r($res);
//  echo (999 /100.0 * 100 ) ;
//  echo (int)(1.9);


// echo json_encode(['data'=>['orders'=>[['key'=>1]]]]);

// $a = array_map(function($a){echo 1;var_dump($a);},[]);
// var_dump($a);

// class A{


//     function a(){
//         print_r(array_map(['A','BBB'],[1,2,3,4,5]));
//     }

//     static function  BBB(){
//         echo 'BBBBBBBB'.PHP_EOL;
//     }
//     private function call($a){
//         echo 'call';
//         echo $a,PHP_EOL;
//         return $a+5;
//     }
// }

// // $obj = new A;
// // $obj->a();
// var_dump(sprintf('%.2F',1.999) + 10.2);
// 
// var_dump(round(100 * 88.9999));
// echo PHP_EOL;
// echo str_pad(str_replace('.','',uniqid('tuituib100000',1)),35,'0',STR_PAD_RIGHT);
//  var_dump(strpos('tuituib1000005572c50e56efb000000000','tuitub'));
// echo abs(-1.1);
// 
// 
// $s = '{
// 	"config":{
// 		"toolbar":[
// 			{
// 				"tag":"CHAT",
// 				"title":"聊天",
// 				"activity_title":"聊天",
// 				"icon_url":"http://xxx",
// 				"target_url":"native://com.tuitui.ui.ChatActivity"
// 			},
// 			{
// 				"tag":"NOTICE",
// 				"title":"公告",
// 				"activity_title":"公告",
// 				"icon_url":"http://xxx",
// 				"target_url":"native://com.tuitui.ui.NoticeActivity"
// 			},
// 			{
// 				"tag":"HELP",
// 				"title":"帮助",
// 				"activity_title":"帮助",
// 				"icon_url":"http://xxx",
// 				"target_url":"http://res.tuituiyouxi.com/resources/pages/ttsdk/agreement.html"
// 			},
// 			{
// 				"tag":"ACCOUNT",
// 				"title":"用户中心",
// 				"activity_title":"用户中心",
// 				"icon_url":"http://xxx",
// 				"target_url":"native://com.tuitui.ui.AccountActivity"
// 			}
// 		],
// 		"log":"true"
// 	}
// }';

// var_export(json_decode($s,1));
// 
// echo json_encode('订单验未支付');
// var_dump(json_decode(' {"ret":-19035,"data":"\u8ba2\u5355\u9a8c\u672a\u652f\u4ed8"}',1));
// 
// 
// $str = 'dlfjasdfjasfdsjlfj-';
// $str = 'dlfjasdfjasfdsjlfjd*';
// $str = 'dlfjasdfjasfdsjlf110239238948';
// $str = 'dlfjasdfjdfdafsd1123asfdsjlfjd';
// $str = '1121233d';
// $pattern = '/^[a-zA-Z][0-9a-zA-Z]{5,14}$/';
// $pattern = '/(^[0-9]+[a-zA-Z]+[a-zA-Z0-9]*$)|(^[a-zA-Z]+[0-9]+[a-zA-Z0-9]*$)|^[a-zA-Z]+$/';
// var_dump(preg_match($pattern, $str));
// 
$a = [0, 8, 16, 24, 32, 40, 48, 56, 64];
foreach ($a as $key => $value) {
	echo $value %12,PHP_EOL;
}