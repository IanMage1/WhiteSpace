<?php
session_start();
function currentUrl() {
	$pageURL = 'http';
	if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["SCRIPT_NAME"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["SCRIPT_NAME"];
	}
	// FYI: You could also append the query string if that was important to you
	return $pageURL;
}
function checkAuth($redirectIfNeeded) {
	// is the user already logged in?
	if (isset($_SESSION["uid"]) && $_SESSION["uid"] != "") {
		// yes, already logged in
		return $_SESSION["uid"];
	} else if ($redirectIfNeeded) {
		// user is not logged in and needs to do so
		// send to the login page

		// pass the current URL so that we can come back here after login
		$currentUrl = currentUrl();

		// rawurlencode converts the string so it's safe to pass as a URL GET parameter
		$urlOfLogin = "login.php?sendBackTo=".rawurlencode($currentUrl)."&cb=".microtime(true);

		// use a JavaScript redirect; FYI, there's also an http header (Location:) that
		//    can be used to redirect, but that MUST be sent before any HTML, and this
		//    function (checkAuth) might be called after some HTML is sent
		echo "<script>location.replace('$urlOfLogin');</script>";
		return "";
	} else {
		// user is not logged in, but whoever called this function doesn't care
		return "";
	}
}
?>
<head>
<link rel="stylesheet" type="text/css" href="CSS/newstyle.css">
</head>
<body>
<main>
<nav>

<div id="nav">
<ul id="menu">
<li><a href="index.php">Home</a>
<?php
if (checkAuth(false) == "") {
?>
<li><a href="add_user.php">Register</a>
<li><a href="login.php">Login</a>
<li><a href="leaderboard.php">Leaderboard</a>
<?php
}
else {
?>
<li><a href="logout.php?cb=<?= microtime(true) ?>">Logout</a>
<?php
}
?>

</nav>
<?php
ini_set('display_errors', 'On');
$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "leonl-db", "mCvXbcy9WsvzmzJ9", "leonl-db");
?>
