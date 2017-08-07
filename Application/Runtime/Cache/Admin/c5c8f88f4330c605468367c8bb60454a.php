<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
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
    
</head>
<body>
<div class="main-wrap">
    
    <div class="side-nav">
    <div class="side-logo">
        <div class="logo">
				<span class="logo-ico">
					<i class="i-l-1"></i>
					<i class="i-l-2"></i>
					<i class="i-l-3"></i>
				</span>
            <strong><?php echo CUSTOM_SYSTOM_MENU;?></strong>
        </div>
    </div>

    <nav class="side-menu content mCustomScrollbar" data-mcs-theme="minimal-dark">
        <h2>
            <a href="<?php echo U('Admin/Index/index');?>" class="InitialPage"><i class="icon-home"></i><?php echo CUSTOM_SYSTOM_HOME;?></a>
        </h2>
        <ul>
            <li>
                <dl>
                    <dt>
                        <i class="icon-user"></i>用户信息管理<i class="icon-angle-right"></i>
                    </dt>
                    <dd>
                        <a href="<?php echo U('Admin/User/edit');?>">修改密码</a>
                    </dd>
                </dl>
            <li>
            <?php if(is_array($backstage_rows)): $k = 0; $__LIST__ = $backstage_rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$backstage_row): $mod = ($k % 2 );++$k;?><li>
                    <dl>
                        <dt>
                            <i class="icon-book"></i><?php echo ($backstage_row["name"]); ?><i class="icon-angle-right"></i>
                        </dt>
                        <dd>
                            <a href="<?php echo U('Admin/Book/index',array('bar_id'=>$backstage_row[id]));?>"><?php echo ($backstage_row["son"]["book"]); ?></a>
                        </dd>
                        <dd>
                            <!--<a href="/Admin/Statistics/index?bar_id=<?php echo ($backstage_row["id"]); ?>"><?php echo ($backstage_row["son"]["statistics"]); ?></a>-->
                            <a href="<?php echo U('Admin/Statistics/index',array('bar_id'=>$backstage_row[id]));?>"><?php echo ($backstage_row["son"]["statistics"]); ?></a>
                        </dd>
                    </dl>
                <li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </nav>
</div>
    
    <div class="content-wrap">
        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<header class="top-hd overflow-hidden">
    <div class="hd-lt">
        <a class="icon-reorder"></a>
    </div>
	<div class="hd-rt">
		<ul>
			<!--<li>-->
				<!--<a herf="javascript:void(0)"  id="ClearRuntime"><i class="icon-random"></i><?php echo CUSTOM_SYSTOM_CLEAR;?></a>-->
			<!--</li>-->
			<li>
                <a href="<?php echo U('Admin/User/edit');?>"><img src="<?php echo ($_SESSION['user']['avatar']); ?>" class="wechat-icon" /><em><?php echo ($_SESSION['user']['nick_name']); ?></em></a>
			</li>
			<li>
				<a href="javascript:void(0)" id="JsSignOut"><i class="icon-signout"></i><?php echo CUSTOM_SYSTOM_EXIT;?></a>
			</li>
		</ul>
	</div>
</header>
        
        <main class="main-cont content mCustomScrollbar">
            <!--开始::内容-->
            
    <div class="page-wrap">
        <blockquote class="blockquote mb-10"><?php echo CUSTOM_MESSAGE_EDITUSER;?></blockquote>
        <div class="form-group-col-2">
            <div class="form-label">原密码：</div>
            <div class="form-cont">
                <input type="password" value="<?php echo ($user_row["user_title"]); ?>" class="form-control form-boxed width-30" name="user_password" id="user_password" />
                <span class="word-aux"><i class="icon-warning-sign"></i><?php echo CUSTOM_SYSTOM_REQUIRED;?></span>
            </div>
        </div>
        <div class="form-group-col-2">
            <div class="form-label">新密码：</div>
            <div class="form-cont">
                <input type="password" value="<?php echo ($user_row["user_title"]); ?>" class="form-control form-boxed width-30" name="user_new_password" id="user_new_password" />
                <span class="word-aux"><i class="icon-warning-sign"></i><?php echo CUSTOM_SYSTOM_REQUIRED;?></span>
            </div>
        </div>
        <div class="form-group-col-2">
            <div class="form-label">确认密码：</div>
            <div class="form-cont">
                <input type="password" value="<?php echo ($user_row["user_email"]); ?>" class="form-control form-boxed width-30" name="user_confirm_password" id="user_confirm_password" />
                <span class="word-aux"><i class="icon-warning-sign"></i><?php echo CUSTOM_SYSTOM_REQUIRED;?></span>
            </div>
        </div>
        <div class="form-group-col-2">
            <div class="form-label">验证码：</div>
            <div class="form-cont">
                <input type="text" value="<?php echo ($user_row["user_email"]); ?>" class="form-control form-boxed" style="width:100px;" name="code" id="code" />
                <img src="/Admin/Verify/verify" width="100px" height="32px" id="verify"  onclick="this.src=this.src+'?'+Math.random();" />
            </div>
        </div>
        <div class="form-group-col-2">
            <div class="form-label"></div>
            <div class="form-cont">
                <input type="submit" class="btn btn-primary" value="<?php echo CUSTOM_SYSTOM_PUTIN;?>" onclick="edit_password()" />
            </div>
        </div>
    </div>

            <!--开始::结束-->
        </main>
        
        <footer class="btm-ft">
	<p class="clear">
		<span class="fl"><?php echo ($company_row["company_copyright"]); ?> <a href="#" title="DeathGhost" target="_blank"><?php echo ($company_row["company_record"]); ?></a></span>
		<span class="fr text-info">
			<em class="uppercase">
				<i class="icon-user"></i>
				技术支持：<a href="" target="_blank">ISART</a>
			</em> 
		</span>
	</p>
</footer>
        
    </div>
</div>

    
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