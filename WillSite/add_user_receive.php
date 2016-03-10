<?php include("_header.php");?>

<?php

if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["passwordre"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];
	$passwordre = $_POST["passwordre"];

	$errorMsg = "";
	if ($username == "" || $password == "") {
		$errorMsg = "Please go back and enter a username and password.";
	} else {
		// check if username is taken
		$query = $mysqli->prepare("select uid from users where username = ?");
		$query->bind_param("s",$username);
		if ($query->execute()) {
  			$query->bind_result($uid);

			if($query->fetch()){
				// if any rows come back, then this user exists already
				$errorMsg = "That username is taken. Go back and pick another.";
    			}

			$query->close();
		}
	}

	if ($password !== $passwordre) {
		$errorMsg = "Your passwords did not match, please reenter them.";
	}
	if ($errorMsg == "") {
		// ok, we can just insert the record
		$hashedPassword = base64_encode(hash('sha256',$password . $username));
		$score = 0;

		if ($stmt = $mysqli->prepare("insert into users(username,password,score) values(?,?,?)")) {
			$stmt->bind_param("ssi", $username, $hashedPassword, $score);
	    		$stmt->execute();
			$stmt->close();
			echo '<p>Created... You may now <a href="login.php">log in...</a></p>';
		} else {
	  		printf("Error: %s\n", $mysqli->error);
		}
	} else {
		echo "<h4 class='error'>".htmlspecialchars($errorMsg)."</h4>";
	}
}


?>




<?php include("_footer.php");?>
