<?php

class api_model extends MY_Model {
	

    public function __construct() {
		
        	parent::__construct();
		//$this->load->helper('form');
          	$this->load->database();
                
          	//$this->load->library('session');
    }

	
	public function submitChat($data)
    {

		        $row['time'] = date("Y-m-d H:i:s",time());
                $row['to_user_id'] = $data->to_user_id;
                $row['from_user_id'] = $data->from_user_id;
                $row['chat_text'] = $data->text;
		$this->db->insert('chatTest', $row);
    }
	
	public function getChat($data){
	
			echo "<pre>";
			print_r($data);
			if($data->time_stamp != ""){
			$query=$this->db->query("SELECT * FROM from_user_id WHERE `from_user_id` != '$data->from_user_id' and time>'$data->time_stamp'");
			}else{
			$query=$this->db->query("SELECT * FROM from_user_id WHERE `from_user_id` != '$data->from_user_id'");
			}
            return $totRow=$query->num_rows();
	}
    public function checkEmail($data)
    {
        $email = $data['email']; 
        $query=$this->db->query("SELECT * FROM user_profile WHERE `email`='$email'");
        return $totRow=$query->num_rows();
    }
    public function userAdd($res,$res1)
    {
            $this->db->insert('user', $res);
            $this->db->insert('user_profile', $res1);
            //echo $this->db->last_query();
            //echo 1;
    }
    public function login($res)
    {
        $query=$this->db->query("select * from user where `userName`='".$res['username']."' and `password`='".$res['password']."' and `status`='1' AND userTypeId ='ut2'  ");
        $num_of_rows=$query->num_rows();
        if($num_of_rows >0){
            $result=$query->result_array();

            $uId=$result[0]['userId'];
            $uTyp=$result[0]['userTypeId'];

            $uTyp_q=$this->db->query("select * from user_type  where userTypeId='$uTyp'");
            $uTyp_r=$uTyp_q->result_array();
            
            $q=$this->db->query("select up.* from user_profile as up,user as usr where up.userId='$uId' and usr.userId='$uId'");
            $r=$q->row_array();

            return  $r;
        }else{
            return 0;
        }
        
        //echo $this->db->last_query();
    }
    
    
    
    public function chatAdd($res)
    {
        $this->db->insert('user_chat', $res);
        //echo $this->db->last_query();
        echo 1;
    }
    
    public function searchProfileStatus($res) {
        
        $user_to = $res['user_to'];
        $user_from = $res['user_from'];
        $status = $res['status'];
        $date= date('Y-m-d');
        
        $query1=$this->db->query("SELECT * FROM user_search_partners WHERE (`user_from`='".$user_from."' AND `user_to`='".$user_to."')"); 
        $totRow1=$query1->num_rows();
        
        $query2=$this->db->query("SELECT * FROM user_search_partners WHERE (`user_to`='".$user_from."' AND `user_from`='".$user_to."')  AND status='1'  ");
        $totRow2=$query2->num_rows();
        
        if($totRow1=='0'){  
        
        	     
            	$this->db->insert('user_search_partners', $res);
            
            	
            	
        	if($totRow2=='1'){
                
                $row['friend_id'] = create_guid();
                $row['user_to'] = $res['user_to'];
                $row['user_from'] = $res['user_from'];
                $row['status'] = $res['status'];
                $row['datetime'] = gmdate('Y-m-d H:i:s');
                $row['deleted'] ='0';
                $row['chat_key'] = 'chat_'.randomNumber();
                $this->db->insert('user_friends', $row);
            	}
            
            return 1;
        }else{
        	
            	return 1;
        }
        
    }
    
	public function updateProfile($updData,$userId)
	{
		
		$this->db->where('userId',$userId);
		if($this->db->update('user_profile',$updData))
		{
			return 1;
		}else{
			return 0;
		}
	}     
    
	
	public function friendList($res){
		$user_to = $res['user_to'];
		
		$res = array();
		
		
		$this->db->select('user_profile .*, user_friends.chat_key');
		$this->db->from('user_friends');
		$this->db->join('user_profile', 'user_friends.user_from = user_profile.userId');
		
		$this->db->where('user_friends.status', '1');
		$this->db->where('user_profile.userId !=', $user_to);
		$this->db->where('user_friends.user_to', $user_to);
		
		$query1 = $this->db->get();
		$totRow1=$query1->num_rows();
		
		if($totRow1 > 0){
			$res = $query1->result_array();
		}
		//print_r($res );die;
		
		$this->db->select('user_profile .*, user_friends.chat_key');
			$this->db->from('user_friends');
			$this->db->join('user_profile', 'user_friends.user_to = user_profile.userId');
			
			$this->db->where('user_friends.status', '1');
			$this->db->where('user_profile.userId !=', $user_to);
			$this->db->where('user_friends.user_from', $user_to);
			
			$query2 = $this->db->get();
			$totRow2=$query2->num_rows();
			
			if($totRow2 > 0){
				$res= array_merge($res,$query2->result_array());
				
			}
			
			return $res;
			
			



		
               /* $query1=$this->db->query("select * from user_profile as up,user_friends as usr where (up.userId=usr.user_to OR up.userId=usr.user_from) AND (usr.user_to='".$user_to."' OR usr.user_from='".$user_to."')  AND usr.status!='1' ");
                $totRow1=$query1->num_rows();*/
		
	}
	
	// Function for search friend Request (Developed By: Avishake Bhattacharjee on 07.05.2015)
    public function search_friend2($res) {
        $unit='M';
        $lat1 = $res['lat'];
        $lon1 = $res['long'];
		$user_id=$res['userid'];
		$profile_query=$this->db->query("SELECT * FROM `user_profile` Where userId='".$user_id."'");
        $res_profile=$profile_query->result_array();
		$row_profile=mysql_fetch_assoc($res_profile);
		$distancevalue=$row_profile['diatance'];
		$gen=$row_profile['search_gender'];
		$min_a=$row_profile['min_age'];
		$max_a=$row_profile['max_age'];
		$run_query='SELECT * FROM `user_profile` WHERE `age` BETWEEN '.$min_a.' AND '.$max_a;
		
		if($gen==1){
			$res_gen=$run_query.' AND gender='.$gen;
		}
		if($gen==2){
			$res_gen=$run_query.' AND gender='.$gen;
		}
		$q=$this->db->query($run_query);
        $res=$q->result_array();
		while ($rowmain=mysql_fetch_assoc($res)){
			$lat2=$rowmain['lat'];
			$lon2=$rowmain['lon'];
			$dis=distancefromto($lat1,$lon1,$lat2,$lon2,$unit);
			$distance=round($dis,2);
			$rowmain['distance']=$distance;
			if($distance<=$distancevalue){
				$rArray[]=$rowmain;
			}
		}
        aasort($rArray,"distance");
		return $rArray;
    }
    
    // Function for search friend Request (Developed By: Chiranjib Dey on 18.05.2015)
    public function search_friend($res) {
        $unit='M';
        $lat1 = $res['lat'];
        $lon1 = $res['long'];
		$user_id=$res['userid'];
		
		$res_profile = $this->db->get_where('user_profile', array('userId' => $user_id))->result_array();
		$row_profile = $res_profile[0];
		//print_r($row_profile );die;
		$distancevalue=$row_profile['distance'];
		$gen=$row_profile['search_gender'];
		$min_a=$row_profile['min_age'];
		$max_a=$row_profile['max_age'];
		
	
		
		$my_query = "SELECT
			  *, (
			    6371* acos (
			      cos ( radians(".$lat1.") )
			      * cos( radians( lat ) )
			      * cos( radians( lon ) - radians(".$lon1.") )
			      + sin ( radians(".$lat1.") )
			      * sin( radians( lat ) )
			    )
			  ) AS distance
			FROM `user_profile` WHERE userId != '".$user_id."'";
		
		
		if(!empty($min_a) && !empty($min_a))
		{
			$my_query .= " AND `age` BETWEEN ".$min_a." AND ".$max_a;
			
		}
		if($gen==1){
			$my_query .=' AND gender='.$gen;
		}
		if($gen==2){
			
			
			$my_query .=' AND gender='.$gen;
		}
			
			$my_query .=" HAVING distance <= ".$distancevalue."
			ORDER BY distance";
		
		
		$q=$this->db->query($my_query);
        	
		return $q->result_array();
		
		
       // aasort($rArray,"distance");
		//return $rArray;
    }
    
    
	// Function for Update GPS information of an user (Developed By: Avishake Bhattacharjee on 07.05.2015)
	// Modified by Chiranjib Dey on 18-5-2015 
    public function update_gpsinfo($data, $userid) {
    //print_r($data);die;
    		if(!empty($data['lat']) && !empty($data['long']))
    		{
    			$lat = $data['lat'];
        		$lon = $data['long'];
        		
        		$data = array('lat' => $lat, 'lon' => $lon);
    		}
        
        	$this->db->where('userId', $userid);
		$str  = $this->db->update('user_profile', $data); 
        
        
		
		if($str ){
			return 1;
		}else{
			return 0;
		}
		
    }
	
    // Function for Update GPS information of an user (Developed By: Avishake Bhattacharjee on 07.05.2015)
    public function profile_setting($res) {
		$user_id=$res['userid'];
		$min_age = $res['min_age'];
        $max_age = $res['max_age'];
		$distance = $res['distance'];
		$gender = $res['gender'];
		$table= 'user_profile';
		$data = array('min_age' => $min_age, 'max_age' => $max_age, 'diatance' => $distance, 'search_gender' => $gender);
		$where = "userId=".$user_id;
		$str = $this->db->update_string($table, $data, $where);
		return 1;
    }
    
    
	
	
	
	
}
?>