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
    <link href="<?php echo base_url('assets/users'); ?>/css/main-custom.css" rel="stylesheet">
    <!-- Font Awesome core CSS -->
    <link href="<?php echo base_url('assets/users'); ?>/css/font-awesome.min.css" rel="stylesheet">
    <!-- Dashbord CSS -->
    <link href="<?php echo base_url('assets/users'); ?>/css/dashbord.css" rel="stylesheet">
    <!-- Responsive CSS -->
    <link href="<?php echo base_url('assets/users'); ?>/css/responsive.css" rel="stylesheet">
    <!-- Clander CSS -->
    <link href="<?php echo base_url('assets/users'); ?>/css/mini-event-calendar.min.css" rel="stylesheet">
    <!-- Animate CSS -->
    <link href="<?php echo base_url('assets/users'); ?>/css/animate.css" rel="stylesheet">
    
    <link href="<?php echo base_url('assets/users'); ?>/css/responsive.css" rel="stylesheet">

    <!-- Weather.js CSS -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
        zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
                ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9","ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    <script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>

    <style type="text/css">
        
ul.nav.navbar-right.top-nav .dropdown-menu{
    min-width: 179px;
}

    </style>
</head>

<body>
    <div id="throbber" style="display:none; min-height:120px;"></div>
    <div id="noty-holder"></div>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top side-menu-prt" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"> <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button> 
                <a class="navbar-brand" href="#"><img src="<?php echo base_url('assets/users'); ?>/images/logo.png" alt="LOGO"></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li>
                    <div class="searchbar">
                        <input class="search_input" type="text" name="" placeholder="Search..."> <a href="#" class="search_icon"><i class="fa fa-search"></i></a>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="<?php echo base_url('user/dashboard'); ?>" class="dropdown-toggle" data-toggle="dropdown">
                        <?php if($this->session->userdata('pro_image')!="") { ?>
                        <img src="<?php echo base_url('uploads/user-profile/'.$this->session->userdata('pro_image')); ?>" alt="user-profile">
                        <?php } else {?>
                            <img src="<?php echo base_url('assets/users/images/profile-image-demo.jpg'); ?>" alt="user-profile">
                        <?php } ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="fa fa-fw fa-user"></i> Edit Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-fw fa-cog"></i> Change Password</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url('users/dashboard/user_logout'); ?>"><i class="fa fa-fw fa-power-off"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <div class="userinformations">
                        <?php if($this->session->userdata('pro_image')!="") { ?>
                        <img src="<?php echo base_url('uploads/user-profile/'.$this->session->userdata('pro_image')); ?>" alt="user-profile">
                        <?php } else {?>
                            <img src="<?php echo base_url('assets/users/images/profile-image-demo.jpg'); ?>" alt="user-profile">
                        <?php } ?>
                        <h2><?php echo $this->session->userdata('fname').' '.$this->session->userdata('lname'); ?></h2>
                        <p><?php echo $this->session->userdata('country'); ?></p>
                    </div>
                         <li class="active"> <a href="<?php echo base_url('user/dashboard'); ?>"><i class="fa fa-tachometer" aria-hidden="true"></i>Dashbord</a> </li>
                    <li> <a href="#" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-folder-open" aria-hidden="true"></i> Portforlio
                         <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                        <ul id="submenu-1" class="collapse">
                            <li><a href="<?php echo base_url('user/stock-portfolio'); ?>"><i class="fa fa-angle-double-right"></i>Stock</a>
                            </li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> Opition</a>
                            </li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i> Fixed Income</a>
                            </li>
                        </ul>
                    </li>
                    <li> <a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>Broker</a> </li>
                    <li> <a href="#"><i class="fa fa-file-text" aria-hidden="true"></i>  Trading Diary</a> </li>
                    <li> <a href="#"><i class="fa fa-handshake-o" aria-hidden="true"></i> Money Management</a> </li>
                    <li> <a href="#"><i class="fa fa-leanpub" aria-hidden="true"></i>Learning</a> </li>
                    <li> <a href="#"><i class="fa fa-balance-scale" aria-hidden="true"></i></i> Test</a> </li>
                    <li> <a href="#"><i class="fa fa-life-ring" aria-hidden="true"></i> Result Attribution</a> </li>
                    <li> <a href="#"><i class="fa fa-users" aria-hidden="true"></i>Advisor</a> </li>
                    <li> <a href="<?php echo base_url('user/client-profile'); ?>"><i class="fa fa-user" aria-hidden="true"></i>Client Profile</a> </li>
                    <li> <a href="#"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>Warnings alerts & ideas</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>