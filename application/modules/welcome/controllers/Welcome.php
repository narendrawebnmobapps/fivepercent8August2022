<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller 
{

	public function index()
	{
		$this->session->sess_destroy();
		$data = array();
		$data['title'] = '5% Percentage';
		$this->load->view('page/index',$data);
	}
	function about()
	{
		$data = array();
		$data['title'] = 'About us - 5% Percentage';
		$this->load->view('page/about',$data);
	}
	function services()
	{
		$data = array();
		$data['title'] = 'Services - 5% Percentage';
		$this->load->view('page/services',$data);
	}
	function case_studies()
	{
		$data = array();
		$data['title'] = 'Case Studies - 5% Percentage';
		$this->load->view('page/case_studies',$data);
	}
	function faq()
	{
		$data = array();
		$data['title'] = 'Faq - 5% Percentage';
		$this->load->view('page/faq',$data);
	}
	function contact_us()
	{
		$data = array();
		$data['title'] = 'Contact us - 5% Percentage';
		if($this->input->server('REQUEST_METHOD')=='POST')
		{
			print_r($_POST);
			$base_url = base_url();
			$site_logo = base_url('assets/frontend/images/logo.png');
			$fname = $this->input->post('fname');
			$lname = $this->input->post('lname');
			$email = $this->input->post('email');
			$city = $this->input->post('city');
			$message = $this->input->post('message');
			$fullname = $fname.' '.$lname;
			$mail_temp = file_get_contents('./global/mail/contact_us_html.html');
			$mail_temp = str_replace('{site_url_link}', $base_url, $mail_temp);
			$mail_temp = str_replace('{sit_logo_url}', $site_logo, $mail_temp);
			$mail_temp = str_replace('{to_contact_name}', 'Admin', $mail_temp);
			$mail_temp = str_replace('{from_contact_name}', $fullname, $mail_temp);
			$mail_temp = str_replace('{sender_name}', $fullname, $mail_temp);
			$mail_temp = str_replace('{sender_email}', $email, $mail_temp);
			$mail_temp = str_replace('{sender_city}', $city, $mail_temp);
			$mail_temp = str_replace('{sender_message}', $message, $mail_temp);
			//echo $mail_temp;
			//die;

			$this->session->set_flashdata('message','Thank you,we will contact you soon');
			redirect(base_url('contact-us'));
		}
		$this->load->view('page/contact',$data);
	}
	function blog()
	{
		$data = array();
		$data['title'] = 'Blog - 5% Percentage';
		$this->load->view('page/blog',$data);
	}
	function checkphpversion()
	{
	    phpinfo();
	}
	
}
