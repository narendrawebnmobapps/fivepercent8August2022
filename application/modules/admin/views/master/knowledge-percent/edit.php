<?php $this->load->view('includes/header'); ?>
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
<div class="page-breadcrumb">
	<div class="row">
	    <div class="col-12 d-flex no-block align-items-center">
	        <h4 class="page-title">Edit knowledge Percent</h4>
	        <div class="ml-auto text-right">
	            <nav aria-label="breadcrumb">
	                <ol class="breadcrumb">
	                    <li class="breadcrumb-item"><a href="#">Home</a></li>
	                    <li class="breadcrumb-item active" aria-current="page">knowledge Percent</li>
	                </ol>
	            </nav>
	        </div>
	    </div>
	</div>
</div>
<div class="container-fluid">
                <form method="post" action="" onsubmit="return validateForm()">
                <div class="row">
                  
                    <div class="col-md-6">
                        <div class="card">
                        <div class="card-body">                       
                        <div class="form-group">
                          <label for="sel1">Start Percent</label>
                          <input type="text" name="startPoint" onkeypress="return keypresssIntegerOnly(this,event)" value="<?php echo $knowledge_percent->start_point; ?>" class="form-control startPercent" required>
                        </div>
                        <div class="form-group">
                          <label for="sel1">End Percent</label>
                          <input type="text" name="endPoint" onkeypress="return keypresssIntegerOnly(this,event)" value="<?php echo $knowledge_percent->end_point; ?>" class="form-control endPercent" required>
                        </div>
                        <div class="form-group">
                          <label for="sel1">Percent Value</label>
                          <input type="text" onkeypress="return keypresssIntegerOnly(this,event)" name="percentValue" value="<?php echo $knowledge_percent->percent_value; ?>" class="form-control percentValue" required>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
                            
          </div>
          </form> 

        </div>

<?php $this->load->view('includes/footer'); ?>
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
    function keypresssIntegerOnly(th,e)
      {
        
        var str=$(th).val();    
        if(e.charCode>=48&&e.charCode<=57)
        {
          return true;
        }
        else
        {
          return false;
        }
      }
      function validateForm()
      {
        var startPercent = $('.startPercent').val();
        var endPercent = $('.endPercent').val();
        var percentValue = $('.percentValue').val();
        if(parseFloat(startPercent)>endPercent)
        {
            $('.startPercent').css('border','1px solid red');
            $('.endPercent').css('border','1px solid red');
            sweetAlert('error','Oops...','Please ensure that the End Percent is greater than  the Start  Percent.');
            return false;
        }
        else
        {
            $('.startPercent').css('border','');
            $('.endPercent').css('border','');
        }
        //alert(startPercent);
        //return false;
      }
</script>
