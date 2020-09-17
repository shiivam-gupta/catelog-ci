<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CurrencyRate extends CI_Model {

	public function insertproductdetails($data) {
		$this->db->insert('products',$data);
     	return true;
	}

	public function getRate($abbr=null,$returnType='result_array') {
		$this->db->select('*');
		$this->db->from('currency_rates');
		if($abbr) {
			$this->db->where('abbr',$abbr);
		}
		$a = $this->db->get();
		return $a->$returnType();
	}

	public function addRate($data) {
		$this->db->insert('currency_rates',$data);
		$insert_id = $this->db->insert_id();
     	return  $insert_id;
	}

 	public function batchUpdateRate($data) {
 		$this->db->truncate('currency_rates');
      	$this->db->insert_batch('currency_rates',$data);
      	return true;
 	}
}
