<?php
$dir = '.';
// if (is_dir($dir)) {
//     if ($dh = opendir($dir)) {
//         while (($file = readdir($dh)) !== false) {

//             // echo $file;
//             echo "filename: $file : filetype: " . filetype($dir . $file) . "\n";
//         }
//         closedir($dh);
//     }
// }
$dd = scan_dir($dir);
// print_r($dd);

// touch('./html/.gitignore');
function scan_dir($dir='.',$callback=''){
    if(is_dir($dir)){
        $_d = array_diff(scandir($dir),array('.','..','.git'));
        if(empty($_d)){
            echo $_fname =  $dir.DIRECTORY_SEPARATOR.'.gitignore',PHP_EOL;
            // touch($_fname);
            return ;
        }
        foreach ($_d as $key => $value) {
            $_newdir = $dir.DIRECTORY_SEPARATOR.$value;
            if(!is_dir($_newdir)){
                continue;
            }
            scan_dir($_newdir);            
        }
    }

}
