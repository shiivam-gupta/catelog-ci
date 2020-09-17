<?php
	
	defined('BASEPATH') || exit('No direct script access allowed');

	class TempLoginController extends Front_Controller {
		
		public function __construct() {
			parent::__construct();
			$this->pageTitle = $this->lang->line('HEADER_HOME');

	    }    
		
	    //--this code is for front end customer login user..---//
	    public function index() {
	    	___checkUserTempLoginPage();
	        $data = array();
	        $data['email']    = '';
			$data['password'] = '';
	        if($this->input->server('REQUEST_METHOD') === "POST") {
				$this->form_validation->set_rules('email', 'Email', 'trim|required');
				$this->form_validation->set_rules('password', 'Password', 'trim|required');
				
				$email 		= $this->input->post('email');
				$password 	= $this->input->post('password');
		
				$data['email'] 	  = $email;
				$data['password'] = $password;

		  		if ($this->form_validation->run() == TRUE) {	  			
					$fieldUsed = filter_var($email,FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
					$result = $this->Supplier_model->checkUser($email,md5($password));

					if(empty($result)) {
		                $errorMessage = $this->lang->line('LOGIN_FAILED');
		                $this->session->set_flashdata('message_name', $errorMessage);
				    } else {
						$selectedLanguage = @$this->session->userdata['userData']['site_lang'];
						$this->session->set_userdata('userData',$result);
			     		$_SESSION['temp_auth'] = true;
			     		$_SESSION['userData']['site_lang'] = $selectedLanguage;

			     		if(empty($_SESSION['USER_SESS_TEMP_URL'])) {
			     			redirect('home');
			     		}
				    }
			  	}
		  	}
		  	$this->load->view('front/templogin/login',$data);
		  	$this->load->view('front/layout/footer');
	    }

	}