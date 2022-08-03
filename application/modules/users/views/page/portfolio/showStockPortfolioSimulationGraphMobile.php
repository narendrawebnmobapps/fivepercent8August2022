<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url('assets/users'); ?>/images/favicons.png" type="images/x-icon" />
    <title><?php echo $title; ?></title>
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
    <style type="text/css">
         #myChart-5s #myChart-5s-license{display: none;}
        ul.balancesheettest li.active{color: #053852;}
        .stock-bg, .bg-box-prt{
        min-height: 620px;
        }

        .confirm-selec {
        margin-top: 0px;
       margin-bottom: 25px;
   }

     .stock-protfolo {
         height: 390px;
         display: flex;
     }

         .list-pagenations{
          margin-bottom: 0px;
          height: 41px;
         }

         .total-views {
          margin-top: -10px;}
          .total-views ul li {
                width: 230px !important;
                text-transform: uppercase;
            }

         .box-2 {
         height: 427px;
         display: flex;
        }

         /*------------- Mobile Responsive Here -----------------*/
          @media screen and (max-width: 1400px){
            .stock-protfolo {
            height: 390px;
            display: flex;
         }

            .box-2 {
            /*height: 427px;*/
            height: 416px;
            display: flex;}  

        }
             
            @media screen and (max-width: 1280px){
            .stock-protfolo {
            min-height: 397px;
            display: flex;}

            .box-2 {
            min-height: 402px;
            display: flex;} 

             }


             /* Detect Chrome 22+ (and Safari 6.1+) */
        /*@media screen and (-webkit-min-device-pixel-ratio:0) and (min-resolution: .001dpcm), screen and(-webkit-min-device-pixel-ratio:0) {
            .stock-protfolo {
            min-height: 397px;}


          .box-2 {
           min-height: 433px;}

           }*/


.line-persantage-boxs ul li {
    list-style: none;
    font-size: 13px;
    font-weight: 500;
    text-transform: uppercase;
    line-height: 14px;
    text-align: center;
    margin-bottom: 7px;
    padding: 6px 6px;
    border-radius: 2px;
    border: 1px solid #ccc;
    cursor: pointer;
    width: 152px;
}
ul.balancesheettest li.active {
    color: #ffffff;
    background-color: #063853;
}
.stock-bg .line-persantage-boxs {
    margin-top: 52px;
}

@media screen and (max-width: 767px){
.stock-bg .line-persantage-boxs {
    width: 100%;
}
.box-partchanel {
    width: 100%;
}
.line-persantage-boxs ul li {
    width: 100%;
}
.line-persantage-boxs ul {
    padding-left: 0;
}
.box-2 {
    padding: 0;
}
.stock-bg .line-persantage-boxs {
    margin-top: 0px;
}
.stock-bg {
    padding: 0px;
    box-shadow: 0 0px 4px rgb(0 0 0 / 16%);
}
    </style>
</head>
<body id="double-tap">
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row" id="main">
                    <div class="loader-image" style="display: none;"><img src="<?php echo base_url('assets/users/images/loading.gif') ?>"></div>                    
                    <div class="col-md-12 col-sm-12 variable-chart-simulation">
                        <div class="stock-bg">
                            <div class="col-md-10 col-sm-10 box-2">
                                <div id='myChart-5s' style="width: 100%;height: 100%;">
                                    <a class="zc-ref" href="#"></a>
                                </div>
                            </div>
                        <div class="col-lg-2 col-md-12 col-sm-12 selectox2">
                            <div class="box-partchanel">
                                <div class="line-persantage-boxs  percentage-filter-boxs2" style="">
                                    <ul class="balancesheettest">
                                        <li class="active">Ibex </li>
                                        <li>BBWA</li>
                                        <li>Col</li>
                                        <li>SAN</li>
                                        <li>Total</li>                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div><!-- Stock-bg End -->
                </div> <!-- Col-md- 12 End -->

                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

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
<script src="<?php echo base_url('assets/users'); ?>/js/jquery.base64.js "></script>
<script src="<?php echo base_url('assets/users'); ?>/js/bootstrap.min.js "></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.percentage-filter-boxs2 .balancesheettest li').click(function(){
            $('.percentage-filter-boxs2 .balancesheettest li').removeClass("active");
            $(this).addClass("active");
        });
    });
    let chartData = [{
        text: 'IBEX',
        values: [0, 200, 400, 600, 800, 1000, 1200, 1400, 1600, 1800, 2000, 2200, 2400, 2600, 2800,3000,3200,3400,3600,3800,4000,4200],
        lineColor: '#1e38a8',
        marker: {
            backgroundColor: '#1e38a8',
            borderColor: '#1e38a8'
        }
    },  
    {
        text: 'BBVA',
        values: [0, 300, 450, 600, 750, 900, 1050, 1200, 1350, 1500, 1650, 1800, 1950, 2100, 2250,2400,2550,2700,2850,3000,3150,3300],
        lineColor: '#f04312',
        marker: {
            backgroundColor: '#f04312',
            borderColor: '#f04312'
        }
    }, 
    {
        text: 'TOTAL',
        values: [0, 200, 300, 400, 500, 600, 700, 800, 900, 1000, 1100, 1200, 1300, 1400, 1500,1600,1700,1800,1900,2000,2100,2200],
        lineColor: '#030303',
        marker: {
            backgroundColor: '#030303',
            borderColor: '#030303'
        }
    },
    {
        text: 'COL',
        values: [0, 50, 100, 150, 200, 250, 300, 350, 400, 450, 500, 550, 600, 650, 700,750,800,850,900,950,1000,1050],
        lineColor: '#0c3666',
        marker: {
            backgroundColor: '#0c3666',
            borderColor: '#0c3666'
        }
    },        
];

let chartConfig = {
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
    series: chartData
};

zingchart.render({
    id: 'myChart-5s',
    data: chartConfig,
    height: '400px',
    width: '100%',

});


/*document.getElementById("double-tap").addEventListener("touchstart", tapHandler);

var tapedTwice = false;

function tapHandler(event) {
    if(!tapedTwice) {
        tapedTwice = true;
        setTimeout( function() { tapedTwice = false; }, 300 );
        return false;
    }
    event.preventDefault();
    //action on double tap goes below
    alert('You tapped me Twice !!!');
    return false;
 }*/
</script>
</body>
</html>