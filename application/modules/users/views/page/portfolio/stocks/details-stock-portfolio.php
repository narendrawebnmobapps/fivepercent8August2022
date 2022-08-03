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
        <?php 
            $this->load->view('page/include/sidebar'); 
        ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row" id="main">
                    <div class="col-sm-12 col-md-12 well" id="content">
                        <div class="bradcrum-list">
                            <ul>
                                <li><a href="<?php echo base_url('user/dashboard'); ?>">Dashboard</a>
                                </li>
                                <li>/</li>
                                <li>Portforlio</li>
                                <li>/</li>
                                <li>Stock</li>
                                <li>/</li>
                                <li><?php echo $stock_details->stock_name; ?></li>
                            </ul>
                        </div>
                    </div>
                <!-- Graps Part Section 3s Section Start Here -->
                <div class="col-col-md-12 col-sm-12 stock-details-step-1">
                        <div class="stock-bg ">
                         <div class="col-md-12 col-sm-12 ">
                        <div id='myChart-6s'></div>
                        </div>
                        <!-- <div class="col-md-3 col-sm-3 ">
                            <div class="list-varant-clors-prt ">
                           <ul>  
                                <li>Volume <span class="red-alerts "><?php echo $stock_details->number; ?></span></li>
                                <li>Entry Price<span class="red-alerts ">4.501€</span></li>
                                <li>Stop Loss <span class="red-alerts ">4.50</span></li>
                                <li>Stop Loss Price <span class="red-alerts-1 ">1% €</span></li>
                                <li>Total Loss <span class="red-alerts-1 ">42,35€</span></li>                            
                           </ul>
                           <h5><a href="JavaScript:void(0)">Ichimoku Strategy</a></h5>
                       </div>
                        </div> -->
                       <div class="col-md-12 col-sm-12 ">
                                <div class="resume-document ">
                                    <ul>
                                        <li><a class="r" href="javascript:void(0)">G</a></li>
                                        <li id="step-details-id-1-1"><a href="javascript:void(0)">F</a></li>
                                        <li id="step-details-id-1-2"><a href="javascript:void(0)">S</a></li>
                                        <li  id="step-details-id-1-3"><a href="javascript:void(0)">A</a></li>
                                    </ul>
                                    <h5>Graph</h5>
                                </div>
                            </div>


                            <!--div class="col-md-6 col-sm-6 back ">
                                <h5><a href="# ">Back</a></h5> 
                            </div>
                            <div class="col-md-6 col-sm-6 continur-prt ">
                                <h5><a href="# ">Continue</a></h5> 
                            </div-->

                    </div><!-- Stock-bg End -->
                </div> <!-- Col-md- 12 End -->

                <!-- Graps Part Section 3s Section End Here -->


                <!-- Blance Sheet Section Start Here Part-4-->
               <div class="col-md-12 col-sm-12 blance-sheet-info stock-details-step-2" style="display: none;">
                        <div class="stock-bg ">
                         <div class="col-md-11 col-sm-11 box-1">
                            <h2>(2q) 31 Jan 2019</h2>                        
                            <table class="none-border "style="width: 100%; ">
                              <tr>
                                <th>Result Account</th>
                                <th>Blance Sheet</th>
                                <th>Cash Flow</th>
                              </tr>
                              <tr>
                                <td>Accounts Receivable</td>
                                <td>Common Stock</td>
                                <td>Cash</td>
                              </tr>
                              <tr>
                                <td>Merchandise</td>
                                <td>Retained Earning</td>
                                <td>Retained Earning</td>
                              </tr>
                              <tr>
                                <td>Perpaid Exp</td>
                                <td>Nots Payable</td>
                                <td>Account Payable</td>
                              </tr>
                              <tr>
                                <td>Accounts Payable</td>
                                <td>Supplies</td>
                                <td>Long-Term Debt</td>
                              </tr>
                             
                            </table>
                        </div><!-- End Col-Md-9--> 


                            <div class="col-md-1 col-sm-1 selectox1">
                                <div class="box-partchanel ">
                                    <div class="box-selects box-select1">
                                        <h3>SELECT</h3>
                                    </div>
                                    <div class="line-persantage-boxs percentage-filter-boxs1" style="display: none;">
                                        <ul>
                                            <li><span>Median Price</span>
                                            </li>
                                            <li>Simple Average</li>
                                            <li>EXp. Avergare</li>
                                            <li><span>Geometric Average</span>
                                            </li>
                                            <li>-2 STD DEV</li>
                                            <li>+ STD DEV</li>
                                            <li>1% Percentile</li>
                                            <li><span>99% Percentile</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>        

                             <div class="col-md-12 col-sm-12 ">
                                <div class="resume-document ">
                                    <ul>
                                        <li id="step-details-id-2-1"><a href="javascript:void(0)">G</a></li>
                                        <li><a class="r" href="javascript:void(0)">F</a></li>
                                        <li id="step-details-id-2-2"><a href="javascript:void(0)">S</a></li>
                                        <li  id="step-details-id-2-3"><a href="javascript:void(0)">A</a></li>
                                    </ul>
                                    <h5>Fundamental</h5>
                                </div>
                            </div>

                            <!--div class="col-md-6 col-sm-6 back ">
                                <h5><a href="# ">Back</a></h5> 
                            </div>
                            <div class="col-md-6 col-sm-6 continur-prt ">
                                <h5><a href="# ">Continue</a></h5> 
                            </div-->

                        </div><!-- Stock-bg End -->
                    </div> <!-- Col-md- 12 End -->

                <!-- Blance Sheet Section End Here -->


                <!-- Blance Sheet Section Start Here Part-4-->
               <div class="col-md-12 col-sm-12 blance-sheet-info stock-details-step-3" style="display: none;">
                        <div class="stock-bg ">
                         <div class="col-md-11 col-sm-11 box-2">
                          
                           <div id='myChart-20s'></div>
                        
                        </div><!-- End Col-Md-9--> 
                            <div class="col-md-1 col-sm-1 selectox2">
                                <div class="box-partchanel">
                                    <div class="box-selects box-select2">
                                        <h3>Select</h3>
                                    </div>
                                    <div class="line-persantage-boxs percentage-filter-boxs2" style="display: none;">
                                        <ul>
                                            <li><span>Median Price</span>
                                            </li>
                                            <li>Simple Average</li>
                                            <li>EXp. Avergare</li>
                                            <li><span>Geometric Average</span>
                                            </li>
                                            <li>-2 STD DEV</li>
                                            <li>+ STD DEV</li>
                                            <li>1% Percentile</li>
                                            <li><span>99% Percentile</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>      
                             <div class="col-md-12 col-sm-12 ">
                                <div class="resume-document ">
                                    <ul>
                                        <li id="step-details-id-3-1"><a href="javascript:void(0)">G</a></li>
                                        <li id="step-details-id-3-2"><a href="javascript:void(0)">F</a></li>
                                        <li><a class="r" href="javascript:void(0)">S</a></li>
                                        <li  id="step-details-id-3-3"><a href="javascript:void(0)">A</a></li>
                                    </ul>
                                    <h5>Strategy</h5>
                                </div>
                            </div>

                            <!--div class="col-md-6 col-sm-6 back ">
                                <h5><a href="# ">Back</a></h5> 
                            </div>
                            <div class="col-md-6 col-sm-6 continur-prt ">
                                <h5><a href="# ">Continue</a></h5> 
                            </div-->

                        </div><!-- Stock-bg End -->
                    </div> <!-- Col-md- 12 End -->

                    <div class="col-md-12 col-sm-12 blance-sheet-info stock-details-step-4" style="display: none;">
                        <div class="stock-bg ">
                         <div class="col-md-11 col-sm-11 box-2">
                          
                           <div id='myChart4th'></div>
                        
                        </div><!-- End Col-Md-9--> 
                            <div class="col-md-1 col-sm-1 selectox2">
                                <div class="box-partchanel">
                                    <div class="box-selects box-select2">
                                        <h3>Select</h3>
                                    </div>
                                    <div class="line-persantage-boxs percentage-filter-boxs2" style="display: none;">
                                        <ul>
                                            <li><span>Median Price</span>
                                            </li>
                                            <li>Simple Average</li>
                                            <li>EXp. Avergare</li>
                                            <li><span>Geometric Average</span>
                                            </li>
                                            <li>-2 STD DEV</li>
                                            <li>+ STD DEV</li>
                                            <li>1% Percentile</li>
                                            <li><span>99% Percentile</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>      
                             <div class="col-md-12 col-sm-12 ">
                                <div class="resume-document ">
                                    <ul>
                                        <li id="step-details-id-4-1"><a href="javascript:void(0)">G</a></li>
                                        <li id="step-details-id-4-2"><a href="javascript:void(0)">F</a></li>
                                        <li id="step-details-id-4-3"><a href="javascript:void(0)">S</a></li>
                                        <li><a class="r" href="javascript:void(0)">A</a></li>
                                    </ul>
                                    <h5>Analysis</h5>
                                </div>
                            </div>

                            <!--div class="col-md-6 col-sm-6 back ">
                                <h5><a href="# ">Back</a></h5> 
                            </div>
                            <div class="col-md-6 col-sm-6 continur-prt ">
                                <h5><a href="# ">Continue</a></h5> 
                            </div-->

                        </div><!-- Stock-bg End -->
                    </div> <!-- Col-md- 12 End -->

                <!-- Blance Sheet Section End Here -->


                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- Bootstrap core JavaScript================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

<style type="text/css">
.add_stock_modal .modal-header {
    background: #053852;
    padding: 15px 12px;
}
.add_stock_modal .modal-header button{
    color: #fff;
}
.add_stock_modal .modal-header h4 {
    color: #fff;
    font-size: 22px;
    font-weight: 400;
}
.add_stock_modal .modal-body form {
    border: 1px solid #d4d5d6;
    padding: 16px;
    border-radius: 5px;
}
.add_stock_modal .modal-footer{
    border-top:none;
    padding: 0px 15px 12px 0;
}
.add_stock_modal .modal-body .form-group label{
    color: #053852;
}
.add_stock_modal .modal-body .form-control{
    border-radius: 0;
    height: 46px;
}
.add_stock_modal .save_submit_btn{
    margin-top: 15px;
    margin-bottom: 0px;
}
.add_stock_modal .alert{
        margin-top: 12px;
        text-align: center;
        display: none;
}
.error{border: 1px solid red;}

.box-selects h3 {
    position: absolute;
    top: 223px !important;
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
<!-- Add Stock Modal Start-->
<div id="add_stock_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content add_stock_modal">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Stock</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="" id="add_stcok_form">
            <div class="form-group">
                <label >Stock Name</label>
                <select class="form-control stock_name" name="stock_name">
                    <option value="">Select Stock Name</option>
                    <?php foreach($all_stock_lists as $stock_list): ?>
                        <option value="<?php echo $stock_list->id; ?>"><?php echo $stock_list->stock_name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label >Stock Type</label>
                <select class="form-control stock_type" name="stock_type">
                    <option value="">Select Stock Type</option>
                    <option value="LIMITED">LIMITED</option>
                    <option value="MARKET">MARKET</option>
                    <option value="STOP">STOP</option>
                </select>
            </div>
            <div class="finish-btn save_submit_btn">
            <input type="submit" name="" value="Save" id="add_stock_btn">
            </div> 
            <div class="alert alert-success add-stock-success-div">
               Stcok Added Successfully
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!--Add Stock Modal End-->


<!-- Show Stock Info Modal Start-->
<div id="show_stock_info_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content add_stock_modal">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Stock Info</h4>
      </div>
      <div class="modal-body">
        <p class="info-data">Stock Info</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!--Show Stock Info Modal End-->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js "></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/bootstrap.min.js "></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/amimation-menu-sidebar.js "></script>
    <!--script src="<?php echo base_url('assets/users'); ?>/js/stock.js "></script-->
    <script src="<?php echo base_url('assets/users'); ?>/js/valuebox-singal-chart.js "></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/data-display-up-bleow.js "></script>
    
<script>
ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "b55b025e438fa8a98e32482b5f768ff5"]; // window.onload event for Javascript to run after HTML
// because this Javascript is injected into the document head
window.addEventListener('load', () => {
    // Javascript code to execute after DOM content

    // full ZingChart schema can be found here:
    // https://www.zingchart.com/docs/api/json-configuration/
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
    let myDashboard = {
        /* Graphset array */
        graphset: [{
                /* Object containing chart data */
                type: 'line',
                /* Size your chart using height/width attributes */
                height: '200px',
                width: '50%',
                /* Position your chart using x/y attributes */
                x: '15%',
                y: '5%',
                series: [{
                        values: [76, 23, 15, 85, 13]
                    },
                    {
                        values: [36, 53, 65, 25, 45]
                    }
                ]
            },
            {
                /* Object containing chart data */
                type: 'line',
                height: '55%',
                width: '90%',
                x: '5%',
                y: '200px',
                series: chartData
            },
        ]
    };


    // render chart with width and height to
    // fill the parent container CSS dimensions
    zingchart.render({
        id: 'myChart4th',
        data: myDashboard,
        height: '100%',
        width: '100%',
    });
});
</script>
<script type="text/javascript">
    $(document).ready(function(){
         $('.box-select1').click(function(){
            $('.percentage-filter-boxs1').toggle();
            $('.box-1').toggleClass('col-md-9 col-sm-9 col-md-11 col-sm-11');
            $('.selectox1').toggleClass('col-md-3 col-sm-3 col-md-1 col-sm-1');
        });


         $('.box-select2').click(function(){
            $('.percentage-filter-boxs2').toggle();
            $('.box-2').toggleClass('col-md-9 col-sm-9 col-md-11 col-sm-11');
            $('.selectox2').toggleClass('col-md-3 col-sm-3 col-md-1 col-sm-1');
        });


         $('#step-details-id-1-1').click(function(){
            $('.stock-details-step-1').fadeOut(1);
            $('.stock-details-step-2').fadeIn(1);
            $('.stock-details-step-3').fadeOut(1);
            $('.stock-details-step-4').fadeOut(1);
            });
         $('#step-details-id-2-1').click(function(){
            $('.stock-details-step-1').fadeIn(1);
            $('.stock-details-step-2').fadeOut(1);
            $('.stock-details-step-3').fadeOut(1);
            $('.stock-details-step-4').fadeOut(1);
            });
         $('#step-details-id-1-2').click(function(){
            $('.stock-details-step-1').fadeOut(1);
            $('.stock-details-step-2').fadeOut(1);
            $('.stock-details-step-3').fadeIn(1);
            $('.stock-details-step-4').fadeOut(1);
         });
         $('#step-details-id-2-2').click(function(){
            $('.stock-details-step-1').fadeOut(1);
            $('.stock-details-step-2').fadeOut(1);
            $('.stock-details-step-3').fadeIn(1);
            $('.stock-details-step-4').fadeOut(1);
         });

         $('#step-details-id-3-2').click(function(){
            $('.stock-details-step-1').fadeOut(1);
            $('.stock-details-step-2').fadeIn(1);
            $('.stock-details-step-3').fadeOut(1);
            $('.stock-details-step-4').fadeOut(1);
            });
         $('#step-details-id-3-1').click(function(){
            $('.stock-details-step-1').fadeIn(1);
            $('.stock-details-step-2').fadeOut(1);
            $('.stock-details-step-3').fadeOut(1);
            $('.stock-details-step-4').fadeOut(1);
         });
         $('#step-details-id-3-3').click(function(){
            $('.stock-details-step-1').fadeOut(1);
            $('.stock-details-step-2').fadeOut(1);
            $('.stock-details-step-3').fadeOut(1);
            $('.stock-details-step-4').fadeIn(1);
         });

         $('#step-details-id-4-3').click(function(){
            $('.stock-details-step-1').fadeOut(1);
            $('.stock-details-step-2').fadeOut(1);
            $('.stock-details-step-3').fadeIn(1);
            $('.stock-details-step-4').fadeOut(1);
         });
          $('#step-details-id-1-3').click(function(){
            $('.stock-details-step-1').fadeOut();
            $('.stock-details-step-2').fadeOut(1);
            $('.stock-details-step-3').fadeOut(1);
            $('.stock-details-step-4').fadeIn(1);
         });
          //
          $('#step-details-id-4-1').click(function(){
            $('.stock-details-step-1').fadeIn(1);
            $('.stock-details-step-2').fadeOut(1);
            $('.stock-details-step-3').fadeOut(1);
            $('.stock-details-step-4').fadeOut(1);
         });

          $('#step-details-id-4-2').click(function(){
            $('.stock-details-step-1').fadeOut(1);
            $('.stock-details-step-2').fadeIn(1);
            $('.stock-details-step-3').fadeOut(1);
            $('.stock-details-step-4').fadeOut(1);
         });

          $('#step-details-id-2-3').click(function(){
            $('.stock-details-step-1').fadeOut(1);
            $('.stock-details-step-2').fadeOut(1);
            $('.stock-details-step-3').fadeOut(1);
            $('.stock-details-step-4').fadeIn(1);
         });
    })
</script>
</body>
</html>