<?php
    // a simple foreach() to traverse the SPL class names
    $a = spl_classes();
    // spl_
    var_dump($a);
    foreach($a  as $key=>$value)
    {
        // echo $key, ' : ',$value,PHP_EOL;
    }

    var_dump($a = new DirectoryIterator('.'));

    foreach ($a as $file) {
        // echo $key, ' : ',$value,PHP_EOL;
        var_dump($file);
    }