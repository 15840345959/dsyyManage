<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta charset="utf-8"/>
<title><?php echo CUSTOM_SYSTOM_WEBTITLE;?></title>
<meta name="author" content="DeathGhost" />
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<link rel="icon" href="/Public/Admin/images/icon/favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/style.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/supplement.css" />
<script type="text/javascript" src="/Public/Admin/javascript/jquery.js"></script>
<script type="text/javascript" src="/Public/Admin/javascript/plug-ins/customScrollbar.min.js"></script>
<script type="text/javascript" src="/Public/Admin/javascript/plug-ins/echarts.min.js"></script>
<script type="text/javascript" src="/Public/Admin/javascript/plug-ins/layerUi/layer.js"></script>
<script type="text/javascript" src="/Public/Admin/editor/ueditor.config.js"></script>
<script type="text/javascript" src="/Public/Admin/editor/ueditor.all.js"></script>
<script type="text/javascript" src="/Public/Admin/javascript/plug-ins/pagination.js"></script>
<script type="text/javascript" src="/Public/Admin/javascript/public.js"></script>
<script type="text/javascript" src="/Public/Admin/javascript/supplement.js"></script>
    <script src="/Public/Admin/javascript/plug-ins/customScrollbar.min.js"></script>
    <script src="/Public/Admin/javascript/pages/login.js"></script>
</head>
<body class="login-page">
<section class="login-contain">
    <header>
        <h1><?php echo CUSTOM_SYSTOM_LOGIN_TITLE;?></h1>
        <p><?php echo CUSTOM_SYSTOM_LOGIN_SUBTITLE;?></p>
    </header>
    <div class="form-content text-center">
        <ul>
            <li>
                <div class="form-group">
                    <label class="control-label">管理员账号：</label>
                    <input type="text" placeholder="管理员账号..." class="form-control form-underlined" id="user_id" name="user_id"/>
                </div>
            </li>
            <li>
                <div class="form-group">
                    <label class="control-label">管理员密码：</label>
                    <input type="password" placeholder="管理员密码..." class="form-control form-underlined" id="user_password" name="user_password"/>
                </div>
            </li>
            <li>
                <div class="form-group">
                    <label class="control-label" >输入验证码：</label>
                    <input type="text" placeholder="输入验证码..." style="width:35%" class="form-control form-underlined" id="code" name="code"/>
                    <img src="/Admin/Verify/verify" width="34%" height="32px" id="verify" onclick="this.src=this.src+'?'+Math.random();" />
                </div>
            </li>
            <li>
                <button class="btn btn-lg btn-block" id="entry" >立即登录</button>
            </li>
        </ul>
    </div>
</section>

<div class="mask"></div>
<div class="dialog">
	<div class="dialog-hd">
		<strong class="lt-title"><?php echo CUSTOM_SYSTOM_BAR;?></strong>
		<a class="rt-operate icon-remove JclosePanel" title="<?php echo CUSTOM_SYSTOM_COLSE;?>"></a>
	</div>
	<div class="dialog-bd"><p></p></div>
	<div class="dialog-ft">
		<button class="btn btn-info JyesBtn"><?php echo CUSTOM_SYSTOM_CONFIRM;?></button>
		<button class="btn btn-secondary JnoBtn"><?php echo CUSTOM_SYSTOM_COLSE;?></button>
	</div>
</div>
<dialog class="automatic">
	<span class="icon-volume-down"></span>
</dialog>

</body>
</html>