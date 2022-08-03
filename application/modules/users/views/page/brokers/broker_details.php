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
  <?php if($accepted->accepted==0){ ?>
  <style type="text/css">
    #go_for_terms_to_document_section,#go_for_terms_to_service_section{pointer-events: none;}
  </style>
<?php } ?>
<style type="text/css">
  .list-add-text-info {margin-top: 30px;}
</style>
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
                <li><?php echo $broker->first_name.' '.$broker->last_name; ?></li>
              </ul>
            </div>
          </div>
          <!-- TradingView Widget BEGIN -->
          <div class="col-md-12 brokers-terms-condition">
            <div class="broker-bg-color pad-tp">
              <div class="broker02"> 
                <span>
                  <img src="<?php echo base_url('uploads/user-profile/'.$broker->profile_image); ?>" alt="ibroker"> 
               </span>
                <div class="sec-broker">
                  <p><?php echo $broker->first_name.' '.$broker->last_name; ?></p>
                </div>
              </div>


              <div class="content-brokers">
                <p><?php echo $broker->terms_conditions; ?> </p>

              </div>

              <div class="broker-accept-btn">
                <div class="accepted_not_accepted_btn">
                <?php if($accepted->accepted==0){ ?>
                <button type="button" class="btn accept-btn accept_btn_broker" dataid="<?php echo $broker->id; ?>">ACCEPT</button>
                <a  class="btn dontaccept-btn" href="<?php echo base_url('user/brokers'); ?>">DO NOT ACCEPT</a>
              <?php } ?>
            </div>
               <span class="terma-tdp">

                      </span>
               <div class="resume-document">
                        <ul>
                            <li><a class="r" href="JavaScript:void(0)">T</a></li>
                            <li id="go_for_terms_to_service_section"><a href="JavaScript:void(0)">P</a></li>
                            <li id="go_for_terms_to_document_section"><a href="JavaScript:void(0)">D</a></li>
                        </ul>
                        <h5>Terms</h5>
                    </div>
              </div>
            </div>
          </div>
          <div class="col-md-12 col-sm-12 brokers-services" style="display: none;">         

              <!--  -->
              <div class="bottom-bx-margin">
                  <div class="broker-bg-color pad-tp">
                    <div class="broker02"> <span>
                                              <img src="<?php echo base_url('uploads/user-profile/'.$broker->profile_image); ?>" alt="ibroker"> 
                                           </span>
                      <div class="sec-broker">
                        <p><?php echo $broker->first_name.' '.$broker->last_name; ?></p>
                      </div>
                    </div>
                    <div class="list-content-view-lists">
                      <ul>
                        <?php foreach($services as $service){ ?>
                          <li>-<?php echo $service->service; ?></li>
                        <?php } ?>
                      </ul>
                    </div>
                    <div class="broker-accept-btn"> 
                      <!-- <span class="terma-tdp">
                         <p>T P D</p>
                         <p>PRODUCTS</p>
                     </span> -->
                     <div class="resume-document">
                          <ul>
                              <li id="go_for_services_to_terms_condition"><a  href="JavaScript:void(0)">T</a></li>
                              <li ><a class="r"  href="JavaScript:void(0)">P</a></li>
                              <li id="go_for_services_to_document"><a  href="JavaScript:void(0)">D</a></li>
                          </ul>
                          <h5>PRODUCTS</h5>
                      </div>
                    </div>
                  </div>
              </div>
              <!-- bottom-bx-margin -->
            <!--  -->
          </div>

          <style type="text/css">
            
            .list-content-view-lists {
             min-height: 294px;
             display: flex;}

             .broker-bg-color{
              width: 100%;
              height: 600px;
              float: left;
             }

             .list-add-text-info{
              min-height: 264px;
               display: flex;
             }

              .content-brokers {
             min-height: 284px;
             display: flex;}
                 .review-btn a {
              color: #fff;
              background-color: #01ae52;
              padding: 1px 19px;
              border-radius: 40px;
              margin: 0px 0px 0px 4px;
              font-size: 14px;
              text-transform: uppercase;
              display: inline-block;
              line-height: 23px;
              position: relative;
              top: 0px;
              left: 100px;
            }

             /*------------- Mobile Responsive Here -----------------*/
            @media screen and (max-width: 1400px){
            .list-content-view-lists {
             min-height: 294px;
             display: flex;}

            .list-add-text-info{
              min-height: 264px;
               display: flex;
             }

            .content-brokers {
             min-height: 284px;
             display: flex;}

             }
             
            @media screen and (max-width: 1280px){
            .list-content-view-lists {
             min-height: 294px;
             display: flex;}

            .list-add-text-info{
              min-height: 264px;
               display: flex;
             }

            .content-brokers {
             min-height: 284px;
             display: flex;}

          </style>
             <?php if($accepted->accepted==0){ ?>
            <style type="text/css">
               .content-brokers {
             height: 190px;}
            
            </style>
          <?php } else {?>
            <!-- <style type="text/css"> 
              .content-brokers {
             height: 271px;}</style> -->
          <?php } ?>
          <div class="col-md-12 col-sm-12 brokers-documents" style="display: none;">
              
              <!--  -->
              <div class="bottom-bx-margin">
                  <div class="broker-bg-color pad-tp">
                    <div class="broker02"> <span>
                                              <img src="<?php echo base_url('uploads/user-profile/'.$broker->profile_image); ?>" alt="ibroker"> 
                                           </span>
                      <div class="sec-broker">
                        <p><?php echo $broker->first_name.' '.$broker->last_name; ?><span class="review-btn"><a href="javascript:void(0)" data-toggle="modal" data-target="#myModal">Review</a></span></p>
                      </div>
                      <div class="clearfix"></div>
                      <div class="list-add-text-info">
                        <ul>
                          <?php foreach($documents as $document){ ?>
                          <li><?php echo $document->document; ?> 
                          <?php if($document->doc_id==0) {?>
                          <span id="document_id<?php echo $document->id; ?>">
                            <a class="add_brokers_documents" broker_id="<?php echo $broker->id; ?>" docid="<?php echo $document->id; ?>"  docname="<?php echo $document->document; ?>"  href="javascript:void(0)">Add</a>
                          </span>
                        <?php } else {?>
                          <span id="document_id_update<?php echo $document->id; ?>">
                            <a class="update_brokers_documents" broker_id="<?php echo $broker->id; ?>" docid="<?php echo $document->id; ?>"  docname="<?php echo $document->document; ?>"  href="javascript:void(0)">Update</a>
                          </span>
                        <?php } ?>
                        <span style="display: none;" id="document_id_update<?php echo $document->id; ?>">
                            <a class="update_brokers_documents" broker_id="<?php echo $broker->id; ?>" docid="<?php echo $document->id; ?>"  docname="<?php echo $document->document; ?>"  href="javascript:void(0)">Update</a>
                          </span>

                        </li>
                          <?php } ?>
                        </ul>
                      </div>
                    </div>
                    <div class=""></div>
                    <div class="broker-accept-btn"> 
                      <!-- <span class="terma-tdp">
                           <p>T P D</p>
                           <p>DOCUMENTS</p>
                      </span> -->
                        <div class="resume-document">
                          <ul>
                              <li id="go_for_document_to_terms_condition_section"><a  href="JavaScript:void(0)">T</a></li>
                              <li id="go_for_document_to_services"><a  href="JavaScript:void(0)">P</a></li>
                              <li ><a class="r" href="JavaScript:void(0)">D</a></li>
                          </ul>
                          <h5>DOCUMENTS</h5>
                      </div>
                    </div>
                </div>
              </div>
              <!-- bottom-bx-margin -->
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
  <style type="text/css">
.add_stock_modal .modal-header {
    background: #053852;
    padding: 15px 12px;
}
.add_stock_modal .modal-header button{
    color: #fff;
}
.add_stock_modal .modal-header h4 {
    color: #fff;
    font-size: 22px;
    font-weight: 400;
}
.add_stock_modal .modal-body form {
    border: 1px solid #d4d5d6;
    padding: 16px;
    border-radius: 5px;
}
.add_stock_modal .modal-footer{
    border-top:none;
    padding: 0px 15px 12px 0;
}
.add_stock_modal .modal-body .form-group label{
    color: #053852;
}
.add_stock_modal .modal-body .form-control{
    border-radius: 0;
    height: 46px;
}
.add_stock_modal .save_submit_btn{
    margin-top: 15px;
    margin-bottom: 0px;
}
.add_stock_modal .alert{
        margin-top: 12px;
        text-align: center;
        display: none;
}
.add_stock_modal label.docname{
  text-transform: uppercase;
}
.error{border: 1px solid red;}

.box-selects-confirmation h3 {
    position: absolute;
    top: 339px !important;
    transform: translateX(-62%) translateY(-311%) rotate(810deg);
    -ff-transform: rotate(-90deg);
    margin: 0 auto;
    background-color: #053852;
    color: #fff;
    font-size: 14px;
    line-height: 26px;
    letter-spacing: 8px;
    border-radius: 25px;
    padding: 0px 33px 0px 32px;
    text-transform: uppercase;
    cursor: pointer;
}
</style>
<!-- Add Stock Modal Start-->
<div id="add_document_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content add__modal">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Document</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="" id="add_document_form" enctype="multipart/form-data">
            <div class="form-group">
                <input type="hidden" name="document_id" class="hidden_document_id">
                <input type="hidden" name="broker_id" class="hidden_broker_id">
                <label class="docname" style="text-transform: uppercase;"></label>
                <input type="file" name="doc" class="form-control fileupload">
            </div>
            <div class="finish-btn save_submit_btn">
              <input type="submit" name="" value="Save" id="add_document_btn">
            </div> 
            <div class="alert alert-success add-stock-success-div" style="display: none;">
               Document Uploaded Successfully
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!--Add Stock Modal End-->

<!-- Add Stock Modal Start-->
<div id="edit_document_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content add__modal">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Document</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="" id="update_document_form" enctype="multipart/form-data">
            <div class="form-group">
                <input type="hidden" name="document_id" class="hidden_document_update_id">
                <input type="hidden" name="broker_id" class="hidden_broker_update_id">
                <label class="docname" style="text-transform: uppercase;"></label>
                <input type="file" name="doc" class="form-control fileupload_update">
            </div>
            <div class="finish-btn save_submit_btn">
              <input type="submit" name="" value="Save" id="update_document_btn">
            </div> 
            <div class="alert alert-success add-stock-success-div" style="display: none;">
               Document Uploaded Successfully
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!--Edit Stock Modal End-->
<style type="text/css">
            
            .review-information .animated {
    -webkit-transition: height 0.2s;
    -moz-transition: height 0.2s;
    transition: height 0.2s;
}

.review-information .stars
{
    margin: 20px 0;
    font-size: 24px;
    color: #d17581;
}

.review-information .glyphicon {
    font-size: 37px;
    color: #FFC107;
}

.review-information  .well{
    padding: 0
}
.review-information .form-control{}

.review-information .btn-success {
    color: #fff;
    background-color: #063853;
    border-color: #063853;
    padding: 7px 44px !important;
    outline: none;
}

.review-information .btn-success:hover, .btn-success:focus {
    color: #fff;
   background-color: #063853;
    border-color: #063853;
    outline: none;
}
        </style>
<!-- Review Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content review-information">
        <div class="modal-header head-bg-color">
          <button type="button" class="close close-x" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Rate your Broker</h4>
        </div>
        <div class="modal-body">
          <div class="container">
    <div class="row">
        <div class="col-md-6">
        <div class="well well-sm">
             <!-- <div class="text-right">
                <a class="btn btn-success btn-green" href="#reviews-anchor" id="open-review-box">Leave a Review</a>
            </div>  -->
        
            <div class="row" id="post-review-box">
                <div class="col-md-12">
                    <form  action="" method="post" id="ratingReviewForm">
                        <input id="ratings-hidden" name="rating" type="hidden"> 
                        <textarea class="form-control animated" id="new-review" name="comment" placeholder="Enter your review here..."></textarea>
                        <input type="hidden" name="client_id" value="<?php echo base64_encode($this->uri->segment(4)); ?>">
                        <div class="text-right">
                            <div class="stars starrr" data-rating="0"></div>
                            <button class="btn btn-success btn-lg reviewRatingSaveBtn" type="submit">Save</button>
                        </div>
                    </form>
                    <div class="col-md-12 col-sm-12 ratingReviewSuccessDiv" style="display: none;"><p style="color: #3c763d;text-align: center;">Data Saved successfully</p></div>
                </div>
            </div>
        </div> 
         
        </div>
    </div>
</div>
        </div>
        <div class="modal-footer border-top-0">
         <!--  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        </div>
      </div>
      
    </div>
  </div>
  <!--Review Modal End-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js "></script>
  <script src="<?php echo base_url('assets/users'); ?>/js/bootstrap.min.js "></script>
  <script src="<?php echo base_url('assets/users'); ?>/js/amimation-menu-sidebar.js"></script>
  <!-- <script type="text/javascript" src="<?php echo base_url('assets/users/js/sidebarmenu.js'); ?>"></script> -->
  <script src="<?php echo base_url('assets/users'); ?>/js/common.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

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
    $(document).on('click','.accept_btn_broker',function(){
      var broker_id = $(this).attr('dataid');
      $.ajax({
        url:'<?php echo base_url("users/dashboard/accept_broker_terms_condition"); ?>',
        method:'POST',
        data:{broker_id:broker_id},
        success:function(data)
        {
          console.log(data);
          if(data=="login")
          {
            window.location='<?php echo base_url("signin"); ?>';
          }
          else if(data==1)
           {
              $('.brokers-terms-condition').hide();
              $('.brokers-documents').show();
              $('.accepted_not_accepted_btn').hide();
              $('#go_for_terms_to_document_section').css('pointer-events','all');
              $('#go_for_terms_to_service_section').css('pointer-events','all'); 
              $('.content-brokers').css('height','271px');
              /*go_for_terms_to_document_section   go_for_terms_to_service_section
  .content-brokers {
             height: 271px;}

              */
           }
           else
           {
            alert('something went wrong');
           }
        }
    });
});

$(document).on('click','.add_brokers_documents',function(){

  var document_name = $(this).attr('docname');
  var doc_id = $(this).attr('docid');
  var broker_id = $(this).attr('broker_id');

  $('.docname').html(document_name);
  $('.hidden_document_id').val(doc_id);
  $('.hidden_broker_id').val(broker_id);
  //$('#document_id'+doc_id).hide();

  $('#add_document_modal').modal('show');
});

$(document).on('click','#add_document_btn',function(event){
  event.preventDefault();
  var fileupload = $('.fileupload').val();
  var doc_id = $('.hidden_document_id').val();
  if(fileupload=='')
  {
    sweetAlert('error','Oops...','Please choose  document');
    return false;
  }
  $.ajax({
        url:'<?php echo base_url("users/dashboard/add_brokers_documents_ajax"); ?>',
        method:'POST',
        data:new FormData( $("#add_document_form")[0]),
        async : false,
        cache : false,
        contentType : false,
        processData : false,
        success:function(data)
        {
          console.log(data);
          if(data=="login")
          {
            window.location='<?php echo base_url("signin"); ?>';
          }
          else if(data==1)
           {
              $('#add_document_form')[0].reset();
              $('.update-stock-success-div').show();
              $('#document_id'+doc_id).hide();
              $('#document_id_update'+doc_id).show();
              alert('Doc Uploaded Successfully');
           }
           else
           {
            alert('something went wrong');
           }
        }
    });
});
/*go_for_services_to_terms_condition
go_for_services_to_document*/
$(document).ready(function(){
  $('#go_for_terms_to_document_section').click(function(){
    $('.brokers-terms-condition').hide();
    $('.brokers-documents').show();
    $('.brokers-services').hide();
  });
  $('#go_for_terms_to_service_section').click(function(){
    $('.brokers-terms-condition').hide();
    $('.brokers-documents').hide();
    $('.brokers-services').show();
  });

$('#go_for_document_to_terms_condition_section').click(function(){
    $('.brokers-terms-condition').show();
    $('.brokers-documents').hide();
    $('.brokers-services').hide();
});
$('#go_for_document_to_services').click(function(){
    $('.brokers-terms-condition').hide();
    $('.brokers-documents').hide();
    $('.brokers-services').show();
});
$('#go_for_services_to_terms_condition').click(function(){
    $('.brokers-terms-condition').show();
    $('.brokers-documents').hide();
    $('.brokers-services').hide();
});

$('#go_for_services_to_document').click(function(){
    $('.brokers-terms-condition').hide();
    $('.brokers-documents').show();
    $('.brokers-services').hide();
});

});

$(document).on('click','.update_brokers_documents',function(){
  var document_name = $(this).attr('docname');
  var doc_id = $(this).attr('docid');
  var broker_id = $(this).attr('broker_id');
  $('.docname').html(document_name);
  $('.hidden_document_update_id').val(doc_id);
  $('.hidden_broker_update_id').val(broker_id);
  //$('#document_id'+doc_id).hide();
  $('#edit_document_modal').modal('show');
});


$(document).on('click','#update_document_btn',function(event){
  event.preventDefault();
  var fileupload = $('.fileupload_update').val();
  //var doc_id = $('.hidden_document_id').val();
  if(fileupload=='')
  {
    sweetAlert('error','Oops...','Please choose  document');
    return false;
  }
  $.ajax({
        url:'<?php echo base_url("users/dashboard/update_brokers_documents_ajax"); ?>',
        method:'POST',
        data:new FormData( $("#update_document_form")[0]),
        async : false,
        cache : false,
        contentType : false,
        processData : false,
        success:function(data)
        {
          //console.log(data);
          if(data=="login")
          {
            window.location='<?php echo base_url("signin"); ?>';
          }
          else if(data==1)
           {
              $('#update_document_form')[0].reset();
              $('.update-stock-success-div').show();
              alert('Doc Uploaded Successfully');
           }
           else
           {
            alert('something went wrong');
           }
        }
    });
});

/*rating review js*/
$(document).on('click','.reviewRatingSaveBtn',function(event){
  event.preventDefault();
  var comment = $('#new-review').val();
  var rating = $('#ratings-hidden').val();
  if(comment=="")
  {
      $('#new-review').css('border','1px solid red');
      return false;
  }
  else
  {
     $('#new-review').css('border',''); 
  }
  if(rating=="")
  {
      sweetAlert('error','Oops...','Please select star rating');
      return false;
  }
  $.ajax({
          url:'<?php echo base_url("users/dashboard/advisorReviewRating"); ?>',
          method:'POST',
          data:new FormData( $("#ratingReviewForm")[0]),
          async : false,
          cache : false,
          contentType : false,
          processData : false,
          success:function(data)
          {
                 //$("#ratingReviewForm")[0].reset();
                 $('#new-review').val('');
                 $('#ratings-hidden').val('');
                 $('.ratingReviewSuccessDiv').show();
                 setTimeout(function(){ $('.ratingReviewSuccessDiv').fadeOut();
                  $('#myModal').modal('toggle');
                  }, 3000);
              
          }
      });
});
</script>
<script type="text/javascript">
    
(function(e){var t,o={className:"autosizejs",append:"",callback:!1,resizeDelay:10},i='<textarea tabindex="-1" style="position:absolute; top:-999px; left:0; right:auto; bottom:auto; border:0; padding: 0; -moz-box-sizing:content-box; -webkit-box-sizing:content-box; box-sizing:content-box; word-wrap:break-word; height:0 !important; min-height:0 !important; overflow:hidden; transition:none; -webkit-transition:none; -moz-transition:none;"/>',n=["fontFamily","fontSize","fontWeight","fontStyle","letterSpacing","textTransform","wordSpacing","textIndent"],s=e(i).data("autosize",!0)[0];s.style.lineHeight="99px","99px"===e(s).css("lineHeight")&&n.push("lineHeight"),s.style.lineHeight="",e.fn.autosize=function(i){return this.length?(i=e.extend({},o,i||{}),s.parentNode!==document.body&&e(document.body).append(s),this.each(function(){function o(){var t,o;"getComputedStyle"in window?(t=window.getComputedStyle(u,null),o=u.getBoundingClientRect().width,e.each(["paddingLeft","paddingRight","borderLeftWidth","borderRightWidth"],function(e,i){o-=parseInt(t[i],10)}),s.style.width=o+"px"):s.style.width=Math.max(p.width(),0)+"px"}function a(){var a={};if(t=u,s.className=i.className,d=parseInt(p.css("maxHeight"),10),e.each(n,function(e,t){a[t]=p.css(t)}),e(s).css(a),o(),window.chrome){var r=u.style.width;u.style.width="0px",u.offsetWidth,u.style.width=r}}function r(){var e,n;t!==u?a():o(),s.value=u.value+i.append,s.style.overflowY=u.style.overflowY,n=parseInt(u.style.height,10),s.scrollTop=0,s.scrollTop=9e4,e=s.scrollTop,d&&e>d?(u.style.overflowY="scroll",e=d):(u.style.overflowY="hidden",c>e&&(e=c)),e+=w,n!==e&&(u.style.height=e+"px",f&&i.callback.call(u,u))}function l(){clearTimeout(h),h=setTimeout(function(){var e=p.width();e!==g&&(g=e,r())},parseInt(i.resizeDelay,10))}var d,c,h,u=this,p=e(u),w=0,f=e.isFunction(i.callback),z={height:u.style.height,overflow:u.style.overflow,overflowY:u.style.overflowY,wordWrap:u.style.wordWrap,resize:u.style.resize},g=p.width();p.data("autosize")||(p.data("autosize",!0),("border-box"===p.css("box-sizing")||"border-box"===p.css("-moz-box-sizing")||"border-box"===p.css("-webkit-box-sizing"))&&(w=p.outerHeight()-p.height()),c=Math.max(parseInt(p.css("minHeight"),10)-w||0,p.height()),p.css({overflow:"hidden",overflowY:"hidden",wordWrap:"break-word",resize:"none"===p.css("resize")||"vertical"===p.css("resize")?"none":"horizontal"}),"onpropertychange"in u?"oninput"in u?p.on("input.autosize keyup.autosize",r):p.on("propertychange.autosize",function(){"value"===event.propertyName&&r()}):p.on("input.autosize",r),i.resizeDelay!==!1&&e(window).on("resize.autosize",l),p.on("autosize.resize",r),p.on("autosize.resizeIncludeStyle",function(){t=null,r()}),p.on("autosize.destroy",function(){t=null,clearTimeout(h),e(window).off("resize",l),p.off("autosize").off(".autosize").css(z).removeData("autosize")}),r())})):this}})(window.jQuery||window.$);

var __slice=[].slice;(function(e,t){var n;n=function(){function t(t,n){var r,i,s,o=this;this.options=e.extend({},this.defaults,n);this.$el=t;s=this.defaults;for(r in s){i=s[r];if(this.$el.data(r)!=null){this.options[r]=this.$el.data(r)}}this.createStars();this.syncRating();this.$el.on("mouseover.starrr","span",function(e){return o.syncRating(o.$el.find("span").index(e.currentTarget)+1)});this.$el.on("mouseout.starrr",function(){return o.syncRating()});this.$el.on("click.starrr","span",function(e){return o.setRating(o.$el.find("span").index(e.currentTarget)+1)});this.$el.on("starrr:change",this.options.change)}t.prototype.defaults={rating:void 0,numStars:5,change:function(e,t){}};t.prototype.createStars=function(){var e,t,n;n=[];for(e=1,t=this.options.numStars;1<=t?e<=t:e>=t;1<=t?e++:e--){n.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"))}return n};t.prototype.setRating=function(e){if(this.options.rating===e){e=void 0}this.options.rating=e;this.syncRating();return this.$el.trigger("starrr:change",e)};t.prototype.syncRating=function(e){var t,n,r,i;e||(e=this.options.rating);if(e){for(t=n=0,i=e-1;0<=i?n<=i:n>=i;t=0<=i?++n:--n){this.$el.find("span").eq(t).removeClass("glyphicon-star-empty").addClass("glyphicon-star")}}if(e&&e<5){for(t=r=e;e<=4?r<=4:r>=4;t=e<=4?++r:--r){this.$el.find("span").eq(t).removeClass("glyphicon-star").addClass("glyphicon-star-empty")}}if(!e){return this.$el.find("span").removeClass("glyphicon-star").addClass("glyphicon-star-empty")}};return t}();return e.fn.extend({starrr:function(){var t,r;r=arguments[0],t=2<=arguments.length?__slice.call(arguments,1):[];return this.each(function(){var i;i=e(this).data("star-rating");if(!i){e(this).data("star-rating",i=new n(e(this),r))}if(typeof r==="string"){return i[r].apply(i,t)}})}})})(window.jQuery,window);$(function(){return $(".starrr").starrr()})

$(function(){

  $('#new-review').autosize({append: "\n"});

  var reviewBox = $('#post-review-box');
  var newReview = $('#new-review');
  var openReviewBtn = $('#open-review-box');
  var closeReviewBtn = $('#close-review-box');
  var ratingsField = $('#ratings-hidden');

  openReviewBtn.click(function(e)
  {
    reviewBox.slideDown(400, function()
      {
        $('#new-review').trigger('autosize.resize');
        newReview.focus();
      });
    openReviewBtn.fadeOut(100);
    closeReviewBtn.show();
  });

  closeReviewBtn.click(function(e)
  {
    e.preventDefault();
    reviewBox.slideUp(300, function()
      {
        newReview.focus();
        openReviewBtn.fadeIn(200);
      });
    closeReviewBtn.hide();
    
  });

  $('.starrr').on('starrr:change', function(e, value){
    //alert(value);
    ratingsField.val(value);
  });
});


</script>
</body>

</html>