(function(w, d){

const cl = console.log



const create_modal = new bootstrap.Modal(d.getElementById('create_modal'))
const create_first_modal = new bootstrap.Modal(d.getElementById('create_first_modal'))
const add_note_modal = new bootstrap.Modal(d.getElementById('add_note_modal'))
const add_survey_modal = new bootstrap.Modal(d.getElementById('add_survey_modal'))


// create_first_modal.show()

add_survey_modal.show()

const create_event_btn = d.getElementById('create_event_btn')
if(create_event_btn) create_event_btn.addEventListener('click', function(event){
	create_modal.show()
})

const card_create_first = d.getElementById('card_create_first')
const card_create_second = d.getElementById('card_create_second')

if(card_create_first) card_create_first.addEventListener('click', show_create_modal)
if(card_create_second) card_create_second.addEventListener('click', show_create_modal)

function show_create_modal(event){
	// cl(create_meeting_title)
	create_meeting_title.innerText = this.title
	create_first_modal.show()
	create_modal.hide()
}

const add_note_btn = d.getElementById('add_note_btn')
if(add_note_btn) add_note_btn.addEventListener('click', function(event){
	add_note_modal.show()
})

const card_add_survey = d.getElementById('card_add_survey')
if(card_add_survey) card_add_survey.addEventListener('click', function(event){
	add_survey_modal.show()
	create_modal.hide()
})


// datepicker('#date_inp')
const options = {
	format:'d.m.Y H:i',
}
jQuery('#date_inp1').datetimepicker(options)
jQuery('#date_inp2').datetimepicker(options)
jQuery('#date_inp3').datetimepicker(options)


}(window, document))











