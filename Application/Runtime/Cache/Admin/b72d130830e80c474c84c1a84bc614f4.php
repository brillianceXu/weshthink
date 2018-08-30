<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<LINK rel="Bookmark" href="/favicon.ico" >
<LINK rel="Shortcut Icon" href="<?php echo ($system["ico"]); ?>" />

<!--[if lt IE 9]>
<script type="text/javascript" src="/Public/admin/lib/html5.js"></script>
<script type="text/javascript" src="/Public/admin/lib/respond.min.js"></script>
<script type="text/javascript" src="/Public/admin/lib/PIE_IE678.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/Public/admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/Public/admin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/Public/admin/lib/Hui-iconfont/1.0.7/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/Public/admin/lib/icheck/icheck.css" />
<link rel="stylesheet" type="text/css" href="/Public/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/Public/admin/static/h-ui.admin/css/style.css" />
<link href="/Public/admin/lib/webuploader/0.1.5/webuploader.css" rel="stylesheet" type="text/css" />
<link href="/Public/admin/lib/lightbox2/2.8.1/css/lightbox.css" rel="stylesheet" type="text/css" >
<link rel="stylesheet" href="/Public/admin/lib/modal/css/modal.css" type="text/css">
<!-- <link rel="stylesheet" href="/Public/admin/lib/kindeditor-4.1.11-zh-CN/themes/default/default.css" /> -->
<!-- <link rel="stylesheet" href="/Public/admin/lib/kindeditor-4.1.11-zh-CN/plugins/code/prettify.css" /> -->
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->

<title><?php echo ((isset($system["title"]) && ($system["title"] !== ""))?($system["title"]):"黔北酒乡网"); ?></title>
<meta name="keywords" content="<?php echo ($system["keywords"]); ?>">
<meta name="description" content="<?php echo ($system["description"]); ?>">
<style type="text/css">  
 #preview, .img, img  
 {  
 	/*width:200px;  */
 	height:200px;  
 	width: auto;
 }  
 #preview  
 {  
	/*border:1px solid #000;  */
}
.portfoliobox{
	width: 300px;
	height: 300px;
}
.portfolio-area li .picbox{
	width: 300px;
	height: 50px;
	line-height: 110px;
}
.portfolio-area li .picbox img {
	max-width: 280px;
    max-height: 50px;
    vertical-align: middle;
}  
.portfolio-area li .checkbox {
	top: 5px;
	color: red;
}
.carrousel {
  position: fixed;
  /*top: 78px;*/
  z-index: 1000;
  width: 100%;
  height: 100%;
  background-color: rgba(10, 10, 10, 0.8);
  display: none;
  text-align: center;
  /*border: 1px solid red;*/
}
.divImg{
	position: relative;
	width: 100%;
	height: 100%;
	/*top: 120px;*/
	/*left: 2%;*/
	/*background: green;*/
}
.divVideo{
	position: relative;
	width: 100%;
	height: auto;
	top: 50px;
	left: 15%;
	background: green;
}
.video_div{
	position: relative;
	top: -20px;
	width: 100%;
	height: 100%;
}
.carrousel img {
	position: relative;
	top: 100px;
	/*width: 100%;*/
	height: 85%;
	width: auto;
}
.close {
  /*cursor: pointer;*/
  float: right;
  font-size: bold;
  position: fixed;
  top: 78px;
  right: 0px;
  font-size: 18px;
  color: black;
  width: 50px;
  height: 50px;
  line-height: 50px;
  text-align: center;
  /*border-radius: 50%;*/
  background: white;
  z-index: 10000000;
}
/*.close:hover {
  font-size: 20px;
  color: #DDD;
}*/
.botton_des{
	float: left;
	position: relative;
	top: 50px;
	width: 100%;
	height: 40px;
	line-height: 40px;
	color: white;
	/*background: green;*/
  	z-index: 1000000;
  	/*border: 2px solid red;*/
}
#form-tuijian-add .row{
	margin-top: 70px;
}
/*#edui1_toolbarbox{
	z-index: 1000000;
}*/
 
 </style> 
</head>
<body>

<header class="navbar-wrapper">
	<div class="navbar navbar-fixed-top">
		<div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href="/admin"><?php echo ($system["title"]); ?></a> <span class="logo navbar-slogan f-l mr-10 hidden-xs">后台</span> <a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
			<nav class="nav navbar-nav">
				<ul class="cl">
					<li class="dropDown dropDown_hover"><a href="javascript:;" class="dropDown_A"><i class="Hui-iconfont">&#xe600;</i> 新增 <i class="Hui-iconfont">&#xe6d5;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="/index.php/Admin/Content/article_add.html" ><i class="Hui-iconfont">&#xe616;</i> 新闻</a></li>
							<li><a href="/index.php/Admin/Content/policy_add.html" ><i class="Hui-iconfont">&#xe613;</i> 产品</a></li>
							<!-- <li><a href="/index.php/Category/category_add.html" ><i class="Hui-iconfont">&#xe620;</i> 分类</a></li> -->
							<li><a href="/index.php/Admin/Manager/admin_add.html" ><i class="Hui-iconfont">&#xe60d;</i> 用户</a></li>
						</ul>
					</li>
					<li><a href="/" target="_blank" title="消息">网站首页</a></li>
				</ul>
			</nav>
			<nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
				<ul class="cl">
					
					<li style="font-family: '楷体';"><?php if($_SESSION['usermsg']['roleid']== 1): ?>超级管理员<?php else: ?>普通管理员<?php endif; ?></li>
					<li class="dropDown dropDown_hover"> <a href="#" class="dropDown_A"><?php echo ($_SESSION['usermsg']['username']); ?> <i class="Hui-iconfont">&#xe6d5;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="/index.php/Admin/Manager/admin_edit.html">个人信息</a></li>
							<li><a href="/index.php/Admin/Manager/password_edit.html">修改密码</a></li>
							<li><a href="javascript:;" onclick="window.location.href='/index.php/Admin/Base/out_login';">退出</a></li>
						</ul>
					</li>
					
					<li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
							<li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
							<li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
							<li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
							<li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
							<li><a href="javascript:;" data-val="orange" title="绿色">橙色</a></li>
						</ul>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</header>




<aside class="Hui-aside" style="top: 34px;">
    <input runat="server" id="divScrollValue" type="hidden" value="" />
    <div class="menu_dropdown bk_2">
        <?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><dl id="menu-article">
            <dt <?php if($v["controller"] == CONTROLLER_NAME ): ?>class="this-active" style=""<?php endif; ?>>
                <a href="/index.php/Admin/<?php echo ($v["controller"]); ?>/<?php echo ($v["action"]); ?>.html" data-title="<?php echo ($v["name"]); ?>" style="text-decoration:none;"><i class="Hui-iconfont"><?php echo ($v["icon"]); ?></i> <?php echo ($v["name"]); ?></a>
            </dt>
           
        </dl><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</aside>



<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<section class="Hui-article-box">
	<div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
		<div class="Hui-tabNav-wp">
			<ul id="min_title_list" class="acrossTab cl">
				<li class="active"><span title="我的桌面" data-href="welcome.html">我的桌面</span><em></em></li>
			</ul>
		</div>
		<div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d4;</i></a><a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d7;</i></a></div>
	</div>
	<div id="iframe_box" class="Hui-article">
		<div class="show_iframe">
			<div style="display:none" class="loading"></div>
			

			
<article class="page-container">
	<form action="/index.php/Admin/Content/article_add/id/<?php echo ($mes["id"]); ?>.html" method="post" class="form form-horizontal" id="form-article-add" enctype="multipart/form-data">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>新闻标题：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo ($mes["title"]); ?>" placeholder="" id="" name="title">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">副标题：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo ($mes["ftitle"]); ?>" placeholder="" id="" name="ftitle">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>分类栏目：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select name="cid" class="select">
					<!-- <option value="0">选择分类</option> -->
				<?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["id"]); ?>" <?php if($mes["cid"] == $v['id']): ?>selected="selected"<?php endif; ?>><?php echo ($v["cname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
				</span> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>发布日期：</label>
			<div class="formControls col-xs-8 col-sm-9" style="width: 13%;">
				<input type="text" class="input-text Wdate" value="<?php echo ($mes["news_time"]); ?>" placeholder="" id="" name="news_time" onClick="WdatePicker({dateFmt:'yyyy-MM-dd',readOnly:true})">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">原创作者：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo ($mes["author"]); ?>" placeholder="" id="" name="author">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">文章来源：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo ($mes["source"]); ?>" placeholder="" id="" name="source">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">缩略图：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<div class="uploader-thum-container">
					<div id="fileList" class="uploader-list"></div>
					 <input type="file" name="titlepic" style="display: none;" onchange="preview(this)">
					<button onclick="upload_one();" class="btn btn-default btn-uploadstar radius" type="button">开始上传</button>
					<?php if($mes["titlepic"] != ''): ?><div id="preview" style="display: block;padding-top: 12px;"><img width="100" height="100" src="<?php echo ($mes["titlepic"]); ?>"/></div> 
					<?php else: ?>
					<div id="preview" style="display: none;padding-top: 12px;"></div><?php endif; ?> 
				</div>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">视频链接：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea name="video_link" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="" ><?php echo ($mes["video_link"]); ?></textarea>
				<!-- <p class="textarea-numberbar"><em class="textarea-length">0</em>/500</p> -->
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>新闻摘要：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea name="summary" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="textarealength(this,200)"><?php echo ($mes["summary"]); ?></textarea>
				<p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>新闻内容：</label>
			<div class="formControls col-xs-8 col-sm-9"> 
				<!-- <script id="editor" type="text/plain" style="width:100%;height:400px;"></script>  -->

				<textarea name="content" id="editor" cols="" class=""  placeholder="文章详情" dragonfly="true" nullmsg="备注不能为空！"><?php echo (stripslashes($mes["content"])); ?></textarea>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">关键词：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo ($mes["keywords"]); ?>" placeholder="多个关键字以,隔开" id="" name="keywords">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">描述：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea name="description" cols="" rows="" class="textarea"  placeholder="网站推广描述" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" onKeyUp="textarealength(this,200)"><?php echo ($mes["description"]); ?></textarea>
				<p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				
				<button onclick="article_save();" class="btn btn-secondary radius" type="button"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
				<button onclick="remove_input();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>
		</div>
	</form>
</article>

<script type="text/javascript" src="/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript">
	// var ue = UE.getEditor('editor');
	function article_save(){
		var title=$("input[name=title]").val();
		var news_time=$("input[name=news_time]").val();
		var summary=$("textarea[name=summary]").val();
		var content=$("textarea[name=content]").val();
		// alert(name);
		if(title == ''){
			layer.msg("请输入文章标题！");
			$("input[name=title]").focus();
			return false;
		}
		// if(news_time == ''){
		// 	layer.msg("请选择新闻发布日期！");
		// 	$("input[name=news_time]").focus();
		// 	return false;
		// }
		// if(summary == ''){
		// 	layer.msg("请输入新闻摘要！");
		// 	$("input[name=summary]").focus();
		// 	return false;
		// }
		if(content == ''){
			layer.msg("请输入新闻详情！");
			$("input[name=content]").focus();
			return false;
		}
		$("#form-article-add").submit();
	}
	function remove_input()
	{
		window.history.back();
		// window.location.href='/index.php/Content/index.html';
	}
	function upload_one()
    {
        $("input[name='titlepic']").click();
    }
</script>



			
				<footer class="footer mt-20">
	<div class="container">
		<p>
			<?php echo ($system["copyright"]); ?><br>
			<?php echo ($system["icp"]); ?>
		</p>
	</div>
</footer>


			

		</div>
	</div>
</section>

<script type="text/javascript" src="/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/admin/lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="/Public/admin/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/Public/admin/static/h-ui.admin/js/H-ui.admin.js"></script> 
<script type="text/javascript" src="/Public/admin/lib/webuploader/0.1.5/webuploader.js"></script> 
<script type="text/javascript" src="/Public/admin/lib/My97DatePicker/WdatePicker.js"></script> 
<!-- <script type="text/javascript" src="/Public/admin/static/h-ui.admin/js/H-ui.admin.page.js"></script> -->
<script type="text/javascript" src="/Public/admin/lib/lightbox2/2.8.1/js/lightbox.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/admin/lib/ueditor/1.4.3/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/admin/lib/ueditor/1.4.3/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/Public/admin/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>


<!-- <script type="text/javascript" src="__PUBLIC/admin/lib/lightbox2/2.8.1/js/lightbox-plus-jquery.min.js"></script>  -->
<!-- <script charset="utf-8" src="/Public/admin/lib/kindeditor-4.1.11-zh-CN/kindeditor-all-min.js"></script>
<script charset="utf-8" src="/Public/admin/lib/kindeditor-4.1.11-zh-CN/lang/zh-CN.js"></script>
<script charset="utf-8" src="/Public/admin/lib/kindeditor-4.1.11-zh-CN/plugins/code/prettify.js"></script> -->
<script type="text/javascript">
 // KindEditor.ready(function(K) {
        // window.editor = K.create('#editor');
// });
	var ue = UE.getEditor('editor');

$(function(){
    $.Huihover(".portfolio-area li");
});
// 单图上传预览
function preview(file)  
{  
	var prevDiv = document.getElementById('preview');  
	prevDiv.style.display="block";
	if (file.files && file.files[0])  
	{  
		var reader = new FileReader();  
		reader.onload = function(evt){  
			prevDiv.innerHTML = '<img src="' + evt.target.result + '" />';  
		}    
	 	reader.readAsDataURL(file.files[0]);  
	}  
	else    
	{  
	 	prevDiv.innerHTML = '<div class="img" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src=\'' + file.value + '\'"></div>';  
	}  
 }  
//下面用于多图片上传预览功能

    function setImagePreviews(avalue) {

        var docObj = document.getElementById("doc");

        var dd = document.getElementById("dd");

        dd.innerHTML = "";

        var fileList = docObj.files;

        for (var i = 0; i < fileList.length; i++) {            



            dd.innerHTML += "<div style='float:left;height:200px;margin-top:50px;' > <img id='img" + i + "'  /> </div>";

            var imgObjPreview = document.getElementById("img"+i); 

            if (docObj.files && docObj.files[i]) {

                //火狐下，直接设img属性

                imgObjPreview.style.display = 'block';

                imgObjPreview.style.width = '250px';

                imgObjPreview.style.height = '150px';

                //imgObjPreview.src = docObj.files[0].getAsDataURL();

                //火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式

                imgObjPreview.src = window.URL.createObjectURL(docObj.files[i]);

            }

            else {

                //IE下，使用滤镜

                docObj.select();

                var imgSrc = document.selection.createRange().text;

                alert(imgSrc)

                var localImagId = document.getElementById("img" + i);

                //必须设置初始大小

                localImagId.style.width = "150px";

                localImagId.style.height = "180px";

                //图片异常的捕捉，防止用户修改后缀来伪造图片

                try {

                    localImagId.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";

                    localImagId.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;

                }

                catch (e) {

                    alert("您上传的图片格式不正确，请重新选择!");

                    return false;

                }

                imgObjPreview.style.display = 'none';

                document.selection.empty();

            }

        }  



        return true;

    }
    $(function(){
	$.Huihover(".portfolio-area li");
});
</script>
</body>
</html>