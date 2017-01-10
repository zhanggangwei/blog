<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	/**
	 * [selectuser 获取回复表的所有信息]
	 * @param  string  $where    [条件]
	 * @param  integer $start    [开始位置]
	 * @param  integer $limit    [限制条数]
	 * @param  string  $order_by [排序]
	 * @return [array]            [二维数组]
	 */
	public function selectUser($where='',$start=0,$limit=0,$order_by='user_logintime desc'){
		$this->db->from('user');
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
	public function getUser($where){
		$this->db->where($where);
		$oneUser = $this->db->get('user');
		return $oneUser->row_array();
	}
	//获取多条数据
	public function getUserblog($where){
		$this->db->where($where);
		$oneUser = $this->db->get('userblog');
		return $oneUser->result_array();
	}
	//插入一条数据insert
	public function create($data){
		$this->db->insert('user',$data);
		return $this->db->insert_id();
	}

	public function countUser($where=""){
		if($where){
			$this->db->where($where);
		}
		return $this->db->count_all_results('user');
	}

	//更新数据update
	public function update($data,$where){
		return $this->db->update('user',$data,$where);
	}
	//添加数据update
	public function Insert($data){
		$this->db->insert('userblog',$data);
		return $this->db->insert_id();
	}
	
	//删除数据delete
	public function delete($where){
		return $this->db->delete('userblog',$where);
	}
} 