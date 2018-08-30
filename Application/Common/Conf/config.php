<?php
return array(
	 /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'score_query',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'root',          // 密码  

    // 'DB_HOST'               =>  'qdm22258262.my3w.com', // 服务器地址

    // 'DB_NAME'               =>  'qdm22258262_db',          // 数据库名
    // 'DB_USER'               =>  'qdm22258262',      // 用户名
    // 'DB_PWD'                =>  '880112xgh',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'ruochen_',    // 数据库表前缀

    'URL_MODEL'				=> 	'1',

    
	
	 // 配置邮件发送服务器
    'MAIL_HOST' =>'smtp.gzhctech.com',//smtp服务器的名称
    'MAIL_SMTPAUTH' =>TRUE, //启用smtp认证
    'MAIL_USERNAME' =>'wenhui.xu@gzhctech.com',//接收的邮箱名
    'MAIL_FROM' =>'wenhui.xu@gzhctech.com',//发件人地址
    'MAIL_FROMNAME'=>'贵州惠城信息技术有限公司',//发件人姓名
    'MAIL_PASSWORD' =>'Gzhctech@2017',//邮箱密码
    'MAIL_CHARSET' =>'utf-8',//设置邮件编码
    'MAIL_ISHTML' =>TRUE, // 是否HTML格式邮件
);