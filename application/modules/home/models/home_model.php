<?php

class home_model extends MY_Model {
	

    public function __construct() {
		
        	parent::__construct();
		//$this->load->helper('form');
          	$this->load->database();
                
          	//$this->load->library('session');
    }

     public function index()
    {
        
    }
    public function is_unique_user($uname)
    {
        
            $where=array(
                'user.deleted'=>'0',

                'user.userName'=>$uname
                );
        $this->db->where($where);
        $this->db->join('seller','user.userId = seller.userId','INNER');
        $this->db->select('user.*, seller.*');
        $query = $this->db->get("user");
        $sRow=$query->num_rows();

        $this->db->where($where);
        $this->db->join('buyer','user.userId = buyer.userId','INNER');
        $this->db->select('user.*, buyer.*');
        $query2 = $this->db->get("user");
        $bRow=$query2->num_rows();

        if($sRow>0 || $bRow>0)
            return 1;
        else {
            return 0;
        }
    }
    
    public function updatePassword($uname,$pass)
    {
        
            $where=array(
                'user.deleted'=>'0',

                'user.userName'=>$uname
                );
        $this->db->where($where);
        $this->db->select('user.*');
        $query = $this->db->get("user");
        $sRow=$query->num_rows();

        if($sRow>0){
          $this->db->where($where);
          $this->db->update('user',array('password'=>MD5($pass)));
        }
        
        
    }

    public function getUserList($uid,$uType)
    {
        if($uid==''){
            $where=array(
                'user.deleted'=>'0',
                'user.userTypeId'=>$uType

                );

        }
         else {
             $where=array(
                'user.deleted'=>'0',
                'user.userTypeId'=>$uType,
                'user.userId'=>$uid
                );
         }
        $this->db->where($where);
        $this->db->order_by("user.dateAdded","DESC");
        if($uType=='ut2')
        {
            $this->db->join('buyer','user.userId = buyer.userId','INNER');
            $this->db->select('user.*, buyer.*');
        }
        if($uType=='ut3')
        {
            $this->db->join('seller','user.userId = seller.userId','INNER');
            $this->db->select('user.*, seller.*');
        }
        $query = $this->db->get("user");

        $result= $query->result_array();

        if($uType=='ut2')
        {
            $arr=array(
                "userId"        => $result[0]['userId'],
                "userTypeId"    => $result[0]['userTypeId'],
                "dateAdded"     => $result[0]['dateAdded'],
                "userName"      => $result[0]['userName'],
                "name"          => $result[0]['buyerName'],
                "email"         => $result[0]['buyerEmail'],
                "phone"         => $result[0]['buyerPhone'],
                "address"       => $result[0]['buyerAddress'],
                "city"          => $result[0]['buyerCity'],
                "country"       => $result[0]['buyerCountry'],
                "state"         => $result[0]['buyerState'],
                "postcode"      => $result[0]['buyerPostcode'],
                "image"         => 'buyerimages/'.$result[0]['buyerImage']
            );
        }
        if($uType=='ut3')
        {
            $arr=array(
                "userId"        => $result[0]['userId'],
                "userTypeId"    => $result[0]['userTypeId'],
                "dateAdded"     => $result[0]['dateAdded'],
                "userName"      => $result[0]['userName'],
                "name"          => $result[0]['sellerName'],
                "email"         => $result[0]['sellerEmail'],
                "phone"         => $result[0]['sellerPhone'],
                "address"       => $result[0]['sellerAddress'],
                "city"          => $result[0]['sellerCity'],
                "country"       => $result[0]['sellerCountry'],
                "state"         => $result[0]['sellerState'],
                "postcode"      => $result[0]['sellerPostcode'],
                "image"         => 'sellerimages/'.$result[0]['sellerImage']
            );
        }
        return $arr;
        

    }

    public function getUserListForEdit($uid,$uType)
    {
        if($uid==''){
            $where=array(
                'user.deleted'=>'0',
                'user.userTypeId'=>$uType

                );

        }
         else {
             $where=array(
                'user.deleted'=>'0',
                'user.userTypeId'=>$uType,
                'user.userId'=>$uid
                );
         }
        $this->db->where($where);
        $this->db->order_by("user.dateAdded","DESC");
        if($uType=='ut2')
        {
            $this->db->join('buyer','user.userId = buyer.userId','INNER');
            $this->db->select('user.*, buyer.*');
        }
        if($uType=='ut3')
        {
            $this->db->join('seller','user.userId = seller.userId','INNER');
            $this->db->select('user.*, seller.*');
        }
        $query = $this->db->get("user");

        return $query->result_array();


    }


    
}
?>
