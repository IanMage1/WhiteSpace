<?php include("_header.php");?>

<h1>Leaderboard</h1>
<h4>The leaderboard updates every 2 seconds.</h4>

<script src="https://code.jquery.com/jquery-1.12.0.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
  setInterval(function(){
    $("#screen").load('leaderboard2.php')
  }, 2000);
});
</script>
<div id="screen"></div>