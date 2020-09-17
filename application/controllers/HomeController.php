<?php
	
	defined('BASEPATH') || exit('No direct script access allowed');

	class HomeController extends Front_Controller {
		
		public function __construct() {
			parent::__construct();
			$this->pageTitle = $this->lang->line('HEADER_HOME');
			$this->load->model('models/Product_model');

	    }

		public function index() {
			$data = array();
			//$condition = 'prod.quantity > 0 AND prod.priceindollar > 0 AND prod.priceinshekel > 0 AND us.status = "active"';
			$condition = 'prod.priceindollar >= 0 AND prod.priceinshekel >= 0 AND us.status = "active"';
			$productlist = $this->Product_model->getproductlist(null,$condition,20,0);
			// echo "<pre>";
			// print_r($productlist);die;	
			$data['supplierList'] = $this->Product_model->getsupplierlist();
			//$data['allProducts'] = array_chunk($productlist, 3);
			$data['maximum_price'] = $this->Home_model->getmaxprice();
			$data['allProducts'] = $productlist;

			_renderFrontView('home/home',$data);
	        
	    }
	    
		public function productDetails() {
			$data = array();
			$id = $this->uriSegments[3];
			$productlist = $this->Product_model->getdatabyid($id);
			$images = $this->Product_model->get_images('product_images' ,$id);
			$data['allProducts'] = $productlist;
			$data['images'] = $images;
			_renderFrontView('home/product-details',$data);
	        
	    }

		public function userLogin() {
			$errors = array();
			$message = '';
	        $data = array();
	    	$status = false;
	    	$reload = false;
	        $data['email']    = '';
			$data['password'] = '';
			
			$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			
			$email 		= $this->input->post('email');
			$password 	= $this->input->post('password');
	
			$data['email'] 	  = $email;
			$data['password'] = $password;

	  		if ($this->form_validation->run() == TRUE) {	  			
				$fieldUsed = filter_var($email,FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
				$result = $this->Supplier_model->checkUser($email,md5($password),'user');

				if(empty($result)) {
	                $errorMessage = $this->lang->line('LOGIN_FAILED');
	                $errors['password'] = $errorMessage;
			    } else {
			    	$status = true;
			    	$reload = true;
			    	$selectedLanguage = @$this->session->userdata['userData']['site_lang'];
		     		$this->session->set_userdata('userData',$result);
		     		$_SESSION['userData']['site_lang'] = $selectedLanguage;
			    }
		  	} else {
	    		$error = $this->form_validation->error_array();
				if(!empty($error)) {
					foreach ($error as $sEk => $sEv) {
						$errors[$sEk] = sprintf($sEv);
					}
				}
	    	}

			echo json_encode(array(
	    		'data'=>'',
	    		'errors'=>$errors,
	    		'status'=>$status,
	    		'reload'=>$reload,
	    		'message'=>$message
	    	));
		    
	    	exit; 
		  	
	    }

	    public function registerUser() {

	    	$errors = array();
	    	$status = false;
	    	$reload = false;
	    	$message = $this->lang->line('SOMETHING_WENT_WRONG');
	    	$this->form_validation->set_rules('firstname', $this->lang->line('FIRST_NAME_LABEL'), 'trim|required|min_length[1]|max_length[40]');
            $this->form_validation->set_rules('lastname', $this->lang->line('LAST_NAME_LABEL'), 'trim|required|min_length[1]|max_length[40]');
	    	$this->form_validation->set_rules('email', $this->lang->line('EMAIL_LABEL'), 'trim|valid_email|required|is_unique[users.email]');
	    	$this->form_validation->set_rules('mobile', $this->lang->line('MOBILE_LABEL'), 'trim|callback__validatePhone');
	    	$this->form_validation->set_rules('password', $this->lang->line('PASSWORD_LABEL'), 'trim|required|md5');

	    	if ($this->form_validation->run() == TRUE) {
	    		$regData = $this->input->post();
	    		$insertData['firstname'] = $regData['firstname'];
	    		$insertData['lastname'] = $regData['lastname'];
	    		$insertData['email'] = $regData['email'];
	    		$insertData['mobile'] = $regData['mobile'];
	    		$insertData['password'] = $regData['password'];
	    		$insertData['scope'] = 'Customer';

	    		$status = true;
	    		$reload = true;
	    		$message = $this->lang->line('REGISTRATION_SUCCESSFUL');
	    		
	    		$insertId = $this->Supplier_model->insertsupplierdetails($insertData);
	    		$result = $this->Supplier_model->getsupplierdetail($insertId);
	    		$this->session->set_userdata('userData',$result);

	    		$this->session->set_flashdata('flash_message', ['title'=>'','type'=>'success','text'=>$this->lang->line('REGISTRATION_SUCCESSFUL')]);
	    	} else {
	    		$error = $this->form_validation->error_array();
				if(!empty($error)) {
					foreach ($error as $sEk => $sEv) {
						$errors[$sEk] = sprintf($sEv);
					}
				}
	    	}

			echo json_encode(array(
	    		'data'=>'',
	    		'errors'=>$errors,
	    		'status'=>$status,
	    		'reload'=>$reload,
	    		'message'=>$message,
	    	));
		    
	    	exit;    	
	    }

	    public function productFilter() {
	    	$status = true;
	    	$reload = false;
	    	$message = 'Listing products.';
	    	$postData = $this->input->post();
	    	$errors = array();
	    	$conditionArr = array();

	    	//$conditionArr[] = '( prod.quantity > 0 AND prod.priceindollar > 0 AND prod.priceinshekel > 0) ';
	    	$conditionArr[] = '( prod.priceindollar > 0 AND prod.priceinshekel > 0) ';

	    	if(!empty($postData['dontGetProduct'])){
	    		$conditionArr[] = '(prod.id NOT IN ('.implode(',', $postData['dontGetProduct']).') )';
	    	}
	    	if(!empty($postData['pricefilter'])) {
	    		$conditionArr[] = _priceFilter($postData['pricefilter'],'prod',true);
	    	}
	    	//--front search start--
	    	// for category
	    	if(!empty($postData['category'])) {
	    		$conditionArr[] = sprintf('(prod.category = "%s")',$postData['category']);
	    	}
	    	// for ktav
	    	if(!empty($postData['ktav'])) {
	    		$conditionArr[] = sprintf('(prod.ktav = "%s")',$postData['ktav']);
	    	}
	    	// for product type
	    	if(!empty($postData['product_type'])) {
	    		$conditionArr[] = sprintf('(prod.product_type = "%s")',$postData['product_type']);
	    	}
	    	// for ktav size
	    	if(!empty($postData['ktav_size'])) {
	    		$conditionArr[] = sprintf('(prod.ktav_size = "%s")',$postData['ktav_size']);
	    	}
	    	// for plines
	    	if(!empty($postData['plines'])) {
	    		$conditionArr[] = sprintf('(prod.plines = "%s")',$postData['plines']);
	    	}
	    	// for line size
	    	if(!empty($postData['line_size'])) {
	    		$conditionArr[] = sprintf('(prod.line_size = "%s")',$postData['line_size']);
	    	}
	    	// for  mezuzot
	    	if(!empty($postData['mezuzot'])) {
	    		$conditionArr[] = sprintf('(prod.mezuzot = "%s")',$postData['mezuzot']);
	    	}
	    	// for parshiot
	    	if(!empty($postData['parshiot'])) {
	    		$conditionArr[] = sprintf('(prod.parshiot = "%s")',$postData['parshiot']);
	    	}
	    	// for amudim
	    	if(!empty($postData['amudim'])) {
	    		$conditionArr[] = sprintf('(prod.amudim = "%s")',$postData['amudim']);
	    	}
	    	// for user_id/Supplier
	    	if(!empty($postData['user_id'])) {
	    		$conditionArr[] = sprintf('(prod.user_id = "%s")',$postData['user_id']);
	    	}
	    	//--front search end here
	    	//--range search start --
	    	 
	    	if(!empty($postData['maximum']) && !empty($postData['minimum'])) {
	    		$conditionArr[] = sprintf('(prod.'.get_language($this->siteLang,'currencyColumn').' BETWEEN %u AND %d)',$postData['minimum'],$postData['maximum']);
	    	}
	    	else if(empty($postData['maximum']) && !empty($postData['minimum'])) {
	    		$maxrange =  $this->Product_model->getMaxPrice();
	    		if($this->siteLang == 'he'){
	    			$conditionArr[] = sprintf('(prod.'.get_language($this->siteLang,'currencyColumn').' BETWEEN %u AND %d)',$postData['minimum'],$maxrange['max_shekel']);
	    		}
	    		else if($this->siteLang == 'en') {
	    			$conditionArr[] = sprintf('(prod.'.get_language($this->siteLang,'currencyColumn').' BETWEEN %u AND %d)',$postData['minimum'],$maxrange['max_dollar']);
	    		}
	    	}
			else if(!empty($postData['maximum']) && empty($postData['minimum'])) {
				$conditionArr[] = sprintf('(prod.'.get_language($this->siteLang,'currencyColumn').' BETWEEN %u AND %d)','1',$postData['maximum']);				
			}
	    	//--range search end  --
	    	if(!empty($postData['productKeywordSearch'])) {
	    		$kw = $postData['productKeywordSearch'];
	    		$conditionArr[] = sprintf('(prod.name like "%%%s%%" OR prod.category like "%%%s%%" OR prod.product_type like "%%%s%%") ',$kw,$kw,$kw);
	    	}
	    	$condition = implode(' AND ', $conditionArr);
	    	$productlist = $this->Product_model->getproductlist(null,$condition,20,0);
	    	$data['allProducts'] = $productlist;
	    	
	    	/*if((isset($postData['dontGetProduct']) && count($data['allProducts']) > 0) || (count($data['allProducts']) > 0)) {
				$html = $this->load->view('front/home/products',$data,true);
	    	} else {
	    		$html = null;
	    	}*/	
	    	if((isset($postData['dontGetProduct']) && count($data['allProducts']) <= 0)) {
	    		$html = null;
	    	} else {
				$html = $this->load->view('front/home/products',$data,true);
	    	}


			echo json_encode(array(
	    		'data'=>$html,
	    		'errors'=>$errors,
	    		'status'=>$status,
	    		'reload'=>$reload,
	    		'message'=>$message,
	    		'target'=>@$postData['target']
	    	));
		    
	    	exit;
	    }

	    public function userLogout() {
	        //$this->session->sess_destroy();
	        $selectedLanguage = @$this->session->userdata['userData']['site_lang'];
	        $this->session->unset_userdata('userData');
	        $this->cart->destroy();
	        unset($_SESSION['temp_auth']);
     		$_SESSION['userData']['site_lang'] = $selectedLanguage;
	        redirect('home');
	    }

	    public function changeUserLanguage($lang) {
	        $lang = $lang;
	        $cartItems = $this->cart->contents();
	        if(!empty($cartItems)){
	        	foreach ($cartItems as $rowid => $cvalue) {
	        		$product = $this->Product_model->getdatabyid($cvalue['id']);
	        		$data = array(
				        'rowid' => $rowid,
				        'price'   => $product[get_language($lang,'currencyColumn')]
					);

					$this->cart->update($data);
	        		// if($cvalue['id'] == '1') {
        			// 	_pr($rowid,false);
        			// 	_pr($cvalue,false);
        			// 	_pr($data,false);
	        		// 	_pr($this->cart->contents());
	        		// }
	        	}
	        }
	        $_SESSION['userData']['site_lang'] = $lang;
	        //header("Refresh:0");
	        $currentUrl = $this->session->userdata('frontcurrentUrl');
			$this->session->unset_userdata('frontcurrentUrl');
	        redirect($currentUrl);
	    }

	    /**
	    *@Description : This function is made for validating phone number.
	    *@Method      : _validatePhone
	    *@Tables Used : --
	    *@param       : $data
	    */ 
	    public function _validatePhone($data) {
	        if(empty($data)) {
	            return true;
	        }
	        $phone = str_replace(array('-','+',' '),'',$data);
	        if(!preg_match("/^\(?\+?([0-9]{1,4})\)?[-\. ]?(\d{7})$/", $phone)) {
	            $this->form_validation->set_message('_validatePhone',$this->lang->line('INVALID_NUMBER'));
	            return false;
	        } else {
	            return true;
	        }
	    }
	}