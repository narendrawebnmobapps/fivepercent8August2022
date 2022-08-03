<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'libraries/REST_Controller.php';

class Tradingdiary extends REST_Controller

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

    function user_trading_diary_list_post()

    {

        $user_id = $this->input->post('user_id');

        if($user_id=="" && $user_id==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);

        }

        $recordarray = array();

        $d = array();

        $datas= $this->db->query("SELECT a.id,a.date_in,a.product,a.order_type,a.price_in,a.date_out,a.price_out,a.comment,a.volume,a.final_volume,b.stock_name,s.id AS s_id,s.strategy,p.first_name,p.last_name,p.user_id AS b_id FROM tbl_users_trading_diary a INNER JOIN tbl_admin_stock b ON a.product=b.id LEFT JOIN tbl_admin_strategies s ON a.startegy=s.id LEFT JOIN tbl_user_personel_info p ON a.broker=p.user_id WHERE a.user_id='".$user_id."' ORDER BY a.id DESC")->result();

        foreach($datas as $value)

        {

            $d['id'] = $value->id;

            $d['date_in'] = date("d-M-Y", strtotime($value->date_in));

            $d['product'] = $value->product;
            $d['order_type'] = $value->order_type;

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

            //$d['price_out'] = $value->price_out;

            $d['stock_name'] = $value->stock_name;

            $d['s_id'] = $value->s_id;

            $d['strategy'] = $value->strategy;

            $d['comment'] = $value->comment;

            $d['volume'] = $value->volume;
            if($value->final_volume>0)
            {
                $d['sold_volume'] = $value->final_volume;
            }
            else
            {
                $d['sold_volume'] = '-';
            }

            $d['pl'] = (($value->price_in*$value->final_volume)<($value->price_out*$value->final_volume))?'1':'0';

            //$d['pl_value'] = (($value->price_in*$value->final_volume)<($value->price_out*$value->final_volume))?($value->price_out*$value->final_volume-$value->price_in*$value->final_volume):($value->price_in*$value->final_volume-$value->price_out*$value->final_volume);
            if(/*$value->price_out>0 && $value->date_out!="" &&*/ $value->final_volume>0)
            {
                if(($value->price_in*$value->final_volume)<($value->price_out*$value->final_volume))
                {
                    $pl_value = ($value->price_out*$value->final_volume)-($value->price_in*$value->final_volume);
                    $d['pl_value'] = number_format($pl_value,2,".","");
                    //number_format($cal,2,".","");
                }
                else
                {
                    $pl_value = ($value->price_in*$value->final_volume)-($value->price_out*$value->final_volume);
                    $d['pl_value'] = number_format($pl_value,2,".","");
                }
            }
            else
            {
                $d['pl_value'] = '-';
            }

            $d['b_id']=$value->b_id;

            $d['broker'] = $value->first_name.' '.$value->last_name;

            array_push($recordarray, $d);

        }

        $this->response(array('success'=>'true','record'=>$recordarray),200);

    } 

    function get_user_trading_diary_list($user_id)
    {
        $recordarray = array();
        $d = array();
        $datas= $this->db->query("SELECT a.id,a.date_in,a.product,a.order_type,a.price_in,a.date_out,a.price_out,a.comment,a.volume,a.final_volume,b.stock_name,s.id AS s_id,s.strategy,p.first_name,p.last_name,p.user_id AS b_id FROM tbl_users_trading_diary a INNER JOIN tbl_admin_stock b ON a.product=b.id LEFT JOIN tbl_admin_strategies s ON a.startegy=s.id LEFT JOIN tbl_user_personel_info p ON a.broker=p.user_id WHERE a.user_id='".$user_id."'  ORDER BY a.id DESC")->result();
        foreach($datas as $value)
        {
            $d['id'] = $value->id;
            $d['date_in'] = date("d-M-Y", strtotime($value->date_in));

            $d['product'] = $value->product;
            $d['order_type'] = $value->order_type;
            $d['price_in'] = $value->price_in;

            if($value->date_out!="")
            {
                $d['date_out'] = date("d-M-Y", strtotime($value->date_out));
            }
            else
            {
                $d['date_out'] = '-';
            }
            $d['price_out'] = $value->price_out;
            $d['stock_name'] = $value->stock_name;
            $d['s_id'] = $value->s_id;
            $d['strategy'] = $value->strategy;
            $d['comment'] = $value->comment;
            $d['volume'] = $value->volume;
            $d['sold_volume'] = $value->final_volume;

            $d['pl'] = ($value->price_in*$value->final_volume)<($value->price_out*$value->final_volume)?'1':'0';

            //$d['pl_value'] = ($value->price_in*$value->final_volume)<($value->price_out*$value->final_volume)?($value->price_out*$value->final_volume-$value->price_in*$value->final_volume):($value->price_in*$value->final_volume-$value->price_out*$value->final_volume);
            if(/*$value->price_out>0 && $value->date_out!="" && */$value->final_volume>0)
            {
                if(($value->price_in*$value->final_volume)<($value->price_out*$value->final_volume))
                {
                    $pl_value = ($value->price_out*$value->final_volume)-($value->price_in*$value->final_volume);
                    $d['pl_value'] = number_format($pl_value,2,".","");
                }
                else
                {
                    $pl_value =($value->price_in*$value->final_volume)-($value->price_out*$value->final_volume);
                    $d['pl_value'] = number_format($pl_value,2,".","");
                }
            }
            else
            {
                $d['pl_value'] = '-';
            }

            $d['b_id']=$value->b_id;

            $d['broker'] = $value->first_name.' '.$value->last_name;

            array_push($recordarray, $d);

        }

        return $recordarray;

    }

    function user_trading_diary_parameters_post()
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
        if($countryID==238)
        {
            $stockTYPE = 2;
        }
        else
        {
            $stockTYPE = 1;
        }
        $bro = array();
        $recordarray = array();
        $arr = array(array('broker_id'=>"0",
                    'first_name'=>'others',
                    'last_name'=>''));

        $products = $this->db->query("SELECT id,stock_name AS product FROM tbl_admin_stock WHERE stock_type='".$stockTYPE."' ORDER BY stock_name ASC")->result();

        $strategies = $this->db->query("SELECT id,strategy FROM tbl_admin_strategies ORDER BY strategy ASC")->result();

        $brokers = $this->db->query("SELECT a.broker_id,b.first_name,b.last_name FROM tbl_users_brokers_management a INNER JOIN tbl_user_personel_info b ON a.broker_id=b.user_id WHERE a.user_id='".$user_id."' AND a.terms=1")->result();

        foreach($brokers as $broker)

        {

            $bro['broker_id'] = $broker->broker_id;

            $bro['first_name'] = $broker->first_name;

            $bro['last_name'] = $broker->last_name;

            array_push($recordarray, $bro);

        }

        $brokersdata = array_merge($recordarray,$arr);

        $this->response(array('success'=>'true','products'=>$products,'strategies'=>$strategies,'brokers'=>$brokersdata),200);

    }

    function add_user_trading_diary_post()
    {
        $user_id = $this->input->post('user_id');
        $datein = $this->input->post('datein');
        $product = $this->input->post('product');
        $stock_type = $this->input->post('order_type');
        $strategy = $this->input->post('strategy');
        $broker = $this->input->post('broker');
        $pricein = $this->input->post('pricein');
        $volume = $this->input->post('volume');
        $dateout = $this->input->post('dateout');
        $priceout = $this->input->post('priceout');
        $finalvolume = $this->input->post('finalvolume');
        $comment = $this->input->post('comment');
        $currentdate = date('Y-m-d H:i:s');
        if($user_id=="" && $user_id==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
        }
        if($datein=="" && $datein==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide  Date In'),200);
        }
        if($product=="" && $product==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide  Product'),200);
        }
        if($stock_type=="" && $stock_type==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide  Order Type'),200);
        }
        if($strategy=="" && $strategy==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide  Strategy'),200);
        }
        if($broker=="" && $broker==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide  broker name'),200);
        }
        if($pricein=="" && $pricein==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide  Price In'),200);
        }
        if($volume=="" && $volume==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide Volume'),200);
        }
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
            $volume1 =  $finalvolume-$volume;
        }
        else
        {
            $volume1 =  $volume;
        }
        if($priceout=="")
        {
            $priceout = 0;
        }

        /*new code Start*/
        if($finalvolume=="")
        {
            $finalvolume = 0;
        }
        $cal = $volume*$pricein-$pricein*$finalvolume;

        $data111 = $this->common->checkMoneyUsesByUser($user_id);
        $trading = $this->common->checkTradingDiaryAdded($user_id);

        $remainingAmountToInvest = $data111['rv'] - $trading;
        if($remainingAmountToInvest>=$cal)
        {
            $canAdd = 1;
        }
        else
        {
            $this->response(array('success'=>'false','message'=>'You are exceeding the limit. You have remaining amount to investment is '.number_format($remainingAmountToInvest,2,".","").'.'),200);
        }

        $checkExistingStock = $this->db->query("SELECT * FROM tbl_user_stock_management WHERE user_id='".$user_id."' AND stock_id='".$product."'");
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
        $tradingData = $this->get_user_trading_diary_list($user_id);
        $this->response(array('success'=>'true','message'=>'Diary Added successfully','record'=>$tradingData),200);
        /*new code End*/

        /*$insertStockRecord = array(
                                'user_id'=>$user_id,
                                'stock_id'=>$product,
                                'order_type'=>$stock_type,
                                'stock_price'=>$pricein,
                                'number'=>$volume1,
                                's_type'=>1,
                                'created_on'=>$currentdate,
                                );
        $this->db->insert('tbl_user_stock_management',$insertStockRecord);
        $stockID = $this->db->insert_id();

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
                            'comment'=>$comment,
                            'portfolio_id'=>$stockID,
                            'startegy'=>$strategy,
                            'created_on'=>$currentdate,
                            'updated_on'=>$currentdate,
                            );
        $this->db->insert('tbl_users_trading_diary',$insertArray);
        $tradingData = $this->get_user_trading_diary_list($user_id);
        $this->response(array('success'=>'true','message'=>'Diary Added successfully','record'=>$tradingData),200);*/

    }

    function update_user_trading_diary_post()
    {
        $user_id = $this->input->post('user_id');
        $diary_id = $this->input->post('diary_id');
        $datein = $this->input->post('datein');
        $product = $this->input->post('product');
        $stock_type = $this->input->post('order_type');
        $strategy = $this->input->post('strategy');
        $broker = $this->input->post('broker');
        $pricein = $this->input->post('pricein');
        $volume = $this->input->post('volume');
        $dateout = $this->input->post('dateout');
        $priceout = $this->input->post('priceout');
        $finalvolume = $this->input->post('finalvolume');
        $comment = $this->input->post('comment');
        $currentdate = date('Y-m-d H:i:s');
        if($user_id=="" && $user_id==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
        }
        if($diary_id=="" && $diary_id==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide  Diary Id'),200);
        }
        if($datein=="" && $datein==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide  Date In'),200);
        }
        if($product=="" && $product==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide  Product'),200);
        }
        if($stock_type=="" && $stock_type==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide  Order Type'),200);
        }
        if($strategy=="" && $strategy==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide  Strategy'),200);
        }
        if($pricein=="" && $pricein==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide  Price In'),200);
        }
        if($volume=="" && $volume==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide  Volume'),200);
        }
        if($dateout=="" && $dateout==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide  Date Out'),200);
        }
        if($priceout=="" && $priceout==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide  Price Out'),200);
        }
        if($finalvolume=="" && $finalvolume==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide Final Volume'),200);
        }
        if($comment=="" && $comment==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide  Comment'),200);
        }
        $pl = 1;
        if($pricein>$priceout)
        {
            $pl = 0;
        }

        $data['tradingDiaries'] = $this->db->query("SELECT a.id,a.date_in,a.product,a.price_in,a.date_out,a.price_out,a.startegy,a.broker,a.volume,a.final_volume,a.comment,a.order_type,a.portfolio_id,a.reference_id,b.id AS stock_id,b.stock_name FROM tbl_users_trading_diary a INNER JOIN tbl_admin_stock b ON a.product=b.id WHERE a.user_id='".$user_id."' AND a.id='".$diary_id."' ")->row_array();

        $checkAlreadyUpdated = $this->db->query("SELECT * FROM tbl_users_trading_diary WHERE reference_id='".$diary_id."' AND user_id='".$user_id."'")->num_rows();
        if($finalvolume<1)
        {
            $this->response(array('success'=>'false','message'=>'Please enter final volume'),200);
        }
        if($finalvolume>$volume)
        {
            $this->response(array('success'=>'false','message'=>'You can not enter final volume more than initial volume'),200);
        }
        if($checkAlreadyUpdated>0)
        {
            $this->response(array('success'=>'false','message'=>'You already Sold this stock'),200);
        }
        if($data['tradingDiaries']['volume']==$data['tradingDiaries']['final_volume'])
        {
            $this->response(array('success'=>'false','message'=>'You already Sold this stock'),200);
        }

        $getTradingRecords = $this->db->query("SELECT volume,final_volume,remainingVolume,price_in,price_out FROM  tbl_users_trading_diary WHERE user_id='".$user_id."' AND product='".$product."' ORDER BY id ASC");
        $checkExistingStock = $this->db->query("SELECT * FROM tbl_user_stock_management WHERE user_id='".$user_id."' AND stock_id='".$product."'");
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
        $tradingData = $this->get_user_trading_diary_list($user_id);
        $this->response(array('success'=>'true','message'=>'Record has been updated successfully','record'=>$tradingData),200);

    }

    function delete_user_trading_diary_post()
    {
        $user_id = $this->input->post('user_id');
        $diary_id = $this->input->post('diary_id');
        if($user_id=="" && $user_id==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
        }
        if($diary_id=="" && $diary_id==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide  Diary Id'),200);
        }
        $this->db->where('user_id',$user_id);
        $this->db->where('id',$diary_id);
        $this->db->delete('tbl_users_trading_diary');
        $tradingData = $this->get_user_trading_diary_list($user_id);
        $this->response(array('success'=>'true','message'=>'Record has been deleted successfully','record'=>$tradingData),200);
    }
    function get_startegy_list_post()
    {
        $user_id = $this->input->post('user_id');
        if($user_id=="" && $user_id==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
        }
        $strategies = $this->db->query("SELECT id,strategy FROM tbl_admin_strategies ORDER BY strategy ASC")->result();
        $this->response(array('success'=>'true','record'=>$strategies),200);

    }
    function get_moneymanagement_data_post()
    {
        $user_id = $this->input->post('user_id');
        if($user_id=="" && $user_id==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
        }
        $recordarray = array();
        $data = array();
        $dchrat = array();
        $chartArray = array();
        //$data['strategies'] = $this->db->query("SELECT id,strategy FROM tbl_admin_strategies ORDER BY strategy ASC")->result();
        $dataResults = $this->db->query("SELECT a.id,a.date_in,a.product,a.price_in,a.volume,a.final_volume,a.date_out,a.price_out,b.stock_name FROM tbl_users_trading_diary a INNER JOIN tbl_admin_stock b ON a.product=b.id WHERE a.user_id='".$user_id."'")->result();

        $chartdData = $this->db->query("SELECT price_in,price_out,volume,final_volume,created_on FROM tbl_users_trading_diary WHERE created_on >= DATE_SUB(NOW(),INTERVAL 1 YEAR) AND user_id='".$user_id."' AND final_volume>0 ORDER BY id ASC")->result();
        $totalProfit = 0;
        foreach($chartdData as $pro)
        {
            /*if(($pro->price_out*$pro->final_volume)>($pro->price_in*$pro->final_volume))
            {*/
                $totalProfit = $totalProfit+($pro->price_out*$pro->final_volume)-($pro->price_in*$pro->final_volume);
            //}
        }
        foreach($chartdData as $chart)
        {
            /*if(($chart->price_out*$chart->final_volume)>($chart->price_in*$chart->final_volume))
            {*/
                /*$dchrat['values'] = ($chart->price_out*$chart->final_volume)-($chart->price_in*$chart->final_volume);
                $dchrat['percent_value'] = number_format((($chart->price_out*$chart->final_volume-$chart->price_in*$chart->final_volume)/$totalProfit)*100,2,".","");*/


                $dchrat['values'] = ($chart->price_out*$chart->final_volume)-($chart->price_in*$chart->final_volume);
                if($totalProfit==0)
                {
                    $dchrat['percent_value'] = number_format((($chart->price_out*$chart->final_volume-$chart->price_in*$chart->final_volume))*100,2,".","");
                    $dchrat['dates']  = date('M d,Y', strtotime($chart->created_on));
                    //$percentArr[$c] = number_format((($chart->price_out*$chart->final_volume-$chart->price_in*$chart->final_volume))*100,2,".","");
                }
                else
                {
                    $dchrat['percent_value'] = number_format((($chart->price_out*$chart->final_volume-$chart->price_in*$chart->final_volume)/$totalProfit)*100,2,".","");
                    $dchrat['dates'] = date('M d,Y', strtotime($chart->created_on));
                    //$percentArr[$c] = number_format((($chart->price_out*$chart->final_volume-$chart->price_in*$chart->final_volume)/$totalProfit)*100,2,".","");
                }
                array_push($chartArray, $dchrat);
            //}   
        }
        //echo "<pre>";print_r($chartArray);die;
        $win = 0;
        $loss = 0;
        $averageWin = 0;
        $averageLoss = 0;
        $count = 0;
        $kelly = 0;
        $mathHope = 0;
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
            $kelly = 0;
            $mathHope = 0;
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

        $data['numberOfProfitTransaction'] = $noofPriftTransaction;
        $data['numberOfLossTransaction'] = $noofLossTransaction;
        $data['numberOfNoLossNoProfitTransaction'] = $NooFnoLossNoProfit;

        $data['mathHope'] = number_format($mathHope,2,".","");
        $data['stopLoss'] = $this->db->query("SELECT stop_loss FROM tbl_user_personel_info WHERE user_id='".$user_id."'")->row()->stop_loss;
        $this->response(array('success'=>'true','record'=>$data,'chartdata'=>$chartArray),200);

    }

    function filter_money_management_with_strategy_post()
    {
        $user_id = $this->input->post('user_id');
        $strategy = $this->input->post('strategy');
        if($user_id=="" && $user_id==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
        }
        if($strategy=="" && $strategy==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide  Strategy Id'),200);
        }
        $data = array();
        $dchrat = array();
        $chartArray = array();
        
        $dataResults = $this->db->query("SELECT a.id,a.date_in,a.product,a.price_in,a.date_out,a.price_out,a.volume,a.final_volume,b.stock_name FROM tbl_users_trading_diary a INNER JOIN tbl_admin_stock b ON a.product=b.id WHERE  a.user_id='".$user_id."' AND a.startegy='".$strategy."'")->result();
        $win = 0;
        $loss = 0;
        $averageWin = 0;
        $averageLoss = 0;
        $count = 0;
        $kelly = 0;
        $mathHope = 0;

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
            $kelly = 0;
            $mathHope = 0;
        }      

        //chart data calculations start//
        //$totalProfit = $this->db->query("SELECT SUM(price_out*final_volume-price_in*final_volume) AS totalProfit FROM tbl_users_trading_diary WHERE price_in*final_volume<price_out*final_volume AND MONTH(created_on)='".date('m')."' AND YEAR(created_on)='".date('Y')."' AND user_id='".$user_id."'")->row();

        //$chartdData = $this->db->query("SELECT price_out,price_in,final_volume,volume  FROM tbl_users_trading_diary WHERE price_in*final_volume<price_out*final_volume AND MONTH(created_on)='".date('m')."' AND YEAR(created_on)='".date('Y')."' AND user_id='".$user_id."'")->result();
        $chartdData = $this->db->query("SELECT price_in,price_out,volume,final_volume,created_on FROM tbl_users_trading_diary WHERE created_on >= DATE_SUB(NOW(),INTERVAL 1 YEAR) AND user_id='".$user_id."' AND final_volume>0 ORDER BY id ASC")->result();
        $totalProfit = 0;
        foreach($chartdData as $pro)
        {
            /*if(($pro->price_out*$pro->final_volume)>($pro->price_in*$pro->final_volume))
            {*/
                $totalProfit = $totalProfit+($pro->price_out*$pro->final_volume)-($pro->price_in*$pro->final_volume);
            //}
        }

        foreach($chartdData as $chart)
        {
            /*if(($chart->price_out*$chart->final_volume)>($chart->price_in*$chart->final_volume))
            {
                $dchrat['values'] = ($chart->price_out*$chart->final_volume)-($chart->price_in*$chart->final_volume);
                $dchrat['percent_value'] = number_format((($chart->price_out*$chart->final_volume-$chart->price_in*$chart->final_volume)/$totalProfit->totalProfit)*100,2,".","");
                array_push($chartArray, $dchrat);
            }*/

            $dchrat['values'] = ($chart->price_out*$chart->final_volume)-($chart->price_in*$chart->final_volume);
            if($totalProfit==0)
            {
                $dchrat['percent_value'] = number_format((($chart->price_out*$chart->final_volume-$chart->price_in*$chart->final_volume))*100,2,".","");
                $dchrat['dates']  = date('M d,Y', strtotime($chart->created_on));
                //$percentArr[$c] = number_format((($chart->price_out*$chart->final_volume-$chart->price_in*$chart->final_volume))*100,2,".","");
            }
            else
            {
                $dchrat['percent_value'] = number_format((($chart->price_out*$chart->final_volume-$chart->price_in*$chart->final_volume)/$totalProfit)*100,2,".","");
                $dchrat['dates'] = date('M d,Y', strtotime($chart->created_on));
                //$percentArr[$c] = number_format((($chart->price_out*$chart->final_volume-$chart->price_in*$chart->final_volume)/$totalProfit)*100,2,".","");
            }
            array_push($chartArray, $dchrat);
        }
        //chart data calculations start//
        //echo "<pre>";print_r($chartArray);die;
        $data['averageWin']  = number_format($averageWin,2,".","");
        $data['averageLoss']  = number_format($averageLoss,2,".","");
        $data['mathHope'] = number_format($mathHope,2,".","");

        ///
        //no of transaction
        $data['numberOfLossTransaction'] = $noofLossTransaction;
        $data['numberOfProfitTransaction'] = $noofPriftTransaction;
        $data['numberOfNoLossNoProfitTransaction'] = $NooFnoLossNoProfit;

        $this->response(array('success'=>'true','record'=>$data,'chartdata'=>$chartArray),200);

    }

    function filter_money_management_formulla_post()
    {
        $user_id = $this->input->post('user_id');
        $strategy = $this->input->post('strategy');
        $formulla = $this->input->post('formulla');
        if($user_id=="" && $user_id==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
        }
        if($formulla=="" && $formulla==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide  formulla'),200);
        }
        $data = array();
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
                $data['formulla'] = '$ '.number_format($kelly,2,".","");
            }
            else
            {
                $data['formulla'] =  '$ '.number_format(-1,2,".","");
            }
        }
        if($formulla==2)  //elder formulla
        {
            $elderFormulla = 0;
            $trade_risk = 0;
            $fraction = 2/100;
            $stop_loss = $this->db->query("SELECT stop_loss FROM tbl_user_personel_info WHERE user_id='".$user_id."'")->row()->stop_loss;
            if($stop_loss==0)
            {
                $data['formulla'] =  'needLoss';
                die;
            }
            $trade_risk = $purchase_price-$stop_loss;//360
            $elderFormulla = ($fraction*$capital_investing)/$trade_risk;
            $data['formulla'] = floor($elderFormulla).' Stocks';
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
            $data['formulla'] = '$ '.number_format($totalloss/2,2,".","");
        }
        if($formulla==4)  //ROR Formulla
        {
            $win = $averageWin/100;
            $loss = $averageLoss/100;
            $ta = $win-$loss;
            $risk = 0;
            $get_money_use_percentage = $this->db->query("SELECT money_use_percentage FROM tbl_user_rf_rv_options_values WHERE user_id='".$user_id."'");
            if($get_money_use_percentage->num_rows()<1)
            {
                $risk = 0;
            }
            else
            {
                $risk = $capital_investing*($get_money_use_percentage->row()->money_use_percentage/100);
            }            
            $ror = (1-$ta)/(1+$ta);
            $ror =  pow($ror,$risk);
            $data['formulla'] = number_format($ror/100,2,".","")." % probability of ruin";
        }
        $this->response(array('success'=>'true','record'=>$data),200);

    }
    function save_money_management_stop_loss_post()
    {
        $user_id = $this->input->post('user_id');
        $stop_loss = $this->input->post('stop_loss');
        if($user_id=="" && $user_id==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
        }
        if($stop_loss=="" && $stop_loss==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide  stop loss'),200);
        }
        
        $this->db->where('user_id',$user_id);
        $this->db->update('tbl_user_personel_info',array('stop_loss'=>$stop_loss));
        $this->response(array('success'=>'true','message'=>'Stop loss has been saved successfully'),200);
    }



    function result_attribution_post()
    {
        $data = array();
        $user_id = $this->input->post('user_id');
        if($user_id=="" && $user_id==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
        }
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
        $loss_data = array();
        $profit_data = array();
        $loss_recordArray = array();
        $profit_recordArray = array();

        $dataResults = $this->db->query("SELECT a.*,(SELECT count(b.stock_id) FROM tbl_user_stock_management b WHERE b.stock_id=a.product AND b.user_id='".$user_id."' AND b.is_suggested=1) AS suggested FROM tbl_users_trading_diary a WHERE a.user_id='".$user_id."'")->result();
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
        $profit2 = $sl_win+$tl_win;      
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
        
        $profitArr = array(
                       array('tactical_profit_percentage'=>number_format($t_percentage,2,".","")),
                       array('strategy_profit_percentage'=>number_format($s_percentage,2,".","")),
                    );

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

       
        $lossArr = array(
                       array('tactical_loss_percentage'=>number_format($tl_percentage,2,".","")),
                       array('strategy_loss_percentage'=>number_format($sl_percentage,2,".","")),
                    );
        //echo "<pre>";print_r($arr);
        //die;
        //array_push($loss_recordArray, $loss_data);


        $this->response(array('success'=>'true','profit'=>$profitArr,'loss'=>$lossArr),200);

    }



    function details_result_attribution_post()
    {
        $user_id = $this->input->post('user_id');
        if($user_id=="" && $user_id==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
        }
        $data = array();
        $profitData = array();
        $profit_recordarray = array();

        $lossData = array();
        $loss_recordarray = array();
        $c = 0;
        $dataResults = $this->db->query("SELECT a.id,a.price_in,a.price_out,a.volume,a.final_volume,c.stock_name,c.industry_id,d.industry FROM tbl_users_trading_diary a INNER JOIN tbl_admin_stock c ON a.product=c.id INNER JOIN tbl_admin_stock_industries d ON c.industry_id=d.id  WHERE a.user_id='".$user_id."'" )->result();
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
            $profit_recordarray[$key]['percent']=number_format($cal,2,".","");
        }
        foreach ($LtmpArr as $key => $vl) 
        {
            $cal=($LtmpArr2[$key]);
            $loss_recordarray[$key]['percent']=number_format($cal,2,".","");
        }
        $data['profit_recordarray'] = $profit_recordarray;
        $data['loss_recordarray'] = $loss_recordarray;
        
        $this->response(array('success'=>'true','profit'=>$data['profit_recordarray'],'loss'=>$data['loss_recordarray']),200);

    }



    function random_color_part() 

    {

         return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);

    }



    function random_color() 

    {

        return  $this->random_color_part() . $this->random_color_part() . $this->random_color_part();

    }

    function test_api_get()

    {

        $get = $this->db->query("SELECT email AS firstname,status AS age,password AS mail FROM tbl_users")->result();

        $this->response(array('employees'=>$get),200);

    }

}

?>