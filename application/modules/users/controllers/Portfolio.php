<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Portfolio extends CI_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('common');
		$this->load->library('pagination');
		$this->load->model('chart_model');
	}
	function showSeasonalAnalysisGraphMobile()
	{
		error_reporting(0);
		$user_id = $this->input->get('user_id');
		$stock_id = $this->input->get('stock_id');
		$actual_stock_id = $this->input->get('stock_ref_id');
		if($user_id=="" && $user_id==null)
		{
			echo "Please provide User Id";
			return false;
		}
		if($stock_id=="" && $stock_id==null)
		{
			echo "Please provide Stock Id";
			return false;
		}
		if($actual_stock_id=="" && $actual_stock_id==null)
		{
			echo "Please provide Stock Reference Id";
			return false;
		}
		//echo $actual_stock_id;die();
		/*
		***************************************************************************************
			Seasional Analysis Calculation
		***************************************************************************************
		*/
		//new code from 16 June 2021
		$the_big_array = $this->chart_model->getSeasionalAllRecord($actual_stock_id);
		//$the_big_array = array_reverse($the_big_array);
		//echo "<pre>";print_r($the_big_array);die;
		$dateRange = $this->chart_model->printSeasionalAnalysisdate(date('Y').'-01-01', date('Y').'-12-31','d-m');
		//echo "<pre>";print_r($dateRange);die;
		foreach($this->chart_model->printSeasionalAnalysisdate(date('Y').'-03-16', date('Y').'-04-03','d-M') as $xl)
		{
			$xdata[] = "'".$xl."'";
		}
		/*Last 10 Years*/
		$last10YearsStartYear = date("Y",strtotime($the_big_array[0]['actual_date']."-11 year"));
		$last10YearsEndYear =  $the_big_array[0]['year'];
		//echo $last10YearsStartYear."--".$last10YearsEndYear."<br>";
		//die;
		/*Last 20 Years*/
		$Last20YearsStartYear =  date("Y",strtotime($the_big_array[0]['actual_date']."-21 year"));
		$last20YearsEndYear =  $the_big_array[0]['year'];
		/*previous 10 Years*/
		$before10YearsStartYear = $Last20YearsStartYear+1;
		$before10YearsEndYear = $last10YearsStartYear+1;

		$data['media_last10years'] = ($last10YearsStartYear+2)."-".$last10YearsEndYear;
		$data['media_last20years'] = ($Last20YearsStartYear+2)."-".$last20YearsEndYear;
		$data['media_previous10years'] = ($before10YearsStartYear+1)."-".$before10YearsEndYear;

		$dts=[];
		$vlu=[];
		$last20YearsDates = array();
		$last20YearsValue = array();
		$before10YearsDates = array();
		$before10YearsValue = array();
		foreach($the_big_array as $val)
		{
			if(($last10YearsEndYear>=$val['year']) && (($last10YearsStartYear+1)<=$val['year']))
			{
				$dts[]=$val['search_date_all'];
				$vlu[]=str_replace(",","",$val['price']);
			}
			if(($last20YearsEndYear>=$val['year']) && (($Last20YearsStartYear+1)<=$val['year']))
			{	
				$last20YearsDates[]=$val['search_date_all'];
				$last20YearsValue[]=str_replace(",","",$val['price']);
			}
			if(($before10YearsEndYear>=$val['year']) && (($before10YearsStartYear+1)<=$val['year']))
			{	
				$before10YearsDates[]=$val['search_date_all'];
				$before10YearsValue[]=str_replace(",","",$val['price']);
			}
		}
		//echo "<pre>";print_r($dts);die;
		$daterange = $this->getYearsBetweenDate($last10YearsStartYear+1,$last10YearsEndYear);
		//echo "<pre>";print_r($daterange);die;
		$last10YearsAllDatesVal = $this->getAllDatesAndvaluesSeasionalAnalysis($daterange,$dts,$vlu);
		//echo "<pre>";print_r($last10YearsAllDatesVal);die;
		$last10YearRecord = array();
		$c=0;
		foreach($last10YearsAllDatesVal as $key=>$ddd)
		{
			foreach($last10YearsAllDatesVal[$key] as $var)
			{
				$last10YearRecord[$c][] = $var;	
			}
			$c++;
		}
		$array1 = array_reverse($last10YearRecord[0]); // 31 Dec
		$array2 = array_reverse($last10YearRecord[1]);
		$array3 = array_reverse($last10YearRecord[2]);		
		$array4 = array_reverse($last10YearRecord[3]);
		$array5 = array_reverse($last10YearRecord[4]);
		$array6 = array_reverse($last10YearRecord[5]);
		$array7 = array_reverse($last10YearRecord[6]);
		$array8 = array_reverse($last10YearRecord[7]);
		$array9 = array_reverse($last10YearRecord[8]);
		$array10 = array_reverse($last10YearRecord[9]);
		$array11 = array_reverse($last10YearRecord[10]);
				
		$variance1 = $this->getVariance($array1);		
		$variance2 = $this->getVariance($array2);
		$variance3 = $this->getVariance($array3);
		$variance4 = $this->getVariance($array4);
		$variance5 = $this->getVariance($array5);
		$variance6 = $this->getVariance($array6);
		$variance7 = $this->getVariance($array7);
		$variance8 = $this->getVariance($array8);
		$variance9 = $this->getVariance($array9);
		$variance10 = $this->getVariance($array10);
		$variance11 = $this->getVariance($array11);
		/*$neg = array_filter($variance11, function($x) {
		    return $x < 0;
		});*/
		$averageOfLast10Years = array();
		for($av=0;$av<=365;$av++)
		{
			$variandddd = ($variance2[$av]+$variance3[$av]+$variance4[$av]+$variance5[$av]+$variance6[$av]+$variance7[$av]+$variance8[$av]+$variance9[$av]+$variance10[$av]+$variance11[$av])/10; 
			$variandddd = number_format(($variandddd*100),2,".","");
			$averageOfLast10Years[] = $variandddd;
		}
		$last10YearsEvolutions = array();
		$lastEvolutions = 0;
		foreach(array_reverse($averageOfLast10Years) as $ev=>$evolution) //  1 Jan
		{
			if($ev==0)
			{
				$last10YearsEvolutions[] = number_format($evolution,2,".","");
			}
			else
			{
				$last10YearsEvolutions[] = number_format(($evolution+$lastEvolutions),2,".",""); 
				$lastEvolutions = $evolution+$lastEvolutions;
			}
		}
		//echo "<pre>";print_r($last10YearsEvolutions);
		$filterAverageEvolution10years = array();
		foreach($last10YearsEvolutions as $kkk=>$vvvv)
		{
			if($kkk>=75 && $kkk<=93)
			{
				$filterAverageEvolution10years[] = $vvvv;
			}
		}
		$performanceLast10Years = 0;
		if(end($filterAverageEvolution10years)>$filterAverageEvolution10years[0])
		{
			$performanceLast10Years = end($filterAverageEvolution10years)-$filterAverageEvolution10years[0];
		}
		else
		{
			$performanceLast10Years = end($filterAverageEvolution10years)-$filterAverageEvolution10years[0];
		}
		//echo $performanceLast10Years;
		//die;
		$data['performanceLast10Years'] = $performanceLast10Years;
		//$data['performanceLast10Years'] = array_sum( $filterAverageEvolution10years) / count( $filterAverageEvolution10years);
		//echo "<pre>";print_r($filterAverageEvolution10years);die;
		/* 
			Last 20 Years Calculations Starts 
		*/
		$daterangeLast20Years = $this->getYearsBetweenDate($Last20YearsStartYear+1,$last20YearsEndYear);
		$last20YearsAllDatesVal = $this->getAllDatesAndvaluesSeasionalAnalysis($daterangeLast20Years,$last20YearsDates,$last20YearsValue);
		//echo "<pre>";print_r($last20YearsAllDatesVal);die;
		$last20YearRecord = array();
		$d=0;
		foreach($last20YearsAllDatesVal as $key=>$ddd)
		{
			foreach($last20YearsAllDatesVal[$key] as $var)
			{
				$last20YearRecord[$d][] = $var;	
			}
			$d++;
		}

		$checkPositiveNegativaArr = array(
										$this->getCountNegativePositiveDays($last20YearRecord[1],75,93),
										$this->getCountNegativePositiveDays($last20YearRecord[2],75,93),
										$this->getCountNegativePositiveDays($last20YearRecord[3],75,93),
										$this->getCountNegativePositiveDays($last20YearRecord[4],75,93),
										$this->getCountNegativePositiveDays($last20YearRecord[5],75,93),
										$this->getCountNegativePositiveDays($last20YearRecord[6],75,93),
										$this->getCountNegativePositiveDays($last20YearRecord[7],75,93),
										$this->getCountNegativePositiveDays($last20YearRecord[8],75,93),
										$this->getCountNegativePositiveDays($last20YearRecord[9],75,93),
										$this->getCountNegativePositiveDays($last20YearRecord[10],75,93),
										$this->getCountNegativePositiveDays($last20YearRecord[11],75,93),
										$this->getCountNegativePositiveDays($last20YearRecord[12],75,93),
										$this->getCountNegativePositiveDays($last20YearRecord[13],75,93),
										$this->getCountNegativePositiveDays($last20YearRecord[14],75,93),
										$this->getCountNegativePositiveDays($last20YearRecord[15],75,93),
										$this->getCountNegativePositiveDays($last20YearRecord[16],75,93),
										$this->getCountNegativePositiveDays($last20YearRecord[17],75,93),
										$this->getCountNegativePositiveDays($last20YearRecord[18],75,93),
										$this->getCountNegativePositiveDays($last20YearRecord[19],75,93),
										$this->getCountNegativePositiveDays($last20YearRecord[20],75,93),
										);
		$numOfPostiveYears = 0;
		$numOfnegativeYears = 0;
		foreach($checkPositiveNegativaArr as $pos)
		{
			if($pos==1)
			{
				$numOfPostiveYears++;
			}
			else
			{
				$numOfnegativeYears++;
			}
		}
		//echo "<pre>";print_r($last20YearRecord);die;
		$Last20Yearsarray1 = array_reverse($last20YearRecord[0]);// 31 Dec
		$Last20Yearsarray2 = array_reverse($last20YearRecord[1]);// 31 Dec
		$Last20Yearsarray3 = array_reverse($last20YearRecord[2]);
		$Last20Yearsarray4 = array_reverse($last20YearRecord[3]);
		$Last20Yearsarray5 = array_reverse($last20YearRecord[4]);
		$Last20Yearsarray6 = array_reverse($last20YearRecord[5]);
		$Last20Yearsarray7 = array_reverse($last20YearRecord[6]);
		$Last20Yearsarray8 = array_reverse($last20YearRecord[7]);
		$Last20Yearsarray9 = array_reverse($last20YearRecord[8]);
		$Last20Yearsarray10 = array_reverse($last20YearRecord[9]);
		$Last20Yearsarray11 = array_reverse($last20YearRecord[10]);
		$Last20Yearsarray12 = array_reverse($last20YearRecord[11]);
		$Last20Yearsarray13 = array_reverse($last20YearRecord[12]);
		$Last20Yearsarray14 = array_reverse($last20YearRecord[13]);
		$Last20Yearsarray15 = array_reverse($last20YearRecord[14]);
		$Last20Yearsarray16 = array_reverse($last20YearRecord[15]);
		$Last20Yearsarray17 = array_reverse($last20YearRecord[16]);
		$Last20Yearsarray18 = array_reverse($last20YearRecord[17]);
		$Last20Yearsarray19 = array_reverse($last20YearRecord[18]);
		$Last20Yearsarray20 = array_reverse($last20YearRecord[19]);
		$Last20Yearsarray21 = array_reverse($last20YearRecord[20]);
				
		$Last20YearsVariance1 = $this->getVariance($Last20Yearsarray1);
		$Last20YearsVariance2 = $this->getVariance($Last20Yearsarray2);
		$Last20YearsVariance3 = $this->getVariance($Last20Yearsarray3);
		$Last20YearsVariance4 = $this->getVariance($Last20Yearsarray4);
		$Last20YearsVariance5 = $this->getVariance($Last20Yearsarray5);
		$Last20YearsVariance6 = $this->getVariance($Last20Yearsarray6);
		$Last20YearsVariance7 = $this->getVariance($Last20Yearsarray7);
		$Last20YearsVariance8 = $this->getVariance($Last20Yearsarray8);
		$Last20YearsVariance9 = $this->getVariance($Last20Yearsarray9);
		$Last20YearsVariance10 = $this->getVariance($Last20Yearsarray10);
		$Last20YearsVariance11 = $this->getVariance($Last20Yearsarray11);
		$Last20YearsVariance12 = $this->getVariance($Last20Yearsarray12);
		$Last20YearsVariance13 = $this->getVariance($Last20Yearsarray13);
		$Last20YearsVariance14 = $this->getVariance($Last20Yearsarray14);
		$Last20YearsVariance15 = $this->getVariance($Last20Yearsarray15);
		$Last20YearsVariance16 = $this->getVariance($Last20Yearsarray16);
		$Last20YearsVariance17 = $this->getVariance($Last20Yearsarray17);
		$Last20YearsVariance18 = $this->getVariance($Last20Yearsarray18);
		$Last20YearsVariance19 = $this->getVariance($Last20Yearsarray19);
		$Last20YearsVariance20 = $this->getVariance($Last20Yearsarray20);
		$Last20YearsVariance21 = $this->getVariance($Last20Yearsarray21);
		


		$negativePositiveTotalCount1 = $this->getCountNegativeRecord($Last20YearsVariance2,75,93);
		$negativePositiveTotalCount2 = $this->getCountNegativeRecord($Last20YearsVariance3,75,93);
		$negativePositiveTotalCount3 = $this->getCountNegativeRecord($Last20YearsVariance4,75,93);
		$negativePositiveTotalCount4 = $this->getCountNegativeRecord($Last20YearsVariance5,75,93);
		$negativePositiveTotalCount5 = $this->getCountNegativeRecord($Last20YearsVariance6,75,93);
		$negativePositiveTotalCount6 = $this->getCountNegativeRecord($Last20YearsVariance7,75,93);
		$negativePositiveTotalCount7 = $this->getCountNegativeRecord($Last20YearsVariance8,75,93);
		$negativePositiveTotalCount8 = $this->getCountNegativeRecord($Last20YearsVariance9,75,93);
		$negativePositiveTotalCount9 = $this->getCountNegativeRecord($Last20YearsVariance10,75,93);
		$negativePositiveTotalCount10 = $this->getCountNegativeRecord($Last20YearsVariance11,75,93);
		$negativePositiveTotalCount11 = $this->getCountNegativeRecord($Last20YearsVariance12,75,93);
		$negativePositiveTotalCount12 = $this->getCountNegativeRecord($Last20YearsVariance13,75,93);
		$negativePositiveTotalCount13 = $this->getCountNegativeRecord($Last20YearsVariance14,75,93);
		$negativePositiveTotalCount14 = $this->getCountNegativeRecord($Last20YearsVariance15,75,93);
		$negativePositiveTotalCount15 = $this->getCountNegativeRecord($Last20YearsVariance16,75,93);
		$negativePositiveTotalCount16 = $this->getCountNegativeRecord($Last20YearsVariance17,75,93);
		$negativePositiveTotalCount17 = $this->getCountNegativeRecord($Last20YearsVariance18,75,93);
		$negativePositiveTotalCount18 = $this->getCountNegativeRecord($Last20YearsVariance19,75,93);
		$negativePositiveTotalCount19 = $this->getCountNegativeRecord($Last20YearsVariance20,75,93);
		$negativePositiveTotalCount20 = $this->getCountNegativeRecord($Last20YearsVariance21,75,93);

		
		
		
		
		$numberOfTotalDays = 0;
		$numberOfPositiveDays = 0;
		$numberOfNegativeDays = 0;


		$numberOfTotalDays = $negativePositiveTotalCount1['totalDaysCount']+$negativePositiveTotalCount2['totalDaysCount']+$negativePositiveTotalCount3['totalDaysCount']+$negativePositiveTotalCount4['totalDaysCount']+$negativePositiveTotalCount5['totalDaysCount']+$negativePositiveTotalCount6['totalDaysCount']+$negativePositiveTotalCount7['totalDaysCount']+$negativePositiveTotalCount8['totalDaysCount']+$negativePositiveTotalCount9['totalDaysCount']+$negativePositiveTotalCount10['totalDaysCount']+$negativePositiveTotalCount11['totalDaysCount']+$negativePositiveTotalCount12['totalDaysCount']+$negativePositiveTotalCount13['totalDaysCount']+$negativePositiveTotalCount14['totalDaysCount']+$negativePositiveTotalCount15['totalDaysCount']+$negativePositiveTotalCount16['totalDaysCount']+$negativePositiveTotalCount17['totalDaysCount']+$negativePositiveTotalCount18['totalDaysCount']+$negativePositiveTotalCount19['totalDaysCount']+$negativePositiveTotalCount20['totalDaysCount'];

		$numberOfPositiveDays = $negativePositiveTotalCount1['positiveDaysCount']+$negativePositiveTotalCount2['positiveDaysCount']+$negativePositiveTotalCount3['positiveDaysCount']+$negativePositiveTotalCount4['positiveDaysCount']+$negativePositiveTotalCount5['positiveDaysCount']+$negativePositiveTotalCount6['positiveDaysCount']+$negativePositiveTotalCount7['positiveDaysCount']+$negativePositiveTotalCount8['positiveDaysCount']+$negativePositiveTotalCount9['positiveDaysCount']+$negativePositiveTotalCount10['positiveDaysCount']+$negativePositiveTotalCount11['positiveDaysCount']+$negativePositiveTotalCount12['positiveDaysCount']+$negativePositiveTotalCount13['positiveDaysCount']+$negativePositiveTotalCount14['positiveDaysCount']+$negativePositiveTotalCount15['positiveDaysCount']+$negativePositiveTotalCount16['positiveDaysCount']+$negativePositiveTotalCount17['positiveDaysCount']+$negativePositiveTotalCount18['positiveDaysCount']+$negativePositiveTotalCount19['positiveDaysCount']+$negativePositiveTotalCount20['positiveDaysCount'];

		$numberOfNegativeDays = $negativePositiveTotalCount1['negativeDaysCount']+$negativePositiveTotalCount2['negativeDaysCount']+$negativePositiveTotalCount3['negativeDaysCount']+$negativePositiveTotalCount4['negativeDaysCount']+$negativePositiveTotalCount5['negativeDaysCount']+$negativePositiveTotalCount6['negativeDaysCount']+$negativePositiveTotalCount7['negativeDaysCount']+$negativePositiveTotalCount8['negativeDaysCount']+$negativePositiveTotalCount9['negativeDaysCount']+$negativePositiveTotalCount10['negativeDaysCount']+$negativePositiveTotalCount11['negativeDaysCount']+$negativePositiveTotalCount12['negativeDaysCount']+$negativePositiveTotalCount13['negativeDaysCount']+$negativePositiveTotalCount14['negativeDaysCount']+$negativePositiveTotalCount15['negativeDaysCount']+$negativePositiveTotalCount16['negativeDaysCount']+$negativePositiveTotalCount17['negativeDaysCount']+$negativePositiveTotalCount18['negativeDaysCount']+$negativePositiveTotalCount19['negativeDaysCount']+$negativePositiveTotalCount20['negativeDaysCount'];

		//echo $numberOfTotalDays."--".$numberOfPositiveDays."--".$numberOfNegativeDays;die;

		//echo "<pre>";print_r($variance10);die;
		$averageOfLast20Years = array();
		for($av=0;$av<=365;$av++)
		{
			$variandddd = ($Last20YearsVariance2[$av]+$Last20YearsVariance3[$av]+$Last20YearsVariance4[$av]+$Last20YearsVariance5[$av]+$Last20YearsVariance6[$av]+$Last20YearsVariance7[$av]+$Last20YearsVariance8[$av]+$Last20YearsVariance9[$av]+$Last20YearsVariance10[$av]+$Last20YearsVariance11[$av]+$Last20YearsVariance12[$av]+$Last20YearsVariance13[$av]+$Last20YearsVariance14[$av]+$Last20YearsVariance15[$av]+$Last20YearsVariance16[$av]+$Last20YearsVariance17[$av]+$Last20YearsVariance18[$av]+$Last20YearsVariance19[$av]+$Last20YearsVariance20[$av]+$Last20YearsVariance21[$av])/20; 
			$variandddd = number_format(($variandddd*100),2,".","");
			$averageOfLast20Years[] = $variandddd;
		}
		//echo "<pre>";print_r($averageOfLast20Years);die;
		$last20YearsEvolutions = array();
		$lastEvolutions1 = 0;
		foreach(array_reverse($averageOfLast20Years) as $ev=>$evolution) //  1 Jan
		{
			//echo $evolution."<br>";
			if($ev==0)
			{
				$last20YearsEvolutions[] = number_format(0,2,".","");
			}
			else
			{
				$last20YearsEvolutions[] = number_format(($evolution+$lastEvolutions1),2,".",""); 
				$lastEvolutions1 = $evolution+$lastEvolutions1;
			}
		}

		$filterAverageEvolution20years = array();
		foreach($last20YearsEvolutions as $kkk=>$vvvv)
		{
			if($kkk>=75 && $kkk<=93)
			{
				$filterAverageEvolution20years[] = $vvvv;
			}
		}
		$performanceLast20Years = 0;
		if(end($filterAverageEvolution20years)>$filterAverageEvolution20years[0])
		{
			$performanceLast20Years = end($filterAverageEvolution20years)-$filterAverageEvolution20years[0];
		}
		else
		{
			$performanceLast20Years = end($filterAverageEvolution20years)-$filterAverageEvolution20years[0];
		}
		$data['performanceLast20Years'] = $performanceLast20Years;
		//$data['performanceLast20Years'] = array_sum( $filterAverageEvolution20years) / count( $filterAverageEvolution20years);
		//echo "<pre>last20YearsEvolutions";print_r($filterAverageEvolution20years);die;
		/* 
			Last 20 Years Calculations End 
		*/

		/* Previous 10 Years Calculation Starts  */

		$daterangePrevious10Years = $this->getYearsBetweenDate($before10YearsStartYear,$before10YearsEndYear);
		$previous10YearsAllDatesVal = $this->getAllDatesAndvaluesSeasionalAnalysis($daterangePrevious10Years,$before10YearsDates,$before10YearsValue);
		//echo "<pre>previous 10 years";print_r($previous10YearsAllDatesVal);die;
		$previous10YearRecord = array();
		$e=0;
		foreach($previous10YearsAllDatesVal as $key=>$ddd)
		{
			foreach($previous10YearsAllDatesVal[$key] as $var)
			{
				$previous10YearRecord[$e][] = $var;	
			}
			$e++;
		}
		//echo "<pre>dddd";print_r($previous10YearRecord);die;
		$previous10Yearsarray1 = array_reverse($previous10YearRecord[0]); // 31 Dec
		$previous10Yearsarray2 = array_reverse($previous10YearRecord[1]);
		$previous10Yearsarray3 = array_reverse($previous10YearRecord[2]);
		$previous10Yearsarray4 = array_reverse($previous10YearRecord[3]);
		$previous10Yearsarray5 = array_reverse($previous10YearRecord[4]);
		$previous10Yearsarray6 = array_reverse($previous10YearRecord[5]);
		$previous10Yearsarray7 = array_reverse($previous10YearRecord[6]);
		$previous10Yearsarray8 = array_reverse($previous10YearRecord[7]);
		$previous10Yearsarray9 = array_reverse($previous10YearRecord[8]);
		$previous10Yearsarray10 = array_reverse($previous10YearRecord[9]);
		$previous10Yearsarray11 = array_reverse($previous10YearRecord[10]);
				
		$previous10YearsVariance1 = $this->getVariance($previous10Yearsarray1);
		$previous10YearsVariance2 = $this->getVariance($previous10Yearsarray2);
		$previous10YearsVariance3 = $this->getVariance($previous10Yearsarray3);
		$previous10YearsVariance4 = $this->getVariance($previous10Yearsarray4);
		$previous10YearsVariance5 = $this->getVariance($previous10Yearsarray5);
		$previous10YearsVariance6 = $this->getVariance($previous10Yearsarray6);
		$previous10YearsVariance7 = $this->getVariance($previous10Yearsarray7);
		$previous10YearsVariance8 = $this->getVariance($previous10Yearsarray8);
		$previous10YearsVariance9 = $this->getVariance($previous10Yearsarray9);
		$previous10YearsVariance10 = $this->getVariance($previous10Yearsarray10);
		$previous10YearsVariance11 = $this->getVariance($previous10Yearsarray11);
		
		$averageOfPrevious10Years = array();
		for($av=0;$av<=365;$av++)
		{
			$variandddd = ($previous10YearsVariance2[$av]+$previous10YearsVariance3[$av]+$previous10YearsVariance4[$av]+$previous10YearsVariance5[$av]+$previous10YearsVariance6[$av]+$previous10YearsVariance7[$av]+$previous10YearsVariance8[$av]+$previous10YearsVariance9[$av]+$previous10YearsVariance10[$av]+$previous10YearsVariance11[$av])/10; 
			$variandddd = number_format(($variandddd*100),2,".","");
			$averageOfPrevious10Years[] = $variandddd;
		}
		//echo "<pre>pre average";print_r($averageOfPrevious10Years);die;
		$previous10YearsEvolutions = array();
		$lastEvolutions2 = 0;
		foreach(array_reverse($averageOfPrevious10Years) as $ev=>$evolution) //  1 Jan
		{
			if($ev==0)
			{
				$previous10YearsEvolutions[] = number_format(0,2,".","");
			}
			else
			{
				$previous10YearsEvolutions[] = number_format(($evolution+$lastEvolutions2),2,".",""); 
				$lastEvolutions2 = $evolution+$lastEvolutions2;
			}
		}
		$filterAverageEvolutionPrevious10years = array();
		foreach($previous10YearsEvolutions as $kkk=>$vvvv)
		{
			if($kkk>=75 && $kkk<=93)
			{
				$filterAverageEvolutionPrevious10years[] = $vvvv;
			}
		}

		$performanceBefore10Years = 0;
		if(end($filterAverageEvolutionPrevious10years)>$filterAverageEvolutionPrevious10years[0])
		{
			$performanceBefore10Years = end($filterAverageEvolutionPrevious10years)-$filterAverageEvolutionPrevious10years[0];
		}
		else
		{
			$performanceBefore10Years = end($filterAverageEvolutionPrevious10years)-$filterAverageEvolutionPrevious10years[0];
		}
		$data['performanceBefore10Years'] = $performanceBefore10Years;
		//$data['performanceBefore10Years'] = array_sum( $filterAverageEvolutionPrevious10years) / count( $filterAverageEvolutionPrevious10years);
		//echo "<pre>previous10YearsEvolutions";print_r($filterAverageEvolutionPrevious10years);die;
		/* Previous 10 Years Calculation End  */

		$beginLabel = new DateTime( '2016-01-01' );
		$endLabel = (new DateTime( '2016-12-31' ))->modify( '+1 day' );
		$intervalLabel = new DateInterval('P1D');
		$labelRange = new DatePeriod($beginLabel, $intervalLabel ,$endLabel);
		$xRangeLabel = array();
		$allDates = array();
		foreach($labelRange as $range)
		{
			$xRangeLabel[] = "'".$range->format('d-M')."'";
			$allDates[] = $range->format('d-M');
		}
		
		$data['xRangeLabel'] = $xRangeLabel;
		$filterDates = array();
		foreach($xRangeLabel as $kdate=>$dvl)
		{
			if($kdate>=75 && $kdate<=93)
			{
				$filterDates[] = $dvl;
			}
			 
		}
		$mergeArr  = array();
		$ddArr = array();
		foreach($allDates as $keys=>$date)
		{
			$ddArr['dates'] = $date."-2021";
			$ddArr['usualDate'] = "'".$date."'";
			$ddArr['converted_date'] = strtotime($date."-2021");
			$ddArr['values'] = $last10YearsEvolutions[$keys];
			$ddArr['index'] = $keys;
			array_push($mergeArr,$ddArr);
		}
		$withoutFilter = $mergeArr;
		usort($mergeArr,array($this,'sortingDateValues'));
		//echo "<pre>";print_r($mergeArr);die();
		/*
			For last 10 Years Calculations
		*/
		$getOnePlace0 = 0;
		$mergeArr0 = array();
		$withoutFilter0 = array();
		$getOnePlace0 = array();
		$mainArrrrrrr = array();
		for($rng=0;$rng<=50;$rng++)
		{
			if($rng==0)
			{
				$mergeArr0 = $this->removeExistingDate($mergeArr,$getOnePlace0[0]['converted_date'],$getOnePlace0[count($getOnePlace0)-1]['converted_date']);
				$withoutFilter0 = $this->removeExistingDate($withoutFilter,$getOnePlace0[0]['converted_date'],$getOnePlace0[count($getOnePlace0)-1]['converted_date']);

				$getOnePlace0 = $this->getLastYearRecordCalculations($rng,$mergeArr0,$withoutFilter0);
				if(round(abs($getOnePlace0[0]['converted_date'] - $getOnePlace0[count($getOnePlace0)-1]['converted_date'])/86400)>=9)
				{
					$mainArrrrrrr[] = $getOnePlace0;
				}	
			}
			else
			{
				$mergeArr0 = $this->removeExistingDate($mergeArr0,$getOnePlace0[0]['converted_date'],$getOnePlace0[count($getOnePlace0)-1]['converted_date']);
				$withoutFilter0 = $this->removeExistingDate($withoutFilter0,$getOnePlace0[0]['converted_date'],$getOnePlace0[count($getOnePlace0)-1]['converted_date']);

				$getOnePlace0 = $this->getLastYearRecordCalculations($rng,$mergeArr0,$withoutFilter0);
				if(round(abs($getOnePlace0[0]['converted_date'] - $getOnePlace0[count($getOnePlace0)-1]['converted_date'])/86400)>=9)
				{
					$mainArrrrrrr[] = $getOnePlace0;
				}
			}
				
		}
		//echo "<pre>";print_r($mainArrrrrrr);die;
		/*
			For 20 Years Calculations
		*/
		$lastTwentyYears  = array();
		$lastTwentyYearsDataArr = array();
		foreach($allDates as $keys=>$date)
		{
			$lastTwentyYearsDataArr['dates'] = $date."-2021";
			$lastTwentyYearsDataArr['usualDate'] = "'".$date."'";
			$lastTwentyYearsDataArr['converted_date'] = strtotime($date."-2021");
			$lastTwentyYearsDataArr['values'] = $last20YearsEvolutions[$keys];
			$lastTwentyYearsDataArr['index'] = $keys;
			array_push($lastTwentyYears,$lastTwentyYearsDataArr);
		}
		$lastTwentyYearsWithoutFilter = $lastTwentyYears;
		usort($lastTwentyYears,array($this,'sortingDateValues'));
		//echo "<pre>ram ji";print_r($lastTwentyYearsWithoutFilter);die;

		$getPlaceTwentyYears = array();
		$getWithoutFilterTwentyYears = array();
		$getOnePlaceTwentyYears = array();
		$lastTwentyYearsMainArr = array();

		for($rng=0;$rng<=50;$rng++)
		{
			if($rng==0)
			{
				$getPlaceTwentyYears = $this->removeExistingDate($lastTwentyYears,$getOnePlaceTwentyYears[0]['converted_date'],$getOnePlaceTwentyYears[count($getOnePlaceTwentyYears)-1]['converted_date']);
				$getWithoutFilterTwentyYears = $this->removeExistingDate($withoutFilter,$getOnePlaceTwentyYears[0]['converted_date'],$getOnePlaceTwentyYears[count($getOnePlaceTwentyYears)-1]['converted_date']);

				$getOnePlaceTwentyYears = $this->getLastYearRecordCalculations($rng,$getPlaceTwentyYears,$getWithoutFilterTwentyYears);
				if(round(abs($getOnePlaceTwentyYears[0]['converted_date'] - $getOnePlaceTwentyYears[count($getOnePlaceTwentyYears)-1]['converted_date'])/86400)>=9)
				{
					$lastTwentyYearsMainArr[] = $getOnePlaceTwentyYears;
				}	
			}
			else
			{
				$getPlaceTwentyYears = $this->removeExistingDate($getPlaceTwentyYears,$getOnePlaceTwentyYears[0]['converted_date'],$getOnePlaceTwentyYears[count($getOnePlaceTwentyYears)-1]['converted_date']);
				$getWithoutFilterTwentyYears = $this->removeExistingDate($getWithoutFilterTwentyYears,$getOnePlaceTwentyYears[0]['converted_date'],$getOnePlaceTwentyYears[count($getOnePlaceTwentyYears)-1]['converted_date']);

				$getOnePlaceTwentyYears = $this->getLastYearRecordCalculations($rng,$getPlaceTwentyYears,$getWithoutFilterTwentyYears);
				if(round(abs($getOnePlaceTwentyYears[0]['converted_date'] - $getOnePlaceTwentyYears[count($getOnePlaceTwentyYears)-1]['converted_date'])/86400)>=9)
				{
					$lastTwentyYearsMainArr[] = $getOnePlaceTwentyYears;
				}
			}
				
		}
		

		$lastTwentyYearMainProfitProbArr = array();
		foreach($lastTwentyYearsMainArr as $mainkey=>$main)
		{
			$lastTwentyYearMainProfitProbArr[] = $this->findProfitPerformanceProbability($main,$last20YearRecord);
			
		}
		//echo "<pre>Last 20 Years ";print_r($lastTwentyYearMainProfitProbArr);die;
		/*
			For 20 Years Calculations end
		*/

		/*
			For before 10 Years Calculations
		*/
		$beforeTenYears  = array();
		$beforeTenYearsDataArr = array();
		foreach($allDates as $keys=>$date)
		{
			$beforeTenYearsDataArr['dates'] = $date."-2021";
			$beforeTenYearsDataArr['usualDate'] = "'".$date."'";
			$beforeTenYearsDataArr['converted_date'] = strtotime($date."-2021");
			$beforeTenYearsDataArr['values'] = $previous10YearsEvolutions[$keys];
			$beforeTenYearsDataArr['index'] = $keys;
			array_push($beforeTenYears,$beforeTenYearsDataArr);
		}
		$beforeTenYearsWithoutFilter = $beforeTenYears;
		usort($beforeTenYears,array($this,'sortingDateValues'));
		//echo "<pre>ram ji";print_r($lastTwentyYearsWithoutFilter);die;

		$getPlacebeforeTenYears = array();
		$getWithoutFilterBeforeTenYears = array();
		$getOnePlaceBeforeTenYears = array();
		$beforeTenYearsMainArr = array();

		for($rng=0;$rng<=50;$rng++)
		{
			if($rng==0)
			{
				$getPlacebeforeTenYears = $this->removeExistingDate($beforeTenYears,$getOnePlaceBeforeTenYears[0]['converted_date'],$getOnePlaceBeforeTenYears[count($getOnePlaceBeforeTenYears)-1]['converted_date']);
				$getWithoutFilterBeforeTenYears = $this->removeExistingDate($withoutFilter,$getOnePlaceBeforeTenYears[0]['converted_date'],$getOnePlaceBeforeTenYears[count($getOnePlaceBeforeTenYears)-1]['converted_date']);

				$getOnePlaceBeforeTenYears = $this->getLastYearRecordCalculations($rng,$getPlacebeforeTenYears,$getWithoutFilterBeforeTenYears);
				if(round(abs($getOnePlaceBeforeTenYears[0]['converted_date'] - $getOnePlaceBeforeTenYears[count($getOnePlaceBeforeTenYears)-1]['converted_date'])/86400)>=9)
				{
					$beforeTenYearsMainArr[] = $getOnePlaceBeforeTenYears;
				}	
			}
			else
			{
				$getOnePlaceBeforeTenYears = $this->removeExistingDate($getOnePlaceBeforeTenYears,$getOnePlaceBeforeTenYears[0]['converted_date'],$getOnePlaceBeforeTenYears[count($getOnePlaceBeforeTenYears)-1]['converted_date']);
				$getWithoutFilterBeforeTenYears = $this->removeExistingDate($getWithoutFilterBeforeTenYears,$getOnePlaceBeforeTenYears[0]['converted_date'],$getOnePlaceBeforeTenYears[count($getOnePlaceBeforeTenYears)-1]['converted_date']);

				$getOnePlaceBeforeTenYears = $this->getLastYearRecordCalculations($rng,$getPlacebeforeTenYears,$getWithoutFilterBeforeTenYears);
				if(round(abs($getOnePlaceBeforeTenYears[0]['converted_date'] - $getOnePlaceBeforeTenYears[count($getOnePlaceBeforeTenYears)-1]['converted_date'])/86400)>=9)
				{
					$beforeTenYearsMainArr[] = $getOnePlaceBeforeTenYears;
				}
			}
				
		}
		//echo "<pre>";print_r($beforeTenYearsMainArr);die;

		$beforeTenYearMainProfitProbArr = array();
		foreach($beforeTenYearsMainArr as $mainkey=>$main)
		{
			$beforeTenYearMainProfitProbArr[] = $this->findProfitPerformanceProbability($main,$last20YearRecord);
			
		}
		//echo "<pre>previous 10 Years ";print_r($beforeTenYearMainProfitProbArr);die;
		/*
			For before 10 Years Calculations end
		*/

		//echo "<pre>";print_r($mainArrrrrrr);
		//die;
		$mainProfitProbArr = array();
		foreach($mainArrrrrrr as $mainkey=>$main)
		{
			$mainProfitProbArr[] = $this->findProfitPerformanceProbability($main,$last20YearRecord);
			
		}
		//echo "<pre>Last 10 Years ";print_r($mainProfitProbArr);die;
		$v=0;
		$p=0;
		$finalPerProbability = array();
		foreach(array_reverse($mainProfitProbArr) as $key => $k)
		{
			$c="0";
		    $c1="0";
		   if($v<=$k['performance'])
		   {
		     $c="1";
		   }

		   if($p<=$k['probability'])
		   {
		     $c1="1";
		   }
		   if($c=="1" && $c1=="1")
		   {
		    $v=$k['performance'];
		    $p=$k['probability'];
		    $finalPerProbability['val'] = $k['val'];
		    $finalPerProbability['dts'] = $k['dts'];
		    $finalPerProbability['numOfPostiveYears'] = $k['numOfPostiveYears'];
		    $finalPerProbability['numOfnegativeYears'] = $k['numOfnegativeYears'];
		    $finalPerProbability['performance'] = $k['performance'];
		    $finalPerProbability['totalDays'] = $k['totalDays'];
		    $finalPerProbability['probability'] = $k['probability'];
		   }
		}

		//final probability for last 20 years
		$v1=0;
		$p1=0;
		$finalPerProbabilityLast20Years = array();
		foreach(array_reverse($lastTwentyYearMainProfitProbArr) as $key => $k)
		{
			$c="0";
		    $c1="0";
		   if($v1<=$k['performance'])
		   {
		     $c="1";
		   }

		   if($p1<=$k['probability'])
		   {
		     $c1="1";
		   }
		   if($c=="1" && $c1=="1")
		   {
		    $v1=$k['performance'];
		    $p1=$k['probability'];
		    $finalPerProbabilityLast20Years['val'] = $k['val'];
		    $finalPerProbabilityLast20Years['dts'] = $k['dts'];
		    $finalPerProbabilityLast20Years['numOfPostiveYears'] = $k['numOfPostiveYears'];
		    $finalPerProbabilityLast20Years['numOfnegativeYears'] = $k['numOfnegativeYears'];
		    $finalPerProbabilityLast20Years['performance'] = $k['performance'];
		    $finalPerProbabilityLast20Years['totalDays'] = $k['totalDays'];
		    $finalPerProbabilityLast20Years['probability'] = $k['probability'];
		   }
		}

		//final probability for last 20 years
		$v2=0;
		$p2=0;
		$finalPerProbabilityPreviousTenYears = array();
		foreach(array_reverse($beforeTenYearMainProfitProbArr) as $key => $k)
		{
			$c="0";
		    $c1="0";
		   if($v2<=$k['performance'])
		   {
		     $c="1";
		   }

		   if($p2<=$k['probability'])
		   {
		     $c1="1";
		   }
		   if($c=="1" && $c1=="1")
		   {
		    $v2=$k['performance'];
		    $p2=$k['probability'];
		    $finalPerProbabilityPreviousTenYears['val'] = $k['val'];
		    $finalPerProbabilityPreviousTenYears['dts'] = $k['dts'];
		    $finalPerProbabilityPreviousTenYears['numOfPostiveYears'] = $k['numOfPostiveYears'];
		    $finalPerProbabilityPreviousTenYears['numOfnegativeYears'] = $k['numOfnegativeYears'];
		    $finalPerProbabilityPreviousTenYears['performance'] = $k['performance'];
		    $finalPerProbabilityPreviousTenYears['totalDays'] = $k['totalDays'];
		    $finalPerProbabilityPreviousTenYears['probability'] = $k['probability'];
		   }
		}

		//echo"$v  $p";
		//echo "<pre>";print_r($finalPerProbability);
		//echo "<pre>";print_r($mainProfitProbArr);
		$data['filterPerformaceProb'] = $finalPerProbability;
		$data['filterPerformaceProbLast20Years'] = $finalPerProbabilityLast20Years;
		$data['filterPerformaceProbPreviousTenYears'] = $finalPerProbabilityPreviousTenYears;
		//echo $data['filterPerformaceProb']['dts']."<br>";
		//echo rtrim($data['filterPerformaceProb']['dts'],',');
		//die;
		$myConfigSeasonalAnalysisFinalGraphp = '{
            "gui":{ 
              "contextMenu":{ 
                "button":{ 
                  "visible": false 
                }
              } 
            },
            "type": "line",
            "utc": true,
            backgroundColor: "white",
            "plotarea": {
                "margin": "dynamic 45 60 dynamic",
            },
            "legend": {
                "layout": "float",
                "background-color": "none",
                "border-width": 0,
                "shadow": 0,
                "align":"center",
                "vertical-align":"bottom",
                "adjust-layout":true,
                "toggle-action": "remove",
                "item":{
                  "padding": 7,
                  "marginRight": 17,
                  "cursor":"hand"
                }
            },
            "scale-x": {
                "labels": ['.$data['filterPerformaceProb']['dts'].'],
            },
            "scale-y": {
                "line-color": "#f6f7f8",
                "shadow": 0,
                "guide": {
                    "line-style": "dashed"
                },
                "label": {
                    "text": "",
                },
                "minor-ticks": 0,
                "thousands-separator": ","
            },
            "crosshair-x": {
                "line-color": "#efefef",
                "plot-label": {
                    "border-radius": "5px",
                    "border-width": "2px",
                    "border-color": "#063853",
                    "padding": "10px",
                    "font-weight": "bold",
                },
                "scale-label": {
                    "font-color": "#fff",
                    "background-color": "#063853",
                    "border-radius": "5px"
                }
            },

            "tooltip": {
                "visible": false
            },
            "plot": {
                tooltip: {
                          text: "%t views: %v%<br>%k%"
                        },
                "highlight":true,
                "shadow": 0,
                "line-width": "2px",
                "marker": {
                    "type": "circle",
                    "size": 3
                },
                "highlight-state": {
                    "line-width":3
                },
                "animation":{
                  "effect":1,
                  "sequence":2,
                  "speed":100,
                }
            },
            series: [
                  {
                    text: "Last 10 Years",
                    values: ['.$data['filterPerformaceProb']['val'].'],
                    legendMarker: {
                      type: "circle",
                      backgroundColor: "#00008b",
                      borderColor: "#00008b",
                      borderWidth: "1px",
                      shadow: false,
                      size: "5px"
                    },
                    "margin-top":"0",
                    lineColor: "#00008b",
                    marker: {
                      backgroundColor: "#00008b",
                      borderColor: "#00008b",
                      borderWidth: "1px",
                      shadow: false
                    }
                  },
                ]
        }';

        $myConfigSeasonalAnalysisFinalGraphpLastTwentyYears = '{
            "gui":{ 
              "contextMenu":{ 
                "button":{ 
                  "visible": false 
                }
              } 
            },
            "type": "line",
            "utc": true,
            backgroundColor: "white",
            "plotarea": {
                "margin": "dynamic 45 60 dynamic",
            },
            "legend": {
                "layout": "float",
                "background-color": "none",
                "border-width": 0,
                "shadow": 0,
                "align":"center",
                "vertical-align":"bottom",
                "adjust-layout":true,
                "toggle-action": "remove",
                "item":{
                  "padding": 7,
                  "marginRight": 17,
                  "cursor":"hand"
                }
            },
            "scale-x": {
                "labels": ['.$data['filterPerformaceProbLast20Years']['dts'].'],
            },
            "scale-y": {
                "line-color": "#f6f7f8",
                "shadow": 0,
                "guide": {
                    "line-style": "dashed"
                },
                "label": {
                    "text": "",
                },
                "minor-ticks": 0,
                "thousands-separator": ","
            },
            "crosshair-x": {
                "line-color": "#efefef",
                "plot-label": {
                    "border-radius": "5px",
                    "border-width": "2px",
                    "border-color": "#063853",
                    "padding": "10px",
                    "font-weight": "bold",
                },
                "scale-label": {
                    "font-color": "#fff",
                    "background-color": "#063853",
                    "border-radius": "5px"
                }
            },

            "tooltip": {
                "visible": false
            },
            "plot": {
                tooltip: {
                          text: "%t views: %v%<br>%k%"
                        },
                "highlight":true,
                "shadow": 0,
                "line-width": "2px",
                "marker": {
                    "type": "circle",
                    "size": 3
                },
                "highlight-state": {
                    "line-width":3
                },
                "animation":{
                  "effect":1,
                  "sequence":2,
                  "speed":100,
                }
            },
            series: [
                  {
                    text: "Last 20 Years",
                    values: ['.$data['filterPerformaceProbLast20Years']['val'].'],
                    legendMarker: {
                      type: "circle",
                      backgroundColor: "#00008b",
                      borderColor: "#00008b",
                      borderWidth: "1px",
                      shadow: false,
                      size: "5px"
                    },
                    "margin-top":"0",
                    lineColor: "#00008b",
                    marker: {
                      backgroundColor: "#00008b",
                      borderColor: "#00008b",
                      borderWidth: "1px",
                      shadow: false
                    }
                  },
                ]
        }';

        $myConfigSeasonalAnalysisFinalGraphpPreviousTenYears = '{
            "gui":{ 
              "contextMenu":{ 
                "button":{ 
                  "visible": false 
                }
              } 
            },
            "type": "line",
            "utc": true,
            backgroundColor: "white",
            "plotarea": {
                "margin": "dynamic 45 60 dynamic",
            },
            "legend": {
                "layout": "float",
                "background-color": "none",
                "border-width": 0,
                "shadow": 0,
                "align":"center",
                "vertical-align":"bottom",
                "adjust-layout":true,
                "toggle-action": "remove",
                "item":{
                  "padding": 7,
                  "marginRight": 17,
                  "cursor":"hand"
                }
            },
            "scale-x": {
                "labels": ['.$data['filterPerformaceProbPreviousTenYears']['dts'].'],
            },
            "scale-y": {
                "line-color": "#f6f7f8",
                "shadow": 0,
                "guide": {
                    "line-style": "dashed"
                },
                "label": {
                    "text": "",
                },
                "minor-ticks": 0,
                "thousands-separator": ","
            },
            "crosshair-x": {
                "line-color": "#efefef",
                "plot-label": {
                    "border-radius": "5px",
                    "border-width": "2px",
                    "border-color": "#063853",
                    "padding": "10px",
                    "font-weight": "bold",
                },
                "scale-label": {
                    "font-color": "#fff",
                    "background-color": "#063853",
                    "border-radius": "5px"
                }
            },

            "tooltip": {
                "visible": false
            },
            "plot": {
                tooltip: {
                          text: "%t views: %v%<br>%k%"
                        },
                "highlight":true,
                "shadow": 0,
                "line-width": "2px",
                "marker": {
                    "type": "circle",
                    "size": 3
                },
                "highlight-state": {
                    "line-width":3
                },
                "animation":{
                  "effect":1,
                  "sequence":2,
                  "speed":100,
                }
            },
            series: [
                  {
                    text: "Previous 10 Years",
                    values: ['.$data['filterPerformaceProbPreviousTenYears']['val'].'],
                    legendMarker: {
                      type: "circle",
                      backgroundColor: "#00008b",
                      borderColor: "#00008b",
                      borderWidth: "1px",
                      shadow: false,
                      size: "5px"
                    },
                    "margin-top":"0",
                    lineColor: "#00008b",
                    marker: {
                      backgroundColor: "#00008b",
                      borderColor: "#00008b",
                      borderWidth: "1px",
                      shadow: false
                    }
                  },
                ]
        }';

        $ProfitProbabilityFinalGraphStatics = '{ "gui":{ "contextMenu":{ "button":{ "visible": false } } }, "type": "line", "utc": true, backgroundColor: "white", "plotarea": { "margin": "dynamic 45 60 dynamic", }, "legend": { "layout": "float", "background-color": "none", "border-width": 0, "shadow": 0, "align":"center", "vertical-align":"bottom", "adjust-layout":true, "toggle-action": "remove", "item":{ "padding": 7, "marginRight": 17, "cursor":"hand" } }, "scale-x": { "labels": [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28], }, "scale-y": { "line-color": "#f6f7f8", "shadow": 0, "guide": { "line-style": "dashed" }, "label": { "text": "", }, "minor-ticks": 0, "thousands-separator": "," }, "crosshair-x": { "line-color": "#efefef", "plot-label": { "border-radius": "5px", "border-width": "2px", "border-color": "#063853", "padding": "10px", "font-weight": "bold", }, "scale-label": { "font-color": "#fff", "background-color": "#063853", "border-radius": "5px" } }, "tooltip": { "visible": false }, "plot": { tooltip: { text: "%t views: %v%
%k%" }, "highlight":true, "shadow": 0, "line-width": "2px", "marker": { "type": "circle", "size": 3 }, "highlight-state": { "line-width":3 }, "animation":{ "effect":1, "sequence":2, "speed":100, } }, series: [ { text: "Last 10 Years", values: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28], legendMarker: { type: "circle", backgroundColor: "#00008b", borderColor: "#00008b", borderWidth: "1px", shadow: false, size: "5px" }, "margin-top":"0", lineColor: "#00008b", marker: { backgroundColor: "#00008b", borderColor: "#00008b", borderWidth: "1px", shadow: false } }, { text: "Last 20 Years", values: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28], visible: false, legendMarker: { type: "circle", backgroundColor: "#000000", borderColor: "#000000", borderWidth: "1px", shadow: false, size: "5px" }, lineColor: "#000000", marker: { backgroundColor: "#000000", borderColor: "#000000", borderWidth: "1px", shadow: false } }, { text: "Previous 10 Years", values: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28], visible: false, legendMarker: { type: "circle", backgroundColor: "green", borderColor: "green", borderWidth: "1px", shadow: false, size: "5px" }, lineColor: "green", marker: { backgroundColor: "green", borderColor: "green", borderWidth: "1px", shadow: false } } ] }';

        $data['myConfigSeasonalAnalysisFinalGraphp'] = $myConfigSeasonalAnalysisFinalGraphp;
        $data['myConfigSeasonalAnalysisFinalGraphpLastTwentyYears'] = $myConfigSeasonalAnalysisFinalGraphpLastTwentyYears;
        $data['myConfigSeasonalAnalysisFinalGraphpPreviousTenYears'] = $myConfigSeasonalAnalysisFinalGraphpPreviousTenYears;
        $data['ProfitProbabilityFinalGraphStatics'] = $ProfitProbabilityFinalGraphStatics;

		
		$data['xLabel'] = implode(',', $xRangeLabel);
		$data['last10Years'] = implode(',', array_reverse($averageOfLast10Years));
		$data['last20Years'] = implode(',', array_reverse($averageOfLast20Years));
		$data['previous10Years'] = implode(',', array_reverse($averageOfPrevious10Years));
		//$data['performanceLast10Years'] = $found_item['profit'];

		/*filter records*/
		$data['filterDates'] = implode(',',$filterDates);
		$data['filterAverageEvolution10years'] = implode(',',$filterAverageEvolution10years);
		$data['filterAverageEvolution20years'] = implode(',',$filterAverageEvolution20years);
		$data['filterAverageEvolutionPrevious10years'] = implode(',',$filterAverageEvolutionPrevious10years);

		/*$data['numberOfTotalDays'] = $numberOfTotalDays;
		$data['numberOfPositiveDays'] = $numberOfPositiveDays;
		$data['numberOfNegativeDays'] = $numberOfNegativeDays;*/
		$data['numberOfTotalDays'] = 20;
		$data['numberOfPositiveDays'] = $numOfPostiveYears;
		$data['numberOfNegativeDays'] = $numOfnegativeYears;
		//echo $data['filterDates'];die;
		$data['seasionalDate'] = $this->chart_model->printSeasionalAnalysisdate(date('Y').'-01-01', date('Y').'-12-31');

		$myConfigSeasonalAnalysis = '{
            "gui":{ 
              "contextMenu":{ 
                "button":{ 
                  "visible": false 
                }
              } 
            },
            "type": "line",
            "utc": true,
            backgroundColor: "white",
            "plotarea": {
                "margin": "dynamic 45 60 dynamic",
            },
            "legend": {
                "layout": "float",
                "background-color": "none",
                "border-width": 0,
                "shadow": 0,
                "align":"center",
                "vertical-align":"bottom",
                "adjust-layout":true,
                "toggle-action": "remove",
                "item":{
                  "padding": 7,
                  "marginRight": 17,
                  "cursor":"hand"
                }
            },
            "scale-x": {
                "labels": ['.$data['filterDates'].'],
            },
            "scale-y": {
                "line-color": "#f6f7f8",
                "shadow": 0,
                "guide": {
                    "line-style": "dashed"
                },
                "label": {
                    "text": "",
                },
                "minor-ticks": 0,
                "thousands-separator": ","
            },
            "crosshair-x": {
                "line-color": "#efefef",
                "plot-label": {
                    "border-radius": "5px",
                    "border-width": "2px",
                    "border-color": "#063853",
                    "padding": "10px",
                    "font-weight": "bold",
                },
                "scale-label": {
                    "font-color": "#fff",
                    "background-color": "#063853",
                    "border-radius": "5px"
                }
            },

            "tooltip": {
                "visible": false
            },
            "plot": {
                tooltip: {
                          text: "%t views: %v%<br>%k%"
                        },
                "highlight":true,
                "shadow": 0,
                "line-width": "2px",
                "marker": {
                    "type": "circle",
                    "size": 3
                },
                "highlight-state": {
                    "line-width":3
                },
                "animation":{
                  "effect":1,
                  "sequence":2,
                  "speed":100,
                }
            },
            series: [
                  {
                    text: "Media '.$data['media_last10years'].'",
                    values: ['.$data['filterAverageEvolution10years'].'],
                    legendMarker: {
                      type: "circle",
                      backgroundColor: "#00008b",
                      borderColor: "#00008b",
                      borderWidth: "1px",
                      shadow: false,
                      size: "5px"
                    },
                    "margin-top":"0",
                    lineColor: "#00008b",
                    marker: {
                      backgroundColor: "#00008b",
                      borderColor: "#00008b",
                      borderWidth: "1px",
                      shadow: false
                    }
                  },
                  {
                    text: "Media '.$data['media_last20years'].'",
                    values: ['.$data['filterAverageEvolution20years'].'],
                    visible: false,
                    legendMarker: {
                      type: "circle",
                      backgroundColor: "#000000",
                      borderColor: "#000000",
                      borderWidth: "1px",
                      shadow: false,
                      size: "5px"
                    },
                    lineColor: "#000000",
                    marker: {
                      backgroundColor: "#000000",
                      borderColor: "#000000",
                      borderWidth: "1px",
                      shadow: false
                    }
                  },
                  {
                    text: "Media '.$data['media_previous10years'].'",
                    values: ['.$data['filterAverageEvolutionPrevious10years'].'],
                    visible: false,
                    legendMarker: {
                      type: "circle",
                      backgroundColor: "green",
                      borderColor: "green",
                      borderWidth: "1px",
                      shadow: false,
                      size: "5px"
                    },
                    lineColor: "green",
                    marker: {
                      backgroundColor: "green",
                      borderColor: "green",
                      borderWidth: "1px",
                      shadow: false
                    }
                  }
                ]
        }';

        $data['myConfigSeasonalAnalysis'] = $myConfigSeasonalAnalysis;
        $this->load->view('page/portfolio/showSeasonalAnalysisGraphMobile',$data);

		/*End Of Seasional Analysis Calculation*/
	}

	function mobileSimulationApi()
	{
		$user_id = $this->input->get('user_id');
		$plan_id = $this->input->get('plan_id');
		if($user_id=="" && $user_id==null)
		{
			echo "Please provide User Id";
			return false;
		}
		if($plan_id=="" && $plan_id==null)
		{
			echo "Please provide Plan Id";
			return false;
		}
		$data['stocks'] = $this->db->query("SELECT a.id,a.user_id,a.stock_id,a.value,a.order_type,a.number,a.stock_price,a.created_on,b.stock_name,b.price,b.volatility,b.stock_type,b.id AS actual_stock_id,b.dividend,b.interest_rate FROM tbl_user_stock_management a INNER JOIN tbl_admin_stock b on a.stock_id=b.id WHERE a.user_id='".$user_id."' AND a.s_type=1 ORDER BY a.id  DESC")->result_array();
		//echo "<pre>";print_r($data['stocks']);die;
		$str_links = $this->pagination->create_links();
	    $data["links"] = explode('&nbsp;',$str_links );

	    /* Simulation calculations */
	    $actual_stock_id = @$data['stocks'][0]['actual_stock_id'];
	    $dividend = @$data['stocks'][0]['dividend'];
	    $numberOfSimulation = $this->getNumberOfSimultionByUserLevel($plan_id);
	    $interestRate = @$data['stocks'][0]['interest_rate'];
	    $allExcelFileRecordLast = $this->chart_model->file_handling($actual_stock_id);
	    $allExcelFileRecordLast = array_slice($allExcelFileRecordLast, 0,$numberOfSimulation);  
	    //echo "<pre>";print_r($allExcelFileRecordLast);die;
	    $variances[0]  = 0;
	    $c = 0;
	    foreach($allExcelFileRecordLast as $variance)
	    {
	    	$variances[$c] = str_replace(",","",$variance[1]); 
	    	$c++;
	    }
	    $varin = array();
	    foreach($variances as $key=> $range)
		{
			if(count($variances)>($key+1))
			{
				$varin[] = number_format((2.303*log(($range/$variances[$key+1]),10))*100,2,".","");

			}
			else
			{
				$varin[] =  0;
			}
		}
	    $volatility = $this->chart_model->stats_standard_deviation($varin,1);
	    $dailyVolatility = number_format($volatility,2,".","");
	    $weeklyVolatility = number_format($dailyVolatility*sqrt(52),2,".","");
	    $yearlyVolatility = number_format($dailyVolatility*sqrt(252),2,".","");	

 		$dateOn = $allExcelFileRecordLast[0][0];
 		$priceOnDate = str_replace(",","", $allExcelFileRecordLast[0][1]);
 		//echo $priceOnDate;die;
 		$time = 1;
 		//$numberOfObservation = 252;
 		$numberOfObservation = 52;
 		$dT = $time/$numberOfObservation;
 		$factor1 = 0;
 		$factor2 = 0;
 		$factor1 = (($interestRate/100)-($dividend/100)-(pow(($weeklyVolatility/100),2))/2)*$dT;
 		$factor2 = ($weeklyVolatility/100)*sqrt($dT);
 		$numberOfStock = 1000;
 		$operationCost = $priceOnDate*$numberOfStock;

		$ar2=[];
		$ar3=[];
		$col=5;
		for($i=0;$i<$numberOfSimulation;$i++ )
		{
			$ar1=[];
			for ($j=0; $j <$col ; $j++) 
			{ 
				$ar="c$j";
				 if(count($ar1)==0)
				 {
				 	$ar1[$j]=number_format($priceOnDate,2,".","");
				 }
				 else
				 {
				 	if(count($ar1)==1)
				 	{
				 		$ar1[1]=number_format($ar1[0]*exp($factor1+$factor2*$this->NormSInv($this->randomZeroToOne())),2,".","");
				 	}
				 	else
				 	{
				 		$ar1[$j]= number_format($ar1[$j-1]*exp($factor1+$factor2*$this->NormSInv($this->randomZeroToOne())),2,".","");
				 	}				 	
				 }			 
			}

			$ar2[]=$ar1;
		}

		$cal0=[];
		$cal1=[];
		$cal2=[];
		$cal3=[];
		$cal4=[];
		$cal5=[];
		$cal6=[];
		$cal7=[];
		$ca29=[];
		foreach ($ar2 as $key => $value) 
		{		
			foreach ($value as $k => $vl) 
			{
				if($k==0)
				{
					$cal0[]=$vl;
				}
				else if($k==1)
				{
					$cal1[]=$vl;
				}
			 	else if($k==2)
				{
					$cal2[]=$vl;
				}
			 	else if($k==4)
				{
					$cal3[]=$vl;
				}
			}
		}
		//echo "<pre>";print_r($cal3);die;
 		$calculatedArr = $cal3;
 		$maximum = max($calculatedArr);
 		$manimum = min($calculatedArr);
 		$difference = 0;
 		$difference = $maximum-$manimum;
 		$range = 0;
 		$numberOfPeriod = 7;
 		$range = $difference/$numberOfPeriod;
 		//$range = number_format($range,2,".",""); 		
 		$dddd = 0;
 		$periodNumber1 = 0;
 		$last7period = array();
 		for($p=1;$p<=7;$p++)
 		{
 			if($p==1)
 			{
 				$periodNumber1 = $manimum+$range;
 				$periodNumber1 = number_format($periodNumber1,2,".","");
 			}
 			else
 			{
 				$periodNumber1 = $periodNumber1+$range;
 				$periodNumber1 = number_format($periodNumber1,2,".","");
 			}
 			$last7period[] = $periodNumber1;
 			$dddd++;
 		}
 		$res = array();
 		$KeyOfFrequency = array();
 		$lcount = 0;
 		$llccc = array();
 		$ab = 0;
 		$ac = 0;
 		$ad = 0;
 		$ae = 0;
 		$af = 0;
 		$ag = 0;
 		$ah = 0;
 		foreach($calculatedArr as $dd)
		{

			if($dd>=$manimum && $dd<=$last7period[0])
			{
				$ab++;
			}

			if($dd>$last7period[0] && $dd<=$last7period[1])
			{
				$ac++;
			}			
			
			if($dd>$last7period[1] && $dd<=$last7period[2])
			{
				$ad++;
			}			
			
			if($dd>$last7period[2] && $dd<=$last7period[3])
			{
				$ae++;
			}			
			if($dd>$last7period[3] && $dd<=$last7period[4])
			{
				$af++;
			}
			if($dd>$last7period[4] && $dd<=$last7period[5])
			{
				$ag++;
			}
			if($dd>$last7period[5] && $dd<=$last7period[6])
			{
				$ah++;
			}
		}
		$frequencyArrWithRange = array(
							''.$manimum.'-'.$last7period[0].''=>$ab,
							''.$last7period[0].'-'.$last7period[1].''=>$ac,
							''.$last7period[1].'-'.$last7period[2].''=>$ad,
							''.$last7period[2].'-'.$last7period[3].''=>$ae,
							''.$last7period[3].'-'.$last7period[4].''=>$af,
							''.$last7period[4].'-'.$last7period[5].''=>$ag,
							''.$last7period[5].'-'.$last7period[6].''=>$ah,

							);
		//echo "<pre>";print_r($frequencyArrWithRange);
		$frq = $frequencyArrWithRange;
		asort($frq);
		$arrqqqqq = array_reverse($frq);
		$fffsdfsdfsdsf = array_slice($arrqqqqq, 0, 3);
		$last3Key = '';
		foreach($fffsdfsdfsdsf as $kkkkkk=>$vvvvv)
		{
			$last3Key.= str_replace('-', ',', $kkkkkk).',';
		}
		//echo $last3Key;

		$getUsablePeriod = explode(',', rtrim($last3Key,','));
		sort($getUsablePeriod);
		//echo $priceOnDate."<br>";die;

 		$overallProfitPercent = 0;
 		$overallProfitPercent = number_format((array_sum($fffsdfsdfsdsf)*100)/$numberOfSimulation,2,".",""); ;

 		$lossRatio = 0;
 		$lossRatio = (current($getUsablePeriod)-$priceOnDate)*$numberOfStock;

 		$profitRatio = 0;
 		$profitRatio = (end($getUsablePeriod)-$priceOnDate)*$numberOfStock;


 		$lossRatioPercentage = 0;
 		$lossRatioPercentage = $lossRatio/$operationCost;

 		$profitRatioPercentage = 0;
 		$profitRatioPercentage = $profitRatio/$operationCost;

 		$absoluteRatio = 0;
 		$absoluteRatio = abs($profitRatioPercentage/$lossRatioPercentage);


 		$xLabel = '';
 		foreach($frequencyArrWithRange as $k=> $rng)
 		{
 			$xLabel.= "'[".$k."]'".",";
 		}
		
 		$c=$frequencyArrWithRange;
 		rsort($c);
 		$top3[0]=$c[0];
 		$top3[1]=$c[1];;
 		$top3[2]=$c[2];;
 		$carr=[];
 		foreach($frequencyArrWithRange as $color)
 		{
 			$clr="'#3768bd'";
 			if(in_array($color, $top3))
 			{
 				$clr="'#ec7c3c'";
 			}
 			$carr[]=$clr;	
 		}
 		
 		$chartConfigSimulations = '{
					      "type":"bar",
					      "plot": {
					        "styles": ['.implode(',', $carr).']
					      },
					      "scale-x":{
					        "labels":['.$xLabel.'],
					        "item":{  
					            "font-size":"12px",  
					            "font-color":"#063853",  
					            "font-weight":600,  
					        }
					      },
					      "series":[
					        {
					          "values": ['.implode(',', $frequencyArrWithRange).'],
					        },
					        
					      ]
					    }';
	    //echo $chartConfigSimulations;

	    $data["xLabel"] = $xLabel; 
	    $data["yValues"] = implode(',', $frequencyArrWithRange); 
	    $data["colors"] = implode(',', $carr); 
	    $data['overallProfitPercent'] = $overallProfitPercent;
	    $data['lossRatio'] = number_format($lossRatio,2,".","");
	    $data['profitRatio'] = number_format($profitRatio,2,".","");
	    $data['lossRatioPercentage'] = number_format($lossRatioPercentage*100,2,".","");
	    $data['profitRatioPercentage'] = number_format($profitRatioPercentage*100,2,".","");
	    $data['numberOfStock'] = $numberOfStock;
 		$data['operationCost'] = number_format($operationCost,2,".","");
 		$data['numberOfSimulation'] = $numberOfSimulation;

 		$data['graphs'] = $chartConfigSimulations;
		$this->load->view('page/portfolio/mobileSimulationGraph',$data);
	}

	function checkMoneyUsesByUser($user_id)

	{

		//$date = '2021-03-24';

		//echo date('D', strtotime($date))."<br>";

		$data = $this->common->checkMoneyUsesByUser($user_id);

		$trading = $this->common->checkTradingDiaryAdded($user_id);

		echo $trading;

		echo "<pre>";print_r($data);

		$remainingAmountToInvest = $data['rv'] - $trading;

		echo $remainingAmountToInvest; 

	}

	function calculateTotalAddedStockMoney($user_id,$stock_type)

	{

		$totalStcokPrice = $this->common->calculateTotalAddedStockMoney($user_id,$stock_type);

		echo $totalStcokPrice;



	}

	function checkTotalAddedStock($user_id)

	{

		$checkTotalAddedStock = $this->common->checkTotalAddedStock($user_id);

		echo $checkTotalAddedStock;

	}
	function getNumberOfSimultionByUserLevel($level)
	{
		$numOfSimulation = 1000;
		$getSimulation = $this->db->query("SELECT * FROM tbl_simulation_count_with_user_level  WHERE level='".$level."'");
		if($getSimulation->num_rows()>0)
		{
			$numOfSimulation = $getSimulation->row()->numberOfSimulation;
		}
		return $numOfSimulation;
	}
	function stock_portfolio($id='')
	{
		error_reporting(0);
		//echo "<pre>";print_r($this->session->userdata());die;
		$this->common->check_user_login();
		$data = array();
		$data['title'] = 'Stock Portfolio | Five Percent';
		$data['sub_title'] = 'Stock Portfolio';
		$user_id = $this->session->userdata('user_id');
		$countryID = $this->session->userdata('countryID');

		//238
		if($countryID==238)
		{
			$stockTYPE = 2;
		}
		else
		{
			$stockTYPE = 1;
		}
		$stocks1 = $this->db->query("SELECT a.id,a.user_id,a.stock_id,a.value,a.order_type,a.number,a.created_on,b.stock_name,b.stock_type FROM tbl_user_stock_management a INNER JOIN tbl_admin_stock b on a.stock_id=b.id WHERE a.user_id='".$user_id."' AND b.stock_type='".$stockTYPE."'")->result_array();
		//echo "<pre>";print_r($stocks1);die();
		//$stocks2 = $this->db->query("SELECT a.id,a.user_id,a.stock_id,a.value,a.number,a.order_type,a.created_on,b.stock_name,b.stock_type FROM tbl_user_stock_management a INNER JOIN tbl_admin_stock b on a.stock_id=b.id WHERE a.user_id='".$user_id."' AND b.stock_type=2")->result_array();
		//$List_of_added_Stock = array_merge($stocks1,$stocks2);
		$ids = '';
		foreach($stocks1 as $added_Stock)
		{
			$ids.= $added_Stock['stock_id'].',';
		}
		$ids = rtrim($ids,',');
		if(count($stocks1)>0)
		{
			$data['all_stock_lists'] = $this->db->query("SELECT id,stock_type,stock_name FROM tbl_admin_stock WHERE id NOT IN ($ids) AND stock_type='".$stockTYPE."' ORDER BY stock_name")->result();
		}
		else
		{
			$data['all_stock_lists'] = $this->db->query("SELECT id,stock_type,stock_name FROM tbl_admin_stock WHERE stock_type='".$stockTYPE."'  ORDER BY stock_name")->result();
		}
		//echo "<pre>";print_r($data['all_stock_lists']);die();

		$data['admin_stock_lists'] = $this->db->query("SELECT id,stock_type,stock_name FROM tbl_admin_stock WHERE stock_type='".$stockTYPE."' ORDER BY stock_name")->result();
		//$data['stocks'] = array_merge($stocks1,$stocks2);	
		$query = $this->db->query("SELECT a.id,a.user_id,a.stock_id,a.value,a.order_type,a.number,a.created_on,b.stock_name,b.price,b.stock_type FROM tbl_user_stock_management a INNER JOIN tbl_admin_stock b on a.stock_id=b.id WHERE a.user_id='".$user_id."' AND a.s_type=1 AND b.stock_type='".$stockTYPE."'");
		$totaldata = $query->num_rows();
		$totalPortfolio = 0;
		if($totaldata>0)
		{
			
			foreach($query->result() as $val)
			{
				$totalPortfolio+=($val->price*$val->number);
			}
			$data['totalPortfolio'] = $totalPortfolio;
		}
		else
		{
			$data['totalPortfolio'] = $totalPortfolio;
		}
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
			$page = ($this->uri->segment(4));
		}
		else
		{
			$page = 1;
		}
		$limit=5;
		$start_from = ($page-1) * $limit;
		$data['stocks'] = $this->db->query("SELECT a.id,a.user_id,a.stock_id,a.value,a.order_type,a.number,a.stock_price,a.created_on,b.stock_name,b.price,b.volatility,b.stock_type,b.id AS actual_stock_id,b.dividend,b.interest_rate FROM tbl_user_stock_management a INNER JOIN tbl_admin_stock b on a.stock_id=b.id WHERE a.user_id='".$user_id."' AND a.s_type=1 AND b.stock_type='".$stockTYPE."' ORDER BY a.id  DESC LIMIT $start_from,$limit ")->result_array();
		//echo "<pre>";print_r($data['stocks']);die;
		$str_links = $this->pagination->create_links();
	    $data["links"] = explode('&nbsp;',$str_links );

	    /* Simulation calculations */
	    $actual_stock_id = @$data['stocks'][0]['actual_stock_id'];
	    if($actual_stock_id!="")
	    {
	    	//echo $actual_stock_id;die();
		    $dividend = @$data['stocks'][0]['dividend'];
		    $numberOfSimulation = $this->getNumberOfSimultionByUserLevel($this->session->userdata('plan_id'));
		    $interestRate = @$data['stocks'][0]['interest_rate'];
		    $allExcelFileRecordLast = $this->chart_model->file_handling($actual_stock_id);
		    $allExcelFileRecordLast = array_slice($allExcelFileRecordLast, 0,$numberOfSimulation);  
		    //echo "<pre>";print_r($allExcelFileRecordLast);die;
		    $variances[0]  = 0;
		    $c = 0;
		    foreach($allExcelFileRecordLast as $variance)
		    {
		    	$variances[$c] = str_replace(",","",$variance[1]); 
		    	$c++;
		    }
		    //echo "<pre>";print_r($variances);die();
		    $varin = array();
		    foreach($variances as $key=> $range)
			{
				if(count($variances)>($key+1) && is_numeric($range))
				{
					if( is_numeric($variances[$key+1]) && $variances[$key+1]>0 )
					{
						$varin[] = number_format((2.303*log(($range/$variances[$key+1]),10))*100,2,".","");
					}
					else
					{
						$varin[] = 0;
					}
					
					//echo "1   ".$range."<br>";

				}
				else
				{
					$varin[] =  0;
					//echo "2   ".$range."<br>";
				}
			}
			//echo "<pre>";print_r($varin);
			//die();
		    $volatility = $this->chart_model->stats_standard_deviation($varin,1);
		    $dailyVolatility = number_format($volatility,2,".","");
		    $weeklyVolatility = number_format($dailyVolatility*sqrt(52),2,".","");
		    $yearlyVolatility = number_format($dailyVolatility*sqrt(252),2,".","");	

	 		$dateOn = $allExcelFileRecordLast[0][0];
	 		$priceOnDate = str_replace(",","", $allExcelFileRecordLast[0][1]);
	 		//echo $priceOnDate;die;
	 		$time = 1;
	 		//$numberOfObservation = 252;
	 		$numberOfObservation = 52;
	 		$dT = $time/$numberOfObservation;
	 		$factor1 = 0;
	 		$factor2 = 0;
	 		$factor1 = (($interestRate/100)-($dividend/100)-(pow(($weeklyVolatility/100),2))/2)*$dT;
	 		$factor2 = ($weeklyVolatility/100)*sqrt($dT);
	 		$numberOfStock = 1000;
	 		$operationCost = $priceOnDate*$numberOfStock;

			$ar2=[];
			$ar3=[];
			$col=5;
			for($i=0;$i<$numberOfSimulation;$i++ )
			{
				$ar1=[];
				for ($j=0; $j <$col ; $j++) 
				{ 
					$ar="c$j";
					 if(count($ar1)==0)
					 {
					 	$ar1[$j]=number_format($priceOnDate,2,".","");
					 }
					 else
					 {
					 	if(count($ar1)==1)
					 	{
					 		$ar1[1]=number_format($ar1[0]*exp($factor1+$factor2*$this->NormSInv($this->randomZeroToOne())),2,".","");
					 	}
					 	else
					 	{
					 		$ar1[$j]= number_format($ar1[$j-1]*exp($factor1+$factor2*$this->NormSInv($this->randomZeroToOne())),2,".","");
					 	}				 	
					 }			 
				}

				$ar2[]=$ar1;
			}

			$cal0=[];
			$cal1=[];
			$cal2=[];
			$cal3=[];
			$cal4=[];
			$cal5=[];
			$cal6=[];
			$cal7=[];
			$ca29=[];
			foreach ($ar2 as $key => $value) 
			{		
				foreach ($value as $k => $vl) 
				{
					if($k==0)
					{
						$cal0[]=$vl;
					}
					else if($k==1)
					{
						$cal1[]=$vl;
					}
				 	else if($k==2)
					{
						$cal2[]=$vl;
					}
				 	else if($k==4)
					{
						$cal3[]=$vl;
					}
				}
			}
			//echo "<pre>";print_r($cal3);die;
	 		$calculatedArr = $cal3;
	 		$maximum = max($calculatedArr);
	 		$manimum = min($calculatedArr);
	 		$difference = 0;
	 		$difference = $maximum-$manimum;
	 		$range = 0;
	 		$numberOfPeriod = 7;
	 		$range = $difference/$numberOfPeriod;
	 		//$range = number_format($range,2,".",""); 		
	 		$dddd = 0;
	 		$periodNumber1 = 0;
	 		$last7period = array();
	 		for($p=1;$p<=7;$p++)
	 		{
	 			if($p==1)
	 			{
	 				$periodNumber1 = $manimum+$range;
	 				$periodNumber1 = number_format($periodNumber1,2,".","");
	 			}
	 			else
	 			{
	 				$periodNumber1 = $periodNumber1+$range;
	 				$periodNumber1 = number_format($periodNumber1,2,".","");
	 			}
	 			$last7period[] = $periodNumber1;
	 			$dddd++;
	 		}
	 		$res = array();
	 		$KeyOfFrequency = array();
	 		$lcount = 0;
	 		$llccc = array();
	 		$ab = 0;
	 		$ac = 0;
	 		$ad = 0;
	 		$ae = 0;
	 		$af = 0;
	 		$ag = 0;
	 		$ah = 0;
	 		foreach($calculatedArr as $dd)
			{

				if($dd>=$manimum && $dd<=$last7period[0])
				{
					$ab++;
				}

				if($dd>$last7period[0] && $dd<=$last7period[1])
				{
					$ac++;
				}			
				
				if($dd>$last7period[1] && $dd<=$last7period[2])
				{
					$ad++;
				}			
				
				if($dd>$last7period[2] && $dd<=$last7period[3])
				{
					$ae++;
				}			
				if($dd>$last7period[3] && $dd<=$last7period[4])
				{
					$af++;
				}
				if($dd>$last7period[4] && $dd<=$last7period[5])
				{
					$ag++;
				}
				if($dd>$last7period[5] && $dd<=$last7period[6])
				{
					$ah++;
				}
			}
			$frequencyArrWithRange = array(
								''.$manimum.'-'.$last7period[0].''=>$ab,
								''.$last7period[0].'-'.$last7period[1].''=>$ac,
								''.$last7period[1].'-'.$last7period[2].''=>$ad,
								''.$last7period[2].'-'.$last7period[3].''=>$ae,
								''.$last7period[3].'-'.$last7period[4].''=>$af,
								''.$last7period[4].'-'.$last7period[5].''=>$ag,
								''.$last7period[5].'-'.$last7period[6].''=>$ah,

								);
			//echo "<pre>";print_r($frequencyArrWithRange);
			$frq = $frequencyArrWithRange;
			asort($frq);
			$arrqqqqq = array_reverse($frq);
			$fffsdfsdfsdsf = array_slice($arrqqqqq, 0, 3);
			$last3Key = '';
			foreach($fffsdfsdfsdsf as $kkkkkk=>$vvvvv)
			{
				$last3Key.= str_replace('-', ',', $kkkkkk).',';
			}
			//echo $last3Key;

			$getUsablePeriod = explode(',', rtrim($last3Key,','));
			sort($getUsablePeriod);
			//echo $priceOnDate."<br>";die;

	 		$overallProfitPercent = 0;
	 		$overallProfitPercent = number_format((array_sum($fffsdfsdfsdsf)*100)/$numberOfSimulation,2,".",""); ;

	 		$lossRatio = 0;
	 		$lossRatio = (current($getUsablePeriod)-$priceOnDate)*$numberOfStock;

	 		$profitRatio = 0;
	 		$profitRatio = (end($getUsablePeriod)-$priceOnDate)*$numberOfStock;


	 		$lossRatioPercentage = 0;
	 		if($operationCost>0)
	 		{
	 			$lossRatioPercentage = $lossRatio/$operationCost;
	 		}
	 		

	 		$profitRatioPercentage = 0;
	 		if($operationCost>0)
	 		{
	 			$profitRatioPercentage = $profitRatio/$operationCost;
	 		}
	 		

	 		$absoluteRatio = 0;
	 		if($lossRatioPercentage>0)
	 		{
	 			$absoluteRatio = abs($profitRatioPercentage/$lossRatioPercentage);
	 		}
	 		


	 		$xLabel = '';
	 		foreach($frequencyArrWithRange as $k=> $rng)
	 		{
	 			$xLabel.= "'[".$k."]'".",";
	 		}
			//echo "<pre>";print_r($frequencyArrWithRange);die();
	 		$c=$frequencyArrWithRange;
	 		rsort($c);
	 		$top3[0]=$c[0];
	 		$top3[1]=$c[1];;
	 		$top3[2]=$c[2];;
	 		$carr=[];
	 		foreach($frequencyArrWithRange as $color)
	 		{
	 			$clr="'#3768bd'";
	 			if(in_array($color, $top3))
	 			{
	 				$clr="'#ec7c3c'";
	 			}
	 			$carr[]=$clr;	
	 		}
	 		
	 		$chartConfigSimulations = '{
						      "type":"bar",
						      "plot": {
						        "styles": ['.implode(',', $carr).']
						      },
						      "scale-x":{
						        "labels":['.$xLabel.'],
						        "item":{  
						            "font-size":"12px",  
						            "font-color":"#063853",  
						            "font-weight":600,  
						        }
						      },
						      "series":[
						        {
						          "values": ['.implode(',', $frequencyArrWithRange).'],
						        },
						        
						      ]
						    }';
		    //echo $chartConfigSimulations;

		    $data["xLabel"] = $xLabel; 
		    $data["yValues"] = implode(',', $frequencyArrWithRange); 
		    $data["colors"] = implode(',', $carr); 
		    $data['overallProfitPercent'] = $overallProfitPercent;
		    $data['lossRatio'] = number_format($lossRatio,2,".","");
		    $data['profitRatio'] = number_format($profitRatio,2,".","");
		    $data['lossRatioPercentage'] = number_format($lossRatioPercentage*100,2,".","");
		    $data['profitRatioPercentage'] = number_format($profitRatioPercentage*100,2,".","");
		    $data['numberOfStock'] = $numberOfStock;
	 		$data['operationCost'] = number_format($operationCost,2,".","");
	 		$data['numberOfSimulation'] = $numberOfSimulation;

	 		$data['graphs'] = $chartConfigSimulations;

	    }
	    $data['checkActualStockId'] = $actual_stock_id;
		$this->load->view('page/portfolio/stock_portfolio',$data);

	}
	function frequencyDistribution($data)
	{
		$maxBins = 7;  // if no maximum bins needed set to 0.
		$maxRangePerBin = 0; // if no range per bin needed, set to 0.
		$min = min($data);
		$max = max($data);
		$labels = [];
		$res = [];
		if ($maxRangePerBin > 0) {
		    $expectedBins = ceil(($max - $min) / $maxRangePerBin);
		    $valuePerBin = $maxRangePerBin;
		} else {
		    $maxBins = $maxBins > 0 ? $maxBins : 10;  // if no maximum number of bins set, set maxBins to 10.
		    $valuePerBin = ceil(($max - $min) / $maxBins);
		    $expectedBins = $maxBins;
		}
		if ($maxBins > 0) {
		    $totalBins = $maxBins;
		} else {
		    $totalBins = $expectedBins;
		}
		sort($data);
		for ($i = 0; $i < $totalBins; $i++) {
		    $count = 0;
		    if ($maxBins > 0 && $i == $totalBins - 1) {
		        foreach ($data as $key => $number) {
		            $count++;
		            unset($data[$key]);
		        }
		    } else {
		        foreach ($data as $key => $number) {
		            if ($number <= (($min + ($valuePerBin - 1)) + ($i * $valuePerBin))) {
		                $count++;
		                unset($data[$key]);
		            }
		        }
		    }
		    if ($maxBins > 0 && $i == $totalBins - 1 && $maxRangePerBin != 0) {
		        if ($count > 0) {
		            $labels[$i] = ">= " . ($min + ($i * $valuePerBin));
		            $res[$i] = $count;
		        }
		    } else if (count($data) > 0 || $count > 0) {
		        $res[$i] = $count;
		        $labels[$i] = ($min + ($i * $valuePerBin)) . '-' . (($min + ($valuePerBin - 1)) + ($i * $valuePerBin));
		    }
		}
		return array("labels" => $labels, "values" => $res);
	}
	
	function getSimulationOverAllLossProfitPercentage()
	{
		$actual_stock_id = $this->input->post('stock_id');
		$parameter = $this->input->post('parameter');
		$numberOfStock = $this->input->post('numberOfStock');
		//echo "<pre>";print_r($this->input->post());die();
		//echo $this->input->post('type');die;
		if($this->input->post('type')==0)
		{
			$catINStok = 0;
			$stockDetail = $this->db->query("SELECT * FROM tbl_admin_stock WHERE id='".$actual_stock_id."'")->row();
			$numberOfSimulation = $this->getNumberOfSimultionByUserLevel(1);
		}
		else
		{
			$catINStok = 1;
			$stockDetail = $this->db->query("SELECT * FROM tbl_admin_investments WHERE investments_id='".$actual_stock_id."'")->row();
			$numberOfSimulation = $this->getNumberOfSimultionByUserLevel($this->session->userdata('plan_id'));
		}
		//echo $catINStok;die();
		//echo "<pre>";print_r($stockDetail);die();
		//$stockDetail = $this->db->query("SELECT * FROM tbl_admin_stock WHERE id='".$actual_stock_id."'")->row();
	    $dividend = @$stockDetail->dividend;
	    
	    $interestRate = @$stockDetail->interest_rate;
	    $allExcelFileRecordLast = $this->chart_model->file_handling($actual_stock_id,$catINStok);
	    //echo "<pre>";print_r($allExcelFileRecordLast);die();
	    $allExcelFileRecordLast = array_slice($allExcelFileRecordLast, 0,$numberOfSimulation); 
	    
	    $variances[0]  = 0;
	    $c = 0;
	    foreach($allExcelFileRecordLast as $variance)
	    {
	    	$variances[$c] = str_replace(",","",$variance[1]); 
	    	$c++;
	    }
	    $varin = array();
	    //echo print_r($variances);die();
	    foreach($variances as $key=> $range)
		{
				if(count($variances)>($key+1) && $variances[$key+1] && is_numeric($range))
				{
					if(is_numeric($variances[$key+1]))
					{
						$varin[] = number_format((2.303*log(($range/$variances[$key+1]),10))*100,2,".","");
					}
					else
					{
						$varin[] =  0;
					}
					
				}
				else
				{
					$varin[] =  0;
				}
			
		}
		//echo print_r($varin);die();
	    $volatility = $this->chart_model->stats_standard_deviation($varin,1);
	    $dailyVolatility = number_format($volatility,2,".","");
	    $weeklyVolatility = number_format($dailyVolatility*sqrt(52),2,".","");
	    $yearlyVolatility = number_format($dailyVolatility*sqrt(252),2,".","");	
 		$dateOn = $allExcelFileRecordLast[0][0];
 		$priceOnDate = str_replace(",","", $allExcelFileRecordLast[0][1]); 
 		$numberOfObservation = 0;
 		if($parameter==1)
 		{
 			$selected = 1;
	 		$days = 10;
	 		$weeks = 8;
	 		$dailyVolatility = $weeklyVolatility;
	 		$numberOfObservation = 52;
 		}
 		else if($parameter==12)
 		{
 			$selected = 2;
	 		$days = 30;
	 		$weeks = $parameter;
	 		$dailyVolatility = $weeklyVolatility;
	 		$numberOfObservation = 52;
 		}
 		else if($parameter==24)
 		{
 			$selected = 2;
	 		$days = 30;
	 		$weeks = $parameter;
	 		$dailyVolatility = $weeklyVolatility;
	 		$numberOfObservation = 52;
 		}
 		else if($parameter==48)
 		{
 			$selected = 2;
	 		$days = 30;
	 		$weeks = $parameter;
	 		$dailyVolatility = $yearlyVolatility;
	 		$numberOfObservation = 1;
 		}
 		$time = 1;
 		$dT = $time/$numberOfObservation;
 		$factor1 = 0;
 		$factor2 = 0;
 		$factor1 = (($interestRate/100)-($dividend/100)-(pow(($dailyVolatility/100),2))/2)*$dT;
 		$factor2 = ($dailyVolatility/100)*sqrt($dT);
 		$operationCost = $priceOnDate*$numberOfStock;		
 		if($selected == 1)
 		{
 			for($ss=1;$ss<=$days;$ss++)
 			{
 				$periodss[$ss] = $ss;
 			}
 		}
 		else if($selected==2)
 		{
 			for($ss=1;$ss<=$weeks;$ss++)
 			{
 				$periodss[$ss] = $ss;
 			}
 		}
 		//echo count($periodss);die;
 		$ar2=[];
		$ar3=[];
		//$col=30;
		$col=count($periodss);
		//echo $col."<br>";
		for($i=0;$i<$numberOfSimulation;$i++ )
		{
			$ar1=[];
			for ($j=0; $j <$col ; $j++) 
			{ 
				$ar="c$j";
				 if(count($ar1)==0)
				 {
				 	$ar1[$j]=number_format($priceOnDate,2,".","");
				 }
				 else
				 {
				 	if(count($ar1)==1)
				 	{
				 		$ar1[1]=number_format($ar1[0]*exp($factor1+$factor2*$this->NormSInv($this->randomZeroToOne())),2,".","");
				 	}
				 	else
				 	{
				 		$ar1[$j]= number_format($ar1[$j-1]*exp($factor1+$factor2*$this->NormSInv($this->randomZeroToOne())),2,".","");
				 	}				 	
				 }			 
			}
			$ar2[]=$ar1;
		}
		$lastArrRecord = array();
		if($parameter==1)
		{
			//echo "1<br>";
			foreach ($ar2 as $key => $value) 
			{		
				foreach ($value as $k => $vl) 
				{
					//if()
					if($k==4)
					{
						$lastArrRecord[]=$vl;
					}
				}
			}
		}
		else if($parameter==12)
		{
			//echo "12<br>";
			foreach ($ar2 as $key => $value) 
			{		
				foreach ($value as $k => $vl) 
				{
					if($k==11)
					{
						$lastArrRecord[]=$vl;
					}
				}
			}
		}
		else if($parameter==24)
		{
			//echo "24<br>";
			foreach ($ar2 as $key => $value) 
			{		
				foreach ($value as $k => $vl) 
				{
					if($k==23)
					{
						$lastArrRecord[]=$vl;
					}
				}
			}
		}
		else if($parameter==48)
		{
			foreach ($ar2 as $key => $value) 
			{		
				foreach ($value as $k => $vl) 
				{
					if($k==47)
					{
						$lastArrRecord[]=$vl;
					}
				}
			}
		}	
 		$calculatedArr = $lastArrRecord;
 		$maximum = max($calculatedArr);
 		$manimum = min($calculatedArr);
 		$difference = 0;
 		$difference = $maximum-$manimum;
 		$range = 0;
 		$numberOfPeriod = 7;
 		$range = $difference/$numberOfPeriod;
 		//$range =number_format($range,2,".","");
 		$dddd = 0;
 		$periodNumber1 = 0;
 		$last7period = array();
 		for($p=1;$p<=7;$p++)
 		{
 			if($p==1)
 			{
 				$periodNumber1 = $manimum+$range;
 				$periodNumber1 = number_format($periodNumber1,2,".","");
 			}
 			else
 			{
 				$periodNumber1 = $periodNumber1+$range;
 				$periodNumber1 = number_format($periodNumber1,2,".","");
 			}
 			$last7period[] = $periodNumber1;
 			$dddd++;
 		}
 		$res = array();
 		$KeyOfFrequency = array();
 		$lcount = 0;
 		$llccc = array();
 		$ab = 0;
 		$ac = 0;
 		$ad = 0;
 		$ae = 0;
 		$af = 0;
 		$ag = 0;
 		$ah = 0;
 		foreach($calculatedArr as $dd)
		{

			if($dd>=$manimum && $dd<=$last7period[0])
			{
				$ab++;
			}

			if($dd>$last7period[0] && $dd<=$last7period[1])
			{
				$ac++;
			}			
			
			if($dd>$last7period[1] && $dd<=$last7period[2])
			{
				$ad++;
			}			
			
			if($dd>$last7period[2] && $dd<=$last7period[3])
			{
				$ae++;
			}			
			if($dd>$last7period[3] && $dd<=$last7period[4])
			{
				$af++;
			}
			if($dd>$last7period[4] && $dd<=$last7period[5])
			{
				$ag++;
			}
			if($dd>$last7period[5] && $dd<=$last7period[6])
			{
				$ah++;
			}
		}
		$frequencyArrWithRange = array(
							''.$manimum.'-'.$last7period[0].''=>$ab,
							''.$last7period[0].'-'.$last7period[1].''=>$ac,
							''.$last7period[1].'-'.$last7period[2].''=>$ad,
							''.$last7period[2].'-'.$last7period[3].''=>$ae,
							''.$last7period[3].'-'.$last7period[4].''=>$af,
							''.$last7period[4].'-'.$last7period[5].''=>$ag,
							''.$last7period[5].'-'.$last7period[6].''=>$ah,
							);

		$frq = $frequencyArrWithRange;
		asort($frq);
		$arrqqqqq = array_reverse($frq);
		$fffsdfsdfsdsf = array_slice($arrqqqqq, 0, 3);
		$last3Key = '';
		foreach($fffsdfsdfsdsf as $kkkkkk=>$vvvvv)
		{
			$last3Key.= str_replace('-', ',', $kkkkkk).',';
		}
		$getUsablePeriod = explode(',', rtrim($last3Key,','));
		sort($getUsablePeriod);

 		$overallProfitPercent = 0;
 		$overallProfitPercent = (array_sum($fffsdfsdfsdsf)*100)/$numberOfSimulation;
 		
 		$lossRatio = 0;
 		$lossRatio = (current($getUsablePeriod)-$priceOnDate)*$numberOfStock;

 		$profitRatio = 0;
 		$profitRatio = (end($getUsablePeriod)-$priceOnDate)*$numberOfStock;


 		$lossRatioPercentage = 0;
 		$lossRatioPercentage = ($lossRatio/$operationCost)*100;

 		$profitRatioPercentage = 0;
 		$profitRatioPercentage = ($profitRatio/$operationCost)*100;

 		$absoluteRatio = 0;
 		$absoluteRatio = abs($profitRatioPercentage/$lossRatioPercentage);

 		$xLabel = '';
 		foreach($frequencyArrWithRange as $k=> $rng)
 		{
 			$xLabel.= "'[".$k."]'".",";
 		}
 		$c=$frequencyArrWithRange;
 		rsort($c);
 		$top3[0]=$c[0];
 		$top3[1]=$c[1];;
 		$top3[2]=$c[2];;
 		$carr=[];
 		foreach($frequencyArrWithRange as $color)
 		{
 			$clr="'#3768bd'";
 			if(in_array($color, $top3))
 			{
 				$clr="'#ec7c3c'";
 			}
 			$carr[]=$clr;	
 		}
        $chartConfigSimulations = '{
					      "type":"bar",
					      "plot": {
					        "styles": ['.implode(',', $carr).']
					      },
					      "scale-x":{
					        "labels":['.$xLabel.'],
					        "item":{  
					            "font-size":"12px",  
					            "font-color":"#063853",  
					            "font-weight":600,  
					        }
					      },
					      "series":[
					        {
					          "values": ['.implode(',', $frequencyArrWithRange).'],
					        },
					        
					      ]
					    }';
	   // echo $chartConfigSimulations;

 		$arryRecord = array(
 							'overallProfitPercent'=>number_format($overallProfitPercent,2,".",""),
 							'lossRatio'=>number_format($lossRatio),
 							'profitRatio'=>number_format($profitRatio),
 							'lossRatioPercentage'=>number_format($lossRatioPercentage,2,".",""),
 							'profitRatioPercentage'=>number_format($profitRatioPercentage,2,".",""),
 							'absoluteRatio'=>number_format($absoluteRatio,2,".",""),
 							'numberOfStock'=>number_format($numberOfStock),
 							'operationCost'=>number_format($operationCost),
 							'numberOfSimulation'=>number_format($numberOfSimulation),
 							'graphs'=>$chartConfigSimulations,
 							);
 		//echo "<pre>";print_r($arryRecord);die;
 		echo json_encode($arryRecord);
 		
	}

	function funcheck($priceOnDate,$factor1,$factor2)

	{

		$lastVal = $priceOnDate*exp($factor1+$factor2*$this->NormSInv($this->randomZeroToOne()));

		return $lastVal;

	}

	function frequency($arr)

	{

		$r = array_count_values($arr);

		$k = array_search(max($r), $r);

		return $k;

	}

	function randomZeroToOne()

	{

		/*$max =0.99999;

		$min = 0.1;

		$range = $max - $min;

	    $num = $min + $range * (mt_rand() / mt_getrandmax());    

	    $num = round($num, 2);

	    return ((float) $num);*/

	    return (float)rand() / (float)getrandmax();

	}

	function NormSInv($probability) 

	{

	  $a1 = -39.6968302866538; 

	  $a2 = 220.946098424521;

	  $a3 = -275.928510446969;

	  $a4 = 138.357751867269;

	  $a5 = -30.6647980661472;

	  $a6 = 2.50662827745924;



	  $b1 = -54.4760987982241;

	  $b2 = 161.585836858041;

	  $b3 = -155.698979859887;

	  $b4 = 66.8013118877197;

	  $b5 = -13.2806815528857;

	  

	  $c1 = -7.78489400243029E-03;

	  $c2 = -0.322396458041136;

	  $c3 = -2.40075827716184;

	  $c4 = -2.54973253934373;

	  $c5 = 4.37466414146497;

	  $c6 = 2.93816398269878;



	  $d1 = 7.78469570904146E-03;

	  $d2 = 0.32246712907004;

	  $d3 = 2.445134137143;

	  $d4 =  3.75440866190742;



	  $p_low = 0.02425;

	  $p_high = 1 - $p_low;

	  $q = 0;

	  $r = 0;

	  $normSInv = 0;

	  if ($probability < 0 ||

	    $probability > 1)

	  {

	    throw new \Exception("normSInv: Argument out of range.");

	  } else if ($probability < $p_low) {



	    $q = sqrt(-2 * log($probability));

	    $normSInv = ((((($c1 * $q + $c2) * $q + $c3) * $q + $c4) * $q + $c5) * $q + $c6) / (((($d1 * $q + $d2) * $q + $d3) * $q + $d4) * $q + 1);



	  } else if ($probability <= $p_high) {



	    $q = $probability - 0.5;

	    $r = $q * $q;

	    $normSInv = ((((($a1 * $r + $a2) * $r + $a3) * $r + $a4) * $r + $a5) * $r + $a6) * $q / ((((($b1 * $r + $b2) * $r + $b3) * $r + $b4) * $r + $b5) * $r + 1);



	  } else {



	    $q = sqrt(-2 * log(1 - $probability));

	    $normSInv = -((((($c1 * $q + $c2) * $q + $c3) * $q + $c4) * $q + $c5) * $q + $c6) /(((($d1 * $q + $d2) * $q + $d3) * $q + $d4) * $q + 1);

	  

	  }



	  return $normSInv;

	}



	/********************************/

	function option_portfolio()

	{

		$this->common->check_user_login();

		$data = array();

		$data['title'] = 'Option Portfolio | Five Percent';

		$data['sub_title'] = 'Option';

		$user_id = $this->session->userdata('user_id');

		//print_r($this->common->checkMoneyUsesByUser($user_id));die;

		$totaldata = $this->db->query("SELECT * FROM tbl_user_stock_management WHERE user_id='".$user_id."' AND s_type=3")->num_rows();

		$config = array();

		$config["base_url"] = base_url() . "users/portfolio/option_portfolio";

		

		$config["total_rows"] = $totaldata;

		$config["per_page"] = 5;

		$config['use_page_numbers'] = TRUE;

		$config['num_links'] = $totaldata;

		$config['cur_tag_open'] = '&nbsp;<a class="current">';

		$config['cur_tag_close'] = '</a>';

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



		$data['stocks'] = $this->db->query("SELECT * FROM tbl_user_stock_management WHERE user_id='".$user_id."' AND s_type=3 ORDER BY id  DESC LIMIT $start_from,$limit ")->result_array();

		//echo "<pre>";print_r($data['stocks']);die;

		$str_links = $this->pagination->create_links();

	    $data["links"] = explode('&nbsp;',$str_links );	

		$this->load->view('page/portfolio/option_portfolio',$data);

	}

	function add_stock_ajax()

	{

		$this->common->ajax_check_user_login();

		//echo "<pre>";print_r($_POST);die;

		$user_id = $this->session->userdata('user_id');

		$created_on = date("Y-m-d H:i:s");

		$stock_name = $this->input->post('stock_name');

		$s_type = $this->input->post('s_type');

		//$number = $this->input->post('number');



		$checkExistingStock = $this->db->query("SELECT * FROM tbl_user_stock_management WHERE user_id='".$user_id."' AND stock_id='".$stock_name."'");

		if($checkExistingStock->num_rows()<1)

		{

			$insertData = array(

							'user_id'=>$user_id,

							'stock_id'=>$stock_name,

							's_type'=>$s_type,

							'number'=>0,

							'created_on'=>$created_on,

							);

			$this->db->insert('tbl_user_stock_management',$insertData);

			echo 1;

		}

		else

		{

			echo 2;

		}

		

	}

	function add_option_stock_ajax()

	{

		$this->common->ajax_check_user_login();

		$user_id = $this->session->userdata('user_id');

		$created_on = date("Y-m-d H:i:s");

		$stock_name = $this->input->post('stock_name');

		$stock_price = $this->input->post('stock_price');

		$stock_type = $this->input->post('stock_type');

		$number = $this->input->post('number');

		$s_type = $this->input->post('s_type');

		$insertData = array(

							'user_id'=>$user_id,

							'stock_id'=>0,

							'order_type'=>$stock_type,

							'number'=>$number,

							's_type'=>$s_type,

							'stock_name'=>$stock_name,

							'stock_price'=>$stock_price,

							'created_on'=>$created_on,

							);

		$totalRemaingBalance = $this->common->checkMoneyUsesByUser($user_id)['totalCanInvest']-$this->common->checkTotalAddedStock($user_id);



		if($totalRemaingBalance>=($stock_price*$number))

		{

			$remainingAmountToAdd = $this->common->checkMoneyUsesByUser($user_id)['options']-$this->common->calculateTotalAddedStockMoney($user_id,$s_type);



			if($remainingAmountToAdd>=($stock_price*$number))

			{

				$this->db->insert('tbl_user_stock_management',$insertData);

				$responseArr = array(

									'res'=>1,

									'canSpendAmount'=>$this->common->checkMoneyUsesByUser($user_id)['options'],

									'canSpendPercent'=>$this->common->checkMoneyUsesByUser($user_id)['option_percent'],

									'alreadyInvestedAmount'=>$this->common->calculateTotalAddedStockMoney($user_id,$s_type),

									'remainingAmountToInvest'=>$this->common->checkMoneyUsesByUser($user_id)['options']-$this->common->calculateTotalAddedStockMoney($user_id,$s_type)

									);

				echo json_encode($responseArr);							

			}

			else

			{

				

				$totalRemainingAmountToAdd = $this->common->checkMoneyUsesByUser($user_id)['totalCanInvest']-$this->common->checkTotalAddedStock($user_id);

				if($totalRemainingAmountToAdd>=($stock_price*$number))

				{

					$responseArr = array(

									'res'=>2,

									'canSpendAmount'=>$this->common->checkMoneyUsesByUser($user_id)['options'],

									'canSpendPercent'=>$this->common->checkMoneyUsesByUser($user_id)['option_percent'],

									'alreadyInvestedAmount'=>$this->common->calculateTotalAddedStockMoney($user_id,$s_type),

									'remainingAmountToInvest'=>$this->common->checkMoneyUsesByUser($user_id)['options']-$this->common->checkTotalAddedStock($user_id)

									);

					echo json_encode($responseArr);

				}

				else

				{

					$responseArr = array(

								'res'=>3,

								'totalCanInvest'=>$this->common->checkMoneyUsesByUser($user_id)['totalCanInvest'],

								'remaingInvest'=>$this->common->checkMoneyUsesByUser($user_id)['totalCanInvest']-$this->common->checkTotalAddedStock($user_id),

								'alreadyInvested'=>$this->common->checkTotalAddedStock($user_id),

								'totalPercentCanInvest'=>$this->common->checkMoneyUsesByUser($user_id)['total_percent']

								);

					echo json_encode($responseArr);

				}

				

			}

		}

		else

		{

			$responseArr = array(

								'res'=>3,

								'totalCanInvest'=>$this->common->checkMoneyUsesByUser($user_id)['totalCanInvest'],

								'remaingInvest'=>$this->common->checkMoneyUsesByUser($user_id)['totalCanInvest']-$this->common->checkTotalAddedStock($user_id),

								'alreadyInvested'=>$this->common->checkTotalAddedStock($user_id),

								'totalPercentCanInvest'=>$this->common->checkMoneyUsesByUser($user_id)['total_percent']

								);

			echo json_encode($responseArr);

		}

	}

	function add_option_stock_against_suggestions_ajax()

	{

		$this->common->ajax_check_user_login();

		$user_id = $this->session->userdata('user_id');

		$created_on = date("Y-m-d H:i:s");

		$stock_name = $this->input->post('stock_name');

		$stock_price = $this->input->post('stock_price');

		$stock_type = $this->input->post('stock_type');

		$number = $this->input->post('number');

		$s_type = $this->input->post('s_type');

		$insertData = array(

							'user_id'=>$user_id,

							'stock_id'=>0,

							'order_type'=>$stock_type,

							'number'=>$number,

							's_type'=>$s_type,

							'stock_name'=>$stock_name,

							'stock_price'=>$stock_price,

							'created_on'=>$created_on,

							);

		$totalRemainingAmountToAdd = $this->common->checkMoneyUsesByUser($user_id)['totalCanInvest']-$this->common->checkTotalAddedStock($user_id);

		if($totalRemainingAmountToAdd>=($stock_price*$number))

		{

			$this->db->insert('tbl_user_stock_management',$insertData);

			$responseArr = array(

							'res'=>1,

							'canSpendAmount'=>$this->common->checkMoneyUsesByUser($user_id)['options'],

							'canSpendPercent'=>$this->common->checkMoneyUsesByUser($user_id)['option_percent'],

							'alreadyInvestedAmount'=>$this->common->calculateTotalAddedStockMoney($user_id,$s_type),

							'remainingAmountToInvest'=>$this->common->checkMoneyUsesByUser($user_id)['options']-$this->common->calculateTotalAddedStockMoney($user_id,$s_type)

							);

			echo json_encode($responseArr);

		}

		else

		{

			$responseArr = array(

						'res'=>2,

						'totalCanInvest'=>$this->common->checkMoneyUsesByUser($user_id)['totalCanInvest'],

						'remaingInvest'=>$totalRemainingAmountToAdd,

						'alreadyInvested'=>$this->common->checkTotalAddedStock($user_id),

						'totalPercentCanInvest'=>$this->common->checkMoneyUsesByUser($user_id)['total_percent']

						);

			echo json_encode($responseArr);

		}

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



	function show_investments_info_ajax()

	{

		$this->common->ajax_check_user_login();

		$user_id = $this->session->userdata('user_id');

		$investment_id = $this->input->post('id');

		$resultArray = $this->db->query("SELECT fund_description as info FROM tbl_admin_investments WHERE investments_id='".$investment_id."'")->row();

		echo $resultArray->info;

	

	}

	function filter_option_select_ajax()

	{

		$this->common->ajax_check_user_login();

		$user_id = $this->session->userdata('user_id');
		$countryID = $this->session->userdata('countryID');
		//238
		if($countryID==238)
		{
			$stockTYPE = 2;
		}
		else
		{
			$stockTYPE = 1;
		}

		$s_type = $this->input->post('s_type');

		$option = $this->input->post('id');

		$page = $this->input->post('page');

		$limit=5;

		$start_from = ($page-1) * $limit;



		$List_of_added_Stock = $this->db->query("SELECT a.id,a.user_id,a.stock_id,a.value,a.order_type,a.number,a.created_on,b.stock_name,b.price,b.volatility,b.stock_type,b.beta,b.dividend FROM tbl_user_stock_management a INNER JOIN tbl_admin_stock b on a.stock_id=b.id WHERE a.user_id='".$user_id."' AND a.s_type='".$s_type."' AND b.stock_type='".$stockTYPE."' ORDER BY a.id DESC LIMIT  $start_from,$limit")->result();

		$dataArr = array();

		$recordArr = array();

		foreach($List_of_added_Stock as $stk)

		{

			$dataArr['id'] = $stk->id;

			$dataArr['user_id'] = $stk->user_id;

			$dataArr['stock_id'] = $stk->stock_id;

			$dataArr['value'] = $stk->value;

			$dataArr['order_type'] = $stk->order_type;

			$dataArr['number'] = $stk->number;

			$dataArr['created_on'] = $stk->created_on;

			$dataArr['stock_name'] = $stk->stock_name;

			$dataArr['price'] = $stk->price;			

			$dataArr['stock_type'] = $stk->stock_type;

			if($option=="volatility")

			{

				$dataArr['volatility'] = number_format($stk->volatility*sqrt(252),2,".","")."%";

			}

			else if($option=="Beta")

			{

				$dataArr['volatility'] = $stk->beta;

			}

			else

			{

				$dataArr['volatility'] = $stk->dividend;

			}

			

			array_push($recordArr, $dataArr);

			

		}

		echo json_encode($recordArr);

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

	function getVariance($array10)
	{
		//echo (2.303*log((8.73/8.106),10)); // number_format((2.303*log((10.802/10.8),10)),2,".","");
		//die;
		//$array10 = array_reverse($array10);
		//echo "<pre>";print_r($array10);die;
		$variance1 = array();
		foreach($array10 as $key=> $vr1)
		{
			if(count($array10)>$key+1)
			{
				if($array10[$key+1]>0 && is_numeric($vr1))
				{
					//$variance1[]=number_format((2.303*log(($vr1/$array10[$key+1]),10)),2,".","");	
					//$aaa = $vr1/$array10[$key+1];
					//echo $aaa."===".$vr1."==".$array10[$key+1]."<br>";
					$variance1[]= number_format((2.303*log(($vr1/$array10[$key+1]),10)),9,".","");// 2.303*log($vr1/$array10[$key+1],10);	
					//echo 2.303*log($vr1/$array10[$key+1],10)."<br>";
					//echo $vr1."===".$array10[$key+1]."<br>";
				}
				else
				{
					$variance1[]=number_format(0,9,".","");
				}
				
			}
			else
			{
				$variance1[]=number_format(0,9,".","");
			}
		}
		//die;
		//echo "<pre>";print_r($variance1);die;
		return $variance1;
	}
	function getYearsBetweenDate($start,$end)
	{
		$begin = new DateTime( $start.'-01-01' );
		$end = (new DateTime( $end.'-12-31' ))->modify( '+1 day' );
		$interval = new DateInterval('P1D');
		$daterange = new DatePeriod($begin, $interval ,$end);
		return $daterange;
	}
	function getAllDatesAndvaluesSeasionalAnalysis($daterange,$dts,$vlu)
	{
		$last=0;
		$years=[];
		$year1=[];
		$y='0';
		//$daterange = $this->getYearsBetweenDate($last10YearsStartYear+1,$last10YearsEndYear);
		$dataArr = array();
		$recordArr = array();
		foreach($daterange as $date)
		{
			//echo $date->format("d-m-Y")."<br>";
			if($date->format("d-m")=="29-02")
	    	{
	    		continue;
	    	}
		    if(in_array($date->format("d-m-Y"), $dts))
		    {
		    	$akey=array_search($date->format("d-m-Y"),$dts);
		    	$v=$vlu[$akey];
		    	$last=$vlu[$akey];
		    }
		    else
		    {
		    	$v= $last;
		    }
		    if($y=='0')
		    {
		    	$y=$date->format("Y");
		    }
		    if($y!=$date->format("Y"))
		    {
		        $years[$y]=$year1;
		        $y	=$date->format("Y");
		        $year1=[];
		    }
		    if($date->format("d-m")=='28-02')
		    {
		    	$year1[]=$v;
			    
		    	if(in_array("29-02-".$date->format("Y"), $dts))
			    {
			    	$akey=array_search("29-02-".$date->format("Y"),$dts);
			    	$v=$vlu[$akey];
			    	$last=$vlu[$akey];
			    	$year1[]=$v; 
			    }
			    else
			    {
			    	$v=$last;
			    	$year1[]=$v; 	
			    }   
		    }
		    else
		    {

		    	 $year1[]=$v; 
		    }	

		}
		//echo "<pre>";print_r($year1);	
		//die;
		//die;
		$years[$y]=$year1;
		return $years;
	}
	function getCountNegativeRecord($array,$start,$end)
	{
		$recordarray = array();
		foreach($array as $key=>$value)
		{
			if($key>=$start && $key<=$end)
			{
				$recordarray[] = $value;
			}
		}
		$neg = array_filter($recordarray, function($x) {
		    return $x < 0;
		});
		//echo "<pre>";print_r(array_sum($recordarray));die;
		//return array_sum($recordarray);
		$responseArr = array();
		$responseArr['totalDaysCount'] = count($recordarray);
		$responseArr['positiveDaysCount'] = count($recordarray)-count($neg);
		$responseArr['negativeDaysCount'] = count($neg);
		return $responseArr;
	}
	function getCountNegativePositiveDays($array,$start,$end)
	{
		$recordarray = array();
		foreach($array as $key=>$value)
		{
			if($key>=$start && $key<=$end)
			{
				$recordarray[] = $value;
			}
		}
		//return $recordarray;
		if($recordarray[0]<=end($recordarray))
		{
			return 1;
		}
		else 
		{
			return 0;
		}
		
	}
	function optionOneGetPositiveNegativeCount($array,$start,$end)
	{
		$posCount = 0;
		$negCount = 0;
		foreach($array as $key=>$value)
		{
			if($key>=$start && $key<=$end)
			{
				if($array[0]>=$value)
				{
					$posCount++;
				}
				else
				{
					$negCount++;
				}
			}
		}
		if($posCount>=$negCount)
		{
			return 1;
		}
		return 0;
		//echo $posCount."=======".$negCount;die();
	}
	function optionTwoGetPositiveNegativeCount($array,$start,$end)
	{
		$posCount = 0;
		$negCount = 0;
		$variance1 = array();
		foreach($array as $key=> $vr1)
		{
			if($key>=$start && $key<=$end)
			{
				
				if(count($array)>$key+1)
				{
					if($vr1>=$array[$key+1])
					{
						$posCount++;
					}
					else
					{
						$negCount++;
					}
					
				}
				else
				{
				}
			}
			
		}
		if($posCount>=$negCount)
		{
			return 1;
		}
		return 0;
		//echo $posCount."=======".$negCount;die();
	}
	function testFundamental()
	{
		$symbol = $this->input->get('symbol');
		$FundamentalArr = $this->chart_model->apiLinkData('get-balance-sheet?symbol='.$symbol);
		//$FundamentalArr = json_decode($FundamentalArr);
		//echo "<pre>";print_r($FundamentalArr);die();
		echo $FundamentalArr;
	}
	function details_stock_portfolio($stock_id,$actual_stock_id)
	{
		error_reporting(0);
		$this->common->check_user_login();
		$user_id = $this->session->userdata('user_id');
		//$user_id = 36;
		$data = array();
		$stock_id = base64_decode(base64_decode($stock_id));
		$actual_stock_id = base64_decode(base64_decode($actual_stock_id));
		$data['title'] = 'Stock Portfolio | Five Percent';
		$data['sub_title'] = 'Stock Portfolio';
		$data['stock_details'] = $this->db->query("SELECT a.id AS user_stock_id,a.stock_id,a.order_type,a.number,b.stock_name,b.symbol,
			b.nonCurrentAssets,
			b.currentAssets,
			b.cash,
			b.netReceivable,
			b.inventory,
			b.otherCurrentAssets,
			b.equity,
			b.nonCurrentLiabilities,
			b.currentLiabilities,
			b.debtBorrowing,
			b.nonCurrentAssets,
			b.debtQuality,
			b.liquidityLiquidity,
			b.liquidityTreasury,
			b.liquidityAcidTest,
			b.forwardPE_PER,
			b.pegRatio_PEG,
			b.otherBeta,
			b.otherDividendRate,
			b.otherOperatingMargin,


			c.id AS categoryID FROM tbl_user_stock_management a INNER JOIN tbl_admin_stock b ON a.stock_id=b.id LEFT JOIN tbl_admin_stock_industries c ON b.industry_id=c.id WHERE a.id='".$stock_id."' AND a.user_id='".$user_id."' ")->row();
		//echo "<pre>";print_r($data['stock_details']);die;
		$allExcelFileRecordLast = $this->chart_model->file_handling($actual_stock_id);
		//echo "<pre>";print_r($allExcelFileRecordLast);
		//echo "<pre>";print_r(array_reverse($allExcelFileRecordLast));		die;
		$allExcelFileRecordLast = array_slice($allExcelFileRecordLast, 0,365);
		$allExcelFileRecord = array_reverse($allExcelFileRecordLast);	
		//$this->removeElementWithValue($allExcelFileRecord);	
		//echo "<pre>";print_r($allExcelFileRecord);die;
		$count = 1;
		$average = 0;
		$sum = 0;
		$x[0]=0;
		$allPriceArr[0] = 0;
		$allDateArr[0] = 0;
		$simpleAverage[0]=0;
		$medianAverage[0]=0;
		$minusFirstStandardDeviation[0]=0;
		$plusFirstStandardDeviation[0]=0;
		$minusSecondStandardDeviation[0]=0;
		$plusSecondStandardDeviation[0]=0;
		$percentile99[0] = 0;
		$c=0;
		$period = 60;
		$ema[0] = 0;
		$ema1 = array();
		$EMaFirstStandardDeviation[0] = 0;
		$allDateArr1 = array();
		$allPriceArr1 = array();
		$last_ema = 0;
		foreach($allExcelFileRecord as $val)
		{
			$price = str_replace(",","",$val[1]);
			$allDateArr1[] = "'".$price."'";
			$allPriceArr1[] = $val[1];		
			if($count==($period+$c))
			{
				$allDateArr[$c] = "'".$val[0]."'";
				$allPriceArr[$c] = number_format($price,2,".","");
				if($c==0)
				{
					$last_ema = $this->chart_model->calculate_exponential_median_average($price,$price,$period);
					$ema[$c] = number_format($this->chart_model->calculate_exponential_median_average($price,$price,$period),2,".","");
				}
				else
				{
					$ema[$c] = number_format($this->chart_model->calculate_exponential_median_average($last_ema,$price,$period),2,".","");
					$last_ema = $this->chart_model->calculate_exponential_median_average($last_ema,$price,$period);
				}
				$EMaFirstStandardDeviation[$c] = number_format($last_ema-$this->chart_model->get_standard_deviation($allExcelFileRecord,$c,$period),2,".","");		
				$simpleAverage[$c]=$this->chart_model->get_simple_average($allExcelFileRecord,$c,$period);
				$medianAverage[$c]=number_format($this->chart_model->get_median_average($allExcelFileRecord,$c,$period),2,".","");
				$minusFirstStandardDeviation[$c] = number_format($this->chart_model->get_median_average($allExcelFileRecord,$c,$period)-$this->chart_model->get_standard_deviation($allExcelFileRecord,$c,$period),2,".","");
				$plusFirstStandardDeviation[$c] = number_format(($this->chart_model->get_median_average($allExcelFileRecord,$c,$period)+$this->chart_model->get_standard_deviation($allExcelFileRecord,$c,$period)),2,".","");
				$minusSecondStandardDeviation[$c] = number_format($this->chart_model->get_median_average($allExcelFileRecord,$c,$period)-(2*$this->chart_model->get_standard_deviation($allExcelFileRecord,$c,$period)),2,".","");
				$plusSecondStandardDeviation[$c] = number_format($this->chart_model->get_median_average($allExcelFileRecord,$c,$period)+(2*$this->chart_model->get_standard_deviation($allExcelFileRecord,$c,$period)),2,".","");
				$percentile99[$c] = $this->chart_model->get_percentile($allExcelFileRecord,$c,$period,99);
				$c++;	
			}
			$count++;
		}
		$data['allDateArr'] = implode(',', ($allDateArr));
		$data['allPriceArr'] = implode(',', ($allPriceArr));
		$data['plusSecondStandardDeviation'] = implode(',', ($plusSecondStandardDeviation));
		$data['plusFirstStandardDeviation'] = implode(',', ($plusFirstStandardDeviation));
		$data['EMA'] = implode(',',($this->chart_model->emaExponentialMedianAverage($allExcelFileRecord,$period)));
		$data['minusFirstStandardDeviation'] = implode(',', $minusFirstStandardDeviation);
		$data['minusSecondStandardDeviation'] = implode(',', ($minusSecondStandardDeviation));
		$data['medianAverage'] = implode(',',($medianAverage));
		/*echo "<pre>";print_r(array_reverse($allPriceArr));
		echo "<pre>";print_r(array_reverse($plusSecondStandardDeviation));
		echo (min(array_reverse($allPriceArr))-10)."<br>";
		echo (max(array_reverse($plusSecondStandardDeviation))+10);*/
		//echo "<pre>";print_r($data);die;
		$minYAxix = min(($allPriceArr));
		/*$minYAxix1 = 0;
		for($i=1;$i<=10;$i++)
		{
			if($minYAxix>$i)
			{
				$minYAxix1 = $minYAxix-$i;
				break;
			}
		}*/
		//echo strlen(current($allPriceArr));die;
		if(strlen(current($allPriceArr))>5)
		{
			$data['minYAxix'] = $minYAxix-10;
			$data['maxYAxix'] = max(($allPriceArr))+20;
		}
		else
		{
			$data['minYAxix'] = $minYAxix;
			$data['maxYAxix'] = max(($allPriceArr));
		}

		$myConfigStatistical = 
        '{
            "gui":{ 
              "contextMenu":{ 
                "button":{ 
                  "visible": false 
                } 
              } 
            },
            "type": "line",
            "utc": true,
            "plotarea": {
                "margin": "dynamic 45 60 dynamic",
            },
            "scale-x": {
                "labels": ['.$data['allDateArr'].'],
            },
            "scale-y": {
                "line-color": "#f6f7f8",
                "shadow": 0,
                "guide": {
                    "line-style": "dashed"
                },
                "minor-ticks": 0,
                "thousands-separator": ",",
                "min-value":'.$data['minYAxix'].',
                "max-value":'.$data['maxYAxix'].',
                "step":4,

            },
            "crosshair-x": {
                "line-color": "#ffff",
                "plot-label": {
                    "border-radius": "5px",
                    "border-width": "2px",
                    "border-color": "#063853",
                    "padding": "10px",
                    "font-weight": "bold",
                },
                "scale-label": {
                    "font-color": "#fff",
                    "background-color": "#063853",
                    "border-radius": "5px"
                }
            },
            "tooltip": {
                "visible": false
            },
            "plot": {
                "highlight":true,
                "tooltip-text": "%t views: %v<br>%k",
                "shadow": 0,
                "line-width": "3px",
                "marker": {
                    visible:false
                },
                "highlight-state": {
                    "line-width":3
                },
                "animation":{
                  "effect":1,
                  "sequence":2,
                  "speed":100,
                }
            },
            "series": [
                {
                    "values": ['.$data['allPriceArr'].'],
                    "text": "Price",
                    "line-color": "#1ea2fb",
                    legendMarker: {
                          type: "circle",
                          backgroundColor: "#1ea2fb",
                          borderColor: "#1ea2fb",
                          borderWidth: "1px",
                          shadow: false,
                          size: "5px"
                        },
                        marker: {
                          backgroundColor: "#1ea2fb",
                          borderColor: "#1ea2fb",
                          borderWidth: "1px",
                          shadow: false
                        }

                },
                {
                    "values": ['.$data['medianAverage'].'],
                    "text": "Median Price",
                    "line-color": "#64d641",
                    legendMarker: {
                          type: "circle",
                          backgroundColor: "#64d641",
                          borderColor: "#64d641",
                          borderWidth: "1px",
                          shadow: false,
                          size: "5px"
                        },
                        marker: {
                          backgroundColor: "#64d641",
                          borderColor: "#64d641",
                          borderWidth: "1px",
                          shadow: false
                        }
                    },                

            ]
        }';
        $data['myConfigStatistical'] = $myConfigStatistical;
		//echo $myConfigStatistical;die;
		/*
		***************************************************************************************
			Seasional Analysis Calculation
		***************************************************************************************
		*/
		//new code from 16 June 2021
		$the_big_array = $this->chart_model->getSeasionalAllRecord($actual_stock_id);
		//$the_big_array = array_reverse($the_big_array);
		//echo "<pre>";print_r($the_big_array);die;
		$dateRange = $this->chart_model->printSeasionalAnalysisdate(date('Y').'-01-01', date('Y').'-12-31','d-m');
		//echo "<pre>";print_r($dateRange);die;
		foreach($this->chart_model->printSeasionalAnalysisdate(date('Y').'-03-16', date('Y').'-04-03','d-M') as $xl)
		{
			$xdata[] = "'".$xl."'";
		}
		/*Last 10 Years*/
		$last10YearsStartYear = date("Y",strtotime($the_big_array[0]['actual_date']."-11 year"));
		$last10YearsEndYear =  $the_big_array[0]['year'];
		//echo $last10YearsStartYear."--".$last10YearsEndYear."<br>";
		//die;
		/*Last 20 Years*/
		$Last20YearsStartYear =  date("Y",strtotime($the_big_array[0]['actual_date']."-21 year"));
		$last20YearsEndYear =  $the_big_array[0]['year'];
		/*previous 10 Years*/
		$before10YearsStartYear = $Last20YearsStartYear+1;
		$before10YearsEndYear = $last10YearsStartYear+1;

		$data['media_last10years'] = ($last10YearsStartYear+2)."-".$last10YearsEndYear;
		$data['media_last20years'] = ($Last20YearsStartYear+2)."-".$last20YearsEndYear;
		$data['media_previous10years'] = ($before10YearsStartYear+1)."-".$before10YearsEndYear;

		$dts=[];
		$vlu=[];
		$last20YearsDates = array();
		$last20YearsValue = array();
		$before10YearsDates = array();
		$before10YearsValue = array();
		foreach($the_big_array as $val)
		{
			if(($last10YearsEndYear>=$val['year']) && (($last10YearsStartYear+1)<=$val['year']))
			{
				$dts[]=$val['search_date_all'];
				$vlu[]=str_replace(",","",$val['price']);
			}
			if(($last20YearsEndYear>=$val['year']) && (($Last20YearsStartYear+1)<=$val['year']))
			{	
				$last20YearsDates[]=$val['search_date_all'];
				$last20YearsValue[]=str_replace(",","",$val['price']);
			}
			if(($before10YearsEndYear>=$val['year']) && (($before10YearsStartYear+1)<=$val['year']))
			{	
				$before10YearsDates[]=$val['search_date_all'];
				$before10YearsValue[]=str_replace(",","",$val['price']);
			}
		}
		//echo "<pre>";print_r($dts);die;
		$daterange = $this->getYearsBetweenDate($last10YearsStartYear+1,$last10YearsEndYear);
		//echo "<pre>";print_r($daterange);die;
		$last10YearsAllDatesVal = $this->getAllDatesAndvaluesSeasionalAnalysis($daterange,$dts,$vlu);
		//echo "<pre>";print_r($last10YearsAllDatesVal);die;
		$last10YearRecord = array();
		$c=0;
		foreach($last10YearsAllDatesVal as $key=>$ddd)
		{
			foreach($last10YearsAllDatesVal[$key] as $var)
			{
				$last10YearRecord[$c][] = $var;	
			}
			$c++;
		}
		$array1 = array_reverse($last10YearRecord[0]); // 31 Dec
		$array2 = array_reverse($last10YearRecord[1]);
		$array3 = array_reverse($last10YearRecord[2]);		
		$array4 = array_reverse($last10YearRecord[3]);
		$array5 = array_reverse($last10YearRecord[4]);
		$array6 = array_reverse($last10YearRecord[5]);
		$array7 = array_reverse($last10YearRecord[6]);
		$array8 = array_reverse($last10YearRecord[7]);
		$array9 = array_reverse($last10YearRecord[8]);
		$array10 = array_reverse($last10YearRecord[9]);
		$array11 = array_reverse($last10YearRecord[10]);
				
		$variance1 = $this->getVariance($array1);
		
		$variance2 = $this->getVariance($array2);
		$variance3 = $this->getVariance($array3);
		$variance4 = $this->getVariance($array4);
		$variance5 = $this->getVariance($array5);
		$variance6 = $this->getVariance($array6);
		$variance7 = $this->getVariance($array7);
		$variance8 = $this->getVariance($array8);
		$variance9 = $this->getVariance($array9);
		$variance10 = $this->getVariance($array10);
		$variance11 = $this->getVariance($array11);
		//$array_sum = array_sum($variance11); 
		//echo "<pre>";print_r($variance2);die();
		/*$neg = array_filter($variance11, function($x) {
		    return $x < 0;
		});*/
		
		$averageOfLast10Years = array();
		for($av=0;$av<=365;$av++)
		{
			$variandddd = ($variance2[$av]+$variance3[$av]+$variance4[$av]+$variance5[$av]+$variance6[$av]+$variance7[$av]+$variance8[$av]+$variance9[$av]+$variance10[$av]+$variance11[$av])/10; 
			$variandddd = number_format(($variandddd*100),2,".","");
			$averageOfLast10Years[] = $variandddd;
		}
		$last10YearsEvolutions = array();
		$lastEvolutions = 0;
		foreach(array_reverse($averageOfLast10Years) as $ev=>$evolution) //  1 Jan
		{
			if($ev==0)
			{
				$last10YearsEvolutions[] = number_format($evolution,2,".","");
			}
			else
			{
				$last10YearsEvolutions[] = number_format(($evolution+$lastEvolutions),2,".",""); 
				$lastEvolutions = $evolution+$lastEvolutions;
			}
		}
		//echo "<pre>";print_r($last10YearsEvolutions);die();
		$filterAverageEvolution10years = array();
		foreach($last10YearsEvolutions as $kkk=>$vvvv)
		{
			if($kkk>=75 && $kkk<=93)
			{
				$filterAverageEvolution10years[] = $vvvv;
			}
		}
		//echo "<pre>";print_r($filterAverageEvolution10years);die();
		$performanceLast10Years = 0;
		if(end($filterAverageEvolution10years)>$filterAverageEvolution10years[0])
		{
			$performanceLast10Years = end($filterAverageEvolution10years)-$filterAverageEvolution10years[0];
		}
		else
		{
			$performanceLast10Years = end($filterAverageEvolution10years)-$filterAverageEvolution10years[0];
		}
		//echo $performanceLast10Years;
		//die;
		$data['performanceLast10Years'] = $performanceLast10Years;
		//$data['performanceLast10Years'] = array_sum( $filterAverageEvolution10years) / count( $filterAverageEvolution10years);
		//echo "<pre>";print_r($filterAverageEvolution10years);die;
		/* 
			Last 20 Years Calculations Starts 
		*/
		$daterangeLast20Years = $this->getYearsBetweenDate($Last20YearsStartYear+1,$last20YearsEndYear);
		$last20YearsAllDatesVal = $this->getAllDatesAndvaluesSeasionalAnalysis($daterangeLast20Years,$last20YearsDates,$last20YearsValue);
		//echo "<pre>";print_r($last20YearsAllDatesVal);die;
		$last20YearRecord = array();
		$d=0;
		foreach($last20YearsAllDatesVal as $key=>$ddd)
		{
			foreach($last20YearsAllDatesVal[$key] as $var)
			{
				$last20YearRecord[$d][] = $var;	
			}
			$d++;
		}

		//echo "<pre>";print_r($last20YearRecord);die();

		/*$checkPositiveNegativaArr = array(
										$this->getCountNegativePositiveDays($last20YearRecord[1],75,93),
										$this->getCountNegativePositiveDays($last20YearRecord[2],75,93),
										$this->getCountNegativePositiveDays($last20YearRecord[3],75,93),
										$this->getCountNegativePositiveDays($last20YearRecord[4],75,93),
										$this->getCountNegativePositiveDays($last20YearRecord[5],75,93),
										$this->getCountNegativePositiveDays($last20YearRecord[6],75,93),
										$this->getCountNegativePositiveDays($last20YearRecord[7],75,93),
										$this->getCountNegativePositiveDays($last20YearRecord[8],75,93),
										$this->getCountNegativePositiveDays($last20YearRecord[9],75,93),
										$this->getCountNegativePositiveDays($last20YearRecord[10],75,93),
										$this->getCountNegativePositiveDays($last20YearRecord[11],75,93),
										$this->getCountNegativePositiveDays($last20YearRecord[12],75,93),
										$this->getCountNegativePositiveDays($last20YearRecord[13],75,93),
										$this->getCountNegativePositiveDays($last20YearRecord[14],75,93),
										$this->getCountNegativePositiveDays($last20YearRecord[15],75,93),
										$this->getCountNegativePositiveDays($last20YearRecord[16],75,93),
										$this->getCountNegativePositiveDays($last20YearRecord[17],75,93),
										$this->getCountNegativePositiveDays($last20YearRecord[18],75,93),
										$this->getCountNegativePositiveDays($last20YearRecord[19],75,93),
										$this->getCountNegativePositiveDays($last20YearRecord[20],75,93),
										);*/
		/*$checkPositiveNegativaArr = array(
										$this->optionOneGetPositiveNegativeCount($last20YearRecord[1],75,93),
										$this->optionOneGetPositiveNegativeCount($last20YearRecord[2],75,93),
										$this->optionOneGetPositiveNegativeCount($last20YearRecord[3],75,93),
										$this->optionOneGetPositiveNegativeCount($last20YearRecord[4],75,93),
										$this->optionOneGetPositiveNegativeCount($last20YearRecord[5],75,93),
										$this->optionOneGetPositiveNegativeCount($last20YearRecord[6],75,93),
										$this->optionOneGetPositiveNegativeCount($last20YearRecord[7],75,93),
										$this->optionOneGetPositiveNegativeCount($last20YearRecord[8],75,93),
										$this->optionOneGetPositiveNegativeCount($last20YearRecord[9],75,93),
										$this->optionOneGetPositiveNegativeCount($last20YearRecord[10],75,93),
										$this->optionOneGetPositiveNegativeCount($last20YearRecord[11],75,93),
										$this->optionOneGetPositiveNegativeCount($last20YearRecord[12],75,93),
										$this->optionOneGetPositiveNegativeCount($last20YearRecord[13],75,93),
										$this->optionOneGetPositiveNegativeCount($last20YearRecord[14],75,93),
										$this->optionOneGetPositiveNegativeCount($last20YearRecord[15],75,93),
										$this->optionOneGetPositiveNegativeCount($last20YearRecord[16],75,93),
										$this->optionOneGetPositiveNegativeCount($last20YearRecord[17],75,93),
										$this->optionOneGetPositiveNegativeCount($last20YearRecord[18],75,93),
										$this->optionOneGetPositiveNegativeCount($last20YearRecord[19],75,93),
										$this->optionOneGetPositiveNegativeCount($last20YearRecord[20],75,93),
										);*/
		$checkPositiveNegativaArr = array(
										$this->optionTwoGetPositiveNegativeCount($last20YearRecord[1],75,93),
										$this->optionTwoGetPositiveNegativeCount($last20YearRecord[2],75,93),
										$this->optionTwoGetPositiveNegativeCount($last20YearRecord[3],75,93),
										$this->optionTwoGetPositiveNegativeCount($last20YearRecord[4],75,93),
										$this->optionTwoGetPositiveNegativeCount($last20YearRecord[5],75,93),
										$this->optionTwoGetPositiveNegativeCount($last20YearRecord[6],75,93),
										$this->optionTwoGetPositiveNegativeCount($last20YearRecord[7],75,93),
										$this->optionTwoGetPositiveNegativeCount($last20YearRecord[8],75,93),
										$this->optionTwoGetPositiveNegativeCount($last20YearRecord[9],75,93),
										$this->optionTwoGetPositiveNegativeCount($last20YearRecord[10],75,93),
										$this->optionTwoGetPositiveNegativeCount($last20YearRecord[11],75,93),
										$this->optionTwoGetPositiveNegativeCount($last20YearRecord[12],75,93),
										$this->optionTwoGetPositiveNegativeCount($last20YearRecord[13],75,93),
										$this->optionTwoGetPositiveNegativeCount($last20YearRecord[14],75,93),
										$this->optionTwoGetPositiveNegativeCount($last20YearRecord[15],75,93),
										$this->optionTwoGetPositiveNegativeCount($last20YearRecord[16],75,93),
										$this->optionTwoGetPositiveNegativeCount($last20YearRecord[17],75,93),
										$this->optionTwoGetPositiveNegativeCount($last20YearRecord[18],75,93),
										$this->optionTwoGetPositiveNegativeCount($last20YearRecord[19],75,93),
										$this->optionTwoGetPositiveNegativeCount($last20YearRecord[20],75,93),
										);
		//$getYears = $this->optionTwoGetPositiveNegativeCount($last20YearRecord[20],75,93);
		//echo  ($getYears);die();
		//echo "<pre>";print_r($this->getCountNegativePositiveDays($last20YearRecord[20],75,93));die();
		$numOfPostiveYears = 0;
		$numOfnegativeYears = 0;
		foreach($checkPositiveNegativaArr as $pos)
		{
			if($pos==1)
			{
				$numOfPostiveYears++;
			}
			else
			{
				$numOfnegativeYears++;
			}
		}
		//echo $numOfPostiveYears."===".$numOfnegativeYears;die();
		//echo "<pre>";print_r($last20YearRecord);die;
		$Last20Yearsarray1 = array_reverse($last20YearRecord[0]);// 31 Dec
		$Last20Yearsarray2 = array_reverse($last20YearRecord[1]);// 31 Dec
		$Last20Yearsarray3 = array_reverse($last20YearRecord[2]);
		$Last20Yearsarray4 = array_reverse($last20YearRecord[3]);
		$Last20Yearsarray5 = array_reverse($last20YearRecord[4]);
		$Last20Yearsarray6 = array_reverse($last20YearRecord[5]);
		$Last20Yearsarray7 = array_reverse($last20YearRecord[6]);
		$Last20Yearsarray8 = array_reverse($last20YearRecord[7]);
		$Last20Yearsarray9 = array_reverse($last20YearRecord[8]);
		$Last20Yearsarray10 = array_reverse($last20YearRecord[9]);
		$Last20Yearsarray11 = array_reverse($last20YearRecord[10]);
		$Last20Yearsarray12 = array_reverse($last20YearRecord[11]);
		$Last20Yearsarray13 = array_reverse($last20YearRecord[12]);
		$Last20Yearsarray14 = array_reverse($last20YearRecord[13]);
		$Last20Yearsarray15 = array_reverse($last20YearRecord[14]);
		$Last20Yearsarray16 = array_reverse($last20YearRecord[15]);
		$Last20Yearsarray17 = array_reverse($last20YearRecord[16]);
		$Last20Yearsarray18 = array_reverse($last20YearRecord[17]);
		$Last20Yearsarray19 = array_reverse($last20YearRecord[18]);
		$Last20Yearsarray20 = array_reverse($last20YearRecord[19]);
		$Last20Yearsarray21 = array_reverse($last20YearRecord[20]);
				
		$Last20YearsVariance1 = $this->getVariance($Last20Yearsarray1);
		$Last20YearsVariance2 = $this->getVariance($Last20Yearsarray2);
		$Last20YearsVariance3 = $this->getVariance($Last20Yearsarray3);
		$Last20YearsVariance4 = $this->getVariance($Last20Yearsarray4);
		$Last20YearsVariance5 = $this->getVariance($Last20Yearsarray5);
		$Last20YearsVariance6 = $this->getVariance($Last20Yearsarray6);
		$Last20YearsVariance7 = $this->getVariance($Last20Yearsarray7);
		$Last20YearsVariance8 = $this->getVariance($Last20Yearsarray8);
		$Last20YearsVariance9 = $this->getVariance($Last20Yearsarray9);
		$Last20YearsVariance10 = $this->getVariance($Last20Yearsarray10);
		$Last20YearsVariance11 = $this->getVariance($Last20Yearsarray11);
		$Last20YearsVariance12 = $this->getVariance($Last20Yearsarray12);
		$Last20YearsVariance13 = $this->getVariance($Last20Yearsarray13);
		$Last20YearsVariance14 = $this->getVariance($Last20Yearsarray14);
		$Last20YearsVariance15 = $this->getVariance($Last20Yearsarray15);
		$Last20YearsVariance16 = $this->getVariance($Last20Yearsarray16);
		$Last20YearsVariance17 = $this->getVariance($Last20Yearsarray17);
		$Last20YearsVariance18 = $this->getVariance($Last20Yearsarray18);
		$Last20YearsVariance19 = $this->getVariance($Last20Yearsarray19);
		$Last20YearsVariance20 = $this->getVariance($Last20Yearsarray20);
		$Last20YearsVariance21 = $this->getVariance($Last20Yearsarray21);
		


		$negativePositiveTotalCount1 = $this->getCountNegativeRecord($Last20YearsVariance2,75,93);
		$negativePositiveTotalCount2 = $this->getCountNegativeRecord($Last20YearsVariance3,75,93);
		$negativePositiveTotalCount3 = $this->getCountNegativeRecord($Last20YearsVariance4,75,93);
		$negativePositiveTotalCount4 = $this->getCountNegativeRecord($Last20YearsVariance5,75,93);
		$negativePositiveTotalCount5 = $this->getCountNegativeRecord($Last20YearsVariance6,75,93);
		$negativePositiveTotalCount6 = $this->getCountNegativeRecord($Last20YearsVariance7,75,93);
		$negativePositiveTotalCount7 = $this->getCountNegativeRecord($Last20YearsVariance8,75,93);
		$negativePositiveTotalCount8 = $this->getCountNegativeRecord($Last20YearsVariance9,75,93);
		$negativePositiveTotalCount9 = $this->getCountNegativeRecord($Last20YearsVariance10,75,93);
		$negativePositiveTotalCount10 = $this->getCountNegativeRecord($Last20YearsVariance11,75,93);
		$negativePositiveTotalCount11 = $this->getCountNegativeRecord($Last20YearsVariance12,75,93);
		$negativePositiveTotalCount12 = $this->getCountNegativeRecord($Last20YearsVariance13,75,93);
		$negativePositiveTotalCount13 = $this->getCountNegativeRecord($Last20YearsVariance14,75,93);
		$negativePositiveTotalCount14 = $this->getCountNegativeRecord($Last20YearsVariance15,75,93);
		$negativePositiveTotalCount15 = $this->getCountNegativeRecord($Last20YearsVariance16,75,93);
		$negativePositiveTotalCount16 = $this->getCountNegativeRecord($Last20YearsVariance17,75,93);
		$negativePositiveTotalCount17 = $this->getCountNegativeRecord($Last20YearsVariance18,75,93);
		$negativePositiveTotalCount18 = $this->getCountNegativeRecord($Last20YearsVariance19,75,93);
		$negativePositiveTotalCount19 = $this->getCountNegativeRecord($Last20YearsVariance20,75,93);
		$negativePositiveTotalCount20 = $this->getCountNegativeRecord($Last20YearsVariance21,75,93);

		
		
		
		
		$numberOfTotalDays = 0;
		$numberOfPositiveDays = 0;
		$numberOfNegativeDays = 0;


		$numberOfTotalDays = $negativePositiveTotalCount1['totalDaysCount']+$negativePositiveTotalCount2['totalDaysCount']+$negativePositiveTotalCount3['totalDaysCount']+$negativePositiveTotalCount4['totalDaysCount']+$negativePositiveTotalCount5['totalDaysCount']+$negativePositiveTotalCount6['totalDaysCount']+$negativePositiveTotalCount7['totalDaysCount']+$negativePositiveTotalCount8['totalDaysCount']+$negativePositiveTotalCount9['totalDaysCount']+$negativePositiveTotalCount10['totalDaysCount']+$negativePositiveTotalCount11['totalDaysCount']+$negativePositiveTotalCount12['totalDaysCount']+$negativePositiveTotalCount13['totalDaysCount']+$negativePositiveTotalCount14['totalDaysCount']+$negativePositiveTotalCount15['totalDaysCount']+$negativePositiveTotalCount16['totalDaysCount']+$negativePositiveTotalCount17['totalDaysCount']+$negativePositiveTotalCount18['totalDaysCount']+$negativePositiveTotalCount19['totalDaysCount']+$negativePositiveTotalCount20['totalDaysCount'];

		$numberOfPositiveDays = $negativePositiveTotalCount1['positiveDaysCount']+$negativePositiveTotalCount2['positiveDaysCount']+$negativePositiveTotalCount3['positiveDaysCount']+$negativePositiveTotalCount4['positiveDaysCount']+$negativePositiveTotalCount5['positiveDaysCount']+$negativePositiveTotalCount6['positiveDaysCount']+$negativePositiveTotalCount7['positiveDaysCount']+$negativePositiveTotalCount8['positiveDaysCount']+$negativePositiveTotalCount9['positiveDaysCount']+$negativePositiveTotalCount10['positiveDaysCount']+$negativePositiveTotalCount11['positiveDaysCount']+$negativePositiveTotalCount12['positiveDaysCount']+$negativePositiveTotalCount13['positiveDaysCount']+$negativePositiveTotalCount14['positiveDaysCount']+$negativePositiveTotalCount15['positiveDaysCount']+$negativePositiveTotalCount16['positiveDaysCount']+$negativePositiveTotalCount17['positiveDaysCount']+$negativePositiveTotalCount18['positiveDaysCount']+$negativePositiveTotalCount19['positiveDaysCount']+$negativePositiveTotalCount20['positiveDaysCount'];

		$numberOfNegativeDays = $negativePositiveTotalCount1['negativeDaysCount']+$negativePositiveTotalCount2['negativeDaysCount']+$negativePositiveTotalCount3['negativeDaysCount']+$negativePositiveTotalCount4['negativeDaysCount']+$negativePositiveTotalCount5['negativeDaysCount']+$negativePositiveTotalCount6['negativeDaysCount']+$negativePositiveTotalCount7['negativeDaysCount']+$negativePositiveTotalCount8['negativeDaysCount']+$negativePositiveTotalCount9['negativeDaysCount']+$negativePositiveTotalCount10['negativeDaysCount']+$negativePositiveTotalCount11['negativeDaysCount']+$negativePositiveTotalCount12['negativeDaysCount']+$negativePositiveTotalCount13['negativeDaysCount']+$negativePositiveTotalCount14['negativeDaysCount']+$negativePositiveTotalCount15['negativeDaysCount']+$negativePositiveTotalCount16['negativeDaysCount']+$negativePositiveTotalCount17['negativeDaysCount']+$negativePositiveTotalCount18['negativeDaysCount']+$negativePositiveTotalCount19['negativeDaysCount']+$negativePositiveTotalCount20['negativeDaysCount'];

		//echo $numberOfTotalDays."--".$numberOfPositiveDays."--".$numberOfNegativeDays;die;

		//echo "<pre>";print_r($variance10);die;
		$averageOfLast20Years = array();
		for($av=0;$av<=365;$av++)
		{
			$variandddd = ($Last20YearsVariance2[$av]+$Last20YearsVariance3[$av]+$Last20YearsVariance4[$av]+$Last20YearsVariance5[$av]+$Last20YearsVariance6[$av]+$Last20YearsVariance7[$av]+$Last20YearsVariance8[$av]+$Last20YearsVariance9[$av]+$Last20YearsVariance10[$av]+$Last20YearsVariance11[$av]+$Last20YearsVariance12[$av]+$Last20YearsVariance13[$av]+$Last20YearsVariance14[$av]+$Last20YearsVariance15[$av]+$Last20YearsVariance16[$av]+$Last20YearsVariance17[$av]+$Last20YearsVariance18[$av]+$Last20YearsVariance19[$av]+$Last20YearsVariance20[$av]+$Last20YearsVariance21[$av])/20; 
			$variandddd = number_format(($variandddd*100),2,".","");
			$averageOfLast20Years[] = $variandddd;
		}
		//echo "<pre>";print_r($averageOfLast20Years);die;
		$last20YearsEvolutions = array();
		$lastEvolutions1 = 0;
		foreach(array_reverse($averageOfLast20Years) as $ev=>$evolution) //  1 Jan
		{
			//echo $evolution."<br>";
			if($ev==0)
			{
				$last20YearsEvolutions[] = number_format(0,2,".","");
			}
			else
			{
				$last20YearsEvolutions[] = number_format(($evolution+$lastEvolutions1),2,".",""); 
				$lastEvolutions1 = $evolution+$lastEvolutions1;
			}
		}

		$filterAverageEvolution20years = array();
		foreach($last20YearsEvolutions as $kkk=>$vvvv)
		{
			if($kkk>=75 && $kkk<=93)
			{
				$filterAverageEvolution20years[] = $vvvv;
			}
		}
		$performanceLast20Years = 0;
		if(end($filterAverageEvolution20years)>$filterAverageEvolution20years[0])
		{
			$performanceLast20Years = end($filterAverageEvolution20years)-$filterAverageEvolution20years[0];
		}
		else
		{
			$performanceLast20Years = end($filterAverageEvolution20years)-$filterAverageEvolution20years[0];
		}
		$data['performanceLast20Years'] = $performanceLast20Years;
		//$data['performanceLast20Years'] = array_sum( $filterAverageEvolution20years) / count( $filterAverageEvolution20years);
		//echo "<pre>last20YearsEvolutions";print_r($filterAverageEvolution20years);die;
		/* 
			Last 20 Years Calculations End 
		*/

		/* Previous 10 Years Calculation Starts  */

		$daterangePrevious10Years = $this->getYearsBetweenDate($before10YearsStartYear,$before10YearsEndYear);
		$previous10YearsAllDatesVal = $this->getAllDatesAndvaluesSeasionalAnalysis($daterangePrevious10Years,$before10YearsDates,$before10YearsValue);
		//echo "<pre>previous 10 years";print_r($previous10YearsAllDatesVal);die;
		$previous10YearRecord = array();
		$e=0;
		foreach($previous10YearsAllDatesVal as $key=>$ddd)
		{
			foreach($previous10YearsAllDatesVal[$key] as $var)
			{
				$previous10YearRecord[$e][] = $var;	
			}
			$e++;
		}
		//echo "<pre>dddd";print_r($previous10YearRecord);die;
		$previous10Yearsarray1 = array_reverse($previous10YearRecord[0]); // 31 Dec
		$previous10Yearsarray2 = array_reverse($previous10YearRecord[1]);
		$previous10Yearsarray3 = array_reverse($previous10YearRecord[2]);
		$previous10Yearsarray4 = array_reverse($previous10YearRecord[3]);
		$previous10Yearsarray5 = array_reverse($previous10YearRecord[4]);
		$previous10Yearsarray6 = array_reverse($previous10YearRecord[5]);
		$previous10Yearsarray7 = array_reverse($previous10YearRecord[6]);
		$previous10Yearsarray8 = array_reverse($previous10YearRecord[7]);
		$previous10Yearsarray9 = array_reverse($previous10YearRecord[8]);
		$previous10Yearsarray10 = array_reverse($previous10YearRecord[9]);
		$previous10Yearsarray11 = array_reverse($previous10YearRecord[10]);
				
		$previous10YearsVariance1 = $this->getVariance($previous10Yearsarray1);
		$previous10YearsVariance2 = $this->getVariance($previous10Yearsarray2);
		$previous10YearsVariance3 = $this->getVariance($previous10Yearsarray3);
		$previous10YearsVariance4 = $this->getVariance($previous10Yearsarray4);
		$previous10YearsVariance5 = $this->getVariance($previous10Yearsarray5);
		$previous10YearsVariance6 = $this->getVariance($previous10Yearsarray6);
		$previous10YearsVariance7 = $this->getVariance($previous10Yearsarray7);
		$previous10YearsVariance8 = $this->getVariance($previous10Yearsarray8);
		$previous10YearsVariance9 = $this->getVariance($previous10Yearsarray9);
		$previous10YearsVariance10 = $this->getVariance($previous10Yearsarray10);
		$previous10YearsVariance11 = $this->getVariance($previous10Yearsarray11);
		
		$averageOfPrevious10Years = array();
		for($av=0;$av<=365;$av++)
		{
			$variandddd = ($previous10YearsVariance2[$av]+$previous10YearsVariance3[$av]+$previous10YearsVariance4[$av]+$previous10YearsVariance5[$av]+$previous10YearsVariance6[$av]+$previous10YearsVariance7[$av]+$previous10YearsVariance8[$av]+$previous10YearsVariance9[$av]+$previous10YearsVariance10[$av]+$previous10YearsVariance11[$av])/10; 
			$variandddd = number_format(($variandddd*100),2,".","");
			$averageOfPrevious10Years[] = $variandddd;
		}
		//echo "<pre>pre average";print_r($averageOfPrevious10Years);die;
		$previous10YearsEvolutions = array();
		$lastEvolutions2 = 0;
		foreach(array_reverse($averageOfPrevious10Years) as $ev=>$evolution) //  1 Jan
		{
			if($ev==0)
			{
				$previous10YearsEvolutions[] = number_format(0,2,".","");
			}
			else
			{
				$previous10YearsEvolutions[] = number_format(($evolution+$lastEvolutions2),2,".",""); 
				$lastEvolutions2 = $evolution+$lastEvolutions2;
			}
		}
		//echo "<pre>";print_r($previous10YearsEvolutions);die();
		$filterAverageEvolutionPrevious10years = array();
		foreach($previous10YearsEvolutions as $kkk=>$vvvv)
		{
			if($kkk>=75 && $kkk<=93)
			{
				$filterAverageEvolutionPrevious10years[] = $vvvv;
			}
		}
		//echo "<pre>";print_r($filterAverageEvolutionPrevious10years);die();
		$performanceBefore10Years = 0;
		if(end($filterAverageEvolutionPrevious10years)>$filterAverageEvolutionPrevious10years[0])
		{
			$performanceBefore10Years = end($filterAverageEvolutionPrevious10years)-$filterAverageEvolutionPrevious10years[0];
		}
		else
		{
			$performanceBefore10Years = end($filterAverageEvolutionPrevious10years)-$filterAverageEvolutionPrevious10years[0];
		}
		$data['performanceBefore10Years'] = $performanceBefore10Years;
		//echo $data['performanceBefore10Years'];die;
		//$data['performanceBefore10Years'] = array_sum( $filterAverageEvolutionPrevious10years) / count( $filterAverageEvolutionPrevious10years);
		//echo "<pre>previous10YearsEvolutions";print_r($filterAverageEvolutionPrevious10years);die;
		/* Previous 10 Years Calculation End  */

		$beginLabel = new DateTime( '2016-01-01' );
		$endLabel = (new DateTime( '2016-12-31' ))->modify( '+1 day' );
		$intervalLabel = new DateInterval('P1D');
		$labelRange = new DatePeriod($beginLabel, $intervalLabel ,$endLabel);
		$xRangeLabel = array();
		$allDates = array();
		foreach($labelRange as $range)
		{
			$xRangeLabel[] = "'".$range->format('d-M')."'";
			$allDates[] = $range->format('d-M');
		}
		
		$data['xRangeLabel'] = $xRangeLabel;
		$filterDates = array();
		foreach($xRangeLabel as $kdate=>$dvl)
		{
			if($kdate>=75 && $kdate<=93)
			{
				$filterDates[] = $dvl;
			}
			 
		}
		$mergeArr  = array();
		$ddArr = array();
		foreach($allDates as $keys=>$date)
		{
			$ddArr['dates'] = $date."-2021";
			$ddArr['usualDate'] = "'".$date."'";
			$ddArr['converted_date'] = strtotime($date."-2021");
			$ddArr['values'] = $last10YearsEvolutions[$keys];
			$ddArr['index'] = $keys;
			array_push($mergeArr,$ddArr);
		}
		$withoutFilter = $mergeArr;
		usort($mergeArr,array($this,'sortingDateValues'));
		/*
			For last 10 Years Calculations
		*/
		$getOnePlace0 = 0;
		$mergeArr0 = array();
		$withoutFilter0 = array();
		$getOnePlace0 = array();
		$mainArrrrrrr = array();
		for($rng=0;$rng<=50;$rng++)
		{
			if($rng==0)
			{
				$mergeArr0 = $this->removeExistingDate($mergeArr,$getOnePlace0[0]['converted_date'],$getOnePlace0[count($getOnePlace0)-1]['converted_date']);
				$withoutFilter0 = $this->removeExistingDate($withoutFilter,$getOnePlace0[0]['converted_date'],$getOnePlace0[count($getOnePlace0)-1]['converted_date']);

				$getOnePlace0 = $this->getLastYearRecordCalculations($rng,$mergeArr0,$withoutFilter0);
				if(round(abs($getOnePlace0[0]['converted_date'] - $getOnePlace0[count($getOnePlace0)-1]['converted_date'])/86400)>=9)
				{
					$mainArrrrrrr[] = $getOnePlace0;
				}	
			}
			else
			{
				$mergeArr0 = $this->removeExistingDate($mergeArr0,$getOnePlace0[0]['converted_date'],$getOnePlace0[count($getOnePlace0)-1]['converted_date']);
				$withoutFilter0 = $this->removeExistingDate($withoutFilter0,$getOnePlace0[0]['converted_date'],$getOnePlace0[count($getOnePlace0)-1]['converted_date']);

				$getOnePlace0 = $this->getLastYearRecordCalculations($rng,$mergeArr0,$withoutFilter0);
				if(round(abs($getOnePlace0[0]['converted_date'] - $getOnePlace0[count($getOnePlace0)-1]['converted_date'])/86400)>=9)
				{
					$mainArrrrrrr[] = $getOnePlace0;
				}
			}
				
		}
		//echo "<pre>";print_r($mainArrrrrrr);die;
		/*
			For 20 Years Calculations
		*/
		$lastTwentyYears  = array();
		$lastTwentyYearsDataArr = array();
		foreach($allDates as $keys=>$date)
		{
			$lastTwentyYearsDataArr['dates'] = $date."-2021";
			$lastTwentyYearsDataArr['usualDate'] = "'".$date."'";
			$lastTwentyYearsDataArr['converted_date'] = strtotime($date."-2021");
			$lastTwentyYearsDataArr['values'] = $last20YearsEvolutions[$keys];
			$lastTwentyYearsDataArr['index'] = $keys;
			array_push($lastTwentyYears,$lastTwentyYearsDataArr);
		}
		$lastTwentyYearsWithoutFilter = $lastTwentyYears;
		usort($lastTwentyYears,array($this,'sortingDateValues'));
		//echo "<pre>ram ji";print_r($lastTwentyYearsWithoutFilter);die;

		$getPlaceTwentyYears = array();
		$getWithoutFilterTwentyYears = array();
		$getOnePlaceTwentyYears = array();
		$lastTwentyYearsMainArr = array();

		for($rng=0;$rng<=50;$rng++)
		{
			if($rng==0)
			{
				$getPlaceTwentyYears = $this->removeExistingDate($lastTwentyYears,$getOnePlaceTwentyYears[0]['converted_date'],$getOnePlaceTwentyYears[count($getOnePlaceTwentyYears)-1]['converted_date']);
				$getWithoutFilterTwentyYears = $this->removeExistingDate($withoutFilter,$getOnePlaceTwentyYears[0]['converted_date'],$getOnePlaceTwentyYears[count($getOnePlaceTwentyYears)-1]['converted_date']);

				$getOnePlaceTwentyYears = $this->getLastYearRecordCalculations($rng,$getPlaceTwentyYears,$getWithoutFilterTwentyYears);
				if(round(abs($getOnePlaceTwentyYears[0]['converted_date'] - $getOnePlaceTwentyYears[count($getOnePlaceTwentyYears)-1]['converted_date'])/86400)>=9)
				{
					$lastTwentyYearsMainArr[] = $getOnePlaceTwentyYears;
				}	
			}
			else
			{
				$getPlaceTwentyYears = $this->removeExistingDate($getPlaceTwentyYears,$getOnePlaceTwentyYears[0]['converted_date'],$getOnePlaceTwentyYears[count($getOnePlaceTwentyYears)-1]['converted_date']);
				$getWithoutFilterTwentyYears = $this->removeExistingDate($getWithoutFilterTwentyYears,$getOnePlaceTwentyYears[0]['converted_date'],$getOnePlaceTwentyYears[count($getOnePlaceTwentyYears)-1]['converted_date']);

				$getOnePlaceTwentyYears = $this->getLastYearRecordCalculations($rng,$getPlaceTwentyYears,$getWithoutFilterTwentyYears);
				if(round(abs($getOnePlaceTwentyYears[0]['converted_date'] - $getOnePlaceTwentyYears[count($getOnePlaceTwentyYears)-1]['converted_date'])/86400)>=9)
				{
					$lastTwentyYearsMainArr[] = $getOnePlaceTwentyYears;
				}
			}
				
		}
		//echo "<pre>";print_r($lastTwentyYearsMainArr);die();

		$lastTwentyYearMainProfitProbArr = array();
		foreach($lastTwentyYearsMainArr as $mainkey=>$main)
		{
			$lastTwentyYearMainProfitProbArr[] = $this->findProfitPerformanceProbability($main,$last20YearRecord);
			
		}
		//echo "<pre>";print_r($lastTwentyYearMainProfitProbArr);die();
		//echo "<pre>Last 20 Years ";print_r($lastTwentyYearMainProfitProbArr);die;
		/*
			For 20 Years Calculations end
		*/

		/*
			For before 10 Years Calculations
		*/
		$beforeTenYears  = array();
		$beforeTenYearsDataArr = array();
		foreach($allDates as $keys=>$date)
		{
			$beforeTenYearsDataArr['dates'] = $date."-2021";
			$beforeTenYearsDataArr['usualDate'] = "'".$date."'";
			$beforeTenYearsDataArr['converted_date'] = strtotime($date."-2021");
			$beforeTenYearsDataArr['values'] = $previous10YearsEvolutions[$keys];
			$beforeTenYearsDataArr['index'] = $keys;
			array_push($beforeTenYears,$beforeTenYearsDataArr);
		}
		$beforeTenYearsWithoutFilter = $beforeTenYears;
		usort($beforeTenYears,array($this,'sortingDateValues'));
		//echo "<pre>ram ji";print_r($lastTwentyYearsWithoutFilter);die;

		$getPlacebeforeTenYears = array();
		$getWithoutFilterBeforeTenYears = array();
		$getOnePlaceBeforeTenYears = array();
		$beforeTenYearsMainArr = array();

		for($rng=0;$rng<=50;$rng++)
		{
			if($rng==0)
			{
				$getPlacebeforeTenYears = $this->removeExistingDate($beforeTenYears,$getOnePlaceBeforeTenYears[0]['converted_date'],$getOnePlaceBeforeTenYears[count($getOnePlaceBeforeTenYears)-1]['converted_date']);
				$getWithoutFilterBeforeTenYears = $this->removeExistingDate($withoutFilter,$getOnePlaceBeforeTenYears[0]['converted_date'],$getOnePlaceBeforeTenYears[count($getOnePlaceBeforeTenYears)-1]['converted_date']);

				$getOnePlaceBeforeTenYears = $this->getLastYearRecordCalculations($rng,$getPlacebeforeTenYears,$getWithoutFilterBeforeTenYears);
				if(round(abs($getOnePlaceBeforeTenYears[0]['converted_date'] - $getOnePlaceBeforeTenYears[count($getOnePlaceBeforeTenYears)-1]['converted_date'])/86400)>=9)
				{
					$beforeTenYearsMainArr[] = $getOnePlaceBeforeTenYears;
				}	
			}
			else
			{
				$getOnePlaceBeforeTenYears = $this->removeExistingDate($getOnePlaceBeforeTenYears,$getOnePlaceBeforeTenYears[0]['converted_date'],$getOnePlaceBeforeTenYears[count($getOnePlaceBeforeTenYears)-1]['converted_date']);
				$getWithoutFilterBeforeTenYears = $this->removeExistingDate($getWithoutFilterBeforeTenYears,$getOnePlaceBeforeTenYears[0]['converted_date'],$getOnePlaceBeforeTenYears[count($getOnePlaceBeforeTenYears)-1]['converted_date']);

				$getOnePlaceBeforeTenYears = $this->getLastYearRecordCalculations($rng,$getPlacebeforeTenYears,$getWithoutFilterBeforeTenYears);
				if(round(abs($getOnePlaceBeforeTenYears[0]['converted_date'] - $getOnePlaceBeforeTenYears[count($getOnePlaceBeforeTenYears)-1]['converted_date'])/86400)>=9)
				{
					$beforeTenYearsMainArr[] = $getOnePlaceBeforeTenYears;
				}
			}
				
		}
		//echo "<pre>";print_r($beforeTenYearsMainArr);die;

		$beforeTenYearMainProfitProbArr = array();
		foreach($beforeTenYearsMainArr as $mainkey=>$main)
		{
			$beforeTenYearMainProfitProbArr[] = $this->findProfitPerformanceProbability($main,$last20YearRecord);
			
		}
		//echo "<pre>previous 10 Years ";print_r($beforeTenYearMainProfitProbArr);die;
		/*
			For before 10 Years Calculations end
		*/

		//echo "<pre>";print_r($mainArrrrrrr);
		//die;
		$mainProfitProbArr = array();
		foreach($mainArrrrrrr as $mainkey=>$main)
		{
			$mainProfitProbArr[] = $this->findProfitPerformanceProbability($main,$last20YearRecord);
			
		}
		//echo "<pre>Last 10 Years ";print_r($mainProfitProbArr);die;
		$v=0;
		$p=0;
		$finalPerProbability = array();
		foreach(array_reverse($mainProfitProbArr) as $key => $k)
		{
			$c="0";
		    $c1="0";
		   if($v<=$k['performance'])
		   {
		     $c="1";
		   }

		   if($p<=$k['probability'])
		   {
		     $c1="1";
		   }
		   if($c=="1" && $c1=="1")
		   {
		    $v=$k['performance'];
		    $p=$k['probability'];
		    $finalPerProbability['val'] = $k['val'];
		    $finalPerProbability['dts'] = $k['dts'];
		    $finalPerProbability['numOfPostiveYears'] = $k['numOfPostiveYears'];
		    $finalPerProbability['numOfnegativeYears'] = $k['numOfnegativeYears'];
		    $finalPerProbability['performance'] = $k['performance'];
		    $finalPerProbability['totalDays'] = $k['totalDays'];
		    $finalPerProbability['probability'] = $k['probability'];
		   }
		}

		//final probability for last 20 years
		$v1=0;
		$p1=0;
		$finalPerProbabilityLast20Years = array();
		foreach(array_reverse($lastTwentyYearMainProfitProbArr) as $key => $k)
		{
			$c="0";
		    $c1="0";
		   if($v1<=$k['performance'])
		   {
		     $c="1";
		   }

		   if($p1<=$k['probability'])
		   {
		     $c1="1";
		   }
		   if($c=="1" && $c1=="1")
		   {
		    $v1=$k['performance'];
		    $p1=$k['probability'];
		    $finalPerProbabilityLast20Years['val'] = $k['val'];
		    $finalPerProbabilityLast20Years['dts'] = $k['dts'];
		    $finalPerProbabilityLast20Years['numOfPostiveYears'] = $k['numOfPostiveYears'];
		    $finalPerProbabilityLast20Years['numOfnegativeYears'] = $k['numOfnegativeYears'];
		    $finalPerProbabilityLast20Years['performance'] = $k['performance'];
		    $finalPerProbabilityLast20Years['totalDays'] = $k['totalDays'];
		    $finalPerProbabilityLast20Years['probability'] = $k['probability'];
		   }
		}

		//final probability for last 20 years
		$v2=0;
		$p2=0;
		$finalPerProbabilityPreviousTenYears = array();
		foreach(array_reverse($beforeTenYearMainProfitProbArr) as $key => $k)
		{
			$c="0";
		    $c1="0";
		   if($v2<=$k['performance'])
		   {
		     $c="1";
		   }

		   if($p2<=$k['probability'])
		   {
		     $c1="1";
		   }
		   if($c=="1" && $c1=="1")
		   {
		    $v2=$k['performance'];
		    $p2=$k['probability'];
		    $finalPerProbabilityPreviousTenYears['val'] = $k['val'];
		    $finalPerProbabilityPreviousTenYears['dts'] = $k['dts'];
		    $finalPerProbabilityPreviousTenYears['numOfPostiveYears'] = $k['numOfPostiveYears'];
		    $finalPerProbabilityPreviousTenYears['numOfnegativeYears'] = $k['numOfnegativeYears'];
		    $finalPerProbabilityPreviousTenYears['performance'] = $k['performance'];
		    $finalPerProbabilityPreviousTenYears['totalDays'] = $k['totalDays'];
		    $finalPerProbabilityPreviousTenYears['probability'] = $k['probability'];
		   }
		}

		//echo"$v  $p";
		//echo "<pre>";print_r($finalPerProbability);
		//echo "<pre>";print_r($mainProfitProbArr);
		$data['filterPerformaceProb'] = $finalPerProbability;
		$data['filterPerformaceProbLast20Years'] = $finalPerProbabilityLast20Years;
		$data['filterPerformaceProbPreviousTenYears'] = $finalPerProbabilityPreviousTenYears;
		//echo $data['filterPerformaceProb']['dts']."<br>";
		//echo rtrim($data['filterPerformaceProb']['dts'],',');
		//die;
		$myConfigSeasonalAnalysisFinalGraphp = '{
            "gui":{ 
              "contextMenu":{ 
                "button":{ 
                  "visible": false 
                }
              } 
            },
            "type": "line",
            "utc": true,
            backgroundColor: "white",
            "plotarea": {
                "margin": "dynamic 45 60 dynamic",
            },
            "legend": {
                "layout": "float",
                "background-color": "none",
                "border-width": 0,
                "shadow": 0,
                "align":"center",
                "vertical-align":"bottom",
                "adjust-layout":true,
                "toggle-action": "remove",
                "item":{
                  "padding": 7,
                  "marginRight": 17,
                  "cursor":"hand"
                }
            },
            "scale-x": {
                "labels": ['.$data['filterPerformaceProb']['dts'].'],
            },
            "scale-y": {
                "line-color": "#f6f7f8",
                "shadow": 0,
                "guide": {
                    "line-style": "dashed"
                },
                "label": {
                    "text": "",
                },
                "minor-ticks": 0,
                "thousands-separator": ","
            },
            "crosshair-x": {
                "line-color": "#efefef",
                "plot-label": {
                    "border-radius": "5px",
                    "border-width": "2px",
                    "border-color": "#063853",
                    "padding": "10px",
                    "font-weight": "bold",
                },
                "scale-label": {
                    "font-color": "#fff",
                    "background-color": "#063853",
                    "border-radius": "5px"
                }
            },

            "tooltip": {
                "visible": false
            },
            "plot": {
                tooltip: {
                          text: "%t views: %v%<br>%k%"
                        },
                "highlight":true,
                "shadow": 0,
                "line-width": "2px",
                "marker": {
                    "type": "circle",
                    "size": 3
                },
                "highlight-state": {
                    "line-width":3
                },
                "animation":{
                  "effect":1,
                  "sequence":2,
                  "speed":100,
                }
            },
            series: [
                  {
                    text: "Last 10 Years",
                    values: ['.$data['filterPerformaceProb']['val'].'],
                    legendMarker: {
                      type: "circle",
                      backgroundColor: "#00008b",
                      borderColor: "#00008b",
                      borderWidth: "1px",
                      shadow: false,
                      size: "5px"
                    },
                    "margin-top":"0",
                    lineColor: "#00008b",
                    marker: {
                      backgroundColor: "#00008b",
                      borderColor: "#00008b",
                      borderWidth: "1px",
                      shadow: false
                    }
                  },
                ]
        }';

        $myConfigSeasonalAnalysisFinalGraphpLastTwentyYears = '{
            "gui":{ 
              "contextMenu":{ 
                "button":{ 
                  "visible": false 
                }
              } 
            },
            "type": "line",
            "utc": true,
            backgroundColor: "white",
            "plotarea": {
                "margin": "dynamic 45 60 dynamic",
            },
            "legend": {
                "layout": "float",
                "background-color": "none",
                "border-width": 0,
                "shadow": 0,
                "align":"center",
                "vertical-align":"bottom",
                "adjust-layout":true,
                "toggle-action": "remove",
                "item":{
                  "padding": 7,
                  "marginRight": 17,
                  "cursor":"hand"
                }
            },
            "scale-x": {
                "labels": ['.$data['filterPerformaceProbLast20Years']['dts'].'],
            },
            "scale-y": {
                "line-color": "#f6f7f8",
                "shadow": 0,
                "guide": {
                    "line-style": "dashed"
                },
                "label": {
                    "text": "",
                },
                "minor-ticks": 0,
                "thousands-separator": ","
            },
            "crosshair-x": {
                "line-color": "#efefef",
                "plot-label": {
                    "border-radius": "5px",
                    "border-width": "2px",
                    "border-color": "#063853",
                    "padding": "10px",
                    "font-weight": "bold",
                },
                "scale-label": {
                    "font-color": "#fff",
                    "background-color": "#063853",
                    "border-radius": "5px"
                }
            },

            "tooltip": {
                "visible": false
            },
            "plot": {
                tooltip: {
                          text: "%t views: %v%<br>%k%"
                        },
                "highlight":true,
                "shadow": 0,
                "line-width": "2px",
                "marker": {
                    "type": "circle",
                    "size": 3
                },
                "highlight-state": {
                    "line-width":3
                },
                "animation":{
                  "effect":1,
                  "sequence":2,
                  "speed":100,
                }
            },
            series: [
                  {
                    text: "Last 20 Years",
                    values: ['.$data['filterPerformaceProbLast20Years']['val'].'],
                    legendMarker: {
                      type: "circle",
                      backgroundColor: "#00008b",
                      borderColor: "#00008b",
                      borderWidth: "1px",
                      shadow: false,
                      size: "5px"
                    },
                    "margin-top":"0",
                    lineColor: "#00008b",
                    marker: {
                      backgroundColor: "#00008b",
                      borderColor: "#00008b",
                      borderWidth: "1px",
                      shadow: false
                    }
                  },
                ]
        }';

        $myConfigSeasonalAnalysisFinalGraphpPreviousTenYears = '{
            "gui":{ 
              "contextMenu":{ 
                "button":{ 
                  "visible": false 
                }
              } 
            },
            "type": "line",
            "utc": true,
            backgroundColor: "white",
            "plotarea": {
                "margin": "dynamic 45 60 dynamic",
            },
            "legend": {
                "layout": "float",
                "background-color": "none",
                "border-width": 0,
                "shadow": 0,
                "align":"center",
                "vertical-align":"bottom",
                "adjust-layout":true,
                "toggle-action": "remove",
                "item":{
                  "padding": 7,
                  "marginRight": 17,
                  "cursor":"hand"
                }
            },
            "scale-x": {
                "labels": ['.$data['filterPerformaceProbPreviousTenYears']['dts'].'],
            },
            "scale-y": {
                "line-color": "#f6f7f8",
                "shadow": 0,
                "guide": {
                    "line-style": "dashed"
                },
                "label": {
                    "text": "",
                },
                "minor-ticks": 0,
                "thousands-separator": ","
            },
            "crosshair-x": {
                "line-color": "#efefef",
                "plot-label": {
                    "border-radius": "5px",
                    "border-width": "2px",
                    "border-color": "#063853",
                    "padding": "10px",
                    "font-weight": "bold",
                },
                "scale-label": {
                    "font-color": "#fff",
                    "background-color": "#063853",
                    "border-radius": "5px"
                }
            },

            "tooltip": {
                "visible": false
            },
            "plot": {
                tooltip: {
                          text: "%t views: %v%<br>%k%"
                        },
                "highlight":true,
                "shadow": 0,
                "line-width": "2px",
                "marker": {
                    "type": "circle",
                    "size": 3
                },
                "highlight-state": {
                    "line-width":3
                },
                "animation":{
                  "effect":1,
                  "sequence":2,
                  "speed":100,
                }
            },
            series: [
                  {
                    text: "Previous 10 Years",
                    values: ['.$data['filterPerformaceProbPreviousTenYears']['val'].'],
                    legendMarker: {
                      type: "circle",
                      backgroundColor: "#00008b",
                      borderColor: "#00008b",
                      borderWidth: "1px",
                      shadow: false,
                      size: "5px"
                    },
                    "margin-top":"0",
                    lineColor: "#00008b",
                    marker: {
                      backgroundColor: "#00008b",
                      borderColor: "#00008b",
                      borderWidth: "1px",
                      shadow: false
                    }
                  },
                ]
        }';

        $ProfitProbabilityFinalGraphStatics = '{ "gui":{ "contextMenu":{ "button":{ "visible": false } } }, "type": "line", "utc": true, backgroundColor: "white", "plotarea": { "margin": "dynamic 45 60 dynamic", }, "legend": { "layout": "float", "background-color": "none", "border-width": 0, "shadow": 0, "align":"center", "vertical-align":"bottom", "adjust-layout":true, "toggle-action": "remove", "item":{ "padding": 7, "marginRight": 17, "cursor":"hand" } }, "scale-x": { "labels": [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28], }, "scale-y": { "line-color": "#f6f7f8", "shadow": 0, "guide": { "line-style": "dashed" }, "label": { "text": "", }, "minor-ticks": 0, "thousands-separator": "," }, "crosshair-x": { "line-color": "#efefef", "plot-label": { "border-radius": "5px", "border-width": "2px", "border-color": "#063853", "padding": "10px", "font-weight": "bold", }, "scale-label": { "font-color": "#fff", "background-color": "#063853", "border-radius": "5px" } }, "tooltip": { "visible": false }, "plot": { tooltip: { text: "%t views: %v%
%k%" }, "highlight":true, "shadow": 0, "line-width": "2px", "marker": { "type": "circle", "size": 3 }, "highlight-state": { "line-width":3 }, "animation":{ "effect":1, "sequence":2, "speed":100, } }, series: [ { text: "Last 10 Years", values: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28], legendMarker: { type: "circle", backgroundColor: "#00008b", borderColor: "#00008b", borderWidth: "1px", shadow: false, size: "5px" }, "margin-top":"0", lineColor: "#00008b", marker: { backgroundColor: "#00008b", borderColor: "#00008b", borderWidth: "1px", shadow: false } }, { text: "Last 20 Years", values: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28], visible: false, legendMarker: { type: "circle", backgroundColor: "#000000", borderColor: "#000000", borderWidth: "1px", shadow: false, size: "5px" }, lineColor: "#000000", marker: { backgroundColor: "#000000", borderColor: "#000000", borderWidth: "1px", shadow: false } }, { text: "Previous 10 Years", values: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28], visible: false, legendMarker: { type: "circle", backgroundColor: "green", borderColor: "green", borderWidth: "1px", shadow: false, size: "5px" }, lineColor: "green", marker: { backgroundColor: "green", borderColor: "green", borderWidth: "1px", shadow: false } } ] }';

        $data['myConfigSeasonalAnalysisFinalGraphp'] = $myConfigSeasonalAnalysisFinalGraphp;
        $data['myConfigSeasonalAnalysisFinalGraphpLastTwentyYears'] = $myConfigSeasonalAnalysisFinalGraphpLastTwentyYears;
        $data['myConfigSeasonalAnalysisFinalGraphpPreviousTenYears'] = $myConfigSeasonalAnalysisFinalGraphpPreviousTenYears;
        $data['ProfitProbabilityFinalGraphStatics'] = $ProfitProbabilityFinalGraphStatics;

		
		$data['xLabel'] = implode(',', $xRangeLabel);
		$data['last10Years'] = implode(',', $last10YearsEvolutions);
		$data['last20Years'] = implode(',', $last20YearsEvolutions);
		$data['previous10Years'] = implode(',', $previous10YearsEvolutions);
		//$data['performanceLast10Years'] = $found_item['profit'];

		/*filter records*/
		$data['filterDates'] = implode(',',$filterDates);
		$data['filterAverageEvolution10years'] = implode(',',$filterAverageEvolution10years);
		$data['filterAverageEvolution20years'] = implode(',',$filterAverageEvolution20years);
		$data['filterAverageEvolutionPrevious10years'] = implode(',',$filterAverageEvolutionPrevious10years);

		/*$data['numberOfTotalDays'] = $numberOfTotalDays;
		$data['numberOfPositiveDays'] = $numberOfPositiveDays;
		$data['numberOfNegativeDays'] = $numberOfNegativeDays;*/
		$data['numberOfTotalDays'] = 20;
		$data['numberOfPositiveDays'] = $numOfPostiveYears;
		$data['numberOfNegativeDays'] = $numOfnegativeYears;
		//echo $data['filterDates'];die;
		$data['seasionalDate'] = $this->chart_model->printSeasionalAnalysisdate(date('Y').'-01-01', date('Y').'-12-31');

		$myConfigSeasonalAnalysis = '{
            "gui":{ 
              "contextMenu":{ 
                "button":{ 
                  "visible": false 
                }
              } 
            },
            "type": "line",
            "utc": true,
            backgroundColor: "white",
            "plotarea": {
                "margin": "dynamic 45 60 dynamic",
            },
            "legend": {
                "layout": "float",
                "background-color": "none",
                "border-width": 0,
                "shadow": 0,
                "align":"center",
                "vertical-align":"bottom",
                "adjust-layout":true,
                "toggle-action": "remove",
                "item":{
                  "padding": 7,
                  "marginRight": 17,
                  "cursor":"hand"
                }
            },
            "scale-x": {
                "labels": ['.$data['filterDates'].'],
            },
            "scale-y": {
                "line-color": "#f6f7f8",
                "shadow": 0,
                "guide": {
                    "line-style": "dashed"
                },
                "label": {
                    "text": "",
                },
                "minor-ticks": 0,
                "thousands-separator": ","
            },
            "crosshair-x": {
                "line-color": "#efefef",
                "plot-label": {
                    "border-radius": "5px",
                    "border-width": "2px",
                    "border-color": "#063853",
                    "padding": "10px",
                    "font-weight": "bold",
                },
                "scale-label": {
                    "font-color": "#fff",
                    "background-color": "#063853",
                    "border-radius": "5px"
                }
            },

            "tooltip": {
                "visible": false
            },
            "plot": {
                tooltip: {
                          text: "%t views: %v%<br>%k%"
                        },
                "highlight":true,
                "shadow": 0,
                "line-width": "2px",
                "marker": {
                    "type": "circle",
                    "size": 3
                },
                "highlight-state": {
                    "line-width":3
                },
                "animation":{
                  "effect":1,
                  "sequence":2,
                  "speed":100,
                }
            },
            series: [
                  {
                    text: "Media '.$data['media_last10years'].'",
                    values: ['.$data['filterAverageEvolution10years'].'],
                    legendMarker: {
                      type: "circle",
                      backgroundColor: "#00008b",
                      borderColor: "#00008b",
                      borderWidth: "1px",
                      shadow: false,
                      size: "5px"
                    },
                    "margin-top":"0",
                    lineColor: "#00008b",
                    marker: {
                      backgroundColor: "#00008b",
                      borderColor: "#00008b",
                      borderWidth: "1px",
                      shadow: false
                    }
                  },
                  {
                    text: "Media '.$data['media_last20years'].'",
                    values: ['.$data['filterAverageEvolution20years'].'],
                    visible: false,
                    legendMarker: {
                      type: "circle",
                      backgroundColor: "#000000",
                      borderColor: "#000000",
                      borderWidth: "1px",
                      shadow: false,
                      size: "5px"
                    },
                    lineColor: "#000000",
                    marker: {
                      backgroundColor: "#000000",
                      borderColor: "#000000",
                      borderWidth: "1px",
                      shadow: false
                    }
                  },
                  {
                    text: "Media '.$data['media_previous10years'].'",
                    values: ['.$data['filterAverageEvolutionPrevious10years'].'],
                    visible: false,
                    legendMarker: {
                      type: "circle",
                      backgroundColor: "green",
                      borderColor: "green",
                      borderWidth: "1px",
                      shadow: false,
                      size: "5px"
                    },
                    lineColor: "green",
                    marker: {
                      backgroundColor: "green",
                      borderColor: "green",
                      borderWidth: "1px",
                      shadow: false
                    }
                  }
                ]
        }';

        $data['myConfigSeasonalAnalysis'] = $myConfigSeasonalAnalysis;

		/*End Of Seasional Analysis Calculation*/





		/*==================================**Fundamental Chart Calculations**==========================================*/

		$noDataFoundFundamental = 0;
		if($data['stock_details']->symbol!="")
		{
			$stockApiSummary = $this->chart_model->apiLinkData('get-summary?region=US&symbol='.$data['stock_details']->symbol);
			$stockApiSummary = json_decode($stockApiSummary);
			if($stockApiSummary->quoteType->longName)
			{
				$data['apiStockName'] = $stockApiSummary->quoteType->longName;
			}
			else
			{
				$data['apiStockName'] = $stockApiSummary->quoteType->shortName;
			}
			$FundamentalArr = $this->chart_model->apiLinkData('get-balance-sheet?symbol='.$data['stock_details']->symbol);
			$FundamentalArr = json_decode($FundamentalArr);
			//echo "<pre>";print_r($FundamentalArr);die();
			$TotalAssets = $FundamentalArr->balanceSheetHistory->balanceSheetStatements[0]->totalAssets->raw;
			$TotalCurrentAssets = $FundamentalArr->balanceSheetHistory->balanceSheetStatements[0]->totalCurrentAssets->raw;
			$cash = $FundamentalArr->balanceSheetHistory->balanceSheetStatements[0]->cash->raw;
			$netReceivables = $FundamentalArr->balanceSheetHistory->balanceSheetStatements[0]->netReceivables->raw;
			$treasuryStock = $FundamentalArr->balanceSheetHistory->balanceSheetStatements[0]->treasuryStock->raw;
			$inventory = $FundamentalArr->balanceSheetHistory->balanceSheetStatements[0]->inventory->raw;
			$otherCurrentAssets = $FundamentalArr->balanceSheetHistory->balanceSheetStatements[0]->otherCurrentAssets->raw;
			$totalNonCurrentAssets = $TotalAssets-$TotalCurrentAssets;
			$currentAssetsPercentage = 0;
			$nonCurrentAssetsPercentage = 0;
			$cashPercentage = 0;
			$netReceivablesPercentage = 0;
			$inventoryPercentage = 0;
			$otherCurrentAssetsPercentage = 0;
			$currentAssetsPercentage = ($TotalCurrentAssets/$TotalAssets)*100;
			$nonCurrentAssetsPercentage = ($totalNonCurrentAssets/$TotalAssets)*100;
			$cashPercentage = ($cash/$TotalAssets)*100;
			$netReceivablesPercentage = ($netReceivables/$TotalAssets)*100;
			$inventoryPercentage = ($inventory/$TotalAssets)*100;
			$otherCurrentAssetsPercentage = ($otherCurrentAssets/$TotalAssets)*100;
			//Second chart calculation
			$totalLiab = $FundamentalArr->balanceSheetHistory->balanceSheetStatements[0]->totalLiab->raw;
			$totalStockholderEquity = $FundamentalArr->balanceSheetHistory->balanceSheetStatements[0]->totalStockholderEquity->raw;
			$totalCurrentLiabilities = $FundamentalArr->balanceSheetHistory->balanceSheetStatements[0]->totalCurrentLiabilities->raw;

			$minorityInterest = $FundamentalArr->balanceSheetHistory->balanceSheetStatements[0]->minorityInterest->raw;
			$totalEquity = $totalStockholderEquity+$minorityInterest;
			/*echo $TotalAssets."  total Assets<br>";
			echo $totalLiab."  total liab<br>";
			echo $totalEquity."  total equity<br>";

			echo ($totalLiab+$totalEquity)." Sum of total liab and equity";
			die();*/
			$nonCurrenLiabilities = $totalLiab-$totalCurrentLiabilities;
			//$equity = ($totalLiab+$totalStockholderEquity)-($totalCurrentLiabilities+$nonCurrenLiabilities);

			$equity = $totalStockholderEquity;
			$currentLiabilitiesPercentage = 0;
			$NoncurrentLiabilitiesPercentage = 0;
			$equityPercentage = 0;
			$currentLiabilitiesPercentage = ($totalCurrentLiabilities/($totalLiab+$totalEquity))*100;
			$NoncurrentLiabilitiesPercentage = ($nonCurrenLiabilities/($totalLiab+$totalEquity))*100;
			$equityPercentage = ($totalEquity/($totalLiab+$totalEquity))*100;
			//Ratio calculations start
			$borrowingRatio = 0;
			$borrowingColor = "red";
			$borrowingRatio = ($totalLiab/$TotalAssets)*100;
			if(($borrowingRatio>=50 && $borrowingRatio<=60) || $borrowingRatio<50)
			{
				$borrowingColor = "#29a2cc";
			}
			$debtQualityRatio = 0;
			$debtQualityColor = "red";
			$debtQualityRatio = ($totalCurrentLiabilities/$totalLiab)*100;
			if($debtQualityRatio<30)
			{
				$debtQualityColor = "#29a2cc";
			}
			$liquidityRatiosLiquidity = 0;
			$liquidityRatiosLiquidityColor = "red";
			$liquidityRatiosLiquidity = ($TotalCurrentAssets/$totalCurrentLiabilities);
			if($liquidityRatiosLiquidity>=1 && $liquidityRatiosLiquidity<=5)
			{
				$liquidityRatiosLiquidityColor ="#29a2cc";
			}
			$liquidityRatiosTreasury = 0;
			$liquidityRatiosTreasuryColor = "red";
			$liquidityRatiosTreasury = (($netReceivables+$treasuryStock)/$totalCurrentLiabilities);
			if($liquidityRatiosTreasury>=0.5 && $liquidityRatiosTreasury<=1.5)
			{
				$liquidityRatiosTreasuryColor = "#29a2cc";
			}
			$liquidityRatiosAcidTest = 0;
			$liquidityRatiosAcidTestColor = "red";
			$liquidityRatiosAcidTest = $treasuryStock/$totalCurrentLiabilities;
			if($liquidityRatiosAcidTest>=2 && $liquidityRatiosAcidTest<=3)
			{
				$liquidityRatiosAcidTestColor = "#29a2cc";
			}

			/*Ratio calculations End*/

			/********************************************************************************************

				Other Ratio Calculation Start
			**********************************************************************************************/
			$OtherRatioLink = $this->chart_model->apiLinkData('get-statistics?region=US&symbol='.$data['stock_details']->symbol);
			$OtherRatioLink = json_decode($OtherRatioLink);
			//$defaultKeyStatistics = $result->defaultKeyStatistics;
			$forwardPE_PER = $OtherRatioLink->defaultKeyStatistics->forwardPE->fmt;
			$pegRatio_PEG = $OtherRatioLink->defaultKeyStatistics->pegRatio->fmt;
			$beta = $OtherRatioLink->defaultKeyStatistics->beta->fmt;
			$dividendRate = $OtherRatioLink->summaryDetail->dividendRate->fmt;
			$operatingMargins = $OtherRatioLink->financialData->operatingMargins->fmt;

			$dataSource = 'Source Yahoo Finance';
		}
		else if($data['stock_details']->nonCurrentAssets>0 && $data['stock_details']->currentAssets>0 && $data['stock_details']->cash>0 && $data['stock_details']->netReceivable>0 && $data['stock_details']->nonCurrentLiabilities>0 && $data['stock_details']->currentLiabilities>0)
		{
			$currentAssetsPercentage = $data['stock_details']->currentAssets;
			$nonCurrentAssetsPercentage = $data['stock_details']->nonCurrentAssets;
			$cashPercentage = $data['stock_details']->cash;
			$netReceivablesPercentage = $data['stock_details']->netReceivable;
			$inventoryPercentage = $data['stock_details']->inventory;
			$otherCurrentAssetsPercentage = $data['stock_details']->otherCurrentAssets;
			$currentLiabilitiesPercentage = $data['stock_details']->currentLiabilities;
			$NoncurrentLiabilitiesPercentage = $data['stock_details']->nonCurrentLiabilities;
			$equityPercentage = $data['stock_details']->equity;

			/*$borrowingColor = $data['stock_details']->debtBorrowing;
			$debtQualityColor = $data['stock_details']->debtQuality;
			$liquidityRatiosLiquidityColor = $data['stock_details']->liquidityLiquidity;
			$liquidityRatiosTreasuryColor = $data['stock_details']->liquidityTreasury;
			$liquidityRatiosAcidTestColor = $data['stock_details']->liquidityAcidTest;*/

			//Ratio calculations start
			$borrowingRatio = 0;
			$borrowingColor = "red";
			$borrowingRatio = $data['stock_details']->debtBorrowing;
			if(($borrowingRatio>=50 && $borrowingRatio<=60) || $borrowingRatio<50)
			{
				$borrowingColor = "#29a2cc";
			}
			$debtQualityRatio = 0;
			$debtQualityColor = "red";
			$debtQualityRatio = $data['stock_details']->debtQuality;
			if($debtQualityRatio<30)
			{
				$debtQualityColor = "#29a2cc";
			}
			$liquidityRatiosLiquidity = 0;
			$liquidityRatiosLiquidityColor = "red";
			$liquidityRatiosLiquidity = $data['stock_details']->liquidityLiquidity;
			if($liquidityRatiosLiquidity>=1 && $liquidityRatiosLiquidity<=5)
			{
				$liquidityRatiosLiquidityColor ="#29a2cc";
			}
			$liquidityRatiosTreasury = 0;
			$liquidityRatiosTreasuryColor = "red";
			$liquidityRatiosTreasury = $data['stock_details']->liquidityTreasury;
			if($liquidityRatiosTreasury>=0.5 && $liquidityRatiosTreasury<=1.5)
			{
				$liquidityRatiosTreasuryColor = "#29a2cc";
			}
			$liquidityRatiosAcidTest = 0;
			$liquidityRatiosAcidTestColor = "red";
			$liquidityRatiosAcidTest = $data['stock_details']->liquidityAcidTest;
			if($liquidityRatiosAcidTest>=2 && $liquidityRatiosAcidTest<=3)
			{
				$liquidityRatiosAcidTestColor = "#29a2cc";
			}



			$forwardPE_PER = $data['stock_details']->forwardPE_PER;
			$pegRatio_PEG = $data['stock_details']->pegRatio_PEG;
			$beta = $data['stock_details']->otherBeta;
			$dividendRate = $data['stock_details']->otherDividendRate;
			$operatingMargins = $data['stock_details']->otherOperatingMargin;
			$dataSource = 'Source Fivepercent Admin';
		}
		else
		{
			$currentAssetsPercentage = $data['stock_details']->currentAssets;
			$nonCurrentAssetsPercentage = $data['stock_details']->nonCurrentAssets;
			$cashPercentage = $data['stock_details']->cash;
			$netReceivablesPercentage = $data['stock_details']->netReceivable;
			$inventoryPercentage = $data['stock_details']->inventory;
			$otherCurrentAssetsPercentage = $data['stock_details']->otherCurrentAssets;
			$currentLiabilitiesPercentage = $data['stock_details']->currentLiabilities;
			$NoncurrentLiabilitiesPercentage = $data['stock_details']->nonCurrentLiabilities;
			$equityPercentage = $data['stock_details']->equity;
			//Ratio calculations start
			$borrowingRatio = 0;
			$borrowingColor = "red";
			$borrowingRatio = $data['stock_details']->debtBorrowing;
			if(($borrowingRatio>=50 && $borrowingRatio<=60) || $borrowingRatio<50)
			{
				$borrowingColor = "#29a2cc";
			}
			$debtQualityRatio = 0;
			$debtQualityColor = "red";
			$debtQualityRatio = $data['stock_details']->debtQuality;
			if($debtQualityRatio<30)
			{
				$debtQualityColor = "#29a2cc";
			}
			$liquidityRatiosLiquidity = 0;
			$liquidityRatiosLiquidityColor = "red";
			$liquidityRatiosLiquidity = $data['stock_details']->liquidityLiquidity;
			if($liquidityRatiosLiquidity>=1 && $liquidityRatiosLiquidity<=5)
			{
				$liquidityRatiosLiquidityColor ="#29a2cc";
			}
			$liquidityRatiosTreasury = 0;
			$liquidityRatiosTreasuryColor = "red";
			$liquidityRatiosTreasury = $data['stock_details']->liquidityTreasury;
			if($liquidityRatiosTreasury>=0.5 && $liquidityRatiosTreasury<=1.5)
			{
				$liquidityRatiosTreasuryColor = "#29a2cc";
			}
			$liquidityRatiosAcidTest = 0;
			$liquidityRatiosAcidTestColor = "red";
			$liquidityRatiosAcidTest = $data['stock_details']->liquidityAcidTest;
			if($liquidityRatiosAcidTest>=2 && $liquidityRatiosAcidTest<=3)
			{
				$liquidityRatiosAcidTestColor = "#29a2cc";
			}
			
			$forwardPE_PER = $data['stock_details']->forwardPE_PER;
			$pegRatio_PEG = $data['stock_details']->pegRatio_PEG;
			$beta = $data['stock_details']->otherBeta;
			$dividendRate = $data['stock_details']->otherDividendRate;
			$operatingMargins = $data['stock_details']->otherOperatingMargin;
			$noDataFoundFundamental = 1;
			$dataSource = 'Source Fivepercent Admin';
		}
		



		//echo "<pre>";print_r($forwardPE_PER);die;

		/********************************************************************************************

			Other Ratio Calculation End

		**********************************************************************************************/

		/*$totalSecondMainChart = round($equityPercentage)+round($NoncurrentLiabilitiesPercentage)+round($currentLiabilitiesPercentage);
		echo round($equityPercentage)."-------".$equityPercentage."<br>";
		echo round($NoncurrentLiabilitiesPercentage)."-------".$NoncurrentLiabilitiesPercentage."<br>";
		echo round($currentLiabilitiesPercentage)."-------".$currentLiabilitiesPercentage."<br>";
		echo $totalSecondMainChart;die;*/



		$fundamentalViewArr = array(

									'currentAssetsPercentage'=>number_format($currentAssetsPercentage,2,'.',''),

									'nonCurrentAssetsPercentage'=>number_format($nonCurrentAssetsPercentage,2,'.',''),

									//for fundamental chart details.

									'cashPercentage'=>number_format($cashPercentage,2,'.',''),

									'netReceivablesPercentage'=>number_format($netReceivablesPercentage,2,'.',''),

									'inventoryPercentage'=>number_format($inventoryPercentage,2,'.',''),

									'otherCurrentAssetsPercentage'=>number_format($otherCurrentAssetsPercentage,2,'.',''),

									'currentLiabilitiesPercentage'=>number_format($currentLiabilitiesPercentage,2,'.',''),

									'NoncurrentLiabilitiesPercentage'=>number_format($NoncurrentLiabilitiesPercentage,2,'.',''),

									'equityPercentage'=>number_format($equityPercentage,2,'.',''),

									//ratio array

									'borrowingRatio'=>$borrowingColor,

									'debtQualityRatio'=>$debtQualityColor,

									'liquidityRatiosLiquidityColor'=>$liquidityRatiosLiquidityColor,

									'liquidityRatiosTreasuryColor'=>$liquidityRatiosTreasuryColor,

									'liquidityRatiosAcidTestColor'=>$liquidityRatiosAcidTestColor,

									//other Ratio

									'forwardPE_PER'=>$forwardPE_PER,

									'pegRatio_PEG'=>$pegRatio_PEG,

									'beta'=>$beta,

									'dividendRate'=>$dividendRate,

									'operatingMargins'=>$operatingMargins,
									'noDataFoundFundamental'=>$noDataFoundFundamental,
									'dataSource'=>$dataSource,
									);

		//echo "<pre>";print_r($fundamentalViewArr);die();

		$data['fundamentalArr'] = $fundamentalViewArr;
		$this->load->view('page/portfolio/details-stock-portfolio',$data);

	}
	function getProbProfitUsingStartDateEndDate($actual_stock_id,$startDate,$endDate,$totalNumberOfYearsCalCulation=0)
	{
		//new code from 16 June 2021
		error_reporting(0);

		$beginLabel = new DateTime( '2016-01-01' );
		$endLabel = (new DateTime( '2016-12-31' ))->modify( '+1 day' );
		$intervalLabel = new DateInterval('P1D');
		$labelRange = new DatePeriod($beginLabel, $intervalLabel ,$endLabel);
		$xRangeLabel = array();
		$allDates = array();
		foreach($labelRange as $range)
		{
			$xRangeLabel[] = "'".$range->format('d-M')."'";
			$allDates[] = $range->format('d-M');
		}
		$startDate = array_search(trim($startDate,"'"), $allDates);
		$endDate = array_search(trim($endDate,"'"), $allDates);
		//echo $startDate."==".$endDate;die();
		$the_big_array = $this->chart_model->getSeasionalAllRecord($actual_stock_id);
		$dateRange = $this->chart_model->printSeasionalAnalysisdate(date('Y').'-01-01', date('Y').'-12-31','d-m');
		//echo "<pre>";print_r($dateRange);die;
		foreach($this->chart_model->printSeasionalAnalysisdate(date('Y').'-03-16', date('Y').'-04-03','d-M') as $xl)
		{
			$xdata[] = "'".$xl."'";
		}
		
		if($totalNumberOfYearsCalCulation==20)
		{
			$totalNumberOfYearsCalCulation = 20;
			/*Last 10 Years*/
			$last10YearsStartYear = date("Y",strtotime($the_big_array[0]['actual_date']."-11 year"));
			$last10YearsEndYear =  $the_big_array[0]['year'];
			//echo $last10YearsStartYear."--".$last10YearsEndYear."<br>";
			//die;
			/*Last 20 Years*/
			$Last20YearsStartYear =  date("Y",strtotime($the_big_array[0]['actual_date']."-21 year"));
			$last20YearsEndYear =  $the_big_array[0]['year'];

			//echo $Last20YearsStartYear."----".$last20YearsEndYear;die();
			/*previous 10 Years*/
			$before10YearsStartYear = $Last20YearsStartYear+1;
			$before10YearsEndYear = $last10YearsStartYear+1;

			$data['last20YeearData'] = 'Last 20 Years';
			$data['last10YeearData'] = 'Last 10 Years';
			$data['previous10YeearData'] = 'Previous 10 Years';
			
		}
		if($totalNumberOfYearsCalCulation==10)
		{
			$last10YearsStartYear = date("Y",strtotime($the_big_array[0]['actual_date']."-6 year"));
			$last10YearsEndYear =  $the_big_array[0]['year'];
			//echo $last10YearsStartYear."--".$last10YearsEndYear."<br>";
			//die;
			/*Last 20 Years*/
			$Last20YearsStartYear =  date("Y",strtotime($the_big_array[0]['actual_date']."-11 year"));
			$last20YearsEndYear =  $the_big_array[0]['year'];

			/*previous 10 Years*/
			$before10YearsStartYear = $Last20YearsStartYear+1;
			$before10YearsEndYear = $last10YearsStartYear+1;
		}

		$dts=[];
		$vlu=[];
		$last20YearsDates = array();
		$last20YearsValue = array();
		$before10YearsDates = array();
		$before10YearsValue = array();
		foreach($the_big_array as $val)
		{
			if(($last10YearsEndYear>=$val['year']) && (($last10YearsStartYear+1)<=$val['year']))
			{
				$dts[]=$val['search_date_all'];
				$vlu[]=str_replace(",","",$val['price']);
			}
			if(($last20YearsEndYear>=$val['year']) && (($Last20YearsStartYear+1)<=$val['year']))
			{	
				$last20YearsDates[]=$val['search_date_all'];
				$last20YearsValue[]=str_replace(",","",$val['price']);
			}
			if(($before10YearsEndYear>=$val['year']) && (($before10YearsStartYear+1)<=$val['year']))
			{	
				$before10YearsDates[]=$val['search_date_all'];
				$before10YearsValue[]=str_replace(",","",$val['price']);
			}
		}
		//echo "<pre>";print_r($dts);die;
		$daterange = $this->getYearsBetweenDate($last10YearsStartYear+1,$last10YearsEndYear);
		//echo "<pre>";print_r($daterange);die;
		$last10YearsAllDatesVal = $this->getAllDatesAndvaluesSeasionalAnalysis($daterange,$dts,$vlu);
		//echo "<pre>";print_r($last10YearsAllDatesVal);die;
		$last10YearRecord = array();
		$c=0;
		foreach($last10YearsAllDatesVal as $key=>$ddd)
		{
			foreach($last10YearsAllDatesVal[$key] as $var)
			{
				$last10YearRecord[$c][] = $var;	
			}
			$c++;
		}
		if($totalNumberOfYearsCalCulation==20)
		{
			$array1 = array_reverse($last10YearRecord[0]); // 31 Dec
			$array2 = array_reverse($last10YearRecord[1]);
			$array3 = array_reverse($last10YearRecord[2]);		
			$array4 = array_reverse($last10YearRecord[3]);
			$array5 = array_reverse($last10YearRecord[4]);
			$array6 = array_reverse($last10YearRecord[5]);
			$array7 = array_reverse($last10YearRecord[6]);
			$array8 = array_reverse($last10YearRecord[7]);
			$array9 = array_reverse($last10YearRecord[8]);
			$array10 = array_reverse($last10YearRecord[9]);
			$array11 = array_reverse($last10YearRecord[10]);
					
			$variance1 = $this->getVariance($array1);
			$variance2 = $this->getVariance($array2);
			$variance3 = $this->getVariance($array3);
			$variance4 = $this->getVariance($array4);
			$variance5 = $this->getVariance($array5);
			$variance6 = $this->getVariance($array6);
			$variance7 = $this->getVariance($array7);
			$variance8 = $this->getVariance($array8);
			$variance9 = $this->getVariance($array9);
			$variance10 = $this->getVariance($array10);
			$variance11 = $this->getVariance($array11);
			$last10YearsAllVarianceArr = array(
												$variance2,
												$variance3,
												$variance4,
												$variance5,
												$variance6,
												$variance7,
												$variance8,
												$variance9,
												$variance10,
												$variance11
											);
			$performanceArrLast10Years = array(
									$this->getNumberOfPostiveYearNegativeYearByVariance($last10YearsAllVarianceArr[0],$startDate,$endDate,$last10YearRecord[1]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($last10YearsAllVarianceArr[1],$startDate,$endDate,$last10YearRecord[2]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($last10YearsAllVarianceArr[2],$startDate,$endDate,$last10YearRecord[3]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($last10YearsAllVarianceArr[3],$startDate,$endDate,$last10YearRecord[4]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($last10YearsAllVarianceArr[4],$startDate,$endDate,$last10YearRecord[5]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($last10YearsAllVarianceArr[5],$startDate,$endDate,$last10YearRecord[6]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($last10YearsAllVarianceArr[6],$startDate,$endDate,$last10YearRecord[7]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($last10YearsAllVarianceArr[7],$startDate,$endDate,$last10YearRecord[8]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($last10YearsAllVarianceArr[8],$startDate,$endDate,$last10YearRecord[9]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($last10YearsAllVarianceArr[9],$startDate,$endDate,$last10YearRecord[10]),
									);

			$performanceLast10 = array_sum($performanceArrLast10Years)/10;

			$data['performanceLast10Years'] = number_format($performanceLast10*100,2,".","");
			$data['performanceLast10Years'] = $this->calCulateHorizontalAverage($last10YearRecord,$startDate,$endDate,10);

			$filterAverageEvolution10years = $this->filterHorizontalAverageEvolution($last10YearRecord,$startDate,$endDate,10);
		}
		if($totalNumberOfYearsCalCulation==10)
		{
			$array1 = array_reverse($last10YearRecord[0]); // 31 Dec
			$array2 = array_reverse($last10YearRecord[1]);
			$array3 = array_reverse($last10YearRecord[2]);		
			$array4 = array_reverse($last10YearRecord[3]);
			$array5 = array_reverse($last10YearRecord[4]);
			$array6 = array_reverse($last10YearRecord[5]);
					
			$variance1 = $this->getVariance($array1);
			$variance2 = $this->getVariance($array2);
			$variance3 = $this->getVariance($array3);
			$variance4 = $this->getVariance($array4);
			$variance5 = $this->getVariance($array5);
			$variance6 = $this->getVariance($array6);
		
			$last10YearsAllVarianceArr = array(
												$variance2,
												$variance3,
												$variance4,
												$variance5,
												$variance6,
												
											);
			$performanceArrLast10Years = array(
									$this->getNumberOfPostiveYearNegativeYearByVariance($last10YearsAllVarianceArr[0],$startDate,$endDate,$last10YearRecord[1]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($last10YearsAllVarianceArr[1],$startDate,$endDate,$last10YearRecord[2]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($last10YearsAllVarianceArr[2],$startDate,$endDate,$last10YearRecord[3]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($last10YearsAllVarianceArr[3],$startDate,$endDate,$last10YearRecord[4]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($last10YearsAllVarianceArr[4],$startDate,$endDate,$last10YearRecord[5])
									);

			$performanceLast10 = array_sum($performanceArrLast10Years)/5;

			$data['performanceLast10Years'] = number_format($performanceLast10*100,2,".","");
			$data['performanceLast10Years'] = $this->calCulateHorizontalAverage($last10YearRecord,$startDate,$endDate,5);
			$filterAverageEvolution10years = $this->filterHorizontalAverageEvolution($last10YearRecord,$startDate,$endDate,5);
		}
		
		//$data['performanceLast10Years'] = number_format(array_sum($filterAverageEvolution10years)/count($filterAverageEvolution10years),2,".","");
		//echo "<pre>";print_r($filterAverageEvolution10years);die;
		/* 
			Last 20 Years Calculations Starts 
		*/
		$daterangeLast20Years = $this->getYearsBetweenDate($Last20YearsStartYear+1,$last20YearsEndYear);
		$last20YearsAllDatesVal = $this->getAllDatesAndvaluesSeasionalAnalysis($daterangeLast20Years,$last20YearsDates,$last20YearsValue);
		//echo "<pre>";print_r($last20YearsAllDatesVal);die;
		$last20YearRecord = array();
		$d=0;
		foreach($last20YearsAllDatesVal as $key=>$ddd)
		{
			foreach($last20YearsAllDatesVal[$key] as $var)
			{
				$last20YearRecord[$d][] = $var;	
			}
			$d++;
		}
		if($totalNumberOfYearsCalCulation==20)
		{
			$Last20Yearsarray1 = array_reverse($last20YearRecord[0]);// 31 Dec
			$Last20Yearsarray2 = array_reverse($last20YearRecord[1]);// 31 Dec
			$Last20Yearsarray3 = array_reverse($last20YearRecord[2]);
			$Last20Yearsarray4 = array_reverse($last20YearRecord[3]);
			$Last20Yearsarray5 = array_reverse($last20YearRecord[4]);
			$Last20Yearsarray6 = array_reverse($last20YearRecord[5]);
			$Last20Yearsarray7 = array_reverse($last20YearRecord[6]);
			$Last20Yearsarray8 = array_reverse($last20YearRecord[7]);
			$Last20Yearsarray9 = array_reverse($last20YearRecord[8]);
			$Last20Yearsarray10 = array_reverse($last20YearRecord[9]);
			$Last20Yearsarray11 = array_reverse($last20YearRecord[10]);
			$Last20Yearsarray12 = array_reverse($last20YearRecord[11]);
			$Last20Yearsarray13 = array_reverse($last20YearRecord[12]);
			$Last20Yearsarray14 = array_reverse($last20YearRecord[13]);
			$Last20Yearsarray15 = array_reverse($last20YearRecord[14]);
			$Last20Yearsarray16 = array_reverse($last20YearRecord[15]);
			$Last20Yearsarray17 = array_reverse($last20YearRecord[16]);
			$Last20Yearsarray18 = array_reverse($last20YearRecord[17]);
			$Last20Yearsarray19 = array_reverse($last20YearRecord[18]);
			$Last20Yearsarray20 = array_reverse($last20YearRecord[19]);
			$Last20Yearsarray21 = array_reverse($last20YearRecord[20]);
					
			$Last20YearsVariance1 = $this->getVariance($Last20Yearsarray1);
			$Last20YearsVariance2 = $this->getVariance($Last20Yearsarray2);
			$Last20YearsVariance3 = $this->getVariance($Last20Yearsarray3);
			$Last20YearsVariance4 = $this->getVariance($Last20Yearsarray4);
			$Last20YearsVariance5 = $this->getVariance($Last20Yearsarray5);
			$Last20YearsVariance6 = $this->getVariance($Last20Yearsarray6);
			$Last20YearsVariance7 = $this->getVariance($Last20Yearsarray7);
			$Last20YearsVariance8 = $this->getVariance($Last20Yearsarray8);
			$Last20YearsVariance9 = $this->getVariance($Last20Yearsarray9);
			$Last20YearsVariance10 = $this->getVariance($Last20Yearsarray10);
			$Last20YearsVariance11 = $this->getVariance($Last20Yearsarray11);
			$Last20YearsVariance12 = $this->getVariance($Last20Yearsarray12);
			$Last20YearsVariance13 = $this->getVariance($Last20Yearsarray13);
			$Last20YearsVariance14 = $this->getVariance($Last20Yearsarray14);
			$Last20YearsVariance15 = $this->getVariance($Last20Yearsarray15);
			$Last20YearsVariance16 = $this->getVariance($Last20Yearsarray16);
			$Last20YearsVariance17 = $this->getVariance($Last20Yearsarray17);
			$Last20YearsVariance18 = $this->getVariance($Last20Yearsarray18);
			$Last20YearsVariance19 = $this->getVariance($Last20Yearsarray19);
			$Last20YearsVariance20 = $this->getVariance($Last20Yearsarray20);
			$Last20YearsVariance21 = $this->getVariance($Last20Yearsarray21);

			$last20YearsVarianceArr = array(
											//$Last20YearsVariance1,
											$Last20YearsVariance2,
											$Last20YearsVariance3,
											$Last20YearsVariance4,
											$Last20YearsVariance5,
											$Last20YearsVariance6,
											$Last20YearsVariance7,
											$Last20YearsVariance8,
											$Last20YearsVariance9,
											$Last20YearsVariance10,
											$Last20YearsVariance11,
											$Last20YearsVariance12,
											$Last20YearsVariance13,
											$Last20YearsVariance14,
											$Last20YearsVariance15,
											$Last20YearsVariance16,
											$Last20YearsVariance17,
											$Last20YearsVariance18,
											$Last20YearsVariance19,
											$Last20YearsVariance20,
											$Last20YearsVariance21
											);
			//echo $startDate."---".$endDate;die;
			$checkPositiveNegativaArr = array(
										$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearsVarianceArr[0],$startDate,$endDate,$last20YearRecord[1]),
										$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearsVarianceArr[1],$startDate,$endDate,$last20YearRecord[2]),
										$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearsVarianceArr[2],$startDate,$endDate,$last20YearRecord[3]),
										$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearsVarianceArr[3],$startDate,$endDate,$last20YearRecord[4]),
										$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearsVarianceArr[4],$startDate,$endDate,$last20YearRecord[5]),
										$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearsVarianceArr[5],$startDate,$endDate,$last20YearRecord[6]),
										$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearsVarianceArr[6],$startDate,$endDate,$last20YearRecord[7]),
										$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearsVarianceArr[7],$startDate,$endDate,$last20YearRecord[8]),
										$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearsVarianceArr[8],$startDate,$endDate,$last20YearRecord[9]),
										$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearsVarianceArr[9],$startDate,$endDate,$last20YearRecord[10]),
										$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearsVarianceArr[10],$startDate,$endDate,$last20YearRecord[11]),
										$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearsVarianceArr[11],$startDate,$endDate,$last20YearRecord[12]),
										$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearsVarianceArr[12],$startDate,$endDate,$last20YearRecord[13]),
										$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearsVarianceArr[13],$startDate,$endDate,$last20YearRecord[14]),
										$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearsVarianceArr[14],$startDate,$endDate,$last20YearRecord[15]),
										$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearsVarianceArr[15],$startDate,$endDate,$last20YearRecord[16]),
										$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearsVarianceArr[16],$startDate,$endDate,$last20YearRecord[17]),
										$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearsVarianceArr[17],$startDate,$endDate,$last20YearRecord[18]),
										$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearsVarianceArr[18],$startDate,$endDate,$last20YearRecord[19]),
										$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearsVarianceArr[19],$startDate,$endDate,$last20YearRecord[20]),
										);

			

			//echo "<pre>";print_r($checkPositiveNegativaArr);die();

			$performanceLast20 = array_sum($checkPositiveNegativaArr)/20;
			$data['performanceLast20Years'] = number_format($performanceLast20*100,2,".","");
			$data['performanceLast20Years'] = $this->calCulateHorizontalAverage($last20YearRecord,$startDate,$endDate,20);

			$filterAverageEvolution20years = $this->filterHorizontalAverageEvolution($last20YearRecord,$startDate,$endDate,20);

		}
		if($totalNumberOfYearsCalCulation==10)
		{
			$Last20Yearsarray1 = array_reverse($last20YearRecord[0]);// 31 Dec
			$Last20Yearsarray2 = array_reverse($last20YearRecord[1]);// 31 Dec
			$Last20Yearsarray3 = array_reverse($last20YearRecord[2]);
			$Last20Yearsarray4 = array_reverse($last20YearRecord[3]);
			$Last20Yearsarray5 = array_reverse($last20YearRecord[4]);
			$Last20Yearsarray6 = array_reverse($last20YearRecord[5]);
			$Last20Yearsarray7 = array_reverse($last20YearRecord[6]);
			$Last20Yearsarray8 = array_reverse($last20YearRecord[7]);
			$Last20Yearsarray9 = array_reverse($last20YearRecord[8]);
			$Last20Yearsarray10 = array_reverse($last20YearRecord[9]);
			$Last20Yearsarray11 = array_reverse($last20YearRecord[10]);
					
			$Last20YearsVariance1 = $this->getVariance($Last20Yearsarray1);
			$Last20YearsVariance2 = $this->getVariance($Last20Yearsarray2);
			$Last20YearsVariance3 = $this->getVariance($Last20Yearsarray3);
			$Last20YearsVariance4 = $this->getVariance($Last20Yearsarray4);
			$Last20YearsVariance5 = $this->getVariance($Last20Yearsarray5);
			$Last20YearsVariance6 = $this->getVariance($Last20Yearsarray6);
			$Last20YearsVariance7 = $this->getVariance($Last20Yearsarray7);
			$Last20YearsVariance8 = $this->getVariance($Last20Yearsarray8);
			$Last20YearsVariance9 = $this->getVariance($Last20Yearsarray9);
			$Last20YearsVariance10 = $this->getVariance($Last20Yearsarray10);
			$Last20YearsVariance11 = $this->getVariance($Last20Yearsarray11);

			$last20YearsVarianceArr = array(
											//$Last20YearsVariance1,
											$Last20YearsVariance2,
											$Last20YearsVariance3,
											$Last20YearsVariance4,
											$Last20YearsVariance5,
											$Last20YearsVariance6,
											$Last20YearsVariance7,
											$Last20YearsVariance8,
											$Last20YearsVariance9,
											$Last20YearsVariance10,
											$Last20YearsVariance11,
											);
			//echo $startDate."---".$endDate;die;
			$checkPositiveNegativaArr = array(
										$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearsVarianceArr[0],$startDate,$endDate,$last20YearRecord[1]),
										$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearsVarianceArr[1],$startDate,$endDate,$last20YearRecord[2]),
										$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearsVarianceArr[2],$startDate,$endDate,$last20YearRecord[3]),
										$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearsVarianceArr[3],$startDate,$endDate,$last20YearRecord[4]),
										$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearsVarianceArr[4],$startDate,$endDate,$last20YearRecord[5]),
										$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearsVarianceArr[5],$startDate,$endDate,$last20YearRecord[6]),
										$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearsVarianceArr[6],$startDate,$endDate,$last20YearRecord[7]),
										$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearsVarianceArr[7],$startDate,$endDate,$last20YearRecord[8]),
										$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearsVarianceArr[8],$startDate,$endDate,$last20YearRecord[9]),
										$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearsVarianceArr[9],$startDate,$endDate,$last20YearRecord[10]),
										);

			

			//echo "<pre>";print_r($checkPositiveNegativaArr);die();

			$performanceLast20 = array_sum($checkPositiveNegativaArr)/10;
			$data['performanceLast20Years'] = number_format($performanceLast20*100,2,".","");
			$data['performanceLast20Years'] = $this->calCulateHorizontalAverage($last20YearRecord,$startDate,$endDate,10);

			$filterAverageEvolution20years = $this->filterHorizontalAverageEvolution($last20YearRecord,$startDate,$endDate,10);

		}
		
		

		$numOfPostiveYears = 0;
		$numOfnegativeYears = 0;
		$numberOfZero = 0;
		foreach($checkPositiveNegativaArr as $pos)
		{
			if($pos>0)
			{
				$numOfPostiveYears++;
			}
			else if($pos==0)
			{
				$numberOfZero++;
			}
			else
			{
				$numOfnegativeYears++;
			}
		}
		//$data['performanceLast20Years'] = number_format(array_sum($filterAverageEvolution20years)/count($filterAverageEvolution20years),2,".","");
		//echo "<pre>last20YearsEvolutions";print_r($filterAverageEvolution20years);die;
		/* 
			Last 20 Years Calculations End 
		*/

		/* Previous 10 Years Calculation Starts  */

		$daterangePrevious10Years = $this->getYearsBetweenDate($before10YearsStartYear,$before10YearsEndYear);
		$previous10YearsAllDatesVal = $this->getAllDatesAndvaluesSeasionalAnalysis($daterangePrevious10Years,$before10YearsDates,$before10YearsValue);
		//echo "<pre>previous 10 years";print_r($previous10YearsAllDatesVal);die;
		$previous10YearRecord = array();
		$e=0;
		foreach($previous10YearsAllDatesVal as $key=>$ddd)
		{
			foreach($previous10YearsAllDatesVal[$key] as $var)
			{
				$previous10YearRecord[$e][] = $var;	
			}
			$e++;
		}
		//echo "<pre>dddd";print_r($previous10YearRecord);die;

		if($totalNumberOfYearsCalCulation==20)
		{
			$previous10Yearsarray1 = array_reverse($previous10YearRecord[0]); // 31 Dec
			$previous10Yearsarray2 = array_reverse($previous10YearRecord[1]);
			$previous10Yearsarray3 = array_reverse($previous10YearRecord[2]);
			$previous10Yearsarray4 = array_reverse($previous10YearRecord[3]);
			$previous10Yearsarray5 = array_reverse($previous10YearRecord[4]);
			$previous10Yearsarray6 = array_reverse($previous10YearRecord[5]);
			$previous10Yearsarray7 = array_reverse($previous10YearRecord[6]);
			$previous10Yearsarray8 = array_reverse($previous10YearRecord[7]);
			$previous10Yearsarray9 = array_reverse($previous10YearRecord[8]);
			$previous10Yearsarray10 = array_reverse($previous10YearRecord[9]);
			$previous10Yearsarray11 = array_reverse($previous10YearRecord[10]);
					
			$previous10YearsVariance1 = $this->getVariance($previous10Yearsarray1);
			$previous10YearsVariance2 = $this->getVariance($previous10Yearsarray2);
			$previous10YearsVariance3 = $this->getVariance($previous10Yearsarray3);
			$previous10YearsVariance4 = $this->getVariance($previous10Yearsarray4);
			$previous10YearsVariance5 = $this->getVariance($previous10Yearsarray5);
			$previous10YearsVariance6 = $this->getVariance($previous10Yearsarray6);
			$previous10YearsVariance7 = $this->getVariance($previous10Yearsarray7);
			$previous10YearsVariance8 = $this->getVariance($previous10Yearsarray8);
			$previous10YearsVariance9 = $this->getVariance($previous10Yearsarray9);
			$previous10YearsVariance10 = $this->getVariance($previous10Yearsarray10);
			$previous10YearsVariance11 = $this->getVariance($previous10Yearsarray11);

			$previous10YearsVarianceArr = array(
												$previous10YearsVariance2,
												$previous10YearsVariance3,
												$previous10YearsVariance4,
												$previous10YearsVariance5,
												$previous10YearsVariance6,
												$previous10YearsVariance7,
												$previous10YearsVariance8,
												$previous10YearsVariance9,
												$previous10YearsVariance10,
												$previous10YearsVariance11,											
												);

			$performanceArrPrevious10Years = array(
									$this->getNumberOfPostiveYearNegativeYearByVariance($previous10YearsVarianceArr[0],$startDate,$endDate,$previous10YearRecord[1]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($previous10YearsVarianceArr[1],$startDate,$endDate,$previous10YearRecord[2]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($previous10YearsVarianceArr[2],$startDate,$endDate,$previous10YearRecord[3]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($previous10YearsVarianceArr[3],$startDate,$endDate,$previous10YearRecord[4]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($previous10YearsVarianceArr[4],$startDate,$endDate,$previous10YearRecord[5]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($previous10YearsVarianceArr[5],$startDate,$endDate,$previous10YearRecord[6]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($previous10YearsVarianceArr[6],$startDate,$endDate,$previous10YearRecord[7]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($previous10YearsVarianceArr[7],$startDate,$endDate,$previous10YearRecord[8]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($previous10YearsVarianceArr[8],$startDate,$endDate,$previous10YearRecord[9]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($previous10YearsVarianceArr[9],$startDate,$endDate,$previous10YearRecord[10]),
									);

			$performancePrev10Years = array_sum($performanceArrPrevious10Years)/10;
			$data['performanceBefore10Years'] = number_format($performancePrev10Years*100,2,".","");
			$data['performanceBefore10Years'] = $this->calCulateHorizontalAverage($previous10YearRecord,$startDate,$endDate,10);

			$filterAverageEvolutionPrevious10years = $this->filterHorizontalAverageEvolution($previous10YearRecord,$startDate,$endDate,10);
		}
		if($totalNumberOfYearsCalCulation==10)
		{
			$previous10Yearsarray1 = array_reverse($previous10YearRecord[0]); // 31 Dec
			$previous10Yearsarray2 = array_reverse($previous10YearRecord[1]);
			$previous10Yearsarray3 = array_reverse($previous10YearRecord[2]);
			$previous10Yearsarray4 = array_reverse($previous10YearRecord[3]);
			$previous10Yearsarray5 = array_reverse($previous10YearRecord[4]);
			$previous10Yearsarray6 = array_reverse($previous10YearRecord[5]);
					
			$previous10YearsVariance1 = $this->getVariance($previous10Yearsarray1);
			$previous10YearsVariance2 = $this->getVariance($previous10Yearsarray2);
			$previous10YearsVariance3 = $this->getVariance($previous10Yearsarray3);
			$previous10YearsVariance4 = $this->getVariance($previous10Yearsarray4);
			$previous10YearsVariance5 = $this->getVariance($previous10Yearsarray5);
			$previous10YearsVariance6 = $this->getVariance($previous10Yearsarray6);

			$previous10YearsVarianceArr = array(
												$previous10YearsVariance2,
												$previous10YearsVariance3,
												$previous10YearsVariance4,
												$previous10YearsVariance5,
												$previous10YearsVariance6,										
												);

			$performanceArrPrevious10Years = array(
									$this->getNumberOfPostiveYearNegativeYearByVariance($previous10YearsVarianceArr[0],$startDate,$endDate,$previous10YearRecord[1]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($previous10YearsVarianceArr[1],$startDate,$endDate,$previous10YearRecord[2]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($previous10YearsVarianceArr[2],$startDate,$endDate,$previous10YearRecord[3]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($previous10YearsVarianceArr[3],$startDate,$endDate,$previous10YearRecord[4]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($previous10YearsVarianceArr[4],$startDate,$endDate,$previous10YearRecord[5]),
									);
			//echo "<pre>";print_r($previous10YearRecord[1]);die();
			$performancePrev10Years = array_sum($performanceArrPrevious10Years)/5;
			$data['performanceBefore10Years'] = number_format($performancePrev10Years*100,2,".","");
			$data['performanceBefore10Years'] = $this->calCulateHorizontalAverage($previous10YearRecord,$startDate,$endDate,5);

			$filterAverageEvolutionPrevious10years = $this->filterHorizontalAverageEvolution($previous10YearRecord,$startDate,$endDate,5);

		}
		
		//$data['performanceBefore10Years'] = number_format(array_sum( $filterAverageEvolutionPrevious10years) / count( $filterAverageEvolutionPrevious10years),2,".",""); 
		//echo "<pre>previous10YearsEvolutions";print_r($filterAverageEvolutionPrevious10years);die;
		/* Previous 10 Years Calculation End  */

		$beginLabel = new DateTime( '2016-01-01' );
		$endLabel = (new DateTime( '2016-12-31' ))->modify( '+1 day' );
		$intervalLabel = new DateInterval('P1D');
		$labelRange = new DatePeriod($beginLabel, $intervalLabel ,$endLabel);
		$xRangeLabel = array();
		foreach($labelRange as $range)
		{
			$xRangeLabel[] = "'".$range->format('d-M')."'";
		}
		
		//$data['xRangeLabel'] = $xRangeLabel;
		$filterDates = array();
		foreach($xRangeLabel as $kdate=>$dvl)
		{
			if($kdate>=$startDate && $kdate<=$endDate)
			{
				$filterDates[] = $dvl;
			}
			 
		}

		//echo "<pre>";print_r($filterAverageEvolution10years);die();
		/*filter records*/
		$data['filterDates'] = implode(',',$filterDates);
		$data['filterAverageEvolution10years'] = implode(',',$filterAverageEvolution10years);
		$data['filterAverageEvolution20years'] = implode(',',$filterAverageEvolution20years);
		$data['filterAverageEvolutionPrevious10years'] = implode(',',$filterAverageEvolutionPrevious10years);


		$data['numberOfTotalDays'] = $totalNumberOfYearsCalCulation;
		$data['numberOfPositiveDays'] = $numOfPostiveYears;
		$data['numberOfNegativeDays'] = $numOfnegativeYears;
		$data['probabalityli'] = number_format(($numOfPostiveYears/$totalNumberOfYearsCalCulation)*100,2,'.','');

		return $data;

	}
	function calculateVarinceFiltered($array)
	{
		$arry = array();
		$inc = 1;
		foreach($array as $key=>$arr)
		{
			if($inc==1)
			{
				$arry[]  = 0;
			}
			else
			{
				if($array[$key-1]==0)
				{
					$arry[]  = 0;
				}
				else
				{
					$arry[]  = number_format((($arr/$array[$key-1])-1),2,".","");
				}
				
			}
			$inc++; 
		}
		return $arry;
			
	}
	function getAverageEvolutionCalCulation($array)
	{
		$arry = array();
		$inc = 1;
		$lastEv = 0;
		foreach($array as $key=>$val)
		{
			if($inc==1)
			{
				$arry[] = 0;
			}
			else 
			{
				if($inc==2)
				{
					
					$lastEv = $val;
					$arry[] = $lastEv;
				}
				else
				{
					
					
					$lastEv = $val+$lastEv;
					$arry[] = $lastEv;
					
				}
			}

			$inc++;
		}
		return $arry;
	}
	function addOneInEveryElement($array)
	{
		$newArr = array();
		foreach($array as $ar)
		{
			$newArr[] = $ar+1;
		}
		return $newArr;

	}
	function geometricMean(array $array)
	{
	    if (!count($array)) {
	        return 0;
	    }

	    $total = count($array);
	    $power = 1 / $total;

	    $chunkProducts = array();
	    $chunks = array_chunk($array, 10);

	    foreach ($chunks as $chunk) {
	        $chunkProducts[] = pow(array_product($chunk), $power);
	    }

	    $result = array_product($chunkProducts);
	    return $result;
	}
	function calCulateHorizontalAverage($multidimensionArr,$start,$end,$noOfYear)
	{
		//echo $noOfYear;die();
		if($noOfYear==5)
		{
			$arrayOb1 = $multidimensionArr[1];
			$arrayOb2 = $multidimensionArr[2];
			$arrayOb3 = $multidimensionArr[3];
			$arrayOb4 = $multidimensionArr[4];
			$arrayOb5 = $multidimensionArr[5];

			$filterArr1 = array();
			$filterArr2 = array();
			$filterArr3 = array();
			$filterArr4 = array();
			$filterArr5 = array();
			for($j=$start;$j<=$end;$j++)
			{

				$filterArr1[] = $arrayOb1[$j];
				$filterArr2[] = $arrayOb2[$j];
				$filterArr3[] = $arrayOb3[$j];
				$filterArr4[] = $arrayOb4[$j];
				$filterArr5[] = $arrayOb5[$j];
			}

			$var1 = $this->calculateVarinceFiltered($filterArr1);
			$var2 = $this->calculateVarinceFiltered($filterArr2);
			$var3 = $this->calculateVarinceFiltered($filterArr3);
			$var4 = $this->calculateVarinceFiltered($filterArr4);
			$var5 = $this->calculateVarinceFiltered($filterArr5);


			$addOne1 = $this->addOneInEveryElement($var1);
			$addOne2 = $this->addOneInEveryElement($var2);
			$addOne3 = $this->addOneInEveryElement($var3);
			$addOne4 = $this->addOneInEveryElement($var4);
			$addOne5 = $this->addOneInEveryElement($var5);
			$geoMearArr = array();
			for($cc=0;$cc<count($addOne1);$cc++)
			{
				$lastVal = $addOne1[$cc].",".$addOne2[$cc].",".$addOne3[$cc].",".$addOne4[$cc].",".$addOne5[$cc];
				$exp = explode(',',$lastVal);
				$geoMearArr[] = $this->geometricMean($exp);
			}
			$averageArr = array();
			for($count=0;$count<count($var1);$count++)
			{
				$averageArr[] = ($var1[$count]+$var2[$count]+$var3[$count]+$var4[$count]+$var5[$count])/5;
			}
			$averageEvolution = $this->getAverageEvolutionCalCulation($averageArr);
		}
		
		
		if($noOfYear==10)
		{
			$arrayOb1 = $multidimensionArr[1];
			$arrayOb2 = $multidimensionArr[2];
			$arrayOb3 = $multidimensionArr[3];
			$arrayOb4 = $multidimensionArr[4];
			$arrayOb5 = $multidimensionArr[5];
			$arrayOb6 = $multidimensionArr[6];
			$arrayOb7 = $multidimensionArr[7];
			$arrayOb8 = $multidimensionArr[8];
			$arrayOb9 = $multidimensionArr[9];
			$arrayOb10 = $multidimensionArr[10];

			$filterArr1 = array();
			$filterArr2 = array();
			$filterArr3 = array();
			$filterArr4 = array();
			$filterArr5 = array();
			$filterArr6 = array();
			$filterArr7 = array();
			$filterArr8 = array();
			$filterArr9 = array();
			$filterArr10 = array();
			for($j=$start;$j<=$end;$j++)
			{
				$filterArr1[] = $arrayOb1[$j];
				$filterArr2[] = $arrayOb2[$j];
				$filterArr3[] = $arrayOb3[$j];
				$filterArr4[] = $arrayOb4[$j];
				$filterArr5[] = $arrayOb5[$j];
				$filterArr6[] = $arrayOb6[$j];
				$filterArr7[] = $arrayOb7[$j];
				$filterArr8[] = $arrayOb8[$j];
				$filterArr9[] = $arrayOb9[$j];
				$filterArr10[] = $arrayOb10[$j];
			}

			$var1 = $this->calculateVarinceFiltered($filterArr1);
			$var2 = $this->calculateVarinceFiltered($filterArr2);
			$var3 = $this->calculateVarinceFiltered($filterArr3);
			$var4 = $this->calculateVarinceFiltered($filterArr4);
			$var5 = $this->calculateVarinceFiltered($filterArr5);
			$var6 = $this->calculateVarinceFiltered($filterArr6);
			$var7 = $this->calculateVarinceFiltered($filterArr7);
			$var8 = $this->calculateVarinceFiltered($filterArr8);
			$var9 = $this->calculateVarinceFiltered($filterArr9);
			$var10 = $this->calculateVarinceFiltered($filterArr10);

			$addOne1 = $this->addOneInEveryElement($var1);
			$addOne2 = $this->addOneInEveryElement($var2);
			$addOne3 = $this->addOneInEveryElement($var3);
			$addOne4 = $this->addOneInEveryElement($var4);
			$addOne5 = $this->addOneInEveryElement($var5);
			$addOne6 = $this->addOneInEveryElement($var6);
			$addOne7 = $this->addOneInEveryElement($var7);
			$addOne8 = $this->addOneInEveryElement($var8);
			$addOne9 = $this->addOneInEveryElement($var9);
			$addOne10 = $this->addOneInEveryElement($var10);
			$geoMearArr = array();
			for($cc=0;$cc<count($addOne1);$cc++)
			{
				$lastVal = $addOne1[$cc].",".$addOne2[$cc].",".$addOne3[$cc].",".$addOne4[$cc].",".$addOne5[$cc].",".$addOne6[$cc].",".$addOne7[$cc].",".$addOne8[$cc].",".$addOne9[$cc].",".$addOne10[$cc];
				$exp = explode(',',$lastVal);
				$geoMearArr[] = $this->geometricMean($exp);
			}


			$averageArr = array();
			for($count=0;$count<count($var1);$count++)
			{
				$averageArr[] = ($var1[$count]+$var2[$count]+$var3[$count]+$var4[$count]+$var5[$count]+$var6[$count]+$var7[$count]+$var8[$count]+$var9[$count]+$var10[$count])/10;
			}
			$averageEvolution = $this->getAverageEvolutionCalCulation($averageArr);
		}
		
		if($noOfYear==20)
		{
			$arrayOb1 = $multidimensionArr[1];
			$arrayOb2 = $multidimensionArr[2];
			$arrayOb3 = $multidimensionArr[3];
			$arrayOb4 = $multidimensionArr[4];
			$arrayOb5 = $multidimensionArr[5];
			$arrayOb6 = $multidimensionArr[6];
			$arrayOb7 = $multidimensionArr[7];
			$arrayOb8 = $multidimensionArr[8];
			$arrayOb9 = $multidimensionArr[9];
			$arrayOb10 = $multidimensionArr[10];
			$arrayOb11 = $multidimensionArr[11];
			$arrayOb12 = $multidimensionArr[12];
			$arrayOb13 = $multidimensionArr[13];
			$arrayOb14 = $multidimensionArr[14];
			$arrayOb15 = $multidimensionArr[15];
			$arrayOb16 = $multidimensionArr[16];
			$arrayOb17 = $multidimensionArr[17];
			$arrayOb18 = $multidimensionArr[18];
			$arrayOb19 = $multidimensionArr[19];
			$arrayOb20 = $multidimensionArr[20];


			$filterArr1 = array();
			$filterArr2 = array();
			$filterArr3 = array();
			$filterArr4 = array();
			$filterArr5 = array();
			$filterArr6 = array();
			$filterArr7 = array();
			$filterArr8 = array();
			$filterArr9 = array();
			$filterArr10 = array();

			$filterArr11 = array();
			$filterArr12 = array();
			$filterArr13 = array();
			$filterArr14 = array();
			$filterArr15 = array();
			$filterArr16 = array();
			$filterArr17 = array();
			$filterArr18 = array();
			$filterArr19 = array();
			$filterArr20 = array();
			//$finalAverageArr = array();
			for($j=$start;$j<=$end;$j++)
			{
				$filterArr1[] = $arrayOb1[$j];
				$filterArr2[] = $arrayOb2[$j];
				$filterArr3[] = $arrayOb3[$j];
				$filterArr4[] = $arrayOb4[$j];
				$filterArr5[] = $arrayOb5[$j];
				$filterArr6[] = $arrayOb6[$j];
				$filterArr7[] = $arrayOb7[$j];
				$filterArr8[] = $arrayOb8[$j];
				$filterArr9[] = $arrayOb9[$j];
				$filterArr10[] = $arrayOb10[$j];

				$filterArr11[] = $arrayOb11[$j];
				$filterArr12[] = $arrayOb12[$j];
				$filterArr13[] = $arrayOb13[$j];
				$filterArr14[] = $arrayOb14[$j];
				$filterArr15[] = $arrayOb15[$j];
				$filterArr16[] = $arrayOb16[$j];
				$filterArr17[] = $arrayOb17[$j];
				$filterArr18[] = $arrayOb18[$j];
				$filterArr19[] = $arrayOb19[$j];
				$filterArr20[] = $arrayOb20[$j];
			}

			$var1 = $this->calculateVarinceFiltered($filterArr1);
			$var2 = $this->calculateVarinceFiltered($filterArr2);
			$var3 = $this->calculateVarinceFiltered($filterArr3);
			$var4 = $this->calculateVarinceFiltered($filterArr4);
			$var5 = $this->calculateVarinceFiltered($filterArr5);
			$var6 = $this->calculateVarinceFiltered($filterArr6);
			$var7 = $this->calculateVarinceFiltered($filterArr7);
			$var8 = $this->calculateVarinceFiltered($filterArr8);
			$var9 = $this->calculateVarinceFiltered($filterArr9);
			$var10 = $this->calculateVarinceFiltered($filterArr10);

			$var11 = $this->calculateVarinceFiltered($filterArr11);
			$var12 = $this->calculateVarinceFiltered($filterArr12);
			$var13 = $this->calculateVarinceFiltered($filterArr13);
			$var14 = $this->calculateVarinceFiltered($filterArr14);
			$var15 = $this->calculateVarinceFiltered($filterArr15);
			$var16 = $this->calculateVarinceFiltered($filterArr16);
			$var17 = $this->calculateVarinceFiltered($filterArr17);
			$var18 = $this->calculateVarinceFiltered($filterArr18);
			$var19 = $this->calculateVarinceFiltered($filterArr19);
			$var20 = $this->calculateVarinceFiltered($filterArr20);

			$addOne1 = $this->addOneInEveryElement($var1);
			$addOne2 = $this->addOneInEveryElement($var2);
			$addOne3 = $this->addOneInEveryElement($var3);
			$addOne4 = $this->addOneInEveryElement($var4);
			$addOne5 = $this->addOneInEveryElement($var5);
			$addOne6 = $this->addOneInEveryElement($var6);
			$addOne7 = $this->addOneInEveryElement($var7);
			$addOne8 = $this->addOneInEveryElement($var8);
			$addOne9 = $this->addOneInEveryElement($var9);
			$addOne10 = $this->addOneInEveryElement($var10);

			$addOne11 = $this->addOneInEveryElement($var11);
			$addOne12 = $this->addOneInEveryElement($var12);
			$addOne13 = $this->addOneInEveryElement($var13);
			$addOne14 = $this->addOneInEveryElement($var14);
			$addOne15 = $this->addOneInEveryElement($var15);
			$addOne16 = $this->addOneInEveryElement($var16);
			$addOne17 = $this->addOneInEveryElement($var17);
			$addOne18 = $this->addOneInEveryElement($var18);
			$addOne19 = $this->addOneInEveryElement($var19);
			$addOne20 = $this->addOneInEveryElement($var20);
			$geoMearArr = array();
			for($cc=0;$cc<count($addOne1);$cc++)
			{
				$lastVal = $addOne1[$cc].",".$addOne2[$cc].",".$addOne3[$cc].",".$addOne4[$cc].",".$addOne5[$cc].",".$addOne6[$cc].",".$addOne7[$cc].",".$addOne8[$cc].",".$addOne9[$cc].",".$addOne10[$cc].",".$addOne11[$cc].",".$addOne12[$cc].",".$addOne13[$cc].",".$addOne14[$cc].",".$addOne15[$cc].",".$addOne16[$cc].",".$addOne17[$cc].",".$addOne18[$cc].",".$addOne19[$cc].",".$addOne20[$cc];
				$exp = explode(',',$lastVal);
				$geoMearArr[] = $this->geometricMean($exp);
			}

			$averageArr = array();
			for($count=0;$count<count($var1);$count++)
			{
				$averageArr[] = ($var1[$count]+$var2[$count]+$var3[$count]+$var4[$count]+$var5[$count]+$var6[$count]+$var7[$count]+$var8[$count]+$var9[$count]+$var10[$count]+$var11[$count]+$var12[$count]+$var13[$count]+$var14[$count]+$var15[$count]+$var16[$count]+$var17[$count]+$var18[$count]+$var19[$count]+$var20[$count])/20;
			}
			$averageEvolution = $this->getAverageEvolutionCalCulation($averageArr);
		}
		//echo "<pre>";print_r($averageArr);die();
		//return ((end($finalAverageArr)/$finalAverageArr[0])-1)*100;
		return (end($averageEvolution)-$averageEvolution[0])*100;
		//return (end($geoMearArr)-$geoMearArr[0])*100;
	}
	function filterHorizontalAverageEvolution($multidimensionArr,$start,$end,$noOfYear)
	{
		if($noOfYear==5)
		{
			$arrayOb1 = $multidimensionArr[1];
			$arrayOb2 = $multidimensionArr[2];
			$arrayOb3 = $multidimensionArr[3];
			$arrayOb4 = $multidimensionArr[4];
			$arrayOb5 = $multidimensionArr[5];

			$filterArr1 = array();
			$filterArr2 = array();
			$filterArr3 = array();
			$filterArr4 = array();
			$filterArr5 = array();
			for($j=$start;$j<=$end;$j++)
			{

				$filterArr1[] = $arrayOb1[$j];
				$filterArr2[] = $arrayOb2[$j];
				$filterArr3[] = $arrayOb3[$j];
				$filterArr4[] = $arrayOb4[$j];
				$filterArr5[] = $arrayOb5[$j];
			}

			$var1 = $this->calculateVarinceFiltered($filterArr1);
			$var2 = $this->calculateVarinceFiltered($filterArr2);
			$var3 = $this->calculateVarinceFiltered($filterArr3);
			$var4 = $this->calculateVarinceFiltered($filterArr4);
			$var5 = $this->calculateVarinceFiltered($filterArr5);
//	number_format((($arr/$array[$key-1])-1),2,".","")
			$averageArr = array();
			for($count=0;$count<count($var1);$count++)
			{
				$average = (($var1[$count]+$var2[$count]+$var3[$count]+$var4[$count]+$var5[$count])/5)*100;
				$averageArr[] = number_format($average,2,'.','');
			}
			$averageEvolution = $this->getAverageEvolutionCalCulation($averageArr);
		}
		
		
		if($noOfYear==10)
		{
			$arrayOb1 = $multidimensionArr[1];
			$arrayOb2 = $multidimensionArr[2];
			$arrayOb3 = $multidimensionArr[3];
			$arrayOb4 = $multidimensionArr[4];
			$arrayOb5 = $multidimensionArr[5];
			$arrayOb6 = $multidimensionArr[6];
			$arrayOb7 = $multidimensionArr[7];
			$arrayOb8 = $multidimensionArr[8];
			$arrayOb9 = $multidimensionArr[9];
			$arrayOb10 = $multidimensionArr[10];

			$filterArr1 = array();
			$filterArr2 = array();
			$filterArr3 = array();
			$filterArr4 = array();
			$filterArr5 = array();
			$filterArr6 = array();
			$filterArr7 = array();
			$filterArr8 = array();
			$filterArr9 = array();
			$filterArr10 = array();
			for($j=$start;$j<=$end;$j++)
			{
				$filterArr1[] = $arrayOb1[$j];
				$filterArr2[] = $arrayOb2[$j];
				$filterArr3[] = $arrayOb3[$j];
				$filterArr4[] = $arrayOb4[$j];
				$filterArr5[] = $arrayOb5[$j];
				$filterArr6[] = $arrayOb6[$j];
				$filterArr7[] = $arrayOb7[$j];
				$filterArr8[] = $arrayOb8[$j];
				$filterArr9[] = $arrayOb9[$j];
				$filterArr10[] = $arrayOb10[$j];
			}

			$var1 = $this->calculateVarinceFiltered($filterArr1);
			$var2 = $this->calculateVarinceFiltered($filterArr2);
			$var3 = $this->calculateVarinceFiltered($filterArr3);
			$var4 = $this->calculateVarinceFiltered($filterArr4);
			$var5 = $this->calculateVarinceFiltered($filterArr5);
			$var6 = $this->calculateVarinceFiltered($filterArr6);
			$var7 = $this->calculateVarinceFiltered($filterArr7);
			$var8 = $this->calculateVarinceFiltered($filterArr8);
			$var9 = $this->calculateVarinceFiltered($filterArr9);
			$var10 = $this->calculateVarinceFiltered($filterArr10);

			$averageArr = array();
			for($count=0;$count<count($var1);$count++)
			{
				$average = (($var1[$count]+$var2[$count]+$var3[$count]+$var4[$count]+$var5[$count]+$var6[$count]+$var7[$count]+$var8[$count]+$var9[$count]+$var10[$count])/10)*100;

				$averageArr[] = number_format($average,2,'.','');
			}
			$averageEvolution = $this->getAverageEvolutionCalCulation($averageArr);
		}
		
		if($noOfYear==20)
		{
			$arrayOb1 = $multidimensionArr[1];
			$arrayOb2 = $multidimensionArr[2];
			$arrayOb3 = $multidimensionArr[3];
			$arrayOb4 = $multidimensionArr[4];
			$arrayOb5 = $multidimensionArr[5];
			$arrayOb6 = $multidimensionArr[6];
			$arrayOb7 = $multidimensionArr[7];
			$arrayOb8 = $multidimensionArr[8];
			$arrayOb9 = $multidimensionArr[9];
			$arrayOb10 = $multidimensionArr[10];
			$arrayOb11 = $multidimensionArr[11];
			$arrayOb12 = $multidimensionArr[12];
			$arrayOb13 = $multidimensionArr[13];
			$arrayOb14 = $multidimensionArr[14];
			$arrayOb15 = $multidimensionArr[15];
			$arrayOb16 = $multidimensionArr[16];
			$arrayOb17 = $multidimensionArr[17];
			$arrayOb18 = $multidimensionArr[18];
			$arrayOb19 = $multidimensionArr[19];
			$arrayOb20 = $multidimensionArr[20];


			$filterArr1 = array();
			$filterArr2 = array();
			$filterArr3 = array();
			$filterArr4 = array();
			$filterArr5 = array();
			$filterArr6 = array();
			$filterArr7 = array();
			$filterArr8 = array();
			$filterArr9 = array();
			$filterArr10 = array();

			$filterArr11 = array();
			$filterArr12 = array();
			$filterArr13 = array();
			$filterArr14 = array();
			$filterArr15 = array();
			$filterArr16 = array();
			$filterArr17 = array();
			$filterArr18 = array();
			$filterArr19 = array();
			$filterArr20 = array();
			//$finalAverageArr = array();
			for($j=$start;$j<=$end;$j++)
			{
				$filterArr1[] = $arrayOb1[$j];
				$filterArr2[] = $arrayOb2[$j];
				$filterArr3[] = $arrayOb3[$j];
				$filterArr4[] = $arrayOb4[$j];
				$filterArr5[] = $arrayOb5[$j];
				$filterArr6[] = $arrayOb6[$j];
				$filterArr7[] = $arrayOb7[$j];
				$filterArr8[] = $arrayOb8[$j];
				$filterArr9[] = $arrayOb9[$j];
				$filterArr10[] = $arrayOb10[$j];

				$filterArr11[] = $arrayOb11[$j];
				$filterArr12[] = $arrayOb12[$j];
				$filterArr13[] = $arrayOb13[$j];
				$filterArr14[] = $arrayOb14[$j];
				$filterArr15[] = $arrayOb15[$j];
				$filterArr16[] = $arrayOb16[$j];
				$filterArr17[] = $arrayOb17[$j];
				$filterArr18[] = $arrayOb18[$j];
				$filterArr19[] = $arrayOb19[$j];
				$filterArr20[] = $arrayOb20[$j];
			}

			$var1 = $this->calculateVarinceFiltered($filterArr1);
			$var2 = $this->calculateVarinceFiltered($filterArr2);
			$var3 = $this->calculateVarinceFiltered($filterArr3);
			$var4 = $this->calculateVarinceFiltered($filterArr4);
			$var5 = $this->calculateVarinceFiltered($filterArr5);
			$var6 = $this->calculateVarinceFiltered($filterArr6);
			$var7 = $this->calculateVarinceFiltered($filterArr7);
			$var8 = $this->calculateVarinceFiltered($filterArr8);
			$var9 = $this->calculateVarinceFiltered($filterArr9);
			$var10 = $this->calculateVarinceFiltered($filterArr10);

			$var11 = $this->calculateVarinceFiltered($filterArr11);
			$var12 = $this->calculateVarinceFiltered($filterArr12);
			$var13 = $this->calculateVarinceFiltered($filterArr13);
			$var14 = $this->calculateVarinceFiltered($filterArr14);
			$var15 = $this->calculateVarinceFiltered($filterArr15);
			$var16 = $this->calculateVarinceFiltered($filterArr16);
			$var17 = $this->calculateVarinceFiltered($filterArr17);
			$var18 = $this->calculateVarinceFiltered($filterArr18);
			$var19 = $this->calculateVarinceFiltered($filterArr19);
			$var20 = $this->calculateVarinceFiltered($filterArr20);

			$averageArr = array();
			for($count=0;$count<count($var1);$count++)
			{
				$average = (($var1[$count]+$var2[$count]+$var3[$count]+$var4[$count]+$var5[$count]+$var6[$count]+$var7[$count]+$var8[$count]+$var9[$count]+$var10[$count]+$var11[$count]+$var12[$count]+$var13[$count]+$var14[$count]+$var15[$count]+$var16[$count]+$var17[$count]+$var18[$count]+$var19[$count]+$var20[$count])/20)*100;
				$averageArr[] = number_format($average,2,'.','');
			}
			$averageEvolution = $this->getAverageEvolutionCalCulation($averageArr);
		}
		//return ((end($finalAverageArr)/$finalAverageArr[0])-1)*100;
		return $averageEvolution;
	}
	function getSeasionalFinalAnalysisPerformancePropb()
	{
		//new code from 16 June 2021
		error_reporting(0);
		if (base64_encode(base64_encode(base64_decode(base64_decode($this->input->post('stock_id'))))) ===$this->input->post('stock_id'))
        {
		    $actual_stock_id=base64_decode(base64_decode($this->input->post('stock_id')));
		}
		else 
		{
		    $actual_stock_id=$this->input->post('stock_id');
		}

		//$actual_stock_id = base64_decode(base64_decode('TkRNPQ=='));
		
		$startDate = $this->input->post('startDate');
		$endDate = $this->input->post('endDate');
		
		
		/*$actual_stock_id = 62;
		$startDate = $this->input->get('startDate');
		$endDate = $this->input->get('endDate');*/
		
		

		//new code from 16 June 2021
		$the_big_array = $this->chart_model->getSeasionalAllRecord($actual_stock_id);
		//$the_big_array = array_reverse($the_big_array);
		//echo "<pre>";print_r($the_big_array);die;
		$numberOfAvailableYears = $the_big_array[0]['year']-$the_big_array[count($the_big_array)-1]['year'];
		//echo $numberOfAvailableYears;die();
		$dateRange = $this->chart_model->printSeasionalAnalysisdate(date('Y').'-01-01', date('Y').'-12-31','d-m');
		//echo "<pre>";print_r($dateRange);die;
		foreach($this->chart_model->printSeasionalAnalysisdate(date('Y').'-03-16', date('Y').'-04-03','d-M') as $xl)
		{
			$xdata[] = "'".$xl."'";
		}

		$ararararara = array();
		if($numberOfAvailableYears>=20)
		{
			$totalNumberOfYearsCalCulation = 20;
			/*Last 10 Years*/
			$last10YearsStartYear = date("Y",strtotime($the_big_array[0]['actual_date']."-11 year"));
			$last10YearsEndYear =  $the_big_array[0]['year'];
			//echo $last10YearsStartYear."--".$last10YearsEndYear."<br>";
			//die;
			/*Last 20 Years*/
			$Last20YearsStartYear =  date("Y",strtotime($the_big_array[0]['actual_date']."-21 year"));
			$last20YearsEndYear =  $the_big_array[0]['year'];

			//echo $Last20YearsStartYear."----".$last20YearsEndYear;die();
			/*previous 10 Years*/
			$before10YearsStartYear = $Last20YearsStartYear+1;
			$before10YearsEndYear = $last10YearsStartYear+1;

			$data['last20YeearData'] = 'Last 20 Years';
			$data['last10YeearData'] = 'Last 10 Years';
			$data['previous10YeearData'] = 'Previous 10 Years';
			
		}
		else if($numberOfAvailableYears>=10 && $numberOfAvailableYears<20)
		{
			$totalNumberOfYearsCalCulation = 10;
			//echo 2;
			$last10YearsStartYear = date("Y",strtotime($the_big_array[0]['actual_date']."-6 year"));
			$last10YearsEndYear =  $the_big_array[0]['year'];
			//echo $last10YearsStartYear."--".$last10YearsEndYear."<br>";die;
			/*Last 20 Years*/
			$Last20YearsStartYear =  date("Y",strtotime($the_big_array[0]['actual_date']."-11 year"));
			$last20YearsEndYear =  $the_big_array[0]['year'];

			//echo $Last20YearsStartYear."----".$last20YearsEndYear;die();
			/*previous 10 Years*/
			$before10YearsStartYear = $Last20YearsStartYear+1;
			$before10YearsEndYear = $last10YearsStartYear+1;

			$data['last20YeearData'] = 'Last 10 Years';
			$data['last10YeearData'] = 'Last 5 Years';
			$data['previous10YeearData'] = 'Previous 5 Years';
		}
		else
		{
			$ararararara['yearsAvailability'] = 0;
			echo json_encode($ararararara);
			die;
			//echo 'no record found';
		}
		//echo $Last20YearsStartYear."----".$last20YearsEndYear;die();

		$data['media_last10years'] = ($last10YearsStartYear+2)."-".$last10YearsEndYear;
		$data['media_last20years'] = ($Last20YearsStartYear+2)."-".$last20YearsEndYear;
		$data['media_previous10years'] = ($before10YearsStartYear+1)."-".$before10YearsEndYear;

		$dts=[];
		$vlu=[];
		$last20YearsDates = array();
		$last20YearsValue = array();
		$before10YearsDates = array();
		$before10YearsValue = array();
		foreach($the_big_array as $val)
		{
			if(($last10YearsEndYear>=$val['year']) && (($last10YearsStartYear+1)<=$val['year']))
			{
				$dts[]=$val['search_date_all'];
				$vlu[]=str_replace(",","",$val['price']);
			}
			if(($last20YearsEndYear>=$val['year']) && (($Last20YearsStartYear+1)<=$val['year']))
			{	
				$last20YearsDates[]=$val['search_date_all'];
				$last20YearsValue[]=str_replace(",","",$val['price']);
			}
			if(($before10YearsEndYear>=$val['year']) && (($before10YearsStartYear+1)<=$val['year']))
			{	
				$before10YearsDates[]=$val['search_date_all'];
				$before10YearsValue[]=str_replace(",","",$val['price']);
			}
		}
		//echo "<pre>";print_r($last20YearsDates);die;
		$daterange = $this->getYearsBetweenDate($last10YearsStartYear+1,$last10YearsEndYear);
		//echo "<pre>";print_r($daterange);die;
		$last10YearsAllDatesVal = $this->getAllDatesAndvaluesSeasionalAnalysis($daterange,$dts,$vlu);
		//echo "<pre>";print_r($last10YearsAllDatesVal);die;
		$last10YearRecord = array();
		$c=0;
		foreach($last10YearsAllDatesVal as $key=>$ddd)
		{
			foreach($last10YearsAllDatesVal[$key] as $var)
			{
				$last10YearRecord[$c][] = $var;	
			}
			$c++;
		}
		//echo "<pre>";print_r($last10YearRecord);die();
		if($numberOfAvailableYears>=20)
		{
			$array1 = array_reverse($last10YearRecord[0]); // 31 Dec
			$array2 = array_reverse($last10YearRecord[1]);
			$array3 = array_reverse($last10YearRecord[2]);		
			$array4 = array_reverse($last10YearRecord[3]);
			$array5 = array_reverse($last10YearRecord[4]);
			$array6 = array_reverse($last10YearRecord[5]);
			$array7 = array_reverse($last10YearRecord[6]);
			$array8 = array_reverse($last10YearRecord[7]);
			$array9 = array_reverse($last10YearRecord[8]);
			$array10 = array_reverse($last10YearRecord[9]);
			$array11 = array_reverse($last10YearRecord[10]);
					
			$variance1 = $this->getVariance($array1);		
			$variance2 = $this->getVariance($array2);
			$variance3 = $this->getVariance($array3);
			$variance4 = $this->getVariance($array4);
			$variance5 = $this->getVariance($array5);
			$variance6 = $this->getVariance($array6);
			$variance7 = $this->getVariance($array7);
			$variance8 = $this->getVariance($array8);
			$variance9 = $this->getVariance($array9);
			$variance10 = $this->getVariance($array10);
			$variance11 = $this->getVariance($array11);
			$last10YearsAllVarianceArr = array(
												$variance2,
												$variance3,
												$variance4,
												$variance5,
												$variance6,
												$variance7,
												$variance8,
												$variance9,
												$variance10,
												$variance11
											);			
			$averageOfLast10Years = array();
			for($av=0;$av<=365;$av++)
			{
				$variandddd = ($variance2[$av]+$variance3[$av]+$variance4[$av]+$variance5[$av]+$variance6[$av]+$variance7[$av]+$variance8[$av]+$variance9[$av]+$variance10[$av]+$variance11[$av])/10; 
				$variandddd = number_format(($variandddd*100),2,".","");
				$averageOfLast10Years[] = $variandddd;
			}
			$last10YearsEvolutions = array();
			$lastEvolutions = 0;
			foreach(array_reverse($averageOfLast10Years) as $ev=>$evolution) //  1 Jan
			{
				if($ev==0)
				{
					$last10YearsEvolutions[] = number_format($evolution,2,".","");
				}
				else
				{
					$last10YearsEvolutions[] = number_format(($evolution+$lastEvolutions),2,".",""); 
					$lastEvolutions = $evolution+$lastEvolutions;
				}
			}
			$filterAverageEvolution10years = array();
			foreach($last10YearsEvolutions as $kkk=>$vvvv)
			{
				
				$filterAverageEvolution10years[] = $vvvv;
				
			}
			$performanceLast10Years = 0;
			if(end($filterAverageEvolution10years)>$filterAverageEvolution10years[0])
			{
				$performanceLast10Years = end($filterAverageEvolution10years)-$filterAverageEvolution10years[0];
			}
			else
			{
				$performanceLast10Years = end($filterAverageEvolution10years)-$filterAverageEvolution10years[0];
			}
			$data['performanceLast10Years'] = $performanceLast10Years;
		}
		if($numberOfAvailableYears>=10 && $numberOfAvailableYears<20)
		{
			$array1 = array_reverse($last10YearRecord[0]); // 31 Dec
			$array2 = array_reverse($last10YearRecord[1]);
			$array3 = array_reverse($last10YearRecord[2]);		
			$array4 = array_reverse($last10YearRecord[3]);
			$array5 = array_reverse($last10YearRecord[4]);
			$array6 = array_reverse($last10YearRecord[5]);
					
			$variance1 = $this->getVariance($array1);		
			$variance2 = $this->getVariance($array2);
			$variance3 = $this->getVariance($array3);
			$variance4 = $this->getVariance($array4);
			$variance5 = $this->getVariance($array5);
			$variance6 = $this->getVariance($array6);

			$last10YearsAllVarianceArr = array(
												$variance2,
												$variance3,
												$variance4,
												$variance5,
												$variance6,
												$variance7,
											);			
			$averageOfLast10Years = array();
			for($av=0;$av<=365;$av++)
			{
				$variandddd = ($variance2[$av]+$variance3[$av]+$variance4[$av]+$variance5[$av]+$variance6[$av])/5; 
				$variandddd = number_format(($variandddd*100),2,".","");
				$averageOfLast10Years[] = $variandddd;
			}
			$last10YearsEvolutions = array();
			$lastEvolutions = 0;
			foreach(array_reverse($averageOfLast10Years) as $ev=>$evolution) //  1 Jan
			{
				if($ev==0)
				{
					$last10YearsEvolutions[] = number_format($evolution,2,".","");
				}
				else
				{
					$last10YearsEvolutions[] = number_format(($evolution+$lastEvolutions),2,".",""); 
					$lastEvolutions = $evolution+$lastEvolutions;
				}
			}
			$filterAverageEvolution10years = array();
			foreach($last10YearsEvolutions as $kkk=>$vvvv)
			{
				
				$filterAverageEvolution10years[] = $vvvv;
			}
			$performanceLast10Years = 0;
			if(end($filterAverageEvolution10years)>$filterAverageEvolution10years[0])
			{
				$performanceLast10Years = end($filterAverageEvolution10years)-$filterAverageEvolution10years[0];
			}
			else
			{
				$performanceLast10Years = end($filterAverageEvolution10years)-$filterAverageEvolution10years[0];
			}
			$data['performanceLast10Years'] = $performanceLast10Years;
		}
		//echo "<pre>";print_r($filterAverageEvolution10years);die;
		/* 
			Last 20 Years Calculations Starts 
		*/
		$daterangeLast20Years = $this->getYearsBetweenDate($Last20YearsStartYear+1,$last20YearsEndYear);
		$last20YearsAllDatesVal = $this->getAllDatesAndvaluesSeasionalAnalysis($daterangeLast20Years,$last20YearsDates,$last20YearsValue);
		//echo "<pre>";print_r($last20YearsAllDatesVal);die;
		$last20YearRecord = array();
		$d=0;
		foreach($last20YearsAllDatesVal as $key=>$ddd)
		{
			foreach($last20YearsAllDatesVal[$key] as $var)
			{
				$last20YearRecord[$d][] = $var;	
			}
			$d++;
		}

		//echo "<pre>";print_r($last20YearRecord);die;
		if($numberOfAvailableYears>=20)
		{
			$Last20Yearsarray1 = array_reverse($last20YearRecord[0]);// 31 Dec
			$Last20Yearsarray2 = array_reverse($last20YearRecord[1]);// 31 Dec
			$Last20Yearsarray3 = array_reverse($last20YearRecord[2]);
			$Last20Yearsarray4 = array_reverse($last20YearRecord[3]);
			$Last20Yearsarray5 = array_reverse($last20YearRecord[4]);
			$Last20Yearsarray6 = array_reverse($last20YearRecord[5]);
			$Last20Yearsarray7 = array_reverse($last20YearRecord[6]);
			$Last20Yearsarray8 = array_reverse($last20YearRecord[7]);
			$Last20Yearsarray9 = array_reverse($last20YearRecord[8]);
			$Last20Yearsarray10 = array_reverse($last20YearRecord[9]);
			$Last20Yearsarray11 = array_reverse($last20YearRecord[10]);
			$Last20Yearsarray12 = array_reverse($last20YearRecord[11]);
			$Last20Yearsarray13 = array_reverse($last20YearRecord[12]);
			$Last20Yearsarray14 = array_reverse($last20YearRecord[13]);
			$Last20Yearsarray15 = array_reverse($last20YearRecord[14]);
			$Last20Yearsarray16 = array_reverse($last20YearRecord[15]);
			$Last20Yearsarray17 = array_reverse($last20YearRecord[16]);
			$Last20Yearsarray18 = array_reverse($last20YearRecord[17]);
			$Last20Yearsarray19 = array_reverse($last20YearRecord[18]);
			$Last20Yearsarray20 = array_reverse($last20YearRecord[19]);
			$Last20Yearsarray21 = array_reverse($last20YearRecord[20]);
					
			$Last20YearsVariance1 = $this->getVariance($Last20Yearsarray1);
			$Last20YearsVariance2 = $this->getVariance($Last20Yearsarray2);
			$Last20YearsVariance3 = $this->getVariance($Last20Yearsarray3);
			$Last20YearsVariance4 = $this->getVariance($Last20Yearsarray4);
			$Last20YearsVariance5 = $this->getVariance($Last20Yearsarray5);
			$Last20YearsVariance6 = $this->getVariance($Last20Yearsarray6);
			$Last20YearsVariance7 = $this->getVariance($Last20Yearsarray7);
			$Last20YearsVariance8 = $this->getVariance($Last20Yearsarray8);
			$Last20YearsVariance9 = $this->getVariance($Last20Yearsarray9);
			$Last20YearsVariance10 = $this->getVariance($Last20Yearsarray10);
			$Last20YearsVariance11 = $this->getVariance($Last20Yearsarray11);
			$Last20YearsVariance12 = $this->getVariance($Last20Yearsarray12);
			$Last20YearsVariance13 = $this->getVariance($Last20Yearsarray13);
			$Last20YearsVariance14 = $this->getVariance($Last20Yearsarray14);
			$Last20YearsVariance15 = $this->getVariance($Last20Yearsarray15);
			$Last20YearsVariance16 = $this->getVariance($Last20Yearsarray16);
			$Last20YearsVariance17 = $this->getVariance($Last20Yearsarray17);
			$Last20YearsVariance18 = $this->getVariance($Last20Yearsarray18);
			$Last20YearsVariance19 = $this->getVariance($Last20Yearsarray19);
			$Last20YearsVariance20 = $this->getVariance($Last20Yearsarray20);
			$Last20YearsVariance21 = $this->getVariance($Last20Yearsarray21);


			$last20YearsVarianceArr = array(
											//$Last20YearsVariance1,
											$Last20YearsVariance2,
											$Last20YearsVariance3,
											$Last20YearsVariance4,
											$Last20YearsVariance5,
											$Last20YearsVariance6,
											$Last20YearsVariance7,
											$Last20YearsVariance8,
											$Last20YearsVariance9,
											$Last20YearsVariance10,
											$Last20YearsVariance11,
											$Last20YearsVariance12,
											$Last20YearsVariance13,
											$Last20YearsVariance14,
											$Last20YearsVariance15,
											$Last20YearsVariance16,
											$Last20YearsVariance17,
											$Last20YearsVariance18,
											$Last20YearsVariance19,
											$Last20YearsVariance20,
											$Last20YearsVariance21
											);
			$averageOfLast20Years = array();
			for($av=0;$av<=365;$av++)
			{
				$variandddd = ($Last20YearsVariance2[$av]+$Last20YearsVariance3[$av]+$Last20YearsVariance4[$av]+$Last20YearsVariance5[$av]+$Last20YearsVariance6[$av]+$Last20YearsVariance7[$av]+$Last20YearsVariance8[$av]+$Last20YearsVariance9[$av]+$Last20YearsVariance10[$av]+$Last20YearsVariance11[$av]+$Last20YearsVariance12[$av]+$Last20YearsVariance13[$av]+$Last20YearsVariance14[$av]+$Last20YearsVariance15[$av]+$Last20YearsVariance16[$av]+$Last20YearsVariance17[$av]+$Last20YearsVariance18[$av]+$Last20YearsVariance19[$av]+$Last20YearsVariance20[$av]+$Last20YearsVariance21[$av])/20; 
				$variandddd = number_format(($variandddd*100),2,".","");
				$averageOfLast20Years[] = $variandddd;
			}
			$last20YearsEvolutions = array();
			$lastEvolutions1 = 0;
			foreach(array_reverse($averageOfLast20Years) as $ev=>$evolution) //  1 Jan
			{
				if($ev==0)
				{
					$last20YearsEvolutions[] = number_format(0,2,".","");
				}
				else
				{
					$last20YearsEvolutions[] = number_format(($evolution+$lastEvolutions1),2,".",""); 
					$lastEvolutions1 = $evolution+$lastEvolutions1;
				}
			}
			$filterAverageEvolution20years = array();
			foreach($last20YearsEvolutions as $kkk=>$vvvv)
			{

				$filterAverageEvolution20years[] = $vvvv;

			}
			$performanceLast20Years = 0;
			if(end($filterAverageEvolution20years)>$filterAverageEvolution20years[0])
			{
				$performanceLast20Years = end($filterAverageEvolution20years)-$filterAverageEvolution20years[0];
			}
			else
			{
				$performanceLast20Years = end($filterAverageEvolution20years)-$filterAverageEvolution20years[0];
			}
			$data['performanceLast20Years'] = $performanceLast20Years;
		}

		if($numberOfAvailableYears>=10 && $numberOfAvailableYears<20)
		{
			$Last20Yearsarray1 = array_reverse($last20YearRecord[0]);// 31 Dec
			$Last20Yearsarray2 = array_reverse($last20YearRecord[1]);// 31 Dec
			$Last20Yearsarray3 = array_reverse($last20YearRecord[2]);
			$Last20Yearsarray4 = array_reverse($last20YearRecord[3]);
			$Last20Yearsarray5 = array_reverse($last20YearRecord[4]);
			$Last20Yearsarray6 = array_reverse($last20YearRecord[5]);
			$Last20Yearsarray7 = array_reverse($last20YearRecord[6]);
			$Last20Yearsarray8 = array_reverse($last20YearRecord[7]);
			$Last20Yearsarray9 = array_reverse($last20YearRecord[8]);
			$Last20Yearsarray10 = array_reverse($last20YearRecord[9]);
			$Last20Yearsarray11 = array_reverse($last20YearRecord[10]);
			
					
			$Last20YearsVariance1 = $this->getVariance($Last20Yearsarray1);
			$Last20YearsVariance2 = $this->getVariance($Last20Yearsarray2);
			$Last20YearsVariance3 = $this->getVariance($Last20Yearsarray3);
			$Last20YearsVariance4 = $this->getVariance($Last20Yearsarray4);
			$Last20YearsVariance5 = $this->getVariance($Last20Yearsarray5);
			$Last20YearsVariance6 = $this->getVariance($Last20Yearsarray6);
			$Last20YearsVariance7 = $this->getVariance($Last20Yearsarray7);
			$Last20YearsVariance8 = $this->getVariance($Last20Yearsarray8);
			$Last20YearsVariance9 = $this->getVariance($Last20Yearsarray9);
			$Last20YearsVariance10 = $this->getVariance($Last20Yearsarray10);
			$Last20YearsVariance11 = $this->getVariance($Last20Yearsarray11);

			$last20YearsVarianceArr = array(
											$Last20YearsVariance2,
											$Last20YearsVariance3,
											$Last20YearsVariance4,
											$Last20YearsVariance5,
											$Last20YearsVariance6,
											$Last20YearsVariance7,
											$Last20YearsVariance8,
											$Last20YearsVariance9,
											$Last20YearsVariance10,
											$Last20YearsVariance11,
											);
			$averageOfLast20Years = array();
			for($av=0;$av<=365;$av++)
			{
				$variandddd = ($Last20YearsVariance2[$av]+$Last20YearsVariance3[$av]+$Last20YearsVariance4[$av]+$Last20YearsVariance5[$av]+$Last20YearsVariance6[$av]+$Last20YearsVariance7[$av]+$Last20YearsVariance8[$av]+$Last20YearsVariance9[$av]+$Last20YearsVariance10[$av]+$Last20YearsVariance11[$av])/10; 
				$variandddd = number_format(($variandddd*100),2,".","");
				$averageOfLast20Years[] = $variandddd;
			}
			$last20YearsEvolutions = array();
			$lastEvolutions1 = 0;
			foreach(array_reverse($averageOfLast20Years) as $ev=>$evolution) //  1 Jan
			{
				if($ev==0)
				{
					$last20YearsEvolutions[] = number_format(0,2,".","");
				}
				else
				{
					$last20YearsEvolutions[] = number_format(($evolution+$lastEvolutions1),2,".",""); 
					$lastEvolutions1 = $evolution+$lastEvolutions1;
				}
			}
			$filterAverageEvolution20years = array();
			foreach($last20YearsEvolutions as $kkk=>$vvvv)
			{

				$filterAverageEvolution20years[] = $vvvv;

			}
			$performanceLast20Years = 0;
			if(end($filterAverageEvolution20years)>$filterAverageEvolution20years[0])
			{
				$performanceLast20Years = end($filterAverageEvolution20years)-$filterAverageEvolution20years[0];
			}
			else
			{
				$performanceLast20Years = end($filterAverageEvolution20years)-$filterAverageEvolution20years[0];
			}
			$data['performanceLast20Years'] = $performanceLast20Years;
			//echo 'last 10 years';
		}
		//die();

		/* 
			Last 20 Years Calculations End 
		*/
		/* Previous 10 Years Calculation Starts  */
		$daterangePrevious10Years = $this->getYearsBetweenDate($before10YearsStartYear,$before10YearsEndYear);
		$previous10YearsAllDatesVal = $this->getAllDatesAndvaluesSeasionalAnalysis($daterangePrevious10Years,$before10YearsDates,$before10YearsValue);
		/*foreach($previous10YearsAllDatesVal[2016] as $valuses)
		{
			echo $valuses."<br>";
		}
		die();*/
		//echo "<pre>previous 10 years";print_r($previous10YearsAllDatesVal[2012]);die;
		$previous10YearRecord = array();
		$e=0;
		foreach($previous10YearsAllDatesVal as $key=>$ddd)
		{
			foreach($previous10YearsAllDatesVal[$key] as $var)
			{
				$previous10YearRecord[$e][] = $var;	
			}
			$e++;
		}
		//echo "<pre>dddd";print_r($previous10YearRecord);die;
		if($numberOfAvailableYears>=20)
		{
			$previous10Yearsarray1 = array_reverse($previous10YearRecord[0]); // 31 Dec
			$previous10Yearsarray2 = array_reverse($previous10YearRecord[1]);
			$previous10Yearsarray3 = array_reverse($previous10YearRecord[2]);
			$previous10Yearsarray4 = array_reverse($previous10YearRecord[3]);
			$previous10Yearsarray5 = array_reverse($previous10YearRecord[4]);
			$previous10Yearsarray6 = array_reverse($previous10YearRecord[5]);
			$previous10Yearsarray7 = array_reverse($previous10YearRecord[6]);
			$previous10Yearsarray8 = array_reverse($previous10YearRecord[7]);
			$previous10Yearsarray9 = array_reverse($previous10YearRecord[8]);
			$previous10Yearsarray10 = array_reverse($previous10YearRecord[9]);
			$previous10Yearsarray11 = array_reverse($previous10YearRecord[10]);
					
			$previous10YearsVariance1 = $this->getVariance($previous10Yearsarray1);
			$previous10YearsVariance2 = $this->getVariance($previous10Yearsarray2);
			$previous10YearsVariance3 = $this->getVariance($previous10Yearsarray3);
			$previous10YearsVariance4 = $this->getVariance($previous10Yearsarray4);
			$previous10YearsVariance5 = $this->getVariance($previous10Yearsarray5);
			$previous10YearsVariance6 = $this->getVariance($previous10Yearsarray6);
			$previous10YearsVariance7 = $this->getVariance($previous10Yearsarray7);
			$previous10YearsVariance8 = $this->getVariance($previous10Yearsarray8);
			$previous10YearsVariance9 = $this->getVariance($previous10Yearsarray9);
			$previous10YearsVariance10 = $this->getVariance($previous10Yearsarray10);
			$previous10YearsVariance11 = $this->getVariance($previous10Yearsarray11);

			$previous10YearsVarianceArr = array(
												$previous10YearsVariance2,
												$previous10YearsVariance3,
												$previous10YearsVariance4,
												$previous10YearsVariance5,
												$previous10YearsVariance6,
												$previous10YearsVariance7,
												$previous10YearsVariance8,
												$previous10YearsVariance9,
												$previous10YearsVariance10,
												$previous10YearsVariance11,											
												);
			
			$averageOfPrevious10Years = array();
			for($av=0;$av<=365;$av++)
			{
				$variandddd = ($previous10YearsVariance2[$av]+$previous10YearsVariance3[$av]+$previous10YearsVariance4[$av]+$previous10YearsVariance5[$av]+$previous10YearsVariance6[$av]+$previous10YearsVariance7[$av]+$previous10YearsVariance8[$av]+$previous10YearsVariance9[$av]+$previous10YearsVariance10[$av]+$previous10YearsVariance11[$av])/10; 
				$variandddd = number_format(($variandddd*100),2,".","");
				$averageOfPrevious10Years[] = $variandddd;
			}
			$previous10YearsEvolutions = array();
			$lastEvolutions2 = 0;
			foreach(array_reverse($averageOfPrevious10Years) as $ev=>$evolution) //  1 Jan
			{
				if($ev==0)
				{
					$previous10YearsEvolutions[] = number_format(0,2,".","");
				}
				else
				{
					$previous10YearsEvolutions[] = number_format(($evolution+$lastEvolutions2),2,".",""); 
					$lastEvolutions2 = $evolution+$lastEvolutions2;
				}
			}
			$filterAverageEvolutionPrevious10years = array();
			foreach($previous10YearsEvolutions as $kkk=>$vvvv)
			{
				$filterAverageEvolutionPrevious10years[] = $vvvv;
			}
			$performanceBefore10Years = 0;
			if(end($filterAverageEvolutionPrevious10years)>$filterAverageEvolutionPrevious10years[0])
			{
				$performanceBefore10Years = end($filterAverageEvolutionPrevious10years)-$filterAverageEvolutionPrevious10years[0];
			}
			else
			{
				$performanceBefore10Years = end($filterAverageEvolutionPrevious10years)-$filterAverageEvolutionPrevious10years[0];
			}
			$data['performanceBefore10Years'] = $performanceBefore10Years;
		}
		if($numberOfAvailableYears>=10 && $numberOfAvailableYears<20)
		{
			$previous10Yearsarray1 = array_reverse($previous10YearRecord[0]); // 31 Dec
			$previous10Yearsarray2 = array_reverse($previous10YearRecord[1]);
			$previous10Yearsarray3 = array_reverse($previous10YearRecord[2]);
			$previous10Yearsarray4 = array_reverse($previous10YearRecord[3]);
			$previous10Yearsarray5 = array_reverse($previous10YearRecord[4]);
			$previous10Yearsarray6 = array_reverse($previous10YearRecord[5]);
					
			$previous10YearsVariance1 = $this->getVariance($previous10Yearsarray1);
			$previous10YearsVariance2 = $this->getVariance($previous10Yearsarray2);
			$previous10YearsVariance3 = $this->getVariance($previous10Yearsarray3);
			$previous10YearsVariance4 = $this->getVariance($previous10Yearsarray4);
			$previous10YearsVariance5 = $this->getVariance($previous10Yearsarray5);
			$previous10YearsVariance6 = $this->getVariance($previous10Yearsarray6);

			$previous10YearsVarianceArr = array(
												$previous10YearsVariance2,
												$previous10YearsVariance3,
												$previous10YearsVariance4,
												$previous10YearsVariance5,
												$previous10YearsVariance6,												
												);
			
			$averageOfPrevious10Years = array();
			for($av=0;$av<=365;$av++)
			{
				$variandddd = ($previous10YearsVariance2[$av]+$previous10YearsVariance3[$av]+$previous10YearsVariance4[$av]+$previous10YearsVariance5[$av]+$previous10YearsVariance6[$av])/5; 
				$variandddd = number_format(($variandddd*100),2,".","");
				$averageOfPrevious10Years[] = $variandddd;
			}
			$previous10YearsEvolutions = array();
			$lastEvolutions2 = 0;
			foreach(array_reverse($averageOfPrevious10Years) as $ev=>$evolution) //  1 Jan
			{
				if($ev==0)
				{
					$previous10YearsEvolutions[] = number_format(0,2,".","");
				}
				else
				{
					$previous10YearsEvolutions[] = number_format(($evolution+$lastEvolutions2),2,".",""); 
					$lastEvolutions2 = $evolution+$lastEvolutions2;
				}
			}
			$filterAverageEvolutionPrevious10years = array();
			foreach($previous10YearsEvolutions as $kkk=>$vvvv)
			{
				$filterAverageEvolutionPrevious10years[] = $vvvv;
			}
			$performanceBefore10Years = 0;
			if(end($filterAverageEvolutionPrevious10years)>$filterAverageEvolutionPrevious10years[0])
			{
				$performanceBefore10Years = end($filterAverageEvolutionPrevious10years)-$filterAverageEvolutionPrevious10years[0];
			}
			else
			{
				$performanceBefore10Years = end($filterAverageEvolutionPrevious10years)-$filterAverageEvolutionPrevious10years[0];
			}
			$data['performanceBefore10Years'] = $performanceBefore10Years;
			//echo 'previous 10 years';die();
		}
		//echo "<pre>";print_r($previous10YearsEvolutions);die();
		//echo "<pre>";print_r($averageOfPrevious10Years);die();
		
		//echo "<pre>";print_r($last20YearRecord);
		/*
		for($i=1;$i<=5;$i++)
		{
			foreach($previous10YearRecord[$i] as $key=>$arr)
			{
				if($key>=79 && $key<=138)
				{
					echo $i."===".$arr."<br>";
				}
			}
		}*/
		//die();

		/*$arrayOb1 = $last20YearRecord[10];

		$finalAverageArr = array();
		for($j=237;$j<=328;$j++)
		{

			//$finalAverageArr[] = ($arrayOb1[$j]+$arrayOb2[$j]+$arrayOb3[$j]+$arrayOb4[$j]+$arrayOb5[$j])/5;
			//$finalAverageArr[] = $arrayOb1[$j];
			echo $arrayOb1[$j]."<br>";

		}
		die();*/
		/*
		$profitFinal = ((end($finalAverageArr)/$finalAverageArr[0])-1)*100;
		echo $profitFinal;
		echo "<pre>";print_r($finalAverageArr);die;*/

		/*$multidimensionArr = array(
									$previous10YearRecord[1],
									$previous10YearRecord[2],
									$previous10YearRecord[3],
									$previous10YearRecord[4],
									$previous10YearRecord[5]

									);*/
		//echo $this->calCulateHorizontalAverage($multidimensionArr,79,138,5);

		//die();
		//$data['performanceBefore10Years'] = array_sum( $filterAverageEvolutionPrevious10years) / count( $filterAverageEvolutionPrevious10years);
		//echo "<pre>previous10YearsEvolutions";print_r($filterAverageEvolutionPrevious10years);die;
		/* Previous 10 Years Calculation End  */

		$beginLabel = new DateTime( '2016-01-01' );
		$endLabel = (new DateTime( '2016-12-31' ))->modify( '+1 day' );
		$intervalLabel = new DateInterval('P1D');
		$labelRange = new DatePeriod($beginLabel, $intervalLabel ,$endLabel);
		$xRangeLabel = array();
		$allDates = array();
		foreach($labelRange as $range)
		{
			$xRangeLabel[] = "'".$range->format('d-M')."'";
			$allDates[] = $range->format('d-M');
		}
		
		$data['xRangeLabel'] = $xRangeLabel;
		$filterDates = array();
		foreach($xRangeLabel as $kdate=>$dvl)
		{

			$filterDates[] = $dvl;
			 
		}
		$mergeArr  = array();
		$ddArr = array();
		//echo "<pre>";print_r($allDates);die();
		foreach($allDates as $keys=>$date)
		{
			$ddArr['dates'] = $date."-2021";
			$ddArr['usualDate'] = "'".$date."'";
			$ddArr['converted_date'] = strtotime($date."-2021");
			$ddArr['values'] = $last10YearsEvolutions[$keys];
			$ddArr['index'] = $keys;
			array_push($mergeArr,$ddArr);
		}
		//echo "<pre>";print_r($mergeArr);die();
		$withoutFilter = $mergeArr;
		//echo "<pre>";print_r($withoutFilter);die();

		/*
			For before 10 Years Calculations
		*/
		$beforeTenYears  = array();
		$beforeTenYearsDataArr = array();
		foreach($allDates as $keys=>$date)
		{
			$beforeTenYearsDataArr['dates'] = $date."-2021";
			$beforeTenYearsDataArr['usualDate'] = "'".$date."'";
			$beforeTenYearsDataArr['converted_date'] = strtotime($date."-2021");
			$beforeTenYearsDataArr['values'] = $previous10YearsEvolutions[$keys];
			$beforeTenYearsDataArr['index'] = $keys;
			array_push($beforeTenYears,$beforeTenYearsDataArr);
		}
		$beforeTenYearsWithoutFilter = $beforeTenYears;
		usort($beforeTenYears,array($this,'sortingDateValues'));
		//echo "<pre>ram ji";print_r($lastTwentyYearsWithoutFilter);die;

		$getPlacebeforeTenYears = array();
		$getWithoutFilterBeforeTenYears = array();
		$getOnePlaceBeforeTenYears = array();
		$beforeTenYearsMainArr = array();

		for($rng=0;$rng<=50;$rng++)
		{
			if($rng==0)
			{
				$getPlacebeforeTenYears = $this->removeExistingDate($beforeTenYears,$getOnePlaceBeforeTenYears[0]['converted_date'],$getOnePlaceBeforeTenYears[count($getOnePlaceBeforeTenYears)-1]['converted_date']);
				$getWithoutFilterBeforeTenYears = $this->removeExistingDate($withoutFilter,$getOnePlaceBeforeTenYears[0]['converted_date'],$getOnePlaceBeforeTenYears[count($getOnePlaceBeforeTenYears)-1]['converted_date']);

				$getOnePlaceBeforeTenYears = $this->getLastYearRecordCalculations($rng,$getPlacebeforeTenYears,$getWithoutFilterBeforeTenYears);
				if(round(abs($getOnePlaceBeforeTenYears[0]['converted_date'] - $getOnePlaceBeforeTenYears[count($getOnePlaceBeforeTenYears)-1]['converted_date'])/86400)>=9)
				{
					$beforeTenYearsMainArr[] = $getOnePlaceBeforeTenYears;
				}	
			}
			else
			{
				$getOnePlaceBeforeTenYears = $this->removeExistingDate($getOnePlaceBeforeTenYears,$getOnePlaceBeforeTenYears[0]['converted_date'],$getOnePlaceBeforeTenYears[count($getOnePlaceBeforeTenYears)-1]['converted_date']);
				$getWithoutFilterBeforeTenYears = $this->removeExistingDate($getWithoutFilterBeforeTenYears,$getOnePlaceBeforeTenYears[0]['converted_date'],$getOnePlaceBeforeTenYears[count($getOnePlaceBeforeTenYears)-1]['converted_date']);

				$getOnePlaceBeforeTenYears = $this->getLastYearRecordCalculations($rng,$getPlacebeforeTenYears,$getWithoutFilterBeforeTenYears);
				if(round(abs($getOnePlaceBeforeTenYears[0]['converted_date'] - $getOnePlaceBeforeTenYears[count($getOnePlaceBeforeTenYears)-1]['converted_date'])/86400)>=9)
				{
					$beforeTenYearsMainArr[] = $getOnePlaceBeforeTenYears;
				}
			}
				
		}
		//echo "<pre>";print_r($beforeTenYearsMainArr);die;

		$beforeTenYearMainProfitProbArr = array();
		foreach($beforeTenYearsMainArr as $mainkey=>$main)
		{
			$beforeTenYearMainProfitProbArr[] = $this->findProfitPerformanceProbability($main,$last20YearsVarianceArr,$previous10YearsVarianceArr,3,$totalNumberOfYearsCalCulation,$previous10YearRecord);
			
		}
		//echo "<pre>";print_r($beforeTenYearMainProfitProbArr);die();
		$newBeforeTenYearsArrProBablity = array();
		$newBefore10Key = array();
		foreach($beforeTenYearMainProfitProbArr as $l20Val)
		{
			if($l20Val['performance']>=$startDate && $l20Val['probability']>=$endDate)
			{
				//echo $l20Val['probability']."<br>";
				$newBefore10Key['val'] = $l20Val['probability'];
				$newBefore10Key['dts'] = $l20Val['dts'];
				$newBefore10Key['numOfPostiveYears'] = $l20Val['numOfPostiveYears'];
				$newBefore10Key['numOfnegativeYears'] = $l20Val['numOfnegativeYears'];
				$newBefore10Key['performance'] = $l20Val['performance'];
				$newBefore10Key['totalDays'] = $l20Val['totalDays'];
				$newBefore10Key['probability'] = $l20Val['probability'];
				$explode = explode(',',$l20Val['dts']);
				$newBefore10Key['lastYearsREC'] = $this->getProbProfitUsingStartDateEndDate($actual_stock_id,$explode[0],$explode[count($explode)-2],$totalNumberOfYearsCalCulation);
				array_push($newBeforeTenYearsArrProBablity,$newBefore10Key);
			}

		}
		//echo "<pre>-jai sri ram-";print_r($newBeforeTenYearsArrProBablity);//die();
		$checkBefore10Year = 0;
		$nBefore10Key = array();
		$nBeforeTenYearsArr = array();
		foreach($newBeforeTenYearsArrProBablity as $l20Val)
		{
			if(($l20Val['performance']>=$startDate && $l20Val['probability']>=$endDate) AND ( ($l20Val['lastYearsREC']['performanceLast20Years']>=$startDate && $l20Val['lastYearsREC']['probabalityli']>=$endDate ) || ($l20Val['lastYearsREC']['performanceLast10Years']>=$startDate && $l20Val['lastYearsREC']['probabalityli']>=$endDate) ) )
			{
				//echo "before 10 yaers 1";
				$checkBefore10Year = 1;
				$nBefore10Key['val'] = $l20Val['probability'];
				$nBefore10Key['dts'] = $l20Val['dts'];
				$nBefore10Key['numOfPostiveYears'] = $l20Val['numOfPostiveYears'];
				$nBefore10Key['numOfnegativeYears'] = $l20Val['numOfnegativeYears'];
				$nBefore10Key['performance'] = $l20Val['performance'];
				$nBefore10Key['totalDays'] = $l20Val['totalDays'];
				$nBefore10Key['probability'] = $l20Val['probability'];
				$nBefore10Key['performanceLast10Years'] = $l20Val['lastYearsREC']['performanceLast10Years'];
				$nBefore10Key['performanceBefore10Years'] = $l20Val['lastYearsREC']['performanceBefore10Years'];
				$nBefore10Key['performanceLast20Years'] = $l20Val['lastYearsREC']['performanceLast20Years'];
				$nBefore10Key['filterDates'] = $l20Val['lastYearsREC']['filterDates'];
				$nBefore10Key['filterAverageEvolution10years'] = $l20Val['lastYearsREC']['filterAverageEvolution10years'];
				$nBefore10Key['filterAverageEvolution20years'] = $l20Val['lastYearsREC']['filterAverageEvolution20years'];
				$nBefore10Key['filterAverageEvolutionPrevious10years'] = $l20Val['lastYearsREC']['filterAverageEvolutionPrevious10years'];
				array_push($nBeforeTenYearsArr,$nBefore10Key);
				break;
			}
			else if(($l20Val['performance']>=$startDate && $l20Val['probability']>=$endDate) AND ($l20Val['lastYearsREC']['performanceLast20Years']>=$startDate || $l20Val['lastYearsREC']['performanceLast10Years']>=$startDate ))
			{
				//echo "before 10 yaers 2";
				$checkBefore10Year = 1;
				$nBefore10Key['val'] = $l20Val['probability'];
				$nBefore10Key['dts'] = $l20Val['dts'];
				$nBefore10Key['numOfPostiveYears'] = $l20Val['numOfPostiveYears'];
				$nBefore10Key['numOfnegativeYears'] = $l20Val['numOfnegativeYears'];
				$nBefore10Key['performance'] = $l20Val['performance'];
				$nBefore10Key['totalDays'] = $l20Val['totalDays'];
				$nBefore10Key['probability'] = $l20Val['probability'];
				$nBefore10Key['performanceLast10Years'] = $l20Val['lastYearsREC']['performanceLast10Years'];
				$nBefore10Key['performanceBefore10Years'] = $l20Val['lastYearsREC']['performanceBefore10Years'];
				$nBefore10Key['performanceLast20Years'] = $l20Val['lastYearsREC']['performanceLast20Years'];
				$nBefore10Key['filterDates'] = $l20Val['lastYearsREC']['filterDates'];
				$nBefore10Key['filterAverageEvolution10years'] = $l20Val['lastYearsREC']['filterAverageEvolution10years'];
				$nBefore10Key['filterAverageEvolution20years'] = $l20Val['lastYearsREC']['filterAverageEvolution20years'];
				$nBefore10Key['filterAverageEvolutionPrevious10years'] = $l20Val['lastYearsREC']['filterAverageEvolutionPrevious10years'];
				array_push($nBeforeTenYearsArr,$nBefore10Key);
				break;
			}
			//echo $nLastTw['last10YearsREC']['performanceLast10Years']."<br>";
		}
		//echo $checkBefore10Year;
		//echo "<pre>--";print_r($nBeforeTenYearsArr);//die();
		//echo "<pre>";print_r($newBeforeTenYearsArrProBablity);die();
		//echo "<pre>";print_r($beforeTenYearMainProfitProbArr);die;
		/*
			For before 10 Years Calculations end
		*/





		usort($mergeArr,array($this,'sortingDateValues'));
		$getOnePlace0 = 0;
		$mergeArr0 = array();
		$withoutFilter0 = array();
		$getOnePlace0 = array();
		$mainArrrrrrr = array();
		for($rng=0;$rng<=50;$rng++)
		{
			if($rng==0)
			{
				$mergeArr0 = $this->removeExistingDate($mergeArr,$getOnePlace0[0]['converted_date'],$getOnePlace0[count($getOnePlace0)-1]['converted_date']);
				$withoutFilter0 = $this->removeExistingDate($withoutFilter,$getOnePlace0[0]['converted_date'],$getOnePlace0[count($getOnePlace0)-1]['converted_date']);

				$getOnePlace0 = $this->getLastYearRecordCalculations($rng,$mergeArr0,$withoutFilter0);

				if(round(abs($getOnePlace0[0]['converted_date'] - $getOnePlace0[count($getOnePlace0)-1]['converted_date'])/86400)>=9)
				{
					$mainArrrrrrr[] = $getOnePlace0;
				}

			}
			else
			{
				$mergeArr0 = $this->removeExistingDate($mergeArr0,$getOnePlace0[0]['converted_date'],$getOnePlace0[count($getOnePlace0)-1]['converted_date']);
				$withoutFilter0 = $this->removeExistingDate($withoutFilter0,$getOnePlace0[0]['converted_date'],$getOnePlace0[count($getOnePlace0)-1]['converted_date']);

				$getOnePlace0 = $this->getLastYearRecordCalculations($rng,$mergeArr0,$withoutFilter0);


				if(round(abs($getOnePlace0[0]['converted_date'] - $getOnePlace0[count($getOnePlace0)-1]['converted_date'])/86400)>=9)
				{
					$mainArrrrrrr[] = $getOnePlace0;
				}


			}
			
		}
		//echo "<pre>";print_r($mainArrrrrrr);die();
		/*
			For 20 Years Calculations
		*/
		$lastTwentyYears  = array();
		$lastTwentyYearsDataArr = array();
		foreach($allDates as $keys=>$date)
		{
			$lastTwentyYearsDataArr['dates'] = $date."-2021";
			$lastTwentyYearsDataArr['usualDate'] = "'".$date."'";
			$lastTwentyYearsDataArr['converted_date'] = strtotime($date."-2021");
			$lastTwentyYearsDataArr['values'] = $last20YearsEvolutions[$keys];
			$lastTwentyYearsDataArr['index'] = $keys;
			array_push($lastTwentyYears,$lastTwentyYearsDataArr);
		}
		$lastTwentyYearsWithoutFilter = $lastTwentyYears;
		usort($lastTwentyYears,array($this,'sortingDateValues'));
		//echo "<pre>ram ji";print_r($lastTwentyYearsWithoutFilter);die;

		$getPlaceTwentyYears = array();
		$getWithoutFilterTwentyYears = array();
		$getOnePlaceTwentyYears = array();
		$lastTwentyYearsMainArr = array();

		for($rng=0;$rng<=50;$rng++)
		{
			if($rng==0)
			{
				$getPlaceTwentyYears = $this->removeExistingDate($lastTwentyYears,$getOnePlaceTwentyYears[0]['converted_date'],$getOnePlaceTwentyYears[count($getOnePlaceTwentyYears)-1]['converted_date']);
				$getWithoutFilterTwentyYears = $this->removeExistingDate($lastTwentyYearsWithoutFilter,$getOnePlaceTwentyYears[0]['converted_date'],$getOnePlaceTwentyYears[count($getOnePlaceTwentyYears)-1]['converted_date']);

				$getOnePlaceTwentyYears = $this->getLastYearRecordCalculations($rng,$getPlaceTwentyYears,$getWithoutFilterTwentyYears);
				if(round(abs($getOnePlaceTwentyYears[0]['converted_date'] - $getOnePlaceTwentyYears[count($getOnePlaceTwentyYears)-1]['converted_date'])/86400)>=9)
				{
					$lastTwentyYearsMainArr[] = $getOnePlaceTwentyYears;
				}	
			}
			else
			{
				$getPlaceTwentyYears = $this->removeExistingDate($getPlaceTwentyYears,$getOnePlaceTwentyYears[0]['converted_date'],$getOnePlaceTwentyYears[count($getOnePlaceTwentyYears)-1]['converted_date']);
				$getWithoutFilterTwentyYears = $this->removeExistingDate($getWithoutFilterTwentyYears,$getOnePlaceTwentyYears[0]['converted_date'],$getOnePlaceTwentyYears[count($getOnePlaceTwentyYears)-1]['converted_date']);

				$getOnePlaceTwentyYears = $this->getLastYearRecordCalculations($rng,$getPlaceTwentyYears,$getWithoutFilterTwentyYears);
				if(round(abs($getOnePlaceTwentyYears[0]['converted_date'] - $getOnePlaceTwentyYears[count($getOnePlaceTwentyYears)-1]['converted_date'])/86400)>=9)
				{
					$lastTwentyYearsMainArr[] = $getOnePlaceTwentyYears;
				}
			}
				
		}
		

		$lastTwentyYearMainProfitProbArr = array();
		foreach($lastTwentyYearsMainArr as $mainkey=>$main)
		{
			$lastTwentyYearMainProfitProbArr[] = $this->findProfitPerformanceProbability($main,$last20YearsVarianceArr,$last20YearsVarianceArr,2,$totalNumberOfYearsCalCulation,$last20YearRecord);
			
		}
		//echo "<pre>20";print_r($lastTwentyYearMainProfitProbArr);die();

		$newLastTwentyYearsArrProBablity = array();
		$newlast20Key = array();
		foreach($lastTwentyYearMainProfitProbArr as $l20Val)
		{
			if($l20Val['performance']>=$startDate && $l20Val['probability']>=$endDate)
			{
				$newlast20Key['val'] = $l20Val['probability'];
				$newlast20Key['dts'] = $l20Val['dts'];
				$newlast20Key['numOfPostiveYears'] = $l20Val['numOfPostiveYears'];
				$newlast20Key['numOfnegativeYears'] = $l20Val['numOfnegativeYears'];
				$newlast20Key['performance'] = $l20Val['performance'];
				$newlast20Key['totalDays'] = $l20Val['totalDays'];
				$newlast20Key['probability'] = $l20Val['probability'];
				$explode = explode(',',$l20Val['dts']);
				//echo "<pre>"; print_r($explode);
				//echo "<pre>"; print_r($explode[count($explode)-2]);

				$newlast20Key['lastYearsREC'] = $this->getProbProfitUsingStartDateEndDate($actual_stock_id,$explode[0],$explode[count($explode)-2],$totalNumberOfYearsCalCulation);
				array_push($newLastTwentyYearsArrProBablity,$newlast20Key);
			}

		}
		//echo "<pre>fffram";print_r($newLastTwentyYearsArrProBablity);die();
		$checkLast20Year = 0;
		$nLast20Key = array();
		$nLastTwentyYearsArr = array();
		foreach($newLastTwentyYearsArrProBablity as $l20Val)
		{
			if(($l20Val['performance']>=$startDate && $l20Val['probability']>=$endDate) AND ( ( $l20Val['lastYearsREC']['performanceLast10Years']>=$startDate && $l20Val['lastYearsREC']['probabalityli']>=$endDate) || ($l20Val['lastYearsREC']['performanceBefore10Years']>=$startDate && $l20Val['lastYearsREC']['probabalityli']>=$endDate) ) )
			{
				//echo 1;
				//echo "last 20 1";
				$checkLast20Year = 1;
				$nLast20Key['val'] = $l20Val['probability'];
				$nLast20Key['dts'] = $l20Val['dts'];
				$nLast20Key['numOfPostiveYears'] = $l20Val['numOfPostiveYears'];
				$nLast20Key['numOfnegativeYears'] = $l20Val['numOfnegativeYears'];
				$nLast20Key['performance'] = $l20Val['performance'];
				$nLast20Key['totalDays'] = $l20Val['totalDays'];
				$nLast20Key['probability'] = $l20Val['probability'];
				$nLast20Key['performanceLast10Years'] = $l20Val['lastYearsREC']['performanceLast10Years'];
				$nLast20Key['performanceBefore10Years'] = $l20Val['lastYearsREC']['performanceBefore10Years'];
				$nLast20Key['performanceLast20Years'] = $l20Val['lastYearsREC']['performanceLast20Years'];
				$nLast20Key['filterDates'] = $l20Val['lastYearsREC']['filterDates'];
				$nLast20Key['filterAverageEvolution10years'] = $l20Val['lastYearsREC']['filterAverageEvolution10years'];
				$nLast20Key['filterAverageEvolution20years'] = $l20Val['lastYearsREC']['filterAverageEvolution20years'];
				$nLast20Key['filterAverageEvolutionPrevious10years'] = $l20Val['lastYearsREC']['filterAverageEvolutionPrevious10years'];
				array_push($nLastTwentyYearsArr,$nLast20Key);
				break;
			}
			else if(($l20Val['performance']>=$startDate && $l20Val['probability']>=$endDate) AND ($l20Val['lastYearsREC']['performanceLast10Years']>=$startDate || $l20Val['lastYearsREC']['performanceBefore10Years']>=$startDate ) )
			{
				//echo 2;
				//echo "last 20 2";
				$checkLast20Year = 1;
				$nLast20Key['val'] = $l20Val['probability'];
				$nLast20Key['dts'] = $l20Val['dts'];
				$nLast20Key['numOfPostiveYears'] = $l20Val['numOfPostiveYears'];
				$nLast20Key['numOfnegativeYears'] = $l20Val['numOfnegativeYears'];
				$nLast20Key['performance'] = $l20Val['performance'];
				$nLast20Key['totalDays'] = $l20Val['totalDays'];
				$nLast20Key['probability'] = $l20Val['probability'];
				$nLast20Key['performanceLast10Years'] = $l20Val['lastYearsREC']['performanceLast10Years'];
				$nLast20Key['performanceBefore10Years'] = $l20Val['lastYearsREC']['performanceBefore10Years'];
				$nLast20Key['performanceLast20Years'] = $l20Val['lastYearsREC']['performanceLast20Years'];
				$nLast20Key['filterDates'] = $l20Val['lastYearsREC']['filterDates'];
				$nLast20Key['filterAverageEvolution10years'] = $l20Val['lastYearsREC']['filterAverageEvolution10years'];
				$nLast20Key['filterAverageEvolution20years'] = $l20Val['lastYearsREC']['filterAverageEvolution20years'];
				$nLast20Key['filterAverageEvolutionPrevious10years'] = $l20Val['lastYearsREC']['filterAverageEvolutionPrevious10years'];
				array_push($nLastTwentyYearsArr,$nLast20Key);
				break;
			}
			//echo $nLastTw['last10YearsREC']['performanceLast10Years']."<br>";
		}
		//echo $checkLast20Year;
		//echo "<pre>last 20 years ";print_r($nLastTwentyYearsArr);//die();
		//die();
		//echo "<pre>------  ";print_r($newLastTwentyYearsArrProBablity);die;

		/*
			For 20 Years Calculations end
		*/

		
		//echo "<pre>first step";print_r($mainArrrrrrr);
		$mainProfitProbArr = array();
		foreach($mainArrrrrrr as $mainkey=>$main)
		{
			//echo "<pre>";print_r($main);
			$mainProfitProbArr[] = $this->findProfitPerformanceProbability($main,$last20YearsVarianceArr,$last10YearsAllVarianceArr,1,$totalNumberOfYearsCalCulation,$last10YearRecord);
			
		}
		//echo "<pre>second step";print_r($mainProfitProbArr);//die;
		$newLastTenYearsArrProBablity = array();
		$newlast10Key = array();
		foreach($mainProfitProbArr as $l20Val)
		{
			if($l20Val['performance']>=$startDate && $l20Val['probability']>=$endDate)
			{
				//echo $l20Val['probability']."<br>";
				$newlast10Key['val'] = $l20Val['probability'];
				$newlast10Key['dts'] = $l20Val['dts'];
				$newlast10Key['numOfPostiveYears'] = $l20Val['numOfPostiveYears'];
				$newlast10Key['numOfnegativeYears'] = $l20Val['numOfnegativeYears'];
				$newlast10Key['performance'] = $l20Val['performance'];
				$newlast10Key['totalDays'] = $l20Val['totalDays'];
				$newlast10Key['probability'] = $l20Val['probability'];
				$explode = explode(',',$l20Val['dts']);
				//echo "<pre>"; print_r($explode[0]);
				//echo "<pre>"; print_r($explode[count($explode)-2]);

				$newlast10Key['lastYearsREC'] = $this->getProbProfitUsingStartDateEndDate($actual_stock_id,$explode[0],$explode[count($explode)-2],$totalNumberOfYearsCalCulation);
				array_push($newLastTenYearsArrProBablity,$newlast10Key);
			}

		}
		//echo "<pre>jjj";print_r($newLastTenYearsArrProBablity);die();
		$checkLast10Year = 0;
		$nLast10Key = array();
		$nLastTenYearsArr = array();
		foreach($newLastTenYearsArrProBablity as $l20Val)
		{
			if(($l20Val['performance']>=$startDate && $l20Val['probability']>=$endDate) AND ( ($l20Val['lastYearsREC']['performanceLast20Years']>=$startDate && $l20Val['lastYearsREC']['probabalityli']>=$endDate) || ($l20Val['lastYearsREC']['performanceBefore10Years']>=$startDate && $l20Val['lastYearsREC']['probabalityli']>=$endDate ) ) )
			{
				//echo 'last 10 1';
				$checkLast10Year = 1;
				$nLast10Key['val'] = $l20Val['probability'];
				$nLast10Key['dts'] = $l20Val['dts'];
				$nLast10Key['numOfPostiveYears'] = $l20Val['numOfPostiveYears'];
				$nLast10Key['numOfnegativeYears'] = $l20Val['numOfnegativeYears'];
				$nLast10Key['performance'] = $l20Val['performance'];
				$nLast10Key['totalDays'] = $l20Val['totalDays'];
				$nLast10Key['probability'] = $l20Val['probability'];
				$nLast10Key['performanceLast10Years'] = $l20Val['lastYearsREC']['performanceLast10Years'];
				$nLast10Key['performanceBefore10Years'] = $l20Val['lastYearsREC']['performanceBefore10Years'];
				$nLast10Key['performanceLast20Years'] = $l20Val['lastYearsREC']['performanceLast20Years'];
				$nLast10Key['filterDates'] = $l20Val['lastYearsREC']['filterDates'];
				$nLast10Key['filterAverageEvolution10years'] = $l20Val['lastYearsREC']['filterAverageEvolution10years'];
				$nLast10Key['filterAverageEvolution20years'] = $l20Val['lastYearsREC']['filterAverageEvolution20years'];
				$nLast10Key['filterAverageEvolutionPrevious10years'] = $l20Val['lastYearsREC']['filterAverageEvolutionPrevious10years'];

				array_push($nLastTenYearsArr,$nLast10Key);
				break;
			}
			else if(($l20Val['performance']>=$startDate && $l20Val['probability']>=$endDate) AND ($l20Val['lastYearsREC']['performanceLast20Years']>=$startDate || $l20Val['lastYearsREC']['performanceBefore10Years']>=$startDate ))
			{
				//echo 'last 10 2';
				$checkLast10Year = 1;
				$nLast10Key['val'] = $l20Val['probability'];
				$nLast10Key['dts'] = $l20Val['dts'];
				$nLast10Key['numOfPostiveYears'] = $l20Val['numOfPostiveYears'];
				$nLast10Key['numOfnegativeYears'] = $l20Val['numOfnegativeYears'];
				$nLast10Key['performance'] = $l20Val['performance'];
				$nLast10Key['totalDays'] = $l20Val['totalDays'];
				$nLast10Key['probability'] = $l20Val['probability'];
				$nLast10Key['performanceLast10Years'] = $l20Val['lastYearsREC']['performanceLast10Years'];
				$nLast10Key['performanceBefore10Years'] = $l20Val['lastYearsREC']['performanceBefore10Years'];
				$nLast10Key['performanceLast20Years'] = $l20Val['lastYearsREC']['performanceLast20Years'];
				$nLast10Key['filterDates'] = $l20Val['lastYearsREC']['filterDates'];
				$nLast10Key['filterAverageEvolution10years'] = $l20Val['lastYearsREC']['filterAverageEvolution10years'];
				$nLast10Key['filterAverageEvolution20years'] = $l20Val['lastYearsREC']['filterAverageEvolution20years'];
				$nLast10Key['filterAverageEvolutionPrevious10years'] = $l20Val['lastYearsREC']['filterAverageEvolutionPrevious10years'];

				array_push($nLastTenYearsArr,$nLast10Key);
				break;
			}
		}
		$data['noRecordFound'] = 0;
		if($checkLast20Year==1)
		{
			//echo "last 20";
			$data['probability'] = $nLastTwentyYearsArr[0]['probability'];
			$data['filterPerformaceLast10Years'] = $nLastTwentyYearsArr[0]['performanceLast10Years'];
			$data['filterPerformaceLast20Years'] = $nLastTwentyYearsArr[0]['performanceLast20Years'];
			$data['filterPerformacePrevious10Years'] = $nLastTwentyYearsArr[0]['performanceBefore10Years'];
			$data['filterDates'] = $nLastTwentyYearsArr[0]['filterDates'];
			$data['filterAverageEvolution10years'] = $nLastTwentyYearsArr[0]['filterAverageEvolution10years'];
			$data['filterAverageEvolution20years'] = $nLastTwentyYearsArr[0]['filterAverageEvolution20years'];
			$data['filterAverageEvolutionPrevious10years'] = $nLastTwentyYearsArr[0]['filterAverageEvolutionPrevious10years'];
			$data['finalnumOfPostiveYears'] = $nLastTwentyYearsArr[0]['numOfPostiveYears'];
			$data['finalnumOfnegativeYears'] = $nLastTwentyYearsArr[0]['numOfnegativeYears'];
			$data['finaltotalDays'] = $nLastTwentyYearsArr[0]['totalDays'];

		}
		else if($checkLast10Year==1)
		{
			//echo "last 10";
			$data['probability'] = $nLastTenYearsArr[0]['probability'];
			$data['filterPerformaceLast10Years'] = $nLastTenYearsArr[0]['performanceLast10Years'];
			$data['filterPerformaceLast20Years'] = $nLastTenYearsArr[0]['performanceLast20Years'];
			$data['filterPerformacePrevious10Years'] = $nLastTenYearsArr[0]['performanceBefore10Years'];
			$data['filterDates'] = $nLastTenYearsArr[0]['filterDates'];
			$data['filterAverageEvolution10years'] = $nLastTenYearsArr[0]['filterAverageEvolution10years'];
			$data['filterAverageEvolution20years'] = $nLastTenYearsArr[0]['filterAverageEvolution20years'];
			$data['filterAverageEvolutionPrevious10years'] = $nLastTenYearsArr[0]['filterAverageEvolutionPrevious10years'];
			$data['finalnumOfPostiveYears'] = $nLastTenYearsArr[0]['numOfPostiveYears'];
			$data['finalnumOfnegativeYears'] = $nLastTenYearsArr[0]['numOfnegativeYears'];
			$data['finaltotalDays'] = $nLastTenYearsArr[0]['totalDays'];
		}
		else if($checkBefore10Year==1)
		{
			//echo "before 10";
			$data['probability'] = $nBeforeTenYearsArr[0]['probability'];
			$data['filterPerformaceLast10Years'] = $nBeforeTenYearsArr[0]['performanceLast10Years'];
			$data['filterPerformaceLast20Years'] = $nBeforeTenYearsArr[0]['performanceLast20Years'];
			$data['filterPerformacePrevious10Years'] = $nBeforeTenYearsArr[0]['performanceBefore10Years'];
			$data['filterDates'] = $nBeforeTenYearsArr[0]['filterDates'];
			$data['filterAverageEvolution10years'] = $nBeforeTenYearsArr[0]['filterAverageEvolution10years'];
			$data['filterAverageEvolution20years'] = $nBeforeTenYearsArr[0]['filterAverageEvolution20years'];
			$data['filterAverageEvolutionPrevious10years'] = $nBeforeTenYearsArr[0]['filterAverageEvolutionPrevious10years'];
			$data['finalnumOfPostiveYears'] = $nBeforeTenYearsArr[0]['numOfPostiveYears'];
			$data['finalnumOfnegativeYears'] = $nBeforeTenYearsArr[0]['numOfnegativeYears'];
			$data['finaltotalDays'] = $nBeforeTenYearsArr[0]['totalDays'];
		}
		else
		{
			$data['noRecordFound'] = 1;
		}
		//echo "<pre>";print_r($data);die();


		$myConfigSeasonalAnalysisForThreeLines = '{
            "gui":{ 
              "contextMenu":{ 
                "button":{ 
                  "visible": false 
                }
              } 
            },
            "type": "line",
            "utc": true,
            backgroundColor: "white",
            "plotarea": {
                "margin": "dynamic 45 60 dynamic",
            },
            "legend": {
                "layout": "float",
                "background-color": "none",
                "border-width": 0,
                "shadow": 0,
                "align":"center",
                "vertical-align":"bottom",
                "adjust-layout":true,
                "toggle-action": "remove",
                "item":{
                  "padding": 7,
                  "marginRight": 17,
                  "cursor":"hand"
                }
            },
            "scale-x": {
                "labels": ['.$data['filterDates'].'],
            },
            "scale-y": {
                "line-color": "#f6f7f8",
                "shadow": 0,
                "guide": {
                    "line-style": "dashed"
                },
                "label": {
                    "text": "",
                },
                "minor-ticks": 0,
                "thousands-separator": ","
            },
            "crosshair-x": {
                "line-color": "#efefef",
                "plot-label": {
                    "border-radius": "5px",
                    "border-width": "2px",
                    "border-color": "#063853",
                    "padding": "10px",
                    "font-weight": "bold",
                },
                "scale-label": {
                    "font-color": "#fff",
                    "background-color": "#063853",
                    "border-radius": "5px"
                }
            },

            "tooltip": {
                "visible": false
            },
            "plot": {
                tooltip: {
                          text: "%t views: %v%<br>%k%"
                        },
                "highlight":true,
                "shadow": 0,
                "line-width": "2px",
                "marker": {
                    "type": "circle",
                    "size": 3
                },
                "highlight-state": {
                    "line-width":3
                },
                "animation":{
                  "effect":1,
                  "sequence":2,
                  "speed":100,
                }
            },
            series: [
                  {
                    text: "'.$data['last10YeearData'].'",
                    values: ['.$data['filterAverageEvolution10years'].'],
                    legendMarker: {
                      type: "circle",
                      backgroundColor: "#00008b",
                      borderColor: "#00008b",
                      borderWidth: "1px",
                      shadow: false,
                      size: "5px"
                    },
                    "margin-top":"0",
                    lineColor: "#00008b",
                    marker: {
                      backgroundColor: "#00008b",
                      borderColor: "#00008b",
                      borderWidth: "1px",
                      shadow: false
                    }
                  },
                  {
                    text: "'.$data['last20YeearData'].'",
                    values: ['.$data['filterAverageEvolution20years'].'],
                    visible: true,
                    legendMarker: {
                      type: "circle",
                      backgroundColor: "#000000",
                      borderColor: "#000000",
                      borderWidth: "1px",
                      shadow: false,
                      size: "5px"
                    },
                    lineColor: "#000000",
                    marker: {
                      backgroundColor: "#000000",
                      borderColor: "#000000",
                      borderWidth: "1px",
                      shadow: false
                    }
                  },
                  {
                    text: "'.$data['previous10YeearData'].'",
                    values: ['.$data['filterAverageEvolutionPrevious10years'].'],
                    visible: true,
                    legendMarker: {
                      type: "circle",
                      backgroundColor: "green",
                      borderColor: "green",
                      borderWidth: "1px",
                      shadow: false,
                      size: "5px"
                    },
                    lineColor: "green",
                    marker: {
                      backgroundColor: "green",
                      borderColor: "green",
                      borderWidth: "1px",
                      shadow: false
                    }
                  }
                ]
        }';

        // Final Three Lines
        $ararararara['finalGraphZing'] = $myConfigSeasonalAnalysisForThreeLines;
        $ararararara['finalProbability'] = $data['probability'];
        $ararararara['finalFilterPerformaceLast10Years'] = number_format($data['filterPerformaceLast10Years'],2,".","");
        $ararararara['finalFilterPerformaceLast20Years'] = number_format($data['filterPerformaceLast20Years'],2,".","");
        $ararararara['finalFilterPerformacePrevious10Years'] = number_format($data['filterPerformacePrevious10Years'],2,".","");

        $ararararara['startDateFinal'] = trim(explode(',',$data['filterDates'])[0],"'");
        $ararararara['endDateFinal'] = trim(end(explode(',',rtrim($data['filterDates'],","))),"'");

        $ararararara['finalnumOfPostiveYears'] = $data['finalnumOfPostiveYears'];
        $ararararara['finalnumOfnegativeYears'] = $data['finalnumOfnegativeYears'];
        $ararararara['finaltotalDays'] = $data['finaltotalDays'];
        $ararararara['noRecordFound'] = $data['noRecordFound'];
        $ararararara['yearsAvailability'] = 1;

        $ararararara['last20YeearData'] = $data['last20YeearData'];
		$ararararara['last10YeearData'] = $data['last10YeearData'];
		$ararararara['previous10YeearData'] = $data['previous10YeearData'];

		$ararararara['totalNumberOfYearsCalCulation'] = $totalNumberOfYearsCalCulation;
        //echo "<pre>";print_r($ararararara);die();

        echo json_encode($ararararara);
        //$data['myConfigSeasonalAnalysisFinalGraphp'] = $myConfigSeasonalAnalysisFinalGraphp;

	}
	function getNumberOfPostiveYearNegativeYearByVariance($array,$startKey,$endKey,$priceArr=array())
	{
		//echo $startKey."<br>";
		//echo $endKey."<br>";
		//die();
		$startValue = 0;
		$endValue = 0;
		$calculate = 0;
		$startValue = $priceArr[$startKey];
		//echo $startValue."<br>";
		$endValue = $priceArr[$endKey];
		if($startValue==0)
		{
			foreach($priceArr as $key=>$price)
			{
				if($key>$startKey)
				{
					if($price>0)
					{
						$startValue = $price;
						break;
					}
				}
			}
		}
		
		//echo $endValue."<br>";
		//die();
		$calculate = ($endValue-$startValue)/$startValue;
		return $calculate;
	}
	function getNumberOfPostiveYearNegativeYearByVariance_old($array,$startKey,$endKey,$priceArr=array())
	{
		//echo $startKey."---".$endKey;die();
		//echo "<pre>";print_r($array);die();
		$newArr = array();
		foreach($array as $key=>$arr)
		{
			if($key>=$startKey && $key<=$endKey)
			{
				$newArr[] = $arr;
			}
		}
		return array_sum($newArr);
		//echo "<pre>";print_r($newArr);
	}
	function findProfitPerformanceProbability($firstGetArr0,$last20YearRecord=array(),$varianceArr=array(),$numOfYears=0,$totalNumberOfYearsCalCulation=0,$priceArr=array())
	{
		error_reporting(0);
		//echo "<pre>";print_r($priceArr);die();
		$valuesData = '';
		$dateData = '';
		$performance = 0;
		$totalDays = 0;
		$checkRepeatArr = array();
		$indexesArr = array();
		foreach($firstGetArr0 as $k=>$v)
		{
			if(!in_array($v['converted_date'],$checkRepeatArr))
			{
				$checkRepeatArr[] = $v['converted_date'];
				$valuesData.=$v['values'].',';
				$dateData.=$v['usualDate'].',';
				$indexesArr[] = $v['index'];
			}
		}
		//echo "<pre>";print_r($indexesArr);die();
		$startPoint = $firstGetArr0[0]['values'];
		$endPoint = $firstGetArr0[count($firstGetArr0)-1]['values'];
		$performance = ($endPoint)-($startPoint);
		$totalDays =  round(abs($checkRepeatArr[0] - end($checkRepeatArr))/86400);
		//echo $indexesArr[0];die();
		//echo $this->calCulateHorizontalAverage($priceArr,$indexesArr[0],end($indexesArr),5);die;

		if($totalNumberOfYearsCalCulation==20)
		{
			$checkPositiveNegativaArr = array(
									$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearRecord[0],$indexesArr[0],end($indexesArr),$priceArr[1]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearRecord[1],$indexesArr[0],end($indexesArr),$priceArr[2]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearRecord[2],$indexesArr[0],end($indexesArr),$priceArr[3]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearRecord[3],$indexesArr[0],end($indexesArr),$priceArr[4]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearRecord[4],$indexesArr[0],end($indexesArr),$priceArr[5]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearRecord[5],$indexesArr[0],end($indexesArr),$priceArr[6]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearRecord[6],$indexesArr[0],end($indexesArr),$priceArr[7]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearRecord[7],$indexesArr[0],end($indexesArr),$priceArr[8]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearRecord[8],$indexesArr[0],end($indexesArr),$priceArr[9]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearRecord[9],$indexesArr[0],end($indexesArr),$priceArr[10]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearRecord[10],$indexesArr[0],end($indexesArr),$priceArr[11]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearRecord[11],$indexesArr[0],end($indexesArr),$priceArr[12]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearRecord[12],$indexesArr[0],end($indexesArr),$priceArr[13]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearRecord[13],$indexesArr[0],end($indexesArr),$priceArr[14]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearRecord[14],$indexesArr[0],end($indexesArr),$priceArr[15]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearRecord[15],$indexesArr[0],end($indexesArr),$priceArr[16]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearRecord[16],$indexesArr[0],end($indexesArr),$priceArr[17]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearRecord[17],$indexesArr[0],end($indexesArr),$priceArr[18]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearRecord[18],$indexesArr[0],end($indexesArr),$priceArr[19]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearRecord[19],$indexesArr[0],end($indexesArr),$priceArr[20]),
									);
		}
		if($totalNumberOfYearsCalCulation==10)
		{
			$checkPositiveNegativaArr = array(
									$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearRecord[0],$indexesArr[0],end($indexesArr),$priceArr[1]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearRecord[1],$indexesArr[0],end($indexesArr),$priceArr[2]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearRecord[2],$indexesArr[0],end($indexesArr),$priceArr[3]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearRecord[3],$indexesArr[0],end($indexesArr),$priceArr[4]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearRecord[4],$indexesArr[0],end($indexesArr),$priceArr[5]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearRecord[5],$indexesArr[0],end($indexesArr),$priceArr[6]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearRecord[6],$indexesArr[0],end($indexesArr),$priceArr[7]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearRecord[7],$indexesArr[0],end($indexesArr),$priceArr[8]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearRecord[8],$indexesArr[0],end($indexesArr),$priceArr[9]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($last20YearRecord[9],$indexesArr[0],end($indexesArr),$priceArr[10]),
									);
		}
		//echo "<pre>";print_r($checkPositiveNegativaArr);die();
		//for 10 years
		if($numOfYears==1)
		{
			if($totalNumberOfYearsCalCulation==20)
			{
				$performanceArr = array(
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[0],$indexesArr[0],end($indexesArr),$priceArr[1]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[1],$indexesArr[0],end($indexesArr),$priceArr[2]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[2],$indexesArr[0],end($indexesArr),$priceArr[3]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[3],$indexesArr[0],end($indexesArr),$priceArr[4]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[4],$indexesArr[0],end($indexesArr),$priceArr[5]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[5],$indexesArr[0],end($indexesArr),$priceArr[6]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[6],$indexesArr[0],end($indexesArr),$priceArr[7]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[7],$indexesArr[0],end($indexesArr),$priceArr[8]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[8],$indexesArr[0],end($indexesArr),$priceArr[9]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[9],$indexesArr[0],end($indexesArr),$priceArr[10]),
									);
				$performance = array_sum($performanceArr)/10;
				$performance = $this->calCulateHorizontalAverage($priceArr,$indexesArr[0],end($indexesArr),10);
			}

			if($totalNumberOfYearsCalCulation==10)
			{
				$performanceArr = array(
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[0],$indexesArr[0],end($indexesArr),$priceArr[1]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[1],$indexesArr[0],end($indexesArr),$priceArr[2]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[2],$indexesArr[0],end($indexesArr),$priceArr[3]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[3],$indexesArr[0],end($indexesArr),$priceArr[4]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[4],$indexesArr[0],end($indexesArr),$priceArr[5]),
									);
				$performance = array_sum($performanceArr)/5;
				$performance = $this->calCulateHorizontalAverage($priceArr,$indexesArr[0],end($indexesArr),5);
			}
			
		}
		// for last 20 years
		else if($numOfYears==2)
		{
			if($totalNumberOfYearsCalCulation==20)
			{
				$performanceArr = array(
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[0],$indexesArr[0],end($indexesArr),$priceArr[1]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[1],$indexesArr[0],end($indexesArr),$priceArr[2]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[2],$indexesArr[0],end($indexesArr),$priceArr[3]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[3],$indexesArr[0],end($indexesArr),$priceArr[4]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[4],$indexesArr[0],end($indexesArr),$priceArr[5]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[5],$indexesArr[0],end($indexesArr),$priceArr[6]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[6],$indexesArr[0],end($indexesArr),$priceArr[7]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[7],$indexesArr[0],end($indexesArr),$priceArr[8]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[8],$indexesArr[0],end($indexesArr),$priceArr[9]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[9],$indexesArr[0],end($indexesArr),$priceArr[10]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[10],$indexesArr[0],end($indexesArr),$priceArr[11]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[11],$indexesArr[0],end($indexesArr),$priceArr[12]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[12],$indexesArr[0],end($indexesArr),$priceArr[13]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[13],$indexesArr[0],end($indexesArr),$priceArr[14]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[14],$indexesArr[0],end($indexesArr),$priceArr[15]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[15],$indexesArr[0],end($indexesArr),$priceArr[16]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[16],$indexesArr[0],end($indexesArr),$priceArr[17]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[17],$indexesArr[0],end($indexesArr),$priceArr[18]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[18],$indexesArr[0],end($indexesArr),$priceArr[19]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[19],$indexesArr[0],end($indexesArr),$priceArr[20]),
									);
				$performance = array_sum($performanceArr)/20;
				$performance = $this->calCulateHorizontalAverage($priceArr,$indexesArr[0],end($indexesArr),20);
			}
			if($totalNumberOfYearsCalCulation==10)
			{
				$performanceArr = array(
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[0],$indexesArr[0],end($indexesArr),$priceArr[1]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[1],$indexesArr[0],end($indexesArr),$priceArr[2]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[2],$indexesArr[0],end($indexesArr),$priceArr[3]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[3],$indexesArr[0],end($indexesArr),$priceArr[4]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[4],$indexesArr[0],end($indexesArr),$priceArr[5]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[5],$indexesArr[0],end($indexesArr),$priceArr[6]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[6],$indexesArr[0],end($indexesArr),$priceArr[7]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[7],$indexesArr[0],end($indexesArr),$priceArr[8]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[8],$indexesArr[0],end($indexesArr),$priceArr[9]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[9],$indexesArr[0],end($indexesArr),$priceArr[10]),
									);
				$performance = array_sum($performanceArr)/10;
				$performance = $this->calCulateHorizontalAverage($priceArr,$indexesArr[0],end($indexesArr),10);
			}

			
		}
		else if($numOfYears==3)
		{
			//echo $indexesArr[0];die();
			if($totalNumberOfYearsCalCulation==20)
			{
				$performanceArr = array(
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[0],$indexesArr[0],end($indexesArr),$priceArr[1]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[1],$indexesArr[0],end($indexesArr),$priceArr[2]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[2],$indexesArr[0],end($indexesArr),$priceArr[3]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[3],$indexesArr[0],end($indexesArr),$priceArr[4]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[4],$indexesArr[0],end($indexesArr),$priceArr[5]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[5],$indexesArr[0],end($indexesArr),$priceArr[6]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[6],$indexesArr[0],end($indexesArr),$priceArr[7]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[7],$indexesArr[0],end($indexesArr),$priceArr[8]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[8],$indexesArr[0],end($indexesArr),$priceArr[9]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[9],$indexesArr[0],end($indexesArr),$priceArr[10]),
									);
				$performance = array_sum($performanceArr)/10;
				$performance = $this->calCulateHorizontalAverage($priceArr,$indexesArr[0],end($indexesArr),10);
			}
			if($totalNumberOfYearsCalCulation==10)
			{
				$performanceArr = array(
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[0],$indexesArr[0],end($indexesArr),$priceArr[1]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[1],$indexesArr[0],end($indexesArr),$priceArr[2]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[2],$indexesArr[0],end($indexesArr),$priceArr[3]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[3],$indexesArr[0],end($indexesArr),$priceArr[4]),
									$this->getNumberOfPostiveYearNegativeYearByVariance($varianceArr[4],$indexesArr[0],end($indexesArr),$priceArr[5]),
									);
				$performance = array_sum($performanceArr)/5;
				$performance = $this->calCulateHorizontalAverage($priceArr,$indexesArr[0],end($indexesArr),5);

			}

			
		}
		//echo $performance*100;die();
		$numOfPostiveYears = 0;
		$numOfnegativeYears = 0;
		$numberOfZero = 0;
		foreach($checkPositiveNegativaArr as $pos)
		{
			if($pos>0)
			{
				$numOfPostiveYears++;
			}
			else if($pos==0)
			{
				$numberOfZero++;
			}
			else
			{
				$numOfnegativeYears++;
			}
		}
		//echo $numOfPostiveYears."===".$numOfnegativeYears."===".$numberOfZero;die();
		$arrays = array();
		$arrays['val'] = $valuesData;
		$arrays['dts'] = $dateData;
		$arrays['numOfPostiveYears'] = $numOfPostiveYears;
		$arrays['numOfnegativeYears'] = $numOfnegativeYears;
		$arrays['performance'] = ($performance);
		$arrays['totalDays'] = $totalDays;
		if($totalNumberOfYearsCalCulation>0)
		{
			$arrays['probability'] = ($numOfPostiveYears/$totalNumberOfYearsCalCulation)*100;
		}
		else
		{
			$arrays['probability'] = 0;
		}
		
		//echo "<pre>";print_r($arrays);die;
		return $arrays;
		//echo "<pre>";print_r($numOfPostiveYears);
		//echo "<pre>";print_r($arrays);die;
	}
	function getFinalSeaionalDataRecord($mergeArr1,$withoutFilter1,$getOnePlace0,$index)
	{
		$mergeArr1 = $this->removeExistingDate($mergeArr,$getOnePlace0[0]['converted_date'],$getOnePlace0[count($getOnePlace0)-1]['converted_date']);
		$withoutFilter1 = $this->removeExistingDate($withoutFilter,$getOnePlace0[0]['converted_date'],$getOnePlace0[count($getOnePlace0)-1]['converted_date']);

		$getOnePlace1 = $this->getLastYearRecordCalculations(1,$mergeArr1,$withoutFilter1);
		return $getOnePlace1;
	}
	function removeExistingDate($mergeArr1,$startDate,$endDate)
	{
		$mergeArr2 = array();
		foreach($mergeArr1 as $keys=>$valuse)
		{
			if(trim($valuse['converted_date'])>=trim($startDate)&&trim($endDate)>=(trim($valuse['converted_date'])))
			{
				//unset($mergeArr[$keys]);
			}
			else
			{
				$mergeArr2[] = $mergeArr1[$keys];
			}
		}
		return $mergeArr2;
	}
	function sortingDateValues($a, $b)
    {
        if ($a["values"] == $b["values"]) 
        {  
            return 0;
        }
        return ($a["values"] < $b["values"]) ? -1 : 1; 
    }
	function filterSeasionalAnalysisByStartEndDate()
	{
		//new code from 16 June 2021
		error_reporting(0);
		if (base64_encode(base64_encode(base64_decode(base64_decode($this->input->post('stock_id'))))) ===$this->input->post('stock_id'))
        {
		    $actual_stock_id=base64_decode(base64_decode($this->input->post('stock_id')));
		}
		else 
		{
		    $actual_stock_id=$this->input->post('stock_id');
		}
		$startDate = $this->input->post('startDate');
		$endDate = $this->input->post('endDate');
		$the_big_array = $this->chart_model->getSeasionalAllRecord($actual_stock_id);
		//$the_big_array = array_reverse($the_big_array);
		//echo "<pre>";print_r($the_big_array);die;
		$dateRange = $this->chart_model->printSeasionalAnalysisdate(date('Y').'-01-01', date('Y').'-12-31','d-m');
		//echo "<pre>";print_r($dateRange);die;
		foreach($this->chart_model->printSeasionalAnalysisdate(date('Y').'-03-16', date('Y').'-04-03','d-M') as $xl)
		{
			$xdata[] = "'".$xl."'";
		}
		/*Last 10 Years*/
		$last10YearsStartYear = date("Y",strtotime($the_big_array[0]['actual_date']."-11 year"));
		$last10YearsEndYear =  $the_big_array[0]['year'];
		//echo $last10YearsStartYear."--".$last10YearsEndYear."<br>";
		//die;
		/*Last 20 Years*/
		$Last20YearsStartYear =  date("Y",strtotime($the_big_array[0]['actual_date']."-21 year"));
		$last20YearsEndYear =  $the_big_array[0]['year'];
		/*previous 10 Years*/
		$before10YearsStartYear = $Last20YearsStartYear+1;
		$before10YearsEndYear = $last10YearsStartYear+1;

		$data['media_last10years'] = ($last10YearsStartYear+2)."-".$last10YearsEndYear;
		$data['media_last20years'] = ($Last20YearsStartYear+2)."-".$last20YearsEndYear;
		$data['media_previous10years'] = ($before10YearsStartYear+1)."-".$before10YearsEndYear;
		$data['durations'] = $endDate-$startDate;

		$dts=[];
		$vlu=[];
		$last20YearsDates = array();
		$last20YearsValue = array();
		$before10YearsDates = array();
		$before10YearsValue = array();
		foreach($the_big_array as $val)
		{
			if(($last10YearsEndYear>=$val['year']) && (($last10YearsStartYear+1)<=$val['year']))
			{
				$dts[]=$val['search_date_all'];
				$vlu[]=str_replace(",","",$val['price']);
			}
			if(($last20YearsEndYear>=$val['year']) && (($Last20YearsStartYear+1)<=$val['year']))
			{	
				$last20YearsDates[]=$val['search_date_all'];
				$last20YearsValue[]=str_replace(",","",$val['price']);
			}
			if(($before10YearsEndYear>=$val['year']) && (($before10YearsStartYear+1)<=$val['year']))
			{	
				$before10YearsDates[]=$val['search_date_all'];
				$before10YearsValue[]=str_replace(",","",$val['price']);
			}
		}
		//echo "<pre>";print_r($dts);die;
		$daterange = $this->getYearsBetweenDate($last10YearsStartYear+1,$last10YearsEndYear);
		//echo "<pre>";print_r($daterange);die;
		$last10YearsAllDatesVal = $this->getAllDatesAndvaluesSeasionalAnalysis($daterange,$dts,$vlu);
		//echo "<pre>";print_r($last10YearsAllDatesVal);die;
		$last10YearRecord = array();
		$c=0;
		foreach($last10YearsAllDatesVal as $key=>$ddd)
		{
			foreach($last10YearsAllDatesVal[$key] as $var)
			{
				$last10YearRecord[$c][] = $var;	
			}
			$c++;
		}
		$array1 = array_reverse($last10YearRecord[0]); // 31 Dec
		$array2 = array_reverse($last10YearRecord[1]);
		$array3 = array_reverse($last10YearRecord[2]);		
		$array4 = array_reverse($last10YearRecord[3]);
		$array5 = array_reverse($last10YearRecord[4]);
		$array6 = array_reverse($last10YearRecord[5]);
		$array7 = array_reverse($last10YearRecord[6]);
		$array8 = array_reverse($last10YearRecord[7]);
		$array9 = array_reverse($last10YearRecord[8]);
		$array10 = array_reverse($last10YearRecord[9]);
		$array11 = array_reverse($last10YearRecord[10]);
				
		$variance1 = $this->getVariance($array1);
		
		$variance2 = $this->getVariance($array2);
		$variance3 = $this->getVariance($array3);
		$variance4 = $this->getVariance($array4);
		$variance5 = $this->getVariance($array5);
		$variance6 = $this->getVariance($array6);
		$variance7 = $this->getVariance($array7);
		$variance8 = $this->getVariance($array8);
		$variance9 = $this->getVariance($array9);
		$variance10 = $this->getVariance($array10);
		$variance11 = $this->getVariance($array11);
		/*$neg = array_filter($variance11, function($x) {
		    return $x < 0;
		});*/
		
		$averageOfLast10Years = array();
		for($av=0;$av<=365;$av++)
		{
			$variandddd = ($variance2[$av]+$variance3[$av]+$variance4[$av]+$variance5[$av]+$variance6[$av]+$variance7[$av]+$variance8[$av]+$variance9[$av]+$variance10[$av]+$variance11[$av])/10; 
			$variandddd = number_format(($variandddd*100),2,".","");
			$averageOfLast10Years[] = $variandddd;
		}
		$last10YearsEvolutions = array();
		$lastEvolutions = 0;
		foreach(array_reverse($averageOfLast10Years) as $ev=>$evolution) //  1 Jan
		{
			if($ev==0)
			{
				$last10YearsEvolutions[] = number_format($evolution,2,".","");
			}
			else
			{
				$last10YearsEvolutions[] = number_format(($evolution+$lastEvolutions),2,".",""); 
				$lastEvolutions = $evolution+$lastEvolutions;
			}
		}
		//echo "<pre>";print_r($last10YearsEvolutions);
		$filterAverageEvolution10years = array();
		foreach($last10YearsEvolutions as $kkk=>$vvvv)
		{
			if($kkk>=$startDate && $kkk<=$endDate)
			{
				$filterAverageEvolution10years[] = $vvvv;
			}
		}

		$performanceLast10Years = 0;
		if(end($filterAverageEvolution10years)>$filterAverageEvolution10years[0])
		{
			$performanceLast10Years = end($filterAverageEvolution10years)-$filterAverageEvolution10years[0];
		}
		else
		{
			$performanceLast10Years = end($filterAverageEvolution10years)-$filterAverageEvolution10years[0];
		}
		$data['performanceLast10Years'] = number_format($performanceLast10Years,2,".","");
		//$data['performanceLast10Years'] = number_format(array_sum($filterAverageEvolution10years)/count($filterAverageEvolution10years),2,".","");
		//echo "<pre>";print_r($filterAverageEvolution10years);die;
		/* 
			Last 20 Years Calculations Starts 
		*/
		$daterangeLast20Years = $this->getYearsBetweenDate($Last20YearsStartYear+1,$last20YearsEndYear);
		$last20YearsAllDatesVal = $this->getAllDatesAndvaluesSeasionalAnalysis($daterangeLast20Years,$last20YearsDates,$last20YearsValue);
		//echo "<pre>";print_r($last20YearsAllDatesVal);die;
		$last20YearRecord = array();
		$d=0;
		foreach($last20YearsAllDatesVal as $key=>$ddd)
		{
			foreach($last20YearsAllDatesVal[$key] as $var)
			{
				$last20YearRecord[$d][] = $var;	
			}
			$d++;
		}

		$checkPositiveNegativaArr = array(
										$this->getCountNegativePositiveDays($last20YearRecord[1],$startDate,$endDate),
										$this->getCountNegativePositiveDays($last20YearRecord[2],$startDate,$endDate),
										$this->getCountNegativePositiveDays($last20YearRecord[3],$startDate,$endDate),
										$this->getCountNegativePositiveDays($last20YearRecord[4],$startDate,$endDate),
										$this->getCountNegativePositiveDays($last20YearRecord[5],$startDate,$endDate),
										$this->getCountNegativePositiveDays($last20YearRecord[6],$startDate,$endDate),
										$this->getCountNegativePositiveDays($last20YearRecord[7],$startDate,$endDate),
										$this->getCountNegativePositiveDays($last20YearRecord[8],$startDate,$endDate),
										$this->getCountNegativePositiveDays($last20YearRecord[9],$startDate,$endDate),
										$this->getCountNegativePositiveDays($last20YearRecord[10],$startDate,$endDate),
										$this->getCountNegativePositiveDays($last20YearRecord[11],$startDate,$endDate),
										$this->getCountNegativePositiveDays($last20YearRecord[12],$startDate,$endDate),
										$this->getCountNegativePositiveDays($last20YearRecord[13],$startDate,$endDate),
										$this->getCountNegativePositiveDays($last20YearRecord[14],$startDate,$endDate),
										$this->getCountNegativePositiveDays($last20YearRecord[15],$startDate,$endDate),
										$this->getCountNegativePositiveDays($last20YearRecord[16],$startDate,$endDate),
										$this->getCountNegativePositiveDays($last20YearRecord[17],$startDate,$endDate),
										$this->getCountNegativePositiveDays($last20YearRecord[18],$startDate,$endDate),
										$this->getCountNegativePositiveDays($last20YearRecord[19],$startDate,$endDate),
										$this->getCountNegativePositiveDays($last20YearRecord[20],$startDate,$endDate),
										);
		$numOfPostiveYears = 0;
		$numOfnegativeYears = 0;
		foreach($checkPositiveNegativaArr as $pos)
		{
			if($pos==1)
			{
				$numOfPostiveYears++;
			}
			else
			{
				$numOfnegativeYears++;
			}
		}
		//echo "<pre>";print_r($last20YearRecord);die;
		$Last20Yearsarray1 = array_reverse($last20YearRecord[0]);// 31 Dec
		$Last20Yearsarray2 = array_reverse($last20YearRecord[1]);// 31 Dec
		$Last20Yearsarray3 = array_reverse($last20YearRecord[2]);
		$Last20Yearsarray4 = array_reverse($last20YearRecord[3]);
		$Last20Yearsarray5 = array_reverse($last20YearRecord[4]);
		$Last20Yearsarray6 = array_reverse($last20YearRecord[5]);
		$Last20Yearsarray7 = array_reverse($last20YearRecord[6]);
		$Last20Yearsarray8 = array_reverse($last20YearRecord[7]);
		$Last20Yearsarray9 = array_reverse($last20YearRecord[8]);
		$Last20Yearsarray10 = array_reverse($last20YearRecord[9]);
		$Last20Yearsarray11 = array_reverse($last20YearRecord[10]);
		$Last20Yearsarray12 = array_reverse($last20YearRecord[11]);
		$Last20Yearsarray13 = array_reverse($last20YearRecord[12]);
		$Last20Yearsarray14 = array_reverse($last20YearRecord[13]);
		$Last20Yearsarray15 = array_reverse($last20YearRecord[14]);
		$Last20Yearsarray16 = array_reverse($last20YearRecord[15]);
		$Last20Yearsarray17 = array_reverse($last20YearRecord[16]);
		$Last20Yearsarray18 = array_reverse($last20YearRecord[17]);
		$Last20Yearsarray19 = array_reverse($last20YearRecord[18]);
		$Last20Yearsarray20 = array_reverse($last20YearRecord[19]);
		$Last20Yearsarray21 = array_reverse($last20YearRecord[20]);
				
		$Last20YearsVariance1 = $this->getVariance($Last20Yearsarray1);
		$Last20YearsVariance2 = $this->getVariance($Last20Yearsarray2);
		$Last20YearsVariance3 = $this->getVariance($Last20Yearsarray3);
		$Last20YearsVariance4 = $this->getVariance($Last20Yearsarray4);
		$Last20YearsVariance5 = $this->getVariance($Last20Yearsarray5);
		$Last20YearsVariance6 = $this->getVariance($Last20Yearsarray6);
		$Last20YearsVariance7 = $this->getVariance($Last20Yearsarray7);
		$Last20YearsVariance8 = $this->getVariance($Last20Yearsarray8);
		$Last20YearsVariance9 = $this->getVariance($Last20Yearsarray9);
		$Last20YearsVariance10 = $this->getVariance($Last20Yearsarray10);
		$Last20YearsVariance11 = $this->getVariance($Last20Yearsarray11);
		$Last20YearsVariance12 = $this->getVariance($Last20Yearsarray12);
		$Last20YearsVariance13 = $this->getVariance($Last20Yearsarray13);
		$Last20YearsVariance14 = $this->getVariance($Last20Yearsarray14);
		$Last20YearsVariance15 = $this->getVariance($Last20Yearsarray15);
		$Last20YearsVariance16 = $this->getVariance($Last20Yearsarray16);
		$Last20YearsVariance17 = $this->getVariance($Last20Yearsarray17);
		$Last20YearsVariance18 = $this->getVariance($Last20Yearsarray18);
		$Last20YearsVariance19 = $this->getVariance($Last20Yearsarray19);
		$Last20YearsVariance20 = $this->getVariance($Last20Yearsarray20);
		$Last20YearsVariance21 = $this->getVariance($Last20Yearsarray21);

		$negativePositiveTotalCount1 = $this->getCountNegativeRecord($Last20YearsVariance2,$startDate,$endDate);
		$negativePositiveTotalCount2 = $this->getCountNegativeRecord($Last20YearsVariance3,$startDate,$endDate);
		$negativePositiveTotalCount3 = $this->getCountNegativeRecord($Last20YearsVariance4,$startDate,$endDate);
		$negativePositiveTotalCount4 = $this->getCountNegativeRecord($Last20YearsVariance5,$startDate,$endDate);
		$negativePositiveTotalCount5 = $this->getCountNegativeRecord($Last20YearsVariance6,$startDate,$endDate);
		$negativePositiveTotalCount6 = $this->getCountNegativeRecord($Last20YearsVariance7,$startDate,$endDate);
		$negativePositiveTotalCount7 = $this->getCountNegativeRecord($Last20YearsVariance8,$startDate,$endDate);
		$negativePositiveTotalCount8 = $this->getCountNegativeRecord($Last20YearsVariance9,$startDate,$endDate);
		$negativePositiveTotalCount9 = $this->getCountNegativeRecord($Last20YearsVariance10,$startDate,$endDate);
		$negativePositiveTotalCount10 = $this->getCountNegativeRecord($Last20YearsVariance11,$startDate,$endDate);
		$negativePositiveTotalCount11 = $this->getCountNegativeRecord($Last20YearsVariance12,$startDate,$endDate);
		$negativePositiveTotalCount12 = $this->getCountNegativeRecord($Last20YearsVariance13,$startDate,$endDate);
		$negativePositiveTotalCount13 = $this->getCountNegativeRecord($Last20YearsVariance14,$startDate,$endDate);
		$negativePositiveTotalCount14 = $this->getCountNegativeRecord($Last20YearsVariance15,$startDate,$endDate);
		$negativePositiveTotalCount15 = $this->getCountNegativeRecord($Last20YearsVariance16,$startDate,$endDate);
		$negativePositiveTotalCount16 = $this->getCountNegativeRecord($Last20YearsVariance17,$startDate,$endDate);
		$negativePositiveTotalCount17 = $this->getCountNegativeRecord($Last20YearsVariance18,$startDate,$endDate);
		$negativePositiveTotalCount18 = $this->getCountNegativeRecord($Last20YearsVariance19,$startDate,$endDate);
		$negativePositiveTotalCount19 = $this->getCountNegativeRecord($Last20YearsVariance20,$startDate,$endDate);
		$negativePositiveTotalCount20 = $this->getCountNegativeRecord($Last20YearsVariance21,$startDate,$endDate);
		
		//echo "<pre>";print_r($negativePositiveTotalCount20);die;
		$numberOfTotalDays = 0;
		$numberOfPositiveDays = 0;
		$numberOfNegativeDays = 0;


		$numberOfTotalDays = $negativePositiveTotalCount1['totalDaysCount']+$negativePositiveTotalCount2['totalDaysCount']+$negativePositiveTotalCount3['totalDaysCount']+$negativePositiveTotalCount4['totalDaysCount']+$negativePositiveTotalCount5['totalDaysCount']+$negativePositiveTotalCount6['totalDaysCount']+$negativePositiveTotalCount7['totalDaysCount']+$negativePositiveTotalCount8['totalDaysCount']+$negativePositiveTotalCount9['totalDaysCount']+$negativePositiveTotalCount10['totalDaysCount']+$negativePositiveTotalCount11['totalDaysCount']+$negativePositiveTotalCount12['totalDaysCount']+$negativePositiveTotalCount13['totalDaysCount']+$negativePositiveTotalCount14['totalDaysCount']+$negativePositiveTotalCount15['totalDaysCount']+$negativePositiveTotalCount16['totalDaysCount']+$negativePositiveTotalCount17['totalDaysCount']+$negativePositiveTotalCount18['totalDaysCount']+$negativePositiveTotalCount19['totalDaysCount']+$negativePositiveTotalCount20['totalDaysCount'];

		$numberOfPositiveDays = $negativePositiveTotalCount1['positiveDaysCount']+$negativePositiveTotalCount2['positiveDaysCount']+$negativePositiveTotalCount3['positiveDaysCount']+$negativePositiveTotalCount4['positiveDaysCount']+$negativePositiveTotalCount5['positiveDaysCount']+$negativePositiveTotalCount6['positiveDaysCount']+$negativePositiveTotalCount7['positiveDaysCount']+$negativePositiveTotalCount8['positiveDaysCount']+$negativePositiveTotalCount9['positiveDaysCount']+$negativePositiveTotalCount10['positiveDaysCount']+$negativePositiveTotalCount11['positiveDaysCount']+$negativePositiveTotalCount12['positiveDaysCount']+$negativePositiveTotalCount13['positiveDaysCount']+$negativePositiveTotalCount14['positiveDaysCount']+$negativePositiveTotalCount15['positiveDaysCount']+$negativePositiveTotalCount16['positiveDaysCount']+$negativePositiveTotalCount17['positiveDaysCount']+$negativePositiveTotalCount18['positiveDaysCount']+$negativePositiveTotalCount19['positiveDaysCount']+$negativePositiveTotalCount20['positiveDaysCount'];

		$numberOfNegativeDays = $negativePositiveTotalCount1['negativeDaysCount']+$negativePositiveTotalCount2['negativeDaysCount']+$negativePositiveTotalCount3['negativeDaysCount']+$negativePositiveTotalCount4['negativeDaysCount']+$negativePositiveTotalCount5['negativeDaysCount']+$negativePositiveTotalCount6['negativeDaysCount']+$negativePositiveTotalCount7['negativeDaysCount']+$negativePositiveTotalCount8['negativeDaysCount']+$negativePositiveTotalCount9['negativeDaysCount']+$negativePositiveTotalCount10['negativeDaysCount']+$negativePositiveTotalCount11['negativeDaysCount']+$negativePositiveTotalCount12['negativeDaysCount']+$negativePositiveTotalCount13['negativeDaysCount']+$negativePositiveTotalCount14['negativeDaysCount']+$negativePositiveTotalCount15['negativeDaysCount']+$negativePositiveTotalCount16['negativeDaysCount']+$negativePositiveTotalCount17['negativeDaysCount']+$negativePositiveTotalCount18['negativeDaysCount']+$negativePositiveTotalCount19['negativeDaysCount']+$negativePositiveTotalCount20['negativeDaysCount'];

		//echo $numberOfTotalDays."--".$numberOfPositiveDays."--".$numberOfNegativeDays;die;

		//echo "<pre>";print_r($variance10);die;
		$averageOfLast20Years = array();
		for($av=0;$av<=365;$av++)
		{
			$variandddd = ($Last20YearsVariance2[$av]+$Last20YearsVariance3[$av]+$Last20YearsVariance4[$av]+$Last20YearsVariance5[$av]+$Last20YearsVariance6[$av]+$Last20YearsVariance7[$av]+$Last20YearsVariance8[$av]+$Last20YearsVariance9[$av]+$Last20YearsVariance10[$av]+$Last20YearsVariance11[$av]+$Last20YearsVariance12[$av]+$Last20YearsVariance13[$av]+$Last20YearsVariance14[$av]+$Last20YearsVariance15[$av]+$Last20YearsVariance16[$av]+$Last20YearsVariance17[$av]+$Last20YearsVariance18[$av]+$Last20YearsVariance19[$av]+$Last20YearsVariance20[$av]+$Last20YearsVariance21[$av])/20; 
			$variandddd = number_format(($variandddd*100),2,".","");
			$averageOfLast20Years[] = $variandddd;
		}
		//echo "<pre>";print_r($averageOfLast20Years);die;
		$last20YearsEvolutions = array();
		$lastEvolutions1 = 0;
		foreach(array_reverse($averageOfLast20Years) as $ev=>$evolution) //  1 Jan
		{
			//echo $evolution."<br>";
			if($ev==0)
			{
				$last20YearsEvolutions[] = number_format(0,2,".","");
			}
			else
			{
				$last20YearsEvolutions[] = number_format(($evolution+$lastEvolutions1),2,".",""); 
				$lastEvolutions1 = $evolution+$lastEvolutions1;
			}
		}

		$filterAverageEvolution20years = array();
		foreach($last20YearsEvolutions as $kkk=>$vvvv)
		{
			if($kkk>=$startDate && $kkk<=$endDate)
			{
				$filterAverageEvolution20years[] = $vvvv;
			}
		}
		$performanceLast20Years = 0;
		if(end($filterAverageEvolution20years)>$filterAverageEvolution20years[0])
		{
			$performanceLast20Years = end($filterAverageEvolution20years)-$filterAverageEvolution20years[0];
		}
		else
		{
			$performanceLast20Years = end($filterAverageEvolution20years)-$filterAverageEvolution20years[0];
		}
		$data['performanceLast20Years'] = number_format($performanceLast20Years,2,".","");
		//$data['performanceLast20Years'] = number_format(array_sum($filterAverageEvolution20years)/count($filterAverageEvolution20years),2,".","");
		//echo "<pre>last20YearsEvolutions";print_r($filterAverageEvolution20years);die;
		/* 
			Last 20 Years Calculations End 
		*/

		/* Previous 10 Years Calculation Starts  */

		$daterangePrevious10Years = $this->getYearsBetweenDate($before10YearsStartYear,$before10YearsEndYear);
		$previous10YearsAllDatesVal = $this->getAllDatesAndvaluesSeasionalAnalysis($daterangePrevious10Years,$before10YearsDates,$before10YearsValue);
		//echo "<pre>previous 10 years";print_r($previous10YearsAllDatesVal);die;
		$previous10YearRecord = array();
		$e=0;
		foreach($previous10YearsAllDatesVal as $key=>$ddd)
		{
			foreach($previous10YearsAllDatesVal[$key] as $var)
			{
				$previous10YearRecord[$e][] = $var;	
			}
			$e++;
		}
		//echo "<pre>dddd";print_r($previous10YearRecord);die;
		$previous10Yearsarray1 = array_reverse($previous10YearRecord[0]); // 31 Dec
		$previous10Yearsarray2 = array_reverse($previous10YearRecord[1]);
		$previous10Yearsarray3 = array_reverse($previous10YearRecord[2]);
		$previous10Yearsarray4 = array_reverse($previous10YearRecord[3]);
		$previous10Yearsarray5 = array_reverse($previous10YearRecord[4]);
		$previous10Yearsarray6 = array_reverse($previous10YearRecord[5]);
		$previous10Yearsarray7 = array_reverse($previous10YearRecord[6]);
		$previous10Yearsarray8 = array_reverse($previous10YearRecord[7]);
		$previous10Yearsarray9 = array_reverse($previous10YearRecord[8]);
		$previous10Yearsarray10 = array_reverse($previous10YearRecord[9]);
		$previous10Yearsarray11 = array_reverse($previous10YearRecord[10]);
				
		$previous10YearsVariance1 = $this->getVariance($previous10Yearsarray1);
		$previous10YearsVariance2 = $this->getVariance($previous10Yearsarray2);
		$previous10YearsVariance3 = $this->getVariance($previous10Yearsarray3);
		$previous10YearsVariance4 = $this->getVariance($previous10Yearsarray4);
		$previous10YearsVariance5 = $this->getVariance($previous10Yearsarray5);
		$previous10YearsVariance6 = $this->getVariance($previous10Yearsarray6);
		$previous10YearsVariance7 = $this->getVariance($previous10Yearsarray7);
		$previous10YearsVariance8 = $this->getVariance($previous10Yearsarray8);
		$previous10YearsVariance9 = $this->getVariance($previous10Yearsarray9);
		$previous10YearsVariance10 = $this->getVariance($previous10Yearsarray10);
		$previous10YearsVariance11 = $this->getVariance($previous10Yearsarray11);
		
		$averageOfPrevious10Years = array();
		for($av=0;$av<=365;$av++)
		{
			$variandddd = ($previous10YearsVariance2[$av]+$previous10YearsVariance3[$av]+$previous10YearsVariance4[$av]+$previous10YearsVariance5[$av]+$previous10YearsVariance6[$av]+$previous10YearsVariance7[$av]+$previous10YearsVariance8[$av]+$previous10YearsVariance9[$av]+$previous10YearsVariance10[$av]+$previous10YearsVariance11[$av])/10; 
			$variandddd = number_format(($variandddd*100),2,".","");
			$averageOfPrevious10Years[] = $variandddd;
		}
		//echo "<pre>pre average";print_r($averageOfPrevious10Years);die;
		$previous10YearsEvolutions = array();
		$lastEvolutions2 = 0;
		foreach(array_reverse($averageOfPrevious10Years) as $ev=>$evolution) //  1 Jan
		{
			if($ev==0)
			{
				$previous10YearsEvolutions[] = number_format(0,2,".","");
			}
			else
			{
				$previous10YearsEvolutions[] = number_format(($evolution+$lastEvolutions2),2,".",""); 
				$lastEvolutions2 = $evolution+$lastEvolutions2;
			}
		}
		$filterAverageEvolutionPrevious10years = array();
		foreach($previous10YearsEvolutions as $kkk=>$vvvv)
		{
			if($kkk>=$startDate && $kkk<=$endDate)
			{
				$filterAverageEvolutionPrevious10years[] = $vvvv;
			}
		}

		$performanceBefore10Years = 0;
		if(end($filterAverageEvolutionPrevious10years)>$filterAverageEvolutionPrevious10years[0])
		{
			$performanceBefore10Years = end($filterAverageEvolutionPrevious10years)-$filterAverageEvolutionPrevious10years[0];
		}
		else
		{
			$performanceBefore10Years = end($filterAverageEvolutionPrevious10years)-$filterAverageEvolutionPrevious10years[0];
		}
		$data['performanceBefore10Years'] = number_format($performanceBefore10Years,2,".","");
		//$data['performanceBefore10Years'] = number_format(array_sum( $filterAverageEvolutionPrevious10years) / count( $filterAverageEvolutionPrevious10years),2,".",""); 
		//echo "<pre>previous10YearsEvolutions";print_r($filterAverageEvolutionPrevious10years);die;
		/* Previous 10 Years Calculation End  */

		$beginLabel = new DateTime( '2016-01-01' );
		$endLabel = (new DateTime( '2016-12-31' ))->modify( '+1 day' );
		$intervalLabel = new DateInterval('P1D');
		$labelRange = new DatePeriod($beginLabel, $intervalLabel ,$endLabel);
		$xRangeLabel = array();
		foreach($labelRange as $range)
		{
			$xRangeLabel[] = "'".$range->format('d-M')."'";
		}
		
		//$data['xRangeLabel'] = $xRangeLabel;
		$filterDates = array();
		foreach($xRangeLabel as $kdate=>$dvl)
		{
			if($kdate>=$startDate && $kdate<=$endDate)
			{
				$filterDates[] = $dvl;
			}
			 
		}
		//echo "<pre>";print_r($filterDates);die;
		//$data['xLabel'] = implode(',', $xRangeLabel);
		//$data['last10Years'] = implode(',', array_reverse($averageOfLast10Years));
		//$data['last20Years'] = implode(',', array_reverse($averageOfLast20Years));
		//$data['previous10Years'] = implode(',', array_reverse($averageOfPrevious10Years));
		//$data['performanceLast10Years'] = $found_item['profit'];

		/*filter records*/
		$data['filterDates'] = implode(',',$filterDates);
		$data['filterAverageEvolution10years'] = implode(',',$filterAverageEvolution10years);
		$data['filterAverageEvolution20years'] = implode(',',$filterAverageEvolution20years);
		$data['filterAverageEvolutionPrevious10years'] = implode(',',$filterAverageEvolutionPrevious10years);

		/*$data['numberOfTotalDays'] = $numberOfTotalDays;
		$data['numberOfPositiveDays'] = $numberOfPositiveDays;
		$data['numberOfNegativeDays'] = $numberOfNegativeDays;
		$data['probabalityli'] = number_format(($numberOfPositiveDays/$numberOfTotalDays)*100,2,'.','');*/
		$data['numberOfTotalDays'] = 20;
		$data['numberOfPositiveDays'] = $numOfPostiveYears;
		$data['numberOfNegativeDays'] = $numOfnegativeYears;
		$data['probabalityli'] = number_format(($numOfPostiveYears/20)*100,2,'.','');

		//echo $data['filterDates'];die;
		//$data['seasionalDate'] = $this->chart_model->printSeasionalAnalysisdate(date('Y').'-01-01', date('Y').'-12-31');

		$myConfigSeasonalAnalysis = '{
            "gui":{ 
              "contextMenu":{ 
                "button":{ 
                  "visible": false 
                }
              } 
            },
            "type": "line",
            "utc": true,
            backgroundColor: "white",
            "plotarea": {
                "margin": "dynamic 45 60 dynamic",
            },
            "legend": {
                "layout": "float",
                "background-color": "none",
                "border-width": 0,
                "shadow": 0,
                "align":"center",
                "vertical-align":"bottom",
                "adjust-layout":true,
                "toggle-action": "remove",
                "item":{
                  "padding": 7,
                  "marginRight": 17,
                  "cursor":"hand"
                }
            },
            "scale-x": {
                "labels": ['.$data['filterDates'].'],
            },
            "scale-y": {
                "line-color": "#f6f7f8",
                "shadow": 0,
                "guide": {
                    "line-style": "dashed"
                },
                "label": {
                    "text": "",
                },
                "minor-ticks": 0,
                "thousands-separator": ","
            },
            "crosshair-x": {
                "line-color": "#efefef",
                "plot-label": {
                    "border-radius": "5px",
                    "border-width": "2px",
                    "border-color": "#063853",
                    "padding": "10px",
                    "font-weight": "bold",
                },
                "scale-label": {
                    "font-color": "#fff",
                    "background-color": "#063853",
                    "border-radius": "5px"
                }
            },

            "tooltip": {
                "visible": false
            },
            "plot": {
                tooltip: {
                          text: "%t views: %v%<br>%k%"
                        },
                "highlight":true,
                "shadow": 0,
                "line-width": "2px",
                "marker": {
                    "type": "circle",
                    "size": 3
                },
                "highlight-state": {
                    "line-width":3
                },
                "animation":{
                  "effect":1,
                  "sequence":2,
                  "speed":100,
                }
            },
            series: [
                  {
                    text: "Media '.$data['media_last10years'].'",
                    values: ['.$data['filterAverageEvolution10years'].'],
                    legendMarker: {
                      type: "circle",
                      backgroundColor: "#00008b",
                      borderColor: "#00008b",
                      borderWidth: "1px",
                      shadow: false,
                      size: "5px"
                    },
                    "margin-top":"0",
                    lineColor: "#00008b",
                    marker: {
                      backgroundColor: "#00008b",
                      borderColor: "#00008b",
                      borderWidth: "1px",
                      shadow: false
                    }
                  },
                  {
                    text: "Media '.$data['media_last20years'].'",
                    values: ['.$data['filterAverageEvolution20years'].'],
                    visible: false,
                    legendMarker: {
                      type: "circle",
                      backgroundColor: "#000000",
                      borderColor: "#000000",
                      borderWidth: "1px",
                      shadow: false,
                      size: "5px"
                    },
                    lineColor: "#000000",
                    marker: {
                      backgroundColor: "#000000",
                      borderColor: "#000000",
                      borderWidth: "1px",
                      shadow: false
                    }
                  },
                  {
                    text: "Media '.$data['media_previous10years'].'",
                    values: ['.$data['filterAverageEvolutionPrevious10years'].'],
                    visible: false,
                    legendMarker: {
                      type: "circle",
                      backgroundColor: "green",
                      borderColor: "green",
                      borderWidth: "1px",
                      shadow: false,
                      size: "5px"
                    },
                    lineColor: "green",
                    marker: {
                      backgroundColor: "green",
                      borderColor: "green",
                      borderWidth: "1px",
                      shadow: false
                    }
                  }
                ]
        }';

        $data['myConfigSeasonalAnalysis'] = $myConfigSeasonalAnalysis;
        echo json_encode($data);
	}
	function changeSimpleAverageToAverageEvolutions()
	{
		error_reporting(0);
		if (base64_encode(base64_encode(base64_decode(base64_decode($this->input->get('stock_id'))))) ===$this->input->get('stock_id'))
        {
		    $actual_stock_id=base64_decode(base64_decode($this->input->get('stock_id')));
		}
		else 
		{
		    $actual_stock_id=$this->input->get('stock_id');
		}
		//echo $actual_stock_id;die;
		$parameter = $this->input->get('parameter');
		$the_big_array = $this->chart_model->getSeasionalAllRecord($actual_stock_id);
		//$the_big_array = array_reverse($the_big_array);
		//echo "<pre>";print_r($the_big_array);die;
		$dateRange = $this->chart_model->printSeasionalAnalysisdate(date('Y').'-01-01', date('Y').'-12-31','d-m');
		//echo "<pre>";print_r($dateRange);die;
		foreach($this->chart_model->printSeasionalAnalysisdate(date('Y').'-03-16', date('Y').'-04-03','d-M') as $xl)
		{
			$xdata[] = "'".$xl."'";
		}
		/*Last 10 Years*/
		$last10YearsStartYear = date("Y",strtotime($the_big_array[0]['actual_date']."-11 year"));
		$last10YearsEndYear =  $the_big_array[0]['year'];
		//echo $last10YearsStartYear."--".$last10YearsEndYear."<br>";
		//die;
		/*Last 20 Years*/
		$Last20YearsStartYear =  date("Y",strtotime($the_big_array[0]['actual_date']."-21 year"));
		$last20YearsEndYear =  $the_big_array[0]['year'];
		/*previous 10 Years*/
		$before10YearsStartYear = $Last20YearsStartYear+1;
		$before10YearsEndYear = $last10YearsStartYear+1;
		
		$media_last10years = ($last10YearsStartYear+2)."-".$last10YearsEndYear;
		$media_last20years = ($Last20YearsStartYear+2)."-".$last20YearsEndYear;
		$media_previous10years = ($before10YearsStartYear+1)."-".$before10YearsEndYear;

		/*echo "<pre>";print_r($data['media_last10years']);
		echo "<pre>";print_r($data['media_last20years']);
		echo "<pre>";print_r($data['media_previous10years']);die;*/


		$dts=[];
		$vlu=[];
		$last20YearsDates = array();
		$last20YearsValue = array();
		$before10YearsDates = array();
		$before10YearsValue = array();
		foreach($the_big_array as $val)
		{
			if(($last10YearsEndYear>=$val['year']) && (($last10YearsStartYear+1)<=$val['year']))
			{
				$dts[]=$val['search_date_all'];
				$vlu[]=str_replace(",","",$val['price']);
			}
			if(($last20YearsEndYear>=$val['year']) && (($Last20YearsStartYear+1)<=$val['year']))
			{	
				$last20YearsDates[]=$val['search_date_all'];
				$last20YearsValue[]=str_replace(",","",$val['price']);
			}
			if(($before10YearsEndYear>=$val['year']) && (($before10YearsStartYear+1)<=$val['year']))
			{	
				$before10YearsDates[]=$val['search_date_all'];
				$before10YearsValue[]=str_replace(",","",$val['price']);
			}
		}

		$daterange = $this->getYearsBetweenDate($last10YearsStartYear+1,$last10YearsEndYear);
		$last10YearsAllDatesVal = $this->getAllDatesAndvaluesSeasionalAnalysis($daterange,$dts,$vlu);
		$last10YearRecord = array();
		$c=0;
		foreach($last10YearsAllDatesVal as $key=>$ddd)
		{
			foreach($last10YearsAllDatesVal[$key] as $var)
			{
				$last10YearRecord[$c][] = $var;	
			}
			$c++;
		}
		$array1 = array_reverse($last10YearRecord[0]); // 31 Dec
		$array2 = array_reverse($last10YearRecord[1]);
		$array3 = array_reverse($last10YearRecord[2]);		
		$array4 = array_reverse($last10YearRecord[3]);
		$array5 = array_reverse($last10YearRecord[4]);
		$array6 = array_reverse($last10YearRecord[5]);
		$array7 = array_reverse($last10YearRecord[6]);
		$array8 = array_reverse($last10YearRecord[7]);
		$array9 = array_reverse($last10YearRecord[8]);
		$array10 = array_reverse($last10YearRecord[9]);
		$array11 = array_reverse($last10YearRecord[10]);
				
		$variance1 = $this->getVariance($array1);
		
		$variance2 = $this->getVariance($array2);
		$variance3 = $this->getVariance($array3);
		$variance4 = $this->getVariance($array4);
		$variance5 = $this->getVariance($array5);
		$variance6 = $this->getVariance($array6);
		$variance7 = $this->getVariance($array7);
		$variance8 = $this->getVariance($array8);
		$variance9 = $this->getVariance($array9);
		$variance10 = $this->getVariance($array10);
		$variance11 = $this->getVariance($array11);
		//echo "<pre>";print_r($variance11);die;
		$averageOfLast10Years = array();
		for($av=0;$av<=365;$av++)
		{
			$variandddd = ($variance2[$av]+$variance3[$av]+$variance4[$av]+$variance5[$av]+$variance6[$av]+$variance7[$av]+$variance8[$av]+$variance9[$av]+$variance10[$av]+$variance11[$av])/10; 
			$variandddd = number_format(($variandddd*100),2,".","");
			$averageOfLast10Years[] = $variandddd;
		}
		$last10YearsEvolutions = array();
		$lastEvolutions = 0;
		foreach(array_reverse($averageOfLast10Years) as $ev=>$evolution) //  1 Jan
		{
			if($ev==0)
			{
				$last10YearsEvolutions[] = number_format($evolution,2,".","");
			}
			else
			{
				$last10YearsEvolutions[] = number_format(($evolution+$lastEvolutions),2,".",""); 
				$lastEvolutions = $evolution+$lastEvolutions;
			}
		}
		//echo "<pre>";print_r($last10YearsEvolutions);die;
		/* 
			Last 20 Years Calculations Starts 
		*/
		$daterangeLast20Years = $this->getYearsBetweenDate($Last20YearsStartYear+1,$last20YearsEndYear);
		$last20YearsAllDatesVal = $this->getAllDatesAndvaluesSeasionalAnalysis($daterangeLast20Years,$last20YearsDates,$last20YearsValue);
		//echo "<pre>";print_r($last20YearsAllDatesVal);die;
		$last20YearRecord = array();
		$d=0;
		foreach($last20YearsAllDatesVal as $key=>$ddd)
		{
			foreach($last20YearsAllDatesVal[$key] as $var)
			{
				$last20YearRecord[$d][] = $var;	
			}
			$d++;
		}
		//echo "<pre>";print_r($last20YearRecord);die;
		$Last20Yearsarray1 = array_reverse($last20YearRecord[0]);// 31 Dec
		$Last20Yearsarray2 = array_reverse($last20YearRecord[1]);// 31 Dec
		$Last20Yearsarray3 = array_reverse($last20YearRecord[2]);
		$Last20Yearsarray4 = array_reverse($last20YearRecord[3]);
		$Last20Yearsarray5 = array_reverse($last20YearRecord[4]);
		$Last20Yearsarray6 = array_reverse($last20YearRecord[5]);
		$Last20Yearsarray7 = array_reverse($last20YearRecord[6]);
		$Last20Yearsarray8 = array_reverse($last20YearRecord[7]);
		$Last20Yearsarray9 = array_reverse($last20YearRecord[8]);
		$Last20Yearsarray10 = array_reverse($last20YearRecord[9]);
		$Last20Yearsarray11 = array_reverse($last20YearRecord[10]);
		$Last20Yearsarray12 = array_reverse($last20YearRecord[11]);
		$Last20Yearsarray13 = array_reverse($last20YearRecord[12]);
		$Last20Yearsarray14 = array_reverse($last20YearRecord[13]);
		$Last20Yearsarray15 = array_reverse($last20YearRecord[14]);
		$Last20Yearsarray16 = array_reverse($last20YearRecord[15]);
		$Last20Yearsarray17 = array_reverse($last20YearRecord[16]);
		$Last20Yearsarray18 = array_reverse($last20YearRecord[17]);
		$Last20Yearsarray19 = array_reverse($last20YearRecord[18]);
		$Last20Yearsarray20 = array_reverse($last20YearRecord[19]);
		$Last20Yearsarray21 = array_reverse($last20YearRecord[20]);
				
		$Last20YearsVariance1 = $this->getVariance($Last20Yearsarray1);
		$Last20YearsVariance2 = $this->getVariance($Last20Yearsarray2);
		$Last20YearsVariance3 = $this->getVariance($Last20Yearsarray3);
		$Last20YearsVariance4 = $this->getVariance($Last20Yearsarray4);
		$Last20YearsVariance5 = $this->getVariance($Last20Yearsarray5);
		$Last20YearsVariance6 = $this->getVariance($Last20Yearsarray6);
		$Last20YearsVariance7 = $this->getVariance($Last20Yearsarray7);
		$Last20YearsVariance8 = $this->getVariance($Last20Yearsarray8);
		$Last20YearsVariance9 = $this->getVariance($Last20Yearsarray9);
		$Last20YearsVariance10 = $this->getVariance($Last20Yearsarray10);
		$Last20YearsVariance11 = $this->getVariance($Last20Yearsarray11);
		$Last20YearsVariance12 = $this->getVariance($Last20Yearsarray12);
		$Last20YearsVariance13 = $this->getVariance($Last20Yearsarray13);
		$Last20YearsVariance14 = $this->getVariance($Last20Yearsarray14);
		$Last20YearsVariance15 = $this->getVariance($Last20Yearsarray15);
		$Last20YearsVariance16 = $this->getVariance($Last20Yearsarray16);
		$Last20YearsVariance17 = $this->getVariance($Last20Yearsarray17);
		$Last20YearsVariance18 = $this->getVariance($Last20Yearsarray18);
		$Last20YearsVariance19 = $this->getVariance($Last20Yearsarray19);
		$Last20YearsVariance20 = $this->getVariance($Last20Yearsarray20);
		$Last20YearsVariance21 = $this->getVariance($Last20Yearsarray21);

		//echo "<pre>";print_r($variance10);die;
		$averageOfLast20Years = array();
		for($av=0;$av<=365;$av++)
		{
			$variandddd = ($Last20YearsVariance2[$av]+$Last20YearsVariance3[$av]+$Last20YearsVariance4[$av]+$Last20YearsVariance5[$av]+$Last20YearsVariance6[$av]+$Last20YearsVariance7[$av]+$Last20YearsVariance8[$av]+$Last20YearsVariance9[$av]+$Last20YearsVariance10[$av]+$Last20YearsVariance11[$av]+$Last20YearsVariance12[$av]+$Last20YearsVariance13[$av]+$Last20YearsVariance14[$av]+$Last20YearsVariance15[$av]+$Last20YearsVariance16[$av]+$Last20YearsVariance17[$av]+$Last20YearsVariance18[$av]+$Last20YearsVariance19[$av]+$Last20YearsVariance20[$av]+$Last20YearsVariance21[$av])/20; 
			$variandddd = number_format(($variandddd*100),2,".","");
			$averageOfLast20Years[] = $variandddd;
		}
		//echo "<pre>";print_r($averageOfLast20Years);die;
		$last20YearsEvolutions = array();
		$lastEvolutions1 = 0;
		foreach(array_reverse($averageOfLast20Years) as $ev=>$evolution) //  1 Jan
		{
			//echo $evolution."<br>";
			if($ev==0)
			{
				$last20YearsEvolutions[] = number_format(0,2,".","");
			}
			else
			{
				$last20YearsEvolutions[] = number_format(($evolution+$lastEvolutions1),2,".",""); 
				$lastEvolutions1 = $evolution+$lastEvolutions1;
			}
		}
		//echo "<pre>last20YearsEvolutions";print_r($last20YearsEvolutions);die;
		/* 
			Last 20 Years Calculations End 
		*/

		/* Previous 10 Years Calculation Starts  */

		$daterangePrevious10Years = $this->getYearsBetweenDate($before10YearsStartYear,$before10YearsEndYear);
		$previous10YearsAllDatesVal = $this->getAllDatesAndvaluesSeasionalAnalysis($daterangePrevious10Years,$before10YearsDates,$before10YearsValue);
		//echo "<pre>previous 10 years";print_r($previous10YearsAllDatesVal);die;
		$previous10YearRecord = array();
		$e=0;
		foreach($previous10YearsAllDatesVal as $key=>$ddd)
		{
			foreach($previous10YearsAllDatesVal[$key] as $var)
			{
				$previous10YearRecord[$e][] = $var;	
			}
			$e++;
		}
		//echo "<pre>dddd";print_r($previous10YearRecord);die;
		$previous10Yearsarray1 = array_reverse($previous10YearRecord[0]); // 31 Dec
		$previous10Yearsarray2 = array_reverse($previous10YearRecord[1]);
		$previous10Yearsarray3 = array_reverse($previous10YearRecord[2]);
		$previous10Yearsarray4 = array_reverse($previous10YearRecord[3]);
		$previous10Yearsarray5 = array_reverse($previous10YearRecord[4]);
		$previous10Yearsarray6 = array_reverse($previous10YearRecord[5]);
		$previous10Yearsarray7 = array_reverse($previous10YearRecord[6]);
		$previous10Yearsarray8 = array_reverse($previous10YearRecord[7]);
		$previous10Yearsarray9 = array_reverse($previous10YearRecord[8]);
		$previous10Yearsarray10 = array_reverse($previous10YearRecord[9]);
		$previous10Yearsarray11 = array_reverse($previous10YearRecord[10]);
				
		$previous10YearsVariance1 = $this->getVariance($previous10Yearsarray1);
		$previous10YearsVariance2 = $this->getVariance($previous10Yearsarray2);
		$previous10YearsVariance3 = $this->getVariance($previous10Yearsarray3);
		$previous10YearsVariance4 = $this->getVariance($previous10Yearsarray4);
		$previous10YearsVariance5 = $this->getVariance($previous10Yearsarray5);
		$previous10YearsVariance6 = $this->getVariance($previous10Yearsarray6);
		$previous10YearsVariance7 = $this->getVariance($previous10Yearsarray7);
		$previous10YearsVariance8 = $this->getVariance($previous10Yearsarray8);
		$previous10YearsVariance9 = $this->getVariance($previous10Yearsarray9);
		$previous10YearsVariance10 = $this->getVariance($previous10Yearsarray10);
		$previous10YearsVariance11 = $this->getVariance($previous10Yearsarray11);
		
		$averageOfPrevious10Years = array();
		for($av=0;$av<=365;$av++)
		{
			$variandddd = ($previous10YearsVariance2[$av]+$previous10YearsVariance3[$av]+$previous10YearsVariance4[$av]+$previous10YearsVariance5[$av]+$previous10YearsVariance6[$av]+$previous10YearsVariance7[$av]+$previous10YearsVariance8[$av]+$previous10YearsVariance9[$av]+$previous10YearsVariance10[$av]+$previous10YearsVariance11[$av])/10; 
			$variandddd = number_format(($variandddd*100),2,".","");
			$averageOfPrevious10Years[] = $variandddd;
		}
		//echo "<pre>pre average";print_r($averageOfPrevious10Years);die;
		$previous10YearsEvolutions = array();
		$lastEvolutions2 = 0;
		foreach(array_reverse($averageOfPrevious10Years) as $ev=>$evolution) //  1 Jan
		{
			if($ev==0)
			{
				$previous10YearsEvolutions[] = number_format(0,2,".","");
			}
			else
			{
				$previous10YearsEvolutions[] = number_format(($evolution+$lastEvolutions2),2,".",""); 
				$lastEvolutions2 = $evolution+$lastEvolutions2;
			}
		}
		//echo "<pre>";print_r($previous5YearsEvolutions);die;
		/* Previous 5 Years Calculation End  */

		$beginLabel = new DateTime( '2016-01-01' );
		$endLabel = (new DateTime( '2016-12-31' ))->modify( '+1 day' );
		$intervalLabel = new DateInterval('P1D');
		$labelRange = new DatePeriod($beginLabel, $intervalLabel ,$endLabel);
		$xRangeLabel = array();
		foreach($labelRange as $range)
		{
			$xRangeLabel[] = "'".$range->format('d-M')."'";
		}

		if($parameter==1)
		{
			$last10YearsRec = implode(',', array_reverse($averageOfLast10Years));
			$last20YearsRec = implode(',', array_reverse($averageOfLast20Years));
			$previous10YearsRec = implode(',', array_reverse($averageOfPrevious10Years));
		}
		else
		{
			$last10YearsRec = implode(',', $last10YearsEvolutions);
			$last20YearsRec = implode(',', $last20YearsEvolutions);
			$previous10YearsRec = implode(',', $previous10YearsEvolutions);
		}
		//echo "<pre>";print_r(explode(',',$last10YearsRec));die;
		$myConfigSeasonalAnalysis = '{
            "gui":{ 
              "contextMenu":{ 
                "button":{ 
                  "visible": false 
                }
              } 
            },
            "type": "line",
            "utc": true,
            backgroundColor: "white",
            "plotarea": {
                "margin": "dynamic 45 60 dynamic",
            },
            "legend": {
                "layout": "float",
                "background-color": "none",
                "border-width": 0,
                "shadow": 0,
                "align":"center",
                "vertical-align":"bottom",
                "adjust-layout":true,
                "toggle-action": "remove",
                "item":{
                  "padding": 7,
                  "marginRight": 17,
                  "cursor":"hand"
                }
            },
            "scale-x": {
                "labels": ['.implode(',', $xRangeLabel).'],
            },
            "scale-y": {
                "line-color": "#f6f7f8",
                "shadow": 0,
                "guide": {
                    "line-style": "dashed"
                },
                "label": {
                    "text": "",
                },
                "minor-ticks": 0,
                "thousands-separator": ","
            },
            "crosshair-x": {
                "line-color": "#efefef",
                "plot-label": {
                    "border-radius": "5px",
                    "border-width": "2px",
                    "border-color": "#063853",
                    "padding": "10px",
                    "font-weight": "bold",
                },
                "scale-label": {
                    "font-color": "#fff",
                    "background-color": "#063853",
                    "border-radius": "5px"
                }
            },

            "tooltip": {
                "visible": false
            },
            "plot": {
                tooltip: {
                          text: "%t views: %v%<br>%k%"
                        },
                "highlight":true,
                "shadow": 0,
                "line-width": "2px",
                "marker": {
                    "type": "circle",
                    "size": 3
                },
                "highlight-state": {
                    "line-width":3
                },
                "animation":{
                  "effect":1,
                  "sequence":2,
                  "speed":100,
                }
            },
            series: [
                  {
                    text: "Media '.$media_last10years.'",
                    values: ['.$last10YearsRec.'],
                    legendMarker: {
                      type: "circle",
                      backgroundColor: "#00008b",
                      borderColor: "#00008b",
                      borderWidth: "1px",
                      shadow: false,
                      size: "5px"
                    },
                    "margin-top":"0",
                    lineColor: "#00008b",
                    marker: {
                      backgroundColor: "#00008b",
                      borderColor: "#00008b",
                      borderWidth: "1px",
                      shadow: false
                    }
                  },
                  {
                    text: "Media '.$media_last20years.'",
                    values: ['.$last20YearsRec.'],
                    visible: false,
                    legendMarker: {
                      type: "circle",
                      backgroundColor: "#000000",
                      borderColor: "#000000",
                      borderWidth: "1px",
                      shadow: false,
                      size: "5px"
                    },
                    lineColor: "#000000",
                    marker: {
                      backgroundColor: "#000000",
                      borderColor: "#000000",
                      borderWidth: "1px",
                      shadow: false
                    }
                  },
                  {
                    text: "Media '.$media_previous10years.'",
                    values: ['.$previous10YearsRec.'],
                    visible: false,
                    legendMarker: {
                      type: "circle",
                      backgroundColor: "green",
                      borderColor: "green",
                      borderWidth: "1px",
                      shadow: false,
                      size: "5px"
                    },
                    lineColor: "green",
                    marker: {
                      backgroundColor: "green",
                      borderColor: "green",
                      borderWidth: "1px",
                      shadow: false
                    }
                  }
                ]
        }';
        echo $myConfigSeasonalAnalysis;
	}
	function getSeaionAnalysisChartDataAjax()
	{
		if (base64_encode(base64_encode(base64_decode(base64_decode($this->input->get('stock_id'))))) ===$this->input->get('stock_id'))
        {

		    $actual_stock_id=base64_decode(base64_decode($this->input->get('stock_id')));

		} 

		else 

		{

		    $actual_stock_id=$this->input->get('stock_id');

		}

		$startDate = $this->input->get('startDate');
		$endDate = $this->input->get('endDate');
		//echo $startDate."---".$endDate;die;
		$the_big_array = $this->chart_model->getSeasionalAllRecord($actual_stock_id);
		//echo "<pre>";print_r($the_big_array);die;
		$dateRange = $this->chart_model->printSeasionalAnalysisdate(date('Y').'-01-01', date('Y').'-12-31','d-m');
		//echo "<pre>";print_r($dateRange);die;
		foreach($this->chart_model->printSeasionalAnalysisdate(date('Y').'-03-16', date('Y').'-04-03','d-M') as $xl)
		{
			$xdata[] = "'".$xl."'";
		}
		//echo "<pre>";print_r($xdata);die;
		$startPoint = $the_big_array[0]['converted_date'];
		$endPoint =  date("d-m-Y",strtotime($the_big_array[0]['actual_date']."-10 year"));
		$before10YearsEndPoint = date("d-m-Y",strtotime($endPoint."-10 year"));
		//End Of before 10 Years
		$before10YearsEndPoint = strtotime($before10YearsEndPoint);
		$endPoint = strtotime($endPoint);
		$end20YearsEndPoint = date("d-m-Y",strtotime($the_big_array[0]['actual_date']."-20 year"));
		//End Of last 20 Years
		$end20YearsEndPoint = strtotime($end20YearsEndPoint);
		//last 10 years calculation
		$existLast10Year=array();
		$existVlLast10=array();
		$finalLast10=array();
		$the_big_array = array_reverse($the_big_array);
		//echo "<pre>";print_r($the_big_array);die;
		foreach($the_big_array as $val)
		{
			if(($startPoint>=$val['converted_date']) && ($endPoint<=$val['converted_date']))
			{		
				foreach($dateRange as $range)
				{
					if(trim($range)==trim($val['search_date']))
					{
						if(!in_array($val['search_date'], $existLast10Year))
						{
							$existLast10Year[]=$val['search_date'];
							$existVlLast10[]=$val['converted_change'];
							$vl['search_date']=$val['search_date'];
							$vl['con_date']=strtotime($val['search_date']."-".date('Y'));
							$vl['change']= $this->chart_model->calculate_average(explode(',', $val['converted_change']));
							$finalLast10[]=$vl;
						}
						else
						{
							$index = array_search ($val['search_date'],$existLast10Year);
							$existVlLast10[$index]=($existVlLast10[$index].','.$val['converted_change']);
							$vl['search_date']=$val['search_date'];
							$vl['con_date']=strtotime($val['search_date']."-".date('Y'));
							$vl['change']=$this->chart_model->calculate_average(explode(',', $existVlLast10[$index]));
							$finalLast10[$index]=$vl;
						}
					}
					//echo $first."<br>";
				}
			}	
		}
		//echo "<pre>";print_r($finalLast10);die;
		$dataEvoltion = array();
		$recEvolution = array();
		$ijnnn = 0;
		$i=0;
		foreach($finalLast10 as $evolution)
		{
			$dataEvoltion['search_date'] = $evolution['search_date'];
			$dataEvoltion['con_date'] = $evolution['con_date'];
			$dataEvoltion['change'] = number_format($evolution['change'],2,".","");
			if($i==0)
			{
				$dataEvoltion['averageEvolution'] = number_format($evolution['change'],2,".","");
				$ijnnn=$evolution['change'];
			}
			else
			{
				$dataEvoltion['averageEvolution'] = number_format($evolution['change']+$ijnnn,2,".","");
				$ijnnn=$dataEvoltion['averageEvolution'];
			}
			//echo $evolution['change']."<br>";
			array_push($recEvolution, $dataEvoltion);
			$i++;
		}
		//echo "<pre>";print_r($recEvolution);die;
		$recordByPrice10 = $recEvolution;
		$recordfinalLast10 = $recEvolution;
		//usort($recordfinalLast10,array($this, 'sortsssss'));
		//usort($recordByPrice10,array($this, 'sortMinPrice'));
		//$last10Year1 = $this->getLastYearRecordCalculations($test,$recordByPrice10,$recordfinalLast10);
		$CombineSeasionalArr = array();

		for($test=0;$test<=200;$test++)
		{
			$numberOfPostiveLast10Year1 = 0;
			$numberOfNegativeLast10Year1 = 0;
			$totalNumLast10Year1 = 0;
			$profitLast10Year1 = 0;
			$probabalityLast10Year1 = 0;
			$performanceLast10Years1 = array();
			$dateRecordLast10Years1 = array();
			$last10Year1 = $this->getLastYearRecordCalculations($test,$recordByPrice10,$recordfinalLast10);
			array_pop($last10Year1);
			if(count($last10Year1)>9)
			{
				foreach($last10Year1 as $last10)
				{
					if($last10['averageEvolution']>0)
					{
						$numberOfPostiveLast10Year1++;
					}
					$totalNumLast10Year1++;
					$performanceLast10Years1[] = $last10['averageEvolution'];
					$dateRecordLast10Years1[] = $last10['timesptmp'];
				}
				$numberOfNegativeLast10Year1 = $totalNumLast10Year1-$numberOfPostiveLast10Year1;
				$profitLast10Year1 = (array_sum($performanceLast10Years1)/count($performanceLast10Years1));
				$probabalityLast10Year1 = ($numberOfPostiveLast10Year1/$totalNumLast10Year1)*100;

				$CombineSeasionalArr[$test]['probabality'] = number_format($probabalityLast10Year1,2,".","");
				$CombineSeasionalArr[$test]['profit'] = number_format($profitLast10Year1,2,".","");
				$CombineSeasionalArr[$test]['totalNumber'] = $totalNumLast10Year1;
				$CombineSeasionalArr[$test]['totalPositive'] = number_format($numberOfPostiveLast10Year1,2,".","");
				$CombineSeasionalArr[$test]['totalNegative'] = number_format($numberOfNegativeLast10Year1,2,".","");
				$CombineSeasionalArr[$test]['price_median'] = $performanceLast10Years1;
				$CombineSeasionalArr[$test]['timesptmp'] = $dateRecordLast10Years1;
				$CombineSeasionalArr[$test]['index'] = $test;
			}		
		}
		$maxProbabality = -999;
		$found_item = null;
		$getSearch = 0;
		foreach($CombineSeasionalArr as $k=>$v)
		{
			if( ($v['profit']>=$startDate) && ($startDate<=$v['profit']) && ($v['probabality']>=$endDate) && ($endDate<=$v['probabality']) )
			{
				$found_item = $v;
				$getSearch = 1;
				break;
			}	    
		}
		if($getSearch==0)
		{
			foreach($CombineSeasionalArr as $k=>$v)
			{
			    if($v['probabality']>$maxProbabality)
			    {
			       $maxProbabality = $v['probabality'];
			       $found_item = $v;
			    }
			}
		}
		$myConfigSeasonalAnalysis = '{
			"gui":{ 
              "contextMenu":{ 
                "button":{ 
                  "visible": false 
                } 
              } 
            },
            "type": "line",
            "utc": true,
            backgroundColor: "white",
            "plotarea": {
                "margin": "dynamic 45 60 dynamic",
            },
            "scale-x": {
                "labels": ['. implode(',', $found_item['timesptmp']).'],
            },
            "scale-y": {
                "line-color": "#f6f7f8",
                "shadow": 0,
                "guide": {
                    "line-style": "dashed"
                },
                "label": {

                    "text": "",

                },

                "minor-ticks": 0,

                "thousands-separator": ","

            },

            "crosshair-x": {

                "line-color": "#efefef",

                "plot-label": {

                    "border-radius": "5px",

                    "border-width": "2px",

                    "border-color": "#063853",

                    "padding": "10px",

                    "font-weight": "bold",

                },

                "scale-label": {

                    "font-color": "#fff",

                    "background-color": "#063853",

                    "border-radius": "5px"

                }

            },

            "tooltip": {

                "visible": false

            },

            "plot": {

                "highlight":true,

                "tooltip-text": "%t views: %v<br>%k",

                "shadow": 0,

                "line-width": "2px",

                "marker": {

                    "type": "circle",

                    "size": 3

                },

                "highlight-state": {

                    "line-width":3

                },

                "animation":{

                  "effect":1,

                  "sequence":2,

                  "speed":100,

                }

            },

            series: [

                      {

                        text: "Media 2010-20",

                        values: ['.implode(',', $found_item['price_median']).'],

                        legendMarker: {

                          type: "circle",

                          backgroundColor: "#7cb5ec",

                          borderColor: "#7cb5ec",

                          borderWidth: "1px",

                          shadow: false,

                          size: "5px"

                        },

                        "margin-top":"0",

                        lineColor: "#7cb5ec",

                        marker: {

                          backgroundColor: "#7cb5ec",

                          borderColor: "#7cb5ec",

                          borderWidth: "1px",

                          shadow: false

                        }

                      }

                    ]

        }';

        echo $myConfigSeasonalAnalysis;



	}

	function getSeasionalAnalysisDataAjax()
	{

		$startDate = $this->input->post('startDate');
		$endDate = $this->input->post('endDate');
		if (base64_encode(base64_encode(base64_decode(base64_decode($this->input->post('stock_id'))))) ===$this->input->post('stock_id'))

        {

		    $actual_stock_id=base64_decode(base64_decode($this->input->post('stock_id')));

		} 

		else 

		{

		    $actual_stock_id=$this->input->post('stock_id');

		}

		$the_big_array = $this->chart_model->getSeasionalAllRecord($actual_stock_id);
		//echo "<pre>";print_r($the_big_array);die;
		$dateRange = $this->chart_model->printSeasionalAnalysisdate(date('Y').'-01-01', date('Y').'-12-31','d-m');
		//echo "<pre>";print_r($dateRange);die;
		foreach($this->chart_model->printSeasionalAnalysisdate(date('Y').'-03-16', date('Y').'-04-03','d-M') as $xl)
		{
			$xdata[] = "'".$xl."'";
		}
		//echo "<pre>";print_r($xdata);die;
		$startPoint = $the_big_array[0]['converted_date'];
		$endPoint =  date("d-m-Y",strtotime($the_big_array[0]['actual_date']."-10 year"));
		$before10YearsEndPoint = date("d-m-Y",strtotime($endPoint."-10 year"));
		//End Of before 10 Years
		$before10YearsEndPoint = strtotime($before10YearsEndPoint);
		$endPoint = strtotime($endPoint);
		$end20YearsEndPoint = date("d-m-Y",strtotime($the_big_array[0]['actual_date']."-20 year"));
		//End Of last 20 Years
		$end20YearsEndPoint = strtotime($end20YearsEndPoint);
		//last 10 years calculation
		$existLast10Year=array();
		$existVlLast10=array();
		$finalLast10=array();
		$the_big_array = array_reverse($the_big_array);
		//echo "<pre>";print_r($the_big_array);die;
		foreach($the_big_array as $val)
		{
			if(($startPoint>=$val['converted_date']) && ($endPoint<=$val['converted_date']))
			{		
				foreach($dateRange as $range)
				{
					if(trim($range)==trim($val['search_date']))
					{
						if(!in_array($val['search_date'], $existLast10Year))
						{
							$existLast10Year[]=$val['search_date'];
							$existVlLast10[]=$val['converted_change'];
							$vl['search_date']=$val['search_date'];
							$vl['con_date']=strtotime($val['search_date']."-".date('Y'));
							$vl['change']= $this->chart_model->calculate_average(explode(',', $val['converted_change']));
							$finalLast10[]=$vl;
						}
						else
						{
							$index = array_search ($val['search_date'],$existLast10Year);
							$existVlLast10[$index]=($existVlLast10[$index].','.$val['converted_change']);
							$vl['search_date']=$val['search_date'];
							$vl['con_date']=strtotime($val['search_date']."-".date('Y'));
							$vl['change']=$this->chart_model->calculate_average(explode(',', $existVlLast10[$index]));
							$finalLast10[$index]=$vl;
						}
					}
					//echo $first."<br>";
				}
			}	
		}
		//echo "<pre>";print_r($finalLast10);die;
		$dataEvoltion = array();
		$recEvolution = array();
		$ijnnn = 0;
		$i=0;
		foreach($finalLast10 as $evolution)
		{
			$dataEvoltion['search_date'] = $evolution['search_date'];
			$dataEvoltion['con_date'] = $evolution['con_date'];
			$dataEvoltion['change'] = number_format($evolution['change'],2,".","");
			if($i==0)
			{
				$dataEvoltion['averageEvolution'] = number_format($evolution['change'],2,".","");
				$ijnnn=$evolution['change'];
			}
			else
			{
				$dataEvoltion['averageEvolution'] = number_format($evolution['change']+$ijnnn,2,".","");
				$ijnnn=$dataEvoltion['averageEvolution'];
			}
			//echo $evolution['change']."<br>";
			array_push($recEvolution, $dataEvoltion);
			$i++;
		}
		//echo "<pre>";print_r($recEvolution);die;
		$recordByPrice10 = $recEvolution;
		$recordfinalLast10 = $recEvolution;
		//usort($recordfinalLast10,array($this, 'sortsssss'));
		//usort($recordByPrice10,array($this, 'sortMinPrice'));
		//$last10Year1 = $this->getLastYearRecordCalculations($test,$recordByPrice10,$recordfinalLast10);
		$CombineSeasionalArr = array();

		for($test=0;$test<=200;$test++)
		{
			$numberOfPostiveLast10Year1 = 0;
			$numberOfNegativeLast10Year1 = 0;
			$totalNumLast10Year1 = 0;
			$profitLast10Year1 = 0;
			$probabalityLast10Year1 = 0;
			$performanceLast10Years1 = array();
			$dateRecordLast10Years1 = array();
			$last10Year1 = $this->getLastYearRecordCalculations($test,$recordByPrice10,$recordfinalLast10);
			array_pop($last10Year1);
			if(count($last10Year1)>9)
			{
				foreach($last10Year1 as $last10)
				{
					if($last10['averageEvolution']>0)
					{
						$numberOfPostiveLast10Year1++;
					}
					$totalNumLast10Year1++;
					$performanceLast10Years1[] = $last10['averageEvolution'];
					$dateRecordLast10Years1[] = $last10['timesptmp'];
				}
				$numberOfNegativeLast10Year1 = $totalNumLast10Year1-$numberOfPostiveLast10Year1;
				$profitLast10Year1 = (array_sum($performanceLast10Years1)/count($performanceLast10Years1));
				$probabalityLast10Year1 = ($numberOfPostiveLast10Year1/$totalNumLast10Year1)*100;

				$CombineSeasionalArr[$test]['probabality'] = number_format($probabalityLast10Year1,2,".","");
				$CombineSeasionalArr[$test]['profit'] = number_format($profitLast10Year1,2,".","");
				$CombineSeasionalArr[$test]['totalNumber'] = $totalNumLast10Year1;
				$CombineSeasionalArr[$test]['totalPositive'] = number_format($numberOfPostiveLast10Year1,2,".","");
				$CombineSeasionalArr[$test]['totalNegative'] = number_format($numberOfNegativeLast10Year1,2,".","");
				$CombineSeasionalArr[$test]['price_median'] = $performanceLast10Years1;
				$CombineSeasionalArr[$test]['timesptmp'] = $dateRecordLast10Years1;
				$CombineSeasionalArr[$test]['index'] = $test;
			}		
		}
		//echo "<pre>";print_r($CombineSeasionalArr);

		$maxProbabality = -999;
		$found_item = null;
		$getSearch = 0;
		foreach($CombineSeasionalArr as $k=>$v)
		{
			if( ($v['profit']>=$startDate) && ($startDate<=$v['profit']) && ($v['probabality']>=$endDate) && ($endDate<=$v['probabality']) )
			{
				$found_item = $v;
				$getSearch = 1;
				break;

			}    
		}
		if($getSearch==0)
		{
			foreach($CombineSeasionalArr as $k=>$v)
			{
			    if($v['probabality']>$maxProbabality)
			    {
			       $maxProbabality = $v['probabality'];
			       $found_item = $v;
			    }
			}
		}
		$arrayData = array(
							'getSearch'=>$getSearch,
							'totalDays'=>$found_item['totalNumber'],
							'totalNumOfPos'=>$found_item['totalPositive'],
							'totalNumOfNeg'=>$found_item['totalNegative'],
							'probabality'=> number_format($found_item['probabality'],2,'.',''),
							'totalSum'=>$found_item['totalNumber'],
							'performanceLast10Years'=>number_format($found_item['profit'],2,'.',''),
							'startDate'=>trim(current($found_item['timesptmp']),"'"),
							'endDate'=>trim(end($found_item['timesptmp']),"'"),
							'timstmp'=>implode(',', $found_item['timesptmp']),
							//'performanceBefore10Years'=>number_format($data['performanceBefore10Years'],2,'.',''),

							//'performanceLast20Years'=>number_format($data['performanceLast20Years'],2,'.',''),
							);

		echo json_encode($arrayData);
	}

	function calculate_negative_positive()

	{

		$the_big_array = $this->chart_model->getSeasionalAllRecord();

		//echo "<pre>";print_r($the_big_array);die;

		$dateRange = $this->chart_model->printSeasionalAnalysisdate(date('Y').'-03-16', date('Y').'-04-03','d-m');





		//echo "<pre>";print_r($dateRange);die;

		foreach($this->chart_model->printSeasionalAnalysisdate(date('Y').'-03-16', date('Y').'-04-03','d-M-Y') as $xl)

		{

			$xdata[] = "'".$xl."'";

		}

		//echo "<pre>";print_r($xdata);die;

		$startPoint = $the_big_array[0]['converted_date'];



		$endPoint =  date("d-m-Y",strtotime($the_big_array[0]['actual_date']."-10 year"));

		$endPointYear =  date("Y",strtotime($the_big_array[0]['actual_date']."-20 year"));

		//$dateRange = $this->chart_model->getSeasionalAnalysisdate('2010-03-16', date('Y').'-04-03','d-m-Y');

		//echo $endPointYear."<br>";

			$allDateGet = array();

			for($i=$endPointYear;$i<=date('Y');$i++)

			{

				foreach($dateRange as $rn)

				{

					$allDateGet[] =  $rn.'-'.$i;

				}

			}

		

	//	echo "<pre>";print_r($allDateGet);die;



		$before10YearsEndPoint = date("d-m-Y",strtotime($endPoint."-10 year"));



		//echo $before10YearsEndPoint."<br>";



		$before10YearsEndPoint = strtotime($before10YearsEndPoint);



		//echo $before10YearsEndPoint;



		$endPoint = strtotime($endPoint);



		$end20YearsEndPoint = date("d-m-Y",strtotime($the_big_array[0]['actual_date']."-20 year"));

		//echo $end20YearsEndPoint;

		$end20YearsEndPoint = strtotime($end20YearsEndPoint);





		$existLast10Year=array();

		$existVlLast10=array();

		$finalLast10=array();

		$allYear=[];

		$allDATA=[];



		foreach($the_big_array as $val)

		{

			//echo date('d-m-Y',$val['converted_date'])." - ".$val['search_date_all'];;

			 $year=date('Y',$val['converted_date']);

			 $dt=$val['search_date_all'];



			if(!in_array($year,$allYear))

			{	if(in_array($dt,$allDateGet))

				{

					$allYear[]=$year;

					$x['year']=$year;

					$x['sum']=$val['converted_change'];

					$x['date'][]=$val['search_date_all'];

					$x['change'][]=$val['converted_change'];

					$allDATA[]=$x;

				}

			}

			else

			{

				if(in_array($dt,$allDateGet))

				{

					$index = array_search ($year,$allYear);



					$x=[];

					$x['year']=$year;

					

					

					//$allYear[$index]['year']=$x;	

					$xx=$allDATA[$index]['sum'];

					$allDATA[$index]['sum']=($xx+$val['converted_change']);

					$allDATA[$index]['date'][]=$val['search_date_all'];

					$allDATA[$index]['change'][]=$val['converted_change'];

				

				}

			}

		}



		//echo $endPoint."<br>";

		//echo "<pre>";print_r($allDATA);



		$totalNumOfPos = 0;

		$totalNumOfNeg = 0;

		$totalSum = 0;

		$probabality = 0;

		foreach($allDATA as $dddd)

		{

			$totalSum++;

			if($dddd['sum']>0)

			{

				$totalNumOfPos++;

			}

			//echo $dddd['sum']."<br>";

		}

		echo $totalSum."<br>";

		echo $totalNumOfPos."<br>";

		echo ($totalSum-$totalNumOfPos)."<br>";

		$probabality = ($totalNumOfPos/$totalSum)*100;

		echo $probabality;

		//echo $

	}

	function sortsssss($a, $b)

    {

        if ($a["con_date"] == $b["con_date"]) 

        {  

            return 0;

        }

        return ($a["con_date"] < $b["con_date"]) ? -1 : 1; 

    }

	function getStaticAnalysisGraphData()

	{

		$stock_id = $this->input->post('stock_id');

		$get_period =$this->input->post('period');

		$get_parameter = $this->input->post('parameter');

		$firstDeviation = $this->input->post('firstDeviation');

		$secondDeviation = $this->input->post('secondDeviation');

		$percentile99_1 = $this->input->post('percentile99_1');

		if (base64_encode(base64_encode(base64_decode(base64_decode($this->input->post('stock_id'))))) ===$this->input->post('stock_id'))

        {

		    $actual_stock_id=base64_decode(base64_decode($this->input->post('stock_id')));

		} 

		else 

		{

		    $actual_stock_id=$this->input->post('stock_id');

		}
		//echo $actual_stock_id;die;

		//$actual_stock_id = base64_decode(base64_decode($stock_id));
		if($this->input->post('cattype'))
		{
			$allExcelFileRecordLast = $this->chart_model->file_handling($actual_stock_id,1);
		}
		else
		{
			$allExcelFileRecordLast = $this->chart_model->file_handling($actual_stock_id);
		}
		

		$allExcelFileRecordLast = array_slice($allExcelFileRecordLast, 0,365);

		$allExcelFileRecord = array_reverse($allExcelFileRecordLast);
		//echo "<pre>";print_r($allExcelFileRecord);die;

		



		$count = 1;

		$average = 0;

		$sum = 0;

		$x[0]=0;

		$allPriceArr = array();

		$allDateArr = array();

		$allPriceArr1 = array();

		$allDateArr1 = array();

		$simpleAverage[0]=0;

		$medianAverage[0]=0;

		$minusFirstStandardDeviation[0]=0;

		$plusFirstStandardDeviation[0]=0;

		$minusSecondStandardDeviation[0]=0;

		$plusSecondStandardDeviation[0]=0;

		$percentile99[0] = 0;

		$percentile1[0] = 0;

		$c=0;

		$last_ema = 0;

		$ema[0] = 0;

		$last_ema1 = 0;

		$ema1 = array();

		$maxYAxix[0] = 0;



		if($get_period==0)

		{

			$period = 10;

		}

		else

		{

			if($get_period==1)

			{

				$period =2;

			}

			else

			{

				$period = $get_period;

			}

			

		}

		foreach($allExcelFileRecord as $val)

		{

			$price = str_replace(",","",$val[1]);

			$allDateArr1[] = "'".$val[0]."'";

			$allPriceArr1[] = $price;

			if($count==1)

			{

				$last_ema1 = $this->chart_model->calculate_exponential_median_average($price,$price,$period);

				$ema1[] = number_format($this->chart_model->calculate_exponential_median_average($price,$price,$period),2,".","");

			}

			else

			{

				$ema1[] = number_format($this->chart_model->calculate_exponential_median_average($last_ema1,$price,$period),2,".","");

				$last_ema1 = $this->chart_model->calculate_exponential_median_average($last_ema1,$price,$period);	

			}

			if($count==($period+$c))

			{

				$allDateArr[] = "'".$val[0]."'";

				$allPriceArr[] = number_format($price,2,".","");



				if($c==0)

				{

					$last_ema = $this->chart_model->calculate_exponential_median_average($price,$price,$period);

					$ema[$c] = number_format($this->chart_model->calculate_exponential_median_average($price,$price,$period),2,".","");

				}

				else

				{

					$ema[$c] = number_format($this->chart_model->calculate_exponential_median_average($last_ema,$price,$period),2,".","");

					$last_ema = $this->chart_model->calculate_exponential_median_average($last_ema,$price,$period);	

				}

				if($get_parameter==1 && $firstDeviation==0 && $secondDeviation==0 && $percentile99_1==0)

				{

					$medianAverage[$c]= number_format($this->chart_model->get_median_average($allExcelFileRecord,$c,$period),2,".","");

				}

				else if($get_parameter==1 && $firstDeviation==0 && $secondDeviation==0 && $percentile99_1==1)

				{

					$medianAverage[$c]= number_format($this->chart_model->get_median_average($allExcelFileRecord,$c,$period),2,".","");



					$percentile99[$c] = floor($this->chart_model->get_percentile($allExcelFileRecord,$c,$period,99));

					$percentile1[$c] = floor($this->chart_model->get_percentile($allExcelFileRecord,$c,$period,1));

				}

				else if($get_parameter==1 && $firstDeviation==0 && $secondDeviation==1 && $percentile99_1==0)

				{

					$medianAverage[$c]= number_format($this->chart_model->get_median_average($allExcelFileRecord,$c,$period),2,".","");



					$minusSecondStandardDeviation[$c] = number_format($this->chart_model->get_median_average($allExcelFileRecord,$c,$period)-(2*$this->chart_model->get_standard_deviation($allExcelFileRecord,$c,$period)),2,".","");

					$plusSecondStandardDeviation[$c] = number_format($this->chart_model->get_median_average($allExcelFileRecord,$c,$period)+(2*$this->chart_model->get_standard_deviation($allExcelFileRecord,$c,$period)),2,".","");



				}

				else if($get_parameter==1 && $firstDeviation==0 && $secondDeviation==1 && $percentile99_1==1)

				{

					$medianAverage[$c]= number_format($this->chart_model->get_median_average($allExcelFileRecord,$c,$period),2,".","");

					

					$minusSecondStandardDeviation[$c] = number_format($this->chart_model->get_median_average($allExcelFileRecord,$c,$period)-(2*$this->chart_model->get_standard_deviation($allExcelFileRecord,$c,$period)),2,".","");

					$plusSecondStandardDeviation[$c] = number_format($this->chart_model->get_median_average($allExcelFileRecord,$c,$period)+(2*$this->chart_model->get_standard_deviation($allExcelFileRecord,$c,$period)),2,".","");



					$percentile99[$c] = floor($this->chart_model->get_percentile($allExcelFileRecord,$c,$period,99));

					$percentile1[$c] = floor($this->chart_model->get_percentile($allExcelFileRecord,$c,$period,1));



				}

				else if($get_parameter==1 && $firstDeviation==1 && $secondDeviation==0 && $percentile99_1==0)

				{

					$medianAverage[$c]= number_format($this->chart_model->get_median_average($allExcelFileRecord,$c,$period),2,".","");

					

					$minusFirstStandardDeviation[$c] = number_format($this->chart_model->get_median_average($allExcelFileRecord,$c,$period)-$this->chart_model->get_standard_deviation($allExcelFileRecord,$c,$period),2,".","");

					$plusFirstStandardDeviation[$c] = number_format(($this->chart_model->get_median_average($allExcelFileRecord,$c,$period)+$this->chart_model->get_standard_deviation($allExcelFileRecord,$c,$period)),2,".","");



				}

				else if($get_parameter==1 && $firstDeviation==1 && $secondDeviation==0 && $percentile99_1==1)

				{

					$medianAverage[$c]= number_format($this->chart_model->get_median_average($allExcelFileRecord,$c,$period),2,".","");

					

					$minusFirstStandardDeviation[$c] = number_format($this->chart_model->get_median_average($allExcelFileRecord,$c,$period)-$this->chart_model->get_standard_deviation($allExcelFileRecord,$c,$period),2,".","");

					$plusFirstStandardDeviation[$c] = number_format(($this->chart_model->get_median_average($allExcelFileRecord,$c,$period)+$this->chart_model->get_standard_deviation($allExcelFileRecord,$c,$period)),2,".","");



					$percentile99[$c] = floor($this->chart_model->get_percentile($allExcelFileRecord,$c,$period,99));

					$percentile1[$c] = floor($this->chart_model->get_percentile($allExcelFileRecord,$c,$period,1));



				}

				else if($get_parameter==1 && $firstDeviation==1 && $secondDeviation==1 && $percentile99_1==0)

				{

					$medianAverage[$c]= number_format($this->chart_model->get_median_average($allExcelFileRecord,$c,$period),2,".","");

					

					$minusFirstStandardDeviation[$c] = number_format($this->chart_model->get_median_average($allExcelFileRecord,$c,$period)-$this->chart_model->get_standard_deviation($allExcelFileRecord,$c,$period),2,".","");

					$plusFirstStandardDeviation[$c] = number_format(($this->chart_model->get_median_average($allExcelFileRecord,$c,$period)+$this->chart_model->get_standard_deviation($allExcelFileRecord,$c,$period)),2,".","");

					$minusSecondStandardDeviation[$c] = number_format($this->chart_model->get_median_average($allExcelFileRecord,$c,$period)-(2*$this->chart_model->get_standard_deviation($allExcelFileRecord,$c,$period)),2,".","");

					$plusSecondStandardDeviation[$c] = number_format($this->chart_model->get_median_average($allExcelFileRecord,$c,$period)+(2*$this->chart_model->get_standard_deviation($allExcelFileRecord,$c,$period)),2,".","");				





				}

				else if($get_parameter==1 && $firstDeviation==1 && $secondDeviation==1 && $percentile99_1==1)

				{

					$medianAverage[$c]= number_format($this->chart_model->get_median_average($allExcelFileRecord,$c,$period),2,".","");



					$minusFirstStandardDeviation[$c] = number_format($this->chart_model->get_median_average($allExcelFileRecord,$c,$period)-$this->chart_model->get_standard_deviation($allExcelFileRecord,$c,$period),2,".","");

					$plusFirstStandardDeviation[$c] = number_format(($this->chart_model->get_median_average($allExcelFileRecord,$c,$period)+$this->chart_model->get_standard_deviation($allExcelFileRecord,$c,$period)),2,".","");

					$minusSecondStandardDeviation[$c] = number_format($this->chart_model->get_median_average($allExcelFileRecord,$c,$period)-(2*$this->chart_model->get_standard_deviation($allExcelFileRecord,$c,$period)),2,".","");

					$plusSecondStandardDeviation[$c] = number_format($this->chart_model->get_median_average($allExcelFileRecord,$c,$period)+(2*$this->chart_model->get_standard_deviation($allExcelFileRecord,$c,$period)),2,".","");



					$percentile99[$c] = floor($this->chart_model->get_percentile($allExcelFileRecord,$c,$period,99));

					$percentile1[$c] = floor($this->chart_model->get_percentile($allExcelFileRecord,$c,$period,1));

				}

				else if($get_parameter==2 && $firstDeviation==1 && $secondDeviation==1 && $percentile99_1==0)

				{

					$simpleAverage[$c]=number_format($this->chart_model->get_simple_average($allExcelFileRecord,$c,$period),2,".","");

					$minusFirstStandardDeviation[$c] = number_format($this->chart_model->get_simple_average($allExcelFileRecord,$c,$period)-$this->chart_model->get_standard_deviation($allExcelFileRecord,$c,$period),2,".","");



					$plusFirstStandardDeviation[$c] = number_format(($this->chart_model->get_simple_average($allExcelFileRecord,$c,$period)+$this->chart_model->get_standard_deviation($allExcelFileRecord,$c,$period)),2,".","");

					$minusSecondStandardDeviation[$c] = number_format($this->chart_model->get_simple_average($allExcelFileRecord,$c,$period)-(2*$this->chart_model->get_standard_deviation($allExcelFileRecord,$c,$period)),2,".","");

					$plusSecondStandardDeviation[$c] = number_format($this->chart_model->get_simple_average($allExcelFileRecord,$c,$period)+(2*$this->chart_model->get_standard_deviation($allExcelFileRecord,$c,$period)),2,".","");



				}

				else if($get_parameter==2 && $firstDeviation==1 && $secondDeviation==0 && $percentile99_1==0)

				{

					$simpleAverage[$c]=number_format($this->chart_model->get_simple_average($allExcelFileRecord,$c,$period),2,".","");

					$minusFirstStandardDeviation[$c] = number_format($this->chart_model->get_simple_average($allExcelFileRecord,$c,$period)-$this->chart_model->get_standard_deviation($allExcelFileRecord,$c,$period),2,".","");

					$plusFirstStandardDeviation[$c] = number_format(($this->chart_model->get_simple_average($allExcelFileRecord,$c,$period)+$this->chart_model->get_standard_deviation($allExcelFileRecord,$c,$period)),2,".","");

	

				}

				else if($get_parameter==2 && $firstDeviation==0 && $secondDeviation==1 && $percentile99_1==0)

				{

					$simpleAverage[$c]=number_format($this->chart_model->get_simple_average($allExcelFileRecord,$c,$period),2,".","");



					$minusSecondStandardDeviation[$c] = number_format($this->chart_model->get_simple_average($allExcelFileRecord,$c,$period)-(2*$this->chart_model->get_standard_deviation($allExcelFileRecord,$c,$period)),2,".","");

					$plusSecondStandardDeviation[$c] = number_format($this->chart_model->get_simple_average($allExcelFileRecord,$c,$period)+(2*$this->chart_model->get_standard_deviation($allExcelFileRecord,$c,$period)),2,".","");



				}

				else if($get_parameter==2 && $firstDeviation==0 && $secondDeviation==0 && $percentile99_1==0)

				{

					$simpleAverage[$c]=number_format($this->chart_model->get_simple_average($allExcelFileRecord,$c,$period),2,".","");

				}

				//

				else if($get_parameter==3 && $firstDeviation==1 && $secondDeviation==1 && $percentile99_1==0)

				{

					$minusFirstStandardDeviation[$c] = number_format($last_ema-$this->chart_model->get_standard_deviation($allExcelFileRecord,$c,$period),2,".","");

					$plusFirstStandardDeviation[$c] = number_format(($last_ema+$this->chart_model->get_standard_deviation($allExcelFileRecord,$c,$period)),2,".","");



					$minusSecondStandardDeviation[$c] = number_format($last_ema-(2*$this->chart_model->get_standard_deviation($allExcelFileRecord,$c,$period)),2,".","");

					$plusSecondStandardDeviation[$c] = number_format($last_ema+(2*$this->chart_model->get_standard_deviation($allExcelFileRecord,$c,$period)),2,".","");





				}

				else if($get_parameter==3 && $firstDeviation==1 && $secondDeviation==0 && $percentile99_1==0)

				{

					$minusFirstStandardDeviation[$c] = number_format($last_ema-$this->chart_model->get_standard_deviation($allExcelFileRecord,$c,$period),2,".","");

					$plusFirstStandardDeviation[$c] = number_format(($last_ema+$this->chart_model->get_standard_deviation($allExcelFileRecord,$c,$period)),2,".","");



				}

				else if($get_parameter==3 && $firstDeviation==0 && $secondDeviation==1 && $percentile99_1==0)

				{

					$minusSecondStandardDeviation[$c] = number_format($last_ema-(2*$this->chart_model->get_standard_deviation($allExcelFileRecord,$c,$period)),2,".","");

					$plusSecondStandardDeviation[$c] = number_format($last_ema+(2*$this->chart_model->get_standard_deviation($allExcelFileRecord,$c,$period)),2,".","");







				}	

				$maxYAxix[$c] = number_format($last_ema+(2*$this->chart_model->get_standard_deviation($allExcelFileRecord,$c,$period)),2,".","");

				$c++;	

			}

			$count++;

		}

		$paramName = '';

		$medianSimpleExpAverage = array();

		$dateArr = array();

		$priceArr = array();

		if($get_parameter==1)

		{

			$medianSimpleExpAverage = $medianAverage;

			$dateArr = $allDateArr;

			$priceArr = $allPriceArr;

			$paramName = 'Median Price';

		}

		else if($get_parameter==2)

		{

			$medianSimpleExpAverage = $simpleAverage;

			$dateArr = $allDateArr;

			$priceArr = $allPriceArr;

			$paramName = 'Simple Average';

		}

		else

		{

			$medianSimpleExpAverage = $ema;

			$dateArr = $allDateArr;

			$priceArr = $allPriceArr;

			$paramName = 'Exp. Average';

		}
		$minYAxix = min(($priceArr));
		/*$minYAxix = min(($priceArr));

		$minYAxix1 = 0;

		for($i=1;$i<=10;$i++)

		{

			if($minYAxix>$i)

			{

				$minYAxix1 = $minYAxix-$i;

				break;

			}

		}*/
		//$firstDeviation
		//$secondDeviation
		//$percentile99_1
		//percentile99
		//percentile1
		if($firstDeviation==0 && $secondDeviation==0 && $percentile99_1==1)
		{
			$minARR = array(
							min($priceArr),
							//min($minusFirstStandardDeviation),
							//min($minusSecondStandardDeviation),
							min($percentile1)
							);

			$maxARR = array(
							max($priceArr),
							//max($plusFirstStandardDeviation),
							//max($plusSecondStandardDeviation),
							max($percentile99)
							);

			if(strlen(current($minARR))>5)
			{
				$minYAxix1 = min($minARR)-20;
				$maxYAxix = max(($maxARR))+20;
			}
			else
			{
				$minYAxix1 = min($minARR);
				$maxYAxix = max(($maxARR));
			}
		}
		else if($firstDeviation==0 && $secondDeviation==1 && $percentile99_1==0)
		{
			$minARR = array(
							min($priceArr),
							//min($minusFirstStandardDeviation),
							min($minusSecondStandardDeviation),
							//min($percentile1)
							);

			$maxARR = array(
							max($priceArr),
							//max($plusFirstStandardDeviation),
							max($plusSecondStandardDeviation),
							//max($percentile99)
							);

			if(strlen(current($minARR))>5)
			{
				$minYAxix1 = min($minARR)-20;
				$maxYAxix = max(($maxARR))+20;
			}
			else
			{
				$minYAxix1 = min($minARR);
				$maxYAxix = max(($maxARR));
			}
		}
		else if($firstDeviation==0 && $secondDeviation==1 && $percentile99_1==1)
		{
			$minARR = array(
							min($priceArr),
							//min($minusFirstStandardDeviation),
							min($minusSecondStandardDeviation),
							min($percentile1)
							);

			$maxARR = array(
							max($priceArr),
							//max($plusFirstStandardDeviation),
							max($plusSecondStandardDeviation),
							max($percentile99)
							);
			if(strlen(current($minARR))>5)
			{
				$minYAxix1 = min($minARR)-20;
				$maxYAxix = max(($maxARR))+20;
			}
			else
			{
				$minYAxix1 = min($minARR);
				$maxYAxix = max(($maxARR));
			}
		}
		else if($firstDeviation==1 && $secondDeviation==0 && $percentile99_1==0)
		{
			$minARR = array(
							min($priceArr),
							min($minusFirstStandardDeviation),
							//min($minusSecondStandardDeviation),
							//min($percentile1)
							);

			$maxARR = array(
							max($priceArr),
							max($plusFirstStandardDeviation),
							//max($plusSecondStandardDeviation),
							//max($percentile99)
							);

			if(strlen(current($minARR))>5)
			{
				$minYAxix1 = min($minARR)-20;
				$maxYAxix = max(($maxARR))+20;
			}
			else
			{
				$minYAxix1 = min($minARR);
				$maxYAxix = max(($maxARR));
			}
		}
		else if($firstDeviation==1 && $secondDeviation==0 && $percentile99_1==1)
		{
			$minARR = array(
							min($priceArr),
							min($minusFirstStandardDeviation),
							//min($minusSecondStandardDeviation),
							min($percentile1)
							);

			$maxARR = array(
							max($priceArr),
							max($plusFirstStandardDeviation),
							//max($plusSecondStandardDeviation),
							max($percentile99)
							);
			if(strlen(current($minARR))>5)
			{
				$minYAxix1 = min($minARR)-20;
				$maxYAxix = max(($maxARR))+20;
			}
			else
			{
				$minYAxix1 = min($minARR);
				$maxYAxix = max(($maxARR));
			}
		}
		else if($firstDeviation==1 && $secondDeviation==1 && $percentile99_1==0)
		{
			$minARR = array(
							min($priceArr),
							min($minusFirstStandardDeviation),
							min($minusSecondStandardDeviation),
							//min($percentile1)
							);

			$maxARR = array(
							max($priceArr),
							max($plusFirstStandardDeviation),
							max($plusSecondStandardDeviation),
							//max($percentile99)
							);
			if(strlen(current($minARR))>5)
			{
				$minYAxix1 = min($minARR)-20;
				$maxYAxix = max(($maxARR))+20;
			}
			else
			{
				$minYAxix1 = min($minARR);
				$maxYAxix = max(($maxARR));
			}
		}
		else if($firstDeviation==1 && $secondDeviation==1 && $percentile99_1==1)
		{
			$minARR = array(
							min($priceArr),
							min($minusFirstStandardDeviation),
							min($minusSecondStandardDeviation),
							min($percentile1)
							);

			$maxARR = array(
							max($priceArr),
							max($plusFirstStandardDeviation),
							max($plusSecondStandardDeviation),
							max($percentile99)
							);
			if(strlen(current($minARR))>5)
			{
				$minYAxix1 = min($minARR)-20;
				$maxYAxix = max(($maxARR))+20;
			}
			else
			{
				$minYAxix1 = min($minARR);
				$maxYAxix = max(($maxARR));
			}
		}
		else
		{
			if(strlen(current($priceArr))>5)
			{
				$minYAxix1 = $minYAxix-20;
				$maxYAxix = max(($priceArr))+20;
			}
			else
			{
				$minYAxix1 = $minYAxix;
				$maxYAxix = max(($priceArr));
			}
		}
		

		$jgraph = '{

			"gui":{ 

              "contextMenu":{ 

                "button":{ 

                  "visible": false 

                } 

              } 

            },

            "type": "line",

            "utc": true,

            "plotarea": {

                "margin": "dynamic 45 60 dynamic",

            },

            "scale-x": {

                "labels": ['.implode(',', ($dateArr)).'],

            },

            "scale-y": {

            	

                "line-color": "#f6f7f8",

                "shadow": 0,

                "guide": {

                    "line-style": "dashed"

                },

                "minor-ticks": 0,

                "thousands-separator": ",",

                "min-value":'.$minYAxix1.',

                "max-value":'.$maxYAxix.',

                "step":4

            },

            "crosshair-x": {

                "line-color": "#ffff",

                "plot-label": {

                    "border-radius": "5px",

                    "border-width": "2px",

                    "border-color": "#063853",

                    "padding": "10px",

                    "font-weight": "bold",

                },

                "scale-label": {

                    "font-color": "#fff",

                    "background-color": "#063853",

                    "border-radius": "5px"

                }

            },

            "tooltip": {

                "visible": false

            },

            "plot": {

                "highlight":true,

                "tooltip-text": "%t views: %v<br>%k",

                "shadow": 0,

                "line-width": "3px",

                "marker": {

                    visible:false

                },

                "highlight-state": {

                    "line-width":3

                },

                "animation":{

                  "effect":1,

                  "sequence":2,

                  "speed":100,

                }

            },

            "series": [

                {

                   // "values": allPriceArr,

                    "values": ['.implode(',', ($priceArr)).'],

                    "text": "Price",

                    "line-color": "#1ea2fb",

                    legendMarker: {

                          type: "circle",

                          backgroundColor: "#1ea2fb",

                          borderColor: "#1ea2fb",

                          borderWidth: "1px",

                          shadow: false,

                          size: "5px"

                        },

                        marker: {

                          backgroundColor: "#1ea2fb",

                          borderColor: "#1ea2fb",

                          borderWidth: "1px",

                          shadow: false

                        }

                },

                {

                 	"values": ['.implode(',', ($medianSimpleExpAverage)).'],

                    //"values": EMA,

                    "text": "'.$paramName.'",

                    "line-color": "#64d641",

                    legendMarker: {

                          type: "circle",

                          backgroundColor: "#64d641",

                          borderColor: "#64d641",

                          borderWidth: "1px",

                          shadow: false,

                          size: "5px"

                        },

                        marker: {

                          backgroundColor: "#64d641",

                          borderColor: "#64d641",

                          borderWidth: "1px",

                          shadow: false

                        }



                },

                {

                    "values": ['.implode(',', ($minusSecondStandardDeviation)).'],

                    "text": "-2 STD DEV",

                    "line-color": "#f9ba26",

                    legendMarker: {

                          type: "circle",

                          backgroundColor: "#f9ba26",

                          borderColor: "#f9ba26",

                          borderWidth: "1px",

                          shadow: false,

                          size: "5px"

                        },

                        marker: {

                          backgroundColor: "#f9ba26",

                          borderColor: "#f9ba26",

                          borderWidth: "1px",

                          shadow: false

                        }



                },

                {

                    "values": ['.implode(',', ($plusSecondStandardDeviation)).'],

                    //"values": plusSecondStandardDeviation,

                    "text": "+2 STD DEV",

                    "line-color": "#f92e1f",

                    legendMarker: {

                          type: "circle",

                          backgroundColor: "#f92e1f",

                          borderColor: "#f92e1f",

                          borderWidth: "1px",

                          shadow: false,

                          size: "5px"

                        },

                        marker: {

                          backgroundColor: "#f92e1f",

                          borderColor: "#f92e1f",

                          borderWidth: "1px",

                          shadow: false

                        }

                },                

                {

                    "values":['.implode(',', ($minusFirstStandardDeviation)).'],

                    "text": "-1 STD DEV",

                    "line-color": "#c64786",

                    legendMarker: {

                          type: "circle",

                          backgroundColor: "#c64786",

                          borderColor: "#c64786",

                          borderWidth: "1px",

                          shadow: false,

                          size: "5px"

                        },

                        marker: {

                          backgroundColor: "#c64786",

                          borderColor: "#c64786",

                          borderWidth: "1px",

                          shadow: false

                        }



                },

                {

                    "values": ['.implode(',', ($plusFirstStandardDeviation)).'],

                    //"values": plusFirstStandardDeviation,

                    "text": "+1 STD DEV",

                    "line-color": "#5d5c5d",

                    legendMarker: {

                          type: "circle",

                          backgroundColor: "#5d5c5d",

                          borderColor: "#5d5c5d",

                          borderWidth: "1px",

                          shadow: false,

                          size: "5px"

                        },

                        marker: {

                          backgroundColor: "#5d5c5d",

                          borderColor: "#5d5c5d",

                          borderWidth: "1px",

                          shadow: false

                        }

 

                },

                {

                    "values": ['.implode(',', ($percentile99)).'],

                    "text": "99 PERCENTILE",

                    "line-color": "#0000ff",

                    legendMarker: {

                          type: "circle",

                          backgroundColor: "#0000ff",

                          borderColor: "#0000ff",

                          borderWidth: "1px",

                          shadow: false,

                          size: "5px"

                        },

                        marker: {

                          backgroundColor: "#0000ff",

                          borderColor: "#0000ff",

                          borderWidth: "1px",

                          shadow: false

                        }



                },

                {

                    "values": ['.implode(',', ($percentile1)).'],

                    "text": "1 PERCENTILE",

                    "line-color": "#cc99ff",

                    legendMarker: {

                          type: "circle",

                          backgroundColor: "#cc99ff",

                          borderColor: "#cc99ff",

                          borderWidth: "1px",

                          shadow: false,

                          size: "5px"

                        },

                        marker: {

                          backgroundColor: "#cc99ff",

                          borderColor: "#cc99ff",

                          borderWidth: "1px",

                          shadow: false

                        }

                }

            ]

        }';

		//echo $jgraph;
		$rrying = array('graphsdata'=>$jgraph);
		echo json_encode($rrying);

	}

	function edit_stock()

	{

		$this->common->ajax_check_user_login();

		$user_id = $this->session->userdata('user_id');

		$stock_id = $this->input->post('stock_id');

		$stockResult = $this->db->query("SELECT * FROM tbl_user_stock_management WHERE user_id='".$user_id."' AND id='".$stock_id."'")->row();

		echo json_encode($stockResult);

	}

	function edit_option_stock()

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

		$stock_price = $this->input->post('stock_price');

		if($stock_price=="")

		{

			$stock_price = 0;

		}

		$number = $this->input->post('number');

		if($number=="")

		{

			$number = 0;

		}

		$s_type = 1;

		$insertData = array(

							'user_id'=>$user_id,

							'stock_id'=>$stock_name,

							'order_type'=>$stock_type,

							'stock_price'=>$stock_price,

							'number'=>$number,

							'created_on'=>$created_on,

							);

		$getExistingStock = $this->db->query("SELECT * FROM tbl_user_stock_management WHERE user_id='".$user_id."' AND id='".$user_stock_id."'")->row();



		$remainingAmountToAdd = $this->common->checkMoneyUsesByUser($user_id)['rv']-($this->common->calculateTotalAddedStockMoney($user_id,$s_type)-($getExistingStock->stock_price*$getExistingStock->number));



		if($remainingAmountToAdd>=($stock_price*$number))

		{

			$this->db->where('id',$user_stock_id);

			$this->db->where('user_id',$user_id);

			$this->db->update('tbl_user_stock_management',$insertData);

			$insertDiaryData = array(

									'user_id'=>$user_id,

									'date_in'=>date('m/d/Y'),

									'product'=>$stock_name,

									'order_type'=>$stock_type,

									'volume'=>$number,

									'price_in'=>$stock_price,

									);

			$getLastDiaryId = $this->db->query("SELECT id FROM tbl_users_trading_diary WHERE portfolio_id='".$user_stock_id."' ORDER BY id DESC LIMIT 1");

			if($getLastDiaryId->num_rows()>0)

			{

				$this->db->where('id',$getLastDiaryId->row()->id);

				$this->db->update('tbl_users_trading_diary',$insertDiaryData);

			}			

			$responseArr = array(

								'res'=>1,

								'canSpendAmount'=>$this->common->checkMoneyUsesByUser($user_id)['rv'],

								'canSpendPercent'=>$this->common->checkMoneyUsesByUser($user_id)['rv_percent'],

								'alreadyInvestedAmount'=>$this->common->calculateTotalAddedStockMoney($user_id,$s_type),

								'remainingAmountToInvest'=>$this->common->checkMoneyUsesByUser($user_id)['rv']-$this->common->calculateTotalAddedStockMoney($user_id,$s_type)

								);

			echo json_encode($responseArr);

			

		}

		else

		{

			$totalRemainingAmountToAdd = $this->common->checkMoneyUsesByUser($user_id)['totalCanInvest']-($this->common->checkTotalAddedStock($user_id)-($getExistingStock->stock_price*$getExistingStock->number));

			if($totalRemainingAmountToAdd>=($stock_price*$number))

			{

				$responseArr = array(

								'res'=>2,

								'canSpendAmount'=>$this->common->checkMoneyUsesByUser($user_id)['rv'],

								'canSpendPercent'=>$this->common->checkMoneyUsesByUser($user_id)['rv_percent'],

								'alreadyInvestedAmount'=>$this->common->calculateTotalAddedStockMoney($user_id,$s_type),

								'remainingAmountToInvest'=>$this->common->checkMoneyUsesByUser($user_id)['totalCanInvest']-$this->common->checkTotalAddedStock($user_id)

								);

				echo json_encode($responseArr);

			}

			else

			{

				$responseArr = array(

							'res'=>3,

							'totalCanInvest'=>$this->common->checkMoneyUsesByUser($user_id)['totalCanInvest'],

							'remaingInvest'=>$this->common->checkMoneyUsesByUser($user_id)['totalCanInvest']-$this->common->checkTotalAddedStock($user_id),

							'alreadyInvested'=>$this->common->checkTotalAddedStock($user_id),

							'totalPercentCanInvest'=>$this->common->checkMoneyUsesByUser($user_id)['total_percent']

							);

				echo json_encode($responseArr);

			}

		}

			

	}

	function update_stock_with_against_suggestions_ajax()

	{

		$this->common->ajax_check_user_login();

		$user_id = $this->session->userdata('user_id');

		$created_on = date("Y-m-d H:i:s");

		$user_stock_id = $this->input->post('user_stock_id');

		$stock_name = $this->input->post('stock_name');

		$stock_type = $this->input->post('stock_type');

		$stock_price = $this->input->post('stock_price');

		if($stock_price=="")

		{

			$stock_price = 0;

		}

		$number = $this->input->post('number');

		if($number=="")

		{

			$number = 0;

		}

		$s_type = 1;

		$insertData = array(

							'user_id'=>$user_id,

							'stock_id'=>$stock_name,

							'order_type'=>$stock_type,

							'stock_price'=>$stock_price,

							'number'=>$number,

							'created_on'=>$created_on,

							);

		$getExistingStock = $this->db->query("SELECT * FROM tbl_user_stock_management WHERE user_id='".$user_id."' AND id='".$user_stock_id."'")->row();



		$totalRemainingAmountToAdd = $this->common->checkMoneyUsesByUser($user_id)['totalCanInvest']-($this->common->checkTotalAddedStock($user_id)-($getExistingStock->stock_price*$getExistingStock->number));



		if($totalRemainingAmountToAdd>=($stock_price*$number))

		{

			$this->db->where('id',$user_stock_id);

			$this->db->where('user_id',$user_id);

			$this->db->update('tbl_user_stock_management',$insertData);

			$insertDiaryData = array(

									'user_id'=>$user_id,

									'date_in'=>date('m/d/Y'),

									'product'=>$stock_name,

									'order_type'=>$stock_type,

									'volume'=>$number,

									'price_in'=>$stock_price,

									);



			$getLastDiaryId = $this->db->query("SELECT id FROM tbl_users_trading_diary WHERE portfolio_id='".$user_stock_id."' ORDER BY id DESC LIMIT 1");



			if($getLastDiaryId->num_rows()>0)

			{

				$this->db->where('id',$getLastDiaryId->row()->id);

				$this->db->update('tbl_users_trading_diary',$insertDiaryData);

			}	



			$responseArr = array(

							'res'=>1,

							'canSpendAmount'=>$this->common->checkMoneyUsesByUser($user_id)['rv'],

							'canSpendPercent'=>$this->common->checkMoneyUsesByUser($user_id)['rv_percent'],

							'alreadyInvestedAmount'=>$this->common->calculateTotalAddedStockMoney($user_id,$s_type),

							'remainingAmountToInvest'=>$this->common->checkMoneyUsesByUser($user_id)['totalCanInvest']-$this->common->checkTotalAddedStock($user_id)

							);

			echo json_encode($responseArr);

		}

		else

		{

			$responseArr = array(

						'res'=>2,

						'totalCanInvest'=>$this->common->checkMoneyUsesByUser($user_id)['totalCanInvest'],

						'remaingInvest'=>$this->common->checkMoneyUsesByUser($user_id)['totalCanInvest']-$this->common->checkTotalAddedStock($user_id),

						'alreadyInvested'=>$this->common->checkTotalAddedStock($user_id),

						'totalPercentCanInvest'=>$this->common->checkMoneyUsesByUser($user_id)['total_percent']

						);

			echo json_encode($responseArr);

		}



	}

	function update_option_stock_ajax()

	{

		$this->common->ajax_check_user_login();

		$user_id = $this->session->userdata('user_id');

		$created_on = date("Y-m-d H:i:s");

		$user_stock_id = $this->input->post('user_stock_id');

		$stock_name = $this->input->post('stock_name');

		$stock_price = $this->input->post('stock_price');

		$stock_type = $this->input->post('stock_type');

		$number = $this->input->post('number');

		$insertData = array(

							'user_id'=>$user_id,

							'stock_id'=>0,

							'stock_name'=>$stock_name,

							'stock_price'=>$stock_price,

							'order_type'=>$stock_type,

							'number'=>$number,

							'created_on'=>$created_on,

							);		

		

		//echo 1;	

		$getAddedRec = $this->db->query("SELECT `stock_price`,`number` FROM tbl_user_stock_management WHERE id='".$user_stock_id."'")->row();

		$alreadyUse = ($this->common->calculateTotalOptionStockMoney($user_id)+($stock_price*$number))-($getAddedRec->stock_price*$getAddedRec->number);

		$calculation =  $this->common->checkMoneyUsesByUser($user_id)['options'];

		//echo $alreadyUse."----".$calculation;die;

		if($calculation>=$alreadyUse)

		{

			$this->db->where('id',$user_stock_id);

			$this->db->where('user_id',$user_id);

			$this->db->update('tbl_user_stock_management',$insertData);

			echo 1;			

		}

		else

		{

			echo 2;

		}

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
	function cumnormdist($x) 
	{
	   $b1 = 0.319381530;
	   $b2 = -0.356563782;
	   $b3 = 1.781477937;
	   $b4 = -1.821255978;
	   $b5 = 1.330274429;
	   $p = 0.2316419;
	   $c = 0.39894228;

	   if ($x >= 0.0) 
	   {
	      $t = 1.0 / (1.0 + $p * $x);
	      return (1.0 - $c * exp(-$x * $x / 2.0) * $t *
	         ($t * ($t * ($t * ($t * $b5 + $b4) + $b3) + $b2) + $b1));
	   } 
	   else 
	   {
	      $t = 1.0 / (1.0 - $p * $x);
	      return ($c * exp(-$x * $x / 2.0) * $t *
	         ($t * ($t * ($t * ($t * $b5 + $b4) + $b3) + $b2) + $b1));
	   }
	}
	function testSmtp()
	{
		$this->load->library('email');
		$config  = array();
		$config['protocol']    = 'smtp9';
        $config['smtp_host']    = 'smtp9.gmoserver.jp';
        $config['smtp_port']    = '25';        
        $config['smtp_user']    = 'system@mulanchu.com';
        $config['smtp_pass']    = 'vVO2v$Fn';
        $config['charset']    = 'utf-8';
        $config['smtp_crypto']    = 'ssl';
        $config['_smtp_auth']    = TRUE;
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html';
        $config['validation'] = TRUE; 


        $this->email->initialize($config);
        $this->email->from('system@mulanchu.com','jai sri ram');
        $this->email->to('pankajmobapps@gmail.com');       
        $this->email->subject('test email');
        $this->email->message('testing message');  
        $this->email->send(); 
        show_error($this->email->print_debugger());
	}
	function mobileOptionPortFolioSimulation()
	{
		$user_id = $this->input->get('user_id');
		$stock_id = $this->input->get('stock_id');
		if($user_id=="" && $user_id==null)
		{
			echo "Please provide User Id";
			return false;
		}
		if($stock_id=="" && $stock_id==null)
		{
			echo "Please provide Stock Id";
			return false;
		}
		//$this->common->check_user_login();
		//$user_id = $this->session->userdata('user_id');
		$data = array();
		//$stock_id = base64_decode(base64_decode($stock_id));
		//echo $stock_id;die;
		$data['title'] = 'Stock Portfolio | Five Percent';
		$data['sub_title'] = 'Stock Portfolio';
		$data['stock_details'] = $this->db->query("SELECT * FROM tbl_user_stock_management   WHERE id='".$stock_id."' AND user_id='".$user_id."' ")->row();
		//echo "<pre>";print_r($data['stock_details']);die();
		//echo $this->cumnormdist(0.412215809);die;
		//getOptionValues($actualPrice,$basic,$maturity,$volatility,$interest,$strikePrice,$dividend,$underlyingValue,$flag)
		$optionOne = $this->getOptionValues(8500.00,365,30,20.00,0.00,8300.00,0.00,8500.00,0);
		$optionTwo = $this->getOptionValues(8500.00,365,30,20.00,0.00,8700.00,0.00,8500.00,0);
		//echo "<pre>";print_r($optionOne);
		//echo "<pre>";print_r($optionTwo);die();
		/*echo implode(',',$optionOne['sellCallArray'])."<br>";
		echo implode(',',$optionTwo['sellCallArray']);*/
		/*echo "<pre>"; print_r($optionOne['sellCallArray']);
		echo "<pre>"; print_r($optionTwo);
		echo "Total Premium Call = ".($optionOne['callValue']+$optionTwo['callValue']);
		echo "<br>Total Premium Put = ".($optionOne['putValue']+$optionTwo['putValue']);
		
		die;*/
		$data['sellCallArray1'] = implode(',',$optionOne['sellCallArray']);
		$data['sellCallArray2'] = implode(',',$optionTwo['sellCallArray']);

		/*$data['sellCallArray1'] = implode(',',$optionOne['sellPutArray']);
		$data['sellCallArray2'] = implode(',',$optionTwo['sellCallArray']);*/

		/*$data['sellCallArray1'] = implode(',',$optionOne['buyCallArray']);
		$data['sellCallArray2'] = implode(',',$optionTwo['sellCallArray']);*/

		//$data['sellCallArray1'] = implode(',',$optionOne['buyPutArray']);
		//$data['sellCallArray2'] = implode(',',$optionTwo['sellCallArray']);
		//echo "<pre>";print_r($data['stock_details']);die;
		/*for one*/
		$data['optionsOneVal'] = $optionOne;
		$data['optionsTwoVal'] = $optionTwo;
		//echo "<pre>";print_r($data['optionsOneVal']);die();
		$myConfig = '{
            "type": "line",
            "utc": true,
            "scale-x":{
			    "labels": ['.implode(',',$optionOne['xAxix']).'],
			    "item":{
			      "visible":true
			    },
			},
            "series": [
                        {
                            "values": ['.$data['sellCallArray1'].'],
                            "line-color": "#ed7d31",
                            "line-width": "5px",
                            "marker": {
                                "background-color": "#ed7d31",
                                "border-width": 0,
                                "shadow": 0,
                                "border-color": "#ed7d31"
                            },
                           "marker": {
                              "visible":false
                            },
                        },
                        {
                            "values": ['.$data['sellCallArray2'].'],
                            "line-color": "#5b9bd5",
                            "line-width": "5px",
                              "marker": {
                                "background-color": "#5b9bd5",
                                "border-width": 0,
                                "shadow": 0,
                                "border-color": "#5b9bd5"
                              },
                            "marker": {
                              "visible":false
                            },
                        }
                        
                      ]
        }';
        $data['graphs'] = $myConfig;
        //echo $myConfig;die();

		$this->load->view('page/portfolio/mobileOptionPortfolioSimulation',$data);
	}
	function getOptionValues($actualPrice,$basic,$maturity,$volatility,$interest,$strikePrice,$dividend,$underlyingValue,$flag)
	{
		$data = array();
		$buySell = 1;
		$callPut = 1;
		//$actualPrice = 8500.00;
		//$basic = 365;
		//$maturity = 30;
		$yearFactor = $maturity/$basic;
		//echo $yearFactor;die;
		//$volatility = 20.00;
		//$interest = 0.00;
		$optionType = "European";
		//$strikePrice = 8300.00;
		//$dividend = 0.00;

		//$underlyingValue = 8500.00;

		$dividendT = 0;
		$dividendT =  exp(-(($dividend/100)*$yearFactor));
		//echo $dividendT;die;

		//$lnT = number_format((2.303*log(($range/$variances[$key+1]),10))*100,2,".","");
		

		
		$interestT = 0;
		$interestT = exp(-(($interest/100)*$yearFactor));
		//echo $interestT;die;

		$sigmaT = ($volatility/100)*sqrt($yearFactor);
		//echo $sigmaT;die();


		$lnT = 2.303*log(($actualPrice/($strikePrice*$interestT)),10);
		//$lnT = 2.303*log((10201/(10000*0.995898844)),10);
		//echo $lnT;die();
		$d1 = 0;
		$d1 = ($lnT/$sigmaT)+($sigmaT/2);
		//echo $d1;die();

		$d2 = 0;
		$d2 = $d1-$sigmaT;
		//echo $d2;die();

		$oneParte = 0;
		$oneParte = 1/(sqrt(2*pi()));
		$twoParate = exp(-$d1/2);
		//echo $twoParate;die;

		$brakeEven = 0;
		$premium1 = 0;
		// for call 
		$premium1 = 392.7466641;

		$nd1 = 0;
		$nd1 = $this->cumnormdist($d1);
		$nd2 = 0;
		$nd2 = $this->cumnormdist($d2);

		$negativeND1 = 0;
		$negativeND1 = $this->cumnormdist(-$d1);
		
		$negativeND2 = 0;
		$negativeND2 = $this->cumnormdist(-$d2);

		//echo $negativeND2;die();

		$callValue = 0;
		$callValue = ($underlyingValue*$nd1)-($strikePrice*$interestT*$nd2);
		$data['callValue'] = $callValue;
		//echo $callValue;die();
		$putValue = 0;
		$putValue = ($strikePrice*$interestT*$negativeND2)-($underlyingValue*$negativeND1);
		$data['putValue'] = $putValue;
		//echo $putValue;die();

		$premium2 = 0;
		$premium2 = 187.91;


		$intrinsicValueCall = 0;
		$intrinsicValueCall = max(($underlyingValue-$strikePrice),0);
		$data['intrinsicValueCall'] = $intrinsicValueCall;

		$intrinsicValuePut = 0;
		$intrinsicValuePut = max(($strikePrice-$underlyingValue),0);
		$data['intrinsicValuePut'] = $intrinsicValuePut;

		//echo $intrinsicValuePut;die();

		$temporaryValueCall = 0;
		$temporaryValueCall = $callValue-$intrinsicValueCall;
		$data['temporaryValueCall'] = $temporaryValueCall;

		$temporaryValuePut = 0;
		$temporaryValuePut = $putValue-$intrinsicValuePut;
		$data['temporaryValuePut'] = $temporaryValuePut;
		//echo $temporaryValuePut;die();

		$brakeEven = $strikePrice+($premium1+$premium2);

		$moneyNess = 0;
		$moneyNess = $strikePrice/$actualPrice;
		$data['moneyNess'] = $moneyNess;

		$negationD1 = $oneParte*$twoParate;
		//echo $negationD1;die();

		$deltaCall = 0;
		$deltaCall = $dividendT*$nd1;
		//echo $deltaCall;die();
		$data['deltaCall'] = $deltaCall;

		$deltaPut = 0;
		$deltaPut = $dividendT*($nd1-1);
		//echo $deltaPut;die();
		$data['deltaPut'] = $deltaPut;

		$gamma = 0;
		$gamma = $negationD1/($underlyingValue*$sigmaT);
		$data['gamma'] = $gamma;
		//echo $gamma;die();
		$parateOneAgain = 0;
		$parateOneAgain = -($underlyingValue*$negationD1*($volatility/100));

		$parateTwoAgain = 0;
		$parateTwoAgain = 2*sqrt($yearFactor);

		$parateThreeAgain = 0;
		$parateThreeAgain = $interest*$interestT*$strikePrice*$nd2;

		//echo $parateThreeAgain;die;
		$thetaCall = 0;
		$thetaCall = (($parateOneAgain/$parateTwoAgain)-$parateThreeAgain)/$basic;
		$data['thetaCall'] = $thetaCall;

		$paratePutOne = 0;
		$paratePutOne = -($underlyingValue*$negationD1*($volatility/100));

		$paratePutTwo = 0;
		$paratePutTwo = 2*sqrt($yearFactor);

		$paratePutThree = 0;
		$paratePutThree = $interest*$interestT*$strikePrice*$nd2;

		$thetaPut = 0;
		$thetaPut = (($paratePutOne/$paratePutTwo)+$paratePutThree)/$basic;
		$data['thetaPut'] = $thetaPut;
		$vega = 0;
		$vega = ($underlyingValue*sqrt($yearFactor)*$negationD1)/100;
		$data['vega'] = $vega;

		$volga = 0;
		$volga = ($underlyingValue*sqrt($yearFactor)*$d1*$d2*$negationD1)/100;
		$data['volga'] = $volga;

		$vanna = 0;		
		$vanna = (-$d2*$negationD1)/($volatility/100);
		$data['vanna'] = $vanna;
		//echo $vanna;die();
		//echo $moneyNess;die;
		if($flag==1)
		{
			$callValue = $putValue;
		}

		$firstScaleValue = 100;

		$scaleArray = array(7200.00,7300.00,7400.00,7500.00,7600.00,7700.00,7800.00,7900.00,8000.00,8100.00,8200.00,8300.00,8400.00,8500.00,8600.00,8700.00,8800.00,8900.00,9000.00,9100.00,9200.00,9300.00,9400.00,9500.00,9600.00,9700.00,9800.00,9900.00,10000.00);
		$scaleArray1 = array_reverse($scaleArray);
		//echo "<pre>";print_r($scaleArray);die();
		$increment = 1;
		$newScale = array();
		$lastVal = 0;
		foreach($scaleArray1 as $scale)
		{

			if($increment==1)
			{
				$newScale[] = $scale;

			}
			else
			{
				$newScale[] = $lastVal - $firstScaleValue;
			}
			$lastVal = $scale;
			$increment++;		

		}
		//echo "<pre>";print_r($scaleArray1);
		//echo "<pre>";print_r(array_reverse($newScale));
		//die();
		$buyCallArray = array();
		$sellCallArray = array();
		
		$increment = 1;
		$buyCallPreviousVal = 0;
		$sellCallPreviousVal = 0;

		$buyPutPreviousVal = 0;
		$sellPutPreviousVal = 0;

		$previousVal = 0;
		//echo "<pre>";print_r(array_reverse($newScale));die;
		foreach(array_reverse($newScale) as $val)
		{
			if($increment==1)
			{
				if($val<=$strikePrice)
				{
					$buyCallArray[] = number_format(-$callValue,2,".","");
					$buyCallPreviousVal = number_format(-$callValue,2,".","");
					$sellCallArray[] = number_format($callValue,2,".","");
					$sellCallPreviousVal = $callValue;
				}
				else
				{
					$buyCallArray[] = number_format(0,2,".","");
					$buyCallPreviousVal = number_format(0,2,".","");

					$sellCallArray[] = number_format(0,2,".","");
					$sellCallPreviousVal = number_format(0,2,".","");
				}
			}
			else
			{
				if($val<=$strikePrice)
				{
					$buyCallArray[] = number_format(-$callValue,2,".","");
					$buyCallPreviousVal = number_format(-$callValue,2,".","");

					$sellCallArray[] = number_format($callValue,2,".","");
					$sellCallPreviousVal = number_format($callValue,2,".","");
				}
				else
				{
					$buyCallArray[] = number_format((($val-$previousVal)+$buyCallPreviousVal),2,".","");
					$buyCallPreviousVal = ($val-$previousVal)+$buyCallPreviousVal;

					$sellCallArray[] = number_format(($sellCallPreviousVal-($val-$previousVal)),2,".","");
					$sellCallPreviousVal = $sellCallPreviousVal-($val-$previousVal);
				}
			}
			$previousVal = $val;
			$increment++;
		}
		//echo "<pre>buy call -- ";print_r($buyCallArray);
		//echo "<pre>sell call -- ";print_r($sellCallArray);
		//die();
		$data['buyCallArray'] = $buyCallArray;
		$data['sellCallArray'] = $sellCallArray;
		$buyPutArray = array();
		$sellPutArray = array();

		$buyPutPreviousVal = 0;
		$sellPutPreviousVal = 0;

		$previousVal = 0;

		$increment = 1;
		$lastBuyPutVal = 0;
		$lastSellPutVal = 0;
		foreach($scaleArray1 as $val)
		{
			if($increment==1)
			{
				$buyPutArray[] = number_format(-$callValue,2,".","");
				$lastBuyPutVal = number_format(-$callValue,2,".","");

				$sellPutArray[] = number_format($callValue,2,".","");
				$lastSellPutVal = number_format($callValue,2,".","");
			}
			else
			{
				if($val>=$strikePrice)
				{
					$buyPutArray[] = number_format(-$callValue,2,".","");
					$lastBuyPutVal = number_format(-$callValue,2,".","");

					$sellPutArray[] = number_format($callValue,2,".","");
					$lastSellPutVal = number_format($callValue,2,".","");
				}
				else
				{
					$buyPutArray[] = number_format(($lastBuyPutVal+($previousVal-$val)),2,".","");
					$lastBuyPutVal = number_format(($lastBuyPutVal+($previousVal-$val)),2,".","");

					$sellPutArray[] = number_format(($lastSellPutVal-($previousVal-$val)),2,".","");
					$lastSellPutVal = number_format(($lastSellPutVal-($previousVal-$val)),2,".","");
				}
			}
			$previousVal = $val;

			$increment++;	

		}
		//echo "<pre>buy put --- ";print_r(array_reverse($buyPutArray));
		//echo "<pre>sell put --- ";print_r(array_reverse($sellPutArray));die();
		$data['buyPutArray'] = array_reverse($buyPutArray);
		$data['sellPutArray'] = array_reverse($sellPutArray);
		$data['xAxix'] = $scaleArray;
		//die();
		return $data;
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
		$data['stock_details'] = $this->db->query("SELECT * FROM tbl_user_stock_management   WHERE id='".$stock_id."' AND user_id='".$user_id."' ")->row();
		//echo $this->cumnormdist(0.412215809);die;
		//getOptionValues($actualPrice,$basic,$maturity,$volatility,$interest,$strikePrice,$dividend,$underlyingValue,$flag)
		$optionOne = $this->getOptionValues(8500.00,365,30,20.00,0.00,8300.00,0.00,8500.00,0);
		$optionTwo = $this->getOptionValues(8500.00,365,30,20.00,0.00,8700.00,0.00,8500.00,0);
		//echo "<pre>";print_r($optionOne);
		//echo "<pre>";print_r($optionTwo);die();
		/*echo implode(',',$optionOne['sellCallArray'])."<br>";
		echo implode(',',$optionTwo['sellCallArray']);*/
		/*echo "<pre>"; print_r($optionOne['sellCallArray']);
		echo "<pre>"; print_r($optionTwo);
		echo "Total Premium Call = ".($optionOne['callValue']+$optionTwo['callValue']);
		echo "<br>Total Premium Put = ".($optionOne['putValue']+$optionTwo['putValue']);
		
		die;*/
		$data['sellCallArray1'] = implode(',',$optionOne['sellCallArray']);
		$data['sellCallArray2'] = implode(',',$optionTwo['sellCallArray']);

		/*$data['sellCallArray1'] = implode(',',$optionOne['sellPutArray']);
		$data['sellCallArray2'] = implode(',',$optionTwo['sellCallArray']);*/

		/*$data['sellCallArray1'] = implode(',',$optionOne['buyCallArray']);
		$data['sellCallArray2'] = implode(',',$optionTwo['sellCallArray']);*/

		//$data['sellCallArray1'] = implode(',',$optionOne['buyPutArray']);
		//$data['sellCallArray2'] = implode(',',$optionTwo['sellCallArray']);
		//echo "<pre>";print_r($data['stock_details']);die;
		/*for one*/
		$data['optionsOneVal'] = $optionOne;
		$data['optionsTwoVal'] = $optionTwo;
		//echo "<pre>";print_r($data['optionsOneVal']);die();
		$myConfig = '{
            "type": "line",
            "utc": true,
            "scale-x":{
			    "labels": ['.implode(',',$optionOne['xAxix']).'],
			    "item":{
			      "visible":true
			    },
			},
            "series": [
                        {
                            "values": ['.$data['sellCallArray1'].'],
                            "line-color": "#ed7d31",
                            "line-width": "5px",
                            "marker": {
                                "background-color": "#ed7d31",
                                "border-width": 0,
                                "shadow": 0,
                                "border-color": "#ed7d31"
                            },
                           "marker": {
                              "visible":false
                            },
                        },
                        {
                            "values": ['.$data['sellCallArray2'].'],
                            "line-color": "#5b9bd5",
                            "line-width": "5px",
                              "marker": {
                                "background-color": "#5b9bd5",
                                "border-width": 0,
                                "shadow": 0,
                                "border-color": "#5b9bd5"
                              },
                            "marker": {
                              "visible":false
                            },
                        }
                        
                      ]
        }';
        $data['graphs'] = $myConfig;
        //echo $myConfig;die();

		$this->load->view('page/portfolio/option_stock_portfolio_details',$data);
	}
	function getOptionOneOptionTwoDataOnchange()
	{
		$actualPrice = $this->input->post('actualPrice');
		$baseDays = $this->input->post('baseDays');
		$maturityDyas = $this->input->post('maturityDyas');
		$volalitilyInput = $this->input->post('volalitilyInput');
		$interestInput = $this->input->post('interestInput');
		$dividendInput = $this->input->post('dividendInput');
		$strikePriceInput1 = $this->input->post('strikePriceInput1');
		$strikePriceInput2 = $this->input->post('strikePriceInput2');
		$num1 = $this->input->post('num1');
		$num2 = $this->input->post('num2');

		if($num1=='C_CALL' && $num2=='0')
		{
			$flag1 = 0; 
			$flag2 = 0; 
		}
		if($num1=='V_CALL' && $num2=='0')
		{
			$flag1 = 1; 
			$flag2 = 1;
		}
		if($num1=='C_CALL' && $num2=='V_CALL')
		{
			$flag1 = 0; 
			$flag2 = 1;
		}
		//==========
		if($num1=='V_CALL' && $num2=='C_CALL')
		{
			$flag1 = 1; 
			$flag2 = 0;
		}
		
		if($num1=='V_CALL' && $num2=='C_PVT')
		{
			$flag1 = 1; 
			$flag2 = 0;
		}

		if($num1=='C_PVT' && $num2=='0')
		{
			$flag1 = 0; 
			$flag2 = 0;
		}
		
		if($num1=='C_PVT' && $num2=='V_PVT')
		{
			$flag1 = 0; 
			$flag2 = 1;
		}

		if($num1=='V_PVT' && $num2=='C_PVT')
		{
			$flag1 = 1; 
			$flag2 = 0;
		}

		if($num1=='V_PVT' && $num2=='0')
		{
			$flag1 = 1; 
			$flag2 = 0;
		}
		
		if($num1=='C_PVT' && $num2=='V_CALL')
		{
			$flag1 = 0; 
			$flag2 = 1;
		}

		if($num1=='C_CALL' && $num2=='V_PVT')
		{
			$flag1 = 0; 
			$flag2 = 1;
		}

		if($num1=='V_CALL' && $num2=='V_PVT')
		{
			$flag1 = 1; 
			$flag2 = 1;
		}

		if($num1=='V_PVT' && $num2=='C_CALL')
		{
			$flag1 = 1; 
			$flag2 = 0;
		}
		if($num1=='C_PVT' && $num2=='C_CALL')
		{
			$flag1 = 0; 
			$flag2 = 0;
		}
		if($num1=='V_PVT' && $num2=='V_CALL')
		{
			$flag1 = 1; 
			$flag2 = 1;
		}
		if($num1=='C_CALL' && $num2=='C_PVT')
		{
			$flag1 = 0; 
			$flag2 = 0;
		}

		//getOptionValues($actualPrice,$basic,$maturity,$volatility,$interest,$strikePrice,$dividend,$underlyingValue,$flag)
		$optionOne = $this->getOptionValues($actualPrice,$baseDays,$maturityDyas,$volalitilyInput,$interestInput,$strikePriceInput1,$dividendInput,$actualPrice,$flag1);
		$optionTwo = $this->getOptionValues($actualPrice,$baseDays,$maturityDyas,$volalitilyInput,$interestInput,$strikePriceInput2,$dividendInput,$actualPrice,$flag2);

		/*if($num==1)
		{
			$data['sellCallArray1'] = implode(',',$optionOne['sellCallArray']);
			$data['sellCallArray2'] = implode(',',$optionTwo['sellCallArray']);
		}
		if($num==2)
		{
			$data['sellCallArray1'] = implode(',',$optionOne['sellPutArray']);
			$data['sellCallArray2'] = implode(',',$optionTwo['sellCallArray']);
		}
		if($num==3)
		{
			$data['sellCallArray1'] = implode(',',$optionOne['buyCallArray']);
			$data['sellCallArray2'] = implode(',',$optionTwo['sellCallArray']);
		}
		if($num==4)
		{
			$data['sellCallArray1'] = implode(',',$optionOne['buyPutArray']);
			$data['sellCallArray2'] = implode(',',$optionTwo['sellCallArray']);
		}*/
		$recordArr = array();
		$config = '';
		if($num1=='C_CALL' && $num2=='0')
		{
			$config = '{
                            "values": ['.implode(',',$optionOne['sellCallArray']).'],
                            "line-color": "#5b9bd5",
                            "line-width": "4px",
                              "marker": {
                                "background-color": "#5b9bd5",
                                "border-width": 0,
                                "shadow": 0,
                                "border-color": "#5b9bd5",

                              },
                            "marker": {
                              "visible":false
                            },
                        }';
            //option one
            if(($optionOne['moneyNess']*100)<100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% ITM";
            }
            else if(($optionOne['moneyNess']*100)>100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% OTM";
            }
            else if(($optionOne['moneyNess']*100)==100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% ATM";
            }
            //option two
            if(($optionTwo['moneyNess']*100)<100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% ITM";
            }
            else if(($optionTwo['moneyNess']*100)>100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% OTM";
            }
            else if(($optionTwo['moneyNess']*100)==100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% ATM";
            }

            //call put val
            //option 1
            $recordArr['optionOnecallValue'] = number_format($optionOne['callValue'],2,".","");
			$recordArr['optionOneintrinsicValueCall'] = number_format($optionOne['intrinsicValueCall'],2,".","");
			$recordArr['optionOnetemporaryValueCall'] = number_format($optionOne['temporaryValueCall'],2,".","");
			$recordArr['optionOnedeltaCall'] = number_format($optionOne['deltaCall'],3,".","");
			$recordArr['optionOnethetaCall'] = number_format($optionOne['thetaCall'],3,".","");
			//option 2
			$recordArr['optionTwocallValue'] = number_format(0,2,".","");
			$recordArr['optionTwointrinsicValueCall'] = number_format(0,2,".","");
			$recordArr['optionTwotemporaryValueCall'] = number_format(0,2,".","");
			$recordArr['optionTwodeltaCall'] = number_format(0,3,".","");
			$recordArr['optionTwothetaCall'] = number_format(0,3,".","");
			//totalcalculation
			$recordArr['totalPremium'] = number_format(($optionOne['callValue']),2,".","");

			$recordArr['deltaTotal'] = number_format(($optionOne['deltaCall']),3,".","");
			$recordArr['thetaTotal'] = number_format(($optionOne['thetaCall']),3,".","");

			//common 
			$recordArr['optionOnegamma'] = number_format($optionOne['gamma'],3,".","");	
			$recordArr['optionOnevega'] = number_format($optionOne['vega'],3,".","");
			$recordArr['optionOnevolga'] = number_format($optionOne['volga'],3,".","");
			$recordArr['optionOnevanna'] = number_format($optionOne['vanna'],3,".","");
			
			$recordArr['optionTwogamma'] = number_format(0,3,".","");
			$recordArr['optionTwovega'] = number_format(0,3,".","");
			$recordArr['optionTwovolga'] = number_format(0,3,".","");
			$recordArr['optionTwovanna'] = number_format(0,3,".","");

			$recordArr['gammaTotal'] = number_format(($optionOne['gamma']),3,".","");
			$recordArr['vegaTotal'] = number_format(($optionOne['vega']),3,".","");
			$recordArr['volgaTotal'] = number_format(($optionOne['volga']),3,".","");
			$recordArr['vannaTotal'] = number_format(($optionOne['vanna']),3,".","");
           
		}
		if($num1=='V_CALL' && $num2=='0')
		{
            $config = '{
                            "values": ['.implode(',',$optionOne['sellPutArray']).'],
                            "line-color": "#5b9bd5",
                            "line-width": "5px",
                              "marker": {
                                "background-color": "#5b9bd5",
                                "border-width": 0,
                                "shadow": 0,
                                "border-color": "#5b9bd5"
                              },
                            "marker": {
                              "visible":false
                            },
                        }';

                        //option one
            if(($optionOne['moneyNess']*100)<100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% OTM";
            }
            else if(($optionOne['moneyNess']*100)>100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% ITM";
            }
            else if(($optionOne['moneyNess']*100)==100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% ATM";
            }
            //option two
            if(($optionTwo['moneyNess']*100)<100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% OTM";
            }
            else if(($optionTwo['moneyNess']*100)>100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% ITM";
            }
            else if(($optionTwo['moneyNess']*100)==100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% ATM";
            }

            //call put val
            //option 1
            $recordArr['optionOnecallValue'] = number_format($optionOne['putValue'],2,".","");
			$recordArr['optionOneintrinsicValueCall'] = number_format($optionOne['intrinsicValuePut'],2,".","");
			$recordArr['optionOnetemporaryValueCall'] = number_format($optionOne['temporaryValuePut'],2,".","");
			$recordArr['optionOnedeltaCall'] = number_format($optionOne['deltaPut'],3,".","");
			$recordArr['optionOnethetaCall'] = number_format($optionOne['thetaPut'],3,".","");
			//option 2
			$recordArr['optionTwocallValue'] = number_format(0,2,".","");
			$recordArr['optionTwointrinsicValueCall'] = number_format(0,2,".","");
			$recordArr['optionTwotemporaryValueCall'] = number_format(0,2,".","");
			$recordArr['optionTwodeltaCall'] = number_format(0,3,".","");
			$recordArr['optionTwothetaCall'] = number_format(0,3,".","");
			//totalcalculation
			$recordArr['totalPremium'] = number_format(($optionOne['putValue']),2,".","");
			$recordArr['deltaTotal'] = number_format(($optionOne['deltaPut']),3,".","");
			$recordArr['thetaTotal'] = number_format(($optionOne['thetaPut']),3,".","");
			//common 
			$recordArr['optionOnegamma'] = number_format($optionOne['gamma'],3,".","");	
			$recordArr['optionOnevega'] = number_format($optionOne['vega'],3,".","");
			$recordArr['optionOnevolga'] = number_format($optionOne['volga'],3,".","");
			$recordArr['optionOnevanna'] = number_format($optionOne['vanna'],3,".","");
			
			$recordArr['optionTwogamma'] = number_format(0,3,".","");
			$recordArr['optionTwovega'] = number_format(0,3,".","");
			$recordArr['optionTwovolga'] = number_format(0,3,".","");
			$recordArr['optionTwovanna'] = number_format(0,3,".","");

			$recordArr['gammaTotal'] = number_format(($optionOne['gamma']),3,".","");
			$recordArr['vegaTotal'] = number_format(($optionOne['vega']),3,".","");
			$recordArr['volgaTotal'] = number_format(($optionOne['volga']),3,".","");
			$recordArr['vannaTotal'] = number_format(($optionOne['vanna']),3,".","");
		}
		if($num1=='C_CALL' && $num2=='V_CALL')
		{
			$config = '
                        {
                            "values": ['.implode(',',$optionTwo['sellPutArray']).'],
                            "line-color": "#ed7d31",
                            "line-width": "5px",
                            "marker": {
                                "background-color": "#ed7d31",
                                "border-width": 0,
                                "shadow": 0,
                                "border-color": "#ed7d31"
                            },
                           "marker": {
                              "visible":false
                            },
                        },
                        {
                            "values": ['.implode(',',$optionOne['sellCallArray']).'],
                            "line-color": "#5b9bd5",
                            "line-width": "5px",
                              "marker": {
                                "background-color": "#5b9bd5",
                                "border-width": 0,
                                "shadow": 0,
                                "border-color": "#5b9bd5"
                              },
                            "marker": {
                              "visible":false
                            },
                        }';
            //option one
            if(($optionOne['moneyNess']*100)<100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% ITM";
            }
            else if(($optionOne['moneyNess']*100)>100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% OTM";
            }
            else if(($optionOne['moneyNess']*100)==100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% ATM";
            }
            //option two
            if(($optionTwo['moneyNess']*100)<100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% OTM";
            }
            else if(($optionTwo['moneyNess']*100)>100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% ITM";
            }
            else if(($optionTwo['moneyNess']*100)==100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% ATM";
            }
            //call put val
            //option 1
            $recordArr['optionOnecallValue'] = number_format($optionOne['callValue'],2,".","");
			$recordArr['optionOneintrinsicValueCall'] = number_format($optionOne['intrinsicValueCall'],2,".","");
			$recordArr['optionOnetemporaryValueCall'] = number_format($optionOne['temporaryValueCall'],2,".","");
			$recordArr['optionOnedeltaCall'] = number_format($optionOne['deltaCall'],3,".","");
			$recordArr['optionOnethetaCall'] = number_format($optionOne['thetaCall'],3,".","");
			//option 2
			$recordArr['optionTwocallValue'] = number_format($optionTwo['putValue'],2,".","");
			$recordArr['optionTwointrinsicValueCall'] = number_format($optionTwo['intrinsicValuePut'],2,".","");
			$recordArr['optionTwotemporaryValueCall'] = number_format($optionTwo['temporaryValuePut'],2,".","");
			$recordArr['optionTwodeltaCall'] = number_format($optionTwo['deltaPut'],3,".","");
			$recordArr['optionTwothetaCall'] = number_format($optionTwo['thetaPut'],3,".","");
			//totalcalculation
			$recordArr['totalPremium'] = number_format(($optionOne['callValue']+$optionTwo['putValue']),2,".","");
			$recordArr['deltaTotal'] = number_format(($optionOne['deltaCall']+$optionTwo['deltaPut']),3,".","");
			$recordArr['thetaTotal'] = number_format(($optionOne['thetaCall']+$optionTwo['thetaPut']),3,".","");
			//common 
			$recordArr['optionOnegamma'] = number_format($optionOne['gamma'],3,".","");	
			$recordArr['optionOnevega'] = number_format($optionOne['vega'],3,".","");
			$recordArr['optionOnevolga'] = number_format($optionOne['volga'],3,".","");
			$recordArr['optionOnevanna'] = number_format($optionOne['vanna'],3,".","");
			
			$recordArr['optionTwogamma'] = number_format($optionTwo['gamma'],3,".","");
			$recordArr['optionTwovega'] = number_format($optionTwo['vega'],3,".","");
			$recordArr['optionTwovolga'] = number_format($optionTwo['volga'],3,".","");
			$recordArr['optionTwovanna'] = number_format($optionTwo['vanna'],3,".","");

			$recordArr['gammaTotal'] = number_format(($optionOne['gamma']+$optionTwo['gamma']),3,".","");
			$recordArr['vegaTotal'] = number_format(($optionOne['vega']+$optionTwo['vega']),3,".","");
			$recordArr['volgaTotal'] = number_format(($optionOne['volga']+$optionTwo['volga']),3,".","");
			$recordArr['vannaTotal'] = number_format(($optionOne['vanna']+$optionTwo['vanna']),3,".","");
		}
		//==========
		if($num1=='V_CALL' && $num2=='C_CALL')
		{
            $config = '{
		                "values": ['.implode(',',$optionOne['sellPutArray']).'],
		                "line-color": "#5b9bd5",
		                "line-width": "5px",
		                  "marker": {
		                    "background-color": "#5b9bd5",
		                    "border-width": 0,
		                    "shadow": 0,
		                    "border-color": "#5b9bd5"
		                  },
		                   "legend-marker": {
		                        "visible": false
		                    },
		                "marker": {
		                  "visible":false
		                },
		            },
		            {
		                "values": ['.implode(',',$optionTwo['sellCallArray']).'],
		                "line-color": "#ed7d31",
		                "line-width": "5px",
		                  "marker": {
		                    "background-color": "#ed7d31",
		                    "border-width": 0,
		                    "shadow": 0,
		                    "border-color": "#ed7d31"
		                  },
		               "marker": {
		                  "visible":false
		                },
		            }';
            //option one
            if(($optionOne['moneyNess']*100)<100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% OTM";
            }
            else if(($optionOne['moneyNess']*100)>100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% ITM";
            }
            else if(($optionOne['moneyNess']*100)==100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% ATM";
            }
            //option two
            if(($optionTwo['moneyNess']*100)<100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% ITM";
            }
            else if(($optionTwo['moneyNess']*100)>100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% OTM";
            }
            else if(($optionTwo['moneyNess']*100)==100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% ATM";
            }

            //call put val
            //option 1
            $recordArr['optionOnecallValue'] = number_format($optionOne['putValue'],2,".","");
			$recordArr['optionOneintrinsicValueCall'] = number_format($optionOne['intrinsicValuePut'],2,".","");
			$recordArr['optionOnetemporaryValueCall'] = number_format($optionOne['temporaryValuePut'],2,".","");
			$recordArr['optionOnedeltaCall'] = number_format($optionOne['deltaPut'],3,".","");
			$recordArr['optionOnethetaCall'] = number_format($optionOne['thetaPut'],3,".","");
			//option 2
			$recordArr['optionTwocallValue'] = number_format($optionTwo['callValue'],2,".","");
			$recordArr['optionTwointrinsicValueCall'] = number_format($optionTwo['intrinsicValueCall'],2,".","");
			$recordArr['optionTwotemporaryValueCall'] = number_format($optionTwo['temporaryValueCall'],2,".","");
			$recordArr['optionTwodeltaCall'] = number_format($optionTwo['deltaCall'],3,".","");
			$recordArr['optionTwothetaCall'] = number_format($optionTwo['thetaCall'],3,".","");
			//totalcalculation
			$recordArr['totalPremium'] = number_format(($optionOne['putValue']+$optionTwo['callValue']),2,".","");
			$recordArr['deltaTotal'] = number_format(($optionOne['deltaPut']+$optionTwo['deltaCall']),3,".","");
			$recordArr['thetaTotal'] = number_format(($optionOne['thetaPut']+$optionTwo['thetaCall']),3,".","");
			//common 
			$recordArr['optionOnegamma'] = number_format($optionOne['gamma'],3,".","");	
			$recordArr['optionOnevega'] = number_format($optionOne['vega'],3,".","");
			$recordArr['optionOnevolga'] = number_format($optionOne['volga'],3,".","");
			$recordArr['optionOnevanna'] = number_format($optionOne['vanna'],3,".","");
			
			$recordArr['optionTwogamma'] = number_format($optionTwo['gamma'],3,".","");
			$recordArr['optionTwovega'] = number_format($optionTwo['vega'],3,".","");
			$recordArr['optionTwovolga'] = number_format($optionTwo['volga'],3,".","");
			$recordArr['optionTwovanna'] = number_format($optionTwo['vanna'],3,".","");

			$recordArr['gammaTotal'] = number_format(($optionOne['gamma']+$optionTwo['gamma']),3,".","");
			$recordArr['vegaTotal'] = number_format(($optionOne['vega']+$optionTwo['vega']),3,".","");
			$recordArr['volgaTotal'] = number_format(($optionOne['volga']+$optionTwo['volga']),3,".","");
			$recordArr['vannaTotal'] = number_format(($optionOne['vanna']+$optionTwo['vanna']),3,".","");
		}
		
		if($num1=='V_CALL' && $num2=='C_PVT')
		{
			$config = '{
		                "values": ['.implode(',',$optionOne['sellPutArray']).'],
		                "line-color": "#5b9bd5",
		                "line-width": "5px",
		                  "marker": {
		                    "background-color": "#5b9bd5",
		                    "border-width": 0,
		                    "shadow": 0,
		                    "border-color": "#5b9bd5"
		                  },
		                   "legend-marker": {
		                        "visible": false
		                    },
		                "marker": {
		                  "visible":false
		                },
		            },
		            {
		                "values": ['.implode(',',$optionTwo['buyCallArray']).'],
		                "line-color": "#ed7d31",
		                "line-width": "5px",
		                  "marker": {
		                    "background-color": "#ed7d31",
		                    "border-width": 0,
		                    "shadow": 0,
		                    "border-color": "#ed7d31"
		                  },
		               "marker": {
		                  "visible":false
		                },
		            }';
                        //option one
            if(($optionOne['moneyNess']*100)<100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% OTM";
            }
            else if(($optionOne['moneyNess']*100)>100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% ITM";
            }
            else if(($optionOne['moneyNess']*100)==100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% ATM";
            }
            //option two
            if(($optionTwo['moneyNess']*100)<100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% ITM";
            }
            else if(($optionTwo['moneyNess']*100)>100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% OTM";
            }
            else if(($optionTwo['moneyNess']*100)==100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% ATM";
            }

            //call put val
            //option 1
            $recordArr['optionOnecallValue'] = number_format($optionOne['putValue'],2,".","");
			$recordArr['optionOneintrinsicValueCall'] = number_format($optionOne['intrinsicValuePut'],2,".","");
			$recordArr['optionOnetemporaryValueCall'] = number_format($optionOne['temporaryValuePut'],2,".","");
			$recordArr['optionOnedeltaCall'] = number_format($optionOne['deltaPut'],3,".","");
			$recordArr['optionOnethetaCall'] = number_format($optionOne['thetaPut'],3,".","");
			//option 2
			$recordArr['optionTwocallValue'] = number_format($optionTwo['callValue'],2,".","");
			$recordArr['optionTwointrinsicValueCall'] = number_format($optionTwo['intrinsicValueCall'],2,".","");
			$recordArr['optionTwotemporaryValueCall'] = number_format($optionTwo['temporaryValueCall'],2,".","");
			$recordArr['optionTwodeltaCall'] = number_format($optionTwo['deltaCall'],3,".","");
			$recordArr['optionTwothetaCall'] = number_format($optionTwo['thetaCall'],3,".","");
			//totalcalculation
			$recordArr['totalPremium'] = number_format(($optionOne['putValue']+$optionTwo['callValue']),2,".","");
			$recordArr['deltaTotal'] = number_format(($optionOne['deltaPut']+$optionTwo['deltaCall']),3,".","");
			$recordArr['thetaTotal'] = number_format(($optionOne['thetaPut']+$optionTwo['thetaCall']),3,".","");
			//common 
			$recordArr['optionOnegamma'] = number_format($optionOne['gamma'],3,".","");	
			$recordArr['optionOnevega'] = number_format($optionOne['vega'],3,".","");
			$recordArr['optionOnevolga'] = number_format($optionOne['volga'],3,".","");
			$recordArr['optionOnevanna'] = number_format($optionOne['vanna'],3,".","");
			
			$recordArr['optionTwogamma'] = number_format($optionTwo['gamma'],3,".","");
			$recordArr['optionTwovega'] = number_format($optionTwo['vega'],3,".","");
			$recordArr['optionTwovolga'] = number_format($optionTwo['volga'],3,".","");
			$recordArr['optionTwovanna'] = number_format($optionTwo['vanna'],3,".","");

			$recordArr['gammaTotal'] = number_format(($optionOne['gamma']+$optionTwo['gamma']),3,".","");
			$recordArr['vegaTotal'] = number_format(($optionOne['vega']+$optionTwo['vega']),3,".","");
			$recordArr['volgaTotal'] = number_format(($optionOne['volga']+$optionTwo['volga']),3,".","");
			$recordArr['vannaTotal'] = number_format(($optionOne['vanna']+$optionTwo['vanna']),3,".","");
		}

		if($num1=='C_PVT' && $num2=='0')
		{
			$config = '{
                            "values": ['.implode(',',$optionOne['buyCallArray']).'],
                            "line-color": "#5b9bd5",
                            "line-width": "5px",
                              "marker": {
                                "background-color": "#5b9bd5",
                                "border-width": 0,
                                "shadow": 0,
                                "border-color": "#5b9bd5"
                              },
                               "legend-marker": {
                                    "visible": false
                                },
                            "marker": {
                              "visible":false
                            },
                        }';
                        //option one
            if(($optionOne['moneyNess']*100)<100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% ITM";
            }
            else if(($optionOne['moneyNess']*100)>100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% OTM";
            }
            else if(($optionOne['moneyNess']*100)==100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% ATM";
            }
            //option two
            if(($optionTwo['moneyNess']*100)<100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% ITM";
            }
            else if(($optionTwo['moneyNess']*100)>100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% OTM";
            }
            else if(($optionTwo['moneyNess']*100)==100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% ATM";
            }

            //call put val
            //option 1
            $recordArr['optionOnecallValue'] = number_format($optionOne['callValue'],2,".","");
			$recordArr['optionOneintrinsicValueCall'] = number_format($optionOne['intrinsicValueCall'],2,".","");
			$recordArr['optionOnetemporaryValueCall'] = number_format($optionOne['temporaryValueCall'],2,".","");
			$recordArr['optionOnedeltaCall'] = number_format($optionOne['deltaCall'],3,".","");
			$recordArr['optionOnethetaCall'] = number_format($optionOne['thetaCall'],3,".","");
			//option 2
			$recordArr['optionTwocallValue'] = number_format(0,2,".","");
			$recordArr['optionTwointrinsicValueCall'] = number_format(0,2,".","");
			$recordArr['optionTwotemporaryValueCall'] = number_format(0,2,".","");
			$recordArr['optionTwodeltaCall'] = number_format(0,3,".","");
			$recordArr['optionTwothetaCall'] = number_format(0,3,".","");
			//totalcalculation
			$recordArr['totalPremium'] = number_format(($optionOne['callValue']),2,".","");
			$recordArr['deltaTotal'] = number_format(($optionOne['deltaCall']),3,".","");
			$recordArr['thetaTotal'] = number_format(($optionOne['thetaCall']),3,".","");
			//common 
			$recordArr['optionOnegamma'] = number_format($optionOne['gamma'],3,".","");	
			$recordArr['optionOnevega'] = number_format($optionOne['vega'],3,".","");
			$recordArr['optionOnevolga'] = number_format($optionOne['volga'],3,".","");
			$recordArr['optionOnevanna'] = number_format($optionOne['vanna'],3,".","");
			
			$recordArr['optionTwogamma'] = number_format(0,3,".","");
			$recordArr['optionTwovega'] = number_format(0,3,".","");
			$recordArr['optionTwovolga'] = number_format(0,3,".","");
			$recordArr['optionTwovanna'] = number_format(0,3,".","");

			$recordArr['gammaTotal'] = number_format(($optionOne['gamma']),3,".","");
			$recordArr['vegaTotal'] = number_format(($optionOne['vega']),3,".","");
			$recordArr['volgaTotal'] = number_format(($optionOne['volga']),3,".","");
			$recordArr['vannaTotal'] = number_format(($optionOne['vanna']),3,".","");
		}
		
		if($num1=='C_PVT' && $num2=='V_PVT')
		{
			$config = '{
                            "values": ['.implode(',',$optionOne['buyCallArray']).'],
                            "line-color": "#5b9bd5",
                            "line-width": "5px",
                              "marker": {
                                "background-color": "#5b9bd5",
                                "border-width": 0,
                                "shadow": 0,
                                "border-color": "#5b9bd5"
                              },
                               "legend-marker": {
                                    "visible": false
                                },
                            "marker": {
                              "visible":false
                            },
                        },
                        {
                            "values": ['.implode(',',$optionTwo['buyPutArray']).'],
                            "line-color": "#ed7d31",
                            "line-width": "5px",
                              "marker": {
                                "background-color": "#ed7d31",
                                "border-width": 0,
                                "shadow": 0,
                                "border-color": "#ed7d31"
                              },
                           "marker": {
                              "visible":false
                            },
                        }';
                        //option one
            if(($optionOne['moneyNess']*100)<100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% ITM";
            }
            else if(($optionOne['moneyNess']*100)>100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% OTM";
            }
            else if(($optionOne['moneyNess']*100)==100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% ATM";
            }
            //option two
            if(($optionTwo['moneyNess']*100)<100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% OTM";
            }
            else if(($optionTwo['moneyNess']*100)>100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% ITM";
            }
            else if(($optionTwo['moneyNess']*100)==100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% ATM";
            }

            //call put val
            //option 1
            $recordArr['optionOnecallValue'] = number_format($optionOne['callValue'],2,".","");
			$recordArr['optionOneintrinsicValueCall'] = number_format($optionOne['intrinsicValueCall'],2,".","");
			$recordArr['optionOnetemporaryValueCall'] = number_format($optionOne['temporaryValueCall'],2,".","");
			$recordArr['optionOnedeltaCall'] = number_format($optionOne['deltaCall'],3,".","");
			$recordArr['optionOnethetaCall'] = number_format($optionOne['thetaCall'],3,".","");
			//option 2
			$recordArr['optionTwocallValue'] = number_format($optionTwo['putValue'],2,".","");
			$recordArr['optionTwointrinsicValueCall'] = number_format($optionTwo['intrinsicValuePut'],2,".","");
			$recordArr['optionTwotemporaryValueCall'] = number_format($optionTwo['temporaryValuePut'],2,".","");
			$recordArr['optionTwodeltaCall'] = number_format($optionTwo['deltaPut'],3,".","");
			$recordArr['optionTwothetaCall'] = number_format($optionTwo['thetaPut'],3,".","");
			//totalcalculation
			$recordArr['totalPremium'] = number_format(($optionOne['callValue']+$optionTwo['putValue']),2,".","");
			$recordArr['deltaTotal'] = number_format(($optionOne['deltaCall']+$optionTwo['deltaPut']),3,".","");
			$recordArr['thetaTotal'] = number_format(($optionOne['thetaCall']+$optionTwo['thetaPut']),3,".","");
			//common 
			$recordArr['optionOnegamma'] = number_format($optionOne['gamma'],3,".","");	
			$recordArr['optionOnevega'] = number_format($optionOne['vega'],3,".","");
			$recordArr['optionOnevolga'] = number_format($optionOne['volga'],3,".","");
			$recordArr['optionOnevanna'] = number_format($optionOne['vanna'],3,".","");
			
			$recordArr['optionTwogamma'] = number_format($optionTwo['gamma'],3,".","");
			$recordArr['optionTwovega'] = number_format($optionTwo['vega'],3,".","");
			$recordArr['optionTwovolga'] = number_format($optionTwo['volga'],3,".","");
			$recordArr['optionTwovanna'] = number_format($optionTwo['vanna'],3,".","");

			$recordArr['gammaTotal'] = number_format(($optionOne['gamma']+$optionTwo['gamma']),3,".","");
			$recordArr['vegaTotal'] = number_format(($optionOne['vega']+$optionTwo['vega']),3,".","");
			$recordArr['volgaTotal'] = number_format(($optionOne['volga']+$optionTwo['volga']),3,".","");
			$recordArr['vannaTotal'] = number_format(($optionOne['vanna']+$optionTwo['vanna']),3,".","");
		}

		if($num1=='V_PVT' && $num2=='C_PVT')
		{
			$config = '{
                            "values": ['.implode(',',$optionOne['buyPutArray']).'],
                            "line-color": "#5b9bd5",
                            "line-width": "5px",
                              "marker": {
                                "background-color": "#5b9bd5",
                                "border-width": 0,
                                "shadow": 0,
                                "border-color": "#5b9bd5"
                              },
                               "legend-marker": {
                                    "visible": false
                                },
                            "marker": {
                              "visible":false
                            },
                        },
                        {
                            "values": ['.implode(',',$optionTwo['buyCallArray']).'],
                            "line-color": "#ed7d31",
                            "line-width": "5px",
                              "marker": {
                                "background-color": "#ed7d31",
                                "border-width": 0,
                                "shadow": 0,
                                "border-color": "#ed7d31"
                              },
                           "marker": {
                              "visible":false
                            },
                        }';
                        //option one
            if(($optionOne['moneyNess']*100)<100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% OTM";
            }
            else if(($optionOne['moneyNess']*100)>100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% ITM";
            }
            else if(($optionOne['moneyNess']*100)==100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% ATM";
            }
            //option two
            if(($optionTwo['moneyNess']*100)<100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% ITM";
            }
            else if(($optionTwo['moneyNess']*100)>100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% OTM";
            }
            else if(($optionTwo['moneyNess']*100)==100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% ATM";
            }
            //call put val
            //option 1
            $recordArr['optionOnecallValue'] = number_format($optionOne['putValue'],2,".","");
			$recordArr['optionOneintrinsicValueCall'] = number_format($optionOne['intrinsicValuePut'],2,".","");
			$recordArr['optionOnetemporaryValueCall'] = number_format($optionOne['temporaryValuePut'],2,".","");
			$recordArr['optionOnedeltaCall'] = number_format($optionOne['deltaPut'],3,".","");
			$recordArr['optionOnethetaCall'] = number_format($optionOne['thetaPut'],3,".","");
			//option 2
			$recordArr['optionTwocallValue'] = number_format($optionTwo['callValue'],2,".","");
			$recordArr['optionTwointrinsicValueCall'] = number_format($optionTwo['intrinsicValueCall'],2,".","");
			$recordArr['optionTwotemporaryValueCall'] = number_format($optionTwo['temporaryValueCall'],2,".","");
			$recordArr['optionTwodeltaCall'] = number_format($optionTwo['deltaCall'],3,".","");
			$recordArr['optionTwothetaCall'] = number_format($optionTwo['thetaCall'],3,".","");
			//totalcalculation
			$recordArr['totalPremium'] = number_format(($optionOne['putValue']+$optionTwo['callValue']),2,".","");

			$recordArr['deltaTotal'] = number_format(($optionOne['deltaPut']+$optionTwo['deltaCall']),3,".","");
			$recordArr['thetaTotal'] = number_format(($optionOne['thetaPut']+$optionTwo['thetaCall']),3,".","");
			//common 
			$recordArr['optionOnegamma'] = number_format($optionOne['gamma'],3,".","");	
			$recordArr['optionOnevega'] = number_format($optionOne['vega'],3,".","");
			$recordArr['optionOnevolga'] = number_format($optionOne['volga'],3,".","");
			$recordArr['optionOnevanna'] = number_format($optionOne['vanna'],3,".","");
			
			$recordArr['optionTwogamma'] = number_format($optionTwo['gamma'],3,".","");
			$recordArr['optionTwovega'] = number_format($optionTwo['vega'],3,".","");
			$recordArr['optionTwovolga'] = number_format($optionTwo['volga'],3,".","");
			$recordArr['optionTwovanna'] = number_format($optionTwo['vanna'],3,".","");

			$recordArr['gammaTotal'] = number_format(($optionOne['gamma']+$optionTwo['gamma']),3,".","");
			$recordArr['vegaTotal'] = number_format(($optionOne['vega']+$optionTwo['vega']),3,".","");
			$recordArr['volgaTotal'] = number_format(($optionOne['volga']+$optionTwo['volga']),3,".","");
			$recordArr['vannaTotal'] = number_format(($optionOne['vanna']+$optionTwo['vanna']),3,".","");


		}

		if($num1=='V_PVT' && $num2=='0')
		{
			$config = '{
                            "values": ['.implode(',',$optionOne['buyPutArray']).'],
                            "line-color": "#5b9bd5",
                            "line-width": "5px",
                              "marker": {
                                "background-color": "#5b9bd5",
                                "border-width": 0,
                                "shadow": 0,
                                "border-color": "#5b9bd5"
                              },
                               "legend-marker": {
                                    "visible": false
                                },
                            "marker": {
                              "visible":false
                            },
                        },';
                        //option one
            if(($optionOne['moneyNess']*100)<100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% OTM";
            }
            else if(($optionOne['moneyNess']*100)>100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% ITM";
            }
            else if(($optionOne['moneyNess']*100)==100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% ATM";
            }
            //option two
            if(($optionTwo['moneyNess']*100)<100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% ITM";
            }
            else if(($optionTwo['moneyNess']*100)>100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% OTM";
            }
            else if(($optionTwo['moneyNess']*100)==100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% ATM";
            }
            //call put val
            //option 1
            $recordArr['optionOnecallValue'] = number_format($optionOne['putValue'],2,".","");
			$recordArr['optionOneintrinsicValueCall'] = number_format($optionOne['intrinsicValuePut'],2,".","");
			$recordArr['optionOnetemporaryValueCall'] = number_format($optionOne['temporaryValuePut'],2,".","");
			$recordArr['optionOnedeltaCall'] = number_format($optionOne['deltaPut'],3,".","");
			$recordArr['optionOnethetaCall'] = number_format($optionOne['thetaPut'],3,".","");
			//option 2
			$recordArr['optionTwocallValue'] = number_format(0,2,".","");
			$recordArr['optionTwointrinsicValueCall'] = number_format(0,2,".","");
			$recordArr['optionTwotemporaryValueCall'] = number_format(0,2,".","");
			$recordArr['optionTwodeltaCall'] = number_format(0,3,".","");
			$recordArr['optionTwothetaCall'] = number_format(0,3,".","");
			//totalcalculation
			$recordArr['totalPremium'] = number_format(($optionOne['putValue']),2,".","");
			$recordArr['deltaTotal'] = number_format(($optionOne['deltaPut']),3,".","");
			$recordArr['thetaTotal'] = number_format(($optionOne['thetaPut']),3,".","");
			//common 
			$recordArr['optionOnegamma'] = number_format($optionOne['gamma'],3,".","");	
			$recordArr['optionOnevega'] = number_format($optionOne['vega'],3,".","");
			$recordArr['optionOnevolga'] = number_format($optionOne['volga'],3,".","");
			$recordArr['optionOnevanna'] = number_format($optionOne['vanna'],3,".","");
			
			$recordArr['optionTwogamma'] = number_format(0,3,".","");
			$recordArr['optionTwovega'] = number_format(0,3,".","");
			$recordArr['optionTwovolga'] = number_format(0,3,".","");
			$recordArr['optionTwovanna'] = number_format(0,3,".","");

			$recordArr['gammaTotal'] = number_format(($optionOne['gamma']),3,".","");
			$recordArr['vegaTotal'] = number_format(($optionOne['vega']),3,".","");
			$recordArr['volgaTotal'] = number_format(($optionOne['volga']),3,".","");
			$recordArr['vannaTotal'] = number_format(($optionOne['vanna']),3,".","");
		}
		
		if($num1=='C_PVT' && $num2=='V_CALL')
		{
			$config = '{
                            "values": ['.implode(',',$optionOne['buyCallArray']).'],
                            "line-color": "#5b9bd5",
                            "line-width": "5px",
                              "marker": {
                                "background-color": "#5b9bd5",
                                "border-width": 0,
                                "shadow": 0,
                                "border-color": "#5b9bd5"
                              },
                               "legend-marker": {
                                    "visible": false
                                },
                            "marker": {
                              "visible":false
                            },
                        },
                        {
                            "values": ['.implode(',',$optionTwo['sellPutArray']).'],
                            "line-color": "#ed7d31",
                            "line-width": "5px",
                              "marker": {
                                "background-color": "#ed7d31",
                                "border-width": 0,
                                "shadow": 0,
                                "border-color": "#ed7d31"
                              },
                           "marker": {
                              "visible":false
                            },
                        }';
                        //option one
            if(($optionOne['moneyNess']*100)<100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% ITM";
            }
            else if(($optionOne['moneyNess']*100)>100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% OTM";
            }
            else if(($optionOne['moneyNess']*100)==100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% ATM";
            }
            //option two
            if(($optionTwo['moneyNess']*100)<100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% OTM";
            }
            else if(($optionTwo['moneyNess']*100)>100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% ITM";
            }
            else if(($optionTwo['moneyNess']*100)==100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% ATM";
            }
            //call put val
            //option 1
            $recordArr['optionOnecallValue'] = number_format($optionOne['callValue'],2,".","");
			$recordArr['optionOneintrinsicValueCall'] = number_format($optionOne['intrinsicValueCall'],2,".","");
			$recordArr['optionOnetemporaryValueCall'] = number_format($optionOne['temporaryValueCall'],2,".","");
			$recordArr['optionOnedeltaCall'] = number_format($optionOne['deltaCall'],3,".","");
			$recordArr['optionOnethetaCall'] = number_format($optionOne['thetaCall'],3,".","");
			//option 2
			$recordArr['optionTwocallValue'] = number_format($optionTwo['putValue'],2,".","");
			$recordArr['optionTwointrinsicValueCall'] = number_format($optionTwo['intrinsicValuePut'],2,".","");
			$recordArr['optionTwotemporaryValueCall'] = number_format($optionTwo['temporaryValuePut'],2,".","");
			$recordArr['optionTwodeltaCall'] = number_format($optionTwo['deltaPut'],3,".","");
			$recordArr['optionTwothetaCall'] = number_format($optionTwo['thetaPut'],3,".","");
			//totalcalculation
			$recordArr['totalPremium'] = number_format(($optionOne['callValue']+$optionTwo['putValue']),2,".","");
			$recordArr['deltaTotal'] = number_format(($optionOne['deltaCall']+$optionTwo['deltaPut']),3,".","");
			$recordArr['thetaTotal'] = number_format(($optionOne['thetaCall']+$optionTwo['thetaPut']),3,".","");
			//common 
			$recordArr['optionOnegamma'] = number_format($optionOne['gamma'],3,".","");	
			$recordArr['optionOnevega'] = number_format($optionOne['vega'],3,".","");
			$recordArr['optionOnevolga'] = number_format($optionOne['volga'],3,".","");
			$recordArr['optionOnevanna'] = number_format($optionOne['vanna'],3,".","");
			
			$recordArr['optionTwogamma'] = number_format($optionTwo['gamma'],3,".","");
			$recordArr['optionTwovega'] = number_format($optionTwo['vega'],3,".","");
			$recordArr['optionTwovolga'] = number_format($optionTwo['volga'],3,".","");
			$recordArr['optionTwovanna'] = number_format($optionTwo['vanna'],3,".","");

			$recordArr['gammaTotal'] = number_format(($optionOne['gamma']+$optionTwo['gamma']),3,".","");
			$recordArr['vegaTotal'] = number_format(($optionOne['vega']+$optionTwo['vega']),3,".","");
			$recordArr['volgaTotal'] = number_format(($optionOne['volga']+$optionTwo['volga']),3,".","");
			$recordArr['vannaTotal'] = number_format(($optionOne['vanna']+$optionTwo['vanna']),3,".","");
		}

		if($num1=='C_CALL' && $num2=='V_PVT')
		{
			$config = '{
                            "values": ['.implode(',',$optionOne['sellCallArray']).'],
                            "line-color": "#5b9bd5",
                            "line-width": "5px",
                              "marker": {
                                "background-color": "#5b9bd5",
                                "border-width": 0,
                                "shadow": 0,
                                "border-color": "#5b9bd5"
                              },
                               "legend-marker": {
                                    "visible": false
                                },
                            "marker": {
                              "visible":false
                            },
                        },
                        {
                            "values": ['.implode(',',$optionTwo['buyPutArray']).'],
                            "line-color": "#ed7d31",
                            "line-width": "5px",
                              "marker": {
                                "background-color": "#ed7d31",
                                "border-width": 0,
                                "shadow": 0,
                                "border-color": "#ed7d31"
                              },
                           "marker": {
                              "visible":false
                            },
                        }';
                        //option one
            if(($optionOne['moneyNess']*100)<100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% ITM";
            }
            else if(($optionOne['moneyNess']*100)>100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% OTM";
            }
            else if(($optionOne['moneyNess']*100)==100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% ATM";
            }
            //option two
            if(($optionTwo['moneyNess']*100)<100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% OTM";
            }
            else if(($optionTwo['moneyNess']*100)>100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% ITM";
            }
            else if(($optionTwo['moneyNess']*100)==100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% ATM";
            }
            //call put val
            //option 1
            $recordArr['optionOnecallValue'] = number_format($optionOne['callValue'],2,".","");
			$recordArr['optionOneintrinsicValueCall'] = number_format($optionOne['intrinsicValueCall'],2,".","");
			$recordArr['optionOnetemporaryValueCall'] = number_format($optionOne['temporaryValueCall'],2,".","");
			$recordArr['optionOnedeltaCall'] = number_format($optionOne['deltaCall'],3,".","");
			$recordArr['optionOnethetaCall'] = number_format($optionOne['thetaCall'],3,".","");
			//option 2
			$recordArr['optionTwocallValue'] = number_format($optionTwo['putValue'],2,".","");
			$recordArr['optionTwointrinsicValueCall'] = number_format($optionTwo['intrinsicValuePut'],2,".","");
			$recordArr['optionTwotemporaryValueCall'] = number_format($optionTwo['temporaryValuePut'],2,".","");
			$recordArr['optionTwodeltaCall'] = number_format($optionTwo['deltaPut'],3,".","");
			$recordArr['optionTwothetaCall'] = number_format($optionTwo['thetaPut'],3,".","");
			//totalcalculation
			$recordArr['totalPremium'] = number_format(($optionOne['callValue']+$optionTwo['putValue']),2,".","");
			$recordArr['deltaTotal'] = number_format(($optionOne['deltaCall']+$optionTwo['deltaPut']),3,".","");
			$recordArr['thetaTotal'] = number_format(($optionOne['thetaCall']+$optionTwo['thetaPut']),3,".","");
			//common 
			$recordArr['optionOnegamma'] = number_format($optionOne['gamma'],3,".","");	
			$recordArr['optionOnevega'] = number_format($optionOne['vega'],3,".","");
			$recordArr['optionOnevolga'] = number_format($optionOne['volga'],3,".","");
			$recordArr['optionOnevanna'] = number_format($optionOne['vanna'],3,".","");
			
			$recordArr['optionTwogamma'] = number_format($optionTwo['gamma'],3,".","");
			$recordArr['optionTwovega'] = number_format($optionTwo['vega'],3,".","");
			$recordArr['optionTwovolga'] = number_format($optionTwo['volga'],3,".","");
			$recordArr['optionTwovanna'] = number_format($optionTwo['vanna'],3,".","");

			$recordArr['gammaTotal'] = number_format(($optionOne['gamma']+$optionTwo['gamma']),3,".","");
			$recordArr['vegaTotal'] = number_format(($optionOne['vega']+$optionTwo['vega']),3,".","");
			$recordArr['volgaTotal'] = number_format(($optionOne['volga']+$optionTwo['volga']),3,".","");
			$recordArr['vannaTotal'] = number_format(($optionOne['vanna']+$optionTwo['vanna']),3,".","");
		}

		if($num1=='V_CALL' && $num2=='V_PVT')
		{
			$config = '{
                            "values": ['.implode(',',$optionOne['sellPutArray']).'],
                            "line-color": "#5b9bd5",
                            "line-width": "5px",
                              "marker": {
                                "background-color": "#5b9bd5",
                                "border-width": 0,
                                "shadow": 0,
                                "border-color": "#5b9bd5"
                              },
                               "legend-marker": {
                                    "visible": false
                                },
                            "marker": {
                              "visible":false
                            },
                        },
                        {
                            "values": ['.implode(',',$optionTwo['buyPutArray']).'],
                            "line-color": "#ed7d31",
                            "line-width": "5px",
                              "marker": {
                                "background-color": "#ed7d31",
                                "border-width": 0,
                                "shadow": 0,
                                "border-color": "#ed7d31"
                              },
                           "marker": {
                              "visible":false
                            },
                        }';
                        //option one
            if(($optionOne['moneyNess']*100)<100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% OTM";
            }
            else if(($optionOne['moneyNess']*100)>100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% ITM";
            }
            else if(($optionOne['moneyNess']*100)==100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% ATM";
            }
            //option two
            if(($optionTwo['moneyNess']*100)<100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% OTM";
            }
            else if(($optionTwo['moneyNess']*100)>100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% ITM";
            }
            else if(($optionTwo['moneyNess']*100)==100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% ATM";
            }
            //call put val
            //option 1
            $recordArr['optionOnecallValue'] = number_format($optionOne['putValue'],2,".","");
			$recordArr['optionOneintrinsicValueCall'] = number_format($optionOne['intrinsicValuePut'],2,".","");
			$recordArr['optionOnetemporaryValueCall'] = number_format($optionOne['temporaryValuePut'],2,".","");
			$recordArr['optionOnedeltaCall'] = number_format($optionOne['deltaPut'],3,".","");
			$recordArr['optionOnethetaCall'] = number_format($optionOne['thetaPut'],3,".","");
			//option 2
			$recordArr['optionTwocallValue'] = number_format($optionTwo['putValue'],2,".","");
			$recordArr['optionTwointrinsicValueCall'] = number_format($optionTwo['intrinsicValuePut'],2,".","");
			$recordArr['optionTwotemporaryValueCall'] = number_format($optionTwo['temporaryValuePut'],2,".","");
			$recordArr['optionTwodeltaCall'] = number_format($optionTwo['deltaPut'],3,".","");
			$recordArr['optionTwothetaCall'] = number_format($optionTwo['thetaPut'],3,".","");
			//totalcalculation
			$recordArr['totalPremium'] = number_format(($optionOne['putValue']+$optionTwo['putValue']),2,".","");
			$recordArr['deltaTotal'] = number_format(($optionOne['deltaPut']+$optionTwo['deltaPut']),3,".","");
			$recordArr['thetaTotal'] = number_format(($optionOne['thetaPut']+$optionTwo['thetaPut']),3,".","");
			//common 
			$recordArr['optionOnegamma'] = number_format($optionOne['gamma'],3,".","");	
			$recordArr['optionOnevega'] = number_format($optionOne['vega'],3,".","");
			$recordArr['optionOnevolga'] = number_format($optionOne['volga'],3,".","");
			$recordArr['optionOnevanna'] = number_format($optionOne['vanna'],3,".","");
			
			$recordArr['optionTwogamma'] = number_format($optionTwo['gamma'],3,".","");
			$recordArr['optionTwovega'] = number_format($optionTwo['vega'],3,".","");
			$recordArr['optionTwovolga'] = number_format($optionTwo['volga'],3,".","");
			$recordArr['optionTwovanna'] = number_format($optionTwo['vanna'],3,".","");

			$recordArr['gammaTotal'] = number_format(($optionOne['gamma']+$optionTwo['gamma']),3,".","");
			$recordArr['vegaTotal'] = number_format(($optionOne['vega']+$optionTwo['vega']),3,".","");
			$recordArr['volgaTotal'] = number_format(($optionOne['volga']+$optionTwo['volga']),3,".","");
			$recordArr['vannaTotal'] = number_format(($optionOne['vanna']+$optionTwo['vanna']),3,".","");
		}

		if($num1=='V_PVT' && $num2=='C_CALL')
		{
			$config = '{
                            "values": ['.implode(',',$optionOne['buyPutArray']).'],
                            "line-color": "#5b9bd5",
                            "line-width": "5px",
                              "marker": {
                                "background-color": "#5b9bd5",
                                "border-width": 0,
                                "shadow": 0,
                                "border-color": "#5b9bd5"
                              },
                               "legend-marker": {
                                    "visible": false
                                },
                            "marker": {
                              "visible":false
                            },
                        },
                        {
                            "values": ['.implode(',',$optionTwo['sellCallArray']).'],
                            "line-color": "#ed7d31",
                            "line-width": "5px",
                              "marker": {
                                "background-color": "#ed7d31",
                                "border-width": 0,
                                "shadow": 0,
                                "border-color": "#ed7d31"
                              },
                           "marker": {
                              "visible":false
                            },
                        }';
                        //option one
            if(($optionOne['moneyNess']*100)<100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% OTM";
            }
            else if(($optionOne['moneyNess']*100)>100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% ITM";
            }
            else if(($optionOne['moneyNess']*100)==100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% ATM";
            }
            //option two
            if(($optionTwo['moneyNess']*100)<100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% ITM";
            }
            else if(($optionTwo['moneyNess']*100)>100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% OTM";
            }
            else if(($optionTwo['moneyNess']*100)==100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% ATM";
            }

            //call put val
            //option 1
            $recordArr['optionOnecallValue'] = number_format($optionOne['putValue'],2,".","");
			$recordArr['optionOneintrinsicValueCall'] = number_format($optionOne['intrinsicValuePut'],2,".","");
			$recordArr['optionOnetemporaryValueCall'] = number_format($optionOne['temporaryValuePut'],2,".","");
			$recordArr['optionOnedeltaCall'] = number_format($optionOne['deltaPut'],3,".","");
			$recordArr['optionOnethetaCall'] = number_format($optionOne['thetaPut'],3,".","");
			//option 2
			$recordArr['optionTwocallValue'] = number_format($optionTwo['callValue'],2,".","");
			$recordArr['optionTwointrinsicValueCall'] = number_format($optionTwo['intrinsicValueCall'],2,".","");
			$recordArr['optionTwotemporaryValueCall'] = number_format($optionTwo['temporaryValueCall'],2,".","");
			$recordArr['optionTwodeltaCall'] = number_format($optionTwo['deltaCall'],3,".","");
			$recordArr['optionTwothetaCall'] = number_format($optionTwo['thetaCall'],3,".","");
			//totalcalculation
			$recordArr['totalPremium'] = number_format(($optionOne['putValue']+$optionTwo['callValue']),2,".","");
			$recordArr['deltaTotal'] = number_format(($optionOne['deltaPut']+$optionTwo['deltaCall']),3,".","");
			$recordArr['thetaTotal'] = number_format(($optionOne['thetaPut']+$optionTwo['thetaCall']),3,".","");
			//common 
			$recordArr['optionOnegamma'] = number_format($optionOne['gamma'],3,".","");	
			$recordArr['optionOnevega'] = number_format($optionOne['vega'],3,".","");
			$recordArr['optionOnevolga'] = number_format($optionOne['volga'],3,".","");
			$recordArr['optionOnevanna'] = number_format($optionOne['vanna'],3,".","");
			
			$recordArr['optionTwogamma'] = number_format($optionTwo['gamma'],3,".","");
			$recordArr['optionTwovega'] = number_format($optionTwo['vega'],3,".","");
			$recordArr['optionTwovolga'] = number_format($optionTwo['volga'],3,".","");
			$recordArr['optionTwovanna'] = number_format($optionTwo['vanna'],3,".","");

			$recordArr['gammaTotal'] = number_format(($optionOne['gamma']+$optionTwo['gamma']),3,".","");
			$recordArr['vegaTotal'] = number_format(($optionOne['vega']+$optionTwo['vega']),3,".","");
			$recordArr['volgaTotal'] = number_format(($optionOne['volga']+$optionTwo['volga']),3,".","");
			$recordArr['vannaTotal'] = number_format(($optionOne['vanna']+$optionTwo['vanna']),3,".","");
		}

		if($num1=='C_PVT' && $num2=='C_CALL')
		{
			$config = '{
                            "values": ['.implode(',',$optionOne['buyCallArray']).'],
                            "line-color": "#5b9bd5",
                            "line-width": "5px",
                              "marker": {
                                "background-color": "#5b9bd5",
                                "border-width": 0,
                                "shadow": 0,
                                "border-color": "#5b9bd5"
                              },
                               "legend-marker": {
                                    "visible": false
                                },
                            "marker": {
                              "visible":false
                            },
                        },
                        {
                            "values": ['.implode(',',$optionTwo['sellCallArray']).'],
                            "line-color": "#ed7d31",
                            "line-width": "5px",
                              "marker": {
                                "background-color": "#ed7d31",
                                "border-width": 0,
                                "shadow": 0,
                                "border-color": "#ed7d31"
                              },
                           "marker": {
                              "visible":false
                            },
                        }';
                        //option one
            if(($optionOne['moneyNess']*100)<100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% ITM";
            }
            else if(($optionOne['moneyNess']*100)>100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% OTM";
            }
            else if(($optionOne['moneyNess']*100)==100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% ATM";
            }
            //option two
            if(($optionTwo['moneyNess']*100)<100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% ITM";
            }
            else if(($optionTwo['moneyNess']*100)>100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% OTM";
            }
            else if(($optionTwo['moneyNess']*100)==100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% ATM";
            }
            //call put val
            //option 1
            $recordArr['optionOnecallValue'] = number_format($optionOne['callValue'],2,".","");
			$recordArr['optionOneintrinsicValueCall'] = number_format($optionOne['intrinsicValueCall'],2,".","");
			$recordArr['optionOnetemporaryValueCall'] = number_format($optionOne['temporaryValueCall'],2,".","");
			$recordArr['optionOnedeltaCall'] = number_format($optionOne['deltaCall'],3,".","");
			$recordArr['optionOnethetaCall'] = number_format($optionOne['thetaCall'],3,".","");
			//option 2
			$recordArr['optionTwocallValue'] = number_format($optionTwo['callValue'],2,".","");
			$recordArr['optionTwointrinsicValueCall'] = number_format($optionTwo['intrinsicValueCall'],2,".","");
			$recordArr['optionTwotemporaryValueCall'] = number_format($optionTwo['temporaryValueCall'],2,".","");
			$recordArr['optionTwodeltaCall'] = number_format($optionTwo['deltaCall'],3,".","");
			$recordArr['optionTwothetaCall'] = number_format($optionTwo['thetaCall'],3,".","");
			//totalcalculation
			$recordArr['totalPremium'] = number_format(($optionOne['callValue']+$optionTwo['callValue']),2,".","");
			$recordArr['deltaTotal'] = number_format(($optionOne['deltaCall']+$optionTwo['deltaCall']),3,".","");
			$recordArr['thetaTotal'] = number_format(($optionOne['thetaCall']+$optionTwo['thetaCall']),3,".","");
			//common 
			$recordArr['optionOnegamma'] = number_format($optionOne['gamma'],3,".","");	
			$recordArr['optionOnevega'] = number_format($optionOne['vega'],3,".","");
			$recordArr['optionOnevolga'] = number_format($optionOne['volga'],3,".","");
			$recordArr['optionOnevanna'] = number_format($optionOne['vanna'],3,".","");
			
			$recordArr['optionTwogamma'] = number_format($optionTwo['gamma'],3,".","");
			$recordArr['optionTwovega'] = number_format($optionTwo['vega'],3,".","");
			$recordArr['optionTwovolga'] = number_format($optionTwo['volga'],3,".","");
			$recordArr['optionTwovanna'] = number_format($optionTwo['vanna'],3,".","");

			$recordArr['gammaTotal'] = number_format(($optionOne['gamma']+$optionTwo['gamma']),3,".","");
			$recordArr['vegaTotal'] = number_format(($optionOne['vega']+$optionTwo['vega']),3,".","");
			$recordArr['volgaTotal'] = number_format(($optionOne['volga']+$optionTwo['volga']),3,".","");
			$recordArr['vannaTotal'] = number_format(($optionOne['vanna']+$optionTwo['vanna']),3,".","");
		}

		if($num1=='V_PVT' && $num2=='V_CALL')
		{
			$config = '{
                            "values": ['.implode(',',$optionOne['buyPutArray']).'],
                            "line-color": "#5b9bd5",
                            "line-width": "5px",
                              "marker": {
                                "background-color": "#5b9bd5",
                                "border-width": 0,
                                "shadow": 0,
                                "border-color": "#5b9bd5"
                              },
                               "legend-marker": {
                                    "visible": false
                                },
                            "marker": {
                              "visible":false
                            },
                        },
                        {
                            "values": ['.implode(',',$optionTwo['buyCallArray']).'],
                            "line-color": "#ed7d31",
                            "line-width": "5px",
                              "marker": {
                                "background-color": "#ed7d31",
                                "border-width": 0,
                                "shadow": 0,
                                "border-color": "#ed7d31"
                              },
                           "marker": {
                              "visible":false
                            },
                        }';
                        //option one
            if(($optionOne['moneyNess']*100)<100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% OTM";
            }
            else if(($optionOne['moneyNess']*100)>100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% ITM";
            }
            else if(($optionOne['moneyNess']*100)==100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% ATM";
            }
            //option two
            if(($optionTwo['moneyNess']*100)<100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% OTM";
            }
            else if(($optionTwo['moneyNess']*100)>100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% ITM";
            }
            else if(($optionTwo['moneyNess']*100)==100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% ATM";
            }
            //call put val
            //option 1
            $recordArr['optionOnecallValue'] = number_format($optionOne['putValue'],2,".","");
			$recordArr['optionOneintrinsicValueCall'] = number_format($optionOne['intrinsicValuePut'],2,".","");
			$recordArr['optionOnetemporaryValueCall'] = number_format($optionOne['temporaryValuePut'],2,".","");
			$recordArr['optionOnedeltaCall'] = number_format($optionOne['deltaPut'],3,".","");
			$recordArr['optionOnethetaCall'] = number_format($optionOne['thetaPut'],3,".","");
			//option 2
			$recordArr['optionTwocallValue'] = number_format($optionTwo['putValue'],2,".","");
			$recordArr['optionTwointrinsicValueCall'] = number_format($optionTwo['intrinsicValuePut'],2,".","");
			$recordArr['optionTwotemporaryValueCall'] = number_format($optionTwo['temporaryValuePut'],2,".","");
			$recordArr['optionTwodeltaCall'] = number_format($optionTwo['deltaPut'],3,".","");
			$recordArr['optionTwothetaCall'] = number_format($optionTwo['thetaPut'],3,".","");

			//totalcalculation
			$recordArr['totalPremium'] = number_format(($optionOne['putValue']+$optionTwo['putValue']),2,".","");
			$recordArr['deltaTotal'] = number_format(($optionOne['deltaPut']+$optionTwo['deltaPut']),3,".","");
			$recordArr['thetaTotal'] = number_format(($optionOne['thetaPut']+$optionTwo['thetaPut']),3,".","");
			//common 
			$recordArr['optionOnegamma'] = number_format($optionOne['gamma'],3,".","");	
			$recordArr['optionOnevega'] = number_format($optionOne['vega'],3,".","");
			$recordArr['optionOnevolga'] = number_format($optionOne['volga'],3,".","");
			$recordArr['optionOnevanna'] = number_format($optionOne['vanna'],3,".","");
			
			$recordArr['optionTwogamma'] = number_format($optionTwo['gamma'],3,".","");
			$recordArr['optionTwovega'] = number_format($optionTwo['vega'],3,".","");
			$recordArr['optionTwovolga'] = number_format($optionTwo['volga'],3,".","");
			$recordArr['optionTwovanna'] = number_format($optionTwo['vanna'],3,".","");

			$recordArr['gammaTotal'] = number_format(($optionOne['gamma']+$optionTwo['gamma']),3,".","");
			$recordArr['vegaTotal'] = number_format(($optionOne['vega']+$optionTwo['vega']),3,".","");
			$recordArr['volgaTotal'] = number_format(($optionOne['volga']+$optionTwo['volga']),3,".","");
			$recordArr['vannaTotal'] = number_format(($optionOne['vanna']+$optionTwo['vanna']),3,".","");
		}
		if($num1=='C_CALL' && $num2=='C_PVT')
		{
			$config = '{
                            "values": ['.implode(',',$optionOne['sellCallArray']).'],
                            "line-color": "#5b9bd5",
                            "line-width": "5px",
                              "marker": {
                                "background-color": "#5b9bd5",
                                "border-width": 0,
                                "shadow": 0,
                                "border-color": "#5b9bd5"
                              },
                               "legend-marker": {
                                    "visible": false
                                },
                            "marker": {
                              "visible":false
                            },
                        },
                        {
                            "values": ['.implode(',',$optionTwo['buyCallArray']).'],
                            "line-color": "#ed7d31",
                            "line-width": "5px",
                              "marker": {
                                "background-color": "#ed7d31",
                                "border-width": 0,
                                "shadow": 0,
                                "border-color": "#ed7d31"
                              },
                           "marker": {
                              "visible":false
                            },
                        }';
                        //option one
            if(($optionOne['moneyNess']*100)<100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% ITM";
            }
            else if(($optionOne['moneyNess']*100)>100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% OTM";
            }
            else if(($optionOne['moneyNess']*100)==100)
            {
            	$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% ATM";
            }
            //option two
            if(($optionTwo['moneyNess']*100)<100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% ITM";
            }
            else if(($optionTwo['moneyNess']*100)>100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% OTM";
            }
            else if(($optionTwo['moneyNess']*100)==100)
            {
            	$recordArr['optionTwomoneyNess'] = number_format(($optionTwo['moneyNess']*100),2,".","")."% ATM";
            }
            //call put val
            //option 1
            $recordArr['optionOnecallValue'] = number_format($optionOne['callValue'],2,".","");
			$recordArr['optionOneintrinsicValueCall'] = number_format($optionOne['intrinsicValueCall'],2,".","");
			$recordArr['optionOnetemporaryValueCall'] = number_format($optionOne['temporaryValueCall'],2,".","");
			$recordArr['optionOnedeltaCall'] = number_format($optionOne['deltaCall'],3,".","");
			$recordArr['optionOnethetaCall'] = number_format($optionOne['thetaCall'],3,".","");
			//option 2
			$recordArr['optionTwocallValue'] = number_format($optionTwo['callValue'],2,".","");
			$recordArr['optionTwointrinsicValueCall'] = number_format($optionTwo['intrinsicValueCall'],2,".","");
			$recordArr['optionTwotemporaryValueCall'] = number_format($optionTwo['temporaryValueCall'],2,".","");
			$recordArr['optionTwodeltaCall'] = number_format($optionTwo['deltaCall'],3,".","");
			$recordArr['optionTwothetaCall'] = number_format($optionTwo['thetaCall'],3,".","");

			//totalcalculation
			$recordArr['totalPremium'] = number_format(($optionOne['callValue']+$optionTwo['callValue']),2,".","");
			$recordArr['deltaTotal'] = number_format(($optionOne['deltaCall']+$optionTwo['deltaCall']),3,".","");
			$recordArr['thetaTotal'] = number_format(($optionOne['thetaCall']+$optionTwo['thetaCall']),3,".","");
			//common 
			$recordArr['optionOnegamma'] = number_format($optionOne['gamma'],3,".","");	
			$recordArr['optionOnevega'] = number_format($optionOne['vega'],3,".","");
			$recordArr['optionOnevolga'] = number_format($optionOne['volga'],3,".","");
			$recordArr['optionOnevanna'] = number_format($optionOne['vanna'],3,".","");
			
			$recordArr['optionTwogamma'] = number_format($optionTwo['gamma'],3,".","");
			$recordArr['optionTwovega'] = number_format($optionTwo['vega'],3,".","");
			$recordArr['optionTwovolga'] = number_format($optionTwo['volga'],3,".","");
			$recordArr['optionTwovanna'] = number_format($optionTwo['vanna'],3,".","");

			$recordArr['gammaTotal'] = number_format(($optionOne['gamma']+$optionTwo['gamma']),3,".","");
			$recordArr['vegaTotal'] = number_format(($optionOne['vega']+$optionTwo['vega']),3,".","");
			$recordArr['volgaTotal'] = number_format(($optionOne['volga']+$optionTwo['volga']),3,".","");
			$recordArr['vannaTotal'] = number_format(($optionOne['vanna']+$optionTwo['vanna']),3,".","");
		}
		$myConfig = '{
            "type": "line",
            "scale-x":{
			    "labels": ['.implode(',',$optionOne['xAxix']).'],
			    "tick":{
			      "line-color":"none"
			    }
			},
            "series": ['.$config.']
        }';
		$recordArr['graphs'] = $myConfig;
		//for option 1
		//$recordArr['optionOnemoneyNess'] = number_format(($optionOne['moneyNess']*100),2,".","")."% OTM";

		/*$recordArr['optionOnecallValue'] = number_format($optionOne['callValue'],2,".","");
		$recordArr['optionOneintrinsicValueCall'] = number_format($optionOne['intrinsicValueCall'],2,".","");
		$recordArr['optionOnetemporaryValueCall'] = number_format($optionOne['temporaryValueCall'],2,".","");
		$recordArr['optionOnedeltaCall'] = number_format($optionOne['deltaCall'],3,".","");
		$recordArr['optionOnethetaCall'] = number_format($optionOne['thetaCall'],3,".","");*/


		/*$recordArr['optionOnegamma'] = number_format($optionOne['gamma'],3,".","");	
		$recordArr['optionOnevega'] = number_format($optionOne['vega'],3,".","");
		$recordArr['optionOnevolga'] = number_format($optionOne['volga'],3,".","");
		$recordArr['optionOnevanna'] = number_format($optionOne['vanna'],3,".","");

		$recordArr['optionTwogamma'] = number_format($optionTwo['gamma'],3,".","");
		$recordArr['optionTwovega'] = number_format($optionTwo['vega'],3,".","");
		$recordArr['optionTwovolga'] = number_format($optionTwo['volga'],3,".","");
		$recordArr['optionTwovanna'] = number_format($optionTwo['vanna'],3,".","");

		$recordArr['gammaTotal'] = number_format(($optionOne['gamma']+$optionTwo['gamma']),3,".","");
		$recordArr['vegaTotal'] = number_format(($optionOne['vega']+$optionTwo['vega']),3,".","");
		$recordArr['volgaTotal'] = number_format(($optionOne['volga']+$optionTwo['volga']),3,".","");
		$recordArr['vannaTotal'] = number_format(($optionOne['vanna']+$optionTwo['vanna']),3,".","");*/
		//total value
		//$recordArr['totalPremium'] = number_format(($optionOne['callValue']+$optionTwo['callValue']),2,".","");

		//print_r($optionTwo);die();
		echo json_encode($recordArr);
	}

	

	/************investments funds***********/



	function investment_funds($id='')

	{

		$this->common->check_user_login();

		$data = array();

		$data['title'] = 'Investments-Funds | Five Percent';

		$data['sub_title'] = 'Investments Funds';

		$user_id = $this->session->userdata('user_id');

		/*$investment1 = $this->db->query("SELECT a.id,a.user_id,a.investments_id,a.value,a.order_type,a.number,a.created_on,b.fund_name,b.fund_type FROM tbl_user_investments_management a INNER JOIN tbl_admin_investments b on a.investments_id=b.investments_id WHERE a.user_id='".$user_id."' AND b.fund_type=1")->result_array();



		$investment2 = $this->db->query("SELECT a.id,a.user_id,a.investments_id,a.value,a.number,a.order_type,a.created_on,b.fund_name,b.fund_type FROM tbl_user_investments_management a INNER JOIN tbl_admin_investments b on a.investments_id=b.investments_id WHERE a.user_id='".$user_id."' AND b.fund_type=2")->result_array();



		$List_of_added_investment = array_merge($investment1,$investment2);

		$ids = '';

		foreach($List_of_added_investment as $added_investment)

		{

			$ids.= $added_investment['investments_id'].',';

		}

		$ids = rtrim($ids,',');

		if(count($List_of_added_investment)>0)

		{

			$data['all_investments_lists'] = $this->db->query("SELECT investment_id,fund_type,fund_name FROM tbl_admin_investments WHERE investments_id NOT IN ($ids) ORDER BY fund_name")->result();

		}

		else

		{

			$data['all_investments_lists'] = $this->db->query("SELECT investment_id,fund_type,fund_name  FROM  tbl_admin_investments ORDER BY fund_name_name")->result();

		}

		$data['admin_stock_lists'] = $this->db->query("SELECT investment_id,fund_type,fund_name  FROM  tbl_admin_investments ORDER BY fund_name_name")->result();*/

		//$data['stocks'] = array_merge($stocks1,$stocks2);	

		$data['admin_investments_lists']=$this->db->query("SELECT investments_id,fund_type,fund_name  FROM  tbl_admin_investments ORDER BY fund_name")->result();



		$totaldata = $this->db->query("SELECT a.investments_id,b.fund_name FROM tbl_user_investments_management a INNER JOIN tbl_admin_investments b on a.investments_id=b.investments_id WHERE a.user_id='".$user_id."' AND a.investments_type=1")->num_rows();



		$config = array();

		$config["base_url"] = base_url() . "users/portfolio/investment_funds";

		

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



		$data['investments'] = $this->db->query("SELECT a.id,a.user_id,a.investments_id,a.value,a.fund_type,b.fund_commission,a.amount,a.created_on,b.fund_name,b.fund_type FROM tbl_user_investments_management a INNER JOIN tbl_admin_investments b on a.investments_id=b.investments_id WHERE a.user_id='".$user_id."' AND a.investments_type=1 ORDER BY a.id  DESC LIMIT $start_from,$limit")->result_array();

		$str_links = $this->pagination->create_links();

	    $data["links"] = explode('&nbsp;',$str_links );

		$this->load->view('page/portfolio/investments_portfolio',$data);

	}

	/******get fund_name list*******/

	function get_fund_name()

	{

			$user_id = $this->session->userdata('user_id');

			$fund_type=$this->input->post('fund_type');

		$investment1 = $this->db->query("SELECT a.id,a.user_id,a.investments_id,b.fund_name,b.fund_type FROM tbl_user_investments_management a INNER JOIN tbl_admin_investments b on a.investments_id=b.investments_id WHERE a.user_id='".$user_id."' AND b.fund_type=1")->result_array();



		$investment2 = $this->db->query("SELECT a.id,a.user_id,a.investments_id,b.fund_name,b.fund_type FROM tbl_user_investments_management a INNER JOIN tbl_admin_investments b on a.investments_id=b.investments_id WHERE a.user_id='".$user_id."' AND b.fund_type=2")->result_array();



		$List_of_added_investment = array_merge($investment1,$investment2);

		$ids = '';

		foreach($List_of_added_investment as $added_investment)

		{

			$ids.= $added_investment['investments_id'].',';

		}

		$ids = rtrim($ids,',');

		if(count($List_of_added_investment)>0)

		{

			$all_investments_lists = $this->db->query("SELECT investments_id,fund_type,fund_commission,fund_name FROM tbl_admin_investments WHERE investments_id NOT IN ($ids) AND fund_type='$fund_type' ORDER BY fund_name")->result();

		}

		else

		{

			$all_investments_lists = $this->db->query("SELECT investments_id,fund_type,fund_commission,fund_name  FROM  tbl_admin_investments  Where fund_type='$fund_type' ORDER BY fund_name")->result();

		}

		 

                     foreach($all_investments_lists as $nvestments_lists){

                        echo "<option value='".$nvestments_lists->investments_id."'>".$nvestments_lists->fund_name."</option>";

                    }

	}



	/******add investments fund ************/

	function add_investments_ajax()

	{

		$this->common->ajax_check_user_login();

		$user_id = $this->session->userdata('user_id');

		$created_on = date("Y-m-d H:i:s");

		$fund_name = $this->input->post('fund_name');

		$fund_type = $this->input->post('fund_type');

		$amount = $this->input->post('amount');

		$investments_type = $this->input->post('investments_type');

		$insertData = array(

							'user_id'=>$user_id,

							'investments_id'=>$fund_name,

							'fund_type'=>$fund_type,

							'amount'=>$amount,

							'investments_type'=>$investments_type,

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

		echo 1;		



	}



	function edit_investments()

	{

		$this->common->ajax_check_user_login();

		$user_id = $this->session->userdata('user_id');

		$investments_id = $this->input->post('investments_id');

		$stockResult = $this->db->query("SELECT * FROM tbl_user_investments_management WHERE user_id='".$user_id."' AND id='".$investments_id."'")->row();

		echo json_encode($stockResult);

	}

	function update_investments_ajax()

	{

		$this->common->ajax_check_user_login();

		$user_id = $this->session->userdata('user_id');

		$created_on = date("Y-m-d H:i:s");

		$user_investments_id = $this->input->post('user_investments_id');

		$fund_name = $this->input->post('fund_name');

		$fund_type = $this->input->post('fund_type');

		$amount = $this->input->post('amount');

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

		echo 1;	

	}

	function delete_investments_ajax()

	{

		$this->common->ajax_check_user_login();

		$user_id = $this->session->userdata('user_id');

		$investments_id = $this->input->post('investments_id');

		$this->db->where('id',$investments_id);

		$this->db->where('user_id',$user_id);

		$this->db->delete('tbl_user_investments_management');

		echo 1;

	}

     

     function details_investments_portfolio($investments_id)

	{

		$this->common->check_user_login();

		$user_id = $this->session->userdata('user_id');

		$data = array();

		$investments_id = base64_decode(base64_decode($investments_id));

		//echo $stock_id;die;

		$data['title'] = 'Investments Portfolio | Five Percent';

		$data['sub_title'] = 'Investments Portfolio';



		$data['investments_details'] = $this->db->query("SELECT a.id AS user_investments_id,a.investments_id,a.fund_type,a.amount,b.fund_name,b.fund_commission FROM tbl_user_investments_management a INNER JOIN tbl_admin_investments b ON a.investments_id=b.investments_id WHERE a.id='".$investments_id."' AND a.user_id='".$user_id."' ")->row();

		//echo "<pre>";print_r($data['stock_details']);die;

		$this->load->view('page/portfolio/details-investments-portfolio',$data);

	}



	function get_balance_sheet_data_from_investing()

	{

		/*$ch = curl_init(); 

		curl_setopt($ch, CURLOPT_URL, 'https://finance.yahoo.com/quote/REP.MC/balance-sheet?p=REP.MC'); 

		curl_setopt($ch, CURLOPT_HEADER, 1); 

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

		$data = curl_exec($ch); 

		curl_close($ch); */



		$curl = curl_init();



		curl_setopt_array($curl, array(

			CURLOPT_URL => "https://apidojo-yahoo-finance-v1.p.rapidapi.com/stock/v2/get-balance-sheet?symbol=IBM",

			CURLOPT_RETURNTRANSFER => true,

			CURLOPT_FOLLOWLOCATION => true,

			CURLOPT_ENCODING => "",

			CURLOPT_MAXREDIRS => 10,

			CURLOPT_TIMEOUT => 30,

			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

			CURLOPT_CUSTOMREQUEST => "GET",

			CURLOPT_HTTPHEADER => array(

				"x-rapidapi-host: apidojo-yahoo-finance-v1.p.rapidapi.com",

				"x-rapidapi-key: 918bf7e91amsha13c6546ed285ddp19d110jsn6d478ddbe279"

			),

		));



		$response = curl_exec($curl);

		$err = curl_error($curl);



		curl_close($curl);

		//echo "<pre>";print_r($response);die;

		/*if ($err) {

			echo "cURL Error #:" . $err;

		} else {

			echo $response;

		}*/



		$result = json_decode($response);

		$intangibleAssets = $result->balanceSheetHistoryQuarterly->balanceSheetStatements[0]->intangibleAssets->raw;

		$TotalAssets = $result->balanceSheetHistoryQuarterly->balanceSheetStatements[0]->totalAssets->raw;

		$otherCurrentAssets = $result->balanceSheetHistoryQuarterly->balanceSheetStatements[0]->otherCurrentAssets->raw;

		$otherAssets = $result->balanceSheetHistoryQuarterly->balanceSheetStatements[0]->otherAssets->raw;

		$TotalCurrentAssets = $result->balanceSheetHistoryQuarterly->balanceSheetStatements[0]->totalCurrentAssets->raw;

		$netTangibleAssets = $result->balanceSheetHistoryQuarterly->balanceSheetStatements[0]->netTangibleAssets->raw;

		//echo $intangibleAssets."<br>";

		//die;

		

		$cash = $result->balanceSheetHistoryQuarterly->balanceSheetStatements[0]->cash->raw;

		$netReceivables = $result->balanceSheetHistoryQuarterly->balanceSheetStatements[0]->netReceivables->raw;

		$inventory = $result->balanceSheetHistoryQuarterly->balanceSheetStatements[0]->inventory->raw;

		$totalNonCurrentAssets = $TotalAssets-$TotalCurrentAssets;



		$currentAssetsPercentage = 0;

		$nonCurrentAssetsPercentage = 0;

		$cashPercentage = 0;

		$netReceivablesPercentage = 0;

		$inventoryPercentage = 0;

		$otherCurrentAssetsPercentage = 0;

		$currentAssetsPercentage = ($TotalCurrentAssets/$TotalAssets)*100;

		$nonCurrentAssetsPercentage = ($totalNonCurrentAssets/$TotalAssets)*100;

		$cashPercentage = ($cash/$TotalAssets)*100;

		$netReceivablesPercentage = ($netReceivables/$TotalAssets)*100;

		$inventoryPercentage = ($inventory/$TotalAssets)*100;

		$otherCurrentAssetsPercentage = ($otherCurrentAssets/$TotalAssets)*100;

		/*echo $currentAssetsPercentage."<br>";

		echo $nonCurrentAssetsPercentage."<br>";

		echo $cashPercentage."<br>";

		echo $netReceivablesPercentage."<br>";

		echo $inventoryPercentage."<br>";

		echo $otherCurrentAssetsPercentage."<br>";

		*/

		//echo ($cashPercentage+$netReceivablesPercentage+$inventoryPercentage+$otherCurrentAssetsPercentage)."<br>";

		//echo $totalNonCurrentAssets;





		//Second chart calculation

		$totalLiab = $result->balanceSheetHistoryQuarterly->balanceSheetStatements[0]->totalLiab->raw;

		$totalStockholderEquity = $result->balanceSheetHistoryQuarterly->balanceSheetStatements[0]->totalStockholderEquity->raw;

		$totalCurrentLiabilities = $result->balanceSheetHistoryQuarterly->balanceSheetStatements[0]->totalCurrentLiabilities->raw;

		$nonCurrenLiabilities = $totalLiab-$totalCurrentLiabilities;

		//$equity = ($totalLiab+$totalStockholderEquity)-($totalCurrentLiabilities+$nonCurrenLiabilities);

		$equity = $totalStockholderEquity;

		$currentLiabilitiesPercentage = 0;

		$NoncurrentLiabilitiesPercentage = 0;

		$equityPercentage = 0;

		$currentLiabilitiesPercentage = ($totalCurrentLiabilities/($totalLiab+$totalStockholderEquity))*100;

		$NoncurrentLiabilitiesPercentage = ($nonCurrenLiabilities/($totalLiab+$totalStockholderEquity))*100;

		$equityPercentage = ($equity/($totalLiab+$totalStockholderEquity))*100;



		echo $currentLiabilitiesPercentage."<br>".$NoncurrentLiabilitiesPercentage."<br>".$equityPercentage;



		echo "<pre>";print_r($result->balanceSheetHistoryQuarterly->balanceSheetStatements[0]);

		die;











		$url = 'https://finance.yahoo.com/quote/REP.MC/balance-sheet?p=REP.MC';

		$dom = file_get_contents($url);

		$pokemon_doc = new DOMDocument();

		libxml_use_internal_errors(TRUE); //disable libxml errors

		$pokemon = $pokemon_doc->loadHTML($dom);

		libxml_clear_errors(); //remove errors for yucky html

		$pokemon_xpath = new DOMXPath($pokemon_doc);

		$pokemon_row = $pokemon_xpath->query('//div[@class="D(tbrg)"]');

		



		foreach($pokemon_row as $row)

		{

			//echo "<pre>";

			//print_r($row);

			//print_r($row->childNodes);

			//echo $row->nodeValue."<br>";

			foreach($row->childNodes as $ch)

			{

				//print_r($ch->childNodes);

				foreach($ch->childNodes as $kk)

				{

					

					foreach($kk->childNodes as $cc)

					{

						//echo "<pre>";print_r($cc->childNodes);

						$name = $pokemon_xpath->query('div[@class="rw-expnded"]',$cc);

						echo "<pre>";print_r($name);

						/*foreach($cc->childNodes as $insideTotalAssets)

						{

							echo "<pre>";print_r($insideTotalAssets);

						}

*/						//echo $cc->textContent."<br>";

					}

				}

			}

		}

		//print_r($pokemon_row);

	}

	function get_ratio_calculation_data()

	{

		$curl = curl_init();

		//https://rapidapi.p.rapidapi.com/stock/v2/get-statistics?symbol=AMRN&region=US

		curl_setopt_array($curl, array(

			CURLOPT_URL => "https://apidojo-yahoo-finance-v1.p.rapidapi.com/stock/v2/get-statistics?region=US&symbol=REP.MC",

			CURLOPT_RETURNTRANSFER => true,

			CURLOPT_FOLLOWLOCATION => true,

			CURLOPT_ENCODING => "",

			CURLOPT_MAXREDIRS => 10,

			CURLOPT_TIMEOUT => 30,

			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

			CURLOPT_CUSTOMREQUEST => "GET",

			CURLOPT_HTTPHEADER => array(

				"x-rapidapi-host: apidojo-yahoo-finance-v1.p.rapidapi.com",

				"x-rapidapi-key: cUOH9qofz7mshH2yHZrCdCU2c4vSp1aQzXXjsnbdK2oqo3Y7iu"

			),

		));



		$response = curl_exec($curl);

		$err = curl_error($curl);



		curl_close($curl);



		if ($err) {

			echo "cURL Error #:" . $err;

		} else {

			//echo $response;

		}

		$result = json_decode($response);

		$defaultKeyStatistics = $result->defaultKeyStatistics;

		$forwardPE_PER = $defaultKeyStatistics->forwardPE->fmt;

		$pegRatio_PEG = $defaultKeyStatistics->pegRatio->fmt;

		$beta = $defaultKeyStatistics->beta->fmt;

		$dividendRate = $result->summaryDetail->dividendRate->fmt;

		echo "<pre>";print_r($result->financialData->operatingMargins->fmt);

	}

	function test_percentile()

	{

		$arr = array(57,53,52,51,50,47,46,41,40,39);

		$tes =  $this->chart_model->setPercentile($arr,1);

		echo "<pre>";print_r($tes);

	}

	function testdataTag()

	{

		$the_big_array = $this->chart_model->getSeasionalAllRecord();

		//echo "<pre>";print_r($the_big_array);die;

		$dateRange = $this->chart_model->printSeasionalAnalysisdate(date('Y').'-01-01', date('Y').'-12-31','d-m');

		//echo "<pre>";print_r($dateRange);die;

		foreach($this->chart_model->printSeasionalAnalysisdate(date('Y').'-03-16', date('Y').'-04-03','d-M') as $xl)

		{

			$xdata[] = "'".$xl."'";

		}

		//echo "<pre>";print_r($xdata);die;

		$startPoint = $the_big_array[0]['converted_date'];



		$endPoint =  date("d-m-Y",strtotime($the_big_array[0]['actual_date']."-10 year"));

		$before10YearsEndPoint = date("d-m-Y",strtotime($endPoint."-10 year"));

		//End Of before 10 Years

		$before10YearsEndPoint = strtotime($before10YearsEndPoint);



		$endPoint = strtotime($endPoint);



		$end20YearsEndPoint = date("d-m-Y",strtotime($the_big_array[0]['actual_date']."-20 year"));

		//End Of last 20 Years

		$end20YearsEndPoint = strtotime($end20YearsEndPoint);

		//last 10 years calculation

		$existLast10Year=array();

		$existVlLast10=array();

		$finalLast10=array();

		foreach($the_big_array as $val)

		{

			if(($startPoint>=$val['converted_date']) && ($endPoint<=$val['converted_date']))

			{

				foreach($dateRange as $range)

				{

					if(trim($range)==trim($val['search_date']))

					{

						if(!in_array($val['search_date'], $existLast10Year))

						{

							$existLast10Year[]=$val['search_date'];

							$existVlLast10[]=$val['converted_change'];



							$vl['search_date']=$val['search_date'];

							$vl['con_date']=strtotime($val['search_date']."-".date('Y'));

							$vl['change']= $this->chart_model->median(explode(',', $val['converted_change']));

							//$vl['change']= $val['converted_change'];



							$finalLast10[]=$vl;

						}

						else

						{

							$index = array_search ($val['search_date'],$existLast10Year);

							$existVlLast10[$index]=($existVlLast10[$index].','.$val['converted_change']);



							$vl['search_date']=$val['search_date'];

							$vl['con_date']=strtotime($val['search_date']."-".date('Y'));

							$vl['change']=$this->chart_model->median(explode(',', $existVlLast10[$index]));

							//$vl['change']=$existVlLast10[$index];

							$finalLast10[$index]=$vl;

						}

					}

				}

			}	

		}

		$recordByPrice10 = $finalLast10;

		$recordfinalLast10 = $finalLast10;

		usort($recordfinalLast10,array($this, 'sortsssss'));

		usort($recordByPrice10,array($this, 'sortMinPrice'));



		$last10Year1 = $this->getLastYearRecordCalculations(0,$recordByPrice10,$recordfinalLast10);

		echo "<pre>";print_r($last10Year1);

		$numberOfPostiveLast10Year1 = 0;

		$totalNumLast10Year1 = 0;

		foreach($last10Year1 as $last10)

		{

			if($last10['change']>0)

			{

				$numberOfPostiveLast10Year1++;

			}

			$totalNumLast10Year1++;

			$performanceLast10Years1[] = $last10['change'];

		}

		//echo $sumArr;

		echo "<br>last 10 year<br>";

		echo "<pre>";print_r($totalNumLast10Year1);

		echo "<pre>";print_r($numberOfPostiveLast10Year1);

		echo "<pre>";print_r($totalNumLast10Year1-$numberOfPostiveLast10Year1);

		echo "<pre>";print_r((array_sum($performanceLast10Years1)/count($performanceLast10Years1))*100);

		$probab1 = ($numberOfPostiveLast10Year1/$totalNumLast10Year1)*100;

		echo "<br>";

		echo $probab1;

		//before 10 years calculations.

		$existBefore10Year=array();

		$existVlBefore10=array();

		$finalBefore10=array();

		foreach($the_big_array as $val)

		{

			if(($endPoint>=$val['converted_date']) && ($before10YearsEndPoint<=$val['converted_date']))

			{

				foreach($dateRange as $range)

				{

					if(trim($range)==trim($val['search_date']))

					{

						if(!in_array($val['search_date'], $existBefore10Year))

						{

							$existBefore10Year[]=$val['search_date'];

							$existVlBefore10[]=$val['converted_change'];



							$vl['search_date']=$val['search_date'];

							$vl['con_date']=strtotime($val['search_date']."-".date('Y'));

							$vl['change']= $this->chart_model->median(explode(',', $val['converted_change']));



							$finalBefore10[]=$vl;

						}

						else

						{

							$index = array_search ($val['search_date'],$existBefore10Year);

							$existVlBefore10[$index]=($existVlBefore10[$index].','.$val['converted_change']);



							$vl['search_date']=$val['search_date'];

							$vl['con_date']=strtotime($val['search_date']."-".date('Y'));

							$vl['change']=$this->chart_model->median(explode(',', $existVlBefore10[$index]));

							$finalBefore10[$index]=$vl;

						}

					}

				}

			}	

		}

		$recordByPriceBefore10 = $finalBefore10;

		$recordfinalBefore10 = $finalBefore10;

		usort($recordfinalBefore10,array($this, 'sortsssss'));

		usort($recordByPriceBefore10,array($this, 'sortMinPrice'));

		//echo "<pre>";print_r($recordfinalBefore10);die;

		$before10Year1 = $this->getLastYearRecordCalculations(0,$recordByPriceBefore10,$recordfinalBefore10);

		//echo "<pre>";print_r($before10Year1);

		$numberOfPostiveBefore10Year1 = 0;

		$totalNumBefore10Year1 = 0;

		$performanceBefore10Years1 = array();

		foreach($before10Year1 as $before10)

		{

			if($before10['change']>0)

			{

				$numberOfPostiveBefore10Year1++;

			}

			$totalNumBefore10Year1++;

			$performanceBefore10Years1[] = $before10['change'];

		}

		//echo $sumArr;

		echo "<br>before 10 year<br>";

		echo "<pre>";print_r($totalNumBefore10Year1);

		echo "<pre>";print_r($numberOfPostiveBefore10Year1);

		echo "<pre>";print_r($totalNumBefore10Year1-$numberOfPostiveBefore10Year1);

		echo "<pre>";print_r((array_sum($performanceBefore10Years1)/count($performanceBefore10Years1))*100);

		$probab1 = ($numberOfPostiveBefore10Year1/$totalNumBefore10Year1)*100;

		echo "<br>";

		echo $probab1;



		//Last 20 Years Calculations.

		$existLast20Year=array();

		$existVlLast20=array();

		$finalLast20=array();

		foreach($the_big_array as $val)

		{

			if(($startPoint>=$val['converted_date']) && ($end20YearsEndPoint<=$val['converted_date']))

			{

				foreach($dateRange as $range)

				{

					if(trim($range)==trim($val['search_date']))

					{

						if(!in_array($val['search_date'], $existLast20Year))

						{

							$existLast20Year[]=$val['search_date'];

							$existVlLast20[]=$val['converted_change'];



							$vl['search_date']=$val['search_date'];

							$vl['con_date']=strtotime($val['search_date']."-".date('Y'));

							$vl['change']= $this->chart_model->median(explode(',', $val['converted_change']));



							$finalLast20[]=$vl;

						}

						else

						{

							$index = array_search ($val['search_date'],$existLast20Year);

							$existVlLast20[$index]=($existVlLast20[$index].','.$val['converted_change']);



							$vl['search_date']=$val['search_date'];

							$vl['con_date']=strtotime($val['search_date']."-".date('Y'));

							$vl['change']=$this->chart_model->median(explode(',', $existVlLast20[$index]));

							$finalLast20[$index]=$vl;

						}

					}

				}

			}	

		}

		$recordByPricelLast20 = $finalLast20;

		$recordfinalLast20 = $finalLast20;

		usort($recordfinalLast20,array($this, 'sortsssss'));

		usort($recordByPricelLast20,array($this, 'sortMinPrice'));

		//echo "<pre>";print_r($recordfinalLast20);die;

		$last20Year1 = $this->getLastYearRecordCalculations(0,$recordByPricelLast20,$recordfinalLast20);

		//echo "<pre>";print_r($last20Year1);

		$numberOfPostiveLast20Year1 = 0;

		$totalNumLast20Year1 = 0;

		$performanceLast20Years1 = array();

		foreach($last20Year1 as $last20)

		{

			if($last20['change']>0)

			{

				$numberOfPostiveLast20Year1++;

			}

			$totalNumLast20Year1++;

			$performanceLast20Years1[] = $last20['change'];

		}

		//echo "<pre>";print_r($performanceLast20Years1);die;

		echo "<br>Last 20 year<br>";

		echo "<pre>";print_r($totalNumLast20Year1);

		echo "<pre>";print_r($numberOfPostiveLast20Year1);

		echo "<pre>";print_r($totalNumLast20Year1-$numberOfPostiveLast20Year1);

		echo "<pre>";print_r((array_sum($performanceLast20Years1)/count($performanceLast20Years1))*100);

		$probab1 = ($numberOfPostiveLast20Year1/$totalNumLast20Year1)*100;

		echo "<br>";

		echo $probab1;

	}



	function get_max($array,$nth) 

	{

	    $all = array();

	    foreach($array as $key=>$value)

	    {

	        $all[] = $value['change'];

	    }

	    rsort($all);

	    return $all[$nth];

	}

	function sortMinPrice($a, $b)

    {

        if ($a["averageEvolution"] == $b["averageEvolution"]) 

        {  

            return 0;

        }

        return ($a["averageEvolution"] < $b["averageEvolution"]) ? -1 : 1; 

    }
    function compareDeepValue($val1, $val2)
	{
	   return strcmp($val1['converted_date'], $val2['converted_date']);
	}

    function getLastYearRecordCalculations($index,$sortedArr,$mainArr)
    {
    	$nextPrice = 0;
		$nextDate = '';
		$minPrice = $sortedArr[$index]['values'];
		$minDate = $sortedArr[$index]['dates'];
		foreach($mainArr as $vl)
		{
			if($vl['converted_date']>$sortedArr[$index]['converted_date'])
			{
				$nextPrice = $vl['values'];
				$nextDate = $vl['dates'];
				$nextCon = $vl['converted_date'];
				$nextUsualDate = $vl['usualDate'];
				$nextIndex = $vl['index'];
				break;
			}
		}
		$firstGetArr0 = array();
		$dataAr1 = array(); 
		$counter = 0;
		$nextConIn = "";
		$nextCon1 = "";
		foreach($mainArr as $kkkkkk=> $llvl)
		{
			if($llvl['converted_date']>$sortedArr[$index]['converted_date'])
			{
				if($llvl['values']>=$nextPrice)
				{
					$counter = 0;
					$nextPrice = $llvl['values'];
					$nextDate = $llvl['dates'];
					$nextCon = $llvl['converted_date'];
					$nextConIn = $llvl['dates'];
					$nextCon1 = $mainArr[$kkkkkk+1]['dates'];
					//echo strtotime(date('Y-m-d', strtotime($nextConIn)))."===".strtotime(date('Y-m-d', strtotime($nextCon1 . ' +2 day')))."<br>";
					//echo ($mainArr[$kkkkkk+1]['converted_date'].'+ 2day')."==ram<br>";
					$nextUsualDate = $llvl['usualDate'];
					$nextIndex = $llvl['index'];
					$dataAr1['dates'] = $llvl['dates'];
					$dataAr1['values'] = $llvl['values'];
					$dataAr1['index'] = $llvl['index'];
					$dataAr1['usualDate'] = $llvl['usualDate'];
					$dataAr1['converted_date'] = $llvl['converted_date'];
					if(strtotime(date('Y-m-d', strtotime($nextConIn . ' +2 day')))<strtotime(date('Y-m-d', strtotime($nextCon1))))
					{
						//echo "jai bajrang bali<br>";
						break;
					}
					//echo $mainArr[$kkkkkk+1]['usualDate']."===".$llvl['usualDate']."===".$lastDate."--if<br>";
					array_push($firstGetArr0,$dataAr1);
				}
				else
				{
					$counter++;
					$dataAr1['dates'] = $nextDate;
					$dataAr1['values'] = $nextPrice;
					$dataAr1['index'] = $nextIndex;
					$dataAr1['usualDate'] = $nextUsualDate;
					$dataAr1['converted_date'] = $nextCon;
					//echo strtotime(date('Y-m-d', strtotime($nextConIn)))."===".strtotime(date('Y-m-d', strtotime($nextCon1 . ' +2 day')))."==ram<br>";
					if(strtotime(date('Y-m-d', strtotime($llvl['dates'] . ' +2 day')))<strtotime(date('Y-m-d', strtotime($mainArr[$kkkkkk+1]['dates']))))
					{
						//echo "jai bajrang bali<br>";
						break;
					}
					/*if(strtotime(date('Y-m-d', strtotime($nextConIn . ' +2 day')))<strtotime(date('Y-m-d', strtotime($nextCon1))))
					{
						//echo "jai bajrang bali<br>";
						break;
					}*/
					/*$dataAr1['dates'] = $llvl['dates'];
					$dataAr1['values'] = $llvl['values'];
					$dataAr1['index'] = $llvl['index'];
					$dataAr1['usualDate'] = $llvl['usualDate'];
					$dataAr1['converted_date'] = $llvl['converted_date'];*/
					//echo $nextUsualDate."--else<br>";
					array_push($firstGetArr0,$dataAr1);
				}
				if($counter==30)
				{
					break;
				}
			}
			
		}
		$fisrtArrFromSort = array(
								array(
									'dates'=>$sortedArr[$index]['dates'],
									'values'=>$sortedArr[$index]['values'],
									'index'=>$sortedArr[$index]['index'],
									'usualDate'=>$sortedArr[$index]['usualDate'],
									'converted_date'=>$sortedArr[$index]['converted_date'],
								)
								
								);
		//$firstGetArr0 = array_merge($fisrtArrFromSort,$firstGetArr0);
		//echo "<pre>";print_r($firstGetArr0);
		//die;
		/*$valuesData = '';
		$dateData = '';
		$performance = 0;
		$totalDays = 0;
		foreach($firstGetArr0 as $k=>$v)
		{
			$valuesData.=$v['values'].',';
			$dateData.=$v['usualDate'].',';

		}
		$startPoint = $firstGetArr0[0]['values'];
		$endPoint = $firstGetArr0[count($firstGetArr0)-1]['values'];
		$performance = ($endPoint)-($startPoint);
		$totalDays = count($firstGetArr0);

		$checkPositiveNegativaArr = array(
										$this->getCountNegativePositiveDays($last20YearRecord[1],$startPoint,$endPoint),
										$this->getCountNegativePositiveDays($last20YearRecord[2],$startPoint,$endPoint),
										$this->getCountNegativePositiveDays($last20YearRecord[3],$startPoint,$endPoint),
										$this->getCountNegativePositiveDays($last20YearRecord[4],$startPoint,$endPoint),
										$this->getCountNegativePositiveDays($last20YearRecord[5],$startPoint,$endPoint),
										$this->getCountNegativePositiveDays($last20YearRecord[6],$startPoint,$endPoint),
										$this->getCountNegativePositiveDays($last20YearRecord[7],$startPoint,$endPoint),
										$this->getCountNegativePositiveDays($last20YearRecord[8],$startPoint,$endPoint),
										$this->getCountNegativePositiveDays($last20YearRecord[9],$startPoint,$endPoint),
										$this->getCountNegativePositiveDays($last20YearRecord[10],$startPoint,$endPoint),
										$this->getCountNegativePositiveDays($last20YearRecord[11],$startPoint,$endPoint),
										$this->getCountNegativePositiveDays($last20YearRecord[12],$startPoint,$endPoint),
										$this->getCountNegativePositiveDays($last20YearRecord[13],$startPoint,$endPoint),
										$this->getCountNegativePositiveDays($last20YearRecord[14],$startPoint,$endPoint),
										$this->getCountNegativePositiveDays($last20YearRecord[15],$startPoint,$endPoint),
										$this->getCountNegativePositiveDays($last20YearRecord[16],$startPoint,$endPoint),
										$this->getCountNegativePositiveDays($last20YearRecord[17],$startPoint,$endPoint),
										$this->getCountNegativePositiveDays($last20YearRecord[18],$startPoint,$endPoint),
										$this->getCountNegativePositiveDays($last20YearRecord[19],$startPoint,$endPoint),
										$this->getCountNegativePositiveDays($last20YearRecord[20],$startPoint,$endPoint),
										);
		$numOfPostiveYears = 0;
		$numOfnegativeYears = 0;
		foreach($checkPositiveNegativaArr as $pos)
		{
			if($pos==1)
			{
				$numOfPostiveYears++;
			}
			else
			{
				$numOfnegativeYears++;
			}
		}
		$arrays = array();
		$arrays['val'] = $valuesData;
		$arrays['dts'] = $dateData;
		$arrays['numOfPostiveYears'] = $numOfPostiveYears;
		$arrays['numOfnegativeYears'] = $numOfnegativeYears;
		$arrays['performance'] = $performance;
		$arrays['totalDays'] = $totalDays;
		$arrays['probability'] = ($numOfPostiveYears/20)*100;*/

		//echo "<pre>";print_r($numOfPostiveYears);
		//echo "<pre>";print_r($arrays);
		//die;
		return $firstGetArr0;
    }

    function getProfitProbabality()

    {

		$max = -9999999; //will hold max val

		$found_item = null; //will hold item with max val;

		$arr = array(

					 array(

					 	'Total' => 13,

					 	'Key1' => 'somethinga'

					 	),

					 array(

					 	'Total' => 3, 

					 	'Key1' => 'something b'

					 	),

					 array(

					 	'Total' => 43, 

					 	'Key1' => 'something c'

					 	)

					);

		foreach($arr as $k=>$v)

		{

		    if($v['Total']>$max)

		    {

		       $max = $v['Total'];

		       $found_item = $v;

		    }

		}



		echo "max value is $max<br>";

		print_r($found_item); 

    }

    function checkApiRapidApi()

    {

    	$getStocks = $this->db->query("SELECT * FROM tbl_admin_stock")->result();

    	foreach($getStocks as $stock)

    	{

    		$apis = $this->chart_model->apiLinkData('get-summary?region=US&symbol='.$stock->symbol);

	    	$apis = json_decode($apis);

	    	$beta = @$apis->defaultKeyStatistics->beta->fmt;

	    	$dividend = str_replace("%","",@$apis->summaryDetail->dividendYield->fmt);

	    	$price = str_replace(",","",@$apis->price->regularMarketPrice->fmt);

	    	if($beta=="" && $dividend=="" && $price!="")
	    	{
	    		$updateRecord = array(
	    						'price'=>$price,
	    						);
	    		$this->db->Where('id',$stock->id);
	    		$this->db->update('tbl_admin_stock',$updateRecord);
	    	}
	    	else if($beta=="" && $dividend!="" && $price=="")
	    	{
	    		$updateRecord = array(
	    						'dividend'=>$dividend,
	    						);
	    		$this->db->Where('id',$stock->id);
	    		$this->db->update('tbl_admin_stock',$updateRecord);
	    	}
	    	else if($beta=="" && $dividend!="" && $price!="")
	    	{
	    		$updateRecord = array(
	    						'dividend'=>$dividend,
	    						'price'=>$price,
	    						);
	    		$this->db->Where('id',$stock->id);
	    		$this->db->update('tbl_admin_stock',$updateRecord);
	    	}
	    	else if($beta!="" && $dividend=="" && $price=="")
	    	{
	    		$updateRecord = array(
	    						'beta'=>$beta,
	    						);
	    		$this->db->Where('id',$stock->id);
	    		$this->db->update('tbl_admin_stock',$updateRecord);
	    	}
	    	else if($beta!="" && $dividend=="" && $price!="")
	    	{
	    		$updateRecord = array(
	    						'beta'=>$beta,
	    						'price'=>$price,
	    						);
	    		$this->db->Where('id',$stock->id);
	    		$this->db->update('tbl_admin_stock',$updateRecord);
	    	}
	    	else if($beta!="" && $dividend!="" && $price=="")
	    	{
	    		$updateRecord = array(
	    						'beta'=>$beta,
	    						'dividend'=>$dividend,
	    						);
	    		$this->db->Where('id',$stock->id);
	    		$this->db->update('tbl_admin_stock',$updateRecord);
	    	}
	    	else if($beta!="" && $dividend!="" && $price!="")
	    	{
	    		$updateRecord = array(
	    						'beta'=>$beta,
	    						'dividend'=>$dividend,
	    						'price'=>$price,
	    						);
	    		$this->db->Where('id',$stock->id);
	    		$this->db->update('tbl_admin_stock',$updateRecord);
	    	}


	    	echo "price=".@$price." beta=".@$beta." dividend=".@$dividend."  ".$stock->stock_name." ".$stock->symbol."<br>";

    	}

    	/*echo "<pre>"; print_r($getStocks);die;

    	$apis = $this->chart_model->apiLinkData('get-summary?region=US&symbol=REP.MC');

    	$apis = json_decode($apis);

    	$beta = $apis->defaultKeyStatistics->beta->fmt;

    	$dividend = $apis->summaryDetail->dividendYield->fmt;

    	$price = $apis->price->regularMarketPrice->fmt;

    	echo "price=".$price."<br>";

    	echo "beta=".$beta."<br>";

    	echo "dividend=".$dividend."<br>";

    	echo "<pre>";print_r($apis->price->regularMarketPrice->fmt);*/

    }
    function createDataBase()
    {
    	$servername = "localhost";
		$username = "websiwvj_testepay";
		$password = "873wxS]b,cc+";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password);
		// Check connection
		if (!$conn) {
		  die("Connection failed: " . mysqli_connect_error());
		}

		// Create database
		$sql = "CREATE DATABASE test2001";
		if (mysqli_query($conn, $sql)) {
		  echo "Database created successfully";
		} else {
		  echo "Error creating database: " . mysqli_error($conn);
		}

		mysqli_close($conn);
    }

}