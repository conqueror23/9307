
<?php
date_default_timezone_set('Australia/Sydney');
     function count_days($a,$b){
          $a_parts =getdate($a);
          $b_parts = getdate($b);
          $a_new =mktime(12,0,0,$a_parts['mon'],$a_parts['mday'],$a_parts['year']);
          $b_new =mktime(12,0,0,$b_parts['mon'],$b_parts['mday'],$b_parts['year']);     
     return round(($a_new-$b_new)/86400);
     }
$dbconnect = mysqli_connect("localhost","root","","rental");
if ($dbconnect->connect_errno) {
echo "<p>Unable to connect to the database server.</p>" . "<p>Error code " . $dbconnect->connect_errno. ": " . $dbconnect->connect_error . "</p>\n";
}else {
$TableName = "infos";
$SQLstring = "SELECT * FROM $TableName";
$QueryResult = @$dbconnect->query($SQLstring);
if ($QueryResult === FALSE)
     echo "<p>Unable to execute the query. " .
          "Error code " . $dbconnect->errno .
          ": " . $dbconnect->error . "</p>\n";
else {
echo "<table width='100%' border='1'>\n";
echo "<tr><th>email</th><th>first_name</th><th>last_name</th>" .
          "<th>debt</th><th>due_date</th></tr>\n";
     while (($Row = $QueryResult->fetch_row()) !== FALSE)
{
          echo "<tr><td>{$Row[0]}</td>";
          echo "<td>{$Row[1]}</td>";
          echo "<td>{$Row[2]}</td>";
          echo "<td >{$Row[3]}</td>";
          echo "<td>{$Row[4]}</td></tr>\n";
          $current_date = getdate();
          if (($count_days($Row[4],$current_date))>0){

          // email sending process
               $to=$_POST[''];
               $subject = 'a debt due email';

               $headers = "from :php localhost ";

               $body = "this is just a test to used php sending emails";

               mail($to,$subject,$body,$headers);


}
     echo "</table>\n";
} 
}
?>
