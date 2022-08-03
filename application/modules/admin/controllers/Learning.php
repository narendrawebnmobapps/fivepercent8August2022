<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Learning extends CI_Controller 
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
	function users()
	{
		$this->check_login();
		$data = array();
		$data['learnings'] = $this->db->query("SELECT * FROM tbl_user_advisor_learning WHERE type=1")->result();
		$data['title'] = "User Learning - 5% Percent";
		$this->load->view('learning/users/learning',$data);
	}
	function add_users_learning()
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Add User Learning - 5% Percent";
		$currentdate = date('Y-m-d H:i:s');
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$question = $this->input->post('question');
			$answer = $this->input->post('answer');

			$insertArray = array(
								'type'=>1,
								'questions'=>$question,
								'answer'=>$answer,
								'created_on'=>$currentdate,
								'updated_on'=>$currentdate,
								);

			if($this->db->insert('tbl_user_advisor_learning',$insertArray))
			{
				$this->session->set_flashdata('message','Users Learning Added successfully');
				redirect(base_url('admin/learning/users'));
			}
			else
			{
				$this->session->set_flashdata('message','something went wrong');
				redirect(base_url('admin/learning/users'));
			}
		}
		else
		{
			$this->load->view('learning/users/add',$data);
		}
	}
	function edit_user_learning($id)
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Edit User Learning - 5% Percent";
		$data['details'] = $this->db->query("SELECT * FROM tbl_user_advisor_learning WHERE id='".$id."'")->row();
		$currentdate = date('Y-m-d H:i:s');
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$question = $this->input->post('question');
			$answer = $this->input->post('answer');

			$insertArray = array(
								'type'=>1,
								'questions'=>$question,
								'answer'=>$answer,
								'updated_on'=>$currentdate,
								);
			$this->db->where('id',$id);
			if($this->db->update('tbl_user_advisor_learning',$insertArray))
			{
				$this->session->set_flashdata('message','Users Learning Updated successfully');
				redirect(base_url('admin/learning/users'));
			}
			else
			{
				$this->session->set_flashdata('message','something went wrong');
				redirect(base_url('admin/learning/users'));
			}
		}
		else
		{
			$this->load->view('learning/users/edit',$data);
		}
	}
	function delete_user_learning($id)
	{
		$this->check_login();
		$this->db->where('id',$id);
		if($this->db->delete('tbl_user_advisor_learning'))
		{
			$this->session->set_flashdata('message','Users Learning Deleted successfully');
			redirect(base_url('admin/learning/users'));
		}
		else
		{
			$this->session->set_flashdata('message','something went wrong');
			redirect(base_url('admin/learning/users'));
		}
	}

	function advisors()
	{
		$this->check_login();
		$data = array();
		$data['learnings'] = $this->db->get_where('tbl_user_advisor_learning',array('type'=>2))->result();		
		$data['title'] = "Advisor Learning - 5% Percent";
		$this->load->view('learning/advisor/learning',$data);
	}

	function add_advisor_learning()
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Add Advisor Learning - 5% Percent";
		$currentdate = date('Y-m-d H:i:s');
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$question = $this->input->post('question');
			$answer = $this->input->post('answer');

			$insertArray = array(
								'type'=>2,
								'questions'=>$question,
								'answer'=>$answer,
								'created_on'=>$currentdate,
								'updated_on'=>$currentdate,
								);

			if($this->db->insert('tbl_user_advisor_learning',$insertArray))
			{
				$this->session->set_flashdata('message','Advisor Learning Added successfully');
				redirect(base_url('admin/learning/advisors'));
			}
			else
			{
				$this->session->set_flashdata('message','something went wrong');
				redirect(base_url('admin/learning/advisors'));
			}
		}
		else
		{
			$this->load->view('learning/advisor/add',$data);
		}
	}

	function edit_advisor_learning($id)
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Edit User Learning - 5% Percent";
		$data['details'] = $this->db->query("SELECT * FROM tbl_user_advisor_learning WHERE id='".$id."'")->row();
		$currentdate = date('Y-m-d H:i:s');
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$question = $this->input->post('question');
			$answer = $this->input->post('answer');

			$insertArray = array(
								'type'=>2,
								'questions'=>$question,
								'answer'=>$answer,
								'updated_on'=>$currentdate,
								);
			$this->db->where('id',$id);
			if($this->db->update('tbl_user_advisor_learning',$insertArray))
			{
				$this->session->set_flashdata('message','Advisor Learning Updated successfully');
				redirect(base_url('admin/learning/advisors'));
			}
			else
			{
				$this->session->set_flashdata('message','something went wrong');
				redirect(base_url('admin/learning/advisors'));
			}
		}
		else
		{
			$this->load->view('learning/advisor/edit',$data);
		}
	}
	function delete_advisor_learning($id)
	{
		$this->check_login();
		$this->db->where('id',$id);
		if($this->db->delete('tbl_user_advisor_learning'))
		{
			$this->session->set_flashdata('message','Advisor Learning Deleted successfully');
			redirect(base_url('admin/learning/advisors'));
		}
		else
		{
			$this->session->set_flashdata('message','something went wrong');
			redirect(base_url('admin/learning/advisors'));
		}
	}

	
	
}