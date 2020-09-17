<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MainController extends Admin_Controller {
    
    function __construct() {
        parent::__construct();
        $this->pageTitle = $this->lang->line('USER_PAGE_TITLE');
        ___checkAdminLoginStatus();
    }

    public function index() {
        $this->pageTitle = $this->lang->line('PAGE_TITLE');
        $data['userCount'] = $this->Supplier_model->suppliers(array('status'=>'active'),'num_rows');
        $data['productCount'] = $this->Product_model->getproductlist(null,null,null,null,'num_rows');
        $data['orderCount'] = $this->Cart_model->getOrderList(null,null,'num_rows');
        _renderAdminView('dashboard/dashboard',$data);
    }

    public function supplierList() {
        $postData = $this->input->post();
        $conditions = array("status"=>"active");
        foreach ($postData as $pdk => $pdv) {
            if(!empty($pdv)) {
                $conditions[$pdk] = $pdv;
            }
        }
        $data = $conditions;
        $data['supplierlist'] = $this->Supplier_model->suppliers($conditions);
        $data['countrylist'] = $this->Supplier_model->sendcountry();
        _renderAdminView('suppliers/list',$data); 
    }

    public function addEditsupplier($id=null) {
        if($this->uriSegments[3] == 'add'){
            $this->pageTitle = $this->lang->line('USER_ADD_PAGE_TITLE');
        } else {
            $this->pageTitle = $this->lang->line('USER_EDIT_PAGE_TITLE');
        }
        $supplier_id =$id;
        $data['userData'] = array();
        $data['countrylist'] = $this->Supplier_model->sendcountry();
        $data['productlist'] = empty($supplier_id) ? 0 : $this->Product_model->getproductlist($supplier_id,null,null,null,'num_rows');
        if(!empty($supplier_id)) {
            $data['userData'] = $this->Supplier_model->getsupplierdetail($supplier_id);
        }
        $postData = array();
        if($this->input->server('REQUEST_METHOD') === "POST"){
            $postData = $this->input->post();
            $this->form_validation->set_rules('firstname', $this->lang->line('FIRST_NAME_LABEL'), 'trim|required|min_length[1]|max_length[40]');
            $this->form_validation->set_rules('lastname', $this->lang->line('LAST_NAME_LABEL'), 'trim|required|min_length[1]|max_length[40]');
            if($postData['email'] != @$data['userData']['email'] || empty($postData['email'])) {
                $this->form_validation->set_rules('email', $this->lang->line('EMAIL_LABEL'), 'trim|valid_email|is_unique[users.email]');
            }

            if($postData['scope'] != 'Supplier' && empty($id)) {
                $this->form_validation->set_rules('password', $this->lang->line('PASSWORD_LABEL'), 'trim|required');
            }
            
            $this->form_validation->set_rules('phone', $this->lang->line('PHONE_LABEL'), 'trim|callback__validatePhone');
            $this->form_validation->set_rules('mobile', $this->lang->line('MOBILE_LABEL'), 'trim|callback__validatePhone');
            $this->form_validation->set_rules('address', $this->lang->line('ADDRESS_LABEL'), 'trim');
            $this->form_validation->set_rules('scope', $this->lang->line('SCOPE_LABEL'), 'trim|required');
            
            if ($this->form_validation->run() == TRUE) {
                if (($_FILES['userimgpath']['name'])) {
                    $userphotoArr = ___fileUpload($_FILES,'userimgpath','uploads/suppliers_img/');
                    $userpic = $userphotoArr['file'];
                }
                if (($_FILES['certificatephotopath']['name'])) {
                    $certPhotoArr = ___fileUpload($_FILES,'certificatephotopath','uploads/suppliers_img/');
                    $certpic = $certPhotoArr['file'];
                }
                //$insertData = $data['userData'];
                $insertData['firstname'] = $postData['firstname'];
                $insertData['lastname']  = $postData['lastname'];
                $insertData['email']     = $postData['email'];
                $insertData['phone']     = $postData['phone'];
                $insertData['mobile']    = $postData['mobile'];
                $insertData['address']   = htmlentities(trim($postData['address']),ENT_QUOTES);
                $insertData['city']      = htmlentities(trim($postData['city']),ENT_QUOTES);
                $insertData['country']   = $postData['country'];
                $insertData['scope']     = $postData['scope'];
                $insertData['certificate']  = $postData['certificate'];
                $insertData['valid']     = $postData['valid'];
                $insertData['remark']    = htmlentities(trim($postData['remark']),ENT_QUOTES);
                $insertData['userimgpath'] = !empty($userpic) ? $userpic : $data['userData']['userimgpath'];
                $insertData['certificatephotopath'] = !empty($certpic) ? $certpic : $data['userData']['certificatephotopath'];
                
                if(!empty($postData['password'])) {
                    $insertData['password'] = md5($postData['password']);
                }
                if($id) {
                    $reqid = $id;    
                    $a = $this->Supplier_model->updatesupplierdetails($insertData,$reqid);
                    $this->session->set_flashdata('flash_message', ['title'=>'','type'=>'success','text'=>$this->lang->line('USER_UPDATED')]);
                } else {
                    $a = $this->Supplier_model->insertsupplierdetails($insertData);
                    $this->session->set_flashdata('flash_message', ['title'=>'','type'=>'success','text'=>$this->lang->line('USER_ADDED')]);
                }
                redirect('admin/supplier/list');
            } else {

                foreach ($postData as $pdk => $pdv) {
                    $data['userData'][$pdk] = $pdv;
                }
            }
        }
        _renderAdminView('suppliers/add-edit',$data);
    }

    public function deletesupplier($id) {
        $supplier_id = $id;
        $a = $this->Supplier_model->deletesupplierdetail($supplier_id);
        $data['countrylist'] = $this->Supplier_model->sendcountry();
        $data['supplierlist'] = $this->Supplier_model->suppliers();
        $message = $this->lang->line('USER_DELETED');
        $this->session->set_flashdata('flash_message', ['title'=>'','type'=>'success','text'=>$message]);
        redirect('admin/supplier/list');
    }

    public function changeAdminLanguage($lang) {
        $lang = $lang;
        $_SESSION['adminData']['site_lang'] = $lang;
        //header("Refresh:0");
        $currentUrl = $this->session->userdata('currentUrl');
        $this->session->unset_userdata('currentUrl');
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