<?php
class admin extends MY_Controller {

        var $gallery_path;
	var $gallery_path_url;
	var $doc_path;
        
    public function __construct() {
        	parent::__construct();
		authenticate();
	 	$this->load->model('service_model');
          	$this->load->helper('form');  
         	//$this->load->library('session');
                $this->gallery_path = realpath(APPPATH . '../assets/uploads');
		$this->gallery_path_url = $this->config->item('base_url').'assets/uploads/';
		$this->doc_path=realpath(APPPATH . '../assets/uploads/doc');
        
    }

	public function addService()
	{
            /*if($this->session->userdata('tenantId')=='1'){
                $data['merchantList']=$this->attribute->getMerchantList();

              }*/
              $data=array();
		$this->load->view('add',$data);
	}


	public function serviceAdd()
	{
		//$teacherCourse = implode(',',$this->input->post('courseTeachers'));
		
		$data['serviceId'] =create_guid();
        	$data['modifiedBy'] =$this->session->userdata('userId');
        	$data['title'] =$this->input->post('title');
                $data['slug'] =$this->input->post('slug');
                $data['content'] =$this->input->post('content');
                $data['tenantId']=$this->session->userdata('tenantId');
               /* if($this->session->userdata('tenantId')=='1'){
                    //$data['tenantId']=$this->input->post('merchantAttr');
	
                }
                else
{
                    $data['tenantId'] = $this->session->userdata('tenantId');
}*/
                
                $data['assignedUserId'] = "";
        	$data['dateAdded'] =gmdate('Y-m-d H:i:s');
        	$data['dateModified'] =gmdate('Y-m-d H:i:s');
                $data['deleted'] ='0';
                $data['status'] =1;
                
                $res=$this->service_model->addService($data);
	}

	public function serviceList()
	{
		$data['base']=$this->config->item('base_url');
		$data['title']= 'Message form';
                $tenantId='';
                $total=$this->service_model->ServiceCount();
                /*if($this->session->userdata('tenantId')=='1'){
                    
                }
                else{
                    $tenantId = $this->session->userdata('tenantId');
                    $total=$this->attribute->attributeCount($tenantId);
                }*/
		$per_pg=9;
		$offset=$this->uri->segment(4);

		$this->load->library('pagination');
		$config['base_url'] = $data['base'].'/index.php/cms/admin/pageList/';
	    	$config['total_rows'] = $total;
	    	$config['per_page'] = $per_pg;
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
            
        	$this->pagination->initialize($config);
             
        	$data['pagination']=$this->pagination->create_links();
		$data['query']=$this->service_model->getcmsListPagination($tenantId,$per_pg,$offset);

		
		
		//$data['result']=$this->course->getTeacher();
		$this->load->view('list',$data);
		
	}


	public function deleteService($delId)
	{
		$this->service_model->serviceDelete($delId);
	}

	public function editService($crsId)
	{
		
		
		$editData['pageTbl']=$this->service_model->ServiceEdit($crsId);
                
		/*if($this->session->userdata('tenantId')=='1'){
                $editData['merchantList']=$this->attribute->getMerchantList();

              }*/
		
		$this->load->view('edit',$editData);
	}


	public function updateService()
	{
		//$teacherCourse = implode(',',$this->input->post('courseTeachers'));
		

               
		$data['modifiedBy'] =$this->session->userdata('userId');
        	$data['title'] =$this->input->post('title');
                $data['slug'] =$this->input->post('slug');
                $data['content'] =$this->input->post('content');
                $data['tenantId']=$this->session->userdata('tenantId');
                               
               /* if($this->session->userdata('tenantId')=='1'){
                    //$data['tenantId']=$this->input->post('merchantAttr');
		
                }
                else
		{
                    $data['tenantId'] = $this->session->userdata('tenantId');
		}*/
                
        	$data['dateModified'] =gmdate('Y-m-d H:i:s');
		                
                $updReturn=$this->service_model->updserviceInfo($data);
                
		
	}

	public function statusChangeService($crsId,$val)
	{
		$data['result']=$this->service_model->changeStatus($crsId,$val);
		
		$this->load->view('change_status',$data);
		
	}


        

        

}
?>
