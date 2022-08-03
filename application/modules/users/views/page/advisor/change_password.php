<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url('assets/users'); ?>/images/favicons.png" type="images/x-icon" />
  <title><?php echo $title; ?></title>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link href="<?php echo base_url('assets/users'); ?>/css/bootstrap.min.css" rel="stylesheet">
  <!-- Style CSS -->
  <link href="<?php echo base_url('assets/users'); ?>/css/main-custom.css" rel="stylesheet">
  <link href="<?php echo base_url('assets/users'); ?>/css/dashbord.css" rel="stylesheet">
  <!-- Font Awesome core CSS -->
  <link href="<?php echo base_url('assets/users'); ?>/css/font-awesome.min.css" rel="stylesheet">
  <!-- Rang Slider core CSS -->
  <link href="<?php echo base_url('assets/users'); ?>/css/main.min.css" rel="stylesheet">
  <!-- Textpager Css -->
  <link href="<?php echo base_url('assets/users'); ?>/css/pag.css" rel="stylesheet">
</head>

<body>


<style type="text/css">

.box-contant-boxe-question {
    background-color: #ffffff;
    
    webkit-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.75);
    -moz-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.75);
    box-shadow: 0px 0px 5px 0px rgb(183, 181, 181);
    
}
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
.errinputcls 
    {
        float: left;
        top: -19px;
        position: relative;
        color: red;
        font-size: 14px;
    }

</style>

    <div id="throbber" style="display:none; min-height:120px;"></div>
    <div id="noty-holder"></div>
    <div id="wrapper">
       <!-- Navigation -->
        <?php 
            $this->load->view('page/include/sidebar'); 
        ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row" id="main">
                     <div class="col-sm-12 col-md-12 well" id="content">
                        <div class="bradcrum-list">
                            <ul>
                                <li>My Profile</li>                            
                            </ul>
                        </div>
                    </div>
            <div class="col-md-12">
              <div class="box-contant-boxe-question">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <!-- <h3 class="panel-title">Panel title</h3> --> <span class="">
                        <!-- Tabs -->
                         <ul class="nav panel-tabs">
                            <li ><a href="<?php echo base_url('users/profile'); ?>">Personal Info</a></li>
                            <li class="active"><a href="<?php echo base_url('users/advisor/change_password'); ?>">Change Password</a></li>
                            <li><a href="<?php echo base_url('users/advisor/advisor_profile_details'); ?>">Work Experience</a></li>
                            <li><a href="<?php echo base_url('users/advisor/advisor_about_details'); ?>">About</a></li>
                            <li><a href="<?php echo base_url('users/advisor/advisor_referral_code'); ?>">Referral Code</a></li>
                            <li><a href="<?php echo base_url('users/advisor/settings'); ?>">Appointment Settings</a></li>
                             <li><a href="<?php echo base_url('users/advisor/extra_settings'); ?>">Settings</a></li>
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
                          <div class="alert alert-success text-center successAlertDiv">
                            <?php echo $this->session->flashdata('success'); ?>
                          </div>
                      <?php } ?>
                        <div class="center-profile-box ">
                            <form method="post">
                              <div class="col-md-12 col-sm-12 ">
                                <label>Current Password</label>
                                <div class="form-group">
                                  <input type="password" value="<?php echo set_value('currentpass'); ?>" name="currentpass"  class="form-control">
                                  <?php echo form_error('currentpass', '<div class="errinputcls">', '</div>'); ?>
                                </div>
                              </div>
                              <div class="col-md-12 col-sm-12 ">
                                <label>New Password</label>
                                <div class="form-group">
                                  <input type="password" name="newpass" value="<?php echo set_value('newpass'); ?>" class="form-control">
                                  <?php echo form_error('newpass', '<div class="errinputcls">', '</div>'); ?>
                                </div>
                              </div>
                              <div class="col-md-12 col-sm-12">
                                <label>Confirm Password</label>
                                <div class="form-group">
                                  <input type="password" name="confirmpass" value="<?php echo set_value('confirmpass'); ?>"  class="form-control">
                                  <?php echo form_error('confirmpass', '<div class="errinputcls">', '</div>'); ?>
                                </div>
                              </div>

                              <div class="col-md-12 col-sm-12 finish-btn">
                                <input type="submit" name="" value="Save">
                              </div>
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

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- Question tab Section End Here -->
  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
   <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="<?php echo base_url('assets/users'); ?>/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url('assets/users'); ?>/js/amimation-menu-sidebar.js"></script>
  <script src="<?php echo base_url('assets/users'); ?>/js/common.js"></script>
      <script type="text/javascript">
      $(document).ready(function(){
        setTimeout(function(){ $(".successAlertDiv").fadeOut(3000); }, 3000);
      })
    </script>
</body>

</html>