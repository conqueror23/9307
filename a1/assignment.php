<html>
    <body>
        <form method="post", action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Amount of Mortage: <input type="float" name="amount_of_mortage"><br>
            Interest Rate:<input type="float" name="interest_rate"><br>
            Number of Years:<input type="float" name="number_of_years"><br>
            <input type="submit">
        </form>
        Monthly Payment: <?php 
                               function delete_space($str){
                                   $str = trim($str);#delete the 
                                   $str = preg_replace("( )","",$str);# 
                                   $str = preg_replace("/[^0-9.-]/","",$str);
                                   return floatval($str);
                               };
        # to delete the white spaces

                               
                               function _post($str){
                                   $val=isset($_POST[$str])?$_POST[$str]:null;
                                   return ($val);
                               };
        #to eliminate the notices  
        
         $loan=delete_space(_post("amount_of_mortage"));
         $rate=(float)delete_space(_post("interest_rate"))/12;
         $payment_num=(float)delete_space(_post("number_of_years"))*12;
         if($rate ==0 or $payment_num==0 ){
            echo "Interest Rate and Number of years can not be ZERO~!";
         }else {
             @$monthly_pay=$loan*$rate/(1-(1/(1+$rate)**$payment_num));
             echo "$monthly_pay";
         };?>
    </body>
</html>