<?php
	$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "leonl-db", "mCvXbcy9WsvzmzJ9", "leonl-db");
	
	$guess = $_GET["guess"];
	$address = $_GET["path"];

	if($result = $mysqli->query("SELECT * FROM images WHERE iid=1"))) {
		$obj = $result->fetch_object();
		echo $obj->address;
	}
	$mysqli->close();
?>