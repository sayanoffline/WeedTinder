<?php

class cms_model extends MY_Model {
	

    public function __construct() {
		
        	parent::__construct();
		//$this->load->helper('form');
          	$this->load->database();
          	//$this->load->library('session');
    }

	public function getMerchantList()
	{

            $query=$this->db->query("SELECT * FROM tenant WHERE tenantId!='1' AND status = 1 AND deleted='0'");
            return $query->result_array();

	}

	
	

       

	public function pageCount($tentId='')
	{
            if($tentId==''){
		$query=$this->db->query("SELECT * FROM cms_pages WHERE deleted='0'");
            }
            else {
                $query=$this->db->query("SELECT * FROM cms_pages WHERE tenantId='$tentId' deleted='0'");
            }
		return $totRow=$query->num_rows();
	}



	public function addPage($res)
	{
		$this->db->insert('cms_pages', $res);
	}

        

	public function getcmsListPagination($tentId='',$per_pg,$offset)
	{
		if($offset=="")
			$offset=0;
                if($tentId==''){
		$query=$this->db->query("select cms_pages.*,tenant.tenantName from cms_pages inner join tenant on cms_pages.tenantId=tenant.tenantId  where cms_pages.deleted='0' ORDER BY cms_pages.dateModified DESC ");//limit $offset , $per_pg
            }
            else {
                $query=$this->db->query("select cms_pages.*,tenant.tenantName from cms_pages inner join tenant on cms_pages.tenantId=tenant.tenantId  where cms_pages.deleted='0' ORDER BY cms.dateModified DESC ");//limit $offset , $per_pg
            }
		
		return $query->result_array();
	}

	public function PageDelete($crsId)
	{
		$this->db->set("deleted", '1');
		$this->db->where("pageId", $crsId);
		$this->db->update("cms_pages");
	}

	public function PageEdit($crsId)
	{
		$query=$this->db->query("SELECT * FROM cms_pages WHERE pageId = '$crsId'");
		
		return $query->result_array();
	}

	public function updPageInfo($updData)
	{
		
		$this->db->where('pageId',$this->input->post('crs_id'));
		$this->db->update('cms_pages',$updData);
	}


	public function changeStatus($crsId,$val)
	{
		if($val==1)
		{
			$this->db->set("status", 0);
			$this->db->where("pageId", $crsId);
			$this->db->update("cms_pages");

			//return 0;
		}
		else
		{
			$this->db->set("status", 1);
			$this->db->where("pageId", $crsId);
			$this->db->update("cms_pages");

			//return 1;
		}
		$query=$this->db->query("select * from cms_pages where pageId='$crsId'");
		return $query->result_array();

		
	}

        public function attributeValueList($Id='')
	{

                 $query=$this->db->query("SELECT * FROM product_attribute_value WHERE productAttributeId='$Id' AND status = 1 AND deleted='0'");
		return $query->result_array();

	}
        public function attributeValueDelete($crsId)
	{
		$this->db->set("deleted", '1');
		$this->db->where("productAttributeValueId", $crsId);
		$this->db->update("product_attribute_value");
	}
        public function addAttributeValue($res)
	{
		$this->db->insert('product_attribute_value', $res);
	}
        


}
?>
