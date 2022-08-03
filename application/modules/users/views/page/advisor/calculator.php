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
    <!-- Responsive CSS -->
    <link href="<?php echo base_url('assets/users'); ?>/css/responsive.css" rel="stylesheet">
    <!-- Animate CSS -->
    <link href="<?php echo base_url('assets/users'); ?>/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/users'); ?>/css/main-custom.css" rel="stylesheet">
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>
<style type="text/css">
    .centre-box-calculatre {
    width: 100% !important;
    margin: 15px 0 !important;
    padding: 10px !important;
}
  .list_table{
    width: 100%;
    padding: 4px 0;
    text-align: center;
}
  .list_table h3 {
    margin-top: 0;
    font-size: 18px;
    color: #063853;
    margin-bottom: 5px;
}
.centre-box-calculatre label {
    font-size: 14px !important;
}
.centre-box-calculatre .form-control {
    height: 35px !important;
    font-size: 14px !important;
    margin-bottom: 13px !important;
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
                        <!-- <h1 class="ttile-heading">Client Profile</h1> -->
                        <div class="bradcrum-list">
                            <ul>
                                <li><a href="<?php echo base_url('user/dashboard'); ?>">Dashbord</a>
                                </li>
                                <li>/</li>
                                <li><?php echo $sub_title; ?></li>                            
                            </ul>
                        </div>
                    </div>
                   
                    <div class="col-md-12 col-sm-12 client-profile-tab">
                        <div class="panel panel-primary">
                            
                            <div class="panel-body">
                                <div class="tab-content">
                                     
                                   
                                    <div class="col-md-6 col-sm-6">
                                            <div class="centre-box-calculatre">
                                            <form method="" name="investments_calculator" id="investments_calculator">
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Actual Age</label>
                                                        <input type="text" onblur="getyears_investments(this)" id="actual_age" onkeypress="return isNumberKey(this, event);" name="actual_age" placeholder="40 Years" class="form-control actual_age" required>

                                                    </div>
                                                </div>
                                                 <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Expected Life</label>
                                                        <input type="text" onblur="getyears_investments(this)" name="expected_age" onkeypress="return isNumberKey(this, event);"placeholder="95 Years" class="form-control expected_age"required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Retirement Age</label>
                                                        <input type="text" name="retirement_age" onblur="getyears_investments(this)"  placeholder="67" class="form-control retirement_age" >
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Years Saving</label>
                                                        <input type="text" name="years" onblur="getyears_investments(this)" onkeypress="return isNumberKey(this, event);" id="years" placeholder="" class="form-control years"  readonly required>
                                                    </div>
                                                </div>
                                                 

                                                 <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Years After retire</label>
                                                        <input type="text" name="after_retire" placeholder="" class="form-control after_retire" readonly>
                                                    </div>
                                                </div>

                                                 <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Initial Capital</label>
                                                        <input type="text" name="initial_capital" onkeypress="return isNumberKey(this, event);" placeholder="20000" class="form-control initial_capital" required>
                                                    </div>
                                                </div>

                                                   <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Required Capital</label>
                                                        <input type="text" name="requirement_capital" onkeypress="return isNumberKey(this, event);"placeholder="403200" class="form-control requirement_capital" required>
                                                    </div>
                                                </div>

                                                 <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Annual Contributions</label>
                                                        <input type="text"  onkeypress="return isNumberKey(this, event);" name="annual_balance" placeholder="10000" class="form-control annual_balance" required>
                                                    </div>
                                                </div> 


                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Required Interest Rate %</label>
                                                        <input type="text" onkeypress="return isdecimalkey(this, event);" name="interest_rate" placeholder="2.42%" class="form-control interest_rate"   required>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Inflation % (Reference Only)</label>
                                                        <input type="text" name="inflation" value="2" placeholder="2%" class="form-control inflation" readonly>
                                                    </div>
                                                </div>

                                                  <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                         <label>Taxes % (Reference Only)</label>
                                                        <input type="text" value="10"name="taxes" placeholder="10%" class="form-control taxes" readonly >
                                                    </div>
                                                </div>

                                                <div class="col-md-12 col-sm-12 finish-btn" style="margin-top: 0px;">
                                                <input type="submit" name="calculate" value="Calculate">
                                              </div>
                                            </form>
                                         </div>
                                      </div><!-- End of col md 6 -->
                                     
                                      <div class="col-md-6 col-sm-6">
                                          <div class="centre-box-calculatre Annual_schedule" id="Annual_schedule">
                                            <div class="list_table">
                                                <h3>Annual Schedule</h3>
                                            </div>
                                              <table class="table table-bordered">
                                                <thead>
                                                  <tr>
                                                    <th>Years</th>
                                                    <th>Interest</th>
                                                    
                                                  </tr>
                                                </thead>
                                                <tbody class="view_result">
                                                  
                                                </tbody>
                                              </table>
                                          </div>
                                      </div>

                                         



                                    <style type="text/css">
                                        .centre-box-calculatre {
                                        width: 73%;
                                        margin: 48px auto 54px auto;
                                        background-color: #fff;
                                        display: inline-block;
                                        display: table;
                                        padding: 20px;
                                        webkit-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.75);
                                        -moz-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.75);
                                        box-shadow: -2px 2px 15px -6px rgb(10, 10, 10);
                                      
                                    }

                                        .centre-box-calculatre .form-control{
                                        height: 46px;
                                        border: 1px solid #c5c4c4;
                                        box-shadow: none;
                                        /* padding-left: 37px; */
                                        font-weight: 600;
                                        font-size: 14px;
                                        border-radius: 0px;
                                        margin-bottom: 35px;
                                        font-family: 'Open Sans', sans-serif;}

                                        .centre-box-calculatre label {
                                                color: #08384f;
                                                font-weight: 500;
                                                font-size: 16px;
                                                margin-bottom: 3px;
                                        }

                                    </style>
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
    <!-- /#wrapper -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')
    </script>
    <script src="<?php echo base_url('assets/users'); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/amimation-menu-sidebar.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <!-- <script type="text/javascript" src="<?php echo base_url('assets/users/js/sidebarmenu.js'); ?>"></script> -->
    <script src="<?php echo base_url('assets/users'); ?>/js/common.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script> -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    // jQuery ".Class" SELECTOR.
    $(document).ready(function() {
        $('.Annual_schedule').hide();
    });
    // THE SCRIPT THAT CHECKS IF THE KEY PRESSED IS A NUMERIC OR DECIMAL VALUE.
   function isdecimalkey(txt, evt) {
      var charCode = (evt.which) ? evt.which : evt.keyCode;
      if (charCode == 46) {
        //Check if the text already contains the . character
        if (txt.value.indexOf('.') === -1) {
          return true;
        } else {
          return false;
        }
      } else {
        if (charCode > 31 &&
          (charCode < 48 || charCode > 57))
          return false;
      }
      return true;
    }
    function isNumberKey(txt, evt) {
      var charCode = (evt.which) ? evt.which : evt.keyCode;
      
        if (charCode > 31 &&
          (charCode < 48 || charCode > 57))
        {
          return false;
        }else{
            return true;
        }
      
    }
    
    function getyears_investments(thh)
    {
       //var years=$(thh).val();expected_age
       var actual_age= $('#investments_calculator .actual_age').val();
       var retirement_age= $('#investments_calculator .retirement_age').val();
       var expected_age= $('#investments_calculator .expected_age').val();
      var years=parseInt(retirement_age)-parseInt(actual_age);
      if(isNaN(years))
      {
        years = "";
      }

      var after_retire=parseInt(expected_age)-parseInt(retirement_age);
      if(isNaN(after_retire))
      {
        after_retire='';
      }
        $('#investments_calculator .years').val(years);
        $('#investments_calculator .after_retire').val(after_retire);
    }  
    $( "#investments_calculator" ).submit(function( event ) {
      event.preventDefault();
        var requirement_capital= parseInt($('#investments_calculator .requirement_capital').val());
        var initial_capital= parseInt($('#investments_calculator .initial_capital').val());
        var years= parseInt($('#investments_calculator .years').val());
        var annual_balance= parseInt($('#investments_calculator .annual_balance').val());
        var interest_rate= $('#investments_calculator .interest_rate').val();
        $('.Annual_schedule').show();
        $('.view_result').empty();
       // alert(interest_rate);
           /*  alert(initial_capital);
             alert(years);
             alert(interest_rate);
             alert(annual_balance);
             console.log(interest_rate);*/
     var  total_amount=initial_capital;
     var  AnnualContributions=0;
       for(var i = 1; i <= years; i++) {
         
          total_amount = total_amount+AnnualContributions+((total_amount+AnnualContributions)*interest_rate/100);
          AnnualContributions=annual_balance;
          var show_val = (Math.round(total_amount * 100) / 100).toFixed(2);
          $('.view_result').append("<tr><td>"+i+" -Years</td><td>"+show_val+"</td></tr>");
          console.log(total_amount);
         }

     });  
</script>

</body>

</html>