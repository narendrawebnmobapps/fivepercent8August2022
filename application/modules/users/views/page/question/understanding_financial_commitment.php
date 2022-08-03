<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url('assets/users'); ?>/images/favicons.png" type="images/x-icon" />
  <title>Understanding Financial Commitments</title>
  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url('assets/users'); ?>/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
  <!-- Style CSS -->
  <link href="<?php echo base_url('assets/users'); ?>/css/main-custom.css" rel="stylesheet">
  <!-- Font Awesome core CSS -->
  <link href="<?php echo base_url('assets/users'); ?>/css/font-awesome.min.css" rel="stylesheet">
  <!-- Rang Slider core CSS -->
  <link href="<?php echo base_url('assets/users'); ?>/css/main.min.css" rel="stylesheet">
  <!-- Textpager Css -->
  <link href="<?php echo base_url('assets/users'); ?>/css/pag.css" rel="stylesheet">
  <style type="text/css">
/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
  float:right;
}

/* Hide default HTML checkbox */
.switch input {display:none;}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input.default:checked + .slider {
  background-color: #444;
}
input.primary:checked + .slider {
  background-color: #2196F3;
}
input.success:checked + .slider {
  background-color: #8bc34a;
}
input.info:checked + .slider {
  background-color: #3de0f5;
}
input.warning:checked + .slider {
  background-color: #FFC107;
}
input.danger:checked + .slider {
  background-color: #f44336;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
/* radio button*/
.custom-radios div {
  display: inline-block;
}
.custom-radios input[type="radio"] {
  display: none;
}
.custom-radios input[type="radio"] + label {
  color: #333;
  font-family: Arial, sans-serif;
  font-size: 14px;
}
.custom-radios input[type="radio"] + label span {
  display: inline-block;
  width: 40px;
  height: 40px;
  margin: -1px 4px 0 0;
  vertical-align: middle;
  cursor: pointer;
  border-radius: 50%;
  border: 2px solid #FFFFFF;
  box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.33);
  background-repeat: no-repeat;
  background-position: center;
  text-align: center;
  line-height: 44px;
}
.custom-radios input[type="radio"] + label span img {
  opacity: 0;
  transition: all .3s ease;
}

.custom-radios input[type="radio"]:checked + label span {
  opacity: 1;
  background: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg) center center no-repeat;
  width: 40px;
  height: 40px;
  display: inline-block;

}

/* Checkbox button*/
.custom-radios div {
  display: inline-block;
}
.custom-radios input[type="checkbox"] {
  display: none;
}
.custom-radios input[type="checkbox"] + label {
  color: #333;
  font-family: Arial, sans-serif;
  font-size: 14px;
}
.custom-radios input[type="checkbox"] + label span {
  display: inline-block;
  width: 40px;
  height: 40px;
  margin: -1px 4px 0 0;
  vertical-align: middle;
  cursor: pointer;
  /*border-radius: 50%;*/
  border: 2px solid #FFFFFF;
  box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.33);
  background-repeat: no-repeat;
  background-position: center;
  text-align: center;
  line-height: 44px;
}
.custom-radios input[type="checkbox"] + label span img {
  opacity: 0;
  transition: all .3s ease;
}

.custom-radios input[type="checkbox"]:checked + label span {
  opacity: 1;
  background: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/242518/check-icn.svg) center center no-repeat;
  width: 40px;
  height: 40px;
  display: inline-block;

}
  </style>
</head>
<body class="question-bg-picks">
  <!-- Question tab Section Start Here -->
  <section class="question-tab-main-section">
    <div class="container">
      <div class="row">
        <div class="container">
          <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <div class="box-contant-boxe-question">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <!-- <h3 class="panel-title">Panel title</h3> --> <span class="">
                        <!-- Tabs -->
                         <ul class="nav panel-tabs">
                            <li class="personalinfo"><a href="<?php echo base_url('user/personelinfo/'.base64_encode(base64_encode($this->session->userdata('plan_id'))).'/'.base64_encode(base64_encode($this->session->userdata('user_id')))); ?>">Personal Info</a></li>
                            <li class="FinancialSituation "><a href="<?php echo base_url('user/financial-situation/'.base64_encode(base64_encode($this->session->userdata('user_id')))); ?>">Financial Situation</a></li>
                            <li class="InvestmentObjectives "><a href="<?php echo base_url('user/investment-objective/'.base64_encode(base64_encode($this->session->userdata('user_id')))); ?>">Investment Objectives</a></li>
                            <li class="KnowlegdeExperience "><a href="<?php echo base_url('user/knowledge-experience/'.base64_encode(base64_encode($this->session->userdata('user_id')))); ?>">Knowlegde & Experience</a></li>
                            <li class="UnderstandingCommitments active"><a href="<?php echo base_url('user/understanding-financial-commitment/'.base64_encode(base64_encode($this->session->userdata('user_id')))); ?>">Understanding Financial Commitments</a></li>
                        </ul>
                    </span>
                  </div>
                  <div class="panel-body">
                    <div class="tab-content">                      
                      <div class="tab-pane active" id="tab5">
                        <div class="page">
                          <div class="list-of-posts">
                            <form method="post" action="">
                         
                              <?php 
                              $j=0;
                              $k=1;
                              $i=1; foreach($questions as $question) { 

                                  if($j==0)
                                  {
                                ?>

                              <div class="post">
                                <div class="col-12 col-md-12 finance-statement-heading-text">
                                <h3>Understanding Financial Commitments Of The Customer</h3>
                              </div>
                              <?php }                             
                               ?>                             

                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <h4><?php echo $k; ?> <?php echo $question['question']; ?></h4>
                                  <input type="hidden" name="question[]" value="<?php echo $question['id']; ?>">
                                  <input type="hidden" name="question_type[]" value="<?php echo $question['question_type']; ?>">
                                </div>
                              </div>
                              <!-- contant-finanecr-addverger End-->
                             <?php 
                              $l=1; foreach($question['options'] as $option) {   ?>
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <p><?php echo $k.'.'.$l; ?> <?php echo $option->options; ?></p>
                                </div>

                                <?php if($question['question_type']==1){  //single choice  ?>
                                <style type="text/css">
                                  .custom-radios input[type="radio"]#color-<?php echo $l.$k; ?> + label span {
                                    background-color: #f1c40f;
                                  }
                                </style>
                                <div class="col-md-4 col-sm-4">
                                  <div class="custom-radios" style="float: right;">
                                   <div>
                                    <input type="radio"  id="color-<?php echo $l.$k; ?>" name="<?php echo $question['id'] ?>[]" value="<?php echo $option->id ?>" <?php if($option->selected==1) {echo 'checked'; } ?>>
                                    <label for="color-<?php echo $l.$k; ?>">
                                      <span>
                                      </span>
                                    </label>
                                  </div>
                                </div>
                                </div>
                              <?php } ?>
                              <?php if($question['question_type']==2){   //Multiple choice  ?>
                                <style type="text/css">
                                  .custom-radios input[type="checkbox"]#color-<?php echo $l.$k; ?> + label span {
                                    background-color: #f1c40f;
                                  }
                                </style>
                                <div class="col-md-4 col-sm-4">
                                  <div class="custom-radios" style="float: right;">
                                   <div>
                                    <input type="checkbox"  id="color-<?php echo $l.$k; ?>" name="<?php echo $question['id'] ?>[]" value="<?php echo $option->id ?>" <?php if($option->selected==1) {echo 'checked'; } ?>>
                                    <label for="color-<?php echo $l.$k; ?>">
                                      <span>
                                      </span>
                                    </label>
                                  </div>
                                </div>
                                </div>
                              <?php } ?>

                              <?php if($question['question_type']==3){   //Yes/No  ?>
                                <div class="col-md-4 col-sm-4">
                                 <label class="switch ">
                                    <input type="checkbox" class="warning" value="<?php echo $option->id ?>" name="<?php echo $question['id'] ?>[]" <?php if($option->selected==1) {echo 'checked'; } ?>>
                                    <span class="slider round"></span>
                                  </label>
                                </div>
                              <?php } ?>
                              <?php if($question['question_type']==4){   //Pernentage  ?>
                                <div class="col-md-4 col-sm-4 project">
                                    <input type="text" class="percent" value="<?php echo $option->answer ?>"  name="percentage[]" readonly />
                                    <input type="hidden" name="percentage_question[]" value="<?php echo $option->id ?>">
                                    <input type="hidden" name="<?php echo $question['id'] ?>[]" value="<?php echo $option->id ?>">
                                    <div class="bar"></div>
                                </div>
                              <?php } ?>
                              <?php if($question['question_type']==5){   //value enter  ?>
                                <div class="col-md-4 col-sm-4">
                                    <input type="text" value="<?php echo $option->answer ?>"  name="value_enter[]">     
                                    <input type="hidden" name="value_enter_question[]" value="<?php echo $option->id ?>"> 
                                    <input type="hidden" name="<?php echo $question['id'] ?>[]" value="<?php echo $option->id ?>">
                                </div>
                              <?php } ?>
                                
                              </div>
                            <?php $l++; } ?>
                              <div class="clearfix"></div>
                              <div class="line-hr"></div>
                            <?php

                             if($i==2)
                              {
                                $j=0;
                                $i=1;
                                echo"</div>";
                              }
                              else
                              {
                                 $i++;
                                 $j++;
                              }
                              $k++;
                             
                             } ?>                            
                            <!-- End Post-->  
                            <div class="col-md-12 col-sm-12 finish-btn">
                                <input type="submit" name="" value="Finish">
                            </div>                       
                          </div>
                        </form>
                          <div class="pagination"></div>
                        </div>
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--div class="container">
  <div class="row">
    <form method="post" action="">
    <div class="project col-md-4">
      <h1 class="text-center">Project Name</h1>
      <h2 class="text-center">
        <input type="text" name="percent" class="percent" readonly />
      </h2>
      <h3 class="text-center">complete</h3>
      <div class="bar"></div>
    </div>
    <input type="submit" name="" value="sub">
    </form>
    <div class="project col-md-4">
      <h1 class="text-center">Project Name</h1>
      <h2 class="text-center">
        <input type="text" class="percent" readonly />
      </h2>
      <h3 class="text-center">complete</h3>
      <div class="bar"></div>
    </div>
    
    <div class="project col-md-4">
      <h1 class="text-center">Project Name</h1>
      <h2 class="text-center">
        <input type="text" class="percent" readonly />
      </h2>
      <h3 class="text-center">complete</h3>
      <div class="bar"></div>
    </div>
  </div>
</div-->
<style type="text/css">
  h2 {
  margin-bottom:0;
}
h3 {
  margin:0 0 30px;
} 
.ui-slider-range {
   background:yellow;
}
.percent {
  color: green;
    font-weight: bold;
    text-align: center;
    width: 100%;
    border: none;
    padding: 5px;
    margin-bottom: -3px;
    margin-top: -7px;
    background: #e9e9e9;
}



.contant-finanecr-addverger p{

    margin-bottom: 37px;
}

</style>
  </section>
  <!-- Question tab Section End Here -->
  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
  <script>
    window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')
  </script>
  <script src="<?php echo base_url('assets/users'); ?>/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url('assets/users'); ?>/js/amimation-menu-sidebar.js"></script>
  <script src="<?php echo base_url('assets/users'); ?>/js/jQuery.inputSliderRange.min.js"></script>
  <script src="<?php echo base_url('assets/users'); ?>/js/paginate.js"></script>
  <script src="<?php echo base_url('assets/users'); ?>/js/custom.js"></script>
  <script src="<?php echo base_url('assets/users'); ?>/js/rangslider.js"></script>
  <!-- Rang Slider Js Start Hare-->
  <script type="text/javascript">
    $(function() {
  $('.project').each(function() {
    var $projectBar = $(this).find('.bar');
    var $projectPercent = $(this).find('.percent');
    var $projectRange = $(this).find('.ui-slider-range');
    var vl=$(this).find('.percent').val();
          vl=vl.split("%");
        vl=parseInt(vl);
        if(isNaN(vl))
        {
          vl=0;
        }
    $projectBar.slider({
      range: "min",
      animate: true,
      value: vl,
      min: 0,
      max: 100,
      step: 1,
      slide: function(event, ui) {
       var getpercentvalue =  $projectPercent.val(ui.value + "%");
      // $projectPercent.val(getpercentvalue);
      },
      change: function(event, ui) {
        var $projectRange = $(this).find('.ui-slider-range');
        var percent = ui.value;  
      }
    });
  })
})
  </script>
<script>
 $(document).ready(function(){
        $('.pagination li:first-child').addClass('active');
  })
</script>
  <!-- Rang Slider Js End Hare-->
  <!-- Switch Btn Js Here -->
  <script type="text/javascript">
    $('.btn-toggle').click(function() {
        $(this).find('.btn').toggleClass('active');  
        
        if ($(this).find('.btn-primary').length>0) {
          $(this).find('.btn').toggleClass('btn-primary');
        }
        if ($(this).find('.btn-danger').length>0) {
          $(this).find('.btn').toggleClass('btn-danger');
        }
        if ($(this).find('.btn-success').length>0) {
          $(this).find('.btn').toggleClass('btn-success');
        }
        if ($(this).find('.btn-info').length>0) {
          $(this).find('.btn').toggleClass('btn-info');
        }
        
        $(this).find('.btn').toggleClass('btn-default');
           
    });
  </script>
  <!-- Switch Btn Js End Here -->
  <!-- Edit Profile Text Section Start Here-->
  <script type="text/javascript">
    $(function() {
        $("#upload-img").on("change", function()
        {
            var files = !!this.files ? this.files : [];
            if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
     
            if (/^image/.test( files[0].type)){ // only image file
                var reader = new FileReader(); // instance of the FileReader
                reader.readAsDataURL(files[0]); // read the local file
     
                reader.onload = function(e){ // set image data as background of div
                  
                  $("#img-preview-block").css({'background-image': 'url('+e.target.result +')', "background-size": "cover"});
                }
            }
        });
    });
  </script>


</body>

</html>