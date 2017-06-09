var myBird;
var pipes = [];
var score;

function startGame(){
	myBird = new component(30, 30, "green", 10, 120)
	myBird.gravity = 0.1;
	score = new component("30px", "Consolas", "black", 280, 40, "text");
	gameArea.start();
}

var gameArea = {
	canvas : document.createElement("canvas"),
	start : function(){
		this.canvas.width = 480;
		this.canvas.height = 270;
		this.context = this.canvas.getContext("2d");
		document.body.insertBefore(this.canvas, document.body.childNodes[0]);
		this.frameNo = 0;
		this.interval = setInterval(updateGameArea, 20);
	},
	clear : function(){
		this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
	}
}

function component(width, height, color, x, y, type){
	this.type = type;
	this.score = 0;
	this.width = width;
	this.height = height;
	this.velX = 0;
	this.velY = 0;
	this.x = x;
	this.y = y;
	this.gravity = 0;
	this.gravityVel = 0;
	this.update = function(){
		ctx = gameArea.context;
		if (this.type == "test"){
			ctx.font=this.width+ " " + this.height;
			ctx.fillStyle = color;
			ctx.fillText(this.text, this.x, this.y);
		}else{
			ctx.fillStyle = color;
			ctx.fillRect(this.x, this.y, this.width, this.height);
		}
	}
	this.newPos = function(){
		this.gravity += this.gravity;
		this.x += this.velX;
		this.y += this.velY + this.gravitySpeed;
		this.hitBottom();
	}
	this.hitBottom = function() {
		var rockBottom = gameArea.canvas.height - this.height;
		if (this.y > rockBottom) {
			this.y = rockBottom;
			this.gravitySpeed = 0;
		}
	}
	this.crashWith = function(otherobj){
		var myLeft = this.x;
		var myRight = this.x + this.width;
		var myTop = this.y;
		var myBottom = this.y + this.height;
		var otherLeft = otherobj.x;
		var otherRight = otherobj.x + this.width;
		var otherTop = otherobj.y;
		var otherBottom = otherobj.y + this.height;
		var crash = true;
		if((myBottom < otherTop) || (myTop > otherBottom) || (myRight < otherLeft) || (myLeft > otherRight)){
			crash = false;
		}
		return crash;
	}
}

function updateGameArea(){
	var x, height, minheight, minGap, maxGap;
	for (i=0; i<pipes.length; i++){
		if(myBird.crashWith( pipes[i] )){
			return;
		}
	}
	gameArea.clear();
	gameArea.frameNo += 1;
	if(gameArea.frameNo == 1 || everyinterval(150)){
		x = gameArea.canvas.width;
		minHeight = 20;
		maxHeight = 200;
		height = Math.floor(Math.random()*(maxHeight-minHeight+1)+minHeight)
		minGap = 20;
		maxGap = 200;
		gap = Math.floor(Math.random()*(maxGap-minGap+1)+minGap);
		pipes.push(new component(10, height, "green", x, 0));
		pipes.push(new component(10, x-height-gap, "green", x, height+gap));
	}
	for (i=0; i<pipes.length; i++){
		pipes[i].x+=1;
		pipes[i].update();
	}
	score.text="SCORE: " + gameArea.frameNp
	score.update();
	myBird.newPos();
	myBird.update();
}

function everyinterval(n){
	if((gameArea.frameNo/n)%1==0){
		return true;	
	}else{
		return false;
	}
}
function accelerate(n){
	myBird.gravity = n;
}