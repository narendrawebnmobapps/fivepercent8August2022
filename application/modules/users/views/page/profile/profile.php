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
  <link href="<?php echo base_url('assets/users'); ?>/css/responsive.css" rel="stylesheet">
</head>

<body>


<style type="text/css">

.box-contant-boxe-question {
    background-color: #ffffff;
    
    webkit-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.75);
    -moz-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.75);
    box-shadow: 0px 0px 5px 0px rgb(183, 181, 181);
    
}

.talk_to_advisor_btn_section{
  margin-left: -9.2px;
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
                            <li class="active"><a href="<?php echo base_url('users/profile'); ?>">Personal Info</a></li>
                            <li><a href="<?php echo base_url('users/profile/settings'); ?>">Settings</a></li>
                            <li><a href="<?php echo base_url('users/profile/change_password'); ?>">Change Password</a></li>
                            <li><a href="<?php echo base_url('users/profile/financialsituation'); ?>">Financial Situation</a></li>
                            <li><a href="<?php echo base_url('users/profile/investmentobjective'); ?>">Investment Objectives</a></li>
                            <li><a href="<?php echo base_url('users/profile/knowledgeExperience'); ?>">Knowlegde &amp; Experience</a></li>
                            <li><a href="<?php echo base_url('users/profile/understandingFinancialcommitment'); ?>" >Understanding Financial Commitments</a></li>
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
                                  <input type="text" readonly value="<?php echo @$user_detail->dob; ?>" name="date_of_birth"  id="datepicker" required placeholder="APR 22 1975" class="form-control">
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
                                  <select class="form-control" name="noofchild">
                                    <?php for($i=1;$i<=10;$i++){ ?>
                                    <option value="<?php echo $i; ?>" <?php if($i==@$user_detail->no_of_child) {echo "selected"; } ?>><?php echo $i; ?></option>
                                  <?php } ?>
                                  </select>
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
                              <div class="col-md-7">
                                <div class="talk_to_advisor_btn_section">
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
  <script src="<?php echo base_url('assets/users'); ?>/js/paginate.js"></script>
  <script src="<?php echo base_url('assets/users'); ?>/js/custom.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="<?php echo base_url('assets/users'); ?>/js/common.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script type="text/javascript">
    $(function() {
        $( "#datepicker" ).datepicker({
            dateFormat : 'mm/dd/yy',
            changeMonth : true,
            changeYear : true,
            yearRange: '-100y:c+nn',
            defaultdate:'01-01-1990',
        });
    });
   
</script>
<script type="text/javascript">
  function sweetAlert(type,title,message)
  {
    Swal.fire({
        allowOutsideClick: false,
        type: type,
        title: title,
        text: message,
        //footer: '<a href>Why do I have this issue?</a>'
      })
  }
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
        var ext = $('#upload-img').val().split('.').pop().toLowerCase();
        if ($.inArray(ext, ['gif','png','jpg','jpeg']) == -1){
          //alert("Please upload gif,png,jpg or jpeg image");
          sweetAlert('error','Oops...','Please upload gif,png,jpg or jpeg image only');
          $('#upload-img').val('');
          return false;
         }
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
</script>


  <!-- Switch Btn Js Here -->
  <script type="text/javascript">
    $('.btn-toggle').click(function() {
        $(this).find('.btn').toggleClass('active');  
        
        if ($(this).find('.btn-primary').length>0) {
          $(this).find('.btn').toggleClass('btn-primary');
        }
        if ($(this).find('.btn-danger').length>0) {
          $(this).find('.btn').toggleClass('btn-danger');
        }
        if ($(this).find('.btn-success').length>0) {
          $(this).find('.btn').toggleClass('btn-success');
        }
        if ($(this).find('.btn-info').length>0) {
          $(this).find('.btn').toggleClass('btn-info');
        }
        
        $(this).find('.btn').toggleClass('btn-default');
           
    });
  </script>
 <script type="text/javascript">
    $(document).ready(function(){
      setTimeout(function(){ $(".successAlertDiv").fadeOut(3000); }, 3000);
    })
  </script>
</body>

</html>