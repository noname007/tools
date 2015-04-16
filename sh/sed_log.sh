# sed -n '/get_unread_notice_count/,/API_RAW_REQUEST_URL/{p;=}' 1.log>1111.log
# sed -n '/get_unread_notice_count/,/API_RESPONSE/{p;=}' 1.log>1111.log
# a=('set_game_info' 'check_user' 'check_order')
# log_dir='log'
# for (( i = 0; i < ${#a[@]}; i++ )); do
#     echo ${a[$i]};
#     # echo "${a[$i]}"
#     res=`sed -n "/${a[$i]}/,/API_RESPONSE/{p;=}" 1.log | sed -n "/app_id/p"|sort -k 3|uniq -c`;
#     echo $res>$log_dir/${a[$i]}.log
# done

# a=('set_game_info' 'check_user' 'check_order')
# log_dir='log'
# for (( i = 0; i < ${#a[@]}; i++ )); do
#     echo ${a[$i]};
#     res=`sed -n "/${a[$i]}/,/API_RESPONSE/{p;=}" application.log | sed -n "/'app_id'/p"|uniq -c|sort -k 3`;
#     echo $res>$log_dir/${a[$i]}.log
# done

for api in 'set_game_info' 'check_user' 'check_order'; do
   sed -n "/$api/,/API_RESPONSE/{p;=}" 1.log | sed -n "/'app_id'/p"|uniq -c|sort -k 3 >log/$api.log
done