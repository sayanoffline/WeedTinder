<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class public_init_elements
{
    var $CI;

    function  __construct()
    {
        $this->CI =& get_instance();
    }

    

    function init_category_menu()
    {
        //populate left category menu
        $this->CI->load->model('home/home_model');
        $data['topMenuList'] = $this->CI->home_model->topMenuList();
        /*echo '<pre>';
        print_r($data); die;*/
        $this->CI->load->view('front/header', $data,true);
	
    }
	
	
    function init_view_cart_item()
    {	
            $this->CI->load->library('cart');
            $cart_value = $this->CI->cart->contents();
            $cart_item = sizeof($cart_value);

            $data['cart_item'] = $cart_item;

            $this->CI->load->view('front/header',$data,true);

    }
   function init_brand_slider()
   {
        $this->CI->load->model('home/home_model');
        $data['BrandList'] = $this->CI->home_model->brandList();
        /*echo '<pre>';
        print_r($data); die;*/
        $this->CI->load->view('front/header', $data,true);
        
   
   
   }
	
	
	

    function init_elements()
    {
        //index call to populate all the header / footer / side bar elements
       
        $this->init_category_menu();
        $this->init_brand_slider();
		
	//$this->init_view_cart_item();
        
       // $this->init_google_login();
    }
	
    function init_google_login()
    {
        /*########################################################################*/
        require_once 'openid.php';
        $openid = new LightOpenID("http://sketchdemo.in/ecommerce_portal/");
        $openid->identity = 'https://www.google.com/accounts/o8/id';
        $openid->required = array(
            'namePerson/first',
            'namePerson/last',
            'contact/email'
        );

        $openid->returnUrl = 'http://sketchdemo.in/ecommerce_portal/home/loginAuth';

        
        $data['openid'] = $openid;
        
        $this->CI->load->view('front/header', $data, true);

        /*########################################################################*/
    }
	
	
}

?>
