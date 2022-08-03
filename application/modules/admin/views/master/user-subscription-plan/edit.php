<?php $this->load->view('includes/header'); ?>
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
<div class="page-breadcrumb">
	<div class="row">
	    <div class="col-12 d-flex no-block align-items-center">
	        <h4 class="page-title">Edit User Subscription Plan</h4>
	        <div class="ml-auto text-right">
	            <nav aria-label="breadcrumb">
	                <ol class="breadcrumb">
	                    <li class="breadcrumb-item"><a href="#">Home</a></li>
	                    <li class="breadcrumb-item active" aria-current="page">User Subscription Plan</li>
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
                  <input type="hidden" name="plan_id" value="<?php echo $subscriptions[0]['subscription']->id; ?>">
                <div class="row">
                  
                    <div class="col-md-6">
                        <div class="card">
                        <div class="card-body">                       
                        <div class="form-group">
                          <label for="sel1">Plan Name</label>
                          <input type="text" name="planName" value="<?php echo $subscriptions[0]['subscription']->plan_name; ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label for="sel1">Price</label>
                          <input type="text" name="price" value="<?php echo $subscriptions[0]['subscription']->price; ?>" class="form-control" required>
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
                        //print_r($questions[0]['options']); 
                        $in = 1;
                        foreach($subscriptions[0]['features'] as $feature)
                        {
                      ?>
                      <div class="form-group">
                        <input value="<?php echo $feature->feature_name; ?>" style="width: 87%;" type="text" name="feature[]" required>
                        <input type="hidden" name="feature_id[]" value="<?php echo $feature->id; ?>">
                          <?php if($in==1){ ?>
                           <button class="btn btn-sm btn-primary add_more_button">Add</button>
                           <?php }  else {?>
                           <a href="#" data-id="<?php echo $feature->id; ?>" class="remove_field">Remove</a>
                           <?php } ?>
                      </div>
                      <?php $in++; } ?>
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
            $('.input_fields_container').append('<div class="form-group"><input type="text" style="width: 87%;" name="feature[]"/><a href="#" class="remove_field" data-id="" style="margin-left:10px;">Remove</a></div>'); //add input field
        }
    });  
    $('.input_fields_container').on("click",".remove_field", function(e){ //user click on remove text links
        e.preventDefault(); 
        var rowid = $(this).attr('data-id');
        //alert(rowid);
        $.ajax({
              url:'<?php echo base_url("admin/master/remove_subscriptions_features"); ?>',
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