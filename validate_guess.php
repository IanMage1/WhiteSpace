<?php
	session_start();
	$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "leonl-db", "mCvXbcy9WsvzmzJ9", "leonl-db");
	
	$guess = $_GET["guess"];
	$address = $_SESSION["imgPath"];
	
	if($result = $mysqli->query("SELECT * FROM images WHERE name='" . $guess . "' AND address='" . $address . "'")) {
		$obj = $result->fetch_object();
		if($obj) {
			//user has won, add $_SESSION["score"] to user's high score here
			echo "1";
		}
		else {
			//user has guessed wrong. decrease score
			if($_SESSION["score"] <= 0) {
				//user's score is too low
				echo "2";
			}
			else {
				$_SESSION["score"] = floor(($_SESSION["widthTiles"] * $_SESSION["heightTiles"]) * 4/5);
				echo "0 " . $_SESSION["score"];
			}
		}
	}
	
	$mysqli->close();
?>