<?php include '_header.php' ?>

<?php

if (isset($_REQUEST["init"]) && $_REQUEST["init"] == "134891203489239") {


$mysqli->query("drop table users");


if (!$mysqli->query("create table users(uid integer NOT NULL AUTO_INCREMENT, username varchar(64), password varchar(512), salt varchar(512), primary key(uid) )")
 ) {
    printf("Cannot create table(s).\n");
}

print("initialized");

} else {
print("broken");
}


?>




<?php include '_footer.php' ?>
