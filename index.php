<?php include '_header.php' ?>

	<div id="gameContent">
		<h2 id="score"></h2>
		<canvas id="game"></canvas>
		<form action="javascript:" onsubmit="validateGuess(this)" id="guessForm">
			<h3>Guess:</h3> <br>
			<input type="text" name="guess" id="guess">
			<input type="submit" value="submit">
		</form>
		<script src="JS/gamescript.js"></script>
	</div>
		
<?php include '_footer.php' ?>
