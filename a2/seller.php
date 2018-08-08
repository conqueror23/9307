<?php

 $txt ="";
 //seller
        # mail validation funciton 
        function validate_email($address){
            return preg_match('/^[a-z0-9_-][a-z0-9._-]+@([a-z0-9][a-z0-9]*\.)+[a-z]{2,6}$/i',$address);
            }
        
        
       
        # input data into txt
        //if($_SERVER["REQUEST_METHOD"]=="POST")
        //{
            if(filter_var($_POST["Cust_email"],FILTER_VALIDATE_EMAIL)){
                $sellerfile=fopen("directory.txt","a+" ) or die("file does not exist");
                $txt.="\r\n";
                $txt.="$_POST[Cust_Name],";
                $txt.="$_POST[Cust_Phone],";
                $txt.="$_POST[Cust_email],";
                $txt.="$_POST[Car_Price],";
                $txt.="$_POST[Car_Plate],";
                $txt.="$_POST[Car_Kilo],";
                $txt.="$_POST[Car_Owners]";
                file_put_contents("directory.txt", $txt,FILE_APPEND);
               
                fclose($sellerfile);
                echo "record uploaded";
                echo "<a href='http://localhost/a2/index.php'>Home page</a>";
        } else {
             echo "wrong email address<br>";
                echo"<a href='http://localhost/a2/index.php'>Home page</a>";
}
        

?>

