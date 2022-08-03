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
    <!-- Font Awesome core CSS -->
    <link href="<?php echo base_url('assets/users'); ?>/css/font-awesome.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="<?php echo base_url('assets/miscellaneous'); ?>/css/bootstrap-datepicker3.css" /> -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Dashbord CSS -->
    <link href="<?php echo base_url('assets/users'); ?>/css/dashbord.css" rel="stylesheet">
    <!-- Responsive CSS -->
    <link href="<?php echo base_url('assets/users'); ?>/css/responsive.css" rel="stylesheet">
    <!-- Animate CSS -->
    <link href="<?php echo base_url('assets/users'); ?>/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/users'); ?>/css/main-custom.css" rel="stylesheet">
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>
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

#myChart-license-text{display: none;}
.slidecontainer {
  width: 100%;
}
.slidecontainer {
  width: 100%;
}
.slider {
  -webkit-appearance: none;
  width: 100%;
  height: 10px;
  border-radius: 5px;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider:hover {
  opacity: 1;
}

.slider::-webkit-slider-thumb {
  appearance: none;
  width: 23px;
  height: 24px;
  border: 0;
  background: url('contrasticon.png');
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 23px;
  height: 24px;
  border: 0;
  background: url('contrasticon.png');
  cursor: pointer;
}

.btn-group.btn-toggle {
    float: right;
   margin: 21px -9px 14px 0px;}

.btn-text-area h5 {
    font-weight: 600;
    color: #08384f;
    margin-top: 35px;
    text-align: right;
    margin-right: -50px;
}


.slider {
    -webkit-appearance: none;
    width: 100%;
    height: 16px;
    border-radius: 16px;
    background: #08384f;
    outline: none;
    opacity: inherit;
    -webkit-transition: .2s;
    transition: opacity .2s;
}


.monthly-income-text h3 {
    font-size: 17px;
    margin: 15px 0px -7px 0px;
}

.monthly-income-text h3 span {
    display: block;
    float: right;
    margin-right: 130px;
}

/*-----

According Css Here
----------*/
.panel-title {
    margin-top: 0;
    margin-bottom: 0;
    font-size: 15px;
    color: inherit;
    padding: 10px;
    /* background-color: #337ab7; */
    color: #337ab7;
    font-weight: 500;
}
.client-profile-tab .panel-body{
    box-shadow: none;
}

.glyphicon{
    font-size: 11px;
}

.panel-default>.panel-heading {
    color: #337ab7;
    background-color: #f5f5f5;
    border: none;
    background: none;
}



.client-profile-tab .panel{
    margin-bottom: -6px;
}

.box-click-crical{}

.box-click-crical ul{
    padding: 0px;
        text-align: center;
}


.box-click-crical ul li {
        display: inline-block;
        margin-right: 19px; }
   


.box-click-crical ul li a{}

.box-click-crical ul li a i {
        width: 32px;
        height: 32px;
        border: 2px solid #063853;
        border-radius: 50%;
        text-align: center;
        color: #063853;
        font-size: 16px;
        line-height: 29px;
        font-weight: 100;
    }

.box-click-crical ul li span{
    height: 32px;
    width: 32px;
    background-color: #063853;
    display: block;
    position: relative;
    top: 13px;}
/*model popup*/

.head-bg-color{
    background: #063853;
}
.head-bg-color h4 {
    color: #fff;
    font-size: 20px;
    text-align: center;
}
.close-x{
    color: #fff;
    opacity: 2;
}
.border-top-0{
    border-top: none;
}

.btn-save-info{
        color: #08384f;
        background-color: #ffffff;
        border-color: #eee;
        padding: 13px;
        font-size: 14px;
        font-weight: 500;
        border-radius: 0px;
        margin-top: 15px;
}

.tym-sedulde-info .form-control {
    height: 38px;
    border-radius: 0px;
   border: 1px solid #adabab;
    margin-bottom: 20px;
}

.tym-sedulde-info label {
    font-size: 16px;
    font-weight: 500;
    padding-top: 7px;
}
/*********************************16-04-2020***************************************/
.client-profile-tab.sms-client-overflow .panel-body {
    box-shadow: none;
    height: 282px;
    overflow: auto;
}
.client-profile-tab.sms-client-overflow .panel {
    margin-bottom: -6px;
    /*height: 410px;*/
}


@media only screen and (max-width: 1366px){
.client-profile-tab .panel-body {
    height: 450px !important;
}
}
/*
.chat-info-respond .msg_history {
    height: 236px;
    overflow: inherit;
}*/
.chat-info-respond .msg_history {
    height: inherit;
    overflow-y: auto;
    padding: 0px 15px 0 25px;
}
.averageratingreviews span {
    font-size: 20px;
    margin-right: 5px;
    color: #f6bb19;
}
.averageratingreviews{
   margin: 4px 0px 4px 0px !important;
}

/*back button css*/

.right-btn-back h4 a {

    background-color: #042739;

    font-size: 14px;

    border-radius: 2px;

    padding: 8px 21px;

    color: #fff;

    font-weight: 500;

    cursor: pointer;

}
.bradcrum-list {
float: left;
}
.right-btn-back h4 {
    text-align: right;
    margin: 0;
    padding: 0;
}
</style>
</head>

<body>
    <div id="throbber" style="display:none; min-height:120px;"></div>
    <div id="noty-holder"></div>
    <div id="wrapper">
       <!-- Navigation -->
        <?php 
        //echo "<pre>"; print_r($user_details);die;
            $this->load->view('page/include/sidebar'); 

        ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row" id="main">
                     <div class="col-sm-12 col-md-12 well" id="content">
                        <!-- <h1 class="ttile-heading">Client Profile</h1> -->
                        <div class="bradcrum-list">
                            <ul>
                                <li><?php echo $sub_title; ?></li>                        
                            </ul>
                        </div>
                        <div class="right-btn-back">

                            <h4>

                                <a href="<?php echo base_url('user/advisor'); ?>">Back</a>

                            </h4>

                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <div class="client-profile-list-info-prt">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="user-profile-info-bar-descriptions">
                                        <img src="<?php echo base_url('uploads/user-profile/'.$user_details->profile_image); ?>" alt="user-profile">
                                    </div>
                                    <div class="user-profile-onfomation-text">
                                        <h2><?php echo $user_details->first_name.' '.$user_details->last_name; ?></h2>
                                        <h4><?php echo $user_details->country_name ?></h4>
                                        <h4 class="averageratingreviews">
                                            <!-- <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                            <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                                            <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                                            <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                                            <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>  -->
                                            <?php 
                                                //echo $advisor->rating;
                                                $ratings =  ceil($averageRating);                    
                                                for($i=0;$i<$ratings;$i++)
                                                {
                                                    echo '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>';
                                                }
                                                for($i=0;$i<5-$ratings;$i++)
                                                {
                                                    echo '<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>';
                                                }
                                                
                                            ?>
                                        </h4>
                                        <p>Available To: <a href="#tab4" data-toggle="tab" id="goToChatCallTab">Chat </a>  <a href="tel:<?php echo $user_details->phone_number; ?>">Call</a></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="declinebtnAcceptandBlock">
                                         <?php if($connectivity==0){ ?>
                                    <span class="review-btn"><a href="javascript:void(0)" onclick="sendRequestAdvisor()" >Send Request</a></span>
                                <?php } else if($connectivity==2) {?>
                                    <span class="review-btn"><a href="javascript:void(0)" onclick="cancelRequestAdvisor()" style="background: #f6bb19;" > Sent</a></span>
                                <?php } else { ?>
                                    <!-- <span class="review-btn"><a href="javascript:void(0)">Connected</a></span> -->
                                    <span class="review-btn"><a href="javascript:void(0)" onclick="blockToAdvisor()" style="background: #ed0505;" > Block</a></span>

                                <?php }  if($connectivity==1) {?>
                               <span class="review-btn"><a href="javascript:void(0)" data-toggle="modal" data-target="#myModal">Review</a></span>
                                <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 client-profile-tab  sms-client-overflow">
                        <div class="panel panel-primary">
                            <div class="panel-heading"> <span class="10">
                        <!-- Tabs -->
                        <ul class="nav panel-tabs">
                            <li ><a href="#tab1" data-toggle="tab">Description</a></li>
                            <li><a href="#tab2" data-toggle="tab">History</a></li>
                            <li class="active"><a href="#tab4" data-toggle="tab">Chat/Call</a></li>
                            <li><a href="#tab5" data-toggle="tab">Schedule Appointment</a></li>
                            <li><a href="#tab6" data-toggle="tab">Rating & Review</a></li>

                        </ul>

                    </span>


                            </div>


                            <style type="text/css">
                                .advisor-profile {
                                    width: 100%;
                                    float: left;
                                    display: inline-block;
                                    border: 1px solid #ddd;
                                    border-radius: 6px;
                                    padding: 0 20px;
                                }
                                 .advisor-profile h2{
                                        background: #053852;
                                        padding: 15px 20px;
                                        border-radius: 5px;
                                        color: #fff;
                                        font-size: 22px;
                                 }
                                .vender-profile-details span{
                                    
                                    width: 100%;
                                    float: left;
                                    margin-top: 20px;
                                    border-bottom: 1px solid #d1d1d1;
                                    padding-bottom: 10px;
                                }
                                .vender-profile-details span strong{
                                   margin-right: 20px;
                                }
                                .advisor-profile .advisor-profile-description{
                                    text-align: left;
                                }
                                .discrp_heading_title{
                                    font-size: 16px;
                                    padding-bottom: 8px;
                                    border-bottom: 1px solid #d1d1d1;
                                    display: block;
                                    margin-top: 20px;
                                }
                               /* advisor_work_experience*/
                               .advisor_work_experience{
                                width: 100%;
                                float: left;
                               }
                               .Experience-list{
                                width: 100%;
                                margin-top: 20px;
                               }
                               .circle-icon-text{
                                color: #053852;
                               }
                               .circle-icon-text i{
                                color: #053852;
                                margin-right: 20px;
                               }
                               .Experience-list p{
                                font-style: italic;
                                font-size: 13px;
                                color: #999;
                                margin-left: 38px;
                                line-height: 24px;
                               }



                            </style>
                            <div class="panel-body">
                                <div class="tab-content">
                                    <div class="tab-pane" id="tab1">  
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="advisor-profile">
                                                    <h2><i class="fa fa-user"></i> ABOUT</h2>
                                                <div class="col-md-3">
                                                    <div class="vender-profile-details">
                                                    <span><strong>Full Name :</strong><?php echo $user_details->first_name.' '.$user_details->last_name; ?></span>
                                                    <span><strong>Country :</strong><?php echo $user_details->country_name ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="vender-profile-details">
                                                    <span><strong>Experience Year :</strong> <?php echo $user_details->expYears ?></span>
                                                    <span><strong>Speciality :</strong><?php echo $user_details->speciality ?></span>
                                                    </div>
                                                </div>
                                                 <div class="col-md-6">
                                                    <p class="discrp_heading_title"><strong>Description</strong></p>
                                                <p class="advisor-profile-description">
                                                   <?php echo $user_details->aboutYourSelf; ?>
                                                </p>

                                                </div>
                                                
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>  
                                    <div class="tab-pane" id="tab2">
                                                                            
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="advisor-profile">
                                                    <h2><i class="fa fa-file"></i> Work Experience</h2>
                                                    <div class="col-md-6">

                                                        <div class="advisor_work_experience">
                                                        <?php if(count($work_experiences)>0){ foreach($work_experiences as $work_exp) { ?>
                                                           <div class="Experience-list">
                                                            <span class="circle-icon-text"><i class="fa fa-circle-o"></i><?php echo $work_exp->companyName; ?></span>
                                                            <p><?php echo $work_exp->startMonth; ?> <?php echo $work_exp->startYear; ?> ~ <?php echo $work_exp->endMonth; ?> <?php echo $work_exp->endYear; ?></p>
                                                           </div><!--  -->
                                                       <?php } }  ?>                                                           
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <!-- Tab 2 End -->
                                    <div class="tab-pane chat-info-respond active" id="tab4">
                                        <div class="messaging">
                                            <div class="inbox_msg">                                                
                                                <div class="mesgs">
                                                    <div class="box-message-chaat-box-prt">
                                                        <div class="user-profile-chats">
                                                            <img src="<?php echo base_url('uploads/user-profile/'.$user_details->profile_image); ?>" style="width: 50px;height: 50px;">
                                                            <h2>Chat with <?php echo $user_details->first_name.' '.$user_details->last_name; ?></h2>
                                                            <p><?php echo count($messages); ?> Messages</p>
                                                        </div>                                                       
                                                    </div>
                                                    <?php if($connectivity==0){ ?>
                                                        <div class="sendRequestDiv">
                                                            <a href="javascript:void(0)" class="sendRequestBtn" onclick="sendRequestAdvisor()" >Send Request</a>
                                                        </div>
                                                    <?php } else if($connectivity==2) {?>
                                                        <div class="sendRequestDiv">
                                                        <a href="javascript:void(0)" class="sendRequestBtn" onclick="cancelRequestAdvisor()" style="background: #f6bb19;" >Sent</a>
                                                        </div>
                                                    <?php } else { ?>

                                                    <div class="msg_history">
                                                        <?php 
                                                        foreach($messages as $mess){
                                                            $time = date("h:i A", strtotime($mess->created_on)); 
                                                            $date = date("F d", strtotime($mess->created_on)); 
                                                        ?>

                                                        <?php  
                                                        if($mess->user_one!=$this->session->userdata('user_id')) 
                                                        {
                                                            
                                                         ?>
                                                        <div class="incoming_msg">
                                                            <div class="incoming_msg_img">
                                                                <img src="<?php echo base_url('uploads/user-profile/'.$user_details->profile_image); ?>" alt="" style="width: 50px;height: 50px;">
                                                            </div>
                                                            <div class="received_msg">
                                                                <div class="received_withd_msg">
                                                                    <p><?php echo $mess->message ?></p> <span class="time_date"> <?php echo $time; ?>    |    <?php echo $date; ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php } ?>
                                                        <?php if($mess->user_one==$this->session->userdata('user_id') && $mess->user_two!=$this->session->userdata('user_id')) { ?>
                                                        <div class="outgoing_msg">
                                                            <div class="sent_msg">
                                                                <p><?php echo $mess->message ?></p> <span class="time_date"> <?php echo $time; ?>    |    <?php echo $date; ?></span> 
                                                            </div>
                                                        </div>
                                                        <?php } ?>
                                                        <?php } ?>                                                        
                                                    </div>
                                                    <div class="type_msg">
                                                        <div class="input-group input_msg_write">
                                                            <textarea id="btn-input" type="text" class="write_msg" placeholder="Type a message"></textarea>
                                                            <span class="input-group-btn">
                                                        <button id="btn-chat" class="msg_send_btn" type="button">Send</button>
                                                    </span>
                                                        </div>
                                                    </div>
                                                    <?php } ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Chats Tab-4 -->
                                    <div class="tab-pane" id="tab5">  
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="advisor-profile">
                                                    <h2><i class="fa fa-handshake-o"></i> Schedule Appointment </h2>
                                                    <?php if($connectivity==0){ ?>
                                                        <div class="sendRequestDiv" style="margin-top: 65px;">
                                                            <a href="javascript:void(0)" class="sendRequestBtn" onclick="sendRequestAdvisor()" >Send Request</a>
                                                        </div>
                                                    <?php } else if($connectivity==2) {?>
                                                        <div class="sendRequestDiv" style="margin-top: 65px;">
                                                        <a href="javascript:void(0)" class="sendRequestBtn" onclick="cancelRequestAdvisor()" style="background: #f6bb19;">Sent</a>
                                                        </div>
                                                    <?php } else { ?>
                                                    <form class="tym-sedulde-info" method="post" id="frmscheduleAppointment">
                                                        <div class="col-md-6 col-sm-6">
                                                      <div class="col-md-5">
                                                         <label>Appointment Date*</label>
                                                      </div>
                                                      <input type="hidden" name="advisor_id" value="<?php echo base64_decode(base64_decode($this->uri->segment(3))); ?>">

                                                        <div class="col-md-7">
                                                                <div class="form-group">
                                                                <input  class="form-control" id="date" name="date" readonly placeholder="YYYY-MM-DD" type="text" />
                                                            </div>
                                                        </div>
                                                        </div>
                                                         <div class="col-md-6 col-sm-6">
                                                            <div class="col-md-5">
                                                                <label>Appointment Time*</label>
                                                            </div>
                                                            <div class="col-md-7">
                                                                <div class="form-group">
                                                                <select name="time_slot" id="time_slot" class="form-control selectpicker">
                                                                    <option value="" selected >Select Time Slot</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 finish-btn" style="margin-top: 0px;">
                                                           <input type="submit" name="" value="Save" id="btncheduleAppointment">
                                                        </div>
                                                        <div class="col-md-12 col-sm-12 appointmentSuccessDiv" style="margin-top: 0px; display: none;text-align: center;">
                                                            <div class="alert alert-success">
                                                                Appointment Scheduled Successfully.
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <?php } ?>                                                
                                                </div>
                                            </div>
                                        </div>                                        
                                    </div>  

                                    <div class="tab-pane" id="tab6">  
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="advisor-profile">
                                                    <h2><i class="fa fa-thumbs-up" aria-hidden="true"></i>  Rating & Review</h2>
                                                <div class="reviewList">
                                                      <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="review-block">
                                                                <?php 
                                                                    if(count($ratingReviews)>0){
                                                                    foreach($ratingReviews as $rating){ 
                                                                ?>
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <img src="<?php echo base_url('uploads/user-profile/'.$rating->profile_image); ?>" class="img-rounded">
                                                                        <div class="review-block-name"><a href="javascript:void(0);"><?php echo $rating->first_name." ".$rating->last_name; ?></a></div>
                                                                        <div class="review-block-date"><?php echo date("F d, Y", strtotime($rating->updated_on)) ?></div>
                                                                    </div>
                                                                    <div class="col-sm-9">
                                                                        <div class="review-block-rate">
                                                                              <!-- <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                              <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                              <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                              <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                                                              <span class="glyphicon glyphicon-star" aria-hidden="true"></span> -->
                                          <?php 
                                            //echo $advisor->rating;
                                            $ratings =  ceil($rating->rating); 
                                            for($i=0;$i<$ratings;$i++)
                                            {
                                                echo '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>';
                                            }
                                            for($i=0;$i<5-$ratings;$i++)
                                            {
                                                echo '<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>';
                                            }
                                        ?>
                                                                        </div>                      
                                                                        <div class="review-block-description">
                                                                            <?php echo $rating->review; ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr/>
                                                            <?php } } ?>                                                                
                                                            </div>
                                                        </div>
                                                    </div>
        
                                                    
                                                </div><!-- reviewList -->
                                                
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

        <style type="text/css">
            
            .review-information .animated {
    -webkit-transition: height 0.2s;
    -moz-transition: height 0.2s;
    transition: height 0.2s;
}

.review-information .stars
{
    margin: 20px 0;
    font-size: 24px;
    color: #d17581;
}

.review-information .glyphicon {
    font-size: 37px;
    color: #FFC107;
}

.review-information  .well{
    padding: 0
}
.review-information .form-control{}

.review-information .btn-success {
    color: #fff;
    background-color: #063853;
    border-color: #063853;
    padding: 7px 44px !important;
    outline: none;
}

.review-information .btn-success:hover, .btn-success:focus {
    color: #fff;
   background-color: #063853;
    border-color: #063853;
    outline: none;
}


form.tym-sedulde-info {
   margin: 38px 0px 47px 0px;
    border: 1px solid #cec9c9;
    display: inline-block;
    padding: 30px;
}
        </style>
<!-- Review Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content review-information">
        <div class="modal-header head-bg-color">
          <button type="button" class="close close-x" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Rate your Advisor</h4>
        </div>
        <div class="modal-body">
          <div class="container">
    <div class="row">
        <div class="col-md-6">
        <div class="well well-sm">
             <!-- <div class="text-right">
                <a class="btn btn-success btn-green" href="#reviews-anchor" id="open-review-box">Leave a Review</a>
            </div>  -->
        
            <div class="row" id="post-review-box">
                <div class="col-md-12">
                    <form  action="" method="post" id="ratingReviewForm">
                        <input id="ratings-hidden" name="rating" type="hidden"> 
                        <textarea class="form-control animated" id="new-review" name="comment" placeholder="Enter your review here..."></textarea>
                        <input type="hidden" name="client_id" value="<?php echo $this->uri->segment(3); ?>">
                        <div class="text-right">
                            <div class="stars starrr" data-rating="0"></div>
                            <button class="btn btn-success btn-lg reviewRatingSaveBtn" type="submit">Save</button>
                        </div>
                    </form>
                    <div class="col-md-12 col-sm-12 ratingReviewSuccessDiv" style="display: none;"><p style="color: #3c763d;text-align: center;">Data Saved successfully</p></div>
                </div>
            </div>
        </div> 
         
        </div>
    </div>
</div>
        </div>
        <div class="modal-footer border-top-0">
         <!--  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        </div>
      </div>
      
    </div>
  </div>
  <!--Review Modal End-->

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
   <!--  <script type="text/javascript" src="<?php echo base_url('assets/miscellaneous'); ?>/js/bootstrap-datepicker.min.js"></script> -->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/common.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <script type="text/javascript">
        function confirmDecline() {         
            swal({
            title: "Are you sure ?",
            text: "Once Decline, you will not be able to Chat.", 
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) 
            {
                //alert();
                $.ajax({
                    url: "<?php echo base_url('users/dashboard/declineAdvisorUser'); ?>",
                    type: "POST",
                    data: {client_id: "<?php echo base64_decode(base64_decode($this->uri->segment(3))); ?>"},
                    dataType: "html",
                    success: function (data) 
                    {
                        //alert(data);
                        swal("Done!", "It was succesfully Declined!", "success");
                        setTimeout(function(){
                            window.location.href = "<?php echo base_url('user/dashboard'); ?>";
                        }, 2000);
                        

                    },
                    error: function (xhr, ajaxOptions, thrownError) 
                    {
                        swal("Error deleting!", "Please try again", "error");
                    }
                });
            }
           else 
           {
            swal("The person will Available with you");
           }
        });

    }
    </script>
    <!-- DropDwon Navication Chat Bar Start-->
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
    <!-- DropDwon Navication Chat Bar End -->









  <script type="text/javascript">
    function sendMessageFunction()
    {
        var write_msg  = $('.write_msg').val();
        //alert($.trim(write_msg));
       // return false;
            if($.trim(write_msg)=="")
            {
                return false;
            }

             var month = new Array();
              month[0] = "January";
              month[1] = "February";
              month[2] = "March";
              month[3] = "April";
              month[4] = "May";
              month[5] = "June";
              month[6] = "July";
              month[7] = "August";
              month[8] = "September";
              month[9] = "October";
              month[10] = "November";
              month[11] = "December";

              var date = new Date();
              var hours = date.getHours();
              var minutes = date.getMinutes();
              var ampm = hours >= 12 ? 'PM' : 'AM';
              hours = hours % 12;
              hours = hours ? hours : 12; // the hour '0' should be '12'
              minutes = minutes < 10 ? '0'+minutes : minutes;

            var client_id = "<?php echo base64_decode(base64_decode($this->uri->segment(3))); ?>"
           // alert(client_id);
            var message = '<div class="outgoing_msg"><div class="sent_msg"><p>'+write_msg+'</p> <span class="time_date"> '+hours+':'+minutes+' '+ampm+'    |    '+month[date.getMonth()]+' '+date.getDate()+'</span> </div></div>';
            $('.msg_history').append(message);
            $('.write_msg').val('');
            $('.msg_history').scrollTop($('.msg_history')[0].scrollHeight);
            $.ajax({
                url: '<?php echo base_url('users/advisor/save_chat_message_from_user_side_ajax'); ?>',
                type: "POST",
                data:{write_msg:write_msg,client_id:client_id},
                success: function(data)
                {
                    if(data=="blocked")
                    {
                        sweetAlert('warning','','This Client no longer Available with you now. You can not chat anymore!');
                        setTimeout(function(){ 
                            location.reload();
                                }, 3000);
                    }
                    
                }
            });

    }

    /*Send Request To Advisor*/
    function sendRequestAdvisor()
    {
        var client_id = "<?php echo base64_decode(base64_decode($this->uri->segment(3))); ?>";
        $.ajax({
            url: '<?php echo base_url('users/advisor/sendRequestToAdvisorAjax'); ?>',
            type: "POST",
            data:{client_id:client_id},
            success: function(data)
            {
                sweetAlert('success','','Your Request has been sent successfully');
                setTimeout(function(){ 
                    location.reload();
                        }, 3000);
                
                
            }
        });
    }
    function cancelRequestAdvisor()
    {
        swal({
            title: "Are you sure ?",
            text: "Once Cancel, you will not be able to connect.", 
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) 
            {
                //alert();
                $.ajax({
                    url: "<?php echo base_url('users/advisor/cancelRequestAdvisorAjax'); ?>",
                    type: "POST",
                    data: {client_id: "<?php echo base64_decode(base64_decode($this->uri->segment(3))); ?>"},
                    dataType: "html",
                    success: function (data) 
                    {
                        //alert(data);
                        swal("Done!", "It was succesfully Cancelled Request!", "success");
                        setTimeout(function(){
                            location.reload();
                        }, 2000);                       

                    },
                    error: function (xhr, ajaxOptions, thrownError) 
                    {
                        swal("Error!", "Please try again", "error");
                    }
                });
            }
            else 
            {
                swal("The Request will Available");
            }
        });
    }
    function blockToAdvisor()
    {
        swal({
            title: "Are you sure ?",
            text: "Once Block, you will not be able to Chat.", 
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) 
            {
                //alert();
                $.ajax({
                    url: "<?php echo base_url('users/advisor/cancelRequestAdvisorAjax'); ?>",
                    type: "POST",
                    data: {client_id: "<?php echo base64_decode(base64_decode($this->uri->segment(3))); ?>"},
                    dataType: "html",
                    success: function (data) 
                    {
                        //alert(data);
                        swal("Done!", "It was succesfully Block!", "success");
                        setTimeout(function(){
                            location.reload();
                        }, 2000);                       

                    },
                    error: function (xhr, ajaxOptions, thrownError) 
                    {
                        swal("Error!", "Please try again", "error");
                    }
                });
            }
            else 
            {
                swal("The Advisor will Available with you");
            }
        });
    }



      $(document).ready(function(){
        $('.msg_send_btn').click(function(){
            
            sendMessageFunction();
        })
      });

      $(document).on('keyup','.write_msg',function(e){
        e.preventDefault();
        if (e.which === 13) 
        {
                sendMessageFunction();
        }
        
      })

      function reloadChatEverySecond()
      {
        $.ajax({
                type  : 'POST',
                url   : "<?php echo base_url('users/advisor/ajaxReadmessageOnLoad/'.$this->uri->segment(3)); ?>",
                data  : {},
                success: function(data) 
                {
                  $('.msg_history').html(data);
                  //alert(data);
                }
            });
      }


      setInterval(function(){
          reloadChatEverySecond()
      }, 3000);
    /*rating review js*/
      $(document).on('click','.reviewRatingSaveBtn',function(event){
        event.preventDefault();
        var comment = $('#new-review').val();
        var rating = $('#ratings-hidden').val();
        if(comment=="")
        {
            $('#new-review').css('border','1px solid red');
            return false;
        }
        else
        {
           $('#new-review').css('border',''); 
        }
        if(rating=="")
        {
            sweetAlert('error','Oops...','Please select star rating');
            return false;
        }
        $.ajax({
                url:'<?php echo base_url("users/dashboard/advisorReviewRating"); ?>',
                method:'POST',
                data:new FormData( $("#ratingReviewForm")[0]),
                async : false,
                cache : false,
                contentType : false,
                processData : false,
                success:function(data)
                {
                       //$("#ratingReviewForm")[0].reset();
                       $('#new-review').val('');
                       $('#ratings-hidden').val('');
                       $('.ratingReviewSuccessDiv').show();
                       setTimeout(function(){ $('.ratingReviewSuccessDiv').fadeOut();
                        $('#myModal').modal('toggle');
                        }, 3000);
                    
                }
            });
      })
  </script>
  <script type="text/javascript">
    $('.msg_history').scrollTop($('.msg_history')[0].scrollHeight);
</script>
<script type="text/javascript">
    
(function(e){var t,o={className:"autosizejs",append:"",callback:!1,resizeDelay:10},i='<textarea tabindex="-1" style="position:absolute; top:-999px; left:0; right:auto; bottom:auto; border:0; padding: 0; -moz-box-sizing:content-box; -webkit-box-sizing:content-box; box-sizing:content-box; word-wrap:break-word; height:0 !important; min-height:0 !important; overflow:hidden; transition:none; -webkit-transition:none; -moz-transition:none;"/>',n=["fontFamily","fontSize","fontWeight","fontStyle","letterSpacing","textTransform","wordSpacing","textIndent"],s=e(i).data("autosize",!0)[0];s.style.lineHeight="99px","99px"===e(s).css("lineHeight")&&n.push("lineHeight"),s.style.lineHeight="",e.fn.autosize=function(i){return this.length?(i=e.extend({},o,i||{}),s.parentNode!==document.body&&e(document.body).append(s),this.each(function(){function o(){var t,o;"getComputedStyle"in window?(t=window.getComputedStyle(u,null),o=u.getBoundingClientRect().width,e.each(["paddingLeft","paddingRight","borderLeftWidth","borderRightWidth"],function(e,i){o-=parseInt(t[i],10)}),s.style.width=o+"px"):s.style.width=Math.max(p.width(),0)+"px"}function a(){var a={};if(t=u,s.className=i.className,d=parseInt(p.css("maxHeight"),10),e.each(n,function(e,t){a[t]=p.css(t)}),e(s).css(a),o(),window.chrome){var r=u.style.width;u.style.width="0px",u.offsetWidth,u.style.width=r}}function r(){var e,n;t!==u?a():o(),s.value=u.value+i.append,s.style.overflowY=u.style.overflowY,n=parseInt(u.style.height,10),s.scrollTop=0,s.scrollTop=9e4,e=s.scrollTop,d&&e>d?(u.style.overflowY="scroll",e=d):(u.style.overflowY="hidden",c>e&&(e=c)),e+=w,n!==e&&(u.style.height=e+"px",f&&i.callback.call(u,u))}function l(){clearTimeout(h),h=setTimeout(function(){var e=p.width();e!==g&&(g=e,r())},parseInt(i.resizeDelay,10))}var d,c,h,u=this,p=e(u),w=0,f=e.isFunction(i.callback),z={height:u.style.height,overflow:u.style.overflow,overflowY:u.style.overflowY,wordWrap:u.style.wordWrap,resize:u.style.resize},g=p.width();p.data("autosize")||(p.data("autosize",!0),("border-box"===p.css("box-sizing")||"border-box"===p.css("-moz-box-sizing")||"border-box"===p.css("-webkit-box-sizing"))&&(w=p.outerHeight()-p.height()),c=Math.max(parseInt(p.css("minHeight"),10)-w||0,p.height()),p.css({overflow:"hidden",overflowY:"hidden",wordWrap:"break-word",resize:"none"===p.css("resize")||"vertical"===p.css("resize")?"none":"horizontal"}),"onpropertychange"in u?"oninput"in u?p.on("input.autosize keyup.autosize",r):p.on("propertychange.autosize",function(){"value"===event.propertyName&&r()}):p.on("input.autosize",r),i.resizeDelay!==!1&&e(window).on("resize.autosize",l),p.on("autosize.resize",r),p.on("autosize.resizeIncludeStyle",function(){t=null,r()}),p.on("autosize.destroy",function(){t=null,clearTimeout(h),e(window).off("resize",l),p.off("autosize").off(".autosize").css(z).removeData("autosize")}),r())})):this}})(window.jQuery||window.$);

var __slice=[].slice;(function(e,t){var n;n=function(){function t(t,n){var r,i,s,o=this;this.options=e.extend({},this.defaults,n);this.$el=t;s=this.defaults;for(r in s){i=s[r];if(this.$el.data(r)!=null){this.options[r]=this.$el.data(r)}}this.createStars();this.syncRating();this.$el.on("mouseover.starrr","span",function(e){return o.syncRating(o.$el.find("span").index(e.currentTarget)+1)});this.$el.on("mouseout.starrr",function(){return o.syncRating()});this.$el.on("click.starrr","span",function(e){return o.setRating(o.$el.find("span").index(e.currentTarget)+1)});this.$el.on("starrr:change",this.options.change)}t.prototype.defaults={rating:void 0,numStars:5,change:function(e,t){}};t.prototype.createStars=function(){var e,t,n;n=[];for(e=1,t=this.options.numStars;1<=t?e<=t:e>=t;1<=t?e++:e--){n.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"))}return n};t.prototype.setRating=function(e){if(this.options.rating===e){e=void 0}this.options.rating=e;this.syncRating();return this.$el.trigger("starrr:change",e)};t.prototype.syncRating=function(e){var t,n,r,i;e||(e=this.options.rating);if(e){for(t=n=0,i=e-1;0<=i?n<=i:n>=i;t=0<=i?++n:--n){this.$el.find("span").eq(t).removeClass("glyphicon-star-empty").addClass("glyphicon-star")}}if(e&&e<5){for(t=r=e;e<=4?r<=4:r>=4;t=e<=4?++r:--r){this.$el.find("span").eq(t).removeClass("glyphicon-star").addClass("glyphicon-star-empty")}}if(!e){return this.$el.find("span").removeClass("glyphicon-star").addClass("glyphicon-star-empty")}};return t}();return e.fn.extend({starrr:function(){var t,r;r=arguments[0],t=2<=arguments.length?__slice.call(arguments,1):[];return this.each(function(){var i;i=e(this).data("star-rating");if(!i){e(this).data("star-rating",i=new n(e(this),r))}if(typeof r==="string"){return i[r].apply(i,t)}})}})})(window.jQuery,window);$(function(){return $(".starrr").starrr()})

$(function(){

  $('#new-review').autosize({append: "\n"});

  var reviewBox = $('#post-review-box');
  var newReview = $('#new-review');
  var openReviewBtn = $('#open-review-box');
  var closeReviewBtn = $('#close-review-box');
  var ratingsField = $('#ratings-hidden');

  openReviewBtn.click(function(e)
  {
    reviewBox.slideDown(400, function()
      {
        $('#new-review').trigger('autosize.resize');
        newReview.focus();
      });
    openReviewBtn.fadeOut(100);
    closeReviewBtn.show();
  });

  closeReviewBtn.click(function(e)
  {
    e.preventDefault();
    reviewBox.slideUp(300, function()
      {
        newReview.focus();
        openReviewBtn.fadeIn(200);
      });
    closeReviewBtn.hide();
    
  });

  $('.starrr').on('starrr:change', function(e, value){
    //alert(value);
    ratingsField.val(value);
  });
});

$(document).ready(function() {

    var date_input = $('input[name="date"]'); //our date input has the name "date"
    //var container=$('.form-horizontal').length>0 ? $('.form-horizontal').parent() : "body";
    date_input.datepicker({
        changeMonth : true,
        changeYear : true,
        numberOfMonths: 1,
        dateFormat: 'yy-mm-dd',
        minDate: 0,
        onSelect: function(dateText, inst) 
        {
            var date = $(this).val();
            var client_id = "<?php echo base64_decode(base64_decode($this->uri->segment(3))); ?>";
            //alert(client_id);
            $.ajax({
                type  : 'POST',
                url   : "<?php echo base_url('users/dashboard/getTimeSlotBydateToUser'); ?>",
                data  : {date:date,client_id:client_id},
                success: function(data) 
                {
                  if(data==0)
                  {
                    sweetAlert('error','Oops...','The Advisor is not Available on selected date');
                    $('#date').val('');
                  }
                  else
                  {
                    $('#time_slot').html(data);
                  }
                  
                }
            });

        }
    })

});





$(document).on('click','#btncheduleAppointment',function(event){
    event.preventDefault();
    var date = $('#date').val();
    var time_slot = $('#time_slot option:selected').val();
    if(date=="")
    {
        sweetAlert('error','Oops...','Please Choose Appointment date');
        return false;
    }
    if(time_slot=="")
    {
        sweetAlert('error','Oops...','Please Select Appointment time slot');
        return false;
    }
    $.ajax({
            url:'<?php echo base_url("users/dashboard/scheduleAppoinment_ajax"); ?>',
            method:'POST',
            data:new FormData( $("#frmscheduleAppointment")[0]),
            async : false,
            cache : false,
            contentType : false,
            processData : false,
            success:function(data)
            {
                
                console.log(data);
                if(data==0)
                {
                    sweetAlert('error','Oops...','The advisor is not Available on selected time slot');
                }
                else if(data==1)
                {
                    $("#frmscheduleAppointment")[0].reset();
                    $('.appointmentSuccessDiv').show();
                    setTimeout(function(){ $('.appointmentSuccessDiv').fadeOut();},5000);
                }                
            }
        });
    });

$(document).on('click','#goToChatCallTab',function(){
    $('.client-profile-tab .nav li.active').removeClass('active');
    $('.client-profile-tab .nav li:nth-child(3)').addClass('active');
});
</script>



</body>

</html>