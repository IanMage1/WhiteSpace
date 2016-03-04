<?php
if (!(checkAuth(false) == "")) {
	$id = checkAuth(false);
	$stmt = $mysqli->prepare("select username from users where uid = ?");
	$stmt->bind_param("i",$id);
	if ($stmt->execute()){
		$stmt->bind_result($name);
		$stmt->fetch();
		?>
<p>logged in as <?php echo htmlspecialchars($name) ?> </p>
<?php
		}
	}
?>
</main>
<div id="footer">
<p>Copyright and what not here.</p>
</div></body></html>
<?php mysqli_close($mysqli); ?>
