<?php $this->load->view('includes/header'); ?>
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
<div class="page-breadcrumb">
	<div class="row">
	    <div class="col-12 d-flex no-block align-items-center">
	        <h4 class="page-title">Advisor Subscription</h4>
	        <div class="ml-auto text-right">
	            <nav aria-label="breadcrumb">
	                <ol class="breadcrumb">
	                    <li class="breadcrumb-item"><a href="#">Home</a></li>
	                    <li class="breadcrumb-item active" aria-current="page">Advisor Subscription Plan</li>
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
									        <a class="nav-link" href="<?php echo base_url('admin/master/add_advisor_subscription_plan') ?>">Add Plan</a>
									      </li>
									  	</ul>
									   </div>
									</nav>
								</div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"> Advisor Subscription Plan</h5>                               
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Plan Name</th>
                                                <th>Price</th>
                                                <th>Features</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(count($subscriptions)>0): $inc = 1; foreach($subscriptions as $subscription): ?>
                                            <tr>
                                                <td><?php echo $inc; ?></td>
                                                <td><?php echo $subscription['plan_name']; ?></td>
                                                <td><?php echo $subscription['price']; ?></td>
                                                <td>
                                                    <?php
                                                    $counter = 1;
                                                     foreach($subscription['features'] as $feature)
                                                     {
                                                        echo $counter.'. '.$feature->feature_name."<br>";
                                                        $counter++;
                                                     }
                                                    ?>
                                                    
                                                </td>
                                                <td>
                                                    

                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-danger"><i class="m-r-10 mdi mdi-settings"></i></button>
                                                        <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(71px, 35px, 0px);">
                                                            <a class="dropdown-item" href="<?php  echo base_url('admin/master/edit_advisor_subscription_plan/').$subscription['id']; ?>">Edit</a>
                                                            <!-- <a class="dropdown-item" href="<?php  echo base_url('admin/master/delete_subscription_plan/').$subscription['id']; ?>">Delete</a> -->
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