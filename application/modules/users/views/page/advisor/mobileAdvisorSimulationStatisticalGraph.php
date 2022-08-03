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
    <!-- Font Awesome core CSS -->
    <link href="<?php echo base_url('assets/users'); ?>/css/font-awesome.min.css" rel="stylesheet">
    <!-- Dashbord CSS -->
    <link href="<?php echo base_url('assets/users'); ?>/css/dashbord.css" rel="stylesheet">
    <!-- Responsive CSS -->
    <link href="<?php echo base_url('assets/users'); ?>/css/responsive.css" rel="stylesheet">
    <!-- Animate CSS -->
    <link href="<?php echo base_url('assets/users'); ?>/css/main-custom.css" rel="stylesheet">
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <style type="text/css">
#myChart-6s #myChart-6s-license-text,#myChart4th #myChart4th-license-text{display: none;}
.perstange-prt-text {
    
    color: #000000;
    font-size: 14px;
    font-weight: 500;
    text-transform: capitalize;
}

.perstange-prt-text h2 {
    font-size: 16px;
    text-transform: uppercase;
}

.perstange-prt-text h3 {
    font-size: 14px;
    margin-bottom: 0px;
    line-height: 2px;
}

.perstange-prt-text h5 {
    color: #000000;
    font-size: 14px;
    font-weight: 400;
    text-transform: capitalize;
    margin-top: 32px;
    margin-bottom: 5px;
}
#myChart {
  width:100%;
  height:100%;
  min-height:400px;
}
#myChart-license-text{display: none;}
.slidecontainer {
  width: 100%;
}
.slidecontainer {
  width: 100%;
}
.slider:hover {
  opacity: 1;
}

.slider::-webkit-slider-thumb {
  width: 23px;
  height: 24px;
  border: 0;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 23px;
  height: 24px;
  border: 0;
  cursor: pointer;
}

.btn-group.btn-toggle {
    float: right;
   margin: 21px -9px 14px 0px;}

.btn-text-area h5 {
    font-weight: 600;
    color: #08384f;
    margin-top: 35px;
    text-align: right;
    margin-right: -50px;
}


.slider {
    -webkit-appearance: media-sliderthumb !important;
    width: 100%;
    height: 16px;
    border-radius: 16px;
    background: #08384f;
    outline: none;
    opacity: inherit;
    -webkit-transition: .2s;
    transition: opacity .2s;
}


.monthly-income-text h3 {
    font-size: 17px;
    margin: 15px 0px -7px 0px;
}

.monthly-income-text h3 span {
    display: block;
    float: right;
    margin-right: 130px;
}

/*-----

According Css Here
----------*/
.panel-title {
    margin-top: 0;
    margin-bottom: 0;
    font-size: 15px;
    color: inherit;
    padding: 10px;
    /* background-color: #337ab7; */
    color: #337ab7;
    font-weight: 500;
}
.client-profile-tab .panel-body{
    box-shadow: none;
}

.glyphicon{
    font-size: 11px;
}

.panel-default>.panel-heading {
    color: #337ab7;
    background-color: #f5f5f5;
    border: none;
    background: none;
}



.client-profile-tab .panel{
    margin-bottom: -6px;
}

.box-click-crical{}

.box-click-crical ul{
    padding: 0px;
        text-align: center;
}


.box-click-crical ul li {
        display: inline-block;
        margin-right: 19px; }
   


.box-click-crical ul li a{}

.box-click-crical ul li a i {
        width: 32px;
        height: 32px;
        border: 2px solid #063853;
        border-radius: 50%;
        text-align: center;
        color: #063853;
        font-size: 16px;
        line-height: 29px;
        font-weight: 100;
    }

.box-click-crical ul li span{
    height: 32px;
    width: 32px;
    background-color: #063853;
    display: block;
    position: relative;
    top: 13px;}
/*model popup*/

.head-bg-color{
    background: #063853;
}
.head-bg-color h4 {
    color: #fff;
    font-size: 20px;
    text-align: center;
}
.close-x{
    color: #fff;
    opacity: 2;
}
.border-top-0{
    border-top: none;
}

.btn-save-info{
        color: #08384f;
        background-color: #ffffff;
        border-color: #eee;
        padding: 13px;
        font-size: 14px;
        font-weight: 500;
        border-radius: 0px;
        margin-top: 15px;
}
.stock-bg
{
    box-shadow: none;
}

.review-btn {
margin: 0px 18px 0px -10px;
}

/**************25-04-2020*****************/
.resume-document {
    text-align: center;
    margin-top: 25px;
}

.client-profile-tab .panel-body {
    box-shadow: none;
    height: auto;
    overflow: hidden;
    margin-bottom: 0;
}
p.risk-ratio-risk-profile span {
    float: right;
    margin-right: 15px;
}
</style>
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
        width: 215px;
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
        width: 112px;
        font-weight: 600;
        line-height: 24px;
        font-size: 12px;
    }
    .labelVelue input{
        width: 101px;
        background: #e2efd9;
        color: #000;
        text-align: center;
        padding: 2.3px 0px;
        border: none;
    }
     .labelVelue input::placeholder{
        font-size: 13px;
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

  /* statistical analysis css */
.blance-sheet-info .stock-bg .box-selects h3 {
    display: none;
}
.line-persantage-boxs ul {
    padding: 0px;
}
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
}
ul.balancesheettest li.active {
    color: #ffffff;
    background-color: #063853;
}

/*price showing*/
.static-analysis-parameter{

                            min-height: 139px;

                        }

                        .price-static-analysis-info ul li {

                        width: 30%;

                        display: inline-block;

                        list-style: none;

                        font-size: 16px;

                        font-weight: 900;

                        color: #020202;

                        position: relative;

                        margin-left: 24px;

                        }



                        .price-static-analysis-info ul li:nth-child(1):after {

                        position: absolute;

                        width: 22px;

                        height: 4px;

                        background-color: #1ea2fb;

                        left: 0;

                        content: "";

                        top: 10px;

                        left: -31px;

                        }



                        .price-static-analysis-info ul li:nth-child(2):after {

                        position: absolute;

                        width: 22px;

                        height: 4px;

                        background-color: #64d641;

                        left: 0;

                        content: "";

                        top: 10px;

                        left: -31px;

                        }



                          .price-static-analysis-info ul li:nth-child(3):after {

                        position: absolute;

                        width: 22px;

                        height: 4px;

                        background-color: #f9ba26;

                        left: 0;

                        content: "";

                        top: 10px;

                        left: -31px;

                        }





                        .price-static-analysis-info ul li:nth-child(4):after {

                        position: absolute;

                        width: 22px;

                        height: 4px;

                        background-color: #f92e1f;

                        left: 0;

                        content: "";

                        top: 10px;

                        left: -31px;

                        }





                        .price-static-analysis-info ul li:nth-child(5):after {

                        position: absolute;

                        width: 22px;

                        height: 4px;

                        background-color: #c64786;

                        left: 0;

                        content: "";

                        top: 10px;

                        left: -31px;

                        }



                        .price-static-analysis-info ul li:nth-child(6):after {

                        position: absolute;

                        width: 22px;

                        height: 4px;

                        background-color: #5d5c5d;

                        left: 0;

                        content: "";

                        top: 10px;

                        left: -31px;

                        }

                        .price-static-analysis-info ul li:nth-child(7):after {

                        position: absolute;

                        width: 22px;

                        height: 4px;

                        background-color: #0000ff;

                        left: 0;

                        content: "";

                        top: 10px;

                        left: -31px;

                        }

                        .price-static-analysis-info ul li:nth-child(8):after {

                        position: absolute;

                        width: 22px;

                        height: 4px;

                        background-color: #cc99ff;

                        left: 0;

                        content: "";

                        top: 10px;

                        left: -31px;

                        }

                        .price-static-analysis-info ul li input[type="text"]{

                            border-radius: 0px;

                            border: 1px solid #ccc;

                            font-size: 14px;

                            font-weight: 500;

                            width: 30%;

                            float: right;

                            margin-right: 193px;

                            height: 31px;

                            outline: none;



                        }

                    



                    .price-static-analysis-info ul li span {

                        float: left;

                        position: absolute;

                        top: -20%;

                        left: 100px;

                    }

                   

                   .price-static-analysis-info ul li span {

                    float: left;

                    position: absolute;

                    top: 2%;

                    left: 190px;

                   }



                .price-static-analysis-info {

                width: 66%;

                display: inline-block;

               

                padding: 18px 0px 10px 0px;

            }

            .price-static-analysis-info .btnchangePeriod{

                left: 206px;

                position: absolute;

                top: 1px;

                background-color: #08384f;

                border: none;

                color: #fff;

                padding: 6px 15px;

                font-size: 14px;

                border-radius: 4px;

                transition: all 0.4s ease;

                outline: none;



            }



            .static-analysis-date-range-picker{

                display: inline-block;

            }

            #page-wrapper {
                padding: 8px 0px;
            }

            @media only screen and (max-width: 768px) {
    #page-wrapper {
        /*margin-top: 20px;*/
       }
.stock-bg {
    background-color: #fff;
    padding:15px 10px;
    margin-bottom: 0px;
}
    .box-partchanel {
        width: 100%;
       }
    .stock-bg .line-persantage-boxs {
        margin-top: 52px;
        width: 100%;
       }
    .line-persantage-boxs ul {
            width: 100%;
       }
    .line-persantage-boxs ul li {
            width: 100%;
       }
    button.btn.btn-success.changeMonthOptionBtn {
        width: 100%;
        margin-top: 7px;
       }

        .percentbg {
        width: 100%;
    }
    .numberOpertion .table>tbody>tr>td {
        padding: 8px 0px;
        border-top: none;
        display: inline-block;
    }
    .lossAndprofi .viewlospro {
        list-style: none;
        width: 100%;
        display: flex;
        justify-content: space-between;
        padding: 0;
        margin: 7.5px 0;
    }
    ul.navbar-nav.viewlospro li {
        padding-right: 0px;
    }
    .lossAndprofi {
        margin: 0 auto;
        display: block !important;
        margin-top: 40px;
    }
    .line-persantage-boxs ul {
        width: 100%;
        padding: 0;
    }
    .stock-bg .line-persantage-boxs {
        margin-top: 30px;
        width: 100%;
    }
    .numberOpertion table {
        width: 100%;
    }
    .numberOpertion .table>tbody>tr>td.stockNumber{
        width: 49%;
    }
    .stockNumber .labelVelue input {
        width: 100%;
    }
    td.overallpercentage {
        width: 100%;
    }
    .container-fluid{
        padding: 0;
    }
    .row{
        margin: 0;
    }
    .percentbgtwo span {
        color: #fff;
    }
    .numberOfStockEnter {
    width: 75%;
    float: left;
    margin: 0px 9px 0px 0px;
}
.line-persantage-boxs {
    display: inline-block;
    margin-top: 52px;
    width: 100%;
}
form.rf_rv_money_risk_form {
    width: 100%;
}
}

 @media only screen and (max-width: 600px) {
    .line-persantage-boxs {
        display: inline-block;
        margin-top: 12px;
        width: 100%;
    }
 }
 @media only screen and (max-width: 480px) {
  ul.navbar-nav.viewlospro li a {
    font-size: 14px;
    padding: 5px 10px;
}
.price-static-analysis-info {
    width: 45%;
    display: inline-block;
    padding: 18px 0px 10px 0px;
}
.price-static-analysis-info ul {
    padding-left: 20px;
}
.price-static-analysis-info ul li {
    width: 100%;
    display: inline-block;
    list-style: none;
    font-size: 10px;
    font-weight: 900;
    color: #020202;
    position: relative;
    margin-left: 10px;
    line-height: 22px;
}
.price-static-analysis-info .btnchangePeriod {
    left: 206px;
    position: absolute;
    top: 0px;
    padding: 4px 15px;
    font-size: 14px;
}
}
</style>
</head>

<body>
    <div>
       <!-- Navigation -->
        <?php 
            //$this->load->view('page/include/sidebar'); 
        ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row" id="main">
                    <div class="client-profile-tab">
                        <div class="panel panel-primary">
                            <div class="panel-heading"> 
                            </div>
                            <div class="panel-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab1">                                   
                                    <div class="col-md-8 col-sm-8" style="margin: 0;padding:0;">
                                        <div class="loader-image" style="display: none;"><img src="<?php echo base_url('assets/users/images/loading.gif') ?>"></div>
                                        <div class="col-col-md-12 col-sm-12 stock-details-step-1" style="margin: 0;padding: 0;">
                                            <div class="stock-bg ">
                                                <div class="col-md-12 col-sm-12 box-2" style="margin:0;padding: 0;">
                                                    <div class="row chooseSelection">
                                                        <div class="col-md-3">
                                                            <select class="form-control chhoseSimulationSelection">
                                                                <option value="1">1 Month</option>
                                                                <option value="12">3 Months</option>
                                                                <option value="24">6 Months</option>
                                                                <option value="48">1 Year</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <span><input type="text" name="" required value="<?php echo $numberOfStock; ?>" class="form-control numberOfStockEnter"></span>
                                                            <span style="display: block;margin-top: 8px;line-height: 31px;">Funds</span>
                                                        </div>
                                                       
                                                        <div class="col-md-2 ">
                                                           <button class="btn btn-success changeMonthOptionBtn">Submit</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 "><!-- box-2 -->                                
                                                        <div class="topgraph">
                                                            <div class="numberOfSimulationDiv">
                                                                <p>Number Of Simulations: <span class="nofsimultionptag"><?php echo number_format($numberOfSimulation); ?></span></p>
                                                            </div>
                                                            <div id='myChart-6s'></div>
                                                        </div>
                                                        <div class="sectionNumberOfsimulation">
                                                            <div class="numberOpertion">
                                                                <table class="table">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="stockNumber">
                                                                                <div class="numberLabel">Number of Stocks</div>
                                                                                <div class="numberLabel operation">Operation Costs</div>
                                                                            </td>
                                                                            <td class="stockNumber">
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
                                                    
                                                </div>
                                                   <div class="col-md-12 col-sm-12 ">
                                                            <div class="resume-document ">
                                                                <ul>
                                                                    <li><a class="r" href="javascript:void(0)">G</a></li>
                                                                    <li  id="step-details-id-1-3"><a href="javascript:void(0)">A</a></li>
                                                                </ul>
                                                                <h5>Graph</h5>
                                                            </div>
                                                    </div>
                                                </div><!-- Stock-bg End -->
                                        </div> <!-- Col-md- 12 End -->
                                           

                                        <div class="col-md-12 col-sm-12 blance-sheet-info stock-details-step-4" style="display: none;margin: 0;padding: 0;">
                                            <div class="stock-bg ">
                                                <div class="static-analysis-parameter">
                                                    <div class="price-static-analysis-info">
                                                        <ul>
                                                            <li>Price</li>
                                                            <li><dfn style="font-style: normal;" class="changedOncalcultaionParam">Median Price</dfn><span><input type="text" class="emaclass" value="60"></span><button class="btnchangePeriod">Submit</button></li>
                                                            <li style="display: none;">-2 STD DEV</li>
                                                            <li style="display: none;">+2 STD DEV</li>
                                                            <li style="display: none;">-1 STD DEV</li>
                                                            <li style="display: none;">+1 STD DEV</li>
                                                            <li style="display: none;">99 PERCENTILE</li>
                                                            <li style="display: none;">1 PERCENTILE</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                             <div class="col-md-11 col-sm-11 box-2"  style="margin:0;padding: 0;">
                                              
                                               <div id='myChart4th'></div>
                                            
                                            </div><!-- End Col-Md-9-->     
                                                 <div class="col-md-12 col-sm-12 ">
                                                    <div class="resume-document ">
                                                        <ul>
                                                            <li id="step-details-id-4-1"><a href="javascript:void(0)">G</a></li>
                                                            <li><a class="r" href="javascript:void(0)">A</a></li>
                                                        </ul>
                                                        <h5>Analysis</h5>
                                                    </div>
                                                </div>

                                            </div><!-- Stock-bg End -->
                                        </div> <!-- Col-md- 12 End -->                                       
                                    </div>
                                       <div class="col-lg-4 col-md-12 col-sm-12 perstange-prt-text">
                                         <!--h2>Sugestions RV</h2-->
                                            <form method="post" class="rf_rv_money_risk_form">
                                              <div class="panel-group investmentFundList" id="accordion" role="tablist" aria-multiselectable="true">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="headingOne">
                                                            <h4 class="panel-title">
                                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" style="color: #098ff0;">
                                                                    <i class="more-less glyphicon glyphicon-plus"></i>
                                                                    Investments Funds 
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <style type="text/css">
                                                            .checkboxORpercent {
                                                                width: 100%;
                                                                display: inline-flex;
                                                                padding-bottom: 6px;
                                                            }
                                                            span.number_counter0 {
                                                                line-height: 27px;
                                                                padding-left: 34px;
                                                            }
                                                            .checkboxORpercent span input {
                                                                margin-right: 5px;
                                                                cursor: pointer;
                                                            }
                                                            .checktext{
                                                                cursor: pointer;
                                                            }
                                                            .checktext.active{
                                                                color: #01ae52;
                                                            }
                                                        </style>
                                                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                            <div class="panel-body investmentLists">
                                                                <?php 
                                                                $inc=1;
                                                                foreach($investment_ibex35 as $rvs) { ?>
                                                            <div class="checkboxORpercent">
                                                                <span>
                                                                  <span dataID="<?php echo $rvs->investments_id;  ?>" class="checktext <?php if($inc==1) {echo 'active'; } ?> ">
                                                                     <?php echo $rvs->fund_name; ?> 
                                                                  </span>
                                                                </span>
                                                                  <span class="number_counter0"><?=number_format($rvs->fund_commission,2,".","");?>%
                                                                  </span>
                                                              </div>
                                                              <?php $inc++; } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="line-persantage-boxs percentage-filter-boxs2" style="display:none;">
                                                <ul class="balancesheettest">
                                                    <span style="color: #555;" class="mseAverage">
                                                    <li class="active" data-id="medianave" id="1" onclick="changeGraphOnclickSideMenu()">Median Price</li>
                                                    <li data-id="simpleave" id="2" onclick="changeGraphOnclickSideMenu()">Simple Average</li>
                                                    <li data-id="expoave" id="3" onclick="changeGraphOnclickSideMenu()">EXp. Avergare</li>
                                                    <input type="hidden" value="1" class="stastical_analysis_param">
                                                    </span>
                                                    <span style="color: #555;" class="mseDeviation">
                                                    <span style="color: #555;" class="firstStandardDevivation">
                                                        <li class="medianDeviation simpleDeviation" onclick="changeGraphOnclickSideMenu()">1 STD DEV</li>
                                                        <input type="hidden" value="0" class="firstStandardDevivationHidden" >
                                                    </span>
                                                    <span style="color: #555;" class="secondStandardDevivation">
                                                        <li class="medianDeviation simpleDeviation" onclick="changeGraphOnclickSideMenu()">2 STD DEV</li>
                                                        <input type="hidden" value="0" class="secondStandardDevivationHidden" >
                                                    </span>
                                                    <span style="color: #555;" class="percentile99_1">
                                                        <li class="medianDeviation " onclick="changeGraphOnclickSideMenu()">Percentile - 1%,99%</li>
                                                        <input type="hidden" value="0" class="percentile99_1Hidden" >
                                                    </span>
                                                    </span>
                                                </ul>
                                            </div>
                                        </div>                                        
                                    </div>                                      
                                </div>
                            </div>
                        </div>
                    </div>
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
<script type="text/javascript">
    $(document).ready(function(){
          $('#step-details-id-1-3').click(function(){
            $('.stock-details-step-1').hide();
            $('.stock-details-step-4').show();
            $('.investmentFundList').hide();
            $('.line-persantage-boxs').show();

         });
          //
          $('#step-details-id-4-1').click(function(){
            $('.stock-details-step-1').show();
            $('.stock-details-step-4').hide();
            $('.investmentFundList').show();
            $('.line-persantage-boxs').hide();
         });

//graph




zingchart.bind('myChart-6s', 'contextmenu', function(p) {
  return false;
});
/*zingchart.render({ 
    id: 'myChart-6s', 
    data: chartConfigSimulation, 
    height: '400', 
    width: '100%' 
});*/    
});


/*
    Stastical analysis graphp
*/




$(document).on('click','#goToChatCallTab',function(){
    $('.client-profile-tab .nav li.active').removeClass('active');
    $('.client-profile-tab .nav li:nth-child(3)').addClass('active');
});

$(document).on('click','.checktext',function(){
    var investmentID = $(this).attr('dataID');
    //alert(investmentID);
    var selectedOption = $('.chhoseSimulationSelection option:selected').val();
    //alert(selectedOption);
    var numberOfStock = $('.numberOfStockEnter').val(); 
    //alert(numberOfStock);
    $('.checktext').removeClass('active');
    $(this).addClass('active'); 
    getSimulationOverAllLossProfitPercentage(investmentID,selectedOption,numberOfStock);
    //getStasticalAnalysisChartDataAjax(investmentID);
})


$(document).on('click','.checkInvestmentFunds',function(){
    var investmentID = $(this).attr('dataID');
    var client_id = "<?php echo base64_decode(base64_decode($this->uri->segment(3))); ?>";
    if($(this).is(":checked"))
    {
        //$('.ChkSelect').prop('checked', true);
        if(confirm("Are you sure to add this Fund for this client")==true)
        {
            $.ajax({
                url: '<?php echo base_url('users/advisor/add_remove_funds_byadvisor'); ?>',
                type: "POST",
                data:{client_id:client_id,investmentID:investmentID},
                success: function(data)
                { 
                    console.log(data);                   
                }
            });
        }
        else
        {
           $(this).prop('checked', false);
        }  
    }
    else
    {
        if(confirm("Are you sure to remove this Fund for this client")==true){
            $.ajax({
                url: '<?php echo base_url('users/advisor/add_remove_funds_byadvisor'); ?>',
                type: "POST",
                data:{client_id:client_id,investmentID:investmentID},
                success: function(data)
                { 
                    console.log(data);                   
                }
            });
        }
        else
        {
            $(this).prop('checked', true);
        }   
    }
})

renderSimulationChart(<?php echo $graphs; ?>);
function renderSimulationChart(graphs)
{
   let chartConfigSimulations =  graphs;
    zingchart.render({
      id: 'myChart-6s',
      data: chartConfigSimulations,
      height: '390px',
      width: '100%',
    });
}

function getSimulationOverAllLossProfitPercentage(stock_id,parameter,numberOfStock)
{
    $('.loader-image').show();
    $('body').addClass('loader');
    $.ajax({
      url:'<?php echo base_url("users/portfolio/getSimulationOverAllLossProfitPercentage"); ?>',
      method:'POST',
      data:{stock_id:stock_id,parameter:parameter,numberOfStock:numberOfStock,type:1},
      dataType:'html',
      success:function(data)
      { 
        var res = JSON.parse(data);
        if(parseFloat(res['overallProfitPercent'])<75)
        {
          getSimulationOverAllLossProfitPercentage(stock_id,parameter,numberOfStock);  
        }
        var graphs = res['graphs'];
        renderSimulationChart(graphs)
        $('#overallProfitPercent').html(res['overallProfitPercent']+'%');
        $('#lossRatio').html(res['lossRatio']);
        $('#profitRatio').html(res['profitRatio']);
        $('#lossRatioPercentage').html(res['lossRatioPercentage']+'%');
        $('#profitRatioPercentage').html(res['profitRatioPercentage']+'%');
        $('#numberOfStock').val(res['numberOfStock']);
        $('#operationCost').val(res['operationCost']);
        $('.nofsimultionptag').html(res['numberOfSimulation']);

        $('.loader-image').hide();
        $('body').removeClass('loader');
      }

  });
}

$(document).on('click','.changeMonthOptionBtn',function(){
    var selectedOption = $('.chhoseSimulationSelection option:selected').val();
    var investmentID = $('.investmentLists .active').attr("dataid");
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
    getSimulationOverAllLossProfitPercentage(investmentID,selectedOption,numberOfStock);
});


renderStatisticalGraphByAjax(<?php echo $myConfigStatistical; ?>);
function renderStatisticalGraphByAjax(ajaxGraph)
{
    zingchart.render({ 
        id : 'myChart4th', 
        data : ajaxGraph, 
        height: '450px', 
        width: '100%' 

    });
}

function getChartDataAjax(period=0,parameter=0,firstDeviation=0,secondDeviation=0,percentile99_1=0,type=1)
{
    $('.loader-image').show();
    $('body').addClass('loader');
    var investmentID = $('.investmentLists .active').attr("dataid");
    $.ajax({
          url:'<?php echo base_url("users/portfolio/getStaticAnalysisGraphData"); ?>',
          method:'POST',
          data:{stock_id:investmentID,period:period,parameter:parameter,firstDeviation:firstDeviation,secondDeviation:secondDeviation,percentile99_1:percentile99_1,cattype:type},
          dataType:'html',
          success:function(data)
          {    
            $('.loader-image').hide();
            $('body').removeClass('loader');        
            var res = JSON.parse(data);
            //console.log(data);
            var graphs = res['graphsdata'];
            renderStatisticalGraphByAjax(graphs);
          }
      });

}


$(document).ready(function(){
    $('.balancesheettest  .mseAverage li').click(function(){

            var li = $(this).attr('data-id');

            if(li=="medianave")

            {

                

                $('.balancesheettest .mseDeviation li').removeClass("active");

                $('.balancesheettest .medianDeviation li:nth-child(1)').addClass("active");

                $('.stastical_analysis_param').val(1);

                $('.balancesheettest .firstStandardDevivation .firstStandardDevivationHidden').val(0);

                $('.balancesheettest .secondStandardDevivation .secondStandardDevivationHidden').val(0);

                //

                

                $('.price-static-analysis-info ul li:nth-child(2) .changedOncalcultaionParam').text('Median Price');

                $(".price-static-analysis-info ul li:nth-child(3)").hide();

                $(".price-static-analysis-info ul li:nth-child(4)").hide();

                $(".price-static-analysis-info ul li:nth-child(5)").hide();

                $(".price-static-analysis-info ul li:nth-child(6)").hide();

                $(".price-static-analysis-info ul li:nth-child(7)").hide();

                $(".price-static-analysis-info ul li:nth-child(8)").hide();

                //

                $('.balancesheettest .percentile99_1 .percentile99_1Hidden').val(0);

                var period = $('.emaclass').val();
                if(period>365)
                {
                    alert('You can not enter period more than 365');
                    return false;
                }

                var parameter = $('.stastical_analysis_param').val();

                var firstDeviation = $('.firstStandardDevivationHidden').val();

                var secondDeviation = $('.secondStandardDevivationHidden').val();

                var percentile99_1 = $('.percentile99_1Hidden').val();



                getChartDataAjax(period,parameter,firstDeviation,secondDeviation,percentile99_1,1);

            }

            if(li=="simpleave")

            {

                

                $('.balancesheettest .mseDeviation li').removeClass("active");

                $('.balancesheettest .simpleDeviation li:nth-child(1)').addClass("active");



                //

                $('.price-static-analysis-info ul li:nth-child(2) .changedOncalcultaionParam').text('Simple Average');

                $(".price-static-analysis-info ul li:nth-child(3)").hide();

                $(".price-static-analysis-info ul li:nth-child(4)").hide();

                $(".price-static-analysis-info ul li:nth-child(5)").hide();

                $(".price-static-analysis-info ul li:nth-child(6)").hide();

                $(".price-static-analysis-info ul li:nth-child(7)").hide();

                $(".price-static-analysis-info ul li:nth-child(8)").hide();

                //





                $('.stastical_analysis_param').val(2);

                $('.balancesheettest .firstStandardDevivation .firstStandardDevivationHidden').val(0);

                $('.balancesheettest .secondStandardDevivation .secondStandardDevivationHidden').val(0);

                $('.balancesheettest .percentile99_1 .percentile99_1Hidden').val(0);

                var period = $('.emaclass').val();
                if(period>365)
                {
                    alert('You can not enter period more than 365');
                    return false;
                }

                var parameter = $('.stastical_analysis_param').val();

                var firstDeviation = $('.firstStandardDevivationHidden').val();

                var secondDeviation = $('.secondStandardDevivationHidden').val();

                var percentile99_1 = $('.percentile99_1Hidden').val();

                getChartDataAjax(period,parameter,firstDeviation,secondDeviation,percentile99_1,1);

            }

            if(li=="expoave")

            {

                

                $('.balancesheettest .mseDeviation li').removeClass("active");

                $('.balancesheettest .simpleDeviation li:nth-child(1)').addClass("active");

                //

                $('.price-static-analysis-info ul li:nth-child(2) .changedOncalcultaionParam').text('Exp. Average');

                $(".price-static-analysis-info ul li:nth-child(3)").hide();

                $(".price-static-analysis-info ul li:nth-child(4)").hide();

                $(".price-static-analysis-info ul li:nth-child(5)").hide();

                $(".price-static-analysis-info ul li:nth-child(6)").hide();

                $(".price-static-analysis-info ul li:nth-child(7)").hide();

                $(".price-static-analysis-info ul li:nth-child(8)").hide();

                //

                $('.stastical_analysis_param').val(3);

                $('.balancesheettest .firstStandardDevivation .firstStandardDevivationHidden').val(0);

                $('.balancesheettest .secondStandardDevivation .secondStandardDevivationHidden').val(0);

                $('.balancesheettest .percentile99_1 .percentile99_1Hidden').val(0);

                var period = $('.emaclass').val();
                if(period>365)
                {
                    alert('You can not enter period more than 365');
                    return false;
                }

                var parameter = $('.stastical_analysis_param').val();

                var firstDeviation = $('.firstStandardDevivationHidden').val();

                var secondDeviation = $('.secondStandardDevivationHidden').val();

                var percentile99_1 = $('.percentile99_1Hidden').val();



                getChartDataAjax(period,parameter,firstDeviation,secondDeviation,percentile99_1,1);

            }

            $('.balancesheettest .mseAverage li').removeClass("active");

            $(this).addClass("active");



        });

        

        $('.balancesheettest .firstStandardDevivation li').click(function(){

            $(".balancesheettest .firstStandardDevivation li").toggleClass("active");

            if($('.balancesheettest .firstStandardDevivation li').hasClass('active'))

            {



                $(".price-static-analysis-info ul li:nth-child(5)").show();

                $(".price-static-analysis-info ul li:nth-child(6)").show();



                $('.balancesheettest .firstStandardDevivation .firstStandardDevivationHidden').val(1);

                var period = $('.emaclass').val();
                if(period>365)
                {
                    alert('You can not enter period more than 365');
                    return false;
                }

                var parameter = $('.stastical_analysis_param').val();

                var firstDeviation = $('.firstStandardDevivationHidden').val();

                var secondDeviation = $('.secondStandardDevivationHidden').val();

                var percentile99_1 = $('.percentile99_1Hidden').val();

                getChartDataAjax(period,parameter,firstDeviation,secondDeviation,percentile99_1,1);

            }

            else

            {

                $(".price-static-analysis-info ul li:nth-child(5)").hide();

                $(".price-static-analysis-info ul li:nth-child(6)").hide();



                $('.balancesheettest .firstStandardDevivation .firstStandardDevivationHidden').val(0);

                var period = $('.emaclass').val();
                if(period>365)
                {
                    alert('You can not enter period more than 365');
                    return false;
                }

                var parameter = $('.stastical_analysis_param').val();

                var firstDeviation = $('.firstStandardDevivationHidden').val();

                var secondDeviation = $('.secondStandardDevivationHidden').val();

                var percentile99_1 = $('.percentile99_1Hidden').val();

                getChartDataAjax(period,parameter,firstDeviation,secondDeviation,percentile99_1,1);

            }

        });



        $('.balancesheettest .secondStandardDevivation li').click(function(){

            $(".balancesheettest .secondStandardDevivation li").toggleClass("active");

            if($('.balancesheettest .secondStandardDevivation li').hasClass('active'))

            {

                $(".price-static-analysis-info ul li:nth-child(3)").show();

                $(".price-static-analysis-info ul li:nth-child(4)").show();



                $('.balancesheettest .secondStandardDevivation .secondStandardDevivationHidden').val(1);

                var period = $('.emaclass').val();
                if(period>365)
                {
                    alert('You can not enter period more than 365');
                    return false;
                }

                var parameter = $('.stastical_analysis_param').val();

                var firstDeviation = $('.firstStandardDevivationHidden').val();

                var secondDeviation = $('.secondStandardDevivationHidden').val();

                var percentile99_1 = $('.percentile99_1Hidden').val();

                getChartDataAjax(period,parameter,firstDeviation,secondDeviation,percentile99_1,1);

            }

            else

            {

                $(".price-static-analysis-info ul li:nth-child(3)").hide();

                $(".price-static-analysis-info ul li:nth-child(4)").hide();



                $('.balancesheettest .secondStandardDevivation .secondStandardDevivationHidden').val(0);

                var period = $('.emaclass').val();
                if(period>365)
                {
                    alert('You can not enter period more than 365');
                    return false;
                }

                var parameter = $('.stastical_analysis_param').val();

                var firstDeviation = $('.firstStandardDevivationHidden').val();

                var secondDeviation = $('.secondStandardDevivationHidden').val();

                var percentile99_1 = $('.percentile99_1Hidden').val();

                getChartDataAjax(period,parameter,firstDeviation,secondDeviation,percentile99_1,1);

            }

        });



        $('.balancesheettest .percentile99_1 li').click(function(){

            var parameter = $('.stastical_analysis_param').val();

            if(parameter==1)

            {

                $(".balancesheettest .percentile99_1 li").toggleClass("active");

                if($('.balancesheettest .percentile99_1 li').hasClass('active'))

                {

                    $(".price-static-analysis-info ul li:nth-child(7)").show();

                    $(".price-static-analysis-info ul li:nth-child(8)").show();

                    $('.balancesheettest .percentile99_1 .percentile99_1Hidden').val(1);

                    var period = $('.emaclass').val();
                    if(period>365)
                    {
                        alert('You can not enter period more than 365');
                        return false;
                    }

                    var parameter = $('.stastical_analysis_param').val();

                    var firstDeviation = $('.firstStandardDevivationHidden').val();

                    var secondDeviation = $('.secondStandardDevivationHidden').val();

                    var percentile99_1 = $('.percentile99_1Hidden').val();



                    getChartDataAjax(period,parameter,firstDeviation,secondDeviation,percentile99_1,1);

                }

                else

                {

                    $(".price-static-analysis-info ul li:nth-child(7)").hide();

                    $(".price-static-analysis-info ul li:nth-child(8)").hide();



                    $('.balancesheettest .percentile99_1 .percentile99_1Hidden').val(0);

                    var period = $('.emaclass').val();
                    if(period>365)
                    {
                        alert('You can not enter period more than 365');
                        return false;
                    }

                    var parameter = $('.stastical_analysis_param').val();

                    var firstDeviation = $('.firstStandardDevivationHidden').val();

                    var secondDeviation = $('.secondStandardDevivationHidden').val();

                    var percentile99_1 = $('.percentile99_1Hidden').val();

                    getChartDataAjax(period,parameter,firstDeviation,secondDeviation,percentile99_1,1);

                }

            }

            

        });

});
$(document).on('click','.btnchangePeriod',function(){
    var period = $('.emaclass').val();
    if(period>365)
    {
        alert('You can not enter period more than 365');
        return false;
    }
    var parameter = $('.stastical_analysis_param').val();
    var firstDeviation = $('.firstStandardDevivationHidden').val();
    var secondDeviation = $('.secondStandardDevivationHidden').val();
    var percentile99_1 = $('.percentile99_1Hidden').val();
    getChartDataAjax(period,parameter,firstDeviation,secondDeviation,percentile99_1,1);
});
</script>

</body>

</html>