<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class ProductController extends Admin_Controller{
    function __construct() {
        parent::__construct();
        $this->pageTitle = $this->lang->line('PRODUCT_PAGE_TITLE');
        ___checkAdminLoginStatus();
    }

    public function supplierProductList($id) {
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

    public function allSupplierProductList() {
        $postData = $this->input->post();
        $conditions = array();
        foreach ($postData as $pdk => $pdv) {
            if(!empty($pdv)) {
                $conditions[$pdk] = $pdv;
            }
        }
        $data = $conditions;
        $condition['us.status'] = 'active';
    	$data['productlist'] = $this->Product_model->getproductlist(null,$conditions);
        $data['supplierlist'] = $this->Product_model->getsupplierlist();
        _renderAdminView('product/all-list',$data);
    }

 
    public function addEditSupplierProductList($id,$prodid=null) {
        $data['userData'] = $this->Supplier_model->getsupplierdetail($id);
        $data['currencyRate'] = $this->CurrencyRate->getRate('ILS','row_array');
        if($data['userData']['scope'] != 'Supplier') {
            redirect('admin/supplier/list');
        }
        if($this->uriSegments[3] == 'add'){
            $this->pageTitle = $this->lang->line('PRODUCT_ADD_PAGE_TITLE');
        } else {
            $this->pageTitle = $this->lang->line('PRODUCT_EDIT_PAGE_TITLE');
        }

        if(!empty($prodid)) {
            $data['prodData'] = $this->Product_model->getdatabyid($prodid);
        }

        $postData = array();
        if($this->input->server('REQUEST_METHOD') === "POST") {
            $postData = $this->input->post();
            $imgData = $_FILES['moreimg'];
            // echo"<pre>";
            // print_r($imgData);die;
            
            // $this->form_validation->set_rules('name', $this->lang->line('PRODUCT_NAME_LABEL'), 'trim|required');
            $this->form_validation->set_rules('ktav', $this->lang->line('KTAV_LABEL'), 'trim|required');
            $this->form_validation->set_rules('priceindollar', $this->lang->line('PRICE_IN_DOLLARS_LABEL'), 'trim|required');
            $this->form_validation->set_rules('priceinshekel', $this->lang->line('PRICE_IN_ILS_LABEL'), 'trim|required');
            // $this->form_validation->set_rules('klaf_included', $this->lang->line('KALF_INCLUDED_LABEL'), 'trim|required');
            // $this->form_validation->set_rules('tag_included', $this->lang->line('TAG_INCLUDED_LABEL'), 'trim|required');
            $this->form_validation->set_rules('quantity', $this->lang->line('QUANTITY_LABEL'), 'trim|is_natural');            

            // echo "<pre>";
            // print_r($imgData); exit;
            if ($this->form_validation->run() == TRUE) {
                $prodpic = array();
                if(count($imgData) > 0) {
                    foreach ($imgData['name'] as $key => $value) {
                         $prodPhotoArr = multUpload($_FILES['moreimg'],'product_photo','uploads/products_img/','',$key);
                        $prodpic[$key] = $prodPhotoArr['file'];
                    }
                }   
                 // print_r($prodpic);die;
                // $insertData['name']     = $postData['name'];
                $insertData['user_id']  = $data['userData']['id'];
                $insertData['category'] = $postData['category'];
                $insertData['ktav']     = $postData['ktav'];
                $insertData['ktav_size']  = $postData['ktav_size'];
                $insertData['plines']     = $postData['plines'];
                $insertData['line_size']  = $postData['line_size'];
                $insertData['mezuzot']    = $postData['mezuzot'];
                $insertData['parshiot']   = $postData['parshiot'];
                $insertData['amudim']     = $postData['amudim'];
                $insertData['remark']     = htmlentities(trim($postData['remark']),ENT_QUOTES);
                $insertData['product_type']     = $postData['product_type'];
                $insertData['priceinshekel']    = round($postData['priceinshekel'],2);
                $insertData['priceindollar']    = round($postData['priceindollar'],2);
                $insertData['quantity']         = $postData['quantity'];
                $insertData['finishDate']       = date('Y-m-d', strtotime($postData['finishDate']));
                // $insertData['klaf_included']    = $postData['klaf_included'];
                $insertData['tag_included']     = $postData['tag_included'];
                // $insertData['product_photo']    = !empty($prodpic) ? $prodpic : $data['prodData']['product_photo'];
                
                if($prodid) {
                    $a = $this->Product_model->updateproductdetails($insertData,$prodid);
                    if(count($imgData['name']) > 0) {
                       // $deleteImages = $this->Product_model->delete_images('product_images' , $prodid);
                        $type = '';
                        foreach ($imgData['name'] as $key => $value) {
                            $ext = explode('.', $value);
                            if($imgData['type'][$key] == 'image/jpeg' || $imgData['type'][$key] == 'image/png' ||$imgData['type'][$key] == 'image/jifi') {
                                $type = 'image';
                            }
                            else if($imgData['type'][$key] == 'video/mp4' || $imgData['type'][$key] == 'video/3gpp') {
                                 $type = 'video';
                            }
                                $insertImage['product_id'] = $prodid;
                                $insertImage['product_img'] = $prodpic[$key];
                                $insertImage['type'] = $type;
                                $this->Product_model->insert_images('product_images' , $insertImage);
                    }  
                    }
                   
                    $this->session->set_flashdata('flash_message', ['title'=>'','type'=>'success','text'=>$this->lang->line('PRODUCT_UPDATED')]);
                    
                } else {    
                    $a = $this->Product_model->insertproductdetails($insertData);
                     // print_r($a);die;
                  
                    if ($a > 0) {
                        $type = '';
                        foreach ($imgData['name'] as $key => $value) {
                            $ext = explode('.', $value);
                            if($imgData['type'][$key] == 'image/jpeg' || $imgData['type'][$key] == 'image/png' ||$imgData['type'][$key] == 'image/jifi') {
                                $type = 'image';
                            }
                            else if($imgData['type'][$key] == 'video/mp4' || $imgData['type'][$key] == 'video/3gpp') {
                                 $type = 'video';
                            }
                                $insertImage['product_id'] = $a;
                                $insertImage['product_img'] = $prodpic[$key];
                                $insertImage['type'] = $type;
                                $this->Product_model->insert_images('product_images' , $insertImage);
                        }
                    }

                    $sku = ___idFormatGenerator('P',6,(1000+$a));
                    $this->Product_model->updateproductdetails(array('sku'=>$sku),$a);
                    $this->session->set_flashdata('flash_message', ['title'=>'','type'=>'success','text'=>$this->lang->line('PRODUCT_ADDED')]);
                }
                redirect('admin/products/list/'.$id);
            } else {
                foreach ($postData as $pdk => $pdv) {
                    $data['prodData'][$pdk] = $pdv;
                }
            }
        }
        $data['prodImages'] =  $this->Product_model->get_images('product_images',$prodid);
        _renderAdminView('product/add-edit', $data);
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