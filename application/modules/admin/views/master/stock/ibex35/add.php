<?php $this->load->view('includes/header'); ?>
<style type="text/css">
    .error_message{
            color: red;
            font-size: 15px;
    }
</style>
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
<div class="page-breadcrumb">
	<div class="row">
	    <div class="col-12 d-flex no-block align-items-center">
	        <h4 class="page-title">Add IBEX35 Stock Historical Data</h4>
	        <div class="ml-auto text-right">
	            <nav aria-label="breadcrumb">
	                <ol class="breadcrumb">
	                    <li class="breadcrumb-item"><a href="#">Home</a></li>
	                    <li class="breadcrumb-item active" aria-current="page">IBEX35 Stock Historical Data</li>
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
                <form method="post" action="" enctype="multipart/form-data">
                <div class="row">
                    <?php //echo validation_errors(); ?>
                    <div class="col-md-6">
                        <div class="card">
                        <div class="card-body">
                        <div class="form-group">
                          <label for="sel1">Stock Category </label>
                            <select name="category" class="form-control">
                              <option value="">--Select Stock Category--</option>
                              <?php foreach($categories as $category){ ?> 
                                <option value="<?php echo $category->id; ?>" <?php echo set_select('category', $category->id , FALSE, 1); ?>><?php echo $category->industry; ?></option>
                              <?php } ?>
                            </select>
                          <?php echo form_error('category', '<span class="error_message">', '</span>'); ?>
                        </div>
                        <div class="form-group">
                          <label for="sel1">Stock Name </label>
                          <input type="text" name="stockname" class="form-control" value="<?php echo set_value('stockname') ?>" >
                          <?php echo form_error('stockname', '<span class="error_message">', '</span>'); ?>
                        </div>
                        <div class="form-group">
                          <label for="sel1">Symbol </label>
                          <input type="text" name="symbol" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="sel1">Price</label>
                          <input type="text" name="price"  class="form-control price" required>
                        </div>
                        <div class="form-group">
                          <label for="sel1">Volatility</label>
                          <input type="text" name="volatility" class="form-control volatility">
                        </div>
                        <div class="form-group">
                          <label for="sel1">Dividend</label>
                          <input type="text" name="dividend" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="sel1">Interest Rate</label>
                          <input type="text" name="interest_rate" class="form-control">
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary">Submit</button>
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


// Install input filters.
/*$("#customerPO,#purchaseOrderNumber,#phone").inputFilter(function(value) {
  return /^-?\d*$/.test(value); });*/

$(".price,.volatility").inputFilter(function(value) {
  return /^\d*[.,]?\d{0,2}$/.test(value); });
</script>