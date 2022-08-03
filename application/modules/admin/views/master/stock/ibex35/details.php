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
                                <!-- <div class="language-div" style="float: left;">
                                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                                      <div class="collapse navbar-collapse" id="navbarNav">
                                        <ul class="navbar-nav">
                                          <li class="nav-item <?php if($tab==1){ echo 'active'; } ?>">
                                            <a class="nav-link " href="<?php echo base_url('admin/master/detail_stock_ibex35/'.$stock_ibex35s->id.'?tab=1'); ?>">Historical Data</a>
                                          </li>
                                          <li class="nav-item <?php if($tab==2){ echo 'active'; } ?>">
                                            <a class="nav-link" href="<?php echo base_url('admin/master/detail_stock_ibex35/'.$stock_ibex35s->id.'?tab=2'); ?>">Balance Sheet</a>
                                          </li>
                                          <li class="nav-item <?php if($tab==3){ echo 'active'; } ?>">
                                            <a class="nav-link" href="<?php echo base_url('admin/master/detail_stock_ibex35/'.$stock_ibex35s->id.'?tab=3'); ?>">Income Statement</a>
                                          </li>
                                        </ul>
                                      </div>
                                    </nav>                                                                      
                                </div> -->
                                <div class="add-question" style="float: right;">
                                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                                        <div class="collapse navbar-collapse" id="navbarNav">
                                        <ul class="navbar-nav">
                                          <li class="nav-item active">
                                            <a class="nav-link" href="<?php echo base_url('admin/master/upload_historical_data/'.$stock_ibex35s->id.'/1') ?>">Upload Historical Data</a>
                                          </li>
                                        </ul>
                                       </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $stock_ibex35s->stock_name; ?> - IBEX35 Stock</h5>                               
                                <div class="table-responsive">

                                    <?php 
                                    $row = 1;
                                        if (($handle = fopen('uploads/stock/'.$stock_ibex35s->stock_file, 'r')) !== FALSE) 
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
                                    <!-- <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Date</th>
                                                <th>Price</th>
                                                <th>Open</th>
                                                <th>High</th>
                                                <th>Low</th>
                                                <th>Vol.</th>
                                                <th>Change %.</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(count($historical_data)>0): $inc = 1; foreach($historical_data as $value): ?>
                                            <tr>
                                                <td><?php echo $inc; ?></td>
                                                <td><?php echo date("d-M, Y", strtotime($value->historical_date)); ?></td>
                                                <td><?php echo $value->price; ?></td>
                                                <td><?php echo $value->open; ?></td>
                                                <td><?php echo $value->high; ?></td>
                                                <td><?php echo $value->low; ?></td>
                                                <td><?php echo $value->volume; ?></td>
                                                <td><?php echo $value->change_percent; ?></td>
                                                
                                            </tr>
                                            <?php $inc++; endforeach; endif; ?>
                                        </tfoot>
                                    </table> -->
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php $this->load->view('includes/footer'); ?>