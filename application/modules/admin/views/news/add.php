<?php $this->load->view('includes/header'); ?>
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<div class="page-wrapper">
<div class="page-breadcrumb">
  <?php 
    $newsType = "";
    $type = $this->input->get('type');
    if($type==1)
    {
      $newsType = 'Currency';
    }
    else if($type==2)
    {
      $newsType = 'Microeconomical';
    }
    else if($type==3)
    {
      $newsType = 'Oil';
    }
    else if($type==4)
    {
      $newsType = 'Portfolio';
    }
    else
    {

    }
  ?>
	<div class="row">
	    <div class="col-12 d-flex no-block align-items-center">
	        <h4 class="page-title">Add <?php echo $newsType; ?> News</h4>
	        <div class="ml-auto text-right">
	            <nav aria-label="breadcrumb">
	                <ol class="breadcrumb">
	                    <li class="breadcrumb-item"><a href="#">Home</a></li>
	                    <li class="breadcrumb-item active" aria-current="page">News</li>
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
                <form method="post" action="" enctype="multipart/form-data">
                <div class="row">
                  
                    <div class="col-md-12">
                        <div class="card">
                        <div class="card-body">
                        <div class="form-group">
                          <label for="comment">News Title</label>
                          <input type="text" name="news_title" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label for="comment">News Content</label>
                          <textarea class="form-control" rows="5" name="news_content" id="comment" required></textarea>
                        </div>
                        <div class="form-group">
                          <label for="comment">News Image</label>
                          <input type="file" name="news_image" required class="form-control news_image">
                        </div>
                        <div class="form-group">
                          <label for="comment">News Date</label>
                          <input required type="text" name="news_date" class="form-control" id="datepicker" readonly>

                        </div>
                        <div class="form-group">
                          <label for="comment">Link</label>
                          <input type="text" name="link" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="comment">Actual</label>
                          <input type="text" name="actual" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="comment">Forecast</label>
                          <input type="text" name="forecast" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="comment">Previous</label>
                          <input type="text" name="previous" class="form-control">
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary">Submit</button>
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

<script type="text/javascript">
  $(function() {
    $( "#datepicker" ).datepicker({
        dateFormat : 'mm/dd/yy',
        changeMonth : true,
        changeYear : true,
        yearRange: '-100y:c+nn',
        defaultdate:'01-01-1990',
       // maxDate: new Date(),
    });
});
  $(document).on('change','.news_image',function(){
      var ext = $('.news_image').val().split('.').pop().toLowerCase();
      if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
          alert('Please upload a Image');
          $('.news_image').val('');
      }
  })

</script>
