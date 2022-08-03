<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url('assets/users'); ?>/images/favicons.png" type="images/x-icon" />
    <title><?php echo $title; ?></title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/users'); ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/users'); ?>/css/dashbord.css" rel="stylesheet">
    <!-- Responsive CSS -->
    <link href="<?php echo base_url('assets/users'); ?>/css/responsive.css" rel="stylesheet">

    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <style type="text/css">
/*----------------------
/*---------------
Online Google Font Here
--------------*/

/*font-family: 'Open Sans', sans-serif;*/

@import url('https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800i');

/*font-family: 'Roboto', sans-serif;*/

@import url('https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900');
h1,
h2,
h3,
h4,
h5,
h6 {
    font-family: 'Roboto', sans-serif;
    font-weight: 600;
    color: #292929;
}

#goalChart-top{
    margin-top: -68px !important;
}
#goalChart-license-text{
    display: none !important; 
}
/*------------------------------------------*/
.user-profile {
    display: inline-block;
    margin-right: 13px;
    height: 65px;
    overflow: hidden;
}
/*model popup*/

.head-bg-color{
    background: #063853;
    padding: 8px 15px;
}
.head-bg-color h4 {
    color: #fff;
    font-size: 18px;
    font-weight: 500;
    text-align: center;
}
.close-x{
    color: #fff;
    opacity: 2;
}
.border-top-0{
    border-top: none;
}
.desh-padd-lt-0{
    padding-left: 0;
    padding-right: 0;
}

.desh-padd-rt-0{}
.circal-graf{
    width: 100%;
    float: left;
    background: #fff;
    padding-top: 65px;
    border-top: 1px solid rgba(0, 0, 0, 0.1);
    box-shadow: 0px 0px 0px 1px rgb(0 0 0 / 19%);
/*  height: 387px;*/
/*  box-shadow: 4px 2px 14px 1px rgba(0, 0, 0, 0.1);*/
}
.round-circle{
    width: 100%;
    float: left;
    background: #FFF;
    overflow: hidden;
}
.round-circle img{
    width: 170px;
    margin: 0 auto;
    display: block;
}
.graph-dropdown{
    width: 100%;
    float: left;
    text-align: center;
    padding:20px 0;
}
.graph-dropdown .dropdown .dropdown-toggle{
    background: #eee;
    width: 162px;
    padding: 6px 0;
    cursor: pointer;
    float: left;
    border-radius: 20px;
}
.graph-dropdown .dropdown .dropdown-menu{
    margin-top: 34px;
}
#chartContainere-license-text{
    display: none;
}
.financialgoal h6{
    font-size: 16px;
    margin: 10px 0px 0 13px;
    color: #003e56;
    font-family: 'Roboto', sans-serif;
    text-transform: uppercase;
    font-weight: 500;
}
</style>

</head>
<body>
    <div id="throbber" style="display:none; min-height:120px;"></div>
    <div id="noty-holder"></div>
    <div id="wrapper">

        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row" id="main">
                        <div class="col-md-12 desh-padd-lt-0">
                          <div class="financialgoal">
                            <h6>Financial Target</h6>
                          </div>
                          <div class="box-chart wow fadeInLeft animated" data-wow-duration="1s" data-wow-delay="0" style="visibility: visible; animation-duration: 1s; animation-name: fadeInLeft;">
                              <div id="chartContainere" style="height: 200px; width: 100%;"></div>
                          </div>
                        </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->


    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/bootstrap.min.js"></script>



<script type="text/javascript">
var myConfigFinanace = 
{ 
    "gui":{ 
          "contextMenu":{ 
            "button":{ 
              "visible": false 
            } 
          } 
        }, 
   "type":"line",
   "plotarea":{
              "margin":"dynamic 45 60 dynamic"
              },
   "scale-x":{  
      "labels":[<?php echo $allDateArr; ?>],
      "line-color": "#f6f7f8",
   },
   "scaleY": {
    "min-value":<?php echo $minAxix; ?>,
    "max-value":<?php echo $maxAxix; ?>,
    "step":5,
    "markers":[
        {
          "type":"line",
          "range": [<?php echo $profitTarget; ?>],
          "lineColor": "red",
          "lineWidth": 2,
          "label":{  //define label within marker
            "text":"Target: <?php echo $profitTarget; ?>%",
            "backgroundColor":"white",
            "alpha": 0.7,
            "textAlpha": 1,
            offsetX: 500,
            offsetY: -5
          }
        }
      ],
    "format": "%v%",
    "line-color": "#f6f7f8",
    "shadow": 0,
    "guide": {
      "line-style": "dashed"
    },
    "minor-ticks": 0,
    "thousands-separator": ",",
    //"format":"$%v"
    
  },
  "crosshair-x":{
                "line-color":"#ffff",
                "line-width":"2px",
                "plot-label":{
                    "text":"Profit: %v%",
                    "decimals": 2,
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
   "series":[  
      {  
         "values":[<?php echo $profitLoss; ?>],
         "text":"Profit",
          "line-color":"#29a2cc",
          "legendMarker":{
              "type":"circle",
              "backgroundColor":"#29a2cc",
              "borderColor":"#29a2cc",
              "borderWidth":"1px",
              "shadow":true,
              "size":"2px"
              },
          "marker":{
              "backgroundColor":"#29a2cc",
              "borderColor":"#29a2cc",
              "borderWidth":"1px",
              "shadow":true
              }
      }
   ]
};
zingchart.bind('chartContainere', 'contextmenu', function(p) {
  return false;
});
zingchart.render({ 
  id : 'chartContainere', 
  data : myConfigFinanace, 
  height: '100%', 
  width: '100%'
});
</script>


</body>
</html>