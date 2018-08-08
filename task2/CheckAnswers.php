<?php
session_start();
?>
<html>
    <head>
    </head>
    <body>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" name="f1">
          <p>Please upload your answer file.
          <input type="file" name="file">
          </p> <br>
          <p><input type="submit" name="submit"></p>
      </form>
        <?php
        $servername ="localhost:3306";
        $dbusername = "root";
        $dbpwd ="";
        $conn = mysqli_connect($servername,$dbusername,$dbpwd,'exam');
        $student_name = $_SESSION["student_name"];
        $sqlcmd = "select * from student where student_name = ' $student_name'";
        $result = mysqli_query($conn,$sqlcmd);
        $row = mysqli_fetch_assoc($result);
        echo "your exam result: <br>";
        echo"<table border='1'>";
        echo"<tr><th>submit time</th><th>exam result</th></tr>";
        echo "<tr><td>".$row['up_time']."</td><td>".$row['result']."</td></tr>";
        echo "</table><br>";
        $answers_read = file_get_contents("answers.txt");
        $answers_arr = explode("\n",$answers_read);
        if($row['up_time']<5 & $row['result']=="U"){
        if (count($_FILES)) {
           if (!($_FILES['file']['size'])) {
                echo "<p>ERROR: No actual file uploaded</p>\n"; 
           } else { 
                    $newname = $_FILES["file"]["name"];
                    move_uploaded_file($_FILES['file']['tmp_name'],$_FILES["file"]["name"]);
                    if (!(move_uploaded_file($_FILES['file']['tmp_name'],$newname))){
                       echo "<p>Error occurred during uploading!</p>\n";
                    } else {
                         $my_file = file_get_contents($newname);
                         $my_file_arr = explode("\n",$my_file);
                         echo count($my_file_arr);
                         if(count($my_file_arr) != 40){
                             echo "Wrong Number of Questions";
                         }else{
                             $up_time = $row['up_time']+1;
                             $inter_arr = array_intersect($my_file_arr,$answers_arr);
                             if(count($inter_arr)==40){
                                 echo"Your Attempt was Successful";
                                 $sqlcmd1 = "update student set up_time=$up_time,result='P' where student_name = ' $student_name'";
                                 $result1 =mysqli_query($conn,$sqlcmd1);
                               
                             }else{
                                 echo"Unsuccessful Attempt";
                                 $sqlcmd2 =  "update student set up_time=$up_time where student_name = ' $student_name'";
                                 $result2 =mysqli_query($conn,$sqlcmd2);
                                
                             }
                         }
                    } 
           }
        }
        }else{
            echo"you are not permit to submit again";
        }  
        ?>
    </body>
</html>