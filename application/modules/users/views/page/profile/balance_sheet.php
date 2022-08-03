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
    
    <!-- Animate CSS -->
    <link href="<?php echo base_url('assets/users'); ?>/css/animate.css" rel="stylesheet">

    <link href="<?php echo base_url('assets/users'); ?>/css/main-custom.css" rel="stylesheet">
    <!-- Responsive CSS -->
    <link href="<?php echo base_url('assets/users'); ?>/css/responsive.css" rel="stylesheet">

    <style type="text/css">
    
.perstange-prt-text span {
    float: right;
}

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

#myChart-license-text{display: none;}
.slidecontainer {
  width: 100%;
}
.slidecontainer {
  width: 100%;
}
.slider {
  -webkit-appearance: none;
  width: 100%;
  height: 10px;
  border-radius: 5px;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider:hover {
  opacity: 1;
}

.slider::-webkit-slider-thumb {
  appearance: none;
  width: 23px;
  height: 24px;
  border: 0;
  background: url('contrasticon.png');
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 23px;
  height: 24px;
  border: 0;
  background: url('contrasticon.png');
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
    -webkit-appearance: none;
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


a.edit-blance-delete i {
margin-left: 7px;
    font-size: 13px;
    color: #063853;
    width: 0%;
    float: right;
    position: relative;
    left: 3px;
    margin-right: 12px;
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
</style>

</head>

<body>
    <div id="throbber" style="display:none; min-height:120px;"></div>
    <div id="noty-holder"></div>
    <div id="wrapper">
       <!-- Navigation -->
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
                                <li><?php echo $sub_title; ?></li>                            
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                    </div>
                    <div class="col-md-12 col-sm-12 client-profile-tab">
                        <div class="panel panel-primary">
                            <div class="panel-heading"> <span class="10">
                        <!-- Tabs -->
                    </span>
                            </div>
                            <div class="panel-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab2">

                                        <div class="col-md-4 col-sm-6 col-xs-12 income-tbl-sec-clients">
                                              <div class="monthly-income-text"><h3>Monthly Cash: <span><?php echo $total_monthly_cash; ?></span></h3></div>
                                            <?php  //print_r($income_recordarray); ?>
                                            <table style="width: 100%;">
                                                <tr>
                                                    <th>Income</th>
                                                    <th></th>
                                                </tr>
                                                <?php 
                                                if(count($income_recordarray)>0)
                                                { 
                                                  foreach($income_recordarray as $income_value)
                                                  {
                                                ?>
                                                <tr id="del<?php echo $income_value['id'] ?>">
                                                    <td><?php echo $income_value['parameters'] ?></td>
                                                    <td><span><?php echo $income_value['value'] ?> <a href="JavaScript:void(0)" class="edit-blance-delete deleteUserBalanceSheet" onclick="confirmDelete('<?php echo $income_value['id'] ?>')" dataid="<?php echo $income_value['id'] ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a> <a href="JavaScript:void(0)" class="edit-blance-delete editUserBalanceSheet" dataname="Income" dataid="<?php echo $income_value['id'] ?>" parameter="<?php echo $income_value['parameters'] ?>" salary="<?php echo $income_value['value'] ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a> </span>
                                                    </td>
                                                </tr>
                                            <?php } } ?>                                                
                                                <tr>
                                                    <td></td>
                                                    <td><button type="button" class="btn btn-info addUserBalanceSheet" dataid='1' dataname='Income' ><i class="fa fa-plus" aria-hidden="true"></i></button></td>
                                                </tr>
                                                <tr class="lop">
                                                    <td><b>Total</b>
                                                    </td>
                                                    <td><span><b>$ <?php echo $total_monthly_income; ?></b></span>
                                                    </td>
                                                </tr>
                                            </table>
                                            <table style="width: 100%;">
                                                <tr>
                                                    <th>Expenses</th>
                                                    <th></th>
                                                </tr>
                                                <?php 
                                                if(count($expense_recordarray)>0)
                                                { 
                                                  foreach($expense_recordarray as $expense_value)
                                                  {
                                                ?>
                                                <tr id="del<?php echo $expense_value['id'] ?>">
                                                    <td><?php echo $expense_value['parameters'] ?></td>
                                                    <td><span><?php echo $expense_value['value'] ?> <a href="JavaScript:void(0)" class="edit-blance-delete deleteUserBalanceSheet" onclick="confirmDelete('<?php echo $expense_value['id'] ?>')" dataid="<?php echo $expense_value['id'] ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a> <a href="JavaScript:void(0)" class="edit-blance-delete editUserBalanceSheet" dataname="Expense" dataid="<?php echo $expense_value['id'] ?>" parameter="<?php echo $expense_value['parameters'] ?>" salary="<?php echo $expense_value['value'] ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></span>
                                                    </td>
                                                </tr>
                                              <?php } } ?>  
                                                
                                                <tr>
                                                    <td></td>
                                                    <td><button type="button" class="btn btn-info addUserBalanceSheet" dataid='2' dataname='Expense' ><i class="fa fa-plus" aria-hidden="true"></i></button></td>
                                                </tr>
                                                <tr class="lop">
                                                    <td><b>Total</b>
                                                    </td>
                                                    <td><span><b>$ <?php echo $total_monthly_expenses; ?></b></span>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <!-- <div class="col-md-8 col-sm-8"> -->
                                            <div class="col-md-4 col-sm-6 col-xs-12 assets-blance-shert-client-pro">
                                                 <div class="monthly-income-text"><h3>Equity: <span><?php echo $total_equity; ?></span></h3></div>
                                                <table style="width: 100%;">
                                                    <tr>
                                                        <th>Assets</th>
                                                        <th></th>
                                                    </tr>
                                                    <?php 
                                                    if(count($assets_recordarray)>0)
                                                    { 
                                                      foreach($assets_recordarray as $assets_value)
                                                      {
                                                    ?>
                                                    <tr id="del<?php echo $assets_value['id'] ?>">
                                                        <td><?php echo $assets_value['parameters'] ?></td>
                                                        <td><span><?php echo $assets_value['value'] ?>
                                                            <a href="JavaScript:void(0)" class="edit-blance-delete deleteUserBalanceSheet" onclick="confirmDelete('<?php echo $assets_value['id'] ?>')"  dataid="<?php echo $assets_value['id'] ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a> <a href="JavaScript:void(0)" class="edit-blance-delete editUserBalanceSheet" dataname="Expense" dataid="<?php echo $assets_value['id'] ?>" parameter="<?php echo $assets_value['parameters'] ?>" salary="<?php echo $assets_value['value'] ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                        </span>
                                                        </td>
                                                    </tr>
                                                  <?php } } ?>   
                                                  <tr>
                                                    <td></td>
                                                    <td><button type="button" class="btn btn-info addUserBalanceSheet" dataid='3' dataname='Assets' ><i class="fa fa-plus" aria-hidden="true"></i></button></td>
                                                  </tr>                                                  
                                                    <tr class="lop">
                                                        <td><b>Total</b>
                                                        </td>
                                                        <td><span><b>$ <?php echo $total_assets ?></b></span>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-md-4 col-sm-6 col-xs-12 assets-blance-shert-client-pro">
                                                  <div class="monthly-income-text hide-text"><h3 style="color: #ffffff;visibility: hidden;">  dsfsfddfs  </h3></div> 
                                              
                                                <table style="width: 100%;">
                                                    <tr>
                                                        <th>Liabilities</th>
                                                        <th></th>
                                                    </tr>
                                                    
                                                    <?php 
                                                    if(count($liability_recordarray)>0)
                                                    { 
                                                      foreach($liability_recordarray as $liability_value)
                                                      {
                                                    ?>
                                                    <tr id="del<?php echo $liability_value['id'] ?>">
                                                        <td><?php echo $liability_value['parameters'] ?></td>
                                                        <td><span><?php echo $liability_value['value'] ?>
                                                            
                                                            <a href="JavaScript:void(0)" class="edit-blance-delete deleteUserBalanceSheet" onclick="confirmDelete('<?php echo $liability_value['id'] ?>')" dataid="<?php echo $liability_value['id'] ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a> <a href="JavaScript:void(0)" class="edit-blance-delete editUserBalanceSheet" dataname="Expense" dataid="<?php echo $liability_value['id'] ?>" parameter="<?php echo $liability_value['parameters'] ?>" salary="<?php echo $liability_value['value'] ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                        </span>
                                                        </td>
                                                    </tr>
                                                  <?php } } ?>   
                                                  <tr>
                                                    <td></td>
                                                    <td><button type="button" class="btn btn-info addUserBalanceSheet" dataid='4' dataname='Liability'><i class="fa fa-plus" aria-hidden="true"></i></button></td>
                                                  </tr>
                                                    <tr class="lop">
                                                        <td><b>Total</b>
                                                        </td>
                                                        <td><span><b>$ <?php echo $total_liabilities; ?></b></span>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        <!-- </div> -->
                                        <!-- Col-Md-8-->
                                    </div>                                    
                                    <!-- Tab-3 Contant End-->
                                    
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



  <!-- Add Balance Sheet Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header head-bg-color">
          <button type="button" class="close close-x" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add <span class="parameterName">Expense</span></h4>
        </div>
        <div class="modal-body">
          <form action="" method="post" class="add_balance_sheet_frm">
            <input type="hidden" name="balanceSheetType" value="" class="balanceSheetType">
              <div class="col-md-12 col-sm-12">
                <label class="parameterName">Income</label>
                <div class="form-group">
                  <input type="text" name="parameter" style="border-radius: 0px;" value="" required="" placeholder="" class="form-control parameter">
                </div>
              </div>
              <div class="col-md-12 col-sm-12">
                <label>Amount</label>
                <div class="form-group">
                  <input type="text" name="amount" style="border-radius: 0px;" value="" required="" placeholder="" class="form-control amount">
                </div>
              </div>
              <div class="col-md-12 col-sm-12 add_balance_sheet_success_div" style="display: none;"><p style="color: #3c763d;text-align: center;">Data Saved successfully</p></div>
              <div class="col-md-12 col-sm-12 finish-btn" style="margin-top: 0px;margin-bottom: 0px;">
                <input type="submit" name="" value="Save" class="add_balanace_btn">
              </div>
              
            </form>
        </div>
        <div class="modal-footer border-top-0">
         <!--  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        </div>
      </div>
      
    </div>
  </div>
  <!-- Add Balance Sheet Modal End-->


<!-- Edit Balance Sheet Modal -->
  <div class="modal fade" id="editBalanceSheetModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header head-bg-color">
          <button type="button" class="close close-x" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit <span class="parameterNameEdit">Expense</span></h4>
        </div>
        <div class="modal-body">
          <form action="" method="post" class="edit_balance_sheet_frm">
            <input type="hidden" name="balanceSheetId" value="" class="balanceSheetId">
              <div class="col-md-12 col-sm-12">
                <label class="parameterName">Income</label>
                <div class="form-group">
                  <input type="text" name="parameter" style="border-radius: 0px;" value="" required="" placeholder="" class="form-control parameter_edit">
                </div>
              </div>
              <div class="col-md-12 col-sm-12">
                <label>Amount</label>
                <div class="form-group">
                  <input type="text" name="amount" style="border-radius: 0px;" value="" required="" placeholder="" class="form-control amount_edit">
                </div>
              </div>
              <div class="col-md-12 col-sm-12 edit_balance_sheet_success_div" style="display: none;"><p style="color: #3c763d;text-align: center;">Data Saved successfully</p></div>
              <div class="col-md-12 col-sm-12 finish-btn" style="margin-top: 0px;margin-bottom: 0px;">
                <input type="submit" name="" value="Save" class="edit_balanace_btn">
              </div>
              
            </form>
        </div>
        <div class="modal-footer border-top-0">
         <!--  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        </div>
      </div>
      
    </div>
  </div>
  <!-- Edit Balance Sheet Modal End-->


    <!-- /#wrapper -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
    <script src="<?php echo base_url('assets/users'); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/amimation-menu-sidebar.js"></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/common.js"></script>
    <script type="text/javascript">
        $(document).on('click','.addUserBalanceSheet',function(){

            var balance_sheet_type = $(this).attr('dataid');
            var dataname = $(this).attr('dataname');
            $('.balanceSheetType').val(balance_sheet_type);
            $('.parameterName').text(dataname);
            $('#myModal').modal('toggle');

        });

        $(document).on('click','.add_balanace_btn',function(event){
            event.preventDefault();
            //alert();//add_balance_sheet_frm
            var parameter = $('.add_balance_sheet_frm .parameter').val();
            var amount = $('.add_balance_sheet_frm .amount').val();
            if(parameter=="")
            {
                $('.add_balance_sheet_frm .parameter').css("border","1px solid red");
                return false;
            }
            else
            {
                $('.add_balance_sheet_frm .parameter').css("border","");
            }
            if(amount=="")
            {
                $('.add_balance_sheet_frm .amount').css("border","1px solid red");
                return false;
            }
            else if(!($.isNumeric(amount)))
            {
                $('.add_balance_sheet_frm .amount').css("border","1px solid red");
                return false;
            }
            else
            {
                $('.add_balance_sheet_frm .amount').css("border","");
            }
            $.ajax({
                url:'<?php echo base_url("users/dashboard/add_balance_sheet_ajx"); ?>',
                method:'POST',
                data:new FormData( $(".add_balance_sheet_frm")[0]),
                async : false,
                cache : false,
                contentType : false,
                processData : false,
                success:function(data)
                {
                    if(data==1)
                    {
                       $(".add_balance_sheet_frm")[0].reset();
                       $('.add_balance_sheet_success_div').show();
                       setInterval(function(){ location.reload(); }, 3000);
                    }
                    else
                    {
                        alert('something went wrong');
                    }
                }
            })

        });


$(document).on('click','.editUserBalanceSheet',function(){
    var balance_sheet_id = $(this).attr('dataid');
    var balaneSheetName = $(this).attr('dataname');
    var parameter = $(this).attr('parameter');
    var salary = $(this).attr('salary');
    $('.balanceSheetId').val(balance_sheet_id);
    $('.parameterNameEdit').text(balaneSheetName);
    $('.parameter_edit').val(parameter);
    $('.amount_edit').val(salary);
    $('#editBalanceSheetModal').modal('toggle');
});

$(document).on('click','.edit_balanace_btn',function(event){
    event.preventDefault();
    //alert();//add_balance_sheet_frm
    var parameter = $('.edit_balance_sheet_frm .parameter_edit').val();
    var amount = $('.edit_balance_sheet_frm .amount_edit').val();
    if(parameter=="")
    {
        $('.edit_balance_sheet_frm .parameter_edit').css("border","1px solid red");
        return false;
    }
    else
    {
        $('.edit_balance_sheet_frm .parameter_edit').css("border","");
    }
    if(amount=="")
    {
        $('.edit_balance_sheet_frm .amount_edit').css("border","1px solid red");
        return false;
    }
    else if(!($.isNumeric(amount)))
    {
        $('.edit_balance_sheet_frm .amount_edit').css("border","1px solid red");
        return false;
    }
    else
    {
        $('.edit_balance_sheet_frm .amount_edit').css("border","");
    }
    $.ajax({
    url:'<?php echo base_url("users/dashboard/update_balance_sheet_ajx"); ?>',
    method:'POST',
    data:new FormData( $(".edit_balance_sheet_frm")[0]),
    async : false,
    cache : false,
    contentType : false,
    processData : false,
    success:function(data)
    {
        //console.log(data);
        if(data==1)
        {
           $(".edit_balance_sheet_frm")[0].reset();
           $('.edit_balance_sheet_success_div').show();
           setInterval(function(){ location.reload(); }, 3000);
        }
        else
        {
            alert('something went wrong');
        }
    }
    })

    });



</script>

<script type="text/javascript">
    function confirmDelete(id) {
    Swal.fire({
          title: 'Are you sure?',
          text: "Do you want to delete?",
          type: 'warning',
          allowOutsideClick: false,
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.value) 
          {
                $.ajax({
                  type:'POST',
                  url:'<?php echo base_url("users/dashboard/delete_balance_sheet_ajx"); ?>',
                  data:{id:id},
                  success:function(data)
                  {

                    Swal.fire(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                        );

                       setTimeout(function () {
                            location.reload();
                        }, 1000);
                  }
            });
            
          }
        })
}
  
$(document).ready(function(){
  $('.amount,.amount_edit').keypress(function(eve){
    if ((eve.which != 46 || $(this).val().indexOf('.') != -1) && (eve.which < 48 || eve.which > 57) || (eve.which == 46 && $(this).caret().start == 0) ) {
    eve.preventDefault();
  }

});
});  
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
</body>

</html>