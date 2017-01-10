<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publishblog extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	/**
	 * [selectCategory 获取分类表的所有信息]
	 * @param  string  $where    [条件]
	 * @param  integer $start    [开始位置]
	 * @param  integer $limit    [限制条数]
	 * @param  string  $order_by [排序]
	 * @return [array]            [二维数组]
	 */
	public function selectCategory($where='',$start=0,$limit=0,$order_by='category_id desc'){
		$this->db->from('categories');
		if($where){
			$this->db->where($where);
		}
		$this->db->order_by($order_by);
		if($limit>0){
			$this->db->limit($limit,$start);
		}
		$query = $this->db->get();
		return $query->result_array();
	}
	//获取特定一条数据
	public function getCategory($where){
		$this->db->where($where);
		$oneBlog = $this->db->get('categories');
		return $oneBlog->row_array();
	}
	public function countCategory($where=""){
		if($where){
			$this->db->where($where);
		}
		return $this->db->count_all_results('categories');
	}
	//插入一条数据insert
	public function create($data){
		$this->db->insert('categories',$data);
		return $this->db->insert_id();
	}
	//更新数据update
	public function update($data,$where){
		return $this->db->update('categories',$data,$where);
	}
	//删除数据delete
	public function delete($where){
		return $this->db->delete('categories',$where);
	}

} 