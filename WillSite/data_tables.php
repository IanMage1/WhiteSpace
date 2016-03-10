<?php
$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "leonl-db", "mCvXbcy9WsvzmzJ9", "leonl-db");


$mysqli->query("drop table users");
$mysqli->query("drop table Pictures");


if (!$mysqli->query("create table users(uid integer, username varchar(64), password varchar(64), score integer, primary key(uid))")
 || !$mysqli->query("create table Pictures(pid integer, name varchar(200), pts integer, hs integer, primary key(pid))")){
    printf("Cannot create table(s).\n");
}


//User dummy data:
$mysqli->query("insert into users(uid,username,password,score) values(932446782,'John', 'magenhej', 764)");
$mysqli->query("insert into users(uid,username,password,score) values(932784747,'loser', 'losern', 0)");
$mysqli->query("insert into users(uid,username,password,score) values(932675478,'Louis', 'leonl', 967)");
$mysqli->query("insert into users(uid,username,password,score) values(932089506,'SuperWhiteSpaceWinnerMaster', 'superm', 990849)");
$mysqli->query("insert into users(uid,username,password,score) values(932907748,'Andrew', 'soltesza', 980)");
$mysqli->query("insert into users(uid,username,password,score) values(932094459,'William', 'selbiew', 960)");
$mysqli->query("insert into users(uid,username,password,score) values(932345345, 'Trevor', 'swopet', 1000)");

//Pictures dummy data:
$mysqli->query("insert into Pictures(pid,name,pts,hs) values(1,'coke',800, 700)");
$mysqli->query("insert into Pictures(pid,name,pts,hs) values(2,'pepsi',800, 750)");
$mysqli->query("insert into Pictures(pid,name,pts,hs) values(3,'kitkat',800, 600)");
$mysqli->query("insert into Pictures(pid,name,pts,hs) values(4,'herhsey',800, 780)");


printf("Sorted Leaderboard (score, username):\n");
echo "<table>";
if ($result = $mysqli->query("SELECT username,score FROM users ORDER BY score DESC")) { //prepares to print table in descending order
    while($obj = $result->fetch_object()){
            echo "<tr>";
            echo "<td>".htmlspecialchars($obj->score)."</td>";
            echo "<td>".htmlspecialchars($obj->username)."</td>";
            //echo "<td>".htmlspecialchars($obj->uid)."</td>";
            echo "</tr>";
    }
}
echo "</table>";
printf(" \n");
printf(" \n");
//to print the pid (picture id), name, points [worth], and hs (highest score) of each picture from Pictures:
printf("Pictures (pid, name, pts, hs): \n");
echo "<table>";
if ($result = $mysqli->query("select pid,name,pts,hs from Pictures")) {
    while($obj = $result->fetch_object()){
            echo "<tr>";
            echo "<td>".htmlspecialchars($obj->pid)."</td>";
            echo "<td>".htmlspecialchars($obj->name)."</td>";
            echo "<td>".htmlspecialchars($obj->pts)."</td>";
            echo "<td>".htmlspecialchars($obj->hs)."</td>";
            echo "</tr>";
    }
}
echo "</table>";



$mysqli->close();
?>
