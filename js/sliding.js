function loadImages() {
	var wrapper = document.getElementById('wrapperSliding');
	var imgWrapper = document.getElementById('imgWrapper')
	var banner = document.getElementById('bannerSliding');
	var i = 0;
	var arrHeight = [];
	var arrWidth = [];
	images.forEach(el => {		
		var img = document.createElement('img');

		img.id = "imgSliding"+i;
		img.className = 'imgSlider';
		img.src= folder+el;
		imgWrapper.appendChild(img);

		const imgNew = new Image();
		imgNew.onload = function() {
			arrHeight.push(this.height);
			arrWidth.push(this.width);
			wrapper.style.height = Math.min(...arrHeight);
			imgWrapper.style.height = Math.min(...arrHeight);
			banner.style.height = Math.min(...arrHeight);
			wrapper.style.width = Math.min(...arrWidth);
		}
		imgNew.src= folder+el;
		i++;

	});
	animSlide(imgIndex);
}

function moveImg(index,indexPos) {
	var wrapper = document.getElementById('imgWrapper');
	wrapper.style.left = indexPos;
	var item = document.getElementById('itemSliding'+index);
	for(i=0;i<images.length;i++) {
		document.getElementById('itemSliding'+i).classList.remove('itemActive');
	}
	item.classList.add('itemActive');
	var svgLeft = document.getElementById('svgLeft');
	var svgRight = document.getElementById('svgRight');
	if(index == 0) {
		svgLeft.setAttribute('onclick',"setSlidingIndex("+(images.length - 1)+")");
		svgRight.setAttribute('onclick',"setSlidingIndex("+(index + 1)+")");
	}else if(index == 8){
		svgLeft.setAttribute('onclick',"setSlidingIndex("+(index - 1)+")");
		svgRight.setAttribute('onclick',"setSlidingIndex(0)");
	}else{
		svgLeft.setAttribute('onclick',"setSlidingIndex("+(index - 1)+")");
		svgRight.setAttribute('onclick',"setSlidingIndex("+(index + 1)+")");
	}
};

function setSlidingIndex(index) {
	clearInterval(sliderInterval)
	animSlide(index);
}

function animSlide (index) {
	moveImg(index, index * -640);
	index++;
	sliderInterval = setInterval(function() {
		if(index >= imgCount) {
			index = 0;
		}		
		moveImg(index, index * -640);
		index++;
	}, imgStay );
}

function slidingItem () {
	var itemChoser = document.getElementById('itemSliding');
	i = 0;
	images.forEach(el => {
		var item = document.createElement('div');
		item.id = "itemSliding"+i;
		item.className = 'item';
		item.setAttribute('onclick','setSlidingIndex('+i+')');
		itemChoser.appendChild(item);
		i++;
	});
}