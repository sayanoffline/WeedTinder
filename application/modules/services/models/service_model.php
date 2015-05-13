<?php

class service_model extends MY_Model {
	

    public function __construct() {
		
        	parent::__construct();
		//$this->load->helper('form');
          	$this->load->database();
          	//$this->load->library('session');
    }

       

	public function serviceCount($tentId='')
	{
            if($tentId==''){
		$query=$this->db->query("SELECT * FROM services WHERE deleted='0'");
            }
            else {
                $query=$this->db->query("SELECT * FROM services WHERE tenantId='$tentId' deleted='0'");
            }
		return $totRow=$query->num_rows();
	}



	public function addService($res)
	{
		$this->db->insert('services', $res);
	}

        

	public function getcmsListPagination($tentId='',$per_pg,$offset)
	{
		if($offset=="")
			$offset=0;
                if($tentId==''){
		$query=$this->db->query("select services.*,tenant.tenantName from services inner join tenant on services.tenantId=tenant.tenantId  where services.deleted='0' ORDER BY services.dateModified DESC ");//limit $offset , $per_pg
            }
            else {
                $query=$this->db->query("select services.*,tenant.tenantName from services inner join tenant on services.tenantId=tenant.tenantId  where services.deleted='0' ORDER BY cms.dateModified DESC ");//limit $offset , $per_pg
            }
		
		return $query->result_array();
	}

	public function ServiceDelete($crsId)
	{
		$this->db->set("deleted", '1');
		$this->db->where("serviceId", $crsId);
		$this->db->update("services");
	}

	public function ServiceEdit($crsId)
	{
		$query=$this->db->query("SELECT * FROM services WHERE serviceId = '$crsId'");
		
		return $query->result_array();
	}

	public function updServiceInfo($updData)
	{
		
		$this->db->where('serviceId',$this->input->post('crs_id'));
		$this->db->update('services',$updData);
	}


	public function changeStatus($crsId,$val)
	{
		if($val==1)
		{
			$this->db->set("status", 0);
			$this->db->where("serviceId", $crsId);
			$this->db->update("services");

			//return 0;
		}
		else
		{
			$this->db->set("status", 1);
			$this->db->where("serviceId", $crsId);
			$this->db->update("services");

			//return 1;
		}
		$query=$this->db->query("select * from services where serviceId='$crsId'");
		return $query->result_array();

		
	}

        


}
?>
