<?php
	
	defined('BASEPATH') || exit('No direct script access allowed');

	class ActivityController extends Admin_Controller {
		
		public function __construct() {
			parent::__construct();
			$this->pageTitle = $this->lang->line('PRODUCT_PAGE_TITLE');
        	___checkAdminLoginStatus();
			$this->load->model('models/Product_model');

	    }

	public function supplierBuyedProduct($id) {
        $postData = $this->input->post();
        $conditions = array();
        foreach ($postData as $pdk => $pdv) {
            if(!empty($pdv)) {
                $conditions[$pdk] = $pdv;
            }
        }
        $data = $conditions;
        $condition['us.status'] = 'active';
        $data['userData'] = $this->Supplier_model->getsupplierdetail($id);

        if($data['userData']['scope'] != 'Supplier') {
            redirect('admin/supplier/list');
        }
        $data['productlist'] = $this->Product_model->getproductlist($data['userData']['id'],$conditions);
        $data['supplierlist'] = $this->Product_model->getsupplierlist();
        _renderAdminView('product/list',$data);
    }

    public function allSupplierProductOrderList() {
        $postData = $this->input->post();
        $conditions = array();
        foreach ($postData as $pdk => $pdv) {
            if(!empty($pdv)) {
                $conditions[$pdk] = $pdv;
            }
        }
        $data = $conditions;
        
        $condition['us.status'] = 'active';
        $data['currencyRate'] = $this->CurrencyRate->getRate('ILS','row_array');
    	$data['productlist'] = $this->Product_model->getpurchaselist(null,$conditions);
        // echo "<pre>";
        // print_r($data['productlist']);exit;
        //$data['supplierlist'] = $this->Product_model->getsupplierlist();
        _renderAdminView('activity/all-manufacturer-order',$data);
    }

    public function addEditSupplierProductList() {
        //$data['userData'] = $this->Supplier_model->getsupplierdetail($id);
        $data['currencyRate'] = $this->CurrencyRate->getRate('ILS','row_array');

        if($this->uriSegments[3] == 'add'){
            $this->pageTitle = $this->lang->line('PRODUCT_ADD_PAGE_TITLE');
        } else {
            $this->pageTitle = $this->lang->line('PRODUCT_EDIT_PAGE_TITLE');
        }

        if(!empty($prodid)) {
            $data['prodData'] = $this->Product_model->getdatabyid($prodid);
        }
        $data['supplierlist'] = $this->Product_model->getsupplierlist();

        $postData = array();
        if($this->input->server('REQUEST_METHOD') === "POST") {
            $postData = $this->input->post();
            
            $prodpic = array();

            $insertNewData['buyer_id'] = $_SESSION['adminData']['id'];
            $insertNewData['supplier_id'] = $postData['user_id'];
            $insertNewData['order_total'] = $postData['product']['final_price'];
            $insertNewData['paid'] = $postData['product']['paid_price'];
            $insertNewData['own'] = $postData['product']['own_price'];
            $insertNewData['created_at'] = date('Y-m-d H:i:s');
            $insertNewData['updated_at'] = date('Y-m-d H:i:s');
            $getInsertedOrderId = $this->Product_model->insertRecord($insertNewData,'buying_supplier_order');
            
            foreach ($postData['product'] as $key => $value) {
                if(isset($value['sku_label'])){
                    $getProductData = $this->Product_model->getdatabysku($value['sku_label']);
                
                
                    $insertData['category'] = $value['category'];
                    $insertData['ktav']     = $value['ktav'];
                    $insertData['ktav_size']  = $value['ktav_size'];
                    $insertData['line_size']  = $value['line_size'];
                    $insertData['sku_label']    = $value['sku_label'];
                    $insertData['ktav_price']   = $value['ktav_price'];
                    $insertData['tyug_price']     = $value['tyug_price'];
                    $insertData['klaf_price']     = $value['klaf_price'];
                    $insertData['hgha_price']     = $value['hgha_price'];
                    $insertData['product_type']     = $value['product_type'];
                    $insertData['cost_price_subtotal']     = round($value['cost_price_subtotal'],2);
                    //$insertData['cost_price_total']    = round($value['cost_price_total'],2);
                    $insertData['priceindollar']    = round($value['priceindollar'],2);
                    $insertData['quantity']         = $value['quantity'];
                    $insertData['order_id']         = $getInsertedOrderId;
                    $insertData['buyer_id']         = $_SESSION['adminData']['id'];
                    $insertData['supplier_id']         = $postData['user_id'];
                    $insertData['created_at']       = date('Y-m-d H:i:s');
                    $insertData['updated_at']       = date('Y-m-d H:i:s');
                    
                    $getInsertedId = $this->Product_model->insertRecord($insertData,'buying_supplier_products');

                    
                    $getPercentData = $this->Setting_model->getAllSettings(3);
                    
                    $percent = $getPercentData['value'];
                    $costpriceInDol = $value['cost_price_subtotal'];
                    $costpriceInIsl = ($data['currencyRate']['rate']) * $costpriceInDol;
                    //$costpriceperUnitInDol = $value['priceindollar']/$value['quantity'];

                    $sellingPriceIsl = 0;
                    $sellingPriceDol = 0;
                    if($percent != 0){
                        $sellingPriceIsl = ($costpriceInIsl * $percent) / 100;
                        $sellingPriceDol = ($costpriceInDol * $percent) / 100;
                    }
                    if($getProductData) {
                        $newQuant = $getProductData['quantity'] + $value['quantity'];
                        $updateData['quantity']         = $newQuant;
                        $updateData['priceinshekel']         = round($costpriceInIsl+ $sellingPriceIsl,2);
                        $updateData['priceindollar']         = round($costpriceInDol + $sellingPriceDol,2);
                        $updated = $this->Product_model->updateproductdetails($updateData,$getProductData['id']);

                        $updateNewData['category'] = $getProductData['category'];
                        $updateNewData['ktav']     = $getProductData['ktav'];
                        $updateNewData['ktav_size']  = $getProductData['ktav_size'];
                        $updateNewData['line_size']  = $getProductData['line_size'];
                        $updateNewData['product_type']     = $getProductData['product_type'];

                        $updated = $this->Product_model->updateDetails($updateNewData,$getInsertedId,'buying_supplier_products');
                        
                    } else {
                        $insertProductData['user_id']  = $postData['user_id'];
                        $insertProductData['category'] = $value['category'];
                        $insertProductData['ktav']     = $value['ktav'];
                        $insertProductData['ktav_size']  = $value['ktav_size'];
                        $insertProductData['plines']     = $value['plines'];
                        $insertProductData['line_size']  = $value['line_size'];
                        $insertProductData['sku']    = $value['sku_label'];

                        $insertProductData['product_type']     = $value['product_type'];
                        $insertProductData['priceinshekel']    = round($costpriceInIsl+ $sellingPriceIsl,2);
                        $insertProductData['priceindollar']    = round($costpriceInDol + $sellingPriceDol,2);
                        $insertProductData['quantity']         = $value['quantity'];

                        $a = $this->Product_model->insertproductdetails($insertProductData);
                    }
                }
                
            }  
            $this->session->set_flashdata('flash_message', ['title'=>'','type'=>'success','text'=>$this->lang->line('PRODUCT_ADDED')]);
            redirect('admin/buying-supplier');
        }

        _renderAdminView('activity/add-manufacturer-product', $data);
    }

    public function getSupplierProduct(){
        $postData = $this->input->post();

        if(!empty($postData['id'])) {
            $conditionArr[] = sprintf('(prod.user_id = "%s")',$postData['id']);
        }

        $condition = implode(' AND ', $conditionArr);
            $productlist = $this->Product_model->getproductlist(null,$condition);
            if(count((array)$productlist) > 0 ){
                $html = '<option value="">'.$this->lang->line('DEFAULT_SELECT_OPTION').'</option>';
                $val = [];
                foreach ($productlist as $key => $value) {

                     $html .='<option value="'.$value->sku.'">'.$value->sku.'</option>';
                     $val[]= $value->sku;

                }
                //$data['allProducts'] = $productlist;
                $errors = false;
                $status = 'success';
            } else {
                $html = "";
                $errors = true;
                $status = 'failure';
            }
        echo json_encode(array(
            'data'=>$val,
            'errors'=>$errors,
            'status'=>$status
        ));
    }

    public function getPaymentSupplier() {
        $postData = $this->input->post();
        $conditions = array();
        foreach ($postData as $pdk => $pdv) {
            if(!empty($pdv)) {
                $conditions[$pdk] = $pdv;
            }
        }
        $data = $conditions;
        
        $condition['us.status'] = 'active';
        $condition['prod.type'] = 'payment';
        $data['currencyRate'] = $this->CurrencyRate->getRate('ILS','row_array');
        $data['productlist'] = $this->Product_model->getPaymentList(null,$conditions);
        _renderAdminView('activity/all-purchase-product',$data);
    }

    public function addPaymentSupplier() {
        //$data['userData'] = $this->Supplier_model->getsupplierdetail($id);
        $data['currencyRate'] = $this->CurrencyRate->getRate('ILS','row_array');

        $this->pageTitle = $this->lang->line('PAYMENT_ADD_PAGE_TITLE');

        $data['supplierlist'] = $this->Product_model->getsupplierlist();

        $postData = array();
        if($this->input->server('REQUEST_METHOD') === "POST") {
            $postData = $this->input->post();

            $prodpic = array();

            $insertNewData['user_id'] = $postData['user_id'];
            $insertNewData['amount'] = $postData['product']['paid_price'];
            $insertNewData['type'] = 'payment';
            $insertNewData['created_at'] = date('Y-m-d H:i:s');
            $insertNewData['updated_at'] = date('Y-m-d H:i:s');
            $getInsertedOrderId = $this->Product_model->insertRecord($insertNewData,'user_own_amount');

            $this->session->set_flashdata('flash_message', ['title'=>'','type'=>'success','text'=>$this->lang->line('PRODUCT_ADDED')]);
            redirect('admin/payment-supplier');
        }

        _renderAdminView('activity/add-payment', $data);
    }

    public function showReports() {
        // $postData = $this->input->post();
         $conditions = array();
        // foreach ($postData as $pdk => $pdv) {
        //     if(!empty($pdv)) {
        //         $conditions[$pdk] = $pdv;
        //     }
        // }
        // $data = $conditions;
        
        // $condition['us.status'] = 'active';
        $conditions['prod.type'] = 'payment';
        $data['currencyRate'] = $this->CurrencyRate->getRate('ILS','row_array');
        $data['productlist'] = $this->Product_model->getPaymentList(null,$conditions);
        $cond = "users.scope != 'Admin'";
        $data['userList'] = $this->Supplier_model->getallUsers($cond);
        $data['adminReport'] = $this->Product_model->adminAll();
      
        _renderAdminView('activity/show-report',$data);
    }

    public function getSkuProduct(){
        $postData = $this->input->post();
        if(!empty($postData['sku'])) {
            $conditionArr[] = sprintf('(prod.sku = "%s")',$postData['sku']);
        }
        // for ktav
        // if(!empty($postData['ktav'])) {
        //     $conditionArr[] = sprintf('(prod.ktav = "%s")',$postData['ktav']);
        // }
        // // for product type
        // if(!empty($postData['product_type'])) {
        //     $conditionArr[] = sprintf('(prod.product_type = "%s")',$postData['product_type']);
        // }
        // // for ktav size
        // if(!empty($postData['ktav_size'])) {
        //     $conditionArr[] = sprintf('(prod.ktav_size = "%s")',$postData['ktav_size']);
        // }
        // // for plines
        // if(!empty($postData['plines'])) {
        //     $conditionArr[] = sprintf('(prod.plines = "%s")',$postData['plines']);
        // }
        // // for line size
        // if(!empty($postData['line_size'])) {
        //     $conditionArr[] = sprintf('(prod.line_size = "%s")',$postData['line_size']);
        // }
        $condition = implode(' AND ', $conditionArr);
            $productlist = $this->Product_model->getproductlist(null,$condition);
            // echo "<pre>";
            // print_r($productlist);die;
            if(count((array)$productlist) > 0 ){
                $errors = false;
                $status = 'success';
            } else {
                $html = "";
                $errors = true;
                $status = 'failure';
            }
        echo json_encode(array(
            'data'=>$productlist[0],
            'errors'=>$errors,
            'status'=>$status
        ));
    }

    public function deleteSupplierProductList($id,$prodid) {
        $a = $this->Product_model->deleteProductDetail($prodid);
        $this->session->set_flashdata('flash_message', ['title'=>'','type'=>'success','text'=>$this->lang->line('PRODUCT_DELETED')]);
        redirect('admin/products/list/'.$id);
    }

    public function deleteProductList($prodid) {
        $a = $this->Product_model->deleteProductDetail($prodid);
        $this->session->set_flashdata('flash_message', ['title'=>'','type'=>'success','text'=>$this->lang->line('PRODUCT_DELETED')]);
        redirect('admin/products/list');
    }

    public function convertCurrency() {
        $resp = array(
            "status"=>false,
            "message"=>$this->lang->line('TRY_AGAIN_LABEL'),
            "data"=>""
        );

        $isAjax = $this->input->is_ajax_request();
        if($isAjax) {
            $postData = $this->input->post();
            if(!empty($postData['from'])) {
                $data = $this->CurrencyRate->getRate('ILS','row_array');
                if(!empty($data)) {
                    if($postData['from'] == 'USD') {

                    } else if($postData['from'] == 'ILS') {
                        
                    }
                }
            }
        }
        echo json_encode($resp);
    }

    public function test($value='') {
        $insertArr = array();
        $resp = curlGet();
        if(!empty($resp)) {
            $exchangeRate = json_decode($resp,true);
            $i = 0;
            foreach ($exchangeRate['rates'] as $rk => $rv) {
                $insertArr[$i]['base'] = $exchangeRate['base'];
                $insertArr[$i]['abbr'] = $rk;
                $insertArr[$i]['rate'] = $rv;
                $insertArr[$i]['created_at'] = date('Y-m-d H:i:s');
                $insertArr[$i]['updated_at'] = date('Y-m-d H:i:s');
                $i++;
            }
            if(!empty($exchangeRate)) {
                $this->CurrencyRate->batchUpdateRate($insertArr);
                return true;
            }
        } else {
            return false;
        }
    }

    public function deleteProductImage($id = '') {
        $image = $this->Product_model->get_single_image('product_images' , $id);
        $path = $image['product_img'];
        unlink($path);
        $this->Product_model->delete_image('product_images' , $id);
        $response['code'] = 200;
        $response['status'] = "success";
        $response['msg'] = "Image Deleted Successfully.";
        echo json_encode($response);
    }
}