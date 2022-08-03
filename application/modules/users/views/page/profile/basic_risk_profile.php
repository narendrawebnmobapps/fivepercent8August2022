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
#myChart {
  width:100%;
  height:100%;
  min-height:400px;
}
.slidecontainer {
  width: 100%;
}
.slider {
-webkit-appearance: media-sliderthumb !important;
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
 /* appearance: none;*/
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
   margin: 21px -9px 14px 0px;}

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
p.risk-ratio-risk-profile span {
    float: right;
    margin-right: 15px;
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
                        <div class="bradcrum-list">
                            <ul>
                                <li><?php echo $sub_title; ?></li>                            
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 client-profile-tab" style="">
                        <div class="panel panel-primary">
                            <div class="panel-heading"> <span class="10">
                        <!-- Tabs -->

                    </span>
                            </div>
                            <div class="panel-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab1">
                                    <div class="col-md-7 col-sm-7">
                                        <div class="risk-percentage">
                                            <div class="slidecontainer" style="pointer-events: none;">
                                              <input type="range" min="1" max="100" value="<?php echo $risk_percent; ?>" class="slider" id="myRange">
                                              <p class="risk-ratio-risk-profile" style="text-align: center;"><?php echo $risk_mode; ?>  <span id=""><?php echo $risk_percent; ?>/100</span></p>
                                            </div>
                                        </div>
                                        
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
                                                            Investments Funds 
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                    <div class="panel-body">
                                                        <?php foreach($investment_ibex35 as $rvs) { ?>
                                                        
                                                          <input type="checkbox" name="investments_id[]" class="deleteSelected" checkedid="<?php echo $rvs->investments_id; ?>" value="<?php echo $rvs->investments_id; ?>" <?php if($rvs->exist==1) {echo 'checked'; } ?>> <?php echo $rvs->fund_name; ?> 
                                                         
                                                          <input type='hidden' name='fund_type[]' value="<?php echo $rvs->fund_type;?>">
                                                          <input type='hidden' name='investments_type[]' value="<?php echo $rvs->investments_type;?>">
                                                          <span><?=number_format($rvs->fund_commission,2,".","");?>%</span><br>
                                                            <input type="hidden" name="value[]" value="4.7">
                                                      <?php } ?>
                                                    </div>
                                                </div>
                                            </div>


                                </div>


                                            <div class="col-md-12 col-sm-12 finish-btn">
                                                <input type="submit" name="" value="Save" class="rf_rv_money_risk_button">
                                                <div class="btn-save-info alert alert-success" style="display: none;">
                                                   Data saved Successfully
                                                </div>
                                            </div>
                                     </form>
                                        </div> -->
                                        
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
    <script src="<?php echo base_url('assets/users'); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/amimation-menu-sidebar.js"></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/common.js"></script>
    <!-- DropDwon Navication Chat Bar Start-->
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
      $(document).on('click','.rf_rv_money_risk_button',function(event){
            event.preventDefault();
            //alert();
            $.ajax({
                url:'<?php echo base_url("users/dashboard/update_user_investments_rf_rv_values_ajax"); ?>',
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
                    $('.btn-save-info').fadeIn('fast').delay(3000).fadeOut('fast');
                    setTimeout(function(){ location.reload(); }, 3000);
                    
                   }
                   else
                   {
                    alert('something went wrong');
                   }
                }
            })

        });
      $(document).on('click','.deleteSelected',function(){
        var checkedid = $(this).attr('checkedid');
        //alert(checkedid);
        $.ajax({
                url:'<?php echo base_url("users/dashboard/remove_unselected_stocks_ajax"); ?>',
                method:'POST',
                data:{checkedid:checkedid},
                dataType:'html',
                success:function(data)
                {
                  //alert(data);
                }
            })
      });
  </script>

</body>

</html>