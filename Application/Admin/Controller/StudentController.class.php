<?php
namespace Admin\Controller;
class StudentController extends BaseController {
    public function index(){
      
      $this->display();
    }
    public function article_add()
    {
      $model=M("news");
      $Cmodel=M("category");
      $id=$_GET['id'];
      $pid=I("pid");
      $pid=empty($pid)?2:$pid;
      if($pid == 1){
        $action_name="about";
      }elseif ($pid == 3) {
        $action_name="index";
      }elseif($pid == 4){
        $action_name="culture";
      }else{
        $action_name="business";
      }
      // print_r($id);exit;
      if($_POST){
        // exit();
        // print_r($id);exit;
        $pid=$_POST['pid'];
        $data['title']=$_POST['title'];
        $data['cid']=$_POST['cid'];
        if($data['cid'] == "0"){
          $this->error("请选择分类");
        }
        $data['aid']=$_SESSION['usermsg']['id'];
        $data['keywords']=$_POST['keywords'];
        $data['ftitle']=$_POST['ftitle'];
        $data['author']=$_POST['author'];
        $data['source']=$_POST['source'];
        $data['description']=$_POST['description'];
        $data['summary']=$_POST['summary'];
        $data['news_time']=$_POST['news_time'];
        $data['video_link']=$_POST['video_link'];
        $data['content']=$_POST['content'];
        $data['status']=1;
        $data['published']=time();
        $image=$_FILES['titlepic'];
        if($image['name'] != '')
        {
          $oldroute=$info['titlepic'];
          if($oldroute){
            unlink($_SERVER['DOCUMENT_ROOT'].$oldroute);
          }
            $image=$this->upload_one($image);
            $data['titlepic']=$image;
        }
        // print_r($data);exit;
        if($id){
          $data['update_time']=time();
          $result=$model->where("id = ".$id)->save($data);
          $log_mes="编辑文章";
        }else{
          $data['published']=time();
          $result=$model->add($data);
          $log_mes="添加文章";
        }
        
        if($result){
          $this->add_log($log_mes,1,$log_mes."：".$data['title']);
          $this->success($log_mes."成功");
        }else{
          $this->error($log_mes."失败");
        }
      }else{
        $cate=$Cmodel->where("pid=".$pid." and status=2")->select();
        // print_r($cate);exit;
        $this->assign("cate",$cate);
        if($id){
          $mes=$model->where("id =".$id)->find();
          $this->assign("mes",$mes);
        }
        $this->assign("action_name",$action_name);
        $this->assign("pid",$pid);
        $this->display();
      }
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