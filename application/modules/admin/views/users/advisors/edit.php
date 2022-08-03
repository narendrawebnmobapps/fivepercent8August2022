<?php $this->load->view('includes/header'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/users/css/dashbord.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/users/css/main-custom.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/users/css/main.min.css'); ?>">
<style type="text/css">
  .persnal-info-form-make input[type="text"], .persnal-info-form-make input[type="email"], .persnal-info-form-make input[type="password"], .persnal-info-form-make select {
    height: 46px !important;
  }

</style>
<style type="text/css">
.errinputcls 
    {
        float: left;
        top: -19px;
        position: relative;
        color: red;
        font-size: 14px;
    }

    .file {
  visibility: hidden;
  position: absolute;
}

.form-bg-prt-sec .btn-primary {
    color: #fff;
    background-color: #007bff;
    /* border-color: #007bff; */
    border-radius: 0px;
    background-color: #073850;
    padding: 11px 17px;
    font-size: 16px;
        border: none;
    outline: none;
}

 .form-bg-prt-sec .btn-primary:focus {
    box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0);
}
       

.form-bg-prt-sec input.form-control.input-lg {
    margin-bottom: 9px;
} 

.edit-profile-area button.btn.btn-primary {
    background-color: #08384f;
    color: #fff;
    font-size: 18px;
    outline: none;
    box-shadow: none;
    border-color: #08384f;
    border-radius: 0px;
    margin-top: -34px;
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
                    <!-- <h3 class="panel-title">Panel title</h3> --> 
                    <span class="">
                         <ul class="nav panel-tabs">
                            <li class="active"><a href="<?php  echo base_url('admin/users/advisor_details/').base64_encode($user_detail->id); ?>">Personal Info</a></li>
                            <li><a href="<?php echo base_url('admin/users/advisor_work_experience/').base64_encode($user_detail->id); ?>">Work Experience</a></li>
                            <li><a href="<?php echo base_url('admin/users/advisor_about_us_details/').base64_encode($user_detail->id); ?>">About</a></li>
                            <li><a href="<?php echo base_url('admin/users/advisor_test_list/').base64_encode($user_detail->id); ?>" >Test List</a></li>
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
                                <label>Email Address</label>
                                <div class="form-group">
                                  <input type="email" readonly disabled name="email" value="<?php echo @$user_detail->email; ?>" required placeholder="svennigsen@gmail.com" class="form-control">
                                </div>
                              </div>
                              <div class="col-md-12 col-sm-12">
                                <label>Phone Number</label>
                                <div class="form-group">
                                  <input type="text"   name="phonenumber" value="<?php echo @$user_detail->phone_number; ?>" required placeholder="Phone Number" class="form-control">
                                </div>
                              </div>
                              <div class="col-md-12 col-sm-12">
                                <label>Date Of Birth</label>
                                <div class="form-group">
                                  <input type="text" value="<?php echo @$user_detail->dob; ?>" name="date_of_birth"  id="datepicker" required placeholder="APR 22 1975" class="form-control">
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
                                <label>Experience Year</label>
                                 <div class="form-group">
                                    <input type="text" class="form-control expYears" name="expYears" value="<?php echo @$user_detail->expYears; ?>" placeholder="Experience Years" >
                                    <?php echo form_error('expYears', '<div class="errinputcls">', '</div>'); ?>
                                </div>
                              </div>
                              <div class="col-md-12 col-sm-12">
                                <label>Speciality</label>
                                <div class="form-group">
                                    <input type="text" class="form-control advisorSpeciality" name="advisorSpeciality" value="<?php echo @$user_detail->speciality; ?>" placeholder="Advisor Speciality" >
                                    <?php echo form_error('advisorSpeciality', '<div class="errinputcls">', '</div>'); ?>
                                </div>
                              </div>
                              <div class="col-md-12 col-sm-12">
                                <label>Upload Certificate</label>
                                <div class="form-group">
                                  <input type="file" name="certificate" class="file">
                                  <input type="hidden" name="old_certificate" value="<?php echo @$user_detail->certificate; ?>">
                                  <div class="input-group col-xs-12">
                                    <input type="text" class="form-control input-lg" disabled placeholder="Upload Certificate">
                                    <span class=" edit-profile-area input-group-btn">
                                      <button class="browse btn  btn-primary input-lg " type="button"><i class="glyphicon glyphicon-search"></i> Browse</button>
                                    </span>
                                  </div>
                                  <?php echo form_error('certificate', '<div class="errinputcls">', '</div>'); ?>
                                </div>
                              </div>
                              <!-- <div class="col-md-12 col-sm-12 finish-btn" style="margin-top: 0px;">
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
  
$(document).on('click', '.browse', function(){
  var file = $(this).parent().parent().parent().find('.file');
  file.trigger('click');
});
$(document).on('change', '.file', function(){
  $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
});

</script>
