<?php
namespace Admin\Controller;
class IndexController extends BaseController {
    public function index(){
    	$username=$_SESSION['usermsg']['username'];
    	$log=M("log")->where("username = '".$username."' and action = '登陆' and status = 1")->order("id DESC")->find();
    	// echo M("log")->getLastSql();exit;
    	$where['status']=1;

	    $policy_cate=$this->get_cate("1");
	    $news_cate=$this->get_cate("2");
        // print_r($news_cate);exit;
	    for ($i=0; $i < count($policy_cate); $i++) { 
	      $policy_arr[]=$policy_cate[$i]['id'];
	    }
	    for ($i=0; $i < count($news_cate); $i++) { 
	      $news_arr[]=$news_cate[$i]['id'];
	    }
	    $where['cid']=array("in",$policy_arr);
    	$policy=M("news")->where($where)->count();

    	$where['cid']=array("in",$news_arr);
    	$news=M("news")->where($where)->count();

    	$images=M("image")->where(array("status"=>1,"route"=>array("neq","")))->count();

    	$users=M("admin")->where("status = 1")->count();

    	$views=M("views")->count();

    	$this->assign("views",$views);
    	$this->assign("users",$users);
    	$this->assign("images",$images);
    	$this->assign("policy",$policy);
    	$this->assign("news",$news);
    	$this->assign("log",$log);
        $this->display();
    }
}