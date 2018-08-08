<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript">
            
           function change_text(content){
                content.innerHTML='Calculation';
            }
            
            function change_border(tu){
                tu.border:1;
                
            }
            
        </script>
        
    </head>
    <body>
        <?php

            $mortgageErr=$rateErr=$payment_numErr=$monthly_pay="";
            $interest_rate=$payment_num=$mortgage=$payment_num1=$interest_rate1="";
             function no_space($str){
                                       $str = trim($str);#delete the 
                                       $str = preg_replace("/\s(?=\s)/","",$str); 
                                       $str = preg_replace("/[\n\r\t]/","",$str);
                                       $str = preg_replace("/[^0-9]/","",$str);
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
                
  
                 
                //$mortgage = $_POST["mortgage"];
                //$payment_number= $_POST["payment_number"]*12;
                $monthly_pay = $mortgage*$interest_rate/(1-(1/(1+$interest_rate)**$payment_num));
                
                $interest_rate1=$interest_rate*12;
                $payment_num1=$payment_num/12;  
              //calculate the monthly payment
             
                };
         ?>
        <h1 id="header" onclick="change_text(this)">Monthly mortgage's calculation </h1>
        
        <form  method="POST">
            <table border="1">
                <tr>
                    <th>
                        <img src="mortgage.jpg" style="height: 100px;width: 150px" onclick="change_pic(this)">
                    </th>
                    <th>
                        <img src="interest rate.jpg" style="height: 100px;width: 150px">
                    </th>
                    <th>
                        <img src="years1.jpg" style="height: 100px;width: 150px">
                    </th>
             
                </tr>
                <tr>
                    <td>
                        Mortgage:<input type="text" name="mortgage" value="<?php echo $mortgage ?>"><span class="info"></span> 
                        <span class="error"><?php echo $mortgageErr ?></span>
                    </td>
                     <td>
                         Interest rate:<input type="text" name="interest_rate" value="<?php echo $interest_rate1 ?>"><span class="error"><?php echo $rateErr ?></span>
                    </td>
                     <td>
                         Years:<input type="text" name="years" value="<?php echo $payment_num1 ?>"><span class="error"><?php echo $payment_numErr ?></span>
                    </td>
                     <td>
                         <input type="submit">
                    </td>
                <tr>
                    <td>
                        The Monthly payment should be:
                    </td>
                    <td>
                        <?php    echo "$monthly_pay" ?>
                    </td>
                    
                </tr>
                </tr>
            </table>
        </form>
    </body>
</html>
