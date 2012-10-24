<?php 
	$id = $_GET['id'];
	$filename = $id.'/'.$id.'.jpg';
	header("Content-Type: image/jpeg");
	list($width, $height) = getimagesize($filename);
	$image_p = imagecreatetruecolor(150, 150);
	$image = imagecreatefromjpeg($filename);
	imagecopyresampled($image_p, $image, 0, 0, 0, 0, 150, 150, $width, $height);
	// вывод
	//imagejpeg($image_p, $id.'/'.$id.'.jpg', 90);
	imagejpeg ($image_p);
?>