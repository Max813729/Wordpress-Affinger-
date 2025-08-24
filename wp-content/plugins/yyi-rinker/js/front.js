/**
 * 画像を切り替える
 * @param e
 * @param move
 */
let toggle_images = function(target, move){
	let children = target.parentElement.childNodes;
	let thumbs = target.parentElement.parentElement.childNodes[2].childNodes;
	let active_index = 0;
	for (let j = 0; j < children.length; j++) {
		if (children[j].classList.contains('yyi-rinker-main-img')) {
			if (!children[j].classList.contains('hidden')) {
				active_index = j;
			}
			children[j].classList.add('hidden');
		}
	}
	if (move === 'left') {
		if (children[active_index - 1].classList.contains('yyi-rinker-main-img')) {
			active_index = active_index - 1;
		}
	} else {
		if (children[active_index + 1].classList.contains('yyi-rinker-main-img')) {
			active_index = active_index + 1;
		}
	}

	if (active_index == children.length - 2) {
		children[0].classList.remove('hidden');
		children[children.length - 1].classList.add('hidden');
	} else if(active_index == 1) {
		children[0].classList.add('hidden');
		children[children.length - 1].classList.remove('hidden');
	} else {
		children[0].classList.remove('hidden');
		children[children.length - 1].classList.remove('hidden');
	}
	if (thumbs.length > 0) {
		for (let k = 0; k < thumbs.length; k++) {
			thumbs[k].classList.remove('thumb-active');
		}
		thumbs[active_index - 1].classList.add('thumb-active');
	}

	children[active_index].classList.remove('hidden');
}

/**
 * 画像を切り替えるイベントを追加
 */
let setImageToggle = function() {
	let arrow_types = ['left', 'right'];
	for (let i = 0; i < arrow_types.length; i++) {
		let direction = arrow_types[i];
		let arrows = document.getElementsByClassName("yyi-rinker-images-arrow-" + direction);
		for (let j = 0; j < arrows.length; j++) {
			arrows[j].addEventListener("click", function(e) {
				toggle_images(e.target, direction);
			}, false);
		}
	}
}

/*
* スワイプイベント設定
*/
let setImageSwipe = function(className) {
	let elements = document.getElementsByClassName(className);
	let startX;
	let startY;
	let moveX;
	let moveY;
	let dist = 30;
	let target;

	for (let i = 0; i < elements.length; i++) {
		let element =  elements[i];
		element.addEventListener('touchstart', function (e) {
			startX = e.touches[0].pageX;
			startY = e.touches[0].pageY;
		});

		element.addEventListener('touchmove', function (e) {
			moveX = e.changedTouches[0].pageX;
			moveY = e.changedTouches[0].pageY;
		});

		element.addEventListener('touchend', function (e) {
			target = e.target;
			if (startX > moveX && startX > moveX + dist) {
				toggle_images(target, 'right');
			} else if (startX < moveX && startX + dist < moveX) {
				toggle_images(target, 'left');
			}
		});
	}
}

/**
 * サムネイルクリックで画像を切り替えるイベントを追加
 */
let setThumbImageToggle = function() {
	let items = document.getElementsByClassName("yyi-rinker-thumbnails");
	for (let i = 0; i < items.length; i++) {
		let parent = items[i];
		let childrenitems = items[i].childNodes;
		let liitems = [];
		for(let m = 0; m < childrenitems.length; m++) {
			if (childrenitems[m].tagName == 'LI'){
				liitems.push(childrenitems[m]);
			}
		}
		for(let j = 0; j < liitems.length; j++) {
			liitems[j].addEventListener("click", function(e) {
				let mainImages = parent.parentNode.parentNode.childNodes[1].childNodes[1].childNodes;
				let leftArrow = mainImages[0].classList.contains('yyi-rinker-images-arrow') ? mainImages[0] : null;
				let rightArrow = mainImages[mainImages.length - 1].classList.contains('yyi-rinker-images-arrow') ? mainImages[mainImages.length - 1] : null;
				let index = mainImages[0].classList.contains('yyi-rinker-images-arrow') ? j + 1 : j;
				leftArrow.classList.remove('hidden');
				rightArrow.classList.remove('hidden');
				for (let l = 0; l < liitems.length; l++) {
					liitems[l].classList.remove('thumb-active');
				}
				e.target.parentNode.classList.add('thumb-active');

				for(let k = 0; k < mainImages.length; k++) {
					if (mainImages[k].classList.contains('yyi-rinker-main-img'))
					{
						if (index === k) {
							if (index === 1) {
								leftArrow.classList.add('hidden');
							}
							if (index === mainImages.length - 2) {
								rightArrow.classList.add('hidden');
							}
							mainImages[k].classList.remove('hidden');
						} else {
							mainImages[k].classList.add('hidden');
						}
					}
				}
			}, false);
		}

	}
}


window.addEventListener('load', function(){
	setThumbImageToggle();
	setImageToggle();
	setImageSwipe("yyi-rinker-images");
});
