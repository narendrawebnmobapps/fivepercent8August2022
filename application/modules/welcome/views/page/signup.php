<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<?php $this->load->view('includes/header'); ?>

<!-- Page Title Banner Section Start Here -->
<style type="text/css">
.errinputcls 
    {
        float: left;
        top: -19px;
        position: relative;
        color: red;
        font-size: 14px;
    }
        
 .portforlio-inner-page-banners {

    padding-bottom: 0px; 
background-position: 20% 30%;
    height: 85px;
}

.form-bg-prt-sec{
  margin: 121px 0px 50px 0px;
}       

.logo-box-sing img {
    width: 60px;
    padding-top: 28px;
}
.appusageerror{display: none;}
</style>
  <section class="portforlio-inner-page-banners">
    
  </section>
  <!-- Page Title Banner Section End Here -->
  <section class="login-bs-prt-se">
    <div class="container">
      <div class="row">
        <div class="main-box">
          <div class="col-lg-6 col-md-8 col-sm-10 col-xs-12">
            <div class="form-bg-prt-sec">
              <div class="logo-box-sing">
                <img src="<?php echo base_url('assets/frontend'); ?>/images/user-login-five-prasantage.png" alt="logo">
              </div>
              <form method="post">
                <div class="form-group">
                    <input type="text" class="form-control fname" name="fname" value="<?php echo set_value('fname'); ?>" placeholder="First Name" >
                    <?php echo form_error('fname', '<div class="errinputcls">', '</div>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control fname" name="lname" value="<?php echo set_value('lname'); ?>" placeholder="Last Name" >
                    <?php echo form_error('lname', '<div class="errinputcls">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control email" value="<?php echo set_value('email'); ?>" name="email" placeholder="E-Mail" >
                    <?php echo form_error('email', '<div class="errinputcls">', '</div>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control phoneNumber" name="phoneNumber" value="<?php echo set_value('phoneNumber'); ?>" placeholder="Phone Number" >
                    <?php echo form_error('phoneNumber', '<div class="errinputcls">', '</div>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control date_of_birth" readonly value="<?php echo set_value('date_of_birth'); ?>" id="datepicker" name="date_of_birth" placeholder="Date Of Birth" >
                    <?php echo form_error('date_of_birth', '<div class="errinputcls">', '</div>'); ?>
                </div>
                <div class="form-group">                    
                    <select class="form-control jobtype" name="jobtype">  
                    <option value="">Select Job Type</option>   
                    <?php foreach($jobtype as $job): ?>    
                    <option value="<?php echo $job->id; ?>" <?php echo set_select('jobtype', $job->id , FALSE, 1); ?>><?php echo $job->jobtype; ?></option> 
                    <?php endforeach; ?>            
                    </select>
                    <?php echo form_error('jobtype', '<div class="errinputcls">', '</div>'); ?>
                </div>
                <div class="form-group">                    
                    <select class="form-control country" name="country">  
                    <option value="">Select Country</option>
                    <?php foreach($countries as $country): ?>    
                    <option value="<?php echo $country->id; ?>" <?php echo set_select('country', $country->id , FALSE, 1); ?>><?php echo $country->name; ?></option> 
                    <?php endforeach; ?>                     
                    </select>
                    <?php echo form_error('country', '<div class="errinputcls">', '</div>'); ?>
                </div>
                <div class="form-group">                    
                    <select class="form-control appusage" name="appusage">  
                    <option value="">Select App Usage</option> 
                    <?php foreach($appusages as $app): ?>    
                    <option value="<?php echo $app->id; ?>" <?php echo set_select('appusage', $app->id , FALSE, 1); ?>><?php echo $app->uses; ?></option> 
                    <?php endforeach; ?>                   
                    </select>
                    <?php echo form_error('appusage', '<div class="errinputcls">', '</div>'); ?>
                    <div class="errinputcls appusageerror">Demo account would be expired in 1 month</div>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control advisor_referral_code" name="advisor_referral_code" value="<?php echo set_value('advisor_referral_code'); ?>" placeholder="Advisor Referral Code" >
                    <?php echo form_error('advisor_referral_code', '<div class="errinputcls">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <input type="password" class="form-control psw" value="<?php echo set_value('password'); ?>" name="password" placeholder="Password">
                    <?php echo form_error('password', '<div class="errinputcls">', '</div>'); ?>
                </div>

                 <div class="form-group">
                    <input type="password" class="form-control psw" value="<?php echo set_value('cpassword'); ?>" name="cpassword" placeholder="Confirm Password">
                    <?php echo form_error('cpassword', '<div class="errinputcls">', '</div>'); ?>
                </div>


                <div class="form-group">
                    <input type="submit" value="Sign Up" class="form-control">
                </div>
                <p>Already have account? <a href="<?php echo base_url('signin'); ?>">Sign In</a>
                </p>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script type="text/javascript">
    $(function() {
        $( "#datepicker" ).datepicker({
            dateFormat : 'mm/dd/yy',
            changeMonth : true,
            changeYear : true,
            yearRange: '-100y:c+nn',
            defaultdate:'01-01-1990',
            maxDate: 0 
        });
    });
   
</script>
<?php $this->load->view('includes/footer'); ?>


 <script type="text/javascript">
     $(document).ready(function(){
        $('.appusage').change(function(){
            var demo = $(".appusage option:selected").val();
            if(demo==3)
            {
                $('.appusageerror').show();
            }
            else
            {
                $('.appusageerror').hide();
            }
        });
     });
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
$(".phoneNumber").inputFilter(function(value) {
  return /^-?\d*$/.test(value); });
 </script>