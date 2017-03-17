<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>管理中心</title>
    <link href="<?php echo (C("BACK_CSS_URL")); ?>admin.css" type="text/css" rel="stylesheet"/>
    <link href="<?php echo (C("BACK_CSS_URL")); ?>styles.css" type="text/css" rel="stylesheet"  media="all" >
    <script type="text/javascript" src="<?php echo (C("BACK_JS_URL")); ?>jquery.min.js"></script>
    <link href="<?php echo (C("BACK_CSS_URL")); ?>mine.css" type="text/css" rel="stylesheet">

    <script type="text/javascript" charset="utf-8" src="<?php echo (C("PLUGIN_URL")); ?>ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="<?php echo (C("PLUGIN_URL")); ?>ueditor/ueditor.all.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="<?php echo (C("PLUGIN_URL")); ?>ueditor/lang/zh-cn/zh-cn.js"></script>
    <script type='text/javascript'>
        /*在配置的时候 需要将网站的根目录权限提高 才能上传
         chmod -R 777 目录*/
        UEDITOR_CONFIG.toolbars = [[
            'fullscreen', 'source', '|', 'undo', 'redo', '|',
            'bold', 'italic', 'underline', 'fontborder', 'strikethrough',
            'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset',
            'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist',
            'insertunorderedlist', 'selectall', 'cleardoc', '|',
            'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
            'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
            'directionalityltr', 'directionalityrtl', 'indent', '|',
            'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|',
            'touppercase', 'tolowercase', '|',
            'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright',
            'imagecenter', '|',
            'simpleupload', 'insertimage',

        ]];

    </script>
</head>
<body>
<!--头部-->
<table cellspacing=0 cellpadding=0 width="100%"
       background="<?php echo (C("BACK_IMG_URL")); ?>header_bg.jpg" border=0>
    <tr height=56>
        <td width=260><img height=56 src="<?php echo (C("BACK_IMG_URL")); ?>header_left.jpg"
                           width=260></td>
        <td style="font-weight: bold; color: #fff; padding-top: 20px" align=middle>当前用户：<?php echo ($admin_name); ?>
            &nbsp;
            <a style="color: #fff"
               onclick="if (confirm('确定要退出吗？')) return true; else return false;"
               href="<?php echo U('Admin/layout');?>"
               target=_top>退出系统</a>
        </td>
        <td align=right width=268>
            <img height=56 src="<?php echo (C("BACK_IMG_URL")); ?>header_right.jpg" width=268>
        </td>
    </tr>
</table>
<div id="w">
    <nav>
        <ul id="ddmenu">
            <li><a class="no" href="<?php echo U('Manage/index');?>">管理中心</a></li>
            <li><a class="no" href="">电影管理</a>
                <ul>
                    <li><a href="<?php echo U('Manage/addfilm');?>">添加电影</a></li>
                    <li><a href="<?php echo U('Manage/updatefilm');?>">修改电影</a></li>

                </ul>
            </li>
            <li><a class="no" href="">电影播放管理</a>
                <ul>
                    <li><a href="<?php echo U('Manage/showfilm');?>">添加电影场次</a></li>
                    <li><a href="<?php echo U('Manage/updateplay');?>">电影场次修改</a></li>
                </ul>
            </li>
            <li><a class="no" href="">用户管理</a>
                <ul>
                    <li><a href="<?php echo U('Manage/usermanage');?>">更新用户信息</a></li>

                </ul>
            </li>

        </ul>
    </nav>
</div>
<script type="text/javascript">
    //关闭a标签的默认功能
    $(document).ready(function(){
        $('#no').on('click', function(e){
            e.preventDefault();
        });

        $('#ddmenu li').hover(function () {
            clearTimeout($.data(this,'timer'));
            $('ul',this).stop(true,true).slideDown(200);
        }, function () {
            $.data(this,'timer', setTimeout($.proxy(function() {
                $('ul',this).stop(true,true).slideUp(200);
            }, this), 100));
        });

    });
</script>
<div class="div_head">
            <span>
                <span style="float:left">当前位置是：电影播放管理-》电影播放修改</span>

            </span>
</div>
<div></div>

<div style="font-size: 13px;margin: 10px 5px">
    <table class="table_a" border="1" width="100%">
        <tbody>
        <tr style="font-weight: bold;">
            <td>编号</td>
            <td>电影名字</td>
            <td>播放时间</td>
            <td>已售票数</td>
            <td>剩余票数</td>
            <td align="center">操作</td>
        </tr>
        <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr id="product1">
                <td><?php echo ($v["playid"]); ?></td>
                <td><a href="#"><?php echo ($v["filmname"]); ?></a></td>
                <td><?php echo ($v["time"]); ?></td>
                <td><?php echo ($v["sell"]); ?></td>
                <td><?php echo ($v["remain"]); ?></td>
                <!--通过URL参数传递需要删除的电影场次-->
                <td>  <a href="<?php echo U('Manage/updateplay');?>?playid=<?php echo ($v["playid"]); ?>">删除</a></td>
            </tr><?php endforeach; endif; ?>
        <tr>
            <td colspan="20" style="text-align: center;">
                [下一页]
            </td>
        </tr>
        </tbody>
    </table>
</div>

</body>
</html>