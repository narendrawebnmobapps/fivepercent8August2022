<?php $this->load->view('includes/header'); ?>
<!-- Page Title Banner Section Start Here -->
<style type="text/css">
  .portforlio-inner-page-banners {

    padding-bottom: 0px; 
background-position: 20% 30%;
    height: 85px;
}

.form-bg-prt-sec{
  margin: 121px 0px 50px 0px;
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
              <?php if($this->session->flashdata('msg')) { ?>
              <div class="alert alert-danger">
                <?php echo $this->session->flashdata('msg'); ?>
              </div>
            <?php } ?>
              <form method="post" action="">
                <div class="form-group">
                  <input type="email" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>" class="form-control name" required>
                </div>
                <div class="form-group">
                  <input type="password" name="password" value="<?php echo set_value('password'); ?>" placeholder="Password" class="form-control psw" required>
                </div>
                <div class="form-group">
                  <input type="submit" name="" value="Sign In" class="form-control">
                </div>
                <p>Forget Password? <a href="<?php echo base_url('forget-passord'); ?>">Reset</a></p>
                <p>Not a member yet? <a href="<?php echo base_url('signup'); ?>">Sign Up</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php $this->load->view('includes/footer'); ?>