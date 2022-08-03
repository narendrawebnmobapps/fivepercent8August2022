<?php $this->load->view('includes/header'); ?>
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
<div class="page-breadcrumb">
	<div class="row">
	    <div class="col-12 d-flex no-block align-items-center">
	        <h4 class="page-title">User List</h4>
	        <div class="ml-auto text-right">
	            <nav aria-label="breadcrumb">
	                <ol class="breadcrumb">
	                    <li class="breadcrumb-item"><a href="#">Home</a></li>
	                    <li class="breadcrumb-item active" aria-current="page">User List</li>
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
                            <?php if($this->session->flashdata('message')){ ?>
                            <div class="card-body">                                
                                <div class="alert alert-success" style="text-align: center;">
                                  <strong>Success!</strong> <?php echo $this->session->flashdata('message'); ?>
                                </div>                                
                            </div>
                            <?php } ?>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Users</h5>                               
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Age</th>
                                                <th>Certificate</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(count($lists)>0): $inc = 1; foreach($lists as $list): ?>
                                            <tr>
                                                <td><?php echo $inc; ?></td>
                                                <td><?php echo $list->first_name.' '.$list->last_name;  ?></td>
                                                <td><?php echo $list->email;  ?></td>
                                                <td><?php echo $this->common->calculateage($list->dob).' Years' ; ?></td>
                                                <td><a target="_blank" href="<?php echo base_url('uploads/certificates/'.$list->certificate); ?>">Download</a></td>
                                                <td>
                                                    <?php
                                                     if($list->status==0)
                                                     {
                                                        echo 'Unapproved';
                                                     } 
                                                     if($list->status==1)
                                                     {
                                                        echo 'Approved';
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
                                                            <a class="dropdown-item" href="<?php  echo base_url('admin/users/approve_users/').$list->id.'/'.$list->status; ?>">
                                                               <?php
                                                                 if($list->status==1)
                                                                 {
                                                                    echo 'Unapprove';
                                                                 } 
                                                                 if($list->status==0)
                                                                 {
                                                                    echo 'Approve';
                                                                 }
                                                                ?>

                                                            </a>

                                                            <a class="dropdown-item" href="<?php  echo base_url('admin/users/users_details/').base64_encode($list->id); ?>">Details</a>
                                                            
                                                            <a class="dropdown-item" href="<?php  echo base_url('admin/users/delete_users/').base64_encode($list->id); ?>">Delete</a>
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