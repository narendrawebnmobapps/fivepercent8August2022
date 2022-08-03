<?php $this->load->view('includes/header'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/users/css/dashbord.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/users/css/main-custom.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/users/css/main.min.css'); ?>">
<link href="<?php echo base_url('assets/users'); ?>/css/pag.css" rel="stylesheet">
<style type="text/css">
  .persnal-info-form-make input[type="text"], .persnal-info-form-make input[type="email"], .persnal-info-form-make input[type="password"], .persnal-info-form-make select {
    height: 46px !important;
  }
</style>

<style type="text/css">
  .box-contant-boxe-question {
    background-color: #ffffff;
    
    webkit-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.75);
    -moz-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.75);
    box-shadow: 0px 0px 5px 0px rgb(183, 181, 181);
    
}
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
 /* border-radius: 50%;*/
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


.box-contant-boxe-question{
  padding: 20px;
  display: inherit;
}


  </style>
}
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
<div class="page-breadcrumb">
  <div class="row">
      <div class="col-12 d-flex no-block align-items-center">
          <h4 class="page-title">User</h4>
          <div class="ml-auto text-right">
              <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">User Details</li>
                  </ol>
              </nav>
          </div>
      </div>
  </div>
</div>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<!------ Include the above in your HEAD tag ---------->

<div class="container-fluid">
                <div class="col-md-12">
              <div class="box-contant-boxe-question">
                <div class="panel panel-primary">
                  <div class="panel-body">
                    <div class="tab-content">
                      <div class="tab-pane active" id="tab2">
                        <?php
                              if($this->session->flashdata('success')){
                           ?>
                          <div class="alert alert-success text-center">
                            <?php echo $this->session->flashdata('success'); ?>
                          </div>
                      <?php } ?>
                                 <table class="table table-bordered nobottommargin" style="width:100%;" align="center">
                                  <tbody>
                                    <tr>
                                      <td align="center" colspan="2"><strong>Test Result</strong>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>Total No. of Questions :</td>
                                      <td><?php echo $total_question; ?></td>
                                    </tr>
                                    <tr>
                                      <td>Number of Questions attempted :</td>
                                      <td><?php echo $attemted_question; ?></td>
                                    </tr>
                                    <tr>
                                      <td>Number of Correct Answers :</td>
                                      <td><?php echo $correct; ?></td>
                                    </tr>
                                    <tr>
                                      <td>Number of Wrong Answers :</td>
                                      <td><?php echo $incorrect_answer; ?></td>
                                    </tr>
                                    <tr>
                                      <td>Your Score (in %) :</td>
                                      <td><?php echo $answerPercentage; ?></td>
                                    </tr>
                                  </tbody>
                                </table>
                        <div class="page">
                          <div class="list-of-posts">

                            <form method="post" action="">
                         
                              <?php 
                              $j=0;
                              $k=1;
                             // $correct=0;
                             // $selected=0;
                              $i=1; foreach($questions as $question) 
                              { 



                                  if($j==0)
                                  {
                                ?>

                              <div class="post">
                                <div class="col-12 col-md-12 finance-statement-heading-text">
                              </div>
                              <?php }                             
                               ?>                             

                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <h4><?php echo $k; ?>. <?php echo $question['question']; ?></h4>
                                  <input type="hidden" name="question[]" value="<?php // echo $question['id']; ?>">
                                  <input type="hidden" name="question_type[]" value="<?php //echo  $question['question_type']; ?>">
                                </div>
                              </div>
                              <!-- contant-finanecr-addverger End-->
                             <?php 
                              $l='A'; foreach($question['options'] as $option) 
                              { 
                                   if(count($question['correct_option'])>0)
                                    {
                                       if($option->correct_option==1)
                                        {
                                          $correct='<i style="color:green;margin: 0px 2px 0px 2px;" class="fa fa-check" aria-hidden="true"></i>';
                                          $c = $l;
                                        }
                                        else
                                        {
                                          $correct='';
                                        }
                                       if($question['correct_option']['options']==$option->id)
                                        {
                                          $selected='<i style="color:red;margin: 0px 2px 0px 2px;" class="fa fa-times" aria-hidden="true"></i>';
                                          $s=$l;
                                        }
                                        else
                                        {
                                          $selected='';
                                        }
                                        if($question['correct_option']['options']==$option->id && $option->correct_option==1)
                                        {
                                          $selected='';
                                        }

                                    }
                                    else
                                    {
                                      $selected='';
                                      
                                      if($option->correct_option==1)
                                        {
                                          $correct='<i style="color:green;margin: 0px 2px 0px 2px;" class="fa fa-check" aria-hidden="true"></i>';
                                          $c = $l;
                                        }
                                        else
                                        {
                                          $correct='';
                                        }

                                    }
                                  


                                ?>
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <p><?php echo $l; ?>.  <?php echo $correct; ?><?php echo $selected; ?> <?php echo $option->options; ?></p>
                                </div>
                              </div>

                              
                            <?php $l++; } ?>
                            <div class="clearfix"></div>
                            <!-- <div class="your-answers">
                              <h2>Your Answer : <?=$s; ?></h2>
                            </div>

                            <div class="your-answers">
                              <h2>Correct Answer :<?=$c;?></h2>
                            </div> -->

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
                            <!-- <div class="col-md-12 col-sm-12 finish-btn">
                                <input type="submit" name="" value="Finish">
                            </div>  -->                      
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

<?php $this->load->view('includes/footer'); ?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script src="<?php echo base_url('assets/users'); ?>/js/jQuery.inputSliderRange.min.js"></script>
<script src="<?php echo base_url('assets/users'); ?>/js/paginate.js"></script>
<script src="<?php echo base_url('assets/users'); ?>/js/custom.js"></script>

<script type="text/javascript">
    $(document).on('click','.adviserbtn',function(e){
      e.preventDefault();
      var sss = $(this).attr('data-id');
      if(sss==1)
      {
        $('.yescls').addClass('btn-default');
        $('.yescls').removeClass('btn-primary');

        $('.nocls ').addClass('btn-primary');
        $('.nocls ').removeClass('btn-default');
        $('.talktoadviser').val(1);
      }
      if(sss==2)
      {
        $('.nocls').addClass('btn-default');
        $('.nocls').removeClass('btn-primary');

        $('.yescls ').addClass('btn-primary');
        $('.yescls ').removeClass('btn-default');
        $('.talktoadviser').val(0);

      }
      //alert(sss);
    });
  </script>
  <script type="text/javascript">
    $(function() {
  $('.project').each(function() {
    var $projectBar = $(this).find('.bar');
    var $projectPercent = $(this).find('.percent');
    var $projectRange = $(this).find('.ui-slider-range');
    $projectBar.slider({
      range: "min",
      animate: true,
      value: 1,
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
