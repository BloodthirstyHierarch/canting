
var carousel = Carousel();
function Carousel(){
	document.getElementById('carousel').onmouseover = stop;
	document.getElementById('carousel').onmouseout = go;
	var lis = document.querySelectorAll("#carousel>li");
	var average = Math.floor(lis.length/2);
	for(var k=0;k<lis.length;k++){
		lis[k].style.left = 10+ (k-average)*80 + '%';
	}
	for(var k=0;k<lis.length;k++){
		lis[k].style.transform = 'rotate(0deg)';
	}

	var auto = setInterval(turn,3000,'left');

	function turn(to){
		for(var j=0;j<lis.length;j++){
			var oleft = parseInt(lis[j].style.left.slice(0,-1));
			var otran = parseInt(lis[j].style.transform.slice(7,-4));
			lis[j].style.zIndex = 5;
			if(to==='left'){
				if(oleft===10-(80*(lis.length-2))){
					lis[j].style.zIndex = 0;
					lis[j].style.left = '90%';
				}else{
					lis[j].style.left = oleft-80 + '%';
				}
			}else{
				if(oleft===10+80*(lis.length-2)){
					lis[j].style.zIndex = 0;
					lis[j].style.left = '-70%';
				}else{
					lis[j].style.left = oleft+80 + '%';
				}
			}
			lis[j].style.transform = 'rotate('+(otran+360)+'deg)';
		}
	}

	function stop(){
		clearInterval(auto);
	}
	function go(){
		auto = setInterval(turn,3000,'left');
	}
	return {
		turn:turn,
	}
};

