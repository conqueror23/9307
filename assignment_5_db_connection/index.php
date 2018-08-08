<!DOCTYPE html>
<!--

-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            Input your ID:<input name="stu_ID" ><br>
            Input your password: <input name="password"><br>

            <input type="submit" value="Login">
        </form>

        <?php
        // put your code here
        $servername= "localhost:3306";
        $dbusername="root";
        $dbpwd="";

        $conn =mysqli_connect($servername,$dbusername,$dbpwd,'UNI');

        if (!$conn){
            die("connection failed :".mysqli_connect_error());
            }else{
            echo "connection sucessful<br>";
            echo "--------------------------------------------------------------------------------------------<br>";

            $sql = "select * from students where student_ID ='".$_POST['stu_ID']."'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);

            if ($_POST['stu_ID']==$row['student_ID']&$_POST['password']==$row['password'])
                {
                define("stu_ID", $_POST['stu_ID']);
                //$stu_ID = $_POST['stu_ID'];
                $query_sql ="select * from enrollment "
                           . " where student_ID = '"
                           .$_POST['stu_ID']."';";
                    $query_result = mysqli_query($conn, $query_sql);

                    if(mysqli_num_rows($query_result)>0){
                        while ( $enroll_rows= mysqli_fetch_assoc($query_result)){
                            echo "class ID :".$enroll_rows['class_ID']."student ID:".$enroll_rows['student_ID']."<br>";

                        }

                    }

                echo "<br>Withdraw<br>";
                echo "Input the class_ID :<input type= 'text' name ='withdraw_class_ID'><br>";
                echo "<input type ='submit'name='withdraw' value= 'withdraw'>";
                echo "<br>--------------------------------------------<br>";
                echo "<br>departments&professor<br>";
                echo "Input the school name :<input type= 'text' name ='school_name'><br>";
                echo "<input type ='submit'name='departments' value= 'departments'>";
                echo "<input type ='submit'name='professor' value= 'professor'>";
                echo "<input type ='submit'name='num_professor' value= 'num_professor'>";
                echo "<br>course<br>";
                echo "Input the course name :<input type= 'text' name ='course_name'><br>";
                echo "<input type ='submit'name='course' value= 'course'>";
                echo "<input type ='submit'name='num_student' value= 'num_student'>";
                echo "<br>professor<br>";
                echo "Input the professor name :<input type= 'text' name ='professor_name'><br>";
                echo "<input type ='submit'name='professor' value= 'professor'>";
                echo "<input type ='submit'name='name_student' value= 'name_student'>";
                echo "<input type ='submit'name='summary' value= 'summary'>";

                echo "</form><br>";
                //enroll
               //withdraw
                if(isset($_POST['withdraw'])){
                   $withdraw_sql ="delete from enrollment where class_ID = '"
                           .$_POST['withdraw_class_ID']."' and student_ID = '".$_POST['stu_ID']."'";
                   $enroll_result= mysqli_query($conn, $withdraw_sql);
                   echo "you have withdraw";
               }
               //query command list
                 $sqla = "select department.department_name from department join school on department.school_ID = school.school_ID where school.school_name like '".$_POST['school_name']."';";

                $sqlb = "select students.student_name from students join enrollment on students.student_ID = enrollment.student_ID ";
                $sqlb .= "join class on class.class_ID = enrollment.class_ID join course on course.course_ID = class.course_ID ";
                $sqlb .= "where course.course_name like '".$_POST['course_name']."';";
                $sqlc = "select professor.professor_name from professor join school on school.school_ID = professor.school_ID where school.school_name like '".$_POST['school_name']."' group by professor.professor_name;";
                $sqld = "select course.course_name, count(*) as NumberOfStudents from course join class on course.course_ID = class.course_ID join enrollment ";
                $sqld .= "on class.class_ID = enrollment.class_ID join students on students.student_ID = enrollment.student_ID group by course.course_name;";
                $sqle = "select school.school_name, count(*) as NumProfessor from professor join school on professor.school_ID = school.school_ID group by school.school_name;";
                $sqlf = "select students.student_name from students join enrollment on students.student_ID = enrollment.student_ID join class on class.class_ID = enrollment.class_ID ";
                $sqlf .= "join professor on class.professor_ID = professor.professor_ID where professor.professor_name like '".$_POST['professor_name']."' group by students.student_name;";
                $sqlg = "select school.school_name, count(*) as number from school join professor ";
                $sqlg .="on school.school_ID=professor.school_ID ";
                $sqlg .="join class on class.professor_ID=professor.professor_ID ";
                $sqlg .="join enrollment on class.class_ID=enrollment.class_ID ";
                $sqlg .="join students on enrollment.student_ID= students.student_ID ";
                $sqlg .="group by school.school_name;";

                //query result
                 $quarya_result= mysqli_query($conn, $sqla);
                 $quaryb_result= mysqli_query($conn, $sqlb);
                 $quaryc_result= mysqli_query($conn, $sqlc);
                 $quaryd_result= mysqli_query($conn, $sqld);
                 $quarye_result= mysqli_query($conn, $sqle);
                 $quaryf_result= mysqli_query($conn, $sqlf);
                 $quaryg_result= mysqli_query($conn, $sqlg);
               // only query

                 function display_result($rows){
                     foreach($rows as $key=>$value){
                         echo "<br>";
                         echo $key.":".$value;
                         echo "<br>";
                     }
                 }
                //a
                if(isset($_POST['departments'])){
                    echo "<br>_______________<br>";
                   while ($quarya_rows= mysqli_fetch_assoc($quarya_result)){
                       display_result( $quarya_rows);
                   }
                    }
                    if(isset($_POST['course'])){
                    echo "<br>_______________<br>";
                   while ($quaryb_rows= mysqli_fetch_assoc($quaryb_result)){
                       display_result( $quaryb_rows);
                    }

                   }
                   //professor names
                     if(isset($_POST['professor'])){
                    echo "<br>_______________<br>";
                   while ($quaryc_rows= mysqli_fetch_assoc($quaryc_result)){
                       display_result( $quaryc_rows);
                    }

                   }
                   // number of students
                     if(isset($_POST['num_student'])){
                    echo "<br>_______________<br>";
                   while ($quaryd_rows= mysqli_fetch_assoc($quaryd_result)){
                       display_result( $quaryd_rows);
                    }

                   }
                   //number of professors
                      if(isset($_POST['num_professor'])){
                    echo "<br>_______________<br>";
                   while ($quarye_rows= mysqli_fetch_assoc($quarye_result)){
                       display_result( $quarye_rows);
                    }

                   }
                   //name of students
                      if(isset($_POST['name_student'])){
                    echo "<br>_______________<br>";
                   while ($quaryf_rows= mysqli_fetch_assoc($quaryf_result)){
                       display_result( $quaryf_rows);
                    }
                   }
                   //number of students
                      if(isset($_POST['summary'])){
                    echo "<br>_______________<br>";
                   while ($quaryg_rows= mysqli_fetch_assoc($quaryg_result)){
                       display_result( $quaryg_rows);
                    }

                   }

            }else{
                echo "your are not him/her please use your own account";
            }
            }
        ?>

    </body>
</html>
