<?php
	session_start();
	//called at beginning of a game. Randomly selects a logo, passes width, height, and number of tiles for width and height to the client
	
	$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "leonl-db", "mCvXbcy9WsvzmzJ9", "leonl-db");
	
	$result = $mysqli->query("SELECT t.* FROM images AS t JOIN (SELECT ROUND(RAND() * (SELECT MAX(iid) FROM images)) AS iid) AS x WHERE t.iid >=x.iid LIMIT 1");
	$obj = $result->fetch_object();
	
	$_SESSION["imgPath"] = $obj->address;
	$_SESSION["imgWidth"] = $obj->width;
	$_SESSION["imgHeight"] = $obj->height;
	$_SESSION["widthTiles"] = $obj->xtiles;
	$_SESSION["heightTiles"] = $obj->ytiles;
	
	//initialize score
	$_SESSION["score"] = $_SESSION["widthTiles"] * $_SESSION["heightTiles"];
	
	$imgPath = $obj->address;
	$imgWidth = $obj->width;
	$imgHeight = $obj->height;
	$widthTiles = $obj->xtiles;
	$heightTiles = $obj->ytiles;

	//output
	echo $imgPath . " " . $imgWidth . " " . $imgHeight . " " . $widthTiles . " " . $heightTiles . " " . $_SESSION["score"];
	$mysqli->close();
?>