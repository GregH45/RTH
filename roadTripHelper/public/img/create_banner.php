<?php 
	$img = imagecreatefromjpeg('banner.jpg');
	$blanc = imagecolorallocate($img, 255, 255, 255);
	$noir = imagecolorallocate($img, 0, 0, 0);
	imagettftext($img, 61, 0, 147, 402, $noir, 'Krinkes.ttf', 'Bienvenue sur RoadTripHelper');
	imagettftext($img, 61, 0, 145, 400, $blanc, 'Krinkes.ttf', 'Bienvenue sur RoadTripHelper');
	header('Content-type: image/jpeg');
	imagejpeg($img);

?>
