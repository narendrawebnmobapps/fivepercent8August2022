<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url('assets/users'); ?>/images/favicons.png" type="images/x-icon" />
    <title>Options Portforlio</title>
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
</head>

<body>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row" id="main">                   
                    <style type="text/css">
                    	#myChart1222 #myChart1222-license-text,#myChartSimulation #myChartSimulation-license-text{display: none;}
                        .right-btn-back h4 a {
                        background-color: #042739;
                        font-size: 14px;
                        border-radius: 6px;
                        padding: 8px 21px;
                        color: #fff;
                        font-weight: 500;
                        cursor: pointer;
                    }

                        .options-list-tabs-view ul{
                            padding: 0;
                                margin-bottom: 20px;
                        }

                        .options-list-tabs-view ul li{
                            list-style: none;
                            display: inline-block;
                            margin-right: 16px;
                                                }

                        .options-list-tabs-view ul li a{
                            border: 2px solid #063853;
                            padding: 5px 18px;
                            border-radius: 3px;
                            font-size: 14px;
                            font-weight: 600;
                            color: #063853;
                            line-height: 32px;
                            transition: all 0.5s ease;
                                                }

                        .options-list-tabs-view ul li a:hover{
                            background-color: #063853;
                                color: #fff;
                                border-color: #063853;
                                text-decoration: none;
                                                    }

                        .options-list-tabs-view ul li a.active-options{
                            background-color: #063853;
                            color: #fff;
                            border-color: #063853;
                                                }

                    .options-list-tabs-view ul li a:focus{
                        text-decoration: none;
                    }

                    .options-list-tabs-view h2 {
                        font-size: 20px;
                        text-transform: uppercase;
                        margin: 0px 0px 9px 0px;
                        font-weight: 700; }
                   
                        .blance-sheet-info .resume-document ul {
                            margin-top: 15px;}
    
    @media screen and (max-width: 767px) {
        .options-list-tabs-view h2 {
        margin: 12px 0px 9px 0px;
    }
    .blance-sheet-info {
        padding: 0;
    }
}
    @media screen and (max-width: 576px) {
     .options-list-tabs-view ul li {
        margin-right: 0px;
    }
}

                    </style>
                    <!-- TradingView Widget BEGIN -->
                    <div class="loader-image" style="display: none;"><img src="<?php echo base_url('assets/users/images/loading.gif') ?>"></div>
                    <!-- Blance Sheet Section Start Here Part-4-->
                    <div class="resume-parts">
                    <div class="col-md-12 col-sm-12 options-list-tabs-view">
                        <h2>Option Mini Ibex 9.200</h2>
                        <ul class="option-resume-list">
                            <li id="C_CALL"><a href="javascript:void(0)" class="">C/CALL</a></li>
                            <li id="V_CALL"><a href="javascript:void(0)">V/CALL</a></li>
                            <li id="C_PVT"><a href="javascript:void(0)">C/PVT</a></li>
                            <li id="V_PVT"><a href="javascript:void(0)">V/PVT</a></li>
                        </ul>

                    </div>
                    <div class="col-md-12 col-sm-12 blance-sheet-info ">
                        <div class="col-md-12 col-sm-12 list-income-info">
                            <div class="list-sec-prt-blow">
                                <ul>
                                    <li>200$</li>
                                    <li>Premium</li>
                                    <li>15.00%</li>
                                    <li>Volalitily</li>
                                </ul>
                            </div>
                            <div id="myChart1222" style="width: 100%;"></div>
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
.box-selects-confirmation h3 {
    position: absolute;
    top: 339px !important;
    transform: translateX(-62%) translateY(-311%) rotate(810deg);
    -ff-transform: rotate(-90deg);
    margin: 0 auto;
    background-color: #053852;
    color: #fff;
    font-size: 14px;
    line-height: 26px;
    letter-spacing: 8px;
    border-radius: 25px;
    padding: 0px 33px 0px 32px;
    text-transform: uppercase;
    cursor: pointer;
}
</style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js "></script>
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js "><\/script>')
    </script>
    <script src="<?php echo base_url('assets/users'); ?>/js/voluame-chart-objects.js"></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#go-from-resume-to-simulation').click(function(){
            $('.simulation-parts').show();
            $('.resume-parts').hide();
        });

       $('#go-back-simulation-to-resume').click(function(){
            $('.simulation-parts').hide();
            $('.resume-parts').show();
        });
       var all_id = '';
       $('.option-resume-list').on('click','li',function(){
        

        all_id=all_id+' '+this.id;
        $('#'+this.id +' a').toggleClass('active-options');
       //$('li a').toggleClass('active-options');
      // alert(all_id);

       })

    });

var myConfig = {
        "gui":{ 
              "contextMenu":{ 
                "button":{ 
                  "visible": false 
                } 
              } 
            },
        "type": "line",
        scaleY:{ //define the scale to associate markers
          markers:[ //create marker array
            { //create n number of marker objects
              type: "line",
              range: [2]
            },
            {
              type: "area",
              range: [3,5]
            }
          ]
        },
        "series": [{
            "values": [
                [0, 20],
                [1, 30],
                [3, -40],
                [4, -40],
                [6, 60],
                [7, 70]
            ]
        }]
    };
zingchart.bind('myChart1222', 'contextmenu', function(p) {
  return false;
});
zingchart.render({
  id: 'myChart1222',
  data: myConfig,
  height: "400px",
  width: "100%"
});

</script>


</body>

</html>