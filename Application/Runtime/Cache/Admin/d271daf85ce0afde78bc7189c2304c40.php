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
        <section class="page-hd">
            <header>
                <p class="title-description">
                <div class="float-left">
                    <img src="<?php echo ($book_row["images_medium"]); ?>" class="book-image" />
                </div>
                <div class="float-left margin-left-20">
                    <ul>
                        <li class="line-text text-oneline">
                            书名：《<?php echo ($book_row["title"]); ?>》
                            <?php if(!empty($book_row["origin_title"])): ?><span class="margin-left-20">(原书名：<?php echo ($book_row["origin_title"]); ?>)</span><?php endif; ?>
                        </li>
                        <?php if(!empty($book_row["author"])): ?><li class="line-text" >
                                作者：<?php echo ($book_row["author"]); ?>
                            </li><?php endif; ?>
                        <?php if(!empty($book_row["type neq"])): ?><li class="line-text">
                                图书类型：<?php echo ($book_row["type"]); ?>
                            </li><?php endif; ?>
                        <?php if(!empty($book_row["binding"])): ?><li class="line-text">
                                版式：<?php echo ($book_row["binding"]); ?>
                            </li><?php endif; ?>
                        <?php if(!empty($book_row["publisher"])): ?><li class="line-text">
                                出版社：<?php echo ($book_row["publisher"]); ?>
                            </li><?php endif; ?>
                        <?php if(!empty($book_row["pubdate"])): ?><li class="line-text">
                                出版日期：<?php echo ($book_row["pubdate"]); ?>
                            </li><?php endif; ?>
                    </ul>
                </div>
                <div class="float-right margin-left-20">
                    <a href="javascript:history.back(-1)">
                        <button class="btn btn-secondary"><?php echo CUSTOM_SYSTOM_BACK;?></button>
                    </a>
                </div>
                </p>
                <div class="clear"></div>
                <?php if(!empty($book_row["summary"])): ?><p class="title-description" style="margin-top:10px;" >
                        简介：<?php echo ($book_row["summary"]); ?>
                    </p><?php endif; ?>
            </header>
            <hr>
            <table class="table table-bordered  mb-15 mt-15">
                <thead>
                <tr class="cen">
                    <th>图书总数(单位：本)</th>
                    <th>借出数目(单位：本)</th>
                    <th>在架数目(单位：本)</th>
                </tr>
                </thead>
                <tbody>
                <tr class="cen">
                    <td><b><?php echo ($book_count_total); ?></b></td>
                    <td><b><?php echo ($book_count_end); ?></b></td>
                    <td><b><?php echo ($book_count_total-$book_count_end); ?></b></td>
                </tr>
                </tbody>
            </table>
            <div class="fr input-group mb-15">
                <form action="/Admin/Book/browse" method="get">
                    <input name="searchname" type="text" class="form-control" placeholder="搜索图书编号..." style="width:290px;">
                    <input name="bar_id" type="hidden" class="form-control" value="<?php echo ($bar_id); ?>" style="width:290px;">
                    <input name="book_id" type="hidden" class="form-control" value="<?php echo ($book_id); ?>" style="width:290px;">
                    <button class="btn btn-secondary-outline" type="submit">搜索</button>
                </form>
            </div>
            <div class="clear"></div>
            <?php if(is_array($book_lists)): $i = 0; $__LIST__ = $book_lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$book_list): $mod = ($i % 2 );++$i;?><div class="panel panel-default">
                    <div class="panel-hd">
                        <table class="table border-clear" style="border:0px;margin-bottom: 0px;">
                            <tbody>
                            <tr class="cen" style="border:0px;">
                                <td style="border:0px;width:40px;"><?php echo ($i); ?>.</td>
                                <td style="border:0px;width:200px;">图书编号：<?php echo ($book_list["book_code"]); ?></td>
                                <td style="border:0px;">录入时间：<?php echo ($book_list["create_time"]); ?></td>
                                <td style="border:0px;">
                                    <?php if(($book_list["owner_type"]) == "0"): ?>所有者：书吧
                                        <?php else: ?>
                                        所有者：个人<?php endif; ?>
                                </td>
                                <td style="border:0px;">
                                    <?php if(($book_list["o_n"]) == "0"): ?>新旧度：旧书
                                        <?php else: ?>
                                        新旧度：新书<?php endif; ?>
                                </td>
                                <td style="border:0px;">
                                    <?php if(($book_list["mail"]) == "0"): ?>能否邮寄：不能邮寄
                                        <?php else: ?>
                                        能否邮寄：能邮寄<?php endif; ?>
                                </td>
                                <td style="border:0px;">
                                    <?php if(($book_list["status"]) == "1"): ?><span class="prominent">借阅中</span>
                                        <?php else: ?>
                                        <span class="prominent">在架</span><?php endif; ?>
                                </td>
                                <!--<td style="border:0px;">-->
                                    <!--<i class="icon-pencil" title="修改"></i>-->
                                <!--</td>-->
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <?php if(($book_list["status"]) == "1"): ?><hr style="margin:0px;" />
                        <div class="panel-bd">
                            <div class="form-group-col-2">
                                <div class="text-label" >会员：</div>
                                <div class="text-cont">
                                    <img src="<?php echo ($book_list["user_avatar"]); ?>" class="wechat-icon" />
                                    <span class="margin-right-20"><?php echo ($book_list["user_name"]); ?></span>
                                    <?php if(($book_list["user_tel"]) != "undefined"): ?><span class="margin-right-20"><?php echo ($book_list["user_tel"]); ?></span><?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="text-label">操作者：</div>
                                <div class="text-cont">
                                    <img src="<?php echo ($book_list["oper_avatar"]); ?>" class="wechat-icon" />
                                    <span class="margin-right-20"><?php echo ($book_list["oper_name"]); ?></span>
                                </div>
                            </div>
                            <div class="form-group-col-2">
                                <div class="text-label">借出时间：</div>
                                <div class="text-cont">
                                    <?php echo ($book_list["borrow_time"]); ?>
                                </div>
                            </div>
                        </div><?php endif; ?>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </section>
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

</body>
</html>