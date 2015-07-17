<?php
      // $array = [0, 1, 2];
      // $ref =& $array; // Necessary to trigger the old behavior
      // foreach ($array as $val) {
      //     var_dump($val);
      //     unset($array[1]);
      // }
      // var_dump($ref);

      //   $array = [0];
      // foreach ($array as &$val) {
      //     var_dump($val);
      //     $array[1] = 1;
      // }
 function foo($x) {
          $x++;
          var_dump(func_get_arg(0));
      }
      foo(1);
echo $i = 0761;
var_dump( -10 >> 64); 