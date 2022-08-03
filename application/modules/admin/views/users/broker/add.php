<?php $this->load->view('includes/header'); ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style type="text/css">
  .errorClass{
    color: red;
    font-size: 16px;
    text-align: center;
    display: none;
  }
</style>
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
<div class="page-breadcrumb">
	<div class="row">
	    <div class="col-12 d-flex no-block align-items-center">
	        <h4 class="page-title">Add Broker</h4>
	        <div class="ml-auto text-right">
	            <nav aria-label="breadcrumb">
	                <ol class="breadcrumb">
	                    <li class="breadcrumb-item"><a href="#">Home</a></li>
	                    <li class="breadcrumb-item active" aria-current="page">Broker</li>
	                </ol>
	            </nav>
	        </div>
	    </div>
	</div>
</div>
<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <form method="post" action="<?php echo base_url('admin/broker/add_broker'); ?>" onsubmit="return validateForm()" enctype="multipart/form-data">
                <div class="row">
                  
                    <div class="col-md-6">
                        <div class="card">
                        <div class="card-body">
                          <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="first_name" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" name="phoneNumber" id="phoneNumber" onkeypress="return keypresssphone(this,event)" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label>Date Of Birth</label>
                            <input type="text" readonly name="dob" class="form-control date_of_birth" id="datepicker" required>
                          </div>
                          <div class="form-group">
                            <label>Country</label>
                            <select name="country" class="form-control" required>
                                <option value="">--Select--</option>
                                <?php foreach($countries as $country){ ?>
                                  <option value="<?php echo $country->id; ?>"><?php echo $country->name; ?></option>
                                <?php } ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Experience Year</label>
                            <input type="text" name="expYears" onkeypress="return keypresssphone(this,event)" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label>Terms & Conditions </label>
                            <textarea class="form-control" rows="5" name="terms_conditions" required></textarea>
                          </div>
                          <div class="form-group">
                            <label>Broker Logo</label>
                            <input type="file" name="logo" class="form-control" id="logo" required>
                            <span class="errorClass logoErrorMsg"></span>
                          </div>

                          <div class="border-top">
                              <div class="card-body">
                                  <input  type="submit" value="Submit" class="btn btn-primary">
                              </div>
                          </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                  <div class="card-body">
                    
                    <div class="input_fields_container">
                      <label>Documents</label>
                      <div class="form-group"><input  style="width: 87%;" type="text" name="document[]" required>
                           <button class="btn btn-sm btn-primary add_more_button">Add</button>
                      </div>
                    </div>

                     <div class="input_fields_container_services">
                      <label>Services</label>
                      <div class="form-group"><input  style="width: 87%;" type="text" name="service[]" required>
                           <button class="btn btn-sm btn-primary add_more_button_service">Add</button>
                      </div>
                    </div>
                </div>
              </div>
            </div>   
                            
          </div>
          </form> 
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>

<?php $this->load->view('includes/footer'); ?>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
  $(document).ready(function() {
    var max_fields_limit      = 10; //set limit for maximum input fields
    var x = 1; //initialize counter for text box
    $('.add_more_button').click(function(e){ //click event on add more fields button having class add_more_button
        e.preventDefault();
        if(x < max_fields_limit){ //check conditions
            x++; //counter increment
            $('.input_fields_container').append('<div class="form-group"><input type="text" style="width: 87%;" name="document[]"/><a href="#" class="remove_field" style="margin-left:10px;">Remove</a></div>'); //add input field
        }
    });  
    $('.input_fields_container').on("click",".remove_field", function(e){ //user click on remove text links
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});

</script>

<script type="text/javascript">
  $(document).ready(function() {
    var max_fields_limit      = 10; //set limit for maximum input fields
    var x = 1; //initialize counter for text box
    $('.add_more_button_service').click(function(e){ //click event on add more fields button having class add_more_button
        e.preventDefault();
        if(x < max_fields_limit){ //check conditions
            x++; //counter increment
            $('.input_fields_container_services').append('<div class="form-group"><input type="text" style="width: 87%;" name="service[]"/><a href="#" class="remove_field_service" style="margin-left:10px;">Remove</a></div>'); //add input field
        }
    });  
    $('.input_fields_container_services').on("click",".remove_field_service", function(e){ //user click on remove text links
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});

</script>

<script type="text/javascript">
$(function() {
    $( "#datepicker" ).datepicker({
        dateFormat : 'mm/dd/yy',
        changeMonth : true,
        changeYear : true,
        yearRange: '-100y:c+nn',
        defaultdate:'01-01-1990',
        maxDate: new Date(),
    });
});

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
   function keypresssphone(th,e)
  {
    var str=$(th).val();    
    if(str.length<10&&e.charCode>=48&&e.charCode<=57)
    {
      return true;
    }
    else
    {
      return false;
    }
  }
  $(document).ready(function(){
     
  });
 function validateForm()
    {
     // var logo = $('#logo').val();
     var phoneNumber = $('#phoneNumber').val();
      var ext = $('#logo').val().split('.').pop().toLowerCase();
      //alert(ext);
      if(phoneNumber.length<10)
      {
        sweetAlert('error','Oops...','Please enter 10 digit mobile number');
        return false;
      }
      if ($.inArray(ext, ['gif','png','jpg','jpeg']) == -1)
      {
        //alert("Please upload gif,png,jpg or jpeg image");
        sweetAlert('error','Oops...','Please upload gif,png,jpg or jpeg image only');
        $('#logo').val('');
        return false;
      }
    }

 </script>