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
                                            <a class="nav-link" href="<?php echo base_url('admin/master/upload_investment_historical_data/'.$spain_investments->investments_id) ?>">Upload Historical Data</a>
                                          </li>
                                        </ul>
                                       </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $title; ?></h5>                               
                                <div class="table-responsive">

                                    <?php 
                                    $row = 1;
                                        if (($handle = fopen('uploads/investments/'.$spain_investments->investment_file, 'r')) !== FALSE) 
                                        {           
                                            echo '<table id="zero_config" class="table table-striped table-bordered">';          
                                            while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) 
                                            {
                                                $num = count($data);
                                                if ($row == 1) 
                                                {
                                                    echo '<thead><tr>';
                                                }
                                                else
                                                {
                                                    echo '<tr>';
                                                }
                                                
                                                for ($c=0; $c < $num; $c++) 
                                                {
                                                    if(empty($data[$c])) 
                                                    {
                                                       $value = '&nbsp;';
                                                    }
                                                    else
                                                    {
                                                       $value = $data[$c];
                                                    }
                                                    if ($row == 1) 
                                                    {
                                                        echo '<th>'.$value.'</th>';
                                                    }
                                                    else
                                                    {
                                                        echo '<td>'.$value.'</td>';
                                                    }
                                                }               
                                                if ($row == 1) 
                                                {
                                                    echo '</tr></thead><tbody>';
                                                }
                                                else
                                                {
                                                    echo '</tr>';
                                                }
                                                $row++;
                                            }
                                            
                                            echo '</tbody></table>';
                                            fclose($handle);
                                    }
                                    ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php $this->load->view('includes/footer'); ?>