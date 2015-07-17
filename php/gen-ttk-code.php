<?php
    $host = '123.57.5.12';
    $user = 'root';
    $pwd = 'Sevenga1217';
    $dbname = 'sevenga_tuitui';
    // function get_colume($host,$user,$pwd,$dbname)
    // {
        // =======================================================================================================================================
        // $debug= false;
        $sh = @mysql_connect($host,$user,$pwd) or die('fail db');
        mysql_select_db($dbname);
        // if($debug){
            var_dump($sh);
        // }
        // $q = 'show tables';
        // $res = mysql_query($q);
        // $_tables = array();
        // while($row = mysql_fetch_assoc($res))
        // {
        //     if($debug)
        //         var_dump($row);
        //     $q = 'show columns from '.$row['Tables_in_'.$dbname];
        //     $table_columns = mysql_query($q);
        //     $_tables[$row['Tables_in_'.$dbname]] = get_table_info($row['Tables_in_'.$dbname]);
        // }
        // mysql_close($sh);
        // return $_tables;
    
       
    // }