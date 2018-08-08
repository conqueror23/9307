<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
     /*
            $withempty = " sdfsdf   ss ss     ssf s s  s   ";
            echo   "<pre>$withempty</pre> " ;
            $withtrim = trim($withempty);
            echo "<pre>$withtrim</pre><br>";

          // $withreg = preg_replace('')



            echo "<br>";
            $withempty = trim($withempty);
            echo "<pre>$withempty</pre>";
            $withempty0 = preg_replace('/\s(?=\s)/', '',$withempty);
           echo "<br>";
            echo "<pre>$withempty0</pre>";
             echo "<br>";
            $withempty1 = preg_replace('/[\n\r\t]/', '',$withempty0);
            echo "<pre>$withempty1</pre>";
        */    //get ride of space
        /*
            $double = function($a){
                    return $a * 2;
                };
                // This is our range of numbers
                $numbers = range(1, 5);

                // Use the closure as a callback here to
                // double the size of each element in our
                // range
                $new_numbers = array_map($double, $numbers);

                print implode('+', $new_numbers);

         */ //clousure in PHP

        $mortgageErr=$rateErr=$payment_numErr= "";
         function no_space($str){
                                   $str = trim($str);#delete the
                                   $str = preg_replace("/\s(?=\s)/","",$str);
                                   $str = preg_replace("/[\n\r\t]/","",$str);
                                   $str = preg_replace("/[^0-9]/","",$str);
                                   return val($str);
                               };
        if ($_SERVER["REQUEST_METHOD"]== "POST"){
            if (empty($_POST["mortgage"])){
                $mortgageErr = "An mortgage is required";
            } else {
                $mortgage= no_space($_POST["mortgage"]);
            }
              if (empty($_POST["interest_rate"])){
                $rateErr = "An rate is required";
            } else {
                $interest_rate = no_space($_POST["interest_rate"]/12);
            }
              if (empty($_POST["years"])){
                $payment_numErr = "A number of years is required";
            } else {
                $payment_num = no_space($_POST["years"]/12);
            }
            $mortgage = $_POST["mortgage"];
            $payment_num= $_POST["payment_number"]*12;
            $monthly_pay = $mortgage*$interest_rate/(1-(1/(1+$interest_rate)**$payment_num));
            return $monthly_pay;
        }
          //calculate the monthly payment

         ?>
        <h1>Monthly mortgage's calculation </h1>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <table>
                <tr>
                    <th>
                        <img src="mortgage.jpg" style="height: 100px;width: 100px">
                    </th>
                    <th>
                        <img src="interest rate.jpg" style="height: 100px;width: 100px">
                    </th>
                    <th>
                        <img src="years1.jpg" style="height: 100px;width: 100px">
                    </th>

                </tr>
                <tr>
                    <td>
                        <input type="text" name="mortgage"> <span class="error"><?php echo $mortgageErr ?></span>
                    </td>
                     <td>
                         <input type="text" name="interest_rate"><span class="error"><?php echo $rateErr ?></span>
                    </td>
                     <td>
                         <input type="text" name="years"><span class="error"><?php echo $payment_numErr ?></span>
                    </td>
                     <td>
                         <input type="submit">
                    </td>
                <tr>
                    <td>
                        <?php echo "$monthly_pay" ?>
                    </td>

                </tr>
                </tr>
            </table>
        </form>
    </body>
</html>
