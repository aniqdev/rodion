(function(w, d){

const cl = console.log



const create_modal = new bootstrap.Modal(d.getElementById('create_modal'))
const create_first_modal = new bootstrap.Modal(d.getElementById('create_first_modal'))

create_first_modal.show()

const create_event_btn = d.getElementById('create_event_btn')
create_event_btn.addEventListener('click', function(event){
	create_modal.show()
})

const card_create_first = d.getElementById('card_create_first')
card_create_first.addEventListener('click', function(event){
	create_first_modal.show()
	create_modal.hide()
})





}(window, document))











