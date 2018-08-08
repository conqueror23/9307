<html>
    <head>
    </head>
    <body>
       <form method="post", action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
           Enter the number:<input type="string" name="num"><br>
           <input type="submit" name="submit1">
        </form>
        <?php
            function romanize($num) {
              $n = intval($num);
            $result = '';
            $lookup = array('M' => 1000, 'CM' => 900, 'D' => 500,
                            'CD' => 400, 'C' => 100, 'XC' => 90,
                            'L' => 50, 'XL' => 40,'X' => 10,
                            'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);   
           foreach ($lookup as $roman => $value) {
               $matches = intval($n / $value);
               $result .= str_repeat($roman, $matches);
               $n = $n % $value;
                }
             return $result; };
        function clean_input($str){
                                   $str = trim($str);#delete the
                                   $str = preg_replace("( )","",$str);#
                                   $str = preg_replace("/[^0-9.-]/","",$str);
                                   return floatval($str);
                               };
        if(isset($_POST["submit1"])){
            $input_num = $_POST["num"];
            $input_num_clean = clean_input($input_num);
            $output_roman = romanize($input_num_clean);
            echo "the result: ".$output_roman;
        }
        ?>
    </body>
</html>
