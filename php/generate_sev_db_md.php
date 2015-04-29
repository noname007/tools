<?php
    @$sh = mysql_connect('xxx','xxxx','xxxxx') or die('fail db');
    $dbname = 'sevenga_tuitui';
    mysql_select_db($dbname);
    $q = 'show tables';
    $res = mysql_query($q);
    $_tables = array();
    while($row = mysql_fetch_assoc($res))
    {
        $q = 'show columns from '.$row['Tables_in_sevenga_tuitui'];
        $table_columns = mysql_query($q);
        $_tables[$row['Tables_in_sevenga_tuitui']] = get_table_info($row['Tables_in_sevenga_tuitui']);
    }
    // var_dump($_tables);
    echo generate_md($_tables);
// =======================================================================================================================================
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

    function generate_md(&$tables)
    {
        $MD = '';
        foreach ($tables as $tbl_name => $value) {
$MD .= <<<MD

$tbl_name
-
|$tbl_name||
|-----------|----|

MD;
            foreach ($value['c'] as $v) {
$MD .=<<<MD
|$v||

MD;
            }

            $MD .= "\n\t 主键(`".join($value['pk'],'`,`')."`)\n";
        }
        return $MD;
    }