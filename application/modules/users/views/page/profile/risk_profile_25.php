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
                                              <p class="risk-ratio-risk-profile" style="text-align: center;">Percentage Of your Risks  <span id="demo"></span>/100</p>
                                            </div>
                                        </div>
                                        <div id='myChart'></div>
                                        <div class="box-click-crical">
                                            <ul>
                                                <li class="rv_increment"><a href="javaScript:void(0);"><i class="fa fa-plus" aria-hidden="true"></i></a></li>
                                                <li><span style="background-color: #098ff0;"></span></li>
                                                <li class="rv_decrement"><a href="javaScript:void(0);"><i class="fa fa-minus" aria-hidden="true"></i></a></li><br>

                                                 <li class="rf_increment"><a href="javaScript:void(0);"><i class="fa fa-plus" aria-hidden="true"></i></a></li>
                                                <li><span style="background-color: #f5b882;"></span></li>
                                                <li class="rf_decrement"><a href="javaScript:void(0);"><i class="fa fa-minus" aria-hidden="true"></i></a></li><br>
                                                <?php //if($OPTION>0){ ?>
                                                <li class="option_increment"><a href="javaScript:void(0);"><i class="fa fa-plus" aria-hidden="true"></i></a></li>
                                                <li><span style="background-color: #6eb25b;"></span></li>
                                                <li class="option_decrement"><a href="javaScript:void(0);"><i class="fa fa-minus" aria-hidden="true"></i></a></li>
                                               <?php //} ?>
                                               <!-- <br>
                                               <li class="option_increment"><a href="javaScript:void(0);"><i style="color: #FFF;border: none;" class="fa fa-plus" aria-hidden="true"></i></a></li>
                                                <li><span style="background-color: #FFF;"></span></li>
                                                <li class="option_decrement"><a href="javaScript:void(0);"><i style="color: #FFF;border: none;" class="fa fa-minus" aria-hidden="true"></i></a></li> -->
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
                                                            SUGGESTIONS STOCK 
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                    <div class="panel-body">
                                                        <?php foreach($stock_rvs as $rvs) { ?>
                                                          <input type="checkbox" name="stock_id[]" class="deleteSelected" checkedid="<?php echo $rvs->id; ?>" value="<?php echo $rvs->id; ?>*4.1*1" <?php if($rvs->exist==1) {echo 'checked'; } ?>> <?php echo $rvs->stock_name; ?> <span>47.75</span><br>
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
                                                            SUGGESTIONS  FIXED INCOME

                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                    <div class="panel-body">                                                        
                                                      <?php foreach($stock_rfs as $rfs) { ?>
                                                          <input type="checkbox" class="deleteSelected" checkedid="<?php echo $rfs->id; ?>" name="stock_id[]" value="<?php echo $rfs->id; ?>*4.2*2" <?php if($rfs->exist==1) {echo 'checked'; } ?> > <?php echo $rfs->stock_name; ?> <span>47.75</span><br>
                                                          <input type="hidden" name="value[]" value="4.7">
                                                      <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php //if($OPTION>0){ ?>
                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab" id="headingThree">
                                                    <h4 class="panel-title">
                                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="color: #6eb25b;">
                                                            <i class="more-less glyphicon glyphicon-plus"></i>
                                                           SUGGESTIONS OPTION

                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                    <div class="panel-body">
                                                        <?php foreach($stock_options as $option) { ?>
                                                          <input type="checkbox" class="deleteSelected" checkedid="<?php echo $option->id; ?>" name="stock_id[]" value="<?php echo $option->id; ?>*4.3*3" <?php if($option->exist==1) {echo 'checked'; } ?>> <?php echo $option->stock_name; ?> <span>47.75</span><br>
                                                          <input type="hidden" name="value[]" value="4.7">
                                                      <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php //} ?>
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

<?php

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
    width: '100%' 
});


}
rander_pie(a=<?php echo $RV ?>,b=<?php echo $RF ?>,c=<?php echo $OPTION ?>);
var a=<?php echo $RV ?>;
var b=<?php echo $RF ?>;
var c=<?php echo $OPTION ?>;
$('.rv_increment').click(function(event){
    if(b>0)
    {
        a=a+1;
        b=b-1;
        $('.rv_hidden_input').val(a);
        $('.rf_hidden_input').val(b);
        rander_pie(a,b,c);
        event.preventDefault();
        //alert();
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

/*<?php //} else { ?>

function rander_pie(a,b)
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


var a=<?php echo $RV ?>;
var b=<?php echo $RF ?>;
$('.rv_increment').click(function(){
    if(b>0)
    {
        a=a+1;
        b=b-1;
        $('.rv_hidden_input').val(a);
        $('.rf_hidden_input').val(b);
        rander_pie(a,b);
    }
    
});
$('.rv_decrement').click(function(){
    if(a>0)
    {
        a=a-1;
        b=b+1;
        $('.rv_hidden_input').val(a);
        $('.rf_hidden_input').val(b);
        rander_pie(a,b);
    }
    
});
$('.rf_increment').click(function(){
    if(a>0)
    {
        a=a-1;
        b=b+1;
        $('.rv_hidden_input').val(a);
        $('.rf_hidden_input').val(b);
        rander_pie(a,b);
    }
    
});
$('.rf_decrement').click(function(){
    if(b>0)
    {
        a=a+1;
        b=b-1;
        $('.rv_hidden_input').val(a);
        $('.rf_hidden_input').val(b);
        rander_pie(a,b);
    }
    
});
<?php // } ?>*/

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