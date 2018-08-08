<?php
           function do_echo ($echo){
               echo $echo;
               
             }
             function table($s){
                 echo "<table border = '1'>";
                 echo "<td>".$s."</td>";
                 echo "</table>";
             }
             $function  = array (
                 'function1' => 'do_echo',
                 'function2' => 'table'
             );
             echo "<br>";
             call_user_func($function['function1'],'helel');
             call_user_func($function['function2'],'sdfljsldfjlksdjfkl');
            
         ?>
