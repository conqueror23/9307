
        <?php
            echo "Monthly payment Calculation";
            $mortgageErr=$rateErr=$payment_numErr=$monthly_pay="";
            $interest_rate=$payment_num=$mortgage=$payment_num1=$interest_rate1="";
             function no_space($str){
                                       $str = trim($str);#delete the 
                                       $str = preg_replace("/\s(?=\s)/","",$str); 
                                       $str = preg_replace("/[\n\r\t]/","",$str);
                                       return $str;
                                       
            };
            if ($_SERVER["REQUEST_METHOD"]== "POST"){
                if (empty($_POST["mortgage"])){
                    $mortgageErr = "An mortgage is required";
                } else {
                    $mortgage= no_space($_POST["mortgage"]);             
                };
                if (empty($_POST["interest_rate"])){
                    $rateErr = "An rate is required";
                } else {
                    $interest_rate = no_space($_POST["interest_rate"])/12;             
                };
                if (empty($_POST["years"])){
                    $payment_numErr = "A number of years is required";
                } else {
                    $payment_num = no_space($_POST["years"])*12;             
                };
                
  
                 
               
                $monthly_pay = $mortgage*$interest_rate/(1-(1/(1+$interest_rate)**$payment_num));
                
                $interest_rate1=$interest_rate*12;
                $payment_num1=$payment_num/12;  
             echo "The mortgate is :$mortgage <br>";
             echo "The interest rate is :$interest_rate1<br>";
             echo "The payment years is :$payment_num1<br>";
             echo "The monthly payment should be $monthly_pay";
             
                };
         ?>
     