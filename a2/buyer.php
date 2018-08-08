<html>
    <head>
        
    </head>
<?php
$plate="";
$buyerfile= fopen("directory.txt","r") or die("files does not exist");
$buyerread = fread($buyerfile, filesize("directory.txt"));
$row= explode("\n",$buyerread);
    //if($_SERVER["REQUEST_METHOD"]=="POST")
    //{   
    $plate=$_POST['Plate_number'];
     
            for($i=0;$i<count($row);++$i){
                $each_line = explode(",",$row[$i]);  
                if ($each_line[4]==$plate){
                    echo "detail of the car Plate:$each_line[4]<br>";
                    echo "Kilometres of car: $each_line[5] <br>";
                    echo "Number of Owners: $each_line[6] <br>";
                }         
                }
        fclose($buyerfile);
        echo "<br>";
        echo"<a href='http://localhost/a2/index.php'>Home page</a><br>";
        echo "<br>";
    //}
//select the wanted car with the plate 
//put these into a way that can be trace
//fclose($buyerfile)      
?>
<body>
    <form method="POST">
        Plate Number:<input type="text" name="Plate_Number">
        <br>
        Proposed Price:<input type="text" name="Proposed_Price">
         <br>
        Buyer Name:<input type="text" name="Buyer_Name">
         <br>
        Tele Number:<input type="text" name="Tele_Number">
         <br>
         <input type="submit" value="Expresion of Interest">
    </form>
    
</body>
<?php
$txt="";
if ($_SERVER['REQUEST_METHOD']=='POST')
{
    if(!empty($_POST['Proposed_Price']))
        {
            $buyerfilefile=fopen("buyer.txt","a+" ) or die("file does not exist");
                        $txt.="\r\n";
                        $txt.="$_POST[Plate_Number],";
                        $txt.="$_POST[Proposed_Price],";
                        $txt.="$_POST[Buyer_Name],";
                        $txt.="$_POST[Tele_Number]";
                        fwrite($buyerfilefile, $txt);
                        fclose($buyerfilefile);
                echo"<a href='http://localhost/a2/index.php'>Home page</a>";
}

        }
?>
</html>