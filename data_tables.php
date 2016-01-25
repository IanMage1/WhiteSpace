<?php
$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "magenhej-db", "4hc69Q90z59znvKw", "magenhej-db");


$mysqli->query("drop table Users");
$mysqli->query("drop table Pictures");


if (!$mysqli->query("create table Users(uid integer, ref varchar(64), score integer, primary key(uid))")
 || !$mysqli->query("create table Pictures(pid integer, name varchar(200), pts integer, hs integer, primary key(pid))")){
    printf("Cannot create table(s).\n");
}

$mysqli->query("insert into Users(uid,ref,score) values(932446782,'IanMage',764)");
$mysqli->query("insert into Users(uid,ref,score) values(932784747,'loser',0)");
$mysqli->query("insert into Users(uid,ref,score) values(932675478,'Louis',967)");
$mysqli->query("insert into Users(uid,ref,score) values(932089506,'SuperWhiteSpaceWinnerMaster',990849)");

$mysqli->query("insert into Pictures(pid,name,pts,hs) values(1,'coke',800, 700)");
$mysqli->query("insert into Pictures(pid,name,pts,hs) values(2,'pepsi',800, 750)");
$mysqli->query("insert into Pictures(pid,name,pts,hs) values(3,'kitkat',800, 600)");
$mysqli->query("insert into Pictures(pid,name,pts,hs) values(4,'herhsey',800, 780)");


echo "<table>";
if ($result = $mysqli->query("select uid,ref,score from Users")) {
    while($obj = $result->fetch_object()){ 
            echo "<tr>";
            echo "<td>".htmlspecialchars($obj->uid)."</td>"; 
            echo "<td>".htmlspecialchars($obj->ref)."</td>"; 
            echo "<td>".htmlspecialchars($obj->score)."</td>";  
            echo "</tr>";
    } 
}
echo "</table>";

echo "<tr>";
echo " ";
echo "<tr>";

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
