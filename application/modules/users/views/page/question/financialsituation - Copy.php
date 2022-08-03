<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url('assets/users'); ?>/images/favicons.png" type="images/x-icon" />
  <title>Question-1</title>
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
                            <li class="personalinfo"><a href="<?php echo base_url('user/personelinfo'); ?>">Personal Info</a></li>
                            <li class="FinancialSituation active"><a href="<?php echo base_url('user/financial-situation'); ?>">Financial Situation</a></li>
                            <li class="InvestmentObjectives"><a href="<?php echo base_url('user/investment-objective'); ?>">Investment Objectives</a></li>
                            <li class="KnowlegdeExperience"><a href="<?php echo base_url('user/knowledge-experience'); ?>">Knowlegde & Experience</a></li>
                            <li class="UnderstandingCommitments"><a href="<?php echo base_url('user/understanding-financial-commitment'); ?>">Understanding Financial Commitments</a></li>
                        </ul>
                    </span>
                  </div>
                  <div class="panel-body">
                    <div class="tab-content">                      
                      <div class="tab-pane active" id="tab2">
                        <div class="page">
                          <div class="list-of-posts">
                            <div class="post">
                              
                              <div class="col-12 col-md-12 finance-statement-heading-text">
                                <h3>Financial Situation Of The Customber</h3>
                              </div>
                              <?php $i=1; foreach($questions as $question) { ?>
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <h4><?php echo $i; ?>. <?php echo $question['question']; ?></span></h4>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="wrapper">
                                    <div class="range-slider">
                                      <input type="text" class="js-range-slider" value="" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- contant-finanecr-addverger End-->
                              <?php 
                             //echo "<pre>"; echo($option->options);
                              $j=1; foreach($question['options'] as $option) {   ?>
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <p><?php echo $i.'.'.$j; ?> <?php echo $option->options; ?></p>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="wrapper">
                                    <div class="range-slider">
                                      <input type="text" class="js-range-slider" value="" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <?php $j++; } ?>
                              <div class="clearfix"></div>
                              <div class="line-hr"></div>
                            <?php $i++; } ?>

                              
                              

                              <!-- contant-finanecr-addverger End-->
                              <div class="clearfix"></div>
                              <div class="line-hr"></div>

                              <div class="col-12 col-md-12 finance-statement-heading-text">
                                <h3>Financial Situation Of The Customber</h3>
                              </div>
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <h4>2. There are many variations of passages of (Lorem Ipsum): the<br><span>(It is a long established fact that a reader will be)</span></h4>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="wrapper">
                                    <div class="range-slider">
                                      <input type="text" class="js-range-slider" value="" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- contant-finanecr-addverger End-->
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <p>2.1 Lorem Ipsum is simply dummy text of the printing</p>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="wrapper">
                                    <div class="range-slider">
                                      <input type="text" class="js-range-slider" value="" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- contant-finanecr-addverger End-->
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <p>2.2 Lorem Ipsum is simply dummy text of the printing</p>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="wrapper">
                                    <div class="range-slider">
                                      <input type="text" class="js-range-slider" value="" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- contant-finanecr-addverger End-->
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <p>2.3 Lorem Ipsum is simply dummy text of the printing</p>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="wrapper">
                                    <div class="range-slider">
                                      <input type="text" class="js-range-slider" value="" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- contant-finanecr-addverger End-->
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <p>2.4 Lorem Ipsum is simply dummy text of the printing</p>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="wrapper">
                                    <div class="range-slider">
                                      <input type="text" class="js-range-slider" value="" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- contant-finanecr-addverger End-->
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <p>2.5 Lorem Ipsum is simply dummy text of the printing</p>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="wrapper">
                                    <div class="range-slider">
                                      <input type="text" class="js-range-slider" value="" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- contant-finanecr-addverger End-->
                            </div>
                            <!-- End Post-->
                            <!-- Post Section Start Here-->
                            <div class="post">
                              <div class="col-12 col-md-12 finance-statement-heading-text">
                                <h3>Financial Situation Of The Customber</h3>
                              </div>
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <h4>3.  Composicion del patrimonlo total
                                    <br><span>(incluya las cantidades por epigrafe)
                                    </span></h4>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="wrapper">
                                    <div class="range-slider">
                                      <input type="text" class="js-range-slider" value="" />
                                    </div>
                                                <!-- <hr>
                                <div class="extra-controls form-inline">
                                  <div class="form-group">
                                    <input type="text" class="js-input-from form-control" value="0" />
                                    <input type="text" class="js-input-to form-control" value="0" />
                                </div>
                                  </div> -->
                                  </div>
                                </div>
                              </div>
                              <!-- contant-finanecr-addverger End-->
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <p>3.1 Lorem Ipsum is simply dummy text of the printing</p>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="wrapper">
                                    <div class="range-slider">
                                      <input type="text" class="js-range-slider" value="" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- contant-finanecr-addverger End-->
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <p>3.2 Lorem Ipsum is simply dummy text of the printing</p>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="wrapper">
                                    <div class="range-slider">
                                      <input type="text" class="js-range-slider" value="" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- contant-finanecr-addverger End-->
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <p>3.3 Lorem Ipsum is simply dummy text of the printing</p>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="wrapper">
                                    <div class="range-slider">
                                      <input type="text" class="js-range-slider" value="" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- contant-finanecr-addverger End-->
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <p>3.4 Lorem Ipsum is simply dummy text of the printing</p>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="wrapper">
                                    <div class="range-slider">
                                      <input type="text" class="js-range-slider" value="" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- contant-finanecr-addverger End-->
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <p>3.5 Lorem Ipsum is simply dummy text of the printing</p>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="wrapper">
                                    <div class="range-slider">
                                      <input type="text" class="js-range-slider" value="" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- contant-finanecr-addverger End-->
                              <div class="clearfix"></div>
                              <div class="line-hr"></div>
                              <div class="col-12 col-md-12 finance-statement-heading-text">
                                <h3>Financial Situation Of The Customber</h3>
                              </div>
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <h4>4. Que porcentaje de su patrimonio financiero representara
                                  el capital asesorado</h4>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="wrapper">
                                    <div class="range-slider">
                                      <input type="text" class="js-range-slider" value="" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- contant-finanecr-addverger End-->
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <p>4.1 Lorem Ipsum is simply dummy text of the printing Ipsum is simply.</p>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="wrapper">
                                    <div class="range-slider">
                                      <input type="text" class="js-range-slider" value="" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- contant-finanecr-addverger End-->
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <p>4.2 Lorem Ipsum is simply dummy text of the printing Ipsum is simply.</p>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="wrapper">
                                    <div class="range-slider">
                                      <input type="text" class="js-range-slider" value="" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- contant-finanecr-addverger End-->
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <p>4.3 Lorem Ipsum is simply dummy text of the printing Ipsum is simply.</p>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="wrapper">
                                    <div class="range-slider">
                                      <input type="text" class="js-range-slider" value="" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- contant-finanecr-addverger End-->
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <p>4.4 Lorem Ipsum is simply dummy text of the printing Ipsum is simply.</p>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="wrapper">
                                    <div class="range-slider">
                                      <input type="text" class="js-range-slider" value="" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- contant-finanecr-addverger End-->
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <p>4.5 Lorem Ipsum is simply dummy text of the printing Ipsum is simply.</p>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="wrapper">
                                    <div class="range-slider">
                                      <input type="text" class="js-range-slider" value="" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- contant-finanecr-addverger End-->
                            </div>
                            <!-- End Post-->
                            <!-- Post Section Start Here-->
                            <div class="post">
                              <div class="col-12 col-md-12 finance-statement-heading-text">
                                <h3>Financial Situation Of The Customber</h3>
                              </div>
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <h4>1. Fuente de ingress perlodicos (base anual desde eata fecha):
                                    <br><span>(distribuir 100% en los epigrafes de abajo) 
                                    </span></h4>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="wrapper">
                                    <div class="range-slider">
                                      <input type="text" class="js-range-slider" value="" />
                                    </div>
                                    <!-- <hr>
                    <div class="extra-controls form-inline">
                      <div class="form-group">
                        <input type="text" class="js-input-from form-control" value="0" />
                        <input type="text" class="js-input-to form-control" value="0" />
                    </div>
                      </div> -->
                                  </div>
                                </div>
                              </div>
                              <!-- contant-finanecr-addverger End-->
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <p>1.1. Actividad laboral</p>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="wrapper">
                                    <div class="range-slider">
                                      <input type="text" class="js-range-slider" value="" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- contant-finanecr-addverger End-->
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <p>1.2 Lorem Ipsum is simply dummy text of the printing</p>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="wrapper">
                                    <div class="range-slider">
                                      <input type="text" class="js-range-slider" value="" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- contant-finanecr-addverger End-->
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <p>1.3 Lorem Ipsum is simply dummy text of the printing</p>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="wrapper">
                                    <div class="range-slider">
                                      <input type="text" class="js-range-slider" value="" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- contant-finanecr-addverger End-->
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <p>1.4 Lorem Ipsum is simply dummy text of the printing</p>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="wrapper">
                                    <div class="range-slider">
                                      <input type="text" class="js-range-slider" value="" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- contant-finanecr-addverger End-->
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <p>1.5 Lorem Ipsum is simply dummy text of the printing</p>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="wrapper">
                                    <div class="range-slider">
                                      <input type="text" class="js-range-slider" value="" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- contant-finanecr-addverger End-->
                              <div class="clearfix"></div>
                              <div class="line-hr"></div>
                              <div class="col-12 col-md-12 finance-statement-heading-text">
                                <h3>Financial Situation Of The Customber</h3>
                              </div>
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <h4>2.  Origen del capital que desea invertir o eninvertir ahora:<br> <span>(distribuir 100% en los epigrafes de abajo)</span>
                                 </h4>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="wrapper">
                                    <div class="range-slider">
                                      <input type="text" class="js-range-slider" value="" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- contant-finanecr-addverger End-->
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <p>2.1 Lorem Ipsum is simply dummy text of the printing Ipsum is simply.</p>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="wrapper">
                                    <div class="range-slider">
                                      <input type="text" class="js-range-slider" value="" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- contant-finanecr-addverger End-->
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <p>2.2 Lorem Ipsum is simply dummy text of the printing Ipsum is simply.</p>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="wrapper">
                                    <div class="range-slider">
                                      <input type="text" class="js-range-slider" value="" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- contant-finanecr-addverger End-->
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <p>2.3 Lorem Ipsum is simply dummy text of the printing Ipsum is simply.</p>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="wrapper">
                                    <div class="range-slider">
                                      <input type="text" class="js-range-slider" value="" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- contant-finanecr-addverger End-->
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <p>2.4 Lorem Ipsum is simply dummy text of the printing Ipsum is simply.</p>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="wrapper">
                                    <div class="range-slider">
                                      <input type="text" class="js-range-slider" value="" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- contant-finanecr-addverger End-->
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <p>2.5 Lorem Ipsum is simply dummy text of the printing Ipsum is simply.</p>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="wrapper">
                                    <div class="range-slider">
                                      <input type="text" class="js-range-slider" value="" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- contant-finanecr-addverger End-->
                            </div>
                            <!-- End Post-->
                            <!-- Post Section Start Here-->
                            <div class="post">
                              <div class="col-12 col-md-12 finance-statement-heading-text">
                                <h3>Financial Situation Of The Customber</h3>
                              </div>
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <h4>3. Composicion del patrimonio total
                                  <br><span>(incluya las contidades por epigrafe) 
                                  </span></h4>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="wrapper">
                                    <div class="range-slider">
                                      <input type="text" class="js-range-slider" value="" />
                                    </div>
                                    <!-- <hr>
                    <div class="extra-controls form-inline">
                      <div class="form-group">
                        <input type="text" class="js-input-from form-control" value="0" />
                        <input type="text" class="js-input-to form-control" value="0" />
                    </div>
                      </div> -->
                                  </div>
                                </div>
                              </div>
                              <!-- contant-finanecr-addverger End-->
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <p>3.1 Actividad laboral</p>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="wrapper">
                                    <div class="range-slider">
                                      <input type="text" class="js-range-slider" value="" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- contant-finanecr-addverger End-->
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <p>3.2 Lorem Ipsum is simply dummy text of the printing</p>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="wrapper">
                                    <div class="range-slider">
                                      <input type="text" class="js-range-slider" value="" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- contant-finanecr-addverger End-->
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <p>3.3 Lorem Ipsum is simply dummy text of the printing</p>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="wrapper">
                                    <div class="range-slider">
                                      <input type="text" class="js-range-slider" value="" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- contant-finanecr-addverger End-->
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <p>3.4 Lorem Ipsum is simply dummy text of the printing</p>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="wrapper">
                                    <div class="range-slider">
                                      <input type="text" class="js-range-slider" value="" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- contant-finanecr-addverger End-->
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <p>3.5 Lorem Ipsum is simply dummy text of the printing</p>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="wrapper">
                                    <div class="range-slider">
                                      <input type="text" class="js-range-slider" value="" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- contant-finanecr-addverger End-->
                              <div class="clearfix"></div>
                              <div class="line-hr"></div>
                              <div class="col-12 col-md-12 finance-statement-heading-text">
                                <h3>Financial Situation Of The Customber</h3>
                              </div>
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <h4>4.  Origen del capital que desea invertir o eninvertir ahora:<br> <span>(distribuir 100% en los epigrafes de abajo)</span>
                                 </h4>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="wrapper">
                                    <div class="range-slider">
                                      <input type="text" class="js-range-slider" value="" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- contant-finanecr-addverger End-->
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <p>4.1 Lorem Ipsum is simply dummy text of the printing Ipsum is simply.</p>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="wrapper">
                                    <div class="range-slider">
                                      <input type="text" class="js-range-slider" value="" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- contant-finanecr-addverger End-->
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <p>4.2 Lorem Ipsum is simply dummy text of the printing Ipsum is simply.</p>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="wrapper">
                                    <div class="range-slider">
                                      <input type="text" class="js-range-slider" value="" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- contant-finanecr-addverger End-->
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <p>4.3 Lorem Ipsum is simply dummy text of the printing Ipsum is simply.</p>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="wrapper">
                                    <div class="range-slider">
                                      <input type="text" class="js-range-slider" value="" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- contant-finanecr-addverger End-->
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <p>4.4 Lorem Ipsum is simply dummy text of the printing Ipsum is simply.</p>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="wrapper">
                                    <div class="range-slider">
                                      <input type="text" class="js-range-slider" value="" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- contant-finanecr-addverger End-->
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <p>4.5 Lorem Ipsum is simply dummy text of the printing Ipsum is simply.</p>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="wrapper">
                                    <div class="range-slider">
                                      <input type="text" class="js-range-slider" value="" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- contant-finanecr-addverger End-->
                              <div class="clearfix"></div>
                              <div class="line-hr"></div>
                              <div class="col-12 col-md-12 finance-statement-heading-text">
                                <h3>Financial Situation Of The Customber</h3>
                              </div>
                              <div class="contant-finanecr-addverger">
                                <div class="col-md-8 col-sm-8">
                                  <h4>4.  Origen del capital que desea invertir o eninvertir ahora:<br> <span>Esta Cantidad no debe superar el valor total del patrimonio 
                                    Indlque el valor total del partimonio en caso de superar
                                    dicho valor</span>
                                  </h4>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                  <div class="wrapper">
                                    <div class="range-slider">
                                      <input type="text" class="js-range-slider" value="" />
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- contant-finanecr-addverger End-->
                              <div class="col-md-12 col-sm-12 finish-btn">
                                <input type="submit" name="" value="Finish">
                              </div>
                            </div>
                            <!-- End Post-->
                            <div class="post">
                              <h3>Awesome Post 6</h3>
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer varius semper purus. Quisque dapibus mattis nulla, eu venenatis dolor scelerisque in. Vivamus maximus nulla ac.</p>
                            </div>
                            <div class="post">
                              <h3>Awesome Post 7</h3>
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer varius semper purus. Quisque dapibus mattis nulla, eu venenatis dolor scelerisque in. Vivamus maximus nulla ac.</p>
                            </div>
                            <div class="post">
                              <h3>Awesome Post 8</h3>
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer varius semper purus. Quisque dapibus mattis nulla, eu venenatis dolor scelerisque in. Vivamus maximus nulla ac.</p>
                            </div>
                          </div>
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
    <div class="container">
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
</div>
<style type="text/css">
  h2 {
  margin-bottom:0;
}
h3 {
  margin:0 0 30px;
} 
.ui-slider-range {
   background:green;
}
.percent {
  color:green;
  font-weight:bold;
  text-align:center;
  width:100%;
  border:none;
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
        if (percent < 30) {
          $projectPercent.css({
            'color': 'red'
          });
          $projectRange.css({
            'background': '#f20000'
          });
        } else if (percent > 31 && percent < 70) {
          $projectPercent.css({
            'color': 'gold'
          });
          $projectRange.css({
            'background': 'gold'
          });
        } else if (percent > 70) {
          $projectPercent.css({
            'color': 'green'
          });
          $projectRange.css({
            'background': 'green'
          });
        }
      }
    });
  })
})
  </script>
  <script>
    /*jQuery(function() {
        jQuery( "#slider_single" ).flatslider({
          min: 10000, max: 500000,
          step: 1000,
          value: 150000,
          range: "min",
          einheit: '&euro;'
        });
      });*/
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