<div id="nav">
<ul id="menu">
<li><a href="http://google.com">Home Page</a></li>
<li><a href="http://google.com">Game Page</a></li>
<li><a href="http://google.com">Player Stats</a></li>
</ul>
</div>

<div id="login">
<form method="post" action='login.php' class="inform">
<ul>
<li><label>Username <br></label> <input type="text" name="username">
<li><label><br>Password <br></label> <input type="password" name="password">
<li><label><br>Confirm Password <br></label> <input type="password" name="password">
<li><br><input type=submit>
</ul>
<input type="hidden" name="sendBackTo" 
	value="<?= htmlspecialchars($sendBackTo) ?>">
  </form></div>

<div id="footer">
<p>Copyright and what not here.</p>
</div>