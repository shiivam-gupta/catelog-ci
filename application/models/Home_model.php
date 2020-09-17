<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

	public function getmaxprice()
	{
		$currencyColumn = get_language($this->siteLang,'currencyColumn');
		$qry = $this->db->select_max($currencyColumn)->where('status','active')->get('products');
		return ceil($qry->row()->$currencyColumn);
	}
}
