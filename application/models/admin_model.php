<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	//获取特定一条数据
	public function getAdmin($where){
		$this->db->where($where);
		$oneBlog = $this->db->get('admin');
		return $oneBlog->row_array();
	}
	//更新数据update
	public function update($data,$where){
		return $this->db->update('admin',$data,$where);
	}

}

