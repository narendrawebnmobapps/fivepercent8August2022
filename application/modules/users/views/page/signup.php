<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
   <link rel="shortcut icon" href="<?php echo base_url('assets/users'); ?>/images/favicons.png" type="images/x-icon"/>
    <title><?php echo $title; ?></title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/users'); ?>/css/bootstrap.min.css" rel="stylesheet">
    <!-- Style CSS -->
    <link href="<?php echo base_url('assets/users'); ?>/css/main-custom.css" rel="stylesheet">
    <!-- Font Awesome core CSS -->
    <link href="<?php echo base_url('assets/users'); ?>/css/font-awesome.min.css" rel="stylesheet">
    <style type="text/css">
        .errinputcls 
            {
                float: left;
                top: -19px;
                position: relative;
                color: red;
                font-size: 14px;
            }
        
    </style>
</head>

<body>
    <!-- Login form start hare -->
    <div class="login-bg-pick">
        <div class="login-bg-inner"></div>
        <div class="container">
            <div class="row">
                <div class="wraper-login-box">
                    <div class="col-md-5 col-sm-5">
                        <div class="login-form-bg">
                            <div class="logo-screen-bg">
                                <img src="<?php echo base_url('assets/users'); ?>/images/user-login-five-prasantage.png" alt="logo">
                            </div>
                            <form method="post" action="<?php echo base_url('users/authentication/user_registration'); ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control name" name="username" value="<?php echo set_value('username'); ?>" placeholder="Username" >
                                    <?php echo form_error('username', '<div class="errinputcls">', '</div>'); ?>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control email" value="<?php echo set_value('email'); ?>" name="email" placeholder="E-Mail" >
                                    <?php echo form_error('email', '<div class="errinputcls">', '</div>'); ?>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control email" value="<?php echo set_value('date_of_birth'); ?>" name="date_of_birth" placeholder="Date Of Birth" >
                                    <?php echo form_error('date_of_birth', '<div class="errinputcls">', '</div>'); ?>
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
                                <p>Already have account? <a href="<?php echo base_url('user/signin'); ?>">Sign In</a>
                                </p>
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
    </div>
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