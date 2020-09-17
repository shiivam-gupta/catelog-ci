<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class OrderController extends Admin_Controller{
    function __construct() {
        parent::__construct();
        $this->pageTitle = $this->lang->line('ORDER_PAGE_TITLE');
        ___checkAdminLoginStatus();
    }

    public function allOrderList() {
    	$data['orderlist'] = $this->Order_model->getallorderlist();
        _renderAdminView('order/all-list',$data);
    }

    public function orderView()
    {
    	$id = $this->uriSegments[4];
        $orderDetail = $this->Cart_model->getorderDetails($id,null);
    	$status='';
    	foreach ($orderDetail as $oDk => $oDv) {
    		$orderArr[$oDv['order_id']][] = $oDv;
    		$status = $oDv['status'];
    	}
    	$data['status'] = $status;
    	$data['orderviewlist'] = $orderArr;
        _renderAdminView('order/order-view',$data);
    }

    public function statusUpdate()
    {
        $data = $this->input->post();
        $this->Order_model->setstatusupdate($data);
        $this->session->set_flashdata('flash_message', ['title'=>'','type'=>'success','text'=>$this->lang->line('STATUS_UPDATED')]);
        redirect('admin/order/view/'.$data['id']);
    }

}