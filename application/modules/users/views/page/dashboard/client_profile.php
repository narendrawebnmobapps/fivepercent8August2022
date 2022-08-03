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
                                <li>Client Profile</li>                            
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <div class="client-profile-list-info-prt">
                            <div class="user-profile-info-bar-descriptions">
                                <img src="<?php echo base_url('uploads/user-profile/'.$user_details->profile_image); ?>" alt="user-profile">
                            </div>
                            <div class="user-profile-onfomation-text">
                                <h2><?php echo $this->session->userdata('fname').' '.$this->session->userdata('lname'); ?></h2>
                                <h4><?php echo $this->session->userdata('country'); ?></h4>
                                <p>Available To: <a href="#">Chat </a>  <a href="#">Call</a>
                                </p>
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
                            <li><a href="#tab3" data-toggle="tab">Check List</a></li>
                            <li><a href="#tab4" data-toggle="tab">Chat/Call</a></li>
                        </ul>
                    </span>
                            </div>
                            <div class="panel-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab1">
                                    <div class="col-md-7 col-sm-7">
                                        <div class="risk-percentage">
                                            <div class="slidecontainer">
                                              <input type="range" min="1" max="100" value="<?php echo $risk_percent; ?>" class="slider" id="myRange">
                                              <p style="text-align: center;">Percentage Of your Risks  <span id="demo"></span>/100</p>
                                            </div>
                                        </div>
                                        <div id='myChart'></div>


                                        <div class="box-click-crical">

                                        <ul>
                                            <li class="rv_increment"><a href="vavaScript:void(0);"><i class="fa fa-plus" aria-hidden="true"></i></a></li>
                                            <li><span style="background-color: #098ff0;"></span></li>
                                            <li class="rv_decrement"><a href="javaScript:void(0);"><i class="fa fa-minus" aria-hidden="true"></i></a></li><br>

                                             <li class="rf_increment"><a href="javaScript:void(0);"><i class="fa fa-plus" aria-hidden="true"></i></a></li>
                                            <li><span style="background-color: #f5b882;"></span></li>
                                            <li class="rf_decrement"><a href="javaScript:void(0);"><i class="fa fa-minus" aria-hidden="true"></i></a></li><br>
                                            <?php if($OPTION>0){ ?>
                                            <li class="option_increment"><a href="javaScript:void(0);"><i class="fa fa-plus" aria-hidden="true"></i></a></li>
                                            <li><span style="background-color: #6eb25b;"></span></li>
                                            <li class="option_decrement"><a href="javaScript:void(0);"><i class="fa fa-minus" aria-hidden="true"></i></a></li>
                                           <?php } ?>

                                        </ul>
                                        </div>
                                    </div>
                                       <div class="col-md-5 col-sm-5 perstange-prt-text">
                                         <!--h2>Sugestions RV</h2-->
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
                                </div><!-- panel-group -->
    
                                          
                                          <!--h3 style="color:orange;">Sugestions RV</h3>
                                          <h3 style="color: green;">Sugestions RV</h3-->

                                <div class="col-md-7 btn-text-area"><h5>Do you want to use all money?</h5></div>  <div class="col-md-5 persnal-info-form-make">
                                <input type="hidden" name="all_moeny" class="talktoadviser" value="<?php echo $all_money; ?>">
                                <div class="btn-group btn-toggle">
                                  <button class="btn  yescls adviserbtn <?php if($all_money==0){echo 'btn-default'; } else { echo 'btn-primary'; } ?>" data-id="1">Yes</button>
                                  <button class="btn  nocls  adviserbtn <?php if($all_money==1){echo 'btn-default'; } else { echo 'btn-primary'; } ?>" data-id="2">No</button>
                                </div>
                              </div>
                                            <style type="text/css">
                                                <?php if($all_money==0){ ?>
                                                .do_you_want_percentage{display: none;}
                                            <?php } else { ?>
                                                .do_you_want_percentage{display: block;}
                                            <?php } ?>
                                            </style>
                                           <div class="risk-percentage">
                                            <div class="slidecontainer do_you_want_percentage" >
                                              <input type="range" min="1" max="100" value="<?php echo $money_use_percentage; ?>" class="slider" id="myRange1" name="money_use_percentage">
                                              <p style="text-align: center; margin-top: 8px;">  <span style="float: none;" id="demo1"></span>/100</p>
                                            </div>
                                            </div>

                                            <div class="col-md-12 col-sm-12 finish-btn">
                                                <input type="submit" name="" value="Save" class="rf_rv_money_risk_button">
                                                <div class="btn-save-info alert alert-success" style="display: none;">
                                                   Data saved Successfully
                                                </div>
                                            </div>
                                     </form>
                                        </div>
                                        

                                        </div>
                                    <div class="tab-pane" id="tab2">

                                        <div class="col-md-4 col-sm-4 income-tbl-sec-clients">
                                              <div class="monthly-income-text"><h3>Monthly Cash: <span><?php echo $total_monthly_cash; ?></span></h3></div>
                                            <?php // print_r($income_recordarray); ?>
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
                                                <tr>
                                                    <td></td>
                                                    <td><button type="button" class="btn btn-info addUserBalanceSheet" dataid='1' dataname='Income' ><i class="fa fa-plus" aria-hidden="true"></i></button></td>
                                                </tr>
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
                                                
                                                <tr>
                                                    <td></td>
                                                    <td><button type="button" class="btn btn-info addUserBalanceSheet" dataid='2' dataname='Expense' ><i class="fa fa-plus" aria-hidden="true"></i></button></td>
                                                </tr>
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
                                                  <tr>
                                                    <td></td>
                                                    <td><button type="button" class="btn btn-info addUserBalanceSheet" dataid='3' dataname='Assets' ><i class="fa fa-plus" aria-hidden="true"></i></button></td>
                                                  </tr>                                                  
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
                                                  <tr>
                                                    <td></td>
                                                    <td><button type="button" class="btn btn-info addUserBalanceSheet" dataid='4' dataname='Liability'><i class="fa fa-plus" aria-hidden="true"></i></button></td>
                                                  </tr>
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
                                    <!-- Tab 2 End -->
                                    <div class="tab-pane" id="tab3">
                                        <div class="box-chat-info-list-cont">
                                            <div class="user-profile-client-list">
                                                <img src="<?php echo base_url('assets/users'); ?>/images/user-profile.png">
                                                <div class="online-client-list"><i class="fa fa-circle" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                            <div class="text-user-clientlist-info">
                                                <h3>Rafael Barreto</h3>
                                                <h5>Spain</h5>
                                                <p>From 20 Apr 2019</p>
                                            </div>
                                            <div class="risk-profile-lis-client">
                                                <ul>
                                                    <li><b>Finance<br>Invest</b>
                                                    </li>
                                                    <li><span>4/7</span>
                                                        <br>Risk Profile</li>
                                                    <li>7%
                                                        <br>
                                                        <img src="<?php echo base_url('assets/users'); ?>/images/up-icons.png">
                                                        <br>Daily</li>
                                                    <li><span style="color: #4CAF50;">+7%/</span><span>20%</span>
                                                        <br>Goal</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- box-chat-info-list-cont End-->
                                        <div class="box-chat-info-list-cont">
                                            <div class="user-profile-client-list">
                                                <img src="<?php echo base_url('assets/users'); ?>/images/persnal-info-user-30.png">
                                                <div class="online-client-list"><i class="fa fa-circle" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                            <div class="text-user-clientlist-info">
                                                <h3>Sweety</h3>
                                                <h5>Spain</h5>
                                                <p>From 20 Mar 2019</p>
                                            </div>
                                            <div class="risk-profile-lis-client">
                                                <ul>
                                                    <li><b>Finance</b>
                                                    </li>
                                                    <li><span>3/7</span>
                                                        <br>Risk Profile</li>
                                                    <li>10%
                                                        <br>
                                                        <img src="<?php echo base_url('assets/users'); ?>/images/dwwon-icon.png">
                                                        <br>Daily</li>
                                                    <li><span style="color: red;">-10%/</span><span>25%</span>
                                                        <br>Goal</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- box-chat-info-list-cont End-->
                                        <div class="box-chat-info-list-cont">
                                            <div class="user-profile-client-list">
                                                <img src="<?php echo base_url('assets/users'); ?>/images/persnal-info-user.png">
                                                <div class="online-client-list"><i class="fa fa-circle" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                            <div class="text-user-clientlist-info">
                                                <h3>Gerardo Jodar</h3>
                                                <h5>Spain</h5>
                                            </div>
                                        </div>
                                        <!-- box-chat-info-list-cont End-->
                                        <div class="box-chat-info-list-cont">
                                            <div class="user-profile-client-list">
                                                <img src="<?php echo base_url('assets/users'); ?>/images/persnal-info-user-32.png">
                                                <div class="ofline-client-list"><i class="fa fa-circle" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                            <div class="text-user-clientlist-info">
                                                <h3>Ginger Johnston</h3>
                                                <h5>Spain</h5>
                                            </div>
                                        </div>
                                        <!-- box-chat-info-list-cont End-->
                                        <div class="box-chat-info-list-cont">
                                            <div class="user-profile-client-list">
                                                <img src="<?php echo base_url('assets/users'); ?>/images/persnal-info-user-20.png">
                                                <div class="ofline-client-list"><i class="fa fa-circle" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                            <div class="text-user-clientlist-info">
                                                <h3>Huong Tran</h3>
                                                <h5>Vietnam</h5>
                                                <p>From 25 Apr 2019</p>
                                            </div>
                                            <div class="risk-profile-lis-client">
                                                <ul>
                                                    <li><b>Finance<br>Invest</b>
                                                    </li>
                                                    <li><span>4/7</span>
                                                        <br>Risk Profile</li>
                                                    <li>7%
                                                        <br>
                                                        <img src="<?php echo base_url('assets/users'); ?>/images/up-icons.png">
                                                        <br>Daily</li>
                                                    <li><span style="color: #4CAF50;">+7%/</span><span>20%</span>
                                                        <br>Goal</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- box-chat-info-list-cont End-->
                                    </div>
                                    <!-- Tab-3 Contant End-->
                                    <div class="tab-pane chat-info-respond" id="tab4">
                                        <div class="messaging">
                                            <div class="inbox_msg">
                                                <div class="inbox_people">
                                                    <div class="headind_srch">
                                                        <div class="recent_heading">
                                                            <h4>Recent</h4>
                                                        </div>
                                                        <div class="srch_bar">
                                                            <div class="stylish-input-group">
                                                                <input type="text" class="search-bar" placeholder="Search">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="inbox_chat scroll">
                                                        <div class="chat_list active_chat">
                                                            <div class="chat_people">
                                                                <div class="chat_img">
                                                                    <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
                                                                </div>
                                                                <div class="chat_ib">
                                                                    <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                                                    <p>Test, which is a new approach to have all solutions astrology under one roof.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="chat_list">
                                                            <div class="chat_people">
                                                                <div class="chat_img">
                                                                    <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
                                                                </div>
                                                                <div class="chat_ib">
                                                                    <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                                                    <p>Test, which is a new approach to have all solutions astrology under one roof.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="chat_list">
                                                            <div class="chat_people">
                                                                <div class="chat_img">
                                                                    <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
                                                                </div>
                                                                <div class="chat_ib">
                                                                    <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                                                    <p>Test, which is a new approach to have all solutions astrology under one roof.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="chat_list">
                                                            <div class="chat_people">
                                                                <div class="chat_img">
                                                                    <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
                                                                </div>
                                                                <div class="chat_ib">
                                                                    <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                                                    <p>Test, which is a new approach to have all solutions astrology under one roof.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="chat_list">
                                                            <div class="chat_people">
                                                                <div class="chat_img">
                                                                    <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
                                                                </div>
                                                                <div class="chat_ib">
                                                                    <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                                                    <p>Test, which is a new approach to have all solutions astrology under one roof.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="chat_list">
                                                            <div class="chat_people">
                                                                <div class="chat_img">
                                                                    <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
                                                                </div>
                                                                <div class="chat_ib">
                                                                    <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                                                    <p>Test, which is a new approach to have all solutions astrology under one roof.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="chat_list">
                                                            <div class="chat_people">
                                                                <div class="chat_img">
                                                                    <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
                                                                </div>
                                                                <div class="chat_ib">
                                                                    <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                                                    <p>Test, which is a new approach to have all solutions astrology under one roof.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="chat_list">
                                                            <div class="chat_people">
                                                                <div class="chat_img">
                                                                    <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
                                                                </div>
                                                                <div class="chat_ib">
                                                                    <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                                                    <p>Test, which is a new approach to have all solutions astrology under one roof.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="chat_list">
                                                            <div class="chat_people">
                                                                <div class="chat_img">
                                                                    <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
                                                                </div>
                                                                <div class="chat_ib">
                                                                    <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                                                    <p>Test, which is a new approach to have all solutions astrology under one roof.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mesgs">
                                                    <div class="box-message-chaat-box-prt">
                                                        <div class="user-profile-chats">
                                                            <img src="https://ptetutorials.com/images/user-profile.png">
                                                            <h2>Chat with Sunil Rajput</h2>
                                                            <p>1767 Messages</p>
                                                        </div>
                                                        <div class="user-profile-chats-info">
                                                            <ul>
                                                                <li><a href="#"><i class="fa fa-video-camera" aria-hidden="true"></i></a>
                                                                </li>
                                                                <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="notifactions">
                                                            <div class="container-10">
                                                                <div class="more">
                                                                    <button id="more-btn" class="more-btn"> <span class="more-dot"></span>
                                                                        <span class="more-dot"></span>
                                                                        <span class="more-dot"></span>
                                                                    </button>
                                                                    <div class="more-menu">
                                                                        <div class="more-menu-caret">
                                                                            <div class="more-menu-caret-outer"></div>
                                                                            <div class="more-menu-caret-inner"></div>
                                                                        </div>
                                                                        <ul class="more-menu-items" tabindex="-1" role="menu" aria-labelledby="more-btn" aria-hidden="true">
                                                                            <li class="more-menu-item" role="presentation">
                                                                                <button type="button" class="more-menu-btn" role="menuitem">Share</button>
                                                                            </li>
                                                                            <li class="more-menu-item" role="presentation">
                                                                                <button type="button" class="more-menu-btn" role="menuitem">Copy</button>
                                                                            </li>
                                                                            <li class="more-menu-item" role="presentation">
                                                                                <button type="button" class="more-menu-btn" role="menuitem">Embed</button>
                                                                            </li>
                                                                            <li class="more-menu-item" role="presentation">
                                                                                <button type="button" class="more-menu-btn" role="menuitem">Block</button>
                                                                            </li>
                                                                            <li class="more-menu-item" role="presentation">
                                                                                <button type="button" class="more-menu-btn" role="menuitem">Report</button>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="msg_history">
                                                        <div class="incoming_msg">
                                                            <div class="incoming_msg_img">
                                                                <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
                                                            </div>
                                                            <div class="received_msg">
                                                                <div class="received_withd_msg">
                                                                    <p>Test which is a new approach to have all solutions</p> <span class="time_date"> 11:01 AM    |    June 9</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="outgoing_msg">
                                                            <div class="sent_msg">
                                                                <p>Test which is a new approach to have all solutions</p> <span class="time_date"> 11:01 AM    |    June 9</span> 
                                                            </div>
                                                        </div>
                                                        <div class="incoming_msg">
                                                            <div class="incoming_msg_img">
                                                                <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
                                                            </div>
                                                            <div class="received_msg">
                                                                <div class="received_withd_msg">
                                                                    <p>Test, which is a new approach to have</p> <span class="time_date"> 11:01 AM    |    Yesterday</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="outgoing_msg">
                                                            <div class="sent_msg">
                                                                <p>Apollo University, Delhi, India Test</p> <span class="time_date"> 11:01 AM    |    Today</span> 
                                                            </div>
                                                        </div>
                                                        <div class="incoming_msg">
                                                            <div class="incoming_msg_img">
                                                                <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
                                                            </div>
                                                            <div class="received_msg">
                                                                <div class="received_withd_msg">
                                                                    <p>We work directly with our designers and suppliers, and sell direct to you, which means quality, exclusive products, at a price anyone can afford.</p> <span class="time_date"> 11:01 AM    |    Today</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="type_msg">
                                                        <div class="input_msg_write">
                                                            <input type="text" class="write_msg" placeholder="Type a message" />
                                                            <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane" aria-hidden="true"></i>
                                                            </button>
                                                        </div>
                                                    </div>
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



    <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header head-bg-color">
          <button type="button" class="close close-x" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add <span class="parameterName">Expense</span></h4>
        </div>
        <div class="modal-body">
          <form action="" method="post" class="add_balance_sheet_frm">
            <input type="hidden" name="balanceSheetType" value="" class="balanceSheetType">
              <div class="col-md-12 col-sm-12">
                <label class="parameterName">Income</label>
                <div class="form-group">
                  <input type="text" name="parameter" style="border-radius: 0px;" value="" required="" placeholder="" class="form-control parameter">
                </div>
              </div>
              <div class="col-md-12 col-sm-12">
                <label>Amount</label>
                <div class="form-group">
                  <input type="text" name="amount" style="border-radius: 0px;" value="" required="" placeholder="" class="form-control amount">
                </div>
              </div>
              <div class="col-md-12 col-sm-12 add_balance_sheet_success_div" style="display: none;"><p style="color: #3c763d;text-align: center;">Data Saved successfully</p></div>
              <div class="col-md-12 col-sm-12 finish-btn" style="margin-top: 0px;margin-bottom: 0px;">
                <input type="submit" name="" value="Save" class="add_balanace_btn">
              </div>
              
            </form>
        </div>
        <div class="modal-footer border-top-0">
         <!--  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        </div>
      </div>
      
    </div>
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
    <!-- DropDwon Navication Chat Bar Start-->

    <script type="text/javascript">
        $(document).on('click','.addUserBalanceSheet',function(){

            var balance_sheet_type = $(this).attr('dataid');
            var dataname = $(this).attr('dataname');
            $('.balanceSheetType').val(balance_sheet_type);
            $('.parameterName').text(dataname);
            $('#myModal').modal('toggle');

        });

        $(document).on('click','.add_balanace_btn',function(event){
            event.preventDefault();
            //alert();//add_balance_sheet_frm
            var parameter = $('.add_balance_sheet_frm .parameter').val();
            var amount = $('.add_balance_sheet_frm .amount').val();
            if(parameter=="")
            {
                $('.add_balance_sheet_frm .parameter').css("border","1px solid red");
                return false;
            }
            else
            {
                $('.add_balance_sheet_frm .parameter').css("border","");
            }
            if(amount=="")
            {
                $('.add_balance_sheet_frm .amount').css("border","1px solid red");
                return false;
            }
            else if(!($.isNumeric(amount)))
            {
                $('.add_balance_sheet_frm .amount').css("border","1px solid red");
                return false;
            }
            else
            {
                $('.add_balance_sheet_frm .amount').css("border","");
            }
            $.ajax({
                url:'<?php echo base_url("users/dashboard/add_balance_sheet_ajx"); ?>',
                method:'POST',
                data:new FormData( $(".add_balance_sheet_frm")[0]),
                async : false,
                cache : false,
                contentType : false,
                processData : false,
                success:function(data)
                {
                    if(data==1)
                    {
                       $(".add_balance_sheet_frm")[0].reset();
                       $('.add_balance_sheet_success_div').show();
                       setInterval(function(){ location.reload(); }, 3000);
                    }
                    else
                    {
                        alert('something went wrong');
                    }
                }
            })

        });
    </script>

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

$risk = 100-$risk_percent;

$risk_percentage =  $risk_percent;

?>
<script type="text/javascript">
    <?php if($OPTION>0){ ?>
function rander_pie(a,b,c)
{
        var myConfig = {
    type: "pie", 
    backgroundColor: "#FFF",
 
    legend: {
      layout: "h",
      backgroundColor: "none",
      shadow: 0,
      borderWidth: 0,
      y: 100,
      x: "100%",
      toggleAction: "remove",
      item: {
        fontColor: "white"
      },
      marker: {
        borderColor: "white",
        type: "circle"
      }
    },
    plot: {
      refAngle: 270,
      valueBox: [{
        //placement: "out",
        //text: "%t: %v",        
        fontSize: 16
      },
      {
        placement: "in",
        //text: "%npv%",
        fontColor: "#1A1B26",
        fontSize: 16
      }]
    },

    series : [            
        {
            values : [a],
            text: "X",
            backgroundColor: "#098ff0"
        },
        {
            values : [b],
            text: "Y",
            backgroundColor: "#f5b882"
        },
        <?php if($OPTION>0) { ?>
        {
            values : [c],
            text: "Z",
            backgroundColor: "#6eb25b"
        },
        <?php } ?>
    ]
};
 
zingchart.render({ 
    id : 'myChart', 
    data : myConfig, 
});
}

rander_pie(a=<?php echo $RV ?>,b=<?php echo $RF ?>,c=<?php echo $OPTION ?>);

$('.option_increment').click(function(){
    a=a-0.5;
    b=b-0.5;
    c=c+1
    $('.rv_hidden_input').val(a);
    $('.rf_hidden_input').val(b);
    $('.option_hidden_input').val(c);
    rander_pie(a,b,c);
});
$('.option_decrement').click(function(){
    a=a+0.5;
    b=b+0.5;
    c=c-1;

    $('.rv_hidden_input').val(a);
    $('.rf_hidden_input').val(b);
    $('.option_hidden_input').val(c);
    rander_pie(a,b,c);
});
<?php } else { ?>

function rander_pie(a,b,c)
{
        var myConfig = {
    type: "pie", 
    backgroundColor: "#FFF",
 
    legend: {
      layout: "h",
      backgroundColor: "none",
      shadow: 0,
      borderWidth: 0,
      y: 100,
      x: "100%",
      toggleAction: "remove",
      item: {
        fontColor: "white"
      },
      marker: {
        borderColor: "white",
        type: "circle"
      }
    },
    plot: {
      refAngle: 270,
      valueBox: [{
        placement: "out",
        //text: "%t: %v",        
        fontSize: 16
      },
      {
        placement: "in",
        //text: "%npv%",
        fontColor: "#1A1B26",
        fontSize: 16
      }]
    },

    series : [
            
        {
            values : [a],
            text: "X",
            backgroundColor: "#098ff0"
        },
        {
            values : [b],
            text: "Y",
            backgroundColor: "#f5b882"
        }
    ]
};
 
zingchart.render({ 
    id : 'myChart', 
    data : myConfig, 
});
}

rander_pie(a=<?php echo $RV ?>,b=<?php echo $RF ?>);

<?php } ?>
var a=<?php echo $RV ?>;
var b=<?php echo $RF ?>;
var c=<?php echo $OPTION ?>;
$('.rv_increment').click(function(){
    a=a+1;
    b=b-1;
    $('.rv_hidden_input').val(a);
    $('.rf_hidden_input').val(b);
    rander_pie(a,b,c);
});
$('.rv_decrement').click(function(){
    a=a-1;
    b=b+1;
    $('.rv_hidden_input').val(a);
    $('.rf_hidden_input').val(b);
    rander_pie(a,b,c);
});
$('.rf_increment').click(function(){
    a=a-1;
    b=b+1;
    $('.rv_hidden_input').val(a);
    $('.rf_hidden_input').val(b);
    rander_pie(a,b,c);
});
$('.rf_decrement').click(function(){
    a=a+1;
    b=b-1;
    $('.rv_hidden_input').val(a);
    $('.rf_hidden_input').val(b);
    rander_pie(a,b,c);
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
        $('.talktoadviser').val(0);
        $('.do_you_want_percentage').hide();
      }
      if(sss==2)
      {
        $('.nocls').addClass('btn-default');
        $('.nocls').removeClass('btn-primary');

        $('.yescls ').addClass('btn-primary');
        $('.yescls ').removeClass('btn-default');
        $('.talktoadviser').val(1);
        $('.do_you_want_percentage').show();

      }
      //alert(sss);
    });
  </script>

  <script type="text/javascript">
      $(document).on('click','.rf_rv_money_risk_button',function(event){
            event.preventDefault();
            //alert();
            $.ajax({
                url:'<?php echo base_url("users/dashboard/update_user_stock_rf_rv_values_ajax"); ?>',
                method:'POST',
                data:new FormData( $(".rf_rv_money_risk_form")[0]),
                async : false,
                cache : false,
                contentType : false,
                processData : false,
                success:function(data)
                {
                  // console.log(data);
                   if(data==1)
                   {
                   // $('.btn-save-info').show();
                    $('.btn-save-info').fadeIn('fast').delay(1000).fadeOut('fast');
                   }
                   else
                   {
                    alert('something went wrong');
                   }
                }
            })

        });
  </script>

</body>

</html>