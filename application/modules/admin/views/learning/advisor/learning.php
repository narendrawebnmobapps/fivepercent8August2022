<?php $this->load->view('includes/header'); ?>
<link href="https://collectiblesnetworkiso.com/file/drag/css/bootstrap-select.css" rel="stylesheet" />
<!-- Custom Css -->
<link href="https://collectiblesnetworkiso.com/file/drag/css/app_style.css" rel="stylesheet" />
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
<div class="page-breadcrumb">
	<div class="row">
	    <div class="col-12 d-flex no-block align-items-center">
	        <h4 class="page-title">Learning</h4>
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

<!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <?php //echo "<pre>"; print_r($questions);die; ?>
                    <div class="col-12">
                    	<div class="card">
                            <div class="card-body">
                                <?php if($this->session->flashdata('message')){ ?>
                                <div class="alert alert-success successAlertDiv" style="text-align: center;">
                                  <strong>Success!</strong> <?php echo $this->session->flashdata('message'); ?>
                                </div>
                                <?php } ?>                          	

              								<div class="add-question" style="float: right;">
              									<nav class="navbar navbar-expand-lg navbar-light bg-light">
              										<div class="collapse navbar-collapse" id="navbarNav">
              									    <ul class="navbar-nav">
              									      <li class="nav-item active">
              									        <a class="nav-link" href="<?php echo base_url('admin/learning/add_advisor_learning') ?>">Add Advisor Learning</a>
              									      </li>
              									  	</ul>
              									   </div>
              									</nav>
              								</div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Advisor Learning</h5>                               
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Question</th>
                                                <th>Answer</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(count($learnings)>0): $inc = 1; foreach($learnings as $learning): ?>
                                            <tr>
                                                <td><?php echo $inc; ?></td>
                                                <td><?php echo $learning->questions; ?></td>
                                                <td><?php echo $learning->answer; ?></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-danger"><i class="m-r-10 mdi mdi-settings"></i></button>
                                                        <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                       <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(71px, 35px, 0px);">
                                                            <a class="dropdown-item" href="<?php echo base_url('admin/learning/edit_advisor_learning/').$learning->id; ?>">Edit</a>
                                                            <a class="dropdown-item" href="<?php echo base_url('admin/learning/delete_advisor_learning/').$learning->id
                                                            ; ?>">Delete</a>
                                                        </div>
                                                    </div>

                                                </td>
                                            </tr>
                                            <?php $inc++; endforeach; endif; ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
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
            <!-- ============================================================== -->
            <!-- End Container fluid  -->

<?php $this->load->view('includes/footer'); ?>
 <script src="https://collectiblesnetworkiso.com/file/drag/js/bootstrap-select.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

 <script type="text/javascript">
    $(document).ready(function(){
      setTimeout(function(){ $(".successAlertDiv").fadeOut(3000); }, 3000);
    })
  </script>

 