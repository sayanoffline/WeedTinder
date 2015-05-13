<?php
class home extends MY_Controller {

        var $gallery_path;
	var $gallery_path_url;
	var $doc_path;
        
    public function __construct() {
        	parent::__construct();
		
	 	$this->load->model('home_model');
          	$this->load->helper('form','url');  
          	$this->load->helper('text'); 
                //$this->load->library('session');
//                $this->load->library('public_init_elements');
//                $this->public_init_elements->init_elements();
         	
                $this->gallery_path = realpath(APPPATH . '../assets/uploads');
		$this->gallery_path_url = $this->config->item('base_url').'assets/uploads/';
		$this->doc_path=realpath(APPPATH . '../assets/uploads/doc');
		
		
    }
	
	
      

    public function index()
    {
        $data['title']="Enterprise Investment Exchange";
        $data['msg']="The website is under construction.";
        $this->load->view('home/home', $data);
          
    }
    
    public function login()
    {
            $this->load->view('buyer_login');
    }
    public function userDashBoard()
    {
        front_authenticate();
        $user_id= $this->session->userdata('user_id');
//        echo $this->session->userdata('userName');
//        echo $this->session->userdata('profileName');
//        echo $this->session->userdata('userImage');
        $user_type= $this->session->userdata('userType');
        $data['userDetails']=$this->home_model->getUserList($user_id,$user_type);

        $this->load->view('user_profile',$data);
    }
    public function logout()
    {
            front_authenticate();
            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('userName');
            $this->session->unset_userdata('profileName');
            $this->session->unset_userdata('userImage');
            $this->session->unset_userdata('userType');


            $this->session->sess_destroy();
            $this->load->helper('url');
            redirect('index.php/home/');
    }
    

    public function registration()
    {
            $this->load->view('user_register');
    }

    public function forgot_password()
    {
            $this->load->view('forgot_password');
    }

    public function sendForgotPassword()
    {
        $uname=$this->input->post('username');
        if($this->home_model->is_unique_user($uname))
        {
            $pass=generate_password($length=6);
            $msg='Your password has been changed. New password is: '.$pass;
            $this->home_model->updatePassword($uname,$pass);
            //send_mail($this->input->post('userName'),'EIX','admin@eix.com','Change Password',$msg);
            $this->session->set_userdata('notification','Password has been sent to your email. Please check your inbox.');
        }
        else{
            $this->session->set_userdata('notification','User name does not exist.');
        }
    }
    public function editProfile()
    {
        front_authenticate();
        $user_id= $this->session->userdata('user_id');
        $user_type= $this->session->userdata('userType');
        $data['userDetails']=$this->home_model->getUserListForEdit($user_id,$user_type);
        if($user_type=='ut2'){
            $this->load->view('edit_buyer_profile',$data);
        }
        if($user_type=='ut3'){
            $this->load->view('edit_seller_profile',$data);
        }
    }
    
}
?>
