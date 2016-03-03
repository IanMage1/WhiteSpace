<?php
	$address = $_GET["address"];
	$x = $_GET["x"];
	$y = $_GET["y"];
	$w = $_GET["w"];
	$h = $_GET["h"];
	$wT = $_GET["wT"];
	$hT = $_GET["hT"];
	
	$width = $w/$wT; //GET THESE FROM DB (width/number of sections in x direction)
	$height = $h/$hT; //GET THESE FROM DB (width/number of sections in y direction)
	
	//get image from DB using id
	$image = @imagecreatefromjpeg($address);
	
	//make sure image was loaded properly
	if(!$image) {
		//if image was not loaded properly, create error message
		$image = imagecreatetruecolor($width, $height);
		$bg = imagecolorallocate($image, 255, 255, 255, 255);
		$textColor = imagecolorallocate($image, 255, 0, 0);
		imagefilledrectangle($image, 0, 0, width, height, $bg);
		imagestring($image, 1, 5, 5, "ERROR", $textColor);
		
		output($image);
		return;
	}
	
	//perform crop on image
	$dest = imagecreatetruecolor($width, $height);
	imagecopy($dest, $image, 0, 0, $width*$x, $height*$y, $width, $height);
	
	//decrement score here
	
	//output to browser
	output($dest);
	
	//function for outputting base-64 encoded image to javascript
	function output($im) {
		//capture output buffer
		ob_start();
			imagejpeg($im);
			$output = ob_get_contents();
		ob_end_clean();
		//echo encoded image
		echo base64_encode($output);
		return;
	}
	
?>