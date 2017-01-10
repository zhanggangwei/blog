<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('admin_model','admin');
	}

	public function login()
	{	
		//加载表单验证类
		$this->load->library('form_validation');
		//设置验证规则
		$this->form_validation->set_rules('username', '用户名', 'required');
		$this->form_validation->set_rules('password', '密码', 'required');
		//run()方法判断
		if($this->form_validation->run() == FALSE){
			//跳转回登录页
			$this->load->view('admin/header');
			$this->load->view('admin/login');
			$this->load->view('admin/footer');
		}else{
			
			//接收POST过来合格的数据,true防止跨站攻击
			$username = trim($this->input->post('username',TRUE));
			$password = trim($this->input->post('password',TRUE));

			//getAdmin(),需要的条件$where
			$where = array(
				'admin_name'=>$username,
				'admin_password'=>md5($password)
				);
			//去数据表查匹配条件的数据，查到就进入
			$res = $this->admin->getAdmin($where);
			if($res){
				//登入后
				//1、设置session
				$arr = array(
					'username'=>$res['admin_name'],
					'admin_id'=>$res['admin_id'],
					'islogin'=>1
					);
				$this->session->set_userdata($arr);
				//2、跳转主页
				redirect('admin/blog/index');
			}else{
				redirect('admin/user/login');
			}
		}
		
	}
	public function logout(){
		$this->load->library('session');

		$arr = array(
			'username'=>$res['admin_name'],
			'admin_id'=>$res['admin_id'],
			'islogin'=>1
			);
		//删除session
		$array_items = array('username','admin_id','islogin');
	$this->session->sess_destroy($arr);

		// $this->session->unset_userdata($arr);
		$data = array(
			'admin_lastlogintime'=>time(),
			'admin_lastloginip'=>real_ip()
			);
		$this->admin->update($data,$where);
		//跳转到登录页
		redirect('admin/user/login');
	}
}
