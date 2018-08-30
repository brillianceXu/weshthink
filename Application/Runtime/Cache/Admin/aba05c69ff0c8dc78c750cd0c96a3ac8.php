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
			

			
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 内容管理 <span class="c-gray en">&gt;</span> 新闻列表</nav>
    <div class="page-container">
        <form action="/index.php/Admin/Content/index<?php echo ($str); ?>.html" method="get">
            <div class="text-c">
                <span class="select-box inline">
        		<select name="cid" class="select">
        			<option value="0">全部分类</option>
        			<?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["id"]); ?>" <?php if($cid == $v['id']): ?>selected="selected"<?php endif; ?>><?php echo ($v["cname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        			<!-- <option value="2">分类二</option> -->
        		</select>
        		</span>
                <input type="hidden" name="page" name="1">
                <input type="text" name="keywords" id="" placeholder="<?php echo ((isset($keywords) && ($keywords !== ""))?($keywords):" 关键字 "); ?>" style="width:250px" class="input-text">
                <button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
                <!-- <a class="btn btn-primary" data-title="添加" href="/index.php/Admin/Content/article_add/pid/<?php echo ($pid); ?>.html"><i class="Hui-iconfont">&#xe600;</i> 添加</a> -->
                <button name="" id="" class="btn btn-primary" type="button" onclick="window.location.href='/index.php/Admin/Content/article_add/pid/<?php echo ($pid); ?>.html';"><i class="Hui-iconfont">&#xe600;</i> 添加</button>
            </div>
        </form>
        <!-- <a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> -->
        
        <span class="r">
		每页：<strong>
			<span  class="select-box inline">
			<form action="/index.php/Admin/Content/index<?php echo ($str); ?>.html" method="get" id="PageForm">
			<select name="pageSize" onchange="$('#PageForm').submit();"  class="select">
				<?php if(is_array($pageArr)): $i = 0; $__LIST__ = $pageArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v); ?>" <?php if($v == $pageSize): ?>selected<?php else: endif; ?> ><?php echo ($v); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			</select>
			</form>
			</span></strong> 条 &nbsp; &nbsp;共：<strong><?php echo ($totalPage); ?></strong> 页 &nbsp; &nbsp;共有数据：<strong><?php echo ($article_count); ?></strong> 条</span>
    </div>
    <div class="mt-20">
        <table class="table table-border table-bordered table-bg table-hover table-sort">
            <thead>
                <tr class="text-c">
                    <th width="25">
                        <input type="checkbox" name="" value="">
                    </th>
                    <th>ID</th>
                    <!-- <th width="80">排序</th> -->
                    <th>标题</th>
                    <th>副标题</th>
                    <th>分类</th>
                    <th>发布时间</th>
                    <!-- <th>更新时间</th> -->
                    <th>浏览次数</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <form method="post" action="/index.php/Admin/Content/datadel" id="datadel_form">
                    <?php if(is_array($article)): $i = 0; $__LIST__ = $article;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr class="text-c">
                            <td>
                                <input type="checkbox" value="<?php echo ($v["id"]); ?>" name="del_ids[]">
                            </td>
                            <td><?php echo ($v["id"]); ?></td>
                           <!--  <td>
                                <input type="text" name="sort<?php echo ($v["id"]); ?>" class="input-text text-c" placeholder="<?php echo ($v["sort"]); ?>" onchange="do_sort(<?php echo ($v["id"]); ?>);" />
                            </td> -->
                            <td class=""><a href="/index.php/Home/News/detail/id/<?php echo ($v["id"]); ?>.html" target="_blank"><u style="cursor:pointer" class="text-primary"  title="查看"><?php echo ($v["title"]); ?></u></a></td>
                            <td><?php echo ($v["ftitle"]); ?></td>
                            <td><?php echo ($v["cname"]); ?></td>
                            <td><?php echo ($v["news_time"]); ?></td>
                            <!-- <td><?php echo ($v["update_time"]); ?></td> -->
                            <td><?php echo ($v["click"]); ?></td>
                            <td class="f-14 td-manage">
                                <?php if($v["is_recommend"] == 0): ?><a style="text-decoration:none" onClick="news_up(<?php echo ($v["id"]); ?>)" href="javascript:;" title="推荐"><i class="Hui-iconfont">&#xe603;</i></a>
                                    <?php else: ?>
                                    <a style="text-decoration:none" onClick="news_down(<?php echo ($v["id"]); ?>)" href="javascript:;" title="取消推荐"><i class="Hui-iconfont">&#xe6de;</i></a><?php endif; ?>
                                <!-- <a style="text-decoration:none" onClick="article_stop(this,'10001')" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a> -->
                                <a style="text-decoration:none" class="ml-5" href="/index.php/Admin/Content/article_add/id/<?php echo ($v["id"]); ?>/pid/<?php echo ($pid); ?>.html" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>
                                <a style="text-decoration:none" class="ml-5" onClick="article_del(<?php echo ($v["id"]); ?>)" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </form>
            </tbody>
        </table>
    </div>
    <div class="cl pd-5 bg-1 bk-gray mt-20" style="line-height: 35px;">
        <style type="text/css">
        .paginate_button {
            border: 1px solid #ccc;
            color: #666;
            cursor: pointer;
            display: inline-block;
            font-size: 14px;
            height: 26px;
            line-height: 26px;
            margin: 0 0 6px 6px;
            padding: 0 10px;
            text-align: center;
            text-decoration: none;
        }
        
        .current {
            background: #5a98de none repeat scroll 0 0;
            color: #fff;
        }
        </style>
        <span class="r">
		<div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
		<?php if($page == 1): else: ?>
		<a href="/index.php/Admin/Content/index<?php echo ($str); ?>/page/1" class="paginate_button previous disabled" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" id="DataTables_Table_0_previous">首页</a>
		<a href="/index.php/Admin/Content/index<?php echo ($str); ?>/page/<?php echo ($page-1); ?>" class="paginate_button previous disabled" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" id="DataTables_Table_0_previous">上一页</a><?php endif; ?>
		<span>
			<a class="paginate_button current" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0"><?php echo ($page); ?></a>
		</span>
        <?php if($page == $totalPage): else: ?>
            <a href="/index.php/Admin/Content/index<?php echo ($str); ?>/page/<?php echo ($page+1); ?>" class="paginate_button next disabled" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" id="DataTables_Table_0_next">下一页</a>
            <a href="/index.php/Admin/Content/index<?php echo ($str); ?>/page/<?php echo ($totalPage); ?>" class="paginate_button next disabled" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" id="DataTables_Table_0_next">尾页</a><?php endif; ?>
    </div>
    </span>
    </div>
    </div>
    <script type="text/javascript">
    function datadel() {
        $("#datadel_form").submit();
    }

    function article_del(id) {
        layer.confirm("确定要删除吗？", function() {
            $.get("/index.php/Admin/Content/del_article", {
                id: id
            }, function(msg) {
                if (msg == 200) {
                    layer.msg('已删除!', {
                        icon: 6,
                        time: 1000
                    }, function() {
                        window.location.reload();
                    });
                } else {
                    layer.msg('删除失败!');
                }
            });
        });
    }
    /*图片-下架*/
    function news_down(id) {
        layer.confirm('确认要取消推荐吗？', function(index) {
            $.get("/index.php/Admin/Content/news_down", {
                id: id
            }, function(msg) {
                if (msg == '200') {
                    layer.msg('取消推荐成功!', {
                        icon: 6,
                        time: 1000
                    }, function() {
                        location.reload();
                    });
                } else {
                    layer.msg('处理失败!', {
                        icon: 5,
                        time: 1000
                    });
                }
            })

        });
    }

    /*图片-发布*/

    function news_up(id) {
        layer.confirm('确认要推荐吗？', function(index) {
            $.get("/index.php/Admin/Content/news_up", {
                id: id
            }, function(msg) {
                if (msg == '200') {
                    layer.msg('推荐成功!', {
                        icon: 6,
                        time: 1000
                    }, function() {
                        location.reload();
                    });
                } else if(msg == 300){
                    layer.msg('最多只能推荐7篇文章!', {
                        icon: 5,
                        time: 2000
                    });
                } else{
                    layer.msg('处理失败!', {
                        icon: 5,
                        time: 1000
                    });
                }
            })
        });
    }

    function close_big() {
        $(".carrousel").css("display", "none");
    }

    function do_sort(id) {
        var sort = $("input[name=sort" + id + "]").val();
        $.get("/index.php/Admin/Content/done_sort", {
            id: id,
            sort: sort
        }, function(msg) {
            if (msg == '200') {
                location.reload();
            } else {
                layer.msg('排序出现错误!', {
                    icon: 5,
                    time: 1000
                });
            }
        })
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