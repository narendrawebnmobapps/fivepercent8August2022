<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Advisor extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('common');
	}
	function client_profile($id)
	{
		error_reporting(0);
		$this->common->check_user_login();
		$data = array();
		$data['title'] = 'Client Profile | Five Percent';
		$data['sub_title'] = 'CLIENT PROFILE';
		$client_id = base64_decode(base64_decode($id));
		$user_id = $this->session->userdata('user_id');
		$currentdate = date('Y-m-d H:i:s');
		$this->db->select('tu.email,tu.status,pi.first_name,tu.dob,pi.last_name,pi.date_of_birth,pi.job_type,pi.profile_image,pi.martial_status,pi.no_of_child,cy.name AS country_name');
		$this->db->from('tbl_users tu');
		$this->db->join('tbl_user_personel_info pi', 'tu.id = pi.user_id');
		$this->db->join('countries cy', 'pi.country = cy.id');
		$this->db->where('tu.id',$client_id);
		$result = $this->db->get()->row();
		$data['user_details'] = $result;
		$totalNumberOfQuestion = $this->db->query("SELECT * FROM tbl_questions")->num_rows();
		$numberOfAnsweredQuestion = $checkQuestionOptions = $this->db->query("SELECT a.*,b.*,COUNT(b.question_id) AS qnc FROM user_question_answer a INNER JOIN user_question_options b ON a.question_id = b.question_id  WHERE a.user_id='".$client_id."' GROUP BY b.question_id")->num_rows();

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

		$all_money = 0;
		$money_use_percentage = 100;
		$get_exitsing_rf_rv_option_value = $this->db->query("SELECT * FROM tbl_user_rf_rv_options_values WHERE user_id='".$client_id."'");
		if($get_exitsing_rf_rv_option_value->num_rows()>0)
		{
			$rf_rv_row = $get_exitsing_rf_rv_option_value->row();
			$RF = $rf_rv_row->rf;
			$RV = $rf_rv_row->rv;
			$option = $rf_rv_row->options;

			$all_money = $rf_rv_row->all_money;
			$money_use_percentage = $rf_rv_row->money_use_percentage;
		}


		$sql1="SELECT count(m.user_id) from tbl_user_stock_management m where m.stock_id=a.id and m.user_id='".$client_id."'";
		$data['stock_rfs'] = $this->db->query("SELECT a.id,a.stock_name,($sql1) as exist  FROM tbl_admin_stock a  WHERE a.stock_type=1 ORDER BY a.id  LIMIT 4")->result();
		$data['stock_rvs'] = $this->db->query("SELECT a.id,a.stock_name,($sql1) as exist  FROM tbl_admin_stock a  WHERE a.stock_type=2 ORDER BY a.id  LIMIT 4")->result();

		$data['stock_options'] = $this->db->query("SELECT a.id,a.stock_name,($sql1) as exist  FROM tbl_admin_stock a  WHERE a.stock_type=2 ORDER BY a.id DESC LIMIT 4")->result();
		//echo "<pre>"; print_r($data['stock_options']);die;

		$data['RF'] = $RF;
		$data['RV'] = $RV;
		$data['OPTION'] = $option;

		$data['all_money'] = $all_money;
		$data['money_use_percentage'] = $money_use_percentage;
		
		$data['risk_percent'] = $risk_percent;
		/**************************************************  CLIENT BALANCE SHEET CALCULATION ************************/
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
		$check_balance_existing = $this->db->query("SELECT * FROM tbl_user_balance_sheet WHERE user_id='".$client_id."'");
		if($check_balance_existing->num_rows()<1)
		{
			$get_income_expense = $this->db->query("SELECT a.options AS optionvalue,b.id AS option_id,a.value, a.question_id,b.options FROM user_question_options a LEFT JOIN tbl_question_options b ON a.options=b.id WHERE a.question_id=35 AND a.user_id='".$client_id."'")->result();
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
				/*if($bal->option_id==217)
				{
					$mInvest = $bal->value;
				}*/
			}
			$check_existing_balance_sheet = $this->db->query("SELECT * FROM tbl_user_balance_sheet WHERE user_id='".$client_id."'");
			if($check_existing_balance_sheet->num_rows()==0)
			{
				$insertBalanceSheetDataIncome = array(
												'user_id'=>$client_id,
												'type'=>1,
												'parameters'=>'Income',
												'value'=>$total_monthly_income,
												'created_on'=>$currentdate,
												);
				$this->db->insert('tbl_user_balance_sheet',$insertBalanceSheetDataIncome);
				$insertBalanceSheetDataexpense = array(
												'user_id'=>$client_id,
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
			$income_array = $this->db->query("SELECT * FROM tbl_user_balance_sheet WHERE user_id='".$client_id."' AND type=1 ORDER BY value DESC")->result();
			foreach($income_array as $income)
			{
				$income_data['id'] = $income->id;
				$income_data['parameters'] = $income->parameters;
				$income_data['value'] = $income->value;
				$total_monthly_income+=$income->value;
				array_push($income_recordarray, $income_data);

			}
			//Expense calculations
			$expense_array = $this->db->query("SELECT * FROM tbl_user_balance_sheet WHERE user_id='".$client_id."' AND type=2  ORDER BY value DESC")->result();
			foreach($expense_array as $expense)
			{
				$expense_data['id'] = $expense->id;
				$expense_data['parameters'] = $expense->parameters;
				$expense_data['value'] = $expense->value;
				$total_monthly_expenses+=$expense->value;
				array_push($expense_recordarray, $expense_data);

			}
			//assets calculations
			$assets_array = $this->db->query("SELECT * FROM tbl_user_balance_sheet WHERE user_id='".$client_id."' AND type=3  ORDER BY value DESC")->result();
			foreach($assets_array as $assets)
			{
				$assets_data['id'] = $assets->id;
				$assets_data['parameters'] = $assets->parameters;
				$assets_data['value'] = $assets->value;
				$total_assets+=$assets->value;
				array_push($assets_recordarray, $assets_data);

			}

			//Liabilities calculations
			$liability_array = $this->db->query("SELECT * FROM tbl_user_balance_sheet WHERE user_id='".$client_id."' AND type=4  ORDER BY value DESC")->result();
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
		$data['total_monthly_cash'] = $total_monthly_cash;
		//Total Assets - Total Liability = Total Equity
		$total_equity = $total_assets-$total_liabilities;
		$data['total_equity'] = $total_equity;

		$data['total_monthly_income'] = $total_monthly_income;

		$data['total_monthly_expenses'] = $total_monthly_expenses;
		$data['total_assets'] = $total_assets;
		$data['total_liabilities'] = $total_liabilities;

		$data['income_recordarray'] = $income_recordarray;
		$data['expense_recordarray'] = $expense_recordarray;
		$data['assets_recordarray'] = $assets_recordarray;
		$data['liability_recordarray'] = $liability_recordarray;

		$data['messages'] = $this->db->query("SELECT * FROM tbl_chatting WHERE (user_two='".$client_id."' OR user_one='".$client_id."') AND (user_two='".$user_id."' OR user_one='".$user_id."')  ORDER BY created_on ASC ")->result();
		//echo "<pre>"; print_r($data['messages']);die;
		$check_request = $this->db->query("SELECT * FROM tbl_user_adviser_referral_code_connectivity  WHERE user_id='".$client_id."' AND advisor_id='".$user_id."'");
		if($check_request->num_rows()>0)
		{
			$status = $check_request->row()->status;
			if($status==0)
			{
				$data['requested'] = 0;
			}
			else
			{
				$data['requested'] = 1;
			}
		}
		else
		{
			$data['requested'] = 2;
		}

		 /* Read Messages*/
		$this->db->where('user_one',$client_id);
		$this->db->where('user_two',$user_id);
		$this->db->update('tbl_chatting',array('status'=>1));
		/* Read Messages*/

		$this->load->view('page/advisor/client_profile',$data);
	}

	function save_chat_message_from_user_side_ajax()
	{
		$datetime = date("Y-m-d H:i:s");
		$user_id = $this->session->userdata('user_id');
		$write_msg = $this->input->post('write_msg');
		$client_id = $this->input->post('client_id');

		$insertarray = array(
							'user_one'=>$user_id,
							'user_two'=>$client_id,
							'message'=>$write_msg,
							'created_on'=>$datetime
							);
		$this->db->insert('tbl_chatting',$insertarray);

		$check_existing_connectivity = $this->db->query("SELECT * FROM tbl_user_adviser_referral_code_connectivity WHERE user_id='".$user_id."' AND advisor_id='".$client_id."'");
		if($check_existing_connectivity->num_rows()==0)
		{
			$insertdata = array(
								'user_id'=>$user_id,
								'advisor_id'=>$client_id,
								'status'=>0,
								'created_on'=>$datetime,
								'updated_on'=>$datetime,
								);

			$this->db->insert('tbl_user_adviser_referral_code_connectivity',$insertdata);

			$notification = "Hi <b>".$this->session->userdata('fname').' '.$this->session->userdata('lname')."</b> Sent you request to be your client";
			$insertNotification = array(
										'user_one'=>$user_id,
										'user_two'=>$client_id,
										'type'=>2,
										'notification'=>$notification,
										'created_on'=>$datetime,
										);
			$this->db->insert('tbl_notifications',$insertNotification);
		}

		/* Read Messages*/
		$this->db->where('user_one',$client_id);
		$this->db->where('user_two',$user_id);
		$this->db->update('tbl_chatting',array('status'=>1));
		/* Read Messages*/

	}
	function save_chat_message_from_advisor_side_ajax()
	{
		$datetime = date("Y-m-d H:i:s");
		$user_id = $this->session->userdata('user_id');
		$write_msg = $this->input->post('write_msg');
		$client_id = $this->input->post('client_id');

		$insertarray = array(
							'user_one'=>$user_id,
							'user_two'=>$client_id,
							'message'=>$write_msg,
							'created_on'=>$datetime
							);
		$this->db->insert('tbl_chatting',$insertarray);

		/* Read Messages*/
		$this->db->where('user_one',$client_id);
		$this->db->where('user_two',$user_id);
		$this->db->update('tbl_chatting',array('status'=>1));
		/* Read Messages*/
	}
	function user_approved_by_advisor_ajax()
	{
		$datetime = date("Y-m-d H:i:s");
		$user_id = $this->session->userdata('user_id');
		$client_id = $this->input->post('client_id');
		$check_existing_connectivity = $this->db->query("SELECT * FROM tbl_user_adviser_referral_code_connectivity WHERE user_id='".$client_id."' AND advisor_id='".$user_id."'");

		if($check_existing_connectivity->num_rows()>0)
		{
			$this->db->where('user_id',$client_id);
			$this->db->where('advisor_id',$user_id);
			$this->db->update('tbl_user_adviser_referral_code_connectivity',array('status'=>1));

			$notification = "Hi <b>".$this->session->userdata('fname').' '.$this->session->userdata('lname')."</b> Accepted your request. Now You both communicate each other";
			$insertNotification = array(
										'user_one'=>$user_id,
										'user_two'=>$client_id,
										'type'=>2,
										'notification'=>$notification,
										'created_on'=>$datetime,
										);
			$this->db->insert('tbl_notifications',$insertNotification);
		}
	}
	function ajaxReadmessageOnLoad($client_id)
	{
		$user_id = $this->session->userdata('user_id');
		$client_id = base64_decode(base64_decode($client_id));
		$getClientImage = $this->db->query("SELECT profile_image FROM tbl_user_personel_info WHERE user_id='".$client_id."'")->row();
		$chatList = '';
		$messages = $this->db->query("SELECT * FROM tbl_chatting WHERE (user_two='".$client_id."' OR user_one='".$client_id."') AND (user_two='".$user_id."' OR user_one='".$user_id."')  ORDER BY created_on ASC")->result();
		foreach($messages as $msg)
		{
			$time = date("h:i A", strtotime($msg->created_on)); 
            $date = date("F d", strtotime($msg->created_on)); 
            $profile_image = base_url('uploads/user-profile/'.$getClientImage->profile_image);
            if($msg->user_one!=$this->session->userdata('user_id')) 
             {
             	$chatList.='<div class="incoming_msg"><div class="incoming_msg_img"><img src="'.$profile_image.'" alt="" style="width: 50px;height: 50px;"></div><div class="received_msg"><div class="received_withd_msg"><p>'.$msg->message.'</p> <span class="time_date"> '.$time.'    |    '.$date.'</span></div></div></div>';
             }
			if($msg->user_one==$this->session->userdata('user_id') && $msg->user_two!=$this->session->userdata('user_id'))
			{ 
				$chatList.='<div class="outgoing_msg"><div class="sent_msg"><p>'.$msg->message.'</p> <span class="time_date"> '.$time.'    |    '.$date.'</span> </div></div>';
			}
		}
		echo $chatList;

	}
	function client_list($id='')
	{
		$this->common->check_user_login();
		$this->load->library('pagination');
		$data = array();
		$data['title'] = 'Client Profile | Five Percent';
		$data['sub_title'] = 'CLIENTS';

		$user_id = $this->session->userdata('user_id');

		$record_array = array();
		$data_arr = array();

		/*$this->db->select('tu.id,tu.email,tu.status,pi.first_name,tu.dob,tu.created_on,date_format( tu.created_on, "%d %M %Y" ) as from_date,pi.last_name,pi.date_of_birth,pi.job_type,pi.profile_image,pi.martial_status,pi.no_of_child,cy.name AS country_name');
		$this->db->from('tbl_users tu');
		$this->db->join('tbl_user_personel_info pi', 'tu.id = pi.user_id');
		$this->db->join('countries cy', 'pi.country = cy.id');
		$this->db->where('tu.user_type',0);
		$totaldata = $this->db->get()->num_rows();*/


		$this->db->select('cu.user_id,tu.id,tu.email,tu.status,pi.first_name,tu.dob,tu.created_on,date_format( tu.created_on, "%d %M %Y" ) as from_date,pi.last_name,pi.date_of_birth,pi.job_type,pi.profile_image,pi.martial_status,pi.no_of_child,cy.name AS country_name');
		$this->db->from('tbl_user_adviser_referral_code_connectivity cu');
		$this->db->join('tbl_users tu', 'tu.id = cu.user_id');
		$this->db->join('tbl_user_personel_info pi', 'tu.id = pi.user_id');
		$this->db->join('countries cy', 'pi.country = cy.id');
		$this->db->where('tu.user_type',0);
		$this->db->where('cu.advisor_id',$user_id);
		$totaldata = $this->db->get()->num_rows();
		//echo "<pre>";print_r($totaldata);die;


		$config = array();
		$config["base_url"] = base_url() . "users/advisor/client_list";
		
		$config["total_rows"] = $totaldata;
		$config["per_page"] = 3;
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
		$limit=3;
		$start_from = ($page-1) * $limit;

		$this->db->select('cu.user_id,tu.id,tu.email,tu.status,pi.first_name,tu.dob,tu.created_on,date_format( tu.created_on, "%d %M %Y" ) as from_date,pi.last_name,pi.date_of_birth,pi.job_type,pi.profile_image,pi.martial_status,pi.no_of_child,cy.name AS country_name');
		$this->db->from('tbl_user_adviser_referral_code_connectivity cu');
		$this->db->join('tbl_users tu', 'tu.id = cu.user_id');
		$this->db->join('tbl_user_personel_info pi', 'tu.id = pi.user_id');
		$this->db->join('countries cy', 'pi.country = cy.id');
		$this->db->where('tu.user_type',0);
		$this->db->where('cu.advisor_id',$user_id);
		$this->db->order_by("pi.first_name", "asc");
		$this->db->limit($limit,$start_from);
		$results = $this->db->get()->result();
		//echo "<pre>";print_r($results);die;
		foreach($results as $result)
		{
			$totalNumberOfQuestion = $this->db->query("SELECT * FROM tbl_questions")->num_rows();
			$numberOfAnsweredQuestion = $checkQuestionOptions = $this->db->query("SELECT a.*,b.*,COUNT(b.question_id) AS qnc FROM user_question_answer a INNER JOIN user_question_options b ON a.question_id = b.question_id  WHERE a.user_id='".$result->id."' GROUP BY b.question_id")->num_rows();
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
			$data_arr['client_id'] = $result->id;
			$data_arr['risk_percent'] = $risk_percent;
			$data_arr['client_name'] = $result->first_name." ".$result->last_name;
			$data_arr['profile_image'] = $result->profile_image;
			$data_arr['country'] = $result->country_name;
			$data_arr['created_on'] = $result->from_date;
			array_push($record_array, $data_arr);

		}
		//echo "<pre>";print_r($record_array); die;
		$data['clients'] = $record_array;
		$str_links = $this->pagination->create_links();
	    $data["links"] = explode('&nbsp;',$str_links );
		$this->load->view('page/advisor/client_contact_list',$data);	
	}
	function advisor_profile_details()
	{
		$this->common->check_user_login();
		$data = array();
		$data['title'] = 'Edit Profile | Five Percent';
		$data['sub_title'] = 'Profile';
		$user_id = $this->session->userdata('user_id');
		$created_on = date("Y-m-d H:i:s");

		$data['educations'] = $this->db->query("SELECT * FROM tbl_user_educations WHERE user_id='".$user_id."'")->result();
		$data['experiences'] = $this->db->query("SELECT * FROM tbl_users_experience WHERE user_id='".$user_id."'")->result();
		$data['skills'] = $this->db->query("SELECT * FROM tbl_user_skilss WHERE user_id='".$user_id."'")->result();
		//echo "<pre>"; print_r($data['skills']);die;

		if($this->input->server('REQUEST_METHOD')=='POST')
		{
			if(count($_POST['companyname'])>0)
			{
				for($i=0;$i<count($_POST['companyname']);$i++)
				{
					$check_existing_experience = $this->db->query("SELECT * FROM tbl_users_experience WHERE id='".@$_POST['experience_id'][$i]."' AND user_id='".$user_id."'")->num_rows();
					if($check_existing_experience>0)
					{
						$insertExperienceData = array(
											     'user_id'=>$user_id,
											     'companyName'=>$_POST['companyname'][$i],
											     'startMonth'=>$_POST['startmonth'][$i],
											     'startYear'=>$_POST['startyear'][$i],
											     'endMonth'=>$_POST['endmonth'][$i],
											     'endYear'=>$_POST['endyear'][$i],
											     'created_on'=>$created_on,
											     );
						$this->db->where('id',@$_POST['experience_id'][$i]);
						$this->db->where('user_id',$user_id);
						$this->db->update('tbl_users_experience',$insertExperienceData);
					}
					else
					{
						$insertExperienceData = array(
											     'user_id'=>$user_id,
											     'companyName'=>$_POST['companyname'][$i],
											     'startMonth'=>$_POST['startmonth'][$i],
											     'startYear'=>$_POST['startyear'][$i],
											     'endMonth'=>$_POST['endmonth'][$i],
											     'endYear'=>$_POST['endyear'][$i],
											     'created_on'=>$created_on,
											     );
						$this->db->insert('tbl_users_experience',$insertExperienceData);
					}
					
				}
			}

			$this->session->set_flashdata('success','Data Saved Successfully');
			redirect(base_url('users/advisor/advisor_profile_details'));
		}
		else
		{
			$this->load->view('page/advisor/advisor_profile_details',$data);
		}
		
	}
	function delete_advisor_skills()
	{
		$user_id = $this->session->userdata('user_id');
		$skill_id = $this->input->post('slil_id');
		$this->db->where('id',$skill_id);
		$this->db->where('user_id',$user_id);
		$this->db->delete('tbl_user_skilss');
		echo 1;
	}
	function delete_advisor_education()
	{
		$user_id = $this->session->userdata('user_id');
		$education_id = $this->input->post('education_id');
		$this->db->where('id',$education_id);
		$this->db->where('user_id',$user_id);
		$this->db->delete('tbl_user_educations');
		echo 1;
	}
	function delete_advisor_exp_ajax()
	{
		$user_id = $this->session->userdata('user_id');
		$exp_id = $this->input->post('exp_id');
		$this->db->where('id',$exp_id);
		$this->db->where('user_id',$user_id);
		$this->db->delete('tbl_users_experience');
		echo 1;
	}
	function advisor_about_details()
	{
		$this->common->check_user_login();
		$user_id = $this->session->userdata('user_id');
		$created_on = date("Y-m-d H:i:s");
		$data = array();
		$data['title'] = 'Edit Profile | Five Percent';
		$data['sub_title'] = 'Profile';
		$data['YourSelf'] = $this->db->query("SELECT * FROM tbl_user_about_me WHERE user_id='".$user_id."' ")->row();
		if($this->input->server('REQUEST_METHOD')=='POST')
		{
			//echo "<pre>"; print_r($_POST); die;
			//$city = $this->input->post('city');
			//$homeTown = $this->input->post('homeTown');
			$aboutYourSelf = $this->input->post('aboutYourSelf');
			$check_existing_AboutYourSelf = $this->db->query("SELECT * FROM tbl_user_about_me WHERE user_id='".$user_id."'")->num_rows();
			if($check_existing_AboutYourSelf>0)
			{
				$insertAboutYourSelfData = array(
												// 'city'=>$city,
												// 'homeTown'=>$homeTown,
												 'aboutYourSelf'=>$aboutYourSelf,
												);
				$this->db->where('user_id',$user_id);
				$this->db->update('tbl_user_about_me',$insertAboutYourSelfData);
			}
			else
			{
				$insertAboutYourSelfData = array(
												 'user_id'=>$user_id,
												// 'city'=>$city,
												// 'homeTown'=>$homeTown,
												// 'aboutYourSelf'=>$aboutYourSelf,
												 'created_on'=>$created_on
												);
				$this->db->insert('tbl_user_about_me',$insertAboutYourSelfData);
			}
			$this->session->set_flashdata('success','Data Saved Successfully');
			redirect(base_url('users/advisor/advisor_about_details'));
		}
		else
		{
			$this->load->view('page/advisor/advisor_about_details',$data);
		}		

	}
	function advisor_referral_code()
	{
		$this->common->check_user_login();
		$user_id = $this->session->userdata('user_id');
		$created_on = date("Y-m-d H:i:s");
		$data = array();
		$data['title'] = 'Edit Profile | Five Percent';
		$data['sub_title'] = 'Profile';
		$check_referral_code = $this->db->query("SELECT referral_code FROM tbl_admin_referral_code WHERE user_id='".$user_id."'");
		if($check_referral_code->num_rows()>0)
		{
			$data['referral_code'] = $check_referral_code->row()->referral_code;
		}
		else
		{
			$data['referral_code'] = 'Not Available';
		}
		$this->load->view('page/advisor/referral_code',$data);
	}

	function settings()
	{
		$this->common->check_user_login();
		$user_id = $this->session->userdata('user_id');
		$created_on = date("Y-m-d H:i:s");
		$data = array();
		$data['title'] = 'Edit Profile | Five Percent';
		$data['sub_title'] = 'Profile';
		if($this->input->server('REQUEST_METHOD')=='POST')
		{
		   	$starttime="";
		   	$start_time_am_pm="";
		   	$end_time="";
		   	$end_time_am_pm="";
		    $query = $this->db->query("SELECT * FROM tbl_advisor_availability_slots_datewise where advisor_id ='$user_id'");
		    $q = $query->result();
		    foreach($q as $values)
		    {
				$starttime =  $values->start_time;
				$start_time_am_pm =  $values->start_time_am_pm;
				$end_time =  $values->end_time;
				$end_time_am_pm =  $values->end_time_am_pm;
		    }
			$UpdateData1 =  array(
						 'is_availability'=>'1',								 
						);
		    // update all records to this doctor 
			 $this->db->where('advisor_id',$user_id);
             $result = $this->db->update('tbl_advisor_availability_slots_datewise',$UpdateData1);
			// update all records to this doctor 
			   
			 $alldates =  $this->input->post('alldates');
			 $alldatesexplode = explode(",",$alldates);
			 foreach($alldatesexplode as $getalldatesvalue)
			 {
			 	$dt = new DateTime($getalldatesvalue);
			 	$dates= $dt->format('Y-m-d'); 
			
				$querycount = $this->db->query("SELECT * FROM tbl_advisor_availability_slots_datewise where advisor_id ='$user_id' and dates ='$dates'");
				$countinsert = $querycount->num_rows();
				if($countinsert > 0)
				{
					$UpdateData =  array(
						 'is_availability'=>'0'							
						);
					 $this->db->where('advisor_id',$user_id);
					 $this->db->where('dates',$dates);
                     $result = $this->db->update('tbl_advisor_availability_slots_datewise',$UpdateData);
					
				} 
				else 
				{ 
			         $Insertslots =  array(
						 'advisor_id'=>$user_id,
						 'dates'=>$dates,
						 'start_time_am_pm'=>$start_time_am_pm,
						 'end_time'=>$end_time,
						 'end_time_am_pm'=>$end_time_am_pm,
						 'is_availability'=>'0'				
						);
					$result = $this->db->insert('tbl_advisor_availability_slots_datewise',$Insertslots);
				}
			}
			 $this->session->set_flashdata('success_message', 'Scheduled Updated Successfully');
			 redirect(base_url('users/advisor/settings'));
		}
		$this->db->select("*");
	    $this->db->from("tbl_advisor_availability_slots_datewise");
		$this->db->where('advisor_id',$user_id);
		$this->db->where('is_availability','0');
		$addedlotsdates = $this->db->get();
		$data['addedlotsdates'] = $addedlotsdates->result();
		//echo "<pre>"; print_r($data['addedlotsdates']);die;
		$this->load->view('page/advisor/settings',$data);
	}
	function appointment_list()
	{
		$this->common->check_user_login();
		$user_id = $this->session->userdata('user_id');
		$created_on = date("Y-m-d H:i:s");
		$todatdate = date("Y-m-d");
		$data = array();
		$data['title'] = 'Edit Profile | Five Percent';
		$data['sub_title'] = 'Profile';
		$data['todays_appointments'] = $this->db->query("SELECT a.id,a.schedule_date,b.id AS user_id,b.email,c.first_name,c.last_name,d.start_time,d.end_time FROM tbl_user_advisor_schedule_appointment a INNER JOIN tbl_users b ON a.user_id=b.id INNER JOIN tbl_user_personel_info c ON a.user_id=c.user_id INNER JOIN tbl_admin_time_slot d  ON a.slot_id=d.id WHERE a.advisor_id='".$user_id."' AND a.schedule_date='".$todatdate."'")->result();
		$data['appointment_lists'] = $this->db->query("SELECT a.id,a.schedule_date,b.id AS user_id,b.email,c.first_name,c.last_name,d.start_time,d.end_time FROM tbl_user_advisor_schedule_appointment a INNER JOIN tbl_users b ON a.user_id=b.id INNER JOIN tbl_user_personel_info c ON a.user_id=c.user_id INNER JOIN tbl_admin_time_slot d  ON a.slot_id=d.id WHERE a.advisor_id='".$user_id."' ORDER BY a.schedule_date DESC")->result();
		//echo "<pre>"; print_r($data['appointment_lists']);die;
		$this->load->view('page/advisor/appointment_list',$data);
	}
	function extra_settings()
	{
		$this->common->check_user_login();
		$user_id = $this->session->userdata('user_id');
		$created_on = date("Y-m-d H:i:s");
		$todatdate = date("Y-m-d");
		$data = array();
		$data['title'] = 'Edit Profile | Five Percent';
		$data['sub_title'] = 'Profile';

		$data['settings'] = $this->db->query("SELECT * FROM tbl_users_extra_settings WHERE user_id='".$user_id."'")->row();
		if($this->input->server('REQUEST_METHOD')=='POST')
		{
			$StockPickingBasedOn = $this->input->post('StockPickingBasedOn');

			$checkExisting = $this->db->query("SELECT * FROM tbl_users_extra_settings WHERE user_id='".$user_id."'")->num_rows();
			if($checkExisting>0)
			{
				$update = array(
								'StockPickingBasedOn'=>$StockPickingBasedOn,
								);
				$this->db->where('user_id',$user_id);
				$this->db->update('tbl_users_extra_settings',$update);
				$this->session->set_flashdata('success', 'Setting Saved successfully');

			}
			else
			{
				$InsertData = array(
								'user_id'=>$user_id,
								'StockPickingBasedOn'=>$StockPickingBasedOn,
								'created_on'=>$created_on
								);
				$this->db->insert('tbl_users_extra_settings',$InsertData);
				$this->session->set_flashdata('success', 'Setting Saved successfully');
			}
			redirect(base_url('users/advisor/extra_settings'));
		}
		else
		{
			$this->load->view('page/advisor/extra_settings',$data);
		}

		
	}
	function add_availability_schedule()
	{
		$this->common->check_user_login();
		$user_id = $this->session->userdata('user_id');
		$created_on = date("Y-m-d H:i:s");
		$data = array();
		$data['title'] = 'Edit Profile | Five Percent';
		$data['sub_title'] = 'Profile';

		$this->db->select("*");
		$this->db->from("tbl_advisor_availability_slots_datewise");
		$this->db->where('advisor_id',$user_id);
		$countbeforese = $this->db->get();
		$data['countbeforesetslots'] =  $countbeforese->num_rows();

		//$this->db->select("*");
		$this->db->from("tbl_advisor_availability_time_slots");
		$this->db->where('advisor_id',$user_id);
		$getallslotsdetails = $this->db->get();
		$data['slotsdetails'] =  $getallslotsdetails->result();
		//echo "<pre>";print_r($data['countbeforesetslots']);die;
		if($this->input->server('REQUEST_METHOD')=='POST')
		{
			$this->form_validation->set_rules('repeat', 'Select Availablity type', 'trim|required');
			$this->form_validation->set_rules('start_date', 'Select start date', 'trim|required'); 
			$this->form_validation->set_rules('end_date', 'Select end date', 'trim|required'); 
			$this->form_validation->set_rules('start_time', 'Select start time', 'trim|required'); 
			$this->form_validation->set_rules('end_time', 'Select end time', 'trim|required'); 		
		
			$start_date =  $this->input->post('start_date');
			$end_date =  $this->input->post('end_date'); 
			$dt = new DateTime($start_date);
			$startDate= $dt->format('Y-m-d');
			$dt1 = new DateTime($end_date);
			$endDate = $dt1->format('Y-m-d');
			$todaydate = date('Y-m-d');
			//echo $startDate."---".$endDate."<br>";
			//echo "<pre>";print_r($_POST);die;
			if ($this->form_validation->run() == TRUE) 
			{
			if($this->input->post() !='') 
			{ 
				 if($startDate < $todaydate) 
				 {
				 	$this->session->set_flashdata('success_message1', 'Start date cant be earlier');
				 } 
				 else if ($endDate <= $todaydate) 
				 {
				 	$this->session->set_flashdata('success_message2', 'End date cant be earlier or today date');
				 } 
				 else if ($endDate == $startDate)
				 {
				 	$this->session->set_flashdata('success_message3', 'Start and End date cant be same date');
				 }
				 else if($startDate>=$endDate) 
				 {
				 	$this->session->set_flashdata('success_message1', 'End date cant be earlier than start date');
				 }
				 else
				 {
					   
				 $emergency_status_get =  $this->input->post('emergency_status');
				 if($emergency_status_get){ $emergency_status = "1"; } else { $emergency_status = "0"; }
				 $repeated =  $this->input->post('repeat');
				 
				 $sunday_get =  $this->input->post('sunday');
				 if($sunday_get){ $sunday = "1"; } else { $sunday = "0"; }					 
				 $monday_get =  $this->input->post('monday');
				 if($monday_get){ $monday = "1"; } else { $monday = "0"; }	
				 $tuesday_get =  $this->input->post('tuesday');
				 if($tuesday_get){ $tuesday = "1"; } else { $tuesday = "0"; }	
				 $wednesday_get =  $this->input->post('wednesday');
				 if($wednesday_get){ $wednesday = "1"; } else { $wednesday = "0"; }
				 $thursday_get =  $this->input->post('thursday');
				 if($thursday_get){ $thursday = "1"; } else { $thursday = "0"; }
				 $friday_get =  $this->input->post('friday');
				 if($friday_get){ $friday = "1"; } else { $friday = "0"; }
				 $saturday_get =  $this->input->post('saturday');
				 if($saturday_get){ $saturday = "1"; } else { $saturday = "0"; }				 
				 

			     $start_time =  $this->input->post('start_time');
				 $end_time =  $this->input->post('end_time');
				 $start_time_am_pm =  $this->input->post('start_time_am_pm');
				 $end_time_am_pm =  $this->input->post('end_time_am_pm');
			     $start_date =  $this->input->post('start_date');
			     $end_date =  $this->input->post('end_date');
				 
                 // date format change for loop weekly insert
				$dt = new DateTime($start_date);
				$startDate= $dt->format('Y-m-d'); 
				$dt1 = new DateTime($end_date);
				$endDate = $dt1->format('Y-m-d'); 
				
				// date fromat for loop daily insert
				$begin = new DateTime($start_date);
                $end =   new DateTime($end_date);
				
				 $query = $this->db->query("SELECT * FROM tbl_advisor_availability_time_slots where advisor_id ='$user_id'");
				 $countinsert = $query->num_rows();
				 $table = 'tbl_advisor_availability_time_slots';	
				 $InsertData =  array(
							 'advisor_id'=>$user_id,
							 'repeated'=>$repeated,
							 'start_date'=>$start_date,
							 'end_date'=>$end_date,
							 'sunday'=>$sunday,
							 'monday'=>$monday,
							 'tuesday'=>$tuesday,
							 'wednesday'=>$wednesday,
							 'thursday'=>$thursday,
							 'friday'=>$friday,
							 'saturday'=>$saturday,
							 'start_time'=>$start_time,
							 'start_time_am_pm'=>$start_time_am_pm,
							 'end_time_am_pm'=>$end_time_am_pm,
							 'end_time'=>$end_time,
							 'emergency_status'=>$emergency_status												
							);
				if($countinsert > 0)
				{
					$this->db->where('advisor_id',$user_id);
					$this->db->delete('tbl_advisor_availability_time_slots');
					
					$this->db->where('advisor_id',$user_id);
					$this->db->delete('tbl_advisor_availability_slots_datewise');					
					$result = $this->db->insert($table,$InsertData);		          
						  
				 
							// Condition for the repeated time it code for weekly 
							if($repeated == 'weekly')
							{
							     for ($i = strtotime($startDate); $i <= strtotime($endDate); $i = strtotime('+1 day', $i)) 
							     {
									 
										  if (date('N', $i) == 1 && $monday == 1)
										  { //Monday == 1
										   $insertdate = date('Y-m-d', $i); //prints the date only if it's a Monday
									        $Insertslots =  array(
												 'advisor_id'=>$user_id,
													 'dates'=>$insertdate,
													 'start_time'=>$start_time,
													 'start_time_am_pm'=>$start_time_am_pm,
							                         'end_time_am_pm'=>$end_time_am_pm,
													 'end_time'=>$end_time				
													);
										         $result = $this->db->insert('tbl_advisor_availability_slots_datewise',$Insertslots);
									     } 
										 
										 
										 
									 
										  if (date('N', $i) == 2 && $tuesday == 1){ //Tuesday == 2
										    $insertdate = date('Y-m-d', $i); //prints the date only if it's a Tuesday
										   $Insertslots =  array(
													 'advisor_id'=>$user_id,
													 'dates'=>$insertdate,
													 'start_time'=>$start_time,
													 'start_time_am_pm'=>$start_time_am_pm,
							                         'end_time_am_pm'=>$end_time_am_pm,													 
													 'end_time'=>$end_time				
													);
										         $result = $this->db->insert('tbl_advisor_availability_slots_datewise',$Insertslots);
									     }
										 
										 
										 
										  if (date('N', $i) == 3 && $wednesday == 1){ //Wednesday == 3
										    $insertdate = date('Y-m-d', $i); //prints the date only if it's a Wednesday
										   $Insertslots =  array(
													 'advisor_id'=>$user_id,
													 'dates'=>$insertdate,
													 'start_time'=>$start_time,
											    	 'start_time_am_pm'=>$start_time_am_pm,
							                         'end_time_am_pm'=>$end_time_am_pm,
													 'end_time'=>$end_time				
													);
										         $result = $this->db->insert('tbl_advisor_availability_slots_datewise',$Insertslots);
									     }
									
									    
										
										 if (date('N', $i) == 4 && $thursday == 1){ //Thursday == 4
										    $insertdate = date('Y-m-d', $i); //prints the date only if it's a Thursday
										   $Insertslots =  array(
													 'advisor_id'=>$user_id,
													 'dates'=>$insertdate,
													 'start_time'=>$start_time,
													 'start_time_am_pm'=>$start_time_am_pm,
							                         'end_time_am_pm'=>$end_time_am_pm,
													 'end_time'=>$end_time				
													);
										         $result = $this->db->insert('tbl_advisor_availability_slots_datewise',$Insertslots);
									     }
									
									
									
									
									     if (date('N', $i) == 5 && $friday == 1){ //Friday == 5
										    $insertdate = date('Y-m-d', $i); //prints the date only if it's a Friday
										   $Insertslots =  array(
													 'advisor_id'=>$user_id,
													 'dates'=>$insertdate,
													 'start_time'=>$start_time,
										             'start_time_am_pm'=>$start_time_am_pm,
							                         'end_time_am_pm'=>$end_time_am_pm,
													 'end_time'=>$end_time				
													);
										         $result = $this->db->insert('tbl_advisor_availability_slots_datewise',$Insertslots);
									     }
									
									
									
									
									     if (date('N', $i) == 6 && $saturday == 1){ //Saturday == 6
										    $insertdate = date('Y-m-d', $i); //prints the date only if it's a Saturday
										   $Insertslots =  array(
													 'advisor_id'=>$user_id,
													 'dates'=>$insertdate,
													 'start_time'=>$start_time,
								     				 'start_time_am_pm'=>$start_time_am_pm,
							                         'end_time_am_pm'=>$end_time_am_pm,
													 'end_time'=>$end_time				
													);
										         $result = $this->db->insert('tbl_advisor_availability_slots_datewise',$Insertslots);
									     }
									
									
									
									
									     if (date('N', $i) == 7 && $sunday == 1){ //Sunday == 7
										   $insertdate = date('Y-m-d', $i); //prints the date only if it's a Sunday
										   $Insertslots =  array(
													 'advisor_id'=>$user_id,
													 'dates'=>$insertdate,
													 'start_time'=>$start_time,
								     				 'start_time_am_pm'=>$start_time_am_pm,
							                         'end_time_am_pm'=>$end_time_am_pm,
													 'end_time'=>$end_time				
													);
										         $result = $this->db->insert('tbl_advisor_availability_slots_datewise',$Insertslots);
									     } 
										  
									}	 
								 } else if($repeated == 'daily'){

                                       $daterange = new DatePeriod($begin, new DateInterval('P1D'), $end);
										foreach($daterange as $date){
											$insertdate = $date->format("Y-m-d");
											$Insertslots =  array(
													 'advisor_id'=>$user_id,
													 'dates'=>$insertdate,
													 'start_time'=>$start_time,
													 'start_time_am_pm'=>$start_time_am_pm,
							                         'end_time_am_pm'=>$end_time_am_pm,
													 'end_time'=>$end_time				
													);
										         $result = $this->db->insert('tbl_advisor_availability_slots_datewise',$Insertslots);
										}
										
								 } else if($repeated == 'monthly'){
									 
				                        $daterange = new DatePeriod($begin, new DateInterval('P1M'), $end);
										foreach($daterange as $date){
											$insertdate = $date->format("Y-m-d");
											$Insertslots =  array(
													 'advisor_id'=>$user_id,
													 'dates'=>$insertdate,
													 'start_time'=>$start_time,
								     				 'start_time_am_pm'=>$start_time_am_pm,
							                         'end_time_am_pm'=>$end_time_am_pm,
													 'end_time'=>$end_time				
													);
										         $result = $this->db->insert('tbl_advisor_availability_slots_datewise',$Insertslots);
										}
								 
								 }
  
						  if($result){
						  $this->session->set_flashdata('success_message', 'Time slots insert Successfully');
						  }			
								
				} else {	
					    $result = $this->db->insert($table,$InsertData);
							// Condition for the repeated time it code for weekly 
							if($repeated == 'weekly'){
							     for ($i = strtotime($startDate); $i <= strtotime($endDate); $i = strtotime('+1 day', $i)) {
									 
										  if (date('N', $i) == 1 && $monday == 1){ //Monday == 1
										   $insertdate = date('Y-m-d', $i); //prints the date only if it's a Monday
									        $Insertslots =  array(
												 'advisor_id'=>$user_id,
													 'dates'=>$insertdate,
													 'start_time'=>$start_time,
													 'start_time_am_pm'=>$start_time_am_pm,
							                         'end_time_am_pm'=>$end_time_am_pm,
													 'end_time'=>$end_time				
													);
										         $result = $this->db->insert('tbl_advisor_availability_slots_datewise',$Insertslots);
									     } 
										 
										 
										 
									 
										  if (date('N', $i) == 2 && $tuesday == 1){ //Tuesday == 2
										    $insertdate = date('Y-m-d', $i); //prints the date only if it's a Tuesday
										   $Insertslots =  array(
													 'advisor_id'=>$user_id,
													 'dates'=>$insertdate,
													 'start_time'=>$start_time,
													 'start_time_am_pm'=>$start_time_am_pm,
							                         'end_time_am_pm'=>$end_time_am_pm,													 
													 'end_time'=>$end_time				
													);
										         $result = $this->db->insert('tbl_advisor_availability_slots_datewise',$Insertslots);
									     }
										 
										 
										 
										  if (date('N', $i) == 3 && $wednesday == 1){ //Wednesday == 3
										    $insertdate = date('Y-m-d', $i); //prints the date only if it's a Wednesday
										   $Insertslots =  array(
													 'advisor_id'=>$user_id,
													 'dates'=>$insertdate,
													 'start_time'=>$start_time,
											    	 'start_time_am_pm'=>$start_time_am_pm,
							                         'end_time_am_pm'=>$end_time_am_pm,
													 'end_time'=>$end_time				
													);
										         $result = $this->db->insert('tbl_advisor_availability_slots_datewise',$Insertslots);
									     }
									
									    
										
										 if (date('N', $i) == 4 && $thursday == 1){ //Thursday == 4
										    $insertdate = date('Y-m-d', $i); //prints the date only if it's a Thursday
										   $Insertslots =  array(
													 'advisor_id'=>$user_id,
													 'dates'=>$insertdate,
													 'start_time'=>$start_time,
													 'start_time_am_pm'=>$start_time_am_pm,
							                         'end_time_am_pm'=>$end_time_am_pm,
													 'end_time'=>$end_time				
													);
										         $result = $this->db->insert('tbl_advisor_availability_slots_datewise',$Insertslots);
									     }
									
									
									
									
									     if (date('N', $i) == 5 && $friday == 1){ //Friday == 5
										    $insertdate = date('Y-m-d', $i); //prints the date only if it's a Friday
										   $Insertslots =  array(
													 'advisor_id'=>$user_id,
													 'dates'=>$insertdate,
													 'start_time'=>$start_time,
										             'start_time_am_pm'=>$start_time_am_pm,
							                         'end_time_am_pm'=>$end_time_am_pm,
													 'end_time'=>$end_time				
													);
										         $result = $this->db->insert('tbl_advisor_availability_slots_datewise',$Insertslots);
									     }
									
									
									
									
									     if (date('N', $i) == 6 && $saturday == 1){ //Saturday == 6
										    $insertdate = date('Y-m-d', $i); //prints the date only if it's a Saturday
										   $Insertslots =  array(
													 'advisor_id'=>$user_id,
													 'dates'=>$insertdate,
													 'start_time'=>$start_time,
								     				 'start_time_am_pm'=>$start_time_am_pm,
							                         'end_time_am_pm'=>$end_time_am_pm,
													 'end_time'=>$end_time				
													);
										         $result = $this->db->insert('tbl_advisor_availability_slots_datewise',$Insertslots);
									     }
									
									
									
									
									     if (date('N', $i) == 7 && $sunday == 1){ //Sunday == 7
										   $insertdate = date('Y-m-d', $i); //prints the date only if it's a Sunday
										   $Insertslots =  array(
													 'advisor_id'=>$user_id,
													 'dates'=>$insertdate,
													 'start_time'=>$start_time,
								     				 'start_time_am_pm'=>$start_time_am_pm,
							                         'end_time_am_pm'=>$end_time_am_pm,
													 'end_time'=>$end_time				
													);
										         $result = $this->db->insert('tbl_advisor_availability_slots_datewise',$Insertslots);
									     } 
										  
									}	 
								 } else if($repeated == 'daily'){

                                       $daterange = new DatePeriod($begin, new DateInterval('P1D'), $end);
										foreach($daterange as $date){
											$insertdate = $date->format("Y-m-d");
											$Insertslots =  array(
													 'advisor_id'=>$user_id,
													 'dates'=>$insertdate,
													 'start_time'=>$start_time,
													 'start_time_am_pm'=>$start_time_am_pm,
							                         'end_time_am_pm'=>$end_time_am_pm,
													 'end_time'=>$end_time				
													);
										         $result = $this->db->insert('tbl_advisor_availability_slots_datewise',$Insertslots);
										}
										
								 } else if($repeated == 'monthly'){
									 
				                        $daterange = new DatePeriod($begin, new DateInterval('P1M'), $end);
										foreach($daterange as $date){
											$insertdate = $date->format("Y-m-d");
											$Insertslots =  array(
													 'advisor_id'=>$user_id,
													 'dates'=>$insertdate,
													 'start_time'=>$start_time,
								     				 'start_time_am_pm'=>$start_time_am_pm,
							                         'end_time_am_pm'=>$end_time_am_pm,
													 'end_time'=>$end_time				
													);
										         $result = $this->db->insert('tbl_advisor_availability_slots_datewise',$Insertslots);
										}
								 
								 }
						
						
						
					    if($result)
					    {
					    	$this->session->set_flashdata('success_message', 'Time slots insert Successfully');
					    }
						
					}
			    }					
							
		    } 
	    }
	    redirect(base_url('users/advisor/add_availability_schedule'));
		}
		$this->load->view('page/advisor/availability_date_time',$data);
	}

	function subscription_plan($user_id,$args)
	{
		$data = array();		
		$data['title'] = "Subscription plan - 5% Percentage";	
		$user_id = base64_decode(base64_decode($user_id));
		$recordarray = array();
		$data_arr = array();
		$resultdata = $this->db->query("SELECT * FROM tbl_admin_subscription_plan WHERE type=1")->result();
		foreach($resultdata as $res)
		{
			$data_arr['plan_name'] = $res->plan_name;
			$data_arr['price'] = $res->price;
			$data_arr['id'] = $res->id;
			$features = $this->db->query("SELECT * FROM tbl_admin_subscription_feature WHERE subs_id='".$res->id."'")->result();
			$data_arr['features'] = $features;
			$data_arr['user_id'] = $user_id;
			array_push($recordarray, $data_arr);

		}
		$data['subscriptions'] = $recordarray;
		$this->load->view('page/advisor/subscription_plan',$data);
	}
	function upgrade_subsription_plan()
	{
		$this->common->check_user_login();
		$data = array();		
		$data['title'] = "upgrade Subscription plan - 5% Percentage";	
		$user_id = $this->session->userdata('user_id');
		$recordarray = array();
		$data_arr = array();
		$resultdata = $this->db->query("SELECT * FROM tbl_admin_subscription_plan WHERE type=1")->result();
		foreach($resultdata as $res)
		{
			$data_arr['plan_name'] = $res->plan_name;
			$data_arr['price'] = $res->price;
			$data_arr['id'] = $res->id;
			$features = $this->db->query("SELECT * FROM tbl_admin_subscription_feature WHERE subs_id='".$res->id."'")->result();
			$data_arr['features'] = $features;
			$data_arr['user_id'] = $user_id;
			array_push($recordarray, $data_arr);
		}
		$data['subscriptions'] = $recordarray;
		$data['existing_plan'] = $this->db->query("SELECT * FROM tbl_user_subscription_plan WHERE user_id='".$user_id."'")->row();

		//echo "<pre>";print_r($data);die;
		$this->load->view('page/advisor/upgrade_subscription_plan',$data);
	}
	function advisor_tax_law()
	{
		$this->common->check_user_login();
		$data = array();		
		$data['title'] = "Advisor Tax Law - 5% Percentage";	
		$data['sub_title'] = 'Tax Law';
		$user_id = $this->session->userdata('user_id');
		$data['advisor_taxes'] = $this->db->query("SELECT id,document_name,doc_file FROM tbl_admin_tax_law WHERE type=1")->result();
		$this->load->view('page/advisor/tax_law',$data);
	}
	function change_password()
	{
		$this->common->check_user_login();
		$data = array();
		$data['title'] = 'Change Password | Five Percent';
		$data['sub_title'] = 'Change Password';
		$user_id = $this->session->userdata('user_id');

		if($this->input->server('REQUEST_METHOD')=='POST')
		{
			$this->form_validation->set_rules('currentpass', 'Current Password', 'required',array(
			'required'=>'Please Enter %s',					
			));
			$this->form_validation->set_rules('newpass', 'New Password', 'required',array(
			'required'=>'Please Enter %s',					
			));
			$this->form_validation->set_rules('confirmpass', 'Confirm Password', 'required|matches[newpass]',array(
				'required'=>'Please Enter %s',	
				'matches'=>'Password and confirm password does not match'				
			));
			if($this->form_validation->run() == FALSE)
            {
                $this->load->view('page/advisor/change_password',$data);
            }
            else
            {
            	$currentpass = $this->input->post('currentpass');
            	$currentpass = md5($currentpass);
            	$checkoldpass = $this->db->query("SELECT * FROM  tbl_users WHERE password='".$currentpass."' AND id='".$user_id."'");
            	if($checkoldpass->num_rows()>0)
            	{
            		$this->db->where('id',$user_id);
            		$this->db->where('password',$currentpass);
            		$this->db->update('tbl_users',array('password'=>md5($this->input->post('newpass'))));

            		$this->session->set_flashdata('success','Password Change successfully');
            		redirect(base_url('users/advisor/change_password'));
            	} 
            	else
	            {
	            	$this->session->set_flashdata('success','Incorrect Current Password');
	            	redirect(base_url('users/advisor/change_password'));
	            }             
            }

		}
		else
		{
			$this->load->view('page/advisor/change_password',$data);
		}		
	}

}
