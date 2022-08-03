<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('common');
		$this->load->library('pagination');
	}

	function stock_portfolio($id='')
	{
		$this->common->check_user_login();
		$data = array();
		$data['title'] = 'Stock Portfolio | Five Percent';
		$data['sub_title'] = 'Stock Portfolio';
		$user_id = $this->session->userdata('user_id');
		$stocks1 = $this->db->query("SELECT a.id,a.user_id,a.stock_id,a.value,a.order_type,a.number,a.created_on,b.stock_name,b.stock_type FROM tbl_user_stock_management a INNER JOIN tbl_admin_stock b on a.stock_id=b.id WHERE a.user_id='".$user_id."' AND b.stock_type=1")->result_array();

		$stocks2 = $this->db->query("SELECT a.id,a.user_id,a.stock_id,a.value,a.number,a.order_type,a.created_on,b.stock_name,b.stock_type FROM tbl_user_stock_management a INNER JOIN tbl_admin_stock b on a.stock_id=b.id WHERE a.user_id='".$user_id."' AND b.stock_type=2")->result_array();

		$List_of_added_Stock = array_merge($stocks1,$stocks2);
		$ids = '';
		foreach($List_of_added_Stock as $added_Stock)
		{
			$ids.= $added_Stock['stock_id'].',';
		}
		$ids = rtrim($ids,',');
		if(count($List_of_added_Stock)>0)
		{
			$data['all_stock_lists'] = $this->db->query("SELECT id,stock_type,stock_name FROM tbl_admin_stock WHERE id NOT IN ($ids) ORDER BY stock_name")->result();
		}
		else
		{
			$data['all_stock_lists'] = $this->db->query("SELECT id,stock_type,stock_name FROM tbl_admin_stock ORDER BY stock_name")->result();
		}
		$data['admin_stock_lists'] = $this->db->query("SELECT id,stock_type,stock_name FROM tbl_admin_stock ORDER BY stock_name")->result();
		//$data['stocks'] = array_merge($stocks1,$stocks2);	
		$totaldata = $this->db->query("SELECT a.id,a.user_id,a.stock_id,a.value,a.order_type,a.number,a.created_on,b.stock_name,b.stock_type FROM tbl_user_stock_management a INNER JOIN tbl_admin_stock b on a.stock_id=b.id WHERE a.user_id='".$user_id."' AND a.s_type=1")->num_rows();

		$config = array();
		$config["base_url"] = base_url() . "users/portfolio/stock_portfolio";
		
		$config["total_rows"] = $totaldata;
		$config["per_page"] = 5;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] = $totaldata;
		$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		//$config['next_link'] = 'Next';
		//$config['prev_link'] = 'Prev';

		$this->pagination->initialize($config);
		if($this->uri->segment(4))
		{
			$page = ($this->uri->segment(4)) ;
		}
		else
		{
			$page = 1;
		}
		$limit=5;
		$start_from = ($page-1) * $limit;

		$data['stocks'] = $this->db->query("SELECT a.id,a.user_id,a.stock_id,a.value,a.order_type,a.number,a.created_on,b.stock_name,b.stock_type FROM tbl_user_stock_management a INNER JOIN tbl_admin_stock b on a.stock_id=b.id WHERE a.user_id='".$user_id."' AND a.s_type=1 ORDER BY a.id  DESC LIMIT $start_from,$limit ")->result_array();
		$str_links = $this->pagination->create_links();
	    $data["links"] = explode('&nbsp;',$str_links );
		$this->load->view('page/portfolio/stock_portfolio',$data);
	}
	function option_portfolio()
	{
		$this->common->check_user_login();
		$data = array();
		$data['title'] = 'Option Portfolio | Five Percent';
		$data['sub_title'] = 'Option';
		$user_id = $this->session->userdata('user_id');

		$stocks1 = $this->db->query("SELECT a.id,a.user_id,a.stock_id,a.value,a.order_type,a.number,a.created_on,b.stock_name,b.stock_type FROM tbl_user_stock_management a INNER JOIN tbl_admin_stock b on a.stock_id=b.id WHERE a.user_id='".$user_id."' AND b.stock_type=1")->result_array();

		$stocks2 = $this->db->query("SELECT a.id,a.user_id,a.stock_id,a.value,a.number,a.order_type,a.created_on,b.stock_name,b.stock_type FROM tbl_user_stock_management a INNER JOIN tbl_admin_stock b on a.stock_id=b.id WHERE a.user_id='".$user_id."' AND b.stock_type=2")->result_array();

		$List_of_added_Stock = array_merge($stocks1,$stocks2);
		$ids = '';
		foreach($List_of_added_Stock as $added_Stock)
		{
			$ids.= $added_Stock['stock_id'].',';
		}
		$ids = rtrim($ids,',');
		if(count($List_of_added_Stock)>0)
		{
			$data['all_stock_lists'] = $this->db->query("SELECT id,stock_type,stock_name FROM tbl_admin_stock WHERE id NOT IN ($ids) ORDER BY stock_name")->result();
		}
		else
		{
			$data['all_stock_lists'] = $this->db->query("SELECT id,stock_type,stock_name FROM tbl_admin_stock ORDER BY stock_name")->result();
		}
		$data['admin_stock_lists'] = $this->db->query("SELECT id,stock_type,stock_name FROM tbl_admin_stock ORDER BY stock_name")->result();
		//$data['stocks'] = $this->db->query("SELECT a.id,a.user_id,a.stock_id,a.value,a.order_type,a.number,a.created_on,b.stock_name,b.stock_type FROM tbl_user_stock_management a INNER JOIN tbl_admin_stock b on a.stock_id=b.id WHERE a.user_id='".$user_id."' AND a.s_type=3")->result_array();
		$totaldata = $this->db->query("SELECT a.id,a.user_id,a.stock_id,a.value,a.order_type,a.number,a.created_on,b.stock_name,b.stock_type FROM tbl_user_stock_management a INNER JOIN tbl_admin_stock b on a.stock_id=b.id WHERE a.user_id='".$user_id."' AND a.s_type=3")->num_rows();
		$config = array();
		$config["base_url"] = base_url() . "users/portfolio/option_portfolio";
		
		$config["total_rows"] = $totaldata;
		$config["per_page"] = 5;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] = $totaldata;
		$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		//$config['next_link'] = 'Next';
		//$config['prev_link'] = 'Prev';

		$this->pagination->initialize($config);
		if($this->uri->segment(4))
		{
			$page = ($this->uri->segment(4)) ;
		}
		else
		{
			$page = 1;
		}
		$limit=5;
		$start_from = ($page-1) * $limit;

		$data['stocks'] = $this->db->query("SELECT a.id,a.user_id,a.stock_id,a.value,a.order_type,a.number,a.created_on,b.stock_name,b.stock_type FROM tbl_user_stock_management a INNER JOIN tbl_admin_stock b on a.stock_id=b.id WHERE a.user_id='".$user_id."' AND a.s_type=3 ORDER BY a.id  DESC LIMIT $start_from,$limit ")->result_array();

		$str_links = $this->pagination->create_links();
	    $data["links"] = explode('&nbsp;',$str_links );	
		$this->load->view('page/portfolio/option_portfolio',$data);
	}
	function add_stock_ajax()
	{
		$this->common->ajax_check_user_login();
		$user_id = $this->session->userdata('user_id');
		$created_on = date("Y-m-d H:i:s");
		$stock_name = $this->input->post('stock_name');
		$stock_type = $this->input->post('stock_type');
		$number = $this->input->post('number');
		$s_type = $this->input->post('s_type');
		$insertData = array(
							'user_id'=>$user_id,
							'stock_id'=>$stock_name,
							'order_type'=>$stock_type,
							'number'=>$number,
							's_type'=>$s_type,
							'created_on'=>$created_on,
							);

		$insertInfoData = array(
								'user_id'=>$user_id,
								'broker_id'=>28,
								'stock_id'=>$stock_name,
								'created_on'=>$created_on,
								'updated_on'=>$created_on,
								);
		$chekEmptyUserStock = $this->db->query("SELECT * FROM tbl_user_stock_management WHERE user_id='".$user_id."' AND stock_id='".$stock_name."'")->num_rows();
		if($chekEmptyUserStock==0)
		{
			$this->db->insert('tbl_user_stock_management',$insertData);
			$this->db->insert('tbl_stock_purchase_information',$insertInfoData);
		}
		echo 1;		

	}
	function delete_stock_ajax()
	{
		$this->common->ajax_check_user_login();
		$user_id = $this->session->userdata('user_id');
		$stock_id = $this->input->post('stock_id');
		$this->db->where('id',$stock_id);
		$this->db->where('user_id',$user_id);
		$this->db->delete('tbl_user_stock_management');
		echo 1;
	}
	function show_stock_info_ajax()
	{
		$this->common->ajax_check_user_login();
		$user_id = $this->session->userdata('user_id');
		$stock_id = $this->input->post('id');
		echo 'I am using Twitter Bootstrap modal window functionality. When someone clicks submit on my form, I want to show the modal window upon clicking the "submit button" in the form. I am using Twitter Bootstrap modal window functionality. When someone clicks submit on my form, I want to show the modal window upon clicking the "submit button" in the form. I am using Twitter Bootstrap modal window functionality. When someone clicks submit on my form, I want to show the modal window upon clicking the "submit button" in the form '.$stock_id;
	}
	function filter_option_select_ajax()
	{
		$this->common->ajax_check_user_login();
		$user_id = $this->session->userdata('user_id');
		$s_type = $this->input->post('s_type');
		$option = $this->input->post('id');
		$page = $this->input->post('page');
		$limit=5;
		$start_from = ($page-1) * $limit;

		$List_of_added_Stock = $this->db->query("SELECT a.id,a.user_id,a.stock_id,a.value,a.order_type,a.number,a.created_on,b.stock_name,b.stock_type FROM tbl_user_stock_management a INNER JOIN tbl_admin_stock b on a.stock_id=b.id WHERE a.user_id='".$user_id."' AND a.s_type='".$s_type."' ORDER BY a.id DESC LIMIT  $start_from,$limit")->result_array();
		echo json_encode($List_of_added_Stock);
	}
	function fixed_portfolio($id='')
	{
		$this->common->check_user_login();
		$user_id = $this->session->userdata('user_id');
		$data = array();
		$data['title'] = 'Fixed Income Portfolio | Five Percent';
		$data['sub_title'] = 'Fixed Income';
		$user_id = $this->session->userdata('user_id');
		$stocks1 = $this->db->query("SELECT a.id,a.user_id,a.stock_id,a.value,a.order_type,a.number,a.created_on,b.stock_name,b.stock_type FROM tbl_user_stock_management a INNER JOIN tbl_admin_stock b on a.stock_id=b.id WHERE a.user_id='".$user_id."' AND b.stock_type=1")->result_array();

		$stocks2 = $this->db->query("SELECT a.id,a.user_id,a.stock_id,a.value,a.number,a.order_type,a.created_on,b.stock_name,b.stock_type FROM tbl_user_stock_management a INNER JOIN tbl_admin_stock b on a.stock_id=b.id WHERE a.user_id='".$user_id."' AND b.stock_type=2")->result_array();

		$List_of_added_Stock = array_merge($stocks1,$stocks2);
		$ids = '';
		foreach($List_of_added_Stock as $added_Stock)
		{
			$ids.= $added_Stock['stock_id'].',';
		}
		$ids = rtrim($ids,',');
		if(count($List_of_added_Stock)>0)
		{
			$data['all_stock_lists'] = $this->db->query("SELECT id,stock_type,stock_name FROM tbl_admin_stock WHERE id NOT IN ($ids) ORDER BY stock_name")->result();
		}
		else
		{
			$data['all_stock_lists'] = $this->db->query("SELECT id,stock_type,stock_name FROM tbl_admin_stock ORDER BY stock_name")->result();
		}
		
		$data['admin_stock_lists'] = $this->db->query("SELECT id,stock_type,stock_name FROM tbl_admin_stock ORDER BY stock_name")->result();
		
		$totaldata = $this->db->query("SELECT a.id,a.user_id,a.stock_id,a.value,a.order_type,a.number,a.created_on,b.stock_name,b.stock_type FROM tbl_user_stock_management a INNER JOIN tbl_admin_stock b on a.stock_id=b.id WHERE a.user_id='".$user_id."' AND a.s_type=2")->num_rows();

		$config = array();
		$config["base_url"] = base_url() . "users/portfolio/fixed_portfolio";
		
		$config["total_rows"] = $totaldata;
		$config["per_page"] = 5;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] = $totaldata;
		$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		//$config['next_link'] = 'Next';
		//$config['prev_link'] = 'Prev';

		$this->pagination->initialize($config);
		if($this->uri->segment(4))
		{
			$page = ($this->uri->segment(4)) ;
		}
		else
		{
			$page = 1;
		}
		$limit=5;
		$start_from = ($page-1) * $limit;

		$data['stocks'] = $this->db->query("SELECT a.id,a.user_id,a.stock_id,a.value,a.order_type,a.number,a.created_on,b.stock_name,b.stock_type FROM tbl_user_stock_management a INNER JOIN tbl_admin_stock b on a.stock_id=b.id WHERE a.user_id='".$user_id."' AND a.s_type=2 ORDER BY a.id  DESC LIMIT $start_from,$limit ")->result_array();

		$str_links = $this->pagination->create_links();
	    $data["links"] = explode('&nbsp;',$str_links );	
		$this->load->view('page/portfolio/fixed_portfolio',$data);
	}

	function details_stock_portfolio($stock_id)
	{
		$this->common->check_user_login();
		$user_id = $this->session->userdata('user_id');
		$data = array();
		$stock_id = base64_decode(base64_decode($stock_id));
		//echo $stock_id;die;
		$data['title'] = 'Stock Portfolio | Five Percent';
		$data['sub_title'] = 'Stock Portfolio';

		$data['stock_details'] = $this->db->query("SELECT a.id AS user_stock_id,a.stock_id,a.order_type,a.number,b.stock_name FROM tbl_user_stock_management a INNER JOIN tbl_admin_stock b ON a.stock_id=b.id WHERE a.id='".$stock_id."' AND a.user_id='".$user_id."' ")->row();
		//echo "<pre>";print_r($data['stock_details']);die;
		$this->load->view('page/portfolio/details-stock-portfolio',$data);
	}
	function edit_stock()
	{
		$this->common->ajax_check_user_login();
		$user_id = $this->session->userdata('user_id');
		$stock_id = $this->input->post('stock_id');
		$stockResult = $this->db->query("SELECT * FROM tbl_user_stock_management WHERE user_id='".$user_id."' AND id='".$stock_id."'")->row();
		echo json_encode($stockResult);
	}
	function update_stock_ajax()
	{
		$this->common->ajax_check_user_login();
		$user_id = $this->session->userdata('user_id');
		$created_on = date("Y-m-d H:i:s");
		$user_stock_id = $this->input->post('user_stock_id');
		$stock_name = $this->input->post('stock_name');
		$stock_type = $this->input->post('stock_type');
		$number = $this->input->post('number');
		$insertData = array(
							'user_id'=>$user_id,
							'stock_id'=>$stock_name,
							'order_type'=>$stock_type,
							'number'=>$number,
							'created_on'=>$created_on,
							);

		$chekEmptyUserStock = $this->db->query("SELECT * FROM tbl_user_stock_management WHERE user_id='".$user_id."' AND stock_id='".$stock_name."'")->num_rows();
		if($chekEmptyUserStock==0)
		{
			$this->db->insert('tbl_user_stock_management',$insertData);
		}
		else
		{
			$this->db->where('id',$user_stock_id);
			$this->db->where('user_id',$user_id);
			$this->db->update('tbl_user_stock_management',$insertData);
		}
		echo 1;	
	}
	function details_fixed_income_portfolio($stock_id)
	{
		$this->common->check_user_login();
		$user_id = $this->session->userdata('user_id');
		$data = array();
		$stock_id = base64_decode(base64_decode($stock_id));
		//echo $stock_id;die;
		$data['title'] = 'Fixed Income Portfolio | Five Percent';
		$data['sub_title'] = 'Stock Portfolio';

		$data['stock_details'] = $this->db->query("SELECT a.id AS user_stock_id,a.stock_id,a.order_type,a.number,b.stock_name FROM tbl_user_stock_management a INNER JOIN tbl_admin_stock b ON a.stock_id=b.id WHERE a.id='".$stock_id."' AND a.user_id='".$user_id."' ")->row();
		//echo "<pre>";print_r($data['stock_details']);die;
		$this->load->view('page/portfolio/details-fixed-income-portfolio',$data);
	}
	function details_option_stock_portfolio($stock_id)
	{

		$this->common->check_user_login();
		$user_id = $this->session->userdata('user_id');
		$data = array();
		$stock_id = base64_decode(base64_decode($stock_id));
		//echo $stock_id;die;
		$data['title'] = 'Stock Portfolio | Five Percent';
		$data['sub_title'] = 'Stock Portfolio';

		$data['stock_details'] = $this->db->query("SELECT a.id AS user_stock_id,a.stock_id,a.order_type,a.number,b.stock_name FROM tbl_user_stock_management a INNER JOIN tbl_admin_stock b ON a.stock_id=b.id WHERE a.id='".$stock_id."' AND a.user_id='".$user_id."' ")->row();
		//echo "<pre>";print_r($data['stock_details']);die;
		$this->load->view('page/portfolio/option_stock_portfolio_details',$data);
	}
	

}