<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url('assets/users'); ?>/images/favicons.png" type="images/x-icon" />
    <title>Money management</title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/users'); ?>/css/bootstrap.min.css" rel="stylesheet">
    <!-- Style CSS -->
    <link href="<?php echo base_url('assets/users'); ?>/css/main-custom.css" rel="stylesheet">
    <!-- Font Awesome core CSS -->
    <link href="<?php echo base_url('assets/users'); ?>/css/font-awesome.min.css" rel="stylesheet">
    <!-- Dashbord CSS -->
    <link href="<?php echo base_url('assets/users'); ?>/css/dashbord.css" rel="stylesheet">
    <!-- Responsive CSS -->
    <link href="<?php echo base_url('assets/users'); ?>/css/responsive.css" rel="stylesheet">
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
<style>
  .no-profit-loss1 {
    text-align: center;
    font-size: 20px;
    color: #063853;
    margin: 0px;
  }
  .no-profit-loss2 {
    padding-top: 25%;
    text-align: center;
    font-size: 20px;
    color: #063853;
    margin: 0px;
  }
   .no-profit-loss {
    padding-top: 18%;
    text-align: center;
    font-size: 20px;
    color: #063853;
    margin: 0px;
  }

  .invisible {
    display: none;
  }

select.list-optn {
padding: 3px 3px;
font-size: 16px;
font-weight: 400;
color: #000;
border-radius: 0px;
margin: 6px 0px 0px 10px;
border: none;
outline: none;
}


.chart--container {
  height: 100%;
  width: 100%;
  min-height: 150px;
}

.zc-ref {
  display: none;
}

/*div#myChart-wrapper {

    margin-top: -112px !important;
}*/

#myChartLine-wrapper {position: absolute !important;}
#myChart-license-text {
  display: none !important;
}
#myChartLine-license-text {
  display: none !important;
}


.left-dolor-border{
  height: 40px;
  width: 100%;
  margin-top: 20px;
  margin-bottom: 20px;
  display: none;
}

tr.green-color td {
position: relative;
top: 1px;
border: none !important;
}

.left-dolor-border table tr th{
      line-height: 1;
}

.left-dolor-border .table {
width: 100%;}

.right-graph{
  margin-top: 0px;
}
ul.list-group.three-color {
    margin-top: 0px;
    width: 100%;
}
.right-graph {
    margin-top: 20px;
}
.mony_management_list {
    width: 580px;
    margin: 0 auto;
}

.green-color td{
  color: #000000;
  font-weight: 500;
}

/*.mony_management_list{
  width: 100%;
  float: left;
}*/
.panel-tabs {

    margin: auto;
    display: table;
}

.money-management .nav>li>a{
  padding: 10px 51px;
}
.bradcrum-list {
    float: left;
    margin-top: 15px;
}
.panelContentMoneyManagement{
  min-height: 642px;
}
</style>
</head>
<body>
    <div id="throbber" style="display:none; min-height:120px;"></div>
    <div id="noty-holder"></div>
    <div id="wrapper">
       <!-- Navigation -->
        <?php $this->load->view('page/include/sidebar');  ?>
        <div id="page-wrapper money_management_bgcolor">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row" id="main">
                    <div class="col-sm-12 col-md-12 well" id="content">
                        <!-- <h1 class="ttile-heading"></h1> -->
                        <div class="bradcrum-list">
                            <ul>
                                <li>Money Management</li>
                                
                            </ul>
                            <?php //echo "<pre>";print_r($chartArray); ?>
                        </div>
                    </div>
                    <!-- TradingView Widget BEGIN -->
                    <div class="col-md-12 col-sm-12">
                        <div class="money-management">
                            <!-- <ul> -->
                                <div class="panel">
                                    <div class="panel-heading">
                                        
                                        <span class="border02">
                                            <!-- Tabs -->
                                          <ul class="nav panel-tabs">
                                            <li>
                                            <select class="list-optn" id="selectStrategy">
                                                <option value="">--Select--</option>
                                              <?php foreach($strategies as $strategy) { ?>
                                                <?php
                                                  if((float)$averageWin>0 || (float)$averageLoss>0){ 
                                                ?>
                                              <option value="<?php echo $strategy->id; ?>"><?php echo $strategy->strategy; ?></option>
                                                <?php } else{ ?>
                                                  <option value="<?php echo $strategy->id; ?>" disabled><?php echo $strategy->strategy; ?></option>
                                                <?php } ?>
                                              <?php } ?>
                                            </select>
                                            </li>
                                            <li>
                                            <select class="list-optn" id="selectformulla">
                                              <option value="">--Select--</option>
                                              <option value="1" data-id="Kelly">Kelly</option>
                                              <option value="2" data-id="Elder">Elder</option>
                                              <option value="3" data-id="Delta">Delta</option>
                                              <option value="4" data-id="Risk of Ruin">Risk of Ruin</option>
                                              </select>
                                            </li>
                                            <?php if($mathHope<0){ ?>
                                            <li><a href="#tab2ss" class="mathhopeColor" style="color: #d4062c;" data-toggle="tab">MATH HOPE <span class="mathHope"><?php echo $mathHope; ?></span></a></li>
                                          <?php } else { ?>
                                            <li><a href="#tab2ss" class="mathhopeColor" style="color: #565656;" data-toggle="tab">MATH HOPE <span class="mathHope"><?php echo $mathHope; ?></span></a></li>
                                          <?php } ?>
                                            <li><a href="#tab3ss" style="color: #04a207;" data-toggle="tab">AV WIN <span class="averageWin"><?php echo $averageWin; ?></span>$</a></li>
                                            <li><a href="#tab4ss" style="color: #d4062c;" data-toggle="tab">AV LOSS <span class="averageLoss"><?php echo $averageLoss; ?></span>$</a></li>
                                          </ul>
                                        </span>
                                    </div>
                                    <div class="panel-body panelContentMoneyManagement">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab1">
                                                <div class="col-md-4">
                                                    <div class="left-dolor-border">
                                                        <table class="table">
                                                            <tr class="green-color">
                                                                <th class="formullaparameter"></th>
                                                                <td> <span class="averageKelly"><?php //echo $kelly; ?></span></td>
                                                            </tr>
                                                            
                                                            
                                                        </table>
                                                    </div>
                                                </div><!-- End col-md-3 -->
                                                <style type="text/css">
                                                  .profile-saving-btn button {
                                                  background-color: #116894;
                                                  outline: none;
                                                  border: none;
                                                  padding: 9px 22px;
                                                  color: #fff;
                                                  margin-left: 6px;
                                                  border-radius: 8px;
                                              }

                                             .profile-saving-btn .form-control {
                                            width: 35%;
                                        float: left;
                                        border: 2px solid #116894;
                                        border-radius: 8px;
                                        font-size: 14px;
                                        height: 40px;
                                        }
                                          .stopLoss{
                                            display: flex;
                                          }
                                          .stopLoss label {
                                            font-weight: 500;
                                              margin-right: 12px;
                                              padding-top: 10px;
                                          }

                                        .profile-saving-btn {
                                            margin-top: 21px;}

                                            .profile-saving-btn .form-control::placeholder {
                                          color: #000;
                                          font-weight: 500;
                                      }
                                      .three-color li:nth-child(2){
                                        background: #04a207;
                                      }
                                                 </style>
                                                <div class="col-lg-6 col-md-6 profile-saving-btn">
                                                  <div class="stopLoss">
                                                   <label>How far is the stop loss?</label>
                                                   <input type="text" class="form-control keepStockLoss" value="<?php echo $stopLoss; ?>" placeholder="Enter Stop Loss">
                                                   <button type="submit" id="saveStopLoss">Save</button>
                                                  </div>
                                                </div>
                                                <?php 
                                                  $totalColor = 0;
                                                  $red = $numberOfLossTransaction;
                                                  $gray = $numberOfNoLossNoProfitTransaction;
                                                  $green = $numberOfProfitTransaction;
                                                  $totalColor = $red+$green+$gray;  
                                                  if($totalColor>0)
                                                  {
                                                    $redPercentage =  number_format((($red/$totalColor)*100),2,".","");
                                                    $grayPercentage = number_format((($gray/$totalColor)*100),2,".","");
                                                    $greenPercentage = number_format((($green/$totalColor)*100),2,".","");
                                                  } 
                                                  else
                                                  {
                                                    $redPercentage =  0;
                                                    $grayPercentage = 0; 
                                                    $greenPercentage =0;
                                                  }
                                                                                              

                                                ?>
                                                <style type="text/css">
                                                  
                                                  <?php if($redPercentage==0 && $greenPercentage==0 && $grayPercentage==0){ ?>
                                                  .three-color li:nth-child(1) 
                                                    {
                                                      width: 33%;
                                                    }
                                                  .three-color li:nth-child(2) 
                                                    {
                                                        width: 33%;
                                                    }
                                                  .three-color li:nth-child(3) 
                                                    {
                                                        width: 33%;
                                                    }
                                                  <?php } ?>

                                                  <?php if($redPercentage==0 && $greenPercentage==0 && $grayPercentage>0){ ?>
                                                  .three-color li:nth-child(1) 
                                                    {
                                                      width: 3%;
                                                    }
                                                  .three-color li:nth-child(2) 
                                                    {
                                                        width: 3%;
                                                    }
                                                  .three-color li:nth-child(3) 
                                                    {
                                                        width: <?php echo $grayPercentage-6 ?>%;
                                                    }
                                                  <?php } ?>
                                                  <?php if($redPercentage==0 && $greenPercentage>0 && $grayPercentage==0){ ?>
                                                  .three-color li:nth-child(1) 
                                                    {
                                                      width: 3%;
                                                    }
                                                  .three-color li:nth-child(2) 
                                                    {
                                                        width: <?php echo $greenPercentage-6 ?>%;
                                                    }
                                                  .three-color li:nth-child(3) 
                                                    {
                                                        width: 3%;
                                                    }
                                                  <?php } ?>

                                                  <?php if($redPercentage==0 && $greenPercentage>0 && $grayPercentage>0){ ?>
                                                  .three-color li:nth-child(1) 
                                                    {
                                                      width: 4%;
                                                    }
                                                  .three-color li:nth-child(2) 
                                                    {
                                                        width: <?php echo $greenPercentage-2 ?>%;
                                                    }
                                                  .three-color li:nth-child(3) 
                                                    {
                                                        width: <?php echo $grayPercentage-2 ?>%;
                                                    }
                                                  <?php } ?>

                                                  <?php if($redPercentage>0 && $greenPercentage==0 && $grayPercentage==0){ ?>
                                                  .three-color li:nth-child(1) 
                                                    {
                                                      width: <?php echo $redPercentage-6 ?>%;
                                                    }
                                                  .three-color li:nth-child(2) 
                                                    {
                                                        width: 3%;
                                                    }
                                                  .three-color li:nth-child(3) 
                                                    {
                                                        width: 3%;
                                                    }
                                                  <?php } ?>

                                                  <?php if($redPercentage>0 && $greenPercentage==0 && $grayPercentage>0){ ?>
                                                  .three-color li:nth-child(1) 
                                                    {
                                                      width: <?php echo $redPercentage-2 ?>%;
                                                    }
                                                  .three-color li:nth-child(2) 
                                                    {
                                                        width: 4%;
                                                    }
                                                  .three-color li:nth-child(3) 
                                                    {
                                                        width: <?php echo $grayPercentage-2 ?>%;
                                                    }
                                                  <?php } ?>

                                                  <?php if($redPercentage>0 && $greenPercentage>0 && $grayPercentage==0){ ?>
                                                  .three-color li:nth-child(1) 
                                                    {
                                                      width: <?php echo $redPercentage-2 ?>%;
                                                    }
                                                  .three-color li:nth-child(2) 
                                                    {
                                                        width: <?php echo $greenPercentage-2 ?>%;
                                                    }
                                                  .three-color li:nth-child(3) 
                                                    {
                                                        width: 4%;
                                                    }
                                                  <?php } ?>

                                                  <?php if($redPercentage>0 && $greenPercentage>0 && $grayPercentage>0){ ?>
                                                  .three-color li:nth-child(1) 
                                                    {
                                                      width: <?php echo $redPercentage ?>%;                 
                                                    }                                                  
                                                  .three-color li:nth-child(2) 
                                                    {
                                                        width: <?php echo $greenPercentage ?>%;
                                                    }
                                                  .three-color li:nth-child(3) 
                                                    {
                                                        width: <?php echo $grayPercentage ?>%;
                                                    }
                                                  <?php } ?>
                                                </style>
                                                <div class="col-md-12">
                                                    <div class="right-graph">
                                                        <div class="mony_management_list">
                                                          <?php
                                                            if((float)$numberOfProfitTransaction>0 || (float)$numberOfLossTransaction>0 || $numberOfNoLossNoProfitTransaction>0){ 
                                                          ?>
                                                            <ul class="list-group three-color">
                                                               <li class="list-group-item"><span class="averageLoss1"><?php echo $numberOfLossTransaction; ?></span></li>
                                                               <li class="list-group-item"><span class="averageWin1"><?php echo $numberOfProfitTransaction; ?></li>
                                                                <li class="list-group-item"><span class="normalNolossNoProfit"><?php echo $numberOfNoLossNoProfitTransaction; ?></span></li>
                                                            </ul>
                                                          <?php } else { ?>
                                                            <div class="no-profit-loss1">No Transactions Found</div>
                                                          <?php } ?>
                                                        </div>
                                                    </div>
                                                  </div>
                                                    <div class="col-md-12">
                                                    <div class="col-md-5">
                                                      <?php
                                                        if((float)$averageWin>0 || (float)$averageLoss>0){ 
                                                      ?>
                                                      <div id="myChart" class="chart--container"></div>
                                                      <?php } else { ?>
                                                        <div class="no-profit-loss2">No Transactions Found</div>
                                                      <?php } ?>
                                                      
                                                    </div><!-- Circals -->
                                                    <div class="col-md-7">
                                                      <!-- <div id='myChartLine'></div> -->
                                                          <?php if(count($chartArray)>0){ ?>
                                                            <div id='myChartLine'></div>
                                                          <?php } else{ ?>
                                                            <div class="no-profit-loss">No Transactions Found</div>
                                                          <?php } ?>
                                                    </div>
                                                </div><!-- End col-md-9 -->
                                            </div>
                                            <div class="tab-pane" id="tab2">Lorem ipsum dolor sit amet, consetetur.</div>
                                            <div class="tab-pane" id="tab3">Lorem ipsum dolor sit amet, consetetur sadipscing.</div>
                                            <div class="tab-pane" id="tab4">Lorem ipsum dolor sit amet.</div>
                                        </div>
                                    </div>
                                </div>
                            
                            <!-- </ul> -->
                        </div>
                    </div> <!-- Col Md 12 End -->




                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js "></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/bootstrap.min.js "></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/amimation-menu-sidebar.js"></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/options-tab.js"></script>
    <!-- <script type="text/javascript" src="<?php echo base_url('assets/users/js/sidebarmenu.js'); ?>"></script> -->
    <script src="<?php echo base_url('assets/users'); ?>/js/common.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    <script type="text/javascript">
      function showSweetAlert(type,title,message)
      {
          Swal.fire({
                allowOutsideClick: false,
                type: type,
                title: title,
                text: message,
                //footer: '<a href>Why do I have this issue?</a>'
              })
      }
        // Pointing to Zingchart's CDN module location. Without this, it will try to find ZC modules on Codepen's CDN
        function piechart(a,b,c)
        {
          var chartData;
            let chartConfig = {
              globals: {
                fontFamily: 'Roboto'
              },
              layout: 'h',
              graphset: [
                {
                  "gui":{ 
                    "contextMenu":{ 
                      "button":{ 
                        "visible": false 
                      } 
                    } 
                  },
                  type: 'pie',
                 // backgroundColor: '#F4F4F4',

                  plot: {
                    'detach': false,
                    tooltip: {
                      text: '%npv%',
                      borderRadius: '3px',
                      shadow: false
                    },
                    valueBox: {
                      visible: false
                    },
                    borderWidth: '0px',
                    shadow: false,
                    size: '100px',
                    slice: 85
                  },

                  series: [
                    {
                      text: 'AT&T',
                      values: [a],
                      backgroundColor: '#04a207'
                    },
                    {
                      text: 'Verizon',
                      values: [b],
                      backgroundColor: '#d4062c'
                    },
                    {
                      text: 'T-Mobile',
                      values: [c],
                      backgroundColor: '#565656'
                    }
                  ]
                }
              ]
            };
            zingchart.bind('myChart', 'contextmenu', function(p) {
              return false;
            });
            zingchart.render({
              id: 'myChart',
              data: chartConfig
            });
        }

piechart(<?php echo $greenPercentage; ?>,<?php echo $redPercentage; ?>,<?php echo $grayPercentage; ?>);
</script>
 
<script>
/*var myConfig1 = {
    "type": "line",
    "series": [{
            "values": [<?php foreach($chartArray as $chart) { echo $chart['percent_value'].',';} ?>
                 
                  //0, 10, 20, -300000, 40000,-25000,27000,30000,-100000,
            ]
        }             
    ]
};*/
var myConfig1 = {
        "graphset":[
            {
                "gui":{ 
                      "contextMenu":{ 
                        "button":{ 
                          "visible": false 
                        } 
                      } 
                    },
                "type":"line",
                "utc":true,
                "plotarea":{
                    "margin":"dynamic 45 60 dynamic"
                    },
                "scale-x":{
                  "line-color":"#063853",
                    "labels":[<?php echo $allDateArr; ?>]
                    },
                "scale-y":{
                    "line-color":"#063853",
                    "shadow":0,
                    "guide":{
                        "line-style":"dashed"
                        },
                    "minor-ticks":0,
                    "thousands-separator":","
                    },
                "crosshair-x":{
                    "line-color":"#ffff",
                    "line-width":"5px",
                    "plot-label":{
                        "text":"Profit: %v%",
                        "border-radius":"5px",
                        "border-width":"2px",
                        "border-color":"#063853",
                        "padding":"10px",
                        "font-weight":"bold"
                        },
                    "scale-label":{
                        "font-color":"#fff",
                        "background-color":"#063853",
                        "border-radius":"5px"
                        }
                    },
                "tooltip":{
                    "visible":false
                    },
                "plot":{
                    "highlight":true,
                    "tooltip-text":"%t views: %v<br>%k",
                    "shadow":0,
                    "line-width":"2px",
                    "marker":{
                        "visible":false
                        },
                    "highlight-state":{
                        "line-width":3
                        },
                    "animation":{
                        "effect":1,
                        "sequence":2,
                        "speed":100
                        }
                    },
                "series":[
                    {
                        "values":[<?php echo $percentArr; ?>],
                        "text":"Profit",
                        "line-color":"#29a2cc",
                        "legendMarker":{
                            "type":"circle",
                            "backgroundColor":"#29a2cc",
                            "borderColor":"#29a2cc",
                            "borderWidth":"1px",
                            "shadow":true,
                            "size":"5px"
                            },
                        "marker":{
                            "backgroundColor":"#29a2cc",
                            "borderColor":"#29a2cc",
                            "borderWidth":"1px",
                            "shadow":true
                            }
                        }
                ]
                }
        ]
        }
zingchart.bind('myChartLine', 'contextmenu', function(p) {
  return false;
});
zingchart.render({
    id: 'myChartLine',
    data: myConfig1,
    height: "10%",
    width: "100%"
});
$(document).ready(function(){
    $('#selectStrategy').change(function(){
        var strategy = $('#selectStrategy option:selected').val();
        $('.left-dolor-border').hide();
        $('#selectformulla').val('').trigger("change");
        if(strategy!='')
        {
            $.ajax({
                url:'<?php echo base_url("users/moneymanagement/filter_money_management_ajax"); ?>',
                method:'POST',
                data:{strategy:strategy},
                dataType:'html',
                success:function(data)
                {

                  var parse = JSON.parse(data);
                  console.log(parse);
                  var averageWin = parse.averageWin;
                  var averageLoss = parse.averageLoss;     
                   $('.mathHope').html(parse.mathHope);
                   $('.averageWin').html(averageWin);
                   $('.averageLoss').html(averageLoss);

                   $('.averageWin1').html(parse.noofPriftTransaction);
                   $('.averageLoss1').html(parse.noofLossTransaction);
                   $('.normalNolossNoProfit').html(parse.NooFnoLossNoProfit);
                   if(parse.redPercentage==0 && parse.greenPercentage==0 && parse.grayPercentage==0)
                   {
                      $('.no-profit-loss1').hide();
                      $('.no-profit-loss2').hide();
                     var noTransactionHtml = '<div class="no-profit-loss1">No Transactions Found</div>';
                     $(noTransactionHtml).insertAfter( ".three-color" );
                     $('.three-color').hide();

                     var noTransactionHtmlGraph = '<div class="no-profit-loss2">No Transactions Found</div>';
                     $(noTransactionHtmlGraph).insertAfter( "#myChart" );
                     $('#myChart').hide();

                   }
                   if(parse.redPercentage==0 && parse.greenPercentage==0 && parse.grayPercentage>0)
                   {
                     $('.three-color').show();
                     $('.no-profit-loss1').hide();
                     $('#myChart').show();
                     $('.no-profit-loss2').hide();
                     $('.three-color li:nth-child(1)').css('width',"3%");
                     $('.three-color li:nth-child(2)').css('width',"3%");
                     $('.three-color li:nth-child(3)').css('width',(parse.grayPercentage-6)+"%");
                   }
                   if(parse.redPercentage==0 && parse.greenPercentage>0 && parse.grayPercentage==0)
                   {
                     $('.three-color').show();
                     $('.no-profit-loss1').hide();
                     $('#myChart').show();
                     $('.no-profit-loss2').hide();
                     $('.three-color li:nth-child(1)').css('width',"3%");
                     $('.three-color li:nth-child(2)').css('width',(parse.greenPercentage-6)+"%");
                     $('.three-color li:nth-child(3)').css('width',"3%");
                   }
                   if(parse.redPercentage==0 && parse.greenPercentage>0 && parse.grayPercentage>0)
                   {
                     $('.three-color').show();
                     $('.no-profit-loss1').hide();
                     $('#myChart').show();
                     $('.no-profit-loss2').hide();
                     $('.three-color li:nth-child(1)').css('width',"4%");
                     $('.three-color li:nth-child(2)').css('width',(parse.greenPercentage-2)+"%");
                     $('.three-color li:nth-child(3)').css('width',(parse.grayPercentage-2)+"%");
                   }

                   if(parse.redPercentage>0 && parse.greenPercentage==0 && parse.grayPercentage==0)
                   {
                     $('.three-color').show();
                     $('.no-profit-loss1').hide();
                     $('#myChart').show();
                     $('.no-profit-loss2').hide();
                     $('.three-color li:nth-child(1)').css('width',(parse.redPercentage-6)+"%");
                     $('.three-color li:nth-child(2)').css('width',"%3");
                     $('.three-color li:nth-child(3)').css('width',"%3");
                   }

                   if(parse.redPercentage>0 && parse.greenPercentage==0 && parse.grayPercentage>0)
                   {
                     $('.three-color').show();
                     $('.no-profit-loss1').hide();
                     $('#myChart').show();
                     $('.no-profit-loss2').hide();
                     $('.three-color li:nth-child(1)').css('width',(parse.redPercentage-2)+"%");
                     $('.three-color li:nth-child(2)').css('width',"%4");
                     $('.three-color li:nth-child(3)').css('width',(parse.grayPercentage-2)+"%");
                   }
                   if(parse.redPercentage>0 && parse.greenPercentage>0 && parse.grayPercentage==0)
                   {
                     $('.three-color').show();
                     $('.no-profit-loss1').hide();
                     $('#myChart').show();
                     $('.no-profit-loss2').hide();
                     $('.three-color li:nth-child(1)').css('width',(parse.redPercentage-2)+"%");
                     $('.three-color li:nth-child(2)').css('width',(parse.greenPercentage-2)+"%");
                     $('.three-color li:nth-child(3)').css('width',"4%");
                   }

                   if(parse.redPercentage>0 && parse.greenPercentage>0 && parse.grayPercentage>0)
                   {
                     $('.three-color').show();
                     $('.no-profit-loss1').hide();
                     $('#myChart').show();
                     $('.no-profit-loss2').hide();
                     $('.three-color li:nth-child(1)').css('width',(parse.redPercentage-1)+"%");
                     $('.three-color li:nth-child(2)').css('width',(parse.greenPercentage-1)+"%");
                     $('.three-color li:nth-child(3)').css('width',(parse.grayPercentage-1)+"%");
                   }                   
                   piechart(parseFloat(parse.greenPercentage),parseFloat(parse.redPercentage),parseFloat(parse.grayPercentage));
                   
                }
            });
        }
        else
        {
            location.reload();
        }        
    });
  $('#selectformulla').change(function(){
    var strategy = $('#selectStrategy option:selected').val();
    var formulla = $('#selectformulla option:selected').val();
    var parameter =  $(this).find(':selected').attr('data-id')
    if(formulla!="")
    {
        $.ajax({
          url:'<?php echo base_url("users/moneymanagement/filter_money_management_formulla_ajax"); ?>',
          method:'POST',
          data:{strategy:strategy,formulla:formulla},
          dataType:'html',
          success:function(data)
          {  
            if(data=="needLoss" && formulla==2)
            {
              //alert("Please Save Stop Loss");
              showSweetAlert("error","Oops..",'Please Save Stop Loss');
              $('.left-dolor-border').hide();
              $('#selectformulla').prop('selectedIndex',0);
              return false;
            }
            $('.formullaparameter').html(parameter);
            $('.averageKelly').html(data);
            $('.left-dolor-border').show();
          }
      });
    }
    else
    {
      $('.left-dolor-border').hide();
    }
  });


$('.keepStockLoss').keypress(function(event) {
  if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
    event.preventDefault();
  }
});


$('#saveStopLoss').click(function(){
    var loss = $('.keepStockLoss').val();
    if(loss=="")
    {
      showSweetAlert("error","Oops..",'Please enter stop loss');
      return false;
    }
    $.ajax({
          url:'<?php echo base_url("users/moneymanagement/keepStockLoss_ajax"); ?>',
          method:'POST',
          data:{loss:loss},
          dataType:'html',
          success:function(data)
          {  
            //alert('Data Saved Successfully');
            showSweetAlert("success","Success",'Stop loss Data Saved Successfully');

          }
      });
})

});

</script>
</body>
</html>