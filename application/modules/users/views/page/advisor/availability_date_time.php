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
  <link href="<?php echo base_url('assets/users'); ?>/css/dashbord.css" rel="stylesheet">
  <!-- Font Awesome core CSS -->
  <link href="<?php echo base_url('assets/users'); ?>/css/font-awesome.min.css" rel="stylesheet">

  <link href="<?php echo base_url('assets/miscellaneous'); ?>/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
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
                            <li><a href="<?php echo base_url('users/profile'); ?>">Personal Info</a></li>
                            <li ><a href="<?php echo base_url('users/advisor/change_password'); ?>">Change Password</a></li>
                            <li><a href="<?php echo base_url('users/advisor/advisor_profile_details'); ?>">Work Experience</a></li>
                            <li><a href="<?php echo base_url('users/advisor/advisor_about_details'); ?>">About</a></li>
                            <li><a href="<?php echo base_url('users/advisor/advisor_referral_code'); ?>">Referral Code</a></li>
                            <li  class="active"><a href="<?php echo base_url('users/advisor/settings'); ?>">Appointment Settings</a></li>
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
                        <?php if( $this->session->flashdata('success_message') ){ ?>
     <div class="row" id="fadeoutmsg">
        <div class="col-md-6 col-sm-6"> 
          
              <div class="alert alert-success fade in">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Success!</strong> <?php echo $this->session->flashdata('success_message'); ?>
               </div>
          </div>          
      </div>
    <?php  }?>  
    
    
   <?php if( $this->session->flashdata('success_message1') ){ ?>
        <div class="row" id="fadeoutmsg1">
        <div class="col-md-6 col-sm-6"> 
            
              <div class="alert alert-danger fade in">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Error !</strong> <?php echo $this->session->flashdata('success_message1'); ?>
               </div>
          </div>          
      </div>  
  <?php  }?>    

  
   <?php if( $this->session->flashdata('success_message2') ){ ?>
          <div class="row" id="fadeoutmsg2">
        <div class="col-md-6 col-sm-6"> 
              <div class="alert alert-danger fade in">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Error !</strong> <?php echo $this->session->flashdata('success_message2'); ?>
               </div>
          </div>          
      </div>  
      <?php  }?>  
    
    
     <?php if( $this->session->flashdata('success_message3') ){ ?>
            <div class="row" id="fadeoutmsg3">
        <div class="col-md-6 col-sm-6"> 
              <div class="alert alert-danger fade in">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Error !</strong> <?php echo $this->session->flashdata('success_message3'); ?>
               </div>
          </div>          
      </div>        
    <?php  }?>
                        <div class="center-profile-box">
                          <?php 
                              $repeated="";
                              $slotsid = "";
                             $advisor_id = "";
                             $repeated = "";
                             $start_date = "";
                             $end_date = "";
                             $sunday = "";
                             $monday = "";
                             $tuesday = "";
                             $wednesday = "";
                             $thursday = "";
                             $friday = "";
                             $saturday = "";
                             $start_time = "";
                             $end_time = "";
                           foreach($slotsdetails  as $slotsvalue) 
                           { 
                             $slotsid = $slotsvalue->id;
                             $advisor_id = $slotsvalue->advisor_id;
                             $repeated = $slotsvalue->repeated;
                             $start_date = $slotsvalue->start_date;
                             $end_date = $slotsvalue->end_date;
                             $sunday = $slotsvalue->sunday;
                             $monday = $slotsvalue->monday;
                             $tuesday = $slotsvalue->tuesday;
                             $wednesday = $slotsvalue->wednesday;
                             $thursday = $slotsvalue->thursday;
                             $friday = $slotsvalue->friday;
                             $saturday = $slotsvalue->saturday;
                             $start_time = $slotsvalue->start_time;
                             $end_time = $slotsvalue->end_time;
                           }
                           ?> 
                          <form method="post" action="" enctype="multipart/form-data">                            
                            <div class="col-md-12 col-sm-12 message-box-fli">
                              
                              <div class="form-group">
                                <label>Repeat</label>
                                <select name="repeat" required  id="repeat"  class="form-control">
                                    <option value="" selected disabled> --Select Repeat Type--</option>
                                    <option value="daily" <?php  if($countbeforesetslots > 0 ){ if ($repeated =="daily") { echo "selected"; } } ?> > Daily</option>
                                    <option value="weekly" <?php  if($countbeforesetslots > 0 ){ if ($repeated =="weekly") { echo "selected"; } } ?>> Weekly</option>
                                    <option value="monthly" <?php  if($countbeforesetslots > 0 ){ if ($repeated =="monthly") { echo "selected"; } } ?>> Monthly</option>
                                </select>
                                <br/>
                                <span class="error"><?php  echo   form_error('repeat'); ?></span>
                              </div>
                              <?php  if($countbeforesetslots > 0 && $repeated =="weekly")
                              {
                                $nonetosee = "";
                              }
                              else 
                              {  
                                $nonetosee = "nonetosee1";
                              } 
                              ?> 
                              <div class="col-md-12 <?php echo $nonetosee; ?>" id="daysoff">
                               <div class="form-group check-box-day1" >
                                <label> Repeat On</label>
                                <label for="sun"> <input type="checkbox" name="sunday" id="sun" <?php if($countbeforesetslots > 0 && $repeated =="weekly"){ if($sunday ==1){ echo "checked"; } }?> /> Sun</label>
                                <label for="mon"> <input type="checkbox" name="monday" id="mon" <?php if($countbeforesetslots > 0 && $repeated =="weekly") {  if($monday ==1){ echo "checked"; } } ?>  /> Mon</label>
                                <label for="tues"> <input type="checkbox" name="tuesday" id="tues" <?php  if($countbeforesetslots > 0 && $repeated =="weekly"){ if($tuesday ==1){ echo "checked"; } } ?>  /> Tue</label>
                                <label for="wed"> <input type="checkbox" name="wednesday" id="wed" <?php  if($countbeforesetslots > 0 && $repeated =="weekly"){ if($wednesday ==1){ echo "checked"; } } ?>  /> Wed</label>
                                <label for="thur"> <input type="checkbox" name="thursday" id="thur" <?php  if($countbeforesetslots > 0 && $repeated =="weekly"){ if($thursday ==1){ echo "checked"; } } ?>  /> Thu</label>
                                <label for="fri"> <input type="checkbox"  name="friday" id="fri" <?php  if($countbeforesetslots > 0 && $repeated =="weekly"){ if($friday ==1){ echo "checked"; } }  ?>  /> Fri</label>
                                <label for="sat"> <input type="checkbox" name="saturday" id="sat" <?php  if($countbeforesetslots > 0 && $repeated =="weekly"){ if($saturday ==1){ echo "checked"; } } ?>  /> Sat</label>
                               </div>
                                <span id="daycheck-info" class="info"></span>  
                           </div>

                               <div class="col-md-12">
                               <div class="form-group">
                                <label> Start on</label>
                                    <div class="input-group date start_date"   data-link-field="dtp_input2"   data-link-format="yyyy-mm-dd">
                                   <input type="text" style="background: #fff"  id="start_date" readonly  name="start_date" placeholder="Start date" value="<?php  if($countbeforesetslots > 0 ){ echo $start_date; } ?>" class="form-control">
                                   <span style="background: #fff" class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                  </div>
                                 <span class="error"><?php  echo   form_error('start_date'); ?></span>
                                       <span id="starton-info" class="info"></span>
                                         </div> 
                              </div>

                                <div class="col-md-12">
                                   <div class="form-group enede-1 ">
                                    <label>Ends</label>
                                <div class="input-group date end_date" data-date="" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                   <input type="text" id="end_date" readonly name="end_date" style="background: #fff"  placeholder="End date" value="<?php  if($countbeforesetslots > 0 ){ echo $end_date; } ?>"  class="form-control">
                                   <span style="background: #fff" class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                </div>
                                 <span class="error"><?php  echo   form_error('end_date'); ?></span>
                                  <span id="endon-info" class="info"></span>
                                              </label>
                                             </div>
                                </div>


                                <div class="col-md-6">
              <div  class="col-md-12">
                <div class="row">
                <div class="form-group">
                  <label> Start Time </label>
                  <select name="start_time" id="start_time" required class="form-control">
                       <option disabled selected value="" >--Select Start Time-- </option>
                      <option value="01:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($start_time =="01:00:00") { echo "selected"; } } ?>>01:00</option>
                      <option value="02:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($start_time =="02:00:00") { echo "selected"; } } ?>>02:00</option>
                      <option value="03:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($start_time =="03:00:00") { echo "selected"; } } ?>>03:00</option>
                      <option value="04:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($start_time =="04:00:00") { echo "selected"; } } ?>>04:00</option>
                      <option value="05:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($start_time =="05:00:00") { echo "selected"; } } ?>>05:00</option>
                      <option value="06:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($start_time =="06:00:00") { echo "selected"; } } ?>>06:00</option>
                      <option value="07:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($start_time =="07:00:00") { echo "selected"; } } ?>>07:00</option>
                      <option value="08:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($start_time =="08:00:00") { echo "selected"; } } ?>>08:00</option>
                      <option value="09:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($start_time =="09:00:00") { echo "selected"; } } ?>>09:00</option>
                      <option value="10:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($start_time =="10:00:00") { echo "selected"; } } ?>>10:00</option>
                      <option value="11:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($start_time =="11:00:00") { echo "selected"; } } ?>>11:00</option>
                      <option value="12:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($start_time =="12:00:00") { echo "selected"; } } ?>>12:00</option>
                      
                      <option value="13:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($start_time =="13:00:00") { echo "selected"; } } ?>>13:00</option>
                      <option value="14:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($start_time =="14:00:00") { echo "selected"; } } ?>>14:00</option>
                      <option value="15:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($start_time =="15:00:00") { echo "selected"; } } ?>>15:00</option>
                      <option value="16:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($start_time =="16:00:00") { echo "selected"; } } ?>>16:00</option>
                      <option value="17:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($start_time =="17:00:00") { echo "selected"; } } ?>>17:00</option>
                      <option value="18:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($start_time =="18:00:00") { echo "selected"; } } ?>>18:00</option>
                      <option value="19:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($start_time =="19:00:00") { echo "selected"; } } ?>>19:00</option>
                      <option value="20:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($start_time =="20:00:00") { echo "selected"; } } ?>>20:00</option>
                      <option value="21:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($start_time =="21:00:00") { echo "selected"; } } ?>>21:00</option>
                      <option value="22:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($start_time =="22:00:00") { echo "selected"; } } ?>>22:00</option>
                      <option value="23:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($start_time =="23:00:00") { echo "selected"; } } ?>>23:00</option>
                      <option value="24:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($start_time =="24:00:00") { echo "selected"; } } ?>>24:00</option>
                  </select>
                   </div>
                 </div>
                 </div>
                  <input type="hidden" value="AM" name="start_time_am_pm" />
                                <input type="hidden" value="AM" name="end_time_am_pm" /> 
                            </div>
                            <div class="col-md-6">
                  <div  class="col-md-12">
                  <div class="row">
                  <div class="form-group">
                    <label> End Time </label>
                    <select name="end_time" id="end_time" required class="form-control">
                    <option disabled selected value="" >--Select End Time-- </option>
                      <option value="01:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($end_time =="01:00:00") { echo "selected"; } } ?>>01:00</option>
                      <option value="02:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($end_time =="02:00:00") { echo "selected"; } } ?>>02:00</option>
                      <option value="03:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($end_time =="03:00:00") { echo "selected"; } } ?>>03:00</option>
                      <option value="04:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($end_time =="04:00:00") { echo "selected"; } } ?>>04:00</option>
                      <option value="05:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($end_time =="05:00:00") { echo "selected"; } } ?>>05:00</option>
                      <option value="06:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($end_time =="06:00:00") { echo "selected"; } } ?>>06:00</option>
                      <option value="07:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($end_time =="07:00:00") { echo "selected"; } } ?>>07:00</option>
                      <option value="08:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($end_time =="08:00:00") { echo "selected"; } } ?>>08:00</option>
                      <option value="09:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($end_time =="09:00:00") { echo "selected"; } } ?>>09:00</option>
                      <option value="10:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($end_time =="10:00:00") { echo "selected"; } } ?>>10:00</option>
                      <option value="11:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($end_time =="11:00:00") { echo "selected"; } } ?>>11:00</option>
                      <option value="12:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($end_time =="12:00:00") { echo "selected"; } } ?>>12:00</option>
                      
                      <option value="13:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($end_time =="13:00:00") { echo "selected"; } } ?>>13:00</option>
                      <option value="14:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($end_time =="14:00:00") { echo "selected"; } } ?>>14:00</option>
                      <option value="15:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($end_time =="15:00:00") { echo "selected"; } } ?>>15:00</option>
                      <option value="16:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($end_time =="16:00:00") { echo "selected"; } } ?>>16:00</option>
                      <option value="17:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($end_time =="17:00:00") { echo "selected"; } } ?>>17:00</option>
                      <option value="18:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($end_time =="18:00:00") { echo "selected"; } } ?>>18:00</option>
                      <option value="19:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($end_time =="19:00:00") { echo "selected"; } } ?>>19:00</option>
                      <option value="20:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($end_time =="20:00:00") { echo "selected"; } } ?>>20:00</option>
                      <option value="21:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($end_time =="21:00:00") { echo "selected"; } } ?>>21:00</option>
                      <option value="22:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($end_time =="22:00:00") { echo "selected"; } } ?>>22:00</option>
                      <option value="23:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($end_time =="23:00:00") { echo "selected"; } } ?>>23:00</option>
                      <option value="24:00:00"  <?php  if($countbeforesetslots > 0 ){ if ($end_time =="24:00:00") { echo "selected"; } } ?>>24:00</option>
                    </select>
                     </div>
                   </div>
                   </div>
                           </div>
                           <?php  if($countbeforesetslots > 0 ){  } else { ?>
                           
                           <div class="col-md-12 summry1">
                                <label> Summary: </label>
                                <label><span id="weekly-summary"></span> 
                <span id="weekly-monday"></span> 
                <span id="weekly-tuesday"></span> 
                <span id="weekly-wednesday"></span> 
                <span id="weekly-thursday"></span> 
                <span id="weekly-friday"></span>
                <span id="weekly-saturday"></span>
                <span id="weekly-sunday"></span> 
                         <!--<span id="untildate">until Jun 13, 2017</span> --></label>
                           </div>
               <?php } ?>                         
                            <div class="col-md-12 col-sm-12 finish-btn" style="margin-top: 0px;">
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
    <!-- /#wrapper -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/miscellaneous'); ?>/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/amimation-menu-sidebar.js"></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/common.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        setTimeout(function(){ $(".successAlertDiv").fadeOut(3000); }, 3000);
      })
    </script>

    <script>  
$(document).ready(function () {
  $('.start_date').datetimepicker({
    language:  'en',
    weekStart: 1,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0,
    format: 'dd-mm-yyyy'
  });
  
  $('.end_date').datetimepicker({
    language:  'en',
    weekStart: 1,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0,
    format: 'dd-mm-yyyy'
  });
  
});
</script> 

</body>

</html>