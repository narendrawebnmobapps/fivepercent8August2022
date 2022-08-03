<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboards 
{
	function funds_file_handling($actual_fund_id)
	{
		$CI =& get_instance();
		$getFile = $CI->db->query("SELECT investment_file FROM tbl_admin_investments WHERE investments_id='".$actual_fund_id."'")->row()->investment_file;
		if($getFile!=NULL OR $getFile!="")
		{
			$the_big_array = [];
			$handle = fopen('uploads/investments/'.$getFile, 'r');
			$c = 0;//
			while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
			{
				
				if($c!=0)
				{		
					$the_big_array[] = $filesop;
				}
				$c++;
			}
			return $the_big_array;
		}
		else
		{
			return 'no data available';
		}
		
	}
	function getMonthYearArr()
	{
		$monthYearArr = array(
							 '01'=>'Jan',
							 '02'=>'Feb',
							 '03'=>'Mar',
							 '04'=>'Apr',
							 '05'=>'May',
							 '06'=>'Jun',
							 '07'=>'Jul',
							 '08'=>'Aug',
							 '09'=>'Sept',
							 '10'=>'Oct',
							 '11'=>'Nov',
							 '12'=>'Dec',
							);
		return $monthYearArr;
	}
	function getAdvisorClientActivity1($userID,$connectedUserIds)
	{
		error_reporting(0);
		$CI =& get_instance();
		$monthYearArr = $this->getMonthYearArr();
		$selectQ='';
		$arrayObject12 = [];
		$arrayObject11 = [];
		$arrayObject10 = [];
		$arrayObject9 = [];
		$arrayObject8 = [];
		$arrayObject7 = [];
		$arrayObject6 = [];
		$arrayObject5 = [];
		$arrayObject4 = [];
		$arrayObject3 = [];
		$arrayObject2 = [];
		$arrayObject1 = [];
		for ($i=12; $i >0; $i--) 
		{
			$dateSelect = date("Y-m", strtotime( date( 'Y-m-01' )." -$i months"));
			if($i==12)
			{
				$arrayObject12 = $CI->db->query("SELECT COUNT(id) AS total,SUM(price_in*final_volume) AS totalPriceIn,SUM(price_out*final_volume) AS totalPriceOut,SUM(price_out*final_volume-price_in*final_volume) AS monthlyLossProfit,STR_TO_DATE('".$dateSelect."','%Y-%m') AS month FROM tbl_users_trading_diary  WHERE STR_TO_DATE('".$dateSelect."','%Y-%m') = STR_TO_DATE(created_on,'%Y-%m') AND user_id IN($connectedUserIds)")->result();
			}
			if($i==11)
			{
				$arrayObject11 = $CI->db->query("SELECT COUNT(id) AS total,SUM(price_in*final_volume) AS totalPriceIn,SUM(price_out*final_volume) AS totalPriceOut,SUM(price_out*final_volume-price_in*final_volume) AS monthlyLossProfit,STR_TO_DATE('".$dateSelect."','%Y-%m') AS month FROM tbl_users_trading_diary  WHERE STR_TO_DATE('".$dateSelect."','%Y-%m') = STR_TO_DATE(created_on,'%Y-%m') AND user_id IN($connectedUserIds)")->result();
			}
			if($i==10)
			{
				$arrayObject10 = $CI->db->query("SELECT COUNT(id) AS total,SUM(price_in*final_volume) AS totalPriceIn,SUM(price_out*final_volume) AS totalPriceOut,SUM(price_out*final_volume-price_in*final_volume) AS monthlyLossProfit,STR_TO_DATE('".$dateSelect."','%Y-%m') AS month FROM tbl_users_trading_diary  WHERE STR_TO_DATE('".$dateSelect."','%Y-%m') = STR_TO_DATE(created_on,'%Y-%m') AND user_id IN($connectedUserIds)")->result();
			}
			if($i==9)
			{
				$arrayObject9 = $CI->db->query("SELECT COUNT(id) AS total,SUM(price_in*final_volume) AS totalPriceIn,SUM(price_out*final_volume) AS totalPriceOut,SUM(price_out*final_volume-price_in*final_volume) AS monthlyLossProfit,STR_TO_DATE('".$dateSelect."','%Y-%m') AS month FROM tbl_users_trading_diary  WHERE STR_TO_DATE('".$dateSelect."','%Y-%m') = STR_TO_DATE(created_on,'%Y-%m') AND user_id IN($connectedUserIds)")->result();
			}
			if($i==8)
			{
				$arrayObject8 = $CI->db->query("SELECT COUNT(id) AS total,SUM(price_in*final_volume) AS totalPriceIn,SUM(price_out*final_volume) AS totalPriceOut,SUM(price_out*final_volume-price_in*final_volume) AS monthlyLossProfit,STR_TO_DATE('".$dateSelect."','%Y-%m') AS month FROM tbl_users_trading_diary  WHERE STR_TO_DATE('".$dateSelect."','%Y-%m') = STR_TO_DATE(created_on,'%Y-%m') AND user_id IN($connectedUserIds)")->result();
			}
			if($i==7)
			{
				$arrayObject7 = $CI->db->query("SELECT COUNT(id) AS total,SUM(price_in*final_volume) AS totalPriceIn,SUM(price_out*final_volume) AS totalPriceOut,SUM(price_out*final_volume-price_in*final_volume) AS monthlyLossProfit,STR_TO_DATE('".$dateSelect."','%Y-%m') AS month FROM tbl_users_trading_diary  WHERE STR_TO_DATE('".$dateSelect."','%Y-%m') = STR_TO_DATE(created_on,'%Y-%m') AND user_id IN($connectedUserIds)")->result();
			}
			if($i==6)
			{
				$arrayObject6 = $CI->db->query("SELECT COUNT(id) AS total,SUM(price_in*final_volume) AS totalPriceIn,SUM(price_out*final_volume) AS totalPriceOut,SUM(price_out*final_volume-price_in*final_volume) AS monthlyLossProfit,STR_TO_DATE('".$dateSelect."','%Y-%m') AS month FROM tbl_users_trading_diary  WHERE STR_TO_DATE('".$dateSelect."','%Y-%m') = STR_TO_DATE(created_on,'%Y-%m') AND user_id IN($connectedUserIds)")->result();
			}
			if($i==5)
			{
				$arrayObject5 = $CI->db->query("SELECT COUNT(id) AS total,SUM(price_in*final_volume) AS totalPriceIn,SUM(price_out*final_volume) AS totalPriceOut,SUM(price_out*final_volume-price_in*final_volume) AS monthlyLossProfit,STR_TO_DATE('".$dateSelect."','%Y-%m') AS month FROM tbl_users_trading_diary  WHERE STR_TO_DATE('".$dateSelect."','%Y-%m') = STR_TO_DATE(created_on,'%Y-%m') AND user_id IN($connectedUserIds)")->result();
			}
			if($i==4)
			{
				$arrayObject4 = $CI->db->query("SELECT COUNT(id) AS total,SUM(price_in*final_volume) AS totalPriceIn,SUM(price_out*final_volume) AS totalPriceOut,SUM(price_out*final_volume-price_in*final_volume) AS monthlyLossProfit,STR_TO_DATE('".$dateSelect."','%Y-%m') AS month FROM tbl_users_trading_diary  WHERE STR_TO_DATE('".$dateSelect."','%Y-%m') = STR_TO_DATE(created_on,'%Y-%m') AND user_id IN($connectedUserIds)")->result();
			}
			if($i==3)
			{
				$arrayObject3 = $CI->db->query("SELECT COUNT(id) AS total,SUM(price_in*final_volume) AS totalPriceIn,SUM(price_out*final_volume) AS totalPriceOut,SUM(price_out*final_volume-price_in*final_volume) AS monthlyLossProfit,STR_TO_DATE('".$dateSelect."','%Y-%m') AS month FROM tbl_users_trading_diary  WHERE STR_TO_DATE('".$dateSelect."','%Y-%m') = STR_TO_DATE(created_on,'%Y-%m') AND user_id IN($connectedUserIds)")->result();
			}
			if($i==2)
			{
				$arrayObject2 = $CI->db->query("SELECT COUNT(id) AS total,SUM(price_in*final_volume) AS totalPriceIn,SUM(price_out*final_volume) AS totalPriceOut,SUM(price_out*final_volume-price_in*final_volume) AS monthlyLossProfit,STR_TO_DATE('".$dateSelect."','%Y-%m') AS month FROM tbl_users_trading_diary  WHERE STR_TO_DATE('".$dateSelect."','%Y-%m') = STR_TO_DATE(created_on,'%Y-%m') AND user_id IN($connectedUserIds)")->result();
			}
			if($i==1)
			{
				$arrayObject1 = $CI->db->query("SELECT COUNT(id) AS total,SUM(price_in*final_volume) AS totalPriceIn,SUM(price_out*final_volume) AS totalPriceOut,SUM(price_out*final_volume-price_in*final_volume) AS monthlyLossProfit,STR_TO_DATE('".$dateSelect."','%Y-%m') AS month FROM tbl_users_trading_diary  WHERE STR_TO_DATE('".$dateSelect."','%Y-%m') = STR_TO_DATE(created_on,'%Y-%m') AND user_id IN($connectedUserIds)")->result();
			}
			
		}
		$new_array2 = array_merge($arrayObject12,$arrayObject11,$arrayObject10,$arrayObject9,$arrayObject8,$arrayObject7,$arrayObject6,$arrayObject5,$arrayObject4,$arrayObject3,$arrayObject2,$arrayObject1);
		//echo "<pre>";print_r($new_array2);die;
		return $new_array2;
	}
	function getAdvisorClientActivity($userID,$connectedUserIds)
	{
		error_reporting(0);
		$CI =& get_instance();
		$monthYearArr = $this->getMonthYearArr();
		$selectQ='';
		$arrayObject12 = [];
		$arrayObject11 = [];
		$arrayObject10 = [];
		$arrayObject9 = [];
		$arrayObject8 = [];
		$arrayObject7 = [];
		$arrayObject6 = [];
		$arrayObject5 = [];
		$arrayObject4 = [];
		$arrayObject3 = [];
		$arrayObject2 = [];
		$arrayObject1 = [];
		for ($i=12; $i >0; $i--) 
		{
			$dateSelect = date("Y-m", strtotime( date( 'Y-m-01' )." -$i months"));		
			if($i==12)
			{
				$dataArr1 = array();
				$recs = $CI->db->query("SELECT * FROM tbl_advisor_user_funds WHERE client_id IN($connectedUserIds) AND STR_TO_DATE('".$dateSelect."','%Y-%m') = STR_TO_DATE(created_on,'%Y-%m')")->result();
				//echo "<pre>";print_r($recs);
				$arr1 = array();
				$darr1 = array();
				$positiveChange = 0;
				$negativeChange = 0;
				$totalRowCount = 0;
				foreach($recs as $rec)
				{
					$excelrec = $this->funds_file_handling($rec->fund_id);
					foreach($excelrec as $ex)
					{

						$date = new DateTime($ex[0]);
						$startmonthdate =  $date->format('Y-m-d');
						if((date("Y-m",strtotime($ex[0]))==$dateSelect) && (strtotime($rec->created_on)<=strtotime($startmonthdate)) &&    ( strtotime($rec->updated_on)>=strtotime($startmonthdate)) )
						{
							$changes = trim($ex[5],"%");
							if($changes>0)
							{
								$positiveChange+=$changes;
							}
							if($changes<0)
							{
								$negativeChange+=$changes;
							}
							$totalRowCount++;
						}
						
					}
				}
				$dataArr1['total'] = $totalRowCount;
				$dataArr1['toatalProfitPercentage'] = $positiveChange;
				$dataArr1['toatalLossPercentage'] = $negativeChange;
				$dataArr1['monthlyLossProfit'] = number_format(($positiveChange+$negativeChange)/$totalRowCount,2,'.','');
				$dataArr1['month'] = $dateSelect;
				array_push($arrayObject12, $dataArr1);
				//echo "<pre>";print_r($arrayObject12);
				//die;
			}
			if($i==11)
			{
				$dataArr1 = array();
				$recs = $CI->db->query("SELECT * FROM tbl_advisor_user_funds WHERE client_id IN($connectedUserIds) AND STR_TO_DATE('".$dateSelect."','%Y-%m') = STR_TO_DATE(created_on,'%Y-%m')")->result();
				$arr1 = array();
				$darr1 = array();
				$positiveChange = 0;
				$negativeChange = 0;
				$totalRowCount = 0;
				foreach($recs as $rec)
				{
					$excelrec = $this->funds_file_handling($rec->fund_id);
					foreach($excelrec as $ex)
					{

						$date = new DateTime($ex[0]);
						$startmonthdate =  $date->format('Y-m-d');
						if((date("Y-m",strtotime($ex[0]))==$dateSelect) && (strtotime($rec->created_on)<=strtotime($startmonthdate)) &&    ( strtotime($rec->updated_on)>=strtotime($startmonthdate)) )
						{
							$changes = trim($ex[5],"%");
							if($changes>0)
							{
								$positiveChange+=$changes;
							}
							if($changes<0)
							{
								$negativeChange+=$changes;
							}
							$totalRowCount++;
						}
						
					}
				}
				$dataArr1['total'] = $totalRowCount;
				$dataArr1['toatalProfitPercentage'] = $positiveChange;
				$dataArr1['toatalLossPercentage'] = $negativeChange;
				$dataArr1['monthlyLossProfit'] = number_format(($positiveChange+$negativeChange)/$totalRowCount,2,'.','');
				$dataArr1['month'] = $dateSelect;
				array_push($arrayObject11, $dataArr1);
			}
			if($i==10)
			{
				$dataArr1 = array();
				$recs = $CI->db->query("SELECT * FROM tbl_advisor_user_funds WHERE client_id IN($connectedUserIds) AND STR_TO_DATE('".$dateSelect."','%Y-%m') = STR_TO_DATE(created_on,'%Y-%m')")->result();
				$arr1 = array();
				$darr1 = array();
				$positiveChange = 0;
				$negativeChange = 0;
				$totalRowCount = 0;
				foreach($recs as $rec)
				{
					$excelrec = $this->funds_file_handling($rec->fund_id);
					foreach($excelrec as $ex)
					{

						$date = new DateTime($ex[0]);
						$startmonthdate =  $date->format('Y-m-d');
						if((date("Y-m",strtotime($ex[0]))==$dateSelect) && (strtotime($rec->created_on)<=strtotime($startmonthdate)) &&    ( strtotime($rec->updated_on)>=strtotime($startmonthdate)) )
						{
							$changes = trim($ex[5],"%");
							if($changes>0)
							{
								$positiveChange+=$changes;
							}
							if($changes<0)
							{
								$negativeChange+=$changes;
							}
							$totalRowCount++;
						}
						
					}
				}
				$dataArr1['total'] = $totalRowCount;
				$dataArr1['toatalProfitPercentage'] = $positiveChange;
				$dataArr1['toatalLossPercentage'] = $negativeChange;
				$dataArr1['monthlyLossProfit'] = number_format(($positiveChange+$negativeChange)/$totalRowCount,2,'.','');
				$dataArr1['month'] = $dateSelect;
				array_push($arrayObject10, $dataArr1);
			}
			if($i==9)
			{
				$dataArr1 = array();
				$recs = $CI->db->query("SELECT * FROM tbl_advisor_user_funds WHERE client_id IN($connectedUserIds) AND STR_TO_DATE('".$dateSelect."','%Y-%m') = STR_TO_DATE(created_on,'%Y-%m')")->result();
				$arr1 = array();
				$darr1 = array();
				$positiveChange = 0;
				$negativeChange = 0;
				$totalRowCount = 0;
				foreach($recs as $rec)
				{
					$excelrec = $this->funds_file_handling($rec->fund_id);
					foreach($excelrec as $ex)
					{

						$date = new DateTime($ex[0]);
						$startmonthdate =  $date->format('Y-m-d');
						if((date("Y-m",strtotime($ex[0]))==$dateSelect) && (strtotime($rec->created_on)<=strtotime($startmonthdate)) &&    ( strtotime($rec->updated_on)>=strtotime($startmonthdate)) )
						{
							$changes = trim($ex[5],"%");
							if($changes>0)
							{
								$positiveChange+=$changes;
							}
							if($changes<0)
							{
								$negativeChange+=$changes;
							}
							$totalRowCount++;
						}
						
					}
				}
				$dataArr1['total'] = $totalRowCount;
				$dataArr1['toatalProfitPercentage'] = $positiveChange;
				$dataArr1['toatalLossPercentage'] = $negativeChange;
				$dataArr1['monthlyLossProfit'] = number_format(($positiveChange+$negativeChange)/$totalRowCount,2,'.','');
				$dataArr1['month'] = $dateSelect;
				array_push($arrayObject9, $dataArr1);
			}
			if($i==8)
			{
				$dataArr1 = array();
				$recs = $CI->db->query("SELECT * FROM tbl_advisor_user_funds WHERE client_id IN($connectedUserIds) AND STR_TO_DATE('".$dateSelect."','%Y-%m') = STR_TO_DATE(created_on,'%Y-%m')")->result();
				$arr1 = array();
				$darr1 = array();
				$positiveChange = 0;
				$negativeChange = 0;
				$totalRowCount = 0;
				foreach($recs as $rec)
				{
					$excelrec = $this->funds_file_handling($rec->fund_id);
					foreach($excelrec as $ex)
					{

						$date = new DateTime($ex[0]);
						$startmonthdate =  $date->format('Y-m-d');
						if((date("Y-m",strtotime($ex[0]))==$dateSelect) && (strtotime($rec->created_on)<=strtotime($startmonthdate)) &&    ( strtotime($rec->updated_on)>=strtotime($startmonthdate)) )
						{
							$changes = trim($ex[5],"%");
							if($changes>0)
							{
								$positiveChange+=$changes;
							}
							if($changes<0)
							{
								$negativeChange+=$changes;
							}
							$totalRowCount++;
						}
						
					}
				}
				$dataArr1['total'] = $totalRowCount;
				$dataArr1['toatalProfitPercentage'] = $positiveChange;
				$dataArr1['toatalLossPercentage'] = $negativeChange;
				$dataArr1['monthlyLossProfit'] = number_format(($positiveChange+$negativeChange)/$totalRowCount,2,'.','');
				$dataArr1['month'] = $dateSelect;
				array_push($arrayObject8, $dataArr1);
			}
			if($i==7)
			{
				$dataArr1 = array();
				$recs = $CI->db->query("SELECT * FROM tbl_advisor_user_funds WHERE client_id IN($connectedUserIds) AND STR_TO_DATE('".$dateSelect."','%Y-%m') = STR_TO_DATE(created_on,'%Y-%m')")->result();
				$arr1 = array();
				$darr1 = array();
				$positiveChange = 0;
				$negativeChange = 0;
				$totalRowCount = 0;
				foreach($recs as $rec)
				{
					$excelrec = $this->funds_file_handling($rec->fund_id);
					foreach($excelrec as $ex)
					{

						$date = new DateTime($ex[0]);
						$startmonthdate =  $date->format('Y-m-d');
						if((date("Y-m",strtotime($ex[0]))==$dateSelect) && (strtotime($rec->created_on)<=strtotime($startmonthdate)) &&    ( strtotime($rec->updated_on)>=strtotime($startmonthdate)) )
						{
							$changes = trim($ex[5],"%");
							if($changes>0)
							{
								$positiveChange+=$changes;
							}
							if($changes<0)
							{
								$negativeChange+=$changes;
							}
							$totalRowCount++;
						}
						
					}
				}
				$dataArr1['total'] = $totalRowCount;
				$dataArr1['toatalProfitPercentage'] = $positiveChange;
				$dataArr1['toatalLossPercentage'] = $negativeChange;
				$dataArr1['monthlyLossProfit'] = number_format(($positiveChange+$negativeChange)/$totalRowCount,2,'.','');
				$dataArr1['month'] = $dateSelect;
				array_push($arrayObject7, $dataArr1);
			}
			if($i==6)
			{
				$dataArr1 = array();
				$recs = $CI->db->query("SELECT * FROM tbl_advisor_user_funds WHERE client_id IN($connectedUserIds) AND STR_TO_DATE('".$dateSelect."','%Y-%m') = STR_TO_DATE(created_on,'%Y-%m')")->result();
				$arr1 = array();
				$darr1 = array();
				$positiveChange = 0;
				$negativeChange = 0;
				$totalRowCount = 0;
				foreach($recs as $rec)
				{
					$excelrec = $this->funds_file_handling($rec->fund_id);
					foreach($excelrec as $ex)
					{

						$date = new DateTime($ex[0]);
						$startmonthdate =  $date->format('Y-m-d');
						if((date("Y-m",strtotime($ex[0]))==$dateSelect) && (strtotime($rec->created_on)<=strtotime($startmonthdate)) &&    ( strtotime($rec->updated_on)>=strtotime($startmonthdate)) )
						{
							$changes = trim($ex[5],"%");
							if($changes>0)
							{
								$positiveChange+=$changes;
							}
							if($changes<0)
							{
								$negativeChange+=$changes;
							}
							$totalRowCount++;
						}
						
					}
				}
				$dataArr1['total'] = $totalRowCount;
				$dataArr1['toatalProfitPercentage'] = $positiveChange;
				$dataArr1['toatalLossPercentage'] = $negativeChange;
				$dataArr1['monthlyLossProfit'] = number_format(($positiveChange+$negativeChange)/$totalRowCount,2,'.','');
				$dataArr1['month'] = $dateSelect;
				array_push($arrayObject6, $dataArr1);
			}
			if($i==5)
			{
				$dataArr1 = array();
				$recs = $CI->db->query("SELECT * FROM tbl_advisor_user_funds WHERE client_id IN($connectedUserIds) AND STR_TO_DATE('".$dateSelect."','%Y-%m') = STR_TO_DATE(created_on,'%Y-%m')")->result();
				$arr1 = array();
				$darr1 = array();
				$positiveChange = 0;
				$negativeChange = 0;
				$totalRowCount = 0;
				foreach($recs as $rec)
				{
					$excelrec = $this->funds_file_handling($rec->fund_id);
					foreach($excelrec as $ex)
					{

						$date = new DateTime($ex[0]);
						$startmonthdate =  $date->format('Y-m-d');
						if((date("Y-m",strtotime($ex[0]))==$dateSelect) && (strtotime($rec->created_on)<=strtotime($startmonthdate)) &&    ( strtotime($rec->updated_on)>=strtotime($startmonthdate)) )
						{
							$changes = trim($ex[5],"%");
							if($changes>0)
							{
								$positiveChange+=$changes;
							}
							if($changes<0)
							{
								$negativeChange+=$changes;
							}
							$totalRowCount++;
						}
						
					}
				}
				$dataArr1['total'] = $totalRowCount;
				$dataArr1['toatalProfitPercentage'] = $positiveChange;
				$dataArr1['toatalLossPercentage'] = $negativeChange;
				$dataArr1['monthlyLossProfit'] = number_format(($positiveChange+$negativeChange)/$totalRowCount,2,'.','');
				$dataArr1['month'] = $dateSelect;
				array_push($arrayObject5, $dataArr1);
			}
			if($i==4)
			{
				$dataArr1 = array();
				$recs = $CI->db->query("SELECT * FROM tbl_advisor_user_funds WHERE client_id IN($connectedUserIds) AND STR_TO_DATE('".$dateSelect."','%Y-%m') = STR_TO_DATE(created_on,'%Y-%m')")->result();
				$arr1 = array();
				$darr1 = array();
				$positiveChange = 0;
				$negativeChange = 0;
				$totalRowCount = 0;
				foreach($recs as $rec)
				{
					$excelrec = $this->funds_file_handling($rec->fund_id);
					foreach($excelrec as $ex)
					{

						$date = new DateTime($ex[0]);
						$startmonthdate =  $date->format('Y-m-d');
						if((date("Y-m",strtotime($ex[0]))==$dateSelect) && (strtotime($rec->created_on)<=strtotime($startmonthdate)) &&    ( strtotime($rec->updated_on)>=strtotime($startmonthdate)) )
						{
							$changes = trim($ex[5],"%");
							if($changes>0)
							{
								$positiveChange+=$changes;
							}
							if($changes<0)
							{
								$negativeChange+=$changes;
							}
							$totalRowCount++;
						}
						
					}
				}
				$dataArr1['total'] = $totalRowCount;
				$dataArr1['toatalProfitPercentage'] = $positiveChange;
				$dataArr1['toatalLossPercentage'] = $negativeChange;
				$dataArr1['monthlyLossProfit'] = number_format(($positiveChange+$negativeChange)/$totalRowCount,2,'.','');
				$dataArr1['month'] = $dateSelect;
				array_push($arrayObject4, $dataArr1);
			}
			if($i==3)
			{
				$dataArr1 = array();
				$recs = $CI->db->query("SELECT * FROM tbl_advisor_user_funds WHERE client_id IN($connectedUserIds) AND STR_TO_DATE('".$dateSelect."','%Y-%m') = STR_TO_DATE(created_on,'%Y-%m')")->result();
				$arr1 = array();
				$darr1 = array();
				$positiveChange = 0;
				$negativeChange = 0;
				$totalRowCount = 0;
				foreach($recs as $rec)
				{
					$excelrec = $this->funds_file_handling($rec->fund_id);
					foreach($excelrec as $ex)
					{

						$date = new DateTime($ex[0]);
						$startmonthdate =  $date->format('Y-m-d');
						if((date("Y-m",strtotime($ex[0]))==$dateSelect) && (strtotime($rec->created_on)<=strtotime($startmonthdate)) &&    ( strtotime($rec->updated_on)>=strtotime($startmonthdate)) )
						{
							$changes = trim($ex[5],"%");
							if($changes>0)
							{
								$positiveChange+=$changes;
							}
							if($changes<0)
							{
								$negativeChange+=$changes;
							}
							$totalRowCount++;
						}
						
					}
				}
				$dataArr1['total'] = $totalRowCount;
				$dataArr1['toatalProfitPercentage'] = $positiveChange;
				$dataArr1['toatalLossPercentage'] = $negativeChange;
				$dataArr1['monthlyLossProfit'] = number_format(($positiveChange+$negativeChange)/$totalRowCount,2,'.','');
				$dataArr1['month'] = $dateSelect;
				array_push($arrayObject3, $dataArr1);
			}
			if($i==2)
			{
				$dataArr1 = array();
				$recs = $CI->db->query("SELECT * FROM tbl_advisor_user_funds WHERE client_id IN($connectedUserIds) AND STR_TO_DATE('".$dateSelect."','%Y-%m') = STR_TO_DATE(created_on,'%Y-%m')")->result();
				$arr1 = array();
				$darr1 = array();
				$positiveChange = 0;
				$negativeChange = 0;
				$totalRowCount = 0;
				foreach($recs as $rec)
				{
					$excelrec = $this->funds_file_handling($rec->fund_id);
					foreach($excelrec as $ex)
					{

						$date = new DateTime($ex[0]);
						$startmonthdate =  $date->format('Y-m-d');
						if((date("Y-m",strtotime($ex[0]))==$dateSelect) && (strtotime($rec->created_on)<=strtotime($startmonthdate)) &&    ( strtotime($rec->updated_on)>=strtotime($startmonthdate)) )
						{
							$changes = trim($ex[5],"%");
							if($changes>0)
							{
								$positiveChange+=$changes;
							}
							if($changes<0)
							{
								$negativeChange+=$changes;
							}
							$totalRowCount++;
						}
						
					}
				}
				$dataArr1['total'] = $totalRowCount;
				$dataArr1['toatalProfitPercentage'] = $positiveChange;
				$dataArr1['toatalLossPercentage'] = $negativeChange;
				$dataArr1['monthlyLossProfit'] = number_format(($positiveChange+$negativeChange)/$totalRowCount,2,'.','');
				$dataArr1['month'] = $dateSelect;
				array_push($arrayObject2, $dataArr1);
			}
			if($i==1)
			{
				$dataArr1 = array();
				$recs = $CI->db->query("SELECT * FROM tbl_advisor_user_funds WHERE client_id IN($connectedUserIds) AND STR_TO_DATE('".$dateSelect."','%Y-%m') = STR_TO_DATE(created_on,'%Y-%m')")->result();
				$arr1 = array();
				$darr1 = array();
				$positiveChange = 0;
				$negativeChange = 0;
				$totalRowCount = 0;
				foreach($recs as $rec)
				{
					$excelrec = $this->funds_file_handling($rec->fund_id);
					foreach($excelrec as $ex)
					{

						$date = new DateTime($ex[0]);
						$startmonthdate =  $date->format('Y-m-d');
						if((date("Y-m",strtotime($ex[0]))==$dateSelect) && (strtotime($rec->created_on)<=strtotime($startmonthdate)) &&    ( strtotime($rec->updated_on)>=strtotime($startmonthdate)) )
						{
							$changes = trim($ex[5],"%");
							if($changes>0)
							{
								$positiveChange+=$changes;
							}
							if($changes<0)
							{
								$negativeChange+=$changes;
							}
							$totalRowCount++;
						}
						
					}
				}
				$dataArr1['total'] = $totalRowCount;
				$dataArr1['toatalProfitPercentage'] = $positiveChange;
				$dataArr1['toatalLossPercentage'] = $negativeChange;
				$dataArr1['monthlyLossProfit'] = number_format(($positiveChange+$negativeChange)/$totalRowCount,2,'.','');
				$dataArr1['month'] = $dateSelect;
				array_push($arrayObject1, $dataArr1);
			}
			
		}
		$new_array2 = array_merge($arrayObject12,$arrayObject11,$arrayObject10,$arrayObject9,$arrayObject8,$arrayObject7,$arrayObject6,$arrayObject5,$arrayObject4,$arrayObject3,$arrayObject2,$arrayObject1);
		//echo "<pre>";print_r($new_array2);die();
		return $new_array2;
	}
	function getUserFinancialTargetGoal($user_id)
	{
		error_reporting(0);
		$CI =& get_instance();
		//echo "<pre>";print_r($totalDiaryProfit);die;
        $get_income_expense = $CI->db->query("SELECT a.options AS optionvalue,b.id AS option_id,a.value, a.question_id,b.options FROM user_question_options a LEFT JOIN tbl_question_options b ON a.options=b.id WHERE a.question_id=35 AND a.user_id='".$user_id."'")->result();

		$total_monthly_income = 0;
		$total_monthly_expenses = 0;
		$capital_investing = 0;
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
			if($bal->option_id==217)
			{
				$capital_investing = $bal->value;
			}
		}
		$profitabilityQuery = $CI->db->query("SELECT a.options AS optionvalue,b.id AS option_id,a.value, a.question_id,b.options FROM user_question_options a LEFT JOIN tbl_question_options b ON a.options=b.id WHERE a.question_id=43 AND a.user_id='".$user_id."'");
		$profitabil = 0;
		if($profitabilityQuery->num_rows()>0)
		{
			$profitability = $profitabilityQuery->row();
			//echo "<pre>";print_r($profitability);
			if($profitability->option_id==218)
			{
				$getSubscription = $CI->db->query("SELECT plan_id FROM tbl_user_subscription_plan WHERE user_id='".$user_id."'")->row();
				$maximumProf = $CI->db->query("SELECT percentage FROM set_user_maximum_profitability")->result();
				if($getSubscription->plan_id==2)
				{
					$profitabil = $maximumProf[0]->percentage;
				}
				else if($getSubscription->plan_id==3)
				{
					$profitabil = $maximumProf[1]->percentage;
				}
				else if($getSubscription->plan_id==4)
				{
					$profitabil = $maximumProf[2]->percentage;
				}
				else
				{
					$profitabil = 5;
				}
				//echo "<pre>";print_r($maximumProf[0]->percentage);
				//$profitabil = 10;
			}
			if($profitability->option_id==219)
			{
				$profitabil = 6;
			}
			if($profitability->option_id==220)
			{
				$profitabil = 4;
			}
			if($profitability->option_id==221)
			{
				$profitabil = 2;
			}
			if($profitability->option_id==222)
			{
				$profitabil = 1;
			}
		}
		else
		{
			$profitabil = 6;
		}

		$financeData = array();
        $financeArr = array();
        $LtmpArr = array();
        $LtmpArr2 = array();
        $LtmpArr3 = array();
        $getfinancialChartData = $CI->db->query("select *, CAST(`updated_on` as DATE) AS datewise from tbl_users_trading_diary WHERE final_volume>0 AND user_id='".$user_id."' ORDER BY updated_on DESC")->result(); 
        //echo "<pre>";print_r($getfinancialChartData);die;
        foreach($getfinancialChartData as $finance)
        {
        	$financeData['dates'] = $finance->datewise;
        	$financeData['pro_loss'] = ($finance->price_out*$finance->final_volume-$finance->price_in*$finance->final_volume);

        	if(!in_array($finance->datewise,$LtmpArr))
            {
            	 $LtmpArr[]=$finance->datewise;
            	 $LtmpArr2[]=$financeData['pro_loss'];
            	 $LtmpArr3[]=1;
            	array_push($financeArr, $financeData);
            }
            else
            {
            	 $key = array_search(strtolower(trim($finance->datewise)),array_values($LtmpArr));

            	 $LtmpArr2[$key]+=$financeData['pro_loss'];

            	 $LtmpArr3[$key]+=1;
            }
        }
        $totalChartAccoutPrice = 0;
        foreach ($LtmpArr as $key => $vl) 
		{
			$cal=($LtmpArr2[$key]);
			$financeArr[$key]['pro_loss']=number_format($cal,2,".","");
			$totalChartAccoutPrice+=$cal;
		}
		$allDateArr[0] = 0;
        $profitLoss[0] = 0;
        $c = 0;
        $totalDiaryProfit = 0;

        // -------------------------
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
		//echo $risk;die;
        //--------------------------

        $investedAmount = $risk;
        $actual_investedAmount = $risk;

        
		foreach(array_reverse($financeArr) as $proloss)
		{
			$investedAmount = $investedAmount+$proloss['pro_loss'];
			if($investedAmount>=$actual_investedAmount)
			{
				$actualProfitLoss = $investedAmount-$actual_investedAmount;
			}
			else
			{
				$actualProfitLoss = -($actual_investedAmount-$investedAmount);
			}
			$profitlosspercentage = ($actualProfitLoss*100)/$actual_investedAmount;
			$allDateArr[$c] = '"'.date('M d,Y', strtotime($proloss['dates'])).'"';
			$profitLoss[$c] = number_format($profitlosspercentage,2,".","");

			$totalDiaryProfit = $totalDiaryProfit+$proloss['pro_loss'];
			$c++;
		}
		$records = array(
						'allDateArr'=>$allDateArr,
						'profitLoss'=>$profitLoss,
						'goalPercentage'=>number_format(0,2,'.',''),
						'profitTarget'=>$profitabil,
						);
		//echo "<pre>";print_r($profitabil);die;
		return $records;
	}
	function topTenCompanies($user_id)
	{
		error_reporting(0);
		$CI =& get_instance();
        //$topTenCompany = $CI->db->query("SELECT COUNT(a.product) AS ProCount ,a.id,a.product,a.created_on,b.stock_name FROM `tbl_users_trading_diary` a INNER JOIN tbl_admin_stock b ON a.product=b.id where a.`created_on` >= DATE_SUB(CURDATE(), INTERVAL 15 DAY) AND a.user_id='".$user_id."' AND a.final_volume>0 GROUP BY product ORDER BY COUNT(a.product) DESC LIMIT 10 ")->result();
        $topTenCompany = $CI->db->query("SELECT COUNT(a.product) AS ProCount ,a.id,a.product,a.created_on,b.stock_name FROM `tbl_users_trading_diary` a INNER JOIN tbl_admin_stock b ON a.product=b.id where a.`created_on` >= DATE_SUB(CURDATE(), INTERVAL 15 DAY)  AND a.final_volume>0 GROUP BY product ORDER BY COUNT(a.product) DESC LIMIT 10 ")->result();
        $company_data = array();
        $company_record_array = array();      
        foreach($topTenCompany as $company)
        {
            $percenatge = 0;
            $count = 0;
            $l_count = 0;
            $p_count = 0;
            $l_sum = 0;
            $p_sum = 0;
            $total_average_profit = 0;
            $total_average_loss = 0;
            $average_profit_percentage = 0;
            $total_average = 0;
            //
            $totalLossProfitCount = 0;
            $totalSumProfitLoss = 0;
            $totalAverageProfitLoss = 0;
            $percentageOftotalAverageProfitLoss = 0;
            //
            $company_data['company_id'] = $company->product;
            $company_data['company'] = $company->stock_name;
            //$cms = $CI->db->query("SELECT price_in,price_out,volume,final_volume FROM tbl_users_trading_diary where product='".$company->product."' AND  `created_on` >= DATE_SUB(CURDATE(), INTERVAL 15 DAY) AND user_id='".$user_id."' AND final_volume>0 ")->result();
            $cms = $CI->db->query("SELECT price_in,price_out,volume,final_volume FROM tbl_users_trading_diary where product='".$company->product."' AND  `created_on` >= DATE_SUB(CURDATE(), INTERVAL 15 DAY)  AND final_volume>0 ")->result();
            foreach($cms as $cm)
            {

                if(($cm->price_out*$cm->final_volume)>$cm->price_in*$cm->final_volume)
                {
                    $p_sum = $p_sum+(($cm->price_out*$cm->final_volume)-($cm->price_in*$cm->final_volume));
                    $p_count++;
                }
                else
                {
                    $l_sum = $l_sum+(($cm->price_in*$cm->final_volume)-($cm->price_out*$cm->final_volume));
                    $l_count++;
                }
            }
            $totalSumProfitLoss = $p_sum-$l_sum;
            $totalLossProfitCount = $p_count+$l_count;
            if($totalLossProfitCount>0)
            {
            	$totalAverageProfitLoss = $totalSumProfitLoss/$totalLossProfitCount;
            	$percentageOftotalAverageProfitLoss = ($totalSumProfitLoss/($p_sum+$l_sum))*100;
            }
            $company_data['total_average_profit'] = round($totalAverageProfitLoss);
            $company_data['profit_percentage'] = round($percentageOftotalAverageProfitLoss);


            /*if($p_count==0)
            {
                $company_data['total_average_profit'] = round($p_sum);
            }
            else if($p_sum==0)
            {
               $company_data['total_average_profit'] = 0;
            }
            else
            {
               $company_data['total_average_profit'] = round($p_sum/$p_count); 
            }
            $total_average = $p_sum+$l_sum;
            if($total_average>0)
            {
            	$average_profit_percentage = ($p_sum/$total_average)*100;
            }
            else
            {
            	$average_profit_percentage = ($p_sum/1)*100;
            }
            $company_data['profit_percentage'] =  round($average_profit_percentage);*/
            $company_data['days'] = 15;
            array_push($company_record_array, $company_data);
            

        }
        //echo "<pre>";print_r($company_record_array);die;
        return  $company_record_array;
	}
	function sortTopTenCompanypercentage($a, $b)
    {
        if ($a["profit_percentage"] == $b["profit_percentage"]) 
        {  
            return 0;
        }
        return ($a["profit_percentage"] > $b["profit_percentage"]) ? -1 : 1; 
    }
	function getUserTopTenStrategies($user_id)
	{
		//top ten strategies calculation
		error_reporting(0);
		$CI =& get_instance();
        $strategy_data = array();
        $strategy_record_array = array();
        //$topTenStrategies = $CI->db->query("SELECT a.id,COUNT(a.startegy) AS stategyCount,a.created_on,b.id AS strategyId,b.strategy AS strategyName FROM tbl_users_trading_diary a INNER JOIN tbl_admin_strategies b ON a.startegy=b.id where a.`created_on` >= DATE_SUB(CURDATE(), INTERVAL 15 DAY) AND a.user_id='".$user_id."' AND a.final_volume>0 GROUP BY a.startegy ORDER BY COUNT(a.startegy) DESC")->result();
        $topTenStrategies = $CI->db->query("SELECT a.id,COUNT(a.startegy) AS stategyCount,a.created_on,b.id AS strategyId,b.strategy AS strategyName FROM tbl_users_trading_diary a INNER JOIN tbl_admin_strategies b ON a.startegy=b.id where a.`created_on` >= DATE_SUB(CURDATE(), INTERVAL 15 DAY) AND a.final_volume>0 GROUP BY a.startegy ORDER BY COUNT(a.startegy) DESC")->result();

        foreach($topTenStrategies as $strategies)
        {
            $l_count_strategy = 0;
            $p_count_strategy = 0;
            $l_sum_strategy = 0;
            $p_sum_strategy = 0;
            $total_average_profit_strategy = 0;
            $total_average_loss_strategy = 0;
            $average_profit_percentage_strategy = 0;
            $total_average_strategy = 0;
            $totalLossProfitCount = 0;
            $totalSumProfitLoss = 0;
            $totalAverageProfitLoss = 0;
            $percentageOftotalAverageProfitLoss = 0;
            $strategy_data['strategy_id'] = $strategies->strategyId;
            $strategy_data['strategy'] = $strategies->strategyName;
           // $get_strategies = $CI->db->query("SELECT price_in,price_out,volume,final_volume FROM tbl_users_trading_diary where startegy='".$strategies->strategyId."' AND  `created_on` >= DATE_SUB(CURDATE(), INTERVAL 15 DAY) AND user_id='".$user_id."' AND final_volume>0")->result();
            $get_strategies = $CI->db->query("SELECT price_in,price_out,volume,final_volume FROM tbl_users_trading_diary where startegy='".$strategies->strategyId."' AND  `created_on` >= DATE_SUB(CURDATE(), INTERVAL 15 DAY)  AND final_volume>0")->result();
           // echo "<pre>";print_r($get_strategies);
            foreach($get_strategies as $str)
            {
                if(($str->price_out*$str->final_volume)>($str->price_in*$str->final_volume))
                {
                    $p_sum_strategy = $p_sum_strategy+($str->price_out*$str->final_volume-$str->price_in*$str->final_volume);
                    $p_count_strategy++;
                }
                else
                {
                    $l_sum_strategy = $l_sum_strategy+($str->price_in*$str->final_volume-$str->price_out*$str->final_volume);
                    $l_count_strategy++;
                }
            }
            $totalSumProfitLoss = $p_sum_strategy-$l_sum_strategy;
            $totalLossProfitCount = $p_count_strategy+$l_count_strategy;
            if($totalLossProfitCount>0)
            {
            	$totalAverageProfitLoss = $totalSumProfitLoss/$totalLossProfitCount;
            	$percentageOftotalAverageProfitLoss = ($totalSumProfitLoss/($p_sum_strategy+$l_sum_strategy))*100;
            }
            $strategy_data['total_average_profit'] = round($totalAverageProfitLoss);
            $strategy_data['profit_percentage'] = round($percentageOftotalAverageProfitLoss);
            /*if($p_count_strategy==0)
            {
                $strategy_data['total_average_profit'] = round($p_sum_strategy);
            }
            else if($p_sum_strategy==0)
            {
               $strategy_data['total_average_profit'] = 0;
            }
            else
            {
               $strategy_data['total_average_profit'] = round($p_sum_strategy/$p_count_strategy); 
            }
            $total_average_strategy = $p_sum_strategy+$l_sum_strategy;
            if($total_average_strategy>0)
            {
            	$average_profit_percentage_strategy = ($p_sum_strategy/$total_average_strategy)*100;	
            }
            else
            {
            	$average_profit_percentage_strategy = 0;
            }
            $strategy_data['profit_percentage'] =  round($average_profit_percentage_strategy);*/
            $strategy_data['days'] = 15;
            array_push($strategy_record_array, $strategy_data);
        }
        //echo "<pre>";print_r($strategy_record_array);
       // die;
        return $strategy_record_array;
	}

}