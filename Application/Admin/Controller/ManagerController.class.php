<?php
namespace Admin\Controller;
class ManagerController extends BaseController {
    public function index(){
        $model=M("admin");
        $where['status']=1;
        // echo $_SESSION['usermsg']['username'];exit;
        $where['username']=array("neq",$_SESSION['usermsg']['username']);
        $mess=$model->where($where)->select();

        for ($i=0; $i < count($mess); $i++) { 
            $mess[$i]['addtime']=date("Y-m-d H:i:s",$mess[$i]['addtime']);
        }
        // print_r($mess);exit;

        $this->assign("mess",$mess);
        $this->display();
    }
    public function admin_add(){
        $model=M("admin");
    	if($_POST){
            $data['username']=$this->str_filter($_POST['username']);
            $pattern="/^[A-Za-z]+$/";
            $res=preg_match($pattern,$data['username']);
            if(!$res){
                $this->error("用户名格式不正确");
            }
            $mes=$model->where("username='".$data['username']."'")->find();
            if($mes){
                $this->error("用户名已存在");
            }
            $data['password']=$this->str_filter($_POST['password']);
            $data['pwd']=$this->str_filter($_POST['pwd']);
            if($data['password'] != $data['pwd']){
                $this->error("两次输入的密码不一致");
            }
            $data['password']=md5($data['password']);
            $data['roleid']=$_POST['roleid'];
    		$data['note']=$_POST['note'];
            $data['addtime']=time();

            $result=$model->add($data);
            if($result){
                $this->add_log("添加管理员",1,"新增管理员：".$data['username']);
                $this->redirect("Manager/index");
            }else{
                $this->error("添加失败");
            }
    	}else{
            $this->assign("action_name","index");
    		$this->display();
    	}
    }
    public function role_edit(){
        $model=M("admin");
        $id=$_GET['id'];
        if($_POST){
            $data['roleid']=$_POST['roleid'];
            $rolename=($data['roleid'] == "1")?"超级管理员":"普通管理员";

            $result=$model->where("id=".$id)->save($data);
            if($result){
                $this->add_log("修改管理员权限",1,"修改管理员权限为：".$rolename);
                $this->redirect("Manager/index");
            }else{
                $this->error("修改失败");
            }
        }else{
            $mes=$model->where("id = ".$id)->find();

            $this->assign("mes",$mes);
            $this->assign("action_name","index");
            $this->display();
        }
    }
    public function admin_edit(){
        $model=M("admin");
        $id=$_SESSION['usermsg']['id'];
        if($_POST){
            $data['realname']=$_POST['realname'];
            $data['sex']=$_POST['sex'];
            $data['mobile']=$_POST['mobile'];
            $data['email']=$_POST['email'];
            $data['note']=$_POST['note'];
            
            $result=$model->where("id=".$id)->save($data);
            if($result){
                $this->redirect("Index/index");
            }else{
                $this->error("修改失败");
            }
        }else{
            $mes=$model->where("id = ".$id)->find();

            $this->assign("mes",$mes);
            $this->assign("controller_name","index");
            $this->assign("action_name","index");
            $this->display();
        }
    }
    public function password_edit(){
        $model=M("admin");
        $id=$_SESSION['usermsg']['id'];
        if($_POST){
            $password=$this->str_filter($_POST['password']);
            $pwd=$this->str_filter($_POST['pwd']);
            if($password == ''){
                $this->error("密码不能为空");
            }
            if($pwd == ''){
                $this->error("请再次输入密码");
            }
            if($password != $pwd){
                $this->error("两次输入的密码不一致");
            }   
            $data['password']=md5($password);
            
            $result=$model->where("id=".$id)->save($data);
            if($result){
                $this->redirect("Index/index");
            }else{
                $this->error("密码修改失败");
            }
        }else{
            $mes=$model->where("id = ".$id)->find();

            $this->assign("mes",$mes);
            $this->assign("controller_name","index");
            $this->assign("action_name","index");
            $this->display();
        }
    }
    public function admin_del(){
        $id=$_GET['id'];
        $model=M("admin");
        $admin=$model->find($id);
        $res=$model->delete($id);
        if($res){
            $this->add_log("管理员删除",1,"成功删除管理员:".$admin['username']);
            $this->ajaxReturn("200");
        }else{
            $this->ajaxReturn("400");
        }
    }
    public function admin_stop(){
        $id=$_GET['id'];
        $model=M("admin");
        $admin=$model->find($id);
        $data['status']=0;
        $res=$model->where("id=".$id)->save($data);
        if($res){
            $this->add_log("管理员禁用",1,"管理员:".$admin['username']."被停用");
            $this->ajaxReturn("200");
        }else{
            $this->ajaxReturn("400");
        }
    }
    public function admin_start(){
        $id=$_GET['id'];
        $model=M("admin");
        $admin=$model->find($id);
        $data['status']=1;
        $res=$model->where("id=".$id)->save($data);
        if($res){
            $this->add_log("管理员启用",1,"管理员:".$admin['username']."被启用");
            $this->ajaxReturn("200");
        }else{
            $this->ajaxReturn("400");
        }
    }
}