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
                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control name" placeholder="Email/Username" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control psw" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="" value="Sign In" class="form-control">

                                </div>
                                <p>Not a member yet? <a href="<?php echo base_url('user/signup'); ?>">Sign Up</a>
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