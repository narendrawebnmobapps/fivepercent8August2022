<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'libraries/REST_Controller.php';

class Dashboard extends REST_Controller

{

	function __construct()

	{

		parent::__construct();

		$this->load->library(array('common','dashboards'));

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

    function user_dashboard_post()

    {
        error_reporting(0);
        $user_id = $this->input->post('user_id');
        $plan = $this->input->post('plan');
        if($user_id=="" && $user_id==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
        }
        if($plan=="" && $plan==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide  Plan'),200);
        }

        //echo $user_id;die;
        $newsData = $this->db->query("SELECT id,news_title,news_content,image,created_on FROM tbl_admin_live_news WHERE section=0 ORDER BY id DESC LIMIT 5")->result();
        //top company calculation Start
        if($plan==0 || $plan==1)
        {
            //$topTenInvestmrntData = array();
            //$topTenInvestmrntRecordarray = array();

            $topTenInvestment = $this->db->query("SELECT a.investments_id,SUM(a.amount) AS TAmount,b.fund_name FROM tbl_user_investments_management a INNER JOIN tbl_admin_investments b ON a.investments_id=b.investments_id GROUP BY a.investments_id")->result();

            $this->response(array('success'=>'true','newsData'=>$newsData,'topTenInvestment'=>$topTenInvestment),200);

        }
        else
        {
            $company_record_array = $this->dashboards->topTenCompanies($user_id);
            $strategy_record_array = $this->dashboards->getUserTopTenStrategies($user_id);
            
            /*
                Get FinancialTarget
            */
            $financeData = array();
            $financeArr = array();
            $LtmpArr = array();
            $LtmpArr2 = array();
            $LtmpArr3 = array();
            $getfinancialChartData = $this->db->query("select *, CAST(`updated_on` as DATE) AS datewise from tbl_users_trading_diary WHERE price_out>0 AND user_id='".$user_id."' ORDER BY updated_on DESC")->result(); 
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
            $totalDiaryProfit = 0;
            $financeDataArr = array();
            $financeRecordArr = array();
            foreach($financeArr as $proloss)
            {
                $financeDataArr['dates'] = date('M d,Y', strtotime($proloss['dates']));
                $financeDataArr['pro_loss'] = number_format((($proloss['pro_loss']*100)/$totalChartAccoutPrice),2,".","");
                $totalDiaryProfit = $totalDiaryProfit+$proloss['pro_loss'];
                array_push($financeRecordArr, $financeDataArr);
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

            $profitabilityQuery = $this->db->query("SELECT a.options AS optionvalue,b.id AS option_id,a.value, a.question_id,b.options FROM user_question_options a LEFT JOIN tbl_question_options b ON a.options=b.id WHERE a.question_id=43 AND a.user_id='".$user_id."'");
            $profitabil = 0;
            if($profitabilityQuery->num_rows()>0)
            {
                $profitability = $profitabilityQuery->row();
                if($profitability->option_id==218)
                {
                    $profitabil = 10;
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
                    $profitabil = 10;
                }
            }
            else
            {
                $profitabil = 6;
            }
            $expectedProfit = ($capital_investing*$profitabil)/100;
            $toatalProfitPercentage = 0;
            $toatalProfitPercentage = ($totalDiaryProfit*100)/$expectedProfit;
            $goalPercentage = number_format($toatalProfitPercentage,2,".","");
            $goalPercentageArr = array(
                                        'goal'=>$goalPercentage,
                                        'remaining'=>number_format(100-$goalPercentage,2,".","")
                                    );
            $this->response(array('success'=>'true','newsData'=>$newsData,'topTenCompany'=>$company_record_array,'topTenStrategies'=>$strategy_record_array,'financialTarget'=>$financeRecordArr,'goalPercentage'=>$goalPercentageArr),200);
        }
        

    }

    function chat_list_post()

    {

        $user_id = $this->input->post('user_id');

        $client_id = $this->input->post('client_id');

        if($user_id=="" && $user_id==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);

        }

        if($client_id=="" && $client_id==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide  Client Id'),200);

        }

        $recordArray = array();

        $dataArray = array();

        $messageData = $this->db->query("SELECT * FROM tbl_chatting WHERE (user_two='".$client_id."' OR user_one='".$client_id."') AND (user_two='".$user_id."' OR user_one='".$user_id."')  ORDER BY created_on ASC")->result();

        foreach($messageData as $mess)

        {

            $time = date("h:i A", strtotime($mess->created_on)); 

            $date = date("M d", strtotime($mess->created_on));

            if($mess->user_one!=$user_id)

            {

                $dataArray['icomimng'] = "1";

            }

            if($mess->user_one==$user_id && $mess->user_two!=$user_id) 

            {

               $dataArray['icomimng'] = "0"; 

            }

            $dataArray['message'] = $mess->message; 

            $dataArray['time'] = $time;

            $dataArray['date'] = $date;  

            array_push($recordArray, $dataArray);

        }

        $this->response(array('success'=>'true','record'=>$recordArray),200);

    }

    function send_chat_message_post()

    {

        $user_id = $this->input->post('user_id');

        $client_id = $this->input->post('client_id');

        $message = $this->input->post('message');

        $datetime = date("Y-m-d H:i:s");

        if($user_id=="" && $user_id==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);

        }

        if($client_id=="" && $client_id==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide  Client Id'),200);

        }

        if($message=="" && $message==null)

        {

            $this->response(array('success'=>'false','message'=>'Please write message'),200);

        }

        /*$insertarray = array(

                            'user_one'=>$user_id,

                            'user_two'=>$client_id,

                            'message'=>$message,

                            'created_on'=>$datetime

                            );



        $this->db->insert('tbl_chatting',$insertarray);

        $this->response(array('success'=>'true','message'=>'Message sent successfully'),200);*/





        $insertarray = array(

                            'user_one'=>$user_id,

                            'user_two'=>$client_id,

                            'message'=>$message,

                            'created_on'=>$datetime

                            );

        $this->db->insert('tbl_chatting',$insertarray);



        $check_existing_connectivity = $this->db->query("SELECT * FROM tbl_user_adviser_referral_code_connectivity WHERE user_id='".$user_id."' AND advisor_id='".$client_id."'");

        if($check_existing_connectivity->num_rows()==0)

        {

            $insertdata = array(

                                'user_id'=>$user_id,

                                'advisor_id'=>$client_id,

                                'status'=>0,

                                'created_on'=>$datetime,

                                'updated_on'=>$datetime,

                                );



            $this->db->insert('tbl_user_adviser_referral_code_connectivity',$insertdata);

            $getUserName = $this->getUserName($user_id);



            $notification = "Hi <b>".$getUserName->first_name.' '.$getUserName->last_name."</b> Sent you request to be your client";

            $insertNotification = array(

                                        'user_one'=>$user_id,

                                        'user_two'=>$client_id,

                                        'type'=>2,

                                        'notification'=>$notification,

                                        'created_on'=>$datetime,

                                        );

            $this->db->insert('tbl_notifications',$insertNotification);

        }



        /* Read Messages*/

        $this->db->where('user_one',$client_id);

        $this->db->where('user_two',$user_id);

        $this->db->update('tbl_chatting',array('status'=>1));

        /* Read Messages*/



        $this->response(array('success'=>'true','message'=>'Message sent successfully'),200);

    }

    function getUserName($user_id)

    {

        $getUserName = $this->db->query("SELECT a.id,b.first_name,b.last_name FROM tbl_users a INNER JOIN tbl_user_personel_info b ON a.id=b.user_id")->row();

        return $getUserName;

    }

    function send_chat_message_from_advisor_to_user_post()

    {

        $datetime = date("Y-m-d H:i:s");

        $user_id = $this->input->post('user_id');

        $message = $this->input->post('message');

        $client_id = $this->input->post('client_id');



        if($user_id=="" && $user_id==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);

        }

        if($client_id=="" && $client_id==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide  Client Id'),200);

        }

        if($message=="" && $message==null)

        {

            $this->response(array('success'=>'false','message'=>'Please write message'),200);

        }



        $insertarray = array(

                            'user_one'=>$user_id,

                            'user_two'=>$client_id,

                            'message'=>$message,

                            'created_on'=>$datetime

                            );

        $this->db->insert('tbl_chatting',$insertarray);



        /* Read Messages*/

        $this->db->where('user_one',$client_id);

        $this->db->where('user_two',$user_id);

        $this->db->update('tbl_chatting',array('status'=>1));

        /* Read Messages*/

        $this->response(array('success'=>'true','message'=>'Message sent successfully'),200);

    }



    function newChatMessage_post()

    {

        $user_id = $this->input->post('user_id');

        if($user_id=="" && $user_id==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);

        }

        $data = array();

        $recordArray = array();

        $messageQuery = $this->db->query("SELECT a.*,b.first_name,b.last_name FROM tbl_chatting a LEFT JOIN tbl_user_personel_info b ON a.user_one=b.user_id  WHERE a.user_two='".$user_id."' AND a.status=0 ORDER BY a.created_on DESC");

        foreach($messageQuery->result() as $res )

        {

            $data['chat_id'] = $res->id;

            $data['sender_id'] = $res->user_one;

            $data['sendername'] = $res->first_name.' '.$res->last_name;

            $data['message'] = $res->message;

            array_push($recordArray, $data);

        }

        $this->response(array('success'=>'true','message_count'=>$messageQuery->num_rows(),'message_list'=>$recordArray),200);

    }

    function readUnreadMessage_post()

    {

        $user_id = $this->input->post('user_id');

        $client_id = $this->input->post('client_id');

        if($user_id=="" && $user_id==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);

        }

        if($client_id=="" && $client_id==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide  Client Id'),200);

        }

        $this->db->where('user_one',$client_id);

        $this->db->where('user_two',$user_id);

        $this->db->update('tbl_chatting',array('status'=>1));

        $this->response(array('success'=>'true','message'=>'Ok'),200);

    }



    function todaysScheduledAppointments_post()

    {

        $user_id = $this->input->post('user_id');

        if($user_id=="" && $user_id==null)

        {

          $this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);

        }

        $recordArray = array();

        $data = array();

        $todayDate = date('Y-m-d');

        $todaysScheduledAppointments = $this->db->query("SELECT a.schedule_date,b.id,c.first_name,c.last_name,c.profile_image,d.start_time,d.end_time FROM tbl_user_advisor_schedule_appointment a INNER JOIN tbl_users b ON  a.user_id=b.id INNER JOIN tbl_user_personel_info c ON b.id=c.user_id INNER JOIN tbl_admin_time_slot d ON a.slot_id=d.id WHERE a.advisor_id='".$user_id."' AND a.schedule_date='".$todayDate."' ORDER BY d.start_time ASC")->result();

        //print_r($todaysScheduledAppointments);

        foreach($todaysScheduledAppointments as $schedule)

        {

            $data['schedule_date'] = $schedule->schedule_date;

            $data['client_id'] = $schedule->id;

            $data['first_name'] = $schedule->first_name;

            $data['last_name'] = $schedule->last_name;

            $data['profile_image'] = $schedule->profile_image;

            $data['start_time'] = substr($schedule->start_time, 0,5);

            $data['end_time'] = substr($schedule->end_time, 0,5);



            array_push($recordArray, $data);



        }



        $this->response(array('success'=>'true','record'=>$recordArray),200);



    }



    function user_approved_by_advisor_post()

    {

        $datetime = date("Y-m-d H:i:s");

        $user_id = $this->input->post('user_id');

        $client_id = $this->input->post('client_id');

        if($user_id=="" && $user_id==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);

        }

        if($client_id=="" && $client_id==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide  Client Id'),200);

        }

        $check_existing_connectivity = $this->db->query("SELECT * FROM tbl_user_adviser_referral_code_connectivity WHERE user_id='".$client_id."' AND advisor_id='".$user_id."'");



        if($check_existing_connectivity->num_rows()>0)

        {

            $this->db->where('user_id',$client_id);

            $this->db->where('advisor_id',$user_id);

            $this->db->update('tbl_user_adviser_referral_code_connectivity',array('status'=>1));



            $notification = "Hi <b>".$this->session->userdata('fname').' '.$this->session->userdata('lname')."</b> Accepted your request. Now You both communicate each other";

            $insertNotification = array(

                                        'user_one'=>$user_id,

                                        'user_two'=>$client_id,

                                        'type'=>2,

                                        'notification'=>$notification,

                                        'created_on'=>$datetime,

                                        );

            $this->db->insert('tbl_notifications',$insertNotification);

        }

        $this->response(array('success'=>'true','message'=>'Request Approved successfully'),200);

    }



    function showNotifications_post()

    {

        $user_id = $this->input->post('user_id');

        if($user_id=="" && $user_id==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);

        }

        $getNotification = $this->db->query("SELECT id,notification FROM tbl_notifications WHERE user_two='".$user_id."' AND status=0 ORDER BY id DESC");



        $result = $getNotification->result();

        $CountTotalnotification = $getNotification->num_rows();

        $this->response(array('success'=>'true','record'=>$result,'notificationCount'=>$CountTotalnotification),200);

    }



    function clearSingleNotification_post()

    {

        $user_id = $this->input->post('user_id');

        $notification_id = $this->input->post('notification_id');

        if($user_id=="" && $user_id==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);

        }

        if($notification_id=="" && $notification_id==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide  notification Id'),200);

        }



        $this->db->where('id',$notification_id);

        $this->db->update('tbl_notifications',array('status'=>1));

        //echo $this->db->query("SELECT * FROM tbl_notifications WHERE user_two='".$user_id."' AND status=0 ORDER BY id DESC")->num_rows();

        //get again

        $getNotification = $this->db->query("SELECT id,notification FROM tbl_notifications WHERE user_two='".$user_id."' AND status=0 ORDER BY id DESC");



        $result = $getNotification->result();

        $CountTotalnotification = $getNotification->num_rows();

        $this->response(array('success'=>'true','record'=>$result,'notificationCount'=>$CountTotalnotification,'message'=>'Notification removed successfully'),200);



        //$this->response(array('success'=>'true','message'=>'Notification removed successfully'),200);



    }



    function clearAllNotifications_post()

    {

        $user_id = $this->input->post('user_id');

        if($user_id=="" && $user_id==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);

        }



        $this->db->where('user_two',$user_id);

        $this->db->update('tbl_notifications',array('status'=>1));

        //get again



        $getNotification = $this->db->query("SELECT id,notification FROM tbl_notifications WHERE user_two='".$user_id."' AND status=0 ORDER BY id DESC");



        $result = $getNotification->result();

        $CountTotalnotification = $getNotification->num_rows();





        $this->response(array('success'=>'true','record'=>$result,'notificationCount'=>$CountTotalnotification,'message'=>'Notifications removed successfully'),200);



    }

    function dynamic_calender_date_events_post()

    {

        $user_id = $this->input->post('user_id');

        $tab_number = $this->input->post('tab_number');

        if($user_id=="" && $user_id==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);

        }

        if($tab_number=="" && $tab_number==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide  Tab Number'),200);

        }

        $data = array();

        $dataArray = array();



        $resultArray = $this->db->query("SELECT id,news_date FROM tbl_admin_stock_news WHERE type='".$tab_number."'")->result();

        foreach($resultArray as $arr)

        {

            $data['id'] = $arr->id;

            $explode = explode('-', $arr->news_date);

            $year = $explode[0];

            $month = $explode[1];

            $day = $explode[2];

            $m = 0;

            $d = 0;

            if($month<10)

            {

                $m = substr($month, 1);

            }

            else

            {

                $m = $month;

            }



            if($day<10)

            {

                $d = substr($day, 1);

            }

            else

            {

                $d = $day;

            }

            //echo $d."--";



            $data['news_date'] = $year."-".$m."-".$d;

            //echo $year."-".$m."-".$d."<br>";

            array_push($dataArray, $data);

        }



        $this->response(array('success'=>'true','record'=>$dataArray),200);



    }

    function show_news_on_events_post()

    {

        $user_id = $this->input->post('user_id');

        $slectedDate = $this->input->post('slected_date');

        $tab_number = $this->input->post('tab_number');

        if($user_id=="" && $user_id==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);

        }

        if($slectedDate=="" && $slectedDate==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide  Selected Date'),200);

        }

        if($tab_number=="" && $tab_number==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide  Tab Number'),200);

        }

        $resultArray = $this->db->query("SELECT * FROM tbl_admin_stock_news WHERE news_date='".$slectedDate."' AND type='".$tab_number."'")->result();

        $this->response(array('success'=>'true','record'=>$resultArray),200);

    }

    function advisor_dashboard_graph_data_post()
    {
        $user_id = $this->input->post('user_id');
        if($user_id=="" && $user_id==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
        }
        //graph  data calcultaions
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

        $selectQ='';
        for ($i=12; $i >0; $i--) 
        {
            $dateSelect = date("Y-m", strtotime( date( 'Y-m-01' )." -$i months"));
            if($i==12)
            {
                $selectQ.= "SELECT "."'$dateSelect'"." AS MONTH ";
            }
            else 
            {
                $selectQ.="UNION SELECT "."'$dateSelect'"." AS MONTH ";
            }
        }
        $getGraphDataResult = $this->db->query("SELECT COUNT(u.id) AS total, m.month,SUM(u.price_in*u.final_volume) AS totalPriceIn,SUM(u.price_out*u.final_volume) AS totalPriceOut,SUM(u.price_out*u.final_volume-u.price_in*u.final_volume) AS monthlyLossProfit FROM ($selectQ) AS m LEFT JOIN tbl_users_trading_diary u ON m.month = DATE_FORMAT(u.created_on, '%Y-%m')  GROUP BY m.month ORDER BY m.month")->result();

        $subTotalProfit = 0;
        $overAllProfit = 0;
        $overAllLoss = 0;
        foreach($getGraphDataResult as $subtotal)
        {
            if($subtotal->monthlyLossProfit>0)
            {
                $overAllProfit+=$subtotal->monthlyLossProfit;
            }
            if($subtotal->monthlyLossProfit<0)
            {
                $overAllLoss+=$subtotal->monthlyLossProfit;
            }
            $subTotalProfit+=($subtotal->totalPriceOut-$subtotal->totalPriceIn);
        }

        $labelValue = '';
        $colorValue = '';
        $grapghValue = '';
        $setProfit = 0;
        $calprofitpercent = 0;
        $resultArray = array();
        $dataArray = array();
        foreach($getGraphDataResult as $label)
        {

            //label calculation
            $explodemonthYear = explode('-', $label->month);
            $set=$monthYearArr[$explodemonthYear[1]];
            $dataArray['label'] = $set;
            //Color calculation
            $monthWiseProfitLoss = $label->monthlyLossProfit;
            if($label->monthlyLossProfit=="")
            {
                $monthWiseProfitLoss = 0;
            }
            if($monthWiseProfitLoss>0)
            {
                $setColor = '#4097c8';
                $calprofitpercent = ($monthWiseProfitLoss/$overAllProfit)*100;
                $calprofitpercent = number_format($calprofitpercent,2,".","");
            }
            else if($monthWiseProfitLoss<0)
            {
                $setColor = '#fe8032';
                $calprofitpercent = ($monthWiseProfitLoss/$overAllLoss)*100;
                $calprofitpercent = number_format($calprofitpercent,2,".","");
            }
            else
            {
                $setColor = '#4097c8';
                $calprofitpercent = number_format(0,2,".","");
            }
            $dataArray['color'] = $setColor;
            $dataArray['value'] = $calprofitpercent;
            array_push($resultArray, $dataArray);

        }
        $newsData = $this->db->query("SELECT id,news_title,news_content,image,created_on FROM tbl_admin_live_news WHERE section=1 ORDER BY id DESC LIMIT 5")->result();
        //$topFiveInvestments = $this->db->query("SELECT investments_id,fund_name FROM tbl_admin_investments ORDER BY fund_name ASC LIMIT 5")->result();
        $topFiveInvestments = $this->db->query("SELECT a.id AS fNDID,a.referenceLink,a.fundID,b.* FROM tbl_topFiveInvestmentFunds a INNER JOIN tbl_admin_investments b ON a.fundID=b.investments_id ORDER BY b.fund_name ASC LIMIT 5")->result();
        $this->response(array('success'=>'true','result'=>$resultArray,'topFiveInvestments'=>$topFiveInvestments,'newsData'=>$newsData),200);

    }

    function advisorReviewRating_post()
    {
        $user_id = $this->input->post('user_id');
        $client_id = $this->input->post('client_id');
        $comment = $this->input->post('comment');
        $rating = $this->input->post('rating');
        $dateTime = date('Y-m-d H:i:s');
        if($user_id=="" && $user_id==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
        }
        if($client_id=="" && $client_id==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide  Client Id'),200);
        }
        if($comment=="" && $comment==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Write in comment'),200);
        }
        if($rating=="" && $rating==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide  rating'),200);
        }

        $checkExistingRating = $this->db->query("SELECT * FROM tbl_advisor_rating_reviews WHERE user_id='".$user_id."' AND client_id='".$client_id."'");
        if($checkExistingRating->num_rows()==0)
        {
            $insertdata = array(
                            'user_id'=>$user_id,
                            'client_id'=>$client_id,
                            'rating'=>$rating,
                            'review'=>$comment,
                            'created_on'=>$dateTime,
                            'updated_on'=>$dateTime,
                            );
            $this->db->insert('tbl_advisor_rating_reviews',$insertdata);
        }
        else
        {
            $updatedata = array(
                            'rating'=>$rating,
                            'review'=>$comment,
                            'updated_on'=>$dateTime,
                            );
            $this->db->where('user_id',$user_id);
            $this->db->where('client_id',$client_id);
            $this->db->update('tbl_advisor_rating_reviews',$updatedata);
        }
        $this->response(array('success'=>'true','message'=>'Thank you for your rating'),200);

    }

    

}









