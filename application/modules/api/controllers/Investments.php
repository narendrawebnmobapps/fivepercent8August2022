<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'libraries/REST_Controller.php';
class Investments extends REST_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('common');
	}
	function send_email($msg,$to,$subject)
    {
        $this->load->library('email');
        $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
        $this->email->set_header('Content-type', 'text/html');
        $from_email="noreply@itdevelopmentservices.com";
        $to_email=trim($to);
        $this->email->from($from_email, 'Five percent Team'); 
        $this->email->to($to_email);
        $this->email->subject($subject); 
        $this->email->message($msg);
        if($this->email->send())
        {
      		return 1;
        }
        else
        {
        	return 0;
        }
    }
    function get_fund_type_post()
    {
    	$user_id = $this->input->post('user_id');
    	if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
		}
		$resdata = array();
		$resultArray = array();
		$arrayFundType = array("Conservative funds","Moderate funds","Risky funds");
		foreach($arrayFundType as $fund)
		{
			$resdata['fund_type'] = $fund;
			array_push($resultArray, $resdata);	
		}
		$this->response(array('success'=>'true','record'=>$resultArray),200);
    }
    function get_fund_name_post()
    {
    	$user_id = $this->input->post('user_id');
    	$fund_type = $this->input->post('fund_type');
    	if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
		}
		if($fund_type=="" && $fund_type==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  Fund Type'),200);
		}
		$resultArray = $this->db->query("SELECT investments_id AS id,fund_name FROM tbl_admin_investments WHERE fund_type='".$fund_type."' ")->result();
		$this->response(array('success'=>'true','record'=>$resultArray),200);
    }
    function return_investment_data($user_id)
    {
    	$resdata = array();
		$resultArray = array();
		$totalAmount = 0;
		$result_array = $this->db->query("SELECT a.id,a.user_id,a.investments_id,a.value,a.fund_type,b.fund_commission,a.amount,a.created_on,b.fund_name,b.fund_type FROM tbl_user_investments_management a INNER JOIN tbl_admin_investments b on a.investments_id=b.investments_id WHERE a.user_id='".$user_id."' AND a.investments_type=1 ORDER BY a.id  DESC")->result();

		foreach($result_array as $invest)
		{
			$totalAmount = $totalAmount+$invest->amount;
			$resdata['id'] = $invest->id;
			$resdata['fund_name'] = $invest->fund_name;
			$resdata['fund_id'] = $invest->investments_id;
			$resdata['fund_type'] = $invest->fund_type;
			$resdata['fund_commission'] = $invest->fund_commission;
			$resdata['amount'] = $invest->amount;
			$resdata['created_on'] = $invest->created_on;
			array_push($resultArray, $resdata);
		}
		$this->response(array('success'=>'true','record'=>$resultArray,'total'=>$totalAmount),200);
    }
    function get_user_investment_list_post()
    {
    	$user_id = $this->input->post('user_id');
    	if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
		}
		$this->return_investment_data($user_id);
		
    }

    function add_investment_funds_post()
    {
    	$created_on = date("Y-m-d H:i:s");
    	$user_id = $this->input->post('user_id');
		$fund_name = $this->input->post('fund_name');
		$fund_type = $this->input->post('fund_type');
		$amount = $this->input->post('amount');

		if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
		}
		if($fund_type=="" && $fund_type==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  Fund Type'),200);
		}
		if($fund_name=="" && $fund_name==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  Fund Name'),200);
		}
		if($amount=="" && $amount==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  Amount'),200);
		}

		$insertData = array(
							'user_id'=>$user_id,
							'investments_id'=>$fund_name,
							'fund_type'=>$fund_type,
							'amount'=>$amount,
							'investments_type'=>1,
							'created_on'=>$created_on,
							);

		$insertInfoData = array(
								'user_id'=>$user_id,
								'broker_id'=>28,
								'investments_id'=>$fund_name,
								'created_on'=>$created_on,
								'updated_on'=>$created_on,
								);
		$chekEmptyUserStock = $this->db->query("SELECT * FROM tbl_user_investments_management WHERE user_id='".$user_id."' AND investments_id='".$fund_name."'")->num_rows();
		if($chekEmptyUserStock==0)
		{
			$this->db->insert('tbl_user_investments_management',$insertData);
			$this->db->insert('tbl_investments_purchase_information',$insertInfoData);
		}

		$resdata = array();
		$resultArray = array();
		$totalAmount = 0;
		$result_array = $this->db->query("SELECT a.id,a.user_id,a.investments_id,a.value,a.fund_type,b.fund_commission,a.amount,a.created_on,b.fund_name,b.fund_type FROM tbl_user_investments_management a INNER JOIN tbl_admin_investments b on a.investments_id=b.investments_id WHERE a.user_id='".$user_id."' AND a.investments_type=1 ORDER BY a.id  DESC")->result();

		foreach($result_array as $invest)
		{
			$totalAmount = $totalAmount+$invest->amount;
			$resdata['id'] = $invest->id;
			$resdata['fund_name'] = $invest->fund_name;
			$resdata['fund_id'] = $invest->investments_id;
			$resdata['fund_type'] = $invest->fund_type;
			$resdata['fund_commission'] = $invest->fund_commission;
			$resdata['amount'] = $invest->amount;
			$resdata['created_on'] = $invest->created_on;
			array_push($resultArray, $resdata);
		}
		//$this->response(array('success'=>'true','record'=>$resultArray,'total'=>$totalAmount),200);
		$this->response(array('success'=>'true','message'=>'Data Saved Successfully','record'=>$resultArray,'total'=>$totalAmount),200);
    }
    function update_investment_fund_post()
    {
    	$created_on = date("Y-m-d H:i:s");
    	$user_id = $this->input->post('user_id');
    	$user_investments_id = $this->input->post('investment_id');
		$fund_name = $this->input->post('fund_name');
		$fund_type = $this->input->post('fund_type');
		$amount = $this->input->post('amount');

		if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
		}
		if($user_investments_id=="" && $user_investments_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  Investment Id'),200);
		}
		if($fund_type=="" && $fund_type==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  Fund Type'),200);
		}
		if($fund_name=="" && $fund_name==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  Fund Name'),200);
		}
		if($amount=="" && $amount==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  Amount'),200);
		}

    	$insertData = array(
							'user_id'=>$user_id,
							'investments_id'=>$fund_name,
							'fund_type'=>$fund_type,
							'amount'=>$amount,
							'created_on'=>$created_on,
							);

		$chekEmptyUserStock = $this->db->query("SELECT * FROM tbl_user_investments_management WHERE user_id='".$user_id."' AND investments_id='".$fund_name."'")->num_rows();
		if($chekEmptyUserStock==0)
		{
			//$this->db->insert('tbl_user_investments_management',$insertData);
			$this->db->where('id',$user_investments_id);
			$this->db->where('user_id',$user_id);
			$this->db->update('tbl_user_investments_management',$insertData);
		}
		else
		{
			$this->db->where('id',$user_investments_id);
			$this->db->where('user_id',$user_id);
			$this->db->update('tbl_user_investments_management',$insertData);
		}
		$resdata = array();
		$resultArray = array();
		$totalAmount = 0;
		$result_array = $this->db->query("SELECT a.id,a.user_id,a.investments_id,a.value,a.fund_type,b.fund_commission,a.amount,a.created_on,b.fund_name,b.fund_type FROM tbl_user_investments_management a INNER JOIN tbl_admin_investments b on a.investments_id=b.investments_id WHERE a.user_id='".$user_id."' AND a.investments_type=1 ORDER BY a.id  DESC")->result();

		foreach($result_array as $invest)
		{
			$totalAmount = $totalAmount+$invest->amount;
			$resdata['id'] = $invest->id;
			$resdata['fund_name'] = $invest->fund_name;
			$resdata['fund_id'] = $invest->investments_id;
			$resdata['fund_type'] = $invest->fund_type;
			$resdata['fund_commission'] = $invest->fund_commission;
			$resdata['amount'] = $invest->amount;
			$resdata['created_on'] = $invest->created_on;
			array_push($resultArray, $resdata);
		}
		//$this->response(array('success'=>'true','record'=>$resultArray,'total'=>$totalAmount),200);
		$this->response(array('success'=>'true','message'=>'Data Saved Successfully','record'=>$resultArray,'total'=>$totalAmount),200);
    }
    function delete_investments_post()
    {
    	$user_id = $this->input->post('user_id');
    	$investment_id = $this->input->post('investment_id');
    	if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
		}
		if($investment_id=="" && $investment_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  Investment Id'),200);
		}
		$this->db->where('id',$investment_id);
		$this->db->where('user_id',$user_id);
		$this->db->delete('tbl_user_investments_management');

		$resdata = array();
		$resultArray = array();
		$totalAmount = 0;
		$result_array = $this->db->query("SELECT a.id,a.user_id,a.investments_id,a.value,a.fund_type,b.fund_commission,a.amount,a.created_on,b.fund_name,b.fund_type FROM tbl_user_investments_management a INNER JOIN tbl_admin_investments b on a.investments_id=b.investments_id WHERE a.user_id='".$user_id."' AND a.investments_type=1 ORDER BY a.id  DESC")->result();

		foreach($result_array as $invest)
		{
			$totalAmount = $totalAmount+$invest->amount;
			$resdata['id'] = $invest->id;
			$resdata['fund_name'] = $invest->fund_name;
			$resdata['fund_id'] = $invest->investments_id;
			$resdata['fund_type'] = $invest->fund_type;
			$resdata['fund_commission'] = $invest->fund_commission;
			$resdata['amount'] = $invest->amount;
			$resdata['created_on'] = $invest->created_on;
			array_push($resultArray, $resdata);
		}
		//$this->response(array('success'=>'true','record'=>$resultArray,'total'=>$totalAmount),200);
		$this->response(array('success'=>'true','message'=>'Investment Deleted Successfully','record'=>$resultArray,'total'=>$totalAmount),200);
    }

    function get_fund_description_post()
    {
    	$user_id = $this->input->post('user_id');
    	$fund_id = $this->input->post('fund_id');
    	if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
		}
		if($fund_id=="" && $fund_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  Fund Id'),200);
		}

		$resultArray = $this->db->query("SELECT fund_description as info FROM tbl_admin_investments WHERE investments_id='".$fund_id."'")->row();
		$this->response(array('success'=>'true','record'=>$resultArray),200);
    }
    function get_investment_details_post()
    {
    	$user_id = $this->input->post('user_id');
    	$investment_id = $this->input->post('investment_id');
    	if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
		}
		if($investment_id=="" && $investment_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  Investment Id'),200);
		}
		$resultArray = $this->db->query("SELECT a.id,a.investments_id AS fund_id,a.fund_type,a.amount,b.fund_name,b.fund_commission FROM tbl_user_investments_management a INNER JOIN tbl_admin_investments b ON a.investments_id=b.investments_id WHERE a.id='".$investment_id."' AND a.user_id='".$user_id."' ")->row();

		$this->response(array('success'=>'true','record'=>$resultArray),200);
    }

    function get_investment_risk_profile_post()
    {
    	$user_id = $this->input->post('user_id');
		if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide user Id'),200);
		}
		$this->db->select('tu.email,tu.status,pi.first_name,tu.dob,pi.last_name,pi.job_type,pi.profile_image,pi.martial_status,pi.no_of_child');
		$this->db->from('tbl_users tu');
		$this->db->join('tbl_user_personel_info pi', 'tu.id = pi.user_id');
		$this->db->where('tu.id',$user_id);
		$result = $this->db->get()->row();
		$totalNumberOfQuestion = $this->db->query("SELECT * FROM tbl_questions")->num_rows();
		$numberOfAnsweredQuestion = $checkQuestionOptions = $this->db->query("SELECT a.*,b.*,COUNT(b.question_id) AS qnc FROM user_question_answer a INNER JOIN user_question_options b ON a.question_id = b.question_id  WHERE a.user_id='".$user_id."' GROUP BY b.question_id")->num_rows();
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
		$all_money = '0';
		$money_use_percentage = 100;
		$get_exitsing_rf_rv_option_value = $this->db->query("SELECT * FROM tbl_user_rf_rv_options_values WHERE user_id='".$user_id."'");
		if($get_exitsing_rf_rv_option_value->num_rows()>0)
		{
			$rf_rv_row = $get_exitsing_rf_rv_option_value->row();
			$RF = $rf_rv_row->rf;
			$RV = $rf_rv_row->rv;
			$option = $rf_rv_row->options;

			$all_money = $rf_rv_row->all_money;
			$money_use_percentage = $rf_rv_row->money_use_percentage;
		}

		$sql1="SELECT count(m.user_id) from tbl_user_investments_management m where m.investments_id=a.investments_id and m.user_id='".$user_id."'";
		if($risk_percent>=0 && $risk_percent<=50)
		{
			$investment_ibex35 = $this->db->query("SELECT a.investments_id AS fund_id,a.fund_name,a.investments_type,a.fund_commission,fund_type,($sql1) as exist  FROM tbl_admin_investments a WHERE a.investments_type=1 AND fund_type='Risky funds' ORDER BY a.investments_id DESC LIMIT 10")->result();
		}

		if($risk_percent>=51 && $risk_percent<=75)
		{
			$investment_ibex35 = $this->db->query("SELECT a.investments_id AS fund_id,a.fund_name,a.investments_type,a.fund_commission,fund_type,($sql1) as exist  FROM tbl_admin_investments a WHERE a.investments_type=1 AND fund_type='moderate funds' ORDER BY a.investments_id DESC LIMIT 10")->result();
		}
		if($risk_percent>=75 && $risk_percent<=100)
		{
			$investment_ibex35 = $this->db->query("SELECT a.investments_id AS fund_id,a.fund_name,a.investments_type,a.fund_commission,fund_type,($sql1) as exist  FROM tbl_admin_investments a WHERE a.investments_type=1 AND fund_type='Conservative funds' ORDER BY a.investments_id DESC LIMIT 10")->result();
		}
		$this->response(array('success'=>'true','record'=>$result,'risk_percent'=>$risk_percent,'suggested_funds'=>$investment_ibex35,'all_money'=>$all_money),200);
    }

    function save_suggested_investment_funds_post()
    {
    	$user_id = $this->input->post('user_id');
    	if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
		}
		$created_on = date('Y-m-d H:i:s');
		if(count($_POST['fund_id'])>0)
		{
			for($i=0;$i<count($_POST['fund_id']);$i++)
			{
				$checkExistingInvestment = $this->db->query("SELECT * FROM tbl_user_investments_management WHERE user_id='".$user_id."' AND investments_id='".$_POST['fund_id'][$i]."' ");
				if($checkExistingInvestment->num_rows()>0)
				{

				}
				else
				{
					$investments_id = $_POST['fund_id'][$i];
					$investments_type = $_POST['investment_type'][$i];
					$fund_type = $_POST['fund_type'][$i];
					$insertdata = array(
									'user_id'=>$user_id,
									'investments_id'=>$investments_id,
									'fund_type'=>$fund_type,
									'investments_type'=>$investments_type,
									'is_suggested'=>1,
									'created_on'=>$created_on,
									);					
					$this->db->insert('tbl_user_investments_management',$insertdata);
				}
				
				
			}
		}
		$this->response(array('success'=>'true','message'=>'Data saved Successfully'),200);
    }
    
}
?>