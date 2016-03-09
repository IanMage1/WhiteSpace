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


  //This will simulate active users' changing scores. 
  for($i=1; $i <= 5; $i++){
    $newScore = rand(6666,99999);
    $mysqli->query("UPDATE users SET score = $newScore WHERE uid = $i");
  }
  

$mysqli->close();

?>
