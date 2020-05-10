onload  = start;

function start(){	
var i = 1;
var img = 1;
function Move(){ 	
	i = (i%5)+1; // 5 is the Number of image in slider
	document.getElementById('i'+i).checked = true;

}

function MoveImg(){ 	
	img = (img%5)+1; // 5 is the Number of image in slider
	document.getElementById('img'+img).checked = true;
}

setInterval(Move,3000); //change img in 3 sec
setInterval(MoveImg,4000); //change img in 3 sec
}
