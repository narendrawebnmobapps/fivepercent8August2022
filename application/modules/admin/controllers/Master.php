<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller 
{
	function __construct() 
	{
	    parent::__construct();
	    $this->load->model('stock_model');
	}
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
		$data['knowledge_percents'] = $this->db->query("SELECT * FROM tbl_admin_knowledge_percent ORDER BY id DESC")->result();
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
		/*	if($startPoint>$endPoint)
			{
				$this->session->set_flashdata('message','End Percent Should be greater than Start Percent');
				redirect(base_url('admin/master/add_knowledge_percent'));
			}*/
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
		$data['stock_vn30s'] = $this->db->query("SELECT * FROM tbl_admin_stock WHERE stock_type=2 ORDER BY stock_name ASC")->result();
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


	function get_simple_average($the_big_array,$c)
	{
		$count=1;
		$sum = 0;
		foreach($the_big_array as $key=> $val)
		{
			if($key>=$c)
			{
				if($count<=5)
				{
					$sum = $sum+$val[1];
				}

				$count++;
		   }
		   if($count==6)
			{
				break;
			}
			
		}
		return $sum/5;
	}
	function get_median_average($the_big_array,$c)
	{
		$count=1;
		
		$sum  = array();
		$m = 0;
		$group = array();
		foreach($the_big_array as $key=> $val)
		{
			if($key>=$c)
			{
				
				if($count<=5)
				{
					$group[] = $val[1];
				}

				$count++;
		   }
		   if($count==6)
			{
				break;
			}
			
		}
		return $this->median($group);
	}
	function get_standard_deviation($the_big_array,$c)
	{
		$count=1;
		$group = array();
		foreach($the_big_array as $key=> $val)
		{
			if($key>=$c)
			{
				
				if($count<=5)
				{
					$group[] = $val[1];
				}

				$count++;
		   }
		   if($count==6)
			{
				break;
			}
			
		}
		return $this->stats_standard_deviation($group,1);
	}
	function test_csv_table()
	{
		$the_big_array = [];
		$handle = fopen('uploads/stock/0bb429d170ba0a4065762ed0bf5637f2.csv', 'r');
		$c = 0;//
		while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
		{
			
			if($c!=0)
			{		
				$the_big_array[] = $filesop;
			}
			$c++;
		}
		$count = 1;
		$average = 0;
		$sum = 0;

		$x[0]=0;
		$simpleAverage[0]=0;
		$medianAverage[0]=0;
		$minusFirstStandardDeviation[0]=0;
		$plusFirstStandardDeviation[0]=0;
		$minusSecondStandardDeviation[0]=0;
		$plusSecondStandardDeviation[0]=0;
		$c=0;
		foreach($the_big_array as $val)
		{
			if($count==(5+$c))
			{
				
				$simpleAverage[$c]=$this->get_simple_average($the_big_array,$c);
				$medianAverage[$c]=$this->get_median_average($the_big_array,$c);
				//$x[$c] = $this->get_standard_deviation($the_big_array,$c);
				$minusFirstStandardDeviation[$c] = $this->get_median_average($the_big_array,$c)-$this->get_standard_deviation($the_big_array,$c);

				$plusFirstStandardDeviation[$c] = $this->get_median_average($the_big_array,$c)+$this->get_standard_deviation($the_big_array,$c);
				$minusSecondStandardDeviation[$c] = $this->get_median_average($the_big_array,$c)-(2*$this->get_standard_deviation($the_big_array,$c));
				$plusSecondStandardDeviation[$c] = $this->get_median_average($the_big_array,$c)+(2*$this->get_standard_deviation($the_big_array,$c));
				$c++;	
			}
			$count++;
		}
		echo"<pre>";
		/*print_r($simpleAverage);
		print_r($medianAverage);
		print_r($minusFirstStandardDeviation);
		print_r($plusFirstStandardDeviation);
		print_r($minusSecondStandardDeviation);
		print_r($plusSecondStandardDeviation);*/
		$cc = 1;
		$ema = array();
		$last_ema = 0;
		foreach(array_reverse($the_big_array) as $value)
		{	
			if($cc==1)
			{
				$last_ema = $last_ema+$this->calculate_exponential_median_average($last_ema,$value[1],5);
				$ema[] = $this->calculate_exponential_median_average($last_ema,$value[1],5);
			}
			else
			{
				$last_ema = $last_ema+$this->calculate_exponential_median_average($last_ema,$value[1],5);
				$ema[] = $this->calculate_exponential_median_average($last_ema,$value[1],5);
			}
			$cc++;

		}
		//echo $last_ema."<br>";
		print_r($ema);

		echo $this->calculate_exponential_median_average(0,2,5)."<br>";
		echo $this->calculate_exponential_median_average(0.66666666666667,3,5)."<br>";
		echo $this->calculate_exponential_median_average(1,4,5)."<br>";
		echo $this->calculate_exponential_median_average(1.3333333333333,5,5)."<br>";
		echo $this->calculate_exponential_median_average(1.6666666666667,7,5)."<br>";

		//echo $this->standard_deviation(array(30,32,31,30,25),1);
		//echo $this->stats_standard_deviation(array(30,32,31,30,25),1);
		/*echo $this->median(array(30,32,31,30,40,42))."<br>";
		echo $this->calculate_average(array(30,32,31,30,40,42))."<br>";
		echo $this->calculate_exponential_median_average(0,32,5)."<br>";
		echo $this->calculate_exponential_median_average(16.66,31,5);*/
	}
	function calculate_exponential_median_average($yesterday_ema,$price,$period)
	{
		$ema = 0;
		$ema = ($yesterday_ema +($price-$yesterday_ema))*(2/($period+1));
		return $ema;
	}
	function standard_deviation($aValues, $bSample = false)
	{
	    $fMean = array_sum($aValues) / count($aValues);
	    $fVariance = 0.0;
	    foreach ($aValues as $i)
	    {
	        $fVariance += pow($i - $fMean, 2);
	    }
	    $fVariance /= ( $bSample ? count($aValues) - 1 : count($aValues) );
	    return (float) sqrt($fVariance);
	}
	function stats_standard_deviation(array $a, $sample = false) 
	{
        $n = count($a);
        if ($n === 0) {
            trigger_error("The array has zero elements", E_USER_WARNING);
            return false;
        }
        if ($sample && $n === 1) {
            trigger_error("The array has only 1 element", E_USER_WARNING);
            return false;
        }
        $mean = array_sum($a) / $n;
        $carry = 0.0;
        foreach ($a as $val) {
            $d = ((double) $val) - $mean;
            $carry += $d * $d;
        };
        if ($sample) {
           --$n;
        }
        return sqrt($carry / $n);
    }
    function calculate_median($arr) 
    {
	    $count = count($arr); //total numbers in array
	    $middleval = floor(($count-1)/2); // find the middle value, or the lowest middle value
	    if($count % 2==1) 
	    { 
	    	// odd number, middle is the median
	        $median = $arr[$middleval];
	    } 
	    else 
	    { 
	    	// even number, calculate avg of 2 medians
	        $low = $arr[$middleval];
	        $high = $arr[$middleval+1];
	        $median = (($low+$high)/2);
	    }
	    return $median;
	}
	function median($arr)
	{
	    if($arr)
	    {
	        $count = count($arr);
	        sort($arr);
	        $mid = floor(($count-1)/2);
	        return ($arr[$mid]+$arr[$mid+1-$count%2])/2;
	    }
    	return 0;
	}
	function calculate_average($arr) 
	{
    	return array_sum($arr) / count($arr);
	}
	function upload_stock_vn30_historical_data()
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Upload stock VN30 Historical Data | 5% Percent";
		$this->load->helper('file');
		$datetime = date('Y-m-d H:i:s');
		$data['categories'] = $this->db->query("SELECT id,industry FROM tbl_admin_stock_industries ORDER BY industry ASC")->result();
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$this->form_validation->set_rules('category', 'Stack Category', 'required',array('required'=>'Please Select a %s'));
			$this->form_validation->set_rules('stockname', 'Stack Name', 'required',array('required'=>'Please enter a %s'));
			$stockname = $this->input->post('stockname');
			$price = $this->input->post('price');
			$category = $this->input->post('category');
			$volatility = $this->input->post('volatility');
			$dividend = $this->input->post('dividend');
			$interest_rate = $this->input->post('interest_rate');
			$symbol = $this->input->post('symbol');
            if($this->form_validation->run() == true)
            {
                $insertDataArray = array(
                						'stock_type'=>2,
                						'industry_id'=>$category,
                						'stock_name'=>$stockname,
                						'price'=>$price,
                						'volatility'=>$volatility,
                						'dividend'=>$dividend,
                						'interest_rate'=>$interest_rate,
                						'symbol'=>$symbol,
                						//'stock_file'=>$uploadedFile,
                						'status'=>1,
                						'created_on'=>$datetime,
                						);
                $this->db->insert('tbl_admin_stock',$insertDataArray);
                $insert_id = $this->db->insert_id();
                $this->session->set_flashdata('message','Stock Added successfully');
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
    function delete_vn30_stock($id,$file='')
    {
    	$this->db->where('id',$id);
    	$this->db->delete('tbl_admin_stock');
    	@unlink('uploads/stock/'.$file);
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
		$data['categories'] = $this->db->query("SELECT id,industry FROM tbl_admin_stock_industries ORDER BY industry ASC")->result();
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$this->form_validation->set_rules('stockname', 'Stack Name', 'required',array('required'=>'Please enter a %s'));
			$stockname = $this->input->post('stockname');
			$price = $this->input->post('price');
			$category = $this->input->post('category');
			$volatility = $this->input->post('volatility');
			$dividend = $this->input->post('dividend');
			$interest_rate = $this->input->post('interest_rate');
			$symbol = $this->input->post('symbol');
            if($this->form_validation->run() == true)
            {               

                $insertDataArray = array(
                						'industry_id'=>$category,
                						'stock_name'=>$stockname,
                						'price'=>$price,
                						'volatility'=>$volatility,
                						'dividend'=>$dividend,
                						'interest_rate'=>$interest_rate,
                						'symbol'=>$symbol,
                						//'stock_file'=>$uploadedFile,
                						'created_on'=>$datetime,
                						);
                $this->db->where('id',$id);
                $this->db->update('tbl_admin_stock',$insertDataArray);
                $this->session->set_flashdata('message','Stock Updated successfully');
                redirect(base_url('admin/master/stock_vn30'));

            }
            else
            {
            	$this->load->view('master/stock/vn30/edit',$data);
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
		$data['stock_ibex35s'] = $this->db->query("SELECT * FROM tbl_admin_stock WHERE stock_type=1 ORDER BY stock_name ASC")->result();
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
		$data['historical_data'] = $this->db->query("SELECT * FROM tbl_admin_stock_historical_data WHERE stock_id='".$id."'")->result();
		$this->load->view('master/stock/ibex35/details',$data);	
	}

	function upload_stock_ibex35_historical_data()
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Upload stock IBEX35 Historical Data | 5% Percent";
		$this->load->helper('file');
		$datetime = date('Y-m-d H:i:s');
		$data['categories'] = $this->db->query("SELECT id,industry FROM tbl_admin_stock_industries ORDER BY industry ASC")->result();
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$this->form_validation->set_rules('category', 'Stack Category', 'required',array('required'=>'Please Select a %s'));
			$this->form_validation->set_rules('stockname', 'Stack Name', 'required',array('required'=>'Please enter a %s'));
			$stockname = $this->input->post('stockname');
			$price = $this->input->post('price');
			$category = $this->input->post('category');
			$volatility = $this->input->post('volatility');
			$dividend = $this->input->post('dividend');
			$interest_rate = $this->input->post('interest_rate');
			$symbol = $this->input->post('symbol');
            if($this->form_validation->run() == true)
            {
                $insertDataArray = array(
                						'stock_type'=>1,
                						'industry_id'=>$category,
                						'stock_name'=>$stockname,
                						'price'=>$price,
                						'volatility'=>$volatility,
                						'dividend'=>$dividend,
                						'interest_rate'=>$interest_rate,
                						'symbol'=>$symbol,
                						//'stock_file'=>$uploadedFile,
                						'status'=>1,
                						'created_on'=>$datetime,
                						);
                $this->db->insert('tbl_admin_stock',$insertDataArray);
                $this->session->set_flashdata('message','Stock has been Added  successfully');
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

	function upload_historical_data($id,$type)
	{
		error_reporting(0);
		$this->check_login();
		$data = array();
		$data['title'] = "Upload Historical Data | 5% Percent";
		$this->load->helper('file');
		$datetime = date('Y-m-d H:i:s');
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$this->form_validation->set_rules('file', 'Historical CSV File', 'callback_file_check');
            if($this->form_validation->run() == true)
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

                $getAllData = $this->stock_model->get_price_file_handling($uploadedFile);                
                $fVariance = $this->stock_model->calculateCustomVariance(array_slice($getAllData, 0,1000));
                $getData = $this->stock_model->stats_standard_deviation($fVariance,1);
                $volatility = number_format($getData,2,'.','');
                //echo "<pre>";print_r($volatility);die;
                $repalceComma = str_replace(",","",$getAllData[0][1]);
                $insertDataArray = array(
                						'stock_file'=>$uploadedFile,
                						'volatility'=>$volatility,
                						'price'=>$repalceComma,
                						);
                $this->db->where('id',$id);
                $this->db->update('tbl_admin_stock',$insertDataArray);               

                $this->session->set_flashdata('message','Historical data uploaded successfully');
                //redirect(base_url('admin/master/stock_ibex35'));
                if($type==1)
                {
                	redirect(base_url('admin/master/detail_stock_ibex35/'.$id));
                }
                else
                {
                	redirect(base_url('admin/master/detail_stock_vn30/'.$id));
                }

            }
            else
            {
            	$this->load->view('master/stock/ibex35/add_historical_data',$data);
            }

		}
		else
		{
			$this->load->view('master/stock/ibex35/add_historical_data',$data);
		}
	}
    function delete_ibex35_stock($id,$file='')
    {
    	$this->db->where('id',$id);
    	$this->db->delete('tbl_admin_stock');

    	//delete historical data
    	$this->db->where('stock_id',$id);
    	$this->db->delete('tbl_admin_stock_historical_data');
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
		$data['categories'] = $this->db->query("SELECT id,industry FROM tbl_admin_stock_industries ORDER BY industry ASC")->result();
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$this->form_validation->set_rules('stockname', 'Stack Name', 'required',array('required'=>'Please enter a %s'));
			$stockname = $this->input->post('stockname');
			$price = $this->input->post('price');
			$category = $this->input->post('category');
			$volatility = $this->input->post('volatility');
			$dividend = $this->input->post('dividend');
			$interest_rate = $this->input->post('interest_rate');
			$symbol = $this->input->post('symbol');
            if($this->form_validation->run() == true)
            {               

                $insertDataArray = array(
                						'industry_id'=>$category,
                						'stock_name'=>$stockname,
                						'price'=>$price,
                						'volatility'=>$volatility,
                						'dividend'=>$dividend,
                						'interest_rate'=>$interest_rate,
                						'symbol'=>$symbol,
                						//'stock_file'=>$uploadedFile,
                						'created_on'=>$datetime,
                						);
                $this->db->where('id',$id);
                $this->db->update('tbl_admin_stock',$insertDataArray);             
                $this->session->set_flashdata('message','Stock has been updated successfully');
                redirect(base_url('admin/master/stock_ibex35'));

            }
            else
            {
            	$this->load->view('master/stock/ibex35/edit',$data);
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
		$data['live_news'] = $this->db->query("SELECT id,section,news_title,news_content FROM tbl_admin_live_news")->result();
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
	        $section = $this->input->post('section');
			$newsTitle = $this->input->post('newsTitle');
			$newsContent = $this->input->post('newsContent');
			$newsTitle = $this->input->post('newsTitle');
			$insertArray = array(
								'section'=>$section,
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
			
		    $section = $this->input->post('section');
			$newsTitle = $this->input->post('newsTitle');
			$newsContent = $this->input->post('newsContent');
			$newsTitle = $this->input->post('newsTitle');
			$insertArray = array(
								'section'=>$section,
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

	/******************Sanjeet investments funds*******************************/
	function investments_vn30()
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Investments VN30 | 5% Percent";
		$data['vn30_investments'] = $this->db->query("SELECT * FROM tbl_admin_investments WHERE investments_type=2")->result();
		$this->load->view('master/investments/vn30_investments',$data);
	}

	function add_vn30_investments()
	{
		$this->check_login();
		$data = array();
		$data['title'] = " Add Investments VN30 | 5% Percent";
		$currentdate = date('Y-m-d H:i:s');
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			//echo "<pre>"; print_r($_POST);die;
			$fund_name = $this->input->post('fund_name');
			$fund_commission = $this->input->post('fund_commission');
			$fund_type = $this->input->post('fund_type');
			$fund_description = $this->input->post('fund_description');
			$insertArray = array(
								'fund_name'=>$fund_name,
								'fund_commission'=>$fund_commission,
								'fund_type'=>$fund_type,
								'fund_description'=>$fund_description,
								'investments_type'=>2,
								'created_at'=>$currentdate,
								);
			$this->db->insert('tbl_admin_investments',$insertArray);
			$this->session->set_flashdata('message','Investments added successfully');
			redirect(base_url('admin/master/investments_vn30'));
		}
		$this->load->view('master/investments/add_vn30_investments',$data);
	}

	function edit_investments_vn30($id)
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Edit VN30 investments - 5% Percent";
		$data['spain_investments'] = $this->db->query("SELECT * FROM tbl_admin_investments  WHERE investments_id='".$id."'")->row();
   
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$fund_name = $this->input->post('fund_name');
			$investments_id = $this->input->post('investments_id');
			$fund_commission = $this->input->post('fund_commission');
			$fund_type = $this->input->post('fund_type');
			$fund_description = $this->input->post('fund_description');
			$insertArray = array(
								'fund_name'=>$fund_name,
								'fund_commission'=>$fund_commission,
								'fund_type'=>$fund_type,
								'fund_description'=>$fund_description,
								);
			$this->db->where('investments_id',$investments_id);
			$this->db->update('tbl_admin_investments',$insertArray);
			$this->session->set_flashdata('message','VN30 Investments Updated successfully');
			redirect(base_url('admin/master/investments_vn30'));

		}

		$this->load->view('master/investments/edit_vn30_investments',$data);
	}

	 function delete_investments_vn30($id)
    {
    	$this->db->where('investments_id',$id);
    	$this->db->delete('tbl_admin_investments');
    	$this->session->set_flashdata('message','Investments data deleted successfully');
    	redirect(base_url('admin/master/investments_vn30'));
    }



	function investments_ibex35()
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Investments  | 5% Percent";
		$data['ibex35_investments'] = $this->db->query("SELECT * FROM tbl_admin_investments WHERE investments_type=1")->result();
		$this->load->view('master/investments/ibex35_investments',$data);
	}

	function add_ibex35_investments()
	{
		$this->check_login();
		$data = array();
		$data['title'] = " Add Investments IBEX35 | 5% Percent";
		$currentdate = date('Y-m-d H:i:s');
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			//echo "<pre>"; print_r($_POST);die;
			$fund_name = $this->input->post('fund_name');
			$fund_commission = $this->input->post('fund_commission');
			$fund_type = $this->input->post('fund_type');
			$fund_description = $this->input->post('fund_description');
			$insertArray = array(
								'fund_name'=>$fund_name,
								'fund_commission'=>$fund_commission,
								'fund_type'=>$fund_type,
								'fund_description'=>$fund_description,
								'investments_type'=>1,
								'created_at'=>$currentdate,
								);
			$this->db->insert('tbl_admin_investments',$insertArray);
			$this->session->set_flashdata('message','Investments added successfully');
			redirect(base_url('admin/master/investments_ibex35'));
		}
		$this->load->view('master/investments/add_ibex35_investments',$data);
	}

	function edit_investments_ibex35($id)
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Edit ibex35 investments - 5% Percent";
		$data['spain_investments'] = $this->db->query("SELECT * FROM tbl_admin_investments  WHERE investments_id='".$id."'")->row();
   
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$fund_name = $this->input->post('fund_name');
			$investments_id = $this->input->post('investments_id');
			$fund_commission = $this->input->post('fund_commission');
			$fund_type = $this->input->post('fund_type');
			$fund_description = $this->input->post('fund_description');
			$insertArray = array(
								'fund_name'=>$fund_name,
								'fund_commission'=>$fund_commission,
								'fund_type'=>$fund_type,
								'fund_description'=>$fund_description,
								);
			$this->db->where('investments_id',$investments_id);
			$this->db->update('tbl_admin_investments',$insertArray);
			$this->session->set_flashdata('message','IBEX35 Investments Updated successfully');
			redirect(base_url('admin/master/investments_ibex35'));

		}

		$this->load->view('master/investments/edit_ibex35_investments',$data);
	}

	 function delete_investments_ibex35($id)
    {
    	$this->db->where('investments_id',$id);
    	$this->db->delete('tbl_admin_investments');
    	$this->session->set_flashdata('message','Investments data deleted successfully');
    	redirect(base_url('admin/master/investments_ibex35'));
    }
    function details_investments_ibex35($id)
    {
    	$this->check_login();
		$data = array();
		$data['title'] = "Edit ibex35 investments - 5% Percent";
		$data['spain_investments'] = $this->db->query("SELECT * FROM tbl_admin_investments  WHERE investments_id='".$id."'")->row();
		if($data['spain_investments']->investments_type==1)
		{
			$data['title'] = "ibex35 investments - ".$data['spain_investments']->fund_name;
		}
		else
		{
			$data['title'] = "VN30 investments - ".$data['spain_investments']->fund_name;
		}
		
		$this->load->view('master/investments/details',$data);
    }
    function upload_investment_historical_data($id)
    {
    	$this->check_login();
		$data = array();
		$data['title'] = "Upload Historical Data | 5% Percent";
		$this->load->helper('file');
		$datetime = date('Y-m-d H:i:s');
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$this->form_validation->set_rules('file', 'Historical CSV File', 'callback_file_check');
            if($this->form_validation->run() == true)
            {
				$get_file_name = $this->db->query("SELECT investment_file FROM tbl_admin_investments WHERE investments_id='".$id."'")->row()->investment_file;
            	@unlink('uploads/stock/'.$get_file_name);
				//upload configuration
                $config['upload_path']   = 'uploads/investments/';
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
                						'investment_file'=>$uploadedFile,
                						);
                $this->db->where('investments_id',$id);
                $this->db->update('tbl_admin_investments',$insertDataArray);               
                $this->session->set_flashdata('message','Historical data uploaded successfully');
       
                redirect(base_url('admin/master/details_investments_ibex35/'.$id));

            }
            else
            {
            	$this->load->view('master/investments/add_historical_data',$data);
            }

		}
		else
		{
			$this->load->view('master/investments/add_historical_data',$data);
		}
    }
    function warning_alert()
    {
    	$this->check_login();
		$data = array();
		$data['title'] = "Warning Alert | 5% Percent";
		$data['warning_alerts'] = $this->db->query("SELECT id,subject,description,status FROM tbl_admin_warning_alert")->result();
		$this->load->view('master/warning-alert/list',$data);
    }

    function add_warning_alert()
    {
    	$this->check_login();
		$data = array();
		$data['title'] = "Add Warning Alert | 5% Percent";
		$currentdate = date('Y-m-d H:i:s');
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$subject = $this->input->post('subject');
			$description = $this->input->post('description');
			$insertArray = array(
								'subject'=>$subject,
								'description'=>$description,
								'created_on'=>$currentdate,
								'updated_on'=>$currentdate
								);
			$this->db->insert('tbl_admin_warning_alert',$insertArray);

			$this->session->set_flashdata('message','Warning Alert added successfully');
			redirect(base_url('admin/master/warning_alert'));
		}
		else
		{
			$this->load->view('master/warning-alert/add',$data);
		}
		
    }
    function edit_warning_alert($id)
    {
    	$this->check_login();
		$data = array();
		$data['title'] = "Edit Warning Alert - 5% Percent";
		$currentdate = date('Y-m-d H:i:s');
		$data['warning_alert'] = $this->db->query("SELECT id,subject,description FROM tbl_admin_warning_alert  WHERE id='".$id."'")->row();
		
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$subject = $this->input->post('subject');
			$description = $this->input->post('description');
			$insertArray = array(
								'subject'=>$subject,
								'description'=>$description,
								);
			$this->db->where('id',$id);
			$this->db->update('tbl_admin_warning_alert',$insertArray);

			$this->session->set_flashdata('message','Warning Alert updated successfully');
			redirect(base_url('admin/master/warning_alert'));

		}
		else
		{
			$this->load->view('master/warning-alert/edit',$data);
		}
		
    }

    function delete_warning_alert($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('tbl_admin_warning_alert');
		$this->session->set_flashdata('message','Warning Alert deleted successfully');
		redirect(base_url('admin/master/warning_alert'));
	}

	function stock_category()
    {
    	$this->check_login();
		$data = array();
		$data['title'] = "Stock Category | 5% Percent";
		$data['categories'] = $this->db->query("SELECT id,industry FROM tbl_admin_stock_industries ORDER BY industry ASC")->result();
		$this->load->view('master/stock-category/list',$data);
    }
    function add_stock_category()
    {
    	$this->check_login();
		$data = array();
		$data['title'] = "Add Stock Category | 5% Percent";
		$currentdate = date('Y-m-d H:i:s');
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$category = $this->input->post('category');
			$insertArray = array(
								'industry'=>$category,
								'created_on'=>$currentdate,
								'updated_on'=>$currentdate
								);
			$this->db->insert('tbl_admin_stock_industries',$insertArray);

			$this->session->set_flashdata('message','Stock Category added successfully');
			redirect(base_url('admin/master/stock_category'));
		}
		else
		{
			$this->load->view('master/stock-category/add',$data);
		}
    }
    function delete_stock_category($id)
    {
    	$checkUseIt = $this->db->query("SELECT * FROM tbl_admin_stock WHERE industry_id='".$id."' ")->num_rows();
    	if($checkUseIt>0)
    	{
    		$this->session->set_flashdata('message','You can\'t delete this category because it is used in stock');
			redirect(base_url('admin/master/stock_category'));
    	}
    	else
    	{
    		$this->db->where('id',$id);
			$this->db->delete('tbl_admin_stock_industries');
			$this->session->set_flashdata('message','Stock Category deleted successfully');
			redirect(base_url('admin/master/stock_category'));
    	}
    	
    }
    function edit_stock_category($id)
    {
    	$this->check_login();
		$data = array();
		$data['title'] = "Edit Stock Category - 5% Percent";
		$currentdate = date('Y-m-d H:i:s');
		$data['stock_category'] = $this->db->query("SELECT id,industry FROM tbl_admin_stock_industries  WHERE id='".$id."'")->row();
		
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$category = $this->input->post('category');
			$insertArray = array(
								'industry'=>$category,
								'updated_on'=>$currentdate
								);
			$this->db->where('id',$id);
			$this->db->update('tbl_admin_stock_industries',$insertArray);

			$this->session->set_flashdata('message','Stock Category updated successfully');
			redirect(base_url('admin/master/stock_category'));

		}
		else
		{
			$this->load->view('master/stock-category/edit',$data);
		}
    }
    function stock_configuration()
    {
    	$this->check_login();
		$data = array();
		$data['title'] = "Stock Configuration | 5% Percent";
		$data['configurations'] = $this->db->query("SELECT * FROM tbl_admin_stock_configuration")->result();
		//echo "<pre>";print_r($data['configurations']);die;
		$this->load->view('master/stock/configuration/list',$data);
    }
    function edit_stock_configuration($id)
    {
    	$this->check_login();
		$data = array();
		$data['title'] = "Edit Stock Configuration | 5% Percent";
		$data['configuration'] = $this->db->query("SELECT * FROM tbl_admin_stock_configuration WHERE id='".$id."'")->row();
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$typeOfRisk = $this->input->post('typeOfRisk');
			$startPoint = $this->input->post('startPoint');
			$endPoint = $this->input->post('endPoint');
			$updateArr = array(
								'typeOfRisk'=>$typeOfRisk,
								'startPoint'=>$startPoint,
								'endPoint'=>$endPoint,
							);
			$this->db->where('id',$id);
			$this->db->update('tbl_admin_stock_configuration',$updateArr);
			$this->session->set_flashdata('message','Stock Category updated successfully');
			redirect(base_url('admin/master/stock_configuration'));
		}
		else
		{
			//echo "<pre>";print_r($data['configurations']);die;
			$this->load->view('master/stock/configuration/edit',$data);
		}
		
    }
    function user_maximum_profitability()
    {
    	$this->check_login();
		$data = array();
		$data['title'] = "User Maximum Profitability | 5% Percent";
		$data['maximum_profitability'] = $this->db->query("SELECT * FROM set_user_maximum_profitability")->result();
		//echo "<pre>";print_r($data['maximum_profitability']);die;
		$this->load->view('master/user_maximum_profitability/list',$data);
    }
    function edit_user_maximum_profitability($id)
    {
    	$this->check_login();
		$data = array();
		$data['title'] = "Edit User Maximum Profitability - 5% Percent";
		$currentdate = date('Y-m-d H:i:s');
		$data['maximum'] = $this->db->query("SELECT * FROM set_user_maximum_profitability  WHERE id='".$id."'")->row();
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$level = $this->input->post('level');
			$percentage = $this->input->post('percentage');
			$insertArray = array(
								'level'=>$level,
								'percentage'=>$percentage,
								);
			$this->db->where('id',$id);
			$this->db->update('set_user_maximum_profitability',$insertArray);

			$this->session->set_flashdata('message','User Maximum Profitability updated successfully');
			redirect(base_url('admin/master/user_maximum_profitability'));

		}
		$this->load->view('master/user_maximum_profitability/edit',$data);
    }
	function set_simulation_number_with_user_level()
    {
    	$this->check_login();
		$data = array();
		$data['title'] = "No of Simulation | 5% Percent";
		$data['numofsimulation'] = $this->db->query("SELECT * FROM tbl_simulation_count_with_user_level")->result();
		//echo "<pre>";print_r($data['numofsimulation']);die;
		$this->load->view('master/user_maximum_profitability/simulation_level_number',$data);
    }
    function edit_no_of_simulation_by_user_level($id)
    {
    	$this->check_login();
		$data = array();
		$data['title'] = "Edit No of Simulation - 5% Percent";
		$currentdate = date('Y-m-d H:i:s');
		$data['maximum'] = $this->db->query("SELECT * FROM tbl_simulation_count_with_user_level  WHERE id='".$id."'")->row();
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$percentage = $this->input->post('percentage');
			$insertArray = array(
								'numberOfSimulation'=>$percentage,
								);
			$this->db->where('id',$id);
			$this->db->update('tbl_simulation_count_with_user_level',$insertArray);

			$this->session->set_flashdata('message','Number of Simulation updated successfully');
			redirect(base_url('admin/master/set_simulation_number_with_user_level'));

		}
		$this->load->view('master/user_maximum_profitability/edit_no_of_simulation',$data);
    }
    function top_five_investment_funds()
    {
    	$this->check_login();
		$data = array();
		$data['title'] = "Top 5 Investment funds  | 5% Percent";
		$data['ibex35_investments'] = $this->db->query("SELECT a.id AS fNDID,b.* FROM tbl_topFiveInvestmentFunds a INNER JOIN tbl_admin_investments b ON a.fundID=b.investments_id")->result();
		//echo "<pre>";print_r($data['ibex35_investments']);die();
		$this->load->view('master/topfiveinvestments/ibex35_investments',$data);
    }
    function add_top_five_investments()
    {
    	$this->check_login();
		$data = array();
		$data['title'] = " Add Investments IBEX35 | 5% Percent";
		$currentdate = date('Y-m-d H:i:s');
		$data['fundslists'] = $this->db->query("SELECT investments_id,fund_name FROM tbl_admin_investments ORDER BY fund_name ASC")->result();
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{

			//echo "<pre>"; print_r($_POST);die;
			$fund_id = $this->input->post('fund_id');
			$referencelink = $this->input->post('referencelink');
			$checkAlreadyExist = $this->db->query("SELECT * FROM tbl_topFiveInvestmentFunds WHERE fundID='".$fund_id."'");
			if($checkAlreadyExist->num_rows()>0)
			{
				$this->session->set_flashdata('message','Alreay Exist');
				redirect(base_url('admin/master/top_five_investment_funds'));
			}
			$insertArray = array(
								'fundID'=>$fund_id,
								'referenceLink'=>$referencelink,
								);
			$this->db->insert('tbl_topFiveInvestmentFunds',$insertArray);
			$this->session->set_flashdata('message','Top 5 Investment fund added successfully');
			redirect(base_url('admin/master/top_five_investment_funds'));
		}
		else
		{
			$this->load->view('master/topfiveinvestments/add_ibex35_investments',$data);
		}
		
    }
    function edit_top_five_investments_ibex35($id)
    {
    	$this->check_login();
		$data = array();
		$data['title'] = " Add Investments IBEX35 | 5% Percent";
		$currentdate = date('Y-m-d H:i:s');
		$data['fundslists'] = $this->db->query("SELECT investments_id,fund_name FROM tbl_admin_investments ORDER BY fund_name ASC")->result();
		$data['funds'] = $this->db->query("SELECT a.id AS fNDID,a.referenceLink,a.fundID,b.* FROM tbl_topFiveInvestmentFunds a INNER JOIN tbl_admin_investments b ON a.fundID=b.investments_id WHERE a.id='".$id."'")->row();
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			//echo "<pre>"; print_r($_POST);die;
			$fund_id = $this->input->post('fund_id');
			$referencelink = $this->input->post('referencelink');
			$insertArray = array(
								//'fundID'=>$fund_id,
								'referenceLink'=>$referencelink,
								);
			$this->db->where('id',$id);
			$this->db->update('tbl_topFiveInvestmentFunds',$insertArray);
			$this->session->set_flashdata('message','Top 5 Investment fund updated successfully');
			redirect(base_url('admin/master/top_five_investment_funds'));
		}
		else
		{
			$this->load->view('master/topfiveinvestments/edit_ibex35_investments',$data);
		}
    }
    function delete_top_five_investments_ibex35($id)
    {
    	$this->db->where('id',$id);
    	$this->db->delete('tbl_topFiveInvestmentFunds');
    	$this->session->set_flashdata('message','Top 5 Investments fund deleted successfully');
    	redirect(base_url('admin/master/top_five_investment_funds'));
    }
    function add_update_fundamental_data($type,$id)
    {
    	$this->check_login();
		$data = array();
		$data['title'] = "Fundamental Record | 5% Percent";
		$data['fundamentals'] = $this->db->query("SELECT * FROM tbl_admin_stock WHERE id='".$id."'")->row();
		if($type==1)
		{
			$data['stockeType'] = 'IBEX35';
		}
		else
		{
			$data['stockeType'] = 'VN30';
		}
		//echo "<pre>";print_r($data['fundamentals']);die();
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			//echo "<pre>";print_r($_POST);die();
			$arrayInsert = array(
								'nonCurrentAssets'=>$this->input->post('noncurrentassets'),
								'currentAssets'=>$this->input->post('currentassets'),
								'cash'=>$this->input->post('cash'),
								'netReceivable'=>$this->input->post('netReceivable'),
								'inventory'=>$this->input->post('inventory'),
								'otherCurrentAssets'=>$this->input->post('otherCurrentAssets'),
								'equity'=>$this->input->post('equity'),
								'nonCurrentLiabilities'=>$this->input->post('nonCurrentLiabilities'),
								'currentLiabilities'=>$this->input->post('currentLiabilities'),
								'debtBorrowing'=>$this->input->post('debtBorrowing'),
								'debtQuality'=>$this->input->post('debtQuality'),
								'liquidityLiquidity'=>$this->input->post('liquidityLiquidity'),
								'liquidityTreasury'=>$this->input->post('liquidityTreasury'),
								'liquidityAcidTest'=>$this->input->post('liquidityAcidTest'),
								'forwardPE_PER'=>$this->input->post('forwardPE_PER'),
								'pegRatio_PEG'=>$this->input->post('pegRatio_PEG'),
								'otherBeta'=>$this->input->post('otherBeta'),
								'otherDividendRate'=>$this->input->post('otherDividendRate'),
								'otherOperatingMargin'=>$this->input->post('otherOperatingMargin'),
								);

			$this->db->where('id',$id);
			$this->db->update('tbl_admin_stock',$arrayInsert);
			$this->session->set_flashdata('message','Show Record has been updated successfully');
			if($type==2)
			{
				redirect(base_url('admin/master/stock_vn30'));
			}
			else
			{
				redirect(base_url('admin/master/stock_ibex35'));
			}
			redirect(base_url('admin/master/add_update_fundamental_data/'.$type.'/'.$id));
		}
		else
		{
			$this->load->view('master/stock/fundamental-data',$data);
		}
		
    }
}