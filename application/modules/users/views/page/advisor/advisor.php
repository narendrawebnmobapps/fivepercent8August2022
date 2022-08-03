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

.advisor-star-rating{
    width: 40%;
    float: left;
    display: inline-block;
}
.advisor-star-rating ul{
    float: right;
    list-style: none;
    margin-top: 44px;
}
.advisor-star-rating ul li{
    float: left;
    padding: 0 5px;
}
.advisor-star-rating ul li i{
    color: #f6bb19;
}
.user-profile-client-list {
    width: 14%;
    padding: 15px 15px;
    padding-top: 0;
}
.text-user-clientlist-info {
    width: 34%;
}
.advisor_list_pagination{
    min-height: 410px;
}

.bradcrum-list{
    float: left;
}
.searchbarright{float: right;margin-top: 16px;}
.declinebtnAcceptandBlock{
    padding: 0;
}
.declinebtnAcceptandBlock .review-btn a {
    color: #fff;
    background-color: #01ae52;
    padding: 2px 17px;
    border-radius: 40px;
    margin: 0px 0px 0px 4px;
    font-size: 12px;
    text-transform: uppercase;
    display: inline-block;
    line-height: 22px;
    outline: none;
    text-decoration: none;
}
.declinebtnAcceptandBlock span.review-btn {
    float: left;
}
</style>
</head>

<body>
    <div id="throbber" style="display:none; min-height:120px;"></div>
    <div id="noty-holder"></div>
    <div id="wrapper">
       <!-- Navigation -->
        <?php 
            $this->load->view('page/include/sidebar'); 
        ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row" id="main">
                     <div class="col-sm-12 col-md-12 well" id="content">
                        <!-- <h1 class="ttile-heading">Client Profile</h1> -->
                        <div class="bradcrum-list">
                            <ul>

                                <li><?php echo $sub_title; ?></li>                            
                            </ul>
                        </div>
                         <div class="searchbarright">
                            <div class="search-container">
                                <form method="GET">
                                  <input type="text" value="<?php echo @$_GET['search']; ?>" placeholder="Search.." name="search">
                                  <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 client-profile-tab">
                        <div class="panel panel-primary">
                            <div class="panel-heading"> <span class="10">
                        <!-- Tabs -->
                    </span>
                            </div>
                            <div class="panel-body">
                                <div class="tab-content">

                                    <!-- Tab 2 End -->
                                    <div class="tab-pane active advisor_list_pagination" id="tab3">
                                        <!-- box-chat-info-list-cont End-->
                                        
                                        <!-- box-chat-info-list-cont End-->
                                        <?php //echo "<pre>";print_r($advisor_lists);die;

                                         ?>
                                        <?php 
                                            $user_id = $this->session->userdata('user_id');
                                            foreach($advisor_lists as $advisor)
                                            { 
                                                /*$checkAdvisorConnectivity = $this->db->query("SELECT * FROM tbl_user_adviser_referral_code_connectivity WHERE advisor_id='".$advisor->id."'")->num_rows();
                                                if($checkAdvisorConnectivity<=2 OR )
                                                {*/

                                                    if($advisor->connectityCount<=9 OR $advisor->connectityCountUser==1)
                                                    {
                                        ?>
                                        <div class="box-chat-info-list-cont">
                                            <div class="user-profile-client-list">
                                                <a href="<?php echo base_url('user/advisor/'.base64_encode(base64_encode($advisor->id))); ?>"><img src="<?php echo base_url('uploads/user-profile/'.$advisor->profile_image); ?>"></a>
                                                <div class="online-client-list"><i <?php if($advisor->onlineStatus==0){ ?> style="color: #f6bb19;" <?php } ?> class="fa fa-circle" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                            <div class="text-user-clientlist-info">
                                                <h3><a href="<?php echo base_url('user/advisor/'.base64_encode(base64_encode($advisor->id))); ?>"><?php echo $advisor->first_name." ".$advisor->last_name; ?></a></h3>
                                                <h5><?php echo $advisor->country; ?></h5>
                                                <div class="declinebtnAcceptandBlock">
                                                    <?php 
                                                   // $check_request = $this->db->query("SELECT * FROM tbl_user_adviser_referral_code_connectivity  WHERE user_id='".$user_id."' AND advisor_id='".$advisor->id."'");

                                                    $check_request = $this->db->query("SELECT * FROM tbl_user_adviser_referral_code_connectivity WHERE user_id='".$user_id."' AND advisor_id='".$advisor->id."'");
                                                    if($check_request->num_rows()>0)
                                                    {
                                                        $status = $check_request->row()->status;
                                                        if($status==0)
                                                        {
                                                            $requested = 0;
                                                        }
                                                        else
                                                        {
                                                            $requested = 1;
                                                        }
                                                    }
                                                    else
                                                    {
                                                        $requested = 2;
                                                    }

                                                     ?>
                                                     <?php if($requested==0){ ?>
                                                        <span class="review-btn"><a href="javascript:void(0)" onclick="cancelRequestAdvisor('<?php echo $advisor->id; ?>')" style="background: #f6bb19;" >Sent</a>
                                                        </span>
                                                    <?php } else if($requested==1){ ?>
                                                        <span class="review-btn approve_user_request" onclick="blockToAdvisor('<?php echo $advisor->id; ?>')"><a href="javascript:void(0)" style="background: #ed0505;">Block</a>
                                                        </span>
                                                        <span class="review-btn approved_user_request"><a href="javascript:void(0)" >Connected</a></span>
                                                    <?php } else { ?>
                                                        <span class="review-btn approved_user_request" onclick="sendRequestAdvisor('<?php echo $advisor->id; ?>')" ><a href="javascript:void(0)" >Send Request</a></span>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="advisor-star-rating">
                                                
                                                <ul>
                                                    <?php 
                                                        //echo $advisor->rating;
                                                        /*if($advisor->rating>1 && $advisor->rating<2)
                                                        {
                                                           $rating = 2; 
                                                        }
                                                        else if($advisor->rating>2 && $advisor->rating<3)
                                                        {
                                                            $rating = 3; 
                                                        }
                                                        else if($advisor->rating>3 && $advisor->rating<4)
                                                        {
                                                            $rating = 4; 
                                                        }
                                                        else if($advisor->rating>4 && $advisor->rating<5)
                                                        {
                                                            $rating = 5; 
                                                        }
                                                        else
                                                        {
                                                          $rating =  (int)$advisor->rating;  
                                                        }*/
                                                        $rating =  ceil($advisor->rating);   
                
                                                        for($i=0;$i<$rating;$i++)
                                                        {
                                                            echo '<li><i class="fa fa-star"></i></li>';
                                                        }
                                                        for($i=0;$i<5-$rating;$i++)
                                                        {
                                                            echo '<li><i class="fa fa-star-o"></i></li>';
                                                        }
                                                    ?>
                                                    <!-- <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star-o" aria-hidden="true"></i></li> -->
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    <?php } } ?>
                                        <!-- box-chat-info-list-cont End-->
                                       <!--  <div class="box-chat-info-list-cont">
                                            <div class="user-profile-client-list">
                                                <img src="<?php echo base_url('assets/users'); ?>/images/persnal-info-user-32.png">
                                                <div class="ofline-client-list"><i class="fa fa-circle" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                            <div class="text-user-clientlist-info">
                                                <h3>Ginger Johnston</h3>
                                                <h5>Spain</h5>
                                            </div>
                                        </div> -->
                                        <!-- box-chat-info-list-cont End-->

                                    </div>
                                    <!-- Tab-3 Contant End-->
                                   <?php if(isset($_GET['search']) && $_GET['search']!="") {}else{?>
                                <div class="list-pagenations">
                                    <ul class="tsc_pagination">
                                    <!-- Show pagination links -->
                                    <?php foreach ($links as $link) {
                                    echo "<li>". $link."</li>";
                                    } ?>
                                    </ul>
                                    </div>
                                    <?php } ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/amimation-menu-sidebar.js"></script>
    <!-- <script type="text/javascript" src="<?php echo base_url('assets/users/js/sidebarmenu.js'); ?>"></script> -->
    <script src="<?php echo base_url('assets/users'); ?>/js/common.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
    function sweetAlert(type,title,message)
      {
        Swal.fire({
            allowOutsideClick: false,
            type: type,
            title: title,
            text: message,
            //footer: '<a href>Why do I have this issue?</a>'
          })
      }
        /*Send Request To Advisor*/
    function sendRequestAdvisor(client_id)
    {
        $.ajax({
            url: '<?php echo base_url('users/advisor/sendRequestToAdvisorAjax'); ?>',
            type: "POST",
            data:{client_id:client_id},
            success: function(data)
            {
                sweetAlert('success','','Your Request has been sent successfully');
                setTimeout(function(){ 
                    location.reload();
                        }, 3000);
                
                
            }
        });
    }

    function cancelRequestAdvisor(client_id)
    {
        swal({
            title: "Are you sure ?",
            text: "Once Cancel, you will not be able to connect.", 
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) 
            {
                //alert();
                $.ajax({
                    url: "<?php echo base_url('users/advisor/cancelRequestAdvisorAjax'); ?>",
                    type: "POST",
                    data: {client_id: client_id},
                    dataType: "html",
                    success: function (data) 
                    {
                        //alert(data);
                        swal("Done!", "It was succesfully Cancelled Request!", "success");
                        setTimeout(function(){
                            location.reload();
                        }, 2000);                       

                    },
                    error: function (xhr, ajaxOptions, thrownError) 
                    {
                        swal("Error!", "Please try again", "error");
                    }
                });
            }
            else 
            {
                swal("The Request will Available");
            }
        });
    }

    function blockToAdvisor(client_id)
    {
        swal({
            title: "Are you sure ?",
            text: "Once Block, you will not be able to Chat.", 
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) 
            {
                //alert();
                $.ajax({
                    url: "<?php echo base_url('users/advisor/cancelRequestAdvisorAjax'); ?>",
                    type: "POST",
                    data: {client_id: client_id},
                    dataType: "html",
                    success: function (data) 
                    {
                        //alert(data);
                        swal("Done!", "It was succesfully Block!", "success");
                        setTimeout(function(){
                            location.reload();
                        }, 2000);                       

                    },
                    error: function (xhr, ajaxOptions, thrownError) 
                    {
                        swal("Error!", "Please try again", "error");
                    }
                });
            }
            else 
            {
                swal("The Advisor will Available with you");
            }
        });
    }

    </script>
  
</body>
</html>