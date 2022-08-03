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
                            <li><a href="<?php  echo base_url('admin/users/advisor_details/').base64_encode($user_detail->id); ?>">Personal Info</a></li>
                            <li  class="active"><a href="<?php echo base_url('admin/users/advisor_work_experience/').base64_encode($user_detail->id); ?>">Work Experience</a></li>
                            <li><a href="<?php echo base_url('admin/users/advisor_about_us_details/').base64_encode($user_detail->id); ?>">About</a></li>
                            <li><a href="<?php echo base_url('admin/users/advisor_test_list/').base64_encode($user_detail->id); ?>" >Test List</a></li>
                        </ul>
                    </span>
                  </div>
                <div class="panel-body">
                  <?php 
                        $months = array('January','February', 'March','April','May','June','July','August', 'September','October','November','December');

                       ?>
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
                             
                             <div class="input_fields_container_experience">
                              <?php if(count($experiences)>0) { $cd=1; foreach($experiences as $experience) { if($cd==1){ ?>
                             <div class="col-md-12 col-sm-12">
                              <input type="hidden" name="experience_id[]" value="<?php echo $experience->id; ?>">
                                <label>Company Name</label>
                                <div class="form-group">
                                  <input type="text" name="companyname[]" value="<?php echo $experience->companyName; ?>" required placeholder="Company Name" class="form-control">
                                </div>
                              </div>
                              <div class="col-md-3 col-sm-3">
                                <label>Start Month Year</label>
                                <div class="form-group">
                                  <select name="startmonth[]" required="" class="form-control">
                                    <option value="">Select Month </option> 
                                    <?php foreach($months as $month){ ?>  
                                    <option value="<?php echo $month; ?>" <?php if($experience->startMonth==$month) { echo 'selected'; } ?> ><?php echo $month; ?></option>
                                    <?php } ?>                            
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-3 col-sm-3">
                                <label style="color: #fff;">Start Month Years</label>
                                <div class="form-group">
                                  <select name="startyear[]" required="" class="form-control">
                                    <option value="">Select Year</option>
                                    <?php 
                                      for($i=1900;$i<=date('Y');$i++)
                                      {
                                    ?>
                                    <option value="<?php echo $i; ?>" <?php if($experience->startYear==$i) { echo 'selected'; } ?>><?php echo $i; ?></option>
                                  <?php } ?>
                                 </select>
                                </div>
                              </div>
                              <div class="col-md-3 col-sm-3">
                                <label>End Month Year</label>
                                <div class="form-group">
                                  <select name="endmonth[]" required="" class="form-control">
                                    <option value="">Select Month</option>
                                    <?php foreach($months as $month){ ?>  
                                    <option value="<?php echo $month; ?>" <?php if($experience->endMonth==$month) { echo 'selected'; } ?>><?php echo $month; ?></option>
                                    <?php } ?> 
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-3 col-sm-3">
                                <label style="color: #fff;">Start </label>
                                <div class="form-group">
                                  <select name="endyear[]" required="" class="form-control">
                                    <option value="">Select Year</option>
                                    <?php 
                                      for($i=1900;$i<=date('Y');$i++)
                                      {
                                    ?>
                                    <option value="<?php echo $i; ?>" <?php if($experience->endYear==$i) { echo 'selected'; } ?>><?php echo $i; ?></option>
                                  <?php } ?>
                                  </select>
                                </div>
                              </div>
                             <!-- <div class="col-md-1 col-sm-1">                               
                             <button type="button" class="add-education-btn add_more_button_experience"><i class="fa fa-plus" aria-hidden="true"></i></button>
                             </div> -->

                            <?php } else { ?>
                              <div id="experience<?php echo $experience->id.$cd; ?>">
                              <div class="col-md-12 col-sm-12">
                                <input type="hidden" name="experience_id[]" value="<?php echo $experience->id; ?>">
                                <div class="form-group">
                                  <input type="text" name="companyname[]" value="<?php echo $experience->companyName; ?>" required placeholder="Company Name" class="form-control">
                                </div>
                              </div>
                              <div class="col-md-3 col-sm-3">
                                <div class="form-group">
                                  <select name="startmonth[]" required="" class="form-control">
                                    <option value="">Select Month </option> 
                                    <?php foreach($months as $month){ ?>  
                                    <option value="<?php echo $month; ?>" <?php if($experience->startMonth==$month) { echo 'selected'; } ?> ><?php echo $month; ?></option>
                                    <?php } ?>                            
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-3 col-sm-3">
                                <div class="form-group">
                                  <select name="startyear[]" required="" class="form-control">
                                    <option value="">Select Year</option>
                                    <?php 
                                      for($i=1900;$i<=date('Y');$i++)
                                      {
                                    ?>
                                    <option value="<?php echo $i; ?>" <?php if($experience->startYear==$i) { echo 'selected'; } ?>><?php echo $i; ?></option>
                                  <?php } ?>
                                 </select>
                                </div>
                              </div>
                              <div class="col-md-3 col-sm-3">
                                <div class="form-group">
                                  <select name="endmonth[]" required="" class="form-control">
                                    <option value="">Select Month</option>
                                    <?php foreach($months as $month){ ?>  
                                    <option value="<?php echo $month; ?>" <?php if($experience->endMonth==$month) { echo 'selected'; } ?>><?php echo $month; ?></option>
                                    <?php } ?> 
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-3 col-sm-3">
                                <div class="form-group">
                                  <select name="endyear[]" required="" class="form-control">
                                    <option value="">Select Year</option>
                                    <?php 
                                      for($i=1900;$i<=date('Y');$i++)
                                      {
                                    ?>
                                    <option value="<?php echo $i; ?>" <?php if($experience->endYear==$i) { echo 'selected'; } ?>><?php echo $i; ?></option>
                                  <?php } ?>
                                  </select>
                                </div>
                              </div>
                             <!-- <div class="col-md-1 col-sm-1">
                              <button data-id="<?php echo $experience->id; ?>" id="experience<?php echo $experience->id.$cd; ?>" type="button" class="remove-education-btn remove_field_experience"><i class="fa fa-minus" aria-hidden="true"></i></button>
                            </div> -->
                            </div>
                            <?php } ?>
                            
                             <?php $cd++; } } else {?>
                              <div class="col-md-12 col-sm-12">
                                <label>Company Name</label>
                                <div class="form-group">
                                  <input type="text" name="companyname[]" value="" required placeholder="Company Name" class="form-control">
                                </div>
                              </div>
                              <div class="col-md-3 col-sm-3">
                                <label>Start Month Year</label>
                                <div class="form-group">
                                  <select name="startmonth[]" required="" class="form-control">
                                    <option value="">Select Month </option> 
                                    <?php foreach($months as $month){ ?>  
                                    <option value="<?php echo $month; ?>"><?php echo $month; ?></option>
                                    <?php } ?>                            
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-3 col-sm-3">
                                <label style="color: #fff;">Start Month Years</label>
                                <div class="form-group">
                                  <select name="startyear[]" required="" class="form-control">
                                    <option value="">Select Year</option>
                                    <?php 
                                      for($i=1900;$i<=date('Y');$i++)
                                      {
                                    ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                  <?php } ?>
                                 </select>
                                </div>
                              </div>
                              <div class="col-md-3 col-sm-3">
                                <label>End Month Year</label>
                                <div class="form-group">
                                  <select name="endmonth[]" required="" class="form-control">
                                    <option value="">Select Month</option>
                                    <?php foreach($months as $month){ ?>  
                                    <option value="<?php echo $month; ?>"><?php echo $month; ?></option>
                                    <?php } ?> 
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-3 col-sm-3">
                                <label style="color: #fff;">Start </label>
                                <div class="form-group">
                                  <select name="endyear[]" required="" class="form-control">
                                    <option value="">Select Year</option>
                                    <?php 
                                      for($i=1900;$i<=date('Y');$i++)
                                      {
                                    ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                  <?php } ?>
                                  </select>
                                </div>
                              </div>
                             <!-- <div class="col-md-1 col-sm-1">                               
                                <button class="add-education-btn add_more_button_experience"><i class="fa fa-plus" aria-hidden="true"></i></button>
                             </div> -->
                             <?php } ?>
                             </div>

                             <div class="clearfix"></div>

                             



                         
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
