<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Dashboard extends CI_Controller 

{
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('common','dashboards'));
	}

	function userNotification()

	{

		$plan_id = $this->session->userdata('plan_id');

		$user_id = $this->session->userdata('user_id');

		$subscription_date = $this->db->query("SELECT updated_on FROM tbl_user_subscription_plan WHERE user_id='".$user_id."'")->row();

		$subscription_date = @$subscription_date->updated_on;

		//echo $subscription_date;die;

		$dateTime = date('Y-m-d H:i:s');

		/*

			Plan Description and plan Type 

			notification Type 1



		*/

		$notification = "";

		if($plan_id==4)

		{

			$notification = "Hooray You are using all feature of Five Percent. You can do anything smoothly";

		}

		if($plan_id==3)

		{

			$notification = "Please take all feature plan to access everything with fivepercent";

		}

		if($plan_id==2)

		{

			$notification = "Please take all feature plan to access everything with fivepercent";

		}

		if($plan_id==1 OR $plan_id==0)

		{

			$notification = "You are using demo account or free plan. Please renew your plan to access everything with fivepercent";

		}

		$insertdataNotification = array(

										'user_two'=>$user_id,

										'type'=>1,

										'notification'=>$notification,

										'created_on'=>$dateTime,

										);

		$check_existing_notification = $this->db->query("SELECT * FROM tbl_notifications WHERE user_two='".$user_id."' AND type=1");

		if($check_existing_notification->num_rows()==0)

		{

			$this->db->insert('tbl_notifications',$insertdataNotification);

		}

		/*

			Plan Going To expire 

			notification Type 2



		*/

		//$plan_id=0;

		if($plan_id==0 AND (strtotime($subscription_date) < strtotime('-25 days')))

		{

			$notification = "You are using demo account. Your account is going to deactive winthin 2 or 3 days";

			$insertdataNotification = array(

										'user_two'=>$user_id,

										'type'=>2,

										'notification'=>$notification,

										'created_on'=>$dateTime,

										);

			$check_existing_notification = $this->db->query("SELECT * FROM tbl_notifications WHERE user_two='".$user_id."' AND type=2");

			if($check_existing_notification->num_rows()==0)

			{

				$this->db->insert('tbl_notifications',$insertdataNotification);

			}

		}

		//echo strtotime('-1 year').' - '.strtotime($subscription_date);die;

		if($plan_id>0 AND (strtotime($subscription_date) < strtotime('-355 days')))

		{

			$notification = "Your account is going to deactive winthin 10 or 15 days. Please upgrade subscription plan to access all the fivepercent feature";

			//echo $notification;die;

			$insertdataNotification = array(

										'user_two'=>$user_id,

										'type'=>2,

										'notification'=>$notification,

										'created_on'=>$dateTime,

										);

			$check_existing_notification = $this->db->query("SELECT * FROM tbl_notifications WHERE user_two='".$user_id."' AND type=2");

			if($check_existing_notification->num_rows()==0)

			{

				$this->db->insert('tbl_notifications',$insertdataNotification);

			}

		}

	}

	function advisorNotification()

	{

		$plan_id = $this->session->userdata('plan_id');

		$user_id = $this->session->userdata('user_id');

		$subscription_date = $this->db->query("SELECT updated_on FROM tbl_user_subscription_plan WHERE user_id='".$user_id."'")->row();

		$subscription_date = @$subscription_date->updated_on;

		//echo $subscription_date;die;

		$dateTime = date('Y-m-d H:i:s');

		/*

			Plan Description and plan Type 

			notification Type 1



		*/

		$notification = "";

		if($plan_id==6)

		{

			$notification = "Hooray You are using all feature of Five Percent. You can do anything smoothly";

		}

		if($plan_id==5)

		{

			$notification = "You are using basic plan. Please take Premium plan to access everything with fivepercent";

		}

		$insertdataNotification = array(

										'user_two'=>$user_id,

										'type'=>1,

										'notification'=>$notification,

										'created_on'=>$dateTime,

										);

		$check_existing_notification = $this->db->query("SELECT * FROM tbl_notifications WHERE user_two='".$user_id."' AND type=1");

		if($check_existing_notification->num_rows()==0)

		{

			$this->db->insert('tbl_notifications',$insertdataNotification);

		}

		/*

			Plan Going To expire 

			notification Type 2



		*/



		//echo strtotime('-1 year').' - '.strtotime($subscription_date);die;

		if((strtotime($subscription_date) < strtotime('-355 days')))

		{

			$notification = "Your account is going to deactive winthin 10 or 15 days. Please upgrade subscription plan to access all the fivepercent feature";

			//echo $notification;die;

			$insertdataNotification = array(

										'user_two'=>$user_id,

										'type'=>2,

										'notification'=>$notification,

										'created_on'=>$dateTime,

										);

			$check_existing_notification = $this->db->query("SELECT * FROM tbl_notifications WHERE user_two='".$user_id."' AND type=2");

			if($check_existing_notification->num_rows()==0)

			{

				$this->db->insert('tbl_notifications',$insertdataNotification);

			}

		}

	}

	function index()
	{
	    //error_reporting(0);
		$this->common->check_user_login();
		//echo "<pre>";print_r($this->session->userdata());die;
		$data = array();
		$data['title'] = 'User Dashboard | Five Percent';
		$data['sub_title'] = 'Dashboard';
		$user_type = $this->session->userdata('user_type');
		$status = $this->session->userdata('status');
		$user_id = $this->session->userdata('user_id');
		if($user_type==1)
		{
			$this->advisorNotification();
			if($status==1)
			{
				$data['title'] = 'Advisor Dashboard | Five Percent';
				$data['sub_title'] = 'Dashboard';

				$data['client_lists'] = $this->db->query("SELECT a.user_id,b.id,b.onlineStatus,c.first_name,c.last_name,c.profile_image FROM tbl_user_adviser_referral_code_connectivity a INNER JOIN tbl_users b ON a.user_id=b.id INNER JOIN tbl_user_personel_info c ON b.id=c.user_id WHERE a.advisor_id='".$user_id."'")->result();
				$usersID = 0;
				foreach($data['client_lists'] as $userlist)
				{
					$usersID.=$userlist->id.',';
				}
				$usersID =  rtrim($usersID,',');
				

				$getAgeData = $this->db->query("SELECT date_format(tn.created_on,'%m') as Month, count(id) as Application, date_format(tn.created_on,'%Y') as Year,SUM(price_in) AS totalPriceIn,SUM(price_out) AS totalPriceOut FROM tbl_users_trading_diary tn GROUP BY Year,Month ORDER by Year DESC,Month DESC LIMIT 12")->result();

				//graph  data calcultaions
				$getActivityRecord = $this->dashboards->getAdvisorClientActivity($user_id,$usersID);
				//echo "<pre>";print_r($getActivityRecord);die;
				$subTotalProfit = 0;
				$overAllProfit = 0;
				$overAllLoss = 0;
				foreach($getActivityRecord as $subtotal)
				{
					if($subtotal['monthlyLossProfit']>0)
					{
						$overAllProfit+=$subtotal['monthlyLossProfit'];
					}
					if($subtotal['monthlyLossProfit']<0)
					{
						$overAllLoss+=$subtotal['monthlyLossProfit'];
					}
					$subTotalProfit+=($monthlyLossProfit);
				}
				//echo $overAllProfit."  ".$overAllLoss;die;
				$labelValue = '';
				$colorValue = '';
				$grapghValue = '';
				$setProfit = 0;
				$calprofitpercent = 0;
				$monthYearArr = $this->dashboards->getMonthYearArr();
				//echo "<pre>";print_r($getActivityRecord);die();
				foreach($getActivityRecord as $label)
				{
					//label calculation
					$explodemonthYear = explode('-', $label['month']);
					$set=$monthYearArr[$explodemonthYear[1]];
					$year = $explodemonthYear[0];
					$labelValue.="'$set-$year'".",";
					//Color calculation
					$monthWiseProfitLoss = $label['monthlyLossProfit'];
					if($label['monthlyLossProfit']=="")
					{
						$monthWiseProfitLoss = 0;
					}
					if($monthWiseProfitLoss>0)
					{
						$setColor = '#4097c8';
						//$calprofitpercent = ($monthWiseProfitLoss/$overAllProfit)*100;
						$calprofitpercent = $monthWiseProfitLoss;
						$calprofitpercent = number_format($calprofitpercent,2,".","");
					}
					else if($monthWiseProfitLoss<0)
					{
						$setColor = '#fe8032';
						//$calprofitpercent = ($monthWiseProfitLoss/$overAllLoss)*100;
						$calprofitpercent = trim($monthWiseProfitLoss,'-');
						$calprofitpercent = number_format($calprofitpercent,2,".","");
					}
					else
					{
						$setColor = '#4097c8';
						$calprofitpercent = number_format(0,2,".","");
					}
					$colorValue.= "'$setColor'".",";
					$grapghValue.=$calprofitpercent.",";
				}
				$data['labeldata'] =  $labelValue;
				$data['colordata'] = $colorValue;
				$data['grapghValue'] = $grapghValue;
				$todayDate = date('Y-m-d');
				//echo "<pre>";print_r($data);die;
				$data['todaysScheduledAppointments'] = $this->db->query("SELECT a.schedule_date,b.id,c.first_name,c.last_name,c.profile_image,d.start_time,d.end_time FROM tbl_user_advisor_schedule_appointment a INNER JOIN tbl_users b ON  a.user_id=b.id INNER JOIN tbl_user_personel_info c ON b.id=c.user_id INNER JOIN tbl_admin_time_slot d ON a.slot_id=d.id WHERE a.advisor_id='".$user_id."' AND a.schedule_date='".$todayDate."' ORDER BY d.start_time ASC")->result();

				$data['live_news'] = $this->db->query("SELECT * FROM tbl_admin_live_news WHERE section=1 ORDER BY id DESC LIMIT 5")->result();
				//$data['topFiveInvestments'] = $this->db->query("SELECT * FROM tbl_admin_investments ORDER BY fund_name ASC LIMIT 5")->result();
				$data['topFiveInvestments'] = $this->db->query("SELECT a.id AS fNDID,a.referenceLink,a.fundID,b.* FROM tbl_topFiveInvestmentFunds a INNER JOIN tbl_admin_investments b ON a.fundID=b.investments_id ORDER BY b.fund_name ASC LIMIT 5")->result();
				//echo "<pre>";print_r($data['topFiveInvestments']);die;
				$this->load->view('page/advisor/dashboard',$data);

			}
			else
			{
				redirect(base_url('users/profile/'));
			}			

		}
		else
		{
			if(isset($_GET['get']))
			{
				$get = base64_decode($_GET['get']);
				$this->session->set_userdata('get',$get);
			}
			$this->userNotification();
			$data['live_news'] = $this->db->query("SELECT * FROM tbl_admin_live_news WHERE section=0 ORDER BY id DESC LIMIT 5")->result();	
	        $data['companies'] = $this->dashboards->topTenCompanies($user_id);
	        //echo "<pre>";print_r($data['companies']);die;
	        $data['strategies'] = $this->dashboards->getUserTopTenStrategies($user_id);
	        //Top Ten Investment
	        $data['topTenInvestment'] = $this->db->query("SELECT a.investments_id,SUM(a.amount) AS TAmount,b.fund_name FROM tbl_user_investments_management a INNER JOIN tbl_admin_investments b ON a.investments_id=b.investments_id GROUP BY a.investments_id")->result();

			$getFinancialTargetGoalRecord = $this->dashboards->getUserFinancialTargetGoal($user_id);
			//echo "<pre>";print_r($getFinancialTargetGoalRecord); die;
			$maxAxix = 0;
			$profitTarget = $getFinancialTargetGoalRecord['profitTarget'];
			if($profitTarget>max($getFinancialTargetGoalRecord['profitLoss']))
			{
				$maxAxix = $profitTarget;
			}
			else
			{
				$maxAxix = max($getFinancialTargetGoalRecord['profitLoss']);
			}
			$data['goalPercentage'] = $getFinancialTargetGoalRecord['goalPercentage'];
			$data['minAxix'] = min($getFinancialTargetGoalRecord['profitLoss'])-1;
			$data['maxAxix'] = $maxAxix+1;
			//echo $data['minAxix']."  ".$data['maxAxix'];die;

	        $data['allDateArr'] = implode(',', ($getFinancialTargetGoalRecord['allDateArr']));
	        $data['profitLoss'] = implode(',', ($getFinancialTargetGoalRecord['profitLoss']));
	        $data['profitTarget'] = $getFinancialTargetGoalRecord['profitTarget'];
			$this->load->view('page/dashboard/dashboard',$data);
		}
	}
	function sortTopTenCompanypercentage($a, $b)
    {
        if ($a["profit_percentage"] == $b["profit_percentage"]) 
        {  
            return 0;
        }
        return ($a["profit_percentage"] > $b["profit_percentage"]) ? -1 : 1; 
    }
	function news_details($id)

	{

		$this->common->check_user_login();
		//echo "<pre>";print_r($this->session->userdata());die;
		$data = array();
		$user_type = $this->session->userdata('user_type');
		$data['title'] = 'News Details | Five Percent';

		$user_id = $this->session->userdata('user_id');

		$news_id = base64_decode($id);

		$data['news_detail'] = $this->db->query("SELECT id,news_title,news_content,image,created_on FROM tbl_admin_live_news WHERE id='".$news_id."'")->row();

		$data['live_news'] = $this->db->query("SELECT * FROM tbl_admin_live_news WHERE section='".$user_type."' ORDER BY id DESC LIMIT 10")->result();

		//echo "<pre>";print_r($data['news_detail']);die;

		$this->load->view('page/dashboard/news_details',$data);



	}

	function news_details_mobile()

	{

		$data = array();

		$data['title'] = 'News Details | Five Percent';

		$id = $this->input->get('id');

		$data['news_detail'] = $this->db->query("SELECT id,news_title,news_content,image,created_on FROM tbl_admin_live_news WHERE id='".$id."'")->row();

		$this->load->view('page/dashboard/news_details_mobile',$data);



	}

	function stock_news_details_mobile()
	{
		$data = array();
		$data['title'] = 'News Details | Five Percent';
		$id = $this->input->get('id');
		$data['news_detail'] = $this->db->query("SELECT id,news_title,news_content,image,news_date FROM tbl_admin_stock_news WHERE id='".$id."'")->row();
		//echo "<pre>";print_r($data['news_detail']);die;
		$this->load->view('page/dashboard/stock_news_details_mobile',$data);



	}

	function user_logout()

	{
		$user_id = $this->session->userdata('user_id');
		$this->db->where('id',$user_id);
		$this->db->update('tbl_users',array('onlineStatus'=>0));

		$this->session->unset_userdata('user_id');

		$this->session->unset_userdata('username');

		$this->session->unset_userdata('email');

		redirect(base_url('signin'));

	}

	function edit_profile()

	{

		$this->common->check_user_login();

		$data = array();

		$data['title'] = 'Edit Profile | Five Percent';

		$user_id = $this->session->userdata('user_id');

		$data['user_detail'] = $this->db->query("SELECT a.id,a.dob,a.email,a.user_type,b.first_name,b.last_name,b.phone_number,b.martial_status,b.no_of_child,b.job_type,b.country,b.app_usage,b.talk_to_advisor,b.profile_image FROM tbl_users a INNER JOIN tbl_user_personel_info b ON a.id=b.user_id WHERE a.id='".$user_id."'")->row();

		//echo "<pre>"; print_r($data['user_detail']);die;

		$data['jobtypes'] = $this->db->query("SELECT * FROM tbl_job_type")->result();

		$data['app_ussages'] = $this->db->query("SELECT * FROM tbl_app_ussage")->result();

		$data['countries'] = $this->db->query("SELECT id,name FROM countries ORDER BY name ASC")->result();

		$currentdate = date('Y-m-d H:i:s');



		if($this->input->server('REQUEST_METHOD')=='POST')

		{

			$fname = $this->input->post('fname');

			$lname = $this->input->post('lname');

			$date_of_birth = $this->input->post('date_of_birth');

			$email = $this->input->post('email');

			$maritalstatus = $this->input->post('maritalstatus');

			$noofchild = $this->input->post('noofchild');

			$job = $this->input->post('job');

			$country = $this->input->post('country');

			$appusage = $this->input->post('appusage');

			$talktoadviser = $this->input->post('talktoadviser');

			$image2 = "";

			if($_FILES['proimage']['size']>0)

		     {

		      	$temp = explode('.', basename($_FILES['proimage']['name']));

		        $type2 = $_FILES["proimage"]["type"];

		        $new_photoid2 = explode('.',$_FILES["proimage"]["name"]); 

		        $image2 = rand(100,9999999).date('d_m_yhmi').'.' . end($new_photoid2); 

		        move_uploaded_file($_FILES["proimage"]["tmp_name"],"uploads/user-profile/".$image2);          

		      }

		      else

		      {

		      	$image2 = $this->input->post('oldimage');

		      }

				$this->db->where('id',$user_id);

				$this->db->update('tbl_users',array('dob'=>$date_of_birth));



				$insertdata = array(

									'first_name'=>$fname,

									'last_name'=>$lname,

									'martial_status'=>$maritalstatus,

									'no_of_child'=>$noofchild,

									'job_type'=>$job,

									'country'=>$country,

									'app_usage'=>$appusage,

									'talk_to_advisor'=>$talktoadviser,

									'profile_image'=>$image2,

									'created_on'=>$currentdate,

									'updated_on'=>$currentdate,

									);

				$this->db->where('user_id',$user_id);

				$this->db->update('tbl_user_personel_info',$insertdata);

				$this->session->set_userdata('pro_image',$image2);

				$this->session->set_flashdata('success','Profile updated successfully');

				redirect(base_url('users/dashboard/edit_profile'));

			

		}





		$this->load->view('page/profile/edit_profile',$data);

	}

	function change_password()

	{

		$this->common->check_user_login();

		$data = array();

		$data['title'] = 'Change Password | Five Percent';

		$data['sub_title'] = 'Change Password';

		$user_id = $this->session->userdata('user_id');



		if($this->input->server('REQUEST_METHOD')=='POST')

		{

			$this->form_validation->set_rules('currentpass', 'Current Password', 'required',array(

			'required'=>'Please Enter %s',					

			));

			$this->form_validation->set_rules('newpass', 'New Password', 'required',array(

			'required'=>'Please Enter %s',					

			));

			$this->form_validation->set_rules('confirmpass', 'Confirm Password', 'required|matches[newpass]',array(

				'required'=>'Please Enter %s',	

				'matches'=>'Password does not matches %s'				

			));

			if($this->form_validation->run() == FALSE)

            {

                $this->load->view('page/profile/change_password',$data);

            }

            else

            {

            	$currentpass = $this->input->post('currentpass');

            	$currentpass = md5($currentpass);

            	$checkoldpass = $this->db->query("SELECT * FROM  tbl_users WHERE password='".$currentpass."' AND id='".$user_id."'");

            	if($checkoldpass->num_rows()>0)

            	{

            		$this->db->where('id',$user_id);

            		$this->db->where('password',$currentpass);

            		$this->db->update('tbl_users',array('password'=>md5($this->input->post('newpass'))));



            		$this->session->set_flashdata('success','Password Change successfully');

            		redirect(base_url('users/dashboard/change_password'));

            	} 

            	else

	            {

	            	$this->session->set_flashdata('success','Incorrect Current Password');

	            	redirect(base_url('users/dashboard/change_password'));

	            }             

            }



		}

		else

		{

			$this->load->view('page/profile/change_password',$data);

		}		

	}

	function calculateage($dob)

	{

		$bday = new DateTime($dob);

		$today = new Datetime(date('m/d/y'));

		$diff = $today->diff($bday);

		return $diff->y;

	}

	function client_profile()

	{

		$this->common->check_user_login();

		$data = array();

		$data['title'] = 'client profile | Five Percent';

		$user_id = $this->session->userdata('user_id');



		$this->db->select('tu.email,tu.status,pi.first_name,tu.dob,pi.last_name,pi.date_of_birth,pi.job_type,pi.profile_image,pi.martial_status,pi.no_of_child');

		$this->db->from('tbl_users tu');

		$this->db->join('tbl_user_personel_info pi', 'tu.id = pi.user_id');

		$this->db->where('tu.id',$user_id);

		$result = $this->db->get()->row();

		$data['user_details'] = $result;

		$totalNumberOfQuestion = $this->db->query("SELECT * FROM tbl_questions")->num_rows();

		$numberOfAnsweredQuestion = $checkQuestionOptions = $this->db->query("SELECT a.*,b.*,COUNT(b.question_id) AS qnc FROM user_question_answer a INNER JOIN user_question_options b ON a.question_id = b.question_id  WHERE a.user_id='".$user_id."' GROUP BY b.question_id")->num_rows();



		$agePercentage = 0;

		$maritalStatusPercentage = 0;

		$jobTypePercentage = 0;

		$knowledgePercenrage = 0;

		//Age calculation

		$age = $this->calculateage($result->dob);

		$getAgeData = $this->db->query("SELECT * FROM tbl_admin_age_percent")->result();



		

		foreach($getAgeData as $getAge)

		{

			if($age>=$getAge->start_point && $age<=$getAge->end_point)

			{

				$agePercentage = $getAge->percent_value;

			}

		}

		

		

		//Marital status calculation

		$martial_status = $result->martial_status;

		$noOfChild = $result->no_of_child;

		$getMaritalStatusData = $this->db->query("SELECT * FROM tbl_admin_maritial_status_percent ")->result();



		$lrg=0;

		$found=0;

		foreach($getMaritalStatusData as $MaritalStatus)

		{

			$maritalStatusPercentage=0;

	



			if(strtolower($martial_status)=='single')

			{

				$maritalStatusPercentage = $MaritalStatus->percent_value;

				break;

			}

			else

			{

				if($MaritalStatus->no_of_child==$noOfChild)

				{

					$maritalStatusPercentage = $MaritalStatus->percent_value;

					$found=1;

					break;

					

				}



				if($lrg<$MaritalStatus->no_of_child)

				{

					$lrg=$MaritalStatus->no_of_child;

				}

			}			

		}

		if($found==0)

		{

			foreach($getMaritalStatusData as $MaritalStatus)

			{

				if(trim($MaritalStatus->maritail_status)==trim($martial_status) && $lrg==$MaritalStatus->no_of_child)

				{

					$maritalStatusPercentage = $MaritalStatus->percent_value;

					break;

				}

			}



		}

		//echo "<pre>";print_r($maritalStatusPercentage);die();

		//Job Type calculation

		$job_type = $result->job_type;

		$getJobTypeData = $this->db->query("SELECT * FROM tbl_admin_job_type_percent ")->result();

		foreach($getJobTypeData as $JobType)

		{

			if($job_type==$JobType->job_type) //employee

			{

				$jobTypePercentage = $JobType->percent_value;

			}

		}

		

		//Knowledge calculation

		$questionPercentage = ($numberOfAnsweredQuestion/$totalNumberOfQuestion)*100;



		$getQuestionKnowledgeData = $this->db->query("SELECT * FROM tbl_admin_knowledge_percent")->result();

		foreach($getQuestionKnowledgeData as $knowldge)

		{

			if($questionPercentage>=$knowldge->start_point && $questionPercentage<=$knowldge->end_point)

			{

				$knowledgePercenrage = $knowldge->percent_value;

			}

		}

		//echo $knowledgePercenrage;die;



		$risk_percent = $agePercentage+$maritalStatusPercentage+$jobTypePercentage+$knowledgePercenrage;



		$RF = 0;

		$RV = 0;

		$option = 0;

		if($risk_percent>70 && $risk_percent<=80)

		{			

			$RF = 20;

			$RV = 60;

			$option = 20;

		}

		if($risk_percent>60 && $risk_percent<=70)

		{

			$RF = 30;

			$RV = 60;			

			$option = 10;

		}

		if($risk_percent>50 && $risk_percent<=60)

		{

			$RF = 45;

			$RV = 50;			

			$option = 5;

		}

		if($risk_percent>40 && $risk_percent<=50)

		{

			$RF = 54;

			$RV = 43;			

			$option = 3;

		}

		if($risk_percent>30 && $risk_percent<=40)

		{

			$RF = 60;

			$RV = 39;

			$option = 1;

		}

		if($risk_percent>30 && $risk_percent<=40)

		{

			$RF = 70;

			$RV = 30;

		}

		if($risk_percent>20 && $risk_percent<=30)

		{

			$RF = 80;

			$RV = 20;

		}

		if($risk_percent>10 && $risk_percent<=20)

		{

			$RF = 90;

			$RV = 10;

		}



		$all_money = 0;

		$money_use_percentage = 100;

		$get_exitsing_rf_rv_option_value = $this->db->query("SELECT * FROM tbl_user_rf_rv_options_values WHERE user_id='".$user_id."'");

		if($get_exitsing_rf_rv_option_value->num_rows()>0)

		{

			$rf_rv_row = $get_exitsing_rf_rv_option_value->row();

			$RF = $rf_rv_row->rf;

			$RV = $rf_rv_row->rv;

			$option = $rf_rv_row->options;



			$all_money = $rf_rv_row->all_money;

			$money_use_percentage = $rf_rv_row->money_use_percentage;

		}





		$sql1="SELECT count(m.user_id) from tbl_user_stock_management m where m.stock_id=a.id and m.user_id='".$user_id."'";

		$data['stock_rfs'] = $this->db->query("SELECT a.id,a.stock_name,($sql1) as exist  FROM tbl_admin_stock a  WHERE a.stock_type=1 ORDER BY a.id  LIMIT 4")->result();

		$data['stock_rvs'] = $this->db->query("SELECT a.id,a.stock_name,($sql1) as exist  FROM tbl_admin_stock a  WHERE a.stock_type=2 ORDER BY a.id  LIMIT 4")->result();



		$data['stock_options'] = $this->db->query("SELECT a.id,a.stock_name,($sql1) as exist  FROM tbl_admin_stock a  WHERE a.stock_type=2 ORDER BY a.id DESC LIMIT 4")->result();

		//echo "<pre>"; print_r($data['stock_options']);die;



		$data['RF'] = $RF;

		$data['RV'] = $RV;

		$data['OPTION'] = $option;



		$data['all_money'] = $all_money;

		$data['money_use_percentage'] = $money_use_percentage;

		

		$data['risk_percent'] = $risk_percent;

		/**************************************************  CLIENT BALANCE SHEET CALCULATION ************************/

		$income_recordarray = array();

		$income_data = array();



		$expense_recordarray = array();

		$expense_data = array();



		$assets_recordarray = array();

		$assets_data = array();



		$liability_recordarray = array();

		$liability_data = array();



		$total_monthly_income = 0;

		$total_monthly_expenses = 0;

		$total_monthly_cash = 0;

		$total_equity = 0;

		$total_assets = 0;

		$total_liabilities = 0;

		$check_balance_existing = $this->db->query("SELECT * FROM tbl_user_balance_sheet WHERE user_id='".$user_id."'");

		if($check_balance_existing->num_rows()<1)

		{

			$total_monthly_income = 25000;

			$total_monthly_expenses = 10000;

		}

		else

		{

			//Income calculations

			$income_array = $this->db->query("SELECT * FROM tbl_user_balance_sheet WHERE user_id='".$user_id."' AND type=1 ORDER BY value DESC")->result();

			foreach($income_array as $income)

			{

				$income_data['id'] = $income->id;

				$income_data['parameters'] = $income->parameters;

				$income_data['value'] = $income->value;

				$total_monthly_income+=$income->value;

				array_push($income_recordarray, $income_data);



			}

			//Expense calculations

			$expense_array = $this->db->query("SELECT * FROM tbl_user_balance_sheet WHERE user_id='".$user_id."' AND type=2  ORDER BY value DESC")->result();

			foreach($expense_array as $expense)

			{

				$expense_data['id'] = $expense->id;

				$expense_data['parameters'] = $expense->parameters;

				$expense_data['value'] = $expense->value;

				$total_monthly_expenses+=$expense->value;

				array_push($expense_recordarray, $expense_data);



			}

			//assets calculations

			$assets_array = $this->db->query("SELECT * FROM tbl_user_balance_sheet WHERE user_id='".$user_id."' AND type=3  ORDER BY value DESC")->result();

			foreach($assets_array as $assets)

			{

				$assets_data['id'] = $assets->id;

				$assets_data['parameters'] = $assets->parameters;

				$assets_data['value'] = $assets->value;

				$total_assets+=$assets->value;

				array_push($assets_recordarray, $assets_data);



			}



			//Liabilities calculations

			$liability_array = $this->db->query("SELECT * FROM tbl_user_balance_sheet WHERE user_id='".$user_id."' AND type=4  ORDER BY value DESC")->result();

			foreach($liability_array as $liability)

			{

				$liability_data['id'] = $liability->id;

				$liability_data['parameters'] = $liability->parameters;

				$liability_data['value'] = $liability->value;

				$total_liabilities+=$liability->value;

				array_push($liability_recordarray, $liability_data);



			}



		}

		//Income - Expense = Total Monthly cash

		$total_monthly_cash = $total_monthly_income-$total_monthly_expenses;

		$data['total_monthly_cash'] = $total_monthly_cash;

		//Total Assets - Total Liability = Total Equity

		$total_equity = $total_assets-$total_liabilities;

		$data['total_equity'] = $total_equity;



		$data['total_monthly_income'] = $total_monthly_income;



		$data['total_monthly_expenses'] = $total_monthly_expenses;

		$data['total_assets'] = $total_assets;

		$data['total_liabilities'] = $total_liabilities;



		$data['income_recordarray'] = $income_recordarray;

		$data['expense_recordarray'] = $expense_recordarray;

		$data['assets_recordarray'] = $assets_recordarray;

		$data['liability_recordarray'] = $liability_recordarray;



		$this->load->view('page/dashboard/client_profile',$data);

	}

	function add_balance_sheet_ajx()

	{

		$this->common->check_user_login();

		$user_id = $this->session->userdata('user_id');

		$currentdate = date('Y-m-d H:i:s');

		$balanceSheetType = $this->input->post('balanceSheetType');

		$parameter = $this->input->post('parameter');

		$amount = $this->input->post('amount');



		$insertdataArray = array(

								'user_id'=>$user_id,

								'type'=>$balanceSheetType,

								'parameters'=>$parameter,

								'value'=>$amount,

								'created_on'=>$currentdate,

							    );

		$this->db->insert('tbl_user_balance_sheet',$insertdataArray);

		echo 1;

	}

	function update_balance_sheet_ajx()

	{

		$this->common->check_user_login();

		$user_id = $this->session->userdata('user_id');

		$currentdate = date('Y-m-d H:i:s');

		$balanceSheetId = $this->input->post('balanceSheetId');

		$parameter = $this->input->post('parameter');

		$amount = $this->input->post('amount');



		$insertdataArray = array(

								'parameters'=>$parameter,

								'value'=>$amount,

								'updated_on'=>$currentdate,

							    );

		$this->db->where('user_id',$user_id);

		$this->db->where('id',$balanceSheetId);

		$this->db->update('tbl_user_balance_sheet',$insertdataArray);

		echo 1;



	}

	function delete_balance_sheet_ajx()

	{

		$this->common->check_user_login();

		$user_id = $this->session->userdata('user_id');

		$id = $this->input->post('id');

		$this->db->where('user_id',$user_id);

		$this->db->where('id',$id);

		$this->db->delete('tbl_user_balance_sheet');

		echo 1;



	}

	function update_user_stock_rf_rv_values_ajax()

	{



		$created_on = date('Y-m-d H:i:s');

		$user_id = $this->session->userdata('user_id');

		$rv_input = $this->input->post('rv_input');

		$rf_input = $this->input->post('rf_input');

		$option_input = $this->input->post('option_input');

		$all_moeny = $this->input->post('all_moeny');			

		$money_use_percentage = $this->input->post('money_use_percentage');

		if($all_moeny==0)

		{

			$money_use_percentage=100;

		}

		//$this->db->where('user_id',$user_id);

		//$this->db->delete('tbl_user_stock_management');

		if(isset($_POST['stock_id']))

		{

			for($i=0;$i<count($_POST['stock_id']);$i++)

			{

				$exp = explode('*', $_POST['stock_id'][$i]);

				$stock_id = $exp[0];

				$value = $exp[1];

				$s_type = $exp[2];				

				$check_existing = $this->db->query("SELECT * FROM tbl_user_stock_management WHERE user_id='".$user_id."' AND stock_id='".$stock_id."'");

				if($check_existing->num_rows()>0)

				{

					$updatedata = array(

									'user_id'=>$user_id,

									'stock_id'=>$stock_id,

									'value'=>$value,

									's_type'=>$s_type,

									'is_suggested'=>1,

									

									);

					$this->db->where('user_id',$user_id);

					$this->db->where('stock_id',$_POST['stock_id'][$i]);

					$this->db->update('tbl_user_stock_management',$updatedata);

				}

				else

				{

					$insertdata = array(

									'user_id'=>$user_id,

									'stock_id'=>$stock_id,

									'value'=>$value,

									's_type'=>$s_type,

									'is_suggested'=>1,

									'created_on'=>$created_on,

									);

					$this->db->insert('tbl_user_stock_management',$insertdata);

				}

				

			}

		}

		

		$check_existing_rf_rv_value = $this->db->query("SELECT * FROM tbl_user_rf_rv_options_values WHERE user_id='".$user_id."'");

		if($check_existing_rf_rv_value->num_rows()>0)

		{

			$UpdateRFRVOPTIONvalues = array(

										'user_id'=>$user_id,

										'rf'=>$rf_input,

										'rv'=>$rv_input,

										'options'=>$option_input,

										'all_money'=>$all_moeny,

										'money_use_percentage'=>$money_use_percentage,

										'created_on'=>$created_on,

										);

			$this->db->where('user_id',$user_id);

			$this->db->update('tbl_user_rf_rv_options_values',$UpdateRFRVOPTIONvalues);
			echo ($this->db->affected_rows() != 1) ? 0 : 1;

		}

		else

		{

			$InsertRFRVOPTIONvalues = array(

										'user_id'=>$user_id,

										'rf'=>$rf_input,

										'rv'=>$rv_input,

										'options'=>$option_input,

										'all_money'=>$all_moeny,

										'money_use_percentage'=>$money_use_percentage,

										'created_on'=>$created_on,

										);

			$this->db->insert('tbl_user_rf_rv_options_values',$InsertRFRVOPTIONvalues);
			echo 1;

		}

		//echo 2;

	}

	function remove_unselected_stocks_ajax()

	{

		$user_id = $this->session->userdata('user_id');

		$checkedid = $this->input->post('checkedid');

		$check_existing  = $this->db->get_where('tbl_user_stock_management',array('stock_id'=>$checkedid,'user_id'=>$user_id));

		if($check_existing->num_rows()>0)

		{

			$this->db->where('stock_id',$checkedid);

			$this->db->where('user_id',$user_id);

			$this->db->delete('tbl_user_stock_management');

			echo 1;

		}

		else

		{

			echo 2;

		}

		

	}

	function brokers()

	{

		$this->common->check_user_login();

		$data = array();

		$data['title'] = 'Brokers | Five Percent';

		$data['sub_title'] = 'BROKER';

		$user_id = $this->session->userdata('user_id');



		$data['brokers'] = $this->db->query("SELECT a.status,a.id,a.dob,a.email,a.user_type,b.first_name,b.last_name,b.phone_number,b.country,b.profile_image,b.phone_number,b.expYears,c.name AS country_name,(SELECT AVG(d.rating) FROM tbl_advisor_rating_reviews d WHERE a.id=d.client_id) AS rating FROM tbl_users a INNER JOIN tbl_user_personel_info b ON a.id=b.user_id  LEFT JOIN countries c ON b.country=c.id WHERE a.user_type=2 AND a.status=1")->result();

		//echo "<pre>";print_r($data['brokers']);die;



		$this->load->view('page/brokers/broker',$data);

	}

	function broker_details($broker_id)

	{

		$this->common->check_user_login();

		$data = array();

		$data['title'] = 'Brokers | Five Percent';

		$data['sub_title'] = 'BROKER';

		$user_id = $this->session->userdata('user_id');

		$broker_id = base64_decode($broker_id);



		$data['broker'] = $this->db->query("SELECT a.status,a.id,a.dob,a.email,a.user_type,b.first_name,b.last_name,b.phone_number,b.country,b.profile_image,b.phone_number,b.expYears,b.terms_conditions,c.name AS country_name FROM tbl_users a INNER JOIN tbl_user_personel_info b ON a.id=b.user_id  LEFT JOIN countries c ON b.country=c.id WHERE a.user_type=2 AND a.id='".$broker_id."'")->row();

		$data['accepted'] = $this->db->query("SELECT COUNT(id) AS accepted FROM tbl_users_brokers_management WHERE user_id='".$user_id."' AND broker_id='".$broker_id."'")->row();



		$count_document = "SELECT COUNT(b.id) FROM tbl_user_broker_document b WHERE b.broker_id='".$broker_id."' AND b.user_id='".$user_id."' AND b.document_id=a.id";



		$data['documents'] = $this->db->query("SELECT a.*,($count_document) AS doc_id FROM tbl_admin_broker_document a WHERE a.broker_id='".$broker_id."'")->result();



		$data['services'] = $this->db->query("SELECT * FROM tbl_admin_broker_services WHERE broker_id='".$broker_id."'")->result();

		//echo "<pre>";print_r($data['accepted']->accepted);die;

		$this->load->view('page/brokers/broker_details',$data);

	}

	function accept_broker_terms_condition()

	{

		$this->common->ajax_check_user_login();

		$user_id = $this->session->userdata('user_id');

		$broker_id = $this->input->post('broker_id');

		$date_time = date('Y-m-d H:i:s');

		$insertdata = array(

							'user_id'=>$user_id,

							'broker_id'=>$broker_id,

							'terms'=>1,

							'created_on'=>$date_time,

							'updated_on'=>$date_time,

							);



		$check_existing = $this->db->query("SELECT * FROM tbl_users_brokers_management WHERE user_id='".$user_id."' AND broker_id='".$broker_id."'");

		if($check_existing->num_rows()==0)

		{

			$this->db->insert('tbl_users_brokers_management',$insertdata);

		}

		

		echo 1;

	}

	function add_brokers_documents_ajax()

	{

		$this->common->ajax_check_user_login();

		$user_id = $this->session->userdata('user_id');

		$broker_id = $this->input->post('broker_id');

		$document_id = $this->input->post('document_id');

		$date_time = date('Y-m-d H:i:s');

		$broker_doc = "";

		if($_FILES['doc']['size']>0)

	     {

	      	$temp = explode('.', basename($_FILES['doc']['name']));



	        $type2 = $_FILES["doc"]["type"];

	        $new_photoid2 = explode('.',$_FILES["doc"]["name"]); 

	        $broker_doc = rand(100,9999999).date('d_m_yhmi').'.' . end($new_photoid2); 

	        move_uploaded_file($_FILES["doc"]["tmp_name"],"uploads/broker-doc/".$broker_doc);       



	      }

	      $insertdata = array(

	      					'document_id'=>$document_id,

	      					'user_id'=>$user_id,

	      					'broker_id'=>$broker_id,

	      					'doc_file'=>$broker_doc,

	      					'created_on'=>$date_time,

	      					'updated_on'=>$date_time,

	      					);

	      $this->db->insert('tbl_user_broker_document',$insertdata);

	      echo 1;

	}

	function update_brokers_documents_ajax()

	{

		$this->common->ajax_check_user_login();

		$user_id = $this->session->userdata('user_id');

		$broker_id = $this->input->post('broker_id');

		$document_id = $this->input->post('document_id');

		$date_time = date('Y-m-d H:i:s');

		$broker_doc = "";

		if($_FILES['doc']['size']>0)

	    {

	      	$temp = explode('.', basename($_FILES['doc']['name']));

	        $type2 = $_FILES["doc"]["type"];

	        $new_photoid2 = explode('.',$_FILES["doc"]["name"]); 

	        $broker_doc = rand(100,9999999).date('d_m_yhmi').'.' . end($new_photoid2); 

	        move_uploaded_file($_FILES["doc"]["tmp_name"],"uploads/broker-doc/".$broker_doc);    

	    }

	    $insertdata = array(

	      					'document_id'=>$document_id,

	      					'user_id'=>$user_id,

	      					'broker_id'=>$broker_id,

	      					'doc_file'=>$broker_doc,

	      					'updated_on'=>$date_time,

	      					);

	    $this->db->where('document_id',$document_id);

	    $this->db->where('user_id',$user_id);

	    $this->db->update('tbl_user_broker_document',$insertdata);

	    echo 1;

	}



	function advisor($id='')

	{

		$this->common->check_user_login();

		$this->load->library('pagination');

		$data = array();

		$data['title'] = 'Advisor | Five Percent';

		$data['sub_title'] = 'ADVISORS';

		$user_id = $this->session->userdata('user_id');

		$totaldata = $this->db->query("SELECT a.id,b.first_name,b.last_name,b.profile_image,c.name AS country FROM tbl_users a INNER JOIN tbl_user_personel_info b ON a.id=b.user_id LEFT JOIN countries c ON c.id=b.country where a.user_type=1")->num_rows();

		$config = array();

		$config["base_url"] = base_url() . "users/dashboard/advisor";

		

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


		if(isset($_GET['search']) && $_GET['search']!="")
		{
			$data['advisor_lists'] = $this->db->query("SELECT a.id,a.onlineStatus,b.first_name,b.last_name,b.profile_image,c.name AS country,(SELECT AVG(d.rating) FROM tbl_advisor_rating_reviews d WHERE a.id=d.client_id) AS rating,(SELECT count(e.advisor_id) FROM tbl_user_adviser_referral_code_connectivity e WHERE e.advisor_id=a.id) AS connectityCount,(SELECT count(e.advisor_id) FROM tbl_user_adviser_referral_code_connectivity e WHERE e.advisor_id=a.id AND e.user_id='".$user_id."') AS connectityCountUser FROM tbl_users a INNER JOIN tbl_user_personel_info b ON a.id=b.user_id LEFT JOIN countries c ON c.id=b.country where a.user_type=1 AND CONCAT(b.first_name, ' ', b.last_name) LIKE '%".trim($_GET['search'])."%' ORDER BY rating DESC ")->result();
		}
		else
		{
			$data['advisor_lists'] = $this->db->query("SELECT a.id,a.onlineStatus,b.first_name,b.last_name,b.profile_image,c.name AS country,(SELECT AVG(d.rating) FROM tbl_advisor_rating_reviews d WHERE a.id=d.client_id) AS rating,(SELECT count(e.advisor_id) FROM tbl_user_adviser_referral_code_connectivity e WHERE e.advisor_id=a.id) AS connectityCount,(SELECT count(e.advisor_id) FROM tbl_user_adviser_referral_code_connectivity e WHERE e.advisor_id=a.id AND e.user_id='".$user_id."') AS connectityCountUser FROM tbl_users a INNER JOIN tbl_user_personel_info b ON a.id=b.user_id LEFT JOIN countries c ON c.id=b.country where a.user_type=1 ORDER BY rating DESC LIMIT $start_from,$limit")->result();
		}

		$str_links = $this->pagination->create_links();

	    $data["links"] = explode('&nbsp;',$str_links );

		//echo "<pre>";print_r($data['advisor_lists']);die;

		$this->load->view('page/advisor/advisor',$data);

	}

	function warning_alert_idea()

	{

		$this->common->check_user_login();

		$data = array();

		$data['title'] = 'warning alert idea | Five Percent';

		$user_id = $this->session->userdata('user_id');



		$this->load->view('page/warning-alert-idea/warning_alert_idea',$data);

	}

	function advisor_details($adv_id)

	{

		$this->common->check_user_login();

		$user_id = $this->session->userdata('user_id');

		$data = array();

		$data['title'] = 'Advisor Profile | Five Percent';

		$data['sub_title'] = 'ADVISOR';

		$client_id = base64_decode(base64_decode($adv_id));



		$this->db->select('tu.email,tu.status,pi.first_name,tu.dob,pi.last_name,pi.date_of_birth,pi.job_type,pi.profile_image,pi.martial_status,pi.no_of_child,pi.expYears,pi.speciality,pi.phone_number,cy.name AS country_name,abm.aboutYourSelf');

		$this->db->from('tbl_users tu');

		$this->db->join('tbl_user_personel_info pi', 'tu.id = pi.user_id');

		$this->db->join('countries cy', 'pi.country = cy.id','LEFT');

		$this->db->join('tbl_user_about_me abm', 'tu.id = abm.user_id','LEFT');

		$this->db->where('tu.id',$client_id);

		$result = $this->db->get()->row();

		$data['user_details'] = $result;

		//echo "<pre>";print_r($data['user_details']);die;



		$data['messages'] = $this->db->query("SELECT * FROM tbl_chatting WHERE (user_two='".$client_id."' OR user_one='".$client_id."') AND (user_two='".$user_id."' OR user_one='".$user_id."')  ORDER BY created_on ASC")->result();

		//echo "<pre>";print_r($data['messages']);die;



		/*

			Advisor Description 

		*/
		/* Read Messages*/
		$this->db->where('user_one',$client_id);
		$this->db->where('user_two',$user_id);
		$this->db->update('tbl_chatting',array('status'=>1));
		/* Read Messages*/
		$data['description'] = $this->db->query("SELECT * FROM tbl_user_about_me WHERE user_id='".$client_id."'")->row();

		$data['work_experiences'] = $this->db->query("SELECT * FROM tbl_users_experience WHERE user_id='".$client_id."' ")->result();
		//

		$checkConnectivity = $this->db->query("SELECT * FROM tbl_user_adviser_referral_code_connectivity WHERE user_id='".$user_id."' AND advisor_id='".$client_id."'");
		if($checkConnectivity->num_rows()>0)
		{
			$row = $checkConnectivity->row();
			if($row->status==1)
			{
				$data['connectivity'] = 1; // connected and advisor accepted
			}
			else
			{
				$data['connectivity'] = 2; // request sent and advisor not  accepted
			}
			
		}
		else
		{
			$data['connectivity'] = 0; // send  request to advisor
		}
		$data['ratingReviews'] = $this->db->query("SELECT a.id,a.user_id,a.client_id,a.rating,a.review,b.updated_on,b.first_name,b.last_name,b.profile_image FROM tbl_advisor_rating_reviews a INNER JOIN tbl_user_personel_info b ON a.user_id=b.user_id WHERE a.client_id='".$client_id."' ORDER BY a.updated_on DESC")->result();

		$avgRating = $this->db->query("SELECT AVG(d.rating) AS avgRating FROM tbl_advisor_rating_reviews d WHERE d.client_id='".$client_id."'");
		if($avgRating->num_rows()>0)
		{
			$data['averageRating'] = $avgRating->row()->avgRating;
		}
		else
		{
			$data['averageRating'] = 0;
		}
		
		//echo "<pre>";print_r($data['averageRating']);die;
		$this->load->view('page/advisor/advisor_profile',$data);

	}



	function learning()

	{

		$this->common->check_user_login();

		$data = array();

		$data['title'] = 'Learning | Five Percent';

		$data['sub_title'] = 'Learning';

		$user_type = $this->session->userdata('user_type');

		$type = 0;

		if($user_type==0)

		{

			$type = 1;

		}

		if($user_type==1)

		{

			$type = 2;

		}

		$data['learnings'] = $this->db->query("SELECT * FROM tbl_user_advisor_learning WHERE type='".$type."'")->result();

		//echo "<pre>";print_r($data['learnings']);die;

		$this->load->view('page/learning/learning',$data);

	}

	function getAutoNotificationChatAjax()

	{

		$data = array();

		$user_type = $this->session->userdata('user_type');

        if($user_type==1)

        {

            $url = base_url('advisor/client/');

        } 

        else

        {

            $url = base_url('user/advisor/');

        }

		$user_id = $this->session->userdata('user_id');

		$chatList = '';

		$messageQuery = $this->db->query("SELECT a.*,b.first_name,b.last_name FROM tbl_chatting a LEFT JOIN tbl_user_personel_info b ON a.user_one=b.user_id  WHERE a.user_two='".$user_id."' AND a.status=0 ORDER BY a.created_on DESC");



		$data['numberOfMessage'] = $messageQuery->num_rows();



		foreach($messageQuery->result() as $chat)

		{

			$message = $chat->message;

            if(strlen($chat->message)>50)

            {

                $message = substr($chat->message,0,50).'..';

            }

			$chatLink = $url.base64_encode(base64_encode($chat->user_one));

			$chatList.='<li><a href="'.$chatLink.'"><b>'.$chat->first_name.' '.$chat->last_name.'</b> '.$message.'</a></li>';

		}

		$data['chatList'] = $chatList;

		echo json_encode($data);

	}

	function clearNotificationAtOnce()

	{

		$user_id = $this->session->userdata('user_id');

		$id = $this->input->post('id');

		$this->db->where('id',$id);

		$this->db->update('tbl_notifications',array('status'=>1));

		echo $this->db->query("SELECT * FROM tbl_notifications WHERE user_two='".$user_id."' AND status=0 ORDER BY id DESC")->num_rows();

	}

	function clearAllNotiticationAtOnce()

	{

		$user_id = $this->session->userdata('user_id');

		$this->db->where('user_two',$user_id);

		$this->db->update('tbl_notifications',array('status'=>1));

		echo $this->db->query("SELECT * FROM tbl_notifications WHERE user_two='".$user_id."' AND status=0 ORDER BY id DESC")->num_rows();

	}



	function advisorReviewRating()

    {

        $user_id = $this->session->userdata('user_id');

        $client_id = $this->input->post('client_id');

        $client_id = base64_decode(base64_decode($client_id));

        $comment = $this->input->post('comment');

        $rating = $this->input->post('rating');

        $dateTime = date('Y-m-d H:i:s');



        $insertdata = array(

        					'user_id'=>$user_id,

        					'client_id'=>$client_id,

        					'rating'=>$rating,

        					'review'=>$comment,

        					'created_on'=>$dateTime,

        					'updated_on'=>$dateTime,

        					);



        $checkExistingRating = $this->db->query("SELECT * FROM tbl_advisor_rating_reviews WHERE user_id='".$user_id."' AND client_id='".$client_id."'");



        if($checkExistingRating->num_rows()==0)

        {

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

    }

    function get_all_news_by_date_ajax()
    {
    	$clickedDate = $this->input->post('clickedDate');
    	//echo $clickedDate;
    	$html = '';
    	
        $common = '';
        $learning ='';

    	$getdata = $this->db->query("SELECT * FROM tbl_admin_stock_news WHERE id='".trim($clickedDate)."' AND status=1")->result();
    	foreach($getdata as $result)
    	{

    		if($result->type!=5)
    		{	
    			$common = '<thead>
                       <tr>
                           <th>Event</th>
                           <th>Actual</th>
                           <th>Forecast</th>
                           <th>Previous</th>
                       </tr>
                   </thead>';
    			$common.='<tbody><tr class="key-economic">
						<td colspan="7">Upcoming Key Economic Events</td>
					</tr>
					<tr class="economic-contant">
					   <td> <a target="_blank" href="'.base_url('users/dashboard/stock_news_details/'.base64_encode($result->id)).'">'.$result->news_title.'</a></td>
					   <td>'.$result->actual.'</td>
					   <td>'.$result->forecast.'</td>
					   <td>'.$result->previous.'</td>
					</tr></tbody>';
    		}
    		else
    		{
    			$learning = '<thead>
                       <tr>
                           <th>Title</th>
                           <th>Link</th>
                       </tr>
                   </thead>';
    			$learning.='<tbody><tr class="key-economic">
						<td colspan="7">Upcoming Key Economic Events</td>
					</tr>
					<tr class="economic-contant">
					   <td> <a target="_blank" href="'.base_url('users/dashboard/stock_news_details/'.base64_encode($result->id)).'">'.$result->news_title.'</a></td>
					   <td><a target="_blank" href="'.$result->link.'">Read More</a></td>

					</tr></tbody>';
    		}
    		
    	}
    	echo $html.$common.$learning;

    }
    function stock_news_details($id)
    {
    	$this->common->check_user_login();
		$data = array();
		$data['title'] = 'News Details | Five Percent';
		$user_id = $this->session->userdata('user_id');
		$news_id = base64_decode($id);
		$data['news_detail'] = $this->db->query("SELECT id,news_title,news_content,image,news_date FROM tbl_admin_stock_news WHERE id='".$news_id."'")->row();

		$data['live_news'] = $this->db->query("SELECT * FROM tbl_admin_live_news ORDER BY id DESC LIMIT 10")->result();
		//echo "<pre>";print_r($data['news_detail']);die;
		$this->load->view('page/dashboard/stock_news_details',$data);
    }
    function getTimeSlotBydateToUser()
    {
    	$date = $this->input->post('date');
    	$client_id = $this->input->post('client_id');
    	$getSlotQiery = $this->db->query("SELECT start_time,end_time FROM tbl_advisor_availability_slots_datewise WHERE advisor_id='".$client_id."' AND dates='".$date."' AND is_availability=0 ");
    	if($getSlotQiery->num_rows()>0)
    	{
    		//print_r($getSlotQiery->row());
    		$row = $getSlotQiery->row();
    		$start_time = $row->start_time;
    		$end_time = $row->end_time;
    		$option = '<option value="" selected="">Select Time Slot</option>';
    		$getslot = $this->db->query("SELECT id,start_time_end_time FROM tbl_admin_time_slot WHERE start_time>='".$start_time."' AND end_time<='".$end_time."' ")->result();
    			foreach($getslot as $slot)
    			{
    				$option.="<option value='".$slot->id."'>".$slot->start_time_end_time."</option>";
    			}
    			echo $option;


    	}
    	else
    	{
    		echo 0;
    	}
    	
    }
    function scheduleAppoinment_ajax()
    {
    	$user_id = $this->session->userdata('user_id');
    	$advisor_id = $this->input->post('advisor_id');
    	$datetime = date('Y-m-d H:i:s');
    	$date = $this->input->post('date');
    	$time_slot = $this->input->post('time_slot');

    	$checkAlreadySchedule = $this->db->query("SELECT * FROM tbl_user_advisor_schedule_appointment WHERE advisor_id='".$advisor_id."' AND schedule_date='".$date."' AND slot_id='".$time_slot."'");
    	if($checkAlreadySchedule->num_rows()>0)
    	{
    		echo 0;
    	}
    	else
    	{
    		$insertdata = array(
    						'user_id'=>$user_id,
    						'advisor_id'=>$advisor_id,
    						'schedule_date'=>$date,
    						'slot_id'=>$time_slot,
    						'created_on'=>$datetime
    						);

	    	$this->db->insert('tbl_user_advisor_schedule_appointment',$insertdata);


	    	$notification = "Hi <b>".$this->session->userdata('fname').' '.$this->session->userdata('lname')."</b> Scheduled Appointment with you on $date";
	    	$insertdataNotification = array(
	    								'user_one'=>$user_id,
										'user_two'=>$advisor_id,
										'type'=>3,
										'notification'=>$notification,
										'created_on'=>$datetime,
										);
	    	$this->db->insert('tbl_notifications',$insertdataNotification);

	    	echo 1;
    	}

    	

    }
    function declineUserAdvisor()
    {
    	$user_id = $this->session->userdata('user_id');
    	$client_id = $this->input->post('client_id');

    	$this->db->where('user_id',$client_id);
    	$this->db->where('advisor_id',$user_id);
    	$this->db->delete('tbl_user_adviser_referral_code_connectivity');
    	//
    	$this->db->where('user_id',$client_id);
    	$this->db->where('advisor_id',$user_id);
    	$this->db->delete('tbl_user_advisor_schedule_appointment');

    	//
    	$this->db->query("DELETE FROM tbl_chatting WHERE (user_one='".$user_id."' AND user_two='".$client_id."') OR (user_one='".$client_id."' AND user_two='".$user_id."')");


    }

    function declineAdvisorUser()
    {
    	$user_id = $this->session->userdata('user_id');
    	$client_id = $this->input->post('client_id');

    	$this->db->where('user_id',$user_id);
    	$this->db->where('advisor_id',$client_id);
    	$this->db->delete('tbl_user_adviser_referral_code_connectivity');
    	//
    	$this->db->where('user_id',$user_id);
    	$this->db->where('advisor_id',$client_id);
    	$this->db->delete('tbl_user_advisor_schedule_appointment');

    	//
    	$this->db->query("DELETE FROM tbl_chatting WHERE (user_one='".$user_id."' AND user_two='".$client_id."') OR (user_one='".$client_id."' AND user_two='".$user_id."')");


    }
    /************Sanjeet *******************/
function update_user_investments_rf_rv_values_ajax()

	{



		$created_on = date('Y-m-d H:i:s');
		$user_id = $this->session->userdata('user_id');
		$this->db->where('user_id',$user_id);
		$this->db->delete('tbl_user_investments_management');

		if(isset($_POST['investments_id']))
		{
			for($i=0;$i<count($_POST['investments_id']);$i++)
			{
				$investments_id = $_POST['investments_id'][$i];
				$investments_type = $_POST['investments_type'][$i];
				$fund_type = $_POST['fund_type'][$i];
					$insertdata = array(
									'user_id'=>$user_id,
									'investments_id'=>$investments_id,
									'fund_type'=>$fund_type,
									'investments_type'=>$investments_type,
									'is_suggested'=>1,
									'created_on'=>$created_on,
									);

					
					$this->db->insert('tbl_user_investments_management',$insertdata);
				
			}
		}
		echo 1;

	}
	function testingapi()
	{
		$curl = curl_init();
		curl_setopt_array($curl, [
			CURLOPT_URL => "https://realtor.p.rapidapi.com/properties/list-by-mls?mls_id=%3CREQUIRED%3E&offset=0&limit=10",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => [
				"x-rapidapi-host: realtor.p.rapidapi.com",
				"x-rapidapi-key: cUOH9qofz7mshH2yHZrCdCU2c4vSp1aQzXXjsnbdK2oqo3Y7iu"
			],
		]);

		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) 
		{
			echo "cURL Error #:" . $err;
		} 
		else 
		{
			//echo $response;
			$response = json_decode($response);
			echo "<pre>";print_r($response);
		}
	}
	function clientActivityMobileChart()
	{
		$user_id = $this->input->get('user_id');
		if($user_id=="")
		{
			echo "Please enter user Id";
			die();
		}
		$checkAdvisorExist = $this->db->query("SELECT id FROM tbl_users WHERE id='".$user_id."' AND user_type=1 ");
		if($checkAdvisorExist->num_rows()<1)
		{
			echo "Invalid User Id";
			die();
		}
		$data['client_lists'] = $this->db->query("SELECT a.user_id,b.id,c.first_name,c.last_name,c.profile_image FROM tbl_user_adviser_referral_code_connectivity a INNER JOIN tbl_users b ON a.user_id=b.id INNER JOIN tbl_user_personel_info c ON b.id=c.user_id WHERE a.advisor_id='".$user_id."'")->result();
		$usersID = 0;
		foreach($data['client_lists'] as $userlist)
		{
			$usersID.=$userlist->id.',';
		}
		$usersID =  rtrim($usersID,',');

		//graph  data calcultaions
		$getActivityRecord = $this->dashboards->getAdvisorClientActivity($user_id,$usersID);
		$subTotalProfit = 0;
		$overAllProfit = 0;
		$overAllLoss = 0;
		foreach($getActivityRecord as $subtotal)
		{
			if($subtotal['monthlyLossProfit']>0)
			{
				$overAllProfit+=$subtotal['monthlyLossProfit'];
			}
			if($subtotal['monthlyLossProfit']<0)
			{
				$overAllLoss+=$subtotal['monthlyLossProfit'];
			}
			$subTotalProfit+=($monthlyLossProfit);
		}
		//echo $overAllProfit."  ".$overAllLoss;die;
		$labelValue = '';
		$colorValue = '';
		$grapghValue = '';
		$setProfit = 0;
		$calprofitpercent = 0;
		$monthYearArr = $this->dashboards->getMonthYearArr();
		foreach($getActivityRecord as $label)
		{
			//label calculation
			$explodemonthYear = explode('-', $label['month']);
			$set=$monthYearArr[$explodemonthYear[1]];
			//$labelValue.="'$set'".",";
			$year = $explodemonthYear[0];
			$labelValue.="'$set-$year'".",";
			//Color calculation
			$monthWiseProfitLoss = $label['monthlyLossProfit'];
			if($label['monthlyLossProfit']=="")
			{
				$monthWiseProfitLoss = 0;
			}
			if($monthWiseProfitLoss>0)
			{
				$setColor = '#4097c8';
				//$calprofitpercent = ($monthWiseProfitLoss/$overAllProfit)*100;
				$calprofitpercent = $monthWiseProfitLoss;
				$calprofitpercent = number_format($calprofitpercent,2,".","");
			}
			else if($monthWiseProfitLoss<0)
			{
				$setColor = '#fe8032';
				//$calprofitpercent = ($monthWiseProfitLoss/$overAllLoss)*100;
				$calprofitpercent = trim($monthWiseProfitLoss,'-');
				$calprofitpercent = number_format($calprofitpercent,2,".","");
			}
			else
			{
				$setColor = '#4097c8';
				$calprofitpercent = number_format(0,2,".","");
			}
			$colorValue.= "'$setColor'".",";
			$grapghValue.=$calprofitpercent.",";
		}
		$data['labeldata'] =  $labelValue;
		$data['colordata'] = $colorValue;
		$data['grapghValue'] = $grapghValue;
		$this->load->view('page/advisor/clientActivityMobileChart',$data);
	}

	function financialTargetGoalMobile()
	{
		$data = array();
		$data['title'] = 'Financial Target | Five Percent';
		$user_id = $this->input->get('user_id');
		$plan_id = $this->input->get('plan_id');
		if($user_id=="")
		{
			echo "Please enter user Id";
			die();
		}
		/*if($plan_id=="")
		{
			echo "Please enter plan Id";
			die();
		}*/
		$checkAdvisorExist = $this->db->query("SELECT id FROM tbl_users WHERE id='".$user_id."' AND user_type=0 ");
		if($checkAdvisorExist->num_rows()<1)
		{
			echo "Invalid User Id";
			die();
		}
		/*$getFinancialTargetGoalRecord = $this->dashboards->getUserFinancialTargetGoal($user_id);
		//echo "<pre>";print_r($getFinancialTargetGoalRecord); die;
		$data['goalPercentage'] = $getFinancialTargetGoalRecord['goalPercentage'];
        $data['allDateArr'] = implode(',', $getFinancialTargetGoalRecord['allDateArr']);
        $data['profitLoss'] = implode(',', $getFinancialTargetGoalRecord['profitLoss']);

        $data['profitTarget'] = $getFinancialTargetGoalRecord['profitTarget'];*/
        $getFinancialTargetGoalRecord = $this->dashboards->getUserFinancialTargetGoal($user_id);
			//echo "<pre>";print_r($getFinancialTargetGoalRecord); die;
		$maxAxix = 0;
		$profitTarget = $getFinancialTargetGoalRecord['profitTarget'];
		if($profitTarget>max($getFinancialTargetGoalRecord['profitLoss']))
		{
			$maxAxix = $profitTarget;
		}
		else
		{
			$maxAxix = max($getFinancialTargetGoalRecord['profitLoss']);
		}
		//$data['goalPercentage'] = $getFinancialTargetGoalRecord['goalPercentage'];
		$data['minAxix'] = min($getFinancialTargetGoalRecord['profitLoss'])-1;
		$data['maxAxix'] = $maxAxix+1;
		//echo $data['minAxix']."  ".$data['maxAxix'];die;

        $data['allDateArr'] = implode(',', ($getFinancialTargetGoalRecord['allDateArr']));
        $data['profitLoss'] = implode(',', ($getFinancialTargetGoalRecord['profitLoss']));
        $data['profitTarget'] = $getFinancialTargetGoalRecord['profitTarget'];
        //echo "<pre>";print_r($data['profitTarget']);die();
        $this->load->view('page/dashboard/financialTargetGoalMobile',$data);
	}

	function overTimeLogout()
	{
		$user_id = $this->session->userdata('user_id');
		$this->db->where('id',$user_id);
		$this->db->update('tbl_users',array('onlineStatus'=>0));
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('email');

		echo 1;
	}


}