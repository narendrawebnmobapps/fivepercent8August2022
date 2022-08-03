<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Moneymanagement extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('common');
	}
	function index()
	{
		$this->common->check_user_login();
		$data = array();
		$data['title'] = 'Money Management| Five Percent';
		$user_id = $this->session->userdata('user_id');
		$recordarray = array();
		$dchrat = array();
		$chartArray = array();
		$data['strategies'] = $this->db->query("SELECT id,strategy FROM tbl_admin_strategies ORDER BY strategy ASC")->result();
		$dataResults = $this->db->query("SELECT a.id,a.date_in,a.product,a.price_in,a.volume,a.final_volume,a.date_out,a.price_out,b.stock_name FROM tbl_users_trading_diary a INNER JOIN tbl_admin_stock b ON a.product=b.id WHERE  a.user_id='".$user_id."'")->result();	
		//echo "<pre>";print_r($dataResults);

		$chartdData = $this->db->query("SELECT a.price_in,a.price_out,a.volume,a.final_volume,a.created_on,b.stock_name FROM tbl_users_trading_diary a INNER JOIN tbl_admin_stock b ON a.product=b.id WHERE  a.user_id='".$user_id."' AND a.final_volume>0 ORDER BY a.id ASC")->result();
		//echo "<pre>";print_r($chartdData);die();
		$totalProfit = 0;
        foreach($chartdData as $pro)
        {
            //if(($pro->price_out*$pro->final_volume)>($pro->price_in*$pro->final_volume))
            //{
                $totalProfit = $totalProfit+($pro->price_out*$pro->final_volume)-($pro->price_in*$pro->final_volume);
            //}
        }
        //echo $totalProfit;die;
        $allDateArr[0] = 0;
        $percentArr[0] = 0;
        $c = 0;
		foreach($chartdData as $chart)
		{
			$dchrat['values'] = ($chart->price_out*$chart->final_volume)-($chart->price_in*$chart->final_volume);
			//echo $dchrat['values']."<br>";
			if($totalProfit==0)
			{
				$dchrat['percent_value'] = number_format((($chart->price_out*$chart->final_volume-$chart->price_in*$chart->final_volume))*100,2,".","");
				$allDateArr[$c] = '"'.date('M d,Y', strtotime($chart->created_on)).'"';
				$percentArr[$c] = number_format((($chart->price_out*$chart->final_volume-$chart->price_in*$chart->final_volume))*100,2,".","");
			}
			else
			{
				$dchrat['percent_value'] = number_format((($chart->price_out*$chart->final_volume-$chart->price_in*$chart->final_volume)/$totalProfit)*100,2,".","");
				$allDateArr[$c] = '"'.date('M d,Y', strtotime($chart->created_on)).'"';
				$percentArr[$c] = number_format((($chart->price_out*$chart->final_volume-$chart->price_in*$chart->final_volume)/$totalProfit)*100,2,".","");
				//$percentArr[$c] = ($chart->price_out*$chart->final_volume)-($chart->price_in*$chart->final_volume);
			}
			
			array_push($chartArray, $dchrat);
			$c++;
		}
		//echo "<pre>";print_r($chartdData);die;
		//echo "<pre>";print_r($chartArray);die;
		$win = 0;
		$loss = 0;
		$NooFnoLossNoProfit = 0;
		$noofPriftTransaction = 0;
		$noofLossTransaction = 0;
		$averageWin = 0;
		$averageLoss = 0;
		$count = 0;
		$kelly = 0;
		$mathHope = 0;
		foreach($dataResults as $result)
		{
			if(($result->price_in*$result->final_volume)<($result->price_out*$result->final_volume))
			{
				$win+= ($result->price_out*$result->final_volume)-($result->price_in*$result->final_volume);
				$noofPriftTransaction++;
			}
			else if(($result->price_in*$result->final_volume)>($result->price_out*$result->final_volume))
			{
				$loss+= ($result->price_in*$result->final_volume)-($result->price_out*$result->final_volume);
				$noofLossTransaction++;
			}
			else
			{
				$NooFnoLossNoProfit++;
			}
			$count++;
		}
		//echo $noofPriftTransaction."--".$noofLossTransaction."---".$NooFnoLossNoProfit;die;
		if($loss>0)
		{
			$averageLoss = $loss/$count;
		}
		if($count>0)
		{
			$averageWin = $win/$count;
		}
		
		if($averageWin>0 && $averageLoss>0)
		{
			$kelly = (($averageWin/100)*($averageWin/$averageLoss)-(1-($averageWin/100)))/($averageWin/$averageLoss);
			$mathHope = (($averageWin/100)*($averageWin/$averageLoss)-(1-($averageWin/100)));
		}
		else
		{
			$kelly = -1;
			$mathHope = -1;
		}
		if($count>0)
		{
			$data['averageWin'] = number_format($win/$count,2,".","");
			$data['averageLoss'] = number_format($loss/$count,2,".","");
		}
		else
		{
			$data['averageWin'] = number_format(0,2,".","");
			$data['averageLoss'] = number_format(0,2,".","");
		}
		
		$data['mathHope'] = number_format($mathHope,2,".","");
		$data['chartArray'] = $chartArray;
		$data['allDateArr'] = implode(',', $allDateArr);
		$data['percentArr'] = implode(',', $percentArr);
		$data['numberOfProfitTransaction'] = $noofPriftTransaction;
		$data['numberOfLossTransaction'] = $noofLossTransaction;
		$data['numberOfNoLossNoProfitTransaction'] = $NooFnoLossNoProfit;
		//echo implode(',', $allDateArr)."<br>";
		//echo implode(',', $percentArr)."<br>";
		$data['stopLoss'] = $this->db->query("SELECT stop_loss FROM tbl_user_personel_info WHERE user_id='".$user_id."'")->row()->stop_loss;
		//echo "<pre>";print_r($data);die;
		$this->load->view('page/money-management/money_management',$data);
	}
	function filter_money_management_ajax()
	{
		//error_reporting(0);
		$user_id = $this->session->userdata('user_id');
		$strategy = $this->input->post('strategy');
		$recordarray = array();
		$data = array();
		$dataResults = $this->db->query("SELECT a.id,a.date_in,a.product,a.price_in,a.date_out,a.price_out,a.volume,a.final_volume,b.stock_name FROM tbl_users_trading_diary a INNER JOIN tbl_admin_stock b ON a.product=b.id WHERE a.user_id='".$user_id."' AND a.startegy='".$strategy."'")->result();
		$win = 0;
		$loss = 0;
		$averageWin = 0;
		$averageLoss = 0;
		$count = 0;
		$kelly = 0;
		$mathHope = 0;
		//
		$NooFnoLossNoProfit = 0;
		$noofPriftTransaction = 0;
		$noofLossTransaction = 0;
		foreach($dataResults as $result)
		{
			if(($result->price_in*$result->final_volume)<($result->price_out*$result->final_volume))
			{
				$win+= ($result->price_out*$result->final_volume)-($result->price_in*$result->final_volume);
				$noofPriftTransaction++;
			}
			else if(($result->price_in*$result->final_volume)>($result->price_out*$result->final_volume))
			{
				$loss+= ($result->price_in*$result->final_volume)-($result->price_out*$result->final_volume);
				$noofLossTransaction++;
			}
			else
			{
				$NooFnoLossNoProfit++;
			}
			$count++;
		}
		if($count>0)
		{
			$averageLoss = $loss/$count;
		}
		if($count>0)
		{
			$averageWin = $win/$count;
		}
		
		if($averageLoss>0 && $averageWin>0)
		{
			$kelly = (($averageWin/100)*($averageWin/$averageLoss)-(1-($averageWin/100)))/($averageWin/$averageLoss);
			$mathHope = (($averageWin/100)*($averageWin/$averageLoss)-(1-($averageWin/100)));
		}
		else
		{
			/*$kelly = -1;
			$mathHope = -1;*/
			$kelly = 0;
			$mathHope = 0;
		}		

		$totalColor = 0;
		$red = $noofLossTransaction;
		$gray = $NooFnoLossNoProfit;
		$green = $noofPriftTransaction;
		$totalColor = $red+$gray+$green;   
		//$totalColor = $red+$green;   
		if($totalColor>0)
		{
			$redPercentage =  number_format(($red/$totalColor)*100,2,".","");
			$grayPercentage =  number_format(($gray/$totalColor)*100,2,".","");
			$greenPercentage = number_format(($green/$totalColor)*100,2,".","");
		}
		else
		{
			$redPercentage =  number_format(0,2,".","");
			$grayPercentage =  number_format(0,2,".","");
			$greenPercentage = number_format(0,2,".","");
		}
		

		$data['redPercentage'] = $redPercentage;
		$data['grayPercentage'] = $grayPercentage;
		//$data['grayPercentage'] =0;
		$data['greenPercentage'] = $greenPercentage;

		//no of transaction
		$data['noofLossTransaction'] = $noofLossTransaction;
		$data['noofPriftTransaction'] = $noofPriftTransaction;
		$data['NooFnoLossNoProfit'] = $NooFnoLossNoProfit;

		$data['averageWin']  = number_format($averageWin,2,".","");
		$data['averageLoss']  = number_format($averageLoss,2,".","");
		$data['kelly']  = number_format($kelly,2,".","");
		$data['mathHope'] = number_format($mathHope,2,".","");
		echo json_encode($data);
	}
	function filter_money_management_formulla_ajax()
	{
		$strategy = $this->input->post('strategy');
		$formulla = $this->input->post('formulla');
		$user_id = $this->session->userdata('user_id');
		if(trim($strategy)!="")
		{
			$dataResults = $this->db->query("SELECT a.id,a.date_in,a.product,a.price_in,a.date_out,a.price_out,a.pl,a.volume,a.final_volume,b.stock_name FROM tbl_users_trading_diary a INNER JOIN tbl_admin_stock b ON a.product=b.id  WHERE a.final_volume>0 AND a.startegy='".$strategy."' AND a.user_id='".$user_id."' ORDER BY a.id DESC")->result();
		}
		else
		{
			$dataResults = $this->db->query("SELECT a.id,a.date_in,a.product,a.price_in,a.date_out,a.price_out,a.pl,a.volume,a.final_volume,b.stock_name FROM tbl_users_trading_diary a INNER JOIN tbl_admin_stock b ON a.product=b.id WHERE a.final_volume>0 AND a.user_id='".$user_id."' ORDER BY a.id DESC")->result();
		}


		$get_income_expense = $this->db->query("SELECT a.options AS optionvalue,b.id AS option_id,a.value, a.question_id,b.options FROM user_question_options a LEFT JOIN tbl_question_options b ON a.options=b.id WHERE a.question_id=35 AND a.user_id='".$user_id."'")->result();
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
		//echo $capital_investing;die;

		
		$win = 0;
		$loss = 0;
		$averageWin = 0;
		$averageLoss = 0;
		$count = 0;
		$kelly = 0;
		$mathHope = 0;
		$avergaewinCount = 0;
		$avergaelossCount = 0;
		$purchase_price = 0;
		foreach($dataResults as $result)
		{
			$purchase_price+=$result->price_in;
			if(($result->price_in*$result->final_volume)<($result->price_out*$result->final_volume))
			{
				$win+= ($result->price_out*$result->final_volume)-($result->price_in*$result->final_volume);
			}
			else
			{
				$loss+= ($result->price_in*$result->final_volume)-($result->price_out*$result->final_volume);
			}
			$count++;
		}
		if($count>0)
		{
			$averageLoss = $loss/$count;
		}
		if($count>0)
		{
			$averageWin = $win/$count;
		}

		if($formulla==1) // kelly formulla
		{
			if($averageLoss>0 && $averageWin>0)
			{
				$kelly = (($averageWin/100)*($averageWin/$averageLoss)-(1-($averageWin/100)))/($averageWin/$averageLoss);
				echo '$ '.number_format($kelly,2,".","");
			}
			else
			{
				echo '$ '.number_format(-1,2,".","");
			}
		}
		if($formulla==2)  //elder formulla
		{
			$elderFormulla = 0;
			$trade_risk = 0;
			//$capital_investing = 50000; //(Keep one question for user to how much capital invsestment)
			//$purchase_price = 40; //(get from Trading Diary)
			$fraction = 2/100;
			//$stop_loss = 38; //(Ask To user)
			$stop_loss = $this->db->query("SELECT stop_loss FROM tbl_user_personel_info WHERE user_id='".$user_id."'")->row()->stop_loss;
			if($stop_loss==0)
			{
				echo 'needLoss';
				die;
			}
			$trade_risk = $purchase_price-$stop_loss;//360
			$elderFormulla = ($fraction*$capital_investing)/$trade_risk;
			echo floor($elderFormulla).' Stocks';
		}
		if($formulla==3)   // fix rate or delta formulla
		{
			$ys=0;
			$totalloss = 0;
			foreach ($dataResults as $k) 
			{					
					if($k->pl==0)
					{
						$ys=1;
						
					}				  
				  if($ys==1)
					{
						if($k->pl==1)
						{
							break;							
						}
						if($k->pl==0)
						{
							$totalloss+= $k->price_in-$k->price_out;
						}
					}			
				
			}
			echo '$ '.number_format($totalloss/2,2,".","");
		}
		if($formulla==4)  //ROR Formulla
		{
			$win = $averageWin/100;
			$loss = $averageLoss/100;
			$ta = $win-$loss;
			$risk = 0;
			//echo $ta;die;
			//$c = 1/$risk;
			$get_money_use_percentage = $this->db->query("SELECT money_use_percentage FROM tbl_user_rf_rv_options_values WHERE user_id='".$user_id."'");
			if($get_money_use_percentage->num_rows()<1)
			{
				$risk = 0;
			}
			else
			{
				$risk = $capital_investing*($get_money_use_percentage->row()->money_use_percentage/100);
			}
			//echo $risk;die();
			/*if($ta>0)
			{
				$c = 1/$ta;
			}
			else
			{
				$c = 1;
			}*/
			
			$ror = (1-$ta)/(1+$ta);
			//echo $risk."<br>";//die;
			//echo $ror;die();
			$ror = pow($ror,$risk);
			//echo $ror;die;
			echo number_format($ror/100,2,".","")." % probability of ruin";
		}
		
	}

	function result_attribution()
	{
		$this->common->check_user_login();
		$data = array();
		$data['title'] = 'Result attribution | Five Percent';
		$user_id = $this->session->userdata('user_id');
		//profit percentage
		$count = 0;
		$s_count = 0;
		$t_count = 0;
		$t_percentage = 0;
		$s_percentage = 0;
		//loss percentage
		$sl_count = 0;
		$tl_count = 0;
		$tl_percentage = 0;
		$sl_percentage = 0;
		$s_win = 0;
		$t_win = 0;
		$sl_win = 0;
		$tl_win = 0;
		$st_profit = 0;
		$st_loss = 0;
		$tact_profit = 0;
		$tact_loss = 0;
		$dataResults = $this->db->query("SELECT a.*,(SELECT count(b.stock_id) FROM tbl_user_stock_management b WHERE b.stock_id=a.product AND b.user_id='".$user_id."' AND b.is_suggested=1) AS suggested FROM tbl_users_trading_diary a WHERE a.final_volume>0 AND a.user_id='".$user_id."'")->result();
		//echo "<pre>";print_r($dataResults);die;

		foreach($dataResults as $res)
		{
			if(($res->price_in*$res->final_volume)<($res->price_out*$res->final_volume))
			{
				if($res->suggested==1)
				{
					$s_win+= ($res->price_out*$res->final_volume)-($res->price_in*$res->final_volume);
					$s_count++;
				}
				else
				{
					$t_win+= ($res->price_out*$res->final_volume)-($res->price_in*$res->final_volume);
					$t_count++;
				}
				
			}
			else
			{
				if($res->suggested==1)
				{
					$sl_win+= ($res->price_in*$res->final_volume)-($res->price_out*$res->final_volume);
					$sl_count++;
				}
				else
				{
					$tl_win+= ($res->price_in*$res->final_volume)-($res->price_out*$res->final_volume);
					$tl_count++;
				}
			}
			$count++;
		}
		$profit1 = $s_win+$t_win;
		/*echo ($t_win/$profit1)*100;
		echo "<br>";
		echo ($s_win/$profit1)*100;*/

		$profit2 = $sl_win+$tl_win;
		/*echo "<br>";
		echo ($tl_win/$profit2)*100;
		echo "<br>";
		echo ($sl_win/$profit2)*100;*/
		//die;
		//echo $s_win.' - '.$t_win.' - '.$sl_win.' - '.$tl_win;die;

		
		if($t_win>0)
		{
			$t_percentage = ($t_win/$profit1)*100;
		}
		else
		{
			$t_percentage = 0;
		}
		if($s_win>0)
		{
			$s_percentage =($s_win/$profit1)*100;
		}
		else
		{
			$s_percentage = 0;
		}
		
		$data['t_percentage']  = number_format($t_percentage,2,".","");
		$data['s_percentage'] = number_format($s_percentage,2,".","");
		//loss percentage
		if($tl_win>0)
		{
			$tl_percentage = ($tl_win/$profit2)*100;
		}
		else
		{
			$tl_percentage = 0;
		}
		if($sl_win>0)
		{
			$sl_percentage = ($sl_win/$profit2)*100;
		}
		else
		{
			$sl_percentage = 0;
		}
		
		$data['tl_percentage']  = number_format($tl_percentage,2,".","");
		$data['sl_percentage'] = number_format($sl_percentage,2,".","");
		//echo "<pre>";print_r($data);die;
		$this->load->view('page/result-attribution/result_attribution',$data);
	}
	function details_result_attribution()
	{
		$this->common->check_user_login();
		$data = array();
		$data['title'] = 'Deatails Result attribution | Five Percent';
		$user_id = $this->session->userdata('user_id');
		$profitData = array();
		$profit_recordarray = array();

		$lossData = array();
		$loss_recordarray = array();
		$c = 0;
		$dataResults = $this->db->query("SELECT a.id,a.price_in,a.price_out,a.volume,a.final_volume,c.stock_name,c.industry_id,d.industry FROM tbl_users_trading_diary a INNER JOIN tbl_admin_stock c ON a.product=c.id INNER JOIN tbl_admin_stock_industries d ON c.industry_id=d.id  WHERE a.final_volume>0 AND a.user_id='".$user_id."'" )->result();
        //echo "<pre>";print_r($dataResults);die;
        $totalprofitamount = 0;
        $totallossamount = 0;
        $percentage = 0;
        foreach($dataResults as $dd)
        {
            if(($dd->price_in*$dd->final_volume)<($dd->price_out*$dd->final_volume))
            {
                $totalprofitamount=$totalprofitamount+(($dd->price_out*$dd->final_volume)-($dd->price_in*$dd->final_volume));
            }
            if(($dd->price_in*$dd->final_volume)>($dd->price_out*$dd->final_volume))
            {
                $totallossamount=$totallossamount+(($dd->price_in*$dd->final_volume)-($dd->price_out*$dd->final_volume));
            }
        }
        //echo $totalprofitamount."---".$totallossamount;die;
        
        $tmpArr=[];
        $tmpArr2=[];
        $tmpArr3=[];

        $LtmpArr=[];
        $LtmpArr2=[];
        $LtmpArr3=[];
        foreach($dataResults as $res)
        {
            if(($res->price_in*$res->final_volume)<($res->price_out*$res->final_volume))
            {
                $profitData['color'] = $this->random_color();
                $profitData['name'] = $res->industry;
                $profitData['industry_id'] = $res->industry_id;
                $profitData['percent'] = number_format(((($res->price_out*$res->final_volume)-($res->price_in*$res->final_volume))/$totalprofitamount)*100,2,".","");
                if(!in_array($res->industry_id,$tmpArr))
                {
                	 $tmpArr[]=$res->industry_id;
                	 $tmpArr2[]=$profitData['percent'];
                	 $tmpArr3[]=1;
                	 array_push($profit_recordarray, $profitData);
                }
                else
                {
                	 $key = array_search(strtolower(trim($res->industry_id)),array_values($tmpArr));
                	 $tmpArr2[$key]+=$profitData['percent'];
                	 $tmpArr3[$key]+=1;	
                }
               
            }
            if(($res->price_in*$res->final_volume)>($res->price_out*$res->final_volume))
            {
                $lossData['color'] = $this->random_color();
                $lossData['name'] = $res->industry;
                $lossData['industry_id'] = $res->industry_id;
                $lossData['percent'] =number_format(((($res->price_in*$res->final_volume)-($res->price_out*$res->final_volume))/$totallossamount)*100,2,".","");
                if(!in_array($res->industry_id,$LtmpArr))
                {
                	 $LtmpArr[]=$res->industry_id;
                	 $LtmpArr2[]=$lossData['percent'];
                	 $LtmpArr3[]=1;
                	array_push($loss_recordarray, $lossData);
                }
                else
                {
                	 $key = array_search(strtolower(trim($res->industry_id)),array_values($LtmpArr));

                	 $LtmpArr2[$key]+=$lossData['percent'];

                	 $LtmpArr3[$key]+=1;
                }
               
            }

        }
		foreach ($tmpArr as $key => $vl) 
		{
			$cal=($tmpArr2[$key]);
			$profit_recordarray[$key]['percent']= number_format($cal,2,".","");
		}
		foreach ($LtmpArr as $key => $vl) 
		{
			$cal=($LtmpArr2[$key]);
			$loss_recordarray[$key]['percent']=number_format($cal,2,".","");
		}
		$data['profit_recordarray'] = $profit_recordarray;
		$data['loss_recordarray'] = $loss_recordarray;
		//echo "<pre>";print_r($data);die;
		$this->load->view('page/result-attribution/details_result_attribution',$data);
	}

	function random_color_part() 
	{
    	 return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
	}

	function random_color() 
	{
	    return  $this->random_color_part() . $this->random_color_part() . $this->random_color_part();
	}
	function keepStockLoss_ajax()
	{
		$this->common->check_user_login();
		$user_id = $this->session->userdata('user_id');
		$loss = $this->input->post('loss');
		$this->db->where('user_id',$user_id);
		$this->db->update('tbl_user_personel_info',array('stop_loss'=>$loss));
	}


	function testdata()
	{
		echo"<pre>";
		
		$data = $this->db->query("SELECT * FROM tbl_users_trading_diary order by id desc")->result();
		$ys=0;
		$totalloss = 0;
		foreach ($data as $k) 
		{				
			if($k->pl==0)
			{
				$ys=1;
				
			}			  
		  if($ys==1)
		  {
				if($k->pl==1)
				{
					break;
					
				}
				if($k->pl==0)
				{
					$totalloss+= $k->price_in-$k->price_out;
					print_r($k);
				}
		  }			
			
		}
		echo $totalloss;

	}
	function testimages()
	{
		$html = file_get_contents('http://mobileandwebsitedevelopment.com/fivepercent');

		/*preg_match_all('/<img[^>]+>/i',$html, $imgTags); 

		//print_r($result);
		echo count($imgTags[0]);die;
		for ($i = 0; $i < count($imgTags[0]); $i++) 
		{
		  // get the source string
		  preg_match('/src="([^"]+)/i',$imgTags[0][$i], $imgage);

		  // remove opening 'src=' tag, can`t get the regex right
		  $origImageSrc[] = str_ireplace( 'src="', '',  $imgage[0]);
		}
		// will output all your img src's within the html string
		//echo "<pre>"; print_r($origImageSrc);
		if(isset($origImageSrc) && count($origImageSrc)>0)
		{
			foreach($origImageSrc as $img)
			{
				$image = explode('/', $img);
				echo end($image)."<br>";
			}
		}
		else
		{
			echo 'no record found';
		}*/

		$first_step = explode( '<!-- Welcome About Sectuion Start Here -->' , $html );
		echo "<pre>";print_r($first_step);die;
		
	}
	function showMobilemoneymanagementLineChart()
	{
		$user_id = $this->input->get('user_id');
		if($user_id=="" && $user_id==null)
		{
			echo "Please provide User Id";
			return false;
		}
		$data = array();
		$data['title'] = 'Money Management| Five Percent';
		//$chartdData = $this->db->query("SELECT price_in,price_out,volume,final_volume,created_on FROM tbl_users_trading_diary WHERE created_on >= DATE_SUB(NOW(),INTERVAL 1 YEAR) AND user_id='".$user_id."' AND final_volume>0 ORDER BY id ASC")->result();
		$chartdData = $this->db->query("SELECT a.price_in,a.price_out,a.volume,a.final_volume,a.created_on,b.stock_name FROM tbl_users_trading_diary a INNER JOIN tbl_admin_stock b ON a.product=b.id WHERE  a.user_id='".$user_id."' AND a.final_volume>0 ORDER BY a.id ASC")->result();
		$totalProfit = 0;
        foreach($chartdData as $pro)
        {
                $totalProfit = $totalProfit+($pro->price_out*$pro->final_volume)-($pro->price_in*$pro->final_volume);
        }
        //echo $totalProfit;die;
        $dchrat = array();
		$chartArray = array();
		
        $allDateArr[0] = 0;
        $percentArr[0] = 0;
        $c = 0;
		foreach($chartdData as $chart)
		{
			$dchrat['values'] = ($chart->price_out*$chart->final_volume)-($chart->price_in*$chart->final_volume);
			if($totalProfit==0)
			{
				$dchrat['percent_value'] = number_format((($chart->price_out*$chart->final_volume-$chart->price_in*$chart->final_volume))*100,2,".","");
				$allDateArr[$c] = '"'.date('M d,Y', strtotime($chart->created_on)).'"';
				$percentArr[$c] = number_format((($chart->price_out*$chart->final_volume-$chart->price_in*$chart->final_volume))*100,2,".","");
			}
			else
			{
				$dchrat['percent_value'] = number_format((($chart->price_out*$chart->final_volume-$chart->price_in*$chart->final_volume)/$totalProfit)*100,2,".","");
				$allDateArr[$c] = '"'.date('M d,Y', strtotime($chart->created_on)).'"';
				$percentArr[$c] = number_format((($chart->price_out*$chart->final_volume-$chart->price_in*$chart->final_volume)/$totalProfit)*100,2,".","");
			}
			
			array_push($chartArray, $dchrat);
			$c++;
		}
		$data['allDateArr'] = implode(',', $allDateArr);
		$data['percentArr'] = implode(',', $percentArr);
		$this->load->view('page/money-management/showMobilemoneymanagementLineChart',$data);
	}

}