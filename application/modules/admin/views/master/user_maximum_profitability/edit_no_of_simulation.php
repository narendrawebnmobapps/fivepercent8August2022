<?php $this->load->view('includes/header'); ?>
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
<div class="page-breadcrumb">
	<div class="row">
	    <div class="col-12 d-flex no-block align-items-center">
	        <h4 class="page-title">Set no of simulation by user level</h4>
	        <div class="ml-auto text-right">
	            <nav aria-label="breadcrumb">
	                <ol class="breadcrumb">
	                    <li class="breadcrumb-item"><a href="#">Home</a></li>
	                    <li class="breadcrumb-item active" aria-current="page">Set no of simulation by user level</li>
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
                          <label for="sel1">Level</label>
                          <input type="text" name="level" value="<?php echo $maximum->level; ?>" class="form-control" required readonly >
                        </div>
                        <div class="form-group">
                          <label for="sel1">Percentage</label>
                          <input type="text" name="percentage" value="<?php echo $maximum->numberOfSimulation; ?>" class="form-control" required>
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

        </div>

<?php $this->load->view('includes/footer'); ?>
