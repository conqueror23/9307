<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP array manipulations</title>
    </head>
    <body>
        <?php
       #1 create array
        echo "<br># 1<br>";
        $array = array();
        print_r($array);
        //echo $array;
       #2 find the number of elements in an array
        echo "<br># 2<br>";
        $size = count($array,true);
        echo "$size";
       #3 create an array filled with a value
        echo "<br># 3<br>";
        $array_filled = array_fill(0,10,4);
        //echo $array_filled;
        echo "<br>****array_filled****<br>";
        print_r($array_filled);
        //dump_var($array_filled); 
        #4 create a array with a range of values
       echo "<br># 4<br>";
        $array_range = range(1,19,2);
        $array_range2 = range(2,20,2);
        echo "<br>****array_range****<br>";
        print_r($array_range);
        echo "<br>****array_range2****<br>";
        print_r($array_range2);
        #5 merge two arrays
         echo "<br># 5<br>";
        $big_array = array_merge($array_filled,$array_range);
        echo "<br>****big_array****<br>";
        print_r($big_array);
        # 6 convert a one-dimensianl array into two dimensions 
        echo "<br># 6<br>";
        $two_d_array = array_chunk($array_range, 3);
        echo "<br>****two_d_array****<br>";
        print_r($two_d_array);
        # 7 create a key-based array from two different arrays;
        echo "<br># 7<br>";
        $key_based_array= array_combine($array_range2, $array_range);
        echo "<br>****key_based_array****<br>";
        print_r($key_based_array);
        # 8 extract a subarray from an array
         echo "<br># 8<br>";
        $subarray = array_slice($key_based_array,1,8); //if not long enough process stop
        echo "<br>****subarray****<br>";
        print_r($subarray);
        # 9 replace a section of an array 
         echo "<br># 9<br>";
        $extracted = array_splice($subarray, 1,3,$array_range);
        echo "<br>****extracted****<br>";
        print_r($extracted);
        echo "<br>****subarray****<br>";
        print_r($subarray);
        # 10 sort array based on keys
        echo "<br># 10<br>";
        $random_array= array(2=>1,4=>3,0=>4,1=>2,20=>51,14=>3,6=>2);
        echo "<br>****before sort*****<br>";
        print_r($random_array);
        $sorted = ksort($random_array);
         echo "<br>****sorted array****<br>";
        print_r($sorted);
        echo "the output of the sorted function";
        echo "<br>";
        print_r($random_array);
        # 11 find out how many times elments appear in an array
        echo "<br># 11<br>";
        $count = array_count_values($random_array);
        echo "<br>*****count******<br>";
        print_r($count);
        # 12 determine whether a given key or index exist in an array
        echo "<br># 12<br>";
        $exist = array_key_exists(51, $random_array);
        if($exist){
            echo "24 is an element in random_array<br>";
        } else {
            
            echo "elements are not in random_array<br>";
        }
        echo $exist;
        print_r($exist);
        //dump_var($exist);
        # 13 returens all fthe keys of an array;
         echo "<br># 13<br>";
        $key_array = array_keys($random_array);
        echo "display the keys of random_array";
        print_r($key_array);
        # 14 return the values of an array
         echo "<br># 14<br>";
         echo "display the values of random_array";
         $value_array = array_values($random_array);
         # 15 find an element in an array
         echo "<br># 15<br>";
         $result = array_search(51, $random_array);
         echo 'display the result of search :';
         echo $result;
         # 16 remove duplicate values from an array
        echo "<br># 16<br>";
        echo "random_array before unique<br>";
        print_r($random_array);
        $dupli = array_unique($random_array);
        echo "random_array after unique<br>";
        print_r($dupli);
        #17 filter array based on used-specified criteria 
        echo "<br># 17<br>";
        function odd($var)
            {
                // returns whether the input integer is odd
                return($var & 1);
            }

        $filtered = array_filter($random_array,'odd');
        //echo $filtered;
        echo "only odd number in random_array will display<br>";
        print_r($filtered);
        # 18 find which values are common betweeen two arrays
        echo "<br># 18<br>";
        $common = array_intersect($random_array, $array_range2);
        echo "random array:<br>";
        print_r($random_array);
        echo "array range2:<br>";
        print_r($array_range2);
        echo "the common elements between random_array and array_range2<br>";
        print_r($common);
        # 19 find the difference between arrays
        echo "<br># 19<br>";
        echo 'the different between two arrays';
        $diff = array_diff($random_array, $array_range2);
        print_r($diff);
        #20 pick random elements from an array;
        echo "<br># 20<br>";
        $pick = array_rand($array_range2);
        echo "random element in array_range2:<br>";
        echo $pick;
        #######
        #question 2
        echo "<br>question 2 <br>";
        echo "each sub array of array are:";
        $rand_num= rand(2, 5);
        for ($i=0;$i<$rand_num;$i++){
            $rand_num2= rand(2, 5);
            $array= range(1,20,$rand_num2);
            $array2[$i]= $array;
            echo "<br>".$i ."th array:<br>";
            print_r($array2[$i]);
            
        }
        
        echo '<br>whole array2:<br>';
        print_r($array2);
        echo '<br>%%%%%%%%%%%<br>';
        echo 'numbers of subarray in the random array <br>';
        $length = count($array2);
        echo $length;
        
      
        //calculate the sum of all elements of arrays in array
        
       function total($arrays){
           $b=0;
            foreach($arrays as $value){
                $b=$b+$value;
           }
           return $b;
           //return $total_array;
       }
       echo "<br>&&&&&&&&&&&&&&&&&&&&&&<br>";
      
       
      //echo "<br> testing total function finished  <br>";
     
       
         function compare_total($a,$b){
             $a_total =total($a);
             $b_total = total($b);
          if ($a_total == $b_total){
              return 0;
          }   else{
              return ($a_total>$b_total)?-1:1;
          }
         }
         echo "sorted array:<br>";
         uasort($array2, 'compare_total');
         print_r($array2);
         
         
        
       /*
      function sort_array(&$a){
           $i = 0;
           $lastindex = count($a) -1;
           while ($i<$lastindex){
               //$total_array[$i]=
               if (total($a[$i])<=total($a[$i+1])){
                   $i++;
                  
               } else {
               $tmp = $a[$i];
               $a[$i] = $a[$i+1];
               $a[$i+1]=$tmp;
                
               if($i){
                    $i--;
                }
                 
                 
               }
           }
      }
         $array2= sort_array($array);
         print_r($array2);
        
       * 
       * 
       */ 
       
        
       
        ?>
    </body>
</html>
