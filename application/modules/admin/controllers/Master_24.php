<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller 
{
	function check_login()
	{
		$user_sess = $this->session->userdata('user_admin');
		$status_sess = $this->session->userdata('status');
		if($user_sess=="" || $status_sess=="")
		{
			redirect(base_url('admin/Auth'));
		}

	}
	function subscription_plan()
	{
		$this->check_login();
		$data = array();
		$data['title'] = "User Subscription Plan | 5% Percent";
		$recordarray = array();
		$data_arr = array();
		$resultdata = $this->db->query("SELECT * FROM tbl_admin_subscription_plan WHERE type=0")->result();
		foreach($resultdata as $res)
		{
			$data_arr['plan_name'] = $res->plan_name;
			$data_arr['price'] = $res->price;
			$data_arr['id'] = $res->id;
			$features = $this->db->query("SELECT * FROM tbl_admin_subscription_feature WHERE subs_id='".$res->id."'")->result();
			$data_arr['features'] = $features;
			array_push($recordarray, $data_arr);

		}
		$data['subscriptions'] = $recordarray;
		$this->load->view('master/user-subscription-plan/list',$data);
	}
	function add_subscription_plan()
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Add User Subscription Plan | 5% Percent";
		$currentdate = date('Y-m-d H:i:s');
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			//echo "<pre>"; print_r($_POST);die;
			$planName = $this->input->post('planName');
			$price = $this->input->post('price');
			$insertArray = array(
								'plan_name'=>$planName,
								'price'=>$price,
								'created_on'=>$currentdate,
								'updated_on'=>$currentdate,
								);
			$this->db->insert('tbl_admin_subscription_plan',$insertArray);
			$last_plan_id = $this->db->insert_id();
			for($i=0;$i<count($_POST['feature']);$i++)
			{
				$insertFeatureArray = array(
											'subs_id'=>$last_plan_id,
											'feature_name'=>$_POST['feature'][$i],
											'created_on'=>$currentdate,
											'updated_on'=>$currentdate,
											);
				$this->db->insert('tbl_admin_subscription_feature',$insertFeatureArray);
			}
			$this->session->set_flashdata('message','Subscription Plan added successfully');
			redirect(base_url('admin/master/subscription_plan'));
		}


		$this->load->view('master/user-subscription-plan/add',$data);
	}
	function edit_subscription_plan($id)
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Edit User Subscription Plan - 5% Percent";
		$currentdate = date('Y-m-d H:i:s');

		$recordarray = array();
		$data_arr = array();

		$resultdata = $this->db->query("SELECT * FROM tbl_admin_subscription_plan  WHERE id='".$id."'")->row();

		$data_arr['subscription'] = $resultdata;
		$features = $this->db->query("SELECT feature_name,id FROM tbl_admin_subscription_feature WHERE subs_id='".$resultdata->id."'")->result();
		$data_arr['features'] = $features;
		array_push($recordarray, $data_arr);
		$data['subscriptions'] = $recordarray;

		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$plan_id = $this->input->post('plan_id');
			$planName = $this->input->post('planName');
			$price = $this->input->post('price');
			$insertArray = array(
										 'id'=>$plan_id,
										 'plan_name'=>$planName,
										 'price'=>$price,
										);
			$this->db->where('id',$plan_id);
			$this->db->update('tbl_admin_subscription_plan',$insertArray);
			for($i=0;$i<count($_POST['feature']);$i++)
			{
				$check = $this->db->query("SELECT * FROM tbl_admin_subscription_feature WHERE id='".@$_POST['feature_id'][$i]."'")->num_rows();
				if($check>0)
				{
					$feature_update = array(
											'feature_name'=>$_POST['feature'][$i],
											'updated_on'=>$currentdate,
											);
					$this->db->where('id',$_POST['feature_id'][$i]);
					$this->db->update('tbl_admin_subscription_feature',$feature_update);
				}
				else
				{
					if($_POST['feature'][$i]!="")
					{
						$features = array(
									 'subs_id'=>$plan_id,
									 'feature_name'=>$_POST['feature'][$i],
									 'created_on'=>$currentdate,
									 'updated_on'=>$currentdate,
									);
					    $this->db->insert('tbl_admin_subscription_feature',$features);
					}
					
				}

			}
			$this->session->set_flashdata('message','Subscription Plan Updated successfully');
			redirect(base_url('admin/master/subscription_plan'));

		}

		$this->load->view('master/user-subscription-plan/edit',$data);
	}
	function delete_subscription_plan($id)
	{
		$this->check_login();
		$this->db->where('id',$id);
		$this->db->delete('tbl_admin_subscription_plan');
		//options delete
		$this->db->where('subs_id',$id);
		$this->db->delete('tbl_admin_subscription_feature');
		$this->session->set_flashdata('message','Subscription Plan Deleted successfully');
		redirect(base_url('admin/master/subscription_plan'));
	}
	function advisor_subscription_plan()
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Advisor Subscription Plan | 5% Percent";
		$recordarray = array();
		$data_arr = array();
		$resultdata = $this->db->query("SELECT * FROM tbl_admin_subscription_plan WHERE type=1")->result();
		foreach($resultdata as $res)
		{
			$data_arr['plan_name'] = $res->plan_name;
			$data_arr['price'] = $res->price;
			$data_arr['id'] = $res->id;
			$features = $this->db->query("SELECT * FROM tbl_admin_subscription_feature WHERE subs_id='".$res->id."'")->result();
			$data_arr['features'] = $features;
			array_push($recordarray, $data_arr);

		}
		$data['subscriptions'] = $recordarray;
		$this->load->view('master/advisor-subscription-plan/list',$data);
	}
	function add_advisor_subscription_plan()
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Add Advisor Subscription Plan | 5% Percent";
		$currentdate = date('Y-m-d H:i:s');
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			//echo "<pre>"; print_r($_POST);die;
			$planName = $this->input->post('planName');
			$price = $this->input->post('price');
			$insertArray = array(
								'plan_name'=>$planName,
								'price'=>$price,
								'type'=>1,
								'created_on'=>$currentdate,
								'updated_on'=>$currentdate,
								);
			$this->db->insert('tbl_admin_subscription_plan',$insertArray);
			$last_plan_id = $this->db->insert_id();
			for($i=0;$i<count($_POST['feature']);$i++)
			{
				$insertFeatureArray = array(
											'subs_id'=>$last_plan_id,
											'feature_name'=>$_POST['feature'][$i],
											'created_on'=>$currentdate,
											'updated_on'=>$currentdate,
											);
				$this->db->insert('tbl_admin_subscription_feature',$insertFeatureArray);
			}
			$this->session->set_flashdata('message','Subscription Plan added successfully');
			redirect(base_url('admin/master/advisor_subscription_plan'));
		}
		else
		{
			$this->load->view('master/advisor-subscription-plan/add',$data);
		}
		
	}
	function edit_advisor_subscription_plan($id)
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Edit Advisor Subscription Plan - 5% Percent";
		$currentdate = date('Y-m-d H:i:s');

		$recordarray = array();
		$data_arr = array();

		$resultdata = $this->db->query("SELECT * FROM tbl_admin_subscription_plan  WHERE id='".$id."'")->row();

		$data_arr['subscription'] = $resultdata;
		$features = $this->db->query("SELECT feature_name,id FROM tbl_admin_subscription_feature WHERE subs_id='".$resultdata->id."'")->result();
		$data_arr['features'] = $features;
		array_push($recordarray, $data_arr);
		$data['subscriptions'] = $recordarray;

		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$plan_id = $this->input->post('plan_id');
			$planName = $this->input->post('planName');
			$price = $this->input->post('price');
			$insertArray = array(
										 'id'=>$plan_id,
										 'plan_name'=>$planName,
										 'price'=>$price,
										);
			$this->db->where('id',$plan_id);
			$this->db->update('tbl_admin_subscription_plan',$insertArray);
			for($i=0;$i<count($_POST['feature']);$i++)
			{
				$check = $this->db->query("SELECT * FROM tbl_admin_subscription_feature WHERE id='".@$_POST['feature_id'][$i]."'")->num_rows();
				if($check>0)
				{
					$feature_update = array(
											'feature_name'=>$_POST['feature'][$i],
											'updated_on'=>$currentdate,
											);
					$this->db->where('id',$_POST['feature_id'][$i]);
					$this->db->update('tbl_admin_subscription_feature',$feature_update);
				}
				else
				{
					if($_POST['feature'][$i]!="")
					{
						$features = array(
									 'subs_id'=>$plan_id,
									 'feature_name'=>$_POST['feature'][$i],
									 'created_on'=>$currentdate,
									 'updated_on'=>$currentdate,
									);
					    $this->db->insert('tbl_admin_subscription_feature',$features);
					}
					
				}

			}
			$this->session->set_flashdata('message','Subscription Plan Updated successfully');
			redirect(base_url('admin/master/advisor_subscription_plan'));

		}
		else
		{
			$this->load->view('master/advisor-subscription-plan/edit',$data);
		}

		
	}
	function remove_subscriptions_features()
	{
		$id = $this->input->post('rowid');
		if($id!="")
		{
			$this->db->where('id',$id);
			$this->db->delete('tbl_admin_subscription_feature');
		}
		else
		{

		}
	}
	function age_percent()
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Age Percent | 5% Percent";
		$data['age_percents'] = $this->db->query("SELECT * FROM tbl_admin_age_percent")->result();
		$this->load->view('master/age-percent/list',$data);
	}
	function add_age_percent()
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Add Age Percent | 5% Percent";
		$currentdate = date('Y-m-d H:i:s');
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			//echo "<pre>"; print_r($_POST);die;
			$startPoint = $this->input->post('startPoint');
			$endPoint = $this->input->post('endPoint');
			$percentValue = $this->input->post('percentValue');
			$insertArray = array(
								'start_point'=>$startPoint,
								'end_point'=>$endPoint,
								'percent_value'=>$percentValue,
								'created_on'=>$currentdate,
								);
			$this->db->insert('tbl_admin_age_percent',$insertArray);

			$this->session->set_flashdata('message','Age Percent added successfully');
			redirect(base_url('admin/master/age_percent'));
		}
		$this->load->view('master/age-percent/add',$data);
	}
	function edit_age_percent($id)
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Edit Age Percent - 5% Percent";
		$currentdate = date('Y-m-d H:i:s');
		$data['age_percent'] = $this->db->query("SELECT * FROM tbl_admin_age_percent  WHERE id='".$id."'")->row();
		
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$startPoint = $this->input->post('startPoint');
			$endPoint = $this->input->post('endPoint');
			$percentValue = $this->input->post('percentValue');
			$insertArray = array(
								'start_point'=>$startPoint,
								'end_point'=>$endPoint,
								'percent_value'=>$percentValue,
								'created_on'=>$currentdate,
								);
			$this->db->where('id',$id);
			$this->db->update('tbl_admin_age_percent',$insertArray);

			$this->session->set_flashdata('message','Age Percent updated successfully');
			redirect(base_url('admin/master/age_percent'));

		}
		$this->load->view('master/age-percent/edit',$data);
	}
	function delete_age_percent($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('tbl_admin_age_percent');
		$this->session->set_flashdata('message','Age Percent deleted successfully');
		redirect(base_url('admin/master/age_percent'));
	}
	function job_type_percent()
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Job Type Percent | 5% Percent";
		$data['job_type_percents'] = $this->db->query("SELECT a.*,b.jobtype FROM tbl_admin_job_type_percent a LEFT JOIN tbl_job_type b ON a.job_type =b.id")->result();
		//echo "<pre>"; print_r($data['job_type_percents']);die;
		$this->load->view('master/job-type-percent/list',$data);
	}
	function add_job_type_percent()
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Add Job Type Percent | 5% Percent";
		$currentdate = date('Y-m-d H:i:s');
		$data['jobtype'] = $this->db->query("SELECT id,jobtype FROM tbl_job_type ORDER BY id")->result();
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$jobtype = $this->input->post('jobtype');
			$percentValue = $this->input->post('percentValue');
			$insertArray = array(
								'job_type'=>$jobtype,
								'percent_value'=>$percentValue,
								'created_on'=>$currentdate,
								);
			$this->db->insert('tbl_admin_job_type_percent',$insertArray);

			$this->session->set_flashdata('message','Job Type Percent added successfully');
			redirect(base_url('admin/master/job_type_percent'));
		}
		$this->load->view('master/job-type-percent/add',$data);
	}
	function edit_job_type_percent($id)
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Edit Job Type Percent | 5% Percent";
		$currentdate = date('Y-m-d H:i:s');
		$data['jobtype'] = $this->db->query("SELECT id,jobtype FROM tbl_job_type ORDER BY id")->result();
		$data['job_type_percent'] = $this->db->query("SELECT a.*,b.jobtype FROM tbl_admin_job_type_percent a LEFT JOIN tbl_job_type b ON a.job_type =b.id WHERE a.id='".$id."'")->row();
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$jobtype = $this->input->post('jobtype');
			$percentValue = $this->input->post('percentValue');
			$insertArray = array(
								'job_type'=>$jobtype,
								'percent_value'=>$percentValue,
								'created_on'=>$currentdate,
								);
			$this->db->where('id',$id);
			$this->db->update('tbl_admin_job_type_percent',$insertArray);

			$this->session->set_flashdata('message','Job Type Percent updated successfully');
			redirect(base_url('admin/master/job_type_percent'));
		}
		$this->load->view('master/job-type-percent/edit',$data);
	}
	function delete_job_type_percent($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('tbl_admin_job_type_percent');
		$this->session->set_flashdata('message','Job Type Percent deleted successfully');
		redirect(base_url('admin/master/job_type_percent'));
	}
	function maritial_status_percent()
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Maritial Status Percent | 5% Percent";
		$data['maritial_status_percent'] = $this->db->query("SELECT * FROM tbl_admin_maritial_status_percent")->result();
		//echo "<pre>"; print_r($data['job_type_percents']);die;
		$this->load->view('master/maritial-status-percent/list',$data);
	}
	function add_maritial_status_percent()
	{		
		$this->check_login();
		$data = array();
		$data['title'] = "Add Maritial Status Percent | 5% Percent";
		$currentdate = date('Y-m-d H:i:s');
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$maritalstatus = $this->input->post('maritalstatus');
			$noofchild = $this->input->post('noofchild');
			$percentValue = $this->input->post('percentValue');
			$insertArray = array(
								'maritail_status'=>$maritalstatus,
								'no_of_child'=>$noofchild,
								'percent_value'=>$percentValue,
								'created_on'=>$currentdate,
								);
			$this->db->insert('tbl_admin_maritial_status_percent',$insertArray);

			$this->session->set_flashdata('message','Maritial Status Percent added successfully');
			redirect(base_url('admin/master/maritial_status_percent'));
		}
		$this->load->view('master/maritial-status-percent/add',$data);
	}
	function edit_maritial_status_percent($id)
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Edit Maritial Status Percent | 5% Percent";
		$currentdate = date('Y-m-d H:i:s');
		$data['maritial_status'] = $this->db->query("SELECT * FROM tbl_admin_maritial_status_percent WHERE id='".$id."'")->row();
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$maritalstatus = $this->input->post('maritalstatus');
			$noofchild = $this->input->post('noofchild');
			$percentValue = $this->input->post('percentValue');
			$insertArray = array(
								'maritail_status'=>$maritalstatus,
								'no_of_child'=>$noofchild,
								'percent_value'=>$percentValue,
								'created_on'=>$currentdate,
								);
			$this->db->where('id',$id);
			$this->db->update('tbl_admin_maritial_status_percent',$insertArray);

			$this->session->set_flashdata('message','Maritial Status Percent updated successfully');
			redirect(base_url('admin/master/maritial_status_percent'));
		}
		$this->load->view('master/maritial-status-percent/edit',$data);
	}
	function delete_maritial_status_percent($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('tbl_admin_maritial_status_percent');
		$this->session->set_flashdata('message','Maritial Status Percent deleted successfully');
		redirect(base_url('admin/master/maritial_status_percent'));
	}

	function knowledge_percent()
	{
		$this->check_login();
		$data = array();
		$data['title'] = "knowledge Percent | 5% Percent";
		$data['knowledge_percents'] = $this->db->query("SELECT * FROM tbl_admin_knowledge_percent")->result();
		$this->load->view('master/knowledge-percent/list',$data);
	}
	function add_knowledge_percent()
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Add knowledge Percent | 5% Percent";
		$currentdate = date('Y-m-d H:i:s');
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			//echo "<pre>"; print_r($_POST);die;
			$startPoint = $this->input->post('startPoint');
			$endPoint = $this->input->post('endPoint');
			$percentValue = $this->input->post('percentValue');
			$insertArray = array(
								'start_point'=>$startPoint,
								'end_point'=>$endPoint,
								'percent_value'=>$percentValue,
								'created_on'=>$currentdate,
								);
			$this->db->insert('tbl_admin_knowledge_percent',$insertArray);

			$this->session->set_flashdata('message','knowledge Percent added successfully');
			redirect(base_url('admin/master/knowledge_percent'));
		}
		$this->load->view('master/knowledge-percent/add',$data);
	}
	function edit_knowlede_percent($id)
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Edit knowledge Percent - 5% Percent";
		$currentdate = date('Y-m-d H:i:s');
		$data['knowledge_percent'] = $this->db->query("SELECT * FROM tbl_admin_knowledge_percent  WHERE id='".$id."'")->row();
		
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$startPoint = $this->input->post('startPoint');
			$endPoint = $this->input->post('endPoint');
			$percentValue = $this->input->post('percentValue');
			$insertArray = array(
								'start_point'=>$startPoint,
								'end_point'=>$endPoint,
								'percent_value'=>$percentValue,
								'created_on'=>$currentdate,
								);
			$this->db->where('id',$id);
			$this->db->update('tbl_admin_knowledge_percent',$insertArray);

			$this->session->set_flashdata('message','knowledge Percent updated successfully');
			redirect(base_url('admin/master/knowledge_percent'));

		}
		$this->load->view('master/knowledge-percent/edit',$data);
	}
	function delete_knowledge_percent($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('tbl_admin_knowledge_percent');
		$this->session->set_flashdata('message','knowledge Percent deleted successfully');
		redirect(base_url('admin/master/knowledge_percent'));
	}
	function stock_vn30()
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Stock VN30 | 5% Percent";
		$data['stock_vn30s'] = $this->db->query("SELECT * FROM tbl_admin_stock WHERE stock_type=2")->result();
		$this->load->view('master/stock/vn30/list',$data);
	}
	function activate_deactivate_stock_vn30($id,$status)
	{
		$message = '';
		if($status==1)
		{
			$this->db->where('id',$id);
			$this->db->update('tbl_admin_stock',array('status'=>0));

			$message = 'Stock Deactivated successfully';
		}
		if($status==0)
		{
			$this->db->where('id',$id);
			$this->db->update('tbl_admin_stock',array('status'=>1));
			$message = 'Stock Activated successfully';
		}
		$this->session->set_flashdata('message',$message);
		redirect(base_url('admin/master/stock_vn30'));
	}
	function detail_stock_vn30($id)
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Stock VN30 | 5% Percent";
		$data['stock_vn30s'] = $this->db->query("SELECT * FROM tbl_admin_stock WHERE stock_type=2 AND id='".$id."'")->row();
		//echo "<pre>";print_r($data['stock_vn30s']);die;
		$this->load->view('master/stock/vn30/details',$data);	
	}

	function test_csv_table()
	{
			$row = 1;
			if (($handle = fopen('stock/IBEX35/test.csv', 'r')) !== FALSE) 
			{		    
			    echo '<table border="1">';		    
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
	}
	function upload_stock_vn30_historical_data()
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Upload stock VN30 Historical Data | 5% Percent";
		$this->load->helper('file');
		$datetime = date('Y-m-d H:i:s');
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$this->form_validation->set_rules('stockname', 'Stack Name', 'required',array('required'=>'Please enter a %s'));
			$this->form_validation->set_rules('file', 'Historical CSV File', 'callback_file_check');
			$stockname = $this->input->post('stockname');
            if($this->form_validation->run() == true)
            {
                //upload configuration
                $config['upload_path']   = 'uploads/stock/';
                $config['allowed_types'] = 'csv';
                //$config['max_size']      = 1024;
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);
                //upload file to directory
                if($this->upload->do_upload('file'))
                {
                    $uploadData = $this->upload->data();
                    $uploadedFile = $uploadData['file_name'];
                    $data['success_msg'] = 'File has been uploaded successfully.';
                }
                else
                {
                    $data['error_msg'] = $this->upload->display_errors();
                }

                $insertDataArray = array(
                						'stock_type'=>2,
                						'stock_name'=>$stockname,
                						'stock_file'=>$uploadedFile,
                						'status'=>1,
                						'created_on'=>$datetime,
                						);
                $this->db->insert('tbl_admin_stock',$insertDataArray);

                $this->session->set_flashdata('message','Historical data uploaded successfully');
                redirect(base_url('admin/master/stock_vn30'));

            }
            else
            {
            	$this->load->view('master/stock/vn30/add',$data);
            }

		}
		else
		{
			$this->load->view('master/stock/vn30/add',$data);
		}
		
	}

	public function file_check($str)
	{
        $allowed_mime_type_arr = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel');
        $mime = get_mime_by_extension($_FILES['file']['name']);
        if(isset($_FILES['file']['name']) && $_FILES['file']['name']!="")
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('file_check', 'Please select only csv file.');
                return false;
            }        
        }
        else
        {
            $this->form_validation->set_message('file_check', 'Please choose a csv file to upload.');
            return false;
        }
    }
    public function file_check1($str)
	{
        $allowed_mime_type_arr = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel');
        $mime = get_mime_by_extension($_FILES['file']['name']);
        if(isset($_FILES['file']['name']) && $_FILES['file']['name']!="")
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('file_check', 'Please select only csv file.');
                return false;
            }        
        }
    }
    function delete_vn30_stock($id,$file)
    {
    	$this->db->where('id',$id);
    	$this->db->delete('tbl_admin_stock');
    	unlink('uploads/stock/'.$file);
    	$this->session->set_flashdata('message','Stock data deleted successfully');
    	redirect(base_url('admin/master/stock_vn30'));
    }
    function edit_stock_vn30($id)
    {
    	$this->check_login();
		$data = array();
		$data['title'] = "Stock VN30 | 5% Percent";
		$data['stock_vn30s'] = $this->db->query("SELECT * FROM tbl_admin_stock WHERE stock_type=2 AND id='".$id."'")->row();
		$this->load->helper('file');
		$datetime = date('Y-m-d H:i:s');
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$this->form_validation->set_rules('stockname', 'Stack Name', 'required',array('required'=>'Please enter a %s'));
			$this->form_validation->set_rules('file', 'Historical CSV File', 'callback_file_check1');
			$stockname = $this->input->post('stockname');
            if($this->form_validation->run() == true)
            {
            	if($_FILES['file']['size']>0)
            	{
            		$get_file_name = $this->db->query("SELECT stock_file FROM tbl_admin_stock WHERE id='".$id."'")->row()->stock_file;
            		@unlink('uploads/stock/'.$get_file_name);
            		//upload configuration
	                $config['upload_path']   = 'uploads/stock/';
	                $config['allowed_types'] = 'csv';
	                //$config['max_size']      = 1024;
	                $config['encrypt_name'] = TRUE;
	                $this->load->library('upload', $config);
	                //upload file to directory
	                if($this->upload->do_upload('file'))
	                {
	                    $uploadData = $this->upload->data();
	                    $uploadedFile = $uploadData['file_name'];
	                    $data['success_msg'] = 'File has been uploaded successfully.';
	                }
	                else
	                {
	                    $data['error_msg'] = $this->upload->display_errors();
	                }
            	}
            	else
            	{
            		$uploadedFile = $this->input->post('oldfile');
            	}
                

                $insertDataArray = array(
                						'stock_name'=>$stockname,
                						'stock_file'=>$uploadedFile,
                						'created_on'=>$datetime,
                						);
                $this->db->where('id',$id);
                $this->db->update('tbl_admin_stock',$insertDataArray);

                $this->session->set_flashdata('message','Historical data updated successfully');
                redirect(base_url('admin/master/stock_vn30'));

            }
            else
            {
            	$this->load->view('master/stock/vn30/add',$data);
            }
		}
		else
		{
			//echo "<pre>";print_r($data['stock_vn30s']);die;
			$this->load->view('master/stock/vn30/edit',$data);
		}
		
    }

    function stock_ibex35()
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Stock IBEX35 | 5% Percent";
		$data['stock_ibex35s'] = $this->db->query("SELECT * FROM tbl_admin_stock WHERE stock_type=1")->result();
		$this->load->view('master/stock/ibex35/list',$data);
	}
	function activate_deactivate_stock_ibex35($id,$status)
	{
		$message = '';
		if($status==1)
		{
			$this->db->where('id',$id);
			$this->db->update('tbl_admin_stock',array('status'=>0));

			$message = 'Stock Deactivated successfully';
		}
		if($status==0)
		{
			$this->db->where('id',$id);
			$this->db->update('tbl_admin_stock',array('status'=>1));
			$message = 'Stock Activated successfully';
		}
		$this->session->set_flashdata('message',$message);
		redirect(base_url('admin/master/stock_ibex35'));
	}
	function detail_stock_ibex35($id)
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Stock IBEX35 | 5% Percent";
		$data['stock_ibex35s'] = $this->db->query("SELECT * FROM tbl_admin_stock WHERE stock_type=1 AND id='".$id."'")->row();
		//echo "<pre>";print_r($data['stock_vn30s']);die;
		$this->load->view('master/stock/ibex35/details',$data);	
	}

	function upload_stock_ibex35_historical_data()
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Upload stock IBEX35 Historical Data | 5% Percent";
		$this->load->helper('file');
		$datetime = date('Y-m-d H:i:s');
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$this->form_validation->set_rules('stockname', 'Stack Name', 'required',array('required'=>'Please enter a %s'));
			$this->form_validation->set_rules('file', 'Historical CSV File', 'callback_file_check');
			$stockname = $this->input->post('stockname');
            if($this->form_validation->run() == true)
            {
                //upload configuration
                $config['upload_path']   = 'uploads/stock/';
                $config['allowed_types'] = 'csv';
                //$config['max_size']      = 1024;
                $config['encrypt_name'] = TRUE;
                $this->load->library('upload', $config);
                //upload file to directory
                if($this->upload->do_upload('file'))
                {
                    $uploadData = $this->upload->data();
                    $uploadedFile = $uploadData['file_name'];
                    $data['success_msg'] = 'File has been uploaded successfully.';
                }
                else
                {
                    $data['error_msg'] = $this->upload->display_errors();
                }

                $insertDataArray = array(
                						'stock_type'=>1,
                						'stock_name'=>$stockname,
                						'stock_file'=>$uploadedFile,
                						'status'=>1,
                						'created_on'=>$datetime,
                						);
                $this->db->insert('tbl_admin_stock',$insertDataArray);

                $this->session->set_flashdata('message','Historical data uploaded successfully');
                redirect(base_url('admin/master/stock_ibex35'));

            }
            else
            {
            	$this->load->view('master/stock/ibex35/add',$data);
            }

		}
		else
		{
			$this->load->view('master/stock/ibex35/add',$data);
		}
		
	}
    function delete_ibex35_stock($id,$file)
    {
    	$this->db->where('id',$id);
    	$this->db->delete('tbl_admin_stock');
    	unlink('uploads/stock/'.$file);
    	$this->session->set_flashdata('message','Stock data deleted successfully');
    	redirect(base_url('admin/master/stock_ibex35'));
    }
    function edit_stock_ibex35($id)
    {
    	$this->check_login();
		$data = array();
		$data['title'] = "Stock IBEX35 | 5% Percent";
		$data['stock_ibex35s'] = $this->db->query("SELECT * FROM tbl_admin_stock WHERE stock_type=1 AND id='".$id."'")->row();
		$this->load->helper('file');
		$datetime = date('Y-m-d H:i:s');
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$this->form_validation->set_rules('stockname', 'Stack Name', 'required',array('required'=>'Please enter a %s'));
			$this->form_validation->set_rules('file', 'Historical CSV File', 'callback_file_check1');
			$stockname = $this->input->post('stockname');
            if($this->form_validation->run() == true)
            {
            	if($_FILES['file']['size']>0)
            	{
            		$get_file_name = $this->db->query("SELECT stock_file FROM tbl_admin_stock WHERE id='".$id."'")->row()->stock_file;
            		@unlink('uploads/stock/'.$get_file_name);
            		//upload configuration
	                $config['upload_path']   = 'uploads/stock/';
	                $config['allowed_types'] = 'csv';
	                //$config['max_size']      = 1024;
	                $config['encrypt_name'] = TRUE;
	                $this->load->library('upload', $config);
	                //upload file to directory
	                if($this->upload->do_upload('file'))
	                {
	                    $uploadData = $this->upload->data();
	                    $uploadedFile = $uploadData['file_name'];
	                    $data['success_msg'] = 'File has been uploaded successfully.';
	                }
	                else
	                {
	                    $data['error_msg'] = $this->upload->display_errors();
	                }
            	}
            	else
            	{
            		$uploadedFile = $this->input->post('oldfile');
            	}
                

                $insertDataArray = array(
                						'stock_name'=>$stockname,
                						'stock_file'=>$uploadedFile,
                						'created_on'=>$datetime,
                						);
                $this->db->where('id',$id);
                $this->db->update('tbl_admin_stock',$insertDataArray);

                $this->session->set_flashdata('message','Historical data updated successfully');
                redirect(base_url('admin/master/stock_ibex35'));

            }
            else
            {
            	$this->load->view('master/stock/ibex35/add',$data);
            }
		}
		else
		{
			//echo "<pre>";print_r($data['stock_vn30s']);die;
			$this->load->view('master/stock/ibex35/edit',$data);
		}
		
    }
    function strategy()
    {
    	$this->check_login();
		$data = array();
		$data['title'] = "Strategy | 5% Percent";
		$data['strategies'] = $this->db->query("SELECT id,strategy FROM tbl_admin_strategies")->result();
		$this->load->view('master/strategy/list',$data);
    }
    function add_strategy()
    {
    	$this->check_login();
		$data = array();
		$data['title'] = "Add Strategy | 5% Percent";
		$currentdate = date('Y-m-d H:i:s');
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$strategy = $this->input->post('strategy');
			$insertArray = array(
								'strategy'=>$strategy,
								'created_on'=>$currentdate,
								'updated_on'=>$currentdate
								);
			$this->db->insert('tbl_admin_strategies',$insertArray);

			$this->session->set_flashdata('message','Strategy added successfully');
			redirect(base_url('admin/master/strategy'));
		}
		else
		{
			$this->load->view('master/strategy/add',$data);
		}
		
    }
    function edit_strategy($id)
    {
    	$this->check_login();
		$data = array();
		$data['title'] = "Edit Strategy - 5% Percent";
		$currentdate = date('Y-m-d H:i:s');
		$data['strategy'] = $this->db->query("SELECT id,strategy FROM tbl_admin_strategies  WHERE id='".$id."'")->row();
		
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$strategy = $this->input->post('strategy');
			$insertArray = array(
								'strategy'=>$strategy,
								'updated_on'=>$currentdate
								);
			$this->db->where('id',$id);
			$this->db->update('tbl_admin_strategies',$insertArray);

			$this->session->set_flashdata('message','Strategy updated successfully');
			redirect(base_url('admin/master/strategy'));

		}
		else
		{
			$this->load->view('master/strategy/edit',$data);
		}
		
    }

    function delete_strategy($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('tbl_admin_strategies');
		$this->session->set_flashdata('message','Strategy deleted successfully');
		redirect(base_url('admin/master/strategy'));
	}
	function advisor_tax_law()
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Advisor Tax Law | 5% Percent";
		$data['advisor_taxes'] = $this->db->query("SELECT id,document_name,status FROM tbl_admin_tax_law WHERE type=1")->result();
		//echo "<pre>";print_r($data['advisor_taxes']);die();
		$this->load->view('master/advisor-tax-law/list',$data);
	}
	function add_advisor_tax_law()
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Add Advisor Tax Law | 5% Percent";
		$datetime = date('Y-m-d H:i:s');
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			  $tax_name = $this->input->post('tax_name');


	          $type2 = $_FILES["file"]["type"];
	          $new_photoid = explode('.',$_FILES["file"]["name"]); 
	          $file = rand(100,9999999).date('d_m_yhmi').'.' . end($new_photoid); 
	          move_uploaded_file($_FILES["file"]["tmp_name"],"uploads/tax-law/".$file);          


	            $insertDataArray = array(
	            						'document_name'=>$tax_name,
	            						'doc_file'=>$file,
	            						'created_on'=>$datetime,
	            						'updated_on'=>$datetime,
	            						);
	            $this->db->insert('tbl_admin_tax_law',$insertDataArray);

	            $this->session->set_flashdata('message','Tax law Added successfully');
	            redirect(base_url('admin/master/advisor_tax_law'));


		}
		else
		{
			$this->load->view('master/advisor-tax-law/add',$data);
		}
		
	}
	function activate_deactivate_tax_law($id,$status)
	{
		$message = '';
		if($status==1)
		{
			$this->db->where('id',$id);
			$this->db->update('tbl_admin_tax_law',array('status'=>0));

			$message = 'Tax Law Deactivated successfully';
		}
		if($status==0)
		{
			$this->db->where('id',$id);
			$this->db->update('tbl_admin_tax_law',array('status'=>1));
			$message = 'Tax Law Activated successfully';
		}
		$this->session->set_flashdata('message',$message);
		redirect(base_url('admin/master/advisor_tax_law'));
	}
	function edit_advisor_tax_law($id)
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Edit Advisor Tax Law | 5% Percent";
		$datetime = date('Y-m-d H:i:s');
		$data['taxes'] = $this->db->query("SELECT id,document_name,doc_file FROM tbl_admin_tax_law WHERE id='".$id."'")->row();
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			  $tax_name = $this->input->post('tax_name');
	          	$file = "";
				if($_FILES['file']['size']>0)
			     {
			      	$temp = explode('.', basename($_FILES['file']['name']));

			          $type2 = $_FILES["file"]["type"];
			          $new_photoid = explode('.',$_FILES["file"]["name"]); 
			          $file = rand(100,9999999).date('d_m_yhmi').'.' . end($new_photoid); 
			          move_uploaded_file($_FILES["file"]["tmp_name"],
			          "uploads/tax-law/".$file);          
			     
			      }
			      else
			      {
			      	$file = $this->input->post('old_file');
			      }        
	            $insertDataArray = array(
	            						'document_name'=>$tax_name,
	            						'doc_file'=>$file,
	            						'updated_on'=>$datetime,
	            						);
	            $this->db->where('id',$id);
	            $this->db->update('tbl_admin_tax_law',$insertDataArray);
	            $this->session->set_flashdata('message','Tax law Updated successfully');
	            redirect(base_url('admin/master/advisor_tax_law'));


		}
		else
		{
			$this->load->view('master/advisor-tax-law/edit',$data);
		}
	}
	function delete_advisor_tax_law($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('tbl_admin_tax_law');
		$this->session->set_flashdata('message','Tax law Deleted successfully');
	    redirect(base_url('admin/master/advisor_tax_law'));
	}
	function advisor_tax_law_details($id)
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Advisor Tax Law | 5% Percent";
		$data['taxes'] = $this->db->query("SELECT * FROM tbl_admin_tax_law WHERE  id='".$id."'")->row();
		//echo "<pre>";print_r($data['stock_vn30s']);die;
		$this->load->view('master/advisor-tax-law/details',$data);	
	}
	function live_news()
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Live News | 5% Percent";
		$data['live_news'] = $this->db->query("SELECT id,news_title,news_content FROM tbl_admin_live_news")->result();
		$this->load->view('master/news/list',$data);
	}
	function add_live_news()
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Add Live News | 5% Percent";
		$currentdate = date('Y-m-d H:i:s');
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$type2 = $_FILES["file"]["type"];
	        $new_photoid = explode('.',$_FILES["file"]["name"]); 
	        $file = rand(100,9999999).date('d_m_yhmi').'.' . end($new_photoid); 
	        move_uploaded_file($_FILES["file"]["tmp_name"],"uploads/news/".$file);

			$newsTitle = $this->input->post('newsTitle');
			$newsContent = $this->input->post('newsContent');
			$newsTitle = $this->input->post('newsTitle');
			$insertArray = array(
								'news_title'=>$newsTitle,
								'news_content'=>$newsContent,
								'image'=>$file,
								'created_on'=>$currentdate,
								'updated_on'=>$currentdate
								);
			$this->db->insert('tbl_admin_live_news',$insertArray);

			$this->session->set_flashdata('message','Live News added successfully');
			redirect(base_url('admin/master/live_news'));
		}
		else
		{
			$this->load->view('master/news/add',$data);
		}		
	}
	function edit_live_news($id)
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Add Live News | 5% Percent";
		$currentdate = date('Y-m-d H:i:s');
		$data['news'] = $this->db->query("SELECT * FROM tbl_admin_live_news WHERE id='".$id."'")->row();
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$file = "";
			if($_FILES['file']['size']>0)
		    {
		     	$type2 = $_FILES["file"]["type"];
		        $new_photoid = explode('.',$_FILES["file"]["name"]); 
		        $file = rand(100,9999999).date('d_m_yhmi').'.' . end($new_photoid); 
		        move_uploaded_file($_FILES["file"]["tmp_name"],"uploads/news/".$file);
		    }
		    else
		    {
		    	$file = $this->input->post('old_image');
		    }
			

			$newsTitle = $this->input->post('newsTitle');
			$newsContent = $this->input->post('newsContent');
			$newsTitle = $this->input->post('newsTitle');
			$insertArray = array(
								'news_title'=>$newsTitle,
								'news_content'=>$newsContent,
								'image'=>$file,
								'updated_on'=>$currentdate
								);
			$this->db->where('id',$id);
			$this->db->update('tbl_admin_live_news',$insertArray);

			$this->session->set_flashdata('message','Live News Updated successfully');
			redirect(base_url('admin/master/live_news'));
		}
		else
		{
			$this->load->view('master/news/edit',$data);
		}	
	}
	function delete_live_news($id)
	{
		$this->check_login();
		$this->db->where('id',$id);
		$this->db->delete('tbl_admin_live_news');
		$this->session->set_flashdata('message','Live News Deleted successfully');
		redirect(base_url('admin/master/live_news'));
	}
	function referral_code()
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Referral Code | 5% Percent";
		$data['referralCodes'] = $this->db->query("SELECT a.id,a.user_id,a.referral_code,a.status,b.first_name,b.last_name FROM tbl_admin_referral_code a INNER JOIN tbl_user_personel_info b ON a.user_id=b.user_id ORDER BY b.first_name ")->result();
		$this->load->view('master/referral-code/list',$data);
	}
	function add_referral_code()
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Add Referral Code | 5% Percent";
		$currentdate = date('Y-m-d H:i:s');
		$data['advisors'] = $this->db->query("SELECT a.id,a.user_type,b.first_name,b.last_name FROM tbl_users a INNER JOIN tbl_user_personel_info b ON a.id=b.user_id WHERE a.user_type=1 AND a.status=1 ORDER BY b.first_name ")->result();
		//echo "<pre>";print_r($data['advisors']);die;
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$advisor_id = $this->input->post('advisor_id');
			$referral_code = 'F'.date('YmdHis');
			$insertData = array(
								'user_id'=>$advisor_id,
								'referral_code'=>$referral_code,
								'created_on'=>$currentdate
								);
			$checkExistingCode = $this->db->query("SELECT * FROM tbl_admin_referral_code WHERE user_id= '".$advisor_id."'")->num_rows();
			if($checkExistingCode>0)
			{
				$this->session->set_flashdata('message','Referral Code already available for this advisor');
				redirect(base_url('admin/master/referral_code'));
			}
			else
			{
				$this->db->insert('tbl_admin_referral_code',$insertData);
				$this->session->set_flashdata('message','Referral Code added successfully');
				redirect(base_url('admin/master/referral_code'));
			}

			
		}
		else
		{
			$this->load->view('master/referral-code/add',$data);
		}	
	}
	function change_referralcode_status($id,$status)
	{
		if($status==1)
		{
			$this->db->where('id',$id);
			$this->db->update('tbl_admin_referral_code',array('status'=>0));
			$this->session->set_flashdata('message','Referral Code Deactivated successfully');
			redirect(base_url('admin/master/referral_code'));
		}
		if($status==0)
		{
			$this->db->where('id',$id);
			$this->db->update('tbl_admin_referral_code',array('status'=>1));
			$this->session->set_flashdata('message','Referral Code Activated successfully');
			redirect(base_url('admin/master/referral_code'));
		}
	}
	function delete_referral_code($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('tbl_admin_referral_code');
		$this->session->set_flashdata('message','Referral Code Deleted successfully');
		redirect(base_url('admin/master/referral_code'));
	}

	
}