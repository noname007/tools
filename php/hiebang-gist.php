       * @param $json
         */
+       static function get_sid_from_db()
+       {
+               $sql = "select sid from sociaty where level >=3";
+               $res = getMySql()->executeQuery($sql);
+               $r = array();
+               foreach($res as $v)
+               {
+                       $r[]= $v['sid'];
+               }
+               Log::write(json_encode($r));
+               return $r;
+
+       }
+               