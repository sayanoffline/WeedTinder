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
                //$this->load->library('session');
//                $this->load->library('public_init_elements');
//                $this->public_init_elements->init_elements();
         	
                $this->gallery_path = realpath(APPPATH . '../assets/uploads');
		$this->gallery_path_url = $this->config->item('base_url').'assets/uploads/';
		$this->doc_path=realpath(APPPATH . '../assets/uploads/doc');
		
		
    }
    
    public function index() {
        $this->load->view('home');
    }
	
	
    public function userRegister(){
	
        $data['userId'] =create_guid();        	
        $data['userName'] =$this->input->post('add_email');
        $data['password'] =md5($this->input->post('add_password'));
        $data['addedOn'] =gmdate('Y-m-d H:i:s');
        $data['deleted'] ='0';
        $data['status'] =1;

        $data1['userProfileId'] =create_guid();   
        $data1['userId'] =$data['userId'];   
        $data1['email'] =$this->input->post('add_email');
        $data1['fname'] =$this->input->post('add_fname');
        $data1['lname'] =$this->input->post('add_lname');

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
            $data['username'] =$this->input->post('username');
            $data['password'] =md5($this->input->post('password'));
            if($data['username']!='' && $data['password']!=''){
     		$res=$this->api_model->login($data);
        	if($res!=0){
                    $data1['message'] = 'Success';
                    $data1['userId'] = $res['userId'];
                    $data1['name'] = $res['fname']."&nbsp;".$res['lname'];;
                    $data1['email'] = $res['email'];
        	}else{
                    $data1['message'] = 'error';
                }
            }else{
                $data1['message'] = 'error';
            }
            echo json_encode($data1,JSON_PRETTY_PRINT);
	}
    
    
    
}
?>
