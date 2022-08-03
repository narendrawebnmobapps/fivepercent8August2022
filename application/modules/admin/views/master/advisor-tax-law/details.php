<?php $this->load->view('includes/header'); ?>
<div class="page-wrapper">
<div class="page-breadcrumb">
	<div class="row">
	    <div class="col-12 d-flex no-block align-items-center">
	        <h4 class="page-title">Detail  </h4>
	        <div class="ml-auto text-right">
	            <nav aria-label="breadcrumb">
	                <ol class="breadcrumb">
	                    <li class="breadcrumb-item"><a href="#">Home</a></li>
	                    <li class="breadcrumb-item active" aria-current="page">Detail </li>
	                </ol>
	            </nav>
	        </div>
	    </div>
	</div>
</div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <?php if($this->session->flashdata('message')){ ?>
                                <div class="alert alert-success" style="text-align: center;">
                                  <strong>Success!</strong> <?php echo $this->session->flashdata('message'); ?>
                                </div>
                                <?php } ?>
                                
                                <div class="add-question" style="float: right;">
                                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                                        <div class="collapse navbar-collapse" id="navbarNav">
                                        <ul class="navbar-nav">
                                          <li class="nav-item active">
                                            <a class="nav-link" href="<?php echo base_url('admin/master/add_advisor_tax_law') ?>">Add Advisor Tax Law</a>
                                          </li>
                                        </ul>
                                       </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $taxes->document_name; ?> - Advisor Tax Law</h5>                               
                                <div class="table-responsive">
                                    <embed src="<?php echo base_url('uploads/tax-law/'.$taxes->doc_file); ?>" type="application/pdf"   height="600px" width="100%">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php $this->load->view('includes/footer'); ?>