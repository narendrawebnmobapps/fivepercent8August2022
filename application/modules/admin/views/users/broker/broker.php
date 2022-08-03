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
	        <h4 class="page-title">Broker List</h4>
	        <div class="ml-auto text-right">
	            <nav aria-label="breadcrumb">
	                <ol class="breadcrumb">
	                    <li class="breadcrumb-item"><a href="#">Home</a></li>
	                    <li class="breadcrumb-item active" aria-current="page">Broker</li>
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
              									        <a class="nav-link" href="<?php echo base_url('admin/broker/add_broker') ?>">Add Broker</a>
              									      </li>
              									  	</ul>
              									   </div>
              									</nav>
              								</div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Brokers</h5>                               
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Country</th>
                                                <th>Age</th>
                                                <!-- <th>Status</th> -->
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(count($brokers)>0): $inc = 1; foreach($brokers as $broker): ?>
                                            <tr>
                                                <td><?php echo $inc; ?></td>
                                                <td><?php echo $broker->first_name.' '.$broker->last_name; ?></td>
                                                <td><?php echo $broker->email; ?></td>
                                                <td><?php echo $broker->country_name; ?></td>
                                                <td><?php echo $this->common->calculateage($broker->dob); ?></td>
                                                <!-- <td>
                                                  <?php  
                                                  $active = "Anapprove";
                                                   if($broker->status==1)
                                                   {
                                                    $active = "Approved";
                                                   }
                                                   echo $active;
                                                  ?>
                                                  
                                                </td> -->
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-danger"><i class="m-r-10 mdi mdi-settings"></i></button>
                                                        <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(71px, 35px, 0px);">

                                                            <a class="dropdown-item" href="<?php echo base_url('admin/broker/edit_broker/').base64_encode($broker->id); ?>">Edit</a>

                                                            <a class="dropdown-item" href="<?php echo base_url('admin/broker/broker_client_list/').base64_encode($broker->id); ?>">Client List</a>
                                                            <?php if($broker->status==0){ ?>
                                                            <a class="dropdown-item" href="<?php echo base_url('admin/broker/enable_disable_broker/').base64_encode($broker->id).'/'.base64_encode($broker->status); ?>">Enable</a>
                                                            <?php } else { ?>
                                                            <a class="dropdown-item" href="<?php echo base_url('admin/broker/enable_disable_broker/').base64_encode($broker->id).'/'.base64_encode($broker->status); ?>">Disable</a>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php $inc++; endforeach; endif; ?>
                                        </tfoot>
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

<script type="text/javascript">
    $(document).ready(function(){
      setTimeout(function(){ $(".successAlertDiv").fadeOut(3000); }, 3000);
    })
  </script>
