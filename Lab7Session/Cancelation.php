<?php
session_start();
print_r($_SESSION)
?> 
<body>
    <h1>Withdraw</h1>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Input the class_ID :<input type= 'text' name ='withdraw_class_ID'><br>
    <input type ='submit' name='withdraw' value= 'withdraw'>
    </form>
    <br>--------------------------------------------<br>
    <a href="index.php">login</a>
    <br>
    <a href="Enrolment.php">Enroll</a>
    <br>
    <a href="Enquiry.php">Enquiries</a>
    <?php 
    if($_SESSION['loggin']){
        if(isset($_POST['withdraw'])){
            $servername= "localhost:3306";
            $dbusername="root";
            $dbpwd=""; 
            $conn =mysqli_connect($servername,$dbusername,$dbpwd,'UNI');
                   $withdraw_sql ="delete from enrollment where class_ID = '"
                           .$_POST['withdraw_class_ID']."' and student_ID = '".$_SESSION['ID']."'";
                   if(mysqli_query($conn, $withdraw_sql)){
                   echo "you have withdraw";  
                   }else{
                       echo "unable to withdraw";
                   }
                   
               } 
    } else {
        echo "you are not autherised user";
    }
      
               
    ?>
</body>