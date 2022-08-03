<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'libraries/REST_Controller.php';
class Auth extends REST_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('common');
	}
	function send_email($msg,$to,$subject)
    {
        $this->load->library('email');
        $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
        $this->email->set_header('Content-type', 'text/html');
        $from_email="noreply@itdevelopmentservices.com";
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
	function login_post()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$device_toekn = $this->input->post('device_toekn');
		$recordarray = array();
		if($username=="" && $username==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
		}
		if($password=="" && $password==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  Password'),200);
		}
		if($device_toekn=="" && $device_toekn==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  Device Token'),200);
		}
		$password = md5($password);
		$this->db->select("*");
	    $this->db->from("tbl_users");
		$this->db->where('email',$username);		
		$this->db->where('password',$password);
		//$this->db->where('status',0);
		$this->db->where('user_type',0);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			$row  = $query->row();
			$this->db->where('id',$row->id);
			$this->db->update('tbl_users',array('device_token'=>$device_toekn));

			/*Subscription logic*/
			$check_subscription = $this->db->query("SELECT * FROM tbl_user_subscription_plan WHERE user_id='".$row->id."'");
			if($check_subscription->num_rows()>0)
			{
				$subscription_type = $check_subscription->row()->plan_id;
				$subscription_date = $check_subscription->row()->updated_on;

				$rec['plan'] = $subscription_type;
				if($subscription_type==0 AND (strtotime($subscription_date) < strtotime('-30 days')))
				{
					$rec['expire'] = "1";
				}
				else if($subscription_type>0 AND (strtotime($subscription_date) < strtotime('-1 year')))
				{
					$rec['expire'] = "1";
				}
				else
				{
					$rec['expire'] = "0";
				}	
			}
			else
			{
				$rec['plan'] = "";
				$rec['expire'] = "";
			}
			$getProfileInfo = $this->db->query("SELECT first_name,last_name,country as countryID FROM tbl_user_personel_info WHERE user_id='".$row->id."'")->row();

			$rec['user_id'] = $row->id;
			$rec['email'] = $row->email;
			$rec['age'] = $this->common->calculateage($row->dob);
			$rec['user_type'] = $row->user_type;
			$rec['first_name'] = @$getProfileInfo->first_name;
			$rec['last_name'] = @$getProfileInfo->last_name;
			$rec['countryID'] = @$getProfileInfo->countryID;
			$referral_code_check = $this->db->query("SELECT a.referral_code FROM tbl_admin_referral_code a INNER JOIN tbl_user_adviser_referral_code_connectivity b ON a.user_id=b.advisor_id WHERE b.user_id='".$row->id."'");

			if($referral_code_check->num_rows()>0)
			{
				$rec['referral_code'] = $referral_code_check->row()->referral_code;
			}
			else
			{
				$rec['referral_code'] = '';
			}

			array_push($recordarray, $rec);

			$this->response(array('success'=>'true','message'=>'login success','record'=>$recordarray),200);
		}
		else
		{
			$this->response(array('success'=>'false','message'=>'Invalid login credential'),200);
		}
	}
	function check_subscription_status_post()
	{
		$user_id = $this->input->post('user_id');
		if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
		}
		/*Subscription logic*/
		$rec = array();
		$recordarray = array();
		$check_subscription = $this->db->query("SELECT * FROM tbl_user_subscription_plan WHERE user_id='".$user_id."'");
		if($check_subscription->num_rows()>0)
		{
			$subscription_type = $check_subscription->row()->plan_id;
			$subscription_date = $check_subscription->row()->updated_on;

			$rec['plan'] = $subscription_type;
			if($subscription_type==0 AND (strtotime($subscription_date) < strtotime('-30 days')))
			{
				$rec['expire'] = "1";
			}
			else if($subscription_type>0 AND (strtotime($subscription_date) < strtotime('-1 year')))
			{
				$rec['expire'] = "1";
			}
			else
			{
				$rec['expire'] = "0";
			}	
		}
		else
		{
			$rec['plan'] = "";
			$rec['expire'] = "";
		}
		array_push($recordarray, $rec);
		$this->response(array('success'=>'true','record'=>$recordarray),200);

	}
	function signup_post()
	{
		
		$password_token = $this->common->random_password_token();
        //$username = $this->input->post('username');
        $fname = $this->input->post('fname');
        $lname = $this->input->post('lname');
        $email = $this->input->post('email');
        $dob = $this->input->post('dob');
        $phone_number = $this->input->post('phone_number');
        $job_type = $this->input->post('job_type');
        $country = $this->input->post('country');
        $appusage = $this->input->post('appusage');
        $advisor_referral_code = $this->input->post('advisor_referral_code');
        $password = $this->input->post('password');
        $cpassword = $this->input->post('cpassword');
        $ip_addr = $_SERVER['REMOTE_ADDR'];
		$created_on = date('Y-m-d H:i:s');
		if($email=="" && $email==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Enter Email Address'),200);
		}
		if($dob=="" && $dob==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Enter Date of Birth'),200);
		}
		if($password=="" && $password==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Enter Password'),200);
		}
		if($cpassword=="" && $cpassword==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Enter confirm Password'),200);
		}
		if($password!=$cpassword)
		{
			$this->response(array('success'=>'false','message'=>'Password does not match'),200);
		}

		$check_email_existing = $this->db->get_where('tbl_users',array('email'=>$email));
		if($check_email_existing->num_rows()>0)
		{
			$this->response(array('success'=>'false','message'=>'Email already exist,try another'),200);
		}

		$password = md5($password);
        $insertdata = array(
       						'password'=>$password,
       						'email'=>$email,
       						'dob'=>$dob,
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
        								'phone_number'=>$phone_number,
        								'job_type'=>$job_type,
        								'country'=>$country,
        								'app_usage'=>$appusage,
        								'created_on'=>$created_on,
        								'updated_on'=>$created_on
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

        	$age = $this->common->calculateage($dob);
        	$this->response(array('success'=>'true','message'=>'Registration successfully completed','user_id'=>$last_inserted_id,'age'=>$age),200);

        }
        else
        {
        	$this->response(array('success'=>'false','message'=>'Something went wrong'),200);
        }
	}
	function forget_password_post()
	{
		$email = $this->input->post('email');
		if($email=="" && $email==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Enter Email Address'),200);
		}
		$check_email_existing = $this->db->get_where('tbl_users',array('email'=>$email));
		if($check_email_existing->num_rows()>0)
		{
			$user_id = $check_email_existing->row()->id;
			$otp = date('dis');
			$date_time = date('Y-m-d H:i:s');
			$check_existing_otp = $this->db->get_where('tbl_reset_password_otp',array('email'=>$email));
			if($check_existing_otp->num_rows()>0)
			{
				$this->db->where('email',$email);
				$this->db->delete('tbl_reset_password_otp');
			}
			$insertdata = array(
								'user_id'=>$user_id,
								'email'=>$email,
								'otp'=>$otp,
								'created_on'=>$date_time,
								'updated_on'=>$date_time,
							);
			$this->db->insert('tbl_reset_password_otp',$insertdata);
			$to = $email;
			$msg = "You reset password otp is ".$otp;
			$subject = "Reset Password OTP";
			$this->send_email($msg,$to,$subject);
			$this->response(array('success'=>'true','message'=>'Otp Sent with you your email address'),200);
		}
		else
		{
			$this->response(array('success'=>'false','message'=>'Email you are entered not with fivepercent'),200);
		}

	}
	function reset_password_post()
	{
		$otp = $this->input->post('otp');
		$newpass = $this->input->post('newpass');
		$confirmpass =  $this->input->post('confirmpass');

		if($otp=="" && $otp==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Enter OTP'),200);
		}
		if($newpass=="" && $newpass==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Enter New Password'),200);
		}
		if($confirmpass=="" && $confirmpass==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Enter Confirm Password'),200);
		}
		if($newpass!=$confirmpass)
		{
			$this->response(array('success'=>'false','message'=>'Password does not match'),200);
		}

		$checkdata = $this->db->query("SELECT a.user_id,b.id FROM tbl_reset_password_otp a INNER JOIN tbl_users b ON a.user_id=b.id WHERE a.otp='".$otp."'");
		if($checkdata->num_rows()>0)
		{
			$user_id = $checkdata->row()->id;
			$this->db->where('id',$user_id);
			$this->db->update('tbl_users',array('password'=>md5($newpass)));

			$this->db->where('otp',$otp);
			$this->db->delete('tbl_reset_password_otp');

			$this->response(array('success'=>'true','message'=>'Password Changed Successfully'),200);
		}
		else
		{
			$this->response(array('success'=>'false','message'=>'Invalid otp'),200);
		}


	}

	function countries_list_post()
	{
		$resultdata = $this->db->query("SELECT id,name FROM countries ORDER BY name ASC")->result();
		$this->response(array('success'=>'true','record'=>$resultdata),200);
	}
	function subscription_plan_post()
	{
		$recordarray = array();
		$data_arr = array();
		$resultdata = $this->db->query("SELECT * FROM tbl_admin_subscription_plan")->result();
		foreach($resultdata as $res)
		{
			$data_arr['plan_name'] = $res->plan_name;
			$data_arr['price'] = $res->price;
			$data_arr['id'] = $res->id;
			$features = $this->db->query("SELECT * FROM tbl_admin_subscription_feature WHERE subs_id='".$res->id."'")->result();
			$data_arr['features'] = $features;
			array_push($recordarray, $data_arr);

		}
		$this->response(array('success'=>'true','record'=>$recordarray),200);
	}
	function choose_subscription_plan_post()
	{
		$user_id = $this->input->post('user_id');
		$plan_id = $this->input->post('plan_id');
		if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide user Id'),200);
		}
		if($plan_id=="" && $plan_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide Plan Id'),200);
		}
		$currentdate = date("Y-m-d h:i:s");

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
								'user_id'=>$user_id,
								'plan_id'=>$plan_id,
								'created_on'=>$currentdate,
								'updated_on'=>$currentdate,
								);
			$this->db->where('user_id',$user_id);
			$this->db->update('tbl_user_subscription_plan',$UpdatePlan);
		}
		$this->response(array('success'=>'true','message'=>'selected','plan'=>$plan_id),200);
	}
	function get_user_profile_post()
	{
		$user_id = $this->input->post('user_id');
		if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide user Id'),200);
		}
		$user_profile_data = $this->db->query("SELECT a.id,a.user_type,a.email,a.dob,b.first_name,b.last_name,b.phone_number,b.martial_status,b.expYears,b.speciality,b.no_of_child,b.job_type AS job_type_id,b.country AS country_id,b.app_usage AS app_usage_id,b.talk_to_advisor,b.profile_image,c.name AS country_name,d.jobtype,e.uses AS app_usage FROM tbl_users a INNER JOIN tbl_user_personel_info b ON a.id=b.user_id INNER JOIN countries c ON b.country=c.id INNER JOIN tbl_job_type d ON b.job_type=d.id INNER JOIN tbl_app_ussage e ON b.app_usage=e.id WHERE a.id='".$user_id."'")->row();
		$this->response(array('success'=>'true','record'=>$user_profile_data),200);

	}
	function get_job_type_post()
	{
		$get_data = $this->db->query("SELECT id,jobtype FROM tbl_job_type ORDER BY id")->result();
		$this->response(array('success'=>'true','record'=>$get_data),200);

	}
	function get_app_usage_post()
	{
		$get_data = $this->db->query("SELECT id,uses FROM tbl_app_ussage ORDER BY id")->result();
		$this->response(array('success'=>'true','record'=>$get_data),200);
	}
	function save_user_details_post()
	{
		$user_id = $this->input->post('user_id');
		$fname = $this->input->post('fname');
		$lname = $this->input->post('lname');
		$date_of_birth = $this->input->post('date_of_birth');
		$email = $this->input->post('email');
		$phonenumber = $this->input->post('phonenumber');
		$martial_status = $this->input->post('martial_status');
		$noOfChild = $this->input->post('noOfChild');
		$job = $this->input->post('job');
		$country = $this->input->post('country');
		$appusage = $this->input->post('appusage');
		$talktoadviser = $this->input->post('talktoadviser');
		$currentdate = date("Y-m-d h:i:s");

		if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide user Id'),200);
		}
		if($fname=="" && $fname==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide Fisrt Name'),200);
		}
		if($lname=="" && $lname==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide Last Name'),200);
		}
		if($date_of_birth=="" && $date_of_birth==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide date of birth'),200);
		}
		if($email=="" && $email==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide Email Address'),200);
		}
		if($phonenumber=="" && $phonenumber==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide Phone Number'),200);
		}
		if($martial_status=="" && $martial_status==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide Martial Status'),200);
		}
		if($job=="" && $job==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide Job Type'),200);
		}
		if($country=="" && $country==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide Country'),200);
		}
		if($appusage=="" && $appusage==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide App Usage'),200);
		}
		if($talktoadviser=="" && $talktoadviser==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide Talk to an advisor'),200);
		}
		
		$check_existing = $this->db->get_where("tbl_user_personel_info",array('user_id'=>$user_id))->num_rows();

		$image2 = "";
		if(isset($_FILES['proimage']['name']))
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
	     // echo $image2;
		//die;
		if($check_existing==0)
		{	
			
			
			$insertdata = array(
								'user_id'=>$user_id,
								'first_name'=>$fname,
								'last_name'=>$lname,
								'phone_number'=>$phonenumber,
								//'date_of_birth'=>$date_of_birth,
								'martial_status'=>$martial_status,
								'no_of_child'=>$noOfChild,
								'job_type'=>$job,
								'country'=>$country,
								'app_usage'=>$appusage,
								'talk_to_advisor'=>$talktoadviser,
								'profile_image'=>$image2,
								'created_on'=>$currentdate,
								'updated_on'=>$currentdate,
								);

			$this->db->insert('tbl_user_personel_info',$insertdata);
		}
		else
		{

			$insertdata = array(
								'first_name'=>$fname,
								'last_name'=>$lname,
								'phone_number'=>$phonenumber,
								//'date_of_birth'=>$date_of_birth,
								'martial_status'=>$martial_status,
								'no_of_child'=>$noOfChild,
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
		}
		$this->db->where('id',$user_id);
		$this->db->update('tbl_users',array('dob'=>$date_of_birth));
		//returning user details data.
		$user_profile_data = $this->db->query("SELECT a.id,a.user_type,a.email,a.dob,b.first_name,b.last_name,b.phone_number,b.martial_status,b.expYears,b.speciality,b.no_of_child,b.job_type AS job_type_id,b.country AS country_id,b.app_usage AS app_usage_id,b.talk_to_advisor,b.profile_image,c.name AS country_name,d.jobtype,e.uses AS app_usage FROM tbl_users a INNER JOIN tbl_user_personel_info b ON a.id=b.user_id INNER JOIN countries c ON b.country=c.id INNER JOIN tbl_job_type d ON b.job_type=d.id INNER JOIN tbl_app_ussage e ON b.app_usage=e.id WHERE a.id='".$user_id."'")->row();

		$this->response(array('success'=>'true','message'=>'Profile Saved successfully','user_id'=>$user_id,'record'=>$user_profile_data),200);

	}
	function financial_situation_question_post()
	{
		$user_id = $this->input->post('user_id');
		if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide user Id'),200);
		}

		$recordarray = array();
		$data_arr = array();
		$datetime = date('Y-m-d H:i:s');

		$value_query = "SELECT b.value FROM user_question_options b WHERE a.id=b.options AND b.user_id='".$user_id."'";
		$answer_query = "SELECT COUNT(c.options) FROM user_question_options c WHERE a.id=c.options AND c.user_id='".$user_id."'";
		//$chekdata = $this->db->query("SELECT a.id,a.options,($value_query) AS value,($answer_query) AS answer FROM tbl_question_options a WHERE a.question_id=3")->result();
		//print_r($chekdata);
		//die;
		$resultdata = $this->db->query("SELECT * FROM tbl_questions WHERE question_category=1 AND lang_id=1 ORDER BY question_type ASC")->result();
		foreach($resultdata as $res)
		{
			$data_arr['question'] = $res->question;
			$data_arr['id'] = $res->id;
			$data_arr['question_type'] = $res->question_type;
			$data_arr['question_category'] = $res->question_category;
			$options = $this->db->query("SELECT a.id,a.options,(SELECT b.value FROM user_question_options b WHERE a.id=b.options AND b.user_id='".$user_id."' AND b.question_id='".$res->id."') AS answer,(SELECT COUNT(c.options) FROM user_question_options c WHERE a.id=c.options AND c.user_id='".$user_id."' AND c.question_id='".$res->id."') AS selected FROM tbl_question_options a WHERE a.question_id='".$res->id."'")->result();
			$data_arr['options'] = $options;
			array_push($recordarray, $data_arr);

		}
		$this->response(array('success'=>'true','record'=>$recordarray),200);
	}
	function investment_objective_question_post()
	{
		$user_id = $this->input->post('user_id');
		if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide user Id'),200);
		}

		$recordarray = array();
		$data_arr = array();		
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
			$options = $this->db->query("SELECT a.id,a.options,(SELECT b.value FROM user_question_options b WHERE a.id=b.options AND b.user_id='".$user_id."' AND b.question_id='".$res->id."') AS answer,(SELECT COUNT(c.options) FROM user_question_options c WHERE a.id=c.options AND c.user_id='".$user_id."' AND c.question_id='".$res->id."') AS selected FROM tbl_question_options a WHERE a.question_id='".$res->id."'")->result();
			$data_arr['options'] = $options;
			array_push($recordarray, $data_arr);

		}
		$this->response(array('success'=>'true','record'=>$recordarray),200);
	}
	function knowledge_experience_question_post()
	{
		$user_id = $this->input->post('user_id');
		if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide user Id'),200);
		}

		$recordarray = array();
		$data_arr = array();		
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
			$options = $this->db->query("SELECT a.id,a.options,(SELECT b.value FROM user_question_options b WHERE a.id=b.options AND b.user_id='".$user_id."' AND b.question_id='".$res->id."') AS answer,(SELECT COUNT(c.options) FROM user_question_options c WHERE a.id=c.options AND c.user_id='".$user_id."' AND c.question_id='".$res->id."') AS selected FROM tbl_question_options a WHERE a.question_id='".$res->id."'")->result();
			$data_arr['options'] = $options;
			array_push($recordarray, $data_arr);

		}
		$this->response(array('success'=>'true','record'=>$recordarray),200);
	}

	function understanding_financial_commitment_post()
	{
		$user_id = $this->input->post('user_id');
		if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide user Id'),200);
		}

		$recordarray = array();
		$data_arr = array();		
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
			$options = $this->db->query("SELECT a.id,a.options,(SELECT b.value FROM user_question_options b WHERE a.id=b.options AND b.user_id='".$user_id."' AND b.question_id='".$res->id."') AS answer,(SELECT COUNT(c.options) FROM user_question_options c WHERE a.id=c.options AND c.user_id='".$user_id."' AND c.question_id='".$res->id."') AS selected FROM tbl_question_options a WHERE a.question_id='".$res->id."'")->result();
			$data_arr['options'] = $options;
			array_push($recordarray, $data_arr);

		}
		$this->response(array('success'=>'true','record'=>$recordarray),200);
	}
	function insert_questions_answers_post()
	{
		$user_id = $this->input->post('user_id');
		$datetime = date('Y-m-d H:i:s');
		if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide user Id'),200);
		}
			$arr = (json_decode($_POST['question']));
			//echo "<pre>";print_r($arr);
			//die;
			for($i=0;$i<count($arr);$i++)
			{
				$this->db->where('question_id',$arr[$i]->id);
				$this->db->where('user_id',$user_id);
				$this->db->delete('user_question_options');
				$check_existing = $this->db->query("SELECT * FROM user_question_answer WHERE user_id='".$user_id."' AND question_id='".$arr[$i]->id."'")->num_rows();
				if($check_existing==0)
				{
					$question_array = array(
										'user_id'=>$user_id,
										'question_id'=>$arr[$i]->id,
										'q_type'=>$arr[$i]->type,
										'created_on'=>$datetime,
										'updated_on'=>$datetime,
										);
					$this->db->insert('user_question_answer',$question_array);
					
				}
				for($j=0;$j<count($arr[$i]->option);$j++)
				{
					//echo $arr[$i]->option[$j]->id."<br>";
					$check_option_existing = $this->db->query("SELECT * FROM user_question_options WHERE user_id='".$user_id."' AND question_id='".$arr[$i]->id."' AND options='".$arr[$i]->option[$j]->id."' ")->num_rows();
					if($check_option_existing>0)
					{
						$option_arr = array(
										'value'=>$arr[$i]->option[$j]->value,
										'created_on'=>$datetime,
										'updated_on'=>$datetime,
										);
						$this->db->where('user_id',$user_id);
						$this->db->where('question_id',$arr[$i]->id);
						$this->db->where('options',$arr[$i]->option[$j]->id);
						$this->db->update('user_question_options',$option_arr);
					}
					else
					{
						$option_arr = array(
										'user_id'=>$user_id,
										'question_id'=>$arr[$i]->id,
										'options'=>$arr[$i]->option[$j]->id,
										'value'=>$arr[$i]->option[$j]->value,
										'created_on'=>$datetime,
										'updated_on'=>$datetime,
										);
						$this->db->insert('user_question_options',$option_arr);
					}
					
				}						
				
			}	
		$this->response(array('success'=>'true','message'=>'completed'),200);

	}

	function risk_profile_post()
	{
		$user_id = $this->input->post('user_id');
		if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide user Id'),200);
		}
		$this->db->select('tu.email,tu.status,pi.first_name,tu.dob,pi.last_name,pi.job_type,pi.profile_image,pi.martial_status,pi.no_of_child');
		$this->db->from('tbl_users tu');
		$this->db->join('tbl_user_personel_info pi', 'tu.id = pi.user_id');
		$this->db->where('tu.id',$user_id);
		$result = $this->db->get()->row();
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
		$all_money = '0';
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

		$rf_data = array();
		$rf_recordarray = array();

		$rv_data = array();
		$rv_arraydata = array();

		$option_data = array();
		$option_arraydata = array();

		 $sql1="SELECT count(m.user_id) from tbl_user_stock_management m where m.stock_id=a.id and m.user_id='".$user_id."'";
		 $sql2="SELECT m1.user_id from tbl_user_stock_management m1 where m1.stock_id=a.id limit 1";
		$stock_ibex30_res = $this->db->query("SELECT a.stock_name,a.id, ($sql1) as exist FROM tbl_admin_stock a WHERE a.stock_type=1 ORDER BY a.id  LIMIT 4")->result();
		foreach($stock_ibex30_res as $rf_stock)
		{
			$rf_data['id'] = $rf_stock->id;
			$rf_data['stock_name'] = $rf_stock->stock_name;
			$rf_data['value'] = "4.7";
			$rf_data['exist'] = $rf_stock->exist;
			$rf_data['s_type'] = "2";
			array_push($rf_recordarray, $rf_data);
		}	

		$stock_vn30s_res = $this->db->query("SELECT a.stock_name,a.id, ($sql1) as exist FROM tbl_admin_stock a WHERE a.stock_type=2 ORDER BY a.id ASC  LIMIT 4")->result();
		foreach($stock_vn30s_res as $rv_stock)
		{
			$rv_data['id'] = $rv_stock->id;
			$rv_data['stock_name'] = $rv_stock->stock_name;
			$rv_data['value'] = "4.5";
			$rv_data['exist'] = $rv_stock->exist;
			$rv_data['s_type'] = "1";
			array_push($rv_arraydata, $rv_data);
		}

		$stock_options = $this->db->query("SELECT a.stock_name,a.id, ($sql1) as exist FROM tbl_admin_stock a WHERE a.stock_type=2 ORDER BY a.id DESC LIMIT 4 ")->result();
		foreach($stock_options as $option_stock)
		{
			$option_data['id'] = $option_stock->id;
			$option_data['stock_name'] = $option_stock->stock_name;
			$option_data['value'] = "4.3";
			$option_data['exist'] = $option_stock->exist;
			$option_data['s_type'] = "3";

			array_push($option_arraydata, $option_data);
		}

		if($risk_percent>=0 && $risk_percent<=50)
		{
			$risk_mode = "Conservative";
			$checkRisk = 1;
		}
		if($risk_percent>=51 && $risk_percent<=75)
		{
			$risk_mode = "Moderate";
			$checkRisk = 2;
		}
		if($risk_percent>=76 && $risk_percent<=100)
		{
			$risk_mode = "Risky";
			$checkRisk = 3;
		}
		$getRisksData = $this->db->query("SELECT * FROM tbl_admin_stock_configuration WHERE riskCheck='".$checkRisk."'")->row();
		//echo "<pre>";print_r($getRisksData);die;

		$sql1="SELECT count(m.user_id) from tbl_user_stock_management m where m.stock_id=a.id and m.user_id='".$user_id."'";
		if($checkRisk==1)
		{
			$data['stock_rfs'] = $this->db->query("SELECT a.id,a.stock_name,a.volatility AS value,($sql1) as exist  FROM tbl_admin_stock a  WHERE a.stock_type=1 AND a.volatility<'".$getRisksData->endPoint."' ORDER BY a.volatility  LIMIT 10")->result();
			$data['stock_rvs'] = $this->db->query("SELECT a.id,a.stock_name,a.volatility AS value,($sql1) as exist  FROM tbl_admin_stock a  WHERE a.stock_type=1 AND a.volatility<'".$getRisksData->endPoint."' ORDER BY a.volatility  LIMIT 10")->result();
			$data['stock_options'] = $this->db->query("SELECT a.id,a.stock_name,a.volatility AS value,($sql1) as exist  FROM tbl_admin_stock a  WHERE a.stock_type=1 AND a.volatility<'".$getRisksData->endPoint."' ORDER BY a.volatility DESC LIMIT 10")->result();
		}
		if($checkRisk==2)
		{
			$data['stock_rfs'] = $this->db->query("SELECT a.id,a.stock_name,a.volatility AS value,($sql1) as exist  FROM tbl_admin_stock a  WHERE a.stock_type=1 AND  (a.volatility BETWEEN '".$getRisksData->startPoint."' AND '".$getRisksData->endPoint."') ORDER BY a.volatility  LIMIT 10")->result();
			$data['stock_rvs'] = $this->db->query("SELECT a.id,a.stock_name,a.volatility AS value,($sql1) as exist  FROM tbl_admin_stock a  WHERE a.stock_type=1 AND  (a.volatility BETWEEN '".$getRisksData->startPoint."' AND '".$getRisksData->endPoint."') ORDER BY a.volatility  LIMIT 10")->result();
			$data['stock_options'] = $this->db->query("SELECT a.id,a.stock_name,a.volatility AS value,($sql1) as exist  FROM tbl_admin_stock a  WHERE a.stock_type=1 AND  (a.volatility BETWEEN '".$getRisksData->startPoint."' AND '".$getRisksData->endPoint."') ORDER BY a.volatility DESC LIMIT 10")->result();
		}
		if($checkRisk==3)
		{
			$data['stock_rfs'] = $this->db->query("SELECT a.id,a.stock_name,a.volatility AS value,($sql1) as exist  FROM tbl_admin_stock a  WHERE a.stock_type=1 AND  (a.volatility>'".$getRisksData->startPoint."' AND a.volatility<'".$getRisksData->endPoint."') ORDER BY a.volatility  LIMIT 10")->result();

			$data['stock_rvs'] = $this->db->query("SELECT a.id,a.stock_name,a.volatility AS value,($sql1) as exist  FROM tbl_admin_stock a  WHERE a.stock_type=1 AND (a.volatility>'".$getRisksData->startPoint."' AND a.volatility<'".$getRisksData->endPoint."') ORDER BY a.volatility  LIMIT 10")->result();

			$data['stock_options'] = $this->db->query("SELECT a.id,a.stock_name,a.volatility AS value,($sql1) as exist  FROM tbl_admin_stock a  WHERE a.stock_type=1 AND (a.volatility>'".$getRisksData->startPoint."' AND a.volatility<'".$getRisksData->endPoint."') ORDER BY a.volatility DESC LIMIT 10")->result();
		}
		$this->response(array('success'=>'true','record'=>$result,'risk_percent'=>$risk_percent,'risk_mode'=>$risk_mode,'RF'=>$RF,'RV'=>$RV,'option'=>$option,'all_money'=>$all_money,'money_use_percentage'=>$money_use_percentage,'RF_Stock'=>$data['stock_rfs'],'RV_Stock'=>$data['stock_rvs'],'options'=>$data['stock_options']),200);
	}
	function client_balance_sheet_post()
	{
		$user_id = $this->input->post('user_id');
		$currentdate = date('Y-m-d H:i:s');
		if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide user Id'),200);
		}
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
			//print_r($get_income_expense);die;
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
		//Total Assets - Total Liability = Total Equity
		$total_equity = $total_assets-$total_liabilities;
		//echo $total_equity;

		$this->response(array('success'=>'true','income_data'=>$income_recordarray,'total_income'=>$total_monthly_income,'expense_data'=>$expense_recordarray,'total_expense'=>$total_monthly_expenses,'total_monthly_cash'=>$total_monthly_cash,'assets_data'=>$assets_recordarray,'total_assets'=>$total_assets,'liability_data'=>$liability_recordarray,'total_liability'=>$total_liabilities,'total_equity'=>$total_equity),200);
	}
	function add_balance_sheet_post()
	{
		$currentdate = date("Y-m-d h:i:s");
		$user_id = $this->input->post('user_id');
		$type = $this->input->post('type');
		$parameter = $this->input->post('parameter');
		$value = $this->input->post('value');
		if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide user Id'),200);
		}
		if($type=="" && $type==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide Balance Type'),200);
		}
		if($parameter=="" && $parameter==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide Parameter'),200);
		}
		if($value=="" && $value==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide Value'),200);
		}

		$insertArrayData = array(
								'user_id'=>$user_id,
								'type'=>$type,
								'parameters'=>$parameter,
								'value'=>$value,
								'created_on'=>$currentdate,
								);

		$this->db->insert('tbl_user_balance_sheet',$insertArrayData);
		$this->response(array('success'=>'true','message'=>'Data saved successfully'),200);
	}
	function update_client_balance_sheet_post()
	{
		$currentdate = date("Y-m-d h:i:s");
		$user_id = $this->input->post('user_id');
		$balance_sheet_id = $this->input->post('balance_sheet_id');
		$parameter = $this->input->post('parameter');
		$value = $this->input->post('value');
		if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide user Id'),200);
		}
		if($balance_sheet_id=="" && $balance_sheet_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide Balance Sheet Id'),200);
		}
		if($parameter=="" && $parameter==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide Parameter'),200);
		}
		if($value=="" && $value==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide Value'),200);
		}

		$insertdata = array(
							'parameters'=>$parameter,
							'value'=>$value,
							'updated_on'=>$currentdate,
							);
		$this->db->where('user_id',$user_id);
		$this->db->where('id',$balance_sheet_id);
		$this->db->update('tbl_user_balance_sheet',$insertdata);
		$this->response(array('success'=>'true','message'=>'Data saved successfully'),200);
	}
	function delete_client_sheet_balance_post()
	{
		$user_id = $this->input->post('user_id');
		$balance_sheet_id = $this->input->post('balance_sheet_id');
		if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide user Id'),200);
		}
		if($balance_sheet_id=="" && $balance_sheet_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide Balance Sheet Id'),200);
		}
		$this->db->where('user_id',$user_id);
		$this->db->where('id',$balance_sheet_id);
		$this->db->delete('tbl_user_balance_sheet');
		$this->response(array('success'=>'true','message'=>'Data deleted successfully'),200);

	}
	function  get_user_profile_data_post()
	{
		$user_id = $this->input->post('user_id');
		if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide user Id'),200);
		}
		$user_profile_data = $this->db->query("SELECT a.id,a.user_type,a.email,a.dob,b.first_name,b.last_name,b.phone_number,b.martial_status,b.expYears,b.speciality,b.no_of_child,b.job_type AS job_type_id,b.country AS country_id,b.app_usage AS app_usage_id,b.talk_to_advisor,b.profile_image,c.name AS country_name,d.jobtype,e.uses AS app_usage FROM tbl_users a INNER JOIN tbl_user_personel_info b ON a.id=b.user_id INNER JOIN countries c ON b.country=c.id INNER JOIN tbl_job_type d ON b.job_type=d.id INNER JOIN tbl_app_ussage e ON b.app_usage=e.id WHERE a.id='".$user_id."'")->row();
		$this->response(array('success'=>'true','record'=>$user_profile_data),200);
	}
	function update_user_profile_post()
	{
		$user_id = $this->input->post('user_id');
		$fname = $this->input->post('fname');
		$lname = $this->input->post('lname');
		$date_of_birth = $this->input->post('date_of_birth');
		$email = $this->input->post('email');
		$martial_status = $this->input->post('martial_status');
		$noOfChild = $this->input->post('noOfChild');
		$job = $this->input->post('job');
		$country = $this->input->post('country');
		$appusage = $this->input->post('appusage');
		$talktoadviser = $this->input->post('talktoadviser');
		$currentdate = date("Y-m-d h:i:s");

		if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide user Id'),200);
		}
		if($fname=="" && $fname==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide Fisrt Name'),200);
		}
		if($lname=="" && $lname==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide Last Name'),200);
		}
		if($date_of_birth=="" && $date_of_birth==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide date of birth'),200);
		}
		if($email=="" && $email==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide Email Address'),200);
		}
		if($martial_status=="" && $martial_status==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide Martial Status'),200);
		}
		if($job=="" && $job==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide Job Type'),200);
		}
		if($country=="" && $country==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide Country'),200);
		}
		if($appusage=="" && $appusage==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide App Usage'),200);
		}
		if($talktoadviser=="" && $talktoadviser==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide Talk to an advisor'),200);
		}

		$image2 = "";
		if(isset($_FILES['proimage']['name']))
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

		$insertdata = array(
							'first_name'=>$fname,
							'last_name'=>$lname,
							//'date_of_birth'=>$date_of_birth,
							'martial_status'=>$martial_status,
							'no_of_child'=>$noOfChild,
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
		$this->response(array('success'=>'true','message'=>'Profile Updated successfully'),200);
	}
	function change_password_post()
	{
		$user_id = $this->input->post('user_id');
		$current_pass = $this->input->post('current_pass');
		$newpass = $this->input->post('newpass');
		$confirmpass = $this->input->post('confirmpass');
		$datetime = date("Y-m-d H:i:s");
		if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide user Id'),200);
		}
		if($current_pass=="" && $current_pass==null)
		{
			$this->response(array('success'=>'false','message'=>'Please enter Current Password'),200);
		}
		if($newpass=="" && $newpass==null)
		{
			$this->response(array('success'=>'false','message'=>'Please enter new password'),200);
		}
		if($confirmpass=="" && $confirmpass==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Confirm Password'),200);
		}
		if($newpass!==$confirmpass)
		{
			$this->response(array('success'=>'false','message'=>'Password does not match'),200);
		}
		$current_pass = trim(md5($current_pass));

		$check_current_pass = $this->db->query("SELECT * FROM tbl_users WHERE  password='".$current_pass."'");

		if($check_current_pass->num_rows()<1)
		{
			$this->response(array('success'=>'false','message'=>'Invalid Current Password'),200);
		}
		$insertdata = array(
							'password'=>md5($newpass),
							'updated_on'=>$datetime
							);
		$this->db->where('id',$user_id);
		$this->db->where('password',$current_pass);
		$this->db->update('tbl_users',$insertdata);
		$this->response(array('success'=>'true','message'=>'Password Changed Successfully'),200);
	}
	function register_as_advisor_post()
	{
		$ip_addr = $_SERVER['REMOTE_ADDR'];
		$created_on = date('Y-m-d H:i:s');
		$fname = $this->input->post('fname');
        $lname = $this->input->post('lname');
        $phoneNumber = $this->input->post('phoneNumber');
        $email = $this->input->post('email');
        $date_of_birth = $this->input->post('date_of_birth');
        $password = $this->input->post('password');
        $cpassword = $this->input->post('cpassword');
        if($fname=="" && $fname==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide Fisrt Name'),200);
		}
		if($lname=="" && $lname==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide Last Name'),200);
		}
		if($phoneNumber=="" && $phoneNumber==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide Phone Number'),200);
		}
		if($email=="" && $email==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide Email Address'),200);
		}
		if($date_of_birth=="" && $date_of_birth==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide date of birth'),200);
		}
		if($password=="" && $password==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide Password'),200);
		}
		if($cpassword=="" && $cpassword==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide Confirm Password'),200);
		}
		if($password!==$cpassword)
		{
			$this->response(array('success'=>'false','message'=>'Password does not match'),200);
		}
		$check_email_existing = $this->db->query("SELECT * FROM tbl_users WHERE email='".$email."'")->num_rows();
		if($check_email_existing>0)
		{
			$this->response(array('success'=>'false','message'=>'Email already exists,try another'),200);
		}
        $password_token = $this->common->random_password_token();
        $fname = $this->input->post('fname');
        $lname = $this->input->post('lname');
        $phoneNumber = $this->input->post('phoneNumber');
        $email = $this->input->post('email');
        $date_of_birth = $this->input->post('date_of_birth');
        $password = $this->input->post('password');
        $password = md5($password);
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
       	  $this->response(array('success'=>'true','message'=>'Your Registration Completed,We will verify your registration details and mail you soon.Thnak You'),200);
        }
        else
        {
        	$this->response(array('success'=>'false','message'=>'Something went wrong'),200);
        }
	}
	function update_user_stock_rf_rv_values_post()
	{
		$created_on = date('Y-m-d H:i:s');
		$user_id = $this->input->post('user_id');
		$all_money = $this->input->post('all_money');
		$money_use_percentage = $this->input->post('money_use_percentage');
		if($all_money==0)
		{
			$money_use_percentage=100;
		}
		if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide User Id'),200);
		}
		$rf = $this->input->post('rf');
		$rv = $this->input->post('rv');
		$option = $this->input->post('option');
		$this->db->where('user_id',$user_id);
		$this->db->where('insert_type',1);
		$this->db->delete('tbl_user_stock_management');
		if(isset($_POST['stock_id']))
		{
			
			for($i=0;$i<count($_POST['stock_id']);$i++)
			{
				$s_type = explode('*', $_POST['s_type'][$i]);
			$s_type = $s_type[1];
				$check_existing = $this->db->query("SELECT * FROM tbl_user_stock_management WHERE user_id='".$user_id."' AND stock_id='".$_POST['stock_id'][$i]."'");
				if($check_existing->num_rows()>0)
				{
					$updatedata = array(
									'user_id'=>$user_id,
									'stock_id'=>$_POST['stock_id'][$i],
									//'value'=>$_POST['value'][$i],
									's_type'=>$s_type,
									'insert_type'=>1,
									'is_suggested'=>1,
									
									);
					$this->db->where('user_id',$user_id);
					$this->db->where('stock_id',$_POST['stock_id'][$i]);
					$this->db->update('tbl_user_stock_management',$updatedata);
				}
				else
				{
					$insertdata = array(
									'user_id'=>$user_id,
									'stock_id'=>$_POST['stock_id'][$i],
									//'value'=>$_POST['value'][$i],
									's_type'=>$s_type,
									'insert_type'=>1,
									'is_suggested'=>1,
									'created_on'=>$created_on,
									);
					$this->db->insert('tbl_user_stock_management',$insertdata);
				}
				
			}
		}
		
		$check_existing_rf_rv_value = $this->db->query("SELECT * FROM tbl_user_rf_rv_options_values WHERE user_id='".$user_id."'");
		if($check_existing_rf_rv_value->num_rows()>0)
		{
			$UpdateRFRVOPTIONvalues = array(
										'user_id'=>$user_id,
										'rf'=>$rf,
										'rv'=>$rv,
										'options'=>$option,
										'all_money'=>$all_money,
										'money_use_percentage'=>$money_use_percentage,
										'created_on'=>$created_on,
										);
			$this->db->where('user_id',$user_id);
			$this->db->update('tbl_user_rf_rv_options_values',$UpdateRFRVOPTIONvalues);
		}
		else
		{
			$InsertRFRVOPTIONvalues = array(
										'user_id'=>$user_id,
										'rf'=>$rf,
										'rv'=>$rv,
										'options'=>$option,
										'all_money'=>$all_money,
										'money_use_percentage'=>$money_use_percentage,
										'created_on'=>$created_on,
										);
			$this->db->insert('tbl_user_rf_rv_options_values',$InsertRFRVOPTIONvalues);
		}
		
		$this->response(array('success'=>'true','message'=>'Stock saved successfully'),200);

	}
	function change_user_advisor_password_post()
	{
		$user_id = $this->input->post('user_id');
		$currentpass = $this->input->post('currentpass');
		$newpass = $this->input->post('newpass');
		$confirmpass = $this->input->post('confirmpass');
		if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide User Id'),200);
		}
		if($currentpass=="" && $currentpass==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide Current Password'),200);
		}
		if($newpass=="" && $newpass==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide New Password'),200);
		}

		if($confirmpass=="" && $confirmpass==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide Confirm Password'),200);
		}

		if($newpass!=$confirmpass)
		{
			$this->response(array('success'=>'false','message'=>'Password does not match'),200);
		}

    	$currentpass = md5($currentpass);
    	$checkoldpass = $this->db->query("SELECT * FROM  tbl_users WHERE password='".$currentpass."' AND id='".$user_id."'");
    	if($checkoldpass->num_rows()>0)
    	{
    		$this->db->where('id',$user_id);
    		$this->db->where('password',$currentpass);
    		$this->db->update('tbl_users',array('password'=>md5($newpass)));
    		$this->response(array('success'=>'true','message'=>'Password Changed Successfully'),200);
    	} 
    	else
        {
        	$this->response(array('success'=>'false','message'=>'Incorrect Current Password'),200);
        } 
	}
	function save_advisor_referral_code_post()
	{
		$user_id = $this->input->post('user_id');
		$referral_code = $this->input->post('referral_code');
		if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide User Id'),200);
		}
		if($referral_code=="" && $referral_code==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide Referral Code'),200);
		}
		$datetime = date("Y-m-d H:i:s");

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
					$this->response(array('success'=>'true','message'=>'You have already applied  Referral Code'),200);
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

					$this->response(array('success'=>'true','message'=>'Referral Code applied successfully','referral_code'=>$referral_code),200);
				}
			}
			else
			{
				$this->response(array('success'=>'false','message'=>'This Referral Code already cross the Limit'),200);
			}
			
		}
		else
		{
			$this->response(array('success'=>'false','message'=>'You have entered invalid Referral Code'),200);
		}

	}
}
?>