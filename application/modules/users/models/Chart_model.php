<?php
class Chart_model extends CI_Model 
{
	function removeElementWithValue($array){
     foreach($array as $subKey => $subArray){
          if(!is_numeric(str_replace(',','',$subArray[1]))){
               unset($array[$subKey]);
          }
	     }
	     return $array;
	}
	function file_handling($actual_stock_id,$type=0)
	{
		if($type==0)
		{
			$getFile = $this->db->query("SELECT stock_file FROM tbl_admin_stock WHERE id='".$actual_stock_id."'")->row()->stock_file;
		}
		else
		{
			$getFile = $this->db->query("SELECT investment_file FROM tbl_admin_investments WHERE investments_id='".$actual_stock_id."'")->row()->investment_file;	
		}
		//echo "<pre>";print_r($getFile);die();
		if($getFile!=NULL OR $getFile!="")
		{
			$the_big_array = [];
			if($type==0)
			{
				$handle = fopen('uploads/stock/'.$getFile, 'r');
			}
			else
			{
				$handle = fopen('uploads/investments/'.$getFile, 'r');	
			}
			
			$c = 0;//
			while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
			{
				
				if($c!=0)
				{		
					$the_big_array[] = $filesop;
				}
				$c++;
			}
			return $this->removeElementWithValue($the_big_array);
			//return $the_big_array;
		}
		else
		{
			return 'no data available';
		}
		
	}
	function funds_file_handling($actual_fund_id)
	{
		$getFile = $this->db->query("SELECT investment_file FROM tbl_admin_investments WHERE investments_id='".$actual_fund_id."'")->row()->investment_file;
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
	function get_simple_average($the_big_array,$c,$period)
	{
		$count=1;
		$sum = 0;
		foreach($the_big_array as $key=> $val)
		{
			$price = str_replace(",","",$val[1]);
			if($key>=$c)
			{
				if($count<=$period)
				{
					$sum = $sum+$price;
				}

				$count++;
		   }
		   if($count==$period+1)
			{
				break;
			}
			
		}
		return $sum/$period;
	}
	function get_median_average($the_big_array,$c,$period)
	{
		$count=1;
		
		$sum  = array();
		$m = 0;
		$group = array();
		foreach($the_big_array as $key=> $val)
		{
			$price = str_replace(",","",$val[1]);
			if($key>=$c)
			{
				
				if($count<=$period)
				{
					$group[] = $price;
				}

				$count++;
		   }
		   if($count==$period+1)
			{
				break;
			}
			
		}
		return $this->median($group);
	}
	function get_standard_deviation($the_big_array,$c,$period)
	{
		$count=1;
		$group = array();
		foreach($the_big_array as $key=> $val)
		{
			$price = str_replace(",","",$val[1]);
			if($key>=$c)
			{
				
				if($count<=$period)
				{
					$group[] = $price;
				}

				$count++;
		   }
		   if($count==$period+1)
			{
				break;
			}
			
		}
		return $this->stats_standard_deviation($group,1);
	}
	function calculate_exponential_median_average($yesterday_ema,$price,$period)
	{
		$ema = 0;
		//$ema = $yesterday_ema +($price-$yesterday_ema)*(2/($period+1));
		$ema = $yesterday_ema +(($price-$yesterday_ema)*(2/($period + 1)));
		return $ema;
	}
	function standard_deviation($aValues, $bSample = false)
	{
	    $fMean = array_sum($aValues) / count($aValues);
	    $fVariance = 0.0;
	    foreach ($aValues as $i)
	    {
	        $fVariance += pow($i - $fMean, 2);
	    }
	    $fVariance /= ( $bSample ? count($aValues) - 1 : count($aValues) );
	    return (float) sqrt($fVariance);
	}
	function stats_standard_deviation(array $a, $sample = false) 
	{
        $n = count($a);
        if ($n === 0) {
            trigger_error("The array has zero elements", E_USER_WARNING);
            return false;
        }
        if ($sample && $n === 1) {
            trigger_error("The array has only 1 element", E_USER_WARNING);
            return false;
        }
        $mean = array_sum($a) / $n;
        $carry = 0.0;
        foreach ($a as $val) {
            $d = ((double) $val) - $mean;
            $carry += $d * $d;
        };
        if ($sample) {
           --$n;
        }
        return sqrt($carry / $n);
    }
    function calculate_median($arr) 
    {
	    $count = count($arr); //total numbers in array
	    $middleval = floor(($count-1)/2); // find the middle value, or the lowest middle value
	    if($count % 2==1) 
	    { 
	    	// odd number, middle is the median
	        $median = $arr[$middleval];
	    } 
	    else 
	    { 
	    	// even number, calculate avg of 2 medians
	        $low = $arr[$middleval];
	        $high = $arr[$middleval+1];
	        $median = (($low+$high)/2);
	    }
	    return $median;
	}
	function median($arr)
	{
	    if($arr)
	    {
	        $count = count($arr);
	        sort($arr);
	        $mid = floor(($count-1)/2);
	        return ($arr[$mid]+$arr[$mid+1-$count%2])/2;
	    }
    	return 0;
	}
	function calculate_average($arr) 
	{
    	return array_sum($arr) / count($arr);
	}

	function emaExponentialMedianAverage($the_big_array,$period)
	{
		$cc = 1;
		$ema = array();
		$last_ema = 0;
		foreach($the_big_array as $value)
		{	
			$price = str_replace(",","",$value[1]);
			if($cc==1)
			{
				$last_ema = $this->calculate_exponential_median_average($price,$price,$period);
				$ema[] = number_format($this->calculate_exponential_median_average($price,$price,$period),2,".","");

			}
			else
			{
				$ema[] = number_format($this->calculate_exponential_median_average($last_ema,$price,$period),2,".","");
				$last_ema = $this->calculate_exponential_median_average($last_ema,$price,$period);

				// echo"<br>-".$last_ema."-<br>".number_format($this->calculate_exponential_median_average($last_ema,$value[1],10),2,".","");
				// die;
				
				
			}

			$cc++;
			

		}
		return $ema;
	}

	function setPercentile($array, $percentile)
	{
	    $percentile = min(100, max(0, $percentile));
	    $array = array_values($array);
	    sort($array);
	    $index = ($percentile / 100) * (count($array) - 1);
	    $fractionPart = $index - floor($index);
	    $intPart = floor($index);

	    $percentile = $array[$intPart];
	    $percentile += ($fractionPart > 0) ? $fractionPart * ($array[$intPart + 1] - $array[$intPart]) : 0;

	    return $percentile;
	}

	function get_percentile($the_big_array,$c,$period,$percentile)
	{
		$count=1;
		
		$sum  = array();
		$m = 0;
		$group = array();
		foreach($the_big_array as $key=> $val)
		{
			$price = str_replace(",","",$val[1]);
			if($key>=$c)
			{
				
				if($count<=$period)
				{
					$group[] = $price;
				}

				$count++;
		   }
		   if($count==$period+1)
			{
				break;
			}
			
		}
		//return $group;
		return $this->setPercentile($group,$percentile);
	}
	function apiLinkData($link)
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://apidojo-yahoo-finance-v1.p.rapidapi.com/stock/v2/".$link,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"x-rapidapi-host: apidojo-yahoo-finance-v1.p.rapidapi.com",
				"x-rapidapi-key: db174adc90msh5e73db9a782dd5dp1c07c9jsn921e4e3589a2"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) 
		{
			return "cURL Error #:" . $err;
		} 
		else 
		{
			return $response;
		}
	}
	/*
		***************************************************************************************
			Seasional Analysis Calculation
		***************************************************************************************
	
	*/
	function printSeasionalAnalysisdate($date1, $date2, $format = 'd-M') 
	{
	      $dates = array();
	      $current = strtotime($date1);
	      $date2 = strtotime($date2);
	      $stepVal = '+1 day';
	      while( $current <= $date2 ) 
	      {
	         $dates[] = date($format, $current);
	         $current = strtotime($stepVal, $current);
	      }
	      return $dates;
	}
	function getSeasionalAnalysisdate($date1, $date2, $format = 'd-M-Y') 
	{
	      $dates = array();
	      $current = strtotime($date1);
	      $date2 = strtotime($date2);
	      $stepVal = '+1 day';
	      while( $current <= $date2 ) 
	      {
	         $dates[] = date($format, $current);
	         $current = strtotime($stepVal, $current);
	      }
	      return $dates;
	}

	function getSeasionalAllRecord($actual_stock_id)
	{
		$getFile = $this->db->query("SELECT stock_file FROM tbl_admin_stock WHERE id='".$actual_stock_id."'")->row()->stock_file;

		$the_big_array = array();
		$dataArr = array();
		$handle = fopen('uploads/stock/'.$getFile, 'r');
		//$handle = fopen('uploads/stock/REPYY Historical Data (1).csv', 'r');
		$c = 0;//
		$currentYear = date('Y');
		while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
		{
			if($c!=0)
			{
				if(substr($filesop[0],-4)==$currentYear)
				{
					continue;
				}
				$dataArr['actual_date'] = $filesop[0];
				$dataArr['converted_date'] = strtotime($filesop[0]);
				$dataArr['search_date']  = date("d-m",strtotime($filesop[0]));
				$dataArr['search_date_all']  = date("d-m-Y",strtotime($filesop[0]));
				$dataArr['price'] = $filesop[1];
				$dataArr['open'] = $filesop[2];
				$dataArr['high'] = $filesop[3];
				$dataArr['low'] = $filesop[4];
				$dataArr['volume'] = $filesop[5];
				$dataArr['actual_change'] = $filesop[6];
				$dataArr['converted_change'] = trim($filesop[6],'%');
				$dataArr['year'] = date("Y",strtotime($filesop[0]));
				array_push($the_big_array, $dataArr);

			}
			
			$c++;
		}
		return $this->removeElementWithValue1($the_big_array);
	}

	function removeElementWithValue1($array){
     foreach($array as $subKey => $subArray){
          if(!is_numeric(str_replace(',','',$subArray['price']))){
               unset($array[$subKey]);
          }
	     }
	     return $array;
	}
}