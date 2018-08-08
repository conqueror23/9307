<?php
//echo "this fjis test";


$img = imagecreatetruecolor(400, 400);

$white = imagecolorallocate($img, 255, 0, 255);
$black = imagecolorallocate($img, 0, 213, 0);

//imagearc($img, 1000, 100, 150, 150, 0, 360, $white);
//imagefilledellipse($image, 100, 100, 10, 10, $white);
ImageArc($img,100 , 200, 90, 100,0, 360, $black);
ImageArc($img,150 , 240, 40, 100,0, 40, $white);

ImageArc($img,150 , 140, 10, 100,0, 290, $white);


header("Content-type: image/png");
imagepng($img);

imagedestroy($img);

echo "this fjis test";

?>
