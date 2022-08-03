<?php $this->load->view('includes/header'); ?>
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
<div class="page-breadcrumb">
	<div class="row">
	    <div class="col-12 d-flex no-block align-items-center">
	        <h4 class="page-title">Update IBEX35  Investment Funds </h4>
	        <div class="ml-auto text-right">
	            <nav aria-label="breadcrumb">
	                <ol class="breadcrumb">
	                    <li class="breadcrumb-item"><a href="#">Home</a></li>
	                    <li class="breadcrumb-item active" aria-current="page">Update IBEX35  Investment Funds </li>
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
                          <label for="sel1">Fund Name</label>
                          <input type="text" name="fund_name"  value="<?=$spain_investments->fund_name?>" class="form-control" required>
                          <input type="hidden" name="investments_id" value="<?=$spain_investments->investments_id?>" >
                        </div>
                         <div class="form-group">
                          <label for="sel1">Fund Commission %</label>
                          <input type="text" name="fund_commission" value="<?=$spain_investments->fund_commission?>"class="form-control fund_commission" required>
                        </div>
                         <div class="form-group">
                          <label for="sel1">Fund Type</label>
                          <!-- <input type="text" name="fund_type" value="<?=$spain_investments->fund_type?>"class="form-control" required> -->
                            <select  type="select" name="fund_type" class="form-control" required>
                          <option value="Conservative funds" <?php if($spain_investments->fund_type=='Conservative funds'){echo 'selected';}?>>Conservative funds</option>
                            <option value="Moderate funds" <?php if($spain_investments->fund_type=='Moderate funds'){echo 'selected';}?>>Moderate funds</option>
                            <option value="Risky funds" <?php if($spain_investments->fund_type=='Risky funds'){echo 'selected';}?>>Risky funds</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="sel1">Fund Description</label>
                         <!--  <input type="text" name="fund_description" class="form-control" required> -->
                         <textarea  name="fund_description" class="form-control" required><?php echo $spain_investments->fund_description?></textarea>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
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
            $('.input_fields_container').append('<div class="form-group"><input type="text" style="width: 87%;" name="feature[]"/><a href="#" class="remove_field" style="margin-left:10px;">Remove</a></div>'); //add input field
        }
    });  
    $('.input_fields_container').on("click",".remove_field", function(e){ //user click on remove text links
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});

</script>

<script type="text/javascript">
  // Restricts input for each element in the set of matched elements to the given inputFilter.
(function($) {
  $.fn.inputFilter = function(inputFilter) {
    return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      } else {
        this.value = "";
      }
    });
  };
}(jQuery));

$(".fund_commission").inputFilter(function(value) {
  return /^\d*[.,]?\d{0,2}$/.test(value); });
</script>