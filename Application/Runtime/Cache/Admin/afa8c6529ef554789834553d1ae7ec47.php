<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
<title><?php echo CUSTOM_SYSTOM_WEBTITLE;?></title>
<meta name="author" content="DeathGhost" />
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<link rel="icon" href="/dsyyManage/Public/Admin/images/icon/favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="/dsyyManage/Public/Admin/css/style.css" />
<link rel="stylesheet" type="text/css" href="/dsyyManage/Public/Admin/css/supplement.css" />
<script type="text/javascript" src="/dsyyManage/Public/Admin/javascript/jquery.js"></script>
<script type="text/javascript" src="/dsyyManage/Public/Admin/javascript/plug-ins/customScrollbar.min.js"></script>
<script type="text/javascript" src="/dsyyManage/Public/Admin/javascript/plug-ins/echarts.min.js"></script>
<script type="text/javascript" src="/dsyyManage/Public/Admin/javascript/plug-ins/layerUi/layer.js"></script>
<script type="text/javascript" src="/dsyyManage/Public/Admin/javascript/plug-ins/pagination.js"></script>
<script type="text/javascript" src="/dsyyManage/Public/Admin/javascript/public.js"></script>
<script type="text/javascript" src="/dsyyManage/Public/Admin/javascript/supplement.js"></script>
    
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
                <h2 class="title"><i class="icon-table"></i><?php echo ($bar_row["name"]); ?>-图书列表</h2>
            </header>
            <hr>
        </section>
        <div class="fr input-group mb-15">
            <form action="/dsyyManage/Admin/Book/index" method="get">
                <select name="type" style="width:auto;">
                    <option value="">全部</option>
                    <?php if(is_array($type_rows)): $i = 0; $__LIST__ = $type_rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type_row): $mod = ($i % 2 );++$i; if($type_row["type"] == $type): ?><option value="<?php echo ($type_row["type"]); ?>" selected><?php echo ($type_row["type"]); ?></option>
                            <?php else: ?>
                            <option value="<?php echo ($type_row["type"]); ?>" ><?php echo ($type_row["type"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </select>
                <input name="searchname" type="text" type="searchname" placeholder="<?php echo ($title); ?>" class="form-control form-boxed" style="width:auto;">
                <input name="bar_id" type="hidden" class="form-control" value="<?php echo ($bar_row["id"]); ?>" style="width:290px;">
                <button class="btn btn-secondary">搜索</button>
            </form>
        </div>
        <p class="title-description"></p>
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <th width="10%">序号</th>
                <th width="110px;">图书</th>
                <th>基本信息</th>
                <th width="10%">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($book_rows)): $i = 0; $__LIST__ = $book_rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$book_row): $mod = ($i % 2 );++$i;?><tr class="cen">
                    <td><?php echo ($i); ?></td>
                    <td>
                        <img src="<?php echo ($book_row["images_medium"]); ?>" class="cover-image" />
                    </td>
                    <td class="lt">
                        书名：《<?php echo ($book_row["title"]); ?>》<br />
                        作者：<?php echo ($book_row["author"]); ?><br />
                        图书类型：<?php echo ($book_row["type"]); ?><br />
                        <span class="prominent">共有<?php echo ($book_row["count"]); ?>本,在借<?php echo ($book_row["borrow"]); ?>本</span><br />
                        <span class="text-fourline">简介：<?php echo ($book_row["summary"]); ?></span>
                    </td>
                    <td>
                        <a href="<?php echo U('Admin/Book/browse',array('bar_id'=>$bar_row[id],'book_id'=>$book_row[id]));?>" title="<?php echo CUSTOM_SYSTOM_SEE;?>" class="mr-5"><?php echo CUSTOM_SYSTOM_SEE;?></a>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <?php if(empty($book_rows)): ?><div class="panel panel-default">
                <div class="panel-bd text-center">
                    <?php echo CUSTOM_MESSAGE_NODATA;?>
                </div>
            </div><?php endif; ?>
        <?php if($book_count > CUSTOM_PAGING): ?><div class="panel panel-default">
                <div class="panel-bd">
                    <div class='pagination'>
                    <?php echo ($page_show); ?>
                    </div>
                </div>
            </div><?php endif; ?>
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