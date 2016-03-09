<?php include '_header.php' ?>
	<div id="gameContent">
		<h2 id="score"></h2>
		<canvas id="game"></canvas>
		<form action="javascript:" method="post" onsubmit="validateGuess(this)" id="guessForm" autocomplete="off">
			<h3>Guess:</h3>
			<input type="text" name="guess" id="guess">
			<input type="submit" value="submit">
		</form>
		<div id="howtoplay">
			<h3>How to Play:</h3>
			<p>
			Click anywhere in the white box to reveal a small part of a well known logo. When you think you know what the logo is, type in your guess!
			</p>
		</div>
		<script src="JS/gamescript.js"></script>
	</div>
	
	<div id="winDialog" class="dialog">
		<form action="index.php" method="post">
			<h2>You won!</h2>
			<h3 id="displayScore">Your score: </h3>
			<input type="submit" value="New Game">
		</form>
	</div>
	
	<div id="lossDialog" class="dialog">
		<form action="index.php" method="post">
			<h3>You lost!</h3>
			<h3 id="correctAnswer">The answer was: </h3>
			<input type="submit" value="Play Again">
		</form>
	</div>
	
	<div id="compDialog" class="dialog">
		<form action="index.php" method="post">
			<h3>Your browser is not compatible with this site</h3>
			<p>Please use Google Chrome or Microsoft Edge for the best experience.</p>
		</form>
	</div>
	
<?php include '_footer.php' ?>
