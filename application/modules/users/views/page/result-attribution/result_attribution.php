<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url('assets/users'); ?>/images/favicons.png" type="images/x-icon" />
    <title>Result attribution</title>
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
   <script src= "https://cdn.zingchart.com/zingchart.min.js"></script>
        <script> zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
        ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9","ee6b7db5b51705a13dc2339db3edaf6d"];</script>
        <style type="text/css">
            .zc-ref {
  display: none;
}

#myChartProfitstrategy {
            width: 100%;
            height: 100%;
            min-height: 350px;
        }
        #myChartLossstrategy{
          width: 100%;
            height: 100%;
            min-height: 350px;
        }

        h2.profit-btn a {
        font-size: 22px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: #063853;}

        h2.profit-btn {
       margin: 4px 0px 50px 0px;
        text-align: center;

      }

#myChartProfitstrategy-license-text{
  display: none !important;
}
#myChartLossstrategy-license-text{
  display: none !important;
}
.result-attribution {
    height: 470px;
}
.no-profit-loss {
    padding-top: 35%;
    text-align: center;
    font-size: 20px;
    color: #063853;
    margin: 0px;}

        </style>
</head>
<body>
    <div id="throbber" style="display:none; min-height:120px;"></div>
    <div id="noty-holder"></div>
    <div id="wrapper">
        <!-- Navigation -->
        <?php $this->load->view('page/include/sidebar');  ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row" id="main">
                     <div class="col-sm-12 col-md-12 well" id="content">
                        <!-- <h1 class="ttile-heading">Result Attribution</h1> -->
                        <div class="bradcrum-list">
                            <ul>
                                <li>Result Attribution</li>                                
                            </ul>
                        </div>
                    </div>
                    <!-- TradingView Widget BEGIN -->
                    <div class="col-md-12 col-sm-12">

                      <?php // print_r($tl_percentage); die;?>
                        <div class="result-attribution">
                              <div class="col-md-6">
                                  <div class="#">
                                    <?php
                                    //$tl_percentage = 5.04;
                                    //echo (float)$tl_percentage."======".$sl_percentage;
                                    if((float)$t_percentage>0 || (float)$s_percentage>0){ 
                                    ?>
                                    <div id='myChartProfitstrategy'></div>                                   
                                    <h2 class="profit-btn"><a href="<?php echo base_url('users/moneymanagement/details_result_attribution'); ?>">Profit</a></h2>
                                    <?php } else {?>
                                        <div class="no-profit-loss">No Transactions Found</div>
                                        <h2 class="profit-btn"><a href="javascript:void(0);">Profit</a></h2>
                                    <?php } ?>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                
                                <div class="#">
                                    <?php
                                    //$tl_percentage = 5.04;
                                    //echo (float)$tl_percentage."======".$sl_percentage;
                                    if((float)$tl_percentage>0 || (float)$sl_percentage>0){ 
                                    ?>
                                   <div id='myChartLossstrategy'></div>
                                    <h2 class="profit-btn"><a href="<?php echo base_url('users/moneymanagement/details_result_attribution'); ?>">Loss</a></h2>
                                    <?php } else { ?>
                                            <div class="no-profit-loss">No Transactions Found</div>
                                            <h2 class="profit-btn"><a href="javascript:void(0);">Loss</a></h2>
                                        
                                    <?php } ?>
                                </div>
                              </div>
                        </div>
                    </div> <!-- Col Md End -->


                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js "></script>
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><"script>')
    </script>
    <script src="<?php echo base_url('assets/users'); ?>/js/bootstrap.min.js "></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/amimation-menu-sidebar.js"></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/common.js"></script>
    <script>
        var myConfig = {
            type: "pie",
            "gui":{ 
              "contextMenu":{ 
                "button":{ 
                  "visible": false 
                } 
              } 
            }, 
            plot: {
                'detach': false,
                valueBox: {
                    placement: 'out',
                    text: '%npv%\n%t',
                    margin:"5 10",
                    fontFamily: "Open Sans"
                },
                tooltip: {
                    fontSize: '18',
                    fontFamily: "Open Sans",
                    padding: "5 10",
                    text: "%npv%"
                },
            },
            plotarea: {
                margin: "20 0 0 0"
            },
            series: [
                <?php if($s_percentage==0){ ?>
                {
                    
                    text: "TACTICAL",
                    values: [parseFloat(<?php echo $t_percentage; ?>)],
                    backgroundColor: '#eb7b01',
                },
                <?php } else if($t_percentage==0){ ?>
                {
                    
                    text: "STRATEGY",
                    values: [parseFloat(<?php echo $s_percentage; ?>)],
                    backgroundColor: '#2bacf0',
                },
            <?php }  else {?>
                {
                    
                    text: "TACTICAL",
                    values: [parseFloat(<?php echo $t_percentage; ?>)],
                    backgroundColor: '#eb7b01',
                },
                {
                    
                    text: "STRATEGY",
                    values: [parseFloat(<?php echo $s_percentage; ?>)],
                    backgroundColor: '#2bacf0',
                },
            <?php } ?>
                
            ]
        };
        zingchart.bind('myChartProfitstrategy', 'contextmenu', function(p) {
          return false;
        });
        zingchart.render({
            id: 'myChartProfitstrategy',
            data: myConfig,
            height: '100%',
            width: '100%'
        });
    </script>

    <script>
        var myConfig = {
            type: "pie",
            "gui":{ 
              "contextMenu":{ 
                "button":{ 
                  "visible": false 
                } 
              } 
            }, 
            plot: {
                'detach': false,
                valueBox: {
                    placement: 'out',
                    text: '%npv%\n%t',
                    margin:"5 10",
                    fontFamily: "Open Sans"
                },
                tooltip: {
                    fontSize: '18',
                    fontFamily: "Open Sans",
                    padding: "5 10",
                    text: "%npv%"
                },
            },
            plotarea: {
                margin: "20 0 0 0"
            },
            series: [
                <?php if($sl_percentage==0){ ?>
                {
                    
                    text: "TACTICAL",
                    values: [parseFloat(<?php echo $tl_percentage; ?>)],
                    backgroundColor: '#eb7b01',
                },
                <?php } else if($tl_percentage==0){ ?>
                {
                    
                    text: "STRATEGY",
                    values: [parseFloat(<?php echo $sl_percentage; ?>)],
                    backgroundColor: '#2bacf0',
                },
            <?php }  else {?>
                {
                    
                    text: "TACTICAL",
                    values: [parseFloat(<?php echo $tl_percentage; ?>)],
                    backgroundColor: '#eb7b01',
                },
                {
                    
                    text: "STRATEGY",
                    values: [parseFloat(<?php echo $sl_percentage; ?>)],
                    backgroundColor: '#2bacf0',
                },
            <?php } ?>
                
            ]
        };

        zingchart.bind('myChartLossstrategy', 'contextmenu', function(p) {
          return false;
        });
        zingchart.render({
            id: 'myChartLossstrategy',
            data: myConfig,
            height: '100%',
            width: '100%'
        });
    </script>
</body>
</html>