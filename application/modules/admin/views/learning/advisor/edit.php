<?php $this->load->view('includes/header'); ?>
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
<div class="page-breadcrumb">
	<div class="row">
	    <div class="col-12 d-flex no-block align-items-center">
	        <h4 class="page-title">Edit Advisor Learning</h4>
	        <div class="ml-auto text-right">
	            <nav aria-label="breadcrumb">
	                <ol class="breadcrumb">
	                    <li class="breadcrumb-item"><a href="#">Home</a></li>
	                    <li class="breadcrumb-item active" aria-current="page">Advisor Learning</li>
	                </ol>
	            </nav>
	        </div>
	    </div>
	</div>
</div>
<div class="container-fluid">
                <form method="post" action="">
                <div class="row">                  
                    <div class="col-md-12">
                        <div class="card">
                          <div class="card-body">
                              <div class="form-group">
                                <label for="sel1">Question</label>
                                <input type="text" name="question" class="form-control" value="<?php echo $details->questions; ?>" required>
                              </div>
                              <div class="form-group">
                                <label for="comment">Answer</label>
                                <textarea class="form-control" rows="5" name="answer" id="comment" required><?php echo $details->answer; ?></textarea>
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