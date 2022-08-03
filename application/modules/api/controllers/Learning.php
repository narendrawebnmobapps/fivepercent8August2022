<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'libraries/REST_Controller.php';
class Learning extends REST_Controller
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
    function user_learning_post()
    {
    	$user_id = $this->input->post('user_id');
    	if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
		}
		$userLearning = $this->db->query("SELECT questions,answer FROM  tbl_user_advisor_learning WHERE type=1")->result();
		$this->response(array('success'=>'true','record'=>$userLearning),200);
    }
    function advisor_learning_post()
    {
    	$user_id = $this->input->post('user_id');
    	if($user_id=="" && $user_id==null)
		{
			$this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
		}
		$userLearning = $this->db->query("SELECT questions,answer FROM  tbl_user_advisor_learning WHERE type=2")->result();
		$this->response(array('success'=>'true','record'=>$userLearning),200);
    }

    function user_test_list_post()
    {
        $user_id = $this->input->post('user_id');
        if($user_id=="" && $user_id==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide  User Id'),200);
        }
        $getUserType = $this->db->query("SELECT user_type FROM tbl_users WHERE id='".$user_id."'");
        $row = $getUserType->row();
        if($row->user_type==0)
        {
            $type = 1;
        }
        if($row->user_type==1)
        {
            $type = 2;
        }
        $recordarray = array();
        $data_arr = array();
        //$testLists= $this->db->query("SELECT distinct(test_number)  FROM tbl_admin_test_questions WHERE type=1")->result();

        $count_answered_query = "SELECT count(a.question_id)  FROM users_test_question_options a INNER JOIN users_test_question_answers b ON a.question_id=b.question_id INNER JOIN tbl_admin_test_questions c ON a.question_id =c.id WHERE c.test_number=d.test_number AND a.user_id='".$user_id."'";
        $testLists =  $this->db->query("SELECT distinct(d.test_number), ($count_answered_query) AS answered FROM tbl_admin_test_questions d WHERE d.type='".$type."' ")->result();
        foreach($testLists as $test)
        {
            $data_arr['test_number'] = $test->test_number; 
            if($test->answered>0)
            {
                $data_arr['submit'] = "1";
            }
            else
            {
                $data_arr['submit'] = "0";
            }
            array_push($recordarray, $data_arr);
        }

        $this->response(array('success'=>'true','record'=>$recordarray),200);
    }
    function user_test_details_list_post()
    {
        $user_id = $this->input->post('user_id');
        $test_number = $this->input->post('test_number');
        if($user_id=="" && $user_id==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide user Id'),200);
        }
        if($test_number=="" && $test_number==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide Test Number'),200);
        }
        $getUserType = $this->db->query("SELECT user_type FROM tbl_users WHERE id='".$user_id."'");
        $row = $getUserType->row();
        if($row->user_type==0)
        {
            $type = 1;
        }
        if($row->user_type==1)
        {
            $type = 2;
        }

        $recordarray = array();
        $data_arr = array();
        $datetime = date('Y-m-d H:i:s');

        $value_query = "SELECT b.value FROM users_test_question_options b WHERE a.id=b.options AND b.user_id='".$user_id."'";
        $answer_query = "SELECT COUNT(c.options) FROM users_test_question_options c WHERE a.id=c.options AND c.user_id='".$user_id."'";

        $resultdata = $this->db->query("SELECT * FROM tbl_admin_test_questions WHERE test_number='".$test_number."' AND type='".$type."' ")->result();
        foreach($resultdata as $res)
        {
            $data_arr['question'] = $res->question;
            $data_arr['id'] = $res->id;
            $options = $this->db->query("SELECT a.id,a.options,($value_query) AS answer,($answer_query) AS selected FROM tbl_admin_test_question_options a WHERE a.question_id='".$res->id."'")->result();
            $data_arr['options'] = $options;
            array_push($recordarray, $data_arr);
        }
        $this->response(array('success'=>'true','record'=>$recordarray),200);
    }
    function save_user_test_post()
    {
        $user_id = $this->input->post('user_id');
        $test_number = $this->input->post('test_number');
        $datetime = date('Y-m-d H:i:s');
        if($user_id=="" && $user_id==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide user Id'),200);
        }
        if($test_number=="" && $test_number==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide Test Number'),200);
        }
            $arr = (json_decode($_POST['question']));
            for($i=0;$i<count($arr);$i++)
            {
                $this->db->where('question_id',$arr[$i]->id);
                $this->db->where('user_id',$user_id);
                $this->db->delete('users_test_question_options');
                $check_existing = $this->db->query("SELECT * FROM users_test_question_answers WHERE user_id='".$user_id."' AND question_id='".$arr[$i]->id."'")->num_rows();
                if($check_existing==0)
                {
                    $question_array = array(
                                        'user_id'=>$user_id,
                                        'question_id'=>$arr[$i]->id,
                                        'created_on'=>$datetime,
                                        'updated_on'=>$datetime,
                                        );
                    $this->db->insert('users_test_question_answers',$question_array);
                    
                }
                for($j=0;$j<count($arr[$i]->option);$j++)
                {
                    //echo $arr[$i]->option[$j]->id."<br>";
                    $check_option_existing = $this->db->query("SELECT * FROM users_test_question_options WHERE user_id='".$user_id."' AND question_id='".$arr[$i]->id."' AND options='".$arr[$i]->option[$j]->id."' ")->num_rows();
                    if($check_option_existing>0)
                    {
                        $option_arr = array(
                                        'value'=>$arr[$i]->option[$j]->value,
                                        'created_on'=>$datetime,
                                        'updated_on'=>$datetime,
                                        );
                        $this->db->where('user_id',$user_id);
                        $this->db->where('question_id',$arr[$i]->id);
                        $this->db->where('options',$arr[$i]->option[$j]->id);
                        $this->db->update('users_test_question_options',$option_arr);
                    }
                    else
                    {
                        $option_arr = array(
                                        'user_id'=>$user_id,
                                        'question_id'=>$arr[$i]->id,
                                        'options'=>$arr[$i]->option[$j]->id,
                                        'value'=>$arr[$i]->option[$j]->value,
                                        'created_on'=>$datetime,
                                        'updated_on'=>$datetime,
                                        );
                        $this->db->insert('users_test_question_options',$option_arr);
                    }
                    
                }                       
                
            }   
        $this->response(array('success'=>'true','message'=>'completed'),200);
    }
    function show_user_test_result_post()
    {

        $user_id = $this->input->post('user_id');
        $test_number = $this->input->post('test_number');
        $datetime = date('Y-m-d H:i:s');
        if($user_id=="" && $user_id==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide user Id'),200);
        }
        if($test_number=="" && $test_number==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide Test Number'),200);
        }
        $getUserType = $this->db->query("SELECT user_type FROM tbl_users WHERE id='".$user_id."'");
        $row = $getUserType->row();
        if($row->user_type==0)
        {
            $type = 1;
        }
        if($row->user_type==1)
        {
            $type = 2;
        }
        $data = array();
        $recordarray = array();
        $data_arr = array();  

        $correct=0;
        $data['total_question'] = $this->db->query("SELECT * FROM tbl_admin_test_questions WHERE test_number='".$test_number."' AND type=1")->num_rows(); 
        //$resultdata = $this->db->query("SELECT a.options,b.question_id,c.question FROM users_test_question_options a INNER JOIN users_test_question_answers b ON a.question_id=b.question_id INNER JOIN tbl_admin_test_questions c ON b.question_id=c.id WHERE a.user_id='".$user_id."' AND b.user_id='".$user_id."' AND  c.test_number='".$test_number."' AND type=1")->result();

       // $resultdata = $this->db->query("SELECT  a.question_id,b.question FROM users_test_question_answers a INNER JOIN tbl_admin_test_questions b ON a.question_id=b.id WHERE a.user_id='".$user_id."' AND b.test_number=1 AND b.type=1")->result();

        $resultdata = $this->db->query("SELECT a.id,a.question,b.question_id FROM tbl_admin_test_questions a LEFT JOIN users_test_question_answers b ON a.id=b.question_id WHERE  a.test_number='".$test_number."' AND a.type='".$type."' AND b.user_id='".$user_id."'")->result();
        //print_r($resultdata);die;
        $attemted = 0;
        foreach($resultdata as $res)
        {
            $data_arr['question'] = $res->question;
            $data_arr['options'] = $this->db->query("SELECT id,options,correct_option FROM tbl_admin_test_question_options WHERE question_id='".$res->id."'")->result();

            //$data_arr['correct_option'] = $this->db->query("SELECT a.question_id as question,a.options,c.options AS optionname,(SELECT count(q.question_id) from tbl_admin_test_question_options q where q.correct_option='1' and q.id=a.options) as ans from users_test_question_options a INNER JOIN tbl_admin_test_question_options c ON a.options=c.id  WHERE a.question_id='".$res->question_id."'")->row();

            $count_true = $this->db->query("SELECT a.question_id as question,a.options,c.options AS optionname,(SELECT count(q.question_id) from tbl_admin_test_question_options q where q.correct_option='1' and q.id=a.options) as ans from users_test_question_options a INNER JOIN tbl_admin_test_question_options c ON a.options=c.id  WHERE a.question_id='".$res->question_id."'");
            if($count_true->num_rows()>0)
            {
               $data_arr['correct_option']  = $count_true->row();
               if($data_arr['correct_option']->ans==1)
                {
                  $correct++;
                }
                $attemted++;
            }
            else
            {
                $data_arr['correct_option']  = array();
            }          
            
            array_push($recordarray, $data_arr);


        }
        $data['questions'] = $recordarray;
        $data['correct'] = $correct;
        $data['incorrect_answer'] = $attemted-$correct;
        $data['attemted_question'] = $attemted;
        $data['answerPercentage'] = number_format(($correct/$data['total_question'])*100,2);
       // print_r($resultdata);
        $this->response(array('success'=>'true','result'=>$data),200);
    }

    function broker_list_post()
    {
        $user_id = $this->input->post('user_id');
        if($user_id=="" && $user_id==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide user Id'),200);
        }
        $broker_list = $this->db->query("SELECT a.id AS broker_id,a.email,b.first_name,b.last_name,b.phone_number,b.profile_image,c.name AS country_name FROM tbl_users a INNER JOIN tbl_user_personel_info b ON a.id=b.user_id  LEFT JOIN countries c ON b.country=c.id WHERE a.user_type=2 AND a.status=1")->result();
        $this->response(array('success'=>'true','result'=>$broker_list),200);
    }

    function broker_details_post()
    {
        $user_id = $this->input->post('user_id');
        $broker_id = $this->input->post('broker_id');
        if($user_id=="" && $user_id==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide user Id'),200);
        }
        if($broker_id=="" && $broker_id==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide Broker Id'),200);
        }
        $broker_details = $this->db->query("SELECT a.id AS broker_id,a.email,b.first_name,b.last_name,b.phone_number,b.profile_image,b.terms_conditions,c.name AS country_name FROM tbl_users a INNER JOIN tbl_user_personel_info b ON a.id=b.user_id  LEFT JOIN countries c ON b.country=c.id WHERE a.user_type=2 AND a.id='".$broker_id."'")->row();

        $accepted = $this->db->query("SELECT COUNT(id) AS accepted FROM tbl_users_brokers_management WHERE user_id='".$user_id."' AND broker_id='".$broker_id."'")->row();


        $count_document = "SELECT COUNT(b.id) FROM tbl_user_broker_document b WHERE b.broker_id='".$broker_id."' AND b.user_id='".$user_id."' AND b.document_id=a.id";

        $documentData = $this->db->query("SELECT a.id AS doc_id,document,($count_document) AS doc_count FROM tbl_admin_broker_document a WHERE a.broker_id='".$broker_id."'")->result();

       $servicesData = $this->db->query("SELECT id AS service_id,service FROM tbl_admin_broker_services WHERE broker_id='".$broker_id."'")->result();
        $this->response(array('success'=>'true','result'=>$broker_details,'accepted'=>$accepted,'document_list'=>$documentData,'service_list'=>$servicesData),200);
    }
    function accept_broker_terms_condition_post()
    {
        $user_id = $this->input->post('user_id');
        $broker_id = $this->input->post('broker_id');
        if($user_id=="" && $user_id==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide user Id'),200);
        }
        if($broker_id=="" && $broker_id==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide Broker Id'),200);
        }
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
        $this->response(array('success'=>'true','accept'=>1,'message'=>'accepted'),200);
    }  

    function add_brokers_documents_post()
    {
        $user_id = $this->input->post('user_id');
        $broker_id = $this->input->post('broker_id');
        $document_id = $this->input->post('document_id');
        $date_time = date('Y-m-d H:i:s');
        if($user_id=="" && $user_id==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide user Id'),200);
        }
        if($broker_id=="" && $broker_id==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide Broker Id'),200);
        }
        if($document_id=="" && $document_id==null)
        {
            $this->response(array('success'=>'false','message'=>'Please Provide Document Id'),200);
        }
        $broker_doc = "";
        if($_FILES['doc']['size']>0)
         {
            $temp = explode('.', basename($_FILES['doc']['name']));

            $type2 = $_FILES["doc"]["type"];
            $new_photoid2 = explode('.',$_FILES["doc"]["name"]); 
            $broker_doc = rand(100,9999999).date('d_m_yhmi').'.' . end($new_photoid2); 
            move_uploaded_file($_FILES["doc"]["tmp_name"],"uploads/broker-doc/".$broker_doc);
          }
          $check_existing = $this->db->query("SELECT * FROM tbl_user_broker_document WHERE document_id='".$document_id."' AND user_id='".$user_id."'")->num_rows();
          if($check_existing>0)
          {
            $updatedata = array(
                            'document_id'=>$document_id,
                            'user_id'=>$user_id,
                            'broker_id'=>$broker_id,
                            'doc_file'=>$broker_doc,
                            'updated_on'=>$date_time,
                            );
            $this->db->where('user_id',$user_id);
            $this->db->where('document_id',$document_id);
            $this->db->update('tbl_user_broker_document',$updatedata);
          }
          else
          {
            $insertdata = array(
                            'document_id'=>$document_id,
                            'user_id'=>$user_id,
                            'broker_id'=>$broker_id,
                            'doc_file'=>$broker_doc,
                            'created_on'=>$date_time,
                            'updated_on'=>$date_time,
                            );
            $this->db->insert('tbl_user_broker_document',$insertdata);
          }
          
          $this->response(array('success'=>'true','message'=>'Document uploaded successfully'),200);
    }

    
}
?>