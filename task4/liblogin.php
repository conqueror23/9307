<html>
    <head>
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.3.3/underscore-min.js" type="text/javascript"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/backbone.js/0.9.2/backbone-min.js" type="text/javascript"></script>
    </head>
    <body>
         <form method="POST" >
        Input your user_id:<input name="user_id" ><br>
        Input your password: <input name="password"><br>             
        <input type="submit" value="Login"> 
        
        <?php
       session_start();
       $servername= "localhost:3306";
       $dbusername="root";
       $dbpwd=""; 
       $conn =mysqli_connect($servername,$dbusername,$dbpwd,'LIB');
        if(isset($_POST["user_id"])){
            if (!$conn){
             die("connection failed :".mysqli_connect_error());
            }else{
            echo "connection sucessful<br>";
            echo "--------------------------------------------------------------------------------------------<br>";
            $sql = "select * from users where user_id ='".$_POST['user_id']."';";
            echo $sql;
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);

            if ($_POST['user_id']==$row['user_id']&$_POST['password']==$row['password'])
                {    
                $_SESSION['user_id']=$_POST['user_id'];
                $_SESSION['password']=$_POST['password'];
                $_SESSION['loggin']=true;                
                $query_sql ="select * from records "
                           . " where user_id = '"
                           .$_POST['user_id']."';";
                    $query_result = mysqli_query($conn, $query_sql);
                    if(mysqli_num_rows($query_result)>0){
                        while ( $enroll_rows= mysqli_fetch_assoc($query_result)){                        $arr[] = $enroll_rows;                                
                        }
                        echo "<br>";
                        print_r(json_encode($arr));
                        echo "<table border = '1'>";
                        foreach($arr as $key => $value){
                            echo "<tr><td>$key</td>";
                            foreach ($value as $key2 => $values2){
                                echo "<td>$key2<td>";
                                echo "<td>$values2<td>";
                            }
                           echo " </tr>";
                        }
                        echo "</table>";   
                    }
                echo"<br>";
                echo " <a href='borrow.php'>borrow</a>";
                echo"<br>";
                echo "<a href='return.php'>return</a>";
                }else{
                    echo "query failed";
                }}}
         ?>
    </form> 
    </body>
</html>

