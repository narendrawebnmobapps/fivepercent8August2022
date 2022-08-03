<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'libraries/REST_Controller.php';
class Portfolio extends REST_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('common');
		$this->load->model('chart_model');
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
    function user_added_stock_list_post()
    {
    	$user_id = $this->input->post('user_id');
    	$parameter = $this->input->post('parameter');
    	$countryID = $this->input->post('countryID');

		if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
		}
		if($countryID=="" && $countryID==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  Country Id'),200);
		}
		$d2 = array();
		$record2 = array();
		$totalnumber2 = "0";
		//$stocks2 = $this->db->query("SELECT a.id,a.user_id,a.stock_id,a.value,a.order_type,a.number,a.created_on,b.stock_name,b.stock_type FROM tbl_user_stock_management a INNER JOIN tbl_admin_stock b on a.stock_id=b.id WHERE a.user_id='".$user_id."' AND a.s_type=1")->result_array();
		if($countryID==238)
		{
			$stockTYPE = 2;
		}
		else
		{
			$stockTYPE = 1;
		}
		$stocks2 = $this->db->query("SELECT a.id,a.user_id,a.stock_id,a.value,a.order_type,a.stock_price,a.number,a.created_on,b.stock_name,b.price,b.volatility,b.stock_type,c.id AS categoryID FROM tbl_user_stock_management a INNER JOIN tbl_admin_stock b on a.stock_id=b.id LEFT JOIN tbl_admin_stock_industries c ON b.industry_id=c.id WHERE a.user_id='".$user_id."' AND a.s_type=1 AND b.stock_type='".$stockTYPE."' ORDER BY a.id DESC")->result_array();

		foreach($stocks2 as $stock2)
		{
			$d2['stock_id'] = $stock2['id'];
			$d2['stock_ref_id'] = $stock2['stock_id'];
			$d2['stock_name'] = $stock2['stock_name'];
			$d2['number'] = $stock2['number'];
			$d2['order_type'] = $stock2['order_type'];
			$d2['parameter'] = number_format($stock2['volatility']*sqrt(252),2,".","")."%";
			$d2['actual_price'] = number_format("4.59",2);
			$d2['final_price'] = number_format("4.96",2);
			$d2['value'] = $stock2['value'];
			$d2['price'] = $stock2['price'];
			$d2['categoryID'] = $stock2['categoryID'];
			$totalnumber2+=($stock2['number']*$stock2['price']);
			array_push($record2, $d2);

		}
		$totalnumber2 = number_format($totalnumber2,2,".","");
		$this->response(array('success'=>'true','record'=>$record2,'total'=>$totalnumber2),200);
    }
    function show_all_stocks_list_post()
    {
    	$user_id = $this->input->post('user_id');
    	$countryID = $this->input->post('countryID');
		if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
		}
		if($countryID=="" && $countryID==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  Country Id'),200);
		}
		//$stocks1 = $this->db->query("SELECT a.id,a.user_id,a.stock_id,a.value,a.order_type,a.number,a.created_on,b.stock_name,b.stock_type FROM tbl_user_stock_management a INNER JOIN tbl_admin_stock b on a.stock_id=b.id WHERE a.user_id='".$user_id."' AND b.stock_type=1")->result_array();
		if($countryID==238)
		{
			$stockTYPE = 2;
		}
		else
		{
			$stockTYPE = 1;
		}
		$stocks2 = $this->db->query("SELECT a.id,a.user_id,a.stock_id,a.value,a.number,a.order_type,a.created_on,b.stock_name,b.stock_type FROM tbl_user_stock_management a INNER JOIN tbl_admin_stock b on a.stock_id=b.id WHERE a.user_id='".$user_id."' AND b.stock_type='".$stockTYPE."' ")->result_array();

		//$List_of_added_Stock = array_merge($stocks1,$stocks2);
		$ids = '';
		foreach($stocks2 as $added_Stock)
		{
			$ids.= $added_Stock['stock_id'].',';
		}
		$ids = rtrim($ids,',');
		if(count($stocks2)>0)
		{
			$data['stocks'] = $this->db->query("SELECT id AS stock_id,stock_type,stock_name FROM tbl_admin_stock WHERE id NOT IN ($ids) AND stock_type='".$stockTYPE."' ORDER BY stock_name")->result();
		}
		else
		{
			$data['stocks'] = $this->db->query("SELECT id AS stock_id,stock_type,stock_name FROM tbl_admin_stock WHERE stock_type='".$stockTYPE."' ORDER BY stock_name")->result();
		}

		//$data['stocks'] = $this->db->query("SELECT id AS stock_id,stock_type,stock_name FROM tbl_admin_stock ORDER BY stock_name")->result();
		$this->response(array('success'=>'true','record'=>$data['stocks']),200);
    }
    function add_stock_portfolio_post()
    {
    	$user_id = $this->input->post('user_id');
    	$stock_name = $this->input->post('stock_id');
    	$countryID = $this->input->post('countryID');
    	//$number = $this->input->post('number');
		$created_on = date("Y-m-d H:i:s");
		
		if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
		}
		if($stock_name=="" && $stock_name==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  stock'),200);
		}
		if($countryID=="" && $countryID==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  Country Id'),200);
		}

		if($countryID==238)
		{
			$stockTYPE = 2;
		}
		else
		{
			$stockTYPE = 1;
		}
		$insertData = array(
							'user_id'=>$user_id,
							'stock_id'=>$stock_name,
							's_type'=>1,
							'number'=>0,
							'created_on'=>$created_on,
							);
		$this->db->insert('tbl_user_stock_management',$insertData);

		$d2 = array();
		$record2 = array();
		$totalnumber2 = "0";
		$stocks2 = $this->db->query("SELECT a.id,a.user_id,a.stock_id,a.value,a.order_type,a.stock_price,a.number,a.created_on,b.stock_name,b.price,b.volatility,b.stock_type,c.id AS categoryID FROM tbl_user_stock_management a INNER JOIN tbl_admin_stock b on a.stock_id=b.id LEFT JOIN tbl_admin_stock_industries c ON b.industry_id=c.id WHERE a.user_id='".$user_id."' AND a.s_type=1 AND b.stock_type='".$stockTYPE."' ORDER BY a.id DESC")->result_array();
		foreach($stocks2 as $stock2)
		{
			$d2['stock_id'] = $stock2['id'];
			$d2['stock_ref_id'] = $stock2['stock_id'];
			$d2['stock_name'] = $stock2['stock_name'];
			$d2['number'] = $stock2['number'];
			$d2['order_type'] = $stock2['order_type'];
			$d2['parameter'] = $stock2['volatility'];
			$d2['actual_price'] = number_format("4.59",2);
			$d2['final_price'] = number_format("4.96",2);
			$d2['value'] = $stock2['value'];
			$d2['price'] = $stock2['price'];
			$d2['categoryID'] = $stock2['categoryID'];
			$totalnumber2+=($stock2['number']*$stock2['price']);
			array_push($record2, $d2);

		}
		$totalnumber2 = number_format($totalnumber2,2,".","");
		$this->response(array('success'=>'true','message'=>'Stock Added Successfully','record'=>$record2,'total'=>$totalnumber2),200);
    }
    function delete_stock_post()
    {
    	$user_id = $this->input->post('user_id');
		$stock_id = $this->input->post('stock_id');
		$parameter = $this->input->post('parameter');
		$countryID = $this->input->post('countryID');
		if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
		}
		if($stock_id=="" && $stock_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  stock'),200);
		}
		if($countryID=="" && $countryID==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  Country Id'),200);
		}
		if($countryID==238)
		{
			$stockTYPE = 2;
		}
		else
		{
			$stockTYPE = 1;
		}
		$this->db->where('id',$stock_id);
		$this->db->where('user_id',$user_id);
		$this->db->delete('tbl_user_stock_management');

		$d2 = array();
		$record2 = array();
		$totalnumber2 = "0";
		//$stocks2 = $this->db->query("SELECT a.id,a.user_id,a.stock_id,a.value,a.order_type,a.number,a.created_on,b.stock_name,b.stock_type FROM tbl_user_stock_management a INNER JOIN tbl_admin_stock b on a.stock_id=b.id WHERE a.user_id='".$user_id."' AND a.s_type=1")->result_array();

		$stocks2 = $this->db->query("SELECT a.id,a.user_id,a.stock_id,a.value,a.order_type,a.number,a.created_on,a.stock_price,b.stock_name,b.price,b.volatility,b.stock_type FROM tbl_user_stock_management a INNER JOIN tbl_admin_stock b on a.stock_id=b.id WHERE a.user_id='".$user_id."' AND a.s_type=1 AND b.stock_type='".$stockTYPE."'  ORDER BY a.id DESC")->result_array();

		foreach($stocks2 as $stock2)
		{
			$d2['stock_id'] = $stock2['id'];
			$d2['stock_ref_id'] = $stock2['stock_id'];
			$d2['stock_name'] = $stock2['stock_name'];
			$d2['number'] = $stock2['number'];
			$d2['order_type'] = $stock2['order_type'];
			$d2['parameter'] = $stock2['volatility'];
			$d2['actual_price'] = number_format("4.59",2);
			$d2['final_price'] = number_format("4.96",2);
			$d2['value'] = $stock2['value'];
			$d2['price'] = $stock2['price'];
			$totalnumber2+=($stock2['number']*$stock2['price']);
			array_push($record2, $d2);

		}
		$totalnumber2 = number_format($totalnumber2,2,".","");
		$this->response(array('success'=>'true','message'=>'Stock Deleted Successfully','record'=>$record2,'total'=>$totalnumber2),200);
    }
    function edit_stock_post()
    {
    	$user_id = $this->input->post('user_id');
		$stock_id = $this->input->post('stock_id');
		if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
		}
		if($stock_id=="" && $stock_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide User stock Id'),200);
		}
		$stockResult = $this->db->query("SELECT `id` AS user_stock_id,`user_id`,`stock_id`,`order_type`,`number`,stock_price AS price FROM `tbl_user_stock_management` WHERE `user_id`='".$user_id."' AND `id`='".$stock_id."'")->row();
		$this->response(array('success'=>'true','record'=>$stockResult),200);

    }
    function update_stock_post()
    {
    	$user_id =$this->input->post('user_id');
		$created_on = date("Y-m-d H:i:s");
		$user_stock_id = $this->input->post('user_stock_id');
		$stock_name = $this->input->post('stock_name');
		$stock_type = $this->input->post('stock_type');
		$price = $this->input->post('price');
		$number = $this->input->post('number');
		$countryID = $this->input->post('countryID');
		if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
		}
		if($user_stock_id=="" && $user_stock_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide User stock Id'),200);
		}
		if($stock_name=="" && $stock_name==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide Stock Name'),200);
		}
		if($stock_type=="" && $stock_type==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide Stock Type'),200);
		}
		if($price=="" && $price==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide Stock Price'),200);
		}
		if($number=="" && $number==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide Number'),200);
		}
		if($countryID=="" && $countryID==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  Country Id'),200);
		}
		if($countryID==238)
		{
			$stockTYPE = 2;
		}
		else
		{
			$stockTYPE = 1;
		}
		$insertData = array(
							'user_id'=>$user_id,
							'stock_id'=>$stock_name,
							'order_type'=>$stock_type,
							'stock_price'=>$price,
							'number'=>$number,
							'created_on'=>$created_on,
							);

		$getStcokDetails = $this->db->query("SELECT price FROM tbl_admin_stock WHERE id='".$stock_name."'")->row();
		$getExistingStock = $this->db->query("SELECT * FROM tbl_user_stock_management WHERE user_id='".$user_id."' AND id='".$user_stock_id."'")->row();

		$alreadyUse = ($this->common->calculateTotalAddedStockMoney($user_id,$getExistingStock->s_type)+($price*$number))-($price*$getExistingStock->number);

		$calculation =  $this->common->checkMoneyUsesByUser($user_id)['rv'];
		if($calculation>=$alreadyUse)
		{
			$this->db->where('id',$user_stock_id);
			$this->db->where('user_id',$user_id);
			$this->db->update('tbl_user_stock_management',$insertData);
			
		}
		else
		{
			$this->response(array('success'=>'false','message'=>'You are already cross investment criteria'),200);
		}

		$d2 = array();
		$record2 = array();
		$totalnumber2 = "0";
		$stocks2 = $this->db->query("SELECT a.id,a.user_id,a.stock_id,a.value,a.order_type,a.stock_price,a.number,a.created_on,b.stock_name,b.price,b.volatility,b.stock_type,c.id AS categoryID FROM tbl_user_stock_management a INNER JOIN tbl_admin_stock b on a.stock_id=b.id LEFT JOIN tbl_admin_stock_industries c ON b.industry_id=c.id  WHERE a.user_id='".$user_id."' AND a.s_type=1 AND b.stock_type='".$stockTYPE."' ORDER BY a.id DESC")->result_array();

		foreach($stocks2 as $stock2)
		{
			$d2['stock_id'] = $stock2['id'];
			$d2['stock_ref_id'] = $stock2['stock_id'];
			$d2['stock_name'] = $stock2['stock_name'];
			$d2['number'] = $stock2['number'];
			$d2['order_type'] = $stock2['order_type'];
			$d2['parameter'] = $stock2['volatility'];
			$d2['actual_price'] = number_format("4.59",2);
			$d2['final_price'] = number_format("4.96",2);
			$d2['value'] = $stock2['value'];
			$d2['price'] = $stock2['price'];
			$d2['categoryID'] = $stock2['categoryID'];
			$totalnumber2+=($stock2['number']*$stock2['price']);
			array_push($record2, $d2);

		}
		$totalnumber2 = number_format($totalnumber2,2,".","");
		$this->response(array('success'=>'true','message'=>'Stock Updated Successfully','record'=>$record2,'total'=>$totalnumber2),200);
    }
    function stock_info_description_post()
    {
    	$user_id = $this->input->post('user_id');
    	$stock_id = $this->input->post('stock_id');
    	$data = array();
    	$recordArray = array();
    	if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
		}
		if($stock_id=="" && $stock_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide User stock Id'),200);
		}
		$data['description'] = 'I am using Twitter Bootstrap modal window functionality. When someone clicks submit on my form, I want to show the modal window upon clicking the "submit button" in the form. I am using Twitter Bootstrap modal window functionality. When someone clicks submit on my form, I want to show the modal window upon clicking the "submit button" in the form. I am using Twitter Bootstrap modal window functionality. When someone clicks submit on my form, I want to show the modal window upon clicking the "submit button" in the form '.$stock_id;
		array_push($recordArray, $data);

		$this->response(array('success'=>'true','record'=>$recordArray),200);
    }
    function filter_with_side_option_parameter_post()
    {
    	$user_id = $this->input->post('user_id');
    	$parameter = $this->input->post('parameter');
    	$countryID = $this->input->post('countryID');
		if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
		}
		if($parameter=="" && $parameter==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  Option parameter'),200);
		}
		if($countryID=="" && $countryID==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  Country Id'),200);
		}
		if($countryID==238)
		{
			$stockTYPE = 2;
		}
		else
		{
			$stockTYPE = 1;
		}
		$d2 = array();
		$record2 = array();
		$totalnumber2 = "0";
		//$stocks2 = $this->db->query("SELECT a.id,a.user_id,a.stock_id,a.value,a.order_type,a.number,a.created_on,b.stock_name,b.stock_type FROM tbl_user_stock_management a INNER JOIN tbl_admin_stock b on a.stock_id=b.id WHERE a.user_id='".$user_id."' AND a.s_type=1")->result_array();
		$stocks2 = $this->db->query("SELECT a.id,a.user_id,a.stock_id,a.value,a.order_type,a.number,a.created_on,a.stock_price,b.stock_name,b.price,b.volatility,b.stock_type,b.beta,b.dividend,c.id AS categoryID FROM tbl_user_stock_management a INNER JOIN tbl_admin_stock b on a.stock_id=b.id LEFT JOIN tbl_admin_stock_industries c ON b.industry_id=c.id WHERE a.user_id='".$user_id."' AND a.s_type=1 AND b.stock_type='".$stockTYPE."'  ORDER BY a.id DESC")->result_array();

		foreach($stocks2 as $stock2)
		{
			$d2['stock_id'] = $stock2['id'];
			$d2['stock_ref_id'] = $stock2['stock_id'];
			$d2['stock_name'] = $stock2['stock_name'];
			$d2['number'] = $stock2['number'];
			$d2['order_type'] = $stock2['order_type'];

			if($parameter=="VOLATILITY")
			{
				$d2['parameter'] = number_format($stock2['volatility']*sqrt(252),2,".","")."%";
			}
			else if($parameter=="BETA")
			{
				$d2['parameter'] = $stock2['beta'];
			}
			else
			{
				$d2['parameter'] = $stock2['dividend'];
			}
			$d2['actual_price'] = number_format("4.59",2);
			$d2['final_price'] = number_format("4.96",2);
			$d2['value'] = $stock2['value'];
			$d2['price'] = $stock2['price'];
			$d2['categoryID'] = $stock2['categoryID'];
			$totalnumber2+=($stock2['number']*$stock2['price']);
			array_push($record2, $d2);
		}
		$totalnumber2 = number_format($totalnumber2,2,".","");
		$this->response(array('success'=>'true','record'=>$record2,'total'=>$totalnumber2),200);
    }
    function stock_portfolio_details_post()
    {
		$user_id = $this->input->post('user_id');
		$stock_id = $this->input->post('stock_id');
		if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
		}
		if($stock_id=="" && $stock_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  Stock Id'),200);
		}

		//$stockData = $this->db->query("SELECT a.id AS user_stock_id,a.stock_id,a.order_type,a.number,b.stock_name FROM tbl_user_stock_management a INNER JOIN tbl_admin_stock b ON a.stock_id=b.id WHERE a.id='".$stock_id."' AND a.user_id='".$user_id."' ")->row();
		//$stockData = $this->db->query("SELECT a.id,a.user_id,a.stock_id,a.value,a.order_type,a.number,a.created_on,b.stock_name,b.price,b.volatility,b.stock_type FROM tbl_user_stock_management a INNER JOIN tbl_admin_stock b on a.stock_id=b.id WHERE a.id='".$stock_id."' AND a.user_id='".$user_id."' AND a.s_type=1")->row();
		$stockData = $this->db->query("SELECT a.id AS user_stock_id,a.stock_id,a.order_type,a.number,b.stock_name,c.id AS categoryID FROM tbl_user_stock_management a INNER JOIN tbl_admin_stock b ON a.stock_id=b.id LEFT JOIN tbl_admin_stock_industries c ON b.industry_id=c.id WHERE a.id='".$stock_id."' AND a.user_id='".$user_id."' ")->row();
		//print_r($stockData);die();

		/*==================================**Fundamental Chart Calculations**==========================================*/

		$FundamentalArr = $this->chart_model->apiLinkData('get-balance-sheet?symbol=REP.MC');
		$FundamentalArr = json_decode($FundamentalArr);

		$TotalAssets = $FundamentalArr->balanceSheetHistoryQuarterly->balanceSheetStatements[0]->totalAssets->raw;
		$TotalCurrentAssets = $FundamentalArr->balanceSheetHistoryQuarterly->balanceSheetStatements[0]->totalCurrentAssets->raw;

		$cash = $FundamentalArr->balanceSheetHistoryQuarterly->balanceSheetStatements[0]->cash->raw;
		$netReceivables = $FundamentalArr->balanceSheetHistoryQuarterly->balanceSheetStatements[0]->netReceivables->raw;
		$treasuryStock = $FundamentalArr->balanceSheetHistoryQuarterly->balanceSheetStatements[0]->treasuryStock->raw;
		$inventory = $FundamentalArr->balanceSheetHistoryQuarterly->balanceSheetStatements[0]->inventory->raw;
		$otherCurrentAssets = $FundamentalArr->balanceSheetHistoryQuarterly->balanceSheetStatements[0]->otherCurrentAssets->raw;

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
		$totalLiab = $FundamentalArr->balanceSheetHistoryQuarterly->balanceSheetStatements[0]->totalLiab->raw;
		$totalStockholderEquity = $FundamentalArr->balanceSheetHistoryQuarterly->balanceSheetStatements[0]->totalStockholderEquity->raw;
		$totalCurrentLiabilities = $FundamentalArr->balanceSheetHistoryQuarterly->balanceSheetStatements[0]->totalCurrentLiabilities->raw;
		$nonCurrenLiabilities = $totalLiab-$totalCurrentLiabilities;
		//$equity = ($totalLiab+$totalStockholderEquity)-($totalCurrentLiabilities+$nonCurrenLiabilities);
		$equity = $totalStockholderEquity;
		$currentLiabilitiesPercentage = 0;
		$NoncurrentLiabilitiesPercentage = 0;
		$equityPercentage = 0;
		$currentLiabilitiesPercentage = ($totalCurrentLiabilities/($totalLiab+$totalStockholderEquity))*100;
		$NoncurrentLiabilitiesPercentage = ($nonCurrenLiabilities/($totalLiab+$totalStockholderEquity))*100;
		$equityPercentage = ($equity/($totalLiab+$totalStockholderEquity))*100;

		/*Ratio calculations start*/
		$borrowingRatio = 0;
		$borrowingColor = "red";
		$borrowingRatio = ($totalLiab/$TotalAssets)*100;
		if(($borrowingRatio>=50 && $borrowingRatio<=60) || $borrowingRatio<50)
		{
			$borrowingColor = "green";
		}

		$debtQualityRatio = 0;
		$debtQualityColor = "red";
		$debtQualityRatio = ($totalCurrentLiabilities/$totalLiab)*100;
		if($debtQualityRatio<30)
		{
			$debtQualityColor = "green";
		}

		$liquidityRatiosLiquidity = 0;
		$liquidityRatiosLiquidityColor = "red";
		$liquidityRatiosLiquidity = ($TotalCurrentAssets/$totalCurrentLiabilities);
		if($liquidityRatiosLiquidity>=1 && $liquidityRatiosLiquidity<=5)
		{
			$liquidityRatiosLiquidityColor ="green";
		}
		$liquidityRatiosTreasury = 0;
		$liquidityRatiosTreasuryColor = "red";
		$liquidityRatiosTreasury = (($netReceivables+$treasuryStock)/$totalCurrentLiabilities);
		if($liquidityRatiosTreasury>=0.5 && $liquidityRatiosTreasury<=1.5)
		{
			$liquidityRatiosTreasuryColor = "green";
		}

		$liquidityRatiosAcidTest = 0;
		$liquidityRatiosAcidTestColor = "red";
		$liquidityRatiosAcidTest = $treasuryStock/$totalCurrentLiabilities;
		if($liquidityRatiosAcidTest>=2 && $liquidityRatiosAcidTest<=3)
		{
			$liquidityRatiosAcidTestColor = "green";
		}
		//echo $liquidityRatiosTreasuryColor;die;
		/*Ratio calculations End*/

		/********************************************************************************************
			Other Ratio Calculation Start
		**********************************************************************************************/
		$OtherRatioLink = $this->chart_model->apiLinkData('get-statistics?region=US&symbol=REP.MC');
		$OtherRatioLink = json_decode($OtherRatioLink);
		//$defaultKeyStatistics = $result->defaultKeyStatistics;
		$forwardPE_PER = @$OtherRatioLink->defaultKeyStatistics->forwardPE->fmt;
		$pegRatio_PEG = @$OtherRatioLink->defaultKeyStatistics->pegRatio->fmt;
		$beta = @$OtherRatioLink->defaultKeyStatistics->beta->fmt;
		$dividendRate = @$OtherRatioLink->summaryDetail->dividendRate->fmt;
		$operatingMargins = @$OtherRatioLink->financialData->operatingMargins->fmt;

		//echo "<pre>";print_r($forwardPE_PER);die;
		/********************************************************************************************
			Other Ratio Calculation End
		**********************************************************************************************/


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
									);
		$data['fundamentalArr'] = $fundamentalViewArr;
		$this->response(array('success'=>'true','record'=>$stockData,'fundamentalData'=>$data['fundamentalArr']),200);
    }

    /**********************************
    ===================================
   				=========Fixed Income Portfolio=========
	===================================
    ***********************************/

    function user_added_fixed_income_list_post()
    {
    	$user_id = $this->input->post('user_id');
    	$parameter = $this->input->post('parameter');
		if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
		}
		$d2 = array();
		$record2 = array();
		$totalnumber2 = "0";
		$stocks2 = $this->db->query("SELECT a.id,a.user_id,a.stock_id,a.value,a.order_type,a.number,a.created_on,b.stock_name,b.stock_type FROM tbl_user_stock_management a INNER JOIN tbl_admin_stock b on a.stock_id=b.id WHERE a.user_id='".$user_id."' AND a.s_type=2")->result_array();

		foreach($stocks2 as $stock2)
		{
			$d2['stock_id'] = $stock2['id'];
			$d2['stock_ref_id'] = $stock2['stock_id'];
			$d2['stock_name'] = $stock2['stock_name'];
			$d2['number'] = $stock2['number'];
			$d2['order_type'] = $stock2['order_type'];
			$d2['parameter'] = number_format("1.66",2);
			$d2['actual_price'] = number_format("4.59",2);
			$d2['final_price'] = number_format("4.96",2);
			$totalnumber2+=$stock2['number'];
			array_push($record2, $d2);

		}
		$this->response(array('success'=>'true','record'=>$record2,'total'=>$totalnumber2),200);
    }

    function show_all_fixed_income_stocks_list_post()
    {
    	$user_id = $this->input->post('user_id');
		if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
		}

		$stocks1 = $this->db->query("SELECT a.id,a.user_id,a.stock_id,a.value,a.created_on,b.stock_name,b.stock_type FROM tbl_user_stock_management a INNER JOIN tbl_admin_stock b on a.stock_id=b.id WHERE a.user_id='".$user_id."' AND b.stock_type=1")->result_array();

		$stocks2 = $this->db->query("SELECT a.id,a.user_id,a.stock_id,a.value,a.created_on,b.stock_name,b.stock_type FROM tbl_user_stock_management a INNER JOIN tbl_admin_stock b on a.stock_id=b.id WHERE a.user_id='".$user_id."' AND b.stock_type=2")->result_array();

		$List_of_added_Stock = array_merge($stocks1,$stocks2);
		$ids = '';
		foreach($List_of_added_Stock as $added_Stock)
		{
			$ids.= $added_Stock['stock_id'].',';
		}
		$ids = rtrim($ids,',');
		if(count($List_of_added_Stock)>0)
		{
			$all_stock_lists = $this->db->query("SELECT id,stock_type,stock_name FROM tbl_admin_stock WHERE id NOT IN ($ids) ORDER BY stock_name")->result();
		}
		else
		{
			$all_stock_lists = $this->db->query("SELECT id,stock_type,stock_name FROM tbl_admin_stock ORDER BY stock_name")->result();
		}
		$this->response(array('success'=>'true','record'=>$all_stock_lists),200);
    }

    function add_fixed_income_portfolio_post()
    {
    	$user_id = $this->input->post('user_id');
    	$stock_name = $this->input->post('stock_id');
		$stock_type = $this->input->post('stock_type');
		$number = $this->input->post('number');
		$created_on = date("Y-m-d H:i:s");
		
		if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
		}
		if($stock_name=="" && $stock_name==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  stock'),200);
		}
		if($stock_type=="" && $stock_type==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  Stock type'),200);
		}
		if($number=="" && $number==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Enter Number'),200);
		}
		$insertData = array(
							'user_id'=>$user_id,
							'stock_id'=>$stock_name,
							'order_type'=>$stock_type,
							'number'=>$number,
							's_type'=>2,
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

		$d2 = array();
		$record2 = array();
		$totalnumber2 = "0";
		$stocks2 = $this->db->query("SELECT a.id,a.user_id,a.stock_id,a.value,a.order_type,a.number,a.created_on,b.stock_name,b.stock_type FROM tbl_user_stock_management a INNER JOIN tbl_admin_stock b on a.stock_id=b.id WHERE a.user_id='".$user_id."' AND a.s_type=2")->result_array();

		foreach($stocks2 as $stock2)
		{
			$d2['stock_id'] = $stock2['id'];
			$d2['stock_ref_id'] = $stock2['stock_id'];
			$d2['stock_name'] = $stock2['stock_name'];
			$d2['number'] = $stock2['number'];
			$d2['order_type'] = $stock2['order_type'];
			$d2['parameter'] = number_format("1.66",2);
			$d2['actual_price'] = number_format("4.59",2);
			$d2['final_price'] = number_format("4.96",2);
			$totalnumber2+=$stock2['number'];
			array_push($record2, $d2);

		}
		$this->response(array('success'=>'true','message'=>'Stock Added Successfully','record'=>$record2,'total'=>$totalnumber2),200);

    }

    function delete_fixed_income_portfolio_post()
    {
    	$user_id = $this->input->post('user_id');
		$stock_id = $this->input->post('stock_id');
		$parameter = $this->input->post('parameter');
		if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
		}
		if($stock_id=="" && $stock_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  stock'),200);
		}
		$this->db->where('id',$stock_id);
		$this->db->where('user_id',$user_id);
		$this->db->delete('tbl_user_stock_management');

		$d2 = array();
		$record2 = array();
		$totalnumber2 = "0";
		$stocks2 = $this->db->query("SELECT a.id,a.user_id,a.stock_id,a.value,a.order_type,a.number,a.created_on,b.stock_name,b.stock_type FROM tbl_user_stock_management a INNER JOIN tbl_admin_stock b on a.stock_id=b.id WHERE a.user_id='".$user_id."' AND a.s_type=2")->result_array();

		foreach($stocks2 as $stock2)
		{
			$d2['stock_id'] = $stock2['id'];
			$d2['stock_ref_id'] = $stock2['stock_id'];
			$d2['stock_name'] = $stock2['stock_name'];
			$d2['number'] = $stock2['number'];
			$d2['order_type'] = $stock2['order_type'];
			$d2['parameter'] = number_format("1.66",2);
			$d2['actual_price'] = number_format("4.59",2);
			$d2['final_price'] = number_format("4.96",2);
			$totalnumber2+=$stock2['number'];
			array_push($record2, $d2);

		}
		$this->response(array('success'=>'true','message'=>'Stock Deleted Successfully','record'=>$record2,'total'=>$totalnumber2),200);
    }

    function update_fixed_income_portfolio_post()
    {
    	$user_id =$this->input->post('user_id');
		$created_on = date("Y-m-d H:i:s");
		$user_stock_id = $this->input->post('user_stock_id');
		$stock_name = $this->input->post('stock_name');
		$stock_type = $this->input->post('stock_type');
		$number = $this->input->post('number');
		if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
		}
		if($user_stock_id=="" && $user_stock_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide User stock Id'),200);
		}
		if($stock_name=="" && $stock_name==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide Stock Name'),200);
		}
		if($stock_type=="" && $stock_type==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide Stock Type'),200);
		}
		if($number=="" && $number==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide Number'),200);
		}
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

		$d2 = array();
		$record2 = array();
		$totalnumber2 = "0";
		$stocks2 = $this->db->query("SELECT a.id,a.user_id,a.stock_id,a.value,a.order_type,a.number,a.created_on,b.stock_name,b.stock_type FROM tbl_user_stock_management a INNER JOIN tbl_admin_stock b on a.stock_id=b.id WHERE a.user_id='".$user_id."' AND a.s_type=2")->result_array();

		foreach($stocks2 as $stock2)
		{
			$d2['stock_id'] = $stock2['id'];
			$d2['stock_ref_id'] = $stock2['stock_id'];
			$d2['stock_name'] = $stock2['stock_name'];
			$d2['number'] = $stock2['number'];
			$d2['order_type'] = $stock2['order_type'];
			$d2['parameter'] = number_format("1.66",2);
			$d2['actual_price'] = number_format("4.59",2);
			$d2['final_price'] = number_format("4.96",2);
			$totalnumber2+=$stock2['number'];
			array_push($record2, $d2);

		}
		$this->response(array('success'=>'true','message'=>'Stock Updated Successfully','record'=>$record2,'total'=>$totalnumber2),200);
    }

     function fixed_income_portfolio_info_description_post()
    {
    	$user_id = $this->input->post('user_id');
    	$stock_id = $this->input->post('stock_id');
    	$data = array();
    	$recordArray = array();
    	if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
		}
		if($stock_id=="" && $stock_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide User stock Id'),200);
		}
		$data['description'] = 'I am using Twitter Bootstrap modal window functionality. When someone clicks submit on my form, I want to show the modal window upon clicking the "submit button" in the form. I am using Twitter Bootstrap modal window functionality. When someone clicks submit on my form, I want to show the modal window upon clicking the "submit button" in the form. I am using Twitter Bootstrap modal window functionality. When someone clicks submit on my form, I want to show the modal window upon clicking the "submit button" in the form '.$stock_id;
		array_push($recordArray, $data);

		$this->response(array('success'=>'true','record'=>$recordArray),200);
    }

    function filter_fixed_income_portfolio_with_side_option_parameter_post()
    {
    	$user_id = $this->input->post('user_id');
    	$parameter = $this->input->post('parameter');
		if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
		}
		if($parameter=="" && $parameter==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  Option parameter'),200);
		}
		$d2 = array();
		$record2 = array();
		$totalnumber2 = "0";
		$stocks2 = $this->db->query("SELECT a.id,a.user_id,a.stock_id,a.value,a.order_type,a.number,a.created_on,b.stock_name,b.stock_type FROM tbl_user_stock_management a INNER JOIN tbl_admin_stock b on a.stock_id=b.id WHERE a.user_id='".$user_id."' AND a.s_type=2")->result_array();

		foreach($stocks2 as $stock2)
		{
			$d2['stock_id'] = $stock2['id'];
			$d2['stock_ref_id'] = $stock2['stock_id'];
			$d2['stock_name'] = $stock2['stock_name'];
			$d2['number'] = $stock2['number'];
			$d2['order_type'] = $stock2['order_type'];
			$d2['parameter'] = number_format("1.66",2);
			$d2['actual_price'] = number_format("4.59",2);
			$d2['final_price'] = number_format("4.96",2);
			$totalnumber2+=$stock2['number'];
			array_push($record2, $d2);

		}
		$this->response(array('success'=>'true','record'=>$record2,'total'=>$totalnumber2),200);
    }

    /**********************************
    ===================================
   				=========Option Portfolio=========
	===================================
    ***********************************/

    function user_added_option_portfolio_list_post()
    {
    	$user_id = $this->input->post('user_id');
		if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
		}
		$d2 = array();
		$record2 = array();
		$totalnumber2 = "0";
		$stocks2 = $this->db->query("SELECT * FROM tbl_user_stock_management WHERE user_id='".$user_id."' AND s_type=3 ORDER BY id DESC")->result_array();
		foreach($stocks2 as $stock2)
		{
			$d2['stock_id'] = $stock2['id'];
			$d2['stock_ref_id'] = 0;
			$d2['stock_name'] = $stock2['stock_name'];
			$d2['stock_price'] = $stock2['stock_price'];
			$d2['number'] = $stock2['number'];
			$d2['order_type'] = $stock2['order_type'];
			$totalnumber2+=($stock2['number']*$stock2['stock_price']);
			array_push($record2, $d2);
		}
		$this->response(array('success'=>'true','record'=>$record2,'total'=>$totalnumber2),200);
    }

    function show_all_option_portfolio_list_post()
    {
    	$user_id = $this->input->post('user_id');
		if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
		}
		$d2 = array();
		$record2 = array();
		$totalnumber2 = "0";
		$stocks2 = $this->db->query("SELECT * FROM tbl_user_stock_management WHERE user_id='".$user_id."' AND s_type=3")->result_array();
		foreach($stocks2 as $stock2)
		{
			$d2['stock_id'] = $stock2['id'];
			$d2['stock_ref_id'] = 0;
			$d2['stock_name'] = $stock2['stock_name'];
			$d2['stock_price'] = $stock2['stock_price'];
			$d2['number'] = $stock2['number'];
			$d2['order_type'] = $stock2['order_type'];
			$totalnumber2+=($stock2['number']*$stock2['stock_price']);
			array_push($record2, $d2);
		}
		$this->response(array('success'=>'true','record'=>$record2,'total'=>$totalnumber2),200);
    }

    function add_option_portfolio_post()
    {
    	//echo json_encode($_POST);die;
    	$user_id = $this->input->post('user_id');
    	$stock_name = $this->input->post('stock_name');
    	$stock_price = $this->input->post('stock_price');
		$stock_type = $this->input->post('stock_type');
		$number = $this->input->post('number');
		$created_on = date("Y-m-d H:i:s");
		
		if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
		}
		if($stock_name=="" && $stock_name==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  stock Name'),200);
		}
		if($stock_price=="" && $stock_price==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  stock Price'),200);
		}
		if($stock_type=="" && $stock_type==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  Stock type'),200);
		}
		if($number=="" && $number==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Enter Number'),200);
		}
		$insertData = array(
							'user_id'=>$user_id,
							'stock_id'=>0,
							'stock_name'=>$stock_name,
							'stock_price'=>$stock_price,
							'order_type'=>$stock_type,
							'number'=>$number,
							's_type'=>3,
							'created_on'=>$created_on,
							);
		$alreadyUse = ($this->common->calculateTotalOptionStockMoney($user_id)+($stock_price*$number));
		$calculation =  $this->common->checkMoneyUsesByUser($user_id)['options'];
		//echo $alreadyUse."----".$calculation;die;
		if($calculation>=$alreadyUse)
		{
			$this->db->insert('tbl_user_stock_management',$insertData);

		}
		else
		{
			$this->response(array('success'=>'false','message'=>'You are already cross investment criteria'),200);
		}

		$d2 = array();
		$record2 = array();
		$totalnumber2 = "0";
		$stocks2 = $this->db->query("SELECT * FROM tbl_user_stock_management WHERE user_id='".$user_id."' AND s_type=3")->result_array();

		foreach($stocks2 as $stock2)
		{
			$d2['stock_id'] = $stock2['id'];
			$d2['stock_ref_id'] = 0;
			$d2['stock_name'] = $stock2['stock_name'];
			$d2['stock_price'] = $stock2['stock_price'];
			$d2['number'] = $stock2['number'];
			$d2['order_type'] = $stock2['order_type'];
			$totalnumber2+=($stock2['number']*$stock2['stock_price']);
			array_push($record2, $d2);
		}
		$this->response(array('success'=>'true','message'=>'Stock Added Successfully','record'=>$record2,'total'=>$totalnumber2),200);

    }

    function delete_option_portfolio_post()
    {
    	$user_id = $this->input->post('user_id');
		$stock_id = $this->input->post('stock_id');
		if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
		}
		if($stock_id=="" && $stock_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  stock'),200);
		}
		$this->db->where('id',$stock_id);
		$this->db->where('user_id',$user_id);
		$this->db->delete('tbl_user_stock_management');

		$d2 = array();
		$record2 = array();
		$totalnumber2 = "0";
		$stocks2 = $this->db->query("SELECT * FROM tbl_user_stock_management WHERE user_id='".$user_id."' AND s_type=3")->result_array();

		foreach($stocks2 as $stock2)
		{
			$d2['stock_id'] = $stock2['id'];
			$d2['stock_ref_id'] = 0;
			$d2['stock_name'] = $stock2['stock_name'];
			$d2['stock_price'] = $stock2['stock_price'];
			$d2['number'] = $stock2['number'];
			$d2['order_type'] = $stock2['order_type'];
			$totalnumber2+=($stock2['number']*$stock2['stock_price']);
			array_push($record2, $d2);
		}
		$this->response(array('success'=>'true','message'=>'Stock Deleted Successfully','record'=>$record2,'total'=>$totalnumber2),200);
    }

    function update_option_portfolio_post()
    {
    	$user_id =$this->input->post('user_id');
		$created_on = date("Y-m-d H:i:s");
		$user_stock_id = $this->input->post('user_stock_id');
		$stock_name = $this->input->post('stock_name');
		$stock_price = $this->input->post('stock_price');
		$stock_type = $this->input->post('stock_type');
		$number = $this->input->post('number');
		if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
		}
		if($user_stock_id=="" && $user_stock_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide User stock Id'),200);
		}
		if($stock_name=="" && $stock_name==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide Stock Name'),200);
		}
		if($stock_price=="" && $stock_price==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide Stock Price'),200);
		}
		if($stock_type=="" && $stock_type==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide Stock Type'),200);
		}
		if($number=="" && $number==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide Number'),200);
		}
		$insertData = array(
							'user_id'=>$user_id,
							'stock_id'=>0,
							'stock_name'=>$stock_name,
							'stock_price'=>$stock_price,
							'order_type'=>$stock_type,
							'number'=>$number,
							'created_on'=>$created_on,
							);

		$getAddedRec = $this->db->query("SELECT `stock_price`,`number` FROM tbl_user_stock_management WHERE id='".$user_stock_id."'")->row();
		$alreadyUse = ($this->common->calculateTotalOptionStockMoney($user_id)+($stock_price*$number))-($getAddedRec->stock_price*$getAddedRec->number);
		$calculation =  $this->common->checkMoneyUsesByUser($user_id)['options'];
		//echo $alreadyUse."----".$calculation;die;
		if($calculation>=$alreadyUse)
		{
			$this->db->where('id',$user_stock_id);
			$this->db->where('user_id',$user_id);
			$this->db->update('tbl_user_stock_management',$insertData);	
		}
		else
		{
			$this->response(array('success'=>'false','message'=>'You are already cross investment criteria'),200);
		}

		$d2 = array();
		$record2 = array();
		$totalnumber2 = "0";
		$stocks2 = $this->db->query("SELECT * FROM tbl_user_stock_management WHERE user_id='".$user_id."' AND s_type=3")->result_array();

		foreach($stocks2 as $stock2)
		{
			$d2['stock_id'] = $stock2['id'];
			$d2['stock_ref_id'] = 0;
			$d2['stock_name'] = $stock2['stock_name'];
			$d2['stock_price'] = $stock2['stock_price'];
			$d2['number'] = $stock2['number'];
			$d2['order_type'] = $stock2['order_type'];
			$totalnumber2+=($stock2['number']*$stock2['stock_price']);
			array_push($record2, $d2);
		}
		$this->response(array('success'=>'true','message'=>'Stock Updated Successfully','record'=>$record2,'total'=>$totalnumber2),200);
    }

    function option_portfolio_info_description_post()
    {
    	$user_id = $this->input->post('user_id');
    	$stock_id = $this->input->post('stock_id');
    	$data = array();
    	$recordArray = array();
    	if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
		}
		if($stock_id=="" && $stock_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide User stock Id'),200);
		}
		$data['description'] = 'I am using Twitter Bootstrap modal window functionality. When someone clicks submit on my form, I want to show the modal window upon clicking the "submit button" in the form. I am using Twitter Bootstrap modal window functionality. When someone clicks submit on my form, I want to show the modal window upon clicking the "submit button" in the form. I am using Twitter Bootstrap modal window functionality. When someone clicks submit on my form, I want to show the modal window upon clicking the "submit button" in the form '.$stock_id;
		array_push($recordArray, $data);

		$this->response(array('success'=>'true','record'=>$recordArray),200);
    }

    function filter_option_portfolio_with_side_option_parameter_post()
    {
    	$user_id = $this->input->post('user_id');
    	$parameter = $this->input->post('parameter');
		if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
		}
		if($parameter=="" && $parameter==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  Option parameter'),200);
		}
		$d2 = array();
		$record2 = array();
		$totalnumber2 = "0";
		$stocks2 = $this->db->query("SELECT a.id,a.user_id,a.stock_id,a.value,a.order_type,a.number,a.created_on,b.stock_name,b.stock_type FROM tbl_user_stock_management a INNER JOIN tbl_admin_stock b on a.stock_id=b.id WHERE a.user_id='".$user_id."' AND a.s_type=3")->result_array();

		foreach($stocks2 as $stock2)
		{
			$d2['stock_id'] = $stock2['id'];
			$d2['stock_ref_id'] = $stock2['stock_id'];
			$d2['stock_name'] = $stock2['stock_name'];
			$d2['number'] = $stock2['number'];
			$d2['order_type'] = $stock2['order_type'];
			$d2['parameter'] = number_format("1.66",2);
			$d2['actual_price'] = number_format("4.59",2);
			$d2['final_price'] = number_format("4.96",2);
			$totalnumber2+=$stock2['number'];
			array_push($record2, $d2);

		}
		$this->response(array('success'=>'true','record'=>$record2,'total'=>$totalnumber2),200);
    }

    
}
?>