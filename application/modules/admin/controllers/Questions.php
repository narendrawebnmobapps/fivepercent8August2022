<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Questions extends CI_Controller 
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
	function index($id=1)
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Question - 5% Percent";
		$language = $this->input->get('language');
		$recordarray = array();
		$data_arr = array();
		if(!$language)
		{
			$resultdata = $this->db->query("SELECT * FROM tbl_questions  WHERE lang_id=1 ORDER BY pos ASC")->result();
			//echo "<pre>"; print_r($resultdata);die;
			foreach($resultdata as $res)
			{
				$data_arr['question'] = $res->question;
				$data_arr['id'] = $res->id;
				$options = $this->db->query("SELECT options FROM tbl_question_options WHERE question_id='".$res->id."' ")->result();
				$data_arr['options'] = $options;
				$data_arr['question_category'] = $res->question_category;
				array_push($recordarray, $data_arr);

			}
			$data['questions'] = $recordarray;
			$this->load->view('question/question',$data);
		}
		else if($language==2)
		{
			$resultdata = $this->db->query("SELECT * FROM tbl_questions  WHERE lang_id=2")->result();
			foreach($resultdata as $res)
			{
				$data_arr['question'] = $res->question;
				$data_arr['id'] = $res->id;
				$options = $this->db->query("SELECT options FROM tbl_question_options WHERE question_id='".$res->id."'")->result();
				$data_arr['options'] = $options;
				$data_arr['question_category'] = $res->question_category;
				array_push($recordarray, $data_arr);

			}
			$data['questions'] = $recordarray;

			$this->load->view('question/question',$data);
		}
		else if($language==3)
		{
			$resultdata = $this->db->query("SELECT * FROM tbl_questions  WHERE lang_id=3")->result();
			foreach($resultdata as $res)
			{
				$data_arr['question'] = $res->question;
				$data_arr['id'] = $res->id;
				$options = $this->db->query("SELECT options FROM tbl_question_options WHERE question_id='".$res->id."'")->result();
				$data_arr['options'] = $options;
				$data_arr['question_category'] = $res->question_category;
				array_push($recordarray, $data_arr);

			}
			$data['questions'] = $recordarray;
			$this->load->view('question/question',$data);
		}
		
	}
	function add()
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Add question - 5% Percent";
		$currentdate = date('Y-m-d H:i:s');
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$language = $this->input->post('language');
			$question_category = $this->input->post('question_category');
			$question_type = $this->input->post('question_type');
			$question = $this->input->post('question');
			$insert_question_data = array(
										 'lang_id'=>$language,
										 'question'=>$question,
										 'question_type'=>$question_type,
										 'question_category'=>$question_category,
										 'created_on'=>$currentdate,
										 'updated_on'=>$currentdate,
										);
			$this->db->insert('tbl_questions',$insert_question_data);
			$last_question_id = $this->db->insert_id();

			for($i=0;$i<count($_POST['option']);$i++)
			{
				if($_POST['option'][$i]!="")
				{
					$options = array(
									 'question_id'=>$last_question_id,
									 'options'=>$_POST['option'][$i],
									 'created_on'=>$currentdate,
									 'updated_on'=>$currentdate,
									);
					$this->db->insert('tbl_question_options',$options);
				}
				//echo $_POST['option'][$i]."<br>";
			}
			$this->session->set_flashdata('message','Question added successfully');
			redirect(base_url('admin/questions'));

		}
		$this->load->view('question/add',$data);
	}
	function edit($id=0)
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Edit question - 5% Percent";
		$currentdate = date('Y-m-d H:i:s');

		$recordarray = array();
		$data_arr = array();

		$resultdata = $this->db->query("SELECT * FROM tbl_questions  WHERE id='".$id."'")->row();

		$data_arr['question'] = $resultdata;
		$options = $this->db->query("SELECT options,id FROM tbl_question_options WHERE question_id='".$resultdata->id."'")->result();
		$data_arr['options'] = $options;
		array_push($recordarray, $data_arr);
		$data['questions'] = $recordarray;

		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$question_id = $this->input->post('question_id');
			$language = $this->input->post('language');
			$question_category = $this->input->post('question_category');
			$question_type = $this->input->post('question_type');
			$question = $this->input->post('question');
			$insert_question_data = array(
										 'lang_id'=>$language,
										 'question'=>$question,
										 'question_type'=>$question_type,
										 'question_category'=>$question_category,
										 'created_on'=>$currentdate,
										 'updated_on'=>$currentdate,
										);
			$this->db->where('id',$question_id);
			$this->db->update('tbl_questions',$insert_question_data);
			for($i=0;$i<count($_POST['option']);$i++)
			{
				$check = $this->db->query("SELECT * FROM tbl_question_options WHERE id='".@$_POST['option_id'][$i]."'")->num_rows();
				if($check>0)
				{
					$option_update = array(
											'options'=>$_POST['option'][$i],
											'updated_on'=>$currentdate,
											);
					$this->db->where('id',$_POST['option_id'][$i]);
					$this->db->update('tbl_question_options',$option_update);
				}
				else
				{
					if($_POST['option'][$i]!="")
					{
						$options = array(
									 'question_id'=>$question_id,
									 'options'=>$_POST['option'][$i],
									 'created_on'=>$currentdate,
									 'updated_on'=>$currentdate,
									);
					    $this->db->insert('tbl_question_options',$options);
					}
					
				}

			}
			$this->session->set_flashdata('message','Question saved successfully');
			redirect(base_url('admin/questions/'));

		}
		$this->load->view('question/edit',$data);
	}
	function delete($id)
	{
		$this->check_login();
		$this->db->where('id',$id);
		$this->db->delete('tbl_questions');
		//options delete
		$this->db->where('question_id',$id);
		$this->db->delete('tbl_question_options');
		$this->session->set_flashdata('message','Question Deleted successfully');
		redirect(base_url('admin/questions/'));
	}
	function remove_question_options()
	{
		$id = $this->input->post('rowid');
		if($id!="")
		{
			$this->db->where('id',$id);
			$this->db->delete('tbl_question_options');
		}
		else
		{

		}
	}
	function drag_drop_questions()
	{
		$post_order = isset($_POST["post_order_ids"]) ? $_POST["post_order_ids"] : [];
		if(count($post_order)>0)
		{
			for($order_no= 0; $order_no < count($post_order); $order_no++)
			{

			 $updatedata = array('pos'=>$order_no+1,);
			 $this->db->where('id',$post_order[$order_no]);
			 $this->db->update('tbl_questions',$updatedata);
			 $this->db->affected_rows();
			}
			echo true; 
		}
		else
		{
			echo false; 
		}
	}
	
}