<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller 
{
	function check_login()
	{
		$user_sess = $this->session->userdata('user_admin');
		$status_sess = $this->session->userdata('status');
		if($user_sess=="" || $status_sess=="")
		{
			redirect(base_url('admin/Auth'));
			//return 0;
		}

	}
	function user_test()
	{
		$this->check_login();
		$data['title'] = "User Test - 5% Percent";
		$recordarray = array();
		$data_arr = array();
		$resultdata = $this->db->query("SELECT * FROM tbl_admin_test_questions WHERE type=1 ORDER BY test_number DESC")->result();
		foreach($resultdata as $res)
		{
			$data_arr['question'] = $res->question;
			$data_arr['id'] = $res->id;
			$options = $this->db->query("SELECT options FROM tbl_admin_test_question_options WHERE question_id='".$res->id."'")->result();
			$data_arr['options'] = $options;
			$data_arr['test_number'] = $res->test_number;
			array_push($recordarray, $data_arr);

		}
		$data['questions'] = $recordarray;
		$this->load->view('test/users/question',$data);
	}
	function add_user_test()
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Add User Test - 5% Percent";
		$currentdate = date('Y-m-d H:i:s');
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$test_number = $this->input->post('test_number');
			//$question_type = $this->input->post('question_type');
			$correct_option = $this->input->post('correct_option');
			$question = $this->input->post('question');
			$insert_question_data = array(
										 'type'=>1,
										 'test_number'=>$test_number,
										 'question'=>$question,
										 'question_type'=>1,
										 'created_on'=>$currentdate,
										 'updated_on'=>$currentdate,
										);
			$this->db->insert('tbl_admin_test_questions',$insert_question_data);
			$last_question_id = $this->db->insert_id();

			for($i=0;$i<count($_POST['option']);$i++)
			{
				if($_POST['option'][$i]!="")
				{
					if(trim($correct_option)==trim($_POST['option'][$i]))
					{
						$correct = 1;
					}
					else
					{
						$correct = 0;
					}
					$options = array(
									 'question_id'=>$last_question_id,
									 'options'=>$_POST['option'][$i],
									 'correct_option'=>$correct,
									 'created_on'=>$currentdate,
									 'updated_on'=>$currentdate,
									);
					$this->db->insert('tbl_admin_test_question_options',$options);
				}
			}
			$this->session->set_flashdata('message','Test question added successfully');
			redirect(base_url('admin/test/user_test'));

		}
		else
		{
			$this->load->view('test/users/add',$data);
		}
		
	}
	function edit_user_test($id)
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Edit Test question - 5% Percent";
		$currentdate = date('Y-m-d H:i:s');

		$recordarray = array();
		$data_arr = array();

		$resultdata = $this->db->query("SELECT * FROM tbl_admin_test_questions  WHERE id='".$id."'")->row();

		$data_arr['question'] = $resultdata;
		$options = $this->db->query("SELECT options,id,correct_option FROM tbl_admin_test_question_options WHERE question_id='".$resultdata->id."'")->result();
		$data_arr['options'] = $options;
		array_push($recordarray, $data_arr);
		$data['questions'] = $recordarray;

		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$test_number = $this->input->post('test_number');
			$question_id = $this->input->post('question_id');
			$correct_option = $this->input->post('correct_option');
			$question = $this->input->post('question');
			$insert_question_data = array(
										 'test_number'=>$test_number,
										 'question'=>$question,
										 'question_type'=>1,
										 'created_on'=>$currentdate,
										 'updated_on'=>$currentdate,
										);
			$this->db->where('id',$question_id);
			$this->db->update('tbl_admin_test_questions',$insert_question_data);
			for($i=0;$i<count($_POST['option']);$i++)
			{
				$check = $this->db->query("SELECT * FROM tbl_admin_test_question_options WHERE id='".@$_POST['option_id'][$i]."'")->num_rows();
				if($check>0)
				{
					if(trim($correct_option)==trim($_POST['option'][$i]))
					{
						$correct = 1;
					}
					else
					{
						$correct = 0;
					}

					$option_update = array(
											'options'=>$_POST['option'][$i],
											'correct_option'=>$correct,
											'updated_on'=>$currentdate,
											);
					$this->db->where('id',$_POST['option_id'][$i]);
					$this->db->update('tbl_admin_test_question_options',$option_update);
				}
				else
				{
					if($_POST['option'][$i]!="")
					{
						if(trim($correct_option)==trim($_POST['option'][$i]))
						{
							$correct = 1;
						}
						else
						{
							$correct = 0;
						}
						$options = array(
									 'question_id'=>$question_id,
									 'options'=>$_POST['option'][$i],
									 'correct_option'=>$correct,
									 'created_on'=>$currentdate,
									 'updated_on'=>$currentdate,
									);
					    $this->db->insert('tbl_admin_test_question_options',$options);
					}
					
				}

			}
			$this->session->set_flashdata('message','Test Question saved successfully');
			redirect(base_url('admin/test/user_test'));

		}
		else
		{
			$this->load->view('test/users/edit',$data);
		}
		
	}
	function delete_user_test($id)
	{
		$this->check_login();
		$this->db->where('id',$id);
		$this->db->delete('tbl_admin_test_questions');
		//options delete
		$this->db->where('question_id',$id);
		$this->db->delete('tbl_admin_test_question_options');
		$this->session->set_flashdata('message','Test Question Deleted successfully');
		redirect(base_url('admin/test/user_test'));
	}

	function advisor_test()
	{
		$this->check_login();
		$data['title'] = "Advisor Test - 5% Percent";
		$recordarray = array();
		$data_arr = array();
		$resultdata = $this->db->query("SELECT * FROM tbl_admin_test_questions WHERE type=2 ORDER BY test_number DESC")->result();
		foreach($resultdata as $res)
		{
			$data_arr['question'] = $res->question;
			$data_arr['id'] = $res->id;
			$options = $this->db->query("SELECT options FROM tbl_admin_test_question_options WHERE question_id='".$res->id."'")->result();
			$data_arr['options'] = $options;
			$data_arr['test_number'] = $res->test_number;
			array_push($recordarray, $data_arr);

		}
		$data['questions'] = $recordarray;
		$this->load->view('test/advisor/question',$data);
	}
	function add_advisor_test()
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Add Advisor Test - 5% Percent";
		$currentdate = date('Y-m-d H:i:s');
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$test_number = $this->input->post('test_number');
			$question = $this->input->post('question');
			$correct_option = $this->input->post('correct_option');
			$insert_question_data = array(
										 'type'=>2,
										 'test_number'=>$test_number,
										 'question'=>$question,
										 'question_type'=>1,
										 'created_on'=>$currentdate,
										 'updated_on'=>$currentdate,
										);
			$this->db->insert('tbl_admin_test_questions',$insert_question_data);
			$last_question_id = $this->db->insert_id();

			for($i=0;$i<count($_POST['option']);$i++)
			{
				if($_POST['option'][$i]!="")
				{
					if(trim($correct_option)==trim($_POST['option'][$i]))
					{
						$correct = 1;
					}
					else
					{
						$correct = 0;
					}
					$options = array(
									 'question_id'=>$last_question_id,
									 'options'=>$_POST['option'][$i],
									 'correct_option'=>$correct,
									 'created_on'=>$currentdate,
									 'updated_on'=>$currentdate,
									);
					$this->db->insert('tbl_admin_test_question_options',$options);
				}
			}
			$this->session->set_flashdata('message','Test question added successfully');
			redirect(base_url('admin/test/advisor_test'));

		}
		else
		{
			$this->load->view('test/advisor/add',$data);
		}
		
	}
	function edit_advisor_test($id)
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Edit Test question - 5% Percent";
		$currentdate = date('Y-m-d H:i:s');

		$recordarray = array();
		$data_arr = array();

		$resultdata = $this->db->query("SELECT * FROM tbl_admin_test_questions  WHERE id='".$id."'")->row();

		$data_arr['question'] = $resultdata;
		$options = $this->db->query("SELECT options,id,correct_option FROM tbl_admin_test_question_options WHERE question_id='".$resultdata->id."'")->result();
		$data_arr['options'] = $options;
		array_push($recordarray, $data_arr);
		$data['questions'] = $recordarray;

		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$test_number = $this->input->post('test_number');
			$question_id = $this->input->post('question_id');
			$question = $this->input->post('question');
			$correct_option = $this->input->post('correct_option');
			$insert_question_data = array(
										 'test_number'=>$test_number,
										 'question'=>$question,
										 'created_on'=>$currentdate,
										 'updated_on'=>$currentdate,
										);
			$this->db->where('id',$question_id);
			$this->db->update('tbl_admin_test_questions',$insert_question_data);
			for($i=0;$i<count($_POST['option']);$i++)
			{
				$check = $this->db->query("SELECT * FROM tbl_admin_test_question_options WHERE id='".@$_POST['option_id'][$i]."'")->num_rows();
				if($check>0)
				{
					if(trim($correct_option)==trim($_POST['option'][$i]))
					{
						$correct = 1;
					}
					else
					{
						$correct = 0;
					}
					$option_update = array(
											'options'=>$_POST['option'][$i],
											'correct_option'=>$correct,
											'updated_on'=>$currentdate,
											);
					$this->db->where('id',$_POST['option_id'][$i]);
					$this->db->update('tbl_admin_test_question_options',$option_update);
				}
				else
				{
					if($_POST['option'][$i]!="")
					{
						if(trim($correct_option)==trim($_POST['option'][$i]))
						{
							$correct = 1;
						}
						else
						{
							$correct = 0;
						}
						$options = array(
									 'question_id'=>$question_id,
									 'options'=>$_POST['option'][$i],
									 'correct_option'=>$correct,
									 'created_on'=>$currentdate,
									 'updated_on'=>$currentdate,
									);
					    $this->db->insert('tbl_admin_test_question_options',$options);
					}
					
				}

			}
			$this->session->set_flashdata('message','Test Question saved successfully');
			redirect(base_url('admin/test/advisor_test'));

		}
		else
		{
			$this->load->view('test/advisor/edit',$data);
		}
		
	}
	function delete_advisor_test($id)
	{
		$this->check_login();
		$this->db->where('id',$id);
		$this->db->delete('tbl_admin_test_questions');
		//options delete
		$this->db->where('question_id',$id);
		$this->db->delete('tbl_admin_test_question_options');
		$this->session->set_flashdata('message','Test Question Deleted successfully');
		redirect(base_url('admin/test/advisor_test'));
	}
	function remove_test_question_options()
	{
		$id = $this->input->post('rowid');
		if($id!="")
		{
			$this->db->where('id',$id);
			$this->db->delete('tbl_admin_test_question_options');
		}
		else
		{

		}	
	}
		
}