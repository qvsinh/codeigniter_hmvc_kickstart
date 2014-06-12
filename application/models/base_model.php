<?php
(defined('BASEPATH')) OR exit('No direct script access allowed');

class Base_model extends CI_Model{

	function __construct() {
		parent::__construct();
	}

	public function get_all($table){
		$query = $this->db->get($table);
		return $query->result();
	}

	public function get_by_id($table, $id){
		$query = $this->db->get_where($table, array('id' => $id));
		return $query->row();
	}

	public function insert($table, $arr_data){
		$this->db->insert($table, $arr_data);
        return $this->db->insert_id();
	}

	public function update($table, $arr_data, $arr_condition = array()){
		if($id && !empty($arr_data) && !empty($arr_condition)){
			foreach ($arr_data as $field => $value) {
				$this->db->set($field, $value);
			}
			foreach ($arr_condition as $field => $value) {
				$this->db->where($field, $value);
			}
			return $this->db->update($table);
		}
		return FALSE;
	}

	public function delete($table, $arr_condition = array()){
		if(!empty($arr_condition)){
			foreach ($arr_condition as $field => $value) {
				$this->db->where($field, $value);
			}
			return $this->db->delete($table);
		}
		return FALSE;
		
	}
}

