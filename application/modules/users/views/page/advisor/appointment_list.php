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
<script type="text/javascript" src="<?php echo base_url('assets/miscellaneous'); ?>/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
  <link href="<?php echo base_url('assets/miscellaneous'); ?>/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
</head>
<body>
<style type="text/css">

.box-contant-boxe-question {
    background-color: #ffffff;
    
    webkit-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.75);
    -moz-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.75);
    box-shadow: 0px 0px 5px 0px rgb(183, 181, 181);
    
}

.list-tables-info table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

.list-tables-info td, th {
  border: 1px solid #d0c9c9;
  text-align: left;
  padding: 8px;
}

.list-tables-info tr:nth-child(even) {
  background-color: #ccc;
}

.list-tables-info h2 {
    font-size: 24px;
    font-weight: 500;
    margin: 3px 0px 24px 0px;
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
                            <li class="active"><a href="<?php echo base_url('users/advisor/settings'); ?>">Appointment Settings</a></li>
                             <li><a href="<?php echo base_url('users/advisor/extra_settings'); ?>">Settings</a></li>
                        </ul>
                    </span>
                  </div>
                  <div class="panel-body">
                    <div class="tab-content">
                      <div class="tab-pane active list-tables-info" id="tab1">
                        <h2>Appointment List</h2>
                        <div class="panel panel-primary">
                          <div class="panel-heading"> <span class="10">
                                <!-- Tabs -->
                                <ul class="nav panel-tabs">
                                <li class="active"><a href="#tab5"  data-toggle="tab">Today Appointments</a></li>
                                <li><a href="#Upcomingappoints" data-toggle="tab">Upcoming Appointments</a></li>
                                <li><a href="#tab6" data-toggle="tab">All Appointments</a></li>
                                </ul>
                            </span>
                          </div>
                          <div class="panel-body">
                              <div class="tab-content">
                                  <div class="tab-pane active" id="tab5">
                                      <table style="width:100%;">
                                        <tr>
                                          <th>#</th>
                                          <th>Customer Name</th>
                                          <th>Email</th>
                                          <th>Schedule Date</th>
                                          <th>Time</th>
                                        </tr>
                                        <?php 
                                        $tDate = date('Y-m-d');
                                        if(count($appointment_lists)>0){ $inc = 1; foreach($appointment_lists as $appointment){ 
                                          if($appointment->schedule_date==$tDate){
                                          ?>
                                        <tr>
                                          <td><?php echo $inc; ?></td>
                                          <td><a href="<?php echo base_url('advisor/client/'.base64_encode(base64_encode($appointment->user_id))); ?>"><?php echo $appointment->first_name.' '.$appointment->last_name; ?></a></td>
                                          <td><?php echo $appointment->email; ?></td>
                                          <td><?php echo $appointment->schedule_date; ?></td>
                                          <td><?php echo substr($appointment->start_time, 0,5).' - '.substr($appointment->end_time, 0,5); ?></td>
                                        </tr> 
                                        <?php $inc++; } } } ?>                         
                                      </table>
                                  </div>
                                  <div class="tab-pane" id="Upcomingappoints">
                                      <table style="width:100%;">
                                        <tr>
                                          <th>#</th>
                                          <th>Customer Name</th>
                                          <th>Email</th>
                                          <th>Schedule Date</th>
                                          <th>Time</th>
                                        </tr>
                                        <?php 
                                        $date = date('Y-m-d');
                                        if(count($appointment_lists)>0){ $inc = 1; foreach($appointment_lists as $appointment){ 
                                            if($appointment->schedule_date>$date){
                                          ?>
                                        <tr>
                                          <td><?php echo $inc; ?></td>
                                          <td><a href="<?php echo base_url('advisor/client/'.base64_encode(base64_encode($appointment->user_id))); ?>"><?php echo $appointment->first_name.' '.$appointment->last_name; ?></a></td>
                                          <td><?php echo $appointment->email; ?></td>
                                          <td><?php echo $appointment->schedule_date; ?></td>
                                          <td><?php echo substr($appointment->start_time, 0,5).' - '.substr($appointment->end_time, 0,5); ?></td>
                                        </tr> 
                                        <?php $inc++; } } } ?>                         
                                      </table>
                                  </div>
                                  <div class="tab-pane" id="tab6">
                                      <table style="width:100%;">
                                        <tr>
                                          <th>#</th>
                                          <th>Customer Name</th>
                                          <th>Email</th>
                                          <th>Schedule Date</th>
                                          <th>Time</th>
                                        </tr>
                                        <?php if(count($appointment_lists)>0){ $inc = 1; foreach($appointment_lists as $appointment){ ?>
                                        <tr>
                                          <td><?php echo $inc; ?></td>
                                          <td><a href="<?php echo base_url('advisor/client/'.base64_encode(base64_encode($appointment->user_id))); ?>"><?php echo $appointment->first_name.' '.$appointment->last_name; ?></a></td>
                                          <td><?php echo $appointment->email; ?></td>
                                          <td><?php echo $appointment->schedule_date; ?></td>
                                          <td><?php echo substr($appointment->start_time, 0,5).' - '.substr($appointment->end_time, 0,5); ?></td>
                                        </tr> 
                                        <?php $inc++; } } ?>                         
                                      </table>
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
    <script src="<?php echo base_url('assets/users'); ?>/js/amimation-menu-sidebar.js"></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/common.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        setTimeout(function(){ $(".successAlertDiv").fadeOut(3000); }, 3000);
      })
    </script>

</body>

</html>