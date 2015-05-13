<?php
class services extends MY_Controller {

        var $gallery_path_url;
        
    public function __construct() {
        	parent::__construct();
		
	 	$this->load->model('cms_model');
          	$this->load->helper('form');  
         	//$this->load->library('session');
         	$this->load->library('public_init_elements');
                $this->public_init_elements->init_elements();
                $this->gallery_path_url = $this->config->item('base_url').'assets/uploads/';
        
    }

    function pagedata($pageId=0)
    {

           $data=array();
         if(!empty($pageId))
         {
          $data['pagecontent']=$this->cms_model->PageEdit($pageId);
         } 
         
          $this->load->view('front/cmspage',$data);       
    }
        

}
?>
