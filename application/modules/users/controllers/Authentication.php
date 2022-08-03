<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('common');
	}
	public function index()
	{
		$this->load->view('welcome_message');
	}
	function signup()
	{
		$data = array();		
		$data['title'] = "signup - 5% Percentage";
		$this->session->set_userdata('data','my name is kumar');
		$this->load->view('page/signup',$data);
	}
	public function valid_password($password = '')
    {
        $password = trim($password);
        $regex_lowercase = '/[a-z]/';
        $regex_uppercase = '/[A-Z]/';
        $regex_number = '/[0-9]/';
        $regex_special = '/[!@#$%^&*()\-_=+{};:,<.>§~]/';
        if (empty($password))
        {
            $this->form_validation->set_message('valid_password', 'The {field} field is required.');
            return FALSE;
        }
        if (preg_match_all($regex_lowercase, $password) < 1)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field must be at least one lowercase letter.');
            return FALSE;
        }
        if (preg_match_all($regex_uppercase, $password) < 1)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field must be at least one uppercase letter.');
            return FALSE;
        }
        if (preg_match_all($regex_number, $password) < 1)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field must have at least one number.');
            return FALSE;
        }
        if (preg_match_all($regex_special, $password) < 1)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field must have at least one special character.' . ' ' . htmlentities('!@#$%^&*()\-_=+{};:,<.>§~'));
            return FALSE;
        }
        if (strlen($password) < 8)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field must be at least 8 characters in length.');
            return FALSE;
        }
        if (strlen($password) > 32)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field cannot exceed 32 characters in length.');
            return FALSE;
        }
        return TRUE;
    }
	function user_login()
	{
		$data = array();		
		$data['title'] = "signin - 5% Percentage";	
		echo $this->common->is_auth();	
		$this->load->view('page/login',$data);
	}
	function subsription_plan($user_id,$token)
	{
		//$this->check_registration_session();
		$data = array();		
		$data['title'] = "Subscription plan - 5% Percentage";	
		//$reg = $this->session->userdata('reg');
		$user_id = base64_decode(base64_decode($user_id));
		$date_of_birth = $this->db->query("SELECT dob FROM tbl_users WHERE id='".$user_id."'")->row()->dob;
		$data['age'] = $this->common->calculateage($date_of_birth);
		//echo $data['age'];die;
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
			$data_arr['user_id'] = $user_id;
			array_push($recordarray, $data_arr);

		}
		$data['subscriptions'] = $recordarray;
		$this->load->view('page/subscription_plan',$data);
	}
	function upgrade_subsription_plan()
	{
		$this->common->check_user_login();
		$data = array();		
		$data['title'] = "upgrade Subscription plan - 5% Percentage";	
		$user_id = $this->session->userdata('user_id');
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
			$data_arr['user_id'] = $user_id;
			array_push($recordarray, $data_arr);
		}
		$data['subscriptions'] = $recordarray;
		$data['existing_plan'] = $this->db->query("SELECT * FROM tbl_user_subscription_plan WHERE user_id='".$user_id."'")->row();
		$this->load->view('page/upgrade_subscription_plan',$data);
	}
	function check_registration_session()
	{
		$reg = $this->session->userdata('reg');
		if($reg=='' && $reg==null)
		{
			redirect(base_url('signup'));
		}
	}
	function personelinfo($plan_id,$user_id)
	{
		//$this->check_registration_session();
		$data = array();		
		$data['title'] = "Personel info | 5% Percentage";
		$this->db->select('id,name');
		$this->db->from('countries');
		$currentdate = date('Y-m-d H:i:s');
		$data['countries'] = $this->db->get()->result();
		$user_id = base64_decode(base64_decode($user_id));
		$plan_id = base64_decode(base64_decode($plan_id));
		$this->session->set_userdata('plan_id',$plan_id);
		$this->session->set_userdata('user_id',$user_id);
		$checkExistingPlan = $this->db->query("SELECT * FROM tbl_user_subscription_plan WHERE user_id='".$user_id."'");
		if($checkExistingPlan->num_rows()==0)
		{
			$InsertPlan = array(
								'user_id'=>$user_id,
								'plan_id'=>$plan_id,
								'created_on'=>$currentdate,
								'updated_on'=>$currentdate,
								);
			$this->db->insert('tbl_user_subscription_plan',$InsertPlan);
		}
		else
		{
			$UpdatePlan = array(
								'plan_id'=>$plan_id,
								'updated_on'=>$currentdate,
								);
			$this->db->where('user_id',$user_id);
			$this->db->update('tbl_user_subscription_plan',$UpdatePlan);
		}
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
			
			$check_existing = $this->db->get_where("tbl_user_personel_info",array('user_id'=>$user_id))->num_rows();
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
			if($check_existing==0)
			{
			    $this->db->where('id',$user_id);
				$this->db->update('tbl_users',array('dob'=>$date_of_birth));

				$insertdata = array(
									'user_id'=>$user_id,
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

				$this->db->insert('tbl_user_personel_info',$insertdata);
				redirect(base_url('user/financial-situation'));
			}
			else
			{
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
				redirect(base_url('user/financial-situation/'.base64_encode(base64_encode($user_id))));
			}
		}
		$data['user_detail'] = $this->db->query("SELECT a.id,a.dob,a.email,a.user_type,b.first_name,b.last_name,b.phone_number,b.martial_status,b.no_of_child,b.job_type,b.country,b.app_usage,b.talk_to_advisor,b.profile_image FROM tbl_users a INNER JOIN tbl_user_personel_info b ON a.id=b.user_id WHERE a.id='".$user_id."'")->row();
		//echo "<pre>"; print_r($data['user_detail']);die;
		$data['jobtypes'] = $this->db->query("SELECT * FROM tbl_job_type")->result();
		$data['app_ussages'] = $this->db->query("SELECT * FROM tbl_app_ussage")->result();	
		$this->load->view('page/personel_info_question',$data);
	}
	function financialsituation($user_id)
	{
		//$this->check_registration_session();
		$data = array();
		$recordarray = array();
		$data_arr = array();		
		$data['title'] = "Personel info | 5% Percentage";	
		$user_id = base64_decode(base64_decode($user_id));
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
						//echo $_POST['question'][$i]."<br>";
						
						
						

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
			redirect(base_url('user/investment-objective/'.base64_encode(base64_encode($user_id))));
		}
		$this->load->view('page/question/financialsituation',$data);
		//$this->load->view('page/question/investment_objective',$data);	
	}
	function investmentobjective($user_id)
	{
		//$this->check_registration_session();
		$data = array();
		$recordarray = array();
		$data_arr = array();		
		$data['title'] = "Personel info | 5% Percentage";	
		$user_id = base64_decode(base64_decode($user_id));
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
						//echo $_POST['question'][$i]."<br>";
						
						
						

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
			redirect(base_url('user/knowledge-experience/'.base64_encode(base64_encode($user_id))));
		}	
		$this->load->view('page/question/investment_objective',$data);	
	}
	function knowledgeExperience($user_id)
	{
		//$this->check_registration_session();
		$data = array();
		$recordarray = array();
		$data_arr = array();		
		$data['title'] = "Personel info | 5% Percentage";	
		$user_id = base64_decode(base64_decode($user_id));
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
						//echo $_POST['question'][$i]."<br>";
						
						
						

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
			redirect(base_url('user/understanding-financial-commitment/'.base64_encode(base64_encode($user_id))));
		}	
		$this->load->view('page/question/knowledge_experience',$data);	
	}
	function understandingFinancialcommitment($user_id)
	{
		//$this->check_registration_session();
		$data = array();
		$recordarray = array();
		$data_arr = array();		
		$data['title'] = "Personel info | 5% Percentage";	
		$user_id = base64_decode(base64_decode($user_id));
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
						//echo $_POST['question'][$i]."<br>";
						
						
						

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
			$query = $this->db->get_where('tbl_users',['id'=>$user_id]);	
			$userdata = $query->row();
			$check_user_profile = $this->db->query("SELECT a.id,a.email,b.first_name,b.last_name,b.date_of_birth,b.job_type,b.profile_image,c.name AS country_name  FROM tbl_users a INNER JOIN tbl_user_personel_info b ON a.id=b.user_id LEFT JOIN countries c ON b.country=c.id WHERE a.id='".$user_id."' ");
			$user_profile = $check_user_profile->row();
			$check_subscription = $this->db->query("SELECT * FROM tbl_user_subscription_plan WHERE user_id='".$user_id."'");
			$this->session->set_userdata('user_id',$user_id);
			$this->session->set_userdata('email',$userdata->email);
			$this->session->set_userdata('fname',$user_profile->first_name);
			$this->session->set_userdata('lname',$user_profile->last_name);
			$this->session->set_userdata('country',$user_profile->country_name);
			$this->session->set_userdata('pro_image',$user_profile->profile_image);
			$this->session->set_userdata('plan_id',$check_subscription->row()->plan_id);
			$this->session->set_userdata('user_type',$userdata->user_type);
			$this->session->set_userdata('status',$userdata->status);
			//redirect(base_url('signin'));
			redirect(base_url('user/dashboard'));
			//$this->session->unset_userdata('reg');
		}
		else
		{
			$this->load->view('page/question/understanding_financial_commitment',$data);
		}	
			
	}
	function edit_profile_data()
	{
		$data = array();
		$recordarray = array();
		$data_arr = array();		
		$data['title'] = "Personel info | 5% Percentage";
		$this->load->view('page/profile/profile',$data);
	}
}
