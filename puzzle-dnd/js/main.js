(function(w, d){

const cl = console.log


const browser_name_el = d.getElementById('browser_name')
browser_name_el.innerText = browser_name()


const game_wrapper	= d.createElement('ul')
game_wrapper.className = 'game-wrapper'
game_wrapper.id = 'game_wrapper'

browser_name_el.after(game_wrapper);


const numbers = shufflePuzzleParts()
for(let i = 0; i < 9; i++){
	let card = d.createElement('li')
	card.style['background-image'] = 'url(images/img' + numbers[i] + '.jpg)'
	card.id = 'img' + (i+1)
	card.slot = i+1
	card.cardName = 'img' + numbers[i]
	game_wrapper.appendChild(card)
	// card.ondragstart = function() { return false } // если мяч картинка
}

let last_slot_over = 0
game_wrapper.querySelectorAll('li').forEach(function(li){
	aqs_drag_and_drop(li, game_wrapper, function(perc_x, perc_y){
		// cl(perc_x, perc_y)
		// perc_x_inp.value = perc_x
		// perc_y_inp.value = perc_y
		// cl()
		// cl(w.current_card_slot)
		let current_slot_over = w.current_slot_over = what_card_mouse_over(perc_x, perc_y)
		if(last_slot_over && last_slot_over !== current_slot_over){
			cl('move card', last_slot_over, current_slot_over, w.current_card_slot)

		}
		last_slot_over = current_slot_over
	})
})


function what_card_mouse_over(perc_x, perc_y){
	if (perc_y < 25) {
		if (perc_x < 25) return 1
		if (perc_x > 75) return 3
		return 2
	}
	if (perc_y > 75) {
		if (perc_x < 25) return 7
		if (perc_x > 75) return 9
		return 8
	}
	if (perc_x < 25) return 4
	if (perc_x > 75) return 6
	return 5
}

let is_first_click = true
let last_card
// game_wrapper.addEventListener('click', img_click_handler)

function img_click_handler(event){
	const current_card = event.target
	if(current_card.tagName !== 'LI') return false
	// let images = game_wrapper.querySelectorAll('li')
	// cl(images)
	if(is_first_click){
		current_card.classList.add('marked')
		is_first_click = false
	}else{
		game_wrapper.querySelectorAll('li').forEach(function(img){
			img.classList.remove('marked')
		})
		const carrent_id = current_card.id
		const last_id = last_card.id
		current_card.id = last_id
		last_card.id = carrent_id
		// let images = game_wrapper.querySelectorAll('li')
		// let temp1 = images[0].cloneNode()
		// let temp2 = images[8].cloneNode()
		// images[0].replaceWith(temp2)
		// images[8].replaceWith(temp1)
		is_first_click = true
	}
	if(is_game_done()){
		game_wrapper.removeEventListener('click', img_click_handler);
		game_wrapper.classList.add('img-no-padding')
		browser_name_el.innerText = 'Congrats!!!'
	}
	last_card = current_card
}

function is_game_done() {
	let is_done = true
	game_wrapper.querySelectorAll('li').forEach(function(img){
		if(img.cardName !== img.id) is_done = false
		else console.log(img.cardName, img.id)
	})
	return is_done
}


}(window, document))



function shufflePuzzleParts() {
	const puzzleParts = [1, 2, 3, 4, 5, 6, 7, 8, 9];
	puzzleParts.sort(() => Math.random() - 0.5);
	return puzzleParts;
}



function browser_name(){
	var sBrowser, sUsrAg = navigator.userAgent;

	//The order matters here, and this may report false positives for unlisted browsers.

	if (sUsrAg.indexOf("Firefox") > -1) {
	     sBrowser = "Mozilla Firefox";
	     //"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko/20100101 Firefox/61.0"
	} else if (sUsrAg.indexOf("Opera") > -1) {
	     sBrowser = "Opera";
	} else if (sUsrAg.indexOf("Trident") > -1) {
	     sBrowser = "Microsoft Internet Explorer";
	     //"Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; .NET4.0C; .NET4.0E; Zoom 3.6.0; wbx 1.0.0; rv:11.0) like Gecko"
	} else if (sUsrAg.indexOf("Edge") > -1) {
	     sBrowser = "Microsoft Edge";
	     //"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 Edge/16.16299"
	} else if (sUsrAg.indexOf("Chrome") > -1) {
	    sBrowser = "Google Chrome";
	    //"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/66.0.3359.181 Chrome/66.0.3359.181 Safari/537.36"
	} else if (sUsrAg.indexOf("Safari") > -1) {
	    sBrowser = "Safari";
	    //"Mozilla/5.0 (iPhone; CPU iPhone OS 11_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/11.0 Mobile/15E148 Safari/604.1 980x1306"
	} else {
	    sBrowser = "unknown";
	}
	return sBrowser
}



document.addEventListener('mouseup', function() {
	if (window.current_card_slot && window.current_slot_over) {
		console.log(window.current_card_slot, window.current_slot_over)
		let card1 = document.getElementById('img'+window.current_card_slot)
		let card2 = document.getElementById('img'+window.current_slot_over)
		console.log(window.current_card_slot, window.current_slot_over, card1, card2)
		card1.id = 'img'+window.current_slot_over
		card2.id = 'img'+window.current_card_slot
		card1.style.removeProperty('left')
		card1.style.removeProperty('top')
	}
})












    var cork = document.createElement('div')
    function get_element(id) {
      return document.getElementById(id) || cork;
    }

    function between(int, low, high) {
   		return int < low ? low : int > high ? high : int
    }

    var z_index = 1;

	function aqs_drag_and_drop(inner, outer, callback) {
		let shift = {mouseX:0,mouseY:0}
		let limits = {top:0, left:0}

		function onMouseMove(event) {

		  	let left = event.clientX - shift.wrapperX - shift.mouseX
		  	left = between(left, limits.left, limits.right)
			inner.style.left = left + 'px'

		  	let top = event.clientY - shift.wrapperY - shift.mouseY
		  	top = between(top, limits.top, limits.bottom)
		  	inner.style.top = top + 'px'

		  	var perc_x = left*100/limits.right
		  	var perc_y = top*100/limits.bottom
		  	callback(perc_x, perc_y)

		    // input1.value = inner.style.cssText
		}

		function setLimits(event, no_mouse) {
		  inner.rect = inner.getBoundingClientRect()
		  outer.rect = outer.getBoundingClientRect()

		  if(no_mouse !== 'no_mouse') shift.mouseX = event.clientX - inner.rect.left
		  else shift.mouseX = inner.rect.width / 2
		  if(no_mouse !== 'no_mouse') shift.mouseY = event.clientY - inner.rect.top
		  else shift.mouseY = inner.rect.height / 2

		  shift.wrapperX = outer.rect.left
		  shift.wrapperY = outer.rect.top

		  limits.right = outer.rect.width - inner.rect.width
		  limits.bottom = outer.rect.height - inner.rect.height
		  console.log(shift)
		  console.log(limits)
		}

		inner.addEventListener('mousedown', function(event) {
		  event.stopPropagation();
		  setLimits(event)
		  inner.style['z-index'] = z_index++
		  window.current_card_slot = inner.slot
		  inner.classList.add('no-transition')
		  // передвигаем мяч при событии mousemove
		  document.addEventListener('mousemove', onMouseMove);
		})

		// отпустить мяч, удалить ненужные обработчики
		document.addEventListener('mouseup', function() {
			inner.classList.remove('no-transition')
			document.removeEventListener('mousemove', onMouseMove);
		})

		// outer.addEventListener('mousedown', function(event) {
		//     event.stopPropagation();
		//     setLimits(event, 'no_mouse')
		// 	onMouseMove(event)
		// })

		inner.ondragstart = function() { return false } // если мяч картинка

	}
