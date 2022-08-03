<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url('assets/users'); ?>/images/favicons.png" type="images/x-icon" />
    <title>Stock Portforlio</title>
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
    <script src='https://cdn.zingchart.com/2.3.3/zingchart.min.js'></script>
    <script>
        ZC.MODULESDIR = 'https://cdn.zingchart.com/2.3.3/modules/';
                        ZC.LICENSE = ['569d52cefae586f634c54f86dc99e6a9','ee6b7db5b51705a13dc2339db3edaf6d'];
    </script>
    <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    <script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
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
                        <h1 class="ttile-heading">Warnings, alerts & ideas</h1>
                        <div class="bradcrum-list">
                            <ul>
                                <li><a href="#">Dashbord</a>
                                </li>
                                <li>/</li>
                                <li>Warnings, alerts & ideas</li>
                            </ul>
                        </div>
                    </div>
                    <!-- TradingView Widget BEGIN -->
                    <div class="col-md-12 col-sm-12">
                        <div class="bg-box-prt">
                            <div class="col-md-12 col-sm-12 contant-top-74">
                                <h3>Laverage </h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="resume-document">
                                    <ul>
                                        <li>D</li>
                                        <li>R</li>
                                        <li>E</li>
                                    </ul>
                                    <h5>Definition</h5>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 back">
                                <h5><a href="#">Back</a></h5> 
                            </div>
                            <div class="col-md-6 col-sm-6 continur-prt">
                                <h5><a href="#">Continue</a></h5> 
                            </div>
                        </div>
                    </div>
                    <div class="col=-col-md-12 col-sm-12 ">
                        <div class="stock-bg">
                            <div class="col-md-9 col-sm-9 contant-top-76">
                                <h3>Laverage </h3>
                                <h6>Ok</h6>
                                <div class="stock-protfolo">
                                    <table style="width:100%">
                                        <tr>
                                            <td>Capital</td>
                                            <td>1000$</td>
                                            <td>San Cfd</td>
                                            <td>10$</td>
                                        </tr>
                                        <tr>
                                            <td>Total</td>
                                            <td>10,000$</td>
                                            <td>Laveragr</td>
                                            <td>10:1</td>
                                        </tr>
                                        <tr>
                                            <td>San</td>
                                            <td style="color: red;">5%</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td style="color: red;">Total Loss</td>
                                            <td style="color: red;">500$</td>
                                            <td style="color: red;">(50% Capital)</td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 ">
                                <div class="resume-document ">
                                    <ul>
                                        <li>D</li>
                                        <li>R</li>
                                        <li>E</li>
                                    </ul>
                                    <h5>Example</h5>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 back ">
                                <h5><a href="# ">Back</a></h5> 
                            </div>
                            <div class="col-md-6 col-sm-6 continur-prt ">
                                <h5><a href="# ">Continue</a></h5> 
                            </div>
                        </div>
                        <!-- Stock-bg End -->
                    </div>
                    <!-- Col-md- 12 End -->
                    <!-- TradingView Widget BEGIN -->
                    <div class="col-md-12 col-sm-12">
                        <div class="bg-box-prt">
                            <div class="col-md-12 col-sm-12 contant-top-warning-tops">
                                <div class="text-cont-ok">
                                    <p>OK</p>
                                </div>
                                <center>
                                    <h3 style="color: red;">Warning!</h3>
                                </center>
                                <ul>
                                    <li>It is a long established fact that a reader will be <b>Laverage</b>
                                    </li>
                                    <li>It is a long established fact that a reader will be distracted</li>
                                    <li>It is a long established fact that a reader will be distracted</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Graps Part Section 3s Section Start Here -->
                    <div class="col=-col-md-12 col-sm-12 ">
                        <div class="stock-bg ">
                            <div class="col-md-9 col-sm-9 ">
                                <div id='myChart-6s'></div>
                            </div>
                            <div class="col-md-6 col-sm-6 back ">
                                <h5><a href="# ">Back</a></h5> 
                            </div>
                            <div class="col-md-6 col-sm-6 continur-prt ">
                                <h5><a href="# ">Continue</a></h5> 
                            </div>
                        </div>
                        <!-- Stock-bg End -->
                    </div>
                    <!-- Col-md- 12 End -->
                    <!-- Graps Part Section 3s Section End Here -->
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js "></script>
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js "><\/script>')
    </script>
    <script src="<?php echo base_url('assets/users'); ?>/js/bootstrap.min.js "></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/data-display-up-bleow.js "></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/amimation-menu-sidebar.js "></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/stock.js "></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/valuebox-singal-chart.js "></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/data-display-up-bleow.js "></script>
    <script>
        window.onload = function () {
        
        //Better to construct options first and then pass it as a parameter
        var options = {
            title: {
                text: "Spline Chart with Export as Image "
            },
            animationEnabled: true,
            exportEnabled: true,
            data: [
            {
                type: "spline ", //change it to line, area, column, pie, etc
                dataPoints: [
                    { x: 10, y: 10 },
                    { x: 20, y: 12 },
                    { x: 30, y: 8 },
                    { x: 40, y: 14 },
                    { x: 50, y: 6 },
                    { x: 60, y: 24 },
                    { x: 70, y: -4 },
                    { x: 80, y: 10 }
                ]
            }
            ]
        };
        $("#chartContainer ").CanvasJSChart(options);
        
        }
    </script>
</body>

</html>