<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('blog_model','blog');
		islogin();
	}
	public function art_list()
	{
		$this->load->library('pagination');
		$current = $this->uri->segment(4,1);
		$limit = 3;
		$start = ($current-1)*$limit;

		$info = $this->blog->selectBlog("",$start,$limit);
		$count = $this->blog->countBlog();

		$config['base_url'] = site_url('admin/article/art_list');
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
		$this->load->view('admin/art_list',$data);
		$this->load->view('admin/footer');
	}

	public function add()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title','标题','required');
		$this->form_validation->set_rules('content','内容','required');
		if($this->form_validation->run()==false){
			//如果为假，正常加载页面，要分类表的信息
			$this->load->model('category_model','category');
			$cate = $this->category->selectCategory();
			$data = array(
				'cate'=>$cate
				);
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/art_add',$data);
			$this->load->view('admin/footer');
		}else{
			$title = trim($this->input->post('title',TRUE));
			$cate = trim($this->input->post('cate',TRUE));
			$content = trim($this->input->post('content',TRUE));
			$time = time();
			$year = date('Y',$time);
			$arr = array(
				'blog_title'=>$title,
				'category_id'=>$cate,
				'blog_content'=>$content,
				'blog_time'=>$time,
				'year'=>$year,
				'admin_id'=>1
				);
			$res = $this->blog->create($arr);
			if($res){
				redirect('admin/article/art_list');
			}else{
				redirect('admin/article/add');
			}
		}
		
	}

	public function edit(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title','标题','required');
		$this->form_validation->set_rules('content','内容','required');
		var_dump($this->form_validation->run());
		if($this->form_validation->run()==FALSE){
			$id = $this->uri->segment(4,0);
			$where = array('blog_id'=>$id);
			$info = $this->blog->getBlog($where);

			$this->load->model('category_model','category');
			$cate = $this->category->selectCategory();
			$data = array(
				'info'=>$info,
				'cate'=>$cate
				);
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/art_edit',$data);
			$this->load->view('admin/footer');
		}else{
			$category_id = $this->input->post('cate',TRUE);
			$title = $this->input->post('title',TRUE);
			$content = $this->input->post('content',TRUE);
			$id = $this->input->post('id',TRUE);

			$update = array(
				'category_id'=>$category_id,
				'blog_title'=>$title,
				'blog_content'=>$content
				);
			// print_r($update);
			$res = $this->blog->update($update,array('blog_id'=>$id));
			if($res){
				redirect('admin/article/art_list');
			}else{
				// echo $this->db->last_query();
			}
		}
	}

	public function delete(){
		$id = $this->uri->segment(4,0);
		$where = array('blog_id'=>$id);
		$res = $this->blog->delete($where);
		if($res){
			redirect('admin/article/art_list');
		}
	}
}
