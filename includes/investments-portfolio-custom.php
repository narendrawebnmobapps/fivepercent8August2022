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
                  url:'<?php echo base_url("users/portfolio/delete_investments_ajax"); ?>',
                  data:{investments_id:id},
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
    
</script>
<script type="text/javascript">
/*************************************************Funtion for field validation End********************************************/
function checkSelectBoxSelected(cls)
{        
    var selected = $(cls).val();
    if(selected=="")
    {
       $(cls).addClass('error');
        return false; 
    }
    else
    {
        $(cls).removeClass('error');
         return true; 
    }
}

/*************************************************Funtion for field validation End********************************************/
$(document).ready(function(){
    /********************************** Flip flop for Div   START****************************************/
    $('.box-select1').click(function(){
        $('.percentage-filter-boxs1').toggle();
        $('.box-1').toggleClass('col-md-9 col-sm-9 col-md-11 col-sm-11');
        $('.selectox1').toggleClass('col-md-3 col-sm-3 col-md-1 col-sm-1');
    });
    /********************************** Flip flop for Div   END****************************************/


    /********************************** Flip flop for Simultaion Div   START****************************************/
    $('.box-select2').click(function(){
        $('.percentage-filter-boxs2').toggle();
        $('.box-2').toggleClass('col-md-9 col-sm-9 col-md-11 col-sm-11');
        $('.selectox2').toggleClass('col-md-3 col-sm-3 col-md-1 col-sm-1');
    });
    /********************************** Flip flop for Simultaion Div  END****************************************/

    /******************************Get Dyanmic data using beta calculation for Stock Portfolio  START******************************/
    $('.balancesheettest').on('click', 'li', function() {
            var id = $(this).attr('data-id');
            $.ajax({
                url:'<?php echo base_url("users/portfolio/filter_option_select_ajax"); ?>',
                method:'POST',
                data:{id:id,s_type:1,page:'<?php echo $page; ?>'},
                dataType:'html',
                success:function(data)
                {
                    var parse = JSON.parse(data);
                    var html = '';
                    html+='<tr><th></th><th>Company</th><th>Number</th><th>Order Type</th><th>'+id+'</th><th></th><th></th><th></th></tr> ';
                    $.each(parse, function (index, value){
                        var result = $.base64.encode(value.id);
                        result = $.base64.encode(result);
                        var href = "<?php echo base_url('users/portfolio/details_stock_portfolio/') ?>"+result;
                        //console.log(result);
                        html+='<tr><td class="hide-row"><i style="cursor: pointer;" dataid="'+value.id+'" class="fa fa-minus delete-user-stock" onclick="confirmDelete('+value.id+')" aria-hidden="true"></i> <i style="cursor: pointer;" dataid="'+value.id+'" class="fa fa-edit edit-user-stock"></i></td><td><a href="'+href+'">'+value.stock_name+'</a></td><td>'+value.number+'</td> <td>'+value.order_type+'</td><td>1.22</td><td style="cursor: pointer;" class="esqmation" dataid="'+value.id+'"><i class="fa fa-info" aria-hidden="true"></i></td></tr>';
                    });
                    html+='<tr><td class="show-row" data-toggle="modal" data-target="#add_stock_modal" style="cursor: pointer;"><i class="fa fa-plus" aria-hidden="true"></i></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
                    $('#filter_option_stock_table').html(html);
                }
            });
    });  
    /********************************Get Dyanmic data using beta calculation for Stock Portfolio END*********************************/ 

    /******************************Get Dyanmic data using beta calculation for Fixed Stock Portfolio  START********************/
    $('.balancesheetfixedPortfolio').on('click', 'li', function() {
            var id = $(this).attr('data-id');
            $.ajax({
                url:'<?php echo base_url("users/portfolio/filter_option_select_ajax"); ?>',
                method:'POST',
                data:{id:id,s_type:2,page:'<?php echo $page; ?>'},
                dataType:'html',
                success:function(data)
                {
                    var parse = JSON.parse(data);
                    var html = '';
                    html+='<tr><th></th><th>Company</th><th>Number</th><th>Order Type</th><th>'+id+'</th><th></th><th></th><th></th></tr> ';
                    $.each(parse, function (index, value){
                        var result = $.base64.encode(value.id);
                        result = $.base64.encode(result);
                        var href = "<?php echo base_url('users/portfolio/details_stock_portfolio/') ?>"+result;
                        //console.log(result);
                        html+='<tr><td class="hide-row"><i style="cursor: pointer;" dataid="'+value.id+'" class="fa fa-minus delete-user-stock" onclick="confirmDelete('+value.id+')" aria-hidden="true"></i> <i style="cursor: pointer;" dataid="'+value.id+'" class="fa fa-edit edit-user-stock"></i></td><td><a href="'+href+'">'+value.stock_name+'</a></td><td>'+value.number+'</td> <td>'+value.order_type+'</td><td>1.22</td><td style="cursor: pointer;" class="esqmation" dataid="'+value.id+'"><i class="fa fa-info" aria-hidden="true"></i></td></tr>';
                    });
                    html+='<tr><td class="show-row" data-toggle="modal" data-target="#add_stock_modal" style="cursor: pointer;"><i class="fa fa-plus" aria-hidden="true"></i></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
                    $('#filter_option_stock_table').html(html);
                }
            });
    });  
    /********************************Get Dyanmic data using beta calculation for fixed stock Portfolio END*****************************/

    /******************************Get Dyanmic data using beta calculation for Option Portfolio  START********************/
    $('.balancesheetOptionPortfolio').on('click', 'li', function() {
            var id = $(this).attr('data-id');
            $.ajax({
                url:'<?php echo base_url("users/portfolio/filter_option_select_ajax"); ?>',
                method:'POST',
                data:{id:id,s_type:3,page:'<?php echo $page; ?>'},
                dataType:'html',
                success:function(data)
                {
                    var parse = JSON.parse(data);
                    var html = '';
                    html+='<tr><th></th><th>Company</th><th>Number</th><th>Order Type</th><th>'+id+'</th><th></th><th></th><th></th></tr> ';
                    $.each(parse, function (index, value){
                        var result = $.base64.encode(value.id);
                        result = $.base64.encode(result);
                        var href = "<?php echo base_url('users/portfolio/details_stock_portfolio/') ?>"+result;
                        //console.log(result);
                        html+='<tr><td class="hide-row"><i style="cursor: pointer;" dataid="'+value.id+'" class="fa fa-minus delete-user-stock" onclick="confirmDelete('+value.id+')" aria-hidden="true"></i> <i style="cursor: pointer;" dataid="'+value.id+'" class="fa fa-edit edit-user-stock"></i></td><td><a href="'+href+'">'+value.stock_name+'</a></td><td>'+value.number+'</td> <td>'+value.order_type+'</td><td>1.22</td><td style="cursor: pointer;" class="esqmation" dataid="'+value.id+'"><i class="fa fa-info" aria-hidden="true"></i></td><td><span class="rate-point-01">4.70</span></td><td><span class="rate-point-02">4.75</span></td></tr>';
                    });
                    html+='<tr><td class="show-row" data-toggle="modal" data-target="#add_stock_modal" style="cursor: pointer;"><i class="fa fa-plus" aria-hidden="true"></i></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
                    $('#filter_option_stock_table11').html(html);
                }
            });
    });  
    /********************************Get Dyanmic data using beta calculation for Option stock Portfolio END***************************/    

});

/********************************ADD Stock By user With Pop START******************************************/ 
$(document).on('click','#add_stock_btn',function(event){
event.preventDefault();
var stock_name = $('#add_stcok_form .fund_name').val();
var stock_type = $('#add_stcok_form .fund_type').val();
var amount = $('#add_stcok_form .numberOfStock').val();
var ok=1;
if(!checkSelectBoxSelected('#add_stcok_form .fund_name'))
{
    ok=2;
}
if(!checkSelectBoxSelected('#add_stcok_form .fund_type'))
{
    ok=2;
}
if(!checkSelectBoxSelected('#add_stcok_form .numberOfStock'))
{
    ok=2;
}

if(ok==1)
{
$.ajax({
        url:'<?php echo base_url("users/portfolio/add_investments_ajax"); ?>',
        method:'POST',
        data:new FormData( $("#add_stcok_form")[0]),
        async : false,
        cache : false,
        contentType : false,
        processData : false,
        success:function(data)
        {
          console.log(data);
          if(data=="login")
          {
            window.location='<?php echo base_url("signin"); ?>';
          }
          else if(data==1)
           {
              $('.add-stock-success-div').show();
             setInterval(function()
                    {  
                        location.reload();
                    }, 3000);
           }
           else
           {
            alert('something went wrong');
           }
        }
    });
}
});

/********************************ADD Stock By user With Pop END******************************************/ 

/********************************DELETE Stock By user START******************************************/
/*$(document).on('click','.delete-user-stock',function(){
var confirmation = confirm('are you sure you want to delete this Stock?');
if(confirmation==true)
{
    var stock_id = $(this).attr('dataid');
    $.ajax({
        url:'<?php echo base_url("users/portfolio/delete_stock_ajax"); ?>',
        method:'POST',
        data:{stock_id:stock_id},
        success:function(data)
        {
          console.log(data);
          if(data=="login")
          {
            window.location='<?php echo base_url("signin"); ?>';
          }
          else if(data==1)
           {
                alert('Stock Deleted Successfully');
                location.reload();

           }
           else
           {
            alert('something went wrong');
           }
        }
    });
}
else
{

}
});*/
/********************************DELETE Stock By user START******************************************/

/********************************Show Stock Information using pop START******************************************/
$(document).on('click','.esqmation',function(){
var id = $(this).attr('dataid');
$('.loader-image').show();
$('body').addClass('loader');
$.ajax({
        url:"<?php echo base_url('users/portfolio/show_investments_info_ajax'); ?>",
        method:'POST',
        data:{id:id},
        dataType:'html',
        success:function(data)
        {
          $('.loader-image').hide();
          $('body').removeClass('loader');
          console.log(data);
          if(data=="login")
          {
            window.location='<?php echo base_url("signin"); ?>';
          }
          else
          {
            $('#show_stock_info_modal .info-data').text(data);
            $('#show_stock_info_modal').modal('show');
          }
        }
    });
});
/********************************Show Stock Information using pop END******************************************/

/********************************Charts Starts HERE******************************************/
ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "b55b025e438fa8a98e32482b5f768ff5"];
let chartData = [{
        text: 'IBEX',
        values: [0, 200, 400, 600, 800, 1000, 1200, 1400, 1600, 1800, 2000, 2200, 2400, 2600, 2800,3000,3200,3400,3600,3800,4000,4200],
        lineColor: '#1e38a8',
        marker: {
            backgroundColor: '#1e38a8',
            borderColor: '#1e38a8'
        }
    },  
    {
        text: 'BBVA',
        values: [0, 300, 450, 600, 750, 900, 1050, 1200, 1350, 1500, 1650, 1800, 1950, 2100, 2250,2400,2550,2700,2850,3000,3150,3300],
        lineColor: '#f04312',
        marker: {
            backgroundColor: '#f04312',
            borderColor: '#f04312'
        }
    }, 
    {
        text: 'TOTAL',
        values: [0, 200, 300, 400, 500, 600, 700, 800, 900, 1000, 1100, 1200, 1300, 1400, 1500,1600,1700,1800,1900,2000,2100,2200],
        lineColor: '#030303',
        marker: {
            backgroundColor: '#030303',
            borderColor: '#030303'
        }
    },
    {
        text: 'COL',
        values: [0, 50, 100, 150, 200, 250, 300, 350, 400, 450, 500, 550, 600, 650, 700,750,800,850,900,950,1000,1050],
        lineColor: '#0c3666',
        marker: {
            backgroundColor: '#0c3666',
            borderColor: '#0c3666'
        }
    },        
];

let chartConfig = {
    type: 'line',
   // theme: 'classic',
    backgroundColor: 'white',
    legend: {
        marginTop: '5%',
        backgroundColor: 'white',
        borderWidth: '0px',
        item: {
            cursor: 'hand'
        },
        layout: 'x5',
        marker: {
            borderWidth: '0px',
            cursor: 'hand'
        },
        shadow: false,
        toggleAction: 'remove'
    },
    plot: {
        backgroundMode: 'graph',
        backgroundState: {
            lineColor: '#eee',
            marker: {
                backgroundColor: 'none'
            }
        },
        lineWidth: '2px',
        marker: {
            size: '2px'
        },
        selectedState: {
            lineWidth: '4px'
        },
        selectionMode: 'multiple'
    },
    /*plotarea: {
        margin: '15% 25% 10% 7%'
    },*/
    scaleX: {
        values: '1990:2020:2',
        maxItems: 16
    },
    scaleY: {
        lineColor: '#333'
    },
    tooltip: {
        text: '%t: %v outbreaks in %k'
    },
    series: chartData
};

zingchart.render({
    id: 'myChart-5s',
    data: chartConfig,
    height: '400px',
    width: '100%',

});
/********************************Charts End HERE******************************************/


$(document).ready(function(){
  $('#back-from-simulation').click(function(){
    $('.user-added-stock-list').show();
    $('.variable-chart-simulation').hide();
  });
  $('#go-from-stock-to-simulation').click(function(){
    $('.user-added-stock-list').hide();
    $('.variable-chart-simulation').show();
  });

  
});

/********************************Update Stock By user With Pop START******************************************/ 
$(document).on('click','.edit-user-stock',function(){
    $('.loader-image').show();
    $('body').addClass('loader');
    var investments_id = $(this).attr('dataid');
    $.ajax({
        url:"<?php echo base_url('users/portfolio/edit_investments'); ?>",
        method:'POST',
        data:{investments_id:investments_id},
        dataType:'html',
        success:function(data)
        {
          $('.loader-image').hide();
          $('body').removeClass('loader');
          
          if(data=="login")
          {
            window.location='<?php echo base_url("signin"); ?>';
          }
          else
          {
            var value = JSON.parse(data);
            console.log(value);
            $('#edit_stcok_form .user_investments_id').val(value.id);
            $('#edit_stcok_form .fund_name').val(value.investments_id);
            $('#edit_stcok_form .fund_type').val(value.fund_type);
            $('#edit_stcok_form .numberOfStock').val(value.amount);
            $('#edit_stock_modal').modal('show');
          }
        }
    });    
  });

$(document).on('click','#update_stock_btn',function(event){
event.preventDefault();
var ok=1;
if(!checkSelectBoxSelected('#edit_stcok_form .fund_name'))
{
    ok=2;
}
if(!checkSelectBoxSelected('#edit_stcok_form .fund_type'))
{
    ok=2;
}
if(!checkSelectBoxSelected('#edit_stcok_form .numberOfStock'))
{
    ok=2;
}

if(ok==1)
{
$.ajax({
        url:'<?php echo base_url("users/portfolio/update_investments_ajax"); ?>',
        method:'POST',
        data:new FormData( $("#edit_stcok_form")[0]),
        async : false,
        cache : false,
        contentType : false,
        processData : false,
        success:function(data)
        {
          //console.log(data);
          if(data=="login")
          {
            window.location='<?php echo base_url("signin"); ?>';
          }
          else if(data==1)
           {
              $('.update-stock-success-div').show();
             setInterval(function()
                    {  
                        location.reload();
                    }, 1000);
           }
           else
           {
            alert('something went wrong');
           }
        }
    });
}
});

/********************************Update Stock By user With Pop END******************************************/ 


</script>