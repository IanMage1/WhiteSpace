<?php
$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "leonl-db", "mCvXbcy9WsvzmzJ9", "leonl-db");

$mysqli->query("drop table grades");
$mysqli->query("drop table students");
$mysqli->query("drop table courses");

if (!$mysqli->query("create table courses(cid integer, prof varchar(64), cred integer, cap integer, title varchar(200), primary key(cid))")
 || !$mysqli->query("create table students(sid integer, onid varchar(32), name varchar(200), primary key(sid))")
 || !$mysqli->query("create table grades(cid integer, sid integer, grade decimal(3,2), primary key(sid,cid), foreign key(sid) references students, foreign key(cid) references courses)")
 ) {
    printf("Cannot create table(s).\n");
}

$mysqli->query("insert into courses(cid,prof,cred,cap,title) values(361,'cscaffid',4,70,'SE I')");
$mysqli->query("insert into courses(cid,prof,cred,cap,title) values(362,'agroce',4,70,'SE II')");
$mysqli->query("insert into courses(cid,prof,cred,cap,title) values(496,'cscaffid',4,70,'Mobile/Cloud')");
$mysqli->query("insert into students(sid,onid,name) values(931905000,'cjones','C. Jones')");
$mysqli->query("insert into students(sid,onid,name) values(931905001,'amorgan2','A. Morgan')");
$mysqli->query("insert into students(sid,onid,name) values(931905000,'rholdt','R. Holdt')");

echo "<table>";
if ($result = $mysqli->query("select cid,prof,cred,cap,title from courses")) {
    while($obj = $result->fetch_object()){ 
            echo "<tr>";
            echo "<td>".htmlspecialchars($obj->cid)."</td>"; 
            echo "<td>".htmlspecialchars($obj->title)."</td>"; 
            echo "<td>".htmlspecialchars($obj->prof)."</td>"; 
            echo "<td>".htmlspecialchars($obj->cred)."</td>"; 
            echo "<td>".htmlspecialchars($obj->cap)."</td>"; 
            echo "</tr>";
    } 

    $result->close();
}
echo "</table>"; 



$mysqli->close();
?>