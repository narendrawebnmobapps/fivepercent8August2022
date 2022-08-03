<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'libraries/REST_Controller.php';
class Advisor extends REST_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('common');
	}
    protected $royalStage;
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
    function get_get()
    {
        echo $this->royalStage = 50;
        echo "<br>";
        echo $this->royalStage = 10;
    }

    function signup_post()
    {
        $ip_addr = $_SERVER['REMOTE_ADDR'];
        $created_on = date('Y-m-d H:i:s');
        $fname = $this->input->post('fname');
        $lname = $this->input->post('lname');
        $phoneNumber = $this->input->post('phoneNumber');
        $email = $this->input->post('email');
        $date_of_birth = $this->input->post('date_of_birth');
        $password = $this->input->post('password');
        $cpassword = $this->input->post('cpassword');
        if($fname=="" && $fname==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide Fisrt Name'),200);
        }
        if($lname=="" && $lname==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide Last Name'),200);
        }

        if($phoneNumber=="" && $phoneNumber==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide Phone Number'),200);

        }

        if($email=="" && $email==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide Email Address'),200);

        }

        if($date_of_birth=="" && $date_of_birth==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide date of birth'),200);

        }

        if($password=="" && $password==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide Password'),200);

        }

        if($cpassword=="" && $cpassword==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide Confirm Password'),200);

        }

        if($password!==$cpassword)

        {

            $this->response(array('success'=>'false','message'=>'Password does not match'),200);

        }

        $check_email_existing = $this->db->query("SELECT * FROM tbl_users WHERE email='".$email."'")->num_rows();

        if($check_email_existing>0)

        {

            $this->response(array('success'=>'false','message'=>'Email already exists,try another'),200);

        }

        $password_token = $this->common->random_password_token();

        $fname = $this->input->post('fname');

        $lname = $this->input->post('lname');

        $phoneNumber = $this->input->post('phoneNumber');

        $email = $this->input->post('email');

        $date_of_birth = $this->input->post('date_of_birth');

        $password = $this->input->post('password');

        $password = md5($password);

        $insertdata = array(

                            'user_type'=>1,

                            'password'=>$password,

                            'email'=>$email,

                            'dob'=>$date_of_birth,

                            'password_token'=>$password_token,

                            'ip_address'=>$ip_addr,

                            'created_on'=>$created_on,

                            'updated_on'=>$created_on,

                          );

        if($this->db->insert('tbl_users',$insertdata))

        {

          $last_inserted_id = $this->db->insert_id();

          $moredataInsert = array(

                                'user_id'=>$last_inserted_id,

                                'first_name'=>$fname,

                                'last_name'=>$lname,

                                'phone_number'=>$phoneNumber,

                                'created_on'=>$created_on,

                                'updated_on'=>$created_on,

                                );

          $this->db->insert('tbl_user_personel_info',$moredataInsert);

          $this->response(array('success'=>'true','message'=>'Your Registration Completed,We will verify your registration details and mail you soon.Thnak You'),200);

        }

        else

        {

            $this->response(array('success'=>'false','message'=>'Something went wrong'),200);

        }

    }

    function login_post()

    {

        $username = $this->input->post('username');

        $password = $this->input->post('password');

        $device_toekn = $this->input->post('device_toekn');

        $recordarray = array();

        if($username=="" && $username==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide  Username'),200);

        }

        if($password=="" && $password==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide  Password'),200);

        }

        if($device_toekn=="" && $device_toekn==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide  Device Token'),200);

        }

        $password = md5($password);

        $this->db->select("a.id AS user_id,a.user_type,a.email,a.dob,a.status,a.device_token,b.first_name,b.last_name,b.phone_number,b.expYears,b.speciality,b.certificate,b.profile_image,c.referral_code");

        $this->db->from("tbl_users a");

        $this->db->join('tbl_user_personel_info b', 'a.id = b.user_id','INNER');

        $this->db->join('tbl_admin_referral_code c', 'a.id = c.user_id','LEFT');

        $this->db->where('a.email',$username);      

        $this->db->where('a.password',$password);

        $this->db->where('a.user_type',1);

        $query = $this->db->get();

        if($query->num_rows()>0)

        {

            $row  = $query->row();

            $this->db->where('id',$row->user_id);

            $this->db->update('tbl_users',array('device_token'=>$device_toekn));

            $this->response(array('success'=>'true','message'=>'login success','record'=>$query->row()),200);

        }

        else

        {

            $this->response(array('success'=>'false','message'=>'Invalid login credential'),200);

        }

    }

    function get_profile_post()

    {

        $user_id = $this->input->post('user_id');

        if($user_id=="" && $user_id==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);

        }

        $this->db->select("a.id AS user_id,a.user_type,a.email,a.dob,a.status,a.device_token,b.first_name,b.last_name,b.phone_number,b.expYears,b.speciality,b.certificate,b.profile_image,c.name AS country_name,c.id AS country_id,d.StockPickingBasedOn");

        $this->db->from("tbl_users a");

        $this->db->join('tbl_user_personel_info b', 'a.id = b.user_id','INNER');

        $this->db->join('countries c', 'b.country = c.id','LEFT');
        $this->db->join('tbl_users_extra_settings d', 'a.id = d.user_id','LEFT');
        $this->db->where('a.id',$user_id);      
        $query = $this->db->get();
        $this->response(array('success'=>'true','record'=>$query->row()),200);



    }

    function update_profile_post()

    {

        $user_id = $this->input->post('user_id');

        $ip_addr = $_SERVER['REMOTE_ADDR'];

        $currentdate = date('Y-m-d H:i:s');

        $fname = $this->input->post('fname');

        $lname = $this->input->post('lname');

        $phoneNumber = $this->input->post('phoneNumber');

        $email = $this->input->post('email');

        $date_of_birth = $this->input->post('date_of_birth');

        $country = $this->input->post('country');

        $exp_year = $this->input->post('exp_year');

        $speciality = $this->input->post('speciality');

        if($user_id=="" && $user_id==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
        }
        if($fname=="" && $fname==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide Fisrt Name'),200);
        }
        if($lname=="" && $lname==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide Last Name'),200);
        }
        if($phoneNumber=="" && $phoneNumber==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide Phone Number'),200);
        }

        if($email=="" && $email==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide Email Address'),200);

        }

        if($date_of_birth=="" && $date_of_birth==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide date of birth'),200);

        }

        if($country=="" && $country==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide Country'),200);

        }

        if($exp_year=="" && $exp_year==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide Experience Year '),200);

        }

        if($speciality=="" && $speciality==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide date of birth'),200);

        }

        $certificate = "";

        if(isset($_FILES['certificate']['name']))

        {

            if($_FILES['certificate']['size']>0)

             {

                $temp = explode('.', basename($_FILES['certificate']['name']));



                $type2 = $_FILES["certificate"]["type"];

                $new_photoid = explode('.',$_FILES["certificate"]["name"]); 

                $certificate = rand(100,9999999).date('d_m_yhmi').'.' . end($new_photoid); 

                move_uploaded_file($_FILES["certificate"]["tmp_name"],"uploads/certificates/".$certificate);          

              }

        }

        



        $image2 = "";

        if(isset($_FILES['proimage']['name']))

        {

            if($_FILES['proimage']['size']>0)

             {

                $temp = explode('.', basename($_FILES['proimage']['name']));

                $type2 = $_FILES["proimage"]["type"];

                $new_photoid2 = explode('.',$_FILES["proimage"]["name"]); 

                $image2 = rand(100,9999999).date('d_m_yhmi').'.' . end($new_photoid2); 

                move_uploaded_file($_FILES["proimage"]["tmp_name"],"uploads/user-profile/".$image2);          

              }

        }

        

        $this->db->where('id',$user_id);

        $this->db->update('tbl_users',array('dob'=>$date_of_birth));



        $insertdata = array(

                            'first_name'=>$fname,

                            'last_name'=>$lname,

                            'phone_number'=>$phoneNumber,

                            'country'=>$country,

                            'expYears'=>$exp_year,

                            'speciality'=>$speciality,

                            'profile_image'=>$image2,

                            'certificate'=>$certificate,

                            'updated_on'=>$currentdate,

                            );

        $this->db->where('user_id',$user_id);

        $this->db->update('tbl_user_personel_info',$insertdata);


        /*Get profile data*/
        $this->db->select("a.id AS user_id,a.user_type,a.email,a.dob,a.status,a.device_token,b.first_name,b.last_name,b.phone_number,b.expYears,b.speciality,b.certificate,b.profile_image,c.name AS country_name,c.id AS country_id,d.StockPickingBasedOn");
        $this->db->from("tbl_users a");
        $this->db->join('tbl_user_personel_info b', 'a.id = b.user_id','INNER');
        $this->db->join('countries c', 'b.country = c.id','LEFT');
        $this->db->join('tbl_users_extra_settings d', 'a.id = d.user_id','LEFT');
        $this->db->where('a.id',$user_id);      
        $query = $this->db->get();
        
        $this->response(array('success'=>'true','message'=>'Profile updated successfully','record'=>$query->row()),200);

    }
    function getClientListFunction($user_id)
    {
        error_reporting(0);
        $record_array = array();
        $data_arr = array();
        $this->db->select('cu.user_id,tu.id,tu.email,tu.status,tu.onlineStatus,pi.first_name,tu.dob,tu.created_on,date_format( tu.created_on, "%d %M %Y" ) as from_date,pi.last_name,pi.date_of_birth,pi.job_type,pi.profile_image,pi.martial_status,pi.no_of_child,pi.app_usage,cy.name AS country_name');
        $this->db->from('tbl_user_adviser_referral_code_connectivity cu');
        $this->db->join('tbl_users tu', 'tu.id = cu.user_id');
        $this->db->join('tbl_user_personel_info pi', 'tu.id = pi.user_id');
        $this->db->join('countries cy', 'pi.country = cy.id');
        $this->db->where('tu.user_type',0);
        $this->db->where('cu.advisor_id',$user_id);
        $this->db->order_by("pi.first_name", "asc");
        $results = $this->db->get()->result();
        foreach($results as $result)
        {
            $getPlanID = $this->db->query("SELECT plan_id FROM tbl_user_subscription_plan WHERE user_id='".$result->id."'")->row()->plan_id;
            $totalNumberOfQuestion = $this->db->query("SELECT * FROM tbl_questions")->num_rows();
            $numberOfAnsweredQuestion = $checkQuestionOptions = $this->db->query("SELECT a.*,b.*,COUNT(b.question_id) AS qnc FROM user_question_answer a INNER JOIN user_question_options b ON a.question_id = b.question_id  WHERE a.user_id='".$result->id."' GROUP BY b.question_id")->num_rows();

            $agePercentage = 0;
            $maritalStatusPercentage = 0;
            $jobTypePercentage = 0;
            $knowledgePercenrage = 0;
            //Age calculation
            $age = $this->common->calculateage($result->dob);
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
            $check_request = $this->db->query("SELECT * FROM tbl_user_adviser_referral_code_connectivity  WHERE user_id='".$result->id."' AND advisor_id='".$user_id."'");
            if($check_request->num_rows()>0)
            {
                $status = $check_request->row()->status;
                if($status==0)
                {
                    $requested = 0;
                }
                else
                {
                    $requested = 1;
                }
            }
            else
            {
                $requested = 2;
            }
            /*Daily Goal Calculations start*/
            $financeData = array();
            $financeArr = array();
            $LtmpArr = array();
            $LtmpArr2 = array();
            $LtmpArr3 = array();
            $getfinancialChartData = $this->db->query("select *, CAST(`updated_on` as DATE) AS datewise from tbl_users_trading_diary WHERE price_out>0 AND user_id='".$result->id."' ORDER BY updated_on DESC")->result(); 
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
            foreach($financeArr as $proloss)
            {
                $allDateArr[$c] = '"'.date('M d,Y', strtotime($proloss['dates'])).'"';
                $profitLoss[$c] = number_format((($proloss['pro_loss']*100)/$totalChartAccoutPrice),2,".","");
                $totalDiaryProfit = $totalDiaryProfit+$proloss['pro_loss'];
                $c++;
            }

            //echo $totalDiaryProfit."<br>";
            $get_income_expense = $this->db->query("SELECT a.options AS optionvalue,b.id AS option_id,a.value, a.question_id,b.options FROM user_question_options a LEFT JOIN tbl_question_options b ON a.options=b.id WHERE a.question_id=35 AND a.user_id='".$result->id."'")->result();
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

            $profitabilityQuery = $this->db->query("SELECT a.options AS optionvalue,b.id AS option_id,a.value, a.question_id,b.options FROM user_question_options a LEFT JOIN tbl_question_options b ON a.options=b.id WHERE a.question_id=43 AND a.user_id='".$result->id."'");
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
            /*Daily Goal Calculations End*/
            //echo $knowledgePercenrage;die;
            $risk_percent = $agePercentage+$maritalStatusPercentage+$jobTypePercentage+$knowledgePercenrage;
            $data_arr['client_id'] = $result->id;
            $data_arr['risk_percent'] = $risk_percent;
            $data_arr['client_name'] = $result->first_name." ".$result->last_name;
            $data_arr['profile_image'] = $result->profile_image;
            $data_arr['country'] = $result->country_name;
            $data_arr['created_on'] = $result->from_date;
            $data_arr['requested'] = $requested;
            $data_arr['app_usage'] = $result->app_usage;
            $data_arr['goalPercentage'] = number_format($toatalProfitPercentage,2,".","");
            $data_arr['lastProfitLoss'] = $profitLoss[0];
            $data_arr['userLevel'] = $getPlanID;
            $data_arr['onlineStatus'] = $result->onlineStatus;
            array_push($record_array, $data_arr);
        }
        return $record_array; 
    }
    function client_list_post()
    {
        $user_id = $this->input->post('user_id');
        if($user_id=="" && $user_id==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
        }
        $record_array = $this->getClientListFunction($user_id);
        $this->response(array('success'=>'true','record'=>$record_array),200);
    }

    function client_risk_profile_post()

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

        $this->db->select('tu.email,tu.status,pi.first_name,tu.dob,pi.last_name,pi.job_type,pi.profile_image,pi.martial_status,pi.no_of_child,c.name AS country');

        $this->db->from('tbl_users tu');

        $this->db->join('tbl_user_personel_info pi', 'tu.id = pi.user_id');

        $this->db->join('countries c', 'c.id = pi.country','LEFT');

        $this->db->where('tu.id',$client_id);

        $result = $this->db->get()->row();

        $totalNumberOfQuestion = $this->db->query("SELECT * FROM tbl_questions")->num_rows();

        $numberOfAnsweredQuestion = $this->db->query("SELECT a.*,b.*,COUNT(b.question_id) AS qnc FROM user_question_answer a INNER JOIN user_question_options b ON a.question_id = b.question_id  WHERE a.user_id='".$client_id."' GROUP BY b.question_id")->num_rows();

        $agePercentage = 0;

        $maritalStatusPercentage = 0;

        $jobTypePercentage = 0;

        $knowledgePercenrage = 0;

        //Age calculation

        $age = $this->common->calculateage($result->dob);

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

        $all_money = '0';

        $money_use_percentage = 100;

        $get_exitsing_rf_rv_option_value = $this->db->query("SELECT * FROM tbl_user_rf_rv_options_values WHERE user_id='".$client_id."'");

        if($get_exitsing_rf_rv_option_value->num_rows()>0)

        {

            $rf_rv_row = $get_exitsing_rf_rv_option_value->row();

            $RF = $rf_rv_row->rf;

            $RV = $rf_rv_row->rv;

            $option = $rf_rv_row->options;



            $all_money = $rf_rv_row->all_money;

            $money_use_percentage = $rf_rv_row->money_use_percentage;

        }



        $rf_data = array();

        $rf_recordarray = array();



        $rv_data = array();

        $rv_arraydata = array();



        $option_data = array();

        $option_arraydata = array();



         $sql1="SELECT count(m.user_id) from tbl_user_stock_management m where m.stock_id=a.id and m.user_id='".$client_id."'";

         $sql2="SELECT m1.user_id from tbl_user_stock_management m1 where m1.stock_id=a.id limit 1";

        $stock_ibex30_res = $this->db->query("SELECT a.stock_name,a.id, ($sql1) as exist FROM tbl_admin_stock a WHERE a.stock_type=1 ORDER BY a.id  LIMIT 4")->result();

        foreach($stock_ibex30_res as $rf_stock)

        {

            $rf_data['id'] = $rf_stock->id;

            $rf_data['stock_name'] = $rf_stock->stock_name;

            $rf_data['value'] = "4.7";

            $rf_data['exist'] = $rf_stock->exist;

            array_push($rf_recordarray, $rf_data);

        }   



        $stock_vn30s_res = $this->db->query("SELECT a.stock_name,a.id, ($sql1) as exist FROM tbl_admin_stock a WHERE a.stock_type=2 ORDER BY a.id ASC  LIMIT 4")->result();

        foreach($stock_vn30s_res as $rv_stock)

        {

            $rv_data['id'] = $rv_stock->id;

            $rv_data['stock_name'] = $rv_stock->stock_name;

            $rv_data['value'] = "4.5";

            $rv_data['exist'] = $rv_stock->exist;

            array_push($rv_arraydata, $rv_data);

        }



        $stock_options = $this->db->query("SELECT a.stock_name,a.id, ($sql1) as exist FROM tbl_admin_stock a WHERE a.stock_type=2 ORDER BY a.id DESC LIMIT 4 ")->result();

        foreach($stock_options as $option_stock)

        {

            $option_data['id'] = $option_stock->id;

            $option_data['stock_name'] = $option_stock->stock_name;

            $option_data['value'] = "4.3";

            $option_data['exist'] = $option_stock->exist;

            array_push($option_arraydata, $option_data);

        }

        /*Investment suggestions*/
        $investments = array();
        $sql1="SELECT count(m.user_id) from tbl_user_investments_management m where m.investments_id=a.investments_id and m.user_id='".$client_id."'";
        if($risk_percent>=0 && $risk_percent<=50)
        {
            $investments = $this->db->query("SELECT a.investments_id,a.fund_name,a.investments_type,a.fund_commission,fund_type,($sql1) as exist  FROM tbl_admin_investments a WHERE a.investments_type=1 AND fund_type='Risky funds' ORDER BY a.investments_id DESC LIMIT 10")->result();
        }

        if($risk_percent>=51 && $risk_percent<=75)
        {
            $investments = $this->db->query("SELECT a.investments_id,a.fund_name,a.investments_type,a.fund_commission,fund_type,($sql1) as exist  FROM tbl_admin_investments a WHERE a.investments_type=1 AND fund_type='moderate funds' ORDER BY a.investments_id DESC LIMIT 10")->result();
        }
        if($risk_percent>=75 && $risk_percent<=100)
        {
            $investments = $this->db->query("SELECT a.investments_id,a.fund_name,a.investments_type,a.fund_commission,fund_type,($sql1) as exist  FROM tbl_admin_investments a WHERE a.investments_type=1 AND fund_type='Conservative funds' ORDER BY a.investments_id DESC LIMIT 10")->result();
        }

        $get_plan = $this->db->query("SELECT plan_id AS plan FROM tbl_user_subscription_plan WHERE user_id='".$client_id."'")->row()->plan;

        //check user acceptance

        $check_request = $this->db->query("SELECT * FROM tbl_user_adviser_referral_code_connectivity  WHERE user_id='".$client_id."' AND advisor_id='".$user_id."'");

        if($check_request->num_rows()>0)

        {

            $status = $check_request->row()->status;

            if($status==0)

            {

                $requested = 0;

            }

            else

            {

                $requested = 1;

            }

        }

        else

        {

            $requested = 2;

        }

        if($risk_percent>=0 && $risk_percent<=50)
        {
            $risk_mode = "Conservative";
        }
        if($risk_percent>=51 && $risk_percent<=75)
        {
            $risk_mode = "Moderate";
        }
        if($risk_percent>=76 && $risk_percent<=100)
        {
            $risk_mode = "Risky";
        }



        $this->response(array('success'=>'true','record'=>$result,'risk_percent'=>$risk_percent,'risk_mode'=>$risk_mode,'RF'=>$RF,'RV'=>$RV,'option'=>$option,'all_money'=>$all_money,'money_use_percentage'=>$money_use_percentage,'RF_Stock'=>$rf_recordarray,'RV_Stock'=>$rv_arraydata,'options'=>$option_arraydata,'requested'=>$requested,'investments'=>$investments,'plan'=>$get_plan),200);

    }



    function client_balance_sheet_post()

    {

        $client_id = $this->input->post('client_id');

        $currentdate = date('Y-m-d H:i:s');

        if($client_id=="" && $client_id==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide Client Id'),200);

        }

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

        $check_balance_existing = $this->db->query("SELECT * FROM tbl_user_balance_sheet WHERE user_id='".$client_id."'");

        if($check_balance_existing->num_rows()<1)

        {

            $get_income_expense = $this->db->query("SELECT a.options AS optionvalue,b.id AS option_id,a.value, a.question_id,b.options FROM user_question_options a LEFT JOIN tbl_question_options b ON a.options=b.id WHERE a.question_id=35 AND a.user_id='".$client_id."'")->result();

            $total_monthly_income = 0;

            $total_monthly_expenses = 0;

            //$mInvest = 0;

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

                /*if($bal->option_id==217)

                {

                    $mInvest = $bal->value;

                }*/

            }

            $check_existing_balance_sheet = $this->db->query("SELECT * FROM tbl_user_balance_sheet WHERE user_id='".$client_id."'");

            if($check_existing_balance_sheet->num_rows()==0)

            {

                $insertBalanceSheetDataIncome = array(

                                                'user_id'=>$client_id,

                                                'type'=>1,

                                                'parameters'=>'Income',

                                                'value'=>$total_monthly_income,

                                                'created_on'=>$currentdate,

                                                );

                $this->db->insert('tbl_user_balance_sheet',$insertBalanceSheetDataIncome);

                $insertBalanceSheetDataexpense = array(

                                                'user_id'=>$client_id,

                                                'type'=>2,

                                                'parameters'=>'Expense',

                                                'value'=>$total_monthly_expenses,

                                                'created_on'=>$currentdate,

                                                );

                $this->db->insert('tbl_user_balance_sheet',$insertBalanceSheetDataexpense);

            }

        }

        else

        {

            //Income calculations

            $income_array = $this->db->query("SELECT * FROM tbl_user_balance_sheet WHERE user_id='".$client_id."' AND type=1 ORDER BY value DESC")->result();

            foreach($income_array as $income)

            {

                $income_data['id'] = $income->id;

                $income_data['parameters'] = $income->parameters;

                $income_data['value'] = $income->value;

                $total_monthly_income+=$income->value;

                array_push($income_recordarray, $income_data);



            }

            //Expense calculations

            $expense_array = $this->db->query("SELECT * FROM tbl_user_balance_sheet WHERE user_id='".$client_id."' AND type=2  ORDER BY value DESC")->result();

            foreach($expense_array as $expense)

            {

                $expense_data['id'] = $expense->id;

                $expense_data['parameters'] = $expense->parameters;

                $expense_data['value'] = $expense->value;

                $total_monthly_expenses+=$expense->value;

                array_push($expense_recordarray, $expense_data);



            }

            //assets calculations

            $assets_array = $this->db->query("SELECT * FROM tbl_user_balance_sheet WHERE user_id='".$client_id."' AND type=3  ORDER BY value DESC")->result();

            foreach($assets_array as $assets)

            {

                $assets_data['id'] = $assets->id;

                $assets_data['parameters'] = $assets->parameters;

                $assets_data['value'] = $assets->value;

                $total_assets+=$assets->value;

                array_push($assets_recordarray, $assets_data);



            }



            //Liabilities calculations

            $liability_array = $this->db->query("SELECT * FROM tbl_user_balance_sheet WHERE user_id='".$client_id."' AND type=4  ORDER BY value DESC")->result();

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

        //Total Assets - Total Liability = Total Equity

        $total_equity = $total_assets-$total_liabilities;

        //echo $total_equity;



        $this->response(array('success'=>'true','income_data'=>$income_recordarray,'total_income'=>$total_monthly_income,'expense_data'=>$expense_recordarray,'total_expense'=>$total_monthly_expenses,'total_monthly_cash'=>$total_monthly_cash,'assets_data'=>$assets_recordarray,'total_assets'=>$total_assets,'liability_data'=>$liability_recordarray,'total_liability'=>$total_liabilities,'total_equity'=>$total_equity),200);

    }

    function get_advisor_work_experience_post()

    {

        $user_id = $this->input->post('user_id');

        if($user_id=="" && $user_id==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);

        }



        $get_exp_data = $this->db->query("SELECT * FROM tbl_users_experience WHERE user_id='".$user_id."'")->result();

        $this->response(array('success'=>'true','record'=>$get_exp_data),200);

    }

    function get_advisor_about_me_post()

    {

        $user_id = $this->input->post('user_id');

        if($user_id=="" && $user_id==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);

        }



        $get_about_data = $this->db->query("SELECT id,user_id,aboutYourSelf FROM tbl_user_about_me WHERE user_id='".$user_id."'")->result();

        $this->response(array('success'=>'true','record'=>$get_about_data),200);

    }

    function update_advisor_about_me_data_post()

    {

        $user_id = $this->input->post('user_id');

        $aboutYourSelf = $this->input->post('aboutYourSelf');

        $created_on = date("Y-m-d H:i:s");

        if($user_id=="" && $user_id==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);

        }

        if($aboutYourSelf=="" && $aboutYourSelf==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide  About Your Self'),200);

        }

        $check_existing_AboutYourSelf = $this->db->query("SELECT * FROM tbl_user_about_me WHERE user_id='".$user_id."'")->num_rows();

        if($check_existing_AboutYourSelf>0)

        {

            $insertAboutYourSelfData = array(

                                             'aboutYourSelf'=>$aboutYourSelf,

                                            );

            $this->db->where('user_id',$user_id);

            $this->db->update('tbl_user_about_me',$insertAboutYourSelfData);

        }

        else

        {

            $insertAboutYourSelfData = array(

                                             'user_id'=>$user_id,

                                             'aboutYourSelf'=>$aboutYourSelf,

                                             'created_on'=>$created_on

                                            );

            $this->db->insert('tbl_user_about_me',$insertAboutYourSelfData);

        }

        $this->response(array('success'=>'true','message'=>'Data Saved Successfully'),200);



    }

    function add_update_advisor_work_experience_post()

    {

        $user_id = $this->input->post('user_id');

        if($user_id=="" && $user_id==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);

        }



        $created_on = date("Y-m-d H:i:s");

        if(count($_POST['companyname'])>0)

        {

            for($i=0;$i<count($_POST['companyname']);$i++)

            {

                $check_existing_experience = $this->db->query("SELECT * FROM tbl_users_experience WHERE id='".@$_POST['experience_id'][$i]."' AND user_id='".$user_id."'")->num_rows();

                if($check_existing_experience>0)

                {

                    $insertExperienceData = array(

                                             'user_id'=>$user_id,

                                             'companyName'=>$_POST['companyname'][$i],

                                             'startMonth'=>$_POST['startmonth'][$i],

                                             'startYear'=>$_POST['startyear'][$i],

                                             'endMonth'=>$_POST['endmonth'][$i],

                                             'endYear'=>$_POST['endyear'][$i],

                                             'created_on'=>$created_on,

                                             );

                    $this->db->where('id',@$_POST['experience_id'][$i]);

                    $this->db->where('user_id',$user_id);

                    $this->db->update('tbl_users_experience',$insertExperienceData);

                }

                else

                {

                    $insertExperienceData = array(

                                             'user_id'=>$user_id,

                                             'companyName'=>$_POST['companyname'][$i],

                                             'startMonth'=>$_POST['startmonth'][$i],

                                             'startYear'=>$_POST['startyear'][$i],

                                             'endMonth'=>$_POST['endmonth'][$i],

                                             'endYear'=>$_POST['endyear'][$i],

                                             'created_on'=>$created_on,

                                             );

                    $this->db->insert('tbl_users_experience',$insertExperienceData);

                }

                

            }

        }

        $get_exp_data = $this->db->query("SELECT * FROM tbl_users_experience WHERE user_id='".$user_id."'")->result();

        $this->response(array('success'=>'true','record'=>$get_exp_data,'message'=>'Data Saved Successfully'),200);

    }

    function delete_advisor_experience_post()

    {

        $user_id = $this->input->post('user_id');

        $exp_id = $this->input->post('exp_id');

        if($user_id=="" && $user_id==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide User Id'),200);

        }

        if($exp_id=="" && $exp_id==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide Experience Id'),200);

        }

        $this->db->where('id',$exp_id);

        $this->db->where('user_id',$user_id);

        $this->db->delete('tbl_users_experience');

        $this->response(array('success'=>'true','message'=>'Work Experience Deleted Successfully'),200);

    }



    function advisor_list_post()

    {

        $user_id = $this->input->post('user_id');

        if($user_id=="" && $user_id==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide User Id'),200);

        }
        $recordarray = array();
        $dataArr = array();
        $advisor_list_record = $this->db->query("SELECT a.id AS advisor_id,a.onlineStatus,b.first_name,b.last_name,b.profile_image,c.name AS country,(SELECT AVG(d.rating) FROM tbl_advisor_rating_reviews d WHERE a.id=d.client_id) AS rating FROM tbl_users a INNER JOIN tbl_user_personel_info b ON a.id=b.user_id LEFT JOIN countries c ON c.id=b.country where a.user_type=1 ORDER BY rating DESC")->result();
        //print_r($advisor_list_record);die;
        foreach($advisor_list_record as $value)
        {
            $dataArr['advisor_id'] = $value->advisor_id;
            $dataArr['country'] = $value->country ;
            $dataArr['first_name'] = $value->first_name;
            $dataArr['last_name'] = $value->last_name;
            $dataArr['name'] = $value->first_name." ".$value->last_name;
            $dataArr['profile_image'] = $value->profile_image;
            if($value->rating!="")
            {
                $dataArr['average_rating'] = number_format(ceil($value->rating),1,".","");
            }
            else
            {
                $dataArr['average_rating'] = number_format(ceil(0),1,".","");
            }
            $checkConnectivity = $this->db->query("SELECT * FROM tbl_user_adviser_referral_code_connectivity WHERE user_id='".$user_id."' AND advisor_id='".$value->advisor_id."'");
            if($checkConnectivity->num_rows()>0)
            {
                $rows = $checkConnectivity->row();
                if($rows->status==1)
                {
                    $connectivity = 1; //connected
                }
                else
                {
                    $connectivity = 2; //request sent status pending
                }
            }
            else
            {
                $connectivity = 0; //request can be send
            }
            $dataArr['connectivity'] = $connectivity;
            $dataArr['onlineStatus'] = $value->onlineStatus;            
            array_push($recordarray, $dataArr);
        }

        $this->response(array('success'=>'true','record'=>$recordarray),200);

    }

    function advisor_details_post()

    {

        $user_id = $this->input->post('user_id');

        $client_id = $this->input->post('advisor_id');

        if($user_id=="" && $user_id==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide User Id'),200);

        }

        if($client_id=="" && $client_id==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide Advisor Id'),200);

        }



        $this->db->select('tu.email,tu.status,pi.first_name,tu.dob,pi.last_name,pi.profile_image,pi.expYears,pi.speciality,pi.phone_number AS Phone,cy.name AS country_name');

        $this->db->from('tbl_users tu');

        $this->db->join('tbl_user_personel_info pi', 'tu.id = pi.user_id');

        $this->db->join('countries cy', 'pi.country = cy.id','LEFT');

        $this->db->where('tu.id',$client_id);

        $result = $this->db->get()->row();



        /* =================================

            Advisor Description 

            ================================= */

        $aboutMeRecord = $this->db->query("SELECT aboutYourSelf FROM tbl_user_about_me WHERE user_id='".$client_id."'")->row();

        $ExperienceRecord = $this->db->query("SELECT * FROM tbl_users_experience WHERE user_id='".$client_id."' ")->result();

        $checkConnectivity = $this->db->query("SELECT * FROM tbl_user_adviser_referral_code_connectivity WHERE user_id='".$user_id."' AND advisor_id='".$client_id."'");
        if($checkConnectivity->num_rows()>0)
        {
            $rows = $checkConnectivity->row();
            if($rows->status==1)
            {
                $connectivity = 1; //connected
            }
            else
            {
                $connectivity = 2; //request sent status pending
            }
        }
        else
        {
            $connectivity = 0; //request can be send
        }

        //check rating review or not
        $checkRatingReview = $this->db->query("SELECT * FROM tbl_advisor_rating_reviews WHERE user_id='".$user_id."' AND client_id='".$client_id."'");
        if($checkRatingReview->num_rows()>0)
        {
            $isRated = 1;
        }
        else
        {
            $isRated = 0;
        }
        $ratingReviews = $this->db->query("SELECT a.id,a.user_id,a.client_id,a.rating,a.review,b.updated_on,b.first_name,b.last_name,b.profile_image FROM tbl_advisor_rating_reviews a INNER JOIN tbl_user_personel_info b ON a.user_id=b.user_id WHERE a.client_id='".$client_id."' ORDER BY a.updated_on DESC")->result();

        $avgRating = $this->db->query("SELECT AVG(d.rating) AS avgRating FROM tbl_advisor_rating_reviews d WHERE d.client_id='".$client_id."'");
        if($avgRating->num_rows()>0)
        {
            $averageRating = $avgRating->row()->avgRating;
        }
        else
        {
            $averageRating = 0;
        }

        $this->response(array('success'=>'true','PersonelRecord'=>$result,'aboutMeRecord'=>$aboutMeRecord,'ExperienceRecord'=>$ExperienceRecord,'connectivity'=>$connectivity,'isRated'=>$isRated,'ratingReviews'=>$ratingReviews,'userAvgRating'=>$averageRating),200);





    }



    function add_advisor_availability_schedule_post()

    {

        $user_id = $this->input->post('user_id');



        $start_date =  $this->input->post('start_date');

        $end_date =  $this->input->post('end_date'); 



        if($user_id=="" && $user_id==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide User Id'),200);

        }

        if($start_date=="" && $start_date==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide Start Date'),200);

        }

        if($end_date=="" && $end_date==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide End Date'),200);

        }



        $dt = new DateTime($start_date);

        $startDate= $dt->format('Y-m-d');

        $dt1 = new DateTime($end_date);

        $endDate = $dt1->format('Y-m-d');

        $todaydate = date('Y-m-d');



        if($startDate < $todaydate) 

        {

            $this->response(array('success'=>'false','message'=>'Start date cant be earlier'),200);



        } 

        else if ($endDate <= $todaydate) 

        {

            $this->response(array('success'=>'false','message'=>'End date cant be earlier or today date'),200);

        } 

        else if ($endDate == $startDate)

        {

            $this->response(array('success'=>'false','message'=>'Start and End date cant be same date'),200);

        }

        else

        {

            $emergency_status_get =  $this->input->post('emergency_status');

            if($emergency_status_get)

            { 

                $emergency_status = "1"; 

            } 

            else 

            { 

                $emergency_status = "0"; 

            }

            $repeated =  $this->input->post('repeat');

             

            $sunday_get =  $this->input->post('sunday');



            if($sunday_get)

            { 

                $sunday = "1"; 

            } 

            else 

            { 

                $sunday = "0"; 

            }



            $monday_get =  $this->input->post('monday');



            if($monday_get)

            { 

                $monday = "1"; 

            } 

            else 

            { 

                $monday = "0"; 

            }   

            $tuesday_get =  $this->input->post('tuesday');



            if($tuesday_get)

            { 

                $tuesday = "1"; 

            } 

            else 

            { 

                $tuesday = "0"; 

            }   

            $wednesday_get =  $this->input->post('wednesday');



            if($wednesday_get)

            { 

                $wednesday = "1"; 

            } 

            else 

            { 

                $wednesday = "0"; 

            }



            $thursday_get =  $this->input->post('thursday');



            if($thursday_get)

            { 

                $thursday = "1"; 

            } 

            else 

            { 

                $thursday = "0"; 

            }

            $friday_get =  $this->input->post('friday');



            if($friday_get)

            { 

                $friday = "1"; 

            } 

            else 

            { 

                $friday = "0"; 

            }

            $saturday_get =  $this->input->post('saturday');



            if($saturday_get)

            { 

                $saturday = "1"; 

            } 

            else 

            { 

                $saturday = "0"; 

            }                

             



            $start_time =  $this->input->post('start_time');

            $end_time =  $this->input->post('end_time');

            $start_time_am_pm =  "AM";//$this->input->post('start_time_am_pm');

            $end_time_am_pm =  "AM";//$this->input->post('end_time_am_pm');

            $start_date =  $this->input->post('start_date');

            $end_date =  $this->input->post('end_date');

             

             // date format change for loop weekly insert

            $dt = new DateTime($start_date);

            $startDate= $dt->format('Y-m-d'); 

            $dt1 = new DateTime($end_date);

            $endDate = $dt1->format('Y-m-d'); 

            

            // date fromat for loop daily insert

            $begin = new DateTime($start_date);

            $end =   new DateTime($end_date);

            

            $query = $this->db->query("SELECT * FROM tbl_advisor_availability_time_slots where advisor_id ='$user_id'");

            $countinsert = $query->num_rows();

            $table = 'tbl_advisor_availability_time_slots'; 

            $InsertData =  array(

                         'advisor_id'=>$user_id,

                         'repeated'=>$repeated,

                         'start_date'=>$start_date,

                         'end_date'=>$end_date,

                         'sunday'=>$sunday,

                         'monday'=>$monday,

                         'tuesday'=>$tuesday,

                         'wednesday'=>$wednesday,

                         'thursday'=>$thursday,

                         'friday'=>$friday,

                         'saturday'=>$saturday,

                         'start_time'=>$start_time,

                         'start_time_am_pm'=>$start_time_am_pm,

                         'end_time_am_pm'=>$end_time_am_pm,

                         'end_time'=>$end_time,

                         'emergency_status'=>$emergency_status                                              

                        );



            if($countinsert > 0)

                {

                    $this->db->where('advisor_id',$user_id);

                    $this->db->delete('tbl_advisor_availability_time_slots');

                    

                    $this->db->where('advisor_id',$user_id);

                    $this->db->delete('tbl_advisor_availability_slots_datewise');                   

                    $result = $this->db->insert($table,$InsertData);                  

                          

                 

                            // Condition for the repeated time it code for weekly 

                            if($repeated == 'weekly')

                            {

                                 for ($i = strtotime($startDate); $i <= strtotime($endDate); $i = strtotime('+1 day', $i))

                                 {                                   

                                        if (date('N', $i) == 1 && $monday == 1)

                                        { //Monday == 1

                                            $insertdate = date('Y-m-d', $i); //prints the date only if it's a Monday

                                            $Insertslots =  array(

                                                 'advisor_id'=>$user_id,

                                                     'dates'=>$insertdate,

                                                     'start_time'=>$start_time,

                                                     'start_time_am_pm'=>$start_time_am_pm,

                                                     'end_time_am_pm'=>$end_time_am_pm,

                                                     'end_time'=>$end_time              

                                                    );

                                                 $result = $this->db->insert('tbl_advisor_availability_slots_datewise',$Insertslots);

                                         }



                                         if (date('N', $i) == 2 && $tuesday == 1)

                                         { //Tuesday == 2

                                            $insertdate = date('Y-m-d', $i); //prints the date only if it's a Tuesday

                                            $Insertslots =  array(

                                                     'advisor_id'=>$user_id,

                                                     'dates'=>$insertdate,

                                                     'start_time'=>$start_time,

                                                     'start_time_am_pm'=>$start_time_am_pm,

                                                     'end_time_am_pm'=>$end_time_am_pm,                                                  

                                                     'end_time'=>$end_time              

                                                    );

                                                 $result = $this->db->insert('tbl_advisor_availability_slots_datewise',$Insertslots);

                                         }

                                         

                                         

                                         

                                        if (date('N', $i) == 3 && $wednesday == 1)

                                        { //Wednesday == 3

                                            $insertdate = date('Y-m-d', $i); //prints the date only if it's a Wednesday

                                             $Insertslots =  array(

                                                     'advisor_id'=>$user_id,

                                                     'dates'=>$insertdate,

                                                     'start_time'=>$start_time,

                                                     'start_time_am_pm'=>$start_time_am_pm,

                                                     'end_time_am_pm'=>$end_time_am_pm,

                                                     'end_time'=>$end_time              

                                                    );

                                                 $result = $this->db->insert('tbl_advisor_availability_slots_datewise',$Insertslots);

                                         }

                                    

                                        

                                        

                                        if (date('N', $i) == 4 && $thursday == 1)

                                        { //Thursday == 4

                                            $insertdate = date('Y-m-d', $i); //prints the date only if it's a Thursday

                                           $Insertslots =  array(

                                                     'advisor_id'=>$user_id,

                                                     'dates'=>$insertdate,

                                                     'start_time'=>$start_time,

                                                     'start_time_am_pm'=>$start_time_am_pm,

                                                     'end_time_am_pm'=>$end_time_am_pm,

                                                     'end_time'=>$end_time              

                                                    );

                                                 $result = $this->db->insert('tbl_advisor_availability_slots_datewise',$Insertslots);

                                         }

                                    

                                    

                                    

                                    

                                         if (date('N', $i) == 5 && $friday == 1)

                                        { //Friday == 5

                                           $insertdate = date('Y-m-d', $i); //prints the date only if it's a Friday

                                           $Insertslots =  array(

                                                     'advisor_id'=>$user_id,

                                                     'dates'=>$insertdate,

                                                     'start_time'=>$start_time,

                                                     'start_time_am_pm'=>$start_time_am_pm,

                                                     'end_time_am_pm'=>$end_time_am_pm,

                                                     'end_time'=>$end_time              

                                                    );

                                                 $result = $this->db->insert('tbl_advisor_availability_slots_datewise',$Insertslots);

                                         }                              

                                         if (date('N', $i) == 6 && $saturday == 1){ //Saturday == 6

                                            $insertdate = date('Y-m-d', $i); //prints the date only if it's a Saturday

                                           $Insertslots =  array(

                                                     'advisor_id'=>$user_id,

                                                     'dates'=>$insertdate,

                                                     'start_time'=>$start_time,

                                                     'start_time_am_pm'=>$start_time_am_pm,

                                                     'end_time_am_pm'=>$end_time_am_pm,

                                                     'end_time'=>$end_time              

                                                    );

                                                 $result = $this->db->insert('tbl_advisor_availability_slots_datewise',$Insertslots);

                                         }

                                    

                                    

                                    

                                    

                                         if (date('N', $i) == 7 && $sunday == 1)

                                         { //Sunday == 7

                                           $insertdate = date('Y-m-d', $i); //prints the date only if it's a Sunday

                                           $Insertslots =  array(

                                                     'advisor_id'=>$user_id,

                                                     'dates'=>$insertdate,

                                                     'start_time'=>$start_time,

                                                     'start_time_am_pm'=>$start_time_am_pm,

                                                     'end_time_am_pm'=>$end_time_am_pm,

                                                     'end_time'=>$end_time              

                                                    );

                                                 $result = $this->db->insert('tbl_advisor_availability_slots_datewise',$Insertslots);

                                         } 

                                          

                                    }    

                                 } 

                                 else if($repeated == 'daily')

                                 {



                                       $daterange = new DatePeriod($begin, new DateInterval('P1D'), $end);

                                        foreach($daterange as $date)

                                        {

                                            $insertdate = $date->format("Y-m-d");

                                            $Insertslots =  array(

                                                     'advisor_id'=>$user_id,

                                                     'dates'=>$insertdate,

                                                     'start_time'=>$start_time,

                                                     'start_time_am_pm'=>$start_time_am_pm,

                                                     'end_time_am_pm'=>$end_time_am_pm,

                                                     'end_time'=>$end_time              

                                                    );

                                                 $result = $this->db->insert('tbl_advisor_availability_slots_datewise',$Insertslots);

                                        }

                                        

                                 }

                                 else if($repeated == 'monthly')

                                 {

                                     

                                        $daterange = new DatePeriod($begin, new DateInterval('P1M'), $end);

                                        foreach($daterange as $date)

                                        {

                                            $insertdate = $date->format("Y-m-d");

                                            $Insertslots =  array(

                                                     'advisor_id'=>$user_id,

                                                     'dates'=>$insertdate,

                                                     'start_time'=>$start_time,

                                                     'start_time_am_pm'=>$start_time_am_pm,

                                                     'end_time_am_pm'=>$end_time_am_pm,

                                                     'end_time'=>$end_time              

                                                    );

                                                 $result = $this->db->insert('tbl_advisor_availability_slots_datewise',$Insertslots);

                                        }

                                 

                                 }

  

                          if($result)

                          {

                            $this->response(array('success'=>'true','message'=>'Time slots insert Successfully'),200);

                          }         

                                

                }

                else 

                {   

                    $result = $this->db->insert($table,$InsertData);

                    // Condition for the repeated time it code for weekly 

                    if($repeated == 'weekly')

                    {

                         for ($i = strtotime($startDate); $i <= strtotime($endDate); $i = strtotime('+1 day', $i)) 

                         {                           

                                if (date('N', $i) == 1 && $monday == 1)

                                { //Monday == 1

                                   $insertdate = date('Y-m-d', $i); //prints the date only if it's a Monday

                                    $Insertslots =  array(

                                         'advisor_id'=>$user_id,

                                             'dates'=>$insertdate,

                                             'start_time'=>$start_time,

                                             'start_time_am_pm'=>$start_time_am_pm,

                                             'end_time_am_pm'=>$end_time_am_pm,

                                             'end_time'=>$end_time              

                                            );

                                         $result = $this->db->insert('tbl_advisor_availability_slots_datewise',$Insertslots);

                                 }                           

                                 

                                if (date('N', $i) == 2 && $tuesday == 1)

                                { //Tuesday == 2

                                   $insertdate = date('Y-m-d', $i); //prints the date only if it's a Tuesday

                                   $Insertslots =  array(

                                             'advisor_id'=>$user_id,

                                             'dates'=>$insertdate,

                                             'start_time'=>$start_time,

                                             'start_time_am_pm'=>$start_time_am_pm,

                                             'end_time_am_pm'=>$end_time_am_pm,                                                  

                                             'end_time'=>$end_time              

                                            );

                                         $result = $this->db->insert('tbl_advisor_availability_slots_datewise',$Insertslots);

                                 }

                                 

                                 

                                 

                                if (date('N', $i) == 3 && $wednesday == 1)

                                { //Wednesday == 3

                                    $insertdate = date('Y-m-d', $i); //prints the date only if it's a Wednesday

                                    $Insertslots =  array(

                                             'advisor_id'=>$user_id,

                                             'dates'=>$insertdate,

                                             'start_time'=>$start_time,

                                             'start_time_am_pm'=>$start_time_am_pm,

                                             'end_time_am_pm'=>$end_time_am_pm,

                                             'end_time'=>$end_time              

                                            );

                                    $result = $this->db->insert('tbl_advisor_availability_slots_datewise',$Insertslots);

                                 }

                            

                                

                                

                                 if (date('N', $i) == 4 && $thursday == 1)

                                 { //Thursday == 4

                                    $insertdate = date('Y-m-d', $i); //prints the date only if it's a Thursday

                                   $Insertslots =  array(

                                             'advisor_id'=>$user_id,

                                             'dates'=>$insertdate,

                                             'start_time'=>$start_time,

                                             'start_time_am_pm'=>$start_time_am_pm,

                                             'end_time_am_pm'=>$end_time_am_pm,

                                             'end_time'=>$end_time              

                                            );

                                         $result = $this->db->insert('tbl_advisor_availability_slots_datewise',$Insertslots);

                                 }

                            

                            

                            

                            

                                 if (date('N', $i) == 5 && $friday == 1)

                                 { //Friday == 5

                                    $insertdate = date('Y-m-d', $i); //prints the date only if it's a Friday

                                   $Insertslots =  array(

                                             'advisor_id'=>$user_id,

                                             'dates'=>$insertdate,

                                             'start_time'=>$start_time,

                                             'start_time_am_pm'=>$start_time_am_pm,

                                             'end_time_am_pm'=>$end_time_am_pm,

                                             'end_time'=>$end_time              

                                            );

                                         $result = $this->db->insert('tbl_advisor_availability_slots_datewise',$Insertslots);

                                 }

                            

                            

                            

                            

                                 if (date('N', $i) == 6 && $saturday == 1)

                                 { //Saturday == 6

                                    $insertdate = date('Y-m-d', $i); //prints the date only if it's a Saturday

                                   $Insertslots =  array(

                                             'advisor_id'=>$user_id,

                                             'dates'=>$insertdate,

                                             'start_time'=>$start_time,

                                             'start_time_am_pm'=>$start_time_am_pm,

                                             'end_time_am_pm'=>$end_time_am_pm,

                                             'end_time'=>$end_time              

                                            );

                                         $result = $this->db->insert('tbl_advisor_availability_slots_datewise',$Insertslots);

                                 }

                            

                            

                            

                            

                                 if (date('N', $i) == 7 && $sunday == 1)

                                 { //Sunday == 7

                                   $insertdate = date('Y-m-d', $i); //prints the date only if it's a Sunday

                                   $Insertslots =  array(

                                             'advisor_id'=>$user_id,

                                             'dates'=>$insertdate,

                                             'start_time'=>$start_time,

                                             'start_time_am_pm'=>$start_time_am_pm,

                                             'end_time_am_pm'=>$end_time_am_pm,

                                             'end_time'=>$end_time              

                                            );

                                         $result = $this->db->insert('tbl_advisor_availability_slots_datewise',$Insertslots);

                                 } 

                                  

                            }    

                         } 

                         else if($repeated == 'daily')

                         {



                               $daterange = new DatePeriod($begin, new DateInterval('P1D'), $end);

                                foreach($daterange as $date)

                                {

                                    $insertdate = $date->format("Y-m-d");

                                    $Insertslots =  array(

                                             'advisor_id'=>$user_id,

                                             'dates'=>$insertdate,

                                             'start_time'=>$start_time,

                                             'start_time_am_pm'=>$start_time_am_pm,

                                             'end_time_am_pm'=>$end_time_am_pm,

                                             'end_time'=>$end_time              

                                            );

                                         $result = $this->db->insert('tbl_advisor_availability_slots_datewise',$Insertslots);

                                }

                                

                         } 

                         else if($repeated == 'monthly')

                         {

                             

                                $daterange = new DatePeriod($begin, new DateInterval('P1M'), $end);

                                foreach($daterange as $date)

                                {

                                    $insertdate = $date->format("Y-m-d");

                                    $Insertslots =  array(

                                             'advisor_id'=>$user_id,

                                             'dates'=>$insertdate,

                                             'start_time'=>$start_time,

                                             'start_time_am_pm'=>$start_time_am_pm,

                                             'end_time_am_pm'=>$end_time_am_pm,

                                             'end_time'=>$end_time              

                                            );

                                         $result = $this->db->insert('tbl_advisor_availability_slots_datewise',$Insertslots);

                                }

                         

                         }

                        if($result)

                        {

                            $this->response(array('success'=>'true','message'=>'Time slots insert Successfully'),200);

                        }

                }



        } 

    }





    function get_advisor_settings_post()

    {

        $user_id = $this->input->post('user_id');



        if($user_id=="" && $user_id==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide User Id'),200);

        }



        $this->db->select("id,advisor_id,dates");

        $this->db->from("tbl_advisor_availability_slots_datewise");

        $this->db->where('advisor_id',$user_id);

        $this->db->where('is_availability','0');

        $addedlotsdates = $this->db->get();

        $addedlotsdatess = $addedlotsdates->result();



        $this->response(array('success'=>'true','record'=>$addedlotsdatess),200);

    }



    function getTimeSlotBydateToUser_post()

    {

        $date = $this->input->post('date');

        $user_id = $this->input->post('user_id');

        $client_id = $this->input->post('client_id');

        if($date=="" && $date==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide Schedule Date'),200);

        }

        if($user_id=="" && $user_id==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide User Id'),200);

        }

        if($client_id=="" && $client_id==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide Advisor Id'),200);

        }

        $date = new DateTime($date);

        $date= $date->format('Y-m-d');

        $getSlotQiery = $this->db->query("SELECT start_time,end_time FROM tbl_advisor_availability_slots_datewise WHERE advisor_id='".$client_id."' AND dates='".$date."' AND is_availability=0 ");

        if($getSlotQiery->num_rows()>0)

        {

            //print_r($getSlotQiery->row());

            $row = $getSlotQiery->row();

            $start_time = $row->start_time;

            $end_time = $row->end_time;

            $option = '<option value="" selected="">Select Time Slot</option>';

            $getslot = $this->db->query("SELECT id,start_time_end_time FROM tbl_admin_time_slot WHERE start_time>='".$start_time."' AND end_time<='".$end_time."' ")->result();



            $this->response(array('success'=>'true','record'=>$getslot),200);







        }

        else

        {

            $this->response(array('success'=>'false','message'=>'The Advisor is not Available on selected date'),200);

        }

        

    }



    function scheduleAppoinment_post()

    {

        $user_id = $this->input->post('user_id');

        $advisor_id = $this->input->post('advisor_id');

        $datetime = date('Y-m-d H:i:s');

        $date = $this->input->post('date');

        $time_slot = $this->input->post('time_slot');



        if($date=="" && $date==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide Schedule Date'),200);

        }

        if($user_id=="" && $user_id==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide User Id'),200);

        }

        if($advisor_id=="" && $advisor_id==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide Advisor Id'),200);

        }



        if($time_slot=="" && $time_slot==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide Time Slot Id'),200);

        }



        $date = new DateTime($date);

        $date= $date->format('Y-m-d');



        $getSlotQiery = $this->db->query("SELECT start_time,end_time FROM tbl_advisor_availability_slots_datewise WHERE advisor_id='".$advisor_id."' AND dates='".$date."' AND is_availability=0 ");

        if($getSlotQiery->num_rows()==0)

        {

            $this->response(array('success'=>'false','message'=>'The Advisor is not Available on selected date'),200);

        }



        $checkAlreadySchedule = $this->db->query("SELECT * FROM tbl_user_advisor_schedule_appointment WHERE advisor_id='".$advisor_id."' AND schedule_date='".$date."' AND slot_id='".$time_slot."'");

        if($checkAlreadySchedule->num_rows()>0)

        {

            $this->response(array('success'=>'false','message'=>'The advisor is not Available on selected time slot'),200);

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



            $getUserData = $this->db->query("SELECT first_name,last_name FROM tbl_user_personel_info WHERE user_id='".$user_id."' ")->row();

            $notification = "Hi <b>".@$getUserData->first_name.' '.@$getUserData->last_name."</b> Scheduled Appointment with you on $date";

            $insertdataNotification = array(

                                        'user_one'=>$user_id,

                                        'user_two'=>$advisor_id,

                                        'type'=>3,

                                        'notification'=>$notification,

                                        'created_on'=>$datetime,

                                        );

            $this->db->insert('tbl_notifications',$insertdataNotification);



            $this->response(array('success'=>'true','message'=>'Appointment Scheduled Successfully.'),200);

        }       



    }



    function investment_client_risk_profile_post()

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

        $this->db->select('tu.email,tu.status,pi.first_name,tu.dob,pi.last_name,pi.job_type,pi.profile_image,pi.martial_status,pi.no_of_child,c.name AS country');

        $this->db->from('tbl_users tu');

        $this->db->join('tbl_user_personel_info pi', 'tu.id = pi.user_id');

        $this->db->join('countries c', 'c.id = pi.country','LEFT');

        $this->db->where('tu.id',$client_id);

        $result = $this->db->get()->row();

        $totalNumberOfQuestion = $this->db->query("SELECT * FROM tbl_questions")->num_rows();

        $numberOfAnsweredQuestion = $checkQuestionOptions = $this->db->query("SELECT a.*,b.*,COUNT(b.question_id) AS qnc FROM user_question_answer a INNER JOIN user_question_options b ON a.question_id = b.question_id  WHERE a.user_id='".$client_id."' GROUP BY b.question_id")->num_rows();

        $agePercentage = 0;

        $maritalStatusPercentage = 0;

        $jobTypePercentage = 0;

        $knowledgePercenrage = 0;

        //Age calculation

        $age = $this->common->calculateage($result->dob);

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

        $all_money = '0';

        $money_use_percentage = 100;

        $get_exitsing_rf_rv_option_value = $this->db->query("SELECT * FROM tbl_user_rf_rv_options_values WHERE user_id='".$client_id."'");

        if($get_exitsing_rf_rv_option_value->num_rows()>0)

        {

            $rf_rv_row = $get_exitsing_rf_rv_option_value->row();

            $RF = $rf_rv_row->rf;

            $RV = $rf_rv_row->rv;

            $option = $rf_rv_row->options;



            $all_money = $rf_rv_row->all_money;

            $money_use_percentage = $rf_rv_row->money_use_percentage;

        }



        $sql1="SELECT count(m.user_id) from tbl_user_investments_management m where m.investments_id=a.investments_id and m.user_id='".$client_id."'";

        if($risk_percent>=0 && $risk_percent<=50)

        {

            $investment_ibex35 = $this->db->query("SELECT a.investments_id AS fund_id,a.fund_name,a.investments_type,a.fund_commission,fund_type,($sql1) as exist  FROM tbl_admin_investments a WHERE a.investments_type=1 AND fund_type='Risky funds' ORDER BY a.investments_id DESC LIMIT 10")->result();

        }



        if($risk_percent>=51 && $risk_percent<=75)

        {

            $investment_ibex35 = $this->db->query("SELECT a.investments_id AS fund_id,a.fund_name,a.investments_type,a.fund_commission,fund_type,($sql1) as exist  FROM tbl_admin_investments a WHERE a.investments_type=1 AND fund_type='moderate funds' ORDER BY a.investments_id DESC LIMIT 10")->result();

        }

        if($risk_percent>=75 && $risk_percent<=100)

        {

            $investment_ibex35 = $this->db->query("SELECT a.investments_id AS fund_id,a.fund_name,a.investments_type,a.fund_commission,fund_type,($sql1) as exist  FROM tbl_admin_investments a WHERE a.investments_type=1 AND fund_type='Conservative funds' ORDER BY a.investments_id DESC LIMIT 10")->result();

        }

        //check user acceptance

        $check_request = $this->db->query("SELECT * FROM tbl_user_adviser_referral_code_connectivity  WHERE user_id='".$client_id."' AND advisor_id='".$user_id."'");

        if($check_request->num_rows()>0)

        {

            $status = $check_request->row()->status;

            if($status==0)

            {

                $requested = 0;

            }

            else

            {

                $requested = 1;

            }

        }

        else

        {

            $requested = 2;

        }



        $this->response(array('success'=>'true','record'=>$result,'risk_percent'=>$risk_percent,'all_money'=>$all_money,'money_use_percentage'=>$money_use_percentage,'suggested_funds'=>$investment_ibex35,'requested'=>$requested),200);

    }



    function calculator_calculations_post()
    {

        $user_id = $this->input->post('user_id');

        $actual_age = $this->input->post('actual_age');

        $expected_age = $this->input->post('expected_age');

        $retirement_age = $this->input->post('retirement_age');



        $initial_capital = $this->input->post('initial_capital');

        $required_capital = $this->input->post('required_capital');

        $annual_contributions = $this->input->post('annual_contributions');

        $interest_rate = $this->input->post('interest_rate');

        if($user_id=="" && $user_id==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);

        }

        if($actual_age=="" && $actual_age==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide  Actual Age'),200);

        }

        if($expected_age=="" && $expected_age==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide  Expected Age'),200);

        }

        if($retirement_age=="" && $retirement_age==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide  Retirement Age'),200);

        }

        if($initial_capital=="" && $initial_capital==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide  Initial Capital'),200);

        }

        if($required_capital=="" && $required_capital==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide  Required Capital'),200);

        }

        if($annual_contributions=="" && $annual_contributions==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide  Annual Contribution'),200);

        }

        if($interest_rate=="" && $interest_rate==null)

        {

            $this->response(array('success'=>'false','message'=>'Please Provide Interest Rate'),200);

        }

        $year_savings = 0;

        $years_after_retire = 0;

        $year_savings = $retirement_age-$actual_age;

        $years_after_retire = $expected_age-$retirement_age;



        //echo $years_after_retire;

        $totalAmount = 0;

        $totalAmount+=$initial_capital;



        $annualBalance = 0;



        $dataArr = array();

        $resultArr = array();

        

        for($i=1;$i<=$year_savings;$i++)

        {

            $totalAmount = $totalAmount+$annualBalance+((($totalAmount+$annualBalance)*$interest_rate)/100);

            $annualBalance = $annual_contributions;



            //echo $totalAmount."<br>";

            //echo number_format($totalAmount,2,".","")."<br>";

            $dataArr['year'] = $i." year";

            $dataArr['interest'] = number_format($totalAmount,2,".","");

            array_push($resultArr, $dataArr);

        }

         $this->response(array('success'=>'true','year_savings'=>$year_savings,'years_after_retire'=>$years_after_retire,'record'=>$resultArr),200);

        

    }
    function appointment_list_post()
    {
        $user_id = $this->input->post('user_id');
        if($user_id=="" && $user_id==null)
        {

            $this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);

        }
        $created_on = date("Y-m-d H:i:s");
        $todatdate = date("Y-m-d");

        $todays_appointments = $this->db->query("SELECT a.id,a.schedule_date,b.id AS user_id,b.email,c.first_name,c.last_name,d.start_time,d.end_time FROM tbl_user_advisor_schedule_appointment a INNER JOIN tbl_users b ON a.user_id=b.id INNER JOIN tbl_user_personel_info c ON a.user_id=c.user_id INNER JOIN tbl_admin_time_slot d  ON a.slot_id=d.id WHERE a.advisor_id='".$user_id."' AND a.schedule_date='".$todatdate."'")->result();
        $all_appointments = $this->db->query("SELECT a.id,a.schedule_date,b.id AS user_id,b.email,c.first_name,c.last_name,d.start_time,d.end_time FROM tbl_user_advisor_schedule_appointment a INNER JOIN tbl_users b ON a.user_id=b.id INNER JOIN tbl_user_personel_info c ON a.user_id=c.user_id INNER JOIN tbl_admin_time_slot d  ON a.slot_id=d.id WHERE a.advisor_id='".$user_id."' ORDER BY a.schedule_date DESC")->result();

        $apps = $this->db->query("SELECT a.id,a.schedule_date,b.id AS user_id,b.email,c.first_name,c.last_name,d.start_time,d.end_time FROM tbl_user_advisor_schedule_appointment a INNER JOIN tbl_users b ON a.user_id=b.id INNER JOIN tbl_user_personel_info c ON a.user_id=c.user_id INNER JOIN tbl_admin_time_slot d  ON a.slot_id=d.id WHERE a.advisor_id='".$user_id."' ORDER BY a.schedule_date ASC")->result();
        $dataTodayArr = array();
        $recordTodayArr = array();

        $upcomingTodayArr = array();
        $recordUpcomingArr = array();

        $dataAllArr = array();
        $recordAllArr = array();
        $tDate = date('Y-m-d');
        foreach($apps as $appppp)
        {
            if($appppp->schedule_date==$tDate)
            {
                $dataTodayArr['id'] = $appppp->id;
                $dataTodayArr['schedule_date'] = $appppp->schedule_date;
                $dataTodayArr['user_id'] = $appppp->user_id;
                $dataTodayArr['email'] = $appppp->email;
                $dataTodayArr['first_name'] = $appppp->first_name;
                $dataTodayArr['last_name'] = $appppp->last_name;
                $dataTodayArr['start_time'] = $appppp->start_time;
                $dataTodayArr['end_time'] = $appppp->end_time;
                array_push($recordTodayArr, $dataTodayArr);
            }
            if($appppp->schedule_date>$tDate)
            {
                $upcomingTodayArr['id'] = $appppp->id;
                $upcomingTodayArr['schedule_date'] = $appppp->schedule_date;
                $upcomingTodayArr['user_id'] = $appppp->user_id;
                $upcomingTodayArr['email'] = $appppp->email;
                $upcomingTodayArr['first_name'] = $appppp->first_name;
                $upcomingTodayArr['last_name'] = $appppp->last_name;
                $upcomingTodayArr['start_time'] = $appppp->start_time;
                $upcomingTodayArr['end_time'] = $appppp->end_time;
                array_push($recordUpcomingArr, $upcomingTodayArr);
            }
            $dataAllArr['id'] = $appppp->id;
            $dataAllArr['schedule_date'] = $appppp->schedule_date;
            $dataAllArr['user_id'] = $appppp->user_id;
            $dataAllArr['email'] = $appppp->email;
            $dataAllArr['first_name'] = $appppp->first_name;
            $dataAllArr['last_name'] = $appppp->last_name;
            $dataAllArr['start_time'] = $appppp->start_time;
            $dataAllArr['end_time'] = $appppp->end_time;
            array_push($recordAllArr, $dataAllArr);
        }
        //print_r($app);die;

        $this->response(array('success'=>'true','todays_appointments'=>$recordTodayArr,'upcomings_appointments'=>$recordUpcomingArr,'all_appointments'=>$recordAllArr),200);
    }

    function save_extra_setting_post()
    {
        $user_id = $this->input->post('user_id');
        $stockPickingBasedOn = $this->input->post('stockPickingBasedOn');
        if($user_id=="" && $user_id==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
        }
        if($stockPickingBasedOn=="" && $stockPickingBasedOn==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide  Stock Picking Based On'),200);
        }
        $created_on = date("Y-m-d H:i:s");
        $checkExisting = $this->db->query("SELECT * FROM tbl_users_extra_settings WHERE user_id='".$user_id."'")->num_rows();
        if($checkExisting>0)
        {
            $update = array(
                            'StockPickingBasedOn'=>$stockPickingBasedOn,
                            );
            $this->db->where('user_id',$user_id);
            $this->db->update('tbl_users_extra_settings',$update);
            $this->response(array('success'=>'true','message'=>'Data Saved Successfully'),200);
        }
        else
        {
            $InsertData = array(
                            'user_id'=>$user_id,
                            'StockPickingBasedOn'=>$stockPickingBasedOn,
                            'created_on'=>$created_on
                            );
            $this->db->insert('tbl_users_extra_settings',$InsertData);
            $this->response(array('success'=>'true','message'=>'Data Saved Successfully'),200);
        }

    }
    function send_request_to_advisor_post()
    {
        $user_id = $this->input->post('user_id');
        $client_id = $this->input->post('advisor_id');
        if($user_id=="" && $user_id==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide User Id'),200);
        }
        if($client_id=="" && $client_id==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide Advisor Id'),200);
        }
        $datetime = date("Y-m-d H:i:s");
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
            $getUserData = $this->db->query("SELECT first_name,last_name FROM tbl_user_personel_info WHERE user_id='".$user_id."' ")->row();

            $notification = "Hi <b>".$getUserData->first_name.' '.$getUserData->last_name."</b> Sent you request to be your client";
            $insertNotification = array(
                                        'user_one'=>$user_id,
                                        'user_two'=>$client_id,
                                        'type'=>2,
                                        'notification'=>$notification,
                                        'created_on'=>$datetime,
                                        );
            $this->db->insert('tbl_notifications',$insertNotification);
        }
        $this->response(array('success'=>'true','message'=>'You have sent request successfully'),200);
    }
    function removeConnectivityToAdvisor_post()
    {
        $user_id = $this->input->post('user_id');
        $client_id = $this->input->post('client_id');
        if($user_id=="" && $user_id==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide User Id'),200);
        }
        if($client_id=="" && $client_id==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide Client Id'),200);
        }

        $datetime = date("Y-m-d H:i:s");
        $check_existing_connectivity = $this->db->query("SELECT * FROM tbl_user_adviser_referral_code_connectivity WHERE user_id='".$user_id."' AND advisor_id='".$client_id."'");
        if($check_existing_connectivity->num_rows()>0)
        {
            $this->db->where('user_id',$user_id);
            $this->db->where('advisor_id',$client_id);
            $this->db->delete('tbl_user_adviser_referral_code_connectivity');
            //delete rating

            $this->db->where('user_id',$user_id);
            $this->db->where('client_id',$client_id);
            $this->db->delete('tbl_advisor_rating_reviews');
        }

        $this->response(array('success'=>'true','message'=>'Client has been removed successfully'),200);
    }
    function declineRequestToUserByAdvisor_post()
    {
        $user_id = $this->input->post('user_id');
        $client_id = $this->input->post('client_id');
        if($user_id=="" && $user_id==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide User Id'),200);
        }
        if($client_id=="" && $client_id==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide Client Id'),200);
        }

        $datetime = date("Y-m-d H:i:s");
        $check_existing_connectivity = $this->db->query("SELECT * FROM tbl_user_adviser_referral_code_connectivity WHERE user_id='".$client_id."' AND advisor_id='".$user_id."'");
        if($check_existing_connectivity->num_rows()>0)
        {
            $this->db->where('user_id',$client_id);
            $this->db->where('advisor_id',$user_id);
            $this->db->delete('tbl_user_adviser_referral_code_connectivity');
            //delete rating

            $this->db->where('user_id',$user_id);
            $this->db->where('client_id',$client_id);
            $this->db->delete('tbl_advisor_rating_reviews');

            //send notification 
            $getUserData = $this->db->query("SELECT first_name,last_name FROM tbl_user_personel_info WHERE user_id='".$user_id."' ")->row();

            $notification = "Hi <b>".$getUserData->first_name.' '.$getUserData->last_name."</b> Declined you request";

            $insertNotification = array(
                                        'user_one'=>$user_id,
                                        'user_two'=>$client_id,
                                        'type'=>2,
                                        'notification'=>$notification,
                                        'created_on'=>$datetime,
                                        );
            $this->db->insert('tbl_notifications',$insertNotification);
        }
        $record_array = $this->getClientListFunction($user_id);
        $this->response(array('success'=>'true','message'=>'Client has been declined successfully','record'=>$record_array),200);
    }
    function removeConnectivityToUser_post()
    {
        $user_id = $this->input->post('user_id');
        $client_id = $this->input->post('client_id');
        if($user_id=="" && $user_id==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide User Id'),200);
        }
        if($client_id=="" && $client_id==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide Client Id'),200);
        }
        $datetime = date("Y-m-d H:i:s");
        $check_existing_connectivity = $this->db->query("SELECT * FROM tbl_user_adviser_referral_code_connectivity WHERE user_id='".$client_id."' AND advisor_id='".$user_id."'");
        if($check_existing_connectivity->num_rows()>0)
        {
            $this->db->where('user_id',$client_id);
            $this->db->where('advisor_id',$user_id);
            $this->db->delete('tbl_user_adviser_referral_code_connectivity');
            //delete rating

            $this->db->where('user_id',$user_id);
            $this->db->where('client_id',$client_id);
            $this->db->delete('tbl_advisor_rating_reviews');
        }
        $record_array = $this->getClientListFunction($user_id);
        $this->response(array('success'=>'true','message'=>'Client has been removed successfully','record'=>$record_array),200);
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
        $record_array = $this->getClientListFunction($user_id);
        $this->response(array('success'=>'true','message'=>'Request Approved successfully','record'=>$record_array),200);
    }
    function cancelRequsetToAdvisor_post()
    {
        $user_id = $this->input->post('user_id');
        $client_id = $this->input->post('advisor_id');
        if($user_id=="" && $user_id==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide User Id'),200);
        }
        if($client_id=="" && $client_id==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide Advisor Id'),200);
        }

        $datetime = date("Y-m-d H:i:s");
        $check_existing_connectivity = $this->db->query("SELECT * FROM tbl_user_adviser_referral_code_connectivity WHERE user_id='".$user_id."' AND advisor_id='".$client_id."'");
        if($check_existing_connectivity->num_rows()>0)
        {
            $this->db->where('user_id',$user_id);
            $this->db->where('advisor_id',$client_id);
            $this->db->delete('tbl_user_adviser_referral_code_connectivity');
            //delete rating

            $this->db->where('user_id',$user_id);
            $this->db->where('client_id',$client_id);
            $this->db->delete('tbl_advisor_rating_reviews');
        }
        $this->response(array('success'=>'true','message'=>'your request cancelled successfully'),200);
    }
    function makeOnlineOffline_post()
    {
        $user_id = $this->input->post('user_id');
        $onlineStatus = $this->input->post('onlineStatus');

        if($user_id=="" && $user_id==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide User Id'),200);
        }
        if($onlineStatus=="" && $onlineStatus==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide online status'),200);
        }
        $this->db->where('id',$user_id);
        $this->db->update('tbl_users',array('onlineStatus'=>$onlineStatus));
        $this->response(array('success'=>'true','message'=>'success'),200);
    }

}