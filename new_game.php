<?php
	//called at beginning of a game. Randomly selects a logo, passes width, height, and number of tiles for width and height to the client
	
	//randomly choose image here. Replace hard coded values with values for the image
	$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "leonl-db", "mCvXbcy9WsvzmzJ9", "leonl-db");
	
	$result = $mysqli->query("SELECT t.* FROM images AS t JOIN (SELECT ROUND(RAND() * (SELECT MAX(iid) FROM images)) AS iid) AS x WHERE t.iid >=x.iid LIMIT 1");
	$obj = $result->fetch_object();
	
	$imgPath = $obj->address;
	$imgWidth = $obj->width;
	$imgHeight = $obj->height;
	$widthTiles = $obj->xtiles;
	$heightTiles = $obj->ytiles;

	//output
	echo $imgPath . " " . $imgWidth . " " . $imgHeight . " " . $widthTiles . " " . $heightTiles;
	$mysqli->close();
?>