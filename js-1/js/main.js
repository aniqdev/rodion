// var num
// console.log(num)

// var num2 = 33
// console.log(num2)

var strin = 'my string'
// console.log(strin)

// var nullVar = null
// console.log(nullVar)

// var bool = true
// console.log(bool)



// var array = [1,2,3,4,'asd',false,num2]
// console.log(array)
// console.log(array[4])

function double(val1){
	return val1 * 2
}

var obj = {
	value2_$: 22,
	str: strin,
	'!@#%^&*()' : 'some value',
	hello : 'hello',
	double : function(val1){
		// var variable = 'value'
		// console.log(variable)
		return val1 * 2
	},
	sqr : function(val){
		return val * val
	},
	greeting(name = 'Petya'){
		return this.hello + ' ' + name
	}
}

var value_name = '!@#%^&*()'

console.log(obj)
console.log(obj.greeting())
// console.log(obj[value_name])
// console.log(obj.value2_$)
// var num = 55
// var doubled = double(num)
// console.log(doubled)
// var squared = obj.sqr(doubled)
// console.log(squared)

document.getElementById()


// let
// const
