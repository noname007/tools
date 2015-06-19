<?php
    // date_default_timezone_set('prc');
    require __DIR__.'/Calender.php';
    // echo time();
    // 
    // echo mktime(0,0,0),PHP_EOL;
    // date('Y-m-d ')
    $d2015_6_19 = 1434643200;
    // echo 
    $day_interval = floor((time()-$d2015_6_19)/(24*3600));
    $_duty = ['白','大','小','休'];
    function get_duty_type($day_interval){
        return ($day_interval % 4 + 4) %4;
    }

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>上班时间</title>
<script language="javascript" type="text/javascript">
<!--
//获得当前时间,刻度为一千分一秒
var initializationTime=(new Date()).getTime();
function showLeftTime()
{
    var now=new Date();
    var year=now.getFullYear();
    var month=now.getMonth()+1;
    var day=now.getDate();
    var hours=now.getHours();
    var minutes=now.getMinutes();
    var seconds=now.getSeconds();
    var html = document.all.show.innerHTML;
    // alert(html);
    document.all.show.innerHTML  =""+year+"年"+month+"月"+day+"日 "+hours+":"+minutes+":"+seconds+" ";
    var timeID=setTimeout(showLeftTime,1000);
}
</script>
</head>
<body onload="showLeftTime()">
<label id="show">显示时间的位置</label>
<br/>
<label style="color:#FF00FF;font-size: 50px"><?=$_duty[get_duty_type($day_interval)]?></label>
</body>
</html>

<?php
    $calc=new Calendar();

    $day_interval = (($calc->get_1st_day_timestamp() - $d2015_6_19)/(24*3600));
    $calc->set_duty_type(get_duty_type($day_interval));
    $_duty = ['<font size="2px">白</font>','<font size="2px">大</font>','<font size="2px">小</font>','<font size="2px" color="red">休</font>'];
    $calc->set_duty_type_content($_duty);
    $calc->showCalendar();
?>