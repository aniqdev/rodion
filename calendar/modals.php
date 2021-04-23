<!-- choose create event -->
<div class="modal fade" id="create_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">

        	<div class="col-sm-4">
				<div class="card" id="card_create_first" title="One-on-One meeting">
				  <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false">
				  	<title>Placeholder</title>
				  	<rect width="100%" height="100%" fill="#868e96"></rect>
				  	<text x="35%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text>
				  </svg>
				  <div class="card-body">
				    <h5 class="card-title">One-on-One meeting</h5>
				    <p class="card-text">Some quick example text to build on the card title and make up the bulk o.</p>
				  </div>
				</div>
        	</div>

        	<div class="col-sm-4">
				<div class="card" id="card_create_second" title="Group meeting">
				  <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false">
				  	<title>Placeholder</title>
				  	<rect width="100%" height="100%" fill="#868e96"></rect>
				  	<text x="35%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text>
				  </svg>
				  <div class="card-body">
				    <h5 class="card-title">Group meeting</h5>
				    <p class="card-text">Some quick example text to buildd make up the bulk of the card's content.</p>
				  </div>
				</div>
        	</div>

          <div class="col-sm-4">
        <div class="card" id="card_add_survey">
          <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>Placeholder</title>
            <rect width="100%" height="100%" fill="#868e96"></rect>
            <text x="35%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text>
          </svg>
          <div class="card-body">
            <h5 class="card-title">Survey</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of title and make up the bulk of the card's content.</p>
          </div>
        </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>






<!-- create_first_modal -->
<div class="modal fade" id="create_first_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="create_meeting_title">...</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Owner name:</label>
            <input type="text" class="form-control">
          </div>

          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Enter title:</label>
            <input type="text" class="form-control">
          </div>

          <div class="mb-3">
            <label for="choose-date" class="col-form-label">Choose date:</label>
            <div class="row">
            	<div class="col-sm-4">
            		<input type="text" class="form-control" id="date_inp1" placeholder="Choose date 1">
            	</div>
            	<div class="col-sm-4">
            		<input type="text" class="form-control" id="date_inp2" placeholder="Choose date 2">
            	</div>
            	<div class="col-sm-4">
            		<input type="text" class="form-control" id="date_inp3" placeholder="Choose date 3">
            	</div>
            </div>
          </div>

          <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Add location:</label>
	          <select class="form-select" aria-label="Default select example">
				<option value="1">To be defined</option>
				<option value="2">Conference call</option>
				<option value="3">Phone</option>
				<option value="4">Skype</option>
				<option value="5">Online</option>
				<option value="6">WebEx</option>
				<option value="7">Google Hangouts</option>
				<option value="8">Zoom</option>
			  </select>
          </div>

          <div class="mb-3">
            <label for="message-text" class="col-form-label">Add note:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>











<!-- add_note_modal -->
<div class="modal fade" id="add_note_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add note</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    <form>
      <div class="form-floating mb-3">
        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
        <label for="floatingTextarea2">Comments</label>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
      </div>
    </div>
  </div>
</div>




<!-- add_survey_modal -->
<div class="modal fade" id="add_survey_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add note</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form>
        <div class="questions my-2" id="questions">

        </div>

        <button type="button" class="btn btn-success" id="add_question_btn">Add question</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </form>
      </div>
    </div>
  </div>
</div>


<template id="question_tpl">
  <div class="question mb-2">
    <div class="question-inp-wrapper">
      <input type="text" class="question-inp">
      <button type="button" class="add-option-btn">Add option</button>
      <button type="button" class="del-question-btn"><i class="bi bi-trash-fill del-question"></i></button>
    </div>
  </div>
</template>

<template id="option_tpl">
  <div class="option-wrapper">
    <input type="text" class="option"><i class="bi bi-trash-fill del-option"></i>
  </div>
</template>

<script>
$('#add_question_btn').on('click', function () {
  var question_tpl_html = $('#question_tpl').html()
  $('#questions').append(question_tpl_html)
})

$('#questions').on('click', '.add-option-btn', function(){
  var option_tpl_html = $('#option_tpl').html()
  $(this).parent().parent().append(option_tpl_html)
})

$('#questions').on('click', '.del-question-btn', function(){
  $(this).parent().parent().remove()
})

$('#questions').on('click', '.del-option', function(){
  $(this).parent().remove()
})


</script>