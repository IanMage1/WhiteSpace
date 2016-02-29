<?php include("_header.php");?>

<h1>Leaderboard</h1>

<?php
$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "leonl-db", "mCvXbcy9WsvzmzJ9", "leonl-db");

$mysqli->query("drop table Users");



if (!$mysqli->query("create table Users(uid integer, username varchar(64), password varchar(64), score integer, currScore integer, primary key(uid))")) {
    printf("Cannot create table(s).\n");
}


//Users dummy data:
$mysqli->query("insert into Users(uid,username,password,score,currScore) values(932446782,'John', 'magenhej', 764, 0)");
$mysqli->query("insert into Users(uid,username,password,score,currScore) values(932784747,'loser', 'losern', 0, 0)");
$mysqli->query("insert into Users(uid,username,password,score,currScore) values(932675478,'Louis', 'leonl', 967, 0)");
$mysqli->query("insert into Users(uid,username,password,score,currScore) values(932089506,'SuperWhiteSpaceWinnerMaster', 'superm', 990849, 0)");
$mysqli->query("insert into Users(uid,username,password,score,currScore) values(932907748,'Andrew', 'soltesza', 980, 0)");
$mysqli->query("insert into Users(uid,username,password,score,currScore) values(932094459,'William', 'selbiew', 960, 0)");
$mysqli->query("insert into Users(uid,username,password,score,currScore) values(932345345, 'Trevor', 'swopet', 1000, 0)");


if ($stmt = $mysqli->prepare("insert into Users(uid,username,password,score,currScore) values(?,?,?,?,?)")) {
  for ($uid = 1; $uid < 1000; $uid++) {
    $username = "uid" . $uid;
    $password =  'password';
    $score = 500;
    $currScore = 0;
    $stmt->bind_param("issii", $uid, $username, $password, $score, $currScore);
    $stmt->execute();
  }
  $stmt->close();
} else {
  printf("Error: %s\n", $mysqli->error);
}



echo "<table>";
if ($result = $mysqli->query("SELECT username,score FROM Users ORDER BY score DESC")) { //prepares to print table in descending order by score
    while($obj = $result->fetch_object()){ 
            echo "<tr>";
            echo "<td>".htmlspecialchars($obj->score)."</td>"; 
            echo "<td>".htmlspecialchars($obj->username)."</td>";  
            echo "</tr>";
    }

    $result->close(); 
}
echo "</table>";




//<script>
//setInterval(displayTable(){
//    alert("It worked.");
//}, 10000);
//</script>


//<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
//<script>
//$( "#result" ).load( "/leaderboard.php", displayTable() {
//    alert( "Table was displayed.");
//});
//</script>

$mysqli->close();


?>