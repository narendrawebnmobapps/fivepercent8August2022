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
    <link href="<?php echo base_url('assets/users'); ?>/css/bootstrap.min.css" rel="stylesheet">
    <!-- Style CSS -->
    <link href="<?php echo base_url('assets/users'); ?>/css/main-custom.css" rel="stylesheet">
    <!-- Font Awesome core CSS -->
    <link href="<?php echo base_url('assets/users'); ?>/css/font-awesome.min.css" rel="stylesheet">
     <link rel="stylesheet" href="<?php echo base_url('assets/backend'); ?>/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Dashbord CSS -->
    <link href="<?php echo base_url('assets/users'); ?>/css/dashbord.css" rel="stylesheet">
    <!-- Responsive CSS -->
    <link href="<?php echo base_url('assets/users'); ?>/css/responsive.css" rel="stylesheet">
    <!-- Animate CSS -->
    <link href="<?php echo base_url('assets/users'); ?>/css/animate.css" rel="stylesheet">
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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



</style>
</head>

<body>
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
                        <h1 class="ttile-heading">Client Profile</h1>
                        <div class="bradcrum-list">
                            <ul>
                                <li><a href="<?php echo base_url('user/dashboard'); ?>">Dashbord</a>
                                </li>
                                <li>/</li>
                                <li>Edit Profile</li>                            
                            </ul>
                        </div>
                    </div>
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
                              <div class="col-md-12 col-sm-12 finish-btn">
                                <input type="submit" name="" value="Save">
                              </div>
                            </form>
                          </div>
                    </div>

                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')
    </script>
    <script src="<?php echo base_url('assets/users'); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/amimation-menu-sidebar.js"></script>
    <!--script src="<?php echo base_url('assets/users'); ?>/js/risk-profile.js"></script-->
    <script src="<?php echo base_url('assets/users'); ?>/js/common.js"></script>
    <!-- DropDwon Navication Chat Bar Start-->
    <script type="text/javascript">
        var el = document.querySelector('.more');
                var btn = el.querySelector('.more-btn');
                var menu = el.querySelector('.more-menu');
                var visible = false;
                
                function showMenu(e) {
                    e.preventDefault();
                    if (!visible) {
                        visible = true;
                        el.classList.add('show-more-menu');
                        menu.setAttribute('aria-hidden', false);
                        document.addEventListener('mousedown', hideMenu, false);
                    }
                }
                
                function hideMenu(e) {
                    if (btn.contains(e.target)) {
                        return;
                    }
                    if (visible) {
                        visible = false;
                        el.classList.remove('show-more-menu');
                        menu.setAttribute('aria-hidden', true);
                        document.removeEventListener('mousedown', hideMenu);
                    }
                }
                
    btn.addEventListener('click', showMenu, false);
    </script>

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

  <script>
function showMyImage(fileInput) 
{
    var files = fileInput.files;
    //alert(files);
    for (var i = 0; i < files.length; i++) {           
        var file = files[i];
        var imageType = /image.*/;     
        if (!file.type.match(imageType)) {
            continue;
        }           
        var img=document.getElementById("Image_pro");            
        img.file = file;    
        var reader = new FileReader();
        reader.onload = (function(aImg) { 
            return function(e) { 
                aImg.src = e.target.result; 
            }; 
        })(img);
        reader.readAsDataURL(file);
    }    
}
$('#datepicker').datepicker({
      autoclose: true
    })
</script>
<script type="text/javascript">
  $(document).on('change','.maritalstatus',function(){
    var status = $('.maritalstatus option:selected').val();
      if(status=="Married")
      {
        $('.noOfChild').show();
      }
      else if(status=="Divorced")
      {
        $('.noOfChild').show();
      }
      else
      {
        $('.noOfChild').hide();
      }
  });
  $(document).ready(function(){
    var status = $('.maritalstatus option:selected').val();
      if(status=="Married")
      {
        $('.noOfChild').show();
      }
      else if(status=="Divorced")
      {
        $('.noOfChild').show();
      }
      else
      {
        $('.noOfChild').hide();
      }

  })
</script>
</body>

</html>