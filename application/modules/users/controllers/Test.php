<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('common');
	}
	function index()
	{
		$this->common->check_user_login();
		$data = array();
		$data['title'] = 'Test | Five Percent';
		$data['sub_title'] = 'Test';
		$user_type = $this->session->userdata('user_type');
		$user_id = $this->session->userdata('user_id');
		$recordarray = array();
		$data_arr = array();
		$type = 0;
		if($user_type==0)
		{
			$type = 1;
		}
		if($user_type==1)
		{
			$type = 2;
		}
		$count_answered_query = "SELECT count(a.question_id)  FROM users_test_question_options a INNER JOIN users_test_question_answers b ON a.question_id=b.question_id INNER JOIN tbl_admin_test_questions c ON a.question_id =c.id WHERE c.test_number=d.test_number AND a.user_id='".$user_id."'";
		$data['tests'] =  $this->db->query("SELECT distinct(d.test_number), ($count_answered_query) AS answered FROM tbl_admin_test_questions d WHERE d.type='".$type."'")->result();
		//echo "<pre>";print_r($data['tests']);die;
		$this->load->view('page/test/test',$data);	
		
	}
	function test_details($test_number)
	{
		$this->common->check_user_login();
		$data = array();
		$recordarray = array();
		$data_arr = array();		
		$data['title'] = "Test | 5% Percentage";	
		$data['sub_title'] = 'Test';
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
		if($user_type==0)
		{
			$type = 1;
		}
		if($user_type==1)
		{
			$type = 2;
		}
		$datetime = date('Y-m-d H:i:s');
		$test_number1 = $test_number;
		$test_number = base64_decode(base64_decode($test_number));
		$value_query = "SELECT b.value FROM users_test_question_options b WHERE a.id=b.options AND b.user_id='".$user_id."'";
		$answer_query = "SELECT COUNT(c.options) FROM users_test_question_options c WHERE a.id=c.options AND c.user_id='".$user_id."'";
		$data['test_number'] = $test_number;
		$resultdata = $this->db->query("SELECT * FROM tbl_admin_test_questions WHERE test_number='".$test_number."' AND type='".$type."' ")->result();
		foreach($resultdata as $res)
		{
			$data_arr['question'] = $res->question;
			$data_arr['id'] = $res->id;
			$data_arr['question_type'] = $res->question_type;
			$data_arr['options'] = $this->db->query("SELECT a.id,a.options,($value_query) AS answer,($answer_query) AS selected FROM tbl_admin_test_question_options a WHERE a.question_id='".$res->id."'")->result();
			array_push($recordarray, $data_arr);

		}
		$data['questions'] = $recordarray;
		//echo "<pre>"; print_r($data['questions']);die;


		//SELECT a.question_id as question,(SELECT count(q.question_id) from tbl_admin_test_question_options q where q.correct_option='1' and q.id=a.options) as ans from users_test_question_options a
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			for($i=0;$i<count($_POST['question']);$i++)
			{
				$this->db->where('user_id',$user_id);
				$this->db->where('question_id',$_POST['question'][$i]);
				$this->db->delete('users_test_question_options');
			}
			foreach($_POST as $key => $val)
			{		
					for($i=0;$i<count($_POST['question']);$i++)
					{

						$check_existing = $this->db->query("SELECT * FROM users_test_question_answers WHERE user_id='".$user_id."' AND question_id='".$_POST['question'][$i]."'")->num_rows();
						if($check_existing==0)
						{
							$insertdata = array(
											'user_id'=>$user_id,
											'question_id'=>$_POST['question'][$i],
											'created_on'=>$datetime,
											'updated_on'=>$datetime,
											);
							$this->db->insert('users_test_question_answers',$insertdata);
							
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
									$this->db->insert('users_test_question_options',$options);

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
									$this->db->insert('users_test_question_options',$options);
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
									$this->db->insert('users_test_question_options',$options);
								}
							}								
							
						}						
						
				}
			
			}
			//$this->session->set_flashdata('success','Data updated successfully');
			//redirect(base_url('users/test'));

			redirect(base_url('users/test/test_result/'.$test_number1));
		}
		else
		{
			$this->load->view('page/test/test_details',$data);
		}
		
	}
	function  test_result($test_number)
	{
		//error_reporting(0);
		$this->common->check_user_login();
		$data = array();
		$recordarray = array();
		$data_arr = array();		
		$data['title'] = "Test Result | 5% Percentage";	
		$data['sub_title'] = 'Result';
		$user_id = $this->session->userdata('user_id');
		$user_type = $this->session->userdata('user_type');
		if($user_type==0)
		{
			$type = 1;
		}
		if($user_type==1)
		{
			$type = 2;
		}

		$test_number = base64_decode(base64_decode($test_number));
		$correct=0;
		$data['total_question'] = $this->db->query("SELECT * FROM tbl_admin_test_questions WHERE test_number='".$test_number."' AND type='".$type."'")->num_rows(); 
		$resultdata = $this->db->query("SELECT a.id,a.question,b.question_id FROM tbl_admin_test_questions a LEFT JOIN users_test_question_answers b ON a.id=b.question_id WHERE  a.test_number='".$test_number."' AND a.type='".$type."' AND b.user_id='".$user_id."'")->result();
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
		//echo "<pre>"; print_r($data['questions']);die;
		$this->load->view('page/test/test_result',$data);
	}
	function charttest()
	{
	    $arr = array(
        			array(1),
        			array(1),
        			array(1),
        			array(1),
        			array(1),
        			array(1),
        			array(1),
        			array(1),
        			array(1),
        			array(1),
        			array(1),
        			array(1),
        			array(1),
        			array(1),
        			array(1),
        
        );
        echo json_encode($arr);
	}
}