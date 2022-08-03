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
                                            <a class="nav-link" href="<?php echo base_url('admin/master/upload_historical_data/'.$stock_vn30s->id.'/2') ?>">Upload Historical CSV file</a>
                                          </li>
                                        </ul>
                                       </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $stock_vn30s->stock_name; ?> - VN30 Stock</h5>                               
                                <div class="table-responsive">

                                    <?php 
                                    $row = 1;
                                        if (($handle = fopen('uploads/stock/'.$stock_vn30s->stock_file, 'r')) !== FALSE) 
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
                                                    //echo $data[$c] . "<br />\n";
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
                                    <!--table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Stock Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(count($stock_vn30s)>0): $inc = 1; foreach($stock_vn30s as $stk_vn30s): ?>
                                            <tr>
                                                <td><?php echo $inc; ?></td>
                                                <td><?php echo $stk_vn30s->stock_name; ?></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-danger"><i class="m-r-10 mdi mdi-settings"></i></button>
                                                        <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(71px, 35px, 0px);">
                                                            <?php if($stk_vn30s->status==1){ ?>
                                                            <a class="dropdown-item" href="<?php  echo base_url('admin/master/activate_deactivate_stock_vn30/').$stk_vn30s->id.'/'.$stk_vn30s->status; ?>">Deactivate</a>
                                                            <?php } else { ?>
                                                            <a class="dropdown-item" href="<?php  echo base_url('admin/master/activate_deactivate_stock_vn30/').$stk_vn30s->id.'/'.$stk_vn30s->status; ?>">Activate</a>
                                                        <?php } ?>
                                                            <a class="dropdown-item" href="<?php  echo base_url('admin/master/edit_age_percent/').$stk_vn30s->id; ?>">Edit</a>
                                                            <a class="dropdown-item" href="<?php  echo base_url('admin/master/delete_age_percent/').$stk_vn30s->id; ?>">Delete</a>
                                                            <a class="dropdown-item" href="<?php  echo base_url('admin/master/detail_stock_vn30/').$stk_vn30s->id; ?>">Details</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php $inc++; endforeach; endif; ?>
                                        </tfoot>
                                    </table-->
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php $this->load->view('includes/footer'); ?>