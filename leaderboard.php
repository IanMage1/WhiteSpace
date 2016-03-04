<?php include("_header.php");?>

<h1>Leaderboard</h1>

<?php
$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "leonl-db", "mCvXbcy9WsvzmzJ9", "leonl-db");


echo "<table>";
if ($result = $mysqli->query("SELECT username,score FROM users ORDER BY score DESC")) { //prepares to print table in descending order by score
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