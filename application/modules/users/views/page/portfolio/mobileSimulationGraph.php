<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url('assets/users'); ?>/images/favicons.png" type="images/x-icon" />
    <title>Simulation</title>
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
    <style type="text/css">
         #myChart-5s1 #myChart-5s1-license{display: none;}
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
margin-right: 90px;
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
#wrapper{padding: 0;}

    </style>

</head>
<body>
    <div id="wrapper">
        <?php 
            //$this->load->view('page/include/sidebar'); 
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
                    <div class="loader-image" style="display: none;"><img src="<?php echo base_url('assets/users/images/loading.gif') ?>"></div>
                    <div class="variable-chart-simulation">
                        <div class="stock-bg">
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
                                    <span><input type="text" name="" required value="<?php echo $numberOfStock; ?>" class="form-control numberOfStockEnter"></span><span style="display: block;margin-top: 8px;line-height: 31px;">Stocks</span>
                                </div>
                                <div class="col-md-2">
                                   <button class="btn btn-success changeMonthOptionBtn">Submit</button>
                                </div>
                            </div>
                            
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
        padding: 13px 10px;
        display: inline-block;
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
}

 @media only screen and (max-width: 480px) {
  ul.navbar-nav.viewlospro li a {
    font-size: 14px;
    padding: 5px 10px;
}
 }
</style>
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
                        <div class="col-md-2 col-sm-12  selectox2">
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
                            <div class="col-md-12 col-sm-12 confirm-selec" style="visibility: hidden;">
                                <h4>CONFIRM SELECTION</h4>
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
<script src="<?php echo base_url('assets/users'); ?>/js/bootstrap.min.js "></script>
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

    function getSimulationOverAllLossProfitPercentage(stock_id,parameter,numberOfStock)
    {
        //getSimulationChartDataAjax(stock_id,parameter,numberOfStock);
        $.ajax({
          url:'<?php echo base_url("users/portfolio/getSimulationOverAllLossProfitPercentage"); ?>',
          method:'POST',
          data:{stock_id:stock_id,parameter:parameter,numberOfStock:numberOfStock},
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

$(".stockPerPrice").inputFilter(function(value) {
  return /^-?\d*[.,]?\d{0,2}$/.test(value); });
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