<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reply extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('reply_model','blog');
		islogin();
	}
	public function reply_list()
	{
		$this->load->library('pagination');
		$current = $this->uri->segment(4,1);
		$limit = 2;
		$strat = ($current-1)*$limit;

		$info = $this->blog->selectReply("",$strat,$limit);
		$count = $this->blog->countReply();

		$config['base_url'] = site_url('admin/reply/reply_list');
		$config['total_rows'] = $count;
		$config['per_page'] = $limit;
		$config['use_page_numbers'] = true;
		$config['uri_segment'] = 4;

		$this->pagination->initialize($config);

		$page_link = $this->pagination->create_links();

		$data = array(
			'info'=>$info,
			'page_link'=>$page_link

			);
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/reply_list',$data);
		$this->load->view('admin/footer');
	}

	
	public function delete(){
		$id = $this->uri->segment(4,0);
		$where = array('reply_id'=>$id);
		$res = $this->blog->delete($where);
		if($res){
			redirect('admin/reply/reply_list');
		}
	}
}
