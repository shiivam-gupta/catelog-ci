<?php

	if (!defined('BASEPATH')) exit('No direct script access allowed');

	/**
	 * [_pr print_r and die conditionally]
	 *
	 * @param  [array, object, collection]  $data [description]
	 * @param  boolean $die  [for conditionally die]
	 *
	 * @return [array]
	 */
	function _pr($data,$die=true ) {
		echo "<pre>";
		print_r($data);
		echo "</pre>";
		if($die) {
			die();
		}
	}

	/**
	 * [pp prin_r and die conditionally]
	 *
	 * @param  [array, object, collection]  $data [description]
	 * @param  boolean $die  [for conditionally die]
	 *
	 * @return [json]        [description]
	 */

	function pj($data,$die=true ) {
		if(is_object($data)) {
            $data = json_decode(json_encode($data),true);
        }
		print_r(json_encode($data));
		if($die) {
			die();
		}
	}
	
	/**
	* Render view page to controller
	* 
	* @param type $templateName
	* @param type $data
	*/
	function _renderAdminView($templateName=null,$data=null) {
	    $ciObj = & get_instance();
	    $ciObj->load->view('admin/layout/header',$data);
	    if($templateName) {
	    	$ciObj->load->view('admin/'.$templateName,$data);
	    }
	    $ciObj->load->view('admin/layout/footer',$data); 
	}
	
	/**
	* Render view page to controller
	* 
	* @param type $templateName
	* @param type $data
	*/
	function _renderFrontView($templateName=null,$data=null) {
	    $ciObj = & get_instance();
	    $ciObj->load->view('front/layout/header',$data);
	    if($templateName) {
	    	$ciObj->load->view('front/'.$templateName,$data);
	    }
	    $ciObj->load->view('front/layout/footer',$data); 
	}

	function ___userInfo($id,$key) {
		$dbObj = & DB();
	    $data = (object)[];
	    if(!empty($id)) {
	        $data = $dbObj->select('
	        			us.id,
	        			us.firstname, us.lastname, us.email,
	        			us.phone, us.mobile, us.address, us.city, us.country,
	        			us.userimgpath, us.remark, us.scope, us.certificate , us.valid, us.certificatephotopath,
	        			CONCAT(firstname ," ", lastname) as fullname'
	        		)
	                ->from('users as us')
	                ->where('id', $id)
	                ->get();
	        $data = $data->row();
	        if(!empty($key)) {
	            return $data->{$key};
	        }
	    }
	    return $data;
	}

	/**
	* Get the called route
	*/
	function ___getCurrentRoute() {
	    $CI = & get_instance();
	    $routes = array_reverse($CI->router->routes);
	    foreach ($routes as $key => $val) {
	        $route = $key;
	        /* Converting wildcards to RegEx */
	        $key = str_replace(array(':any', ':num'), array('[^/]+', '[0-9]+'), $key);

	        if (preg_match('#^' . $key . '$#', $CI->uri->uri_string(), $matches))
	            break;
	    }
	    if (!$route)
	        $route = $routes['default_route'];

	    return $route;
	}

	function ___checkAdminLoginPage() {
		$CI = & get_instance();
	    $currentRoute = ___getCurrentRoute();
	    $sessData = $CI->session->all_userdata();
	    if(!empty($sessData['adminData']['id'])) {
	        redirect('admin/dashboard');
	    }
	}
	
	function ___checkAdminLoginStatus() {
		$CI = & get_instance();
	    $currentRoute = ___getCurrentRoute();
	    $sessData = $CI->session->all_userdata();
	    if(empty($sessData['adminData']['id'])) {
	        redirect('/admin/login');
	    }
	}

	function ___checkUserLoginPage() {
		$CI = & get_instance();
	    $currentRoute = ___getCurrentRoute();
	    $sessData = $CI->session->all_userdata();
	    if(!empty($sessData['userData']['id'])) {
	        redirect('home');
	    }
	}
	
	function ___checkUserTempLoginPage() {
		$CI = & get_instance();
	    $currentRoute = ___getCurrentRoute();
	    $tempLogin = (___config('temp_login','value') == 'No');
	    if(!empty($_SESSION['temp_auth']) || $tempLogin) {
            redirect('home');
        }
	}

	function ___checkUserLoginStatus($value='') {
		$CI = & get_instance();
	    $currentRoute = ___getCurrentRoute();
	    $sessData = $CI->session->all_userdata();
	    if(empty($sessData['userData'])) {
	        redirect('/user/login');
	    }
	}

	/**
	 * [___setSWALmessage description]
	 * @param  string  $title   [description]
	 * @param  string  $type    [description]
	 * @param  string  $message [description]
	 * @param  boolean $unset   [description]
	 * @return [type]           [description]
	 */
	function ___setSWALmessage($title='',$type='',$message='',$unset=false) {
	    if(!empty($message))
	    {
	        $script = sprintf('swal({title:"%s",type:"%s",text:"%s",timer:3000,showConfirmButton:true,showCancelButton:false})',$title,$type,$message);
	        $_SESSION['sessInlineScriptData'] = $script;
	    }
	    $return = $_SESSION['sessInlineScriptData'];
	    if($unset)
	    {
	        unset($_SESSION['sessInlineScriptData']);
	    }
	    return $return;
	}


	function curlGet($value='') {
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://openexchangerates.org/api/latest.json?app_id=c3b2f9d1bcd444668e00df046b6d15a5",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_POSTFIELDS => "",
		  CURLOPT_HTTPHEADER => array(
		    "cache-control: no-cache"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  return "cURL Error #:" . $err;
		} else {
		  return $response;
		}
	}

	function ___idFormatGenerator($prefix="Order No:",$padding="5",$id="1") {
		$padded = str_pad($id, $padding, "0", STR_PAD_LEFT);
		return sprintf("%s%s", $prefix,$padded); 
	}

	function userTypes($index = '') {
		$CI =& get_instance();
		$users = array(
			'Admin' => $CI->lang->line('ADMIN_TYPE'),
			'Supplier' => $CI->lang->line('SUPPLIER_TYPE'),
			'Customer' => $CI->lang->line('CUSTOMER_TYPE')
	    );
		if(!empty($index)){
			return $users[$index];
		}else{
			return $users;
		}
	}

	function ___config($variable=NULL,$key=NULL) {
	    $data = (object)[];
	    $dbObj = & DB();
	    $data = $dbObj->select('setting.*')->from('settings as setting');
	    if(!empty($variable)) {
	        $data = $data->where('variable_name', $variable);
	    }
	    if(!empty($key)) {
	        $data = $data->get()->row();
	        return $data->{$key};
	    }
	    $data = $data->get()->result();
	    return $data;
	}

	function settingsVariables($index = '') {
		$CI =& get_instance();
		$setting = array(
			'temp_login' => 'temp_login',
			'show_product_price' => 'show_product_price',
	    );
		if(!empty($index)){
			return $setting[$index];
		}else{
			return $setting;
		}
	}

	function ___sendEmail($emailData) {
	    $CI =& get_instance();
	    $smtpHost = 'localhost';
	    $smtpPort = 25;

	    /*$smtpPass = ___config('smtp_pass','value');
	    $smtpUser = ___config('smtp_user','value');*/
	    
	    $CI->load->library('email');

	    $config['protocol'] = 'smtp';

	    $config['smtp_host'] = $smtpHost;
	    $config['smtp_port'] = $smtpPort;
	    $config['charset'] = "utf-8";
	    $config['mailtype'] = "html";
	    $config['newline'] = "\r\n";

	    $CI->email->initialize($config);
	    $CI->email->from('a0527611867@gmail.com', $CI->lang->line('HEADER_TITLE'));
	    $CI->email->to($emailData['toEmail']);
	    $CI->email->reply_to('a0527611867@gmail.com', $CI->lang->line('HEADER_TITLE'));
	    $CI->email->subject($emailData['subject']);
	    $CI->email->message($emailData['emailBody']);

	    if(!$CI->email->send()){
	        //return $CI->email->print_debugger();
	        return false;
	    } else {
	        return true;
	    }
	}