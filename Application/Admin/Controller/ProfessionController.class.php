<?php
namespace Admin\Controller;
class ProfessionController extends BaseController {
    public function index(){
      
      $this->display();
    }
    public function article_add()
    {
      
        $this->display();
      
    }
    public function consult(){
      $model=M("message");
      $status=I("status");
      $status=empty($status)?"1":$status;
      $where['status']=$status;
      $str='';
      $action_name="consult";

      $keywords=$_GET['keywords'];
   
      if($keywords || $keywords !=''){
        $where['title|username']=array("like","%".$keywords."%");
        $str.="/keywords/".$keywords;
      }

      $page=$_GET['page'];
      $page=($page==null)?"1":$page;
      $pageSize=$_GET['pageSize'];

      $pageSize=($pageSize==null)?"10":$pageSize;

      $str.="/pageSize/".$pageSize;
      $article_count=$model->where($where)->count();
      $totalPage=ceil($article_count/$pageSize);
      $start=($page-1)*$pageSize;
      
      $article=$model->where($where)->order("id DESC")->limit($start,$pageSize)->select();
      // print_r($model->getLastSql());

      // print_r($article);exit;
      $pageArr=array("10","20","30","40","50");
      // print_r($str);exit;
      $this->assign("action_name",$action_name);
      $this->assign("cate",$cate);
      $this->assign("pageArr",$pageArr);
      $this->assign("page",$page);
      $this->assign("str",$str);
      $this->assign("status",$status);
      $this->assign("keywords",$keywords);
      $this->assign("totalPage",$totalPage);
      $this->assign("pageSize",$pageSize);
      $this->assign("article_count",$article_count);
      $this->assign("article",$article);
      $this->display();
    }
    public function replay(){
      $model=M("message");
      $rid=I("rid");
      $answer=I("answer");
      $updatetime=time();
      $status=2;
      $data['updatetime']=$updatetime;
      $data['answer']=$answer;
      $data['status']=$status;
      $res=$model->where("id=".$rid)->save($data);
      if($res){
        $this->ajaxReturn("200");
      }else{
        $this->ajaxReturn("100");
      }
    }
    public function replay_del(){
      $id=$_GET['id'];
      $model=M("message");
      $art_mes=$model->find($id);
      $data['status']=0;
      $res=$model->where("id=".$id)->save($data);
      if($res){
        $this->add_log("留言删除",1,"删除留言:".$art_mes['title']);
        $this->ajaxReturn("200");
      }else{
        $this->ajaxReturn("400");
      }
    }
    public function do_recommend(){
      $model=M("news");
      $id=I("id");
      $value=I("value");
      $type=I("type");
      $con['status']=1;
      $con['is_recommend']=1;
      // $con['cid']=59;
      $con['type']=$type;
      if($value == 1){
        $num=$model->where($con)->count();
        if($num >= 1){
          $this->ajaxReturn("300");
        }
        $data['is_recommend']=1;
      }else{
        $data['is_recommend']=0;
      }
      $res=$model->where("id=".$id)->save($data);
      if(!$res){
        $this->ajaxReturn("100");
      }else{
        $this->ajaxReturn("200");
      }
    }
    public function upload_file($file){
        // $uri=__FILE__;
        $path='./Files/';
        // echo $path;exit;
        // print_r($file);
       
        $key=strrpos($file['name'],'.');
        $ext=substr($file['name'], $key);
        // echo $ext;
        $name=md5($file['name']).time().$ext;
        $save=$path.date("Y-m-d",time());
        if(!is_dir($save)){
            mkdir($save);
        }
        // print_r($save.'/'.$name);exit;
        $move=move_uploaded_file($file['tmp_name'],$save.'/'.$name);
        // print_r($$name);exit;
        if(!$move)
        {
            // print_r($move);exit;
            $this->error("上传失败"); 
        }
        $filename='/Files/'.date("Y-m-d",time()).'/'.$name;
              
        return $filename;
    }
    
    
    
   	
    public function del_article(){
      $id=$_GET['id'];
      $model=M("news");
      $art_mes=$model->find($id);
      $data['status']=0;
      $res=$model->where("id=".$id)->save($data);
      if($res){
        $this->add_log("文章删除",1,"删除文章:".$art_mes['title']);
        $this->ajaxReturn("200");
      }else{
        $this->ajaxReturn("400");
      }
    }
 	  public function news_up(){
      $model=M("news");
      $id=$_GET['id'];

      $where['is_recommend']=1;
      $where['status']=1;
      $where['cid']=array("neq",59);
      $result=$model->where($where)->count();
      if($result >= 7){
        $this->ajaxReturn("300");
      }
      $data['is_recommend']=1;
      $res=$model->where("id = ".$id)->save($data);
      if($res){
        $this->ajaxReturn("200");
      }else{
        $this->ajaxReturn("400");
      }
    }
    public function news_down(){
      $model=M("news");
      $id=$_GET['id'];

      $data['is_recommend']=0;
      $res=$model->where("id = ".$id)->save($data);
      if($res){
        $this->ajaxReturn("200");
      }else{
        $this->ajaxReturn("400");
      }
    }
  
    public function ajax_done(){
      $model=M("article");
      $id=$_GET['id'];
      $data['title']=$_GET['title'];
      $data['ftitle']=$_GET['ftitle'];
      $data['content']=$_GET['content'];
      $data['savetime']=time();
      $res=$model->where("id = ".$id)->save($data);
      if($res){
        $this->ajaxReturn("200");
      }else{
        $this->ajaxReturn("400");
      }
    }
    public function done_sort(){
      $model=M("news");
      $id=$_GET['id'];
      $data['sort']=$_GET['sort'];
      $res=$model->where("id = ".$id)->save($data);
      if($res){
        $this->ajaxReturn("200");
      }else{
        $this->ajaxReturn("400");
      }
    }
   
    public function datadel(){
      $model=M("news");

      $del_ids=$_POST['del_ids'];
      foreach ($del_ids as $v) {
        $res=$model->delete($v);
        if(!$res){
          $this->error("ID为：".$v."的新闻删除失败","index");
        }
      }
      $this->success('批量删除成功', 'index');
    }
  
   
}