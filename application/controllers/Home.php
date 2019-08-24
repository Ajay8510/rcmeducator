<?php 
class Home extends CI_Controller
{
	function __construct(){
		parent::__construct();
		
	}

	function index(){
		$data = array();
		$this->template->set('title', 'RCM Educator | Revenue Cycle Solutions & Educator');
		$this->template->load('template', 'contents' , 'index', $data);
	}

	function about(){
		$data = array();
		$this->template->set('title', 'RCM Educator | Revenue Cycle Solutions & Educator');
		$this->template->load('template', 'contents' , 'about', $data);	
	}

	function services(){
		$data = array();
		$this->template->set('title', 'RCM Educator | Revenue Cycle Solutions & Educator');
		$this->template->load('template', 'contents' , 'services', $data);	
	}

	function billing(){
		$data = array();
		$this->template->set('title', 'RCM Educator | Revenue Cycle Solutions & Educator');
		$this->template->load('template', 'contents' , 'billing', $data);	
	}


	function credentialing(){
		$data = array();
		$this->template->set('title', 'RCM Educator | Revenue Cycle Solutions & Educator');
		$this->template->load('template', 'contents' , 'credentialing', $data);	
	}

	function webinars(){
		$data = array();
		$this->template->set('title', 'RCM Educator | Revenue Cycle Solutions & Educator');
		$this->template->load('template', 'contents' , 'webinars', $data);	
	}

	function contact(){
		$data = array();
		$this->template->set('title', 'RCM Educator | Revenue Cycle Solutions & Educator');
		$this->template->load('template', 'contents' , 'contact', $data);	
	}

	function blogs(){
		$data = array();
		$this->template->set('title', 'RCM Educator | Revenue Cycle Solutions & Educator');
		$this->template->load('template', 'contents' , 'blogs', $data);	
	}

	function privacy(){
		$data = array();
		$this->template->set('title', 'RCM Educator | Revenue Cycle Solutions & Educator');
		$this->template->load('template', 'contents' , 'privacy', $data);	
	}

	function rcm(){
		$data = array();
		$this->template->set('title', 'RCM Educator | Revenue Cycle Solutions & Educator');
		$this->template->load('template', 'contents' , 'rcm', $data);	
	}


	function terms(){
		$data = array();
		$this->template->set('title', 'RCM Educator | Revenue Cycle Solutions & Educator');
		$this->template->load('template', 'contents' , 'terms', $data);	
	}

	function telemedicine($id){
		$data = array();
		$this->session->set_userdata('total',3);
		$this->template->set('title', 'RCM Educator | Revenue Cycle Solutions & Educator');
		$this->template->load('template', 'contents' , 'telemedicine', $data);	
	}
	
	public function morgan(){
	    $data = array();
		$this->template->set('title', 'RCM Educator | Revenue Cycle Solutions & Educator');
		$this->template->load('template', 'contents' , 'morgan', $data);	
	}

	function upcoming_webinar($id = false){
		$data = array();
		$this->session->set_userdata('total',3);
		$this->template->set('title', 'RCM Educator | Revenue Cycle Solutions & Educator');
		$this->template->load('template', 'contents' , 'upcoming_webinar', $data);	
	}


	function design_thinking(){
		$data = array();
		$this->template->set('title', 'RCM Educator | Design Thinking');
		$this->template->load('template', 'contents' , 'upcoming_webinar', $data);	
	}

}