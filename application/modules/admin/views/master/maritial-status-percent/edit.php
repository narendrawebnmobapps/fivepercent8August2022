<?php $this->load->view('includes/header'); ?>
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
<div class="page-breadcrumb">
	<div class="row">
	    <div class="col-12 d-flex no-block align-items-center">
	        <h4 class="page-title">Edit Marital Status Percent</h4>
	        <div class="ml-auto text-right">
	            <nav aria-label="breadcrumb">
	                <ol class="breadcrumb">
	                    <li class="breadcrumb-item"><a href="#">Home</a></li>
	                    <li class="breadcrumb-item active" aria-current="page">Marital Status Percent</li>
	                </ol>
	            </nav>
	        </div>
	    </div>
	</div>
</div>
<div class="container-fluid">
                <form method="post" action="">
                <div class="row">
                  
                    <div class="col-md-6">
                        <div class="card">
                        <div class="card-body">                       
                        <div class="form-group">
                          <label for="sel1">Marital Status</label>
                          <?php 
                            $maritalstatusArray = array('Single','Married','Divorced');
                          ?>
                          <select name="maritalstatus" required class="form-control maritalstatus">
                            <option value="">Select Marital Status</option>
                            <?php foreach($maritalstatusArray as $marital): ?>
                            <option value="<?php echo $marital ?>" <?php if($marital==$maritial_status->maritail_status) {echo 'selected'; } ?>><?php echo $marital ?></option>
                          <?php endforeach; ?>
                          </select>
                        </div>
                        <div class="form-group noOfChild" style="display: none;">
                          <label for="sel1">No. Of Child</label>
                          <input type="number"  name="noofchild" value="<?php echo $maritial_status->no_of_child; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="sel1">Percent Value</label>
                          <input type="number" value="<?php echo $maritial_status->percent_value; ?>" name="percentValue" class="form-control" required>
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

        </div>

<?php $this->load->view('includes/footer'); ?>

<script type="text/javascript">
  $(document).on('change','.maritalstatus',function(){
    var status = $('.maritalstatus option:selected').val();
      if(status=="Married")
      {
        $('.noOfChild').show();
      }
      else if(status=="Divorced")
      {
        $('.noOfChild').show();
      }
      else
      {
        $('.noOfChild').hide();
      }
  });
  $(document).ready(function(){
    var status = $('.maritalstatus option:selected').val();
      if(status=="Married")
      {
        $('.noOfChild').show();
      }
      else if(status=="Divorced")
      {
        $('.noOfChild').show();
      }
      else
      {
        $('.noOfChild').hide();
      }

  })
</script>