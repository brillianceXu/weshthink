<?php
namespace Admin\Controller;
class SystemController extends BaseController {
    public function index(){
        $model=M("system");
    	if($_POST){
    		$data=$_POST;
            $ico=$_FILES['ico'];
            if($ico['name'] != '')
            {
                $oldlogo=$info['ico'];
                  if($oldico){
                    unlink($_SERVER['DOCUMENT_ROOT'].$oldico);
                  }
                $ico=$this->upload_one($ico);
                $data['ico']=$ico;
            }
            $logo=$_FILES['logo'];
            if($logo['name'] != '')
            {
                $oldlogo=$info['logo'];
                  if($oldroute){
                    unlink($_SERVER['DOCUMENT_ROOT'].$oldlogo);
                  }
                $logo=$this->upload_one($logo);
                $data['logo']=$logo;
            }

    		$result=$model->where("id = 1")->save($data);
    		if($result){
                $this->add_log("网站基本信息修改",1,"网站基本信息修改成功");
    			$this->redirect("System/index");
    		}else{
    			$this->error("修改失败");
    		}
    	}else{
            $mes=$model->where("id = 1")->find();
            $this->assign("mes",$mes);
        	$this->display();
    	}
    }
    public function service(){
        $model=M("system");
        if($_POST){
            $data['qq']=$_POST['qq'];
            $data['phone']=$_POST['phone'];
            $data['email']=$_POST['email'];
            $image=$_FILES['weipic'];
            if($image['name'] != '')
            {
                $oldroute=$info['weipic'];
                  if($oldroute){
                    unlink($_SERVER['DOCUMENT_ROOT'].$oldroute);
                  }
                $image=$this->upload_one($image);
                $data['weipic']=$image;
            }
            $result=$model->where("id = 1")->save($data);
            if($result){
                $this->add_log("客服信息修改",1,"客服信息修改成功");
                $this->redirect("System/service");
            }else{
                $this->error("修改失败");
            }
        }else{
            $mes=$model->where("id = 1")->find();
            $mes['weipic']=$mes['weipic'];
            $this->assign("mes",$mes);
            $this->assign("action_name","index");
            $this->display();
        }
    }
    public function system_log(){
        $model=M("log");
        $user=M("admin");

        $page=$_GET['page'];
        $page=($page==null)?"1":$page;
        $pageSize=$_GET['pageSize'];
        $pageSize=($pageSize==null)?"10":$pageSize;
        $article_count=$model->count();
        $totalPage=ceil($article_count/$pageSize);
        $start=($page-1)*$pageSize;

        $log=$model->order("id DESC")->limit($start.",".$pageSize)->select();

        $this->assign("page",$page);
        $this->assign("totalPage",$totalPage);
        $this->assign("pageSize",$pageSize);
        $this->assign("article_count",$article_count);
        $this->assign("log",$log);
        $this->display();
    }
    public function del_log()
    {
        $id=$_GET['id'];
        $model=M("log");
        $logs=$model->find($id);
        $result=$model->delete($id);
        if($result){
            $this->add_log("日志删除",1,"日志删除成功");
            $this->ajaxReturn("200");
        }else{
            $this->ajaxReturn("400");
        }
    }
    public function link(){
        $model=M("link");

        $links=$model->where("status = 1")->order("id DESC")->select();
        $count=count($links);
        
        $this->assign("count",$count);
        $this->assign("links",$links);
        $this->display();
    }
    public function link_add(){
        $model=M("link");
        $id=$_GET['id'];
        if($_POST){
            $sitename=$_POST['sitename'];
            $link=$_POST['link'];

            $data['link']=$link;
            $data['sitename']=$sitename;
            $data['addtime']=time();
            if($id){
                $result=$model->where("id=".$id)->save($data);
            }else{
                $result=$model->add($data);
            }

            if($result){
                $this->add_log("添加友情链接",1,"添加友情链接:".$data['sitename']);
                $this->redirect("System/link");
            }else{
                $this->error("添加失败");
            }
        }else{
            if($id){
                $mes=$model->find($id);
                $this->assign("mes",$mes);
            }
            $this->display();
        }
    }
    public function del_link(){
        $id=$_GET['id'];
        $model=M("link");
        $link=$model->find($id);
        $result=$model->delete($id);
        if($result){
            $this->add_log("删除友情链接",1,"删除友情链接:".$link['sitename']."成功");
            $this->ajaxReturn("200");
        }else{
            $this->ajaxReturn("400");
        }
    }
    public function datadel(){
        $del=$_POST['del'];
        if($del == ''){
            $this->error("请选择需要的删除内容");
        }
        $del=implode(",", $del);
        $del=trim($del,",");
        $model=M("log");

        $result=$model->delete($del);
        if($result){
            $this->add_log("批量删除日志",1,"批量删除日志成功");
            $this->redirect("System/system_log");
        }else{
            $this->error("批量删除失败");
        }
    }
    public function views(){
        $model=M("views");

        $where=array();
        $start=$_GET['start'];
        $end=$_GET['end'];
        if($start && $end){
            $where['vtime']=array(array("gt",$start),array("lt",$end));
        }

        $page=$_GET['page'];
        $page=($page==null)?"1":$page;
        $pageSize=$_GET['pageSize'];
        $pageSize=($pageSize==null)?"10":$pageSize;
        $count=$model->where($where)->count();
        $totalPage=ceil($count/$pageSize);
        $start=($page-1)*$pageSize;

        $mess=$model->where($where)->order("id DESC")->limit($start.",".$pageSize)->select();
        // echo $model->getLastSql();exit;
        $this->assign("page",$page);
        $this->assign("totalPage",$totalPage);
        $this->assign("pageSize",$pageSize);
        $this->assign("count",$count);
        $this->assign("mess",$mess);
        $this->display();
    }
}