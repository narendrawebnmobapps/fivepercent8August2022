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

#myChartProfitdetails {
            width: 100%;
            height: 100%;
            min-height: 350px;
        }
        #myChartLossdetails{
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


      .no-profit-loss {
    padding-top: 35%;
    text-align: center;
    font-size: 20px;
    color: #063853;
    margin: 0px;}

.result-attribution {
    height: 470px;
}
#myChartProfitdetails-license-text{
    display: none !important;
}
#myChartLossdetails-license-text{
    display: none !important;
}

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
                         <?php // print_r($loss_recordarray); die;?>
                        <div class="result-attribution">

                              <div class="col-md-6">
                                  <div class="#">
                                    <?php if(count($profit_recordarray)>0){ ?>
                                    <div id='myChartProfitdetails'></div>
                                    <?php  } else {?>
                                   <div class="no-profit-loss">No Transactions Found</div>
                               <?php } ?>
                                    <h2 class="profit-btn"><a href="<?php echo base_url('user/result-attribution'); ?>">Profit</a></h2>
                                  </div>
                              </div>

                              <div class="col-md-6">
                                  <div class="#">
                                    <?php if(count($loss_recordarray)>0){ ?>
                                       <div id='myChartLossdetails'></div>
                                        <?php  } else {?>
                                            <div class="no-profit-loss">No Transactions Found</div>
                                        <?php } ?>
                                        <h2 class="profit-btn"><a href="<?php echo base_url('user/result-attribution'); ?>">Loss</a></h2>
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
    <script src="<?php echo base_url('assets/users'); ?>/js/result-attribution.js"></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/common.js"></script>
    <script>
        ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "b55b025e438fa8a98e32482b5f768ff5"];
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
                    fontSize: '16',
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
                <?php 
                $color = array('f6bb19','063853','2bacf0','f5b882','6eb25b','bfff00','0000ff','00ff40','ff4000','ff0080','00ffff');
                $i=0;
                foreach($profit_recordarray as $profit)
                { 


                ?>
                {
                    
                    text: "<?php echo $profit['name']; ?>",
                    values: [parseFloat(<?php echo $profit['percent']; ?>)],
                    backgroundColor: '#<?php echo $profit['color']; ?>',
                },
            <?php $i++;} ?>
                
            ]
        };
        zingchart.bind('myChartProfitdetails', 'contextmenu', function(p) {
          return false;
        });
        zingchart.render({
            id: 'myChartProfitdetails',
            data: myConfig,
            height: '100%',
            width: '100%'
        });
    </script>
    <script>
        ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "b55b025e438fa8a98e32482b5f768ff5"];
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
                    fontSize: '16',
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
                <?php 
                $color = array('f6bb19','063853','2bacf0','f5b882','6eb25b','bfff00','0000ff','00ff40','ff4000','ff0080','00ffff');
                $i=0;
                foreach($loss_recordarray as $loss)
                { 


                ?>
                {
                    
                    text: "<?php echo $loss['name']; ?>",
                    values: [parseFloat(<?php echo $loss['percent']; ?>)],
                    backgroundColor: '#<?php echo $loss['color']; ?>',
                },
            <?php $i++;} ?>
                
            ]
        };
        zingchart.bind('myChartLossdetails', 'contextmenu', function(p) {
          return false;
        });
        zingchart.render({
            id: 'myChartLossdetails',
            data: myConfig,
            height: '100%',
            width: '100%'
        });
    </script>
</body>
</html>