<?php

$a = '{"discount":"0.00","payment_type":"1","subject":"\u63a8\u63a8\u5e01","trade_no":"2015080300001000940059175442","buyer_email":"506433592@qq.com","gmt_create":"2015-08-03 17:02:23","notify_type":"trade_status_sync","quantity":"1","out_trade_no":"tuituib2455bf2e1739a957840849510000","seller_id":"2088311056362702","notify_time":"2015-08-04 02:26:09","body":"1 \u63a8\u63a8\u5e01","trade_status":"WAIT_BUYER_PAY","is_total_fee_adjust":"Y","total_fee":"1.00","seller_email":"ali@sevenga.com","price":"1.00","buyer_id":"2088802502779941","notify_id":"f25dbc3addcd7896815399b65cab226878","use_coupon":"N","sign_type":"RSA","sign":"iJpm2dUvp9G8Mqyt7Q5ZTk6ZmJQ9TpsDp15DbKPiNRi7iU0fIIAnA+rvnu\/41ggEcjLXdgtmOQRdVn0Bj0HGUKPAtup4jUbziZLAIhHtfG20K7nHpj4KY2\/wIMk9tNsGjY0xnt2lO0c2ZRuAd\/Ef26jNrmk58Xw+zpDmh+1AmFw="}';
$a = json_decode($a,1);
echo http_build_query($a);