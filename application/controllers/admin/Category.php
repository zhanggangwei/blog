<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('category_model','category');
		islogin();
	}
	public function category_list()
	{
		$this->load->library('pagination');
		$current = $this->uri->segment(4,1);
		$limit = 4;
		$start = ($current-1)*$limit;

		$info = $this->category->selectCategory("",$start,$limit);
		$count = $this->category->countCategory();

		$config['base_url'] = site_url('admin/category/category_list');
		$config['total_rows'] = $count;
		$config['per_page'] = $limit;
		$config['uri_segment'] = 4;

		$this->pagination->initialize($config);
		$page_link = $this->pagination->create_links();

		$data = array(
			'info'=>$info,
			'page_link'=>$page_link

			);
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/category_list',$data);
		$this->load->view('admin/footer');
	}

	public function category_add()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','分类名称','required');
		if($this->form_validation->run()==false){
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/category_add');
			$this->load->view('admin/footer');
		}else{
			$name = trim($this->input->post('name',TRUE));
			$arr = array(
				'category_name'=>$name
				);
			$res = $this->category->create($arr);
			if($res){
				redirect('admin/category/category_list');
			}else{
				redirect('admin/category/add');
			}
		}
		
	}

	public function edit(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title','名称','required');
		
		if($this->form_validation->run()==FALSE){
			$id = $this->uri->segment(4,0);
			$where = array('category_id'=>$id);
			$info = $this->category->getCategory($where);
			$data = array(
				'info'=>$info
				);
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/category_edit',$data);
			$this->load->view('admin/footer');
		}else{
			$title = $this->input->post('title',TRUE);
			$id = $this->input->post('id',TRUE);

			$update = array(
				'category_name'=>$title
				);
			// print_r($update);
			$res = $this->category->update($update,array('category_id'=>$id));
			if($res){
				redirect('admin/category/category_list');
			}else{
				// echo $this->db->last_query();
			}
		}
	}

	public function delete(){
		$id = $this->uri->segment(4,0);
		$where = array('category_id'=>$id);
		$res = $this->category->delete($where);
		if($res){
			redirect('admin/category/category_list');
		}
	}
}
