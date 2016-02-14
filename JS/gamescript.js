var c = document.getElementById("game");
var ctx = c.getContext("2d");

var tiles = [];

var logo = {
	id: 0,
	width: 0,
	height: 0,
	widthTiles: 0,
	heightTiles: 0,
}
	

function Start() {
	//request new game from server
	$.ajax({url: "new_game.php", 
		success: function(result) {
			console.log("response from new_game.php: " + result);
			
			//parse received string
			var a = result.split(" ");
			logo.id = parseInt(a[0]);
			logo.width = parseInt(a[1]);
			logo.height = parseInt(a[2]);
			logo.widthTiles = a[3];
			logo.heightTiles = a[4];
		
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
	
		var r = "";
	
		//get base64 encoded image fragment from server
		$.ajax({url:"get_image_frag.php?id=" + logo.id + "&x=" + Math.floor(clickPos.x/(logo.width/logo.widthTiles)) + "&y=" + Math.floor(clickPos.y/(logo.height/logo.heightTiles)),
			success: function(result) {
				r = result;
				var img = new Image();
				img.src = 'data:image/jpeg;base64,' + r;
				//draw new image fragment
				ctx.drawImage(img, clickPos.x-clickPos.x%(logo.width/logo.widthTiles), clickPos.y-clickPos.y%(logo.height/logo.heightTiles));
				//set tile to 1 in array so we know if this tile has been clicked
				tiles[Math.floor(clickPos.x/(c.clientWidth/logo.heightTiles))][Math.floor(clickPos.y/(c.clientHeight/logo.heightTiles))] = 1;
			}
		});
	}
});

Start();