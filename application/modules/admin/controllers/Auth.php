<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
	public function index()
	{
		$user_sess = $this->session->userdata('user_admin');
		$status_sess = $this->session->userdata('status');
		if($user_sess!="" && $user_sess!=null && $status_sess!="" && $status_sess!=null)
		{
			redirect(base_url('admin/Auth/dashboard'));
		}


		$data = array();
		$data['title'] = "Admin Login - 5% Percent";
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
			if($this->form_validation->run() == FALSE)
            {
                    $this->load->view('index',$data);
            }
            else
            {
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $password = md5($password);
                $query = $this->db->query("SELECT * FROM tbl_admin WHERE username='".$username."' AND password='".$password."'");
                if($query->num_rows()>0)
                {
                	$row = $query->row();
                	$this->session->set_userdata('user_admin',$row->username);
                	$this->session->set_userdata('name',$row->name);
                	$this->session->set_userdata('status',1);
                	redirect(base_url('admin/Auth/dashboard'));
                }
                else
                {
                	$this->session->set_flashdata('message','Invalid login credentials');
                	redirect(base_url('admin/Auth'));
                }
            }
		}		
		$this->load->view('index',$data);
	}
	function dashboard()
	{
		$this->check_login();
		//echo "<pre>";print_r($this->session->userdata('username'));die;
		$data = array();
		$data['title'] = "Dashboard - 5% Percent";
		$this->load->view('dashboard',$data);

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
	function logout()
	{
		$this->session->unset_userdata('user_admin');
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('status');
		redirect(base_url('admin/Auth'));
	}
	function testdata()
	{
		$a=1;
		$b=1;
		if($a==1 || $b==0)
		{
			echo 1;
		}
		else
		{
			echo 2;
		}
	}
}
