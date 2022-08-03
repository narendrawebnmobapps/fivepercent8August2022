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
    <link href="<?php echo base_url('assets/users'); ?>/css/main-custom.css" rel="stylesheet">
    <!-- Font Awesome core CSS -->
    <link href="<?php echo base_url('assets/users'); ?>/css/font-awesome.min.css" rel="stylesheet">
    <!-- Dashbord CSS -->
    <link href="<?php echo base_url('assets/users'); ?>/css/dashbord.css" rel="stylesheet">
    <!-- Responsive CSS -->
    <link href="<?php echo base_url('assets/users'); ?>/css/responsive.css" rel="stylesheet">
    <!-- Clander CSS -->
    <!-- Animate CSS -->
    <link href="<?php echo base_url('assets/users'); ?>/css/animate.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/users'); ?>/css/progresscircle.css">
    <!-- Weather.js CSS -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
        zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
        ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9","ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <style type="text/css">
/*----------------------

Clander Css Here
--------------*/
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
  height: 387px;
  box-shadow: 4px 2px 14px 1px rgba(0, 0, 0, 0.1);
}
.round-circle{
  width: 100%;
  float: left;
 /* border-radius: 50%;*/
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
.progress-bar-text-info h3 {
    font-size: 14px;
    text-transform: uppercase;
    margin: 17px 0px 26px 0px;
    font-weight: 500;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    position: relative;
}
</style>
</head>
<body>
    <div id="throbber" style="display:none; min-height:120px;"></div>
    <div id="noty-holder"></div>
    <div id="wrapper">
        <!-- Navigation -->
        <?php 
            $this->load->view('page/include/sidebar'); 
        ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row" id="main">
                    <div class="col-sm-12 col-md-12 well" id="content">
                        <h1 class="ttile-heading">DASHBOARD</h1>
                    </div>
                    <div class="col-md-8 col-xs-12 " id="demo">
                        
                       <?php 

                          $plan_id = $this->session->userdata('plan_id');
                          if($plan_id==1 OR $plan_id==0){

                         ?>
                         <div class="progress-box-bg wow fadeInUp animated" data-wow-duration="0" data-wow-delay="0s" style="visibility: visible; animation-delay: 0s; animation-name: fadeInUp;">
                            <div class="row">
                                <div class="top-ten-compaines-tit">
                                    <h4>Top 10 Investment Funds</h4>
                                </div>
                                <?php foreach($topTenInvestment as $topTenInvest){ ?>
                                <div class="col-md-3 col-sm-6 progress-bar-text-info">
                                    <h3><?php echo $topTenInvest->fund_name; ?></h3>
                                 <div class="circlechart" data-percentage="100"></div>
                                    <h6>15 days</h6>
                                    <p>$ <?php echo $topTenInvest->TAmount; ?></p>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                      <?php } else { ?> 
                        <div class="col-md-12 desh-padd-lt-0">
                          <div class="box-chart wow fadeInLeft animated" data-wow-duration="1s" data-wow-delay="0" style="visibility: visible; animation-duration: 1s; animation-name: fadeInLeft;">
                              <h2>Financial Target</h2>
                              <div id="chartContainere" style="height: 300px; width: 100%;"></div>
                          </div>
                        </div>          
                        <div class="progress-box-bg wow fadeInUp animated" data-wow-duration="0" data-wow-delay="0s" style="visibility: visible; animation-delay: 0s; animation-name: fadeInUp;">
                            <div class="row">
                                <div class="top-ten-compaines-tit">
                                    <h4>Top 10 Companies</h4>
                                </div>
                                <?php foreach($companies as $company){ ?>
                                <div class="col-md-3 col-sm-6 progress-bar-text-info">
                                    <h3><?php echo $company['company']; ?></h3>
                                 <div class="circlechart" data-percentage="<?php echo $company['profit_percentage']; ?>"></div>
                                    <h6><?php echo $company['days']; ?> days</h6>
                                    <p>$ <?php echo $company['total_average_profit']; ?></p>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- progress-box-bg End -->
                        <!-- <div class="top-stateresse-box">
                            <div class="top-ten-compaines-tit">
                                <h4>Top 10 Strategies</h4>
                            </div>
                            <?php foreach($strategies as $strategy){ ?>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 text-counter-info">
                                <div class="employees">
                                    <h4><?php echo $strategy['strategy']; ?></h4>
                                    <p class="counter-count"> <span><?php echo $strategy['profit_percentage']; ?></span>%</p>
                                    <p class="employee-p">$ <?php echo $strategy['total_average_profit']; ?></p>
                                </div>
                            </div>
                            <?php } ?>
                        </div> -->
                        <div class="progress-box-bg wow fadeInUp animated" data-wow-duration="0" data-wow-delay="0s" style="visibility: visible; animation-delay: 0s; animation-name: fadeInUp;">
                            <div class="row">
                                <div class="top-ten-compaines-tit">
                                    <h4>Top 10 Strategies</h4>
                                </div>
                                <?php foreach($strategies as $strategy){ ?>
                                <div class="col-md-3 col-sm-6 progress-bar-text-info">
                                    <h3><?php echo $strategy['strategy']; ?></h3>
                                 <div class="circlechart" data-percentage="<?php echo $strategy['profit_percentage']; ?>"></div>
                                    <h6><?php echo $strategy['days']; ?> days</h6>
                                    <p>$ <?php echo $strategy['total_average_profit']; ?></p>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div id="" style="width: 100%;">
                                <div class="calendar-container mini-cal">
                                    <div class="calendar" id="calendar_div"> 
                                      <?php echo getCalender() ?>
                                    </div>
                                </div>
                           </div>
                        <div class="live-news-box-prts">
                            <h4>Live News</h4>
                            <?php 
                            foreach($live_news as $news){ 
                                $years = date("Y", strtotime($news->created_on));
                            ?>
                            <div class="main-prts">
                                <div class="user-profile">
                                    <img src="<?php echo base_url('uploads/news/'.$news->image); ?>">
                                </div>
                                <div class="user-contants">
                                    <p><?php echo $news->news_title; ?></p>
                                    <h5>New Circle in <?php echo $years; ?></h5>
                                    <h6><a href="<?php echo base_url('users/dashboard/news_details/'.base64_encode($news->id)); ?>">Read More...</a></h6>
                                </div>
                            </div>
                          <?php } ?>
                        </div>
                        <!-- Main -Div-->
                    </div>
                    <!-- Col-md-4 End -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

        <!-- Add Balance Sheet Modal -->
          <div class="modal fade" id="showcalenderbynews" role="dialog">
            <div class="modal-dialog">
            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header head-bg-color">
                  <button type="button" class="close close-x" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Economic Calendar</h4>
                </div>
                <div class="modal-body">
                       <div class="main-table-borer">   
                           <table class="table table-bordered appendNewsdata">
                               
                           </table>
                       </div>
                </div><!-- End modal-body -->
                
              </div>
              
            </div>
          </div>
          <!-- Add Balance Sheet Modal End-->





    </div>
    <!-- /#wrapper -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/amimation-menu-sidebar.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <!-- <script src="<?php echo base_url('assets/users'); ?>/js/weather.js"></script> -->
    <script src="<?php echo base_url('assets/users'); ?>/js/wow.min.js"></script>
    <!-- Clander Js-->
    <script src="<?php echo base_url('assets/users'); ?>/js/mini-event-calendar.min.js"></script>
    <!-- Clander Js-->
    <!-- <script type="text/javascript" src="<?php echo base_url('assets/users/js/sidebarmenu.js'); ?>"></script> -->
    <!-- Clander Css End Here -->
    <script src="<?php echo base_url('assets/users'); ?>/js/progresscircle.js"></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/common.js"></script>
    <script>
        $('.circlechart').circlechart(); // Initialization
    </script>
    <script>
        var db_events = [
                    {
                        title: "Board members meeting.",
                        date: 1532381440036,
                        link: "events.com/ev2"
                    },
                    {
                        title: "Delaware branch opening.",
                        date: 1532467961534,
                        link: "events.com/ev1"
                    },
                    {
                        title: "An important event.",
                        date: 1532554405128,
                        link: "events.com/ev1"
                    }
                ];
        
                $(document).ready(function(){
                    $("#calendar").MEC({
                        calendar_link: "example.com/myCalendar",
                        events: db_events
                    });
        
                    //if you don't have events, use
                    $("#calendar2").MEC();
                });
    </script>
    <!-- Clander Css Start Here -->
    <!-- Financial Target Map Section Start Here -->
    <script>
        /*window.onload = function () {
        var charts = new CanvasJS.Chart("chartContainere", {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: ""
            },
            axisY:{
                includeZero: false
            },
            data: [{        
                type: "line",       
                dataPoints: [
                    { y: 450 },
                    { y: 414},
                    { y: 520, indexLabel: "highest",markerColor: "red", markerType: "triangle" },
                    { y: 460 },
                    { y: 450 },
                    { y: 500 },
                    { y: 480 },
                    { y: 480 },
                    { y: 410 , indexLabel: "lowest",markerColor: "DarkSlateGrey", markerType: "cross" },
                    { y: 500 },
                    { y: 480 },
                    { y: 510 }
                ]
            }]
        });
        charts.render();
        
        }*/
    </script>
    <!-- Financial Target Map Section Start Here -->
    <!-- Counter Js Start Here -->
    <script type="text/javascript">
        $('.counter-count span').each(function () {
                $(this).prop('Counter',0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 5000,
                    easing: 'swing',
                    step: function (now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });
    </script>
    <!-- Counter Js End Here -->


<!-- Wow Animation Js Start-->
<script>
  new WOW().init();
   </script>
<!-- Wow Animation Js End -->

<script>
        ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "b55b025e438fa8a98e32482b5f768ff5"];
        var myConfig = {
            "type": "pie",
            "title": {
               // "text": "A Pie Chart"
            },
            "series": [{
                    "values": [59]
                },
                {
                    "values": [55]
                },
                {
                    "values": [30]
                },
                {
                    "values": [28]
                },
                {
                    "values": [15]
                }
            ]
        };
 
        zingchart.render({
            id: 'myChartgoal',
            data: myConfig,
            height: '300px',
            width: "100%"
        });
    </script>


<script type="text/javascript">
    
var x, i, j, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
for (i = 0; i < x.length; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < selElmnt.length; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        h = this.parentNode.previousSibling;
        for (i = 0; i < s.length; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            for (k = 0; k < y.length; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  for (i = 0; i < y.length; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < x.length; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);
</script>

<script type="text/javascript">
    $(document).on('click','.show_news_list_data',function(){
        var clickedDate = $(this).attr('dataid');
       // alert(clickedDate);

        $.ajax({
                url:'<?php echo base_url("users/dashboard/get_all_news_by_date_ajax"); ?>',
                method:'POST',
                data:{clickedDate:clickedDate},
                dataType : 'html',
                success:function(data)
                {
                    //console.log(data);
                    $('.appendNewsdata').html(data);
                    $('#showcalenderbynews').modal('show');
                }
            });

        
    })
    //$('.show_news_list_data').
</script>

<script type="text/javascript">
  var myConfig = {
  "type":"pie",
  /*"title":{
    "text":"'ref-angle' attribute"
  },*/
  "scale-r":{
    "ref-angle":200 //relative to starting 90 degree position
  },
  "plot":{
    "value-box":{
      "visible":true
    },
    'border-color': "gray",
    'border-width': 2,
    
  },
  "series":[
    {"values":[10],"background-color":"#fff"},
    {"values":[90],"background-color":"#118ed5"},

  ]
};

zingchart.render({ 
  id : 'goalChart', 
  data : myConfig, 
  height: 280, 
  width: 170 
});



var myConfigFinanace = 
{ 
    /*"gui":{ 
          "contextMenu":{ 
            "button":{ 
              "visible": false 
            } 
          } 
        },*/ 
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
/*zingchart.bind('chartContainere', 'contextmenu', function(p) {
  return false;
});*/
zingchart.render({ 
  id : 'chartContainere', 
  data : myConfigFinanace, 
  height: '100%', 
  width: '100%'
});
</script>


</body>
</html>