<?php
session_start();

?>
<body>
    <h2>departments</h2>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
    Input the school name :<input type= 'text' name ='school_name'><br>
   <input type ='submit'name='departments' value= 'departments'>
   <input type ='submit'name='professor' value= 'professor'>
   <input type ='submit'name='num_professor' value= 'num_professor'>
   <h2>course</h2>
    Input the course name :<input type= 'text' name ='course_name'><br>
    <input type ='submit'name='course' value= 'course'>
   <h2>professor</h2>
  Input the professor name :<input type= 'text' name ='professor_name'>
    <input type ='submit'name='professor' value= 'professor'>
    <input type ='submit'name='name_student' value= 'name_student'>         
    <input type ='submit'name='summary' value= 'summary'>
    </form>
    <a href="index.php">login</a>
    <br>
    <a href="Cancelation.php">Withdraw</a>
    <br>
    <a href="Enrolment.php">Enroll</a>
    <?php 
    if($_SESSION['loggin']){
        if(isset($_POST['school_name']) || isset($_POST['course_name']) || isset($_POST['professor_name'])){
        $servername= "localhost:3306";
        $dbusername="root";
        $dbpwd=""; 
        $conn =mysqli_connect($servername,$dbusername,$dbpwd,'UNI');
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
    }
    }
    
                
    ?>
</body>