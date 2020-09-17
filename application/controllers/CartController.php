<?php
	
	defined('BASEPATH') || exit('No direct script access allowed');

	class CartController extends Front_Controller {
		
		public function __construct() {
			parent::__construct();
			$this->pageTitle = $this->lang->line('CART_LABEL');
	    }

		public function index() {
			$data['cartItems'] = $this->cart->contents();
			if(empty($this->sessionData) || empty($data['cartItems'])) {
				redirect('home');
			}
			$data['totalItems'] = $this->cart->total_items();
			$data['totalAmount'] = $this->cart->total();
			//_pr($data['cartItems']);
			_renderFrontView('cart/cart',$data);
	        
	    }

		public function addtocart() {
			$data=array();
			$type="success";
			$message = $this->lang->line('ADDED_TO_CART_LABEL');
			$postData = $this->input->post();
			$productDetails = $this->Product_model->getdatabyid($postData['id']);
			$cartArr = array(
				'id' => $postData['id'],
				'name' => $postData['name'],
				'qty' => $postData['qty'],
				'price' => $postData['price'],
				'image' => $postData['image'],
				'maxqty' => $productDetails['quantity'],
				'supplier' => $postData['supplier']
			);

			$row_id = $this->cart->insert($cartArr);

			/*$cartItems = $this->cart->contents();

			$qty = $cartItems[$row_id]['qty'];
			$maxqty = $cartItems[$row_id]['maxqty'];
			if($qty > $maxqty){
				$data = array(
					'rowid' => $row_id,
					'qty'   => $maxqty
				);
				$message = $this->lang->line('MAX_LIMIT_LABEL');
				$type="info";
			}
			$this->cart->update($data);*/
			echo json_encode(array(
				'qty' => $qty,
				'row_id' => $row_id,
				'maxqty' => $maxqty,
				'totalItems' => $this->cart->total_items(),
				'totalAmount' => $this->cart->total(),
				'message' => $message,
				'type' => $type,
			));
		}


	  	/*
		* @description :  This function is used to get total cart item .
		* @Method name: totalCartItems
		*/
		public function totalCartItems(){
			echo  $this->cart->total_items();
		}


	  	/*
		* @description :  This function is used to remove cart item .
		* @Method name: removeCartItem
		*/

		public function removeCartItem(){
			$rowid = $this->input->post('rowid');
			/*$Sessiondata = $this->session->all_userdata();
			$this->session->set_userdata($Sessiondata);*/
			$this->cart->remove($rowid);
			$data['cartItems'] = $this->cart->contents();
			$data['totalItems'] = $this->cart->total_items();
			$data['totalAmount'] = $this->cart->total();
			$html = $this->load->view('front/cart/cart-item',$data,true);
			echo json_encode(
				array(
					'status' => true,
					'data' => $html,
					'totalItems' => $data['totalItems'],
					'totalAmount' => $data['totalAmount']
				)
			);
			exit;
		}


	  	/*
		* @description :  This function is used to update cart item information.
		* @Method name: updateCart
		*/
	  	public function updateCart(){
	  	
		  	$Sessiondata = $this->session->all_userdata();
		  	$this->session->set_userdata($Sessiondata);

		  	$rowid = $this->input->post('rowid');
		  	$qty = $this->input->post('qty');

		  	$data = array(
		        'rowid' => $rowid,
		        'qty'   => $qty
			);

			$this->cart->update($data);
			$data['cartItems'] = $this->cart->contents();
			$data['totalItems'] = $this->cart->total_items();
			$data['totalAmount'] = $this->cart->total();
			$html = $this->load->view('front/cart/cart-item',$data,true);
			echo json_encode(
				array(
					'status' => true,
					'data' => $html,
					'totalItems' => $data['totalItems'],
					'totalAmount' => $data['totalAmount']
				)
			);
			exit;
	  	}


	    public function confirmOrder() {
	    	$errors = array();
	    	$data = array();
	    	$emailData = array();
	    	$orderDetails = array();
	    	$status = false;
	    	$reload = false;
	    	$message = $this->lang->line('SOMETHING_WENT_WRONG');
			$this->form_validation->set_rules('remark', $this->lang->line('REMARK_LABEL'), 'trim|min_length[1]|max_length[100]');	

	    	if ($this->form_validation->run() == TRUE) {
	    		$cartItems = $this->cart->contents();
	    		$odrData = $this->input->post();

	    		$insertData['user_id'] = $this->sessionData->id;
	    		$insertData['orderDate'] = date('Y-m-d H:i:s');
	    		$insertData['remark'] = $odrData['remark'];
	    		
	    		$insertId = $this->Cart_model->insertcartdetails($insertData);
	    		$i=0;
	    		foreach ($cartItems as $key => $ckv) {
	    			$productDetails = $this->Product_model->getdatabyid($ckv['id']);
	    			if($productDetails['quantity'] >= 0) {
		    			$quantity = ($productDetails['quantity'] > $ckv['qty']) ? $ckv['qty'] : $productDetails['quantity'];
		    			$leftQuantity = ($productDetails['quantity'] > $ckv['qty']) ? ($productDetails['quantity'] - $ckv['qty']) : 0;

		    			$this->Product_model->updateproductdetails(array('quantity'=>$leftQuantity),$ckv['id']);

		    			$orderdetail[$i]['order_id'] = $insertId;
		    			$orderdetail[$i]['supplier_id'] = $ckv['supplier'];
		    			$orderdetail[$i]['product_id'] = $ckv['id'];
		    			$orderdetail[$i]['quantity'] = $quantity;
		    			$orderdetail[$i]['price'] = $ckv['price'];
		    			$orderdetail[$i]['totalPrice'] = $ckv['subtotal'];
		    			$orderdetail[$i]['productData'] = json_encode($productDetails);
		    			$i++;
	    			}
	    		}
	    		if(!empty($productDetails)) {
		    		$this->Cart_model->insertOrderDetails($orderdetail);
		    		$status = true;
		    		$reload = false;
		    		$message = $this->lang->line('ORDER_PLACED');

		    		$body = $this->load->view('email/order-placed',$data,true);
		    		$subject = $this->lang->line('ORDER_PLACED_LABEL').' | '.date('Y-m-d').' | '.___idFormatGenerator($this->lang->line('ORDER_NUMBER'),'5',$insertId);
	                /*$emailBody = nl2br(preg_replace($patternFind,$replaceFind,stripslashes($emailTemplate->body)));
	                $emailBody = html_entity_decode(stripslashes($emailBody));*/
	                $emailBody = html_entity_decode(stripslashes($body)); // Final Message

	                $emailData = array(
	                    'toEmail'=>'a0527611867@gmail.com',
	                    'subject'=>$subject,
	                    'emailBody'=>$emailBody
	                );
	                ___sendEmail($emailData);
	                $type = 'success';
                } else {
                	$type = 'error';
                	$this->Cart_model->deleteOrder($insertData);
                	$message = $this->lang->line('SOMETHING_WENT_WRONG');
                }
	   			$this->cart->destroy();
				$this->session->set_flashdata('flash_message', ['title'=>'','type'=>$type,'text'=>$message]);

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
	    		'location'=>base_url('order/list'),
	    		'message'=>$message,
	    	));
		    
	    	exit;
	    }

	    public function orderDetails() {
	    	$orderArr = array();
	    	$ordershowid = array();
	    	$orderIdArr = $this->Cart_model->getorderid($this->sessionData->id);
	    	foreach($orderIdArr as $key => $val){
	    		$ordershowid[] = $val->id;
	    	}
	    	$orderDetail = $this->Cart_model->getorderDetails(null,$ordershowid);
	    	foreach ($orderDetail as $oDk => $oDv) {
	    		$orderArr[$oDv['order_id']][] = $oDv;
	    	}if(empty($ordershowid)){ $orderArr=array(); }
	    	$data['orderDetail'] = $orderArr;
			_renderFrontView('cart/orderdetail',$data);
	    }
	   
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

?>