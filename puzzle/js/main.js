(function(w, d){

const cl = console.log


const browser_name_el = d.getElementById('browser_name')
browser_name_el.innerHTML = browser_name()


const game_wrapper	= d.createElement('div')
game_wrapper.className = 'game-wrapper'
game_wrapper.id = 'game_wrapper'

browser_name_el.after(game_wrapper);


const numbers = shufflePuzzleParts()
for(let i = 0; i < 9; i++){
	let img = d.createElement('img')
	img.src = 'images/img' + numbers[i] + '.jpg'
	img.className = 'img' + (i + 1)
	img.id = 'img' + numbers[i]
	game_wrapper.appendChild(img)
	img.ondragstart = function() { return false } // если картинка
}


let is_first_click = true
let last_card
game_wrapper.addEventListener('click', img_click_handler)

function img_click_handler(event){
	const current_card = event.target
	if(current_card.tagName !== 'IMG') return false
	// let images = game_wrapper.querySelectorAll('img')
	// cl(images)
	if(is_first_click){
		current_card.classList.add('marked')
		is_first_click = false
	}else{
		game_wrapper.querySelectorAll('img').forEach(function(img){
			img.classList.remove('marked')
		})
		const current_card_class = current_card.className
		const last_card_class = last_card.className
		current_card.className = last_card_class
		last_card.className = current_card_class

		is_first_click = true
	}

	if (is_game_done()) {
		let congrats = d.createElement('div')
		congrats.className = 'congrats'
		congrats.innerText = 'Congratulations!!!'
		game_wrapper.appendChild(congrats)
		game_wrapper.classList.add('game-done')
		game_wrapper.removeEventListener('click', img_click_handler)
	}

	
	last_card = current_card
}

function is_game_done(){
	let game_done = true
	game_wrapper.querySelectorAll('img').forEach(function(img){
		if(img.className !== img.id) game_done = false
	})
	return game_done
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











