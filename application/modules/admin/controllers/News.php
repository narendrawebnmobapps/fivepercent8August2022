<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller 
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
		$data['title'] = "News - 5% Percent";
		$type = $this->input->get('type');
		if($type=="")
		{
			$type=1;
		}
		$data['news'] = $this->db->query("SELECT * FROM tbl_admin_stock_news WHERE type='".$type."' ORDER BY id DESC")->result();
		//echo "<pre>";print_r($data['news']);die;
		$this->load->view('news/news',$data);
	}
	function add()
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Add News - 5% Percent";
		$type = $this->input->get('type');
		if($type=="")
		{
			$type=1;
		}
		$currentdate = date('Y-m-d H:i:s');
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			//echo "<pre>"; print_r($_POST); die;
			$news_title = $this->input->post('news_title');
			$news_content = $this->input->post('news_content');
			$news_date = $this->input->post('news_date');
			$dt = new DateTime($news_date);
			$startDate= $dt->format('Y-m-d');
			$actual = $this->input->post('actual');
			$forecast = $this->input->post('forecast');
			$previous = $this->input->post('previous');
			$link = $this->input->post('link');
			$news_image = "";
			if($_FILES['news_image']['size']>0)
		    {
		      	$temp = explode('.', basename($_FILES['news_image']['name']));

		        $type2 = $_FILES["news_image"]["type"];
		        $new_photoid2 = explode('.',$_FILES["news_image"]["name"]); 
		        $news_image = rand(100,9999999).date('d_m_yhmi').'.' . end($new_photoid2); 
		        move_uploaded_file($_FILES["news_image"]["tmp_name"],"uploads/news/".$news_image);       

		    }
			$insertdata = array(
								'news_title'=>$news_title,
								'news_content'=>$news_content,
								'image'=>$news_image,
								'news_date'=>$startDate,
								'type'=>$type,
								'actual'=>$actual,
								'forecast'=>$forecast,
								'previous'=>$previous,
								'link'=>$link,
								'created_on'=>$currentdate,
								);
			$this->db->insert('tbl_admin_stock_news',$insertdata);
			$this->session->set_flashdata('message','News added successfully');
			if($type==1)
			{
				redirect(base_url('admin/news'));
			}
			else
			{
				redirect(base_url('admin/news?type='.$type));
			}
		}
		$this->load->view('news/add',$data);
	}

	function edit()
	{
		$this->check_login();
		$data = array();
		$data['title'] = "Edit News - 5% Percent";
		$id = $this->input->get('id');
		$type = $this->input->get('type');
		if($type=="")
		{
			$type=1;
		}
		$currentdate = date('Y-m-d H:i:s');
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			//echo "<pre>"; print_r($_POST); die;
			$news_title = $this->input->post('news_title');
			$news_content = $this->input->post('news_content');
			$news_date = $this->input->post('news_date');
			$dt = new DateTime($news_date);
			$startDate= $dt->format('Y-m-d');
			$actual = $this->input->post('actual');
			$forecast = $this->input->post('forecast');
			$previous = $this->input->post('previous');
			$link = $this->input->post('link');
			$news_image = "";
			if($_FILES['news_image']['size']>0)
		    {
		      	$temp = explode('.', basename($_FILES['news_image']['name']));

		        $type2 = $_FILES["news_image"]["type"];
		        $new_photoid2 = explode('.',$_FILES["news_image"]["name"]); 
		        $news_image = rand(100,9999999).date('d_m_yhmi').'.' . end($new_photoid2); 
		        move_uploaded_file($_FILES["news_image"]["tmp_name"],"uploads/news/".$news_image);       

		    }
		    else
		    {
		    	$news_image = $this->input->post('old_news_image');
		    }
			$insertdata = array(
								'news_title'=>$news_title,
								'news_content'=>$news_content,
								'image'=>$news_image,
								'news_date'=>$startDate,
								'type'=>$type,
								'actual'=>$actual,
								'forecast'=>$forecast,
								'previous'=>$previous,
								'link'=>$link
								);
			$this->db->where('id',$id);
			$this->db->update('tbl_admin_stock_news',$insertdata);
			$this->session->set_flashdata('message','News Updated successfully');
			if($type==1)
			{
				redirect(base_url('admin/news'));
			}
			else
			{
				redirect(base_url('admin/news?type='.$type));
			}
		}
		$data['news'] = $this->db->query("SELECT * FROM tbl_admin_stock_news WHERE id='".$id."'")->row();
		$this->load->view('news/edit',$data);
	}
	function delete()
	{
		$id = $this->input->get('id');
		$type = $this->input->get('type');
		if($type=="")
		{
			$type=1;
		}
		$this->db->where('id',$id);
		$this->db->delete('tbl_admin_stock_news');

		$this->session->set_flashdata('message','News Deleted successfully');
		if($type==1)
		{
			redirect(base_url('admin/news'));
		}
		else
		{
			redirect(base_url('admin/news?type='.$type));
		}
	}
}