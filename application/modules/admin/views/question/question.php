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
	        <h4 class="page-title">Question</h4>
	        <div class="ml-auto text-right">
	            <nav aria-label="breadcrumb">
	                <ol class="breadcrumb">
	                    <li class="breadcrumb-item"><a href="#">Home</a></li>
	                    <li class="breadcrumb-item active" aria-current="page">Question</li>
	                </ol>
	            </nav>
	        </div>
	    </div>
	</div>
</div>
<?php
function get_question_category_name($id)
{
    if($id==1)
    {
        return 'Financial Situation';
    }
     if($id==2)
    {
        return 'Investment Objective';
    }
     if($id==3)
    {
        return 'Knowledge Experience';
    }
     if($id==4)
    {
        return 'Understanding Fiancial Commitements';
    }
}

?>
<?php $language = $this->input->get('language'); ?>
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
                                <div class="alert alert-success disapperedfewsecond" style="text-align: center;">
                                  <strong>Success!</strong> <?php echo $this->session->flashdata('message'); ?>
                                </div>
                                <?php } ?>
                                <div class="alert icon-alert with-arrow alert-success form-alter" role="alert">
                                  <i class="fa fa-fw fa-check-circle"></i>
                                  <strong> Success ! </strong> <span class="success-message"> Question Order has been updated successfully </span>
                                </div>
                                <div class="alert icon-alert with-arrow alert-danger form-alter" role="alert">
                                  <i class="fa fa-fw fa-times-circle"></i>
                                  <strong> Note !</strong> <span class="warning-message"> Empty list cant be ordered </span>
                                </div>
                            	<div class="language-div" style="float: left;">
                                	<nav class="navbar navbar-expand-lg navbar-light bg-light">
									  <div class="collapse navbar-collapse" id="navbarNav">
									    <ul class="navbar-nav">
									      <li class="nav-item <?php if(!$language){ echo 'active'; } ?>">
									        <a class="nav-link " href="<?php echo base_url('admin/questions'); ?>">English</a>
									      </li>
									      <li class="nav-item <?php if($language==2){ echo 'active'; } ?>">
									        <a class="nav-link" href="<?php echo base_url('admin/questions?language=2'); ?>">Spanish</a>
									      </li>
									      <li class="nav-item <?php if($language==3){ echo 'active'; } ?>">
									        <a class="nav-link" href="<?php echo base_url('admin/questions?language=3'); ?>">Vietnamese</a>
									      </li>
									    </ul>
									  </div>
									</nav>									                                	
								</div>

								<div class="add-question" style="float: right;">
									<nav class="navbar navbar-expand-lg navbar-light bg-light">
										<div class="collapse navbar-collapse" id="navbarNav">
									    <ul class="navbar-nav">
									      <li class="nav-item active">
									        <a class="nav-link" href="<?php echo base_url('admin/questions/add') ?>">Add Question</a>
									      </li>
									  	</ul>
									   </div>
									</nav>
								</div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Question</h5>                               
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Question</th>
                                                <th>Options</th>
                                                <th>Question category</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list-unstyled" id="post_list">
                                            <?php if(count($questions)>0): $inc = 1; foreach($questions as $question): ?>
                                            <tr data-post-id="<?php echo $question['id']; ?>">
                                                <td><?php echo $inc; ?></td>
                                                <td><?php echo $question['question']; ?></td>
                                                <td>
                                                    <?php
                                                    // echo "<pre>"; print_r($question['options']); 
                                                    $counter = 1;
                                                     foreach($question['options'] as $option)
                                                     {
                                                        //print_r($option->options);
                                                        echo $counter.' '.$option->options."<br>";
                                                        $counter++;
                                                     }
                                                    ?>
                                                    
                                                </td>
                                                <td><?php echo get_question_category_name($question['question_category']); ?></td>
                                                <td>
                                                    

                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-danger"><i class="m-r-10 mdi mdi-settings"></i></button>
                                                        <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(71px, 35px, 0px);">
                                                            <a class="dropdown-item" href="<?php echo base_url('admin/questions/edit/').$question['id']; ?>">Edit</a>
                                                            <a class="dropdown-item" href="<?php echo base_url('admin/questions/delete/').$question['id']; ?>">Delete</a>
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

    setTimeout(function(){ $(".disapperedfewsecond").fadeOut(); }, 3000);
  });
  </script>