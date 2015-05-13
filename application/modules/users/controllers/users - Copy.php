<?php
class users extends MY_Controller {

    public function __construct() {
        	parent::__construct();
		//authenticate();
	 	$this->load->model('login');
          	$this->load->helper('form');  
         	//$this->load->library('session');
        
    }
	
    public function adminLogin(){
	
	$this->load->view('users/login');
		
    }

	public function login()
	{
		$data['username'] =$this->input->post('username');
        	$data['password'] =md5($this->input->post('password'));
		if($data['username']!='' && $data['password']!=''){
     		$res=$this->login->login($data);
        	if($res!=0){
           	$typ=$res[0]['userTypeName'];
            	echo $typ;
        	}else
            	echo 0;

        	exit;
		}
	}

	public function adminDashBoard()
	{
		authenticate();
		$uId=$this->session->userdata('userId');
		$data['result']=$this->login->userDetail($uId);
                
		$this->load->view('users/admin_dashboard',$data);
	}

	/*public function teacherDashBoard()
	{
		authenticate();
		$uId=$this->session->userdata('userId');
		$data['result']=$this->login->userDetail($uId);
		$this->load->view('logins/dashboard',$data);
	}*/


	public function userLogout()
	{
		$this->session->unset_userdata('userId');
		$this->session->unset_userdata('emailId');
		$this->session->unset_userdata('userType');
		$this->session->unset_userdata('userName');
                $this->session->unset_userdata('userProfileName');
		$this->session->unset_userdata('userImg');
		$this->session->sess_destroy();
		$this->load->helper('url');
		redirect('index.php/admin');
	}
        
    /*
        Function name         :  changePassword
        Function description  :  showing form to change the passowrd 
        Auther                :  Sayan
        Date                  :  29-04-14
    */
        
    public function changePassword()
    {        
         $this->load->view('users/changePassword');  
    }
    
   /*
        Function name         :  checkOldPass
        Function description  :  checking the old password if exist same 
        Auther                :  Sayan
    */
    public function checkOldPass()
    {
        $data['password'] = $this->input->post('oldPass');
        $uId = $this->session->userdata('userId');
        $returnData = $this->login->checkOldPass($data,$uId);
        echo $returnData; 
    }
    
    /*
        Function name         :  passwordChange
        Function description  :  sending the form value to model 
        Auther                :  Sayan
    */
    
    public function passwordChange()
    {
        $data['password'] = $this->input->post('confirmPass');
        $data['userId'] = $this->session->userdata('userId');
        $res=$this->login->changepass($data);
    }
    
    /*
        Function name         :  forgotPassword
        Function description  :  showing form of forgot password
        Auther                :  Sayan
        Date                  :  29-04-14
    */
    public function forgotPassword()
    {
        $this->load->view('users/forgotPassword');
    }
    
    /*
        Function name         :  checkEmail
        Function description  :  checking the email exist or not
        Auther                :  Sayan
        Date                  :  29-04-14
    */
    
   public function checkEmail()
   {
         $data['userEmail'] = $this->input->post('email');
         $results = $this->login->checkEmail($data);
         echo $results;
   }
   
   /*
        Function name         :  checkEmail
        Function description  :  checking the email exist or not
        Auther                :  Sayan
        Date                  :  29-04-14
    */
   
   public function sendMail()
   {   
        $data['userEmail'] = $this->input->post('email');
        $data['password'] = generate_password(6);
        print_r($data['password']);die;
        $res = $this->login->forgotpass($data);
        
        $form_email = 'sourav@sketchwebsolutions.com';
        $to_email = $this->input->post('email');
        $form_name = 'FotoScibe Admin';
        $subject = 'Forgot Password';
        $message = '<div style="width:675px; margin:0 auto; border:10px solid #0F70A8;">	
        <div style="width:100%; margin:0 auto; border-bottom:1px solid #CCC;">
            <div style="float:left; padding:20px; border:1px solid #ccc; width:20%; text-align:center; margin:30px;"><img src="http://sketchdemo.in/adult/images/logo.png" title="xxx" alt="xxx" style="width:80%;" /></div>
            <div style="float:right; padding:20px; width:15%;">
            <h3 style="font:Arial, Helvetica, sans-serif; font-size:16px; line-height:18px;">Notification</h3>
            <p style="font:Arial, Helvetica, sans-serif; font-size:12px; line-height:0px;">'.date('d M, Y').'</p>
            </div>
            <div style="font:0; line-height:0; clear:both;"></div>
            </div>
            <div style="width:93%; margin:0 auto; padding:10px 20px;">
            <h1 style="font:Arial, Helvetica, sans-serif; font-size:22px; line-height:26px;">Hi '.ucfirst($this->input->post('email')).',</h1>
            <p>Thanks for signing up with us.</p>    
            <p>Welcome to our family.If you have any issues we will be happy to help you. You can contact us on <a href="mailto:sayan@sketchwebsolutions.com" style=" text-decoration:none; color:#0F70A8">xxx@xxx.com</a></p><br>
            <p>Sincerely,<br>
            Ecommerce Portal</p>
            <div style="font:0; line-height:0; clear:both;"></div>
            </div>
        <div style="font:0; line-height:0; clear:both;"></div>   
        </div>';
        
       	send_mail($to_email, $form_name, $form_email, $subject, $message, $bcc=''); 
        
   }
   
   
    public function register(){
	
	$this->load->view('users/add');
		
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
                
                $chkEmail = $this->login->userAdd($data1);
                
                if($chkEmail == 0){
                    $res=$this->login->userAdd($data,$data1);
                    $result=array("message"=>'Success');
                    
                }else{
                    $result=array("message"=>'Error');
                }
                echo json_encode($result,JSON_PRETTY_PRINT);
		
    }
   
   
}
?>
