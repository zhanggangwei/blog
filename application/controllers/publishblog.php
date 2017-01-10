<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publishblog extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('publishblog_model','publishblog');
		// islogin();
	}
	public function index()
	{
		// $this->load->library('pagination');
		// $current = $this->uri->segment(4,1);
		// $limit = 4;
		// $start = ($current-1)*$limit;

		// $info = $this->publishblog->selectpublishblog("",$start,$limit);
		// $count = $this->publishblog->countpublishblog();

		// $config['base_url'] = site_url('admin/publishblog/publishblog_list');
		// $config['total_rows'] = $count;
		// $config['per_page'] = $limit;
		// $config['uri_segment'] = 4;

		// $this->pagination->initialize($config);
		// $page_link = $this->pagination->create_links();

		// $data = array(
		// 	'info'=>$info,
		// 	'page_link'=>$page_link

		// 	);
		$this->load->view('user_coreheader');
		$this->load->view('user_sidebar');
		$this->load->view('user_publishblog');
		$this->load->view('user_corefooter');
	}

	// public function publishblog_add()
	// {
	// 	$this->load->library('form_validation');
	// 	$this->form_validation->set_rules('name','分类名称','required');
	// 	if($this->form_validation->run()==false){
	// 		$this->load->view('admin/header');
	// 		$this->load->view('admin/sidebar');
	// 		$this->load->view('admin/publishblog_add');
	// 		$this->load->view('admin/footer');
	// 	}else{
	// 		$name = trim($this->input->post('name',TRUE));
	// 		$arr = array(
	// 			'publishblog_name'=>$name
	// 			);
	// 		$res = $this->publishblog->create($arr);
	// 		if($res){
	// 			redirect('admin/publishblog/publishblog_list');
	// 		}else{
	// 			redirect('admin/publishblog/add');
	// 		}
	// 	}
		
	// }

	// public function edit(){
	// 	$this->load->library('form_validation');

	// 	$this->form_validation->set_rules('title','名称','required');
		
	// 	if($this->form_validation->run()==FALSE){
	// 		$id = $this->uri->segment(4,0);
	// 		$where = array('publishblog_id'=>$id);
	// 		$info = $this->publishblog->getpublishblog($where);
	// 		$data = array(
	// 			'info'=>$info
	// 			);
	// 		$this->load->view('admin/header');
	// 		$this->load->view('admin/sidebar');
	// 		$this->load->view('admin/publishblog_edit',$data);
	// 		$this->load->view('admin/footer');
	// 	}else{
	// 		$title = $this->input->post('title',TRUE);
	// 		$id = $this->input->post('id',TRUE);

	// 		$update = array(
	// 			'publishblog_name'=>$title
	// 			);
	// 		// print_r($update);
	// 		$res = $this->publishblog->update($update,array('publishblog_id'=>$id));
	// 		if($res){
	// 			redirect('admin/publishblog/publishblog_list');
	// 		}else{
	// 			// echo $this->db->last_query();
	// 		}
	// 	}
	// }

	// public function delete(){
	// 	$id = $this->uri->segment(4,0);
	// 	$where = array('publishblog_id'=>$id);
	// 	$res = $this->publishblog->delete($where);
	// 	if($res){
	// 		redirect('admin/publishblog/publishblog_list');
	// 	}
	// }
}
