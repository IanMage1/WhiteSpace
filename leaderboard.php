<?php include("_header.php");?>

<h1>Leaderboard</h1>

<?php
$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "leonl-db", "mCvXbcy9WsvzmzJ9", "leonl-db");

$mysqli->query("drop table Users");



if (!$mysqli->query("create table Users(uid integer, username varchar(64), password varchar(64), score integer, primary key(uid))")) {
    printf("Cannot create table(s).\n");
}


//Users dummy data:
$mysqli->query("insert into Users(uid,username,password,score) values(932446782,'John', 'magenhej', 764)");
$mysqli->query("insert into Users(uid,username,password,score) values(932784747,'loser', 'losern', 0)");
$mysqli->query("insert into Users(uid,username,password,score) values(932675478,'Louis', 'leonl', 967)");
$mysqli->query("insert into Users(uid,username,password,score) values(932089506,'SuperWhiteSpaceWinnerMaster', 'superm', 990849)");
$mysqli->query("insert into Users(uid,username,password,score) values(932907748,'Andrew', 'soltesza', 980)");
$mysqli->query("insert into Users(uid,username,password,score) values(932094459,'William', 'selbiew', 960)");
$mysqli->query("insert into Users(uid,username,password,score) values(932345345, 'Trevor', 'swopet', 1000)");


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





$mysqli->close();
?>