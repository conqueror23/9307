<html>
<head>

</head>
<body>
  <form method="POST" name="input" action="<?php echo $_SERVER['PHP_SELF'];?>">
      Input Student name<input type="text" name="student_name" onkeyup="search(this.value)">
    Input Password <input type="password" name="password">
    <input type="submit" name="submit" value="submit">
  </form>

<?php
    session_start();
if(isset($_POST['submit'])){

    $servername ="localhost:3306";
    $dbusername = "root";
    $dbpwd ="";
    $conn = mysqli_connect($servername,$dbusername,$dbpwd,'exam');
    if (!$conn){
      die ("connection failed :".mysqli_connect_error());
    }else {
        $sql = "select * from student where student_name = '".$_POST['student_name']."';";
        //echo $sql;
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        //print_r($row) ;
       // echo $_POST['password'];
        if($_POST['student_name']=$row['student_name']&$_POST['password']=$row['password']){

         $_SESSION['student_name'] = $_POST['student_name'];
         $_SESSION['login']= True;

          echo "login successful !<br>";
          echo "welcome ".$row['student_name'];

          echo "<br><a href= 'CheckAnswers.php'>answer questions</a>";

         }else{
               echo "check your user name and password";
         }
      }

    //transfer to object version of this connection latter
  }else {
    echo "please login in first";
  }

//display dynamic progress bar
// simulate graphical charts
// read xml files -- xml related control
// ajax live search and ajax database
?>
    <p id ="ajax"></p>
    <script>
    function search(str) {
    var jsajax = new XMLHttpRequest();
    jsajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("ajax").innerHTML = this.responseText;
        }
    };
    jsajax.open("GET", "searching.php?a=" + str, true);
    jsajax.send();
}
    </script>
</body>
</html>
