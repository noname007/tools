# sed -n '/get_unread_notice_count/,/API_RAW_REQUEST_URL/{p;=}' 1.log>1111.log
# sed -n '/get_unread_notice_count/,/API_RESPONSE/{p;=}' 1.log>1111.log
# a=('set_game_info' 'check_user' 'check_order')
# log_dir='log'
# for (( i = 0; i < ${#a[@]}; i++ )); do
#     echo ${a[$i]};
#     # echo "${a[$i]}"
#     res=`sed -n "/${a[$i]}/,/API_RESPONSE/{p;=}" 1.log  |  sed -n "/app_id/p" | sort -k 3 | uniq -c`;
#     echo $res>$log_dir/${a[$i]}.log
# done

# a=('set_game_info' 'check_user' 'check_order')
# log_dir='log'
# for (( i = 0; i < ${#a[@]}; i++ )); do
#     echo ${a[$i]};
#     res=`sed -n "/${a[$i]}/,/API_RESPONSE/{p;=}" application.log  |  sed -n "/'app_id'/p" | uniq -c | sort -k 3`;
#     echo $res>$log_dir/${a[$i]}.log
# done

for api in 'set_game_info' 'check_user' 'check_order'; do
   #sed -n "/$api/,/API_RESPONSE/{p;=}" -e '/login_token/d' 1.log 
    sed -n "/$api/,/API_RESPONSE/{p;=}" -e '/login_token/d' -e '/API_RAW_REQUEST]/,/)/d' application.log 
    sed -n "/set_game_info/,/API_RESPONSE/{p;=}" -e '/login_token/d' -e '/API_RAW_REQUEST]/,/)/d' application.log 

    cat application.log |sed -n '/set_game_info/,/API_RESPONSE/p'
    cat application.log |sed -n '/check_user/,/API_RESPONSE/p'
    # sed -n "/'app_id'/p" | uniq -c | sort -k 3 >log/$api.log
    # 
    # 统计接口中 各个字段的出现的总次数
    cat application.log |sed -n '/set_game_info/,/API_RESPONSE/p'|sed  -n  '/API_REQUEST_DATA]/,/)/p'|sed -e 's/[()]//' -e '/^$/d' -e '/API_REQUEST_DATA/d'|awk '{print $1}'|sort|uniq -c
    cat application.log |sed -n '/check_user/,/API_RESPONSE/p'|sed  -n  '/REQUEST]/,/)/p'|sed -e 's/[()]//' -e '/^$/d' -e '/REQUEST/d'|awk '{print $1}'|sort|uniq -c
    cat application.log |sed -n '/check_order/,/API_RESPONSE/p'|sed  -n  '/REQUEST]/,/)/p'|sed -e 's/[()]//' -e '/^$/d' -e '/REQUEST/d'|awk '{print $1}'|sort|uniq -c
# 筛选数据
# cat 1.log |  sed -e '/last_read_time/d' -e '/login_token/d' -e '/API_RAW_REQUEST]/,/)/d'

# cat 1.log |  sed -e '/last_read_time/d' -e '/login_token/d' -e '/API_RAW_REQUEST]/,/)/d'  | sed -n  "/get_unread_notice_count/,/API_RESPONSE/p"  | sed -e '/API_RESPONSE/d' -e '/API_/d' -e 's/udid.*/udid/'
cat 1.log |  sed -e '/last_read_time/d' -e '/login_token/d' -e '/API_RAW_REQUEST]/,/)/d' -e '/testing/d' | sed -n  "/get_unread_notice_count/,/API_RESPONSE/p"  | sed -e '/API_RESPONSE/d' -e '/API_/d' -e 's/udid.*/udid/' -e 's/bottom_id.*/bottom_id/' -e 's/tuier_id.*/tuier_id/' -e "s/'//g" -e 's/[()]//' |awk '{print $1,$3}' |sort |uniq -c


cat application.log |sed -n '/check_user/,/API_RESPONSE/p'|sed  -n  '/REQUEST]/,/)/p'|sed -e 's/[()]//' -e '/^$/d' -e '/REQUEST/d'|awk '{print $1}'|sort|uniq -c
# 获取游戏访问 check_user 接口的请求数据
cat application.log |sed -n '/check_user/,/API_RESPONSE/p'|sed  -e  '/API_RESPONSE/d' -e 's/sign.*/sign/' -e 's/login_token.*/login_token/' -e 's/user_id.*/user_id/'
# 获取游戏访问 check_order 接口的请求数据
cat application.log |sed -n '/check_order/,/API_RESPONSE/p'|sed  -e  '/API_RESPONSE/d' -e 's/sign.*/sign/' -e 's/login_token.*/login_token/' -e 's/user_id.*/user_id/'
# -e '/API_RAW_REQUEST]/,/)/d'删除多行。获取游戏访问  set_game_info 接口的请求数据
cat application.log |sed -n '/set_game_info/,/API_RESPONSE/p'|sed  -e  '/API_RESPONSE/d' -e 's/sign.*/sign/' -e 's/login_token.*/login_token/' -e 's/user_id.*/user_id/'



# cat application.log |sed -n '/check_user/,/API_RESPONSE/p'|sed  -n  '/REQUEST]/,/)/p'|sed -e 's/[()]//' -e '/^$/d' -e '/REQUEST/d'|awk '{print $1}'|sort|uniq -c
cat application.log |sed -n '/check_user/,/API_RESPONSE/p'|sed  -n  '/REQUEST]/,/)/p'|sed -n '/app_id/,/channel_id/p'|sort |uniq -c
cat application.log |sed -n '/check_order/,/API_RESPONSE/p'|sed  -n  '/REQUEST]/,/)/p'|sed -n '/app_id/,/channel_id/p'|sort |uniq -c
cat application.log |sed -n '/set_game_info/,/API_RESPONSE/p'|sed  -n  '/API_REQUEST_DATA]/,/)/p'|grep -E 'app_id|game_server|channel_id'

# cat application.log |sed -n '/set_game_info/,/API_RESPONSE/p'|sed  -n  '/API_REQUEST_DATA]/,/)/p'|sed -e 's/[()]//' -e '/^$/d' -e '/REQUEST/d' -e 's/sign.*/sign/' -e 's/login_token.*/login_token/' -e 's/user_id.*/user_id/'|awk '{print $1,$3}'|sort|uniq -c

cat application.log |sed -n '/check_user/,/API_RESPONSE/p'|sed  -n  '/REQUEST]/,/)/p'
cat application.log |sed -n '/check_order/,/API_RESPONSE/p'|sed  -n  '/REQUEST]/,/)/p'
cat application.log |sed -n '/set_game_info/,/API_RESPONSE/p'|sed  -n  '/API_REQUEST_DATA]/,/)/p'

 cat application.log |sed -n '/set_game_info/,/API_RESPONSE/p'|sed  -n  '/API_REQUEST_DATA]/,/)/p'|grep -E 'app_id|game_server|channel_id'|awk '{print $1}'