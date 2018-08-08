<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
      
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="f1">
            <input type="submit" name="fu" value="upload">
            
         
        </form>
        
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
    </body>
</html>
