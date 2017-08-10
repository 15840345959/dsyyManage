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
    
    <script type="text/javascript" src="/dsyyManage/Public/Admin/javascript/Statistics/jqplot/jquery.jqplot.min.js"></script>
    <script type="text/javascript" src="/dsyyManage/Public/Admin/javascript/Statistics/jqplot/examples/syntaxhighlighter/scripts/shCore.min.js"></script>
    <script type="text/javascript" src="/dsyyManage/Public/Admin/javascript/Statistics/jqplot/examples/syntaxhighlighter/scripts/shBrushJScript.min.js"></script>
    <script type="text/javascript" src="/dsyyManage/Public/Admin/javascript/Statistics/jqplot/examples/syntaxhighlighter/scripts/shBrushXml.min.js"></script>
    <script type="text/javascript" src="/dsyyManage/Public/Admin/javascript/Statistics/jqplot/plugins/jqplot.logAxisRenderer.min.js"></script>
    <script type="text/javascript" src="/dsyyManage/Public/Admin/javascript/Statistics/jqplot/plugins/jqplot.canvasTextRenderer.min.js"></script>
    <script type="text/javascript" src="/dsyyManage/Public/Admin/javascript/Statistics/jqplot/plugins/jqplot.canvasAxisLabelRenderer.min.js"></script>
    <script type="text/javascript" src="/dsyyManage/Public/Admin/javascript/Statistics/jqplot/plugins/jqplot.canvasAxisTickRenderer.min.js"></script>
    <script type="text/javascript" src="/dsyyManage/Public/Admin/javascript/Statistics/jqplot/plugins/jqplot.dateAxisRenderer.min.js"></script>
    <script type="text/javascript" src="/dsyyManage/Public/Admin/javascript/Statistics/jqplot/plugins/jqplot.categoryAxisRenderer.min.js"></script>
    <script type="text/javascript" src="/dsyyManage/Public/Admin/javascript/Statistics/jqplot/plugins/jqplot.barRenderer.min.js"></script>
    <script type="text/javascript" src="/dsyyManage/Public/Admin/javascript/Statistics/jqplot/plugins/jqplot.pointLabels.min.js"></script>
    <script type="text/javascript" src="/dsyyManage/Public/Admin/javascript/Statistics/jqplot/plugins/jqplot.dateAxisRenderer.min.js"></script>
    <script type="text/javascript" src="/dsyyManage/Public/Admin/javascript/Statistics/jqplot/plugins/jqplot.dateAxisRenderer.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/dsyyManage/Public/Admin/javascript/Statistics/jqplot/jquery.jqplot.min.css" />
    <link rel="stylesheet" type="text/css" href="/dsyyManage/Public/Admin/javascript/Statistics/jqplot/examples/syntaxhighlighter/styles/shCoreDefault.min.css" />
    <link rel="stylesheet" type="text/css" href="/dsyyManage/Public/Admin/javascript/Statistics/jqplot/examples/syntaxhighlighter/styles/shThemejqPlot.min.css" />
    <script type="text/javascript" src="/dsyyManage/Public/Admin/javascript/Statistics/m_jqplot.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
//                var bar_id=getQueryString("bar_id");  //正常URL带参形式取参数值
            var bar_id=GetRequest("bar_id");  //PATHINFO模式取参数值
            $.post("/dsyyManage/Admin/Statistics/data",{"bar_id":bar_id},function(record){
                var data = record["data"];
                var data_max = record["data_max"]; //Y轴最大刻度
                var line_title = ["图书总数","借出数目","归还数目"]; //曲线名称
                var y_label = "图书数量"; //Y轴标题
                var x_label = "本月日期"; //X轴标题
                var x = record["time"]; //定义X轴刻度值
                var title = record["thismonth"]+"数据统计<br>（注：此表只统计当前月份的图书借出和归还数据）"; //统计图标标题
                j.jqplot.diagram.base("chart1", data, line_title, title, x, x_label, y_label, data_max, 1);
            },"json")
            $.post("/dsyyManage/Admin/Statistics/type",{"bar_id":bar_id},function(record){
                var data = record["data"];
                var data_max = record["data_max"]; //Y轴最大刻度
                var line_title = ["图书总数","借出数目"]; //曲线名称
                var y_label = "图书数量"; //Y轴标题
                var x_label = "图书类型"; //X轴标题
                var x = record["type"]; //定义X轴刻度值
                var title = "图书类型统计"; //统计图标标题
                j.jqplot.diagram.base("chart2", data, line_title, title, x, x_label, y_label, data_max, 2);
            },"json")
        });
        //正常URL带参形式取参数值
        function getQueryString(name) {
            var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
            var r = window.location.search.substr(1).match(reg);
            if (r != null) return unescape(r[2]); return null;
        }
        //PATHINFO模式取参数值
        function GetRequest(param) {
            var url = window.location.href;
            if (url.indexOf(param) != -1) {
                var start=url.indexOf(param)+param.length+1;
                var end=url.indexOf(".html");
                var length=end-start;
                var theRequest=url.substr(start,length);
            }
            return theRequest;
        }
    </script>

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
                <h2 class="title"><i class="icon-bar-chart"></i><?php echo ($bar_row["name"]); ?>-数据统计</h2>
            </header>
            <hr>
        </section>
        <table class="table table-bordered  mb-15 ">
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
                <td><b><?php echo ($book_count_lend); ?></b></td>
                <td><b><?php echo ($book_count_total-$book_count_lend); ?></b></td>
            </tr>
            </tbody>
        </table>
        <div class="flow-layout col-2">
            <ul>
                <li class="child-wrap">
                    <div class="panel panel-default">
                        <div class="panel-bd" id="chart1"></div>
                    </div>
                </li>
                <li class="child-wrap">
                    <div class="panel panel-default">
                        <div class="panel-bd" id="chart2"></div>
                    </div>
                </li>
            </ul>
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

</body>
</html>