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
    
    <link href="<?php echo base_url('assets/users'); ?>/css/pag.css" rel="stylesheet">

    <link href="<?php echo base_url('assets/users'); ?>/css/responsive.css" rel="stylesheet"> 
    <style type="text/css">
        .box-centre{
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 25px;
   overflow-x: scroll;
    white-space: nowrap;

        }


.box-centre .col-md-2 {
    width: 100%;
}
        .write-bx {
    width: 100%;
    background: #f7f6f6;
    height: 332px;
    text-align: center;
    padding: 12px;
    border: 1px solid #e6e4e4;
    margin: 0px 2px 0px 2px;
}
.all-parameter {
    width: 900px;
}


.write-bx {
    width: 184px;
    background: #f7f6f6;
    height: 332px;
    text-align: center;
    padding: 12px;
    border: 1px solid #e6e4e4;
    margin: 0px 2px 0px 2px;
}


.all-parameter {
    width: 1091px;
    /* float: left; */
    display: inherit;
    white-space: nowrap;
    box-sizing: content-box;
}

.box-centre .col-md-2 {
    width: 800px;
    float: left;
}
 .customPagination, .paginacaoCursor{
      margin: 20px 5px;
      padding: 9px 16px;
      color: #fff;
      background: #5f9ea0;
      cursor: pointer;
    }
ul.filterAppendData li.active {
    color: #053852;
}
.stock-protfolo {
    height: 365px;
}

.addClassGreen{
    color: green;
}
.addClassRed{
    color: red;
}
</style>  
</head>
<body>
    <div id="throbber" style="display:none; min-height:120px;"></div>
    <div id="noty-holder"></div>
    <div id="wrapper">
        <!-- Navigation -->
        <?php $this->load->view('page/include/sidebar');  ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row" id="main">
                   <div class="col-sm-12 col-md-12 well" id="content">
                        <!-- <h1 class="ttile-heading">Trading Diary</h1> -->
                        <div class="bradcrum-list">
                            <ul>
                                <li style="">Trading Diary</li>
                            </ul>
                        </div>
                    </div>
                    <!-- TradingView Widget BEGIN -->

                       <?php
                       if($this->uri->segment(4))
                        {
                            $page = ($this->uri->segment(4)) ;
                        }
                        else
                        {
                            $page = 1;
                        }

                        ?>
                        <div class="bg-box-prt">
                             

                            <div class="stock-protfolo tradingdiaryDiv">
                                <table id="filterAppendDataTable">                                        
                                    <tbody class="paginationList list-group">
                                        <tr>
                                            <th></th>
                                            <th>Date In</th>
                                            <th>Product</th>
                                            <th>Price In</th>
                                            <th>Date Out</th>
                                            <th>Price Out</th>
                                            <th>P/L</th>                                           
                                        </tr> 
                                        <?php 
                                        //echo "<pre>";print_r($tradingDiaries);die;
                                        $i=1;
                                        foreach($tradingDiaries as $tradingdiary)
                                        { 
                                            
                                        ?>                                   
                                        <tr class="listItem">
                                            <td class="hide-row"><a href="javascript:void(0);" onclick="confirmDelete('<?php echo base64_encode($tradingdiary['id']) ?>')"><i style="cursor: pointer;"  class="fa fa-minus" aria-hidden="true"></i></a> <a href="<?php echo base_url('users/tradingdiary/edit_trading_diary/'.base64_encode($tradingdiary['id'])); ?>"><i style="cursor: pointer;" class="fa fa-edit"></i></a></td>
                                            <td><?php echo date("d-M-Y", strtotime($tradingdiary['date_in']));  ?></td>
                                            <td><?php echo $tradingdiary['stock_name']; ?></td>
                                            <td><?php echo $tradingdiary['price_in']; ?></td>
                                            <td>
                                                <?php 
                                                if($tradingdiary['date_out']!="" && $tradingdiary['final_volume']>0)
                                                {

                                                    echo date("d-M-Y", strtotime($tradingdiary['date_out'])); 
                                                }
                                                else
                                                {
                                                    echo '-';
                                                }
                                                ?>
                                                
                                            </td>
                                            <td>
                                                <?php 
                                                    if($tradingdiary['final_volume']>0)
                                                    {
                                                       echo $tradingdiary['price_out']; 
                                                    }
                                                    else
                                                    {
                                                        echo '-';
                                                    }

                                                     
                                                ?>
                                                
                                            </td>
                                            <td>
                                                <?php 
                                                    if($tradingdiary['final_volume']>0)
                                                    {
                                                        if(($tradingdiary['price_in']*$tradingdiary['final_volume'])<($tradingdiary['price_out']*$tradingdiary['final_volume']))
                                                        {
                                                            echo '<span style="color:green">'.(($tradingdiary['price_out']*$tradingdiary['final_volume'])-($tradingdiary['price_in']*$tradingdiary['final_volume'])).'</span>';
                                                        }
                                                        else
                                                        {
                                                          echo '<span style="color:red">'.(($tradingdiary['price_in']*$tradingdiary['final_volume'])-($tradingdiary['price_out']*$tradingdiary['final_volume'])).'</span>';  
                                                        }
                                                    }
                                                    else
                                                    {
                                                        echo '-';
                                                    }
                                                

                                                ?>
                                                
                                            </td>
                                        </tr>
                                        <?php $i++; } ?>
                                        <tr>
                                            <td class="show-row" style="cursor: pointer;"><a href="<?php echo base_url('users/tradingdiary/add_trading_diary'); ?>"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                                
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
                        <div class="boc-information-prts-sec">
                            <ul class="filterAppendData">
                                <li data-id="Strategy" val_id="1">Strategy</li>
                                <li data-id="Comment" val_id="2">Comment</li>
                                <li data-id="Initial Volume" val_id="3">Initial Volume</li>
                                <li data-id="P/L" val_id="11">P/L</li>
                                <li data-id="Broker" val_id="5">Broker</li>
                                <li data-id="Date In" val_id="6">Date In</li>
                                <li data-id="Product" val_id="7">Product</li>
                                <li data-id="Price In" val_id="8">Price In</li>
                                <li data-id="Date Out" val_id="9">Date Out</li>
                                <li data-id="Price Out" val_id="10">Price Out</li>
                                <li data-id="Sold Volume" val_id="4">Sold Volume</li> 
                                <!-- <li data-id="Remaining Volume" val_id="12">Remaining Volume</li>  -->
                            </ul>
                        </div>

                </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js "></script>
    <script src="<?php echo base_url('assets/users/js/jquery.base64.js'); ?>"></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/bootstrap.min.js "></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/amimation-menu-sidebar.js"></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/common.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.filterAppendData').on('click', 'li', function() {
                    $('.filterAppendData li ').removeClass("active");
                    $(this).addClass("active");
                    var parameter = $(this).attr('data-id');
                    var id = $(this).attr('val_id');
                    //alert(parameter);
                    //alert(id);
                    if(id<=5)
                    {
                        $.ajax({
                            url:'<?php echo base_url("users/tradingdiary/filter_option_select_ajax"); ?>',
                            method:'POST',
                            data:{id:id,page:'<?php echo $page; ?>'},
                            dataType:'html',
                            success:function(data)
                            {
                               //console.log(data);
                               //alert(data);
                                var parse = JSON.parse(data);
                                var html = '';
                                html+='<tr><th></th><th>DATE IN</th><th>PRODUCT</th><th>PRICE IN</th><th>DATE OUT</th><th>PRICE OUT</th><th>P/L</th><th>'+parameter+'</th></tr> ';
                                $.each(parse, function (index, value){
                                    var param = '';
                                    if(id==1)
                                    {
                                       param =  value.strategy;
                                    }
                                    if(id==2)
                                    {
                                       param =  value.comment;
                                    }
                                    if(id==3)
                                    {
                                       param =  value.volume;
                                    }
                                     if(id==5)
                                    {
                                       param =  value.broker;
                                    }
                                    if(id==4)
                                    {
                                       param =  value.final_volume;
                                    }
                                    /*if(id==12)
                                    {
                                       param =  value.remaininVolume;
                                    }*/
                                   var result = $.base64.encode(value.id);
                                    //result = $.base64.encode(result);
                                    var edit_link = "<?php echo base_url('users/tradingdiary/edit_trading_diary/') ?>"+result;
                                    var delete_link = "<?php echo base_url('users/tradingdiary/delete_trading_diary/') ?>"+result;
                                    html+='<tr class="listItem"><td class="hide-row"><a href="javascript:void()" onclick="confirmDelete(`'+result+'`)"><i style="cursor: pointer;"  class="fa fa-minus" aria-hidden="true"></i></a> <a href="'+edit_link+'"><i style="cursor: pointer;" class="fa fa-edit"></i></a></td><td>'+value.date_in+'</td><td>'+value.stock_name+'</td><td>'+value.price_in+'</td><td>'+value.date_out+'</td><td>'+value.price_out+'</td><td>'+value.pl+'</td><td>'+param+'</td></tr>';
                                });
                                html+='<tr><td class="show-row" style="cursor: pointer;"><a href="<?php echo base_url('users/tradingdiary/add_trading_diary'); ?>"><i class="fa fa-plus" aria-hidden="true"></i></a></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
                                $('#filterAppendDataTable').html(html);
                            }
                        });
                    }
                    else
                    {
                        //location.reload();
                    }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
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
                          url:'<?php echo base_url("users/tradingdiary/delete_trading_diary"); ?>',
                          data:{diary_id:id},
                          success:function(data)
                          {

                            Swal.fire(
                                  'Deleted!',
                                  'Your Record has been deleted.',
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
    </script>
    
</body>
</html>