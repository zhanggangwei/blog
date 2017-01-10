<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('text','form');
		$this->load->model('blog_model','blog');
		$this->load->model('user_model','user');
		$this->load->library('form_validation');
		//取所有博客分类表信息
		$this->load->model('category_model','category');
		$cat_info = $this->category->selectCategory();
		//博客表模型已在构造函数里加载
		//取所有博客年份信息
		$year_info = $this->blog->getBlogYear();
		$cat_id = $this->uri->segment(3,0);
		$data=array(
			'cat_info'=>$cat_info,
			'cat_id'=>$cat_id,
			'year_info'=>$year_info
			);
		
		$this->load->vars($data);
	}
	//前台主页
	public function index()
	{	
		//获取地址栏接收到的分类，默认0
		$cat_id = $this->uri->segment(3,0);
		//通过第3段得到的数据，给不同的$where[这是一个数组]条件.此条件用于取分类下所有数据，也用于取分类下记录总数
		if($cat_id>1000){
			//$cat_id>1000就是年份
			$where = array('year'=>$cat_id);
		}else if($cat_id==0){
			//没有分类
			$where = "";
		}else{
			//剩下的情况归为文章分类
			$where = array('category_id'=>$cat_id);
		}
		
		//至此，$where条件有了。
		
		$current = $this->uri->segment(4,1);
		$limit = 4;
		$start = ($current-1)*$limit;

		//至此，$where,$start,$limit条件都有了。取数据去
		$info = $this->blog->selectBlog($where,$start,$limit);
		
		//分页。当前页、限制条数、开始位置，这些参数在上面已经有了
		//还差总数
		$count = $this->blog->countBlog($where);
		// echo $count;
		$this->load->library('pagination');
		$config['base_url'] = site_url('main/index/'.$cat_id);
		$config['total_rows'] = $count;
		$config['per_page'] = $limit;
		// $config['uri_segment'] = 4;
		$config['uri_segment'] = 4;
		
		$this->pagination->initialize($config); 
		$page_link = $this->pagination->create_links();

		$data=array(
			'info'=>$info,
			'page_link'=>$page_link
			);
		$this->load->view('header');
		$this->load->view('main',$data);
		$this->load->view('footer');
	}
	//加载login页面
	// public function login(){
	// 	if ($_POST) {
	// 		$username = $this->input->post('username',TRUE);
	// 		$user_email = $this->input->post('user_email',TRUE);
	// 		$password = $this->input->post('password',TRUE);
	// 		$arr = array(
	// 			"user_name"=>$username,
	// 			"user_email"=>$user_email,
	// 			"user_password"=>md5($password),
	// 			"user_addtime"=>time(),
	// 			);
	// 		$res = $this->db->insert('user',$arr);
	// 		if ($res) {
	// 			alert('注册成功！',site_url(""));
	// 			// redirect(site_url(""));
	// 		}

	// 	}
		
	// 	// $this->load->view('header');
	// 	$this->load->view('login');
	// 	// $this->load->view('footer');
	// }
	//about页
	public function about(){
		$this->load->view('header');
		$this->load->view('about');
		$this->load->view('footer');
	}
	//study页
	public function study(){
		
		$this->load->view('header');
		$this->load->view('study');
		$this->load->view('footer');
	}
	//contact页
	public function contact(){
		$this->load->view('header');
		$this->load->view('contact');
		$this->load->view('footer');
	}
	//blog详细页
	public function detail(){
		//获得地址栏过来的ID
		$id = $this->uri->segment(3,1);
		$where = array(
			'blog_id' => $id
			);
		//去BLOG取一条数据
		$oneBlog = $this->blog->getBlog($where);
		//取回复表
		$this->load->model('reply_model',"reply");

		// $current = $this->uri->segment(4,0);
		// $limit = 3;
		// $start = $id*$limit;
		$info = $this->reply->selectReply($where,0,5);
		$data=array(
			'oneBlog'=>$oneBlog,
			'info'=>$info
			);
		$this->load->view('header');
		$this->load->view('detail',$data);
		$this->load->view('footer');
	}
	//回复
	public function reply(){
		$blog_id = $this->uri->segment(3);
		$this->form_validation->set_rules('email','邮箱','required|valid_email');
		$this->form_validation->set_rules('content','内容','required');
		if($this->form_validation->run()==FALSE){
			// redirect('main/detail'.'/'.$blog_id);
			alert('没有提交数据或邮箱不正确',site_url('main/detail').'/'.$blog_id);
		}else{
			$email = $this->input->post("email");
			$content = $this->input->post("content");
			$data = array(
				'reply_email'=>$email,
				'reply_time'=>time(),
				'reply_content'=>$content,
				'blog_id'=>$blog_id
				);
			$res = $this->db->insert('reply',$data);
			if($res){
				// redirect('mail/detail'.'/'.$blog_id);
				alert('评论成功',site_url('main/detail').'/'.$blog_id);
			}else{
				die(mysql_error());
			}
		}

	}
	

}
