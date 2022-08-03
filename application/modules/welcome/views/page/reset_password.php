<?php $this->load->view('includes/header'); ?>
<!-- Page Title Banner Section Start Here -->
<style type="text/css">
  .portforlio-inner-page-banners {

    padding-bottom: 0px; 
background-position: 20% 30%;
    height: 85px;
}

.form-bg-prt-sec{
  margin: 86px 0px 50px 0px;
}
.errinputcls 
    {
        float: left;
        top: -19px;
        position: relative;
        color: red;
        font-size: 14px;
    }
</style>
  <section class="portforlio-inner-page-banners">

  </section>
  <!-- Page Title Banner Section End Here -->
  <section class="login-bs-prt-se">
    <div class="container">
      <div class="row">
        <div class="main-box">
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-bg-prt-sec">
              <div class="logo-box-sing">
                <img src="<?php echo base_url('assets/frontend'); ?>/images/user-login-five-prasantage.png" alt="logo">
              </div>
              <?php if($this->session->flashdata('msg')) { ?>
              <div class="alert alert-danger">
                <?php echo $this->session->flashdata('msg'); ?>
              </div>
            <?php } ?>
              <form method="post" action="">
                <div class="form-group">
                  <input type="password" name="password" placeholder="Password" value="<?php echo set_value('password'); ?>" class="form-control name" >
                   <?php echo form_error('password', '<div class="errinputcls">', '</div>'); ?>
                </div>
                <div class="form-group">
                  <input type="password" name="repassword" placeholder="Retype Password" value="<?php echo set_value('repassword'); ?>" class="form-control name" >
                   <?php echo form_error('repassword', '<div class="errinputcls">', '</div>'); ?>
                </div>
                <div class="form-group">
                  <input type="submit" name="" value="Reset Password" class="form-control">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php $this->load->view('includes/footer'); ?>