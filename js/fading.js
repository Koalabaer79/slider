function loopImagesFade (index) {
	var imgPath = folder+images[index];
	load_img(imgPath,index);
	index++;
	fadingInterval = setInterval(function() {
		if(index >= imgCount) {
			index = 0;
		}
		imgPath = folder+images[index];
		load_img(imgPath,index);
		index++;
	}, imgStay );
}

function load_img(path,index) {
	var imgDiv = document.getElementById('imgFading');
	var item = document.getElementById('itemFading'+index);
	for(i=0;i<images.length;i++) {
		document.getElementById('itemFading'+i).classList.remove('itemActive');
	}
	item.classList.add('itemActive');
	toggleClasslist();
	imgDiv.style.animationDelay = "0s, "+(imgSeconds-1)+"s";
	imgDiv.src = path;
	var svgLeft = document.getElementById('svgLeftFading');
	var svgRight = document.getElementById('svgRightFading');
	if(index == 0) {
		svgLeft.setAttribute('onclick',"setFadingIndex("+(images.length - 1)+")");
		svgRight.setAttribute('onclick',"setFadingIndex("+(index + 1)+")");
	}else if(index == 8){
		svgLeft.setAttribute('onclick',"setFadingIndex("+(index - 1)+")");
		svgRight.setAttribute('onclick',"setFadingIndex(0)");
	}else{
		svgLeft.setAttribute('onclick',"setFadingIndex("+(index - 1)+")");
		svgRight.setAttribute('onclick',"setFadingIndex("+(index + 1)+")");
	}
};

function setFadingIndex(index) {
	clearInterval(fadingInterval);
	loopImagesFade (index);
}

function toggleClasslist(){
	var imgDiv = document.getElementById('imgFading');
	imgDiv.classList.toggle('fading');
	imgDiv.classList.toggle('fading_2');
}

function fadingItem () {
	var itemChoser = document.getElementById('itemFading');
	i = 0;
	images.forEach(el => {
		var item = document.createElement('div');
		item.id = "itemFading"+i;
		item.className = 'item';
		item.setAttribute('onclick','setFadingIndex('+i+')');
		itemChoser.appendChild(item);
		i++;
	});
}