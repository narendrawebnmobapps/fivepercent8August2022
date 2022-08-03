<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url('assets/frontend'); ?>/images/favicons.png" type="images/x-icon" />
  <title><?php echo $title; ?></title>
  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url('assets/frontend'); ?>/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome CSS -->
  <link href="<?php echo base_url('assets/frontend'); ?>/css/font-awesome.min.css" rel="stylesheet">
  <!-- Main Style CSS -->
  <link href="<?php echo base_url('assets/frontend'); ?>/css/simple-custom.css" rel="stylesheet">
  <!-- Animate CSS -->
  <link href="<?php echo base_url('assets/frontend'); ?>/css/animate.css" rel="stylesheet">
  <!-- Owl Stylesheets -->
  <link rel="stylesheet" href="<?php echo base_url('assets/frontend'); ?>/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/frontend'); ?>/css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/frontend'); ?>/css/responsive.css">
  <script src="<?php echo base_url('assets/frontend'); ?>/js/jquery.min.js"></script>
</head>

<body>
  <!-- Header Top Section Star Here-->
  <section class="header-top-prt">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 col-md-8 col-sm-8 header-top-contacts-info">
          <p>We provied best finance service</p>
          <p>ISO 9401:2018 certified company</p>
        </div>
        <?php  
          $user_id = $this->session->userdata('user_id');
          if($user_id=='' && $user_id==null)
          {
            
          
        ?>
        <div class="col-lg-5 col-md-4 col-sm-4 header-top-login-btns text-right">
          <div class="soical-profile">
            <ul>
              <li><a href="<?php echo base_url('signin'); ?>">Sign In</a>
              </li>
              <li>/</li>             
              <li><a href="<?php echo base_url('signup'); ?>">Sign Up</a>
              </li>
              <li>|</li>  
              <li><a href="<?php echo base_url('register-as-advisor'); ?>">Register As Advisor</a></li>
            </ul>
          </div>
        </div>
      <?php } ?>
      </div>
      <!-- End Row-->
    </div>
    <!-- End Container-->
  </section>
  <!-- End Section-->
  <!-- Header Top Section End Here-->
  <!-- Header Contacts Information Section Start Here -->
  <section class="header-information-prt">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3">
          <div class="info-icon"> <i class="fa fa-map-marker"></i>
          </div>
          <div class="info-text">
            <h5>location </h5>
            <span>uttarkhan, noyarpara</span>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
          <div class="info-icon">
        <i class="fa fa-envelope-o"></i>
          </div>
          <div class="info-text">
            <h5>email address</h5>
            <a href="mailto:yourdomain@gmail.com">yourdomain@gmail.com</a>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
          <div class="info-icon">
           <i class="fa fa-clock-o"></i>
          </div>
          <div class="info-text">
            <h5>opening hour</h5>
            <span>sat-fri: 08.00am - 05:00 pm</span>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
          <div class="info-intro-number"> <span>875621456987</span>
          </div>
        </div>
      </div>
      <!-- End Row-->
    </div>
    <!-- End Container-->
  </section>
  <!-- End Section-->
  <!-- Header Contacts Information Section End Here -->
  <!-- Header Navication Section Start Here-->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-ms-12 col-sm-12 main-menu-header">
        <header>
          <?php 
              $active = array();
              $directory = explode('/',ltrim($_SERVER['REQUEST_URI'],'/'));  
              $directories = array("contact-us", "about","services","case-studies","blog","faq",""); 
              foreach ($directories as $folder)
              {
                $active[$folder] = (end($directory) == $folder)? "active":"";
              }
            ?>
          <!-- Fixed navbar -->
          <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <a class="navbar-brand" href="<?php echo base_url(); ?>">
              <img src="<?php echo base_url('assets/frontend'); ?>/images/logo.png" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item <?php echo $active['']; ?>"> <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
                </li>
                <li class="nav-item <?php echo $active['about']; ?>"> <a class="nav-link" href="<?php echo base_url('about'); ?>">About</a>
                </li>
                <li class="nav-item <?php echo $active['services']; ?>"> <a class="nav-link" href="<?php echo base_url('services'); ?>">Services</a>
                </li>
                <li class="nav-item <?php echo $active['case-studies']; ?>"> <a class="nav-link" href="<?php echo base_url('case-studies'); ?>">Case Studies</a>
                </li>
                <li class="nav-item <?php echo $active['faq']; ?>"> <a class="nav-link" href="<?php echo base_url('faq'); ?>">F.A.Q</a>
                </li>
                <li class="nav-item <?php echo $active['blog']; ?>"> <a class="nav-link" href="<?php echo base_url('blog'); ?>">Blog</a>
                </li>
                <li class="nav-item <?php echo $active['contact-us']; ?>"> <a class="nav-link" href="<?php echo base_url('contact-us'); ?>">Contact</a>
                </li>
              </ul>
            </div>
          </nav>
        </header>
      </div>
    </div>
    <!-- End Row-->
  </div>
  <!-- End Container-->
  <!-- Header Navication Section End Here-->