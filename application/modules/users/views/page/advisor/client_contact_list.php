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
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>
    <style type="text/css">
    


.bradcrum-list{
    float: left;
}
.searchbarright{float: right;margin-top: 16px;}
/*-----

According Css Here
----------*/
.panel-title {
    margin-top: 0;
    margin-bottom: 0;
    font-size: 15px;
    color: inherit;
    padding: 10px;
    /* background-color: #337ab7; */
    color: #337ab7;
    font-weight: 500;
}
.client-profile-tab .panel-body{
    box-shadow: none;
}

.glyphicon{
    font-size: 11px;
}

.panel-default>.panel-heading {
    color: #337ab7;
    background-color: #f5f5f5;
    border: none;
    background: none;
}



.client-profile-tab .panel{
    margin-bottom: -6px;
    /*margin-top: 136px;*/
}

.box-click-crical{}

.box-click-crical ul{
    padding: 0px;
        text-align: center;
}


.box-click-crical ul li {
        display: inline-block;
        margin-right: 19px; }
   


.box-click-crical ul li a{}

.box-click-crical ul li a i {
        width: 32px;
        height: 32px;
        border: 2px solid #063853;
        border-radius: 50%;
        text-align: center;
        color: #063853;
        font-size: 16px;
        line-height: 29px;
        font-weight: 100;
    }

.box-click-crical ul li span{
    height: 32px;
    width: 32px;
    background-color: #063853;
    display: block;
    position: relative;
    top: 13px;
}
.user-profile-client-list img {
    margin: 0px 8px;
    margin-top: 18px;
}
.online-client-list i {
    position: absolute;
    top: 76px;
    left: 78px;
    color: #4CAF50;
}
.user-profile-client-list{
    width: 10%;
}
.risk-profile-lis-client ul li {
    height: 135px;
}
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
.risk-profile-lis-client ul li span {
    font-size: 18px;
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
                                    <div class="tab-pane active" id="tab3">
                                        <?php 
                                        $user_id = $this->session->userdata('user_id');
                                        foreach($clients as $client) { 
                                        ?>
                                        <div class="box-chat-info-list-cont">
                                            <div class="user-profile-client-list">
                                                <a href="<?php echo base_url('advisor/client/'.base64_encode(base64_encode($client['client_id']))); ?>"><img src="<?php echo base_url('uploads/user-profile/'.$client['profile_image']); ?>"></a>
                                                <!-- <a href="<?php echo base_url('advisor/client_details/'.base64_encode(base64_encode($client['client_id']))); ?>"><img src="<?php echo base_url('uploads/user-profile/'.$client['profile_image']); ?>"></a> -->
                                                <div class="online-client-list"><i <?php if($client['onlineStatus']==0){ ?> style="color: #f6bb19;" <?php } ?> class="fa fa-circle" aria-hidden="true"></i>
                                                </div>
                                            </div>

                                            <div class="text-user-clientlist-info">
                                                <h3><a href="<?php echo base_url('advisor/client/'.base64_encode(base64_encode($client['client_id']))); ?>"><?php echo $client['client_name']; ?></a></h3>          
                                                <h5><?php echo $client['country']; ?></h5>
                                                <p>From <?php echo $client['created_on']; ?></p>
                                                <div class="declinebtnAcceptandBlock">
                                                    <?php 
                                                    $check_request = $this->db->query("SELECT * FROM tbl_user_adviser_referral_code_connectivity  WHERE user_id='".$client['client_id']."' AND advisor_id='".$user_id."'");
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
                                                        <span class="review-btn"><a href="javascript:void(0)" onclick="userRequestDecline('<?php echo $client['client_id'] ?>')" style="background: #ed0505;">Decline</a>
                                                        </span>
                                                        <span class="review-btn approve_user_request" onclick="acceptUserRequest('<?php echo $client['client_id'] ?>');"><a href="javascript:void(0)" style="background: #f6bb19;">Accept</a>
                                                        </span>
                                                    <?php } else { ?>
                                                        <span class="review-btn approved_user_request"  onclick="userRequestBlock('<?php echo $client['client_id'] ?>')"><a href="javascript:void(0)" style="background: #ed0505;" >Block</a></span>
                                                        <span class="review-btn"><a href="javascript:void(0)">Connected</a></span>
                                                    <?php } ?>
                                                </div>

                                            </div><!--  -->
                                            <div class="risk-profile-lis-client">
                                                <ul>
                                                    <li>
                                                        <?php
                                                            if($client['app_usage']==1)
                                                            {
                                                                echo '<b>Investing</b>';
                                                            }
                                                            else if($client['app_usage']==2)
                                                            {
                                                                 echo '<b>Planning</b>';
                                                            }
                                                            else if($client['app_usage']==3)
                                                            {
                                                                 echo '<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>';
                                                            }
                                                            else
                                                            {
                                                                echo '<b></b>';
                                                            }
                                                         ?>
                                                    </li>
                                                    <li> <span><?php echo $client['risk_percent']; ?>/100</span>
                                                        <br>Risk Profile</li>
                                                    <li>
                                                        <?php 
                                                            if(count($client['lastProfitLoss'])>0)
                                                            {
                                                                if($client['lastProfitLoss'][0]>0)
                                                                {
                                                                   echo $client['lastProfitLoss'][0].'%<br><img src="'.base_url('assets/users').'/images/up-icons.png"><br>Daily'; 
                                                                }
                                                                else
                                                                {
                                                                    echo $client['lastProfitLoss'][0].'%<br><img src="'.base_url('assets/users').'/images/dwon-icon.png"><br>Daily';
                                                                }
                                                                
                                                            }
                                                            else
                                                            {
                                                                echo '-';
                                                            }
                                                           // print_r($client['lastProfitLoss'][0]); 
                                                        ?>

                                                        <!-- 7% -->
                                                        <!-- <br>
                                                        <img src="<?php echo base_url('assets/users'); ?>/images/up-icons.png">
                                                        <br>Daily --></li>
                                                    <li>
                                                        <?php if($client['goalPercentage']<0){ ?>
                                                        <span style="color: red;"><?php echo $client['goalPercentage']; ?>%/</span>
                                                        <?php } else { ?>
                                                            <span style="color: #4CAF50;">+<?php echo $client['goalPercentage']; ?>%/</span>
                                                        <?php } ?>
                                                        <span>100%</span>
                                                        <br>Goal
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <?php } ?>    
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
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')
    </script>
    <script src="<?php echo base_url('assets/users'); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/amimation-menu-sidebar.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <!-- <script type="text/javascript" src="<?php echo base_url('assets/users/js/sidebarmenu.js'); ?>"></script> -->
    <script src="<?php echo base_url('assets/users'); ?>/js/common.js"></script>
    <!-- DropDwon Navication Chat Bar Start-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript">
        /*function fetchdata()
        {
         $.ajax({
          url: '<?php echo base_url('users/dashboard/infinite'); ?>',
          type: 'post',
          success: function(response)
          {
           // alert(response);
            $('#testid').text(response);
          }
         });
        }

        $(document).ready(function(){
            setInterval(fetchdata,1000);
        });*/
        //accept user request
        function acceptUserRequest(client_id)
        {
            swal({
                title: "Are you sure ?",
                text: "Once Accept, you can Chat with this Client.", 
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) 
                {
                    $.ajax({
                        url: "<?php echo base_url('users/advisor/user_approved_by_advisor_ajax'); ?>",
                        type: "POST",
                        data: {client_id: client_id},
                        dataType: "html",
                        success: function (data) 
                        {
                            //alert(data);
                            swal("Done!", "It was succesfully Acceptted!", "success");
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
                swal("You couldn't accept this request");
               }
            });
        }
        function userRequestDecline(client_id) {         
            swal({
            title: "Are you sure ?",
            text: "Once Decline, you will not be able to Connect.", 
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) 
            {
                $.ajax({
                    url: "<?php echo base_url('users/dashboard/declineUserAdvisor'); ?>",
                    type: "POST",
                    data: {client_id: client_id},
                    dataType: "html",
                    success: function (data) 
                    {
                        //alert(data);
                        swal("Done!", "It was succesfully Declined!", "success");
                        setTimeout(function(){
                            //window.location.href = "<?php echo base_url('user/dashboard'); ?>";
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
            swal("The person will Available with you");
           }
        });

    }
    function userRequestBlock(client_id)
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
                $.ajax({
                    url: "<?php echo base_url('users/dashboard/declineUserAdvisor'); ?>",
                    type: "POST",
                    data: {client_id: client_id},
                    dataType: "html",
                    success: function (data) 
                    {
                        //alert(data);
                        swal("Done!", "It was succesfully Blocked!", "success");
                        setTimeout(function(){
                            //window.location.href = "<?php echo base_url('user/dashboard'); ?>";
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
            swal("The person will Available with you");
           }
        });
    }
    </script>
  
</body>
</html>