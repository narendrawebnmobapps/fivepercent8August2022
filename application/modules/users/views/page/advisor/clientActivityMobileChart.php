<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url('assets/users'); ?>/images/favicons.png" type="images/x-icon" />
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/users'); ?>/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
</head>
<body>
    <style type="text/css">
        .advisor-info-edfg div#myChart-top {
            top: -39%;
        }
        .advisor-info-edfg div#myChart-wrapper {
            height: 301px !important;
        }
        #myChartClient-license-text{
            display: none;
        }
        #myChartClient{
             width: 107%;
            margin-left: -20px !important;
            margin-right: -7px !important;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div id='myChartClient' style="height: 300px;"></div>
            </div>                   
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')
    </script>
    <script src="<?php echo base_url('assets/users'); ?>/js/bootstrap.min.js"></script>
    <script>
        var myConfig = {
            "gui":{ 
              "contextMenu":{ 
                "button":{ 
                  "visible": false 
                } 
              } 
            }, 
            type: "bar",
            "background-color":"#fff",
            plotarea: {
                adjustLayout: true
            },
            plot:{
              stacked: false ,
              styles:[<?php echo $colordata; ?>],
              "aspect": "spline",
                "tooltip": {
                  "text": "%v%",
                  "font-color": "white",
                  "font-family": "Roboto",
                  "font-size": 12,
                  "font-weight": "normal",
                  "font-style": "normal"
                }
            },
            scaleX: {
                labels: [<?php echo $labeldata; ?>],
                "line-color":"#ccc",  
                "line-width":"0px",  
                "item":{  
                    "color":"#063853"  
                },  
                "guide":{  
                    "visible":true,
                    "line-color":"#555",  
                    "line-style":"solid",  
                    "line-width":"0.5px"
                },  
                "tick":{  
                    "size":2,  
                    "line-width":0,  
                    "line-color":"#555",  
                    "placement":"outer"  
                } 
            },
            "scale-y":{  
                "format":"%v%",  
                "multiplier":true,  
                "line-color":"#ccc",  
                "line-width":"0px",  
                "guide":{  
                    "visible":true,
                    "line-color":"#555",  
                    "line-style":"solid",  
                    "line-width":"0.5px"  
                },  
                "tick":{  
                    "size":2,  
                    "line-width":0,  
                    "line-color":"#555",  
                    "placement":"outer"  
                },  
                "item":{  
                    "padding":"5px"  
                }  
            }, 
            series: [
                {
                    values: [<?php echo $grapghValue; ?>],

                }
            ]
        };
        zingchart.bind('myChartClient', 'contextmenu', function(p) {
          return false;
        });
        zingchart.render({
            id: 'myChartClient',
            data: myConfig,
            height: "100%",
            width: "100%",
            backgroundColor:"#fff"
        });
    </script>
</body>

</html>