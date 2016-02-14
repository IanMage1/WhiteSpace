<?php
	//called at beginning of a game. Randomly selects a logo, passes width, height, and number of tiles for width and height to the client
	
	//randomly choose image here. Replace hard coded values with values for the image
	$imgID = 1;
	$imgWidth = 760;
	$imgHeight = 500;
	$widthTiles = 20;
	$heightTiles = 20;

	//output
	echo $imgID . " " . $imgWidth . " " . $imgHeight . " " . $widthTiles . " " . $heightTiles;
?>