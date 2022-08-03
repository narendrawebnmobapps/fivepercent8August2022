<?php $this->load->view('includes/header'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/users/css/dashbord.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/users/css/main-custom.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/users/css/main.min.css'); ?>">
<style type="text/css">
    
.perstange-prt-text span {
    float: right;
}

.perstange-prt-text {
    
    color: #000000;
    font-size: 14px;
    font-weight: 500;
    text-transform: capitalize;
}

.perstange-prt-text h2 {
    font-size: 16px;
    text-transform: uppercase;
}

.perstange-prt-text h3 {
    font-size: 14px;
    margin-bottom: 0px;
    line-height: 2px;
}

.perstange-prt-text h5 {
    color: #000000;
    font-size: 14px;
    font-weight: 400;
    text-transform: capitalize;
    margin-top: 32px;
    margin-bottom: 5px;
}


.message-box-fli textarea {
    border-radius: 0px !important;
    height: 90px !important;
    resize: none !important;
    height: 136px !important;
    border: 1px solid #c5c4c4 !important;
    box-shadow: none !important;
   font-weight: 600 !important;
    font-size: 14px !important;
    border-radius: 0px;
    margin-bottom: 35px;
    font-family: 'Open Sans', sans-serif;}


h2.edu-tit {
    font-size: 28px !important;
    text-align: left;
    margin: 26px 0px 19px 0px;
    font-weight: 400;
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
                            <li><a href="<?php echo base_url('admin/users/advisor_work_experience/').base64_encode($user_detail->id); ?>">Work Experience</a></li>
                            <li  class="active"><a href="<?php echo base_url('admin/users/advisor_about_us_details/').base64_encode($user_detail->id); ?>">About</a></li>
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
                            <div class="col-md-12 col-sm-12 message-box-fli">
                              <label>About Yourself</label>
                              <div class="form-group">
                                <textarea type="message" name="aboutYourSelf" class="form-control" placeholder="About Yourself..."><?php echo @$YourSelf->aboutYourSelf; ?></textarea>
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
