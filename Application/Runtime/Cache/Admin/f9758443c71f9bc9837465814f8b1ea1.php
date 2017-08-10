<?php if (!defined('THINK_PATH')) exit(); if(C('LAYOUT_ON')) { echo ''; } ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="/dsyyManage/Public/404/css/main.css" />
    <link rel="stylesheet" type="text/css" href="/dsyyManage/Public/404/css/tipsy.css" />

    <!--[if lt IE 9]>
    <link rel="stylesheet" type="text/css" href="/dsyyManage/Public/404/css/ie8.css" />
    <![endif]-->


    <script type="text/javascript" src="/dsyyManage/Public/404/scripts/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="/dsyyManage/Public/404/scripts/custom-scripts.js"></script>
    <script type="text/javascript" src="/dsyyManage/Public/404/scripts/jquery.tipsy.js"></script>

    <script type="text/javascript">

        $(document).ready(function(){

            universalPreloader();

        });

        $(window).load(function(){

            //remove Universal Preloader
            universalPreloaderRemove();

            rotate();
            dogRun();

            //Tipsy implementation
            $('.with-tooltip').tipsy({gravity: $.fn.tipsy.autoNS});

        });

        $(document).ready(function(){
            var wait = document.getElementById('wait'),href = document.getElementById('href').href;
            var interval = setInterval(function(){
                var time = --wait.innerHTML;
                if(time <= 0) {
                    location.href = href;
                    clearInterval(interval);
                };
            }, 1000);
        })
    </script>



    <title>跳转提示</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body>
<div id="wrapper">
    <span style="width:100%;text-align: center;color:#fff;font-size:30px;line-height: 100px;font-weight: bold;">
        <?php echo($error); ?><br>
        页面自动 <a id="href" href="<?php echo($jumpUrl); ?>" style="color:#fff;font-size:40px;text-decoration: none;">跳转</a> 等待时间： <b id="wait"><?php echo($waitSecond); ?></b>
    </span>
    <div class="dog-wrapper">
        <!-- dog running -->
        <div class="dog"></div>
        <!-- dog running -->
        <!-- dog bubble talking -->
        <div class="dog-bubble"></div>
        <!-- dog bubble talking -->
    </div>

    <!-- planet at the bottom -->
    <div class="planet"></div>
    <!-- planet at the bottom -->
</div>


</body>
</html>