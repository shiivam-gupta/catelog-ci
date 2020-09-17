<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_model extends CI_Model {

	public function getproductdetail()
	{
		$pr_dtl = $this->db->where('status','active')->select('id,name,priceindollar,product_photo,quantity')->get('products');
		return $pr_dtl->result_array();
	}

	public function insertcartdetails($data)
	{
		$this->db->insert('orders',$data);
     	return $this->db->insert_id();
	}

	public function getOrderList($id=null,$condition=array(),$returnType='result_array')
	{
		//$this->db->select('odr.*,pro.name,pro.product_photo,pro.remark,pro.category,dr.orderDate');
		$this->db->select('odr.*');
		$this->db->from('orders as odr');
		/*$this->db->join('products as pro','pro.id=odr.product_id','inner');
		$this->db->join('orders as dr','dr.id=odr.order_id','inner');
		$this->db->where('pro.status','active');*/
		$odr_qry = $this->db->get();
		return $odr_qry->$returnType();
	}

	public function getorderDetails($id=null,$order_id=null)
	{
		$this->db->select('odr.*,pro.sku,pro.name,pro.product_photo,pro.remark,pro.category,pro.ktav,pro.product_type,pro.ktav_size,pro.plines,pro.line_size,dr.orderDate,dr.status,usr.firstname,usr.lastname,concat(firstname," ",lastname) as fullname');
		$this->db->from('order_details as odr');
		$this->db->join('users as usr','usr.id=odr.supplier_id');
		$this->db->join('products as pro','pro.id=odr.product_id','inner');
		$this->db->join('orders as dr','dr.id=odr.order_id','inner');
		$this->db->where('pro.status','active');
		$this->db->order_by("odr.id", "desc");
		if($id){ $this->db->where('odr.order_id',$id); }
		if($order_id){ $this->db->where_in('odr.order_id',$order_id); }
		$odr_qry = $this->db->get();
		// echo $this->db->last_query(); die();
		return $odr_qry->result_array();
	}

 	public function insertOrderDetails($data) {
      	$this->db->insert_batch('order_details',$data);
      	return true;
 	}

	public function deleteOrder($id) {
		/*$product = $this->db->where('id',$id)->select('*')->get('products');
		$a = $product->row_array();

		$productphoto = $a['product_photo'];
		if($productphoto != NULL) {
		   	@unlink($productphoto);
		}*/
		$this->db->where('id',$id)->delete('orders');
		return true;
	}

	public function getorderid($id)
	{	
		$odr_qry = $this->db->where('user_id',$id)->select('id')->get('orders');
		return $odr_qry->result();
	}	
}	