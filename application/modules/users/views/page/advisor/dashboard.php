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
    <!-- Clander CSS -->
    <link href="<?php echo base_url('assets/users'); ?>/css/mini-event-calendar.min.css" rel="stylesheet">
    <!-- Responsive CSS -->
    <link href="<?php echo base_url('assets/users'); ?>/css/responsive.css" rel="stylesheet">
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
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
        #myChartClient-license-text{display: none;}
        .topFiveInvestment ul li {
            margin-bottom: 14px;
            border-bottom: 1px solid #d9cdcd;
            list-style: none;
            font-size: 16px;
            color: #464646;
            padding: 10px 10px;
        }
        .topFiveInvestment ul {
            margin: 0;
            padding: 0;
        }
    </style>
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
                        <div class="bradcrum-list">
                            <ul>
                                <li>Dashbord</li>
                            
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <div class="advisor-prt-bg-sec">
                            <div class="clint-accitivete">
                                <h3>Client' S Activity</h3>
                            </div>
                            <!-- <div id="chartContainer" style="height: 300px; width: 100%;"></div> -->
                            <div id='myChartClient' style="height: 300px; width: 100%;"></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 advisor-info-edfg">
                        <div class="advisor-prt-bg-sec">
                            <div class="clint-accitivete">
                                <h3>Top 5 Investment Funds</h3>
                            </div>
                            <div class="topFiveInvestment">
                                <ul>
                                    <?php 
                                    foreach($topFiveInvestments as $investment)
                                    { 
                                    ?>
                                     <li><a target="_blank" href="<?php echo $investment->referenceLink; ?>"><?php echo $investment->fund_name; ?></a></li>
                                    <?php } ?>

                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="box-chat-advisor">
                            <div class="line-border-hr-line">
                                <div class="text-and-info-chats">
                                    <h3>Clients</h3>
                                </div>
                                <div class="search-client">
                                    <form>
                                        <input type="text" class="searchUserByAdvisor" name="search" placeholder="Search..">
                                    </form>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="main-border-prt-scrrol appendsearchUserByAdvisor">
                                <?php if(count($client_lists)>0){ foreach($client_lists as $client){ ?>
                                <div class="main-bor-hr-line">
                                    <div class="pad-chat">
                                        <div class="user-pro">
                                            <a href="<?php echo base_url('advisor/client/'.base64_encode(base64_encode($client->id))); ?>">
                                            <img src="<?php echo base_url('uploads/user-profile/'.$client->profile_image); ?>">
                                        </a>
                                        </div>
                                        <div class="user-chat-info">
                                            <a href="<?php echo base_url('advisor/client/'.base64_encode(base64_encode($client->id))); ?>">
                                            <h4><?php echo $client->first_name.' '.$client->last_name; ?></h4>
                                        </a>
                                            <div class="online-chat-icons"><i <?php if($client->onlineStatus==0){ ?> style="color: #f6bb19;" <?php } ?> class="fa fa-circle" aria-hidden="true"></i>
                                            </div>
                                            <?php if($client->onlineStatus==0){ ?>
                                            <p>Offline</p>
                                            <?php } else { ?>
                                                <p>Online</p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } } else {?>
                            <div class="emptyAppointmentDiv">There are no One Client Connected With You</div>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="box-chat-advisor">
                            <div class="text-and-info-today-appiment">
                                <h3>Today's Appointment</h3>
                            </div>
                            <div class="clearfix"></div>
                            <div class="today-s-appointment">
                                <?php if(count($todaysScheduledAppointments)){ foreach($todaysScheduledAppointments as $scheduled){ ?>
                                <div class="main-bor-hr-line">
                                    <div class="pad-chat">
                                        <div class="user-appoinment-box">
                                            <a href="<?php echo base_url('advisor/client/'.base64_encode(base64_encode($scheduled->id))); ?>">
                                            <img src="<?php echo base_url('uploads/user-profile/'.$scheduled->profile_image); ?>">
                                        </a>
                                        </div>
                                        <div class="user-appoinment-contant-info"> <i class="fa fa-clock-o" aria-hidden="true"></i>
                                            <?php 
                                                $startTime = substr($scheduled->start_time,0,5);
                                                $endTime = substr($scheduled->end_time,0,5);
                                            ?>
                                            <p><?php echo $startTime; ?>. <?php echo $endTime; ?> <span>(0.5h)</span>
                                            </p>
                                            <a href="<?php echo base_url('advisor/client/'.base64_encode(base64_encode($scheduled->id))); ?>">
                                                <h4><?php echo $scheduled->first_name." ".$scheduled->last_name; ?></h4>
                                            </a>
                                            <h5>New customer meeting</h5>
                                        </div>
                                    </div>
                                </div>
                                <?php } } else { ?>
                                <div class="emptyAppointmentDiv">There are no appointment scheduled for You Today</div>
                            <?php } ?>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="box-chat-advisor">
                            <div class="text-and-info-today-appiment">
                                <h3>Live News</h3>
                            </div>
                            <div class="clearfix"></div>
                            <div class="today-s-appointment">
                                <?php foreach($live_news as $news){ ?>
                                <div class="main-bor-hr-line-live-news">
                                    <div class="pad-chat">
                                        <div class="live0news-prts-ol">
                                            <p><a href="<?php echo base_url('users/dashboard/news_details/'.base64_encode($news->id)); ?>"><?php echo $news->news_title ?></a></p>
                                            <!-- <h4>Sweety</h4> -->
                                            <h5><?php echo $news->news_content ?></h5>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-4 col-sm-4">
                        <div id="calendar2" style="width: 100%;"></div>
                    </div> -->
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')
    </script>
    <script src="<?php echo base_url('assets/users'); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/amimation-menu-sidebar.js"></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/simple-column-chart-advisor.js"></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/advisor-protfilo.js"></script>
    <!-- Clander Js-->
    <script src="<?php echo base_url('assets/users'); ?>/js/mini-event-calendar.min.js"></script>
    <!-- Clander Js-->
    <script src="<?php echo base_url('assets/users'); ?>/js/maps.js"></script>
    <!-- <script type="text/javascript" src="<?php echo base_url('assets/users/js/sidebarmenu.js'); ?>"></script> -->
    <script src="<?php echo base_url('assets/users'); ?>/js/common.js"></script>
    <!-- Clander Css End Here -->
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

        $(document).on('keyup','.searchUserByAdvisor',function(){
            var search = $('.searchUserByAdvisor').val();            
            $.ajax({
                     url: '<?php echo base_url('users/advisor/searchUserByAdvisor_ajax'); ?>',
                    type: "POST",
                    data:{search:search},
                    success: function(data)
                    {
                       //$('.appendsearchUserByAdvisor').html(data);
                       //console.log(data);
                        $(".appendsearchUserByAdvisor")
                            .empty()
                            .append(data);
                    }
            });
            
        })
    </script>
</body>

</html>