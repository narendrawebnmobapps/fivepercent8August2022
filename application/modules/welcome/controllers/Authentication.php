<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('common');
		$this->load->library('user_agent');
		$this->load->helper('file');
	}
	function send_email($msg,$to,$subject)
    {
    	error_reporting(0);
        $this->load->library('email');
        $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
        $this->email->set_header('Content-type', 'text/html');
        $from_email="noreply@mobileandwebsitedevelopment.com";
        $to_email=trim($to);
        $this->email->from($from_email, 'Five percent Team'); 
        $this->email->to($to_email);
        $this->email->subject($subject); 
        $this->email->message($msg);
        if($this->email->send())
        {
      		return 1;
        }
        else
        {
        	return 0;
        }							 
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
    public function file_check($str)
    {
        $allowed_mime_type_arr = array('application/pdf','image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
        $mime = get_mime_by_extension($_FILES['certificate']['name']);
        if(isset($_FILES['certificate']['name']) && $_FILES['certificate']['name']!="")
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('file_check', 'Please select only pdf/gif/jpg/png file.');
                return false;
            }
        }
        else
        {
            $this->form_validation->set_message('file_check', 'Please choose a file to upload.');
            return false;
        }
    }
	// you need to add this on the controller, this will be the custom validation
	public function validate_age($age) {
	    /*$dob = new DateTime($age);
	    $now = new DateTime();
	    return ($now->diff($dob)->y > 18) ? false : true;*/
	    //return 5;
	     if (time() < strtotime('+18 years', strtotime($age))) {
	     	$this->form_validation->set_message('file_check', 'Age should be more than 18 Years.');
            return false;
        }
        return true;
	}
	function signup()
	{
		error_reporting(0);
		$data = array();		
		$data['title'] = "signup - 5% Percentage";
		$ip_addr = $_SERVER['REMOTE_ADDR'];
		$created_on = date('Y-m-d H:i:s');
		$data['jobtype'] = $this->db->query("SELECT id,jobtype FROM tbl_job_type ORDER BY id")->result();
		$data['appusages'] = $this->db->query("SELECT id,uses FROM tbl_app_ussage ORDER BY id")->result();
		$data['countries'] = $this->db->query("SELECT id,name FROM countries ORDER BY name ASC")->result();
		if($this->input->server('REQUEST_METHOD')=='POST')
		{
			//echo "<pre>"; print_r($_POST);
			//echo $this->validate_age($_POST['date_of_birth'])." jjjj";
			//die;
			$rules = array(
							array(
				                'field' => 'fname',
				                'label' => 'First Name',
				                'rules' => 'required',
				                'errors' => array(
							                       'required' => 'Please Enter a %s.',
							               		 ),
				        		),
							array(
				                'field' => 'lname',
				                'label' => 'Last Name',
				                'rules' => 'required',
				                'errors' => array(
							                       'required' => 'Please Enter a %s.',
							               		 ),
				        		),

							array(
				                'field' => 'email',
				                'label' => 'Email',
				                'rules' => 'required|valid_email|is_unique[tbl_users.email]',
				                'errors' => array(
							                       'required' => 'Please Enter a %s.',
							                       'is_unique'     => 'This %s already exists.',
							                       'valid_email' => 'Please enter valid %s',
							               		 ),
				        		),
							array(
				                'field' => 'phoneNumber',
				                'label' => 'Phone Number',
				                'rules' => 'required|regex_match[/^[0-9]{10}$/]',
				                'errors' => array(
							                       'required' => 'Please Enter a %s.',
							                       //'regex_match'=>'Please enter valid 10 digit phone number'
							               		 ),
				        		),
							array(
				                'field' => 'date_of_birth',
				                'label' => 'Date of Birth',
				                'rules' => 'required|callback_validate_age',
				                'errors' => array(
							                       'required' => 'Please Enter a %s.',
							                       'validate_age'=>'Age should be more than 18 Years'
							               		 ),
				        		),
							array(
				                'field' => 'jobtype',
				                'label' => 'Job Type',
				                'rules' => 'required',
				                'errors' => array(
							                       'required' => 'Please Select a %s.',
							               		 ),
				        		),
							array(
				                'field' => 'country',
				                'label' => 'Country',
				                'rules' => 'required',
				                'errors' => array(
							                       'required' => 'Please Select a %s.',
							               		 ),
				        		),
							array(
				                'field' => 'appusage',
				                'label' => 'App Usage',
				                'rules' => 'required',
				                'errors' => array(
							                       'required' => 'Please Select a %s.',
							               		 ),
				        		),
							array(
				                 'field' => 'password',
				                 'label' => 'Password',
				                 'rules' => 'required|callback_valid_password',
				                 'errors' => array(
				                        'required' => 'Please enter  %s.',
				                        'min_length' => '%s minimum 8 character',
							            'max_length' => '%s maximum 30 character',
				                		),
						        ),
							array(
				                 'field' => 'cpassword',
				                 'label' => 'Confirm Password',
				                 'rules' => 'required|matches[password]',
				                 'errors' => array(
				                        'required' => 'Please enter  %s.',
				                        'matches'=>'Password and confirm password does not match'
				                		),
						        ),
							/*array(
				                 'field' => 'date_of_birth',
				                 'label' => 'Date of birth',
				                 'rules' => "required",
				                 'errors' => array(
				                        'required' => 'Please enter  %s.',
				                		),
						        ),*/
						);
			$this->form_validation->set_rules($rules);
			//die();
			if($this->form_validation->run() == FALSE)
            {
                $this->load->view('page/signup',$data);
            }
            else
            {
               $password_token = $this->common->random_password_token();
               $fname = $this->input->post('fname');
               $lname = $this->input->post('lname');
               $email = $this->input->post('email');
               $phoneNumber = $this->input->post('phoneNumber');
               $jobtype = $this->input->post('jobtype');
               $country = $this->input->post('country');
               $appusage = $this->input->post('appusage');
               $advisor_referral_code = $this->input->post('advisor_referral_code');
               $date_of_birth = $this->input->post('date_of_birth');
               $password = $this->input->post('password');
               $password = md5($password);
               $insertdata = array(
               						'password'=>$password,
               						'email'=>$email,
               						'dob'=>$date_of_birth,
               						'password_token'=>$password_token,
               						'ip_address'=>$ip_addr,
               						'created_on'=>$created_on,
               						'updated_on'=>$created_on,
               					  );
               if($this->db->insert('tbl_users',$insertdata))
               {
               	 $last_inserted_id = $this->db->insert_id();

               	 $insertProfileData = array(
               	 							'user_id'=>$last_inserted_id,
               	 							'first_name'=>$fname,
               	 							'last_name'=>$lname,
               	 							'phone_number'=>$phoneNumber,
               	 							'job_type'=>$jobtype,
               	 							'country'=>$country,
               	 							'app_usage'=>$appusage,
               	 							'created_on'=>$created_on,
               	 							'updated_on'=>$created_on,
               	 							);
               	 
               	 $this->db->insert('tbl_user_personel_info',$insertProfileData);

               	 $checkAdvisorId = $this->db->query("SELECT user_id AS advisor_id FROM tbl_admin_referral_code WHERE referral_code='".$advisor_referral_code."' AND status=1");
               	 if($checkAdvisorId->num_rows()>0)
				 {
				 	$advisor_id = $checkAdvisorId->row()->advisor_id;
				 	$insertdata = array(
										'user_id'=>$last_inserted_id,
										'advisor_id'=>$advisor_id,
										'created_on'=>$created_on,
										'updated_on'=>$created_on,
										);
				 	$this->db->insert('tbl_user_adviser_referral_code_connectivity',$insertdata);
				 }


               	 $this->session->set_userdata('reg',$last_inserted_id);
               	 if($appusage==3)
               	 {
               	 	redirect(base_url('user/personelinfo/'.base64_encode(base64_encode(0)).'/'.base64_encode(base64_encode($last_inserted_id))));
               	 }
               	 else
               	 {
               	 	redirect(base_url('user/subscription-plan/'.base64_encode(base64_encode($last_inserted_id)).'/'.base64_encode(base64_encode($password_token))));
               	 }
               	 
               }
               else
               {

               }
            }
		}
		else
		{
			$this->load->view('page/signup',$data);
		}
		
	}
	function user_registration()
	{
		error_reporting(0);
		$data = array();		
		$data['title'] = "signup - 5% Percentage";
		$ip_addr = $_SERVER['REMOTE_ADDR'];
		$created_on = date('Y-m-d H:i:s');
		if($this->input->server('REQUEST_METHOD')=='POST')
		{
			$rules = array(
							array(
				                'field' => 'username',
				                'label' => 'Username',
				                'rules' => 'required|min_length[6]|max_length[30]|is_unique[tbl_users.username]',
				                'errors' => array(
							                       'required' => 'Please Enter a %s.',
							                       'is_unique'     => 'This %s already exists.',
							                       'min_length' => '%s minimum 6 character',
							                       'max_length' => '%s maximum 30 character',
							               		 ),
				        		),
							array(
				                'field' => 'email',
				                'label' => 'Email',
				                'rules' => 'required|valid_email|is_unique[tbl_users.email]',
				                'errors' => array(
							                       'required' => 'Please Enter a %s.',
							                       'is_unique'     => 'This %s already exists.',
							                       'valid_email' => 'Please enter valid %s',
							               		 ),
				        		),
							array(
				                 'field' => 'password',
				                 'label' => 'Password',
				                 'rules' => 'required|callback_valid_password',
				                 'errors' => array(
				                        'required' => 'Please enter  %s.',
				                        'min_length' => '%s minimum 8 character',
							            'max_length' => '%s maximum 30 character',
				                		),
						        ),
							array(
				                 'field' => 'cpassword',
				                 'label' => 'Confirm Password',
				                 'rules' => 'required|matches[password]',
				                 'errors' => array(
				                        'required' => 'Please enter  %s.',
				                        'matches'=>'Password and confirm password does not match'
				                		),
						        ),
							array(
				                 'field' => 'date_of_birth',
				                 'label' => 'Date of birth',
				                 'rules' => "required",
				                 'errors' => array(
				                        'required' => 'Please enter  %s.',
				                		),
						        ),
						);
			//$this->form_validation->set_rules('reg[dob]', 'Date of birth', 'regex_match[(0[1-9]|1[0-9]|2[0-9]|3(0|1))-(0[1-9]|1[0-2])-\d{4}]');
			$this->form_validation->set_rules($rules);
			if($this->form_validation->run() == FALSE)
            {
                $this->load->view('page/signup',$data);
            }
            else
            {
               $password_token = $this->common->random_password_token();
               $username = $this->input->post('username');
               $email = $this->input->post('email');
               $date_of_birth = $this->input->post('date_of_birth');
               $password = $this->input->post('password');
               $password = md5($password);
               $insertdata = array(
               						'username'=>$username,
               						'password'=>$password,
               						'email'=>$email,
               						'dob'=>$date_of_birth,
               						'password_token'=>$password_token,
               						'ip_address'=>$ip_addr,
               						'created_on'=>$created_on,
               						'updated_on'=>$created_on,
               					  );
               if($this->db->insert('tbl_users',$insertdata))
               {
               	 $last_inserted_id = $this->db->insert_id();
               	 $this->session->set_userdata('reg',$last_inserted_id);
               	 redirect(base_url('user/subscription-plan/'.base64_encode(base64_encode($last_inserted_id)).'/'.base64_encode(base64_encode($password_token))));


               }
               else
               {

               }
            }
		}
	}
	function signin()
	{
		//$this->session->sess_destroy();
		//print_r($this->session->userdata());
		
		$data = array();		
		$data['title'] = "signin | 5% Percentage";
		if($this->input->server('REQUEST_METHOD')=='POST')
		{
			$this->form_validation->set_rules('email', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$password = md5($password);
			if($this->form_validation->run() == TRUE)
            {
                $query = $this->db->get_where('tbl_users',['email'=>$email,'password'=>$password]);			
				if($query->num_rows()>0)
				{
					$userdata = $query->row();
					$check_subscription = $this->db->query("SELECT * FROM tbl_user_subscription_plan WHERE user_id='".$userdata->id."'");
					$check_user_profile = $this->db->query("SELECT a.id,a.email,b.first_name,b.last_name,b.date_of_birth,b.job_type,b.profile_image,b.country,c.name AS country_name  FROM tbl_users a INNER JOIN tbl_user_personel_info b ON a.id=b.user_id LEFT JOIN countries c ON b.country=c.id WHERE a.id='".$userdata->id."' ");
					//echo "<pre>";print_r($check_user_profile->result());die();
					$check_financial_situation = $this->db->query("SELECT a.id,b.user_id,c.id FROM tbl_users a INNER JOIN user_question_answer b ON a.id=b.user_id INNER JOIN tbl_questions c ON b.question_id=c.id WHERE a.id='".$userdata->id."' AND c.question_category=1 ");
					$check_investment_objective = $this->db->query("SELECT a.id,b.user_id,c.id FROM tbl_users a INNER JOIN user_question_answer b ON a.id=b.user_id INNER JOIN tbl_questions c ON b.question_id=c.id WHERE a.id='".$userdata->id."' AND c.question_category=2 ");
					$check_knowledge_experience = $this->db->query("SELECT a.id,b.user_id,c.id FROM tbl_users a INNER JOIN user_question_answer b ON a.id=b.user_id INNER JOIN tbl_questions c ON b.question_id=c.id WHERE a.id='".$userdata->id."' AND c.question_category=3 ");
					$check_understanding_financial_commitment = $this->db->query("SELECT a.id,b.user_id,c.id FROM tbl_users a INNER JOIN user_question_answer b ON a.id=b.user_id INNER JOIN tbl_questions c ON b.question_id=c.id WHERE a.id='".$userdata->id."' AND c.question_category=4");

					if($userdata->user_type==0)
					{
						//for demo account logic
						$subscription_type = @$check_subscription->row()->plan_id;
						$subscription_date = @$check_subscription->row()->updated_on;
						if($check_subscription->num_rows()==0)
						{

							$this->session->unset_userdata('reg');
							redirect(base_url('user/subscription-plan/'.base64_encode(base64_encode($userdata->id)).'/'.base64_encode(base64_encode(date('ymdhis')))));
						}						
						else if($subscription_type==0 AND (strtotime($subscription_date) < strtotime('-30 days')))
						{
							redirect(base_url('user/subscription-plan/'.base64_encode(base64_encode($userdata->id)).'/'.base64_encode(base64_encode(date('ymdhis')))));
						}
						else if($subscription_type>0 AND (strtotime($subscription_date) < strtotime('-1 year')))
						{
							redirect(base_url('user/subscription-plan/'.base64_encode(base64_encode($userdata->id)).'/'.base64_encode(base64_encode(date('ymdhis')))));
						}						
					else if($check_user_profile->num_rows()==0 || $check_financial_situation->num_rows()==0 || $check_investment_objective->num_rows()==0 || $check_knowledge_experience->num_rows()==0 || $check_understanding_financial_commitment->num_rows()==0)
						{
							$user_profile = $check_user_profile->row();
							$this->session->set_userdata('user_id',$userdata->id);
							$this->session->set_userdata('email',$userdata->email);
							$this->session->set_userdata('fname',$user_profile->first_name);
							$this->session->set_userdata('lname',$user_profile->last_name);
							$this->session->set_userdata('country',$user_profile->country_name);
							$this->session->set_userdata('countryID',$user_profile->country);
							$this->session->set_userdata('pro_image',$user_profile->profile_image);
							$this->session->set_userdata('plan_id',$check_subscription->row()->plan_id);
							$this->session->set_userdata('user_type',$userdata->user_type);
							$this->session->set_userdata('status',$userdata->status);
							redirect(base_url('user/personelinfo/'.base64_encode(base64_encode($check_subscription->row()->plan_id))).'/'.base64_encode(base64_encode($userdata->id)));
						}
						else
						{
							//echo "<pre>";print_r($check_understanding_financial_commitment->result());die;
							$user_profile = $check_user_profile->row();
							$this->session->set_userdata('user_id',$userdata->id);
							$this->session->set_userdata('email',$userdata->email);
							$this->session->set_userdata('fname',$user_profile->first_name);
							$this->session->set_userdata('lname',$user_profile->last_name);
							$this->session->set_userdata('country',$user_profile->country_name);
							$this->session->set_userdata('countryID',$user_profile->country);
							$this->session->set_userdata('pro_image',$user_profile->profile_image);
							$this->session->set_userdata('plan_id',$check_subscription->row()->plan_id);
							$this->session->set_userdata('user_type',$userdata->user_type);
							$this->session->set_userdata('status',$userdata->status);
							$this->db->where('id',$userdata->id);
							$this->db->update('tbl_users',array('onlineStatus'=>1));
							redirect(base_url('user/dashboard'));
						}

					}
					else
					{
						$subscription_type = @$check_subscription->row()->plan_id;
						$subscription_date = @$check_subscription->row()->updated_on;
						if($check_subscription->num_rows()==0)
						{
							redirect(base_url('users/advisor/subscription_plan/'.base64_encode(base64_encode($userdata->id)).'/'.base64_encode(base64_encode(date('ymdhis')))));
						}						
						else if($subscription_type>0 AND (strtotime($subscription_date) < strtotime('-1 year')))
						{
							redirect(base_url('users/advisor/subscription_plan/'.base64_encode(base64_encode($userdata->id)).'/'.base64_encode(base64_encode(date('ymdhis')))));
						}
						else
						{
							$user_profile = $check_user_profile->row();
							$this->session->set_userdata('user_id',$userdata->id);
							$this->session->set_userdata('email',$userdata->email);
							$this->session->set_userdata('fname',$user_profile->first_name);
							$this->session->set_userdata('lname',$user_profile->last_name);
							$this->session->set_userdata('country',$user_profile->country_name);
							$this->session->set_userdata('countryID',$user_profile->country);
							$this->session->set_userdata('pro_image',$user_profile->profile_image);
							$this->session->set_userdata('user_type',$userdata->user_type);
							$this->session->set_userdata('plan_id',$check_subscription->row()->plan_id);
							$this->session->set_userdata('status',$userdata->status);
							$this->db->where('id',$userdata->id);
							$this->db->update('tbl_users',array('onlineStatus'=>1));
							redirect(base_url('user/dashboard'));
						}
						
					}	
				}
				else
				{
					$this->session->set_flashdata('msg','Invalid Credentials');
					//redirect(base_url('signin'));
					$this->load->view('page/signin',$data);
				}
            }
            else
            {
                $this->load->view('page/signin',$data);
            }

		}
		else
		{
			$this->load->view('page/signin',$data);
		}	
		
	}
	function registerAsAdvisor()
	{
		error_reporting(0);
		$data = array();		
		$data['title'] = "Register as Advisor | 5% Percentage";
		$ip_addr = $_SERVER['REMOTE_ADDR'];
		$created_on = date('Y-m-d H:i:s');
		if($this->input->server('REQUEST_METHOD')=='POST')
		{
			$rules = array(
							array(
				                'field' => 'fname',
				                'label' => 'First Name',
				                'rules' => 'required',
				                'errors' => array(
							                       'required' => 'Please Enter a %s.',
							               		 ),
				        		),
							array(
				                'field' => 'lname',
				                'label' => 'Last Name',
				                'rules' => 'required',
				                'errors' => array(
							                       'required' => 'Please Enter a %s.',
							               		 ),
				        		),
							array(
				                'field' => 'email',
				                'label' => 'Email',
				                'rules' => 'required|valid_email|is_unique[tbl_users.email]',
				                'errors' => array(
							                       'required' => 'Please Enter a %s.',
							                       'is_unique'     => 'This %s already exists.',
							                       'valid_email' => 'Please enter valid %s',
							               		 ),
				        		),
							array(
				                'field' => 'phoneNumber',
				                'label' => 'Phone Number',
				                'rules' => 'required|regex_match[/^[0-9]{10}$/]',
				                'errors' => array(
							                       'required' => 'Please Enter a %s.',
							                       'regex_match'=>'Please Enter valid 10 digit phone number'
							               		 ),
				        		),
							array(
				                 'field' => 'date_of_birth',
				                 'label' => 'Date of birth',
				                 'rules' => "required",
				                 'errors' => array(
				                        'required' => 'Please enter  %s.',
				                		),
						        ),
							array(
				                 'field' => 'password',
				                 'label' => 'Password',
				                 'rules' => 'required|callback_valid_password',
				                 'errors' => array(
				                        'required' => 'Please enter  %s.',
				                        'min_length' => '%s minimum 8 character',
							            'max_length' => '%s maximum 30 character',
				                		),
						        ),
							array(
				                 'field' => 'cpassword',
				                 'label' => 'Confirm Password',
				                 'rules' => 'required|matches[password]',
				                 'errors' => array(
				                        'required' => 'Please enter  %s.',
				                        'matches'=>'Password and confirm password does not match'
				                		),
						        ),
							
						);

			$this->form_validation->set_rules($rules);
			if($this->form_validation->run() == FALSE)
            {
                $this->load->view('page/registerAsAdvisor',$data);
            }
            else
            {	
	    	   $password_token = $this->common->random_password_token();
	           $fname = $this->input->post('fname');
	           $lname = $this->input->post('lname');
	           $phoneNumber = $this->input->post('phoneNumber');
	           $email = $this->input->post('email');
	           $date_of_birth = $this->input->post('date_of_birth');
	           $password = $this->input->post('password');
	           $password = md5($password);
	           $check_email_existing = $this->db->get_where('tbl_users',array('email'=>$email));
	           if($check_email_existing->num_rows()>0)
	           {

	           	 $this->session->set_flashdata('msg','Email Address already exists');
	           	 $this->load->view('page/registerAsAdvisor',$data);
	           }
	           else
	           {
	               
	               $insertdata = array(
	               						'user_type'=>1,
	               						'password'=>$password,
	               						'email'=>$email,
	               						'dob'=>$date_of_birth,
	               						'password_token'=>$password_token,
	               						'ip_address'=>$ip_addr,
	               						'created_on'=>$created_on,
	               						'updated_on'=>$created_on,
	               					  );
	               if($this->db->insert('tbl_users',$insertdata))
	               {
	               	 $last_inserted_id = $this->db->insert_id();
	               	 $moredataInsert = array(
	               	 						'user_id'=>$last_inserted_id,
	               	 						'first_name'=>$fname,
	               	 						'last_name'=>$lname,
	               	 						'phone_number'=>$phoneNumber,
	               	 						'created_on'=>$created_on,
	               	 						'updated_on'=>$created_on,
	               	 						);
	               	 $this->db->insert('tbl_user_personel_info',$moredataInsert);
	               	 $this->session->set_flashdata('msg','Your Registration Completed,We will verify your registration details and mail you soon.Thank You');
	               	 redirect(base_url('register-as-advisor'));

	               }
	               else
	               {
	               	$this->session->set_flashdata('msg','Something went wrong');
	               	redirect(base_url('register-as-advisor'));
	               }
	           }

            	
            }
		}
		else
		{
			$this->load->view('page/registerAsAdvisor',$data);
		}
	}
	function forget_password()
	{
		error_reporting(0);
		$data = array();		
		$data['title'] = "Forget Password | 5% Percentage";
		$ip_addr = $_SERVER['REMOTE_ADDR'];
		$created_on = date('Y-m-d H:i:s');
		if($this->input->server('REQUEST_METHOD')=='POST')
		{
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			 if ($this->form_validation->run() == FALSE)
             {
                $this->load->view('page/forget_password',$data);
             }
             else
             {
             	$email = $this->input->post("email");
             	//$check_email_existing = $this->db->get_where('tbl_users',array('email'=>$email));
             	$this->db->select('a.password_token,a.id,a.email,b.first_name,b.last_name');
             	$this->db->from('tbl_users a');
             	$this->db->join('tbl_user_personel_info b','a.id=b.user_id','inner');
             	$this->db->where('a.email',$email);
             	$check_email_existing = $this->db->get();
             	if($check_email_existing->num_rows()>0)
             	{
             		//$password_token = $check_email_existing->row()->password_token;
             		$row = $check_email_existing->row();
             		$link = base_url('reset-password/').$row->password_token.'/'.base64_encode(base64_encode($email));
             		$html = "<!DOCTYPE html>
             		<html>
             		<head>
             			<title>Reset Password</title>
             		</head>
             		<body>
             			<p>Hello <b>".$row->first_name." ". $row->last_name."</b> </p>
             			<p>Please Click below link to reset your password <br> <a href='".$link."'>Link</a></p><br>
             			<p>Thank You <br> Five Percent Team</p>
             		</body>
             		</html>";
             		$this->send_email($html,$email,'Reset Password');

             		$this->session->set_flashdata('msg','Please check your email to reset Password');
             		redirect(base_url('forget-passord'));


             	}
             	else
             	{
             		$this->session->set_flashdata('msg','The entered email address not registered with Five Percent');
             		$this->load->view('page/forget_password',$data);
             	}
                
             }
		}
		else
		{
			$this->load->view('page/forget_password',$data);
		}
		
	}
	function reset_password($token,$email)
	{
		$data = array();		
		$data['title'] = "Reset Password | 5% Percentage";
		if($this->input->server('REQUEST_METHOD')=='POST')
		{
			$rules = array(
							array(
				                 'field' => 'password',
				                 'label' => 'Password',
				                 'rules' => 'required|callback_valid_password',
				                 'errors' => array(
				                        'required' => 'Please enter  %s.',
				                        'min_length' => '%s minimum 8 character',
							            'max_length' => '%s maximum 30 character',
				                		),
						        ),
							array(
				                 'field' => 'repassword',
				                 'label' => 'Retype Password',
				                 'rules' => 'required|matches[password]',
				                 'errors' => array(
				                        'required' => 'Please enter  %s.',
				                        'matches'=>'Password and confirm password does not match'
				                		),
						        ),

						);
			$this->form_validation->set_rules($rules);
			if ($this->form_validation->run() == FALSE)
             {
                $this->load->view('page/reset_password',$data);
             }
             else
             {
             	$password_token = $this->common->random_password_token();
             	$email = base64_decode(base64_decode($email));
             	$password = $this->input->post('password');
             	$check_existing = $this->db->query("SELECT * FROM tbl_users WHERE password_token='".$token."' AND email='".$email."'");
             	if($check_existing->num_rows()>0)
             	{
             		$this->db->where('password_token',$token);
             		$this->db->where('email',$email);
             		$this->db->update('tbl_users',array('password'=>md5($password),'password_token'=>$password_token));
             		$this->session->set_flashdata('msg','Password reset successfully');
             		redirect(base_url('signin'));

             	}
             	else
             	{
             		$this->session->set_flashdata('msg','Invalid link');
             		$this->load->view('page/reset_password',$data);
             	}

             }
		}
		else
		{
			$this->load->view('page/reset_password',$data);
		}
		
	}
}
