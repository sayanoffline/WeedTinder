<?php 

class login extends MY_Model {
	

    public function __construct() {
		
        	parent::__construct();
          	$this->load->database();
          	//$this->load->library('session');
    }


	public function login($res)
	{
		 $query=$this->db->query("select * from user where `userName`='".$res['username']."' and `password`='".$res['password']."' and `status`='1' and `tenantId`='1'");

           	 $num_of_rows=$query->num_rows();
                // echo $num_of_rows; die;
        
		if($num_of_rows >0){
            	$result=$query->result_array();
            	$this->session->set_userdata('userId',$result[0]['userId']);
		$this->session->set_userdata('userName',$result[0]['userName']);
                $this->session->set_userdata('tenantId',$result[0]['tenantId']);
		
		$uId=$result[0]['userId'];
                $uTyp=$result[0]['userTypeId'];

                $uTyp_q=$this->db->query("select * from user_type  where userTypeId='$uTyp'");

                $uTyp_r=$uTyp_q->result_array();
                $this->session->set_userdata('userType',$uTyp_r[0]['userTypeName']);
                //$retData= $uTyp_r[0]['userTypeName'];
		
		$q=$this->db->query("select up.* from user_profile as up,user as usr where up.userId='$uId' and usr.userId='$uId'");
		
		$r=$q->result_array();
		$this->session->set_userdata('userProfileName',$r[0]['userProfileName']);
		$this->session->set_userdata('userEmail',$r[0]['email']);
		$this->session->set_userdata('userImg',$r[0]['profile_image']);
		
            	return  $uTyp_r;
        	}else{
            	return 0;
		}
	}

	
       public function userDetail($uId)
	{
		
		 $query=$this->db->query("select * from user_profile where userId='".$uId."'");
		return $result=$query->result_array();
		
	}
        
    /*
        Function name         :  checkOldPass
        Function description  :  checking the value if exist 
        Auther                :  Sayan
    */
       public function checkOldPass($data,$uId)
       {
           $password = md5($data['password']);
           $query=$this->db->query("SELECT * FROM user WHERE userId='$uId' and password='$password'");
           return $totRow=$query->num_rows();
       }
       
    /*
        Function name         :  passwordChange
        Function description  :  saving the value 
        Auther                :  Sayan
    */
        
       public function changepass($data)
       {
          $newPassword = md5($data['password']);
          $userId = $data['userId'];
          $this->db->set("password", $newPassword);
	  $this->db->where("userId", $userId);
	  $this->db->update("user"); 
       } 
       
    /*
        Function name         :  passwordChange
        Function description  :  saving the value 
        Auther                :  Sayan
    */
       public function checkEmail($data)
       {
            $email = $data['email']; 
            $query=$this->db->query("SELECT * FROM user_profile WHERE `email`='$email'");
            return $totRow=$query->num_rows();
       }
       
    /*
        Function name         :  forgotpass
        Function description  :  saving the value 
        Auther                :  Sayan
    */
    
   public function forgotpass($data)
   {
        $randomPass = md5($data['password']); 
        $email = $data['userEmail']; 
        $query=$this->db->query("SELECT * FROM user_profile WHERE `email`='$email'");
        $result = $query->result_array();
        $uid = $result[0]['userId'];
        print_r($uid);
        $this->db->set("password", $randomPass);
	$this->db->where("userId", $uid);
	$this->db->update("user");
        
   }   
   
   
   public function userList()
	{
		
		 $query=$this->db->query("select * from user_profile as up,user as usr where up.userId=usr.userId AND deleted='0' AND usr.userTypeId = 'ut2' ORDER BY addedOn DESC ");//AND usr.userTypeId = 'ut2' ORDER BY addedOn DESC 
		return $result=$query->result_array();
		//echo $this->db->last_query();
	}
        
   public function changeStatus($userId)
	{
                $query=$this->db->query("select * from user where userId='$userId'");
		$res =  $query->result_array();
                //print_r($res);
                $status = $res[0]['status'];
                
		if($status==1)
		{
			$this->db->set("status", 0);
			$this->db->where("userId", $userId);
			$this->db->update("user");

			//return 0;
                        
                        $str = '<i style="color:#d7422d" class="icon-minus-circle-1"></i>';
		}
		else
		{
			$this->db->set("status", 1);
			$this->db->where("userId", $userId);
			$this->db->update("user");

			//return 1;
                        $str = '<i style="color:#009d59" class="icon-ok-circle-1"></i>';
		}
		
                 echo $str;
		
	}
        
        public function userDelete($userId)
	{
		$this->db->set("deleted", '1');
		$this->db->where("userId", $userId);
		$this->db->update("user");
	}
        
        public function userAdd($res,$res1)
	{
		$this->db->insert('user', $res);
                $this->db->insert('user_profile', $res1);
                
                //echo $this->db->last_query();
                echo 1;
	}
   
   
}
?>
