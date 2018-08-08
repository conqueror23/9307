<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Car Tradings</title>
    </head>
    <body>
        <?php
        $i="";
        echo "<h2>Available Cars</h2>";
       //display all car in txt here to help buyer to see all
       $directory=fopen("directory.txt", "r") or die("files does not exist");
       //fread($directory, filesize("directory.txt") );
       echo "<table border='1'>";
       if($directory){
           while (!feof($directory)){
               $line=fgets($directory);
               $row = explode(",",$line);
               echo "<tr>";
               for($n=0;$n<5;$n++)
               {
                    if (isset($row[$n])){
                   echo "<td>$row[$n]</td>";
                    }
               }
               echo "</tr>";
              }
              /* print_r($row[0]);
               echo $row[0];
               
                    for($i=0;$i<count($row);$i++){
                        $string= explode($row, " ,");
                        echo "<td> $string </td>";

                    }
                   
                * 
                */
                }
                fclose($directory);
                echo "</tr> </table>";
                $txt ="";
 //seller
        # mail validation funciton 
        function validate_email($address){
            if(!preg_match('/^[a-z0-9_-][a-z0-9._-]+@([a-z0-9][a-z0-9]*\.)+[a-z]{2,6}$/i',$address)){
                echo "wrong email address";
            }
        } 
        # input data into txt
        //if($_SERVER["REQUEST_METHOD"]=="POST")
        //{
        
        //}
       
        ?>
        <h2>Details of Car For Sales</h2>
        <table border="1">
            <form method="POST" action="seller.php">
                <tr>    
                <td>
                    Names
                </td>
                <td>
                    <input type="text" name="Cust_Name">
                </td>
            </tr>
                        <tr>
                <td>
                    Phone
                </td>
                <td>
                    <input type="text" name="Cust_Phone">
                </td>
            </tr>
            <tr>
                <td>
                    Email-address
                </td>
                <td>
                    <input type="text" name="Cust_email">
                </td>
            </tr>
            <tr>
                <td>
                    Characteristic of car
                </td>
            <tr>
                <td>
                   Car Price: 
                </td>
                <td>
                   <input type="text" name="Car_Price">
                </td>
            </tr>
            <tr>
                <td>
                    Car Plate:
                </td>
                <td>
                    <input type="text" name="Car_Plate">
                </td>
            </tr>
                
            </tr>
              <td>
                    Details of car
                </td>
                <tr>
                    <td>
                   Kilos of Car:     
                    </td>
                <td>
                   <input type="text" name="Car_Kilo">
                   
                   
                </td>    
                </tr>
                <tr>
                    <td>
                        Number of Owners:
                    </td>
                    <td>
                        <input type="text" name="Car_Owners">
                    </td>
                </tr>
            </tr>
            <tr>
                <td>
                    Confirm to sale:
                </td>
                <td>
                    <input type="submit" value="upload for sale">                    
                </td>

            </tr>
            </form>
        </table>    
            record in directory.txt
            <br>    
            
            <form method="POST" action="buyer.php">
                <table border="0">
                    <tr>
                        <td>
                        Plate Number:<input type="txt" name="Plate_number">
                       
                        </td>
                        
                    <td>
                        <input type="submit" value="interested">
                    </td>
                </table>
            </form>
        
    </body>
</html>
