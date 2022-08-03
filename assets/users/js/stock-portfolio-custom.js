/*************************************************Funtion for field validation End********************************************/
function checkSelectBoxSelected(cls)
{        
    var selected = $(cls+' option:selected').val();
    if(selected=="")
    {
       $(cls).addClass('error');
        return false; 
    }
    else
    {
        $(cls).removeClass('error');
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
    /**********************************Get Dyanmic data using beta calculation  START****************************************/
    $('.balancesheettest').on('click', 'li', function() {
            var id = $(this).attr('data-id');
            $.ajax({
                url:'<?php echo base_url("users/portfolio/filter_option_select_ajax"); ?>',
                method:'POST',
                data:{id:id},
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
                        html+='<tr><td style="cursor: pointer;" class="hide-row delete-user-stock" dataid="'+value.id+'"><i class="fa fa-minus" aria-hidden="true"></i></td><td><a href="'+href+'">'+value.stock_name+'</a></td><td>300</td> <td> <select class="form-control" style="width: 60%;"><option>MARKET</option> <option>LIMITED</option><option>STOP</option></select></td><td>1.22</td><td style="cursor: pointer;" class="esqmation" dataid="'+value.id+'"><i class="fa fa-info" aria-hidden="true"></i></td><td><span class="rate-point-01">4.70</span></td><td><span class="rate-point-02">4.75</span></td></tr>';
                    });
                    html+='<tr><td class="show-row" data-toggle="modal" data-target="#add_stock_modal" style="cursor: pointer;"><i class="fa fa-plus" aria-hidden="true"></i></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
                    $('#filter_option_stock_table').html(html);
                }
            });
    });  
    /********************************Get Dyanmic data using beta calculation END******************************************/     

});

/********************************ADD Stock By user With Pop START******************************************/ 
$(document).on('click','#add_stock_btn',function(event){
event.preventDefault();
var stock_name = $('#add_stcok_form .stock_name option:selected').val();
var stock_type = $('#add_stcok_form .stock_type option:selected').val();
checkSelectBoxSelected('#add_stcok_form .stock_name');
checkSelectBoxSelected('#add_stcok_form .stock_type');
$.ajax({
        url:'<?php echo base_url("users/portfolio/add_stock_ajax"); ?>',
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
});

/********************************ADD Stock By user With Pop END******************************************/ 

/********************************DELETE Stock By user START******************************************/
$(document).on('click','.delete-user-stock',function(){
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
});
/********************************DELETE Stock By user START******************************************/

/********************************Show Stock Information using pop START******************************************/
$(document).on('click','.esqmation',function(){
var id = $(this).attr('dataid');
alert(id);
$.ajax({
        url:"http://localhost/fivepercent/users/portfolio/show_stock_info_ajax",
        method:'POST',
        data:{id:id},
        dataType:'html',
        success:function(data)
        {
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