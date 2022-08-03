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
    <link href="<?php echo base_url('assets/users'); ?>/css/main-custom.css" rel="stylesheet">
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <style type="text/css">
#myChart-6s #myChart-6s-license-text,#myChart4th #myChart4th-license-text{display: none;}
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
.stock-bg
{
    box-shadow: none;
}

.review-btn {
margin: 0px 18px 0px -10px;
}

/**************25-04-2020*****************/
.resume-document {
    text-align: center;
    margin-top: 25px;
}

.client-profile-tab .panel-body {
    box-shadow: none;
    overflow: auto;
    margin-bottom: 0;
}
p.risk-ratio-risk-profile span {
    float: right;
    margin-right: 15px;
}

@media screen and (max-width: 767px) {
.container-fluid{
    padding: 0;
}
.row{
    margin: 0;
}
}

</style>
</head>

<body>
       <!-- Navigation -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row" id="main">
                    <div class="client-profile-tab">
                        <div class="panel panel-primary">
                            <div class="panel-body">
                                <div class="tab-content">
                                <div class="tab-pane active" id="tab1">    
                                <div class="col-md-12 col-sm-12 perstange-prt-text">
                                     <!--h2>Sugestions RV</h2-->
                                        <form method="post" class="rf_rv_money_risk_form">
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
                                                    <style type="text/css">
                                                        .checkboxORpercent {
                                                            width: 100%;
                                                            display: inline-flex;
                                                            padding-bottom: 6px;
                                                        }
                                                        span.number_counter0 {
                                                            line-height: 27px;
                                                            padding-left: 34px;
                                                        }
                                                        .checkboxORpercent span input {
                                                            margin-right: 5px;
                                                            cursor: pointer;
                                                        }
                                                        .checktext{
                                                            cursor: pointer;
                                                        }
                                                        .checktext.active{
                                                            color: #01ae52;
                                                        }
                                                    </style>
                                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                        <div class="panel-body">
                                                            <?php 
                                                            $inc=1;
                                                            foreach($investment_ibex35 as $rvs) { ?>

                                                        <div class="checkboxORpercent">
                                                            <span>
                                                              <input class="checkInvestmentFunds" type="checkbox" dataID="<?php echo $rvs->investments_id; ?>" value="<?php echo $rvs->investments_id; ?>" <?php if($rvs->isExist==1) {echo 'checked'; } ?>>

                                                              <span dataID="<?php echo $rvs->investments_id;  ?>" class="checktext <?php if($inc==1) {echo 'active'; } ?> ">
                                                                 <?php echo $rvs->fund_name; ?> 
                                                              </span>
                                                            </span>
                                                              <span class="number_counter0"><?=number_format($rvs->fund_commission,2,".","");?>%
                                                              </span>
                                                          </div>
                                                          <?php $inc++; } ?>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>                               
                                    <div class="col-md-12 col-sm-12" style="margin: 0;padding:0;">
                                        <div class="loader-image" style="display: none;"><img src="<?php echo base_url('assets/users/images/loading.gif') ?>"></div>
                                        <div class="col-col-md-12 col-sm-12 stock-details-step-1" style="margin: 0;padding: 0;">
                                            <div class="stock-bg ">
                                                <div class="col-md-12 col-sm-12 box-2" style="margin:0;padding: 0;">
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
                                           

                                        <div class="col-md-12 col-sm-12 blance-sheet-info stock-details-step-4" style="display: none;margin: 0;padding: 0;">
                                            <div class="stock-bg ">
                                             <div class="col-md-11 col-sm-11 box-2"  style="margin:0;padding: 0;">
                                              
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')
    </script>
    <script src="<?php echo base_url('assets/users'); ?>/js/bootstrap.min.js"></script>



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

let chartDataSimulation = [{
        text: '<?php echo substr($investment_ibex35[0]->fund_name,0,22); ?>',
        values: [0, 200, 400, 600, 800, 1000, 1200, 1400, 1600, 1800, 2000, 2200, 2400, 2600, 2800,3000,3200,3400,3600,3800,4000,4200],
        lineColor: '#1e38a8',
        marker: {
            backgroundColor: '#1e38a8',
            borderColor: '#1e38a8'
        }
    }       
];

let chartConfigSimulation = {
    "gui":{ 
      "contextMenu":{ 
        "button":{ 
          "visible": false 
        } 
      } 
    },
    type: 'line',
   // theme: 'classic',
    backgroundColor: 'white',
    legend: {
        marginTop: '5%',
        backgroundColor: 'white',
        borderWidth: '0px',
        item: {
            cursor: 'hand'
        },
        layout: 'x5',
        marker: {
            borderWidth: '0px',
            cursor: 'hand'
        },
        shadow: false,
        toggleAction: 'remove'
    },
    plot: {
        backgroundMode: 'graph',
        backgroundState: {
            lineColor: '#eee',
            marker: {
                backgroundColor: 'none'
            }
        },
        lineWidth: '2px',
        marker: {
            size: '2px'
        },
        selectedState: {
            lineWidth: '4px'
        },
        selectionMode: 'multiple'
    },
    /*plotarea: {
        margin: '15% 25% 10% 7%'
    },*/
    scaleX: {
        values: '1990:2020:2',
        maxItems: 16
    },
    scaleY: {
        lineColor: '#333'
    },
    tooltip: {
        text: '%t: %v outbreaks in %k'
    },
    series: [
                {
                    text: '<?php echo substr($investment_ibex35[0]->fund_name,0,22); ?>',
                    values: [0, 200, 400, 600, 800, 1000, 1200, 1400, 1600, 1800, 2000, 2200, 2400, 2600, 2800,3000,3200,3400,3600,3800,4000,4200],
                    lineColor: '#1e38a8',
                    marker: {
                        backgroundColor: '#1e38a8',
                        borderColor: '#1e38a8'
                    }
                }       
            ]
};
zingchart.bind('myChart-6s', 'contextmenu', function(p) {
  return false;
});
zingchart.render({ 
    id: 'myChart-6s', 
    data: chartConfigSimulation, 
    height: '400', 
    width: '100%' 
});    
});


/*
    Stastical analysis graphp
*/
var stasticalAnalyisConfig = 
{
    "gui":{ 
      "contextMenu":{ 
        "button":{ 
          "visible": false 
        } 
      } 
    },
    "type": "line",
    "utc": true,
    "plotarea": {
        "margin": "dynamic 45 60 dynamic",
    },
    "scale-x": {
        "labels": [<?php echo $allDateArr; ?>],
       // "zooming": true,
        //"zoom-to": [0, 100],
    },
    "scale-y": {
        "line-color": "#f6f7f8",
        "shadow": 0,
        "guide": {
            "line-style": "dashed"
        },
        "minor-ticks": 0,
        "thousands-separator": ",",
        'min-value':<?php echo $minYAxix; ?>,
        'max-value':<?php echo $maxYAxix; ?>,
        'step':4,
    },
    "crosshair-x": {
        "line-color": "#ffff",
        "plot-label": {
            "border-radius": "5px",
            "border-width": "2px",
            "border-color": "#063853",
            "padding": "10px",
            "font-weight": "bold",
        },
        "scale-label": {
            "font-color": "#fff",
            "background-color": "#063853",
            "border-radius": "5px"
        }
    },
    "tooltip": {
        "visible": false
    },
    "plot": {
        "highlight":true,
        "tooltip-text": "%t views: %v<br>%k",
        "shadow": 0,
        "line-width": "4px",
        "marker": {
            visible:false
        },
        "highlight-state": {
            "line-width":3
        },
        "animation":{
          "effect":1,
          "sequence":2,
          "speed":100,
        }
    },
    "series": [
        {
            "values": [<?php echo $allPriceArr; ?>],
            "text": "Price",
            "line-color": "#1ea2fb",
            legendMarker: {
                  type: 'circle',
                  backgroundColor: '#1ea2fb',
                  borderColor: '#1ea2fb',
                  borderWidth: '1px',
                  shadow: false,
                  size: '5px'
                },
                marker: {
                  backgroundColor: '#1ea2fb',
                  borderColor: '#1ea2fb',
                  borderWidth: '1px',
                  shadow: false
                }
        },
        {
            "values": [<?php echo $medianAverage; ?>],
            "text": "Median Price",
            "line-color": "#64d641",
            legendMarker: {
                  type: 'circle',
                  backgroundColor: '#64d641',
                  borderColor: '#64d641',
                  borderWidth: '1px',
                  shadow: false,
                  size: '5px'
                },
                marker: {
                  backgroundColor: '#64d641',
                  borderColor: '#64d641',
                  borderWidth: '1px',
                  shadow: false
                }
        },
        
    ]
};
zingchart.bind('myChart4th', 'contextmenu', function(p) {
  return false;
});
zingchart.render({
    id: 'myChart4th',
    data: stasticalAnalyisConfig,
    height: '390px',
    width: '100%',
});


$(document).on('click','#goToChatCallTab',function(){
    $('.client-profile-tab .nav li.active').removeClass('active');
    $('.client-profile-tab .nav li:nth-child(3)').addClass('active');
});

$(document).on('click','.checktext',function(){
    var investmentID = $(this).attr('dataID');
    $('.checktext').removeClass('active');
    $(this).addClass('active');
    getStasticalAnalysisChartDataAjax(investmentID);
})

function getStasticalAnalysisChartDataAjax(fundID)
{
        var url = "<?php echo base_url("users/advisor/getSimulationChartAjax"); ?>"+"/"+fundID;
        var url2 = "<?php echo base_url("users/advisor/getStasticalGraphpAjax"); ?>"+"/"+fundID;
      // alert(url);
        $('.loader-image').show();
        $('body').addClass('loader');
        //simulation
        zingchart.exec('myChart-6s', 'reload');
        let output1 = zingchart.exec('myChart-6s', 'load', {
                        dataurl: url
                      });

        //stastical
        zingchart.exec('myChart4th', 'reload');
        let output2 = zingchart.exec('myChart4th', 'load', {
                        dataurl: url2
                      });
        
        setTimeout(function(){ $('.loader-image').hide(); }, 1000);
        $('body').removeClass('loader');
}
$(document).on('click','.checkInvestmentFunds',function(){
    var investmentID = $(this).attr('dataID');
    var client_id = "<?php echo base64_decode(base64_decode($this->uri->segment(3))); ?>";
    if($(this).is(":checked"))
    {
        //$('.ChkSelect').prop('checked', true);
        if(confirm("Are you sure to add this Fund for this client")==true)
        {
            $.ajax({
                url: '<?php echo base_url('users/advisor/add_remove_funds_byadvisor'); ?>',
                type: "POST",
                data:{client_id:client_id,investmentID:investmentID},
                success: function(data)
                { 
                    console.log(data);                   
                }
            });
        }
        else
        {
           $(this).prop('checked', false);
        }  
    }
    else
    {
        if(confirm("Are you sure to remove this Fund for this client")==true){
            $.ajax({
                url: '<?php echo base_url('users/advisor/add_remove_funds_byadvisor'); ?>',
                type: "POST",
                data:{client_id:client_id,investmentID:investmentID},
                success: function(data)
                { 
                    console.log(data);                   
                }
            });
        }
        else
        {
            $(this).prop('checked', true);
        }   
    }
})
</script>

</body>

</html>