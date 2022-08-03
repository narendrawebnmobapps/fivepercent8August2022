<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no">
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
.zc-ref {
  display: none;
}
.chart--container {
  height: 100%;
  width: 100%;
  min-height: 150px;
}
#myChart-license-text {
  display: none !important;
}
#myChartLine-license-text {
  display: none !important;
}
body {
    background-color: #ffffff;
}
#page-wrapper {
    background-color: #ffffff;
}
</style>
</head>
<body>
       <!-- Navigation -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row" id="main">
                    <!-- TradingView Widget BEGIN -->
                    <div class="col-md-12 col-sm-12">
                      <div id='myChartLine'></div>
                    </div> <!-- Col Md 12 End -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js "></script>
<script src="<?php echo base_url('assets/users'); ?>/js/bootstrap.min.js "></script>
 
<script>
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
    height: "260px",
    width: "100%"
});
</script>
</body>
</html>