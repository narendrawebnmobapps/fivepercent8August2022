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
#myChart {
  width:100%;
  height:100%;
  min-height:400px;
}
#myChart-license-text{display: none;}
.slidecontainer {
  width: 100%;
}
.slidecontainer {
  width: 100%;
}
/*.slider {
  -webkit-appearance: media-sliderthumb !important;
  width: 100%;
  height: 10px;
  border-radius: 5px;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}*/
.slider:hover {
  opacity: 1;
}
.slider::-webkit-slider-thumb {
  /*appearance: none;*/
  width: 23px;
  height: 24px;
  border: 0;
  /*background: url('contrasticon.png');*/
  cursor: pointer;
}
.slider::-moz-range-thumb {
  width: 23px;
  height: 24px;
  border: 0;
  /*background: url('contrasticon.png');*/
  cursor: pointer;
}
.btn-group.btn-toggle {
   float: right;
   margin: 21px -9px 14px 0px;
}
.btn-text-area h5 {
    font-weight: 600;
    color: #08384f;
    margin-top: 35px;
    text-align: right;
    margin-right: -50px;
}
.slider {
    -webkit-appearance: media-sliderthumb !important;
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
/*-----According Css Here----------*/
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
.client-profile-tab .panel-body{ box-shadow: none;}
.glyphicon{ font-size: 11px;}
.panel-default>.panel-heading {
    color: #337ab7;
    background-color: #f5f5f5;
    border: none;
    background: none;
}
.client-profile-tab .panel{ margin-bottom: -6px;}
.box-click-crical ul{padding: 0px; text-align: center;}
.box-click-crical ul li {display: inline-block; margin-right: 19px; }
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
    top: 13px;
}
.head-bg-color{background: #063853;}
.head-bg-color h4 {
    color: #fff;
    font-size: 20px;
    text-align: center;
}
.close-x{color: #fff; opacity: 2;}
.border-top-0{ border-top: none;}
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
.stock-bg{ box-shadow: none;}
.review-btn {margin: 0px 18px 0px -10px;}
.client-profile-tab .panel-body {
    box-shadow: none;
    height: 408px;
    overflow: auto;
    margin-bottom: 0;
}
.chat-info-respond .msg_history {
    height: auto;
    overflow-y: auto;
    padding: 0px 15px 0 25px;
}
.resume-document {
    text-align: center;
    margin-top: 25px;
}
p.risk-ratio-risk-profile span {
    float: right;
    margin-right: 15px;
}

/**********************************Responsive css*****************************************/
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
                                <li><a href="<?php echo base_url('user/dashboard'); ?>">Dashbord</a>
                                </li>
                                <li>/</li>
                                <li><?php echo $sub_title; ?></li>                            
                            </ul>
                        </div>
                        <div class="right-btn-back">
                            <h4>
                                <a href="<?php echo base_url('users/advisor/client_list'); ?>">Back</a>
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
                                    <p>Available To: <a href="#tab4" data-toggle="tab" id="goToChatCallTab">Chat </a>  <a href="tel:<?php echo $user_details->phone_number; ?>">Call</a></p>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="declinebtnAcceptandBlock">
                                    <?php if($requested==0){ ?>
                                        <span class="review-btn"><a href="javascript:void(0)" onclick="userRequestDecline()" style="background: #ed0505;">Decline</a></span>
                                        <span class="review-btn approve_user_request" onclick="acceptUserRequest();"><a href="javascript:void(0)" style="background: #f6bb19;" >Accept</a></span>
                                    <?php } else { ?>
                                        <span class="review-btn approved_user_request"  onclick="userRequestBlock()"><a href="javascript:void(0)" style="background: #ed0505;" >Block</a></span>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 client-profile-tab">
                        <div class="panel panel-primary">
                            <div class="panel-heading"> <span class="10">
                        <!-- Tabs -->
                        <ul class="nav panel-tabs">
                    <li class="active"><a href="#tab1" data-toggle="tab">Risk Profile
                            </a></li>
                            <li><a href="#tab2" data-toggle="tab">Balance Sheet</a></li>
                            <!-- <li><a href="#portfolio" data-toggle="tab">Portfolio </a></li> -->
                            <!-- <li><a href="#tab3" data-toggle="tab">Check List</a></li> -->
                            <li ><a href="#tab4" data-toggle="tab">Chat/Call</a></li>
                            <!-- <?php if($requested!=2){ ?>
                            <span class="review-btn"><a href="javascript:void(0)" onclick="confirmDelete()" >Decline</a></span>
                            <?php if($requested==0){ ?>
                            <span class="review-btn approve_user_request"><a href="javascript:void(0)" >Approve</a></span>
                            <span class="review-btn approved_user_request" style="display: none;"><a href="javascript:void(0)" >Approved</a></span>
                            <?php } else {?>
                            <span class="review-btn approved_user_request"><a href="javascript:void(0)" >Block</a></span>
                            <?php } ?>
                            <?php } ?>
 -->
                            <!-- <?php if($requested==0){ ?>
                                <span class="review-btn"><a href="javascript:void(0)" onclick="userRequestDecline()" >Decline</a></span>
                                <span class="review-btn approve_user_request" onclick="acceptUserRequest();"><a href="javascript:void(0)" >Accept</a></span>
                            <?php } else { ?>
                                <span class="review-btn approved_user_request"  onclick="userRequestBlock()"><a href="javascript:void(0)" >Block</a></span>
                            <?php } ?> -->
                            

                        </ul>
                    </span>
                            </div>
                            <div class="panel-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab1">
                                    <div class="col-md-7 col-sm-7">
                                        <div class="risk-percentage" style="pointer-events: none;">
                                            <div class="slidecontainer">
                                              <input type="range" min="1" max="100" value="<?php echo $risk_percent; ?>" class="slider" id="myRange">
                                              <p class="risk-ratio-risk-profile" style="text-align: center;"><?php echo $risk_mode; ?> <span id=""><?php echo $risk_percent; ?>/100</span></p>
                                            </div>
                                        </div>
                                        <!-- <div id='myChart'></div> -->
                                    </div>
                                       <!-- <div class="col-md-5 col-sm-5 perstange-prt-text">
                                        <form method="post" class="rf_rv_money_risk_form">                                        
                                          <input type="hidden" name="rv_input" class="rv_hidden_input" value="<?php echo $RV; ?>">
                                          <input type="hidden" name="rf_input" class="rf_hidden_input" value="<?php echo $RF; ?>">
                                          <input type="hidden" name="option_input" class="option_hidden_input" value="<?php echo $OPTION; ?>">
                                          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab" id="headingOne">
                                                    <h4 class="panel-title">
                                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" style="color: #098ff0;">
                                                            <i class="more-less glyphicon glyphicon-plus"></i>
                                                            SUGESTIONS RV 
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                    <div class="panel-body">
                                                        <?php foreach($stock_rvs as $rvs) { ?>
                                                          <input type="checkbox" name="stock_id[]" value="<?php echo $rvs->id; ?>" <?php if($rvs->exist==1) {echo 'checked'; } ?>> <?php echo $rvs->stock_name; ?> <span>47.75</span><br>
                                                            <input type="hidden" name="value[]" value="4.7">
                                                      <?php } ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="client-pro-according-info">
                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab" id="headingTwo">
                                                    <h4 class="panel-title">
                                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="color: #f5b882;">
                                                            <i class="more-less glyphicon glyphicon-plus"></i>
                                                            SUGESTIONS RF

                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                    <div class="panel-body">                                                        
                                                      <?php foreach($stock_rfs as $rfs) { ?>
                                                          <input type="checkbox" name="stock_id[]" value="<?php echo $rfs->id; ?>" <?php if($rfs->exist==1) {echo 'checked'; } ?> > <?php echo $rfs->stock_name; ?> <span>47.75</span><br>
                                                          <input type="hidden" name="value[]" value="4.7">
                                                      <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if($OPTION>0){ ?>
                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab" id="headingThree">
                                                    <h4 class="panel-title">
                                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="color: #6eb25b;">
                                                            <i class="more-less glyphicon glyphicon-plus"></i>
                                                           SUGESTIONS OPTION

                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                    <div class="panel-body">
                                                        <?php foreach($stock_options as $option) { ?>
                                                          <input type="checkbox" name="stock_id[]" value="<?php echo $option->id; ?>" <?php if($option->exist==1) {echo 'checked'; } ?>> <?php echo $option->stock_name; ?> <span>47.75</span><br>
                                                          <input type="hidden" name="value[]" value="4.7">
                                                      <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                     </form>
                                        </div> -->
                                        
                                    </div>  
                                    <div class="tab-pane" id="tab2">                                        
                                        <div class="col-md-4 col-sm-4 income-tbl-sec-clients">
                                              <div class="monthly-income-text"><h3>Monthly Cash: <span><?php echo $total_monthly_cash; ?></span></h3></div>
                                            <table style="width: 100%;">
                                                <tr>
                                                    <th>Income</th>
                                                    <th></th>
                                                </tr>
                                                <?php 
                                                if(count($income_recordarray)>0)
                                                { 
                                                  foreach($income_recordarray as $income_value)
                                                  {
                                                ?>
                                                <tr>
                                                    <td><?php echo $income_value['parameters'] ?></td>
                                                    <td><span><?php echo $income_value['value'] ?></span>
                                                    </td>
                                                </tr>
                                            <?php } } ?>                                                

                                                <tr class="lop">
                                                    <td><b>Total</b>
                                                    </td>
                                                    <td><span><b>$ <?php echo $total_monthly_income; ?></b></span>
                                                    </td>
                                                </tr>
                                            </table>
                                            <table style="width: 100%;">
                                                <tr>
                                                    <th>Expenses</th>
                                                    <th></th>
                                                </tr>
                                                <?php 
                                                if(count($expense_recordarray)>0)
                                                { 
                                                  foreach($expense_recordarray as $expense_value)
                                                  {
                                                ?>
                                                <tr>
                                                    <td><?php echo $expense_value['parameters'] ?></td>
                                                    <td><span><?php echo $expense_value['value'] ?></span>
                                                    </td>
                                                </tr>
                                              <?php } } ?>  
                                                
                                                <tr class="lop">
                                                    <td><b>Total</b>
                                                    </td>
                                                    <td><span><b>$ <?php echo $total_monthly_expenses; ?></b></span>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-md-8 col-sm-8">
                                            <div class="col-md-6 col-sm-6 assets-blance-shert-client-pro">
                                                 <div class="monthly-income-text"><h3>Equity: <span><?php echo $total_equity; ?></span></h3></div>
                                                <table style="width: 100%;">
                                                    <tr>
                                                        <th>Assets</th>
                                                        <th></th>
                                                    </tr>
                                                    <?php 
                                                    if(count($assets_recordarray)>0)
                                                    { 
                                                      foreach($assets_recordarray as $assets_value)
                                                      {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $assets_value['parameters'] ?></td>
                                                        <td><span><?php echo $assets_value['value'] ?></span>
                                                        </td>
                                                    </tr>
                                                  <?php } } ?>   
                                                
                                                    <tr class="lop">
                                                        <td><b>Total</b>
                                                        </td>
                                                        <td><span><b>$ <?php echo $total_assets ?></b></span>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-md-6 col-sm-6 assets-blance-shert-client-pro">
                                                 <div class="monthly-income-text"><h3 style="color: #ffffff;">  dsfsfddfs  </h3></div>
                                              
                                                <table style="width: 100%;">
                                                    <tr>
                                                        <th>Liabilities</th>
                                                        <th></th>
                                                    </tr>
                                                    </tr>
                                                    <?php 
                                                    if(count($liability_recordarray)>0)
                                                    { 
                                                      foreach($liability_recordarray as $liability_value)
                                                      {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $liability_value['parameters'] ?></td>
                                                        <td><span><?php echo $liability_value['value'] ?></span>
                                                        </td>
                                                    </tr>
                                                  <?php } } ?>   

                                                    <tr class="lop">
                                                        <td><b>Total</b>
                                                        </td>
                                                        <td><span><b>$ <?php echo $total_liabilities; ?></b></span>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- Col-Md-8-->
                                    </div>                                    
                                    <!-- Tab-3 Contant End-->
                                    <div class="tab-pane" id="portfolio">                                        
                                        <div class="row" id="main">
                                            <!-- Graps Part Section 3s Section Start Here -->
                                            <div class="col-col-md-12 col-sm-12 stock-details-step-1">
                                                    <div class="stock-bg ">
                                                     <div class="col-md-12 col-sm-12 box-2">
                                                    <div id='myChart-6s'></div>
                                                    </div>
                                                   <div class="col-md-12 col-sm-12 ">
                                                            <div class="resume-document ">
                                                                <ul>
                                                                    <li><a class="r" href="javascript:void(0)">G</a></li>
                                                                    <li  id="step-details-id-1-3"><a href="javascript:void(0)">A</a></li>
                                                                </ul>
                                                                <h5>Graph</h5>
                                                            </div>
                                                        </div>

                                                </div><!-- Stock-bg End -->
                                            </div> <!-- Col-md- 12 End -->

                                            <!-- Graps Part Section 3s Section End Here -->                                            

                                                <div class="col-md-12 col-sm-12 blance-sheet-info stock-details-step-4" style="display: none;">
                                                    <div class="stock-bg ">
                                                     <div class="col-md-11 col-sm-11 box-2">
                                                      
                                                       <div id='myChart4th'></div>
                                                    
                                                    </div><!-- End Col-Md-9-->      
                                                         <div class="col-md-12 col-sm-12 ">
                                                            <div class="resume-document ">
                                                                <ul>
                                                                    <li id="step-details-id-4-1"><a href="javascript:void(0)">G</a></li>
                                                                    <li><a class="r" href="javascript:void(0)">A</a></li>
                                                                </ul>
                                                                <h5>Analysis</h5>
                                                            </div>
                                                        </div>
                                                    </div><!-- Stock-bg End -->
                                                </div> <!-- Col-md- 12 End -->

                                            <!-- Blance Sheet Section End Here -->


                                            </div>
                                            <!-- /.row -->
                                    </div>                                    
                                    <!-- Tab-3 Contant End-->
                                    <div class="tab-pane chat-info-respond" id="tab4">
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
                                                    <?php if($requested==0){ ?>
                                                        <!-- <span class="review-btn"><a href="javascript:void(0)" onclick="userRequestDecline()" >Decline</a></span>
                                                        <span class="review-btn approve_user_request" onclick="acceptUserRequest();"><a href="javascript:void(0)" >Accept</a></span> -->
                                                    <div class="sendRequestDiv">                        
                                                        <a href="javascript:void(0)" class="sendRequestBtn" onclick="acceptUserRequest()" style="background: #f6bb19;">Accept</a>
                                                        <a href="javascript:void(0)"  class="sendRequestBtn" onclick="userRequestDecline()" style="background: #ed0505;">Decline</a>
                                                    </div>

                                                    <?php } else { ?>
                                                    <div class="msg_history">
                                                        <?php foreach($messages as $mess){ 
                                                            $time = date("h:i A", strtotime($mess->created_on)); 
                                                            $date = date("F d", strtotime($mess->created_on)); 
                                                            ?>

                                                        <?php  if($mess->user_one!=$this->session->userdata('user_id')) { ?>
                                                        <div class="incoming_msg">
                                                            <div class="incoming_msg_img">
                                                                <img src="<?php echo base_url('uploads/user-profile/'.$user_details->profile_image); ?>" alt="<?php echo $user_details->first_name.' '.$user_details->last_name; ?>" style="width: 50px;height: 50px;">
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
                                                                <p><?php echo $mess->message ?></p> <span class="time_date"> <?php echo $time; ?>   |    <?php echo $date; ?></span> 
                                                            </div>
                                                        </div>
                                                        <?php } ?>
                                                        <?php } ?>
                                                        
                                                    </div>
                                                    <!-- <div class="type_msg">
                                                        <div class="input_msg_write">
                                                            <input type="text" class="write_msg" placeholder="Type a message" />
                                                            <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane" aria-hidden="true"></i>
                                                            </button>
                                                        </div>
                                                    </div> -->
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
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <!-- <script type="text/javascript" src="<?php echo base_url('assets/users/js/sidebarmenu.js'); ?>"></script> -->
    <script src="<?php echo base_url('assets/users'); ?>/js/common.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script> -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript">
        function userRequestDecline() {         
            swal({
            title: "Are you sure ?",
            text: "Once Decline, you will not be able to Connect.", 
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) 
            {
                $.ajax({
                    url: "<?php echo base_url('users/dashboard/declineUserAdvisor'); ?>",
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
                        swal("Error!", "Please try again", "error");
                    }
                });
            }
           else 
           {
            swal("The person will Available with you");
           }
        });

    }
    function userRequestBlock()
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
                $.ajax({
                    url: "<?php echo base_url('users/dashboard/declineUserAdvisor'); ?>",
                    type: "POST",
                    data: {client_id: "<?php echo base64_decode(base64_decode($this->uri->segment(3))); ?>"},
                    dataType: "html",
                    success: function (data) 
                    {
                        //alert(data);
                        swal("Done!", "It was succesfully Blocked!", "success");
                        setTimeout(function(){
                            window.location.href = "<?php echo base_url('user/dashboard'); ?>";
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
            swal("The person will Available with you");
           }
        });
    }
    </script>


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
    <!-- DropDwon Navication Chat Bar End -->

<?php
/*$RF = 0;
$RV = 0;

if($age>=25 && $age<=60)
{
  $RF = 10;
  $RV = 90;  
}
if($age>=61 && $age<=65)
{
  $RF = 20;
  $RV = 80;  
}*/
$risk = 100-$risk_percent;

$risk_percentage =  $risk_percent;
?>
<script type="text/javascript">
    <?php //if($OPTION>0){ ?>
function rander_pie(a,b,c)
{    

 var myConfig = {
    type: "pie", 
    backgroundColor: "#FFF",
    plot: {
                'detach': false,
                valueBox: {
                    placement: 'in',
                    text: '%npv%\n%t',
                    margin:"5 10",
                    fontFamily: "Open Sans",
                    fontColor: "#1A1B26",
                },
                tooltip: {
                    fontSize: '18',
                    fontFamily: "sans-serif",
                    padding: "5 10",
                    text: "%npv%"
                },
            },
            plotarea: {
                margin: "20 0 0 0"
            },
plotarea: {
                margin: "20 0 0 0"
            },
    series : [            
        {
            values : [a],
            text: "RV",
            backgroundColor: "#098ff0"
        },
        {
            values : [b],
            text: "RF",
            backgroundColor: "#f5b882"
        },
        {
            values : [c],
            text: "OPTION",
            backgroundColor: "#6eb25b"
        },
    ]
};
 
zingchart.render({ 
    id : 'myChart', 
    data : myConfig, 
    height: '100%', 
    width: '100%',
});


}
console.log(<?php echo $OPTION ?>);
rander_pie(a=<?php echo $RV ?>,b=<?php echo $RF ?>,c=<?php echo $OPTION ?>);
var a=<?php echo $RV ?>;
var b=<?php echo $RF ?>;
var c=<?php echo $OPTION ?>;
$('.rv_increment').click(function(){
    if(b>0)
    {
        a=a+1;
        b=b-1;
        $('.rv_hidden_input').val(a);
        $('.rf_hidden_input').val(b);
        rander_pie(a,b,c);
    }
    
});
$('.rv_decrement').click(function(){
    if(a>0)
    {
        a=a-1;
        b=b+1;
        $('.rv_hidden_input').val(a);
        $('.rf_hidden_input').val(b);
        rander_pie(a,b,c);
    }
});
$('.rf_increment').click(function(){
    if(a>0)
    {
        a=a-1;
        b=b+1;
        $('.rv_hidden_input').val(a);
        $('.rf_hidden_input').val(b);
        rander_pie(a,b,c);
    }
    
});
$('.rf_decrement').click(function(){
    if(b>0)
    {
        a=a+1;
        b=b-1;
        $('.rv_hidden_input').val(a);
        $('.rf_hidden_input').val(b);
        rander_pie(a,b,c);
    }
    
});

$('.option_increment').click(function(){
    if(a>0 && b>0)
    {
        //a=a-1;
        b=b-1;
        c=c+1
        $('.rv_hidden_input').val(a);
        $('.rf_hidden_input').val(b);
        $('.option_hidden_input').val(c);
        rander_pie(a,b,c);
    }
    
});
$('.option_decrement').click(function(){
    if(c>0)
    {
        //a=a+1;
        b=b+1;
        c=c-1;

        $('.rv_hidden_input').val(a);
        $('.rf_hidden_input').val(b);
        $('.option_hidden_input').val(c);
        rander_pie(a,b,c);
    }
    
});

</script>
<script>
var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}
</script>

<script>
var slider = document.getElementById("myRange1");
var output = document.getElementById("demo1");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
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

  <script type="text/javascript">
      function sendMessageFunction()
    {
        var write_msg  = $('.write_msg').val();
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
                url: '<?php echo base_url('users/advisor/save_chat_message_from_advisor_side_ajax'); ?>',
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
  </script>
  <script type="text/javascript">
    $('.msg_history').scrollTop($('.msg_history')[0].scrollHeight);



    /*$(document).on('click','.approve_user_request',function(){
         var client_id = "<?php echo base64_decode(base64_decode($this->uri->segment(3))); ?>";

         $.ajax({
                url: '<?php echo base_url('users/advisor/user_approved_by_advisor_ajax'); ?>',
                type: "POST",
                data:{client_id:client_id},
                success: function(data)
                {
                    $('.approve_user_request').css('display','none');
                    $('.approved_user_request').css('display','block');
                    $('.chat-info-respond').css({'opacity':'9999','pointer-events':'auto'});

                    
                }
            });

    });*/
    //accept user request
    function acceptUserRequest()
    {
        swal({
            title: "Are you sure ?",
            text: "Once Accept, you can Chat with this Client.", 
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) 
            {
                $.ajax({
                    url: "<?php echo base_url('users/advisor/user_approved_by_advisor_ajax'); ?>",
                    type: "POST",
                    data: {client_id: "<?php echo base64_decode(base64_decode($this->uri->segment(3))); ?>"},
                    dataType: "html",
                    success: function (data) 
                    {
                        //alert(data);
                        swal("Done!", "It was succesfully Acceptted!", "success");
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
            swal("You couldn't accept this request");
           }
        });
    }
</script>

<!-- portfolio js code here -->
<script type="text/javascript">
    $(document).ready(function(){
         $('.box-select1').click(function(){
            $('.percentage-filter-boxs1').toggle();
            $('.box-1').toggleClass('col-md-9 col-sm-9 col-md-11 col-sm-11');
            $('.selectox1').toggleClass('col-md-3 col-sm-3 col-md-1 col-sm-1');
        });


         $('.box-select2').click(function(){
            $('.percentage-filter-boxs2').toggle();
            $('.box-2').toggleClass('col-md-9 col-sm-9 col-md-11 col-sm-11');
            $('.selectox2').toggleClass('col-md-3 col-sm-3 col-md-1 col-sm-1');
        });


          $('#step-details-id-1-3').click(function(){
            $('.stock-details-step-1').hide();
            $('.stock-details-step-4').show();
         });
          //
          $('#step-details-id-4-1').click(function(){
            $('.stock-details-step-1').show();
            $('.stock-details-step-4').hide();
         });

//graph

var myConfig = {
    type: 'line', 
    title: {
      text: ''
    },
    subtitle: {
      text: ''
    },
    plot: {
      tooltip: {
        visible: false
      },
      cursor: 'hand'
    },
    crosshairX:{},
    scaleX: {
    markers: [],
    offsetEnd:75,
      labels: ['Mon', 'Tues', 'Wed', 'Thur', 'Fri', 'Sat', 'Sun']
    },
    series: [
        {
            values: [35,42,67,89,25,34,67],
            text: 'Apple Sales'
        },
        {
            values: [15,42,67,89,25,34,67].sort(),
            text: 'Peach Sales'
        }
    ]
};
 
zingchart.render({ 
    id: 'myChart-6s', 
    data: myConfig, 
    height: '400', 
    width: '100%' 
});
//grapgh


ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "b55b025e438fa8a98e32482b5f768ff5"]; // window.onload event for Javascript to run after HTML
// because this Javascript is injected into the document head
window.addEventListener('load', () => {
    // Javascript code to execute after DOM content

    // full ZingChart schema can be found here:
    // https://www.zingchart.com/docs/api/json-configuration/
    let chartData = [{
                    text: 'IBEX',
                    values: [0, 200, 400, 600, 800, 1000, 1200, 1400, 1600, 1800, 2000, 2200, 2400, 2600, 2800,3000,3200,3400,3600,3800,4000,4200],
                    lineColor: '#1e38a8',
                    marker: {
                        backgroundColor: '#1e38a8',
                        borderColor: '#1e38a8'
                    }
                },  
                {
                    text: 'BBVA',
                    values: [0, 300, 450, 600, 750, 900, 1050, 1200, 1350, 1500, 1650, 1800, 1950, 2100, 2250,2400,2550,2700,2850,3000,3150,3300],
                    lineColor: '#f04312',
                    marker: {
                        backgroundColor: '#f04312',
                        borderColor: '#f04312'
                    }
                }, 
                {
                    text: 'TOTAL',
                    values: [0, 200, 300, 400, 500, 600, 700, 800, 900, 1000, 1100, 1200, 1300, 1400, 1500,1600,1700,1800,1900,2000,2100,2200],
                    lineColor: '#030303',
                    marker: {
                        backgroundColor: '#030303',
                        borderColor: '#030303'
                    }
                },
                {
                    text: 'COL',
                    values: [0, 50, 100, 150, 200, 250, 300, 350, 400, 450, 500, 550, 600, 650, 700,750,800,850,900,950,1000,1050],
                    lineColor: '#0c3666',
                    marker: {
                        backgroundColor: '#0c3666',
                        borderColor: '#0c3666'
                    }
                },        
            ];
    let myDashboard = {
        /* Graphset array */
        graphset: [{
                /* Object containing chart data */
                type: 'line',
                /* Size your chart using height/width attributes */
                height: '200px',
                width: '50%',
                /* Position your chart using x/y attributes */
                x: '15%',
                y: '5%',
                series: [{
                        values: [76, 23, 15, 85, 13]
                    },
                    {
                        values: [36, 53, 65, 25, 45]
                    }
                ]
            },
            {
                /* Object containing chart data */
                type: 'line',
                height: '55%',
                width: '90%',
                x: '5%',
                y: '200px',
                series: chartData
            },
        ]
    };


    // render chart with width and height to
    // fill the parent container CSS dimensions
    zingchart.render({
        id: 'myChart4th',
        data: myDashboard,
        height: '390px',
        width: '100%',
    });
});
      
});

$(document).on('click','#goToChatCallTab',function(){
    $('.client-profile-tab .nav li.active').removeClass('active');
    $('.client-profile-tab .nav li:nth-child(3)').addClass('active');
});
</script>

</body>

</html>