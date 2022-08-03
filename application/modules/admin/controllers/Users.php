<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller 
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
	function advisor_list()
	{
		error_reporting(0);
		$this->check_login();
		$data = array();
		$data['title'] = "Advisor List | 5% Percent";
		$recordarray = array();
		$data_arr = array();
		$data['lists'] = $this->db->query("SELECT a.id,a.user_type,a.status,a.email,a.dob,b.first_name,b.last_name,b.phone_number,b.certificate FROM tbl_users a INNER JOIN tbl_user_personel_info b ON a.id=b.user_id  WHERE a.user_type=1 ORDER BY a.id DESC")->result();
		//echo "<pre>";print_r($data['lists']);die;
		$this->load->view('users/advisors/list',$data);
	}

	function approve_advisors($user_id,$status)
	{
		$currentdate = date('Y-m-d H:i:s');
		if($status==0)
		{
			$this->db->where('id',$user_id);
			$this->db->update('tbl_users',array('status'=>1));

			$referral_code = 'F'.date('YmdHis');
			$insertData = array(
								'user_id'=>$user_id,
								'referral_code'=>$referral_code,
								'created_on'=>$currentdate
								);
			$checkExistingCode = $this->db->query("SELECT * FROM tbl_admin_referral_code WHERE user_id= '".$user_id."'")->num_rows();
			if($checkExistingCode>0)
			{
				$this->db->where('user_id',$user_id);
				$this->db->update('tbl_admin_referral_code',array('status'=>1));
			}
			else
			{
				$this->db->insert('tbl_admin_referral_code',$insertData);
			}
		}
		if($status==1)
		{
			$this->db->where('id',$user_id);
			$this->db->update('tbl_users',array('status'=>0));
			//
			$this->db->where('user_id',$user_id);
			$this->db->update('tbl_admin_referral_code',array('status'=>0));
			
		}
		redirect(base_url('admin/users/advisor_list'));
	}
	function delete_advisors($user_id)
	{
		$user_id = base64_decode($user_id);
		$this->db->where('id',$user_id);
		$this->db->delete('tbl_users');
		$this->db->where('user_id',$user_id);
		$this->db->delete('tbl_user_personel_info');
		$this->session->set_flashdata('message','Advisor Deleted successfully');
		redirect(base_url('admin/users/advisor_list'));
	}
	function advisor_details($id)
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Advisor Details | 5% Percent";
		$id = base64_decode($id);
		$data['countries'] = $this->db->query("SELECT id,name FROM countries ORDER BY name ASC")->result();
		$data['user_detail'] =$this->db->query("SELECT a.id,a.user_type,a.status,a.email,a.dob,b.first_name,b.last_name,b.phone_number,b.certificate,b.expYears,b.speciality,b.profile_image,b.country FROM tbl_users a INNER JOIN tbl_user_personel_info b ON a.id=b.user_id  WHERE a.id='".$id."'")->row();
		//echo "<pre>";print_r($data['user_detail']);die;
		$this->load->view('users/advisors/edit',$data);
	}
	function advisor_work_experience($id)
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Advisor Work Experience | 5% Percent";
		$id = base64_decode($id);
		$data['educations'] = $this->db->query("SELECT * FROM tbl_user_educations WHERE user_id='".$id."'")->result();
		$data['experiences'] = $this->db->query("SELECT * FROM tbl_users_experience WHERE user_id='".$id."'")->result();
		$data['skills'] = $this->db->query("SELECT * FROM tbl_user_skilss WHERE user_id='".$id."'")->result();
		$data['user_detail'] = $this->db->query("SELECT id FROM tbl_users WHERE id='".$id."'")->row();
		$this->load->view('users/advisors/work_experience',$data);
	}
	function advisor_about_us_details($id)
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Advisor Work Experience | 5% Percent";
		$id = base64_decode($id);
		$data['YourSelf'] = $this->db->query("SELECT * FROM tbl_user_about_me WHERE user_id='".$id."' ")->row();
		$data['user_detail'] = $this->db->query("SELECT id FROM tbl_users WHERE id='".$id."'")->row();
		$this->load->view('users/advisors/about_us_details',$data);
	}
	function advisor_test_list($id)
	{
		$this->check_login();
		$data = array();
		$id = base64_decode($id);
		$recordarray = array();
		$data_arr = array();		
		$data['title'] = "User Test List | 5% Percentage";	
		$data['sub_title'] = 'Profile';
		//$user_id = base64_decode($user_id);
		$data['user_detail'] = $this->db->query("SELECT id FROM tbl_users WHERE id='".$id."'")->row();
		$count_answered_query = "SELECT count(a.question_id)  FROM users_test_question_options a INNER JOIN users_test_question_answers b ON a.question_id=b.question_id INNER JOIN tbl_admin_test_questions c ON a.question_id =c.id WHERE c.test_number=d.test_number AND a.user_id='".$id."'";
		$data['tests'] =  $this->db->query("SELECT distinct(d.test_number), ($count_answered_query) AS answered FROM tbl_admin_test_questions d WHERE d.type=2")->result();
		//$this->load->view('page/test/test',$data);	

		$data['user_detail'] = $this->db->query("SELECT id FROM tbl_users WHERE id='".$id."'")->row();
		$this->load->view('users/advisors/test_list',$data);
	}
	function advisor_test_result($user_id,$test_number)
	{
		$this->check_login();
		$data = array();
		$user_id = base64_decode(base64_decode($user_id));
		$test_number = base64_decode(base64_decode($test_number));
		$recordarray = array();
		$data_arr = array();		
		$data['title'] = "User Test List | 5% Percentage";	
		$data['sub_title'] = 'Profile';
		//$user_id = base64_decode($user_id);

		$correct=0;
		$data['total_question'] = $this->db->query("SELECT * FROM tbl_admin_test_questions WHERE test_number='".$test_number."' AND type=2")->num_rows(); 
		$resultdata = $this->db->query("SELECT a.id,a.question,b.question_id FROM tbl_admin_test_questions a LEFT JOIN users_test_question_answers b ON a.id=b.question_id WHERE  a.test_number='".$test_number."' AND a.type=2")->result();
        //print_r($resultdata);die;
        $attemted = 0;
        foreach($resultdata as $res)
        {
            $data_arr['question'] = $res->question;
            $data_arr['options'] = $this->db->query("SELECT id,options,correct_option FROM tbl_admin_test_question_options WHERE question_id='".$res->id."'")->result();

            $count_true = $this->db->query("SELECT a.question_id as question,a.options,c.options AS optionname,(SELECT count(q.question_id) from tbl_admin_test_question_options q where q.correct_option='1' and q.id=a.options) as ans from users_test_question_options a INNER JOIN tbl_admin_test_question_options c ON a.options=c.id  WHERE a.question_id='".$res->question_id."'");
            if($count_true->num_rows()>0)
            {
               $data_arr['correct_option']  = $count_true->row_array();
               if($data_arr['correct_option']['ans']==1)
                {
                  $correct++;
                }
                $attemted++;
            }
            else
            {
                $data_arr['correct_option']  = array();
            }          
            
            array_push($recordarray, $data_arr);


        }
		$data['questions'] = $recordarray;
		$data['correct'] = $correct;
		$data['incorrect_answer'] = $attemted-$correct;
		$data['attemted_question'] = $attemted;
		$data['answerPercentage'] = number_format(($correct/$data['total_question'])*100,2);

		//$data['user_detail'] = $this->db->query("SELECT id FROM tbl_users WHERE id='".$id."'")->row();
		//print_r($data);die;
		$this->load->view('users/advisors/user_test_result',$data);
	}

	function users_list()
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Advisor List | 5% Percent";
		$recordarray = array();
		$data_arr = array();
		$data['lists'] = $this->db->query("SELECT a.id,a.user_type,a.status,a.email,a.dob,b.first_name,b.last_name,b.phone_number,b.certificate FROM tbl_users a INNER JOIN tbl_user_personel_info b ON a.id=b.user_id  WHERE a.user_type=0 ORDER BY a.id DESC")->result();
		//echo "<pre>";print_r($data['lists']);die;
		$this->load->view('users/users/list',$data);
	}

	function users_details($id)
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Advisor Details | 5% Percent";
		$id = base64_decode($id);
		$data['user_detail'] = $this->db->query("SELECT a.id,a.dob,a.email,a.user_type,b.first_name,b.last_name,b.phone_number,b.martial_status,b.no_of_child,b.job_type,b.country,b.app_usage,b.talk_to_advisor,b.profile_image,b.phone_number,b.expYears,b.speciality,b.certificate FROM tbl_users a INNER JOIN tbl_user_personel_info b ON a.id=b.user_id WHERE a.id='".$id."'")->row();
		$data['jobtypes'] = $this->db->query("SELECT * FROM tbl_job_type")->result();
		$data['app_ussages'] = $this->db->query("SELECT * FROM tbl_app_ussage")->result();
		$data['countries'] = $this->db->query("SELECT id,name FROM countries ORDER BY name ASC")->result();
		//echo "<pre>";print_r($data['user_detail']);die;
		$this->load->view('users/users/edit',$data);
	}
	function financialsituation($id)
	{
		$this->check_login();
		$data = array();
		$id = base64_decode($id);
		$recordarray = array();
		$data_arr = array();		
		$data['title'] = "Financial situation question | 5% Percentage";	
		$data['sub_title'] = 'Profile';
		$value_query = "SELECT b.value FROM user_question_options b WHERE a.id=b.options AND b.user_id='".$id."'";
		$answer_query = "SELECT COUNT(c.options) FROM user_question_options c WHERE a.id=c.options AND c.user_id='".$id."'";

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
		$data['user_detail'] = $this->db->query("SELECT id FROM tbl_users WHERE id='".$id."'")->row();
		$this->load->view('users/users/financialsituation',$data);
	}
	function investmentobjective($id)
	{
		$this->check_login();
		$data = array();
		$id = base64_decode($id);
		$recordarray = array();
		$data_arr = array();		
		$data['title'] = "Financial situation question | 5% Percentage";	
		$data['sub_title'] = 'Profile';
		$value_query = "SELECT b.value FROM user_question_options b WHERE a.id=b.options AND b.user_id='".$id."'";
		$answer_query = "SELECT COUNT(c.options) FROM user_question_options c WHERE a.id=c.options AND c.user_id='".$id."'";

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
		$data['user_detail'] = $this->db->query("SELECT id FROM tbl_users WHERE id='".$id."'")->row();
		$this->load->view('users/users/investmentobjective',$data);
	}
	function knowledgeExperience($id)
	{
		$this->check_login();
		$data = array();
		$id = base64_decode($id);
		$recordarray = array();
		$data_arr = array();		
		$data['title'] = "Financial situation question | 5% Percentage";	
		$data['sub_title'] = 'Profile';
		$value_query = "SELECT b.value FROM user_question_options b WHERE a.id=b.options AND b.user_id='".$id."'";
		$answer_query = "SELECT COUNT(c.options) FROM user_question_options c WHERE a.id=c.options AND c.user_id='".$id."'";

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
		$data['user_detail'] = $this->db->query("SELECT id FROM tbl_users WHERE id='".$id."'")->row();
		$this->load->view('users/users/knowledgeExperience',$data);
	}
	function understandingFinancialcommitment($id)
	{
		$this->check_login();
		$data = array();
		$id = base64_decode($id);
		$recordarray = array();
		$data_arr = array();		
		$data['title'] = "Financial situation question | 5% Percentage";	
		$data['sub_title'] = 'Profile';
		$value_query = "SELECT b.value FROM user_question_options b WHERE a.id=b.options AND b.user_id='".$id."'";
		$answer_query = "SELECT COUNT(c.options) FROM user_question_options c WHERE a.id=c.options AND c.user_id='".$id."'";

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
		$data['user_detail'] = $this->db->query("SELECT id FROM tbl_users WHERE id='".$id."'")->row();
		$this->load->view('users/users/understandingFinancialcommitment',$data);
	}
	function approve_users($user_id,$status)
	{
		$this->check_login();
		if($status==0)
		{
			$this->db->where('id',$user_id);
			$this->db->update('tbl_users',array('status'=>1));
		}
		if($status==1)
		{
			$this->db->where('id',$user_id);
			$this->db->update('tbl_users',array('status'=>0));
		}
		redirect(base_url('admin/users/users_list'));
	}
	function delete_users($user_id)
	{
		$user_id = base64_decode($user_id);
		$this->db->where('id',$user_id);
		$this->db->delete('tbl_users');
		$this->db->where('user_id',$user_id);
		$this->db->delete('tbl_user_personel_info');
		$this->session->set_flashdata('message','User Deleted successfully');
		redirect(base_url('admin/users/users_list'));
	}

	function test_list($id)
	{
		$this->check_login();
		$data = array();
		$id = base64_decode($id);
		$recordarray = array();
		$data_arr = array();		
		$data['title'] = "User Test List | 5% Percentage";	
		$data['sub_title'] = 'Profile';
		//$user_id = base64_decode($user_id);
		$data['user_detail'] = $this->db->query("SELECT id FROM tbl_users WHERE id='".$id."'")->row();
		$count_answered_query = "SELECT count(a.question_id)  FROM users_test_question_options a INNER JOIN users_test_question_answers b ON a.question_id=b.question_id INNER JOIN tbl_admin_test_questions c ON a.question_id =c.id WHERE c.test_number=d.test_number AND a.user_id='".$id."'";
		$data['tests'] =  $this->db->query("SELECT distinct(d.test_number), ($count_answered_query) AS answered FROM tbl_admin_test_questions d WHERE d.type=1")->result();
		//$this->load->view('page/test/test',$data);	
		$this->load->view('users/users/test_list',$data);
	}
	function test_result($user_id,$test_number)
	{
		$this->check_login();
		$data = array();
		$user_id = base64_decode(base64_decode($user_id));
		$test_number = base64_decode(base64_decode($test_number));
		$recordarray = array();
		$data_arr = array();		
		$data['title'] = "User Test List | 5% Percentage";	
		$data['sub_title'] = 'Profile';
		//$user_id = base64_decode($user_id);

		$correct=0;
		$data['total_question'] = $this->db->query("SELECT * FROM tbl_admin_test_questions WHERE test_number='".$test_number."' AND type=1")->num_rows(); 
		$resultdata = $this->db->query("SELECT a.id,a.question,b.question_id FROM tbl_admin_test_questions a LEFT JOIN users_test_question_answers b ON a.id=b.question_id WHERE  a.test_number='".$test_number."' AND a.type=1")->result();
        //print_r($resultdata);die;
        $attemted = 0;
        foreach($resultdata as $res)
        {
            $data_arr['question'] = $res->question;
            $data_arr['options'] = $this->db->query("SELECT id,options,correct_option FROM tbl_admin_test_question_options WHERE question_id='".$res->id."'")->result();

            $count_true = $this->db->query("SELECT a.question_id as question,a.options,c.options AS optionname,(SELECT count(q.question_id) from tbl_admin_test_question_options q where q.correct_option='1' and q.id=a.options) as ans from users_test_question_options a INNER JOIN tbl_admin_test_question_options c ON a.options=c.id  WHERE a.question_id='".$res->question_id."'");
            if($count_true->num_rows()>0)
            {
               $data_arr['correct_option']  = $count_true->row_array();
               if($data_arr['correct_option']['ans']==1)
                {
                  $correct++;
                }
                $attemted++;
            }
            else
            {
                $data_arr['correct_option']  = array();
            }          
            
            array_push($recordarray, $data_arr);


        }
		$data['questions'] = $recordarray;
		$data['correct'] = $correct;
		$data['incorrect_answer'] = $attemted-$correct;
		$data['attemted_question'] = $attemted;
		$data['answerPercentage'] = number_format(($correct/$data['total_question'])*100,2);

		$this->load->view('users/users/user_test_result',$data);
	}
}