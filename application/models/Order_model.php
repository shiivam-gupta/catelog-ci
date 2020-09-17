<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {

	public function getallorderlist() {
		$this->db->select('odr.*,us.firstname,us.lastname,concat(firstname," ",lastname) as fullname');
		$this->db->from('orders as odr');
		$this->db->join('users as us','us.id=odr.user_id','inner');
		$this->db->where('us.status','active');
		$this->db->order_by('odr.id', 'desc');
		$odr_qry = $this->db->get();
		return $odr_qry->result();
	}

	public function setstatusupdate($data)
	{
		$this->db->where('id',$data['id']);
		$this->db->update('orders',$data);
		return true;
	}
}
