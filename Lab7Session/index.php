<!DOCTYPE html>
<html>
    <head>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.3.3/underscore-min.js" type="text/javascript"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/backbone.js/0.9.2/backbone-min.js" type="text/javascript"></script>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
   
    <h1>Student login system</h1>
    <form method="POST" >
    Input your ID:<input name="stu_ID" ><br>
    Input your password: <input name="password"><br>             
    <input type="submit" value="Login"> 
    </form> 
           <script type="text/template" id="myTable">
              <h2>Login history<h2>
        <table cellspacing='0' cellpadding='0' border='1' >
            <thead>
            <tr>
            <th>Id</th>
            <th>Record</th>
              </tr>
             </thead>
         <%
         // repeat items 
         _.each(rc,function(item,key,list){
         %>
        <tr>
         <!-- use variables -->
            <td><%= key %></td>
            <td>
            <h3><%- item.name %></h3>
            <p><%- item.app %></p>
          </td>
        </tr>
        <%
          });
        %>
        </table>
    </script>
        
    <?php
    session_start();
    $servername= "localhost:3306";
    $dbusername="root";
    $dbpwd=""; 
    $conn =mysqli_connect($servername,$dbusername,$dbpwd,'UNI');
    if(isset($_POST["stu_ID"])){
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
            $_SESSION['ID']=$_POST['stu_ID'];
            $_SESSION['password']=$_POST['password'];
            $_SESSION['loggin']=true;
            $TP = $_SESSION['ID'][0].$_SESSION['ID'][1];
            
            $query_sql ="select * from enrollment "
                       . " where student_ID = '"
                       .$_POST['stu_ID']."';";
                $query_result = mysqli_query($conn, $query_sql);
                if(mysqli_num_rows($query_result)>0){
                    echo "<table border='1'>";
                    echo "<th>class ID </th><th>student ID</th>";
                    while ( $enroll_rows= mysqli_fetch_assoc($query_result)){                      
                        echo "<tr><td>".$enroll_rows['class_ID']."</td><td>".$enroll_rows['student_ID']."</td></tr>";        
                       echo "<br>";
                    
                        
                        
                    }
                    echo "</table>";
                }
            echo " <a href='Enrolment.php'>Enroll</a>";
            echo"<br>";
            echo "<a href='Enquiry.php'>Enquiries</a>";
            echo"<br>";
            echo "<a href='Cancelation.php'>Withdraw</a>";
            
            }
        }
   
    }
   
    ?>
    <script type="text/javascript">
        sup = Backbone.Model.extend({
        defaults : {
             EN: "Tony",
             IT:"Wayne"
        }
      });
    $(document).ready(function(){
        var school_sup = new sup;
        alert ("your suppervisor would be :"+ school_sup.get("<?php echo $TP;?>"));

  });
    
    </script>
    <div id="content"></div>
  
    <script type="text/javascript">
     _.templateSettings.variable = "rc"; //very important
    var items1 = [
        {name:"<?php echo $_SESSION["ID"];?>", app:"<?php echo date("Y/m/d")?>"},
        ];
    var template = _.template($("#myTable").html());
    $("#content").html(template(items1));
    </script>
     </body>
</html>
