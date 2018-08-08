<?php 
 function recursive_array_matrix($a){
 	foreach($a as $value){
 		if (is_array($value)){
 			$value =recursive_array_matrix($value);
 		}
 		if(!(isset($min))){
 			$min = $value;
 		}else{
 			$min = $value<$min?$value:$min;
 		}
 	}
 	return $min;
 }
 $d = array(51,array(32,14),2,array(1000));
$min=recursive_array_matrix($d);
echo $min;
?>