<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tradingdiary extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('common');
	}
	function index($id='')
	{

		$this->common->check_user_login();
		$this->load->library('pagination');
		$data = array();
		$data['title'] = 'Trading diary | Five Percent';
		$data['sub_title'] = 'Trading Diary';
		$user_id = $this->session->userdata('user_id');


		/*$getdiary = $this->db->query("SELECT (a.price_out*a.final_volume-a.price_in*a.final_volume) AS profit, a.volume,a.final_volume,a.id,a.date_in,a.product,a.price_in,a.date_out,a.price_out,b.stock_name FROM tbl_users_trading_diary a INNER JOIN tbl_admin_stock b ON a.product=b.id  WHERE a.user_id='".$user_id."'")->result();
		$profit = 0;
		foreach($getdiary as $dd)
		{
			$profit+=$dd->profit;
		}
		echo $profit;
		echo "<pre>";print_r($getdiary);die;*/


		$totaldata = $this->db->query("SELECT a.id,a.date_in,a.product,a.price_in,a.date_out,a.price_out,b.stock_name FROM tbl_users_trading_diary a INNER JOIN tbl_admin_stock b ON a.product=b.id  WHERE a.user_id='".$user_id."'")->num_rows();

		$config = array();
		$config["base_url"] = base_url() . "users/tradingdiary/index";
		
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

		$data['tradingDiaries'] = $this->db->query("SELECT a.id,a.date_in,a.product,a.price_in,a.date_out,a.price_out,a.final_volume,a.volume,b.stock_name FROM tbl_users_trading_diary a INNER JOIN tbl_admin_stock b ON a.product=b.id   WHERE a.user_id='".$user_id."' ORDER BY a.id DESC LIMIT  $start_from,$limit")->result_array();
		
		$str_links = $this->pagination->create_links();
	    $data["links"] = explode('&nbsp;',$str_links );
	        //echo "<pre>";print_r($totaldata);die;
		$this->load->view('page/trading-diary/trading_diary',$data);
	}
	function add_trading_diary()
	{
		$this->common->check_user_login();
		$data = array();
		$data['title'] = 'Trading diary | Five Percent';
		$data['sub_title'] = 'Trading Diary';
		$user_id = $this->session->userdata('user_id');
		$countryID = $this->session->userdata('countryID');

		$bro = array();
        $recordarray = array();
        $arr = array(array('broker_id'=>"0",
                    'first_name'=>'others',
                    'last_name'=>''));
        if($countryID==238)
		{
			$stockTYPE = 2;
		}
		else
		{
			$stockTYPE = 1;
		}

		$data['products'] = $this->db->query("SELECT id,stock_name FROM tbl_admin_stock WHERE stock_type='".$stockTYPE."' ORDER BY stock_name ASC")->result();
		$data['strategies'] = $this->db->query("SELECT id,strategy FROM tbl_admin_strategies ORDER BY strategy ASC")->result();
		$brokers = $this->db->query("SELECT a.user_id,a.broker_id,b.first_name,b.last_name FROM tbl_users_brokers_management a INNER JOIN tbl_user_personel_info b ON a.broker_id=b.user_id WHERE a.user_id='".$user_id."' AND a.terms=1")->result();
		
		foreach($brokers as $broker)
        {
            $bro['broker_id'] = $broker->broker_id;
            $bro['first_name'] = $broker->first_name;
            $bro['last_name'] = $broker->last_name;
            array_push($recordarray, $bro);
        }
        $brokersdata = array_merge($recordarray,$arr);
        $data['brokers'] = $brokersdata;
		//echo "<pre>";print_r($data['brokers']);die;
		$currentdate = date('Y-m-d H:i:s');
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$datein = $this->input->post('datein');
			$product = $this->input->post('product');
			$stock_type = $this->input->post('stock_type');
			$strategy = $this->input->post('strategy');
			$broker = $this->input->post('broker');
			$pricein = $this->input->post('pricein');
			$volume = $this->input->post('volume');
			$dateout = $this->input->post('dateout');
			$priceout = $this->input->post('priceout');
			$finalvolume = $this->input->post('finalvolume');
			$comment = $this->input->post('comment');
			$pl = 1;
	        if($pricein>$priceout)
	        {
	            $pl = 0;
	        }
	        if($finalvolume=="")
	        {
	        	$finalvolume = 0;
	        }
	        if($finalvolume>0)
	        {
	        	$volume1 =  $volume-$finalvolume;
	        }
	        else
	        {
	        	$volume1 =  $volume;
	        }

	        $checkExistingStock = $this->db->query("SELECT * FROM tbl_user_stock_management WHERE user_id='".$user_id."' AND stock_id='".$product."'");
	        //echo $checkExistingStock->num_rows();die;
	        if($checkExistingStock->num_rows()>0)
	        {
	        	$getTradingRecords = $this->db->query("SELECT volume,final_volume,remainingVolume,price_in,price_out FROM  tbl_users_trading_diary WHERE user_id='".$user_id."' AND product='".$product."' ORDER BY id ASC")->result();
	        	$volumes = 0;
	        	$increment = 1;
	        	$firstDiaryVolume = 0;
	        	$remainingVolume = 0;
	        	foreach($getTradingRecords as $trading)
	        	{       
	        		if($increment==1)
	        		{
	        			$firstDiaryVolume = $trading->volume;
	        		}		
					$volumes+=($trading->remainingVolume);
					$increment++;

	        	}
	        	//$remainingVolume = $firstDiaryVolume-$volumes;
	        	$existingNumberOfStock = $checkExistingStock->row()->number;
	        	$existingNumberOfStock = $existingNumberOfStock-($volumes);
	        	$volume1 = $volumes+$volume1+$existingNumberOfStock;
	        	$insertStockRecord = array(
										'user_id'=>$user_id,
										'stock_id'=>$product,
										'number'=>$volume1,
										's_type'=>1,
										'created_on'=>$currentdate,
										);
	        	$this->db->where('stock_id',$product);
		        $this->db->update('tbl_user_stock_management',$insertStockRecord);
		        $stockID = $checkExistingStock->row()->id;
	        }
	        else
	        {
	        	$insertStockRecord = array(
										'user_id'=>$user_id,
										'stock_id'=>$product,
										'number'=>$volume1,
										's_type'=>1,
										'created_on'=>$currentdate,
										);
		        $this->db->insert('tbl_user_stock_management',$insertStockRecord);
		        $stockID = $this->db->insert_id();
	        }
	        if($finalvolume>0 && $volume!=$finalvolume)
	        {
	        	$insertArray = array(
								'user_id'=>$user_id,
								'date_in'=>$datein,
								'product'=>$product,
								'order_type'=>$stock_type,
								'price_in'=>$pricein,
								'date_out'=>$dateout,
								'price_out'=>$priceout,
								'broker'=>$broker,
								'pl'=>$pl,
								'volume'=>$volume,
								'final_volume'=>$finalvolume,
								//'remainingVolume'=>$remaingQuantity,
								'comment'=>$comment,
								'portfolio_id'=>$stockID,
								'startegy'=>$strategy,
								'created_on'=>$currentdate,
								'updated_on'=>$currentdate,
								);
				$this->db->insert('tbl_users_trading_diary',$insertArray);
				$lastInsertedId = $this->db->insert_id();

				$insertArray['created_on'] = $currentdate;
	        	$insertArray['reference_id'] = $lastInsertedId;
	        	$remainingVolume = $volume-$finalvolume;
	        	$insertArray['volume'] = $remainingVolume;
	        	$insertArray['remainingVolume'] = $remainingVolume;
	        	$insertArray['final_volume'] = 0;
	        	$insertArray['price_out'] = 0;
	        	$this->db->insert('tbl_users_trading_diary',$insertArray);

	        }
	        else
	        {
	        	$remaingQuantity = 0;
	        	$remaingQuantity = $volume-$finalvolume;
	        	$insertArray = array(
								'user_id'=>$user_id,
								'date_in'=>$datein,
								'product'=>$product,
								'order_type'=>$stock_type,
								'price_in'=>$pricein,
								'date_out'=>$dateout,
								'price_out'=>$priceout,
								'broker'=>$broker,
								'pl'=>$pl,
								'volume'=>$volume,
								'final_volume'=>$finalvolume,
								'remainingVolume'=>$remaingQuantity,
								'comment'=>$comment,
								'portfolio_id'=>$stockID,
								'startegy'=>$strategy,
								'created_on'=>$currentdate,
								'updated_on'=>$currentdate,
								);
				$this->db->insert('tbl_users_trading_diary',$insertArray);
	        }
			
			redirect(base_url('users/tradingdiary'));
		}
		else
		{
			$this->load->view('page/trading-diary/add_trading_diary',$data);
		}
		
	}
	function edit_trading_diary($diary_id)
	{
		$this->common->check_user_login();
		$data = array();
		$data['title'] = 'Edit Trading diary | Five Percent';
		$data['sub_title'] = 'Trading Diary';
		$user_id = $this->session->userdata('user_id');
		$countryID = $this->session->userdata('countryID');
		$diary_id = base64_decode($diary_id);
		$bro = array();
        $recordarray = array();
        $arr = array(array('broker_id'=>"0",
                    'first_name'=>'others',
                    'last_name'=>''));

		$data['tradingDiaries'] = $this->db->query("SELECT a.id,a.date_in,a.product,a.price_in,a.date_out,a.price_out,a.startegy,a.broker,a.volume,a.final_volume,a.comment,a.order_type,a.portfolio_id,a.reference_id,b.id AS stock_id,b.stock_name FROM tbl_users_trading_diary a INNER JOIN tbl_admin_stock b ON a.product=b.id WHERE a.user_id='".$user_id."' AND a.id='".$diary_id."' ")->row_array();
		if($countryID==238)
		{
			$stockTYPE = 2;
		}
		else
		{
			$stockTYPE = 1;
		}
		$data['products'] = $this->db->query("SELECT id,stock_name FROM tbl_admin_stock WHERE stock_type='".$stockTYPE."' ORDER BY stock_name ASC")->result();
		$data['strategies'] = $this->db->query("SELECT id,strategy FROM tbl_admin_strategies ORDER BY strategy ASC")->result();
		$brokers = $this->db->query("SELECT a.user_id,a.broker_id,b.first_name,b.last_name FROM tbl_users_brokers_management a INNER JOIN tbl_user_personel_info b ON a.broker_id=b.user_id WHERE a.user_id='".$user_id."' AND a.terms=1")->result();
		
		foreach($brokers as $broker)
        {
            $bro['broker_id'] = $broker->broker_id;
            $bro['first_name'] = $broker->first_name;
            $bro['last_name'] = $broker->last_name;
            array_push($recordarray, $bro);
        }
        $brokersdata = array_merge($recordarray,$arr);
        $data['brokers'] = $brokersdata;

		$currentdate = date('Y-m-d H:i:s');
		if($this->input->server('REQUEST_METHOD') == 'POST')
		{
			//echo "<pre>";print_r($_POST);die;
			$datein = $this->input->post('datein');
			$product = $this->input->post('product');
			$stock_type = $this->input->post('stock_type');
			$strategy = $this->input->post('strategy');
			$broker = $this->input->post('broker');
			$pricein = $this->input->post('pricein');
			$volume = $this->input->post('volume');
			$dateout = $this->input->post('dateout');
			$priceout = $this->input->post('priceout');
			$finalvolume = $this->input->post('finalvolume');
			if($finalvolume=="")
			{
				$finalvolume = 0;
			}
			$comment = $this->input->post('comment');
			$pl = 1;
	        if($pricein>$priceout)
	        {
	            $pl = 0;
	        }
	        $checkAlreadyUpdated = $this->db->query("SELECT * FROM tbl_users_trading_diary WHERE reference_id='".$diary_id."'")->num_rows();
	        if($finalvolume<1)
	        {
	        	$this->session->set_flashdata('success','Please enter final volume');
	        	redirect(base_url('users/tradingdiary/edit_trading_diary/'.base64_encode($diary_id)));
	        }
	        if($finalvolume>$volume)
	        {
	        	$this->session->set_flashdata('success','You can not enter final volume more than initial volume');
	        	redirect(base_url('users/tradingdiary/edit_trading_diary/'.base64_encode($diary_id)));
	        }
	        if($checkAlreadyUpdated>0)
	        {
	        	$this->session->set_flashdata('success','You already Sold this stock');
	        	redirect(base_url('users/tradingdiary/edit_trading_diary/'.base64_encode($diary_id)));
	        }
	        if($data['tradingDiaries']['volume']==$data['tradingDiaries']['final_volume'])
	        {
	        	$this->session->set_flashdata('success','You already Sold this stock');
	        	redirect(base_url('users/tradingdiary/edit_trading_diary/'.base64_encode($diary_id)));
	        }

	        $getTradingRecords = $this->db->query("SELECT volume,final_volume,remainingVolume,price_in,price_out FROM  tbl_users_trading_diary WHERE user_id='".$user_id."' AND product='".$product."' ORDER BY id ASC");

	        $checkExistingStock = $this->db->query("SELECT * FROM tbl_user_stock_management WHERE user_id='".$user_id."' AND stock_id='".$product."'");
	        //echo $checkExistingStock->num_rows();die;

	        if($getTradingRecords->num_rows()>1)
	        {
	        	$volumes = 0;
	        	foreach($getTradingRecords->result() as $trading)
	        	{       	
					$volumes+=($trading->remainingVolume);

	        	}
	        	$volume1 = $volumes-$finalvolume;
	        	if($checkExistingStock->num_rows()>0)
	        	{
	        		$volume1 = $checkExistingStock->row()->number-$finalvolume;
	        	}
	        	//echo $volume1."  one";die;
	        	$insertStockRecord = array(
											'number'=>$volume1,
										);
	        	$this->db->where('stock_id',$product);
	        	$this->db->where('user_id',$user_id);
		        $this->db->update('tbl_user_stock_management',$insertStockRecord);
	        }
	        else if($getTradingRecords->num_rows()==1)
	        {
	        	$volume1 = $volume-$finalvolume;
	        	if($checkExistingStock->num_rows()>0)
	        	{
	        		$volume1 = $checkExistingStock->row()->number-$finalvolume;
	        	}
	        	//echo $volume1."  tow";die;
	        	$insertStockRecord = array(
											'number'=>$volume1,
										);
	        	$this->db->where('stock_id',$product);
	        	$this->db->where('user_id',$user_id);
		        $this->db->update('tbl_user_stock_management',$insertStockRecord);
	        }
        	$checkPortfolio = $this->db->query("SELECT * FROM tbl_user_stock_management WHERE user_id='".$user_id."' AND stock_id='".$product."' ");
        	if($checkPortfolio->num_rows()<1)
        	{
        		$insertStockRecord = array(
										'user_id'=>$user_id,
										'stock_id'=>$product,
										'number'=>$volume1,
										's_type'=>1,
										'created_on'=>$currentdate,
										);
		        $this->db->insert('tbl_user_stock_management',$insertStockRecord);
        	}


			$insertArray = array(
								'user_id'=>$user_id,
								'date_in'=>$datein,
								'product'=>$product,
								'order_type'=>$stock_type,
								'price_in'=>$pricein,
								'date_out'=>$dateout,
								'price_out'=>$priceout,
								'broker'=>$broker,
								'pl'=>$pl,
								'volume'=>$volume,
								'final_volume'=>$finalvolume,
								'remainingVolume'=>0,
								'comment'=>$comment,
								'startegy'=>$strategy,
								'updated_on'=>$currentdate,
								);		
			$this->db->where('user_id',$user_id);
			$this->db->where('id',$diary_id);
			$this->db->update('tbl_users_trading_diary',$insertArray);
			if($volume>$finalvolume)
	        {
	        	$insertArray['created_on'] = $currentdate;
	        	$insertArray['reference_id'] = $diary_id;
	        	$remainingVolume = $volume-$finalvolume;
	        	$insertArray['volume'] = $remainingVolume;
	        	$insertArray['remainingVolume'] = $remainingVolume;
	        	$insertArray['final_volume'] = 0;
	        	$insertArray['price_out'] = 0;
	        	$insertArray['portfolio_id'] = $data['tradingDiaries']['portfolio_id'];
	        	$this->db->insert('tbl_users_trading_diary',$insertArray);       	
	        }     		
			redirect(base_url('users/tradingdiary'));
		}
		else
		{
			$this->load->view('page/trading-diary/edit_trading_diary',$data);
		}
	}
	function delete_trading_diary()
	{
		$this->common->check_user_login();
		//echo "<pre>";print_r($_POST);die;
		$user_id = $this->session->userdata('user_id');
		$diary_id = $this->input->post('diary_id');
		$diary_id = base64_decode($diary_id);

		$this->db->where('user_id',$user_id);
		$this->db->where('id',$diary_id);
		$this->db->delete('tbl_users_trading_diary');
		//redirect(base_url('users/tradingdiary'));
		echo 1;
	}
	function filter_option_select_ajax()
	{
		$recordarray = array();
		$d = array();
		$user_id = $this->session->userdata('user_id');
		$page = $this->input->post('page');
		//echo $page;die;
		$limit=5;
		$start_from = ($page-1) * $limit;
		$datas= $this->db->query("SELECT a.id,a.date_in,a.product,a.price_in,a.date_out,a.price_out,a.comment,a.volume,a.final_volume,b.stock_name,s.strategy,p.first_name,p.last_name FROM tbl_users_trading_diary a INNER JOIN tbl_admin_stock b ON a.product=b.id LEFT JOIN tbl_admin_strategies s ON a.startegy=s.id LEFT JOIN tbl_user_personel_info p ON a.broker=p.user_id WHERE a.user_id='".$user_id."' ORDER BY a.id DESC LIMIT  $start_from,$limit")->result();
		foreach($datas as $value)
		{
			$d['id'] = $value->id;
			$d['date_in'] = date("d-M-Y", strtotime($value->date_in));
			$d['product'] = $value->product;
			$d['price_in'] = $value->price_in;
			if($value->date_out!="" && $value->final_volume>0)
			{
				$d['date_out'] =date("d-M-Y", strtotime($value->date_out));	
			}
			else
			{
				$d['date_out'] = '-';
			}
			if($value->final_volume>0)
			{
				$d['price_out'] = $value->price_out;
			}
			else
			{
				$d['price_out'] = '-';
			}
			
			$d['stock_name'] = $value->stock_name;
			if($value->strategy!="" && $value->strategy!=NULL)
			{
				$d['strategy'] = $value->strategy;
			}
			else
			{
				$d['strategy'] = '-';
			}
			
			$d['comment'] = $value->comment;
			$d['volume'] = $value->volume;
			if($value->final_volume>0)
			{
				$d['final_volume'] = $value->final_volume;
			}
			else
			{
				$d['final_volume'] = '-';
			}
			
			//(($value->price_out-$value->price_in)*$value->volume)>(($value->price_out-$value->price_in)*$value->final_volume)

			if(/*$value->price_out>0 && $value->date_out!="" && */$value->final_volume>0)
			{
				if(($value->price_in*$value->final_volume)<($value->price_out*$value->final_volume))
				{
					$pro = ($value->price_out*$value->final_volume)-($value->price_in*$value->final_volume);
					$d['pl'] = '<span style="color:green">'.($pro).'</span>';
				}
				else
				{
					$loss = ($value->price_in*$value->final_volume)-($value->price_out*$value->final_volume);
					//1*100-1*99
					$d['pl'] = '<span style="color:red">'.($loss).'</span>';
				}
			}
			else
			{
				$d['pl'] = '-';
			}
			if($value->volume>$value->final_volume)
			{
				$d['remaininVolume'] = $value->volume-$value->final_volume;
			}
			else
			{
				$d['remaininVolume'] = 0;
			}
			//$d['pl'] = $value->price_in<$value->price_out?($value->price_out-$value->price_in).' P':($value->price_in-$value->price_out).' L ';
			$d['broker'] = $value->first_name.' '.$value->last_name;
			array_push($recordarray, $d);
		}
		echo json_encode($recordarray);
	}
	function remainingDiary()
	{
		$user_id = $this->session->userdata('user_id');
		$query = $this->db->query("SELECT SUM(price_in*remainingVolume) AS totalInvested FROM tbl_users_trading_diary WHERE user_id='".$user_id."' ORDER BY id DESC");
		//echo "<pre>"; print_r($query->row());die;
		$totalInvested = 0;
		if($query->row()->totalInvested!="")
		{
			$totalInvested = $query->row()->totalInvested;
		}
		echo $totalInvested;
		/*if($query->num_rows()>0)
		{
			$totalInvested = $query->row()->totalInvested;
		}
		else
		{
			$totalInvested = "0";
		}
		//echo "<pre>";print_r($totalInvested);
		echo (string)$totalInvested;*/
	} 
	function checkavailablemoneytodd()
	{
		$this->common->check_user_login();
		$user_id = $this->session->userdata('user_id');
		$pricein = $this->input->post('pricein');
		$volume = $this->input->post('volume');
		$priceout = $this->input->post('priceout');
		$finalvolume = $this->input->post('finalvolume');
		if($finalvolume=="")
		{
			$finalvolume = 0;
		}
		$cal = $volume*$pricein-$pricein*$finalvolume;

		$data = $this->common->checkMoneyUsesByUser($user_id);
		$trading = $this->common->checkTradingDiaryAdded($user_id);

		$remainingAmountToInvest = $data['rv'] - $trading;
		if($remainingAmountToInvest>=$cal)
		{
			$canAdd = 1;
		}
		else
		{
			$canAdd = 0;
		}
		$arr = array(
					'added'=>$trading,
					'remaining'=>number_format($remainingAmountToInvest,2,".",""),
					'canAdd'=>$canAdd
					);
		echo json_encode($arr);
		//echo $cal."--".$remainingAmountToInvest."--".($remainingAmountToInvest-$cal);
	}
}