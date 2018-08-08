<?php
if(empty($_GET['a'])){
    $_GET['a']="";
    
}
if($_GET['a']!=""){
$sn = 'localhost:3306';
$un = 'root';
$pw = '';
$conn = new mysqli($sn,$un,$pw,'exam');
$sql = "select student_name from student where student_name like '%".$_GET['a']."%';";
//echo $sql;
$res = $conn->query($sql);
echo "UserNames: ";
if($res->num_rows>0){
	while($row = $res->fetch_assoc()){
		echo $row['student_name'] . ' , ';
	}
}
$conn->close();
} else {
	echo '';
}
?>