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
    <style type="text/css">
         #myChart-5s1 #myChart-5s1-license{display: none;}
        ul.balancesheettest li.active{color: #053852;}
        .stock-bg, .bg-box-prt{
        min-height: 620px;
        }

        .confirm-selec {
        margin-top: 0px;
       margin-bottom: 25px;
           min-height: 104px;
   }

     .stock-protfolo {
         height: 390px;
         display: flex;
     }


.simulations-data-info p {
    text-align: center;
    padding: 240px 0px 50px 0px;
    font-size: 25px;
    font-weight: 500;
    color: #063853;
}

 

         .list-pagenations{
          margin-bottom: 0px;
          height: 41px;
              position: relative;
            z-index: 99999;
         }

         .total-views {
          margin-top: 25px;}
          .total-views ul li {
                width: 230px !important;
                text-transform: uppercase;
            }

         .box-2 {
         height: 417px;
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

.percentage-filter-boxs1 ul {
/*margin-right: 90px;*/
}
ul.balancesheettest li.active {
    color: #ffffff;
    background-color: #063853;
}
.stock-bg .line-persantage-boxs {
    margin-top: 52px;
}

   .numberOfStockEnter {
    width: 75%;
    float: left;
    margin: 0px 9px 0px 0px;
}

.list-pagenations ul{
        margin-top: 30px;
}

    </style>

</head>
<body>
    <div id="throbber" style="display:none; min-height:120px;"></div>
    <div id="noty-holder"></div>
    <div id="wrapper">
        <?php 
            $this->load->view('page/include/sidebar'); 
               if($this->uri->segment(4))
                {
                    $page = ($this->uri->segment(4)) ;
                }
                else
                {
                    $page = 1;
                }
        ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row" id="main">
                    <div class="col-sm-12 col-md-12 well" id="content">
                        <div class="bradcrum-list">
                            <ul>
                                <li>Stock</li>
                            </ul>
                        </div>
                    </div>
                    <!-- TradingView Widget BEGIN -->
                    <?php // echo "<pre>"; print_r($stocks); ?>
                    <div class="loader-image" style="display: none;"><img src="<?php echo base_url('assets/users/images/loading.gif') ?>"></div>
                    <div class="col-md-12 col-sm-12 user-added-stock-list">
                        <div class="bg-box-prt">
                            <div class="col-md-11 col-sm-11 box-1">
                                <div class="stock-protfolo">
                                    <table style="" id="filter_option_stock_table">                                        
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th>Company</th>
                                            <th>No. Of Stock</th>
                                            <th>Price</th>
                                            <!-- <th>Order Type</th> -->
                                            <th>VOLATILITY (Yearly)</th>
                                            <th></th>
                                            <th></th>
                                        </tr>                                    
                                        <?php 
                                            $total = 0;  $inc = 1; foreach($stocks as $stock): 
                                            $total+=($stock['number']*$stock['price']);

                                        ?>
                                        <tr>
                                            <td class="hide-row"><i style="cursor: pointer;" dataid="<?php echo $stock['id'] ?>" class="fa fa-minus delete-user-stock" onclick="confirmDelete('<?php echo $stock['id'] ?>')" aria-hidden="true"></i></td>
                                            <td style="cursor: pointer;" class="esqmation" dataid="<?php echo $stock['id'] ?>"><i class="fa fa-info" aria-hidden="true"></i></td>
                                            <td><a href="<?php echo base_url('users/portfolio/details_stock_portfolio/'.base64_encode(base64_encode($stock['id'])).'/'.base64_encode(base64_encode($stock['stock_id']))) ?>"><?php echo $stock['stock_name'] ?></a></td>
                                            <td><?php echo $stock['number']; ?></td>
                                            <td><?php echo $stock['price']; ?></td>
                                            <!--td>
                                                <select class="form-control" style="width: 60%;">
                                                    <?php  $orderTypeArray = array('Market','Limited','Stop'); ?>
                                                    <option value="">Select</option>
                                                    <?php foreach($orderTypeArray as $ota){ ?>
                                                    <option value="<?php echo $ota; ?>" <?php if($ota==$stock['order_type']){echo 'selected'; } ?> ><?php echo $ota; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td-->
                                            <!-- <td><?php echo $stock['order_type']; ?></td> -->
                                            <td><?php echo number_format($stock['volatility']*sqrt(252),2,".","")."%"; ?></td>
                                            
                                            <!-- <td><span class="rate-point-01">4.70</span></td>
                                            <td><span class="rate-point-02">4.75</span></td> -->
                                        </tr>
                                        <?php 
                                        $inc++; endforeach; 
                                        ?>

                                        <tr>
                                            <td class="show-row" data-toggle="modal" data-target="#add_stock_modal" style="cursor: pointer;"><i class="fa fa-plus" aria-hidden="true"></i>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-1 col-sm-1 selectox1">
                                <div class="box-partchanel">
                                    <!-- <div class="box-selects box-select1">
                                        <h3>SELECT</h3>
                                    </div> -->
                                    <div class="line-persantage-boxs percentage-filter-boxs1" style="">
                                        <ul class="balancesheettest">
                                            <li data-id="volatility" class="active">volatility</li>
                                            <li data-id="Beta">Beta</li>
                                            <li data-id="Dividend">Dividend </li>
                                            <!-- <li data-id="Median Price">Median Price</li>
                                            <li data-id="Simple Average">Simple Average</li>
                                            <li data-id="EXp. Avergare">EXp. Avergare</li>
                                            <li data-id="Geometric Average">Geometric Average</li>
                                            <li data-id="-2 STD DEV">-2 STD DEV</li>
                                            <li data-id="+ STD DEV">+ STD DEV</li>
                                            <li data-id="1% Percentile">1% Percentile</li>
                                            <li data-id="99% Percentile">99% Percentile</li> -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 ">
                                <div class="list-pagenations">
                                <ul class="tsc_pagination">
                                <!-- Show pagination links -->
                                <?php foreach ($links as $link) {
                                echo "<li>". $link."</li>";
                                } ?>
                                </ul>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="total-views">
                                    <ul>
                                        <li>My Portfolio</li>
                                        <li><?php echo $totalPortfolio; ?></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="resume-document">
                                    <ul>
                                        <li><a class="r" href="JavaScript:void(0)">R</a></li>
                                        <li  id="go-from-stock-to-simulation"><a href="JavaScript:void(0)">S</a></li>
                                    </ul>
                                    <h5>Resume</h5>
                                </div>
                            </div>
                            <!--div class="col-md-6 col-sm-6 back">
                                <h5><a href="#">Back</a></h5> 
                            </div>
                            <div class="col-md-6 col-sm-6 continur-prt">
                                <h5><a href="#">Continue</a></h5> 
                            </div-->
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 variable-chart-simulation" style="display: none;">
                        <div class="stock-bg">
                            <?php if($checkActualStockId!=""){ ?>
                            <div class="chooseSelection">
                                <div class="col-md-2">
                                    <select class="form-control chhoseSimulationSelection">
                                        <option value="1">1 Month</option>
                                        <option value="12">3 Months</option>
                                        <option value="24">6 Months</option>
                                        <option value="48">1 Year</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <span><input type="text" name="" required value="<?php echo $numberOfStock; ?>" class="form-control numberOfStockEnter"></span><span style="display: block;margin-top: 8px;">Stocks</span>
                                </div>
                                <div class="col-md-2">
                                   <button class="btn btn-success changeMonthOptionBtn">Submit</button>
                                </div>
                            </div>
                            <div class="col-md-10 col-sm-10 "><!-- box-2 -->                                
                                <div class="topgraph">
                                    <div class="numberOfSimulationDiv">
                                        <p>Number Of Simulations: <span class="nofsimultionptag"><?php echo number_format($numberOfSimulation); ?></span></p>
                                    </div>
                                    <div id='myChart-5s1' style="width: 100%;height: 100%;">
                                        <a class="zc-ref" href="#"></a>
                                    </div>
                                </div>
                                <div class="sectionNumberOfsimulation">
                                    <div class="numberOpertion">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="numberLabel">Number of Stocks</div>
                                                        <div class="numberLabel operation">Operation Costs</div>
                                                    </td>
                                                    <td class="">
                                                        <div class="labelVelue"><input type="text" id="numberOfStock" placeholder="1000" readonly value="<?php echo number_format($numberOfStock); ?>"></div>
                                                        <div class="labelVelue operation costsBgcolor"> <input type="text" placeholder="11102" id="operationCost" readonly value="<?php echo number_format($operationCost); ?>"></div>
                                                    </td>
                                                    <td class="overallpercentage">
                                                        <div class="percentbg"><h2 id="overallProfitPercent"><?php echo $overallProfitPercent; ?>%</h2></div>
                                                        <div class="percentbgtwo"><span  class="leftsiepercent" id="lossRatio"><?php echo number_format($lossRatio); ?></span><span class="rightsiepercent" id="profitRatio"><?php echo number_format($profitRatio); ?></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <div class="lossAndprofi">
                                            <ul class="navbar-nav viewlospro">
                                                <li><a href="#!" class="activeOne" id="lossRatioPercentage"><?php echo $lossRatioPercentage; ?>%</a></li>
                                                <li><a href="#!">Loss</a></li>
                                                <li><a href="#!">profit</a></li>
                                                <li><a href="#!" class="activeTwo" id="profitRatioPercentage"><?php echo $profitRatioPercentage; ?>%</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="col-md-2 col-sm-2  selectox2">
                            <div class="box-partchanel ">
                                <!-- <div class="box-selects box-selects-confirmation  box-select2">
                                    <h3>SELECT</h3>
                                </div> -->
                                <div class="line-persantage-boxs  percentage-filter-boxs2" style="">
                                    <ul class="balancesheettest">
                                        <?php 
                                            $inc = 1;
                                            foreach($stocks as $stock){ 
                                        ?>
                                            <li class="<?php if($inc==1){echo 'active'; } ?>" dataid="<?php echo $stock['stock_id'] ?>"><?php echo $stock['stock_name'] ?></li>
                                        <?php $inc++; } ?>                                       
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php }  else { ?>
                            <div class="col-md-12 col-sm-12 "><!-- box-2 --> 
                                <div class="simulations-data-info">
                               <p> No Simulation Found</p>
                            </div>
                        </div>
                        <?php } ?>
                            <div class="col-md-12 col-sm-12 confirm-selec" style="visibility: hidden;">
                                <h4>CONFIRM SELECTION</h4>
                            </div>
                             <!--  <div class="col-md-12 col-sm-12 ">
                                <div class="total-views ">
                                    <ul>
                                        <li>Total</li>
                                        <li>5445</li>
                                    </ul>
                                </div>
                            </div> -->
                             <div class="col-md-12 col-sm-12 ">
                                <div class="resume-document ">
                                    <ul>
                                        <li id="back-from-simulation"><a href="JavaScript:void(0)">R</a></li>
                                        <li><a class="r" href="JavaScript:void(0)">S</a></li>
                                    </ul>
                                    <h5>Simulation</h5>
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
    .topgraph{
        width: 100%;
        float: left;
    }
    .sectionNumberOfsimulation{
        width: 100%;
        float: left;
    }
    .numberOpertion table {
        width: 368px;
    }
    .numberOpertion .table>tbody>tr>td {
        padding: 8px 0px;
        border-top: none;
    }
    .overallpercentage{
        width: 300px;
    }
    .percentbg{
        width: 324px;
        background: #ed7d31;
        text-align: center;
        line-height: 24px;
        padding: 5px 0;
    }
    .percentbgtwo{
        width: 100%;
        background: #ed7d31;
        text-align: center;
        line-height: 18px;
        margin-top:20px;
        padding: 7px 10px;
        display: flow-root;
    }
    .overallLeftnumber{
        background: #e2efd9;
        font-size: 14px;
        color: #000;
        text-align: center;
        padding: 2px 0;
    }
    .secndColornumber{
        background: #fbe4d5;
        margin-top: 30px;
    }
    .ratiobgcolor{
        background: #fbe4d5;
        text-align: center;
        color: #000;
        padding: 2px 0px;
    }
    .ofStocks{
        width: 156px;
    }
    .ofStocks div{
        font-size: 17px;
        font-weight: 600;
        color: #000;
    }
    .ofStocks .OperationCosts{
        font-size: 17px;
        font-weight: 600;
        color: #000;
        margin-top: 30px;
    }
    .percentbgtwo span{
        font-size: 16px;
        font-weight: 600;
        color: #f00;
    }
    .percentbgtwo span.rightsiepercent{
        float: right;
        color: #000;
    }
    .percentbgtwo span.leftsiepercent{
        float: left;
    }
    .lossAndprofi {
        margin: 0 auto;
        display: table;
        margin-top: 40px;
    }
    .lossAndprofi .viewlospro {
        list-style: none;
    }
    ul.navbar-nav.viewlospro li{
        padding-right: 40px;
    }
    ul.navbar-nav.viewlospro li a {
        font-size: 16px;
        color: #000;
        font-weight: 600;
        padding: 5px 20px;
        text-align: right;
    }
    ul.navbar-nav.viewlospro li a.activeOne {
        background: #ff0000;
    }
    ul.navbar-nav.viewlospro li a.activeTwo {
        background: #a9d18d;
    }
    .numberLabel{
        width: 150px;
        font-weight: 600;
        line-height: 24px;
    }
    .labelVelue input{
        width: 120px;
        background: #e2efd9;
        color: #000;
        text-align: center;
        padding: 2.3px 0px;
        border: none;
    }
    .operation input{
        margin-top: 27px;
    }
    .costsBgcolor input{
        background: #fbe4d5;
    }
    .ratioSec {
        width: 304px;
        background: #fbe4d5;
        color: #000;
        text-align: center;
        padding: 2px 4px;
        display: flex;
        font-weight: 600;
        justify-content: space-between;
    }
    .greenErrow i{
        color: #60bd7a;
    }
    .numberLabel.operation {
        margin-top: 27px;
    }
    .labelVelue input:focus-visible {
        outline: none;
    }
  .numberOfSimulationDiv{
      position: absolute;
    top: 30px;
    right: 0;
    left: 0;
    z-index: 99;
    text-align: center;
  }  
</style>
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
                <input type="hidden" name="s_type" value="1">
                <select class="form-control stock_name" name="stock_name">
                    <option value="">Select Stock Name</option>
                    <?php foreach($all_stock_lists as $stock_list): ?>
                        <option value="<?php echo $stock_list->id; ?>"><?php echo $stock_list->stock_name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- <div class="form-group">
                <label >Stock Type</label>
                <select class="form-control stock_type" name="stock_type">
                    <option value="">Select Stock Type</option>
                    <?php  $orderTypeArray = array('Market','Limited','Stop'); foreach($orderTypeArray as $ota){ ?>
                    <option value="<?php echo $ota; ?>"><?php echo $ota; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" name="stock_price" class="form-control stockPerPrice">
            </div>
             -->
            <!-- <div class="form-group">
                <label>Number</label>
                <input type="text" name="number" class="form-control numberOfStock">
            </div> -->
            <div class="finish-btn save_submit_btn">
            <input type="submit" name="" value="Save" id="add_stock_btn">
            </div> 
            <div class="alert alert-success add-stock-success-div">
               Stock Added Successfully
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


<!-- Edit Stock Modal Start-->
<div id="edit_stock_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content add_stock_modal">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Stock</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="" id="edit_stcok_form">
            <input type="hidden" name="user_stock_id" class="user_stock_id">
            <div class="form-group">
                <label >Stock Name</label>
                <select class="form-control stock_name" name="stock_name" style="pointer-events: none;">
                    <option value="">Select Stock Name</option>
                    <?php foreach($admin_stock_lists as $stock_list): ?>
                        <option value="<?php echo $stock_list->id; ?>"><?php echo $stock_list->stock_name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label >Stock Type</label>
                <select class="form-control stock_type" name="stock_type">
                    <option value="">Select Stock Type</option>
                    <?php  $orderTypeArray = array('Market','Limited','Stop'); foreach($orderTypeArray as $ota){ ?>
                    <option value="<?php echo $ota; ?>"><?php echo $ota; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" name="stock_price" class="form-control stockPerPrice">
            </div>
            <div class="form-group">
                <label>Number</label>
                <input type="text" name="number" class="form-control numberOfStock">
            </div>
            <div class="finish-btn save_submit_btn">
            <input type="submit" name="" value="Save" id="update_stock_btn">
            </div> 
            <div class="alert alert-success update-stock-success-div">
               Stock Updated Successfully
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!--Edit Stock Modal End-->


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
<script src="<?php echo base_url('assets/users'); ?>/js/jquery.base64.js "></script>
<script src="<?php echo base_url('assets/users'); ?>/js/bootstrap.min.js "></script>
<script src="<?php echo base_url('assets/users'); ?>/js/amimation-menu-sidebar.js "></script>
<!-- <script type="text/javascript" src="<?php echo base_url('assets/users/js/sidebarmenu.js'); ?>"></script> -->
<script src="<?php echo base_url('assets/users'); ?>/js/common.js"></script>

<?php include('includes/stock-portfolio-custom.php'); ?>
<script type="text/javascript">
    $(document).ready(function(){
      $('.percentage-filter-boxs1 .balancesheettest li').click(function(){
            $('.percentage-filter-boxs1 .balancesheettest li').removeClass("active");
            $(this).addClass("active");
        });
        //
        $('.percentage-filter-boxs2 .balancesheettest li').click(function(){
            $('.percentage-filter-boxs2 .balancesheettest li').removeClass("active");
            $(this).addClass("active");  
            var stock_id = $(this).attr('dataid');        
            var selectedOption = $('.chhoseSimulationSelection option:selected').val();
            var numberOfStock = $('.numberOfStockEnter').val();  
            getSimulationOverAllLossProfitPercentage(stock_id,selectedOption,numberOfStock);
            
        });
    });
    $(document).on('click','.changeMonthOptionBtn',function(){
        var selectedOption = $('.chhoseSimulationSelection option:selected').val();
        var stock_id =  $('.percentage-filter-boxs2 .balancesheettest .active').attr("dataid");
        var numberOfStock = $('.numberOfStockEnter').val(); 
        if(numberOfStock=="")
        {
            $('.numberOfStockEnter').css('border','1px solid red');
            return false;
        }
        else
        {
            $('.numberOfStockEnter').css('border','');
        }
        if(numberOfStock<1)
        {
            $('.numberOfStockEnter').css('border','1px solid red');
            return false;
        }
        else
        {
            $('.numberOfStockEnter').css('border','');
        }
        getSimulationOverAllLossProfitPercentage(stock_id,selectedOption,numberOfStock);
    });
    /*function getSimulationChartDataAjax(stock_id,parameter,numberOfStock)
    {
        var url = "<?php echo base_url("users/portfolio/getSimulationFiterAjaxRecord"); ?>"+"?stock_id="+stock_id+"&parameter="+parameter+"&numberOfStock="+numberOfStock;
        zingchart.exec('myChart-5s1', 'reload');
        let output = zingchart.exec('myChart-5s1', 'load', {
                        dataurl: url
                      });
    }*/
    function getSimulationOverAllLossProfitPercentage(stock_id,parameter,numberOfStock)
    {
        //getSimulationChartDataAjax(stock_id,parameter,numberOfStock);
        $.ajax({
          url:'<?php echo base_url("users/portfolio/getSimulationOverAllLossProfitPercentage"); ?>',
          method:'POST',
          data:{stock_id:stock_id,parameter:parameter,numberOfStock:numberOfStock,type:0},
          dataType:'html',
          success:function(data)
          { 
            
            var res = JSON.parse(data);
            console.log(data);
            if(parseFloat(res['overallProfitPercent'])<75)
            {
              getSimulationOverAllLossProfitPercentage(stock_id,parameter,numberOfStock);  
            }
            var graphs = res['graphs'];
            //console.log(graphs);
            renderSimulationChart(graphs)
            $('#overallProfitPercent').html(res['overallProfitPercent']+'%');
            $('#lossRatio').html(res['lossRatio']);
            $('#profitRatio').html(res['profitRatio']);
            $('#lossRatioPercentage').html(res['lossRatioPercentage']+'%');
            $('#profitRatioPercentage').html(res['profitRatioPercentage']+'%');
            $('#numberOfStock').val(res['numberOfStock']);
            $('#operationCost').val(res['operationCost']);
            $('.nofsimultionptag').html(res['numberOfSimulation']);
          }

      });
    }
    function keypressNumber(th,e)
      {
        var str=$(th).val();    
        if(e.charCode>=48&&e.charCode<=57)
        {
          return true;
        }
        else
        {
          return false;
        }
      }

(function($) {
  $.fn.inputFilter = function(inputFilter) {
    return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      } else {
        this.value = "";
      }
    });
  };
}(jQuery));


// Install input filters.
$(".numberOfStock,.numberOfStockEnter").inputFilter(function(value) {
  return /^-?\d*$/.test(value); });

/*$("#customerPO").inputFilter(function(value) {
  return /^-?\d*$/.test(value); });*/

$(".stockPerPrice").inputFilter(function(value) {
  return /^-?\d*[.,]?\d{0,2}$/.test(value); });



/*let chartConfigSimulations = {
      "type":"bar",
      "plot": {
        "styles": [<?php echo $colors; ?>]
      },
      "scale-x":{
        "labels":[<?php echo $xLabel; ?>],
        "item":{  
            "font-size":"12px",  
            "font-color":"#063853",  
            "font-weight":600,  
        }
      },
      "series":[
        {
          "values": [<?php echo $yValues; ?>],
        },
        
      ]
    };
    zingchart.render({
      id: 'myChart-5s1',
      data: chartConfigSimulations,
      height: '390px',
      width: '100%',
    });*/

    renderSimulationChart(<?php echo $graphs; ?>);
    function renderSimulationChart(graphs)
    {
        console.log(graphs);
       let chartConfigSimulations =  graphs;
        zingchart.render({
          id: 'myChart-5s1',
          data: chartConfigSimulations,
          height: '390px',
          width: '100%',
        });
    }

</script>
</body>
</html>