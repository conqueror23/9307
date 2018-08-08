<?php


function answer(){
$a=['A','B','C','D'];
//print_r($a);
  //for ($k<4;$k++;$k=0){

    //}
$n = mt_rand(0,3);

//echo $a[$n];

      return $a[$n];
}
//answer();
/*
$a[]=['A','B','C','D'];
echo "*******";
print_r($a);
*/
//echo answer($x);
//print_r($a);

for ($i=1;$i<=40;$i++){
  //echo $i;
  echo '('.$i.",".'"'.answer().'"'.'),';
  echo "<br>";
  }





//random()
?>
