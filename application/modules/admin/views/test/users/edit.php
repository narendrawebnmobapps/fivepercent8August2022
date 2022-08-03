<?php $this->load->view('includes/header'); ?>
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
<div class="page-breadcrumb">
	<div class="row">
	    <div class="col-12 d-flex no-block align-items-center">
	        <h4 class="page-title">Edit Test Question</h4>
	        <div class="ml-auto text-right">
	            <nav aria-label="breadcrumb">
	                <ol class="breadcrumb">
	                    <li class="breadcrumb-item"><a href="#">Home</a></li>
	                    <li class="breadcrumb-item active" aria-current="page">Test Question</li>
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
                <?php //print_r($this->uri->segment(4)); ?>
                <?php //echo "<pre>"; print_r($questions[0]['question']->question); ?>
                <form method="post" action="">
                  <input type="hidden" name="question_id" value="<?php echo $questions[0]['question']->id; ?>">
                <div class="row">
                  
                    <div class="col-md-6">
                        <div class="card">
                        <div class="card-body">
                        <div class="form-group">
                            <label>Test Number</label>
                            <input type="number" name="test_number" class="form-control" value="<?php echo $questions[0]['question']->test_number; ?>" required>
                          </div>
                        <!-- <div class="form-group">
                          <label for="sel1">Question type</label>
                          <select class="form-control" name="question_type" required>
                            <option value="">Select question type</option>
                            <option <?php if($questions[0]['question']->question_type==1){ echo 'selected'; } ?> value="1">Single Choice</option>
                            <option <?php if($questions[0]['question']->question_type==2){ echo 'selected'; } ?> value="2">Multiple Choice</option>
                            <option <?php if($questions[0]['question']->question_type==3){ echo 'selected'; } ?> value="3">Yes/No</option>
                            <option <?php if($questions[0]['question']->question_type==4){ echo 'selected'; } ?> value="4">Percentage</option>
                            <option <?php if($questions[0]['question']->question_type==5){ echo 'selected'; } ?> value="5">Value Enter</option>

                          </select>
                        </div> -->
                        <div class="form-group">
                      <label for="comment">Question</label>
                      <textarea class="form-control" rows="5" name="question" id="comment" required><?php echo $questions[0]['question']->question; ?></textarea>
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
                      <?php 

                        $correct_option = '';
                        $in = 1;
                        foreach($questions[0]['options'] as $option)
                        {
                          if($option->correct_option==1)
                          {
                            $correct_option = $option->options;
                          }
                      ?>
                      <div class="form-group">
                        <input value="<?php echo $option->options; ?>" style="width: 87%;" type="text" name="option[]" required>
                        <input type="hidden" name="option_id[]" value="<?php echo $option->id; ?>">
                          <?php if($in==1){ ?>
                           <button class="btn btn-sm btn-primary add_more_button">Add</button>
                           <?php }  else {?>
                           <a href="#" data-id="<?php echo $option->id; ?>" class="remove_field">Remove</a>
                           <?php } ?>
                      </div>
                      <?php $in++; } ?>
                    </div>
                    <div class="form-group">
                      <label for="comment">Correct Option</label>
                      <input type="text" name="correct_option" class="form-control" value="<?php echo $correct_option; ?>" required />
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
        if(x < max_fields_limit)
        { //check conditions
            x++; //counter increment
            $('.input_fields_container').append('<div class="form-group"><input type="text" style="width: 87%;" name="option[]"/><a href="#" class="remove_field" data-id="" style="margin-left:10px;">Remove</a></div>'); //add input field
        }
    });  
    $('.input_fields_container').on("click",".remove_field", function(e){ //user click on remove text links
        e.preventDefault(); 
        var rowid = $(this).attr('data-id');
        //alert(rowid);
        $.ajax({
              url:'<?php echo base_url("admin/test/remove_test_question_options"); ?>',
              type:'POST',
              data:{rowid:rowid},
              dataType:'html',
              success:function(data){
                //alert(data);
              }
        });
        $(this).parent('div').remove();
        x--;
    })
});

</script>