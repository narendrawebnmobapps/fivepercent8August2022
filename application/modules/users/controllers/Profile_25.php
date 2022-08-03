<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('common');
		$this->config->load('paypal');
	    $this->load->library('Paypal_lib');
	}
	function index()
	{
		$this->common->check_user_login();
		$data = array();
		$data['title'] = 'Edit Profile | Five Percent';
		$data['sub_title'] = 'My Profile';
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
		$status = $this->session->userdata('status');

		$data['user_detail'] = $this->db->query("SELECT a.id,a.dob,a.email,a.user_type,b.first_name,b.last_name,b.phone_number,b.martial_status,b.no_of_child,b.job_type,b.country,b.app_usage,b.talk_to_advisor,b.profile_image,b.phone_number,b.expYears,b.speciality,b.certificate FROM tbl_users a INNER JOIN tbl_user_personel_info b ON a.id=b.user_id WHERE a.id='".$user_id."'")->row();
		$data['jobtypes'] = $this->db->query("SELECT * FROM tbl_job_type")->result();
		$data['app_ussages'] = $this->db->query("SELECT * FROM tbl_app_ussage")->result();
		$data['countries'] = $this->db->query("SELECT id,name FROM countries ORDER BY name ASC")->result();
		//advisor referral code
		$check_referral_code = $this->db->query("SELECT referral_code FROM tbl_admin_referral_code WHERE user_id='".$user_id."'");
		if($check_referral_code->num_rows()>0)
		{
			$data['referral_code'] = $check_referral_code->row()->referral_code;
		}
		else
		{
			$data['referral_code'] = 'Not Available';
		}

		$currentdate = date('Y-m-d H:i:s');
		if($user_type==1)
		{
			
			if($this->input->server('REQUEST_METHOD')=='POST')
			{
				$fname = $this->input->post('fname');
				$lname = $this->input->post('lname');
				$date_of_birth = $this->input->post('date_of_birth');
				$email = $this->input->post('email');
				$expYears = $this->input->post('expYears');
				$advisorSpeciality = $this->input->post('advisorSpeciality');
				$phonenumber = $this->input->post('phonenumber');
				$country = $this->input->post('country');

				$certificate = "";
				if($_FILES['certificate']['size']>0)
			     {
			      	$temp = explode('.', basename($_FILES['certificate']['name']));

			          $type2 = $_FILES["certificate"]["type"];
			          $new_photoid = explode('.',$_FILES["certificate"]["name"]); 
			          $certificate = rand(100,9999999).date('d_m_yhmi').'.' . end($new_photoid); 
			          move_uploaded_file($_FILES["certificate"]["tmp_name"],
			          "uploads/certificates/".$certificate);          
			     
			      }
			      else
			      {
			      	$certificate = $this->input->post('old_certificate');
			      }

				$image2 = "";
				if($_FILES['proimage']['size']>0)
			     {
			      	$temp = explode('.', basename($_FILES['proimage']['name']));
			        if (count($temp) == 2)
			        {
			          $type2 = $_FILES["proimage"]["type"];
			          $new_photoid2 = explode('.',$_FILES["proimage"]["name"]); 
			          $image2 = rand(100,9999999).date('d_m_yhmi').'.' . end($new_photoid2); 
			          move_uploaded_file($_FILES["proimage"]["tmp_name"],
			          "uploads/user-profile/".$image2);          
			        }
			      }
			      else
			      {
			      	$image2 = $this->input->post('oldimage');
			      }
					$this->db->where('id',$user_id);
					$this->db->update('tbl_users',array('dob'=>$date_of_birth));

					$insertdata = array(
										'first_name'=>$fname,
										'last_name'=>$lname,
										'phone_number'=>$phonenumber,
										'country'=>$country,
										'expYears'=>$expYears,
										'speciality'=>$advisorSpeciality,
										'profile_image'=>$image2,
										'certificate'=>$certificate,
										'created_on'=>$currentdate,
										'updated_on'=>$currentdate,
										);
					$this->db->where('user_id',$user_id);
					$this->db->update('tbl_user_personel_info',$insertdata);
					$this->session->set_userdata('pro_image',$image2);
					$this->session->set_flashdata('success','Profile updated successfully');
					redirect(base_url('users/profile/'));
				
			}
			else
			{
				$this->load->view('page/advisor/edit_profile',$data);
			}
		}
		else
		{
			if($this->input->server('REQUEST_METHOD')=='POST')
			{
				$fname = $this->input->post('fname');
				$lname = $this->input->post('lname');
				$date_of_birth = $this->input->post('date_of_birth');
				$email = $this->input->post('email');
				$maritalstatus = $this->input->post('maritalstatus');
				$noofchild = $this->input->post('noofchild');
				$job = $this->input->post('job');
				$country = $this->input->post('country');
				$appusage = $this->input->post('appusage');
				$talktoadviser = $this->input->post('talktoadviser');
				$image2 = "";
				if($_FILES['proimage']['size']>0)
			     {
			      	$temp = explode('.', basename($_FILES['proimage']['name']));
			          $type2 = $_FILES["proimage"]["type"];
			          $new_photoid2 = explode('.',$_FILES["proimage"]["name"]); 
			          $image2 = rand(100,9999999).date('d_m_yhmi').'.' . end($new_photoid2); 
			          move_uploaded_file($_FILES["proimage"]["tmp_name"],
			          "uploads/user-profile/".$image2);          
			      }
			      else
			      {
			      	$image2 = $this->input->post('oldimage');
			      }
					$this->db->where('id',$user_id);
					$this->db->update('tbl_users',array('dob'=>$date_of_birth));

					$insertdata = array(
										'first_name'=>$fname,
										'last_name'=>$lname,
										'martial_status'=>$maritalstatus,
										'no_of_child'=>$noofchild,
										'job_type'=>$job,
										'country'=>$country,
										'app_usage'=>$appusage,
										'talk_to_advisor'=>$talktoadviser,
										'profile_image'=>$image2,
										'created_on'=>$currentdate,
										'updated_on'=>$currentdate,
										);
					$this->db->where('user_id',$user_id);
					$this->db->update('tbl_user_personel_info',$insertdata);
					$this->session->set_userdata('pro_image',$image2);
					$this->session->set_flashdata('success','Profile updated successfully');
					redirect(base_url('users/profile/'));
				
			}
			else
			{
				$this->load->view('page/profile/profile',$data);
			}
		}
		
		
	}
	function settings()
	{
		$this->common->check_user_login();
		$data = array();
		$data['title'] = 'Settings | Five Percent';
		$data['sub_title'] = 'Settings';
		$user_id = $this->session->userdata('user_id');
		$datetime = date("Y-m-d H:i:s");
		$referral_code_check = $this->db->query("SELECT a.referral_code FROM tbl_admin_referral_code a INNER JOIN tbl_user_adviser_referral_code_connectivity b ON a.user_id=b.advisor_id WHERE b.user_id='".$user_id."'");
		if($referral_code_check->num_rows()>0)
		{
			$data['referral_code'] = $referral_code_check->row()->referral_code;
		}
		else
		{
			$data['referral_code'] = '';
		}
		if($this->input->server('REQUEST_METHOD')=='POST' && $this->input->post('save_referral_code')=='Save')
		{
			$referral_code = $this->input->post('referral_code');
			$checkAdvisorId = $this->db->query("SELECT user_id AS advisor_id FROM tbl_admin_referral_code WHERE referral_code='".$referral_code."' AND status=1");
			if($checkAdvisorId->num_rows()>0)
			{
				$advisor_id = $checkAdvisorId->row()->advisor_id;
				$check_existing_connectivity = $this->db->query("SELECT * FROM tbl_user_adviser_referral_code_connectivity WHERE user_id='".$user_id."' AND advisor_id='".$advisor_id."'");

				$checkAdvisorLimit = $this->db->query("SELECT * FROM tbl_user_adviser_referral_code_connectivity WHERE advisor_id='".$advisor_id."'")->num_rows();
				if($checkAdvisorLimit<=9)
				{
					if($check_existing_connectivity->num_rows()>0)
					{
						$this->session->set_flashdata('success','You have already applied  Referral Code');
						redirect(base_url('users/profile/settings'));
					}
					else
					{
						$insertdata = array(
											'user_id'=>$user_id,
											'advisor_id'=>$advisor_id,
											'created_on'=>$datetime,
											'updated_on'=>$datetime,
											);

						$this->db->insert('tbl_user_adviser_referral_code_connectivity',$insertdata);
						$this->session->set_flashdata('success','Referral Code applied successfully');
						redirect(base_url('users/profile/settings'));
					}
				}
				else
				{
					$this->session->set_flashdata('success','This Referral Code already cross the Limit');
					redirect(base_url('users/profile/settings'));
				}

				
			}
			else
			{
				$this->session->set_flashdata('success','You have entered invalid Referral Code');
				redirect(base_url('users/profile/settings'));
			}
		}
		else
		{
			$this->load->view('page/profile/settings',$data);
		}

		
	}
	function change_password()
	{
		$this->common->check_user_login();
		$data = array();
		$data['title'] = 'Change Password | Five Percent';
		$data['sub_title'] = 'Change Password';
		$user_id = $this->session->userdata('user_id');

		if($this->input->server('REQUEST_METHOD')=='POST')
		{
			$this->form_validation->set_rules('currentpass', 'Current Password', 'required',array(
			'required'=>'Please Enter %s',					
			));
			$this->form_validation->set_rules('newpass', 'New Password', 'required',array(
			'required'=>'Please Enter %s',					
			));
			$this->form_validation->set_rules('confirmpass', 'Confirm Password', 'required|matches[newpass]',array(
				'required'=>'Please Enter %s',	
				'matches'=>'Password and confirm password does not match'				
			));
			if($this->form_validation->run() == FALSE)
            {
                $this->load->view('page/profile/change_password',$data);
            }
            else
            {
            	$currentpass = $this->input->post('currentpass');
            	$currentpass = md5($currentpass);
            	$checkoldpass = $this->db->query("SELECT * FROM  tbl_users WHERE password='".$currentpass."' AND id='".$user_id."'");
            	if($checkoldpass->num_rows()>0)
            	{
            		$this->db->where('id',$user_id);
            		$this->db->where('password',$currentpass);
            		$this->db->update('tbl_users',array('password'=>md5($this->input->post('newpass'))));

            		$this->session->set_flashdata('success','Password Change successfully');
            		redirect(base_url('users/profile/change_password'));
            	} 
            	else
	            {
	            	$this->session->set_flashdata('success','Incorrect Current Password');
	            	redirect(base_url('users/profile/change_password'));
	            }             
            }

		}
		else
		{
			$this->load->view('page/profile/change_password',$data);
		}		
	}
	function financialsituation()
	{
		$this->common->check_user_login();
		$data = array();
		$recordarray = array();
		$data_arr = array();		
		$data['title'] = "Financial situation question | 5% Percentage";	
		$data['sub_title'] = 'Profile';
		$user_id = $this->session->userdata('user_id');
		$datetime = date('Y-m-d H:i:s');
		$value_query = "SELECT b.value FROM user_question_options b WHERE a.id=b.options AND b.user_id='".$user_id."'";
		$answer_query = "SELECT COUNT(c.options) FROM user_question_options c WHERE a.id=c.options AND c.user_id='".$user_id."'";

		$resultdata = $this->db->query("SELECT * FROM tbl_questions WHERE question_category=1 AND lang_id=1 ORDER BY question_type ASC")->result();
		foreach($resultdata as $res)
		{
			$data_arr['question'] = $res->question;
			$data_arr['id'] = $res->id;
			$data_arr['question_type'] = $res->question_type;
			$data_arr['question_category'] = $res->question_category;
			$options = $this->db->query("SELECT a.id,a.options,($value_query) AS answer,($answer_query) AS selected FROM tbl_question_options a WHERE a.question_id='".$res->id."'")->result();
			$data_arr['options'] = $options;
			array_push($recordarray, $data_arr);

		}
		$data['questions'] = $recordarray;
		//echo "<pre>"; print_r($data['questions']);die;
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			for($i=0;$i<count($_POST['question']);$i++)
			{
				$this->db->where('user_id',$user_id);
				$this->db->where('question_id',$_POST['question'][$i]);
				$this->db->delete('user_question_options');
			}
			foreach($_POST as $key => $val)
			{		
					for($i=0;$i<count($_POST['question']);$i++)
					{

						$check_existing = $this->db->query("SELECT * FROM user_question_answer WHERE user_id='".$user_id."' AND question_id='".$_POST['question'][$i]."'")->num_rows();
						if($check_existing==0)
						{
							$insertdata = array(
											'user_id'=>$user_id,
											'question_id'=>$_POST['question'][$i],
											'created_on'=>$datetime,
											'updated_on'=>$datetime,
											);
							$this->db->insert('user_question_answer',$insertdata);
							
						}
						if($key!='question')
						{
							if($key==$_POST['question'][$i] && ($_POST['question_type'][$i]==1 || $_POST['question_type'][$i]==2 || $_POST['question_type'][$i]==3))
							{
								for($j=0;$j<count($_POST[$key]);$j++)
								{
										
									$options = array(
												'user_id'=>$user_id,
												'question_id'=>$_POST['question'][$i],
												'options'=>$_POST[$key][$j],
												'value'=>1,
												'created_on'=>$datetime,
												'updated_on'=>$datetime,
												);
									$this->db->insert('user_question_options',$options);								
										

								}
							}
							else if($key==$_POST['question'][$i] && ($_POST['question_type'][$i]==4))
							{
								for($j=0;$j<count($_POST[$key]);$j++)
								{
										
									$options = array(
												'user_id'=>$user_id,
												'question_id'=>$_POST['question'][$i],
												'options'=>$_POST[$key][$j],
												'value'=>$_POST['percentage'][$j],
												'created_on'=>$datetime,
												'updated_on'=>$datetime,
												);
									$this->db->insert('user_question_options',$options);								
										

								}
							}
							else if($key==$_POST['question'][$i] && ($_POST['question_type'][$i]==5))
							{
								for($j=0;$j<count($_POST[$key]);$j++)
								{
										
									$options = array(
												'user_id'=>$user_id,
												'question_id'=>$_POST['question'][$i],
												'options'=>$_POST[$key][$j],
												'value'=>$_POST['value_enter'][$j],
												'created_on'=>$datetime,
												'updated_on'=>$datetime,
												);
									$this->db->insert('user_question_options',$options);								
										

								}
							}								
							
						}						
						
				}
			
			}
			$this->session->set_flashdata('success','Data updated successfully');
			redirect(base_url('users/profile/financialsituation'));
		}
		$this->load->view('page/profile/financialsituation',$data);
	}
	function investmentobjective()
	{
		$this->common->check_user_login();
		$data = array();
		$recordarray = array();
		$data_arr = array();		
		$data['title'] = "Investment Objective question | 5% Percentage";	
		$data['sub_title'] = 'Profile';
		$user_id = $this->session->userdata('user_id');
		$datetime = date('Y-m-d H:i:s');

		$value_query = "SELECT b.value FROM user_question_options b WHERE a.id=b.options AND b.user_id='".$user_id."'";
		$answer_query = "SELECT COUNT(c.options) FROM user_question_options c WHERE a.id=c.options AND c.user_id='".$user_id."'";

		$resultdata = $this->db->query("SELECT * FROM tbl_questions WHERE question_category=2 AND lang_id=1 ORDER BY question_type ASC")->result();
			foreach($resultdata as $res)
			{
				$data_arr['question'] = $res->question;
				$data_arr['id'] = $res->id;
				$data_arr['question_type'] = $res->question_type;
				$data_arr['question_category'] = $res->question_category;
				$options = $this->db->query("SELECT a.id,a.options,($value_query) AS answer,($answer_query) AS selected FROM tbl_question_options a WHERE a.question_id='".$res->id."'")->result();
				$data_arr['options'] = $options;
				array_push($recordarray, $data_arr);

			}
		$data['questions'] = $recordarray;
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			for($i=0;$i<count($_POST['question']);$i++)
			{
				$this->db->where('user_id',$user_id);
				$this->db->where('question_id',$_POST['question'][$i]);
				$this->db->delete('user_question_options');
			}
			foreach($_POST as $key => $val)
			{		
					for($i=0;$i<count($_POST['question']);$i++)
					{

						$check_existing = $this->db->query("SELECT * FROM user_question_answer WHERE user_id='".$user_id."' AND question_id='".$_POST['question'][$i]."'")->num_rows();
						if($check_existing==0)
						{
							$insertdata = array(
											'user_id'=>$user_id,
											'question_id'=>$_POST['question'][$i],
											'created_on'=>$datetime,
											'updated_on'=>$datetime,
											);
							$this->db->insert('user_question_answer',$insertdata);
							
						}
						if($key!='question')
						{
							if($key==$_POST['question'][$i] && ($_POST['question_type'][$i]==1 || $_POST['question_type'][$i]==2 || $_POST['question_type'][$i]==3))
							{
								for($j=0;$j<count($_POST[$key]);$j++)
								{										
									$options = array(
												'user_id'=>$user_id,
												'question_id'=>$_POST['question'][$i],
												'options'=>$_POST[$key][$j],
												'value'=>1,
												'created_on'=>$datetime,
												'updated_on'=>$datetime,
												);
									$this->db->insert('user_question_options',$options);		
										

								}
							}
							else if($key==$_POST['question'][$i] && ($_POST['question_type'][$i]==4))
							{
								for($j=0;$j<count($_POST[$key]);$j++)
								{
										
									$options = array(
												'user_id'=>$user_id,
												'question_id'=>$_POST['question'][$i],
												'options'=>$_POST[$key][$j],
												'value'=>$_POST['percentage'][$j],
												'created_on'=>$datetime,
												'updated_on'=>$datetime,
												);
									$this->db->insert('user_question_options',$options);							
										

								}
							}
							else if($key==$_POST['question'][$i] && ($_POST['question_type'][$i]==5))
							{
								for($j=0;$j<count($_POST[$key]);$j++)
								{
										
									$options = array(
												'user_id'=>$user_id,
												'question_id'=>$_POST['question'][$i],
												'options'=>$_POST[$key][$j],
												'value'=>$_POST['value_enter'][$j],
												'created_on'=>$datetime,
												'updated_on'=>$datetime,
												);
									$this->db->insert('user_question_options',$options);								
										

								}
							}								
							
						}						
						
				}
			
			}
			$this->session->set_flashdata('success','Data updated successfully');
			redirect(base_url('users/profile/investmentobjective'));
		}	
		$this->load->view('page/profile/investment_objective',$data);	
	}
	function knowledgeExperience()
	{
		$this->common->check_user_login();
		$data = array();
		$recordarray = array();
		$data_arr = array();		
		$data['title'] = "Knowledge & Experience question | 5% Percentage";	
		$data['sub_title'] = 'Profile';
		$user_id = $this->session->userdata('user_id');
		$datetime = date('Y-m-d H:i:s');
		$value_query = "SELECT b.value FROM user_question_options b WHERE a.id=b.options AND b.user_id='".$user_id."'";
		$answer_query = "SELECT COUNT(c.options) FROM user_question_options c WHERE a.id=c.options AND c.user_id='".$user_id."'";

		$resultdata = $this->db->query("SELECT * FROM tbl_questions WHERE question_category=3 AND lang_id=1 ORDER BY question_type ASC")->result();
			foreach($resultdata as $res)
			{
				$data_arr['question'] = $res->question;
				$data_arr['id'] = $res->id;
				$data_arr['question_type'] = $res->question_type;
				$data_arr['question_category'] = $res->question_category;
				$options = $this->db->query("SELECT a.id,a.options,($value_query) AS answer,($answer_query) AS selected FROM tbl_question_options a WHERE a.question_id='".$res->id."'")->result();
				$data_arr['options'] = $options;
				array_push($recordarray, $data_arr);

			}
		$data['questions'] = $recordarray;
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			for($i=0;$i<count($_POST['question']);$i++)
			{
				$this->db->where('user_id',$user_id);
				$this->db->where('question_id',$_POST['question'][$i]);
				$this->db->delete('user_question_options');
			}
			foreach($_POST as $key => $val)
			{		
					for($i=0;$i<count($_POST['question']);$i++)
					{
																		
						$check_existing = $this->db->query("SELECT * FROM user_question_answer WHERE user_id='".$user_id."' AND question_id='".$_POST['question'][$i]."'")->num_rows();
						if($check_existing==0)
						{
							$insertdata = array(
											'user_id'=>$user_id,
											'question_id'=>$_POST['question'][$i],
											'created_on'=>$datetime,
											'updated_on'=>$datetime,
											);
							$this->db->insert('user_question_answer',$insertdata);
							
						}
						if($key!='question')
						{
							if($key==$_POST['question'][$i] && ($_POST['question_type'][$i]==1 || $_POST['question_type'][$i]==2 || $_POST['question_type'][$i]==3))
							{
								for($j=0;$j<count($_POST[$key]);$j++)
								{
										
									$options = array(
												'user_id'=>$user_id,
												'question_id'=>$_POST['question'][$i],
												'options'=>$_POST[$key][$j],
												'value'=>1,
												'created_on'=>$datetime,
												'updated_on'=>$datetime,
												);
									$this->db->insert('user_question_options',$options);								
										

								}
							}
							else if($key==$_POST['question'][$i] && ($_POST['question_type'][$i]==4))
							{
								for($j=0;$j<count($_POST[$key]);$j++)
								{
										
									$options = array(
												'user_id'=>$user_id,
												'question_id'=>$_POST['question'][$i],
												'options'=>$_POST[$key][$j],
												'value'=>$_POST['percentage'][$j],
												'created_on'=>$datetime,
												'updated_on'=>$datetime,
												);
									$this->db->insert('user_question_options',$options);								
										

								}
							}
							else if($key==$_POST['question'][$i] && ($_POST['question_type'][$i]==5))
							{
								for($j=0;$j<count($_POST[$key]);$j++)
								{
										
									$options = array(
												'user_id'=>$user_id,
												'question_id'=>$_POST['question'][$i],
												'options'=>$_POST[$key][$j],
												'value'=>$_POST['value_enter'][$j],
												'created_on'=>$datetime,
												'updated_on'=>$datetime,
												);
									$this->db->insert('user_question_options',$options);								
										

								}
							}								
							
						}						
						
				}
			
			}
			$this->session->set_flashdata('success','Data updated successfully');
			redirect(base_url('users/profile/knowledgeExperience'));
		}	
		$this->load->view('page/profile/knowledge_experience',$data);	
	}
	function understandingFinancialcommitment()
	{
		$this->common->check_user_login();
		$data = array();
		$recordarray = array();
		$data_arr = array();		
		$data['title'] = "Understanding and financial commitment | 5% Percentage";	
		$data['sub_title'] = 'Profile';
		$user_id = $this->session->userdata('user_id');
		$datetime = date('Y-m-d H:i:s');
		$value_query = "SELECT b.value FROM user_question_options b WHERE a.id=b.options AND b.user_id='".$user_id."'";
		$answer_query = "SELECT COUNT(c.options) FROM user_question_options c WHERE a.id=c.options AND c.user_id='".$user_id."'";

		$resultdata = $this->db->query("SELECT * FROM tbl_questions WHERE question_category=4 AND lang_id=1 ORDER BY question_type ASC")->result();
		foreach($resultdata as $res)
		{
			$data_arr['question'] = $res->question;
			$data_arr['id'] = $res->id;
			$data_arr['question_type'] = $res->question_type;
			$data_arr['question_category'] = $res->question_category;
			$options = $this->db->query("SELECT a.id,a.options,($value_query) AS answer,($answer_query) AS selected FROM tbl_question_options a WHERE a.question_id='".$res->id."'")->result();
			$data_arr['options'] = $options;
			array_push($recordarray, $data_arr);

		}
		$data['questions'] = $recordarray;
		//echo "<pre>"; print_r($data['questions']);die;
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			for($i=0;$i<count($_POST['question']);$i++)
			{
				$this->db->where('user_id',$user_id);
				$this->db->where('question_id',$_POST['question'][$i]);
				$this->db->delete('user_question_options');
			}
			foreach($_POST as $key => $val)
			{		
					for($i=0;$i<count($_POST['question']);$i++)
					{
												
						$check_existing = $this->db->query("SELECT * FROM user_question_answer WHERE user_id='".$user_id."' AND question_id='".$_POST['question'][$i]."'")->num_rows();
						if($check_existing==0)
						{
							$insertdata = array(
											'user_id'=>$user_id,
											'question_id'=>$_POST['question'][$i],
											'created_on'=>$datetime,
											'updated_on'=>$datetime,
											);
							$this->db->insert('user_question_answer',$insertdata);
							
						}
						if($key!='question')
						{
							if($key==$_POST['question'][$i] && ($_POST['question_type'][$i]==1 || $_POST['question_type'][$i]==2 || $_POST['question_type'][$i]==3))
							{
								for($j=0;$j<count($_POST[$key]);$j++)
								{
										
									$options = array(
												'user_id'=>$user_id,
												'question_id'=>$_POST['question'][$i],
												'options'=>$_POST[$key][$j],
												'value'=>1,
												'created_on'=>$datetime,
												'updated_on'=>$datetime,
												);
									$this->db->insert('user_question_options',$options);								
										

								}
							}
							else if($key==$_POST['question'][$i] && ($_POST['question_type'][$i]==4))
							{
								for($j=0;$j<count($_POST[$key]);$j++)
								{
										
									$options = array(
												'user_id'=>$user_id,
												'question_id'=>$_POST['question'][$i],
												'options'=>$_POST[$key][$j],
												'value'=>$_POST['percentage'][$j],
												'created_on'=>$datetime,
												'updated_on'=>$datetime,
												);
									$this->db->insert('user_question_options',$options);								
										

								}
							}
							else if($key==$_POST['question'][$i] && ($_POST['question_type'][$i]==5))
							{
								for($j=0;$j<count($_POST[$key]);$j++)
								{
										
									$options = array(
												'user_id'=>$user_id,
												'question_id'=>$_POST['question'][$i],
												'options'=>$_POST[$key][$j],
												'value'=>$_POST['value_enter'][$j],
												'created_on'=>$datetime,
												'updated_on'=>$datetime,
												);
									$this->db->insert('user_question_options',$options);								
										

								}
							}								
							
						}						
						
				}
			
			}
			$this->session->set_flashdata('success','Data updated successfully');
			redirect(base_url('users/profile/understandingFinancialcommitment'));
		}	
		$this->load->view('page/profile/understanding_financial_commitment',$data);	
	}
	function risk_profile()
	{
		$this->common->check_user_login();
		$data = array();
		$data['title'] = 'Risk Profile | Five Percent';
		$data['sub_title'] = 'Risk Profile';
		$user_id = $this->session->userdata('user_id');

		$this->db->select('tu.email,tu.status,pi.first_name,tu.dob,pi.last_name,pi.date_of_birth,pi.job_type,pi.profile_image,pi.martial_status,pi.no_of_child');
		$this->db->from('tbl_users tu');
		$this->db->join('tbl_user_personel_info pi', 'tu.id = pi.user_id');
		$this->db->where('tu.id',$user_id);
		$result = $this->db->get()->row();
		$data['user_details'] = $result;
		$totalNumberOfQuestion = $this->db->query("SELECT * FROM tbl_questions")->num_rows();
		$numberOfAnsweredQuestion = $checkQuestionOptions = $this->db->query("SELECT a.*,b.*,COUNT(b.question_id) AS qnc FROM user_question_answer a INNER JOIN user_question_options b ON a.question_id = b.question_id  WHERE a.user_id='".$user_id."' GROUP BY b.question_id")->num_rows();

		$agePercentage = 0;
		$maritalStatusPercentage = 0;
		$jobTypePercentage = 0;
		$knowledgePercenrage = 0;
		//Age calculation
		$age = $this->common->calculateage($result->dob);
		$getAgeData = $this->db->query("SELECT * FROM tbl_admin_age_percent")->result();

		
		foreach($getAgeData as $getAge)
		{
			if($age>=$getAge->start_point && $age<=$getAge->end_point)
			{
				$agePercentage = $getAge->percent_value;
			}
		}
		
		
		//Marital status calculation
		$martial_status = $result->martial_status;
		$noOfChild = $result->no_of_child;
		$getMaritalStatusData = $this->db->query("SELECT * FROM tbl_admin_maritial_status_percent ")->result();

		$lrg=0;
		$found=0;
		foreach($getMaritalStatusData as $MaritalStatus)
		{
			$maritalStatusPercentage=0;
	

			if(strtolower($martial_status)=='single')
			{
				$maritalStatusPercentage = $MaritalStatus->percent_value;
				break;
			}
			else
			{
				if($MaritalStatus->no_of_child==$noOfChild)
				{
					$maritalStatusPercentage = $MaritalStatus->percent_value;
					$found=1;
					break;
					
				}

				if($lrg<$MaritalStatus->no_of_child)
				{
					$lrg=$MaritalStatus->no_of_child;
				}
			}			
		}
		if($found==0)
		{
			foreach($getMaritalStatusData as $MaritalStatus)
			{
				if(trim($MaritalStatus->maritail_status)==trim($martial_status) && $lrg==$MaritalStatus->no_of_child)
				{
					$maritalStatusPercentage = $MaritalStatus->percent_value;
					break;
				}
			}

		}
		//echo "<pre>";print_r($maritalStatusPercentage);die();
		//Job Type calculation
		$job_type = $result->job_type;
		$getJobTypeData = $this->db->query("SELECT * FROM tbl_admin_job_type_percent ")->result();
		foreach($getJobTypeData as $JobType)
		{
			if($job_type==$JobType->job_type) //employee
			{
				$jobTypePercentage = $JobType->percent_value;
			}
		}
		
		//Knowledge calculation
		$questionPercentage = ($numberOfAnsweredQuestion/$totalNumberOfQuestion)*100;

		$getQuestionKnowledgeData = $this->db->query("SELECT * FROM tbl_admin_knowledge_percent")->result();
		foreach($getQuestionKnowledgeData as $knowldge)
		{
			if($questionPercentage>=$knowldge->start_point && $questionPercentage<=$knowldge->end_point)
			{
				$knowledgePercenrage = $knowldge->percent_value;
			}
		}
		//echo $knowledgePercenrage;die;

		$risk_percent = $agePercentage+$maritalStatusPercentage+$jobTypePercentage+$knowledgePercenrage;

		$RF = 0;
		$RV = 0;
		$option = 0;
		if($risk_percent>70 && $risk_percent<=80)
		{			
			$RF = 20;
			$RV = 60;
			$option = 20;
		}
		if($risk_percent>60 && $risk_percent<=70)
		{
			$RF = 30;
			$RV = 60;			
			$option = 10;
		}
		if($risk_percent>50 && $risk_percent<=60)
		{
			$RF = 45;
			$RV = 50;			
			$option = 5;
		}
		if($risk_percent>40 && $risk_percent<=50)
		{
			$RF = 54;
			$RV = 43;			
			$option = 3;
		}
		if($risk_percent>30 && $risk_percent<=40)
		{
			$RF = 60;
			$RV = 39;
			$option = 1;
		}
		if($risk_percent>30 && $risk_percent<=40)
		{
			$RF = 70;
			$RV = 30;
		}
		if($risk_percent>20 && $risk_percent<=30)
		{
			$RF = 80;
			$RV = 20;
		}
		if($risk_percent>10 && $risk_percent<=20)
		{
			$RF = 90;
			$RV = 10;
		}

		$all_money = 0;
		$money_use_percentage = 100;
		$get_exitsing_rf_rv_option_value = $this->db->query("SELECT * FROM tbl_user_rf_rv_options_values WHERE user_id='".$user_id."'");
		if($get_exitsing_rf_rv_option_value->num_rows()>0)
		{
			$rf_rv_row = $get_exitsing_rf_rv_option_value->row();
			$RF = $rf_rv_row->rf;
			$RV = $rf_rv_row->rv;
			$option = $rf_rv_row->options;

			$all_money = $rf_rv_row->all_money;
			$money_use_percentage = $rf_rv_row->money_use_percentage;
		}


		$sql1="SELECT count(m.user_id) from tbl_user_stock_management m where m.stock_id=a.id and m.user_id='".$user_id."'";
		$data['stock_rfs'] = $this->db->query("SELECT a.id,a.stock_name,($sql1) as exist  FROM tbl_admin_stock a  WHERE a.stock_type=1 ORDER BY a.id  LIMIT 4")->result();
		$data['stock_rvs'] = $this->db->query("SELECT a.id,a.stock_name,($sql1) as exist  FROM tbl_admin_stock a  WHERE a.stock_type=2 ORDER BY a.id  LIMIT 4")->result();

		$data['stock_options'] = $this->db->query("SELECT a.id,a.stock_name,($sql1) as exist  FROM tbl_admin_stock a  WHERE a.stock_type=2 ORDER BY a.id DESC LIMIT 4")->result();
		//echo "<pre>"; print_r($data['stock_options']);die;

		$data['RF'] = number_format($RF,2,".","");
		$data['RV'] = number_format($RV,2,".","");
		$data['OPTION'] = number_format($option,2,".","");

		$data['all_money'] = $all_money;
		$data['money_use_percentage'] = $money_use_percentage;
		
		$data['risk_percent'] = $risk_percent;
		//echo "<pre>";print_r($data);die;
		$this->load->view('page/profile/risk_profile',$data);
	}
	function balance_sheet()
	{
		$this->common->check_user_login();
		$data = array();
		$data['title'] = 'Risk Profile | Five Percent';
		$data['sub_title'] = 'Balance Sheet';
		$user_id = $this->session->userdata('user_id');
		$currentdate = date("Y-m-d H:i:s");
		
		/**************************************************  CLIENT BALANCE SHEET CALCULATION ************************/
		$income_recordarray = array();
		$income_data = array();

		$expense_recordarray = array();
		$expense_data = array();

		$assets_recordarray = array();
		$assets_data = array();

		$liability_recordarray = array();
		$liability_data = array();

		$total_monthly_income = 0;
		$total_monthly_expenses = 0;
		$total_monthly_cash = 0;
		$total_equity = 0;
		$total_assets = 0;
		$total_liabilities = 0;
		$check_balance_existing = $this->db->query("SELECT * FROM tbl_user_balance_sheet WHERE user_id='".$user_id."'");
		if($check_balance_existing->num_rows()<1)
		{
			$get_income_expense = $this->db->query("SELECT a.options AS optionvalue,b.id AS option_id,a.value, a.question_id,b.options FROM user_question_options a LEFT JOIN tbl_question_options b ON a.options=b.id WHERE a.question_id=35 AND a.user_id='".$user_id."'")->result();
			$total_monthly_income = 0;
			$total_monthly_expenses = 0;
			//$mInvest = 0;
			foreach($get_income_expense as $bal)
			{
				if($bal->option_id==187)
				{
					$total_monthly_income = $bal->value;
				}
				if($bal->option_id==188)
				{
					$total_monthly_expenses = $bal->value;
				}
				/*if($bal->option_id==217)
				{
					$mInvest = $bal->value;
				}*/
			}
			$check_existing_balance_sheet = $this->db->query("SELECT * FROM tbl_user_balance_sheet WHERE user_id='".$user_id."'");
			if($check_existing_balance_sheet->num_rows()==0)
			{
				$insertBalanceSheetDataIncome = array(
												'user_id'=>$user_id,
												'type'=>1,
												'parameters'=>'Income',
												'value'=>$total_monthly_income,
												'created_on'=>$currentdate,
												);
				$this->db->insert('tbl_user_balance_sheet',$insertBalanceSheetDataIncome);
				$insertBalanceSheetDataexpense = array(
												'user_id'=>$user_id,
												'type'=>2,
												'parameters'=>'Expense',
												'value'=>$total_monthly_expenses,
												'created_on'=>$currentdate,
												);
				$this->db->insert('tbl_user_balance_sheet',$insertBalanceSheetDataexpense);
			}
			/*echo "<pre>";print_r($mIncome);die;
			$total_monthly_income = 25000;
			$total_monthly_expenses = 10000;*/
		}
		else
		{
			//Income calculations
			$income_array = $this->db->query("SELECT * FROM tbl_user_balance_sheet WHERE user_id='".$user_id."' AND type=1 ORDER BY value DESC")->result();
			foreach($income_array as $income)
			{
				$income_data['id'] = $income->id;
				$income_data['parameters'] = $income->parameters;
				$income_data['value'] = $income->value;
				$total_monthly_income+=$income->value;
				array_push($income_recordarray, $income_data);

			}
			//Expense calculations
			$expense_array = $this->db->query("SELECT * FROM tbl_user_balance_sheet WHERE user_id='".$user_id."' AND type=2  ORDER BY value DESC")->result();
			foreach($expense_array as $expense)
			{
				$expense_data['id'] = $expense->id;
				$expense_data['parameters'] = $expense->parameters;
				$expense_data['value'] = $expense->value;
				$total_monthly_expenses+=$expense->value;
				array_push($expense_recordarray, $expense_data);

			}
			//assets calculations
			$assets_array = $this->db->query("SELECT * FROM tbl_user_balance_sheet WHERE user_id='".$user_id."' AND type=3  ORDER BY value DESC")->result();
			foreach($assets_array as $assets)
			{
				$assets_data['id'] = $assets->id;
				$assets_data['parameters'] = $assets->parameters;
				$assets_data['value'] = $assets->value;
				$total_assets+=$assets->value;
				array_push($assets_recordarray, $assets_data);

			}

			//Liabilities calculations
			$liability_array = $this->db->query("SELECT * FROM tbl_user_balance_sheet WHERE user_id='".$user_id."' AND type=4  ORDER BY value DESC")->result();
			foreach($liability_array as $liability)
			{
				$liability_data['id'] = $liability->id;
				$liability_data['parameters'] = $liability->parameters;
				$liability_data['value'] = $liability->value;
				$total_liabilities+=$liability->value;
				array_push($liability_recordarray, $liability_data);

			}

		}
		//Income - Expense = Total Monthly cash
		$total_monthly_cash = $total_monthly_income-$total_monthly_expenses;
		$data['total_monthly_cash'] = $total_monthly_cash;
		//Total Assets - Total Liability = Total Equity
		$total_equity = $total_assets-$total_liabilities;
		$data['total_equity'] = $total_equity;

		$data['total_monthly_income'] = $total_monthly_income;

		$data['total_monthly_expenses'] = $total_monthly_expenses;
		$data['total_assets'] = $total_assets;
		$data['total_liabilities'] = $total_liabilities;

		$data['income_recordarray'] = $income_recordarray;
		$data['expense_recordarray'] = $expense_recordarray;
		$data['assets_recordarray'] = $assets_recordarray;
		$data['liability_recordarray'] = $liability_recordarray;
		$this->load->view('page/profile/balance_sheet',$data);
	}
	function purchase_subscribe_plan($subscription_id,$user_id,$price,$plan_name)
    {
    	$subscription_id = base64_decode(base64_decode($subscription_id));
    	$user_id = base64_decode(base64_decode($user_id));
    	$price = base64_decode(base64_decode($price));
    	$plan_name = base64_decode(base64_decode($plan_name));

    	//echo $subscription_id.'  '.$user_id.'  '.$price.'  '.$plan_name;die();

	 	//$id=base64_decode($this->input->get("key"));
	 	$returnURL = base_url().'signin'; //payment success url
        $cancelURL = base_url().'signin'; //payment cancel url
        $notifyURL = base_url().'users/profile/pay_subscriptions_plan'; //ipn url        
        // Add fields to paypal form
        $this->paypal_lib->add_field('return', $returnURL);
        $this->paypal_lib->add_field('cancel_return', $cancelURL);
        $this->paypal_lib->add_field('notify_url', $notifyURL); 
        $this->paypal_lib->add_field('item_name', $plan_name);
        $this->paypal_lib->add_field('custom',$user_id);
        $this->paypal_lib->add_field('item_number',$subscription_id);
        $this->paypal_lib->add_field('amount',$price);        
        // Load paypal form
        $this->paypal_lib->paypal_auto_form();
    }
    function pay_subscriptions_plan()
    {
    	// Paypal return transaction details array
        $paypalInfo = $this->input->post();
        $data['created_on']= date('Y-m-d H:i:s');
        $data['updated_on'] = date('Y-m-d H:i:s');
        $data['plan_id']    = $paypalInfo["item_number"];
        $data['txn_id']    = $paypalInfo["txn_id"];
        $data['amount'] = $paypalInfo["mc_gross"];
        $data['currency'] = $paypalInfo["mc_currency"];
        $data['payer_email'] = $paypalInfo["payer_email"];
        $data['payment_status']    = $paypalInfo["payment_status"];
        $data['user_id'] = $paypalInfo['custom'];

        $paypalURL = $this->paypal_lib->paypal_url;
        $result     = $this->paypal_lib->curlPost($paypalURL,$paypalInfo); 

        // Check whether the payment is verified
        if(preg_match("/VERIFIED/i",$result))
        {
        	$this->db->insert('tbl_user_payments',$data);

        	$check_subscription_existing = $this->db->query("SELECT * FROM tbl_user_subscription_plan WHERE user_id='".$data['user_id']."'");
        	if($check_subscription_existing->num_rows()==0)
        	{
        		$insertSubscription = array(
        								'user_id'=>$data['user_id'],
        								'plan_id'=>$data['plan_id'],
        								'status'=>1,
        								'created_on'=>$data['created_on'],
        								'updated_on'=>$data['updated_on'],
        								);
        		$this->db->insert('tbl_user_subscription_plan',$insertSubscription);
        	}
        	if($check_subscription_existing->num_rows()>0)
        	{
        		$updateSubscription = array(
        								'plan_id'=>$data['plan_id'],
        								'status'=>1,
        								'updated_on'=>$data['updated_on'],
        								);
        		$this->db->where('user_id',$data['user_id']);
        		$this->db->update('tbl_user_subscription_plan',$updateSubscription);
        	}

        	
        }
    }

    function check30daysold()
    {
    	//echo "<pre>";print_r($this->session->userdata());die;
    	 if(strtotime('2019-09-19 17:14:40') < strtotime('-30 days')) 
    	 {
		     echo 1;
		 }
		 else
		 {
		 	echo 2;
		 }
    }
    function setcookie()
    {
    	$cookie_name = "user";
		$rand = rand(100,10000);
		if(isset($_COOKIE['user']))
		{
			$cc = $_COOKIE['user'];
			$ccs = explode(',', $cc);
			if(!in_array($rand, $ccs))
			{
				$c = $cc.','.$rand;
				setcookie($cookie_name, $c, time() + (3600), "/");
			}
		}
		else
		{
			setcookie($cookie_name, $rand, time() + (3600), "/");
		}
		
    }
    function getcookie()
    {
    	print_r($_COOKIE['user']);
    	//setcookie('user', FALSE, -1);
    	//echo 'yes';
    	setcookie("user", "", time()-3600);
    }


}