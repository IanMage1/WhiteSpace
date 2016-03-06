<?php include("_header.php");?>

<?php

// where is the user trying to get back to, after logging in?
$sendBackTo = isset($_REQUEST["sendBackTo"]) ? $_REQUEST["sendBackTo"] : "index.php";

if (isset($_POST["username"]) && isset($_POST["password"])) {
	// user is trying to log in; if valid login, then redirect to where the user is trying to get back to
	$username = $_POST["username"];
	$password = $_POST["password"];
	$hashedPassword = base64_encode(hash('sha256',$password . $username));

	$query = $mysqli->prepare("select uid from users where username = ? and password = ?");
	$query->bind_param("ss",$username, $hashedPassword);
	if ($query->execute()) {
		$query->bind_result($uid);
		while($query->fetch()){
			// if any rows come back, then the login is valid
			$_SESSION["uid"] = $uid;
			echo "<script>location.replace(".json_encode($sendBackTo).");</script>";
			exit();
		}
		$query->close();
	}
	echo "Please enter a valid username and password.";
}

?>

<div id="login">
	<form method="post" action='login.php' class="inform">
	<h2>Login</h2>
	<ul>
		<li><label>Username <br></label> <input type="text" name="username">
		<li><label><br>Password <br></label> <input type="password" name="password">
		<li><br><input type=submit>
	</ul>

	<input type="hidden" name="sendBackTo"
	value="<?= htmlspecialchars($sendBackTo) ?>">
	</form>
</div>


<?php include("_footer.php");?>
