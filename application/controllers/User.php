<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('user_model','user');//第二个参数是取的别名
		$this->load->helper('text','form');//铺助函数

	}
	
	public function login(){
		// echo 123;die;
		//1、加载表单验证类
		// print_r($_POST);
		//2、设置验证规则
		$this->form_validation->set_rules('username','用户名','required|valid_email');
		$this->form_validation->set_rules('password','密码','required');
		if($this->form_validation->run()==FALSE){
			//跳转回登录页
			
			alert('请输入相关信息',site_url());

		}else{
			$username = trim($this->input->post('username',TRUE));
			$password = trim($this->input->post('password',TRUE));
			$where = array(
				'user_email'=>$username,
				'user_password'=>md5($password)
				);
			//去数据表查匹配条件的数据，查到就进入
			$res = $this->user->getUser($where);
			// echo date('Y-m-d H:i:s',$res['user_lastlogintime']);die;
			if($res){
				// //插入登录时间
				$data = array(
					'user_lastlogintime'=>time()
					);
				$where = array(
					'user_id'=>$res['user_id']
					);
				$this->user->update($data,$where);
				// // print_r($users);die;
				//登入后
				//1、设置session
				$arr = array(
					'user_name'=>$res['user_name'],
					'user_email'=>$res['user_email'],
					'user_id'=>$res['user_id'],
					'user_lastlogintime'=>$res['user_lastlogintime'],
					'islogin'=>89//ture
					);
				$this->session->set_userdata($arr);
				//2、跳转主页
				alert('登陆成功！',site_url());
				// redirect();
			}else{
				alert('登陆失败！',site_url());
			}
		}
		
	}
	public function logout(){
		$this->load->library('session');

		// $arr = array(
		// 	'user_name'=>$res['user_name'],
		// 	'user_id'=>$res['user_id'],
		// 	'islogin'=>89
		// 	);
		//删除session
		$array_items = array('user_name','user_id','islogin');
		$this->session->sess_destroy($array_items);

		
		//跳转到首页
		alert('已退出！',site_url());
	}

}
