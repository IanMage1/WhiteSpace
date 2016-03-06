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
		<footer>
			<p>&copy; 2016 Whitespace LTD.</p>
		</footer>
	</body>
</html>

<?php mysqli_close($mysqli); ?>
