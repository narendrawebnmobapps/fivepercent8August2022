<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url('assets/users'); ?>/images/favicons.png" type="images/x-icon" />
    <title>Options Portforlio</title>
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
    <!--<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <style type="text/css">
        #wrapper{
            padding: 0;
        }
        #page-wrapper{
            padding: 0;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="" id="main">
                    <div class="" id="content">
                        <div class="bradcrum-list">
                            <ul>
                                <li><?php echo $stock_details->stock_name; ?></li>
                            </ul>
                        </div>
                    </div>
                    

                    <style type="text/css">
                    	#myChart12222 #myChart12222-license-text,#myChartSimulation #myChartSimulation-license-text{display: none;}
                        .right-btn-back h4 a {
                        background-color: #042739;
                        font-size: 14px;
                        border-radius: 6px;
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

                        .options-list-tabs-view ul{
                            padding: 0;
                                margin-bottom: 20px;
                        }

                        .options-list-tabs-view ul li{
                            list-style: none;
                            display: inline-block;
                            margin-right: 16px;
                                                }

                        .options-list-tabs-view ul li a{
                            border: 2px solid #063853;
                            padding: 5px 18px;
                            border-radius: 3px;
                            font-size: 14px;
                            font-weight: 600;
                            color: #063853;
                            line-height: 16px;
                            transition: all 0.5s ease;
                                                }

                        .options-list-tabs-view ul li a:hover{
                            background-color: #063853;
                                color: #fff;
                                border-color: #063853;
                                text-decoration: none;
                                                    }

                        .options-list-tabs-view ul li a.active-options{
                            background-color: #063853;
                            color: #fff;
                            border-color: #063853;
                                                }

                    .options-list-tabs-view ul li a:focus{
                        text-decoration: none;
                    }

                    .options-list-tabs-view h2 {
                        font-size: 20px;
                        text-transform: uppercase;
                        margin: 0px 0px 9px 0px;
                        font-weight: 700; }
                   
                        .blance-sheet-info .resume-document ul {
                            margin-top: 15px;}
    
                        .otmTitle{
                            font-size: 16px;
                            text-align: center;
                            background: #50c6fb;
                            padding: 2px 10px;
                            line-height: 20px;
                            margin: auto;
                            display: table;
                        }
                        .moneynessOne {
                            margin-top: 40px;
                        }
                        .moneynessOne table tbody tr{
                            background: #fff;
                        }
                        .moneynessOne table tbody tr td{
                            border: 1px solid #000;
                            color: #000;
                            line-height: 12px;
                            font-size: 14px;
                            text-align: center;
                        }
                        .moneynessOne table tbody tr td.skyblue_bg{
                            background: #50c6fb;
                            font-weight: 600;
                        }
                        .moneynessOne table tbody tr td.orange_bg{
                            background: #ed7d31;
                            font-weight: 600;
                        }
                        .moneynessOne table tbody tr td.red_bg{
                            background: #f00;
                            font-weight: 600;
                        }
                        .moneynessOne table tbody tr td.green_bg{
                            background: #70ad47;
                            font-weight: 600;
                        }

                        .premiumTable tbody tr td{
                            font-weight: 600;
                        }
                        .greekstable {
                            width: 275px;
                            margin: 0 auto;
                        }
                        .greekstable h6{
                            font-size: 17px;
                            text-align: center;
                            font-weight: 500;
                        }
                      .totalPremium{
                           background: #70ad47;
                            padding: 4px 10px;
                            text-align: center;
                            margin: auto;
                            display: table;
                            margin-bottom: 24px;
                      }
                      .totalPremium p{
                        margin-bottom: 0;
                        color: #000;
                        font-weight: 500;
                      }
                      td.padd0{
                        padding: 0 !important;
                      }
                      td.padd0 input {
                        margin-top: 3px;
                      }
                      .moneyness{
                        margin-bottom: 0;
                        text-align: center;
                        color: #50c6fb;
                      }
                      .list-sec-prt-blow ul li {
                        padding: 4px 17px;
                        margin-bottom: 6px;
                        border: 1px solid #ccc;
                        padding: 4px 17px;
                    }
                    .list-sec-prt-blow ul li:nth-child(2) {
                        color: inherit; 
                    }
                    /********************************/
                 /*   .option-resume-list>li.active>a.s_call, .option-resume-list>li.active>a.s_call:focus, .option-resume-list>li a.s_call:hover {
                        color: #063853;
                        cursor: default;
                        background-color: #50c6fb;
                        border: 2px solid #50c6fb;
                    }
                    .option-resume-list>li.active>a.s_put, .option-resume-list>li.active>a.s_put:focus, .option-resume-list>li a.s_put:hover {
                        color: #063853;
                        cursor: default;
                        background-color: #ed7d31;
                        border: 2px solid #ed7d31;
                    }*/
                    .option-resume-list li.activeBlue a {
                        background: #50c6fb;
                        border: 2px solid #50c6fb !important;
                    }
                    .options-list-tabs-view ul li.activeBlue a:hover {
                        background-color: #50c6fb;
                        color: #fff;
                        border-color: #50c6fb;
                    }
                    .option-resume-list li.activeOrange a {
                        background: #ed7d31;
                        border: 2px solid #ed7d31 !important;
                    }

                    .options-list-tabs-view ul li.activeOrange a:hover {
                        background-color: #ed7d31;
                        color: #fff;
                        border-color: #ed7d31;
                    }
                    .nav-tabs>li.active>a.option1, .nav-tabs>li.active>a.option1:focus, .nav-tabs>li a.option1:hover {
                        color: #063853;
                        cursor: default;
                        background-color: #50c6fb;
                        border: 2px solid #50c6fb;
                        border-bottom-color: transparent;
                    }
                    .nav-tabs>li.active>a.option2, .nav-tabs>li.active>a.option2:focus, .nav-tabs>li a.option2:hover {
                        color: #063853;
                        cursor: default;
                        background-color: #ed7d31;
                        border: 2px solid #ed7d31;
                        border-bottom-color: transparent;
                    }
                    .nav-tabs>li.active>a.totle, .nav-tabs>li.active>a.totle:focus, .nav-tabs>li a.totle:hover {
                        color: #063853;
                        cursor: default;
                        background-color: #70ad47;
                        border: 2px solid #70ad47;
                        border-bottom-color: transparent;
                    }
                    .list-sec-prt-blow ul li {
                        display: block;
                    }
                    .list-sec-prt-blow ul li span{
                            width: 60px;
                            display: inline-block;
                            text-align: right;
                            padding-right: 12px;
                    }
                   @media only screen and (max-width: 767px) {
                    .resume-parts {
                            width: 100%;
                            display: inline-block;
                        }
                    .bradcrum-list {
                            margin-top: 20px;
                        }
                    .bradcrum-list ul {
                            padding: 0px;
                            margin-top: 0px;
                        }
                   }
                   @media only screen and (max-width: 568px) {
                        .options-list-tabs-view ul li {
                            margin-right: 0px;
                        }
                       /* .list-sec-prt-blow ul li:nth-child(1) {
                            border: 1px solid #ccc;
                            padding: 4px 7px;
                        }*/
                        .list-sec-prt-blow ul li {
                        padding: 4px 8px !important;
                    }
                    }
                    @media only screen and (max-width: 414px) {
                        .list-sec-prt-blow ul li {
                            padding: 4px 2px !important;
                            font-size: 13px;
                        }
                        .options-list-tabs-view ul li a {
                            border: 2px solid #063853;
                            padding: 5px 14px;
                            border-radius: 3px;
                            font-size: 12px;
                        }
                        .list-sec-prt-blow ul li span {
                            width: 44px;
                            display: inline-block;
                            text-align: right;
                            padding-right: 7px;
                        }
                    }
                    </style>
                    <!-- TradingView Widget BEGIN -->
                    <div class="loader-image" style="display: none;"><img src="<?php echo base_url('assets/users/images/loading.gif') ?>"></div>
                    <!-- Blance Sheet Section Start Here Part-4-->
                    <div class="resume-parts">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="options-list-tabs-view">
                                    <h2>Option <?php echo $stock_details->stock_name; ?></h2>
                                    <ul class="option-resume-list">
                                        <input type="hidden" name="" value="C_CALL" id="sellBuyCallPut1">
                                        <input type="hidden" name="" value="C_CALL" id="sellBuyCallPut2">
                                        <li id="C_CALL"><a href="javascript:void(0)"  class="s_call">S/CALL</a></li>
                                        <li id="V_CALL"><a href="javascript:void(0)"  class="s_put">S/PUT</a></li>
                                        <li id="C_PVT"><a href="javascript:void(0)"  class="s_call">B/CALL</a></li>
                                        <li id="V_PVT"><a href="javascript:void(0)"  class="s_put">B/PUT</a></li>
                                    </ul>
                                </div>
                                <div class="blance-sheet-info ">
                                    <div class="list-income-info">
                                        <div class="list-sec-prt-blow">
                                            <ul>
                                                <li><span>($)</span><input id="actualPrice" type="text" name="" value="8500"> Actual Price</li>
                                                <li><span>(Days)</span><input id="baseDays" type="text" name="" value="365"> Base</li>
                                                <li><span>(Days)</span><input id="maturityDyas" type="text" name="" value="30"> Maturity</li>
                                                <li><span>(%)</span><input id="volalitilyInput" type="text" name="" value="20"> Volalitily</li>
                                                <li><span>(%)</span><input id="interestInput" type="text" name="" value="0.00"> Interest</li>
                                                <li><span>($)</span><input id="dividendInput" type="text" name="" value="0.00"> Dividend</li>
                                            </ul>
                                        </div>
                                        <!-- <div id="myChart12222" style="height: 326px; width: 100%;"></div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 options-list-tabs-view">
                                  <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#tab1" class="option1">Option 1</a></li>
                                    <li><a data-toggle="tab" href="#tab2" class="option2">Option 2</a></li>
                                    <li><a data-toggle="tab" href="#tab3" class="totle">Total</a></li>
                                  </ul>
                                  <div class="tab-content">
                                    <div id="tab1" class="tab-pane fade in active">
                                      <p class="moneyness">Moneyness 1</p>
                                      <h6 class="otmTitle otmTitle1">
                                        <?php if(($optionsOneVal['moneyNess']*100)<100){ ?>
                                            <?php echo number_format(($optionsOneVal['moneyNess']*100),2,".",""); ?>% <span>ITM</span>
                                        <?php } else if(($optionsOneVal['moneyNess']*100)>100){ ?>
                                            <?php echo number_format(($optionsOneVal['moneyNess']*100),2,".",""); ?>% <span>OTM</span>
                                        <?php } else if(($optionsOneVal['moneyNess']*100)==100) { ?>  
                                            <?php echo number_format(($optionsOneVal['moneyNess']*100),2,".",""); ?>% <span>ATM</span>
                                        <?php } ?> 
                                      </h6>
                                      <div class="moneynessOne">
                                        <div class="table-responsiv">
                                          <table class="table table-bordered">
                                              <tbody>
                                                  <tr>
                                                      <td class="skyblue_bg">Strike Price</td>
                                                      <td class="padd0"><input id="strikePriceInput1" value="8300.00" type="text" name="" placeholder="8300.00"></td>
                                                      <!-- <td class="skyblue_bg">Buy | Sell</td> -->
                                                      <!-- <td>Sell</td>
                                                      <td class="skyblue_bg">CAll | PUT</td>
                                                      <td>CALL</td> -->
                                                  </tr>
                                              </tbody>
                                          </table>

                                          <table class="table table-bordered premiumTable">
                                              <tbody>
                                                  <tr>
                                                    <td class="skyblue_bg">Premium</td>
                                                    <td class="option1CallValue"><?php echo number_format($optionsOneVal['callValue'],2,".",""); ?></td>
                                                    <td>IV</td>
                                                    <td class="option1intrinsicValueCall"><?php echo number_format($optionsOneVal['intrinsicValueCall'],2,".",""); ?></td>
                                                    <td>TV</td>
                                                    <td class="option1temporaryValueCall"><?php echo number_format($optionsOneVal['temporaryValueCall'],2,".",""); ?></td>
                                                  </tr>
                                              </tbody>
                                          </table>
                                      </div>

                                      <div class="greekstable">
                                        <h6>Greeks</h6>
                                          <table class="table table-bordered">
                                              <tr>
                                                  <td class="skyblue_bg">Delta</td>
                                                  <td class="skyblue_bg">Gamma</td>
                                                  <td class="skyblue_bg">Theta</td>
                                              </tr>
                                              <tr>
                                                  <td class="option1deltaCall"><?php echo number_format($optionsOneVal['deltaCall'],3,".",""); ?></td>
                                                  <td class="option1gamma"><?php echo number_format($optionsOneVal['gamma'],3,".",""); ?></td>
                                                  <td class="option1thetaCall"><?php echo number_format($optionsOneVal['thetaCall'],3,".",""); ?></td>
                                              </tr>
                                              <tr>
                                                  <td class="skyblue_bg">Vega</td>
                                                  <td class="skyblue_bg">Velga</td>
                                                  <td class="skyblue_bg">Vanna</td>
                                              </tr>
                                              <tr>
                                                  <td class="option1vega"><?php echo number_format($optionsOneVal['vega'],3,".",""); ?></td>
                                                  <td class="option1volga"><?php echo number_format($optionsOneVal['volga'],3,".",""); ?></td>
                                                  <td class="option1vanna"><?php echo number_format($optionsOneVal['vanna'],3,".",""); ?></td>
                                              </tr>
                                          </table>
                                      </div>
                                    </div>
                                </div><!-- End tab 2 -->

                                    <div id="tab2" class="tab-pane fade">
                                        <p class="moneyness" style="color: #ed7d31;">Moneyness 2</p>
                                       <h6 class="otmTitle otmTitle2" style="background: #ed7d31;">
                                            <?php if(($optionsTwoVal['moneyNess']*100)<100){ ?>
                                                <?php echo number_format(($optionsTwoVal['moneyNess']*100),2,".",""); ?>% <span>ITM</span>
                                            <?php } else if(($optionsTwoVal['moneyNess']*100)>100){ ?>
                                                <?php echo number_format(($optionsTwoVal['moneyNess']*100),2,".",""); ?>% <span>OTM</span>
                                            <?php } else if(($optionsTwoVal['moneyNess']*100)==100) { ?>  
                                                <?php echo number_format(($optionsTwoVal['moneyNess']*100),2,".",""); ?>% <span>ATM</span>
                                            <?php } ?> 
                                        </h6>
                                       <div class="moneynessOne">
                                        <div class="table-responsiv">
                                          <table class="table table-bordered">
                                              <tbody>
                                                  <tr>
                                                      <td class="orange_bg">Strike Price</td>
                                                      <td class="padd0"><input id="strikePriceInput2" id="8700.00" type="text" name="" placeholder="8700.00" value="8700.00"></td>
                                                      <!-- <td class="orange_bg">Buy | Sell</td> -->
                                                      <!-- <td>Sell</td>
                                                      <td class="orange_bg">CAll | PUT</td>
                                                      <td>CALL</td> -->
                                                  </tr>
                                              </tbody>
                                          </table>
                                          <table class="table table-bordered premiumTable">
                                              <tbody>
                                                  <tr>
                                                    <td class="orange_bg">Premium</td>
                                                    <td class="option2CallValue"><?php echo number_format($optionsTwoVal['callValue'],2,".",""); ?></td>
                                                    <td>IV</td>
                                                    <td class="option2intrinsicValueCall"><?php echo number_format($optionsTwoVal['intrinsicValueCall'],2,".",""); ?></td>
                                                    <td>TV</td>
                                                    <td class="option2temporaryValueCall"><?php echo number_format($optionsTwoVal['temporaryValueCall'],2,".",""); ?></td>
                                                  </tr>
                                              </tbody>
                                          </table>
                                      </div>
                                      
                                        <div class="greekstable">
                                          <table class="table table-bordered">
                                              <tr>
                                                  <td class="orange_bg">Delta</td>
                                                  <td class="orange_bg">Gamma</td>
                                                  <td class="orange_bg">Theta</td>
                                              </tr>
                                              <tr>
                                                  <td class="option2deltaCall"><?php echo number_format($optionsTwoVal['deltaCall'],3,".",""); ?></td>
                                                  <td class="option2gamma"><?php echo number_format($optionsTwoVal['gamma'],3,".",""); ?></td>
                                                  <td class="option2thetaCall"><?php echo number_format($optionsTwoVal['thetaCall'],3,".",""); ?></td>
                                              </tr>
                                              <tr>
                                                  <td class="orange_bg">Vega</td>
                                                  <td class="orange_bg">Velga</td>
                                                  <td class="orange_bg">Vanna</td>
                                              </tr>
                                              <tr>
                                                  <td class="option2vega"><?php echo number_format($optionsTwoVal['vega'],3,".",""); ?></td>
                                                  <td class="option2volga"><?php echo number_format($optionsTwoVal['volga'],3,".",""); ?></td>
                                                  <td class="option2vanna"><?php echo number_format($optionsTwoVal['vanna'],3,".",""); ?></td>
                                              </tr>
                                          </table>
                                        </div>
                                     </div>
                                    </div><!-- End tab tow -->

                                    <div id="tab3" class="tab-pane fade">
                                        <!-- <p class="moneyness">Moneyness1</p>
                                       <h6 class="otmTitle">102.35% <span>OTM</span></h6> -->
                                      <div class="moneynessOne">
                                        <div class="totalPremium">
                                            <p>Total</p>
                                            <p>Premium</p>
                                            <p class="totalPremiumCal"><?php echo number_format(($optionsOneVal['callValue']+$optionsTwoVal['callValue']),2,".","")  ?></p>
                                        </div>
                                        <div class="greekstable">
                                          <table class="table table-bordered">
                                            <tr>
                                              <td class="green_bg">Delta</td>
                                              <td class="green_bg">Gamma</td>
                                              <td class="green_bg">Theta</td>
                                            </tr>
                                            <tr>
                                              <td class="totalDelta"><?php echo number_format(($optionsOneVal['deltaCall']+$optionsTwoVal['deltaCall']),3,".",""); ?></td>
                                              <td class="totalGamma"><?php echo number_format(($optionsOneVal['gamma']+$optionsTwoVal['gamma']),3,".",""); ?></td>
                                              <td class="totalThetha"><?php echo number_format(($optionsOneVal['thetaCall']+$optionsTwoVal['thetaCall']),3,".",""); ?></td>
                                            </tr>
                                            <tr>
                                              <td class="green_bg">Vega</td>
                                              <td class="green_bg">Velga</td>
                                              <td class="green_bg">Vanna</td>
                                            </tr>
                                            <tr>
                                              <td class="totalVega"><?php echo number_format(($optionsOneVal['vega']+$optionsTwoVal['vega']),3,".",""); ?></td>
                                              <td class="totalVelga"><?php echo number_format(($optionsOneVal['volga']+$optionsTwoVal['volga']),3,".",""); ?></td>
                                              <td class="totalVanna"><?php echo number_format(($optionsOneVal['vanna']+$optionsTwoVal['vanna']),3,".",""); ?></td>
                                            </tr>
                                          </table>
                                        </div>
                                      </div>
                                    </div><!-- tab three -->
                                  </div>
                            </div>
                            <style type="text/css">
                                 .ooptionCelcluate{
                                    display: block;
                                    text-align: center;
                                    padding-bottom: 30px;
                                 }
                                .ooptionCelcluateBtn{
                                    background-color: #042739;
                                    border-radius: 6px;
                                    padding: 8px 20px;
                                    display: inline-block;
                                    color: #fff !important;  
                                    text-decoration: none;  
                                    border: none;                                
                                }
                                .ooptionCelcluateBtn:hover{
                                    color: #fff !important; 
                                     text-decoration: none;
                                }
                            </style>
                            <div class="col-md-12 col-sm-12">
                                <div class="ooptionCelcluate">
                                    <button class="ooptionCelcluateBtn">Calculate</button>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 blance-sheet-info ">
                                <div class="col-md-12 col-sm-12 list-income-info">
                                    <!-- <div class="list-sec-prt-blow">
                                        <ul>
                                            <li><input type="text" name="" value="8500"> Actual Price</li>
                                            <li><input type="text" name="" value="16"> Base</li>
                                            <li><input type="text" name="" value="16"> Maturity</li>
                                            <li><input type="text" name="" value="16"> Volalitily</li>
                                            <li><input type="text" name="" value="16"> Dividend</li>
                                        </ul>
                                    </div> -->
                                    <div id="myChart12222" style="height: 326px; width: 100%; display: none;"></div>
                                </div>
                                
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <!-- <div class="resume-document">
                                    <ul>
                                        <li><a class="r" href="JavaScript:void(0)">R</a></li>
                                    </ul>
                                    <h5>Resume</h5>
                                </div> -->
                            </div>
                        </div>

                    
                </div>
                    <!-- Col-md- 12 End -->
                    <!-- Blance Sheet Section End Here -->
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js "></script>
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js "><\/script>')
    </script>
    <script src="<?php echo base_url('assets/users'); ?>/js/voluame-chart-objects.js"></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/amimation-menu-sidebar.js "></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/line-chart-simlpe-box.js"></script>
   <!--  <script type="text/javascript" src="<?php echo base_url('assets/users/js/sidebarmenu.js'); ?>"></script> -->
   <script src="<?php echo base_url('assets/users'); ?>/js/common.js"></script>
     <?php include('includes/stock-portfolio-custom.php'); ?>

<script type="text/javascript">
    $(document).ready(function(){
        $('#go-from-resume-to-simulation').click(function(){
            $('.simulation-parts').show();
            $('.resume-parts').hide();
        });

       $('#go-back-simulation-to-resume').click(function(){
            $('.simulation-parts').hide();
            $('.resume-parts').show();
        });
       var all_id = '';
       $('.option-resume-list').on('click','li',function(){
        //$('.option-resume-list li').removeClass('active');
        all_id = this.id;
        var activeBlue = $('.activeBlue').length;
        var activeOrange = $('.activeOrange').length;
        //alert(activeBlue);
        //alert(activeOrange);
        //alert(all_id);
        if(activeBlue==0 && activeOrange==0)
        {
            $('#'+this.id).toggleClass('activeBlue');
            $('#sellBuyCallPut1').val(all_id);
            $('#sellBuyCallPut2').val(0);
            renderWithNewRecord(all_id,0);
            //$('#myChart12222').show();
        }
        if(activeBlue==0 && activeOrange==1)
        {
            //$('#'+this.id).toggleClass('activeOrange');
            alert(all_id);
        }
        if(activeBlue==1 && activeOrange==0)
        {
            $('#'+this.id).toggleClass('activeOrange');
            var previousID = $('.activeBlue').attr('id');
            //alert(previousID);
            //alert(all_id);

            $('#sellBuyCallPut1').val(previousID);
            $('#sellBuyCallPut2').val(all_id);
            renderWithNewRecord(previousID,all_id);
            //$('#myChart12222').show();
        }
        if(activeBlue==1 && activeOrange==1)
        {
            $('.option-resume-list li').removeClass('activeBlue');
            $('.option-resume-list li').removeClass('activeOrange');
            $('#'+this.id).toggleClass('activeBlue');

            $('#sellBuyCallPut1').val(all_id);
            $('#sellBuyCallPut2').val(0);
            //alert('remove both and select new one')
            //alert(all_id);
            renderWithNewRecord(all_id,0);
            //$('#myChart12222').show();
        }
       })

    });
/*
option portfolio code
*/
renderSimulationChart(<?php echo $graphs; ?>);
function renderSimulationChart(graphs)
{
    let chartConfigSimulations =  graphs;
    zingchart.render({
      id: 'myChart12222',
      data: chartConfigSimulations,
      height: '362px',
      width: '100%',
    });
}

function onTextField()
{
    var getNum1 = $('#sellBuyCallPut1').val();
    var getNum2 = $('#sellBuyCallPut2').val();
   // alert(getNum);
    renderWithNewRecord(getNum1,getNum2);
}
  function renderWithNewRecord(num1,num2)
  {
        $('.loader-image').show();
        $('body').addClass('loader');
        var actualPrice = $('#actualPrice').val();
        var baseDays = $('#baseDays').val();
        var maturityDyas = $('#maturityDyas').val();
        var volalitilyInput = $('#volalitilyInput').val();
        var interestInput = $('#interestInput').val();
        var dividendInput = $('#dividendInput').val();

        var strikePriceInput1 = $('#strikePriceInput1').val();
        var strikePriceInput2 = $('#strikePriceInput2').val();
        $.ajax({
          url:'<?php echo base_url("users/portfolio/getOptionOneOptionTwoDataOnchange"); ?>',
          method:'POST',
          data:{actualPrice:actualPrice,baseDays:baseDays,maturityDyas:maturityDyas,volalitilyInput:volalitilyInput,interestInput:interestInput,dividendInput:dividendInput,strikePriceInput1:strikePriceInput1,strikePriceInput2:strikePriceInput2,num1:num1,num2:num2},
          dataType:'html',
          success:function(data)
          { 
            var res = JSON.parse(data);
            console.log(res.graphs);
            renderSimulationChart(res.graphs);
            $('.otmTitle1').text(res.optionOnemoneyNess);

            $('.option1CallValue').text(res.optionOnecallValue);
            $('.option1intrinsicValueCall').text(res.optionOneintrinsicValueCall);
            $('.option1temporaryValueCall').text(res.optionOnetemporaryValueCall);
            $('.option1deltaCall').text(res.optionOnedeltaCall);
            $('.option1gamma').text(res.optionOnegamma);
            $('.option1thetaCall').text(res.optionOnethetaCall);
            $('.option1vega').text(res.optionOnevega);
            $('.option1volga').text(res.optionOnevolga);
            $('.option1vanna').text(res.optionOnevanna);

            $('.otmTitle2').text(res.optionTwomoneyNess);
            $('.option2CallValue').text(res.optionTwocallValue);
            $('.option2intrinsicValueCall').text(res.optionTwointrinsicValueCall);
            $('.option2temporaryValueCall').text(res.optionTwotemporaryValueCall);
            $('.option2deltaCall').text(res.optionTwodeltaCall);
            $('.option2gamma').text(res.optionTwogamma);
            $('.option2thetaCall').text(res.optionTwothetaCall);
            $('.option2vega').text(res.optionTwovega);
            $('.option2volga').text(res.optionTwovolga);
            $('.option2vanna').text(res.optionTwovanna);

            $('.totalPremiumCal').text(res.totalPremium);

            $('.totalDelta').text(res.deltaTotal);
            $('.totalGamma').text(res.gammaTotal);
            $('.totalThetha').text(res.thetaTotal);
            $('.totalVega').text(res.vegaTotal);
            $('.totalVelga').text(res.volgaTotal);
            $('.totalVanna').text(res.vannaTotal);

            $('#myChart12222').show();
            $('.loader-image').hide();
            $('body').removeClass('loader');

          }
      });
  }
$(document).on('click','.ooptionCelcluateBtn',function(){
    onTextField();
});
  /*$(document).ready(function(){
    $('#actualPrice,#baseDays,#maturityDyas,#volalitilyInput,#interestInput,#dividendInput,#strikePriceInput1,#strikePriceInput2').keypress(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
            onTextField();
        }
    });
  })*/


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

$("#baseDays,#maturityDyas").inputFilter(function(value) {
  return /^-?\d*$/.test(value); });

$("#actualPrice,#volalitilyInput,#interestInput,#dividendInput,#strikePriceInput1,#strikePriceInput2").inputFilter(function(value) {
  return /^-?\d*[.,]?\d{0,2}$/.test(value); });

//,#baseDays,#maturityDyas,#volalitilyInput,#interestInput,#dividendInput,#strikePriceInput1,#strikePriceInput2
</script>


</body>

</html>