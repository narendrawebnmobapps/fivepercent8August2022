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
        #myChart-5s #myChart-5s-license{display: none;}
        .stock-bg, .bg-box-prt{
        min-height: 620px;
        }

        ul.balancesheetfixedPortfolio li.active{color: #053852;}
        .confirm-selec{
        margin-top: -19px;
        }
        /*.stock-protfolo {
             height: 363px;}*/
             /*.stock-protfolo {
             min-height: 399px;
             display: flex;}

           .box-2{
           min-height: 395px;
           display: flex;}*/


           .box-1 {
            min-height: 402px;}

           .box-same-hight-41{
            min-height: 402px; }
          
           .list-pagenations{
            margin-bottom: 0px; }
         
           .total-views {
            margin-top: -10px;}

           .list-pagenations {
            margin-bottom: 0px;
            height: 28px;
            }
            

         /* Detect Chrome 22+ (and Safari 6.1+) */
         /*------------- Mobile Responsive Here -----------------*/
        @media screen and (max-width: 1400px){
            .box-1 {
                min-height: 403px;
            }
            .box-same-hight-41{
                min-height: 435px;
            }
            .stock-protfolo{
                height: 403px;
            }
        }
      /* @media screen and (-webkit-min-device-pixel-ratio:0) and (min-resolution: .001dpcm), screen and(-webkit-min-device-pixel-ratio:0) {
             .box-1 {
            min-height: 360px;}

           .box-same-hight-41{
            min-height: 402px;}
           }*/

            @media screen and (max-width: 1280px){
            .box-1 {
            min-height: 364px;}

            .box-same-hight-41 {
           min-height: 433px;}

             }


 @media screen and (max-width: 1180px){
             .box-1 {
            min-height: 364px;}

            .box-same-hight-41 {
           min-height: 403px;}

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
    width: 162px;
}
ul.balancesheettest li.active {
    color: #ffffff;
    background-color: #063853;
}
.stock-bg .line-persantage-boxs {
    display: inline-block;
    margin-top: 52px;
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
                                <li><?php echo $sub_title; ?></li>
                            </ul>
                        </div>
                    </div>
                    <!-- TradingView Widget BEGIN -->
                    <?php // echo "<pre>"; print_r($stocks); ?>
                    <div class="loader-image" style="display: none;"><img src="<?php echo base_url('assets/users/images/loading.gif') ?>"></div>
                    <div class="col-md-12 col-sm-12 user-added-stock-list">
                        <div class="bg-box-prt">
                            <div class="col-md-11 col-sm-11 box-n-box box-1 ">
                                <div class="stock-protfolo">
                                    <table style="width:100%" id="filter_option_stock_table">                                        
                                        <tr>
                                            <th></th>
                                            <th>Company</th>
                                            <th>Number</th>
                                            <th>Order Type</th>
                                            <th>Duration</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>                                    
                                        <?php 
                                            $total = 0;  $inc = 1; foreach($stocks as $stock): 
                                            $total+=$stock['number'];

                                        ?>
                                        <tr>
                                            <td class="hide-row"><i style="cursor: pointer;" dataid="<?php echo $stock['id'] ?>" class="fa fa-minus delete-user-stock" onclick="confirmDelete('<?php echo $stock['id'] ?>')" aria-hidden="true"></i> <i style="cursor: pointer;" dataid="<?php echo $stock['id'] ?>" class="fa fa-edit edit-user-stock"></i></td>

                                            <td><a href="<?php echo base_url('users/portfolio/details_fixed_income_portfolio/'.base64_encode(base64_encode($stock['id']))) ?>"><?php echo $stock['stock_name'] ?></a></td>
                                            <td><?php echo $stock['number']; ?></td>
                                            <!--td>
                                                <select class="form-control" style="width: 60%;">
                                                    <?php  $orderTypeArray = array('Market','Limited','Stop'); ?>
                                                    <option value="">Select</option>
                                                    <?php foreach($orderTypeArray as $ota){ ?>
                                                    <option value="<?php echo $ota; ?>" <?php if($ota==$stock['order_type']){echo 'selected'; } ?> ><?php echo $ota; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td-->
                                            <td><?php echo $stock['order_type']; ?></td>
                                            <td>1.22</td>
                                            <td style="cursor: pointer;" class="esqmation" dataid="<?php echo $stock['id'] ?>"><i class="fa fa-info" aria-hidden="true"></i></td>
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
                                        <ul class="balancesheettest balancesheetfixedPortfolio">
                                            <li data-id="Duration" class="active">Duration</li>
                                            <li data-id="Sensibility">Sensibility</li>
                                            <li data-id="Short Term Interest">Short Term Interest</li>
                                            <li data-id="Long Term Interest">Long Term Interest</li>
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
                                        <li>Total</li>
                                        <li><?php echo $total; ?></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="resume-document">
                                    <ul>
                                        <li><a class="r" href="JavaScript:void(0)">R</a></li>
                                        <li id="go-from-stock-to-simulation"><a href="JavaScript:void(0)">S</a></li>
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
                            <div class="col-md-10 col-sm-10 respon-box box-2 box-same-hight-41">
                                <div id='myChart-5s' style="width: 100%;height: 100%;">
                                    <a class="zc-ref" href="#"></a>
                                </div>
                            </div>
                        <div class="col-md-2 col-sm-2  selectox2">
                            <div class="box-partchanel">
                                <!-- <div class="box-selects box-selects-confirmation  box-select2">
                                    <h3>SELECT</h3>
                                </div> -->
                                <div class="line-persantage-boxs  percentage-filter-boxs2" style="">
                                    <ul class="balancesheettest">
                                        <li class="active">Ibex</li>
                                        <li>BBWA</li>
                                        <li>Col</li>
                                        <li>SAN</li>
                                        <li>Total</li>                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                            <div class="col-md-12 col-sm-12 confirm-selec">
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
                                <input type="hidden" name="s_type" value="2">
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
                    <?php  $orderTypeArray = array('Market','Limited','Stop'); foreach($orderTypeArray as $ota){ ?>
                    <option value="<?php echo $ota; ?>"><?php echo $ota; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Number</label>
                <input type="text" onkeypress="return keypressNumber(this,event);" name="number" class="form-control numberOfStock">
            </div>
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
                <label>Number</label>
                <input type="text" onkeypress="return keypressNumber(this,event);" name="number" class="form-control numberOfStock">
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
          $('.balancesheetfixedPortfolio li').click(function(){
            $('.balancesheetfixedPortfolio li ').removeClass("active");
            $(this).addClass("active");
        });
        });
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
    </script>


    
</body>
</html>