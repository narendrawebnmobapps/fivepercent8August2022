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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/users'); ?>/css/calender-stylesheet.css">
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
</head>

<body>
            <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row" id="main">
                     <!-- <div class="col-sm-12 col-md-12 well" id="content">
                        <h1 class="ttile-heading">News Details </h1>
                        <div class="bradcrum-list">
                        </div>
                    </div> -->
                    <!-- TradingView Widget BEGIN -->
                    
                        <!-- Post Details Page Content Information Start Here -->
    
                <div class="col-lg-12 col-sm-12 col-md-12">
                    <div class="post-details-box-content-info">
                    <div class="post-detail-large-thubbs">
                        <img src="<?php echo base_url('uploads/news/'.$news_detail->image); ?>" alt="large-1">
                    </div>

                      <div class="postmeta-title">
                        <h2><?php echo $news_detail->news_title; ?></h2>
                        <?php 
                            $day = date("d", strtotime($news_detail->created_on));
                            $month = date("M", strtotime($news_detail->created_on));
                        ?>
                        <div class="date"><h5><?php echo $day; ?> <br><?php echo $month; ?></h5></div>
                      </div>

                      <div class="clearfix"></div>

                       <!-- <div class="postmeta-categories-info">
                        <h3>By : <span>Luck Walker</span></h3>
                         <h3>Category : <span>Movers, Shifting, Packers</span></h3>
                       </div> -->

                        <div class="content-informations">
                        <p><?php echo $news_detail->news_content; ?></p>
                </div> 
             </div><!-- Post Details Box Content Info End-->
         </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
            <!-- /.container-fluid -->
</div>

    <!-- /#wrapper -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->


    



</body>
</html>