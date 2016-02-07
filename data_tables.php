<?php
$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "leonl-db", "mCvXbcy9WsvzmzJ9", "leonl-db");


$mysqli->query("drop table Users");
$mysqli->query("drop table Pictures");


if (!$mysqli->query("create table Users(uid integer, username varchar(64), password varchar(64), score integer, primary key(uid))")
 || !$mysqli->query("create table Pictures(pid integer, name varchar(200), pts integer, hs integer, primary key(pid))")){
    printf("Cannot create table(s).\n");
}


//dummy data:
$mysqli->query("insert into Users(uid,username,password,score) values(932446782,'IanMage', 'pwdfje53', 764)");
$mysqli->query("insert into Users(uid,username,password,score) values(932784747,'loser', 'dsfgre5', 0)");
$mysqli->query("insert into Users(uid,username,password,score) values(932675478,'Louis', 'dferyr7', 967)");
$mysqli->query("insert into Users(uid,username,password,score) values(932089506,'SuperWhiteSpaceWinnerMaster', 'srghery9', 990849)");

$mysqli->query("insert into Pictures(pid,name,pts,hs) values(1,'coke',800, 700)");
$mysqli->query("insert into Pictures(pid,name,pts,hs) values(2,'pepsi',800, 750)");
$mysqli->query("insert into Pictures(pid,name,pts,hs) values(3,'kitkat',800, 600)");
$mysqli->query("insert into Pictures(pid,name,pts,hs) values(4,'herhsey',800, 780)");


//to print the uid, username, and score of each user from Users:
echo "<table>";
if ($result = $mysqli->query("select uid,username,score from Users")) {
    while($obj = $result->fetch_object()){ 
            echo "<tr>";
            echo "<td>".htmlspecialchars($obj->uid)."</td>"; 
            echo "<td>".htmlspecialchars($obj->username)."</td>"; 
            echo "<td>".htmlspecialchars($obj->score)."</td>";  
            echo "</tr>";
    } 
}
echo "</table>";

//to print the pid (picture id), name, points [worth], and hs (highest score) of each picture from Pictures:
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
