<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url('assets/users'); ?>/images/favicons.png" type="images/x-icon" />
  <title>Broker</title>
  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url('assets/users'); ?>/css/bootstrap.min.css" rel="stylesheet">
  <!-- Style CSS -->
  <link href="<?php echo base_url('assets/users'); ?>/css/main-custom.css" rel="stylesheet">
  <!-- Font Awesome core CSS -->
  <link href="<?php echo base_url('assets/users'); ?>/css/font-awesome.min.css" rel="stylesheet">
  <!-- Dashbord CSS -->
  <link href="<?php echo base_url('assets/users'); ?>/css/dashbord.css" rel="stylesheet">
  <!-- Responsive CSS -->
  <link href="<?php echo base_url('assets/users'); ?>/css/responsive.css" rel="stylesheet">
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
            <!-- <h1 class="ttile-heading">Broker</h1> -->
            <div class="bradcrum-list">
              <ul>
                <li><?php echo $sub_title; ?></li>
              </ul>
            </div>
          </div>
          <!-- TradingView Widget BEGIN -->
          <div class="col-md-12 col-sm-12">
                <div class="broker-bg-color">
                  <?php foreach($brokers as $broker){ ?>
                  <div class="broker-stars"> <span class="broker-img"><img src="<?php echo base_url('uploads/user-profile/'.$broker->profile_image); ?>" alt="ibroker"></span>
                    <div class="right-star">
                     <a href="<?php echo base_url('users/dashboard/broker_details/'.base64_encode($broker->id)); ?>"> <p><?php echo $broker->first_name.' '.$broker->last_name; ?></p></a>
                      <ul>
                        <?php 
                            //echo $advisor->rating;
                            $rating =  (int)$broker->rating; 
                            if($rating==0)
                            {
                                echo '<li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>';
                            }
                            else
                            {

                                for($i=0;$i<$rating;$i++)
                                {
                                    echo '<li><i class="fa fa-star"></i></li>';
                                }
                                for($i=0;$i<5-$rating;$i++)
                                {
                                    echo '<li><i class="fa fa-star-o"></i></li>';
                                }
                            }
                        ?>
              
                        
                    </ul>
                    </div>
                  </div>
                <?php } ?>
                  <!-- <div class="broker-stars"> <span class="broker-img"><img src="<?php echo base_url('assets/users'); ?>/images/interactive-broker.jpg" alt="ibroker"></span>
                    <div class="right-star">
                      <p>INTERACTIVE BROKER</p>
                      <ul>
                        <li><i class="fa fa-star"></i>
                        </li>
                        <li><i class="fa fa-star"></i>
                        </li>
                        <li><i class="fa fa-star"></i>
                        </li>
                        <li><i class="fa fa-star"></i>
                        </li>
                        <li><i class="fa fa-star"></i>
                        </li>
                      </ul>
                    </div>
                  </div> -->
                </div>
            <!--  -->
          </div>
          <!-- Col Md End -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
  </div>
  <!-- /#wrapper -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js "></script>
  <script>
    window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><"script>')
  </script>
  <script src="<?php echo base_url('assets/users'); ?>/js/bootstrap.min.js "></script>
  <script src="<?php echo base_url('assets/users'); ?>/js/amimation-menu-sidebar.js"></script>
 <!--  <script type="text/javascript" src="<?php echo base_url('assets/users/js/sidebarmenu.js'); ?>"></script> -->
 <script src="<?php echo base_url('assets/users'); ?>/js/common.js"></script>
</body>

</html>