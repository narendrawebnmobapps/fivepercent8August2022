<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url('assets/users'); ?>/images/favicons.png" type="images/x-icon" />
    <title>Seasonal Analysis</title>
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
    <script type="text/javascript" src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <style type="text/css">
    @media screen and (max-width: 768px) {
               .ui-datepicker-multi-3 .ui-datepicker-group {
            width: 100% !important;
        }
        .blance-sheet-info {
            margin-top: 25px;
        }
    }
    .seasional-analysis-filter-area .form-control {
        border: 1px solid #8c8787;
        border-radius: 3px;
        font-size: 14px;
        outline: none;
        width: 167px;
    }
    #myChart-20s{
        width: 98%;
        /*height: 300px;*/
        margin-top: 20px; 
        margin-left: 2%;
    }
    #myChart-20s #myChart-20s-license-text{
        display: none;
    }
    </style>
</head>
<body>

        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row" id="main">
                    <div class="lance-sheet-info stock-details-step-4">
                        <div class="stock-bg ">
                        <div class="col-md-12 col-sm-12 box-3">
                            <div class="row" >
                                <div class="seasional-analysis-filter-area">
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

                                        /*.perstange-graps-box-contents ul li {
                                            font-size: 14px;
                                            list-style: none;
                                            line-height: 42px;
                                            border-bottom: 1px solid #cccccc94;
                                            font-weight: 500;
                                        }*/

                                            .perstange-graps-box-contents ul li span {
                                                text-align: right;
                                               /* float: right;*/
                                            }

                                            .perstange-graps-box-contents h4 {
                                                    font-size: 17px;
                                                    font-weight: 600;
                                                    color: #555;
                                                    margin-bottom: 5px;
                                                    /* border-bottom: 1px solid #ccc; */
                                                    border-bottom: 1px solid #cccccc94;
                                                    padding: 0px 0px 18px 0px;
                                                }
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
                                        .modal-dialog {
                                            width: 510px;
                                            margin: 30px auto;
                                        }

/************************************************************************/
.startandEndDate {
    display: flex;
    justify-content: space-between;
}
.show-start-date-info{
     width: 43%;  
     background: #063853;
}
.show-start-date-info p {
    line-height: 30px;
    text-align: center;
    color: #fff;
    font-size: 15px;
    font-weight: 500;
    padding: 5px 0;
    margin: 0;
}
.show-end-date-info{
     width: 43%;
     background: #063853;
}
.show-end-date-info p {
    line-height: 30px;
    text-align: center;
    color: #fff;
    font-size: 15px;
    font-weight: 500;
    padding: 5px 0;
    margin: 0;
}
.show-start-date-info p span {
    color: #f6bb19;
}
.show-end-date-info p span {
    color: #f6bb19;
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
li.average_performance_title {
    background: #f2f9fd !important;
    padding: 0 12px !important;
}
li.average_performance_title span {
    background: #eee;
    padding: 4px 14px;
    color: #000;
    display: contents;
    font-weight: 600;
    font-size: 16px;
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
    border: 1px solid #e1e1e1;
    margin-top: 5px;
    padding: 0 20px;
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
.valueRight.posNegTotal {
    background: #fff;
    display: inline-grid;
    float: right;
    line-height: 30px;
    padding: 0 10px;
    margin-top: 5px;
    border: 1px solid #eee;
}
.perstange-graps-box-contents ul li span.valueRight{
    text-align: right;
    float: right;
    background: #fff;
    line-height: 30px;
    border: 1px solid #e1e1e1;
    margin-top: 5px;
    padding: 0 20px;
}

@media screen and (max-width: 767px) {
       .seasional-analysis-filter-area .form-control {
        border: 1px solid #8c8787;
        border-radius: 3px;
        font-size: 14px;
        outline: none;
        width: 167px;
            margin: 0 auto;
    width: 300px;
    margin-bottom: 8px;
    }
    .submitBtn{
        margin: 0 auto;
        display: block;
    }
    .stock-bg {
    background-color: #fff;
    padding: 14px 0;
    margin-bottom: 30px;
    box-shadow: 0 0px 5px rgb(0 0 0 / 16%);
    display: inline-block;
    width: 100%;
}
.stock-bg .box-3 {
    padding: 0 0px;
}
.modal-dialog {
    width: 450px;
    margin: 30px auto;
}
.startandEndDate{
    display: flex;
    justify-content: space-between;
    width: 100%;
}
#myChart-20s {
    width: 100%;
    margin-top: 20px;
    margin-left: 0%;
}
.perstange-graps-box-contents {
    margin-top: 22px;
    padding: 0px;
}
.container-fluid{
    padding: 0;
}
.row{
    margin: 0;
}
.col-md-7.paddingLtRt0 {
    padding: 0;
}

}
@media screen and (max-width: 576px) {
       .seasional-analysis-filter-area .form-control {
    width: 100%;
    }
    .modal-dialog {
    width: 360px;
    margin: 30px auto;
}
}
@media screen and (max-width: 480px) {
       .seasional-analysis-filter-area .form-control {
    width: 100%;
    }
    .modal-dialog {
    width: 100%;
    margin: 30px auto;
}
}
                                  </style>

                                <div class="col-lg-2 col-md-2 col-sm-4">
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

                                 <div class="col-lg-2 col-md-2 col-sm-4">
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
                            </div>

                                 <div class="loader-image" style="display: none;"><img src="<?php echo base_url('assets/users/images/loading.gif') ?>"></div>
                                 <div class="row" id="finalProbProfitChartId" style="display:none;">
                                 <div class="col-md-7 paddingLtRt0">
                                    <div id='myChart-20s'></div>
                                </div>
                                <div class="col-md-5">
                                    <div class="startandEndDate">
                                            <div class="show-start-date-info">
                                                <?php 
                                                    $datatatta = explode(',', rtrim($filterPerformaceProbPreviousTenYears['dts'],','));
                                                ?>
                                                <p>Start Date: <span class="finalGetStartDate"><?php echo @trim($datatatta[0],"'"); ?></span></p>
                                            </div>
                                            <div class="show-end-date-info">
                                                <p>End Date: <span class="finalGetEndDate"><?php echo @trim(end($datatatta),"'"); ?></span></p>
                                            </div>
                                    </div>
                                    <div class="perstange-graps-box-contents">
                                   <!--  <h4>Parameter <span>Value</span></h4> -->
                                    <ul class="finalProbProfitGet">
                                        <li><span class="leftSide">Time Period in Number Of Days</span>  <span class="valueRight NumberOfdays"><?php //echo $numberOfTotalDays; ?>18 days</span></li>
                                        <!-- <li>Positive Days  <span><?php echo $totalNumberOfPositiveDays; ?>/<?php echo $totalNumberOfdays; ?> (<?php echo $totalNumberOfPositiveDaysPercentage; ?>%)</span></li> -->
                                       
                                        <li><span class="leftSide">Years Ratio (<span class="neg">Pos</span> / <span class="pos">Neg </span>/ Total) </span> <div class="valueRight posNegTotal"><span><span class="neg totalNumOfPos">
                                            <?php echo $numberOfPositiveDays; ?></span>/<span class="pos totalNumOfNeg"><?php echo $numberOfNegativeDays; ?></span>/<span>( <dm class="probabalityli"><?php echo number_format(($numberOfPositiveDays/$numberOfTotalDays)*100,2,'.',''); ?>%</dm> )</span><span class="totalSum totalNumberOfYearsCalCulation"> <?php echo $numberOfTotalDays; ?></span></span></div> </li>

                                        <li class="average_performance_title"><span>Average Performance of Stock:</span></li>

                                        <li><span class="leftSide last10YearsTitle">Last 10 Years</span><span class="performanceLast10Years valueRight"><?php echo number_format($performanceLast10Years,2,'.','');  ?>%</span></li>
                                        <li><span class="leftSide previous10YearsTitle">Previous 10 Years</span><span class="performanceBefore10Years valueRight"><?php echo number_format($performanceBefore10Years,2,'.','');  ?>%</span></li>
                                        <li><span class="leftSide last20YearsTitle">Last 20 Years</span>   <span class="performanceLast20Years valueRight"><?php echo number_format($performanceLast20Years,2,'.','');  ?>%</span></li>
                                    </ul>
                                    </div>

                                </div>
                            </div>
                               
                            </div>
                           
                        
                        </div>  
                        </div><!-- Stock-bg End -->
                        
                    </div> <!-- Col-md- 12 End -->
                </div>
                <!-- /.row -->
            </div>
        </div>
        <!-- /#page-wrapper -->
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
        <h4 class="modal-title"><i class="fa fa-info" aria-hidden="true"></i>Info</h4>

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
</style>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/bootstrap.min.js "></script>
    
<script>
    renderFilterFinalGraphpSeasionalAalysisGraph(<?php echo $myConfigSeasonalAnalysisFinalGraphp; ?>,'myChart-20s');

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
    if(startDate=="" || endDate=="")
    {
        return false;
    }
    $('.loader-image').show();
    $('body').addClass('loader');

    $.ajax({
          url:'<?php echo base_url("users/portfolio/getSeasionalFinalAnalysisPerformancePropb"); ?>',
          method:'POST',
          data:{stock_id:"<?php echo $_GET['stock_ref_id']; ?>",startDate:startDate,endDate:endDate},
          dataType:'html',
          success:function(data)
          { 
            setTimeout(function(){ $('.loader-image').hide(); }, 1000);
            $('body').removeClass('loader');;
            var res = JSON.parse(data);
            /*var finalGraphZing = res['finalGraphZing'];


            if(res['noRecordFound']==1)
            {
                alert('No record found that you have selected profit and probability');
                $('#finalProbProfitChartId').hide();
            }
            else
            {
                $('#finalProbProfitChartId').show();
            }
            renderFilterFinalGraphpSeasionalAalysisGraph(finalGraphZing,'myChart-20s');
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
            $('.finalProbProfitGet .performanceBefore10Years').html(res['finalFilterPerformacePrevious10Years']+'%');*/


            /*new Code*/
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
                renderFilterFinalGraphpSeasionalAalysisGraph(finalGraphZing,'myChart-20s');
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

/*
************************************************************************
Seasional Analysis Graphp Dynamic
************************************************************************
*/
</script>
</body>
</html>