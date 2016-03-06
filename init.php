<?php include("_header.php");?>


<?php

if (isset($_REQUEST["init"]) && $_REQUEST["init"] == "134891203489239") {
$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "leonl-db", "mCvXbcy9WsvzmzJ9", "leonl-db");

$mysqli->query("drop table users");
$mysqli->query("drop table images");



if (!$mysqli->query("create table users(uid integer NOT NULL AUTO_INCREMENT, username varchar(64), password varchar(512), score int, primary key(uid) )")
||
!$mysqli->query("create table images(iid integer NOT NULL AUTO_INCREMENT, name varchar(64), address varchar(64), width integer, height integer, xtiles integer, ytiles integer, primary key(iid) )")){
    printf("Cannot create table(s).\n");
}


if ($stmt = $mysqli->prepare("insert into users(username,password,score) values(?,?,?)")) {
	//"Dynamic" users:
	$username = "John";
	$password = "magenhej";
	$hashedPassword = base64_encode(hash('sha256',$password . $username));
	$score = 764;
	$stmt->bind_param("ssi", $username, $hashedPassword, $score);
    $stmt->execute();

    $username = "Louis";
	$password = "leonl";
	$hashedPassword = base64_encode(hash('sha256',$password . $username));
	$score = 967;
	$stmt->bind_param("ssi", $username, $hashedPassword, $score);
    $stmt->execute();

    $username = "Andrew";
	$password = "soltesza";
	$hashedPassword = base64_encode(hash('sha256',$password . $username));
	$score = 980;
	$stmt->bind_param("ssi", $username, $hashedPassword, $score);
    $stmt->execute();

    $username = "William";
	$password = "selbiew";
	$hashedPassword = base64_encode(hash('sha256',$password . $username));
	$score = 960;
	$stmt->bind_param("ssi", $username, $hashedPassword, $score);
    $stmt->execute();

    $username = "Trevor";
	$password = "swopet";
	$hashedPassword = base64_encode(hash('sha256',$password . $username));
	$score = 1000;
	$stmt->bind_param("ssi", $username, $hashedPassword, $score);
    $stmt->execute();

    $username = "loser";
	$password = "losern";
	$hashedPassword = base64_encode(hash('sha256',$password . $username));
	$score = 0;
	$stmt->bind_param("ssi", $username, $hashedPassword, $score);
    $stmt->execute();

    $username = "SuperWhiteSpaceWinnerMaster";
	$password = "superm";
	$hashedPassword = base64_encode(hash('sha256',$password . $username));
	$score = 990849;
	$stmt->bind_param("ssi", $username, $hashedPassword, $score);
    $stmt->execute();

    //"Static" random users
  for ($uid = 1; $uid < 1000; $uid++) {
    $username = "uid" . $uid;
    $password =  'password';
    $hashedPassword = base64_encode(hash('sha256',$password . $username));
    $score = 500;
    $stmt->bind_param("ssi", $username, $hashedPassword, $score);
    $stmt->execute();
	}
  	$stmt->close();
}else{
  	printf("Error: %s\n", $mysqli->error);
  }

print("initialized");

} 
else{
	print("broken");
}


?>




<?php include '_footer.php' ?>
