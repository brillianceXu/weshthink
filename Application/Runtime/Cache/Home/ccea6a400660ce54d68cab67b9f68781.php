<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Language" content="zh-cn">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>成绩查询</title>
<STYLE type=text/css>
.myfont1 {

	COLOR: #800000; FONT-FAMILY: 宋体; FONT-SIZE: 14px
}
</STYLE>

</head>

<body>
<div align="center">
	<table border="0" width="1024" cellspacing="0" cellpadding="0" id="table1">
		<tr>
			<td>
			<img border="0" src="/Public/home/picture/query_chj.jpg" width="1024" height="199"></td>
		</tr>
		<tr>
			<td width="1024" background="/Public/home/images/chaxun_bj.jpg" height="366" align="right" valign="top">
			<div align="right">
			<form name=chafen method=post action="chafen.php">
				<table border="0" width="50%" cellspacing="0" cellpadding="0" id="table2" height="218">
					<tr>
						<td width="102"></td>
						<td width="208"></td>
						<td></td>
					</tr>
					<tr>
						<td width="102"></td>
						<td width="208"></td>
						<td></td>
					</tr>
					<tr>
						<td width="102"></td>
						<td width="208"></td>
						<td></td>
					</tr>
					<tr>
						<td width="102"></td>
						<td width="208"></td>
						<td></td>
					</tr>
					<tr class=myfont1>
						<td height="30" align="right"><b>
						<font color="#E6FFFF">姓&nbsp; 名:&nbsp;</font></b></td>
						<td width="208" height="30"><INPUT name=xingming size=10 ></td>
						<td height="30"></td>
					</tr>
					<tr class=myfont1>
						<td  height="30" align="right"><b>
						<font color="#E6FFFF">密&nbsp; 码:&nbsp;</font></b></td>
						<td  height="30"><INPUT name=zhengjian size=8 > <b>
						<font color="#FFFF00">（ * 8位出生年月日 ）</font></b></td>
						<td height="30"></td>
					</tr>
					<tr>
						<td width="102"></td>
						<td width="208"></td>
						<td></td>
					</tr>
					<tr>
						<td width="102"></td>
						<td width="208" align="center"><img border="0" src="/Public/home/picture/bt_chafen.jpg" width="77" height="22" onclick="chafen.submit()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
						<td></td>
					</tr>
					<tr>
						<td width="102" height="24"></td>
						<td width="208" height="24"></td>
						<td height="24"></td>
					</tr>
					<tr>
						<td width="102"></td>
						<td width="208"></td>
						<td></td>
					</tr>
				</table>
				</form>
			</div>
			</td>
		</tr>
		<tr>
			<td width="1024" height="40" valign="bottom" >
			<img border="0" src="/Public/home/picture/chaxun_bottom.jpg" width="1024" height="30"></td>
		</tr>
	</table>
</div>

</body>

</html>