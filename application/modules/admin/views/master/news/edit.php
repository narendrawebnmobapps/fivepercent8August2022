<?php $this->load->view('includes/header'); ?>
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Edit Live News</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Live News</li>
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
                  
                    <div class="col-md-6">
                        <div class="card">
                        <div class="card-body">
                        <div class="form-group">
                          <label for="sel1">Section</label>
                          <select class="form-control" name="section" required>
                              <option value="">--Select Section--</option>
                              <option value="0" <?php if($news->section==0){ echo "selected"; } ?>>User</option>
                              <option value="1" <?php if($news->section==1){ echo "selected"; } ?>>Advisor</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="sel1">News Title</label>
                          <input type="text" name="newsTitle" value="<?php echo $news->news_title; ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label for="sel1">News Content</label>
                          <textarea name="newsContent" class="form-control" rows="5" required> <?php echo $news->news_content; ?></textarea>
                        </div>
                        <div class="form-group">
                          <label for="sel1">News Image</label>
                          <input type="file" name="file" class="form-control news_image" >
                          <input type="hidden" name="old_image" value="<?php echo $news->image; ?>">
                        </div>
                        <div class="form-group">
                          <label for="sel1">Old Image</label>
                          <img src="<?php echo base_url('uploads/news/'.$news->image); ?>" class="form-control" style="width: 400px;height: 200px;" >
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

<script type="text/javascript">
   $(document).on('change','.news_image',function(){
      var ext = $('.news_image').val().split('.').pop().toLowerCase();
      if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
          alert('Please upload a Image');
          $('.news_image').val('');
      }
  })
</script>