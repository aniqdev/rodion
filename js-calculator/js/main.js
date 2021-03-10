function calculate(action) {
	var digit1 = document.getElementById('digit1')
	var digit2 = document.getElementById('digit2')
	var value1 = parseFloat(digit1.value.replace(/[^\d-\.]/g,''))
	var value2 = parseFloat(digit2.value.replace(/[^\d-\.]/g,''))
	if(!value1){
		alert('Enter first digit')
		return;
	}
	if(!value2){
		alert('Enter second digit')
		return;
	}
	var result, history
	switch (action) {
	  case '+':
	    result = value1 + value2
	    break;
	  case '-':
	    result = value1 - value2
	    break;
	  case '/':
	    result = value1 / value2
	    break;
	  case '*':
	    result = value1 * value2
	    break;
	}
	result = result.toFixed(2)
	history = value1 + ' ' + action + ' ' + value2 + ' = ' + result
	// console.log(result)
	var result_tag = document.getElementById('result')
	// console.log(result_tag)
	result_tag.innerHTML = result

	var history_tag = document.getElementById('history')
	// console.log(history_tag)
	history_tag.append(history);
	history_tag.append(document.createElement("br"));
}

// var result_tag = document.getElementById('result')
// console.log(result_tag)
// result_tag.innerHTML = 'Placeholder for result'