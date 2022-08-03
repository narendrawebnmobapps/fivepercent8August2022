<?php $this->load->view('includes/header'); ?>
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
<div class="page-breadcrumb">
	<div class="row">
	    <div class="col-12 d-flex no-block align-items-center">
	        <h4 class="page-title">Add User Test Question</h4>
	        <div class="ml-auto text-right">
	            <nav aria-label="breadcrumb">
	                <ol class="breadcrumb">
	                    <li class="breadcrumb-item"><a href="#">Home</a></li>
	                    <li class="breadcrumb-item active" aria-current="page">Add Test</li>
	                </ol>
	            </nav>
	        </div>
	    </div>
	</div>
</div>
<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <form method="post" action="">
                <div class="row">
                  
                    <div class="col-md-6">
                        <div class="card">
                        <div class="card-body">
                          <div class="form-group">
                            <label>Test Number</label>
                            <input type="number" name="test_number" class="form-control" required>
                          </div>
                          <!-- <div class="form-group">
                            <label for="sel1">Test Question type</label>
                            <select class="form-control" name="question_type" required>
                              <option value="">Select question type</option>
                              <option value="1">Single Choice</option>
                              <option value="2">Multiple Choice</option>
                              <option value="3">Yes/No</option>
                              <option value="4">Percentage</option>
                              <option value="5">Value Enter</option>
                            </select>
                          </div> -->
                          <div class="form-group">
                            <label for="comment">Test question</label>
                            <textarea class="form-control" rows="5" name="question" id="comment" required></textarea>
                          </div>
                          <div class="border-top">
                              <div class="card-body">
                                  <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
                          </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                  <div class="card-body">
                    
                    <div class="input_fields_container">
                      <label>Options</label>
                      <div class="form-group"><input required style="width: 87%;" type="text" name="option[]">
                           <button class="btn btn-sm btn-primary add_more_button">Add</button>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="comment">Correct Option</label>
                      <input type="text" name="correct_option" class="form-control" required />
                    </div>
                </div>
              </div>
            </div>   
                            
          </div>
          </form> 
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>

<?php $this->load->view('includes/footer'); ?>
<script type="text/javascript">
  $(document).ready(function() {
    var max_fields_limit      = 10; //set limit for maximum input fields
    var x = 1; //initialize counter for text box
    $('.add_more_button').click(function(e){ //click event on add more fields button having class add_more_button
        e.preventDefault();
        if(x < max_fields_limit){ //check conditions
            x++; //counter increment
            $('.input_fields_container').append('<div class="form-group"><input type="text" style="width: 87%;" name="option[]"/><a href="#" class="remove_field" style="margin-left:10px;">Remove</a></div>'); //add input field
        }
    });  
    $('.input_fields_container').on("click",".remove_field", function(e){ //user click on remove text links
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});

</script>