<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reply_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	/**
	 * [selectReply 获取回复表的所有信息]
	 * @param  string  $where    [条件]
	 * @param  integer $start    [开始位置]
	 * @param  integer $limit    [限制条数]
	 * @param  string  $order_by [排序]
	 * @return [array]            [二维数组]
	 */
	public function selectReply($where='',$start=0,$limit=0,$order_by='reply_time desc'){
		$this->db->from('reply');
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

	//插入一条数据insert
	public function create($data){
		$this->db->insert('reply',$data);
		return $this->db->insert_id();
	}

	public function countReply($where=""){
		if($where){
			$this->db->where($where);
		}
		return $this->db->count_all_results('reply');
	}

	//更新数据update
	public function update($data,$where){
		return $this->db->update('reply',$data,$where);
	}
	
	//删除数据delete
	public function delete($where){
		return $this->db->delete('reply',$where);
	}
} 