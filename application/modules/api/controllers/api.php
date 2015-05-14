<?php
class api extends MY_Controller {

        var $gallery_path;
	var $gallery_path_url;
	var $doc_path; 
        
    public function __construct() {
        	parent::__construct();
		
	 	$this->load->model('api_model');
          	$this->load->helper('form','url');  
          	$this->load->helper('text');
         	
                $this->gallery_path = realpath(APPPATH . '../assets/uploads');
		$this->gallery_path_url = $this->config->item('base_url').'assets/uploads/';
		$this->doc_path=realpath(APPPATH . '../assets/uploads/doc');
		
		
    }
    public function chatTestGetText(){ 
      $json = ($this->input->post('data'));
      $arr = json_decode($json);
      $res=$this->api_model->getChat($arr);
      echo json_encode($res,JSON_PRETTY_PRINT);
    }
    public function chatTest(){  
		   $json = ($this->input->post('data'));
		   $arr = json_decode($json);
		  $this->api_model->submitChat($arr);
	}
    
    public function index() {
        $this->load->view('home');
    }
	
	
    public function userRegister(){        
	$json = ($this->input->post('data'));
        $arr = json_decode($json);
        
        $data['userId'] =create_guid();        	
        $data['userName'] =$arr->add_email;
        $data['password'] =md5($arr->add_password);
        $data['addedOn'] =gmdate('Y-m-d H:i:s');
        $data['deleted'] ='0';
        $data['status'] =1;

        $data1['userProfileId'] =create_guid();   
        $data1['userId'] =$data['userId'];   
        $data1['email'] =$arr->add_email;
        $data1['fname'] =$arr->add_fname;
        $data1['lname'] =$arr->add_lname;

        //check if email field is empty
        if($arr->add_email == ""){
            $errorMsg=  "error : You did not enter a email.";
            $code= "3";
            $result=array("message"=>$errorMsg);
            echo json_encode($result,JSON_PRETTY_PRINT);
            exit();
        } //check for valid email 
        elseif(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $arr->add_email)){
            $errorMsg= 'error : You did not enter a valid email.';
            $code= "3";
            $result=array("message"=>$errorMsg);
            echo json_encode($result,JSON_PRETTY_PRINT);
            exit();
        }
        
        $chkEmail = $this->api_model->checkEmail($data1);

        if($chkEmail == 0){
            $res=$this->api_model->userAdd($data,$data1);
            $result=array("message"=>'Success');
        }else{
            $result=array("message"=>'Error');
        }
        echo json_encode($result,JSON_PRETTY_PRINT);
    }
    
    public function login(){
            $result = array();
            //echo '<pre>';
            $json = ($this->input->post('data'));
            $arr = json_decode($json);
            
            //print_r($arr);
            
            $data['username'] =$arr->username;
            $data['password'] =md5($arr->password);
            
            //print_r($data);
            
            //die();
            if($data['username']!='' && $data['password']!=''){
     		$res=$this->api_model->login($data);
                
                //print_r($res);
                //die();
        	if($res!=0){
                    $data1['message'] = 'Success';
                    $data1['userId'] = $res['userId'];
                    $data1['name'] = $res['fname']." ".$res['lname'];;
                    $data1['email'] = $res['email'];
        	}else{
                    $data1['message'] = 'error';
                }
            }else{
                $data1['message'] = 'error';
            }
            echo json_encode($data1,JSON_PRETTY_PRINT);
	}
        
    public function chatSave(){
        $json = ($this->input->post('data'));
        $arr = json_decode($json);
        
        $username =      $arr->username;
        $chat =          $arr->chat;
        $chat_key =      $arr->chat_key;
        $time=date("c", time());
        
        $str = serialize(array($username,$time, $chat));
        chatSave($chat_key,$str);        
    }
    public function chatList(){
        $this->load->helper('test');
        $json = ($this->input->post('data'));
        $arr = json_decode($json);
        $chat_key =      $arr->chat_key;
        echo getChat($chat_key);        
    }
    
    public function updateProfile() {
    
    echo '<pre>';
    //$data = file_get_contents($_FILES['file']['tmp_name']);
    //$data = base64_encode($data);  
    
    
	
	$result = array();
        //echo '<pre>'; //
                
        $json = ($this->input->post('data'));
        $arr = json_decode($json);
		
        $userId =          $arr->userId;
        $data['q1'] =        $arr->q1;
        $data['q2'] =        $arr->q2;
        $data['q3'] =        $arr->q3;
        $data['desc'] =        $arr->desc;
        
        
        //print_r($data);    
        $profileImages = array();
		foreach ($arr->profile_images as $key => $value) {
            //echo $key.$value;
            //echo '<br>';
            $profileImages[$key] = $value;            
        }
        $data['profile_images'] =   json_encode($profileImages);
        //print_r($profileImages);
	//echo json_encode($profileImages);	
        //$res=$this->api_model->updateProfile($data,$userId);
	
                
                
        /*$arr = array (
            "q1"  => 'A',
            "q2"  => 'B',
            "q3"  => 'C',
            "profile_images" => array('1', '2', '3', '4', '5', '6'),
            "desc"  => 'ABCDE'
        );
        */
        //print_r($arr);        
        //echo json_encode($arr);
        
        if($res=='1'){
            $result=array("message"=>'Success');
        }else{
            $result=array("message"=>'Error');
        }
        echo json_encode($result,JSON_PRETTY_PRINT);
        
        
        
    }
    
    public function sendFriendRequest() {        
        $result = array();
        //echo '<pre>'; //
        $json = ($this->input->post('data'));
        $arr = json_decode($json);
        
        $data['search_id'] =        create_guid();
        $data['user_to'] =          $arr->user_to;
        $data['user_from'] =        $arr->user_from;
        $data['datetime'] =         $arr->datetime;   
        $data['status'] =           $arr->status;   
        
        $res=$this->api_model->searchProfileStatus($data);
        if($res=='1'){
            $result=array("message"=>'Success');
        }else{
            $result=array("message"=>'Error');
        }
        echo json_encode($result,JSON_PRETTY_PRINT);
        
    }
    
    public function friendList() {        
        $result = array();
        //echo '<pre>'; //
        $json = ($this->input->post('data'));
        $arr = json_decode($json);
        
        
        $data['user_to'] =   $arr->user_to;
		
		$res=$this->api_model->friendList($data);
		
        if($res=='0'){
            $result=array("message"=>'No Friends');
        }else{
            $result=$res;
        }
        echo json_encode($result,JSON_PRETTY_PRINT);
		
		
        
    } 
    
    public function chatCheck($user){
        $this->load->helper('test');
        //checkpredis();
        //echo '<pre>';
        //$arr = serialize(array('$user','$time', '$message'));
        //print_r($arr);
        //$message=$_POST['content'];
        //$user=$_POST['user'];
        //$time=date("c", time());
        //$redis->lpush($key, serialize(array($user,$time, $message)));
        
        $chat_key = '12345';
        if($user=='A'){
            $u1 = 'A';
            $u2 = 'B';
            $key = '54321';
        }else if($user=='B'){
            $u1 = 'B';
            $u2 = 'A';
            $key = '54321';
        }else{
            $u1 = $user;
            $key = '12345';
        }
        $data['username']=$u1;
        $data['key']=$key;        
        
        
        $data['title']="Enterprise Investment Exchange";
        $data['msg']="The website is under construction.";
        $this->load->view('chat', $data);
        
    }
    public function chatSaveCheck(){
        $this->load->helper('test');
        
        $message=$_POST['content'];
        $user=$_POST['user'];
        $time=date("c", time());
        $key=$_POST['key'];
        //$redis->lpush($key, serialize(array($user,$time, $message)));
        
        $str = serialize(array($user,$time, $message));
        chatSave($key,$str);
        echo $this->chatListCheck($key);
    }
    public function chatListCheck($key){
        $this->load->helper('test');
        //$key=$_POST['key'];
        echo getChat($key);
        
    }
    
    // This is the function for search friend. (Developed by: Avishake Bhattacharjee on 07.05.2015)
    public function search_friend() { 
		//$result = array();
		$json = ($this->input->post('data'));
		$arr = json_decode($json);	
		
		$lat = $arr->lat;
		$long = $arr->long;
		$uid = $arr->userid;
		
        $data['lat'] = $lat;
		$data['long'] = $long;
		$data['userid'] = $uid;
		$finalarr=$this->api_model->search_friend($data);
		echo json_encode($finalarr,JSON_PRETTY_PRINT);
    }
	
	// This is the function for update GPS information of an user. (Developed by: Avishake Bhattacharjee on 07.05.2015)
	public function update_gpsinfo() { 
		//$result = array();
		$json = ($this->input->post('data'));
		$arr = json_decode($json);	
		
		$lat = $arr->lat;
		$long = $arr->long;
		$uid = $arr->userid;
			
        $data['lat'] = $lat;
		$data['long'] = $long;
        $data['userid'] = $uid;
		$finalarr=$this->api_model->update_gpsinfo($data);
		if($finalarr=='1'){
            $result=array("message"=>'Success');
        }else{
            $result=array("message"=>'Error');
        }
        echo json_encode($result,JSON_PRETTY_PRINT);
    }
	
	// This is the function for Update Setting Page. (Developed by: Avishake Bhattacharjee on 08.05.2015)
	/*
		In this particular thing, there something need to send by App developer.
		For Both Gender send 0.
		For Male Gender send 1.
		For Female Gender send 2.
	*/
    public function profile_setting() { 
		//$result = array();
		$json = ($this->input->post('data'));
		$arr = json_decode($json);	
		
		$min_age = $arr->min_age;
		$max_age = $arr->max_age;
		$distance = $arr->distance;
		$gender = $arr->gender;
		$uid = $arr->userid;
		
		
        $data['userid'] = $uid;
		$data['min_age'] = $min_age;
		$data['max_age'] = $max_age;
		$data['distance'] = $distance;
		$data['gender'] = $gender;
		$finalarr=$this->api_model->update_gpsinfo($data);
		if($finalarr=='1'){
            $result=array("message"=>'Success');
        }else{
            $result=array("message"=>'Error');
        }
        echo json_encode($result,JSON_PRETTY_PRINT);
    }
    
    
    
}
?>
