var cl = console.log

cl('it works!')

// el.addEventListener("click", function(){

// });


// class Pic {
// 	constructor(card) {
// 		this.card = card;  
// 	}
// }

var connections = {
	card8: 'card9',
	card9: 'card8',
	card5: 'card12',
	card12: 'card5',
	card2: 'card15',
	card15: 'card2',
	card7: 'card10',
	card10: 'card7',
	card4: 'card13',
	card13: 'card4',
	card6: 'card11',
	card11: 'card6',
	card3: 'card14',
	card14: 'card3',
	card1: 'card16',
	card16: 'card1',
}

let pics_arr = []
for(let i = 1; i <= 16; i++){
	// pics_arr.push(new Pic('card'+i))
	pics_arr.push('card'+i)
}
cl(pics_arr)
shuffle(pics_arr);

var do_blue_timeout = 0
var is_first_pic = true
var first_card
var first_el = false
var second_el = false
var tries = 0

function col_click(el){
	if(el.classList.contains('grey')) return false
	el.classList.remove('blue')
	var index = el.dataset.index
	var pic = pics_arr[index]
	cl(pic)
	el.classList.add(pic) // открытие картинки
	if (is_first_pic) {// открыли перыую
		// тут запуск таймера
		first_card = pic
		is_first_pic = false
		if(first_el){
			do_blue(first_el)
			first_el = false
			clearTimeout(do_blue_timeout)
		}
		if(second_el){
			do_blue(second_el)
			second_el = false
		}
		first_el = el
	}else{ // открыли вторую
		second_el = el
		// сравнение картинок
		if(connections[first_card] === pic){
			cl('MATCH!!!')
			// делаем их серыми
			do_grey(first_el)
			do_grey(second_el)
			first_el = false
			second_el = false
		}else{
			do_blue_timeout = setTimeout(function(){
				do_blue(first_el)
				do_blue(second_el)
				first_el = false
				second_el = false
			}, 1000);
		}
		is_first_pic = true
		document.getElementById('tries_counter').innerHTML = ++tries
	}
	
}


function do_grey(el){
	var index = el.dataset.index
	var pic = pics_arr[index]
	el.classList.remove(pic)
	el.classList.remove('blue')
	el.classList.add('grey')
	var grey_elems = document.querySelectorAll(".grey")
	if(grey_elems.length === 16) stop_game()
}

function do_blue(el){
	var index = el.dataset.index
	var pic = pics_arr[index]
	el.classList.remove(pic)
	el.classList.remove('grey')
	el.classList.add('blue')
}



function enter_name_submit(event, form){
	event.preventDefault()
	var name = document.getElementById('name_input').value
	form.innerHTML = name
	run_counter()
	var grey_elems = document.querySelectorAll(".grey")
	grey_elems.forEach(function(element){
	  do_blue(element)
	})
}




var cancelTimer
var seconds = 0
function run_counter(){
	var el = document.getElementById('seconds_counter');

	function tick() {
	    seconds += 1;
	    el.innerText = seconds;
	}

	cancelTimer = setInterval(tick, 1000);
}



function stop_game(){
	clearInterval(cancelTimer)
	document.getElementById('seconds_counter').innerText = 'Done in ' + seconds + ' seconds'
}




function shuffle(array) {
	array.sort(() => Math.random() - 0.5);
}




