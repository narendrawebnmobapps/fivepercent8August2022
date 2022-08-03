<?php $this->load->view('includes/header'); ?>
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
<div class="page-breadcrumb">
	<div class="row">
	    <div class="col-12 d-flex no-block align-items-center">
	        <h4 class="page-title">News</h4>
	        <div class="ml-auto text-right">
	            <nav aria-label="breadcrumb">
	                <ol class="breadcrumb">
	                    <li class="breadcrumb-item"><a href="#">Home</a></li>
	                    <li class="breadcrumb-item active" aria-current="page">News</li>
	                </ol>
	            </nav>
	        </div>
	    </div>
	</div>
</div>

<?php $type = $this->input->get('type'); ?>
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
                                <div class="alert alert-success disapperedfewsecond" style="text-align: center;">
                                  <strong>Success!</strong> <?php echo $this->session->flashdata('message'); ?>
                                </div>
                                <?php } ?>
                            	<div class="language-div" style="float: left;">
                                	<nav class="navbar navbar-expand-lg navbar-light bg-light">
									  <div class="collapse navbar-collapse" id="navbarNav">
									    <ul class="navbar-nav">
									      <li class="nav-item <?php if(!$type){ echo 'active'; } ?>">
									        <a class="nav-link " href="<?php echo base_url('admin/news'); ?>">Currency</a>
									      </li>
									      <li class="nav-item <?php if($type==2){ echo 'active'; } ?>">
									        <a class="nav-link" href="<?php echo base_url('admin/news?type=2'); ?>">Microeconomical </a>
									      </li>
									      <li class="nav-item <?php if($type==3){ echo 'active'; } ?>">
									        <a class="nav-link" href="<?php echo base_url('admin/news?type=3'); ?>">Oil</a>
									      </li>
                                            <li class="nav-item <?php if($type==4){ echo 'active'; } ?>">
                                              <a class="nav-link" href="<?php echo base_url('admin/news?type=4'); ?>">Portfolio</a>
                                            </li>
                                            <li class="nav-item <?php if($type==5){ echo 'active'; } ?>">
                                              <a class="nav-link" href="<?php echo base_url('admin/news?type=5'); ?>">Learning</a>
                                            </li>
									    </ul>
									  </div>
									</nav>									                                	
								</div>
                <?php if($type==""){$type=1;} ?>
								<div class="add-question" style="float: right;">
									<nav class="navbar navbar-expand-lg navbar-light bg-light">
										<div class="collapse navbar-collapse" id="navbarNav">
									    <ul class="navbar-nav">
									      <li class="nav-item active">
									        <a class="nav-link" href="<?php echo base_url('admin/news/add?type='.$type) ?>">Add News</a>
									      </li>
									  	</ul>
									   </div>
									</nav>
								</div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">News</h5>                               
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>News Title</th>
                                                <th>News Content</th>
                                                <th>News Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(count($news)>0): $inc = 1; foreach($news as $val): ?>
                                            <tr>
                                              <td><?php echo $inc; ?></td>
                                              <td><?php echo $val->news_title; ?></td>
                                              <td><?php echo substr($val->news_content, 0,50).'..'; ?></td>
                                              <td><?php echo $val->news_date; ?></td>
                                                
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-danger"><i class="m-r-10 mdi mdi-settings"></i></button>
                                                        <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(71px, 35px, 0px);">
                                                            <a class="dropdown-item" href="<?php echo base_url('admin/news/edit?id=').$val->id.'&type='.$type; ?>">Edit</a>
                                                            <a class="dropdown-item" href="<?php echo base_url('admin/news/delete?id=').$val->id.'&type='.$type; ?>">Delete</a>
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
