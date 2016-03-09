<?php
	session_start();
	$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "leonl-db", "mCvXbcy9WsvzmzJ9", "leonl-db");
	
	$guess = $_GET["guess"];
	$address = $_SESSION["imgPath"];
	
	if($result = $mysqli->query("SELECT * FROM images WHERE name='" . $guess . "' AND address='" . $address . "'")) {
		$obj = $result->fetch_object();
		if($obj) {
			//user has won, add $_SESSION["score"] to user's high score here
			if ($_SESSION["uid"] != "") {
				$id = $_SESSION["uid"];
				$mysqli->query("UPDATE users SET score=score + " . $_SESSION["score"] . " WHERE uid=" . $id);
			}
			
			echo "1";
			
			//echo $_SESSION["score"];
		}
		else {
			//user has guessed wrong. decrease score
			if($_SESSION["score"] <= floor(($_SESSION["widthTiles"] * $_SESSION["heightTiles"]) * 1/5)) {
				//user's score is too low
				echo "2";
				$result = $mysqli->query("SELECT * FROM images WHERE address='" . $address . "'");
				$obj = $result->fetch_object();
				echo " " . $obj->name;
			}
			else {
				$_SESSION["score"] = $_SESSION["score"] - floor(($_SESSION["widthTiles"] * $_SESSION["heightTiles"]) * 1/5);
				echo "0 " . $_SESSION["score"];
			}
		}
	}
	
	$mysqli->close();
?>