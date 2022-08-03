<?php $this->load->view('includes/header'); ?>
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
<div class="page-breadcrumb">
	<div class="row">
	    <div class="col-12 d-flex no-block align-items-center">
	        <h4 class="page-title">IBEX35 Stock</h4>
	        <div class="ml-auto text-right">
	            <nav aria-label="breadcrumb">
	                <ol class="breadcrumb">
	                    <li class="breadcrumb-item"><a href="#">Home</a></li>
	                    <li class="breadcrumb-item active" aria-current="page">IBEX35 Stock</li>
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
                                            <a class="nav-link" href="<?php echo base_url('admin/master/upload_stock_ibex35_historical_data') ?>">Add Stock</a>
                                          </li>
                                        </ul>
                                       </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">IBEX35 Stock</h5>                               
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Stock Name</th>
                                                <th>Price</th>
                                                <th>Volatility</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(count($stock_ibex35s)>0): $inc = 1; foreach($stock_ibex35s as $stk_ibex35s): ?>
                                            <tr>
                                                <td><?php echo $inc; ?></td>
                                                <td><a href="<?php  echo base_url('admin/master/detail_stock_ibex35/').$stk_ibex35s->id; ?>"><?php echo $stk_ibex35s->stock_name; ?></a></td>
                                                <td><?php echo $stk_ibex35s->price; ?></a></td>
                                                <td><?php echo $stk_ibex35s->volatility; ?></a></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-danger"><i class="m-r-10 mdi mdi-settings"></i></button>
                                                        <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(71px, 35px, 0px);">
                                                            <?php if($stk_ibex35s->status==1){ ?>
                                                            <a onclick="return confirm('Are you sure?');" class="dropdown-item" href="<?php  echo base_url('admin/master/activate_deactivate_stock_ibex35/').$stk_ibex35s->id.'/'.$stk_ibex35s->status; ?>">Deactivate</a>
                                                            <?php } else { ?>
                                                            <a onclick="return confirm('Are you sure?');" class="dropdown-item" href="<?php  echo base_url('admin/master/activate_deactivate_stock_ibex35/').$stk_ibex35s->id.'/'.$stk_ibex35s->status; ?>">Activate</a>
                                                        <?php } ?>
                                                            <a class="dropdown-item" href="<?php  echo base_url('admin/master/edit_stock_ibex35/').$stk_ibex35s->id; ?>">Edit</a>
                                                            <a onclick="return confirm('Are you sure?');" class="dropdown-item" href="<?php  echo base_url('admin/master/delete_ibex35_stock/').$stk_ibex35s->id; ?>">Delete</a>
                                                            <a class="dropdown-item" href="<?php  echo base_url('admin/master/detail_stock_ibex35/').$stk_ibex35s->id; ?>">Details</a>
                                                            <a class="dropdown-item" href="<?php  echo base_url('admin/master/add_update_fundamental_data/1/').$stk_ibex35s->id; ?>">Fundamental Data</a>
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