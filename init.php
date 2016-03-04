<?php include '_header.php' ?>

<?php

if (isset($_REQUEST["init"]) && $_REQUEST["init"] == "134891203489239") {


$mysqli->query("drop table users");
$mysqli->query("drop table images");

if (!$mysqli->query("create table users(uid integer NOT NULL AUTO_INCREMENT, username varchar(64), password varchar(512), score int, primary key(uid) )")
||
!$mysqli->query("create table images(iid integer NOT NULL AUTO_INCREMENT, name varchar(64), address varchar(64), width integer, height integer, xtiles integer, ytiles integer, primary key(iid) )")) {
    printf("Cannot create table(s).\n");
}

//Users dummy data:
$mysqli->query("insert into users(uid,username,password,score) values(932446782,'John', 'magenhej', 764)");
$mysqli->query("insert into users(uid,username,password,score) values(932784747,'loser', 'losern', 0)");
$mysqli->query("insert into users(uid,username,password,score) values(932675478,'Louis', 'leonl', 967)");
$mysqli->query("insert into users(uid,username,password,score) values(932089506,'SuperWhiteSpaceWinnerMaster', 'superm', 990849)");
$mysqli->query("insert into users(uid,username,password,score) values(932907748,'Andrew', 'soltesza', 980)");
$mysqli->query("insert into users(uid,username,password,score) values(932094459,'William', 'selbiew', 960)");
$mysqli->query("insert into users(uid,username,password,score) values(932345345, 'Trevor', 'swopet', 1000)");


if ($stmt = $mysqli->prepare("insert into users(uid,username,password,score) values(?,?,?,?)")) {
  for ($uid = 1; $uid < 1000; $uid++) {
   $username = "uid" . $uid;
    $password =  'password';
    $score = 500;
    $stmt->bind_param("issi", $uid, $username, $password, $score);
    $stmt->execute();
  }
  $stmt->close();
} else {
  printf("Error: %s\n", $mysqli->error);
}

print("initialized");

} else {
print("broken");
}


?>




<?php include '_footer.php' ?>
