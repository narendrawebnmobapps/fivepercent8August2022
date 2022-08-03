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

    .file {
  visibility: hidden;
  position: absolute;
}

.form-bg-prt-sec .btn-primary {
    color: #fff;
    background-color: #007bff;
    /* border-color: #007bff; */
    border-radius: 0px;
    background-color: #073850;
    padding: 11px 17px;
    font-size: 16px;
        border: none;
    outline: none;
}

 .form-bg-prt-sec .btn-primary:focus {
    box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0);
}

       

        .form-bg-prt-sec input.form-control.input-lg {
    margin-bottom: 9px;
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
              <?php if($this->session->flashdata('msg')){ ?>
              <div class="alert alert-success">
                <?php echo $this->session->flashdata('msg'); ?>
              </div>
            <?php } ?>
              <form method="post" action="<?php //echo base_url('welcome/authentication/advisor_registration'); ?>" enctype="multipart/form-data">
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
                    <input type="text" readonly class="form-control date_of_birth" value="<?php echo set_value('date_of_birth'); ?>" id="datepicker" name="date_of_birth" placeholder="Date Of Birth" >
                    <?php echo form_error('date_of_birth', '<div class="errinputcls">', '</div>'); ?>
                </div>
                <!--div class="form-group">
                    <input type="text" class="form-control expYears" name="expYears" value="<?php echo set_value('expYears'); ?>" placeholder="Experience Years" >
                    <?php echo form_error('expYears', '<div class="errinputcls">', '</div>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control advisorSpeciality" name="advisorSpeciality" value="<?php echo set_value('advisorSpeciality'); ?>" placeholder="Advisor Speciality" >
                    <?php echo form_error('advisorSpeciality', '<div class="errinputcls">', '</div>'); ?>
                </div>
                
                <div class="form-group">
                  <input type="file" name="certificate" class="file">
                  <div class="input-group col-xs-12">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                    <input type="text" class="form-control input-lg" disabled placeholder="Upload Certificate">
                    <span class="input-group-btn">
                      <button class="browse btn btn-primary input-lg" type="button"><i class="glyphicon glyphicon-search"></i> Browse</button>
                    </span>
                  </div>
                  <?php echo form_error('certificate', '<div class="errinputcls">', '</div>'); ?>
                </div-->
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
 <!-- Upload File Btn Start Here -->
<script type="text/javascript">
  
$(document).on('click', '.browse', function(){
  var file = $(this).parent().parent().parent().find('.file');
  file.trigger('click');
});
$(document).on('change', '.file', function(){
  $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
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

 <!-- Upload File Btn End Here -->
