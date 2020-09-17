<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Supplier_model extends CI_Model {

     public function sendcountry() {
     	$countrylist = $this->db->get('country');
     	return $countrylist->result();
     }
     
     public function suppliers($conditionArr=array(),$returnType='result') {
          if(!empty($conditionArr)) {
               $this->db->where($conditionArr);
          }
          $s = $this->db->get('users');
          return $s->$returnType();
     }

     public function insertsupplierdetails($data) {
     	$this->db->insert('users',$data);
     	return $this->db->insert_id();
     }

     public function getsupplierdetail($id) {
          $supp_dtl = $this->db->where('id',$id)->select('*')->get('users');
          return $supp_dtl->row_array();
     }

     public function updatesupplierdetails($data,$id) {
          $this->db->where('id',$id);
          $this->db->update('users',$data);
          return true;
     }

     public function deletesupplierdetail($id) {
          /*$userimgpath = $this->db->where('id',$id)->select('*')->get('users');
          $a = $userimgpath->row_array();
          
          $supplierphoto = $a['userimgpath'];
          $certificatephoto = $a['certificatephotopath'];
          if($supplierphoto != NULL) {
               @unlink($supplierphoto);
          }
          if($certificatephoto != NULL){
               @unlink($certificatephoto);
          }*/
          //$this->db->where('id',$id)->delete('users');
          $this->db->where('id',$id)->update('users',['status'=>'inactive']);
          return true;
     }

     public function getUsers($whereArr=array()) {
          $this->db->select('*');
          $this->db->from('users');
          if(!empty($whereArr)) {
               $this->db->where($whereArr);     
          }          
          $query = $this->db->get();
          $result = $query->result_array();
          return $result;
     }

     public function getallUsers($whereArr) {
          $this->db->select('*');
          $this->db->from('users');
          if(!empty($whereArr)) {
               $this->db->where($whereArr);     
          }          
          $query = $this->db->get();
          $result = $query->result_array();
          return $result;
     }

     /* Get the user details at login time */
     public function checkUser($email, $password, $checkFor='user') {
          $this->db->select('*');
          $this->db->from('users');
          $this->db->where('email', $email);
          if($checkFor == 'admin') {
               $this->db->where('scope', 'Admin');     
          }
          if($checkFor == 'user') {
               $this->db->where('scope', 'Customer');     
          }
          $this->db->where('password', $password);          
          $query = $this->db->get();
          $result = $query->row_array();
          return $result;
     }

}