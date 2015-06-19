<?php
    function get_colume($host,$user,$pwd,$dbname)
    {
        // =======================================================================================================================================
        $debug= false;
        $sh = @mysql_connect($host,$user,$pwd) or die('fail db');
        mysql_select_db($dbname);
        if($debug){
            var_dump($sh);
        }
        $q = 'show tables';
        $res = mysql_query($q);
        $_tables = array();
        while($row = mysql_fetch_assoc($res))
        {
            if($debug)
                var_dump($row);
            $q = 'show columns from '.$row['Tables_in_'.$dbname];
            $table_columns = mysql_query($q);
            $_tables[$row['Tables_in_'.$dbname]] = get_table_info($row['Tables_in_'.$dbname]);
        }
        mysql_close($sh);
        return $_tables;
    
       
    }
    function get_table_info($tablename){
        $q = 'show columns from '.$tablename;
        $res = mysql_query($q);
        while($row = mysql_fetch_assoc($res))
        {
            if(empty($row['Key']))
            {   
                $field_name['columns'][]= $row['Field'];
            }
            else{
                $field_name['pk'][]= $row['Field'];
            }
            $field_name['c'][]= $row['Field'];
        }
        return $field_name;
    }
    /*
    
     */
    $db1 = 'sevenga_tuitui';
    // $db1 = 'xianshang';
    $db2 = 'yunshi';
    $test = (get_colume('123.57.5.12','root','Sevenga1217',$db1));
    $test1 = (get_colume('123.57.5.12','root','Sevenga1217',$db2));
    // get_table_info();
    // get_table_info('dfadee');
    // $luzheqi_sql = (get_colume('192.168.1.129','demo','111111',$db2));
    // var_dump($luzheqi_sql);
    echo 'diff ',$db1,'...',$db2,PHP_EOL;
    function cmp(&$db1,&$db2){
        // 共有
        $db1_keys = array_keys($db1);
        // 增加
        $db2_keys = array_keys($db2);
        // if($debug){
            // var_dump($db2_keys);
            // var_dump($db1_keys);
        // }
        // 删除
        // $temp = $db2;
        // $delete = array();
        // $add = array();
        $common = array_intersect($db2_keys,$db1_keys);
        $del = array_diff($db1_keys, $db2_keys);
        $add = array_diff($db2_keys, $db1_keys);
       // var_dump($common,$del,$add);
       // exit;
        // foreach ($db1_keys as $key => $value) {
        //     if(in_array($value,$db2_keys)){
        //         unset($db2[$value]);
        //     }else{
        //         $delete[] = $value;
        //         unset($db1[$value]);
        //     }
        // }
        // $db1_keys = array_keys($db1);
        // $db2_keys = array_keys($db2);
        // var_dump($db1);
        // exit;

        // var_dump($delete);
        // var_dump($db1_keys);
        // var_dump($db2_keys);
        // join,implode
        echo '删除了'.count($del).'张表:'.join(',',$del).PHP_EOL;
        echo '增加了'.count($add).'张表:'.join(',',$add).PHP_EOL;
        echo '共有表：'.count($common).'张'.PHP_EOL.join(',',$common).PHP_EOL;

        // exit;

        // $db2 = $temp;

        // 分析共有表的字段
        echo '分析共有表的字段情况:'.PHP_EOL.PHP_EOL;

        foreach ($common as $key => $value) {
            $f = function($t1,$t2,$tn){
                // var_dump($t1,$t2);
                $com = array_intersect($t1,$t2);
                $del = array_diff($t1,$t2);
                $add = array_diff($t2,$t1);
                // exit;
                // foreach ($t1 as $key => $value) {
                //     if(in_array($value,$t2)){
                //         unset($t2[$key]);
                //     }else{
                //         $d[] = $value;
                //         unset($t1[$key]);
                //     }
                // }
                if(count($del)==0 && count($add) == 0){
                    // echo '表',$tn,"分析的情况:".PHP_EOL;
                    // echo '两个表相同',PHP_EOL;
                }else{
                    echo '表',$tn,"分析的情况:".PHP_EOL;
                    echo '   添加的字段:',join(',',$add),',删除的字段:',join(',',$del),PHP_EOL;
                    // ,'相同的字段:',join(',',$t1);
                }
                // exit;
                return array('del'=>$del,'add'=>$add,'common'=>$com);
            };
            
            $res[$value] = $f($db1[$value]['c'],$db2[$value]['c'],$value);
            // var_dump($res);
            // exit;
            // if(coun)
        }

        return $res;
    }
    cmp($test,$test1);