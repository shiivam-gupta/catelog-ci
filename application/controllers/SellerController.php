<?php 
	defined('BASEPATH') || exit('No direct script access allowed');

	class SellerController extends Admin_Controller {
		
		public function __construct() {
			parent::__construct();
			$this->pageTitle = $this->lang->line('PRODUCT_PAGE_TITLE');
        	___checkAdminLoginStatus();
			$this->load->model('models/Product_model');

	    }

	    public function addEdit() {

	    	 $postData = $this->input->post();
	    	
	    	 $insertData = array();
	    	  $insertDynamicData = array();
	    	 if($postData['postData'] == 'postData'){	    	 	 
	    	 	$insertData['final_total_usd'] = $postData['totalPriceUsd'];
	    	 	$insertData['final_total_isr'] = $postData['totalPriceIsr'];
	    	 	$insertData['paid_usd'] = $postData['paid_price_usd'];
	    	 	$insertData['paid_isr'] = $postData['paid_price_isl'];
	    	 	$insertData['own_usd'] = $postData['own_price_usd'];
	    	 	$insertData['own_isr'] = $postData['own_price_isr'];
	    	 	$insertData['buyer_id'] = $postData['user_id'];
	    	 	$insertData['supplier_id'] = $_SESSION['adminData']['id'];

	    	 	$id = $this->Product_model->insert_images('selling_to_customer' , $insertData);

	    	 	if($id > 0){
	    	 		foreach ($postData['product'] as $key => $value) {
		    	 	
		    	 		$insertDynamicData['product_id'] =$value['productName'];
		    	 		$insertDynamicData['quantity'] = $value['quantity'];
		    	 		$insertDynamicData['sell_price_usd'] =$value['usd_price'];
		    	 		$insertDynamicData['sell_price_isr'] = $value['isr_price'];
		    	 		$insertDynamicData['sub_total_usd'] = $value['total_price_usd'];
		    	 		$insertDynamicData['sub_total_isr'] = $value['total_price_isr'];
		    	 		$insertDynamicData['order_id'] = $id;
		    	 		$insertDynamicData['buyer_id'] = $postData['user_id'];
		    	 		$insertDynamicData['supplier_id'] = $_SESSION['adminData']['id'];

		    	 		$this->Product_model->insert_images('selling_to_customer_products' , $insertDynamicData);
		    	 		
	    	 		}
	    	 	}
	  
	    	 	$this->session->set_flashdata('flash_message', ['title'=>'','type'=>'success','text'=>$this->lang->line('RECORD_UPDATED')]);
	    	 	 redirect('selling-to-buyer');
	    	 }
	    	 	$data['currencyRate'] = $this->CurrencyRate->getRate('ILS','row_array');
	    		$data['productlist'] = $this->Product_model->getProductName('products');
	        	$data['supplierlist'] = $this->Product_model->getsupplierlist();
	    	  _renderAdminView('seller/add-edit', $data);
	    }

	    public function seller_to_buyerList() {
	    	$postData = $this->input->post();
	        $conditions = array();
	        foreach ($postData as $pdk => $pdv) {
	            if(!empty($pdv)) {
	                $conditions[$pdk] = $pdv;
	            }
	        }
	        $data = $conditions;
	        // echo "<pre>";
	        // print_r($data);exit;
	        $condition['us.status'] = 'active';
	    	$data['productlist'] = $this->Product_model->getBuyerRecord('selling_to_customer');
	        $data['supplierlist'] = $this->Product_model->getsupplierlist();
        	_renderAdminView('seller/selling_to_customer_list',$data);
	    }

	    public function getProductPrice($id){

    		$prodPrice = $this->Product_model->getProductPrice('products' , $id);
    	  	$response['code'] = 200;
	        $response['status'] = "success";
	        $response['usd'] = $prodPrice['priceindollar'];
	        $response['isr'] = $prodPrice['priceinshekel'];
	        echo json_encode($response);

	    }

	    public function ReciptsListFromBuyer() {
	    	$data['reciptsList'] = $this->Product_model->getReciptsFromBuyer();
	    	_renderAdminView('seller/recipts_list',$data);
	    }
	    public function addReciptsFromBuyer() {
	    	 $postData = $this->input->post();
	    	 $insertData = array();
	    	 if($postData['type'] == 'recipts'){
	    	 	$insertData['user_id'] =$postData['user_id'];
	    	 	$insertData['amount'] = $postData['paid_price_usd'];
	    	 	$insertData['type'] = $postData['type'];
	    	 	$this->Product_model->insert_images('user_own_amount' , $insertData);
	    	 	$this->session->set_flashdata('flash_message', ['title'=>'','type'=>'success','text'=>$this->lang->line('RECORD_UPDATED')]);
	    	 }
	    	$data['supplierlist'] = $this->Product_model->getsupplierlist();
	    	$data['currencyRate'] = $this->CurrencyRate->getRate('ILS','row_array');
	    	_renderAdminView('seller/recipts_from_buyer',$data);
	    }
	}
