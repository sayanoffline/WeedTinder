<?php 
class admin extends MY_Controller {

        var $gallery_path;
	var $gallery_path_url;
	var $doc_path;
        
        public function __construct() 
        {
        	parent::__construct();
		authenticate();
	 	$this->load->model('login');
          	$this->load->helper('form');  
         	//$this->load->library('session');
                $this->gallery_path = realpath(APPPATH . '../assets/uploads');
		$this->gallery_path_url = $this->config->item('base_url').'assets/uploads/';
		$this->doc_path=realpath(APPPATH . '../assets/uploads/doc');
        
        }

	 /*
        Function name         :  userList
        Function description  :  Show all User List to Admin 
        Auther                :  Sayan
    */
    
        public function userList()
        {
            $data['query']=$this->login->userList();
            $this->load->view('users/user_list',$data);
        }


        public function statusChangeUser($crsId)
	{
		echo $data['result']=$this->login->changeStatus($crsId);
		
                
		//$this->load->view('change_status',$data);
		
	}
        public function deleteUser($delId)
	{
		$this->login->userDelete($delId);
	}

        

}
?>
