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
  <link href="<?php echo base_url('assets/users'); ?>/css/dashbord.css" rel="stylesheet">
  <!-- Font Awesome core CSS -->
  <link href="<?php echo base_url('assets/users'); ?>/css/font-awesome.min.css" rel="stylesheet">
  <!-- Rang Slider core CSS -->
  <link href="<?php echo base_url('assets/users'); ?>/css/main.min.css" rel="stylesheet">
  <!-- Textpager Css -->
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
    
.perstange-prt-text span {
    float: right;
}

.perstange-prt-text {
    
    color: #000000;
    font-size: 14px;
    font-weight: 500;
    text-transform: capitalize;
}

.perstange-prt-text h2 {
    font-size: 16px;
    text-transform: uppercase;
}

.perstange-prt-text h3 {
    font-size: 14px;
    margin-bottom: 0px;
    line-height: 2px;
}

.perstange-prt-text h5 {
    color: #000000;
    font-size: 14px;
    font-weight: 400;
    text-transform: capitalize;
    margin-top: 32px;
    margin-bottom: 5px;
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

h2.edu-tit {
   font-size: 28px;
    text-align: left;
    margin: 26px 0px 19px 0px;
    font-weight: 400;
}
hr.line-20 {
    margin-bottom: 31px;
}

button.add-education-btn {
    background-color: #073850;
    border: none;
    padding: 8px 14px;
    color: #fff;
    font-weight: 200;
    font-size: 20px;
    margin: 25px 0px 20px -13px;
    transition: all 0.5s ease;
}

button.add-education-btn:hover {
    background-color: #f6bb19;
}

.remove-education-btn {
  background-color: #073850;
    border: none;
    padding: 8px 14px;
    color: #fff;
    font-weight: 200;
    font-size: 20px;
    margin: 0px 0px 20px -13px;
    transition: all 0.5s ease;
}
button.persnal-info-form-make label {
    color: #08384f;
    font-weight: 600;
    font-size: 13px;
    margin-bottom: 11px;
}

.persnal-info-form-make select {
  padding-left: 2px;
    
}

.p-01 {
    padding: 0px 3px 0px 3px;
}


</style>

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
                        <div class="bradcrum-list">
                            <ul>
                                <li>My Profile</li>                            
                            </ul>
                        </div>
                    </div>
            <div class="col-md-12">
              <div class="box-contant-boxe-question">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <!-- <h3 class="panel-title">Panel title</h3> --> <span class="">
                        <!-- Tabs -->
                         <ul class="nav panel-tabs">
                            <li><a href="<?php echo base_url('users/profile'); ?>">Personal Info</a></li>
                            <li ><a href="<?php echo base_url('users/advisor/change_password'); ?>">Change Password</a></li>
                            <li class="active"><a href="<?php echo base_url('users/advisor/advisor_profile_details'); ?>">Work Experience</a></li>
                            <li><a href="<?php echo base_url('users/advisor/advisor_about_details'); ?>">About</a></li>
                            <li><a href="<?php echo base_url('users/advisor/advisor_referral_code'); ?>">Referral Code</a></li>
                            <li><a href="<?php echo base_url('users/advisor/settings'); ?>">Appointment Settings</a></li>
                             <li><a href="<?php echo base_url('users/advisor/extra_settings'); ?>">Settings</a></li>
                        </ul>
                    </span>
                  </div>
                  <div class="panel-body">
                    <?php 
                        $months = array('January','February', 'March','April','May','June','July','August', 'September','October','November','December');

                       ?>
                    <div class="tab-content">
                      <div class="tab-pane active" id="tab1">
                        <div class="col-md-12 col-sm-12 persnal-info-form-make">
                        <?php
                              if($this->session->flashdata('success')){
                           ?>
                          <div class="alert alert-success text-center successAlertDiv">
                            <?php echo $this->session->flashdata('success'); ?>
                          </div>
                      <?php } ?>
                        <div class="center-profile-box">
                            

                            <form method="post" action="" enctype="multipart/form-data">
                             <div class="input_fields_container_experience">
                              <?php if(count($experiences)>0) { $cd=1; foreach($experiences as $experience) { if($cd==1){ ?>
                             <div class="col-md-12 col-sm-12 p-01">
                              <input type="hidden" name="experience_id[]" value="<?php echo $experience->id; ?>">
                                <label>Company Name</label>
                                <div class="form-group">
                                  <input type="text" name="companyname[]" value="<?php echo $experience->companyName; ?>" required placeholder="Company Name" class="form-control">
                                </div>
                              </div>
                              <div class="col-md-3 col-sm-3 p-01">
                                <label>Start Month Year</label>
                                <div class="form-group">
                                  <select name="startmonth[]" onchange="ValidateEndDate('<?php echo $cd; ?>','startmonth<?php echo $cd; ?>');" required="" class="form-control" id="startmonth<?php echo $cd; ?>">
                                    <option value="">Select Month </option> 
                                    <?php foreach($months as $month){ ?>  
                                    <option value="<?php echo $month; ?>" <?php if($experience->startMonth==$month) { echo 'selected'; } ?> ><?php echo $month; ?></option>
                                    <?php } ?>                            
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-3 col-sm-3  p-01">
                                <label style="color: #fff;">Start Month Years</label>
                                <div class="form-group">
                                  <select name="startyear[]" required="" onchange="ValidateEndDate('<?php echo $cd; ?>','startyear<?php echo $cd; ?>');" class="form-control" id="startyear<?php echo $cd; ?>">
                                    <option value="">Select Year</option>
                                    <?php 
                                      for($i=1900;$i<=date('Y');$i++)
                                      {
                                    ?>
                                    <option value="<?php echo $i; ?>" <?php if($experience->startYear==$i) { echo 'selected'; } ?>><?php echo $i; ?></option>
                                  <?php } ?>
                                 </select>
                                </div>
                              </div>
                              <div class="col-md-3 col-sm-3  p-01">
                                <label>End Month Year</label>
                                <div class="form-group">
                                  <select name="endmonth[]" onchange="ValidateEndDate('<?php echo $cd; ?>','endmonth<?php echo $cd; ?>');" required="" class="form-control" id="endmonth<?php echo $cd; ?>">
                                    <option value="">Select Month</option>
                                    <?php foreach($months as $month){ ?>  
                                    <option value="<?php echo $month; ?>" <?php if($experience->endMonth==$month) { echo 'selected'; } ?>><?php echo $month; ?></option>
                                    <?php } ?> 
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2 col-sm-2  p-01">
                                <label style="color: #fff;">Start </label>
                                <div class="form-group">
                                  <select name="endyear[]" required="" onchange="ValidateEndDate('<?php echo $cd; ?>','endyear<?php echo $cd; ?>');" class="form-control" id="endyear<?php echo $cd; ?>">
                                    <option value="">Select Year</option>
                                    <?php 
                                      for($i=1900;$i<=date('Y');$i++)
                                      {
                                    ?>
                                    <option value="<?php echo $i; ?>" <?php if($experience->endYear==$i) { echo 'selected'; } ?>><?php echo $i; ?></option>
                                  <?php } ?>
                                  </select>
                                </div>
                              </div>
                             <div class="col-md-1 col-sm-1">                               
                             <button type="button" class="add-education-btn add_more_button_experience"><i class="fa fa-plus" aria-hidden="true"></i></button>
                             </div>

                            <?php } else { ?>
                              <div id="experience<?php echo $experience->id.$cd; ?>">
                              <div class="col-md-12 col-sm-12 p-01">
                                <input type="hidden" name="experience_id[]" value="<?php echo $experience->id; ?>">
                                <div class="form-group">
                                  <input type="text" name="companyname[]" value="<?php echo $experience->companyName; ?>" required placeholder="Company Name" class="form-control">
                                </div>
                              </div>
                              <div class="col-md-3 col-sm-3 p-01">
                                <div class="form-group">
                                  <select name="startmonth[]" onchange="ValidateEndDate('<?php echo $cd; ?>','startmonth<?php echo $cd; ?>');" required="" class="form-control" id="startmonth<?php echo $cd; ?>">
                                    <option value="">Select Month </option> 
                                    <?php foreach($months as $month){ ?>  
                                    <option value="<?php echo $month; ?>" <?php if($experience->startMonth==$month) { echo 'selected'; } ?> ><?php echo $month; ?></option>
                                    <?php } ?>                            
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-3 col-sm-3 p-01">
                                <div class="form-group">
                                  <select name="startyear[]" onchange="ValidateEndDate('<?php echo $cd; ?>','startyear<?php echo $cd; ?>');" required="" class="form-control" id="startyear<?php echo $cd; ?>">
                                    <option value="">Select Year</option>
                                    <?php 
                                      for($i=1900;$i<=date('Y');$i++)
                                      {
                                    ?>
                                    <option value="<?php echo $i; ?>" <?php if($experience->startYear==$i) { echo 'selected'; } ?>><?php echo $i; ?></option>
                                  <?php } ?>
                                 </select>
                                </div>
                              </div>
                              <div class="col-md-3 col-sm-3 p-01">
                                <div class="form-group">
                                  <select name="endmonth[]" onchange="ValidateEndDate('<?php echo $cd; ?>','endmonth<?php echo $cd; ?>');" required="" class="form-control" id="endmonth<?php echo $cd; ?>">
                                    <option value="">Select Month</option>
                                    <?php foreach($months as $month){ ?>  
                                    <option value="<?php echo $month; ?>" <?php if($experience->endMonth==$month) { echo 'selected'; } ?>><?php echo $month; ?></option>
                                    <?php } ?> 
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2 col-sm-2 p-01">
                                <div class="form-group">
                                  <select name="endyear[]" onchange="ValidateEndDate('<?php echo $cd; ?>','endyear<?php echo $cd; ?>');" required="" class="form-control" id="endyear<?php echo $cd; ?>">
                                    <option value="">Select Year</option>
                                    <?php 
                                      for($i=1900;$i<=date('Y');$i++)
                                      {
                                    ?>
                                    <option value="<?php echo $i; ?>" <?php if($experience->endYear==$i) { echo 'selected'; } ?>><?php echo $i; ?></option>
                                  <?php } ?>
                                  </select>
                                </div>
                              </div>
                             <div class="col-md-1 col-sm-1">
                              <button data-id="<?php echo $experience->id; ?>" id="experience<?php echo $experience->id.$cd; ?>" type="button" class="remove-education-btn remove_field_experience"><i class="fa fa-minus" aria-hidden="true"></i></button>
                            </div>
                            </div>
                            <?php } ?>
                            
                             <?php $cd++; } } else {?>
                              <div class="col-md-12 col-sm-12 p-01">
                                <label>Company Name</label>
                                <div class="form-group">
                                  <input type="text" name="companyname[]" value="" required placeholder="Company Name" class="form-control">
                                </div>
                              </div>
                              <div class="col-md-3 col-sm-3 p-01">
                                <label>Start Month Year</label>
                                <div class="form-group">
                                  <select name="startmonth[]" onchange="ValidateEndDate('1','startmonth1');" required="" class="form-control" id="startmonth1">
                                    <option value="">Select Month </option> 
                                    <?php foreach($months as $month){ ?>  
                                    <option value="<?php echo $month; ?>"><?php echo $month; ?></option>
                                    <?php } ?>                            
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-3 col-sm-3 p-01">
                                <label style="color: #fff;">Start Month Years</label>
                                <div class="form-group">
                                  <select name="startyear[]" onchange="ValidateEndDate('1','startyear1');" required="" class="form-control" id="startyear1">
                                    <option value="">Select Year</option>
                                    <?php 
                                      for($i=1900;$i<=date('Y');$i++)
                                      {
                                    ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                  <?php } ?>
                                 </select>
                                </div>
                              </div>
                              <div class="col-md-3 col-sm-3 p-01">
                                <label>End Month Year</label>
                                <div class="form-group">
                                  <select name="endmonth[]" onchange="ValidateEndDate('1','endmonth1');" required="" class="form-control" id="endmonth1">
                                    <option value="">Select Month</option>
                                    <?php foreach($months as $month){ ?>  
                                    <option value="<?php echo $month; ?>"><?php echo $month; ?></option>
                                    <?php } ?> 
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-2 col-sm-2 p-01">
                                <label style="color: #fff;">Start </label>
                                <div class="form-group">
                                  <select name="endyear[]" onchange="ValidateEndDate('1','endyear1');" required="" class="form-control" id="endyear1">
                                    <option value="">Select Year</option>
                                    <?php 
                                      for($i=1900;$i<=date('Y');$i++)
                                      {
                                    ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                  <?php } ?>
                                  </select>
                                </div>
                              </div>
                             <div class="col-md-1 col-sm-1">                               
                                <button class="add-education-btn add_more_button_experience"><i class="fa fa-plus" aria-hidden="true"></i></button>
                             </div>
                             <?php } ?>
                             </div>

                             <div class="clearfix"></div>
                              <div class="col-md-12 col-sm-12 finish-btn" style="margin-top: 0px;">
                                <input type="submit" name="" value="Save">
                              </div>
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
    <script src="<?php echo base_url('assets/users'); ?>/js/common.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
  $(document).ready(function() {
    var max_fields_limit      = 1000; //set limit for maximum input fields
    var x = 1; //initialize counter for text box
    $('.add_more_button_skill').click(function(e){ //click event on add more fields button having class add_more_button
        e.preventDefault();
        if(x < max_fields_limit){ //check conditions
            x++; //counter increment
            $('.input_fields_container_skills').append('<div id="skils'+x+'"><div class="col-md-11 col-sm-11"><div class="form-group"><input type="text" name="skill[]" value="" required placeholder="Skill" class="form-control"></div></div><div class="col-md-1 col-sm-1"><button id="skils'+x+'" type="button" class="remove-education-btn remove_field_skill"><i class="fa fa-minus" aria-hidden="true"></i></button></div></div>'); //add input field
        }
    });  
    $('.input_fields_container_skills').on("click",".remove_field_skill", function(e){ //user click on remove text links
        e.preventDefault(); 
        var button_id = $(this).attr("id"); 
        var slil_id = $(this).attr('data-id');
        $.ajax({
              type:'POST',
              url:'<?php echo base_url('users/advisor/delete_advisor_skills'); ?>',
              data:{slil_id:slil_id},
              success:function(data)
              {
              }
        });
        //$('.a'+x).remove(); x--;
        $('#'+button_id).remove(); 
    })
});
</script>

<script type="text/javascript">
  $(document).ready(function() {
    var max_fields_limit      = 1000; //set limit for maximum input fields
    var x = 1; //initialize counter for text box
    $('.add_more_button_educations').click(function(e){ //click event on add more fields button having class add_more_button
        e.preventDefault();
        if(x < max_fields_limit){ //check conditions
            x++; //counter increment
            $('.input_fields_container_educations').append('<div id="educations'+x+'"><div class="col-md-12 col-sm-12"><div class="form-group"><input type="text" name="college_university[]" value="" required placeholder="College/university" class="form-control"></div> </div><div class="col-md-6 col-sm-6"><div class="form-group"> <input type="text" name="degree[]" value="" required placeholder="Degree" class="form-control"></div></div><div class="col-md-5 col-sm-5"><div class="form-group"><select name="passingyear[]" required="" class="form-control"><option value="">Select Passing Year</option><?php for($i=1900;$i<=date('Y');$i++) { ?> <option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?></select> </div></div><div class="col-md-1 col-sm-1"><button id="educations'+x+'" type="button" class="remove-education-btn remove_field_education"><i class="fa fa-minus" aria-hidden="true"></i></button></div></div>'); //add input field
        }
    });  
    $('.input_fields_container_educations').on("click",".remove_field_education", function(e){ //user click on remove text links
        e.preventDefault(); 
        var button_id = $(this).attr("id"); 
        var education_id = $(this).attr('data-id');
        $.ajax({
              type:'POST',
              url:'<?php echo base_url('users/advisor/delete_advisor_education'); ?>',
              data:{education_id:education_id},
              success:function(data)
              {
              }
        });
         $('#'+button_id).remove(); 
    })
});
</script>


<script type="text/javascript">
  $(document).ready(function() {
    setTimeout(function(){ $(".successAlertDiv").fadeOut(3000); }, 3000);    
    var max_fields_limit      = 1000; //set limit for maximum input fields
    var x = 50; //initialize counter for text box
    $('.add_more_button_experience').click(function(e){ //click event on add more fields button having class add_more_button
        e.preventDefault();
        if(x < max_fields_limit){ //check conditions
            x++; //counter increment
            $('.input_fields_container_experience').append('<div id="experience'+x+'"><div class="col-md-12 col-sm-12 p-01"><div class="form-group"><input type="text" name="companyname[]" value="" required placeholder="Company Name" class="form-control"></div></div><div class="col-md-3 col-sm-3 p-01"><div class="form-group"><select name="startmonth[]" onchange="ValidateEndDate(`'+x+'`,`'+"startmonth"+x+'`)" id="startmonth'+x+'"  required="" class="form-control"><option value="">Select Month </option><?php foreach($months as $month){ ?>  <option value="<?php echo $month; ?>"><?php echo $month; ?></option> <?php } ?></select></div></div> <div class="col-md-3 col-sm-3 p-01"><div class="form-group"><select name="startyear[]" onchange="ValidateEndDate(`'+x+'`,`'+"startyear"+x+'`)" id="startyear'+x+'" required="" class="form-control"><option value="">Select Year</option><?php  for($i=1900;$i<=date('Y');$i++) { ?> <option value="<?php echo $i; ?>"><?php echo $i; ?></option><?php } ?></select></div> </div><div class="col-md-3 col-sm-3 p-01"> <div class="form-group"><select name="endmonth[]" onchange="ValidateEndDate(`'+x+'`,`'+"endmonth"+x+'`)" id="endmonth'+x+'" required="" class="form-control"> <option value="">Select Month</option><?php foreach($months as $month){ ?>  <option value="<?php echo $month; ?>"><?php echo $month; ?></option> <?php } ?> </select> </div> </div> <div class="col-md-2 col-sm-2 p-01"><div class="form-group"> <select name="endyear[]" onchange="ValidateEndDate(`'+x+'`,`'+"endyear"+x+'`)" id="endyear'+x+'" required="" class="form-control"><option value="">Select Year</option><?php for($i=1900;$i<=date('Y');$i++) { ?> <option value="<?php echo $i; ?>"><?php echo $i; ?></option> <?php } ?> </select> </div></div><div class="col-md-1 col-sm-1"><button id="experience'+x+'" type="button" class="remove-education-btn remove_field_experience"><i class="fa fa-minus" aria-hidden="true"></i></button></div></div>'); //add input field
        }
    });  
    $('.input_fields_container_experience').on("click",".remove_field_experience", function(e){ //user click on remove text links
        e.preventDefault(); 
        var button_id = $(this).attr("id"); 
        var exp_id = $(this).attr('data-id');
        $.ajax({
              type:'POST',
              url:'<?php echo base_url('users/advisor/delete_advisor_exp_ajax'); ?>',
              data:{exp_id:exp_id},
              success:function(data)
              {
              }
        });
        $('#'+button_id).remove(); 
    })
});
</script>
  
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
     function ValidateEndDate(id,clas) 
      {
       // var currentDate = new Date();

        var startmonth = document.getElementById('startmonth'+id).value;
        var startyear = document.getElementById('startyear'+id).value;

        var startNewDate = new Date(startmonth+'/'+startyear);

        var endmonth = document.getElementById('endmonth'+id).value;
        var endyear = document.getElementById('endyear'+id).value;

        var endNewDate = new Date(endmonth+'/'+endyear);
        if(startmonth!='' && startyear!='' && endmonth!='' && endyear!='' && startNewDate>endNewDate)
        {
          document.getElementById(clas).value = "";
          //alert("Please ensure that the End Month Year is greater than or equal to the Start Month Year.");
          sweetAlert('error','Oops...','Please ensure that the End Month Year is greater than or equal to the Start Month Year.');
          return false;
        }
     }
  </script>
</body>

</html>