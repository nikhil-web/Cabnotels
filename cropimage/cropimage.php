<?php
$im = imagecreatefromjpeg('banner1.jpg');
echo "Orignal image size";
echo imagesx($im);
echo imagesy($im);
echo "new image size - > 500x400";
$sizex = 300;
$sizey = 200;

$x = imagesx($im)*0.25;
$y = imagesy($im)*0.25;

$im2 = imagecrop($im, ['x' => $x, 'y' => $y, 'width' => $sizex, 'height' => $sizey]);
if ($im2 !== FALSE) {
    imagejpeg($im2, 'img-croped.jpg');
    imagedestroy($im2);
}
imagedestroy($im);
?>