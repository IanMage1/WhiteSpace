<?php include '_header.php' ?>

<HTML>
	<head>
		<script src="JS/jquery-1.12.0.js"></script>
	</head>
	
	<body>
	<p>This is our website</p>
	
	<?php
			$score = 0;
			echo '<p id="score">Score: ' . $score . '</p>';
		?>
		<canvas id="game"></canvas>
		<script src="JS/gamescript.js"></script>
	</body>
</HTML>

<?php include '_footer.php' ?>
