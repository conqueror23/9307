<?php
echo 'file sorts:<br/>';
$htmlfile = array();
$handle = opendir('htmls');
while($file = readdir($handle)){
 if(strpos($file,'.html')){
  $htmlfile[]= array($file,filesize('htmls/'.$file));
 };
};
closedir($handle);
$len = count($htmlfile) -1;
for($a=0;$a<$len;$a++){
 for($b=0;$b<$len;$b++){
  if($htmlfile[$b][1]>$htmlfile[$b+1][1]){
   $temp = $htmlfile[$b];
   $htmlfile[$b] = $htmlfile[$b+1];
   $htmlfile[$b+1] = $temp;
  };
 };
};
for($a=0;$a<count($htmlfile);$a++){
 echo '<a href =htmls/'.$htmlfile[$a][0].'>' .  $htmlfile[$a][0] . '</a > : ' . $htmlfile[$a][1] . ' Bytes.<br/>';
};
?>
