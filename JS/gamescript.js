var c = document.getElementById("game");
var ctx = c.getContext("2d");

var tiles = [];

var score = 0;

var logo = {
	address: "",
	width: 0,
	height: 0,
	widthTiles: 0,
	heightTiles: 0,
}
	

function Start() {
	//request new game from server
	$.ajax({
		url: "new_game.php", 
		type: "POST",
		success: function(result) {
			console.log("response from new_game.php: " + result);
			
			//parse received string
			var a = result.split(" ");
			logo.address = a[0];
			logo.width = parseInt(a[1]);
			logo.height = parseInt(a[2]);
			logo.widthTiles = a[3];
			logo.heightTiles = a[4];
			//set score
			score = a[5];
			
			WriteScore(score);
			
			//set up canvas
			c.width = logo.width;
			c.height = logo.height;
			ctx.fillColor = "#00";
			ctx.fillRect(0, 0, logo.width, logo.height);
			
			//initialize tiles array
			for(var i=0; i<logo.widthTiles; i++) {
				tiles[i] = [];
				
				for(var j=0; j<logo.heightTiles; j++) {
					tiles[i][j] = 0;
				}
			}
		}
	});
}

c.addEventListener('click',function(event) {
	var clickPos = {
		x: event.x-c.offsetLeft,
		y: event.y-c.offsetTop,
	}
	
	var tile = tiles[Math.floor(clickPos.x/(c.clientWidth/logo.widthTiles))][Math.floor(clickPos.y/(c.clientHeight/logo.heightTiles))];
	
	if(tile == 0) {
	
		//get base64 encoded image fragment from server
		$.ajax({url:"get_image_frag.php?address=" + logo.address +  
			"&x=" + Math.floor(clickPos.x/(logo.width/logo.widthTiles)) + 
			"&y=" + Math.floor(clickPos.y/(logo.height/logo.heightTiles)),
			type: "POST",
			success: function(result) {
				var a = result.split(" ");
				var img = new Image();
				img.src = 'data:image/jpeg;base64,' + a[0];
				//draw new image fragment
				ctx.drawImage(img, clickPos.x-clickPos.x%(logo.width/logo.widthTiles), clickPos.y-clickPos.y%(logo.height/logo.heightTiles));
				//set tile to 1 in array so we know if this tile has been clicked
				tiles[Math.floor(clickPos.x/(c.clientWidth/logo.heightTiles))][Math.floor(clickPos.y/(c.clientHeight/logo.heightTiles))] = 1;
				//display updated score
				WriteScore(a[1]);
			}
		});
	}
});

function WriteScore(s) {
	$("#score").html("Score: " + s);
}

function validateGuess(frm) {
	var guess = document.getElementById("guess").value;
	
	$.ajax({url:"validate_guess.php?guess=" + guess + "&path=" + logo.address, 
		type: "POST", 
		success: function(result) {
			var a = result.split(" ");
			if(a[0] == "1") {
				//user has won. display winning message here
				console.log("That's correct!");
			}
			else if(a[0] == "2") {
				//user is out of points. End the game.
				console.log("game Over!")
				WriteScore(0);
			}
			else {
				//user has guessed wrong. decrement score here.
				console.log("Wrong!");
				WriteScore(a[1]);
			}
		}
	});
}

Start();