<?php
/**
 * Description of RestError
 *
 * @author Ren Fu-Xin
 */
class RestError {
    const SEVENGA_ERROR_HAS_NEW_VERSION=1;              /**< 有新版本 */

    const SEVENGA_ERROR_NO_ERROR=0;             /**< 没有错误 */

    const SEVENGA_ERROR_UNKNOWN=-1;                     /**< 未知错误 */
    const SEVENGA_ERROR_NETWORK_FAIL=-2;                /**< 网络连接错误 */
    const SEVENGA_ERROR_PACKAGE_INVALID=-3;                 /**< 数据包不全、丢失或无效*/
    const SEVENGA_ERROR_SESSIONID_INVALID=-4;               /**< SessionId（用户的会话标识）无效 */
    const SEVENGA_ERROR_PARAM=-5;               /**< 参数值错误或非法，请检查参数值是否有效 */
    const SEVENGA_ERROR_CLIENT_APP_ID_INVALID=-6;               /**< 无效的应用ID接入 */
    const SEVENGA_ERROR_NETWORK_ERROR=-7;               /**< 网络通信发生错误 */
    const SEVENGA_ERROR_APP_KEY_INVALID=-8;             /**< 该用户未授权接入（AppKey无效）*/
    const SEVENGA_ERROR_NO_SIM=-9;              /**< 未检测到SIM卡 */
    const SEVENGA_ERROR_SERVER_ERROR=-10;               /**< 服务器处理发生错误，请求无法完成 */
    const SEVENGA_ERROR_NOT_LOGINED=-11;                /**< 未登录 */
    const SEVENGA_ERROR_USER_CANCEL=-12;                /**< 用户取消 */
    const SEVENGA_ERROR_BUSINESS_SYSTEM_UNCHECKED=-13;              /**< 业务系统未通过审核 */
    const SEVENGA_ERROR_SDK_VERSION_INVALID=-14;                /**< SDK版本号无效 */
    const SEVENGA_ERROR_NOT_PERMITTED=-15;              /**< 接口不允许调用 */
    const SEVENGA_ERROR_LOGINTOKEN_INVALID=-16;             /**< login_token无效 */
    const SEVENGA_ERROR_REQUEST_INVAILD=-17;                /**< 请求无法识别 */
    const SEVENGA_ERROR_PARAM_NOT_ENOUGH = -18;                 /*参数不足*/


    const SEVENGA_ERROR_ACCOUNT_INVALID=-100;               /**< 账号格式不合法，合法账号为5－30个字符，仅允许字母及数字 */
    const SEVENGA_ERROR_PASSWORD_INVALID=-101;              /**< 密码格式不合法，密码不能为空，长度为5－32个字符，大小写敏感 */
    const SEVENGA_ERROR_LOGIN_FAIL=-102;                /**< 登录失败 */
    const SEVENGA_ERROR_ACCOUNT_NOT_EXIST=-103;             /**< 账号不存在或者停用 */
    const SEVENGA_ERROR_ACCOUNT_PASSWORD_ERROR=-104;                /**< 账号密码错误 */
    const SEVENGA_ERROR_TOO_MUCH_ACCOUNT_REGISTED=-105;             /**< 该手机注册的账号数目已达到上限，无法再注册 */
    const SEVENGA_ERROR_REGIST_FAIL=-106;               /**< 注册失败 */
    const SEVENGA_ERROR_ACCOUNT_HAS_EXIST=-107;             /**< 该账号已经被注册 */
    const SEVENGA_ERROR_VERIFY_ACCOUNT_FAIL=-108;               /**< 账号验证失败 */
    const SEVENGA_ERROR_PARAM_INVALID=-109;             /**< 参数无效 */
    const SEVENGA_ERROR_IGNORE_CONTACT_LIST=-110;               /**< 相同的通讯录已经上传，忽略此次上传 */
    const SEVENGA_ERROR_DEVICE_NEVER_LOGINED=-111;              /**< 该设备没有登录过用户 */
    const SEVENGA_ERROR_DEVICE_CANNOT_AUTO_LOGIN=-112;              /**< 该设备不能自动登录 */
    const SEVENGA_ERROR_ACCOUNT_PRESERVED=-113;             /**< 账号无效（可能被保留） */
    const SEVENGA_ERROR_AUTO_LOGIN_SIGN_INVALID=-114;               /**< 自动登录凭据失效，请重新输入密码登录 */
    const SEVENGA_ERROR_EMAIL_FORMAT_ERROR=-116;                /**< 邮箱格式错误 */
    const SEVENGA_ERROR_EMAIL_DUP=-117;                     /**< 邮箱已注册 */
    const SEVENGA_ERROR_EMAIL_NOT_FOUND_ERROR=-118;             /**< 邮箱未注册 */
    const SEVENGA_ERROR_EMAIL_SEND_ERROR=-119;              /**< 邮件发送失败 */
    const SEVENGA_ERROR_USER_EMAIL_HAS_BOUND=-120;                /**< 用户已经绑定邮箱，防止重复绑定 */
    const SEVENGA_ERROR_HUANXIN_REGIST_FAIL = -121;            /*环信注册失败*/
    const SEVENGA_ERROR_APP_NOT_ONLINE = -122;            /*应用未审核通过*/

    const SEVENGA_ERROR_NICKNAME_INVALID=-201;              /**< 昵称不合法，合法昵称由1－20个非空字符构成，请勿使用敏感词汇 */

    const SEVENGA_ERROR_NEW_PASSWORD_INVALID=-301;              /**< 新密码格式非法，密码不能为空，长度为5－30个字符，由字母和数字组成，大小写敏感 */
    const SEVENGA_ERROR_OLD_PASSWORD_INVALID=-302;              /**< 旧密码格式非法，不能为空*/
    const SEVENGA_ERROR_OLD_PASSWORD_ERROR=-303;                /**< 原密码错误 */

    const SEVENGA_ERROR_PHONE_EXIST = -401;                     /*手机已被绑定*/
    const SEVENGA_ERROR_PHONE_FORMAT_EROOR = -402;              /*手机号格式不对*/
    const SEVENGA_ERROR_PHONE_SEND_CODE_FAIL = -403;            /*发送验证码失败*/
    const SEVENGA_ERROR_PHONE_HAVE_SENT_CODE = -404;            /*验证码已发送*/
    const SEVENGA_ERROR_PHONE_CODE_INVALID = -405;              /*验证码无效*/
    const SEVENGA_ERROR_PHONE_CODE_EXPIRED = -406;              /*验证码已过期*/
    const SEVENGA_ERROR_PHONE_UNBIND = -407;                    /*手机未绑定*/
    const SEVENGA_ERROR_UPLINK_CODE_FORMAT_ERROR = -408;        /*上行验证码格式有误*/
    const SEVENGA_ERROR_PHONE_PARAM_ERROR = -409;               /*上行验证码回调参数错误*/
    const SEVENGA_ERROR_UPLINK_CODE_INVALID = -410;            /*上行验证码无效*/

    const SEVENGA_ERROR_PERMISSION_NOT_ENOUGH=-701;             /**< 权限不足 */

    const SEVENGA_ERROR_BALANCE_NOT_ENOUGH=-4002;               /**< 余额不足，无法支付 */
    const SEVENGA_ERROR_ORDER_SERIAL_DUPLICATE=-4003;               /**< 订单号重复 */
    const SEVENGA_ERROR_ORDER_SERIAL_SUBMITTED=-4004;               /**< 订单已提交 */

    const SEVENGA_ERROR_PAY_FAILED=-18003;              /**< 支付失败 */
    const SEVENGA_ERROR_PAY_CANCELED=-18004;                /**< 取消支付 */

    const SEVENGA_ERROR_PAY_ORDER_NOT_EXIST=-19032;             /**< 无此订单 */
    const SEVENGA_ERROR_PAY_ORDER_VERIFY_INVALID=-19033;                /**< 订单验证无效 */
    const SEVENGA_ERROR_PAY_ORDER_VERIFY_TIMEOUT=-19034;                /**< 订单验证超时 */
    const SEVENGA_ERROR_PAY_ORDER_NOT_PAY=-19035;               /**< 订单验未支付*/
    const SEVENGA_ERROR_PAY_ORDER_HAS_FINISHED = -19036;          /*订单已完成*/
    const SEVENGA_ERROR_PAY_ORDER_PAY_NOT_EXIST = -19037;         /*支付方式不存在*/

    const SEVENGA_ERROR_PAY_ORDER_NOT_BY_TUITUIER=-19200;              /*< 订单并非是由推推客代充 */ 
    const SEVENGA_ERROR_PAY_REQUEST_TIMEOUT=-23002;             /**< 支付超时，请稍候重试 */
    const SEVENGA_ERROR_VG_PRODUCT_ID_INVALID=-23004;               /**< 虚拟商品ID无效 */



    const SEVENGA_ERROR_VG_ORDER_FAILED=-24002;             /**< 获取虚拟商品订单号失败 */
    const SEVENGA_ERROR_VG_BACK_FROM_RECHARGE=-24003;               /**< 退出充值界面（购买游戏币虚拟商品时） */

    const SEVENGA_ERROR_HIGH_FREQUENT_OPERATION=-27001;             /**< 操作过于频繁 */
    const SEVENGA_ERROR_3RD_AUTH_FAILED=-28001;             /**< 验证第三方账号授权失败 */
    const SEVENGA_ERROR_3RD_REAUTH_FAILDED=-28002;              /**< 验证第三方绑定信息失败 */


    const SEVENGA_ERROR_CP_SERVER_REQUEST_FORMAT_ERROR = -5000;
    const SEVENGA_ERROR_CP_SERVER_REQUEST_LOGIN_TOKEN_ERROR = -5001;
    const SEVENGA_ERROR_CP_SERVER_REQUEST_ORDER_ERROR = -5002;

    const SEVENGA_ERROR_CP_SERVER_CONNECT_ERROR = -5100;
    const SEVENGA_ERROR_CP_SERVER_RESPONSE_ERROR = -5101;

    const SEVENGA_ERROR_QIDIAN_PAY_SIG_ERROR = -6001;
    const SEVENGA_ERROR_ALREADY_IS_FORMAL_USER = -8001;

    public  $errorMessages = array(
        self::SEVENGA_ERROR_HAS_NEW_VERSION=>'有新版本',
        self::SEVENGA_ERROR_NO_ERROR=>'没有错误',
        self::SEVENGA_ERROR_UNKNOWN=>'未知错误',
        self::SEVENGA_ERROR_NETWORK_FAIL=>'网络连接错误',
        self::SEVENGA_ERROR_PACKAGE_INVALID=>'数据包不全、丢失或无效',
        self::SEVENGA_ERROR_SESSIONID_INVALID=>'SessionId（用户的会话标识）无效',
        self::SEVENGA_ERROR_PARAM=>'参数值错误或非法，请检查参数值是否有效',
        self::SEVENGA_ERROR_PAY_ORDER_PAY_NOT_EXIST=>'支付方式不存在',
        self::SEVENGA_ERROR_CLIENT_APP_ID_INVALID=>'无效的应用ID接入',
        self::SEVENGA_ERROR_NETWORK_ERROR=>'网络通信发生错误',
        self::SEVENGA_ERROR_APP_KEY_INVALID=>'该用户未授权接入（AppKey无效）',
        self::SEVENGA_ERROR_NO_SIM=>'未检测到SIM卡',
        self::SEVENGA_ERROR_SERVER_ERROR=>'服务器处理发生错误，请求无法完成',
        self::SEVENGA_ERROR_NOT_LOGINED=>'未登录',
        self::SEVENGA_ERROR_USER_CANCEL=>'用户取消',
        self::SEVENGA_ERROR_BUSINESS_SYSTEM_UNCHECKED=>'业务系统未通过审核',
        self::SEVENGA_ERROR_SDK_VERSION_INVALID=>'SDK版本号无效',
        self::SEVENGA_ERROR_NOT_PERMITTED=>'接口不允许调用',
        self::SEVENGA_ERROR_LOGINTOKEN_INVALID=>'login token 无效',
        self::SEVENGA_ERROR_REQUEST_INVAILD=>'请求无法识别',

        self::SEVENGA_ERROR_ACCOUNT_INVALID=>'账号格式不合法，合法账号为5－30个字符，仅允许字母及数字',
        self::SEVENGA_ERROR_PASSWORD_INVALID=>'密码格式不合法，密码不能为空，长度为5－32个字符，大小写敏感',
        self::SEVENGA_ERROR_LOGIN_FAIL=>'登录失败',
        self::SEVENGA_ERROR_ACCOUNT_NOT_EXIST=>'账号不存在或者停用',
        self::SEVENGA_ERROR_ACCOUNT_PASSWORD_ERROR=>'账号密码错误',
        self::SEVENGA_ERROR_TOO_MUCH_ACCOUNT_REGISTED=>'该手机注册的账号数目已达到上限，无法再注册',
        self::SEVENGA_ERROR_REGIST_FAIL=>'注册失败',
        self::SEVENGA_ERROR_ACCOUNT_HAS_EXIST=>'该账号已经被注册',
        self::SEVENGA_ERROR_VERIFY_ACCOUNT_FAIL=>'账号验证失败',
        self::SEVENGA_ERROR_PARAM_INVALID=>'参数无效',
        self::SEVENGA_ERROR_IGNORE_CONTACT_LIST=>'相同的通讯录已经上传，忽略此次上传',
        self::SEVENGA_ERROR_DEVICE_NEVER_LOGINED=>'该设备没有登录过用户',
        self::SEVENGA_ERROR_DEVICE_CANNOT_AUTO_LOGIN=>'该设备不能自动登录',
        self::SEVENGA_ERROR_ACCOUNT_PRESERVED=>'账号无效（可能被保留）',
        self::SEVENGA_ERROR_AUTO_LOGIN_SIGN_INVALID=>'自动登录凭据失效，请重新输入密码登录',
        self::SEVENGA_ERROR_EMAIL_FORMAT_ERROR=>'邮箱格式错误',
        self::SEVENGA_ERROR_EMAIL_DUP=>'邮箱已注册',
        self::SEVENGA_ERROR_EMAIL_NOT_FOUND_ERROR=>'邮箱未注册',
        self::SEVENGA_ERROR_USER_EMAIL_HAS_BOUND=>'邮箱已绑定，请勿重复绑定', 

        self::SEVENGA_ERROR_NICKNAME_INVALID=>'昵称不合法，合法昵称由1－20个非空字符构成，请勿使用敏感词汇',

        self::SEVENGA_ERROR_NEW_PASSWORD_INVALID=>'新密码格式非法，密码不能为空，长度为5－32个字符，大小写敏感',
        self::SEVENGA_ERROR_OLD_PASSWORD_INVALID=>'旧密码格式非法，不能为空',
        self::SEVENGA_ERROR_OLD_PASSWORD_ERROR=>'原密码错误',

        self::SEVENGA_ERROR_PERMISSION_NOT_ENOUGH=>'权限不足',

        self::SEVENGA_ERROR_BALANCE_NOT_ENOUGH=>'余额不足，无法支付',
        self::SEVENGA_ERROR_ORDER_SERIAL_DUPLICATE=>'订单号重复',
        self::SEVENGA_ERROR_ORDER_SERIAL_SUBMITTED=>'订单已提交',

        self::SEVENGA_ERROR_PAY_FAILED=>'支付失败',
        self::SEVENGA_ERROR_PAY_CANCELED=>'取消支付',

        self::SEVENGA_ERROR_PAY_ORDER_NOT_EXIST=>'无此订单',
        self::SEVENGA_ERROR_PAY_ORDER_VERIFY_INVALID=>'订单验证无效',
        self::SEVENGA_ERROR_PAY_ORDER_VERIFY_TIMEOUT=>'订单验证超时',
        self::SEVENGA_ERROR_PAY_ORDER_NOT_BY_TUITUIER=>'该订单不是由推推客代充',  
        self::SEVENGA_ERROR_PAY_REQUEST_TIMEOUT=>'支付超时，请稍候重试',
        self::SEVENGA_ERROR_VG_PRODUCT_ID_INVALID=>'虚拟商品ID无效',

        self::SEVENGA_ERROR_VG_ORDER_FAILED=>'获取虚拟商品订单号失败',
        self::SEVENGA_ERROR_VG_BACK_FROM_RECHARGE=>'退出充值界面（购买游戏币虚拟商品时）',

        self::SEVENGA_ERROR_HIGH_FREQUENT_OPERATION=>'操作过于频繁',
        self::SEVENGA_ERROR_3RD_AUTH_FAILED=>'验证第三方账号授权失败',
        self::SEVENGA_ERROR_3RD_REAUTH_FAILDED=>'验证第三方绑定信息失败',

        self::SEVENGA_ERROR_CP_SERVER_REQUEST_FORMAT_ERROR=>'请求格式有误，请检查sign',
        self::SEVENGA_ERROR_CP_SERVER_REQUEST_LOGIN_TOKEN_ERROR=>'用户token无效',
        self::SEVENGA_ERROR_CP_SERVER_REQUEST_ORDER_ERROR=>'订单错误',

        self::SEVENGA_ERROR_CP_SERVER_CONNECT_ERROR=>'cp服务器连接失败',
        self::SEVENGA_ERROR_CP_SERVER_RESPONSE_ERROR=>'cp服务器返回错误',

        self::SEVENGA_ERROR_QIDIAN_PAY_SIG_ERROR=>'起点支付验证失败',

        self::SEVENGA_ERROR_ALREADY_IS_FORMAL_USER=>'用户已经为正是用户', 
        self::SEVENGA_ERROR_PAY_ORDER_NOT_PAY=>'订单未支付',         /**< 订单验未支付*/
        self::SEVENGA_ERROR_PARAM_NOT_ENOUGH=>'参数不足',
        self::SEVENGA_ERROR_EMAIL_SEND_ERROR=>'邮件发送失败',
        self::SEVENGA_ERROR_HUANXIN_REGIST_FAIL=>'环信注册失败',
        self::SEVENGA_ERROR_APP_NOT_ONLINE=>'应用未审核通过',
        self::SEVENGA_ERROR_PHONE_EXIST=>'手机已被绑定',
        self::SEVENGA_ERROR_PHONE_FORMAT_EROOR=>'手机号格式不对',
        self::SEVENGA_ERROR_PHONE_SEND_CODE_FAIL=>'发送验证码失败',
        self::SEVENGA_ERROR_PHONE_HAVE_SENT_CODE=>'验证码已发送',
        self::SEVENGA_ERROR_PHONE_CODE_INVALID=>'验证码无效',
        self::SEVENGA_ERROR_PHONE_CODE_EXPIRED=>'验证码已过期',
        self::SEVENGA_ERROR_PHONE_UNBIND=>'手机未绑定',
        self::SEVENGA_ERROR_UPLINK_CODE_FORMAT_ERROR=>'上行验证码格式有误',
        self::SEVENGA_ERROR_PHONE_PARAM_ERROR=>'上行验证码回调参数错误',
        self::SEVENGA_ERROR_UPLINK_CODE_INVALID=>'上行验证码无效',
        self::SEVENGA_ERROR_PAY_ORDER_HAS_FINISHED=>'订单已完成',
    );

    public static function getErrorMessage($errorCode) {
        return isset(self::$errorMessages[$errorCode])?self::$errorMessages[$errorCode]:"";
    }

}


$a  = new RestError;
$r = new ReflectionClass($a);

// $doc = $r->getDocComment();
// print_r($doc);

$const =($r->getConstants());
// print_r($const);

$const_keys = array_keys($const);
// print_r($const);
$msg_const = $a->errorMessages;
// print_r($msg_const);


array_map(function($key,$key2) use ($msg_const){

    // print_r($key);
    if(!isset($msg_const[$key])){
        echo 'self::',$key2,'=>',$key,',',PHP_EOL;
    }

},$const,$const_keys);

/*foreach ($const as $key => $value) {
    # code...
    # 
    // echo $key;
    if()
*/
// Zend_Debug::dump($r->getConstants(), "Constants");
// Zend_Debug::dump($r->getProperties(), "Properties");
// Zend_Debug::dump($r->getMethods(), "Methods"); 