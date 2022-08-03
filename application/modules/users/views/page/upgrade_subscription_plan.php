<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/favicons.png" type="images/x-icon" />
    <title>Subscription Plan</title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/users'); ?>/css/bootstrap.min.css" rel="stylesheet">
    <!-- Style CSS -->
    <link href="<?php echo base_url('assets/users'); ?>/css/main-custom.css" rel="stylesheet">
    <!-- Font Awesome core CSS -->
    <link href="<?php echo base_url('assets/users'); ?>/css/font-awesome.min.css" rel="stylesheet">
    <style type="text/css">        
    </style>
</head>
<body class="subscription-plan-bg">
    <?php
    //echo "<pre>";print_r($existing_plan);
     //if($existing_plan->plan_id==){
      ?>
    <style type="text/css">
        .basicplanonly {
            pointer-events: none;

        }
    </style>
    
<?php //} ?>
    <!-- Login form start hare -->
   <div class="container">
            <div class="row">
                <?php //echo "<pre>"; print_r($subscriptions); ?>
                <div class="wraper-login-box">
                    <div class="col-md-7 col-sm-7">
                        <div class="login-form-bg">
                            <div class="logo-screen-bg">
                                <img src="<?php echo base_url('assets/users'); ?>/images/user-login-five-prasantage.png" alt="logo">
                            </div>
                            <form method="post">
                            <div class="subcribe-tab-prt">
                                <div class="panel panel-primary">
                                    <div class="panel-heading"> 
                                        <span class="">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs">
                                            <?php 
                                            if($existing_plan->plan_id==0 OR $existing_plan->plan_id==1 ) { 
                                                $compare= 2;
                                            ?>
                                            <li class="basicplanonly"><a href="#tab1" data-toggle="tab">Free</a></li>
                                            <li class="active"><a href="#tab2" data-toggle="tab">Basic</a></li>
                                            <li class=""><a href="#tab3" data-toggle="tab">Plus</a></li>
                                            <li class=""><a href="#tab4" data-toggle="tab">Advanced</a></li>
                                            <?php } ?>   
                                            <?php 
                                            if($existing_plan->plan_id==2) { 
                                                $compare= 3;
                                            ?>
                                            <li class="basicplanonly"><a href="#tab1" data-toggle="tab">Free</a></li>
                                            <li class="basicplanonly"><a href="#tab2" data-toggle="tab">Basic</a></li>
                                            <li class="active"><a href="#tab3" data-toggle="tab">Plus</a></li>
                                            <li class=""><a href="#tab4" data-toggle="tab">Advanced</a></li>
                                            <?php } ?> 

                                            <?php 
                                            if($existing_plan->plan_id==3) { 
                                                $compare = 4;
                                            ?>
                                            <li class="basicplanonly"><a href="#tab1" data-toggle="tab">Free</a></li>
                                            <li class="basicplanonly"><a href="#tab2" data-toggle="tab">Basic</a></li>
                                            <li class="basicplanonly"><a href="#tab3" data-toggle="tab">Plus</a></li>
                                            <li class="active"><a href="#tab4" data-toggle="tab">Advanced</a></li>
                                            <?php } ?>                         
                                        </ul>
                                        </span>
                                    </div>
                                    <div class="panel-body">
                                        <?php //print_r($subscriptions); ?>
                                        <div class="tab-content">
                                            <?php $inc=1; foreach($subscriptions as $subscription) { ?>
                                            <div class="tab-pane <?php if($inc==$compare){ echo 'active'; } ?> " id="tab<?php echo $inc; ?>">
                                                <div class="box-plan-01">
                                                    <h2><?php echo $subscription['plan_name']; ?></h2>
                                                    <div class="box-from-sub">
                                                        <h3>Form</h3>
                                                        <h4>$<?php echo $subscription['price']; ?>/Year</h4>
                                                    </div>
                                                    <ul>
                                                        <?php foreach($subscription['features'] as $feature){ ?>
                                                        <li><?php echo $feature->feature_name; ?></li>
                                                        <?php } ?>
                                                    </ul>
                                                    <div class="sign-up-noe-btn">
                                                        <h5>
                                                            <?php if($subscription['price']==0){ ?>
                                                            <a href="<?php echo base_url('user/personelinfo/'.base64_encode(base64_encode($subscription['id'])).'/'.base64_encode(base64_encode($subscription['user_id']))); ?>">Sing Up Now!</a>
                                                        <?php } else { ?>
                                                            <a href="<?php echo base_url('users/profile/purchase_subscribe_plan/'.base64_encode(base64_encode($subscription['id'])).'/'.base64_encode(base64_encode($subscription['user_id'])).'/'.base64_encode(base64_encode($subscription['price'])).'/'.base64_encode(base64_encode($subscription['plan_name']))); ?>">Sign Up Now!</a>
                                                        <?php } ?>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php $inc++; } ?>
                                        <div class="col-md-12 col-sm-12 if-you-note-text">
                                        <!--  <p>***If user age less than 25 it means our app will show learning. (he can select basic plan only)</p> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                        <!-- login-form-bg end -->
                    </div>
                    <!-- col md end -->
                </div>
                <!-- wraper login-box end -->
            </div>
            <!-- Row -->
        </div>
        <!-- Container -->

    <!-- login-bg-pick-end -->
    <!-- Login form End hare -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')
    </script>
    <script src="<?php echo base_url('assets/users'); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/amimation-menu-sidebar.js"></script>
</body>

</html>



