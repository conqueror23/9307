<?php
session_start();

?> 
<body>
<h1>Withdraw</h1>
    <?php 
    if($_SESSION['loggin']){
            $servername= "localhost:3306";
            $dbusername="root";
            $dbpwd=""; 
            $conn =mysqli_connect($servername,$dbusername,$dbpwd,'LIB');
            echo "check the borrow statues of the user";
            $bo_status = "select * from records where user_id = '".$_SESSION['user_id']."';";
            $bo_result = mysqli_query($conn, $bo_status);
            while ($bo_row = mysqli_fetch_assoc($bo_result)){
                $bo_arr[]=$bo_row;
            }
            echo "<br>";
            print(json_encode($bo_arr));
             echo "<br>";
        if(isset($_POST['return'])){
           
                   $return_sql ="delete from records where user_id = '".$_SESSION['user_id']."'and book_id = '"
                           .$_POST['book_id']."';";
                   echo $return_sql;
                   if(mysqli_query($conn, $return_sql)){
                    $rt_r = mysqli_query($conn, $return_sql);
                    
                   $book_return = "update books set validate = True where book_id = '".$_POST['book_id']."';";
                   echo "<br>";
                   echo $book_return;
                   $return_result = mysqli_query($conn, $book_return);
                   echo "<br>";
                   echo "you have returned the book";
                   }else{
                       echo "unable to return";
                   }
                   
               } 
    } else {
        echo "you are not autherised user";
    }
      
               
    ?>
        
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Input the book_id :<input type= 'text' name ='book_id'><br>
    <input type ='submit' name='return' value= 'return'>
    </form>
    <br>--------------------------------------------<br>
    <a href="liblogin.php.php">login</a>
    <br>
    <a href="borrow.php">borrow</a>
  
</body>