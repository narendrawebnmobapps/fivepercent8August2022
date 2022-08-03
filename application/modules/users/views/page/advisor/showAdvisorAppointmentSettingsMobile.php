<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url('assets/users'); ?>/images/favicons.png" type="images/x-icon" />
  <title>Appointment Settings</title>
  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url('assets/users'); ?>/css/bootstrap.min.css" rel="stylesheet">
  <!-- Style CSS -->
  <link href="<?php echo base_url('assets/users'); ?>/css/main-custom.css" rel="stylesheet">
  <link href="<?php echo base_url('assets/users'); ?>/css/dashbord.css" rel="stylesheet">
  <!-- Font Awesome core CSS -->
  <link href="<?php echo base_url('assets/users'); ?>/css/font-awesome.min.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url('assets/miscellaneous'); ?>/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
  <link href="<?php echo base_url('assets/miscellaneous'); ?>/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/miscellaneous'); ?>/css/prettify.css">
    <script type="text/javascript" src="<?php echo base_url('assets/miscellaneous'); ?>/js/prettify.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/miscellaneous'); ?>/js/lang-css.js"></script>
  <!-- Rang Slider core CSS -->
  <link href="<?php echo base_url('assets/users'); ?>/css/main.min.css" rel="stylesheet">
  <!-- Textpager Css -->
  <link href="<?php echo base_url('assets/users'); ?>/css/pag.css" rel="stylesheet">
</head>
<body>
<style type="text/css">

.box-contant-boxe-question {
    background-color: #ffffff;
    
    webkit-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.75);
    -moz-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.75);
    box-shadow: 0px 0px 5px 0px rgb(183, 181, 181);
    
}
</style>


<style type="text/css">
.errinputcls 
    {
        float: left;
        top: -19px;
        position: relative;
        color: red;
        font-size: 14px;
    }

    .file {
  visibility: hidden;
  position: absolute;
}

.form-bg-prt-sec .btn-primary {
    color: #fff;
    background-color: #007bff;
    /* border-color: #007bff; */
    border-radius: 0px;
    background-color: #073850;
    padding: 11px 17px;
    font-size: 16px;
        border: none;
    outline: none;
}

 .form-bg-prt-sec .btn-primary:focus {
    box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0);
}
       

.form-bg-prt-sec input.form-control.input-lg {
    margin-bottom: 9px;
} 

.edit-profile-area button.btn.btn-primary {
    background-color: #08384f;
    color: #fff;
    font-size: 18px;
    outline: none;
    box-shadow: none;
    border-color: #08384f;
    border-radius: 0px;
    margin-top: -34px;
}

.sehedule-spci h2 {
    text-align: right;
    margin-bottom: 29px;
    margin-top: 0px;
}

.sehedule-spci h2 a {
  background-color: #073850;
  color: #fff;
  font-size: 18px;
  font-weight: 300;
  padding: 8px 24px;
}

.sehedule-spci h2 a:hover {
background-color: #f6bb19;
text-decoration: none;
outline: none;
}

.sehedule-spci h2 a:focus{
  background-color: #f6bb19;
text-decoration: none;
outline: none;
}


.box-clander-info {
    background-color: #fff;
    border: 1px solid #ccc;
    padding: 15px;
    -webkit-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.75);
    -moz-box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.75);
    box-shadow: -2px 6px 7px -6px rgb(10, 10, 10);
    float: left;
    display: inline-block;
    width: 100%;
}

/*.ui-datepicker-group {
  float: left;
  width: 30.3%;
  margin-right: 29px;
}

.heading-content-informations ul li {
  font-size: 16px;
  margin-bottom: 15px;
  margin-left: 16px;
}


.heading-content-informations ul {
  padding: 0px;
}



table.ui-datepicker-calendar {
margin-bottom: 29px;
}

.ui-datepicker table thead {
    padding: 0 10px;
    background-color: #f3f4f5;
}

.ui-datepicker td a {
    color: #737880;
    display: block;
    font-weight: 500;
    text-decoration: none;
}

.ui-datepicker .ui-datepicker-prev span, .ui-datepicker .ui-datepicker-next span {
    display: block;
    position: absolute;
    left: 50%;
    margin-left: -4px;
    font-family: FontAwesome;
}*/



.ui-datepicker-inline {
    width: 100% !important;
}


/* Datepicker */
.ui-datepicker {
  width: 17em;
  display: none;
}

.ui-datepicker .ui-datepicker-header {
  position: relative;
  padding: 26px 0;
}

.ui-datepicker .ui-datepicker-prev,
.ui-datepicker .ui-datepicker-next {
  position: absolute;
  top: 15px;
  width: 1.8em;
  height: 1.8em;
  line-height: 1.8em;
  cursor: pointer;
  color: #102035;
}

.ui-datepicker .ui-datepicker-prev:hover,
.ui-datepicker .ui-datepicker-next:hover {
  opacity: 0.5;
}

.ui-datepicker .ui-datepicker-prev {
  left: 10px;
}

.ui-datepicker .ui-datepicker-next {
  right: 10px;
}

.ui-datepicker .ui-datepicker-prev span,
.ui-datepicker .ui-datepicker-next span {
  display: block;
    position: absolute;
    left: -6%;
    margin-left: -6px;
    font-family: FontAwesome;
}

.ui-datepicker .ui-datepicker-prev span:before,
.ui-datepicker .ui-datepicker-next span:before {
  content: "\f104";
}

.ui-datepicker .ui-datepicker-next span:before {
  content: "\f105";
}

.ui-datepicker .ui-datepicker-title {
  text-transform: uppercase;
  font-weight: 900;
  text-align: center;
}

.ui-datepicker .ui-datepicker-title select {
  font-size: 1em;
  margin: 1px 0;
}

.ui-datepicker select.ui-datepicker-month,
.ui-datepicker select.ui-datepicker-year {
  width: 45%;
}

.ui-datepicker table {
  width: 100%;
  font-size: .9em;
  border-collapse: collapse;
  margin: 0 0 .4em;
}

.ui-datepicker table thead {
  padding: 0 10px;
  background-color: #f3f4f5;
}

.ui-datepicker table tr:first-child td {
  padding-top: 15px;
}

.ui-datepicker table tr:last-child td {
  padding-bottom: 15px;
}

.ui-datepicker th {
  padding: .7em .3em;
  text-align: center;
  font-weight: bold;
  border: 0;
}

.ui-datepicker th:first-child {
  padding-left: 10px;
}

.ui-datepicker th:last-child {
  padding-right: 10px;
}

.ui-datepicker td {
  border: 0;
  padding: 0;
  text-align: center;
}

.ui-datepicker td:first-child {
  padding-left: 10px;
}

.ui-datepicker td:last-child {
  padding-right: 10px;
}

.ui-datepicker td a {
  color: #737880;
  display: block;
  padding: .35em 0;
  font-weight: 400;
  text-decoration: none;
}

.ui-datepicker td a:hover {
  font-weight: 700;
  color: #323232;
}

.ui-datepicker td.ui-datepicker-today a {
  color: #063853;
  font-weight: 700;
}

.ui-datepicker td span {
  display: none;
}

.ui-datepicker .ui-datepicker-buttonpane {
  background-image: none;
  margin: .7em 0 0 0;
  padding: 0 .2em;
  border-left: 0;
  border-right: 0;
  border-bottom: 0;
}

.ui-datepicker .ui-datepicker-buttonpane button {
  float: right;
  margin: .5em .2em .4em;
  cursor: pointer;
  padding: .2em .6em .3em .6em;
  width: auto;
  overflow: visible;
}

.ui-datepicker .ui-datepicker-buttonpane button.ui-datepicker-current {
  float: left;
}

/* with multiple calendars */
.ui-datepicker.ui-datepicker-multi {
  width: auto;
}

.ui-datepicker-multi .ui-datepicker-group {
 /* float: left;*/
}


.ui-datepicker-multi .ui-datepicker-group table {
  width: 95%;
  margin: 0 auto .4em;
}

.ui-datepicker-multi-2 .ui-datepicker-group {
  width: 50%;
}

.ui-datepicker-multi-3 .ui-datepicker-group {
  width: 33.3%;
}

.ui-datepicker-multi-4 .ui-datepicker-group {
  width: 25%;
}

.ui-datepicker-multi .ui-datepicker-group-last .ui-datepicker-header,
.ui-datepicker-multi .ui-datepicker-group-middle .ui-datepicker-header {
  border-left-width: 0;
}

.ui-datepicker-multi .ui-datepicker-buttonpane {
  clear: left;
}

.ui-datepicker-row-break {
  clear: both;
  width: 100%;
  font-size: 0;
}

/* RTL support */
.ui-datepicker-rtl {
  direction: rtl;
}

.ui-datepicker-rtl .ui-datepicker-prev {
  right: 2px;
  left: auto;
}

.ui-datepicker-rtl .ui-datepicker-next {
  left: 2px;
  right: auto;
}

.ui-datepicker-rtl .ui-datepicker-prev:hover {
  right: 1px;
  left: auto;
}

.ui-datepicker-rtl .ui-datepicker-next:hover {
  left: 1px;
  right: auto;
}

.ui-datepicker-rtl .ui-datepicker-buttonpane {
  clear: right;
}

.ui-datepicker-rtl .ui-datepicker-buttonpane button {
  float: left;
}

.ui-datepicker-rtl .ui-datepicker-buttonpane button.ui-datepicker-current,
.ui-datepicker-rtl .ui-datepicker-group {
  float: right;
}

.ui-datepicker-rtl .ui-datepicker-group-last .ui-datepicker-header,
.ui-datepicker-rtl .ui-datepicker-group-middle .ui-datepicker-header {
  border-right-width: 0;
  border-left-width: 1px;
}

.ui-datepicker {
    background-color: #ffffff;
    min-width: 232px;
    color: #737880;
    box-shadow: 0px 0px 5px 0 rgb(0 0 0 / 30%);
    height: 315px;
    overflow: hidden;
    padding: 0 12px;
}

.hasDatepicker {
  cursor: pointer;
}



.ui-state-active, .ui-widget-content .ui-state-active, .ui-widget-header .ui-state-active {
  background: #F8F7F6 url('images/ui-bg_fine-grain_10_f8f7f6_60x60.png') 50% 50% repeat;
}

/* begin: jQuery UI Datepicker moving pixels fix */
table.ui-datepicker-calendar {border-collapse: separate;}
.ui-datepicker-calendar td {border: 1px solid transparent;}
/* end: jQuery UI Datepicker moving pixels fix */

/* begin: jQuery UI Datepicker emphasis on selected dates */
.ui-datepicker .ui-datepicker-calendar .ui-state-highlight a {
  background: #f6bb19;
  color: white;
}
/* end: jQuery UI Datepicker emphasis on selected dates */


/* begin: jQuery UI Datepicker hide datepicker helper */
#ui-datepicker-div {display:none;}
/* end: jQuery UI Datepicker hide datepicker helper */


.appoint-list h2 {
float: left;
}
.heading-content-informations ul {
    padding-left: 16px;
}
#page-wrapper {
    padding: 22px 0px;
}
.container-fluid{
  padding-left: 0;
  padding-right: 0;
}
</style>

        <div id="page-wrapper">
            <div class="container-fluid">
            <div class="col-md-12">
              <div class="box-contant-boxe-question">
                <div class="panel panel-primary">
                  <div class="panel-body">
                    <div class="tab-content">
                      <div class="tab-pane active" id="tab1">
                        <div class="clearfix"></div>
                        <?php 
 
                           $i = 0;
                        foreach($addedlotsdates as $slotsvalue)
                        {
                             $dates = $slotsvalue->dates;
                             $start_time = $slotsvalue->start_time; 
                             $start_time_am_pm = $slotsvalue->start_time_am_pm; 
                             $end_time = $slotsvalue->end_time; 
                             $end_time_am_pm = $slotsvalue->end_time_am_pm; 
                             $dt = new DateTime($dates);
                              $booking_date[] = $dt->format('m/d/Y');
                          
                          $i++;
                        }
                        
                        $getNumOfRow = count($addedlotsdates);
                        if($getNumOfRow > 0)
                        {
                          $fatchedallDate = "'".implode("','",$booking_date)."'";
                          $fatchedallDateVale =  implode(", ", $booking_date);
                        } 
                        else 
                        {
                           $fatchedallDate= date('m/d/Y'); 
                           $fatchedallDateVale =  "";  
                        }
                        //echo $fatchedallDateVale;
                        ?>

                        <div class="heading-content-informations">
                          
                          <ul>
                            
                            <li>Use your mouse to SELECT dates (Green Highlight) when you will be available and use your mouse to UNSELECT dates (No Color Highlight) when you will not be available.
                            </li>
                            <li>If you’re only available during specific days and times please select Schedule Specific Days and Times
                            </li>
                          </ul>


                        </div>

                        <div class=""><!-- box-clander-info -->
                          <div id="withAltField" class="box">
                          <div id="with-altField"></div>
                        </div>
            

                        <form action=""  method="post" id="question" name="question"  />
                          <input type="hidden" name="alldates" id="altField" value="<?php  echo $fatchedallDateVale; ?>">
                          <br/>
                            <span class="error"><?php  echo   form_error('alldates'); ?></span>
                          
                          <br/>
                          <input type="submit" name="submit" class="btn btn-success center-block" onClick="return validateform();" value="Save"/>
                          </form>
                        </div>



                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

            </div>
            <!-- /.container-fluid -->
        <!-- /#page-wrapper -->
    <!-- /#wrapper -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/miscellaneous'); ?>/js/jquery-1.11.1.js"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/miscellaneous'); ?>/js/jquery-ui-1.11.1.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/miscellaneous'); ?>/js/jquery-ui.multidatespicker.js"></script>
    <!-- <script src="<?php echo base_url('assets/backend'); ?>/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script> -->
    <script src="<?php echo base_url('assets/users'); ?>/js/amimation-menu-sidebar.js"></script>
    <script src="<?php echo base_url('assets/users'); ?>/js/common.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        setTimeout(function(){ $(".successAlertDiv").fadeOut(3000); }, 3000);
      })
    </script>


    <script type="text/javascript">
    <!--
      var latestMDPver = $.ui.multiDatesPicker.version;
      var lastMDPupdate = '2014-09-19';
      
      $(function() {
        // Version //
        //$('title').append(' v' + latestMDPver);
        $('.mdp-version').text('v' + latestMDPver);
        $('#mdp-title').attr('title', 'last update: ' + lastMDPupdate);
        
        // Documentation //
        $('i:contains(type)').attr('title', '[Optional] accepted values are: "allowed" [default]; "disabled".');
        $('i:contains(format)').attr('title', '[Optional] accepted values are: "string" [default]; "object".');
        $('#how-to h4').each(function () {
          var a = $(this).closest('li').attr('id');
          $(this).wrap('<'+'a href="#'+a+'"></'+'a>');
        });
        $('#demos .demo').each(function () {
          var id = $(this).find('.box').attr('id') + '-demo';
          $(this).attr('id', id)
            .find('h3').wrapInner('<'+'a href="#'+id+'"></'+'a>');
        });
        
        // Run Demos
        $('.demo .code').each(function() {
          eval($(this).attr('title','NEW: edit this code and test it!').text());
          this.contentEditable = true;
        }).focus(function() {
          if(!$(this).next().hasClass('test'))
            $(this)
              .after('<button class="test">test</button>')
              .next('.test').click(function() {
                $(this).closest('.demo').find('.hasDatepicker').multiDatesPicker('destroy');
                eval($(this).prev().text());
                $(this).remove();
              });
        });
      });
    // -->
    </script>

    <script type="text/javascript">             
            var today = new Date(); 
            var date = new Date();
                        var today = new Date();
            var y = today.getFullYear();            
            $('#with-altField').multiDatesPicker({
              altField: '#altField',
              minDate: 0,
              maxDate: 1365,
              addDates: [<?php echo $fatchedallDate; ?>],
              numberOfMonths: [12,1],
              
            });
            </script>





</body>

</html>