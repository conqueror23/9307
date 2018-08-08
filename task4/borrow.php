
<body>
    <h1>Borrow</h1>
    <form method = 'POST' action="<?php echo $_SERVER['PHP_SELF'];?>">
    Input the book_id :<input type= 'text' name ='book_id'>
    <input type ='submit' name='borrow' value= 'borrow'>
    </form>
    
<?php 
session_start();
if($_SESSION['loggin']){
    $servername= "localhost:3306";
    $dbusername="root";
    $dbpwd=""; 
    $conn =mysqli_connect($servername,$dbusername,$dbpwd,'LIB');
    echo "check the validate of the book";
    echo "<br>";
    $dis_sql = "select * from books;";
    echo "<br>";
    //echo $dis_sql;
    $dis_result = mysqli_query($conn, $dis_sql);
    while ($dis_row = mysqli_fetch_assoc($dis_result)){
        $dis_arr[]= $dis_row;
    }
    print(json_encode($dis_arr));
   echo "<br>";   
   
        if(isset($_POST['borrow'])){  
        $fit = "select * from books where book_id ='".$_POST['book_id']."'";
        $fit_result= mysqli_query($conn, $fit);
        $borrow_rows= mysqli_fetch_assoc($fit_result);
       if($borrow_rows['validate']){
           $borrow_outcome[] =$borrow_rows;
           echo "<br>borrow validate<br>";
           print_r($borrow_outcome);
           
        $update_sql = "update books set validate = False where book_id = '".$_POST['book_id']."';";
        $update_result= mysqli_query($conn, $update_sql);
       
        //echo $fit;
        echo "<br>";
        } else {
            echo "book are not available";
        }
     
   
    }
    

    
    
   
} else {
    echo "not login ";
}
?>
     <br>
    <a href="liblogin.php.php">liblogin</a>
    <br>
    <a href="return.php">return</a>
    <br>
   
</body>
