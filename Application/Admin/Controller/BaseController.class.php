<?php
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller {

    public function _initialize(){
        $this->check_session();
        $this->get_system();
        $this->get_menu();
        $this->assign("controller_name",CONTROLLER_NAME);
        $this->assign("action_name",ACTION_NAME);
    }
    public function get_system()
    {
        $system=M("system")->where("id = 1")->find();
        // $system['weipic']=$this->replace_image($system['weipic']);
        // $system['ico']=$this->replace_image($system['ico']);

        $this->assign("system",$system);
    }
    //获取菜单
    public function get_menu(){
        $model=M("menu");

        $where['status']=1;
        $where['level']=1;
        $menu=$model->where($where)->select();
        $this->assign("menu",$menu);
    }
    // 获取图片分类
    public function get_img_type(){
        $model=M("category");

        $where['status']=1;
        $where['pid']=9;
        $cate=$model->where($where)->select();

        return $cate;
    }
    /*
    *   获取分类
    */
    public function get_cate_name($id){
        $model=M("category");
        // print_r($id);exit;
        $where['id']=$id;
        $cname=$model->where($where)->getField("cname");
        return $cname;
    }
    public function get_cate($status='1'){
        $model=M("category");
        $where['status']=$status;
        $where['pid'] = array("gt","0");
        $cate=$model->where($where)->select();
        return $cate;
    }
    //新闻详情图片处理
    public function replace_content_image($content){
        $pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png]))[\'|\"].*?[\/]?>/";
        preg_match_all($pattern,$content,$match);
     // print_r($match);exit;
        if(!$match || !isset($match[0]) || !isset($match[1]) || !is_array($match[0])) return $content;
    
        foreach($match[0] as $k=>$v){
            if(!isset($match[1][$k])) continue;
                
            $image_text = $v;
            $url = $match[1][$k];
            
            $url=$this->replace_image($url);
           
            $new_url = 'src="'.$url.'"';
                
            $new_image_text = preg_replace("/src=[\'|\"](.*?(?:[\.gif|\.jpg|\.png]))[\'|\"]/", $new_url, $image_text);
    
            $content = str_replace($image_text, $new_image_text, $content);
        }
        return $content;
    }
    //格式化图片
    public function replace_image($image){
        if(strstr($image,'/Uploads/')){
            $image=IMG_STR.$image;
        }elseif(strstr($image,'/Files/')){
            $image=IMG_LOCAL.$image;
        }else{
            $image=IMG_URL.$image;
        }
        return $image;
    }
    /*
    *   检查是否登陆
    */
    public function check_session(){
        $usermsg=$_SESSION['usermsg'];
        if(!$usermsg){
            $this->redirect("Login/index");
        }
    }
    /*
    *   替换掉字符串中的空格以及特殊字符
    */ 
    public function str_filter($str){
        $str=trim($str);
        $str=str_replace(' ','',$str);
        return $str;
    }
    /*
    *   增加操作日志
    *   @param $action 操作
    *   @param $status 状态
    *   @param $note   备注信息
    *   @param $username   操作用户
    */
    public function add_log($action,$status,$note='',$username=''){
        $username=($username == '')?$_SESSION['usermsg']['username']:$username;
        $arr['username']=$username;
        $arr['uip']=$_SERVER['REMOTE_ADDR'];
        $arr['action']=$action;
        $arr['status']=$status;
        $arr['note']=$note;
        // $arr['dotime']=time();
        M("log")->add($arr);
    }
    /*
    *   推退出登录
    */
    public function out_login(){
        unset($_SESSION['usermsg']);
        $this->redirect("Login/index");
    }
    public function p($arr)
    {
        echo prev;
        print_r($arr);
        echo prev;
    }
    /**
    *   上传文件
    */
    public function upload_more($file){
        // $uri=__FILE__;
        $path='./Files/';
        // echo $path;exit;
        // print_r($file);
        foreach($file['tmp_name'] as $k=>$v)
        {
            $key=strrpos($file['name'][$k],'.');
            $ext=substr($file['name'][$k], $key);
            // echo $ext;
            $name=md5($file['name'][$k]).time().$ext;
            $save=$path.date("Y-m-d",time());
            if(!is_dir($save)){
                mkdir($save);
            }
            // print_r($save.'/'.$name);exit;
            $move=move_uploaded_file($file['tmp_name'][$k],$save.'/'.$name);
            // print_r($$name);exit;
            if(!$move)
            {
                // print_r($move);exit;
                $this->error("上传失败"); 
            }
            $filename[]='/Files/'.date("Y-m-d",time()).'/'.$name;
                // print_r($filename);exit;
        }
        return $filename;
    }
    
    public function upload($path='/Files/'){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './'; // 设置附件上传根目录
        $upload->savePath  =     $path; // 设置附件上传（子）目录
        // 上传文件 
        $info   =   $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功
            // $this->success('上传成功！');
            return $info;
        }
    }
    /**
    *   上传单文件
    */
    public function upload_one($image,$path='/Files/'){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     10000000000 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg','bmp');// 设置附件上传类型
        $upload->rootPath  =     './'; // 设置附件上传根目录
        $upload->savePath  =     $path; // 设置附件上传（子）目录
        // 上传单个文件 
        $info   =   $upload->uploadOne($image);
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功 获取上传文件信息
            return $info['savepath'].$info['savename'];
        }
    }
    public function unlimitedForLayer ($cate, $name = 'child', $pid = 0) {
        $arr = array();
        foreach ($cate as $v) {
            if ($v['pid'] == $pid) {
                $v[$name] = self::unlimitedForLayer($cate, $name, $v['id']);
                $arr[] = $v;
            }
        }
        return $arr;
    }
}

/*
*   递归无限极分类
*/
Class Category {
    //组合一维数组
    Static Public function unlimitedForLevel ($cate, $html = '--', $pid = 0, $level = 0) {
        $arr = array();
        foreach ($cate as $k => $v) {
            if ($v['pid'] == $pid) {
                $v['level'] = $level + 1;
                $v['html']  = str_repeat($html, $level);
                $arr[] = $v;
                $arr = array_merge($arr, self::unlimitedForLevel($cate, $html, $v['id'], $level + 1));
            }
        }
        return $arr;
    }
    //组合多维数组
    Static Public function unlimitedForLayer ($cate, $name = 'child', $pid = 0) {
        $arr = array();
        foreach ($cate as $v) {
            if ($v['pid'] == $pid) {
                $v[$name] = self::unlimitedForLayer($cate, $name, $v['id']);
                $arr[] = $v;
            }
        }
        return $arr;
    }
    //传递一个子分类ID返回所有的父级分类  
    Static Public function getParents ($cate, $id) {
        $arr = array();
        foreach ($cate as $v) {
            if ($v['id'] == $id) {
                $arr[] = $v;
                $arr = array_merge(self::getParents($cate, $v['pid']), $arr); 
            }
        }
        return $arr;
    }
    //传递一个父级分类ID返回所有子分类ID
    Static Public function getChildsId ($cate, $pid) {
        $arr = array();
        foreach ($cate as $v) {
            if ($v['pid'] == $pid) {
                $arr[] = $v['id'];
                $arr = array_merge($arr, self::getChildsId($cate, $v['id']));
            }
        }
        return $arr;
    }
    //传递一个父级分类ID返回所有子分类
    Static Public function getChilds ($cate, $pid) {
        $arr = array();
        foreach ($cate as $v) {
            if ($v['pid'] == $pid) {
                $arr[] = $v;
                $arr = array_merge($arr, self::getChilds($cate, $v['id']));
            }
        }
        return $arr;
    }
}

class Tool {
    static public $treeList = array(); //存放无限分类结果如果一页面有多个无限分类可以使用 Tool::$treeList = array(); 清空
    /**
     * 无限级分类
     * @access public 
     * @param Array $data     //数据库里获取的结果集 
     * @param Int $pid             
     * @param Int $count       //第几级分类
     * @return Array $treeList   
     */
    static public function tree(&$data,$pid = 0,$count = 1) {
        foreach ($data as $key => $value){
            if($value['Pid']==$pid){
                $value['Count'] = $count;
                self::$treeList []=$value;
                unset($data[$key]);
                self::tree($data,$value['Id'],$count+1);
            } 
        }
        return self::$treeList ;
    }
    //设置分页格式
    public function getPage($count,$pageSize){
        $p=new Think\Page($count,$pageSize);
        $p->setConfig('header','<li class="rows">共<b>%TOTAL_RPW%</b>条记录%nbsp;第<b>%NOW_PAGE%</b>页/共<b>%%TOTAL_PAGE%</b>页</li>');
        $p->setConfig('prev','上一页');
        $p->setConfig('next','下一页');
        $p->setConfig('last','末页');
        $p->setConfig('first','首页');
        $p->setConfig('theme','%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
        $p->lastSuffix=false;
        return $p;
    }
}