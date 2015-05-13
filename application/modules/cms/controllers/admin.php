<?php
class admin extends MY_Controller {

        var $gallery_path;
	var $gallery_path_url;
	var $doc_path;
        
    public function __construct() {
        	parent::__construct();
		authenticate();
	 	$this->load->model('cms_model');
          	$this->load->helper('form');  
         	//$this->load->library('session');
                $this->gallery_path = realpath(APPPATH . '../assets/uploads');
		$this->gallery_path_url = $this->config->item('base_url').'assets/uploads/';
		$this->doc_path=realpath(APPPATH . '../assets/uploads/doc');
        
    }

	public function addPage()
	{
            /*if($this->session->userdata('tenantId')=='1'){
                $data['merchantList']=$this->attribute->getMerchantList();

              }*/
              $data=array();
		$this->load->view('cms/add_page',$data);
	}


	public function pageAdd()
	{
		//$teacherCourse = implode(',',$this->input->post('courseTeachers'));
		
		$data['pageId'] =create_guid();
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
                
                $res=$this->cms_model->addPage($data);
	}

	public function pageList()
	{
		$data['base']=$this->config->item('base_url');
		$data['title']= 'Message form';
                $tenantId='';
                $total=$this->cms_model->PageCount();
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
		$data['query']=$this->cms_model->getcmsListPagination($tenantId,$per_pg,$offset);

		
		
		//$data['result']=$this->course->getTeacher();
		$this->load->view('cms/page_list',$data);
		
	}


	public function deletePage($delId)
	{
		$this->cms_model->pageDelete($delId);
	}

	public function editPage($crsId)
	{
		
		
		$editData['pageTbl']=$this->cms_model->PageEdit($crsId);
                
		/*if($this->session->userdata('tenantId')=='1'){
                $editData['merchantList']=$this->attribute->getMerchantList();

              }*/
		
		$this->load->view('cms/edit_page',$editData);
	}


	public function updatePage()
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
		                
                $updReturn=$this->cms_model->updpageInfo($data);
                
		
	}

	public function statusChangePage($crsId,$val)
	{
		$data['result']=$this->cms_model->changeStatus($crsId,$val);
		
		$this->load->view('change_status',$data);
		
	}


        

        

}
?>
