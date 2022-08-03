<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MobilePortfolio extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('common');
		$this->load->library('pagination');
		$this->load->model('chart_model');
	}
	function details_stock_portfolio()
	{
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

		$data = array();
		$data['stock_details'] = $this->db->query("SELECT a.id AS user_stock_id,a.stock_id,a.order_type,a.number,b.stock_name,c.id AS categoryID FROM tbl_user_stock_management a INNER JOIN tbl_admin_stock b ON a.stock_id=b.id LEFT JOIN tbl_admin_stock_industries c ON b.industry_id=c.id WHERE a.id='".$stock_id."' AND a.user_id='".$user_id."' ")->row();
		//echo "<pre>";print_r($data['stock_details']);		die;
		$allExcelFileRecordLast = $this->chart_model->file_handling($actual_stock_id);
		//echo "<pre>";print_r($allExcelFileRecordLast);
		//echo "<pre>";print_r(array_reverse($allExcelFileRecordLast));		die;
		$allExcelFileRecordLast = array_slice($allExcelFileRecordLast, 0,365);
		$allExcelFileRecord = array_reverse($allExcelFileRecordLast);		
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
		$this->load->view('page/portfolio/mobile-details-stock-portfolio',$data);
	}
	function showSeasonalAnalysisGraphMobile()
	{
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
		$data = array();
		/*
		***************************************************************************************
			Seasional Analysis Calculation
		***************************************************************************************
	
		*/
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
		$dataEvoltion = array();
		$recEvolution = array();
		$ijnnn = 0;
		$i=0;
		foreach($finalLast10 as $evolution)
		{
			$dataEvoltion['search_date'] = $evolution['search_date'];
			$dataEvoltion['con_date'] = $evolution['con_date'];
			$dataEvoltion['change'] = $evolution['change'];
			if($i==0)
			{
				$dataEvoltion['averageEvolution'] = $evolution['change'];
				$ijnnn=$evolution['change'];
			}
			else
			{
				$dataEvoltion['averageEvolution'] = $evolution['change']+$ijnnn;
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

		$last10Year1 = $this->getLastYearRecordCalculations(0,$recordByPrice10,$recordfinalLast10);
		//echo "<pre>";print_r($last10Year1);die;
		$numberOfPostiveLast10Year1 = 0;
		$numberOfNegativeLast10Year1 = 0;
		$totalNumLast10Year1 = 0;
		$profitLast10Year1 = 0;
		$probabalityLast10Year1 = 0;
		$performanceLast10Years1 = array();
		$dateRecordLast10Years1 = array();
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
		//echo "<br>last 10 year<br>";
		$numberOfNegativeLast10Year1 = $totalNumLast10Year1-$numberOfPostiveLast10Year1;
		$profitLast10Year1 = (array_sum($performanceLast10Years1)/count($performanceLast10Years1))*100;
		$probabalityLast10Year1 = ($numberOfPostiveLast10Year1/$totalNumLast10Year1)*100;
		//echo $probabalityLast10Year1;
		//Second Iteration
		$last10Year2 = $this->getLastYearRecordCalculations(1,$recordByPrice10,$recordfinalLast10);
		$numberOfPostiveLast10Year2 = 0;
		$numberOfNegativeLast10Year2 = 0;
		$totalNumLast10Year2 = 0;
		$profitLast10Year2 = 0;
		$probabalityLast10Year2 = 0;
		$performanceLast10Years2 = array();
		$dateRecordLast10Years2 = array();
		foreach($last10Year2 as $last10)
		{
			if($last10['averageEvolution']>0)
			{
				$numberOfPostiveLast10Year2++;
			}
			$totalNumLast10Year2++;
			$performanceLast10Years2[] = $last10['averageEvolution'];
			$dateRecordLast10Years2[] = $last10['timesptmp'];
		}
		//echo "<br>last 10 year<br>";
		$numberOfNegativeLast10Year2 = $totalNumLast10Year2-$numberOfPostiveLast10Year2;
		$profitLast10Year2 = (array_sum($performanceLast10Years2)/count($performanceLast10Years2))*100;
		$probabalityLast10Year2 = ($numberOfPostiveLast10Year2/$totalNumLast10Year2)*100;
		//echo $probabalityLast10Year2;
		//Third Iteration
		$last10Year3 = $this->getLastYearRecordCalculations(2,$recordByPrice10,$recordfinalLast10);
		$numberOfPostiveLast10Year3 = 0;
		$numberOfNegativeLast10Year3 = 0;
		$totalNumLast10Year3 = 0;
		$profitLast10Year3 = 0;
		$probabalityLast10Year3 = 0;
		$performanceLast10Years3 = array();
		$dateRecordLast10Years3 = array();
		foreach($last10Year3 as $last10)
		{
			if($last10['averageEvolution']>0)
			{
				$numberOfPostiveLast10Year3++;
			}
			$totalNumLast10Year3++;
			$performanceLast10Years3[] = $last10['averageEvolution'];
			$dateRecordLast10Years3[] = $last10['timesptmp'];
		}
		//echo "<br>last 10 year<br>";
		$numberOfNegativeLast10Year3 = $totalNumLast10Year3-$numberOfPostiveLast10Year3;
		$profitLast10Year3 = (array_sum($performanceLast10Years3)/count($performanceLast10Years3))*100;
		$probabalityLast10Year3 = ($numberOfPostiveLast10Year3/$totalNumLast10Year3)*100;
		//echo $probabalityLast10Year3;

		// 4th Iteration
		$last10Year4 = $this->getLastYearRecordCalculations(3,$recordByPrice10,$recordfinalLast10);
		$numberOfPostiveLast10Year4 = 0;
		$numberOfNegativeLast10Year4 = 0;
		$totalNumLast10Year4 = 0;
		$profitLast10Year4 = 0;
		$probabalityLast10Year4 = 0;
		$performanceLast10Years4 = array();
		$dateRecordLast10Years4 = array();
		foreach($last10Year4 as $last10)
		{
			if($last10['averageEvolution']>0)
			{
				$numberOfPostiveLast10Year4++;
			}
			$totalNumLast10Year4++;
			$performanceLast10Years4[] = $last10['averageEvolution'];
			$dateRecordLast10Years4[] = $last10['timesptmp'];
		}
		//echo "<br>last 10 year<br>";
		$numberOfNegativeLast10Year4 = $totalNumLast10Year4-$numberOfPostiveLast10Year4;
		$profitLast10Year4 = (array_sum($performanceLast10Years4)/count($performanceLast10Years4))*100;
		$probabalityLast10Year4 = ($numberOfPostiveLast10Year4/$totalNumLast10Year4)*100;
		//echo $probabalityLast10Year4;
		// 5th Iteration
		$last10Year5 = $this->getLastYearRecordCalculations(4,$recordByPrice10,$recordfinalLast10);
		$numberOfPostiveLast10Year5 = 0;
		$numberOfNegativeLast10Year5 = 0;
		$totalNumLast10Year5 = 0;
		$profitLast10Year5 = 0;
		$probabalityLast10Year5 = 0;
		$performanceLast10Years5 = array();
		$dateRecordLast10Years5 = array();
		foreach($last10Year5 as $last10)
		{
			if($last10['averageEvolution']>0)
			{
				$numberOfPostiveLast10Year5++;
			}
			$totalNumLast10Year5++;
			$performanceLast10Years5[] = $last10['averageEvolution'];
			$dateRecordLast10Years5[] = $last10['timesptmp'];
		}
		//echo "<br>last 10 year<br>";

		$numberOfNegativeLast10Year5 = $totalNumLast10Year5-$numberOfPostiveLast10Year5;
		$profitLast10Year5 = (array_sum($performanceLast10Years5)/count($performanceLast10Years5))*100;
		$probabalityLast10Year5 = ($numberOfPostiveLast10Year5/$totalNumLast10Year5)*100;
		//echo $probabalityLast10Year5;

		$seasionalAnalysisFilterArr = array(
							array(
								'probabality'=>$probabalityLast10Year1,
								'profit'=>$profitLast10Year1,
								'totalNumber'=>$totalNumLast10Year1,
								'totalPositive'=>$numberOfPostiveLast10Year1,
								'totalNegative'=>$numberOfNegativeLast10Year1,
								'price_median'=>$performanceLast10Years1,
								'timesptmp'=>$dateRecordLast10Years1,
								'index'=>0,
								),
							array(
								'probabality'=>$probabalityLast10Year2,
								'profit'=>$profitLast10Year2,
								'totalNumber'=>$totalNumLast10Year2,
								'totalPositive'=>$numberOfPostiveLast10Year2,
								'totalNegative'=>$numberOfNegativeLast10Year2,
								'price_median'=>$performanceLast10Years2,
								'timesptmp'=>$dateRecordLast10Years2,
								'index'=>1,
								),
							array(
								'probabality'=>$probabalityLast10Year3,
								'profit'=>$profitLast10Year3,
								'totalNumber'=>$totalNumLast10Year3,
								'totalPositive'=>$numberOfPostiveLast10Year3,
								'totalNegative'=>$numberOfNegativeLast10Year3,
								'price_median'=>$performanceLast10Years3,
								'timesptmp'=>$dateRecordLast10Years3,
								'index'=>2,
								),
							array(
								'probabality'=>$probabalityLast10Year4,
								'profit'=>$profitLast10Year4,
								'totalNumber'=>$totalNumLast10Year4,
								'totalPositive'=>$numberOfPostiveLast10Year4,
								'totalNegative'=>$numberOfNegativeLast10Year4,
								'price_median'=>$performanceLast10Years4,
								'timesptmp'=>$dateRecordLast10Years4,
								'index'=>3,
								),
							array(
								'probabality'=>$probabalityLast10Year5,
								'profit'=>$profitLast10Year5,
								'totalNumber'=>$totalNumLast10Year5,
								'totalPositive'=>$numberOfPostiveLast10Year5,
								'totalNegative'=>$numberOfNegativeLast10Year5,
								'price_median'=>$performanceLast10Years5,
								'timesptmp'=>$dateRecordLast10Years5,
								'index'=>4,
								),
						);
		//echo "<pre>";print_r($seasionalAnalysisFilterArr);
		$maxProbabality = -999;
		$found_item = null;
		foreach($seasionalAnalysisFilterArr as $k=>$v)
		{
		    if($v['probabality']>$maxProbabality)
		    {
		       $maxProbabality = $v['probabality'];
		       $found_item = $v;
		    }
		}
		//echo "max value is $maxProbabality<br>";
		//echo "<pre>";print_r($found_item);
		//die;

		$data['totalNumOfPos'] = $found_item['totalPositive'];
		$data['totalNumOfNeg'] = $found_item['totalNegative'];
		$data['probabality'] = number_format($found_item['probabality'],2,'.','');
		$data['totalSum'] = $found_item['totalNumber'];
		$data['NumberOfdays'] = $found_item['totalNumber'];
		$data['totalNumberOfdays'] = $found_item['totalNumber'];
		$data['totalNumberOfPositiveDays'] = $found_item['totalPositive'];
		$data['totalNumberOfPositiveDaysPercentage'] = number_format($found_item['probabality'],2,'.','');

		$data['xLabel'] = implode(',', $found_item['timesptmp']);
		$data['xStartDate'] = trim(current($found_item['timesptmp']),"'");
		$data['xEndDate'] = trim(end($found_item['timesptmp']),"'");
		$data['last10Years'] = implode(',', $found_item['price_median']);
		$data['performanceLast10Years'] = $found_item['profit'];
		//$data['last20Years'] = implode(',', $last20Years);
		//$data['before10Year'] = implode(',', $before10Year);
		$data['seasionalDate'] = $this->chart_model->printSeasionalAnalysisdate(date('Y').'-01-01', date('Y').'-12-31');
		$this->load->view('page/portfolio/showSeasonalAnalysisGraphMobile',$data);
	}
	function sortsssss($a, $b)
    {
        if ($a["con_date"] == $b["con_date"]) 
        {  
            return 0;
        }
        return ($a["con_date"] < $b["con_date"]) ? -1 : 1; 
    }
    function sortMinPrice($a, $b)
    {
        if ($a["averageEvolution"] == $b["averageEvolution"]) 
        {  
            return 0;
        }
        return ($a["averageEvolution"] < $b["averageEvolution"]) ? -1 : 1; 
    }
    function getLastYearRecordCalculations($index,$sortedArr,$mainArr)
    {
    	$minPrice = $sortedArr[$index]['averageEvolution'];
		$nextDate = '';
		$MinDate = $sortedArr[$index]['search_date'];
		$counter = 0;
		foreach($sortedArr as $rec)
		{
			if($rec['con_date']>$sortedArr[$index]['con_date'])
			{
				$nextPrice = $rec['averageEvolution'];
				$nextDate = $rec['search_date'];
				break;
			}
		}		
		$last10Year = array();
		$dataLast10Year = array();
		foreach($mainArr as $key=>$rec)
		{
			if($rec['con_date']>$sortedArr[$index]['con_date'])
			{
				if($minPrice<=$nextPrice)
				{
					$counter=0;
					$minPrice = $nextPrice;
					$nextPrice = $rec['averageEvolution'];
					$nextDate = $rec['search_date'];

					$dataLast10Year['averageEvolution'] = $minPrice;
					$dataLast10Year['search_date'] = $nextDate;
					$dataLast10Year['timesptmp'] = "'".date("d-M", ($rec['con_date']))."'";
					array_push($last10Year, $dataLast10Year);					
				}
				else
				{
					$counter++;
					$nextDate = $rec['search_date'];
					$nextPrice = $rec['averageEvolution'];
					$dataLast10Year['averageEvolution'] = $nextPrice;
					$dataLast10Year['search_date'] = $nextDate;
					$dataLast10Year['timesptmp'] = "'".date("d-M", ($rec['con_date']))."'";
					array_push($last10Year, $dataLast10Year);
				}
				if($counter==30)
				{
					break;
				}
			}
			else
			{
			}
		}
		return $last10Year;
    }
    function showStockPortfolioSimulationGraphMobile()
    {
    	$user_id = $this->input->get('user_id');
		//$stock_id = $this->input->get('stock_id');
		//$actual_stock_id = $this->input->get('stock_ref_id');
		if($user_id=="" && $user_id==null)
		{
			echo "Please provide User Id";
			return false;
		}
		/*if($stock_id=="" && $stock_id==null)
		{
			echo "Please provide Stock Id";
			return false;
		}
		if($actual_stock_id=="" && $actual_stock_id==null)
		{
			echo "Please provide Stock Reference Id";
			return false;
		}*/
    	$data = array();
		$data['title'] = 'Simulation';
		$data['sub_title'] = 'Simulation';
    	$this->load->view('page/portfolio/showStockPortfolioSimulationGraphMobile',$data);
    }
    function showOptionPortfolioResumeGraphMobile()
    {
    	$user_id = $this->input->get('user_id');
		$stock_id = $this->input->get('stock_id');
		//$actual_stock_id = $this->input->get('stock_ref_id');
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
		/*if($actual_stock_id=="" && $actual_stock_id==null)
		{
			echo "Please provide Stock Reference Id";
			return false;
		}*/
    	$data = array();
		$data['title'] = 'Resume';
		$data['sub_title'] = 'Resume';
    	$this->load->view('page/portfolio/showOptionPortfolioResumeGraphMobile',$data);
    }
    function showOptionPortfoliosimulationGraphMobile()
    {
    	$user_id = $this->input->get('user_id');
		$stock_id = $this->input->get('stock_id');
		//$actual_stock_id = $this->input->get('stock_ref_id');
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
		/*if($actual_stock_id=="" && $actual_stock_id==null)
		{
			echo "Please provide Stock Reference Id";
			return false;
		}*/
    	$data = array();
		$data['title'] = 'Resume';
		$data['sub_title'] = 'Resume';
    	$this->load->view('page/portfolio/showOptionPortfoliosimulationGraphMobile',$data);
    }
}