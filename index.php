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
		<form action="javascript:" onsubmit="validateGuess(this)" class="guessForm">
			Guess: <br>
			<input type="text" name="guess" id="guess">
			<input type="submit" value="submit">
		</form>
		<script src="JS/gamescript.js"></script>
	</body>
</HTML>

<?php include '_footer.php' ?>
