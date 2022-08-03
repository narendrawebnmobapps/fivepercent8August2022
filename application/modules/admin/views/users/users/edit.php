<?php $this->load->view('includes/header'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/users/css/dashbord.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/users/css/main-custom.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/users/css/main.min.css'); ?>">
<style type="text/css">
  .persnal-info-form-make input[type="text"], .persnal-info-form-make input[type="email"], .persnal-info-form-make input[type="password"], .persnal-info-form-make select {
    height: 46px !important;
  }
</style>
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
<div class="page-breadcrumb">
	<div class="row">
	    <div class="col-12 d-flex no-block align-items-center">
	        <h4 class="page-title">User</h4>
	        <div class="ml-auto text-right">
	            <nav aria-label="breadcrumb">
	                <ol class="breadcrumb">
	                    <li class="breadcrumb-item"><a href="#">Home</a></li>
	                    <li class="breadcrumb-item active" aria-current="page">User Details</li>
	                </ol>
	            </nav>
	        </div>
	    </div>
	</div>
</div>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<!------ Include the above in your HEAD tag ---------->

<div class="container-fluid">
       <div class="col-md-12">
              <div class="box-contant-boxe-question">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <!-- <h3 class="panel-title">Panel title</h3> --> <span class="">
                        <!-- Tabs -->
                         <ul class="nav panel-tabs">
                            <li class="active"><a href="<?php  echo base_url('admin/users/users_details/').base64_encode($user_detail->id); ?>">Personal Info</a></li>
                            <li><a href="<?php echo base_url('admin/users/financialsituation/').base64_encode($user_detail->id); ?>">Financial Situation</a></li>
                            <li><a href="<?php echo base_url('admin/users/investmentobjective/').base64_encode($user_detail->id); ?>">Investment Objectives</a></li>
                            <li><a href="<?php echo base_url('admin/users/knowledgeExperience/').base64_encode($user_detail->id); ?>">Knowlegde &amp; Experience</a></li>
                            <li><a href="<?php echo base_url('admin/users/understandingFinancialcommitment/').base64_encode($user_detail->id); ?>" >Understanding Financial Commitments</a></li>
                            <li><a href="<?php echo base_url('admin/users/test_list/').base64_encode($user_detail->id); ?>" >Test List</a></li>
                        </ul>
                    </span>
                  </div>
                <div class="panel-body">
                    <div class="tab-content">
                      <div class="tab-pane active" id="tab1">
                        <div class="col-md-12 col-sm-12 persnal-info-form-make">
                        <?php
                              if($this->session->flashdata('success')){
                           ?>
                          <div class="alert alert-success text-center">
                            <?php echo $this->session->flashdata('success'); ?>
                          </div>
                      <?php } ?>
                        <div class="center-profile-box">
                            <form method="post" action="" enctype="multipart/form-data">
                              <div class="user-prfofile-persnal-info">
                                <img id="Image_pro" src="<?php echo base_url('uploads/user-profile/'.$user_detail->profile_image); ?>">
                                <input type="hidden" name="oldimage" value="<?php echo $user_detail->profile_image; ?>">
                                <br> <span class="btn btn-link btn-file">Edit<input onchange="showMyImage(this)" type="file" name="proimage" id="upload-img"></span>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                <label>First Name</label>
                                <div class="form-group">
                                  <input type="text" name="fname" value="<?php echo @$user_detail->first_name; ?>" required placeholder="Hendrix" class="form-control">
                                </div>
                              </div>
                              <div class="col-md-6 col-sm-6">
                                <label>Last Name</label>
                                <div class="form-group">
                                  <input type="text" value="<?php echo @$user_detail->last_name; ?>" name="lname" required placeholder="Svennigsen" class="form-control">
                                </div>
                              </div>
                              <div class="col-md-12 col-sm-12">
                                <label>Date Of Birth</label>
                                <div class="form-group">
                                  <input type="text" value="<?php echo @$user_detail->dob; ?>" name="date_of_birth"  id="datepicker" required placeholder="APR 22 1975" class="form-control">
                                </div>
                              </div>
                              <div class="col-md-12 col-sm-12">
                                <label>Email Address</label>
                                <div class="form-group">
                                  <input type="email" readonly disabled name="email" value="<?php echo @$user_detail->email; ?>" required placeholder="svennigsen@gmail.com" class="form-control">
                                </div>
                              </div>
                              <div class="col-md-12 col-sm-12">
                                <label>Marital Status</label>
                                <div class="form-group">
                                  <?php 
                                    $maritalstatusArray = array('Single','Married','Divorced');
                                  ?>
                                  <select name="maritalstatus" required class="form-control maritalstatus">
                                    <option value="">Select Marital Status</option>
                                    <?php foreach($maritalstatusArray as $marital): ?>
                                    <option value="<?php echo $marital ?>" <?php if($marital==@$user_detail->martial_status) {echo 'selected'; } ?>><?php echo $marital ?></option>
                                  <?php endforeach; ?>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-12 col-sm-12 noOfChild" style="display: none;">
                                <label>No. of Child</label>
                                <div class="form-group">
                                  <input type="text" value="<?php echo @$user_detail->no_of_child; ?>" name="noofchild"  class="form-control">
                                </div>
                              </div>
                              <div class="col-md-12 col-sm-12">
                                <label>Job</label>
                                <div class="form-group">
                                  <select name="job" required class="form-control">
                                    <option value="">Select Job</option>
                                    <?php foreach($jobtypes as $jobtype) { ?>
                                      <option value="<?php echo $jobtype->id; ?>" <?php if(@$user_detail->job_type==$jobtype->id) { echo 'selected'; } ?>><?php echo $jobtype->jobtype; ?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                              </div>

                              <div class="col-md-12 col-sm-12">
                                <label>Country</label>
                                <div class="form-group">
                                  <select name="country" required class="form-control">
                                    <option value="">Select Country</option>
                                    <?php foreach($countries as $country) { ?>
                                    <option value="<?php echo $country->id; ?>" <?php if(@$user_detail->country==$country->id) { echo 'selected'; } ?> ><?php echo $country->name; ?></option>
                                  <?php } ?>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-12 col-sm-12">
                                <label>App Usage</label>
                                <div class="form-group">
                                  <select required name="appusage" class="form-control">
                                    <option value="">Select App Usage</option>
                                    <?php foreach($app_ussages as $app_ussage) { ?>
                                    <option value="<?php echo $app_ussage->id; ?>" <?php if(@$user_detail->app_usage==$app_ussage->id) { echo 'selected'; } ?>><?php echo $app_ussage->uses; ?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-5">
                                <p>Talk to An Advisor</p>
                              </div>
                              <div class="col-md-6">
                                <input type="hidden" name="talktoadviser" class="talktoadviser" value="<?php echo $user_detail->talk_to_advisor;  ?>">
                                <?php if($user_detail->talk_to_advisor==1) { ?>
                                <div class="btn-group btn-toggle">
                                  <button class="btn btn-default yescls adviserbtn" data-id="1">Yes</button>
                                  <button class="btn btn-primary nocls  adviserbtn" data-id="2">No</button>
                                </div>
                              <?php } else { ?>
                                <div class="btn-group btn-toggle">
                                  <button class="btn btn-primary yescls adviserbtn" data-id="1">Yes</button>
                                  <button class="btn btn-default nocls  adviserbtn" data-id="2">No</button>
                                </div>
                              <?php } ?>
                              </div>
                              <!-- <div class="col-md-12 col-sm-12 finish-btn">
                                <input type="submit" name="" value="Save">
                              </div> -->
                            </form>
                          </div>
                    </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    </div>

<?php $this->load->view('includes/footer'); ?>

<script type="text/javascript">
    $(document).on('click','.adviserbtn',function(e){
      e.preventDefault();
      var sss = $(this).attr('data-id');
      if(sss==1)
      {
        $('.yescls').addClass('btn-default');
        $('.yescls').removeClass('btn-primary');

        $('.nocls ').addClass('btn-primary');
        $('.nocls ').removeClass('btn-default');
        $('.talktoadviser').val(1);
      }
      if(sss==2)
      {
        $('.nocls').addClass('btn-default');
        $('.nocls').removeClass('btn-primary');

        $('.yescls ').addClass('btn-primary');
        $('.yescls ').removeClass('btn-default');
        $('.talktoadviser').val(0);

      }
      //alert(sss);
    });
  </script>
