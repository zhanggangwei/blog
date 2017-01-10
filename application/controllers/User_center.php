<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_center extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('user_model','user');//第二个参数是取的别名
		$this->load->helper('text','form');//铺助函数

	}
	public function index(){
		
		$this->load->view('user_coreheader');
		$this->load->view('user_sidebar');
		$this->load->view('user_center');
		$this->load->view('user_corefooter');

	}
	public function publish(){
		$blogcontent = trim($this->input->post('blogcontent',TRUE));
		// echo "$blogcontent";die;
		
		$data = array(
			'userblog_content'=>$blogcontent,
			'usercontent_id'=>$this->session->user_name
			);
		
		// print_r($where);die;
		$res = $this->user->Insert($data);
		if ($res) {
			alert('发布成功！',site_url("publishblog/index"));
		}else{
			alert('意外错误！');
		}
		
		
	}
	public function userBlog(){
		$where = array(
			'usercontent_id'=>$this->session->user_name
			);
		$res = $this->user->getUserblog($where);
		$data['info'] = $res;
		$this->load->view('header');
		$this->load->view('userblog',$data);
		$this->load->view('footer');
	}
	public function userMsg(){
		$where = array(
			'user_id'=>$this->session->user_id
			);
		$res = $this->user->getUser($where);
		$data = array(
			'user_email'=>$res['user_email'],
			'user_name'=>$res['user_name'],
			'user_logintime'=>$res['user_logintime'],
			);
		$whe = array(
			'usercontent_id'=>$this->session->user_name
			);
		$result = $this->user->getUserblog($whe);
		$data['info'] = $result;
		$this->load->view('header');
		$this->load->view('userMsg',$data);
		$this->load->view('footer');
	}
	public function userAlter(){
			$user_name = trim($this->input->post('user_name',TRUE));
			$user_email = trim($this->input->post('user_email',TRUE));
			if ($user_name == $this->session->user_name && $user_email == $this->session->user_email) {
				alert('未做任何修改！',site_url('user/userMsg'));
			}else{
				$where = array(
				'user_id'=>$this->session->user_id
				);
				$data = array(
					'user_email'=>$user_email,
					'user_name'=>$user_name,
					);
				$res = $this->user->update($data,$where);

				if($res){
					$res = $this->user->getUser($where);
					//1、重新设置session
					$arr = array(
					'user_name'=>$res['user_name'],
					'user_email'=>$res['user_email'],
					'user_id'=>$res['user_id'],
					'user_lastlogintime'=>$res['user_lastlogintime'],
					'islogin'=>89//ture
					);
					$this->session->set_userdata($arr);
					//2、跳转主页
					alert('修改成功！',site_url());
					// redirect();
				}else{
					alert('意外失败！',site_url('user/userMsg'));
				}
			}
	}
	public function userdel(){
		$id = $this->uri->segment(3,0);
		$where = array('userblog_id'=>$id);
		$res = $this->user->delete($where);
		if($res){
			redirect('user/userblog');
		}
	}
}
