<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}
	// 有条件获取blog表的所有数据，默认获取所有数据
	public function selectBlog($where="",$start=0,$limit=0,$order_by='blog_id desc'){
		$this->db->from('blog');
		if($where){
			$this->db->where($where);
		}
		$this->db->order_by($order_by);
		if($limit>0){
			$this->db->limit($limit,$start);
		}
		$blog = $this->db->get();
		//result_array()以数组返回多个结果。
		return $blog->result_array();
	}

	//获取特定一条数据
	public function getBlog($where){
		$this->db->where($where);
		$oneBlog = $this->db->get('blog');
		return $oneBlog->row_array();
	}

	//获取年份信息
	public function getBlogYear(){
		$this->db->select('year');
		$year = $this->db->from('blog')->group_by('year')->order_by('year','desc')->get();
		return $year->result_array();

	}
	
	// 有条件获取blog表的所有数据总数，默认获取所有数据总数
	public function countBlog($where=""){
		if($where){
			$this->db->where($where);
		}
		return $this->db->count_all_results('blog');
	}

	//插入一条数据insert
	public function create($data){
		$this->db->insert('blog',$data);
		return $this->db->insert_id();
	}

	//更新数据update
	public function update($data,$where){
		return $this->db->update('blog',$data,$where);
	}
	
	//删除数据delete
	public function delete($where){
		return $this->db->delete('blog',$where);
	}
}

