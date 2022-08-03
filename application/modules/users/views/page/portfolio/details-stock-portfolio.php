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

    <link rel="stylesheet" type="text/css" href="https://chartDatan.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <!-- Style CSS -->

    <link href="<?php echo base_url('assets/users'); ?>/css/main-custom.css" rel="stylesheet">

    <!-- Font Awesome core CSS -->

    <link href="<?php echo base_url('assets/users'); ?>/css/font-awesome.min.css" rel="stylesheet">

    <!-- Dashbord CSS -->

    <link href="<?php echo base_url('assets/users'); ?>/css/dashbord.css" rel="stylesheet">

    <!-- Responsive CSS -->

    <link href="<?php echo base_url('assets/users'); ?>/css/responsive.css" rel="stylesheet">

    <script type="text/javascript" src="https://cdn.zingchart.com/zingchart.min.js"></script>

    <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>

    <script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>

    <style type="text/css">

.sourceYahooFinance p {
    text-align: left;
    padding: 25px 0px 0px 0px;
    display: inline-block;
    font-weight: 600;
    color: #063853;
    font-size: 15px;
}

.hell-dummy-text {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 538px;
}

.hell-dummy-text h2 {
    font-size: 28px;
}

.sourceYahooFinance i {
    margin-right: 10px;
}

    <?php if($stock_details->categoryID==14){ ?>
    .stock-details-step-2{
        display: none;
    }
    .stock-details-step-3{
        display: block;
    }
    <?php } else { ?>
    .stock-details-step-2{
        display: block;
    }
    .stock-details-step-3{
        display: none;
    }
    <?php } ?>



    .stock-details-step-4{
        display: none;
    }



    @media screen and (max-width: 768px) {

       .ui-datepicker-multi-3 .ui-datepicker-group {

    width: 100% !important;

}

    }

        .seasional-analysis-filter-area .form-control {

    border: 1px solid #8c8787;

    border-radius: 3px;

    font-size: 14px;

    outline: none;

    width: 167px;

}

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



        #myChart-20s{

            width: 98%;

            height: 500px;

            margin-top: 20px; 

            margin-left: 2%;

        }

        #fundametalMainChart {

          height:100%;

          width:225px;

          min-height:600px;

          margin: 0px;

          padding: 0px;

        }

        #fundametalDetailsChart{

          height:100%;

          width:225px;

          min-height:600px;

          margin: 0px;

          padding: 0px;

        }

       #fundametalSecondMainChart {

          height:100%;

          width:200px;

          min-height:600px;

          margin: 0px;

          padding: 0px;

        }

        /*#debtRatiosBorrowingChart{

          height:150px;

          width:150px;

          margin: 0px;

          padding: 0px; 



        }*/

        #debtRatiosDebtQualityChart{

          height:130px;

          width:130px;

          margin: 0px;

          padding: 0px; 



        }

        #debtRatiosCapacityChart{

          height:130px;

          width:130px;

          margin: 0px;

          padding: 0px; 



        }

        #liquidityRatiosLiquidityChart{

          height:130px;

          width:130px;

          margin: 0px;

          padding: 0px; 



        }

        #liquidityRatiosTreasuryChart{

          height:130px;

          width:130px;

          margin: 0px;

          padding: 0px; 



        }

        #liquidityRatiosAcidTestChart{

          height:130px;

          width:130px;

          margin: 0px;

          padding: 0px; 



        }

        #otherRatiosPERChart{

          height:125px;

          width:125px;

          margin: 0px;

          padding: 0px; 



        }

        #otherRatiosPEGChart{

          height:125px;

          width:125px;

          margin: 0px;

          padding: 0px; 



        }

        #otherRatiosBetaChart{

          height:125px;

          width:125px;

          margin: 0px;

          padding: 0px; 



        } 

        #otherRatiosEarningsperDividendChart{

          height:125px;

          width:125px;

          margin: 0px;

          padding: 0px; 



        }

        #otherRatiosOperatingMargins{

          height:125px;

          width:125px;

          margin: 0px;

          padding: 0px; 



        }

        .stock-details-step-2, .stock-details-step-2 .row, .stock-details-step-2 .stock-bg {

        padding-left: 0;

        padding-right: 0;

        margin-left: 0;

        margin-right: 0;

        }

        .stock-details-step-2 .col-md-11.col-sm-11.box-1 {

        padding-left: 0;

        padding-right: 0;

        margin-left: 0;

        margin-right: 0;

        }

        .stock-details-step-2 .col-md-11.col-sm-11.box-1 .row .col-md-6 {

        padding-left: 0;

        padding-right: 0;

        margin-left: 0;

        margin-right: 0;

        }

        /*#debtRatiosBorrowingChart-wrapper{

            position: unset !important;

        }*/





        #myChart-6s #myChart-6s-license,#myChart-20s #myChart-20s-license-text,#myChart4th #myChart4th-license-text,#fundametalSecondMainChart-license-text,#fundametalDetailsChart-license-text,#fundametalMainChart-license-text,#debtRatiosBorrowingChart-license-text,#debtRatiosDebtQualityChart-license-text,#debtRatiosCapacityChart-license-text,#liquidityRatiosLiquidityChart-license-text,#liquidityRatiosTreasuryChart-license-text,#liquidityRatiosAcidTestChart-license-text,#otherRatiosPERChart-license-text,#otherRatiosBetaChart-license-text,#otherRatiosPEGChart-license-text,#otherRatiosEarningsperDividendChart-license-text,#otherRatiosOperatingMargins-license-text,#myChart-21s #myChart-21s-license-text,#myChartFinalSeasional-license-text,#myChartFinalSeasionalLast20Years-license-text,#myChartFinalSeasionalPrevious10Years-license-text,#myChart21sFinalThreeLine-license-text{display: none;}

            .debtRatios{

                    display: block;

                    width: 100%;

                    float: left;

            }

            .liquidityRatios{

                float: left;

                width: 100%;

                display: block;
                margin-top: 34px;

            }

            .othersRatios{

                float: left;

                width: 100%;

                display: block;
                margin-top: 34px;

            } 

            .othersRatios .col-md-3 {

                width: 20%;

            }

            h2.debtRationHeading{

                text-align: center;

                font-size: 19px;

                margin: 10px 0px 0px 0px;

                position: absolute;

                z-index: 999;

                left: 0;

                right: 0;

                font-weight: 600;

                top: 0px;

            }

            h2.LiquidityRationHeading{

                text-align: center;

                font-size: 19px;

                margin: 32px 0px 0px 0px;

                position: absolute;

                z-index: 999;

                left: 0;

                right: 0;

                font-weight: 600;

                top: 124px;

            }

            h2.othersRationHeading{

                text-align: center;

                font-size: 19px;

                margin: 32px 0px 0px 0px;

                position: absolute;

                z-index: 999;

                left: 0;

                right: 0;

                font-weight: 600;

                top: 285px;

            }

        .stock-bg{

        min-height: 740px;

        }



        .box-1{

    height: 580px;}



    .box-2 {

       height: 439px;

    }

    .box-3 {

    min-height: 400px;
}

    .blance-sheet-info .line-persantage-boxs 

    {

        margin-top: 0;

    }

    .left-side-chart-content{

        height: 410px;

    }

    .resume-document {

       text-align: center;
       margin-top: 2%;

    }

    .blance-sheet-info .resume-document ul {

       margin-top: 0px; 

    }



     span.paichartbottomtext {

        width: 63px;

        display: block;

        margin-left: 33px;

        font-size: 11px;

        text-align: center;

        color: #063853;

        font-weight: 600;

    }



    /*back button css*/

    .right-btn-back h4 a {

        background-color: #042739;

        font-size: 14px;

        border-radius: 2px;

        padding: 8px 21px;

        color: #fff;

        font-weight: 500;

        cursor: pointer;

    }
    .bradcrum-list {
    float: left;
    }
    .right-btn-back h4 {
        text-align: right;
        margin: 0;
        padding: 0;
    }
    </style>

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

                                <li><?php echo $stock_details->stock_name; ?></li>

                            </ul>

                        </div>

                        <div class="right-btn-back">

                            <h4>

                                <a href="<?php echo base_url('user/stock-portfolio'); ?>">Back</a>

                            </h4>

                        </div>

                    </div>

                <?php if($fundamentalArr['noDataFoundFundamental']==0){ ?>
               <div class="col-md-12 col-sm-12 blance-sheet-info stock-details-step-2">

                        <div class="stock-bg ">

                         <div class="col-md-11 col-sm-11 box-1">

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="left-side-chart-content">

                                        <div id='fundametalMainChart' style="float: left;"></div>

                                        <div id='fundametalSecondMainChart' style="float: right;"></div>

                                        <div id="fundametalDetailsChart" style="display: none;float: left;"></div>

                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <h2 class="debtRationHeading">Debt Ratios</h2>

                                    <div class="debtRatios">

                                        <div class="col-md-2">


                                        </div>

                                        <div class="col-md-4">

                                            <div id='debtRatiosBorrowingChart'></div>

                                        </div>

                                        <div class="col-md-4">

                                            <div id='debtRatiosDebtQualityChart'></div>

                                        </div>

                                        <div class="col-md-2">

                                        </div>

                                    </div>

                                    <h2 class="LiquidityRationHeading">Liquidity Ratios</h2>

                                    <div class="liquidityRatios">

                                        <div class="col-md-4">

                                            <div id='liquidityRatiosLiquidityChart'></div>

                                        </div>

                                        <div class="col-md-4">

                                            <div id='liquidityRatiosTreasuryChart'></div>

                                        </div>

                                        <div class="col-md-4">

                                            <div id='liquidityRatiosAcidTestChart'></div>

                                        </div>

                                    </div>

                                    <h2 class="othersRationHeading">Other Ratios</h2>

                                    <div class="othersRatios">

                                        

                                        <div class="col-md-3">

                                            <div id='otherRatiosPERChart'></div>

                                            <span class="paichartbottomtext">PER </span>

                                        </div>

                                        <div class="col-md-3">

                                            <div id='otherRatiosPEGChart'></div>

                                            <span class="paichartbottomtext">PEG Ratio (5 yr expected)</span>

                                        </div>

                                        <div class="col-md-3">

                                            <div id='otherRatiosBetaChart'></div>

                                            <span class="paichartbottomtext">Beta (5Y monthly)</span>

                                        </div>

                                        <div class="col-md-3">

                                            <div id='otherRatiosEarningsperDividendChart'></div>

                                            <span class="paichartbottomtext">dividend</span>

                                        </div>

                                        <div class="col-md-3">

                                            <div id='otherRatiosOperatingMargins'></div>

                                            <span class="paichartbottomtext">Operating margin(ttm)</span>

                                        </div>

                                    </div>
                                    <div class="sourceYahooFinance">
                                        <p><i class="fa fa-info-circle" aria-hidden="true"></i><?php echo $fundamentalArr['dataSource']; ?></p>
                                    </div>
                                </div>

                            </div>

                            

                        </div><!-- End Col-Md-9--> 





                            <div class="col-md-1 col-sm-1 selectox1">

                                <div class="box-partchanel " style="display: none;">

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

                                        <li><a class="r" href="javascript:void(0)">F</a></li>

                                        <li id="step-details-id-2-2"><a href="javascript:void(0)">S</a></li>

                                        <li  id="step-details-id-2-3"><a href="javascript:void(0)">Y</a></li>

                                    </ul>

                                    <h5>Fundamental</h5>

                                </div>

                            </div>



                        </div><!-- Stock-bg End -->

                    </div> <!-- Col-md- 12 End -->

                <?php }  else { ?>
                     <div class="col-md-12 col-sm-12 blance-sheet-info stock-details-step-2">
                        <style type="text/css">
                            .nofundamentalrecodfound .resume-document{
                                margin-top: -12%;
                            }
                        </style>

                        <div class="stock-bg ">

                         <div class="col-md-11 col-sm-11 box-1">

                            <div class="row">
                                <div class="hell-dummy-text">
                                    <h2>No Fundamental data available for this stock.</h2>
                                </div>
                                

                            </div>

                            

                        </div>

                             <div class="col-md-12 col-sm-12 nofundamentalrecodfound">

                                <div class="resume-document ">

                                    <ul>

                                        <li><a class="r" href="javascript:void(0)">F</a></li>

                                        <li id="step-details-id-2-2"><a href="javascript:void(0)">S</a></li>

                                        <li  id="step-details-id-2-3"><a href="javascript:void(0)">Y</a></li>

                                    </ul>

                                    <h5>Fundamental</h5>

                                </div>

                            </div>



                        </div>

                    </div> 
                <?php } ?>



                <!-- Blance Sheet Section End Here -->





                <!-- Blance Sheet Section Start Here Part-4-->

               <div class="col-md-12 col-sm-12 blance-sheet-info stock-details-step-3">

                <div class="loader-image" style="display: none;"><img src="<?php echo base_url('assets/users/images/loading.gif') ?>"></div>

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

                            <!-- <div class="static-analysis-date-range-picker">

                                <input type="text" name="daterange" />

                            </div> -->

                        </div>

                         <div class="col-md-10 col-sm-10 box-2">



                           

                          

                           <div id='myChart4th'></div>

                        

                        </div><!-- End Col-Md-9--> 

                            <div class="col-md-2 col-sm-2 selectox2">

                                <div class="box-partchanel">

                                    <div class="box-selects box-select2">

                                        <h3>Select</h3>

                                    </div>

                                    <div class="line-persantage-boxs percentage-filter-boxs2">

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

                             <div class="col-md-12 col-sm-12 ">

                                <div class="resume-document ">

                                    <ul>
                                        <?php if($stock_details->categoryID!=14){ ?>
                                        <li id="step-details-id-4-2"><a href="javascript:void(0)">F</a></li>
                                        <?php } ?>

                                        <li><a class="r" href="javascript:void(0)">S</a></li>

                                        <li id="step-details-id-4-3"><a href="javascript:void(0)">Y</a></li>

                                    </ul>

                                    <h5>Statistical Analysis</h5>

                                </div>

                            </div>



                        </div><!-- Stock-bg End -->

                        

                </div> <!-- Col-md- 12 End -->

                    <style type="text/css">

                        .static-analysis-parameter{

                            min-height: 139px;

                        }

                        .price-static-analysis-info ul li {

                        width: 30%;

                        display: inline-block;

                        list-style: none;

                        font-size: 18px;

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





                    </style>

                    <div class="col-md-12 col-sm-12 blance-sheet-info stock-details-step-4">

                        <div class="stock-bg ">

                        <div class="col-md-12 col-sm-12 box-3">

                            <div class="row">

                                <div class="col-lg-12 col-md-12 col-sm-12 seasional-analysis-filter-area">

                                    <div class="row">

                                    <style type="text/css">

                                        .seasional-analysis-filter-area .form-control {
                                            border: 1px solid #8c8787;
                                            border-radius: 3px;
                                            font-size: 14px;
                                            outline: none;
                                        }
                                        .seasional-analysis-filter-area label {
                                            font-size: 15px;
                                            font-weight: 700;
                                            color: #696a6b;
                                            margin-bottom: 9px;
                                        }
                                        .perstange-graps-box-contents ul {
                                            padding: 0px;
                                        }
                                        .perstange-graps-box-contents ul li {
                                            font-size: 14px;
                                            list-style: none;
                                            line-height: 42px;
                                            border-bottom: 1px solid #cccccc94;
                                            font-weight: 500;
                                        }
                                       /* .perstange-graps-box-contents ul li span {
                                            text-align: right;
                                            float: right;
                                        }*/
                                        .perstange-graps-box-contents h4 {
                                            font-size: 17px;
                                            font-weight: 600;
                                            color: #063853;
                                            line-height: 35px;
                                            background: #f6bb19;
                                            margin-bottom: 5px;
                                            border-bottom: 1px solid #cccccc94;
                                            padding: 0 14px;
                                        }
                                        .perstange-graps-box-contents h4 span {
                                            float: right;
                                        }
                                        .perstange-graps-box-contents {
                                            margin-top: 22px;
                                        }
                                       /* .perstange-graps-box-contents ul li:last-child {
                                            border: none;
                                        }*/
                                        .perstange-graps-box-contents ul li span.pos {
                                            float: initial !important;
                                            color: #f90505;
                                        }
                                        .perstange-graps-box-contents ul li span.neg{
                                            color: green;
                                            float: initial !important;
                                        }
                                        .probabalityli{
                                            color: green;
                                        }
                                        .show-end-date-info p {
                                            font-size: 15px;
                                            text-align: right;
                                            font-weight: 500;
                                            margin: 11px 0px 0px 0px;
                                        }
                                        .show-start-date-info p span {
                                            color: #063853;
                                        }
                                        .show-start-date-info p {
                                            font-size: 15px;
                                            text-align: left;
                                            font-weight: 500;
                                            margin: 11px 28px 0px 0px;
                                        }
                                        .show-end-date-info p span{
                                            color: #063853;
                                        }
                                        .changeAverageOrEvolutions{
                                            outline: none;
                                        }
                                  </style>
                                </div>
                            </div>

                                 <div class="loader-image" style="display: none;"><img src="<?php echo base_url('assets/users/images/loading.gif') ?>"></div>
                                 
                                <div class="col-lg-12 col-md-12 col-sm-12 seasional-analysis-filter-area">
                                    <div class="row">
                                    <style type="text/css">
                                       .firstcalculationgraphp{
                                         margin-bottom: 32px;
                                        /* border-bottom: 1px solid #8a7e7e; */
                                        padding-bottom: 22px;
                                        margin-top: 30px;
                                        border-top: 1px solid #e5dddd82;
                                        padding: 21px 0px 44px 0px;
                                        }
                                        .seasional-analysis-filter-area .form-control {
                                            border: 1px solid #8c8787;
                                            border-radius: 3px;
                                            font-size: 14px;
                                            outline: none;
                                        }
                                        .seasional-analysis-filter-area label {
                                            font-size: 15px;
                                            font-weight: 700;
                                            color: #696a6b;
                                            margin-bottom: 9px;
                                        }

                                          /*  .perstange-graps-box-contents ul li span {
                                                text-align: right;
                                                float: right;
                                            }*/
                                           
                                          /*  .perstange-graps-box-contents h4 {
                                                    font-size: 17px;
                                                    font-weight: 600;
                                                    color: #555;
                                                    margin-bottom: 5px;
                                                    border-bottom: 1px solid #cccccc94;
                                                    padding: 0px 0px 18px 0px;
                                                }*/
                                            .perstange-graps-box-contents h4 span {
                                                float: right;
                                            }

                                            .perstange-graps-box-contents {
                                                margin-top: 22px;
                                            }

                                       /*     .perstange-graps-box-contents ul li:last-child {
                                        border: none;
                                    }*/

                                    .perstange-graps-box-contents ul li span.pos {
                                    float: initial !important;
                                    color: #f90505;
                                }
                                .perstange-graps-box-contents ul li span.neg{
                                    color: green;
                                    float: initial !important;
                                }
                                .probabalityli{
                                    color: green;
                                }

                                .show-start-date-info p {
                                    background: #063853;
                                    line-height: 36px;
                                    text-align: center;
                                    color: #fff;
                                }
                                .show-start-date-info p span {
                                    color: #f6bb19;
                                }
                                .show-end-date-info p {
                                    background: #063853;
                                    line-height: 36px;
                                    text-align: center;
                                    color: #fff;
                                }
                                .show-end-date-info p span {
                                    color: #f6bb19;
                                }
                                .form-control {
                                    display: block;
                                    width: 100%;
                                    height: 34px;
                                    padding: 6px 12px;
                                    font-size: 14px;
                                    line-height: 1.42857143;
                                    color: #fff;
                                    background-color: #063853;
                                    background-image: none;
                                    border: 1px solid #ccc;
                                    border-radius: 2px;
                                }
                                 .perstange-graps-box-contents ul {
                                    padding: 0px;
                                }

                                .perstange-graps-box-contents ul li {
                                    font-size: 14px;
                                    list-style: none;
                                    line-height: 42px;
                                    border: 1px solid #e7e5e5;
                                    font-weight: 500;
                                    background: #fff;
                                    padding: 0 14px 0 0;
                                    margin-bottom: 11px;
                                }
                                .valueRight.posNegTotal {
                                    background: #fff;
                                    display: inline-grid;
                                    float: right;
                                    line-height: 30px;
                                    padding: 0 20px;
                                    margin-top: 5px;
                                    border: 1px solid #eee;
                                }
                                .perstange-graps-box-contents ul li span.valueRight{
                                    text-align: right;
                                    float: right;
                                    background: #fff;
                                    line-height: 30px;
                                    border: 1px solid #eee;
                                    margin-top: 5px;
                                    padding: 0 20px;
                                }

                                li.average_performance_title {
                                    background: #f2f9fd !important;
                                    padding: 0px 12px !important;
                                }
                                li.average_performance_title span {
                                    background: #eee;
                                    padding: 4px 14px;
                                    color: #000;
                                    display: contents;
                                }
                                .perstange-graps-box-contents ul li span.leftSide {
                                    position: relative;
                                    background: #063853;
                                    color: #fff;
                                    padding: 13px;
                                }
                                .perstange-graps-box-contents ul li span.leftSide::before {
                                    content: "";
                                    position: absolute;
                                    right: -19px;
                                    top: 0px;
                                    width: 0;
                                    height: 0;
                                    border-left: 19px solid #063853;
                                    border-top: 21px solid transparent;
                                    border-bottom: 21px solid transparent;
                                }

                                  </style>
                                
                                </div>
                            </div>
                            <div class="loader-image" style="display: none;"><img src="<?php echo base_url('assets/users/images/loading.gif') ?>"></div>
                                <div class="col-md-7">
                                <div class="row">                                 
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                    <select class="form-control seasionalStartDate1" onchange="getSeasionalAnalysisChange(this)" >
                                        <option value="">--Select Profit--</option>
                                        <?php 
                                            for($i=2;$i<=50;$i++)
                                            { 
                                        ?>
                                            <option value="<?php echo $i ?>"><?php echo $i ?>%</option>
                                        <?php 
                                            } 
                                        ?>
                                    </select>
                                </div>


                                 <div class="col-lg-6 col-md-6 col-sm-6">
                                    <select class="form-control seasionalEndDate1" onchange="getSeasionalAnalysisChange(this)">
                                        <option value="">--Select Probability--</option>
                                            <?php 
                                                for($i=60;$i<=100;$i+=5)
                                                { 
                                            ?>
                                                <option value="<?php echo $i ?>"><?php echo $i ?>%</option>
                                            <?php 
                                                } 
                                            ?>
                                    </select>
                                </div>
                            </div>
                                    <!-- <div id='myChartFinalSeasional'></div> -->
                                </div>
                                <div class="loader-image" style="display: none;"><img src="<?php echo base_url('assets/users/images/loading.gif') ?>"></div>
                                <div class="col-md-5">
                                </div>
                               <div class="row" id="finalProbProfitChartId" style="display:none;">
                                    <div class="col-md-12">
                                        <hr>
                                    </div>
                                    <div class="col-md-7">
                                        <div id='myChart21sFinalThreeLine'></div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="row">
                                            <div class="col-md-6 show-start-date-info">
                                                <?php 
                                                    $datatatta = explode(',', rtrim($filterPerformaceProbPreviousTenYears['dts'],','));
                                                ?>
                                                <p>Start Date: <span class="finalGetStartDate"><?php echo @trim($datatatta[0],"'"); ?></span></p>
                                            </div>
                                            <div class="col-md-6 show-end-date-info">
                                                <p>End Date: <span class="finalGetEndDate"><?php echo @trim(end($datatatta),"'"); ?></span></p>
                                            </div>
                                        </div>
                                        <div class="perstange-graps-box-contents">
                                        <!-- <h4>Parameter <span>Value</span></h4> -->
                                        <ul class="finalProbProfitGet">
                                            <li><span class="leftSide">Time Period in Number Of Days</span>  <span class="NumberOfdays valueRight"><?php //echo $numberOfTotalDays; ?>18 days</span></li>
                                            <!-- <li>Positive Days  <span><?php echo $totalNumberOfPositiveDays; ?>/<?php echo $totalNumberOfdays; ?> (<?php echo $totalNumberOfPositiveDaysPercentage; ?>%)</span></li> -->
                                            <li><span class="leftSide">Years Ratio ( <span class="neg">Pos</span>/<span class="pos">Neg</span>/Total )</span><div class="valueRight posNegTotal"><span> <span class="neg totalNumOfPos">
                                                <?php echo $numberOfPositiveDays; ?></span>/<span class="pos totalNumOfNeg"><?php echo $numberOfNegativeDays; ?></span>/<span>( <dm class="probabalityli"><?php echo number_format(($numberOfPositiveDays/$numberOfTotalDays)*100,2,'.',''); ?>%</dm> )</span><span class="totalSum totalNumberOfYearsCalCulation"> <?php echo $numberOfTotalDays; ?></span> </div></li>

                                            <li class="average_performance_title"><span>Average Performance of Stock:</span></li>

                                            <li><span class="leftSide last10YearsTitle">Last 10 Years</span><span class="performanceLast10Years valueRight"><?php echo number_format($performanceLast10Years,2,'.','');  ?>%</span></li>
                                            <li><span class="leftSide previous10YearsTitle">Previous 10 Years</span><span class="performanceBefore10Years valueRight"><?php echo number_format($performanceBefore10Years,2,'.','');  ?>%</span></li>
                                            <li><span class="leftSide last20YearsTitle">Last 20 Years</span> <span class="performanceLast20Years valueRight"><?php echo number_format($performanceLast20Years,2,'.','');  ?>%</span></li>
                                        </ul>
                                        </div>

                                    </div>
                               </div>

                               <!-- <div class="col-md-12 firstcalculationgraphp">
                                    <div class="btnSimpleAverageAverageEvolution">
                                        <button class="btn btn-success" dataID="2">Average Evolution</button>
                                    </div>
                                    <div id='myChart-20s'></div>



                                </div> -->

                            </div>

                           

                        

                        </div>  

                             <div class="col-md-12 col-sm-12 ">

                                <div class="resume-document ">

                                    <ul>
                                        <?php if($stock_details->categoryID!=14){ ?>
                                        <li id="step-details-id-3-2"><a href="javascript:void(0)">F</a></li>
                                        <?php } ?>

                                        <li id="step-details-id-3-3"><a href="javascript:void(0)">S</a></li>

                                        <li><a class="r" href="javascript:void(0)">Y</a></li>

                                    </ul>

                                    <h5>Seasonal Analysys</h5>

                                </div>

                            </div>

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



<!-- Show percentage Info Modal Start-->

<div id="show_percentage_info_modal" class="modal fade" role="dialog">

  <div class="modal-dialog">



    <!-- Modal content-->

    <div class="modal-content add_stock_modal">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title"><i class="fa fa-info" aria-hidden="true"></i>Info for Last 10 Years</h4>



      </div>

      <div class="modal-body">

        <p class="info-percentage-seasional"></p>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>

      </div>

    </div>



  </div>

</div>

<!--Show percentage Info Modal End-->
<!-- Show percentage Info Modal Start-->

<div id="show_percentage_info_modalLast20Years" class="modal fade" role="dialog">

  <div class="modal-dialog">



    <!-- Modal content-->

    <div class="modal-content add_stock_modal">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title"><i class="fa fa-info" aria-hidden="true"></i>Info for Last 20 Years</h4>



      </div>

      <div class="modal-body">

        <p class="info-percentage-seasional"></p>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>

      </div>

    </div>



  </div>

</div>

<!--Show percentage Info Modal End-->

<!-- Show percentage Info Modal Start-->

<div id="show_percentage_info_modalPrevious10Years" class="modal fade" role="dialog">

  <div class="modal-dialog">



    <!-- Modal content-->

    <div class="modal-content add_stock_modal">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title"><i class="fa fa-info" aria-hidden="true"></i>Info for Previous 10 Years</h4>



      </div>

      <div class="modal-body">

        <p class="info-percentage-seasional"></p>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>

      </div>

    </div>



  </div>

</div>

<!--Show percentage Info Modal End-->


<style type="text/css">



i.fa.fa-info {

    margin-right: 7px;

    background-color: #000;

    width: 32px;

    height: 32px;

    border-radius: 50%;

    text-align: center;

    line-height: 31px;

}

    

p.info-percentage-seasional {

    width: 93%;

    margin: auto;

    text-align: center;

    font-size: 16px;

}



button.btn.btn-default {

    background-color: #031c2a;

    outline: none;

    color: #fff;

    padding: 9px 25px;

    /* font-size: 15px; */

    border: none;

}





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

    top: 145px !important;

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







    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js "></script> -->

    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>

    <script src="<?php echo base_url('assets/users'); ?>/js/bootstrap.min.js "></script>

    <script src="<?php echo base_url('assets/users'); ?>/js/amimation-menu-sidebar.js "></script>

    <script src="<?php echo base_url('assets/users'); ?>/js/common.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    

<script>

    $(function() {



  $('input[name="daterange"]').daterangepicker({

      autoUpdateInput: false,

      locale: {

          cancelLabel: 'Clear'

      }

  });



  $('input[name="daterange"]').on('apply.daterangepicker', function(ev, picker) {

      $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));

  });



  $('input[name="daterange"]').on('cancel.daterangepicker', function(ev, picker) {

      $(this).val('');

  });



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

function getChartDataAjax(period=0,parameter=0,firstDeviation=0,secondDeviation=0,percentile99_1=0)
{
    /*alert(period);
    alert(parameter);
    alert(firstDeviation);
    alert(secondDeviation);
    alert(percentile99_1);*/
        $('.loader-image').show();
        $('body').addClass('loader');
        $.ajax({
          url:'<?php echo base_url("users/portfolio/getStaticAnalysisGraphData"); ?>',
          method:'POST',
          data:{stock_id:"<?php echo $this->uri->segment(5); ?>",period:period,parameter:parameter,firstDeviation:firstDeviation,secondDeviation:secondDeviation,percentile99_1:percentile99_1},
          dataType:'html',
          success:function(data)
          {    
            $('.loader-image').hide();
            $('body').removeClass('loader');        
            var res = JSON.parse(data);
            console.log(data);
            var graphs = res['graphsdata'];
            renderStatisticalGraphByAjax(graphs);
          }

      });

        /*var url = "<?php echo base_url("users/portfolio/getStaticAnalysisGraphData"); ?>"+"?stock_id="+"<?php echo $this->uri->segment(5); ?>"+"&period="+period+"&parameter="+parameter+"&firstDeviation="+firstDeviation+"&secondDeviation="+secondDeviation+"&percentile99_1="+percentile99_1;

        $('.loader-image').show();
        $('body').addClass('loader');
       zingchart.exec('myChart4th', 'reload');
        let output = zingchart.exec('myChart4th', 'load', {
                        dataurl: url
                      });
        $(".zc-abs").trigger('click');
        setTimeout(function(){ $('.loader-image').hide(); }, 1000);
        $('body').removeClass('loader');*/

}



$(document).on('click','.btnchangePeriod',function(){

   // alert();

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

    getChartDataAjax(period,parameter,firstDeviation,secondDeviation,percentile99_1);

});

function changeGraphOnclickSideMenu()

{    

    /*var period = $('.emaclass').val();

    var parameter = $('.stastical_analysis_param').val();

    var firstDeviation = $('.firstStandardDevivationHidden').val();

    var secondDeviation = $('.secondStandardDevivationHidden').val();

    var percentile99_1 = $('.percentile99_1Hidden').val();

    alert(period);

    alert(parameter);

    alert(firstDeviation);

    alert(secondDeviation);

    alert(percentile99_1);

    getChartDataAjax(period,parameter,firstDeviation,secondDeviation,percentile99_1);*/

}

function changeGraphOnClickSideSubMenu(parameter)

{

    var period = $('.emaclass').val();
    if(period>365)
    {
        alert('You can not enter period more than 365');
        return false;
    }

    getChartDataAjax(period,parameter);

}





//



var myConfig = {

    "gui":{ 

      "contextMenu":{ 

        "button":{ 

          "visible": false 

        } 

      } 

    },

    type: 'line', 

    title: {

      text: ''

    },

    subtitle: {

      text: ''

    },

    plot: {

      tooltip: {

        visible: false

      },

      cursor: 'hand'

    },

    crosshairX:{},

    scaleX: {

    markers: [],

    offsetEnd:75,

      labels: ['Mon', 'Tues', 'Wed', 'Thur', 'Fri', 'Sat', 'Sun']

    },

    series: [

        {

            values: [35,42,67,89,25,34,67],

            text: 'Apple Sales'

        },

        {

            values: [15,42,67,89,25,34,67].sort(),

            text: 'Peach Sales'

        }

    ]

};

  zingchart.bind('myChart-6s', 'contextmenu', function(p) {

  return false;

});

zingchart.render({ 

    id: 'myChart-6s', 

    data: myConfig, 

    height: '400', 

    width: '100%' 

});



//seasional analysis chart

let chartData = [

  {

    text: 'Average <?php echo $media_last10years; ?>',

    values: [<?php echo $last10Years; ?>],

    legendMarker: {

      type: 'circle',

      backgroundColor: '#00008b',

      borderColor: '#00008b',

      borderWidth: '1px',

      shadow: false,

      size: '5px'

    },

    'margin-top':'0',

    lineColor: '#00008b',

    marker: {

      backgroundColor: '#00008b',

      borderColor: '#00008b',

      borderWidth: '1px',

      shadow: false

    }

  },

  {

    text: 'Average <?php echo $media_last20years; ?>',

    values: [<?php echo $last20Years; ?>],
    visible: false,

    legendMarker: {

      type: 'circle',

      backgroundColor: '#000000',

      borderColor: '#000000',

      borderWidth: '1px',

      shadow: false,

      size: '5px'

    },

    lineColor: '#000000',

    marker: {

      backgroundColor: '#000000',

      borderColor: '#000000',

      borderWidth: '1px',

      shadow: false

    }

  },

  {

    text: 'Average <?php echo $media_previous10years; ?>',

    values: [<?php echo $previous10Years; ?>],
    visible: false,

    legendMarker: {

      type: 'circle',

      backgroundColor: 'green',

      borderColor: 'green',

      borderWidth: '1px',

      shadow: false,

      size: '5px'

    },

    lineColor: 'green',

    marker: {

      backgroundColor: 'green',

      borderColor: 'green',

      borderWidth: '1px',

      shadow: false

    }

  }

];



var myConfigSeasonalAnalysis = {

            "gui":{ 

              "contextMenu":{ 

                "button":{ 

                  "visible": false 

                } 

              } 

            },

            "type": "line",

            "utc": true,

            backgroundColor: 'white',

            "plotarea": {

                "margin": "dynamic 45 60 dynamic",

            },
            "legend": {
                "layout": "float",
                "background-color": "none",
                "border-width": 0,
                "shadow": 0,
                "align":"center",
                "vertical-align":"bottom",
                "adjust-layout":true,
                "toggle-action": "remove",
                "item":{
                  "padding": 7,
                  "marginRight": 17,
                  "cursor":"hand"
                }
            },

            "scale-x": {

                "labels": [<?php echo $xLabel; ?>],

            },

            "scale-y": {

                "line-color": "#f6f7f8",

                "shadow": 0,

                "guide": {

                    "line-style": "dashed"

                },

                "label": {

                    "text": "",

                },

                "minor-ticks": 0,
                /*'min-value':-4.5,

                'max-value':4,
                'step':4,*/

                "thousands-separator": ","

            },

            "crosshair-x": {

                "line-color": "#efefef",

                "plot-label": {

                    "border-radius": "5px",

                    "border-width": "2px",

                    "border-color": "#063853",

                    "padding": "10px",

                    "font-weight": "bold",

                },

                "scale-label": {

                    "font-color": "#fff",

                    "background-color": "#063853",

                    "border-radius": "5px"

                }

            },

            "tooltip": {

                "visible": false

            },

            "plot": {
                tooltip: {
                          text: "%t views: %v%<br>%k%"
                        },

                "highlight":true,

                //"tooltip-text": "%t views: %v%<br>%k%",

                "shadow": 0,

                "line-width": "2px",

                "marker": {

                    "type": "circle",

                    "size": 3

                },

                "highlight-state": {

                    "line-width":3

                },

                "animation":{

                  "effect":1,

                  "sequence":2,

                  "speed":100,

                }

            },

            series: chartData

        };



 zingchart.bind('myChart-20s', 'contextmenu', function(p) {

  return false;

});

zingchart.render({ 

    id : 'myChart-20s', 

    data : myConfigSeasonalAnalysis, 

    height: "500px", 

    width: "100%" ,

    padding:0,

    margin:0

});

/*Seasional analysis filter graph*/
renderFilterSeasionalAalysisGraph(<?php echo $myConfigSeasonalAnalysis; ?>);
function renderFilterSeasionalAalysisGraph(graphsConfig)
{
    zingchart.render({ 
        id : 'myChart-21s', 
        data : graphsConfig,
        height: "400px",
        width: "100%" ,
        padding:0,
        margin:0
    });
}
function filterSeasionalAnalysisChange(th)
{
    var startDate = $(".seasionalStartDate option:selected").val();
    var endDate = $(".seasionalEndDate option:selected").val();
    if(parseInt(startDate)>parseInt(endDate))
    {
        return false;
    }
    $.ajax({
          url:'<?php echo base_url("users/portfolio/filterSeasionalAnalysisByStartEndDate"); ?>',
          method:'POST',
          data:{stock_id:"<?php echo $this->uri->segment(5); ?>",startDate:startDate,endDate:endDate},
          dataType:'html',
          success:function(data)
          { 
            //console.log(data);
            var res = JSON.parse(data);
            var graphs = res['myConfigSeasonalAnalysis'];
            console.log(res);
            renderFilterSeasionalAalysisGraph(graphs);
            $('.checkBetweenStartdateEndDate .NumberOfdays').html(res['durations']+' Days');
            $('.checkBetweenStartdateEndDate .totalNumOfNeg').html(res['numberOfNegativeDays']);
            $('.checkBetweenStartdateEndDate .totalNumOfPos').html(res['numberOfPositiveDays']);
            $('.checkBetweenStartdateEndDate .totalSum').html(res['numberOfTotalDays']);
            $('.checkBetweenStartdateEndDate .probabalityli').html(res['probabalityli']+'%');
            //$('.probabalityli').html(res['lossRatioPercentage']+'%');
            $('.checkBetweenStartdateEndDate .performanceLast10Years').html(res['performanceLast10Years']+'%');
            $('.checkBetweenStartdateEndDate .performanceBefore10Years').html(res['performanceBefore10Years']+'%');
            $('.checkBetweenStartdateEndDate .performanceLast20Years').html(res['performanceLast20Years']+'%');

          }

      });
}
/*Seasional analysis filter graph*/
$(document).on('click','.changeAverageOrEvolutions',function(){
    var parameter = $(this).attr('dataid');
    $('.changeAverageOrEvolutions').removeClass('btn-success');
    $(this).addClass('btn-success');
    var url = "<?php echo base_url("users/portfolio/changeSimpleAverageToAverageEvolutions"); ?>"+"?stock_id="+"<?php echo $this->uri->segment(5); ?>"+"&parameter="+parameter;
        $('.loader-image').show();
        $('body').addClass('loader');
       zingchart.exec('myChart-20s', 'reload');
        let output = zingchart.exec('myChart-20s', 'load', {
                        dataurl: url
                      });
        setTimeout(function(){ $('.loader-image').hide(); }, 1000);
        $('body').removeClass('loader');
});

/*

************************************************************************

Seasional Analysis Graphp Dynamic

************************************************************************

*/

function getSeasionalAnalysisChartDataAjax(StarDate,EndDate)

{


        var url = "<?php echo base_url("users/portfolio/getSeaionAnalysisChartDataAjax"); ?>"+"?stock_id="+"<?php echo $this->uri->segment(5); ?>"+"&startDate="+StarDate+"&endDate="+EndDate;

       //alert(url);

        $('.loader-image').show();

        $('body').addClass('loader');

       zingchart.exec('myChart-20s', 'reload');

        let output = zingchart.exec('myChart-20s', 'load', {

                        dataurl: url

                      });

        setTimeout(function(){ $('.loader-image').hide(); }, 1000);

        $('body').removeClass('loader');

}


renderFilterFinalGraphpSeasionalAalysisGraph(<?php echo $myConfigSeasonalAnalysisFinalGraphp; ?>,'myChart21sFinalThreeLine');

/*renderFilterFinalGraphpSeasionalAalysisGraph(<?php echo $myConfigSeasonalAnalysisFinalGraphp; ?>,'myChartFinalSeasional');
renderFilterFinalGraphpSeasionalAalysisGraph(<?php echo $myConfigSeasonalAnalysisFinalGraphpLastTwentyYears; ?>,'myChartFinalSeasionalLast20Years');
renderFilterFinalGraphpSeasionalAalysisGraph(<?php echo $myConfigSeasonalAnalysisFinalGraphpPreviousTenYears; ?>,'myChartFinalSeasionalPrevious10Years');*/
function renderFilterFinalGraphpSeasionalAalysisGraph(graphsConfig,graphID)
{
    zingchart.render({ 
        id : graphID, 
        data : graphsConfig,
        height: "400px",
        width: "100%" ,
        padding:0,
        margin:0
    });
}
function getSeasionalAnalysisChange(th)
{
    var startDate = $(".seasionalStartDate1 option:selected").val();
    var endDate = $(".seasionalEndDate1 option:selected").val();
    //alert(endDate);
    if(startDate=="" || endDate=="")
    {
        return false;
    }
    $('.loader-image').show();
    $('body').addClass('loader');

    $.ajax({
          url:'<?php echo base_url("users/portfolio/getSeasionalFinalAnalysisPerformancePropb"); ?>',
          method:'POST',
          data:{stock_id:"<?php echo $this->uri->segment(5); ?>",startDate:startDate,endDate:endDate},
          dataType:'html',
          success:function(data)
          { 
            setTimeout(function(){ $('.loader-image').hide(); }, 1000);
            $('body').removeClass('loader');
            console.log(data);
            var res = JSON.parse(data);
            if(res['yearsAvailability']==1)
            {
                var finalGraphZing = res['finalGraphZing'];
                if(res['noRecordFound']==1)
                {
                    alert('No record found that you have selected profit and probability');
                    $('#finalProbProfitChartId').hide();
                }
                else
                {
                    $('#finalProbProfitChartId').show();
                }
                renderFilterFinalGraphpSeasionalAalysisGraph(finalGraphZing,'myChart21sFinalThreeLine');
                //Final Result
                $('.finalGetStartDate').html(res['startDateFinal']);
                $('.finalGetEndDate').html(res['endDateFinal']);
                $('.finalProbProfitGet .NumberOfdays').html(res['finaltotalDays']+' Days');
                $('.finalProbProfitGet .totalNumOfNeg').html(res['finalnumOfnegativeYears']);
                $('.finalProbProfitGet .totalNumOfPos').html(res['finalnumOfPostiveYears']);
                //$('.finalProbProfitGet .totalSum').html(res['finalPerProbabilityPreviousTenYears']['numberOfTotalDays']);
                $('.finalProbProfitGet .probabalityli').html(res['finalProbability']+'%');
                $('.finalProbProfitGet .performanceLast10Years').html(res['finalFilterPerformaceLast10Years']+'%');
                $('.finalProbProfitGet .performanceLast20Years').html(res['finalFilterPerformaceLast20Years']+'%');
                $('.finalProbProfitGet .performanceBefore10Years').html(res['finalFilterPerformacePrevious10Years']+'%');

                $('.last10YearsTitle').html(res['last10YeearData']);
                $('.previous10YearsTitle').html(res['previous10YeearData']);
                $('.last20YearsTitle').html(res['last20YeearData']);
                $('.totalNumberOfYearsCalCulation').html(res['totalNumberOfYearsCalCulation']);
            }
            else
            {
                alert('No record availble for this stock');
                $('#finalProbProfitChartId').hide();
            }
            
            
          }

      });
}







</script>

<script type="text/javascript">

    $(document).ready(function(){

        //

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



                getChartDataAjax(period,parameter,firstDeviation,secondDeviation,percentile99_1);

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

                getChartDataAjax(period,parameter,firstDeviation,secondDeviation,percentile99_1);

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



                getChartDataAjax(period,parameter,firstDeviation,secondDeviation,percentile99_1);

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

                getChartDataAjax(period,parameter,firstDeviation,secondDeviation,percentile99_1);

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

                getChartDataAjax(period,parameter,firstDeviation,secondDeviation,percentile99_1);

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

                getChartDataAjax(period,parameter,firstDeviation,secondDeviation,percentile99_1);

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

                getChartDataAjax(period,parameter,firstDeviation,secondDeviation,percentile99_1);

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



                    getChartDataAjax(period,parameter,firstDeviation,secondDeviation,percentile99_1);

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

                    getChartDataAjax(period,parameter,firstDeviation,secondDeviation,percentile99_1);

                }

            }

            

        });





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

            $('.stock-details-step-1').hide();

            $('.stock-details-step-2').show();

            $('.stock-details-step-3').hide();

            $('.stock-details-step-4').hide();

            });

         $('#step-details-id-2-1').click(function(){

            $('.stock-details-step-1').show();

            $('.stock-details-step-2').hide();

            $('.stock-details-step-3').hide();

            $('.stock-details-step-4').hide();

            });

         $('#step-details-id-1-2').click(function(){

            $('.stock-details-step-1').hide();

            $('.stock-details-step-2').hide();

            $('.stock-details-step-3').show();

            $('.stock-details-step-4').hide();

         });

         $('#step-details-id-2-2').click(function(){

            $('.stock-details-step-1').hide();

            $('.stock-details-step-2').hide();

            $('.stock-details-step-3').show();

            $('.stock-details-step-4').hide();

         });



         $('#step-details-id-3-2').click(function(){

            $('.stock-details-step-1').hide();

            $('.stock-details-step-2').show();

            $('.stock-details-step-3').hide();

            $('.stock-details-step-4').hide();

            });

         $('#step-details-id-3-1').click(function(){

            $('.stock-details-step-1').show();

            $('.stock-details-step-2').hide();

            $('.stock-details-step-3').hide();

            $('.stock-details-step-4').hide();

         });

         $('#step-details-id-3-3').click(function(){

            $('.stock-details-step-1').hide();

            $('.stock-details-step-2').hide();

            $('.stock-details-step-3').show();

            $('.stock-details-step-4').hide();

         });



         $('#step-details-id-4-3').click(function(){

            $('.stock-details-step-1').hide();

            $('.stock-details-step-2').hide();

            $('.stock-details-step-3').hide();

            $('.stock-details-step-4').show();

         });

          $('#step-details-id-1-3').click(function(){

            $('.stock-details-step-1').hide();

            $('.stock-details-step-2').hide();

            $('.stock-details-step-3').hide();

            $('.stock-details-step-4').show();

         });

          //

          $('#step-details-id-4-1').click(function(){

            $('.stock-details-step-1').show();

            $('.stock-details-step-2').hide();

            $('.stock-details-step-3').hide();

            $('.stock-details-step-4').hide();

         });



          $('#step-details-id-4-2').click(function(){

            $('.stock-details-step-1').hide();

            $('.stock-details-step-2').show();

            $('.stock-details-step-3').hide();

            $('.stock-details-step-4').hide();

         });



          $('#step-details-id-2-3').click(function(){

            $('.stock-details-step-1').hide();

            $('.stock-details-step-2').hide();

            $('.stock-details-step-3').hide();

            $('.stock-details-step-4').show();

         });

    });

</script>



<!-- Ratio Chart start from here -->

<script>

    //borrowing

    var debtRatiosBorrowingChartConfig = {

    "gui":{ 

          "contextMenu":{ 

            "button":{ 

              "visible": false 

            } 

          } 

        },

      "type":"pie",

      "title":{

        "text":"Borrowing",

        "margin-top":"50%",

        "font-size":"12px",

      },

      "scale-r":{

        "ref-angle":270 //relative to starting 90 degree position

      },

      "tooltip": {

            "visible": false

        },

      "plot":{

        "value-box":{

            "visible":false

        },

        "slice":"80%"

      },

      "series": [

        {

          "values":[100],

          'background-color': "<?php echo $fundamentalArr['borrowingRatio']; ?>"

        },

        

      ]

    };

zingchart.bind('debtRatiosBorrowingChart', 'contextmenu', function(p) {

  return false;

});

zingchart.render({ 

  id : 'debtRatiosBorrowingChart', 

  data : debtRatiosBorrowingChartConfig, 

  height: "130px", 

  width: "130px" 

});

//Debt Quality

var debtRatiosDebtQualityChartConfig = {

    "gui":{ 

          "contextMenu":{ 

            "button":{ 

              "visible": false 

            } 

          } 

        },

      "type":"pie",

      "title":{

        "text":"Quality",

        "margin-top":"50%",

        "font-size":"12px",

      },

      "scale-r":{

        "ref-angle":270 //relative to starting 90 degree position

      },

      "tooltip": {

            "visible": false

        },

      "plot":{

        "value-box":{

            "visible":false

        },

        "slice":"80%"

      },

      "series": [

        {

          "values":[100],

          'background-color': "<?php echo $fundamentalArr['debtQualityRatio']; ?>"

        },

        

      ]

    };

zingchart.bind('debtRatiosDebtQualityChart', 'contextmenu', function(p) {

  return false;

});

zingchart.render({ 

  id : 'debtRatiosDebtQualityChart', 

  data : debtRatiosDebtQualityChartConfig, 

  height: "130px", 

  width: "130px",

});



//Debt Capacity Chart

/*var debtRatiosCapacityChartConfig = {

      "type":"pie",

      "title":{

        "text":""

      },

      "scale-r":{

        "ref-angle":270 //relative to starting 90 degree position

      },

      "plot":{

        "value-box":{

            "visible":false

        },

        "slice":"85%"

      },

      "series": [

        {

          "values":[100],

          'background-color': "#29a2cc"

        },

        

      ]

    };



zingchart.render({ 

  id : 'debtRatiosCapacityChart', 

  data : debtRatiosCapacityChartConfig, 

  height: "130px", 

  width: "130px",

});*/



//Liquidity  Liquidity - positive chart

var liquidityRatiosLiquidityChartConfig = {

    "gui":{ 

          "contextMenu":{ 

            "button":{ 

              "visible": false 

            } 

          } 

        },

      "type":"pie",

      "title":{

        "text":"Liquidity",

        "margin-top":"50%",

        "font-size":"12px",

      },

      "scale-r":{

        "ref-angle":270 //relative to starting 90 degree position

      },

      "tooltip": {

            "visible": false

        },

      "plot":{

        "value-box":{

            "visible":false

        },

        "slice":"80%"

      },

      "series": [

        {

          "values":[100],

          'background-color': "<?php echo $fundamentalArr['liquidityRatiosLiquidityColor']; ?>"

        },

        

      ]

    };

zingchart.bind('liquidityRatiosLiquidityChart', 'contextmenu', function(p) {

  return false;

});

zingchart.render({ 

  id : 'liquidityRatiosLiquidityChart', 

  data : liquidityRatiosLiquidityChartConfig, 

  height: "130px", 

  width: "130px",

});



//Liquidity  Treasury (Cash) - positive

var liquidityRatiosTreasuryChartConfig = {

    "gui":{ 

          "contextMenu":{ 

            "button":{ 

              "visible": false 

            } 

          } 

        },

      "type":"pie",

      "title":{

        "text":"Treasury",

        "margin-top":"50%",

        "font-size":"12px",

      },

      "scale-r":{

        "ref-angle":270 //relative to starting 90 degree position

      },

      "tooltip": {

            "visible": false

        },

      "plot":{

        "value-box":{

            "visible":false

        },

        "slice":"80%"

      },

      "series": [

        {

          "values":[100],

          'background-color': "<?php echo $fundamentalArr['liquidityRatiosTreasuryColor']; ?>"

        },

        

      ]

    };

zingchart.bind('liquidityRatiosTreasuryChart', 'contextmenu', function(p) {

  return false;

});

zingchart.render({ 

  id : 'liquidityRatiosTreasuryChart', 

  data : liquidityRatiosTreasuryChartConfig, 

  height: "130px", 

  width: "130px",

});



//Liquidity  Acid Test - red

var liquidityRatiosAcidTestChartConfig = {

    "gui":{ 

          "contextMenu":{ 

            "button":{ 

              "visible": false 

            } 

          } 

        },

      "type":"pie",

      "title":{

        "text":"Acid Test",

        "margin-top":"50%",

        "font-size":"12px",

      },

      "scale-r":{

        "ref-angle":270 //relative to starting 90 degree position

      },

      "tooltip": {

            "visible": false

        },

      "plot":{

        "value-box":{

            "visible":false

        },

        "slice":"80%"

      },

      "series": [

        {

          "values":[100],

          'background-color': "<?php echo $fundamentalArr['liquidityRatiosAcidTestColor']; ?>"

        },

        

      ]

    };

zingchart.bind('liquidityRatiosAcidTestChart', 'contextmenu', function(p) {

  return false;

});

zingchart.render({ 

  id : 'liquidityRatiosAcidTestChart', 

  data : liquidityRatiosAcidTestChartConfig, 

  height: "130px", 

  width: "130px",

});



//Other  PER

var otherRatiosPERChartChartConfig = {

    "gui":{ 

          "contextMenu":{ 

            "button":{ 

              "visible": false 

            } 

          } 

        },

      "type":"pie",

      "title":{

        "text":"<?php echo $fundamentalArr['forwardPE_PER']; ?>",

        "margin-top":"50%",

        "font-size":"12px",

      },

      "scale-r":{

        "ref-angle":270 //relative to starting 90 degree position

      },

      "tooltip": {

            "visible": false

        },

      "plot":{

        "value-box":{

            "visible":false

        },

        "slice":"80%"

      },

      "series": [

        {

          "values":[100],

          'background-color': "#000"

        },

        

      ]

    };

zingchart.bind('otherRatiosPERChart', 'contextmenu', function(p) {

  return false;

});

zingchart.render({ 

  id : 'otherRatiosPERChart', 

  data : otherRatiosPERChartChartConfig, 

  height: "125px", 

  width: "125px",

});

//other PEG otherRatiosPEGChart

var otherRatiosPEGChartConfig = {

    "gui":{ 

          "contextMenu":{ 

            "button":{ 

              "visible": false 

            } 

          } 

        },

      "type":"pie",

      "title":{

        "text":"<?php echo $fundamentalArr['pegRatio_PEG']; ?>",

        "margin-top":"50%",

        "font-size":"12px",

      },

      "scale-r":{

        "ref-angle":270 //relative to starting 90 degree position

      },

      "tooltip": {

            "visible": false

        },

      "plot":{

        "value-box":{

            "visible":false

        },

        "slice":"80%"

      },

      "series": [

        {

          "values":[100],

          'background-color': "#000"

        },

        

      ]

    };

zingchart.bind('otherRatiosPEGChart', 'contextmenu', function(p) {

  return false;

});

zingchart.render({ 

  id : 'otherRatiosPEGChart', 

  data : otherRatiosPEGChartConfig, 

  height: "125px", 

  width: "125px",

});

//Other  Beta

var otherRatiosBetaChartConfig = {

    "gui":{ 

          "contextMenu":{ 

            "button":{ 

              "visible": false 

            } 

          } 

        },

      "type":"pie",

      "title":{

        "text":"<?php echo $fundamentalArr['beta']; ?>",

        "margin-top":"50%",

        "font-size":"12px",

      },

      "scale-r":{

        "ref-angle":270 //relative to starting 90 degree position

      },

      "tooltip": {

            "visible": false

        },

      "plot":{

        "value-box":{

            "visible":false

        },

        "slice":"80%"

      },

      "series": [

        {

          "values":[100],

          'background-color': "#000"

        },

        

      ]

    };

zingchart.bind('otherRatiosBetaChart', 'contextmenu', function(p) {

  return false;

});

zingchart.render({ 

  id : 'otherRatiosBetaChart', 

  data : otherRatiosBetaChartConfig, 

  height: "125px", 

  width: "125px",

});





//Other  Earnings per Dividend

var otherRatiosEarningsperDividendChartConfig = {

      "gui":{ 

          "contextMenu":{ 

            "button":{ 

              "visible": false 

            } 

          } 

      },

      "type":"pie",

      "title":{

        "text":"<?php echo $fundamentalArr['dividendRate']; ?>",

        "margin-top":"50%",

        "font-size":"12px",

      },

      "scale-r":{

        "ref-angle":270 //relative to starting 90 degree position

      },

      "tooltip": {

            "visible": false

        },

      "plot":{

        "value-box":{

            "visible":false

        },

        "slice":"80%"

      },

      "series": [

        {

          "values":[100],

          'background-color': "#000"

        },

        

      ]

    };

zingchart.bind('otherRatiosEarningsperDividendChart', 'contextmenu', function(p) {

  return false;

});

zingchart.render({ 

  id : 'otherRatiosEarningsperDividendChart', 

  data : otherRatiosEarningsperDividendChartConfig, 

  height: "125px", 

  width: "125px",

});



//Other  Operating Margins

var otherRatiosOperatingMarginsChartConfig = {

    "gui":{ 

          "contextMenu":{ 

            "button":{ 

              "visible": false 

            } 

          } 

      },

      "type":"pie",

      "title":{

        "text":"<?php echo $fundamentalArr['operatingMargins']; ?>",

        "margin-top":"50%",

        "font-size":"12px",

      },

      "scale-r":{

        "ref-angle":270 //relative to starting 90 degree position

      },

      "tooltip": {

            "visible": false

        },

      "plot":{

        "value-box":{

            "visible":false

        },

        "slice":"80%"

      },

      "series": [

        {

          "values":[100],

          'background-color': "#000"

        },

        

      ]

    };

zingchart.bind('otherRatiosOperatingMargins', 'contextmenu', function(p) {

  return false;

});

zingchart.render({ 

  id : 'otherRatiosOperatingMargins', 

  data : otherRatiosOperatingMarginsChartConfig, 

  height: "125px", 

  width: "125px",

});

  </script>

<!-- Fundamental Chart Start -->

<script type="text/javascript">

            var myConfigMainChart = 

            {

                "gui":{ 

                  "contextMenu":{ 

                    "button":{ 

                      "visible": false 

                    } 

                  } 

              },

            "type": "bar",

            "utc": true,

            "plotarea": {

                "margin": "dynamic 45 60 dynamic",

            },



            "scale-x": {

                "labels": [""],

            },

            "scale-y": {

                format: "%v%",

            },



            /*"tooltip": {

                "visible": true

            },*/

            "plot": {

                stacked:true,

                stackType:"normal",

               /* 'value-box': {

                  text: "%v%",

                  placement: "middle",

                  'font-color': "white"

                },*/

                "tooltip": {

                  "text": "%t : %v%",

                  "font-color": "white",

                  "font-family": "Roboto",

                  "font-size": 12,

                  "font-weight": "normal",

                  "font-style": "normal"

                }

            },

            "series": [

                

                {

                    "values": [<?php /*echo 26;*/echo $fundamentalArr['currentAssetsPercentage']; ?>,

                    ],

                    'background-color': "#063853",

                    'text':"Current Assets",

                },

                {

                    "values": [<?php /*echo 74;*/echo $fundamentalArr['nonCurrentAssetsPercentage']; ?>],

                    'background-color': "#64d641",

                    'text':"Non Current Assets",

                },

            ]

        };

zingchart.bind('fundametalMainChart', 'contextmenu', function(p) {

  return false;

});

zingchart.render({ 

    id : 'fundametalMainChart', 

    data : myConfigMainChart, 

    height: '100%', 

    width: '270px',

    margin:'0px',

    padding:'0px'

});

//main chart second one

var myConfigSecondMainChart = 

            {

            "gui":{ 

                  "contextMenu":{ 

                    "button":{ 

                      "visible": false 

                    } 

                  } 

              },

            "type": "bar",

            "utc": true,

            "plotarea": {

                "margin": "dynamic 45 60 dynamic",

            },



            "scale-x": {

                "labels": [""],

            },

            "scale-y": {

                format: "%v%",

                "line-color":"none",

                "item":{

                  "visible":false

                },

                "tick":{

                  "line-color":"none"

                }

            },



            /*"tooltip": {

                "visible": true

            },*/

            "plot": {

                stacked:true,

                stackType:"normal",

                /*'value-box': {

                  text: "%v%",

                  placement: "middle",

                  'font-color': "white"

                },*/

                "tooltip": {

                  "text": "%t : %v%",

                  "font-color": "white",

                  "font-family": "Roboto",

                  "font-size": 12,

                  "font-weight": "normal",

                  "font-style": "normal"

                }

            },

            "series": [               

                

                {

                    "values": [<?php /*echo '24'; */echo $fundamentalArr['currentLiabilitiesPercentage']; ?>],

                    'background-color': "#063853",

                    'text':'Current Liabilities',

                },

                {

                    "values": [<?php /*echo '54'; */echo $fundamentalArr['NoncurrentLiabilitiesPercentage']; ?>],

                    'background-color': "#64d641",

                    'text':'Non Current Liabilities',

                },

                {

                    "values": [<?php /*echo '22'; */echo $fundamentalArr['equityPercentage']; ?>],

                    'background-color': "#1ea2fb",

                    'text':'Equity',

                },

            ]

        };

zingchart.bind('fundametalSecondMainChart', 'contextmenu', function(p) {

  return false;

});

zingchart.render({ 

    id : 'fundametalSecondMainChart', 

    data : myConfigSecondMainChart, 

    height: '100%', 

    width: '230px',

    margin:'0px',

    padding:'0px', 

});

//fundamental details chart

var myConfigDetailsChart = 

        {

            "gui":{ 

                  "contextMenu":{ 

                    "button":{ 

                      "visible": false 

                    } 

                  } 

              },

            "type": "bar",

            "utc": true,

            "plotarea": {

                "margin": "dynamic 45 60 dynamic",

            },

        /*    "legend": {

                "layout": "x3",

                "overflow": "page",

                "alpha": 0.05,

                "shadow": false,

                "align":"center",

                "adjust-layout":true,

                "marker": {

                    "type": "circle",

                    "border-color": "none",

                    "size": "1px"

                },

            },*/



            "scale-x": {

                "labels": [""],

            },

            "scale-y": {

                format: "%v%",

            },



            /*"tooltip": {

                "visible": true

            },*/

            "plot": {

                stacked:true,

                stackType:"normal",

                /*'value-box': {

                  text: "%v%",

                  placement: "middle",

                  'font-color': "white"

                },*/

                "tooltip": {

                  "text": "%t : %v%",

                  "font-color": "white",

                  "font-family": "Roboto",

                  "font-size": 12,

                  "font-weight": "normal",

                  "font-style": "normal"

                }

            },

            "series": [

                {

                    "values": [<?php /*echo '8';*/echo $fundamentalArr['otherCurrentAssetsPercentage']; ?>],

                    'background-color': "#7434eb",

                    'text':'Other Current Assets',

                },

                {

                    "values": [<?php /*echo '5'; */echo $fundamentalArr['inventoryPercentage']; ?>],

                    'background-color': "#1e34fb",

                    'text':'Inventory',

                },

                {

                    "values": [<?php /*echo '6'; */echo $fundamentalArr['netReceivablesPercentage']; ?>],

                    'background-color': "#1e7afb",

                    'text':'Net Receivables',

                },

                {

                    "values": [<?php /*echo '7'; */echo $fundamentalArr['cashPercentage']; ?>],

                    'background-color': "#1ea2fb",

                    'text':'Cash',

                },

                {

                    "values": [<?php /*echo '74'; */echo $fundamentalArr['nonCurrentAssetsPercentage']; ?>],

                    'background-color': "#64d641",

                    'text':'Non Current Assets',

                },

            ]

        };

zingchart.bind('fundametalDetailsChart', 'contextmenu', function(p) {

  return false;

});

zingchart.render({ 

    id : 'fundametalDetailsChart', 

    data : myConfigDetailsChart, 

    height: '100%', 

    width: '270px',

    margin:'0px',

    padding:'0px' 

});

</script>

<script type="text/javascript">

   

    $(document).on('click',"#fundametalMainChart-top",function(){

        $("#fundametalMainChart").hide();

        $("#fundametalDetailsChart").css('display','block');

    });

    $(document).on('click',"#fundametalDetailsChart-top",function(){

        $("#fundametalMainChart").show();

        $("#fundametalDetailsChart").css('display','none');

    });

</script>



</body>

</html>