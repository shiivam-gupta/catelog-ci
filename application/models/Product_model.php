<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

	public function insertproductdetails($data) {
		$this->db->insert('products',$data);
     	return $this->db->insert_id();
	}

	public function insert_images($table='' , $data = '') {
		$this->db->insert($table , $data);
		return $this->db->insert_id();
	}
	public function get_images($table = '' , $id='') {
		$result = array();
		$this->db->select('id ,product_img , type');
		$this->db->from($table)
		->where('product_id' ,$id);
		$query = $this->db->get();
		$result = $query->result_array();
   		return $result;
	}
	public function getproductlist($userId=null,$whereArr=array(),$limit=null,$offset=null,$returnType='result') {
		$this->db->select('prod.*,us.id as supplier_id, us.firstname,us.lastname,concat(firstname," ",lastname) as fullname ,(select  pi.product_img  from product_images as pi where pi.product_id = prod.id limit 1) as product_img,(select  ty.type  from product_images as ty where ty.product_id = prod.id limit 1) as type');
		$this->db->from('products as prod');
		$this->db->join('users as us','us.id=prod.user_id','inner');
		//$this->db->join('product_images as pi' , 'pi.product_id =prod.id' , 'left');
		$this->db->where('prod.status','active');
		if($userId) {
			$this->db->where('prod.user_id',$userId);	
		}
		if(!empty($whereArr)) {
			$this->db->where($whereArr);	
		}
		// if($limit) {
		// 	$this->db->limit($limit);
		// }
		if($offset) {
			$this->db->offset($offset);
		}
		$a = $this->db->get();
		return $a->$returnType();
	}

	public function getpurchaselist($userId=null,$whereArr=array(),$limit=null,$offset=null,$returnType='result') {
		$this->db->select('prod.*,us.id as supplier_id, us.firstname,us.lastname,concat(firstname," ",lastname) as fullname');
		$this->db->from('buying_supplier_order as prod');
		$this->db->join('users as us','us.id=prod.supplier_id','inner');
		if($userId) {
			$this->db->where('prod.supplier_id',$userId);	
		}
		if(!empty($whereArr)) {
			$this->db->where($whereArr);	
		}
		// if($limit) {
		// 	$this->db->limit($limit);
		// }
		if($offset) {
			$this->db->offset($offset);
		}
		$a = $this->db->get();
		return $a->$returnType();
	}

	public function getPaymentList($userId=null,$whereArr=array(),$limit=null,$offset=null,$returnType='result') {
		$this->db->select('prod.*,us.id as supplier_id, us.firstname,us.lastname,concat(firstname," ",lastname) as fullname');
		$this->db->from('user_own_amount as prod');
		$this->db->join('users as us','us.id=prod.user_id','inner');
		if($userId) {
			$this->db->where('prod.supplier_id',$userId);	
		}
		if(!empty($whereArr)) {
			$this->db->where($whereArr);	
		}
		// if($limit) {
		// 	$this->db->limit($limit);
		// }
		if($offset) {
			$this->db->offset($offset);
		}
		$a = $this->db->get();
		return $a->$returnType();
	}

	public function getdatabyid($id) {
		$this->db->select('prod.*,us.id as supplier_id, us.firstname,us.lastname,concat(firstname," ",lastname) as fullname');
		$this->db->from('products as prod');
		$this->db->join('users as us','us.id=prod.user_id','left');
	 	$this->db->where('prod.id',$id);
		$pr_dtl = $this->db->get();
      	return $pr_dtl->row_array();
	}

	public function getdatabysku($sku) {
		$this->db->select('prod.*');
		$this->db->from('products as prod');
	 	$this->db->where('prod.sku',$sku);
		$pr_dtl = $this->db->get();
      	return $pr_dtl->row_array();
	}

 	public function updateproductdetails($data,$id) {
      	$this->db->where('id',$id);
      	$this->db->update('products',$data);
      	return true;
 	}
 	public function get_single_image($table = '' ,$id ='') {
 		$result = array();
	    $this->db->select('product_img')
	      ->from($table)
	      ->where('id', $id);
	    $sql = $this->db->get();
	    $result = $sql->row_array();
	    return $result;

 	}

 	public function delete_image($table='' , $id='') {
 		$this->db->where('id' , $id);
 		$this->db->delete($table);
 	}

	public function deleteProductDetail($id) {
		/*$product = $this->db->where('id',$id)->select('*')->get('products');
		$a = $product->row_array();

		$productphoto = $a['product_photo'];
		if($productphoto != NULL) {
		   	@unlink($productphoto);
		}*/

		$this->db->where('id',$id)->update('products',['status'=>'inactive']);
		return true;
	}

	public function getsupplierlist()
	{
		$condition = array('status'=>'active','scope'=>'Supplier');
		$usr = $this->db->where($condition)->select('id,firstname,lastname')->get('users');
		return $usr->result();
	}

	public function getMaxPrice() {
		$result = array();
		$this->db->select('MAX(priceindollar) as max_dollar , MAX(priceinshekel) as max_shekel');
		$this->db->from('products');
		$query = $this->db->get();
		// echo $this->db->last_query();
		$result = $query->row_array();
   		return $result;
	}

	public function insertRecord($data,$table='products') {
		$this->db->insert($table,$data);
     	return $this->db->insert_id();
	}

	public function updateDetails($data,$id,$table = 'products') {
      	$this->db->where('id',$id);
      	$this->db->update($table,$data);
      	return true;
 	}

	public function getBuyerRecord($table = '') {
		$result = array();
		$this->db->select('selling_to_customer.final_total_usd , selling_to_customer.final_total_isr , u.firstname , selling_to_customer.created_at  , COUNT(stcp.product_id) as net_quantity');
		$this->db->from($table);
		$this->db->join('users as u' ,'u.id = selling_to_customer.buyer_id' , 'INNER');
		$this->db->join('selling_to_customer_products as stcp' , 'stcp.order_id = selling_to_customer.id' , 'INNER');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}

	/* For Getting Product name and price*/
	public function getProductName($table='') {
		$result = array();
		$this->db->select('id,sku');
		$this->db->from($table);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}

	public function getProductPrice($table='' , $id = '') {
		$result = array();
		$this->db->select('priceindollar,priceinshekel');
		$this->db->from($table);
		$this->db->where('id' , $id);
		$query = $this->db->get();
		$result = $query->row_array();
		return $result;
	}

	public function getReciptsFromBuyer(){
		$result = array();
		$this->db->select('u.firstname ,u.lastname , uoa.amount , uoa.created_at')
		->from('user_own_amount uoa');
		$this->db->join('users u' , 'u.id = uoa.user_id' , 'inner');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function adminAll(){
		$result = array();
		$this->db->select('SUM(bso.order_total) as buy_total , SUM(stc.final_total_usd) as sell_total ')
		->from('buying_supplier_order bso');
		$this->db->join('users u' , 'u.id = bso.buyer_id' , 'inner');
		$this->db->join('selling_to_customer stc' , 'stc.supplier_id = u.id' , 'inner');
		$query = $this->db->get();
		$result = $query->row_array();
		return $result;
	}
}


