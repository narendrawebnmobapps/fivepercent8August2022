<?php $this->load->view('includes/header'); ?>
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
<div class="page-breadcrumb">
	<div class="row">
	    <div class="col-12 d-flex no-block align-items-center">
	        <h4 class="page-title">Edit Job Type Percent</h4>
	        <div class="ml-auto text-right">
	            <nav aria-label="breadcrumb">
	                <ol class="breadcrumb">
	                    <li class="breadcrumb-item"><a href="#">Home</a></li>
	                    <li class="breadcrumb-item active" aria-current="page">Job Type Percent</li>
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
                          <label for="sel1">Job Type</label>
                          <select class="form-control" required name="jobtype">
                              <option>--Select Job Type--</option>
                              <?php foreach($jobtype as $job){ ?>
                                <option value="<?php echo $job->id; ?>" <?php if($job->id==$job_type_percent->id) {echo 'selected'; } ?>><?php echo $job->jobtype; ?></option>
                              <?php } ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="sel1">Percent Value</label>
                          <input type="number" name="percentValue" value="<?php echo $job_type_percent->percent_value; ?>" class="form-control" required>
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
