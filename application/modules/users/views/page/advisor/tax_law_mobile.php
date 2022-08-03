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
    <!-- Font Awesome core CSS -->
    <link href="<?php echo base_url('assets/users'); ?>/css/font-awesome.min.css" rel="stylesheet">
    <!-- Dashbord CSS -->
    <link href="<?php echo base_url('assets/users'); ?>/css/dashbord.css" rel="stylesheet">
    <!-- Responsive CSS -->
    <link href="<?php echo base_url('assets/users'); ?>/css/responsive.css" rel="stylesheet">
    <!-- Animate CSS -->
    <link href="<?php echo base_url('assets/users'); ?>/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/users'); ?>/css/main-custom.css" rel="stylesheet">


    <style type="text/css">
    




/*------------
FAQ Page Css Start Here
----------------*/

/*******************************
* Does not work properly if "in" is added after "collapse".
* Get free snippets on bootpen.com
*******************************/

.sidebar-setion-pprts-glossery .panel-group .panel {
    border-radius: 0;
    box-shadow: none;
    border-color: #EEEEEE;
    margin-bottom: 12px;
    border: none;
}
.sidebar-setion-pprts-glossery .panel-default > .panel-heading {
    padding: 0;
    border-radius: 0;
    color: #212121;
    /* background-color: #FAFAFA; */
    /* border-color: #EEEEEE; */
    background: #f2ede9;
    box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
}
}
.sidebar-setion-pprts-glossery .panel-title {
    font-size: 14px;
}
.sidebar-setion-pprts-glossery .panel-title > a {
    display: block;
    padding: 15px;
    text-decoration: none;
    font-size: 16px;
    color: #26211d;
    font-weight: 700;
    border-bottom: 1px solid #d4d3d3;
}
.sidebar-setion-pprts-glossery .more-less {
    float: right;
    color: #212121;
}
.sidebar-setion-pprts-glossery .panel-default > .panel-heading + .panel-collapse > .panel-body {
    border-top-color: #EEEEEE;
}
.sidebar-setion-pprts-glossery h4.panel-title i {
    float: right;
    background-color: #f6bb19;
    padding: 16px 19px;
    margin-top: -15px;
    position: relative;
    left: 15px;
    color: #fff;
}
.sidebar-setion-pprts-glossery .panel-body {
    padding: 20px;
    margin-bottom: 11px;
    background: #f2ede9;
    box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
}
.sidebar-setion-pprts-glossery .panel-body p {
    margin-bottom: 0px !important;
}
.sidebar-setion-pprts-glossery h4.panel-title {
    margin-bottom: 0px;
}
section.sidebar-setion-pprts-glossery {
    
    margin-bottom: 90px;
    background-color: #fff;
    display: inline-block;
    width: 100%;
    padding: 30px 0px 13px 0px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    -ms-border-radius: 2px;
}


section.sidebar-setion-pprts-glossery .panel{
	background: none;
}





@media (min-width: 768px)
{
    #wrapper {
     padding-left: 0px; 
    }
}



</style>

</head>

<body>
    <div id="throbber" style="display:none; min-height:120px;"></div>
    <div id="noty-holder"></div>
    <div id="wrapper">
       <!-- Navigation -->
        <?php 
            //$this->load->view('page/include/sidebar'); 
        ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row" id="main">
                   <section class="sidebar-setion-pprts-glossery"> 
                    <div class="col-lg-12 col-sm-12 col-md-12">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <?php foreach($advisor_taxes as $tax){ ?>
                            <div class="panel panel-default">
                              <div class="panel-heading" role="tab" id="headingOne<?php echo $tax->id ?>">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?php echo $tax->id ?>" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                        <?php echo $tax->document_name; ?>
                                    </a>
                                </h4>
                              </div>
                              <div id="collapseOne<?php echo $tax->id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne<?php echo $tax->id ?>" style="">
                                <div class="panel-body">
                                  <embed src="<?php echo base_url('uploads/tax-law/'.$tax->doc_file); ?>" type="application/pdf"   height="600px" width="100%">
                                </div>
                              </div>
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                   	
				         <!-- Left side end -->

				          <!-- right side -->

				       
				     
				  </section>
                    
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>



    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/bootstrap.min.js"></script>
</body>

</html>