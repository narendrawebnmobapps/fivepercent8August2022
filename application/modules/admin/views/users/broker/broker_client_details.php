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
	        <h4 class="page-title">Broker Client Details</h4>
	        <div class="ml-auto text-right">
	            <nav aria-label="breadcrumb">
	                <ol class="breadcrumb">
	                    <li class="breadcrumb-item"><a href="#">Home</a></li>
	                    <li class="breadcrumb-item active" aria-current="page">Client Details</li>
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
                    	<!-- <div class="card">
                            <div class="card-body">
                                <?php if($this->session->flashdata('message')){ ?>
                                <div class="alert alert-success" style="text-align: center;">
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
                        </div> -->
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Personel Info</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-selected="false"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Documents</span></a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content tabcontent-border">
                                <div class="tab-pane active show" id="home" role="tabpanel">
                                    <div class="p-20">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <?php //echo "<pre>";print_r($user_detail); ?>
                                                <form class="form-horizontal">
                                                    <div class="card-body">
                                                        <h4 class="card-title">Personal Info</h4>
                                                        <div class="form-group row">
                                                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">First Name</label>
                                                            <div class="col-sm-9">
                                                                <span class="form-control"><?php echo $user_detail->first_name ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Last Name</label>
                                                            <div class="col-sm-9">
                                                                <span class="form-control"><?php echo $user_detail->last_name ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Email Address</label>
                                                            <div class="col-sm-9">
                                                                <span class="form-control"><?php echo $user_detail->email ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Phone Number</label>
                                                            <div class="col-sm-9">
                                                                <span class="form-control"><?php echo $user_detail->phone_number ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Job Type</label>
                                                            <div class="col-sm-9">
                                                                <span class="form-control"><?php echo $user_detail->jobtype ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Country</label>
                                                            <div class="col-sm-9">
                                                                <span class="form-control"><?php echo $user_detail->Country ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane p-20" id="profile" role="tabpanel">
                                    <div class="row">

                                    <?php
                                    if(count($documents)>0){
                                        $i=0;
                                        $j=1;
                                        $k=0;
                                        $str = '<div class="col-md-6">
                                    <div id="accordian-4">
                                    <div class="card m-t-30">';
                                    $left='';
                                    $right='';
                                        foreach ($documents as $docs)
                                        {
                                        $str1='<a class="card-header link collapsed" data-toggle="collapse" data-parent="#accordian-'.$i.'" href="#Toggle-'.$i.'" aria-expanded="true" aria-controls="Toggle-'.$i.'">
                                            <i class="fa fa-arrow-right" aria-hidden="true"></i>'.$docs->document.'</span>
                                        </a>
                                        <div id="Toggle-'.$i.'" class="multi-collapse collapse" style="">
                                            <div class="card-body widget-content">
                                                <img src="'.base_url('uploads/broker-doc/'.$docs->doc_file).'" style="width:100%;height:400px;">
                                            </div>
                                        </div>';

                                        $j++;
                                        $i++;
                                        $k=$j%2;
                                         if($k==0)
                                         {
                                           $left.=$str1;   
                                         }
                                        else 
                                        { 
                                            $right.=$str1;
                                        } 

                                        }


                       echo$str.$left.'</div></div></div>';
                       echo$str.$right.'</div></div></div>';   
                   }
                   else
                   {
                    echo '<div class="col-md-12"><div class"card" style="text-align:center;padding:50px;">No Document Available</div></div>';
                   }
                                     ?>
                                    
                                        
                                    </div>
                                </div>
                                </div>

                                
                            </div>
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
