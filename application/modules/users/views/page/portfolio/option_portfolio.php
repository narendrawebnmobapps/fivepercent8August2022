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
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <style type="text/css">
        ul.balancesheetOptionPortfolio li.active{color: #053852;}
        .stock-bg, .bg-box-prt{
            min-height: 620px;
        }
        .box-1 {
             height: 402px;}
             .list-pagenations{
                margin-bottom: 0px;
             }
             .stock-protfolo {
             height: 363px;}
            /* .total-views {
              margin-top: -41px;}*/

              .total-views {
                margin-top: 10px;
            }
            .total-views ul li {
                width: 230px !important;
                text-transform: uppercase;
            }
    </style>
</head>

<body>
    <div id="throbber" style="display:none; min-height:120px;"></div>
    <div id="noty-holder"></div>
    <div id="wrapper">
        <!-- Navigation -->
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
                                <li>Option</li>
                            </ul>
                        </div>
                    </div>
                    <!-- TradingView Widget BEGIN -->
                    <div class="loader-image" style="display: none;"><img src="<?php echo base_url('assets/users/images/loading.gif') ?>"></div>
                    <div class="col-md-12 col-sm-12 user-added-stock-list">
                        <div class="bg-box-prt">
                            <div class="col-md-12 col-sm-12 box-1">
                                <div class="stock-protfolo">
                                    <table style="width:100%" id="filter_option_stock_table11">                                        
                                        <tr>
                                             <th></th>
                                            <th>Option Name</th>
                                            <th>No. Of Options</th>
                                            <th>Price</th>
                                            <th>Order Type</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>                                    
                                        <?php 
                                            $total = 0;  $inc = 1; foreach($stocks as $stock): 
                                            $total+=($stock['number']*$stock['stock_price']);

                                        ?>
                                        <tr>
                                            <td class="hide-row"><i style="cursor: pointer;" dataid="<?php echo $stock['id'] ?>" class="fa fa-minus delete-user-stock" onclick="confirmDelete('<?php echo $stock['id'] ?>')" aria-hidden="true"></i> <i style="cursor: pointer;" dataid="<?php echo $stock['id'] ?>" class="fa fa-edit edit-user-option-stock"></i></td>

                                            <td><a href="<?php echo base_url('users/portfolio/details_option_stock_portfolio/'.base64_encode(base64_encode($stock['id']))) ?>"><?php echo $stock['stock_name'] ?></a></td>
                                            <td><?php echo $stock['number']; ?></td>
                                            <td><?php echo $stock['stock_price']; ?></td>
                                            <td><?php echo $stock['order_type']; ?></td>
                                            <td><?php //echo $stock['volatility']; ?></td>
                                            <td style="cursor: pointer;" class="esqmation" dataid="<?php echo $stock['id'] ?>"><i class="fa fa-info" aria-hidden="true"></i></td>
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
                            <div class="col-md-12 col-sm-12">
                                <div class="total-views">
                                    <ul>
                                        <li>My Portfolio</li>
                                        <li><?php echo $total; ?></li>
                                    </ul>
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
                                <div class="resume-document">
                                    <ul>
                                        <li><a class="r" href="JavaScript:void(0)">R</a></li>
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
                    <!-- Col Md End -->
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
<!-- Add Stock Modal Start-->
<div id="add_stock_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content add_stock_modal">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Option</h4>
      </div>
      <div class="modal-body">
        <form method="post" id="add_option_stcok_form">
            <div class="form-group">
                <label >Option Name</label>
                <input type="hidden" name="s_type" value="3">
                <input type="text" class="form-control stock_name" name="stock_name">
            </div>
            <div class="form-group">
                <label >Option Price</label>
                <input type="text" class="form-control stock_price" onkeypress="return keypressNumber(this,event);" name="stock_price">
            </div>
            <div class="form-group">
                <label >Option Type</label>
                <select class="form-control stock_type" name="stock_type">
                    <option value="">Select Option Type</option>
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
            <input type="submit" name="" value="Save" id="add_option_stock_btn">
            </div> 
            <div class="alert alert-success add-stock-success-div">
               Option Added Successfully
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
        <h4 class="modal-title">Edit Option</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="" id="edit_option_stcok_form">
            <input type="hidden" name="user_stock_id" class="user_stock_id">
            <div class="form-group">
                <label >Option Name</label>
                <input type="hidden" name="s_type" value="3">
                <input type="text" class="form-control stock_name" name="stock_name">
            </div>
            <div class="form-group">
                <label >Option Price</label>
                <input type="text" class="form-control stock_price" onkeypress="return keypressNumber(this,event);" name="stock_price">
            </div>
            <div class="form-group">
                <label >Option Type</label>
                <select class="form-control stock_type" name="stock_type">
                    <option value="">Select Option Type</option>
                    <?php  $orderTypeArray = array('Market','Limited','Stop'); foreach($orderTypeArray as $ota){ ?>
                    <option value="<?php echo $ota; ?>"><?php echo $ota; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Number</label>
                <input type="text" name="number" onkeypress="return keypressNumber(this,event);" class="form-control numberOfStock">
            </div>
            <div class="finish-btn save_submit_btn">
            <input type="submit" name="" value="Save" id="update_option_stock_btn">
            </div> 
            <div class="alert alert-success update-stock-success-div">
               Option Updated Successfully
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
    <script src="<?php echo base_url('assets/users'); ?>/js/voluame-chart-objects.js"></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/amimation-menu-sidebar.js "></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/line-chart-simlpe-box.js"></script>
    <!-- <script type="text/javascript" src="<?php echo base_url('assets/users/js/sidebarmenu.js'); ?>"></script> -->
    <script src="<?php echo base_url('assets/users'); ?>/js/common.js"></script>
     <?php include('includes/stock-portfolio-custom.php'); ?>

<script type="text/javascript">
        $(document).ready(function(){
          $('.balancesheetOptionPortfolio li').click(function(){
            $('li ').removeClass("active");
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