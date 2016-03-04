<?php include '_header.php' ?>

<HTML>
	<body>
	
	<?php
			echo '<p id="score">Score: 0</p>';
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
