<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="images/favicons.png" type="images/x-icon" />
  <title><?php echo $title; ?></title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url('assets/users'); ?>/css/bootstrap.min.css" rel="stylesheet">
  <!-- Style CSS -->
  <link href="<?php echo base_url('assets/users'); ?>/css/main-custom.css" rel="stylesheet">
  <link href="<?php echo base_url('assets/users'); ?>/css/dashbord.css" rel="stylesheet">
  <!-- Font Awesome core CSS -->
  <link href="<?php echo base_url('assets/users'); ?>/css/font-awesome.min.css" rel="stylesheet">
  <!-- Rang Slider core CSS -->
  <link href="<?php echo base_url('assets/users'); ?>/css/main.min.css" rel="stylesheet">
  <!-- Textpager Css -->
  <link href="<?php echo base_url('assets/users'); ?>/css/pag.css" rel="stylesheet">

   <link href="<?php echo base_url('assets/users'); ?>/css/responsive.css" rel="stylesheet">
</head>

<body>


<style type="text/css">

.box-contant-boxe-question {
    background-color: #ffffff;
    
    webkit-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.75);
    -moz-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.75);
    box-shadow: 0px 0px 5px 0px rgb(183, 181, 181);
    
}


</style>

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
                                <li>Trading Diary</li>                            
                            </ul>
                        </div>
                    </div>
            <div class="col-md-12">
              <div class="box-contant-boxe-question">
                <div class="panel panel-primary">
                  <div class="panel-body">
                    <div class="tab-content">
                      <div class="tab-pane active" id="tab1">
                        <div class="col-md-12 col-sm-12 persnal-info-form-make">
                        <?php
                              if($this->session->flashdata('success')){
                           ?>
                          <div class="alert alert-success text-center">
                            <?php echo $this->session->flashdata('success'); ?>
                          </div>
                      <?php } ?>
                        <div class="center-profile-box">
                            <form method="post" action="" enctype="multipart/form-data">
                              <div class="col-md-12 col-sm-12">
                                <label>Date In</label>
                                <div class="form-group">
                                  <input type="text" value="<?php echo $tradingDiaries['date_in']; ?>" name="datein" onchange="ValidateEndDate('datepicker_datein')" id="datepicker_datein" required placeholder="" class="form-control">
                                </div>
                              </div>
                              <div class="col-md-12 col-sm-12">
                                <label>Product</label>
                                <div class="form-group">
                                  <select name="product" required class="form-control">
                                    <option value="">Select Product</option>
                                    <?php foreach($products as $pro){ ?>
                                    <option value="<?php echo $pro->id; ?>" <?php if($pro->id==$tradingDiaries['stock_id']) {echo "selected";} ?>><?php echo $pro->stock_name; ?></option>
                                  <?php } ?>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-12 col-sm-12">
                                <label >Order Type</label>
                                <div class="form-group">
                                    <select class="form-control" name="stock_type" required>
                                        <option value="">Select Stock Type</option>
                                        <?php  $orderTypeArray = array('Market','Limited','Stop'); foreach($orderTypeArray as $ota){ ?>
                                        <option value="<?php echo $ota; ?>" <?php echo ($ota==$tradingDiaries['order_type'])? 'selected':''; ?>><?php echo $ota; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                              </div>
                              <div class="col-md-12 col-sm-12">
                                <label>Strategy</label>
                                <div class="form-group">
                                  <select name="strategy" required class="form-control">
                                    <option value="">Select Strategy</option>
                                    <?php foreach($strategies as $strategy){ ?>
                                    <option value="<?php echo $strategy->id; ?>" <?php if($strategy->id==$tradingDiaries['startegy']) {echo "selected";} ?>><?php echo $strategy->strategy; ?></option>
                                  <?php } ?>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-12 col-sm-12">
                                <label>Broker</label>
                                <div class="form-group">
                                  <select name="broker" required class="form-control">
                                    <option value="">Select Broker</option>
                                    <?php foreach($brokers as $broker){ ?>
                                    <option value="<?php echo $broker['broker_id']; ?>" <?php if($broker['broker_id']==$tradingDiaries['broker']) {echo "selected";} ?>><?php echo $broker['first_name'].' '.$broker['last_name']; ?></option>
                                  <?php } ?>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-12 col-sm-12">
                                <label> Price In</label>
                                <div class="form-group">
                                  <input type="text"   name="pricein" value="<?php echo $tradingDiaries['price_in']; ?>" required  class="form-control pricein">
                                </div>
                              </div>
                              <div class="col-md-12 col-sm-12">
                                <label>Initial Volume</label>
                                <div class="form-group">
                                  <input type="text"  name="volume" value="<?php echo $tradingDiaries['volume']; ?>" required  class="form-control initialVolume">
                                </div>
                              </div>
                              <div class="col-md-12 col-sm-12">
                                <label>Date Out</label>
                                <div class="form-group">
                                  <input type="text" value="<?php echo $tradingDiaries['date_out']; ?>" onchange="ValidateEndDate('datepicker_dateout')" name="dateout"  id="datepicker_dateout" placeholder="" class="form-control">
                                </div>
                              </div>

                              <div class="col-md-12 col-sm-12">
                                <label> Price Out</label>
                                <div class="form-group">
                                  <input type="text"   name="priceout" value="<?php echo $tradingDiaries['price_out']; ?>"  class="form-control priceout">
                                </div>
                              </div>
                              <div class="col-md-12 col-sm-12">
                                <label>Final Volume</label>
                                <div class="form-group">
                                  <input type="text" value="<?php echo $tradingDiaries['final_volume']; ?>"  name="finalvolume"  value="" required  class="form-control finalVolume">
                                </div>
                              </div>
                              <div class="col-md-12 col-sm-12 message-box-fli">
                                <label>Comment</label>
                                <div class="form-group">
                                  <textarea type="message" name="comment" class="form-control"><?php echo $tradingDiaries['comment']; ?></textarea>
                                </div>
                              </div>
                              <div class="col-md-12 col-sm-12 finish-btn">
                                <input type="submit" name="" value="Save">
                              </div>
                            </form>
                          </div>
                    </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- Question tab Section End Here -->
  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
   <!-- Placed at the end of the document so the pages load faster -->
   <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="<?php echo base_url('assets/users'); ?>/js/bootstrap.min.js"></script> 
  <script src="<?php echo base_url('assets/users'); ?>/js/amimation-menu-sidebar.js"></script>
  <script src="<?php echo base_url('assets/users'); ?>/js/paginate.js"></script>
  <script src="<?php echo base_url('assets/users'); ?>/js/custom.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="<?php echo base_url('assets/users'); ?>/js/common.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script type="text/javascript">
    $(function() {
        $( "#datepicker_datein,#datepicker_dateout" ).datepicker({
            dateFormat : 'mm/dd/yy',
            changeMonth : true,
            changeYear : true,
            yearRange: '-100y:c+nn',
            defaultdate:'01-01-1990',
        });
    });
   
</script>

  <script type="text/javascript">
    function sweetAlert(type,title,message)
    {
      Swal.fire({
          allowOutsideClick: false,
          type: type,
          title: title,
          text: message,
          //footer: '<a href>Why do I have this issue?</a>'
        })
    }
    function ValidateEndDate(id) 
    {
       var StartDate= document.getElementById('datepicker_datein').value;
      var EndDate= document.getElementById('datepicker_dateout').value;
      var eDate = new Date(EndDate);
      var sDate = new Date(StartDate);
      if(StartDate!= '' && StartDate!= '' && sDate> eDate)
        {
          document.getElementById(id).value = "";
          //alert("Please ensure that the End Date is greater than or equal to the Start Date.");
          sweetAlert('error','Oops...','Please ensure that the End Date is greater than or equal to the Start Date.');
          return false;

        }

   }

$(document).ready(function(){
  $('.priceout,.pricein').keypress(function(eve){
    if ((eve.which != 46 || $(this).val().indexOf('.') != -1) && (eve.which < 48 || eve.which > 57) || (eve.which == 46 && $(this).caret().start == 0) ) {
    eve.preventDefault();
  }

  });
});

function keypresssphone(th,e)
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
// for integer
$(".initialVolume,.finalVolume").inputFilter(function(value) {
  return /^-?\d*$/.test(value); });
//for floating
$(".pricein,.priceout").inputFilter(function(value) {
  return /^-?\d*[.,]?\d{0,2}$/.test(value); });
</script>

</body>
</html>