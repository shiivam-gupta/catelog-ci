<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Setting_model extends CI_Model {
		
		private $_setting = 'settings';

		public function __construct() {
			parent::__construct();
		}
		
		public function getAllSettings($settingId = '') {
			$this->db->select('*');
	        $this->db->from($this->_setting);
	    
	        if($settingId) {
	        	$s_id = $settingId;
				$this->db->where('id',$s_id);
	            $q = $this->db->get();
	            return $q->row_array();
	        } else {
	 			$q = $this->db->get();
	            return $q->result_array();
			}
		}

		public function editSetting($data='',$settingId='') {
			if($data) {
				if($settingId) {
					$s_id = $settingId;
	                $this->db->where('id', $s_id);
	                return $this->db->update($this->_setting, $data);
				}
			}
		}

		public function updateBatchSetting($data) {
			if(!empty($data)) {
				$this->db->truncate($this->_setting);
				$this->db->insert_batch($this->_setting,$data);
			}
			return true;
		}
	}

?>
