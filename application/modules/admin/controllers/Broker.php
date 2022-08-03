<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Broker extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('common');
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
	function index()
	{
		$this->check_login();
		$data['title'] = "Broker - 5% Percent";
		$data['brokers'] = $this->db->query("SELECT a.status,a.id,a.dob,a.email,a.user_type,b.first_name,b.last_name,b.phone_number,b.country,b.profile_image,b.phone_number,b.expYears,c.name AS country_name FROM tbl_users a INNER JOIN tbl_user_personel_info b ON a.id=b.user_id  LEFT JOIN countries c ON b.country=c.id WHERE a.user_type=2")->result();
		//echo "<pre>"; print_r($data['user_detail']);die;
		$this->load->view('users/broker/broker',$data);
	}
	function add_broker()
	{
		$this->check_login();
		$data['title'] = "Add broker - 5% Percent";
		$data['countries'] = $this->db->query("SELECT id,name FROM countries ORDER BY name ASC")->result();
		$dateTime = date('Y-m-d H:i:s');
		if($this->input->server('REQUEST_METHOD')=='POST')
		{
			$first_name = $this->input->post('first_name');
			$last_name = $this->input->post('last_name');
			$email = $this->input->post('email');
			$phoneNumber = $this->input->post('phoneNumber');
			$dob = $this->input->post('dob');
			$country = $this->input->post('country');
			$expYears = $this->input->post('expYears');
			$terms_conditions = $this->input->post('terms_conditions');

			$logo_image = "";
			if($_FILES['logo']['size']>0)
		     {
		      	$temp = explode('.', basename($_FILES['logo']['name']));

		        $type2 = $_FILES["logo"]["type"];
		        $new_photoid2 = explode('.',$_FILES["logo"]["name"]); 
		        $logo_image = rand(100,9999999).date('d_m_yhmi').'.' . end($new_photoid2); 
		        move_uploaded_file($_FILES["logo"]["tmp_name"],"uploads/user-profile/".$logo_image);       

		      }
		     //echo $logo_image;die;
			$insertArray = array(
								'user_type'=>2,
								'email'=>$email,
								'dob'=>$dob,
								'created_on'=>$dateTime,
								'updated_on'=>$dateTime,
								);
			$this->db->insert('tbl_users',$insertArray);
			$last_user_id = $this->db->insert_id();
			$userProfileArray = array(
									 'user_id'=>$last_user_id,
									 'first_name'=>$first_name,
									 'last_name'=>$last_name,
									 'phone_number'=>$phoneNumber,
									 'expYears'=>$expYears,
									 'country'=>$country,
									 'profile_image'=>$logo_image,
									 'terms_conditions'=>$terms_conditions,
									 'created_on'=>$dateTime,
									 'updated_on'=>$dateTime,
									);
			$this->db->insert('tbl_user_personel_info',$userProfileArray);

			for($d=0;$d<count($_POST['document']);$d++)
			{
				$inertDocument = array(
										'broker_id'=>$last_user_id,
										'document'=>$_POST['document'][$d],
										'created_on'=>$dateTime,
										'updated_on'=>$dateTime,
									  );
				$this->db->insert('tbl_admin_broker_document',$inertDocument);
			}

			for($s=0;$s<count($_POST['service']);$s++)
			{
				$inertService = array(
										'broker_id'=>$last_user_id,
										'service'=>$_POST['service'][$s],
										'created_on'=>$dateTime,
										'updated_on'=>$dateTime,
									  );
				$this->db->insert('tbl_admin_broker_services',$inertService);
			}
			$this->session->set_flashdata('message','Broker Added Successfully');
			redirect(base_url('admin/broker'));

		}
		else
		{
			$this->load->view('users/broker/add',$data);
		}
	}
	function edit_broker($broker_id)
	{
		$this->check_login();
		$data['title'] = "Edit broker - 5% Percent";
		$data['countries'] = $this->db->query("SELECT id,name FROM countries ORDER BY name ASC")->result();
		$dateTime = date('Y-m-d H:i:s');
		$broker_id = base64_decode($broker_id);
		$data['broker'] = $this->db->query("SELECT a.status,a.id,a.dob,a.email,a.user_type,b.first_name,b.last_name,b.phone_number,b.country,b.profile_image,b.expYears,b.terms_conditions,c.name AS country_name FROM tbl_users a INNER JOIN tbl_user_personel_info b ON a.id=b.user_id  LEFT JOIN countries c ON b.country=c.id WHERE a.user_type=2 AND a.id='".$broker_id."'")->row();
		$data['document_lists'] = $this->db->query("SELECT id,broker_id,document FROM tbl_admin_broker_document WHERE broker_id='".$broker_id."'")->result();
		$data['services'] = $this->db->query("SELECT id,broker_id,service FROM tbl_admin_broker_services WHERE broker_id='".$broker_id."'")->result();
		if($this->input->server('REQUEST_METHOD')=='POST')
		{
			$first_name = $this->input->post('first_name');
			$last_name = $this->input->post('last_name');
			$email = $this->input->post('email');
			$phoneNumber = $this->input->post('phoneNumber');
			$dob = $this->input->post('dob');
			$country = $this->input->post('country');
			$expYears = $this->input->post('expYears');
			$terms_conditions = $this->input->post('terms_conditions');

			if($_FILES['logo']['size']>0)
		     {
		      	$temp = explode('.', basename($_FILES['logo']['name']));

		        $type2 = $_FILES["logo"]["type"];
		        $new_photoid2 = explode('.',$_FILES["logo"]["name"]); 
		        $logo_image = rand(100,9999999).date('d_m_yhmi').'.' . end($new_photoid2); 
		        move_uploaded_file($_FILES["logo"]["tmp_name"],"uploads/user-profile/".$logo_image);       

		      }
		      else
		      {
		      	$logo_image = $this->input->post('old_logo');
		      }
		     //echo $logo_image;die;
			$insertArray = array(
								'user_type'=>2,
								'email'=>$email,
								'dob'=>$dob,
								'created_on'=>$dateTime,
								'updated_on'=>$dateTime,
								);
			$this->db->where('id',$broker_id);
			$this->db->update('tbl_users',$insertArray);
			//$last_user_id = $this->db->insert_id();
			$userProfileArray = array(
									 'first_name'=>$first_name,
									 'last_name'=>$last_name,
									 'phone_number'=>$phoneNumber,
									 'expYears'=>$expYears,
									 'country'=>$country,
									 'profile_image'=>$logo_image,
									 'terms_conditions'=>$terms_conditions,
									 'created_on'=>$dateTime,
									 'updated_on'=>$dateTime,
									);
			$this->db->where('user_id',$broker_id);
			$this->db->update('tbl_user_personel_info',$userProfileArray);

			for($d=0;$d<count($_POST['document']);$d++)
			{
				$check_existing = $this->db->query("SELECT * FROM tbl_admin_broker_document WHERE id='".$_POST['doc_id'][$d]."'");
				if($check_existing->num_rows()>0)
				{
					$updateDoc = array(
										'document'=>$_POST['document'][$d],
										'updated_on'=>$dateTime,
										);
					$this->db->where('id',$_POST['doc_id'][$d]);
					$this->db->where('broker_id',$broker_id);
					$this->db->update('tbl_admin_broker_document',$updateDoc);

				}
				else
				{
					$inertDocument = array(
										'broker_id'=>$broker_id,
										'document'=>$_POST['document'][$d],
										'created_on'=>$dateTime,
										'updated_on'=>$dateTime,
									  );
					$this->db->insert('tbl_admin_broker_document',$inertDocument);	
				}
				
			}

			for($s=0;$s<count($_POST['service']);$s++)
			{
				$check_existing = $this->db->query("SELECT * FROM tbl_admin_broker_services WHERE id='".$_POST['service_id'][$s]."'");
				if($check_existing->num_rows()>0)
				{
					$updateService = array(
											'service'=>$_POST['service'][$s],
											'updated_on'=>$dateTime,
											);
					$this->db->where('id',$_POST['service_id'][$s]);
					$this->db->where('broker_id',$broker_id);
					$this->db->update('tbl_admin_broker_services',$updateService);

				}
				else
				{
					$inertService = array(
										'broker_id'=>$broker_id,
										'service'=>$_POST['service'][$s],
										'created_on'=>$dateTime,
										'updated_on'=>$dateTime,
									  );
					$this->db->insert('tbl_admin_broker_services',$inertService);
				}
				
			}
			$this->session->set_flashdata('message','Broker Updated Successfully');
			redirect(base_url('admin/broker'));
		}
		else
		{
			$this->load->view('users/broker/edit',$data);
		}

	}
	function broker_client_list($broker_id)
	{
		$this->check_login();
		$data['title'] = "Broker Client List - 5% Percent";
		$broker_id = base64_decode($broker_id);

		$data['broker_client_lists'] = $this->db->query('SELECT a.user_id AS user_id,a.broker_id AS broker_id,b.dob,b.email,c.first_name,c.last_name,c.phone_number,d.name AS country_name FROM tbl_users_brokers_management a INNER JOIN tbl_users b ON a.user_id=b.id INNER JOIN tbl_user_personel_info c ON a.user_id=c.user_id LEFT JOIN countries d ON c.country=d.id WHERE a.broker_id="'.$broker_id.'"')->result();
		//echo "<pre>";print_r($data['broker_client_lists']);die;

		$this->load->view('users/broker/broker_client_list',$data);
		
	}
	function broker_client_details($user_id,$broker_id)
	{
		$this->check_login();
		$data['title'] = "Broker Client List - 5% Percent";
		$user_id = base64_decode($user_id);
		$broker_id = base64_decode($broker_id);


		//$data['broker_client_lists'] = $this->db->query('SELECT a.user_id AS user_id,a.broker_id AS broker_id,b.dob,b.email,c.first_name,c.last_name,c.phone_number,d.name AS country_name FROM tbl_users_brokers_management a INNER JOIN tbl_users b ON a.user_id=b.id INNER JOIN tbl_user_personel_info c ON a.user_id=c.user_id LEFT JOIN countries d ON c.country=d.id WHERE a.broker_id="'.$broker_id.'"')->result();
		//echo "<pre>";print_r($data['broker_client_lists']);die;
		$data['user_detail'] = $this->db->query("SELECT a.id,a.dob,a.email,a.user_type,b.first_name,b.last_name,b.phone_number,b.martial_status,b.no_of_child,b.phone_number,c.name AS Country,d.jobtype AS jobtype FROM tbl_users a INNER JOIN tbl_user_personel_info b ON a.id=b.user_id LEFT JOIN countries c ON b.country=c.id LEFT JOIN tbl_job_type d ON  b.job_type=d.id WHERE a.id='".$user_id."'")->row();

		$data['documents'] = $this->db->query("SELECT a.document_id,a.doc_file,b.document FROM tbl_user_broker_document a INNER JOIN tbl_admin_broker_document b ON a.document_id=b.id WHERE a.user_id='".$user_id."' AND a.broker_id='".$broker_id."'")->result();
		//echo "<pre>";print_r($data['documents'] );die;
		$this->load->view('users/broker/broker_client_details',$data);
		
	}
	function remove_broker_document()
	{
		$rowid = $this->input->post('rowid');
		$this->db->where('id',$rowid);
		$this->db->delete('tbl_admin_broker_document');
		echo 1;
	}
	function remove_broker_services()
	{
		$rowid = $this->input->post('rowid');
		$this->db->where('id',$rowid);
		$this->db->delete('tbl_admin_broker_services');
		echo 1;
	}
	function enable_disable_broker($broker_id,$status)
	{
		$broker_id = base64_decode($broker_id);
		$status = base64_decode($status);
		if($status==0)
		{
			$this->db->where('id',$broker_id);
			$this->db->update('tbl_users',array('status'=>1));
			$this->session->set_flashdata('message','Broker Enabled Successfully');
			redirect(base_url('admin/broker'));
		}
		if($status==1)
		{
			$this->db->where('id',$broker_id);
			$this->db->update('tbl_users',array('status'=>0));
			$this->session->set_flashdata('message','Broker Disabled Successfully');
			redirect(base_url('admin/broker'));
		}
	}
	
}