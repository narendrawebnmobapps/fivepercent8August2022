<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Common 
{
   function random_password_token() 
	{
	    $alphabet = 'ab3210cdef456sdfghijkssfdlmnopqrs0tuvwx4560yzABCDdfgE0FGHIJKs456d0fLMN456OPQ0RSTUVWXYsfdZ1234s0df5678sdf4690';
	    $pass = array();
	    $alphaLength = strlen($alphabet) - 1; 
	    for ($i = 0; $i < 25; $i++) 
	    {
	        $n = rand(0, $alphaLength);
	        $pass[] = $alphabet[$n];
	    }
	    return implode($pass); 
	}
	function is_auth()
	{
		$CI =& get_instance();
		/*if( $CI->session->userdata('user_authen') )
		{
		    redirect(base_url().'admin/login/');
		}*/
		return $CI->session->userdata('data');
		//$CI->session->unset_userdata('data');

	}
	function check_user_login()
	{
		$CI =& get_instance();
		$user_id = $CI->session->userdata('user_id');
		$email = $CI->session->userdata('email');
		if($user_id=="" OR $email=="" )
		{
			redirect(base_url('signin'));
		}

		$query  =   $CI->db->query("SELECT a.id,b.user_id FROM tbl_users a INNER JOIN tbl_user_personel_info b ON a.id=b.user_id WHERE a.id='".$user_id."' ");
		if($query->num_rows()<1)
		{
			redirect(base_url('users/dashboard/user_logout'));
		}
	}
	function ajax_check_user_login()
	{
		$CI =& get_instance();
		$user_id = $CI->session->userdata('user_id');
		$email = $CI->session->userdata('email');
		if($user_id=="" OR $email=="" )
		{
			echo 'login';
			die;
		}
		
	}
	function calculateage($dob)
	{
		$bday = new DateTime($dob);
		$today = new Datetime(date('m/d/y'));
		$diff = $today->diff($bday);
		return $diff->y;
	}
	function checkMoneyUsesByUser($user_id)
	{
		error_reporting(0);
		$CI =& get_instance();
		$get_income_expense = $CI->db->query("SELECT a.options AS optionvalue,b.id AS option_id,a.value, a.question_id,b.options FROM user_question_options a LEFT JOIN tbl_question_options b ON a.options=b.id WHERE a.question_id=35 AND a.user_id='".$user_id."'")->result();
		//echo "<pre>";print_r($get_income_expense);die;
		$total_monthly_income = 0;
		$total_monthly_expenses = 0;
		$capital_investing = 0;
		if(count($get_income_expense)>0)
		{
			foreach($get_income_expense as $bal)
			{
				if($bal->option_id==187)
				{	/*if(is_int($bal->value))
					{
						$total_monthly_income = $bal->value;
					}
					else
					{
						$total_monthly_income = 0;
					}*/
					$total_monthly_income = $bal->value;
				}
				if($bal->option_id==188)
				{
					/*if(is_int($bal->value))
					{
						$total_monthly_expenses = $bal->value;
					}
					else
					{
						$total_monthly_expenses = 0;
					}*/
					$total_monthly_expenses = $bal->value;
					
				}
				if($bal->option_id==217)
				{
					/*if(is_int($bal->value))
					{
						$capital_investing = $bal->value;
					}
					else
					{
						$capital_investing = 0;
					}*/
					$capital_investing = $bal->value;
				}
			}
		}
		else
		{
			$total_monthly_income = 0;
			$total_monthly_expenses = 0;
			$capital_investing = 0;
		}
		

		$checkRvRfOption = $CI->db->query("SELECT rf,rv,options,money_use_percentage FROM tbl_user_rf_rv_options_values WHERE user_id='".$user_id."'");
		//echo "<pre>";print_r($checkRvRfOption->row());die;
		if($checkRvRfOption->num_rows()<1)
		{
			$risk = 0;
		}
		else
		{
			$risk = $capital_investing*($checkRvRfOption->row()->money_use_percentage/100);
		}

		if($risk>0)
		{
			$data['totalCanInvest'] = $risk;
			$data['rv'] = $risk*($checkRvRfOption->row()->rv/100);
			$data['rf'] = $risk*($checkRvRfOption->row()->rf/100);
			$data['options'] = $risk*($checkRvRfOption->row()->options/100);
			$data['rv_percent'] = $checkRvRfOption->row()->rv;
			$data['rf_percent'] = $checkRvRfOption->row()->rf;
			$data['option_percent'] = $checkRvRfOption->row()->options;
			$data['total_percent'] = $checkRvRfOption->row()->money_use_percentage;
		}
		else
		{
			$data['totalCanInvest'] = 0;
			$data['rv'] = 0;
			$data['rf'] = 0;
			$data['options'] = 0;
			$data['rv_percent'] = 0;
			$data['rf_percent'] = 0;
			$data['total_percent'] = 0;
		}
		return $data;
	}
	function calculateTotalAddedStockMoney($user_id,$stock_type)
	{
		error_reporting(0);
		$CI =& get_instance();
		$totalStcokPrice = 0;
		$stocks = $CI->db->query("SELECT `number`,stock_price FROM tbl_user_stock_management WHERE user_id='".$user_id."' AND s_type='".$stock_type."'")->result_array();
		foreach($stocks as $stock)
		{
			$totalStcokPrice+=($stock['number']*$stock['stock_price']);
		}
		return $totalStcokPrice;

	}
	function checkTotalAddedStock($user_id)
	{
		error_reporting(0);
		$CI =& get_instance();
		$totalStcokPrice = 0;
		$stocks = $CI->db->query("SELECT `number`,stock_price FROM tbl_user_stock_management WHERE user_id='".$user_id."' ")->result_array();
		foreach($stocks as $stock)
		{
			$totalStcokPrice+=($stock['number']*$stock['stock_price']);
		}
		return $totalStcokPrice;
	}
	function calculateTotalOptionStockMoney($user_id)
	{
		error_reporting(0);
		$CI =& get_instance();
		$totalStcokPrice = "0";
		$stocks = $CI->db->query("SELECT `stock_price`,`number` FROM tbl_user_stock_management WHERE user_id='".$user_id."' AND s_type=3")->result_array();
		foreach($stocks as $stock)
		{
			$totalStcokPrice+=($stock['number']*$stock['stock_price']);
		}
		return $totalStcokPrice;

	}
	function checkTradingDiaryAdded($user_id)
	{
		error_reporting(0);
		$CI =& get_instance();
		$query = $CI->db->query("SELECT SUM(price_in*remainingVolume) AS totalInvested FROM tbl_users_trading_diary WHERE user_id='".$user_id."' ORDER BY id DESC");
		$totalInvested = 0;
		if($query->row()->totalInvested!="")
		{
			$totalInvested = $query->row()->totalInvested;
		}
		return $totalInvested;
	}

	
    
}