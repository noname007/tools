<?php
// $a = array(
//     'transdata' => '{\"appid\":\"300244139\",\"appuserid\":\"100018\",\"cporderid\":\"3001535a0f9e43d2f037752d6361c087\",\"cpprivate\":\"\",\"currency\":\"RMB\",\"feetype\":0,\"money\":0.01,\"paytype\":403,\"result\":0,\"transid\":\"32031506161821341132\",\"transtime\":\"2015-06-16 18:25:13\",\"transtype\":0,\"waresid\":1}','sign' => 'ax8aHm1ujrKIveMqlT0RNlY4oQ3CcIQk4W1fmdkTekGUHbW4jmqt3p8guBBCv0t+URsFzwFSvTGsuI1BgttLh4NdrZMIkT4sZ33+5XlFrkJraAAMDAE6X5WSO56TanxvrXjx4VBZKnVXc0mNv984fefUvX5DEo658BwVkyo8aEs=',
//     'signtype' => 'RSA');
// echo $a['transdata'] = stripcslashes($a['transdata']);
// var_dump($a);
// echo http_build_query($a);

;

// var_dump(in_array('0', ['a1','a2']));
// // 
// echo $a = round(1,2);
// var_dump(in_array($a,[1,2,4]));
// 
$a = '{"cardInfo":"","cardMoney":"3000","md5String":"e9decea3642824f46ca3757d0ada52ec","merId":"165492","merUserMail":"shenzhoufu@tuituiyouxi.com","merUserName":"北京毅诚科技有限公司","payDetails":"","endTime":"20150711153036","errcode":"200","version":"3","payMoney":"3000","privateField":"2","payResult":"1","signString":"l5523kMWUM4krCCpJ2JMZnECLWpZj7eP6LXO5IM6Xn2r9aHAfcrPtp0nmVfG2U089i3lbEBIbtE6fmKFUOqxNOpbBGum38FUwpY6o9ml93WTr+n401QfxSpnh2hrhMbdLPJGLIyee2ZU+PWIz5xoU97w5nCqUP+H6WezHIMXfjs=","szfOrderNo":"128096259","orderId":"eeaabe57f39ec6c5a7530282d82733c0"}';

$b = json_decode($a,1);

var_dump($b);
echo http_build_query($b);