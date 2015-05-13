# 获取游戏访问 check_user 接口的请求数据
cat application.log |sed -n '/check_user/,/API_RESPONSE/p'|sed  -n  '/REQUEST]/,/)/p'|php ../Readfromconsole.php
# 获取游戏访问 check_order 接口的请求数据
cat application.log |sed -n '/check_order/,/API_RESPONSE/p'|sed  -n  '/REQUEST]/,/)/p'|php ../Readfromconsole.php
# -e '/API_RAW_REQUEST]/,/)/d'删除多行。获取游戏访问  set_game_info 接口的请求数据
cat application.log |sed -n '/set_game_info/,/API_RESPONSE/p'|sed  -n  '/API_REQUEST_DATA]/,/)/p'|php ../Readfromconsole.php
cat application.log |sed -n '/create_order/,/API_RESPONSE/p'|sed  -n  '/API_REQUEST_DATA]/,/)/p'|php ../Readfromconsole.php
cat application.log |sed -n '/login/,/API_RESPONSE/p'|sed  -n  '/API_REQUEST_DATA]/,/)/p'|php ../Readfromconsole.php
cat application.log |sed -n '/check_update/,/API_RESPONSE/p'|sed  -n  '/API_REQUEST_DATA]/,/)/p'|php ../Readfromconsole.php


#不同游戏访问三个接口的统计
cat application.log |sed -n '/check_user/,/API_RESPONSE/p'|sed  -n  '/REQUEST]/,/)/p'|sed -n '/app_id/,/channel_id/p'|sort |uniq -c
cat application.log |sed -n '/check_order/,/API_RESPONSE/p'|sed  -n  '/REQUEST]/,/)/p'|sed -n '/app_id/,/channel_id/p'|sort |uniq -c
cat application.log |sed -n '/set_game_info/,/API_RESPONSE/p'|sed  -n  '/API_REQUEST_DATA]/,/)/p'|grep -E 'app_id|game_server|channel_id'
 
#查看create_order里面的product_name参数是否为空
cat application.log |sed -n '/create_order/,/API_RESPONSE/p'|sed  -n  '/API_REQUEST_DATA]/,/)/p'|sort |uniq -c


sudo sed  -i 's/20006/20004/' ../Readfromconsole.php

