<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, user-scalable=no">

    <meta name="description" content="">

    <meta name="author" content="">

    <link rel="shortcut icon" href="<?php echo base_url('assets/users'); ?>/images/favicons.png" type="images/x-icon" />

    <title><?php //echo $title; ?></title>

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

    <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>

    <style type="text/css">

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





       #myChart4th #myChart4th-license-text{display: none;}

        .stock-bg{

        min-height: 540px;

        }



        .box-1{

    height: 410px;}



    .box-2 {

    height: 271px;}

    .box-3 {

    height: 410px;}

    .blance-sheet-info .line-persantage-boxs 

    {

        margin-top: 0;

    }

    .left-side-chart-content{

        height: 410px;

    }

    .blance-sheet-info .resume-document ul {

   margin-top: 0px; }



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

    #wrapper{

        padding-left: 0px;

    }

    #page-wrapper{

        background-color: #fff;

    }

    .stock-bg {

        box-shadow: none !important;

    }

    @media only screen and (max-width: 767px) {

    .price-static-analysis-info {

        width: 100% !important;

    }

    .box-partchanel {

        width: 100%;

    }

    .blance-sheet-info .line-persantage-boxs {

        width: 100% !important;

    }

    .stock-bg {

        min-height: 90vh;

        border-radius: 4px;

        box-shadow: none;

        padding: 10px 0;

    }

    .blance-sheet-info {

     padding: 0;

    }

    .box-2 {

    padding: 0;

    }

    .static-analysis-parameter {

    min-height: 70px !important;

    }

    }

    @media only screen and (max-width: 680px) {

    .price-static-analysis-info ul li {

        width: 100% !important;

        float: left;

        margin-left: 0px !important;

    }

    .price-static-analysis-info ul li span {

        width: 240px !important;

        left: 57px !important;

    }

    .price-static-analysis-info .btnchangePeriod {

        left: 212px;

    }

    .price-static-analysis-info ul li input[type="text"] {

           width: 20% !important;

           margin-right: 100px !important;

    }



    }

    </style>

</head>

<body>

    <div id="throbber" style="display:none; min-height:120px;"></div>

    <div id="noty-holder"></div>

    <div id="wrapper">

        <?php 

            //$this->load->view('page/include/sidebar'); 

        ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->

                <div class="row" id="main">

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

    

<script>

renderStatisticalGraphByAjax(<?php echo $myConfigStatistical; ?>);
function renderStatisticalGraphByAjax(ajaxGraph)
{
    zingchart.render({ 
        id : 'myChart4th', 
        data : ajaxGraph, 
        height: '260px', 
        width: '100%'
    });
}
function getChartDataAjax(period=0,parameter=0,firstDeviation=0,secondDeviation=0,percentile99_1=0)
{
        $('.loader-image').show();
        $('body').addClass('loader');
        $.ajax({
          url:'<?php echo base_url("users/portfolio/getStaticAnalysisGraphData"); ?>',
          method:'POST',
          data:{stock_id:"<?php echo $_GET['stock_ref_id']; ?>",period:period,parameter:parameter,firstDeviation:firstDeviation,secondDeviation:secondDeviation,percentile99_1:percentile99_1},
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
}
$(document).ready(function(){

    $('.emaclass').keypress(function(){

        if ((event.keyCode || event.which) == 13) {

            var period = $('.emaclass').val();

            var parameter = $('.stastical_analysis_param').val();

            var firstDeviation = $('.firstStandardDevivationHidden').val();

            var secondDeviation = $('.secondStandardDevivationHidden').val();

            var percentile99_1 = $('.percentile99_1Hidden').val();

            getChartDataAjax(period,parameter,firstDeviation,secondDeviation,percentile99_1);

            //getChartDataAjax(period,parameter);

        }

 

    });

  /*  $('.btnchangePeriod').click(function(){

        

    });*/



});

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



function changeGraphOnClickSideSubMenu(parameter)

{

    var period = $('.emaclass').val();

    getChartDataAjax(period,parameter);

}
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


  

</script>

<script type="text/javascript">

    $(document).ready(function(){

        //

        $('.balancesheettest  .mseAverage li').click(function(){

            //$(".balancesheettest").css({"pointer-events": "none"});

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



    });

</script>

</body>

</html>