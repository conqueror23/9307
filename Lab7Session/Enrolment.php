<?php
session_start();
?>
<body>
    <h1>Enrollment</h1>
    <form method = 'POST' action="<?php echo $_SERVER['PHP_SELF'];?>">
    Input the class_ID :<input type= 'text' name ='enroll_class_ID'>
    <input type ='submit' name='enroll' value= 'enroll'>
    </form>
    
<?php 
if($_SESSION['loggin']){
    if(isset($_POST['enroll'])){
    $servername= "localhost:3306";
    $dbusername="root";
    $dbpwd=""; 
    $conn =mysqli_connect($servername,$dbusername,$dbpwd,'UNI');
    $fit = "select * from enrollment where class_ID ='".$_POST['enroll_class_ID']."'";
    $fit_result= mysqli_query($conn, $fit);
    $rown=mysqli_num_rows($fit_result);
    if($rown<5){
        $enroll_sql ="insert into enrollment values ( '$rown+1','".$_POST['enroll_class_ID']."','".$_SESSION['ID']."');";
    echo "<br>";
    echo $enroll_sql;
    echo "<br>";

     if(mysqli_query($conn, $enroll_sql)) {
         echo "<br>new record inserted";
     }else{
         echo "failed";
     }
    } else {
        echo "there are too many students in this class";
    }
    
     
 }
}
  
?>
    <a href="index.php">login</a>
    <br>
    <a href="Cancelation.php">Withdraw</a>
    <br>
    <a href="Enquiry.php">Enquiries</a>
    <br>
</body>
