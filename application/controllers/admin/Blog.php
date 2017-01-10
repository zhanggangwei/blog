<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	function __construct(){
		parent::__construct();
		//Blog相当于后台入口文件，在这个构造函数里判断是否存在$_SESSION['islogin'];来决定去不去LOGIN页
		islogin();
		$this->load->model('blog_model','blog');
		
	}
	public function index()
	{	
		$this->load->model('admin_model','admin');
		$username = $this->session->username;
		$res = $this->admin->getAdmin(array('admin_name'=>$username));
		$data = array(
			'res'=>$res
			);
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar');
		$this->load->view('admin/index',$data);
		$this->load->view('admin/footer');
	}

	
}
