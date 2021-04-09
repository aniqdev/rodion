var cl = console.log
$(document).ready(function(){

	get_todo_items()

	$('#todo_form').on('submit', function(event){
		event.preventDefault()
		var todo_text = $('#todo_input').val()
		if(!todo_text.length) return false
		var li = $('#li_tpl').html().replace('{{todo_text}}', todo_text)
		$("#todo_list").append(li);
		$('#todo_input').val('')
		save_todo_items()
	})

	$('#todo_list').on('click', '.del-btn', function(event){
		$(this).parent().remove()
		save_todo_items()
	})

	$('#todo_list').on('click', '.up-btn', function(event){
		var li = $(this).parent()
		$(li).insertBefore($(li).prev());
		save_todo_items()
	})

	$('#todo_list').on('click', '.down-btn', function(event){
		var li = $(this).parent()
		$(li).insertAfter($(li).next());
		save_todo_items()
	})

	$('#toggle_todo').on('click', function(event){
		get_todo_items()
		$('#todo_list_container').toggleClass('show')
		if($('#todo_list_container').hasClass('show')){
			$(this).text('Hide ToDo')
		}else{
			$(this).text('Show ToDo')
		}
	})


});


function get_todo_items(){
	$.post('ajax.php', 
		{action:'get_todo_items'},
		function(data){
			cl(data)
			data.forEach(function(item){
				var li = $('#li_tpl').html().replace('{{todo_text}}', item)
				$("#todo_list").append(li);
			})
	},'json')
}


function save_todo_items() {
	var items_arr = []
	document.querySelectorAll('.todo-list-item').forEach(function(item){
		items_arr.push(item.innerHTML)
	})
	// cl(items_arr)


	$.post('ajax.php', 
		{items_arr: items_arr},
		function(data){
			cl(data)
	},'json')
}



Sortable.create(document.getElementById('todo_list'), {
	// handle: '.glyphicon-move',
	animation: 150,
	// Called by any change to the list (add / update / remove)
	onSort: function () {
		save_todo_items()
	},
});






function shufflePuzzleParts() {
	const puzzleParts = [1, 2, 3, 4, 5, 6, 7, 8, 9];
	let counter = puzzleParts.length;
	while (counter > 0) {
		const index = Math.floor(Math.random() * counter);
		counter--;
		const temp = puzzleParts[counter];
		puzzleParts[counter] = puzzleParts[index];
		puzzleParts[index] = temp;
	}
	return puzzleParts;
}