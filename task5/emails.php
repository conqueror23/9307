<html>
<head>
	
</head>
	<body>
		<form method="POST">
			<input type="submit" name="submit" value="check_dues">
<?php
	//sending emails 
	date_default_timezone_set('Australia/Sydney');
	function count_days($a,$b){
		$a_parts =getdate($a);
		$b_parts = getdate($b);

		$a_new =mktime(12,0,0,$a_parts['mon'],$a_parts['mday'],$a_parts['year']);
		$b_new =mktime(12,0,0,$b_parts['mon'],$b_parts['mday'],$b_parts['year']);
		
	return round(($a_new-$b_new)/86400);
	}
	if(isset($_POST['submit'])){
		$dbconnection =mysql_connect("php_db,","rental","root");
		$servername ="localhost:3306";
	    $dbusername = "root";
	    $dbpwd ="";
	    $conn = mysqli_connect($servername,$dbusername,$dbpwd,'rental');
	    if (!$conn){
	      die ("connection failed :".mysqli_connect_error());
	    }else {

	    	$sql ="select * from infos;";
			
	    	$now_date=getdate();
			$due_date=$_POST[''];
			$time_left = count_days($now_date,$due_date);
			if (($time_left)<0){

	    	// email sending process
			$to=$_POST[''];
			$subject = 'a debt due email';

			$headers = "from :php localhost ";

			$body = "this is just a test to used php sending emails";

			mail($to,$subject,$body,$headers);
	}
	}

	}
		


?>
		</form>
		

	</body>
</html>


