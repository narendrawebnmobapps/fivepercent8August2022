<?php $this->load->view('includes/header'); ?>
<link href="https://collectiblesnetworkiso.com/file/drag/css/bootstrap-select.css" rel="stylesheet" />
<!-- Custom Css -->
<link href="https://collectiblesnetworkiso.com/file/drag/css/app_style.css" rel="stylesheet" />
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
<div class="page-breadcrumb">
	<div class="row">
	    <div class="col-12 d-flex no-block align-items-center">
	        <h4 class="page-title">Advisor Test Question</h4>
	        <div class="ml-auto text-right">
	            <nav aria-label="breadcrumb">
	                <ol class="breadcrumb">
	                    <li class="breadcrumb-item"><a href="#">Home</a></li>
	                    <li class="breadcrumb-item active" aria-current="page">Test</li>
	                </ol>
	            </nav>
	        </div>
	    </div>
	</div>
</div>

<!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <?php //echo "<pre>"; print_r($questions);die; ?>
                    <div class="col-12">
                    	<div class="card">
                            <div class="card-body">
                                <?php if($this->session->flashdata('message')){ ?>
                                <div class="alert alert-success successAlertDiv" style="text-align: center;">
                                  <strong>Success!</strong> <?php echo $this->session->flashdata('message'); ?>
                                </div>
                                <?php } ?>                           

              								<div class="add-question" style="float: right;">
              									<nav class="navbar navbar-expand-lg navbar-light bg-light">
              										<div class="collapse navbar-collapse" id="navbarNav">
              									    <ul class="navbar-nav">
              									      <li class="nav-item active">
              									        <a class="nav-link" href="<?php echo base_url('admin/test/add_advisor_test') ?>">Add Test Question</a>
              									      </li>
              									  	</ul>
              									   </div>
              									</nav>
              								</div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Test</h5>                               
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Question</th>
                                                <th>Options</th>
                                                <th>Test Number</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(count($questions)>0): $inc = 1; foreach($questions as $question): ?>
                                            <tr>
                                                <td><?php echo $inc; ?></td>
                                                <td><?php echo $question['question']; ?></td>
                                                <td>
                                                    <?php
                                                    $counter = 1;
                                                     foreach($question['options'] as $option)
                                                     {
                                                        //print_r($option->options);
                                                        echo $counter.' '.$option->options."<br>";
                                                        $counter++;
                                                     }
                                                    ?>
                                                    
                                                </td>
                                                <td><?php  echo $question['test_number']; ?></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-danger"><i class="m-r-10 mdi mdi-settings"></i></button>
                                                        <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(71px, 35px, 0px);">
                                                            <a class="dropdown-item" href="<?php echo base_url('admin/test/edit_advisor_test/').$question['id']; ?>">Edit</a>
                                                            <a class="dropdown-item" href="<?php echo base_url('admin/test/delete_advisor_test/').$question['id']; ?>">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php $inc++; endforeach; endif; ?>
                                        </tfoot>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
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
            <!-- ============================================================== -->
            <!-- End Container fluid  -->

<?php $this->load->view('includes/footer'); ?>
 <script src="https://collectiblesnetworkiso.com/file/drag/js/bootstrap-select.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

 <script>

  $(document).ready(function(){
    $( "#post_list" ).sortable({
      placeholder : "ui-state-highlight",
      update  : function(event, ui)
      {
        var post_order_ids = new Array();
        $('#post_list tr').each(function()
        {
          post_order_ids.push($(this).data("post-id"));
        });
        $.ajax({
          url:"<?php echo base_url('admin/questions/drag_drop_questions') ?>",
          method:"POST",
          data:{post_order_ids:post_order_ids},
          success:function(data)
          {
            //alert(data);
             if(data)
             {
              $(".alert-danger").hide();
              $(".alert-success ").show();
             }else
             {
              $(".alert-success").hide();
              $(".alert-danger").show();
             }
          }
        });
      }
    });
  });
  </script>

  <script type="text/javascript">
    $(document).ready(function(){
      setTimeout(function(){ $(".successAlertDiv").fadeOut(3000); }, 3000);
    })
  </script>