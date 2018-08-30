<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
    	$model=M("admin");
    	if($_POST){
            $pattern="/^[A-Za-z]+$/";
    		$username=$_POST['username'];
            $result=preg_match($pattern,$username);
            if(!$result){
                $this->error("用户名格式不正确");
            }
            $username=$this->str_filter($username);
            $checkname=$model->where("username = '".$username."'")->find();
            if(!$checkname){
                $this->add_log("登陆",0,"用户名不存在",$username);
                $this->error("用户名不存在");
            }
            $this->checkCode();
    		$password=$_POST['password'];
            $password=$this->str_filter($password);
    		$password=md5($password);
            if($checkname['password'] == $password){
                $_SESSION['usermsg']=$checkname;
                $this->add_log("登陆",1,"正常登陆",$username);
                $this->redirect("Index/index");
            }else{
                $this->add_log("登陆",0,"密码错误，登陆失败",$username);
                $this->error("密码错误，登陆失败");
            }
    	}else{
            $Smodel=M("system");
            $mes=$Smodel->where("id = 1")->find();
            $this->assign("mes",$mes);
        	$this->display();
    	}
    }
    public function str_filter($str){
        $str=trim($str);
        $str=str_replace(' ','',$str);
        $str=str_replace('"','',$str);
        $str=str_replace("'",'',$str);
        return $str;
    }
    public function add_log($action,$status,$note='',$username=''){
        $username=($username == '')?$_SESSION['usermsg']['username']:$username;
        $arr['username']=$username;
        $arr['uip']=$_SERVER['REMOTE_ADDR'];
        $arr['action']=$action;
        $arr['status']=$status;
        $arr['note']=$note;
        M("log")->add($arr);
    }
    public function verify()
    {
        $config =    array(
            'fontSize'    =>    100,    // 验证码字体大小
            'length'      =>    4,     // 验证码位数
            'useNoise'    =>    false, // 关闭验证码杂点
            // 'useImgBg'    =>    true,
            'fontSize'    =>    30
        );
        $Verify = new \Think\Verify($config);
        // $Verify->codeSet = '0123456789afdsawqerqrqwerqrwqrqrqrsdffgdfghszdvvxzcvzxvcw'; 
        $Verify->entry();
    }
    public function checkCode()
    {
        $Verify = new \Think\Verify;
        if(!$Verify->check($_POST['code']))
        {
            $this->error("验证码错误！",U("Login/index"));
            return false;
        }
    }
}