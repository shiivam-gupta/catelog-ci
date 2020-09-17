<?php
	
	defined('BASEPATH') || exit('No direct script access allowed');

	class AdminLoginController extends Admin_Controller {
		
		public function __construct() {
			parent::__construct();
			$this->pageTitle = $this->lang->line('HEADER_LOGIN');
	    }

		public function login() {
			___checkAdminLoginPage();
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
					$result = $this->Supplier_model->checkUser($email,md5($password),'admin');

					if(empty($result)) {
		                $errorMessage = $this->lang->line('LOGIN_FAILED');
		                $this->session->set_flashdata('message_name', $errorMessage);
				    } else {

						$selectedLanguage = @$this->session->userdata['adminData']['site_lang'];
			     		$this->session->set_userdata('adminData',$result);
			     		$_SESSION['adminData']['site_lang'] = $selectedLanguage;

			     		//$_SESSION['adminData'] = $result;
			     		if(empty($_SESSION['USER_SESS_TEMP_URL'])) {
			     			redirect('admin/dashboard');
			     		}
				    }
			  	}
		  	}
		  	$this->load->view('admin/auth/login',$data);
	    }

		public function logout() {
	        //$this->session->sess_destroy();
			$selectedLanguage = @$this->session->userdata['adminData']['site_lang'];
	        $this->session->unset_userdata('adminData');
	        unset($_SESSION['temp_auth']);
     		$_SESSION['adminData']['site_lang'] = $selectedLanguage;
	        redirect('admin/login');
		}
	}

?>