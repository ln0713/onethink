<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo ($meta_title); ?>|OneThink管理平台</title>
    <link href="/Public/favicon.ico" type="image/x-icon" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/base.css" media="all">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/common.css" media="all">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/module.css">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="/Public/Admin/css/<?php echo (C("COLOR_STYLE")); ?>.css" media="all">
     <!--[if lt IE 9]>
    <script type="text/javascript" src="/Public/static/jquery-1.10.2.min.js"></script>
    <![endif]--><!--[if gte IE 9]><!-->
    <script type="text/javascript" src="/Public/static/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.mousewheel.js"></script>
    <!--<![endif]-->
    
</head>
<body>
    <!-- 头部 -->
    <div class="header">
        <!-- Logo -->
        <span class="logo"></span>
        <!-- /Logo -->

        <!-- 主导航 -->
        <ul class="main-nav">
            <?php if(is_array($__MENU__["main"])): $i = 0; $__LIST__ = $__MENU__["main"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li class="<?php echo ((isset($menu["class"]) && ($menu["class"] !== ""))?($menu["class"]):''); ?>"><a href="<?php echo (U($menu["url"])); ?>"><?php echo ($menu["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <!-- /主导航 -->

        <!-- 用户栏 -->
        <div class="user-bar">
            <a href="javascript:;" class="user-entrance"><i class="icon-user"></i></a>
            <ul class="nav-list user-menu hidden">
                <li class="manager">你好，<em title="<?php echo session('user_auth.username');?>"><?php echo session('user_auth.username');?></em></li>
                <li><a href="<?php echo U('User/updatePassword');?>">修改密码</a></li>
                <li><a href="<?php echo U('User/updateNickname');?>">修改昵称</a></li>
                <li><a href="<?php echo U('Public/logout');?>">退出</a></li>
            </ul>
        </div>
    </div>
    <!-- /头部 -->

    <!-- 边栏 -->
    <div class="sidebar">
        <!-- 子导航 -->
        
            <div id="subnav" class="subnav">
                <?php if(!empty($_extra_menu)): ?>
                    <?php echo extra_menu($_extra_menu,$__MENU__); endif; ?>
                <?php if(is_array($__MENU__["child"])): $i = 0; $__LIST__ = $__MENU__["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub_menu): $mod = ($i % 2 );++$i;?><!-- 子导航 -->
                    <?php if(!empty($sub_menu)): if(!empty($key)): ?><h3><i class="icon icon-unfold"></i><?php echo ($key); ?></h3><?php endif; ?>
                        <ul class="side-sub-menu">
                            <?php if(is_array($sub_menu)): $i = 0; $__LIST__ = $sub_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li>
                                    <a class="item" href="<?php echo (U($menu["url"])); ?>"><?php echo ($menu["title"]); ?></a>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul><?php endif; ?>
                    <!-- /子导航 --><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        
        <!-- /子导航 -->
    </div>
    <!-- /边栏 -->

    <!-- 内容区 -->
    <div id="main-content">
        <div id="top-alert" class="fixed alert alert-error" style="display: none;">
            <button class="close fixed" style="margin-top: 4px;">&times;</button>
            <div class="alert-content">这是内容</div>
        </div>
        <div id="main" class="main">
            
            <!-- nav -->
            <?php if(!empty($_show_nav)): ?><div class="breadcrumb">
                <span>您的位置:</span>
                <?php $i = '1'; ?>
                <?php if(is_array($_nav)): foreach($_nav as $k=>$v): if($i == count($_nav)): ?><span><?php echo ($v); ?></span>
                    <?php else: ?>
                    <span><a href="<?php echo ($k); ?>"><?php echo ($v); ?></a>&gt;</span><?php endif; ?>
                    <?php $i = $i+1; endforeach; endif; ?>
            </div><?php endif; ?>
            <!-- nav -->
            

            
    <div class="main-title">
        <h2>新增出租</h2>
    </div>
    <form action="<?php echo U('add');?>" method="post" class="form-horizontal">
        <div class="form-item">
            <label class="item-label">标题<span class="check-tips">（出租物品的名称）</span></label>
            <div class="controls">
                <input type="text" class="text input-large" name="sale_name" value="">
            </div>
        </div>
        <div class="form-item cf">
            <label class="item-label">价格</label>
            <div class="controls">
                <input type="text" class="text input-large" name="sale_price" value="">&nbsp;
                单位：
                <select style="width: 200px;" name="sale_unit">
                    <option value="1">元/月</option>
                    <option value="2">万元</option>
                </select>
            </div>
        </div>
        <div class="form-item">
            <label class="item-label">租售类型</label>
            <div class="controls">
                <select style="width: 200px;" name="sale_type">
                    <option value="1">出租</option>
                    <option value="2">销售</option>
                </select>
            </div>
        </div>
        <div class="form-item">
            <label class="item-label">截至时间</label>
            <div class="controls">
                <input type="text" class="text input-large" name="sale_time" value="">
            </div>
        </div>
        <div class="form-item">
            <label class="item-label">联系电话</label>
            <div class="controls">
                <input type="text" class="text input-large" name="sale_tel" value="">
            </div>
        </div>
        <div class="form-item cf">
            <div class="controls">
                <input type="file" id="upload_picture_path">
                <input type="hidden" name="logo" id="cover_id_path"/>
                <div class="upload-img-box">
                </div>
            </div>
            <script type="text/javascript" src="/Public/static/uploadify/jquery.uploadify.min.js"></script>
            <script type="text/javascript">
                //上传图片
                /* 初始化上传插件 */
                $("#upload_picture_path").uploadify({
                    "height": 30,
                    "swf": "/Public/static/uploadify/uploadify.swf",
                    "fileObjName": "download",
                    "buttonText": "上传图片",
                    "uploader": "/admin.php/file/uploadpicture/session_id/074fsmbf2fahqppveb3t5cg6o1.html",
                    "width": 120,
                    'removeTimeout': 1,
                    'fileTypeExts': '*.jpg; *.png; *.gif;',
                    "onUploadSuccess": uploadPicturepath,
                    'onFallback': function () {
                        alert('未检测到兼容版本的Flash.');
                    }
                });
                //将图片回显
                function uploadPicturepath(file, data) {
                    var data = $.parseJSON(data);
                    var src = '';
                    if (data.status) {
                        $("#cover_id_path").val(data.path);
                        src = data.url || '' + data.path
                        $("#cover_id_path").parent().find('.upload-img-box').html(
                            '<div class="upload-pre-item"><img src="' + src + '"/></div>'
                        );
                    } else {
                        updateAlert(data.info);
                        setTimeout(function () {
                            $('#top-alert').find('button').click();
                            $(that).removeClass('disabled').prop('disabled', false);
                        }, 1500);
                    }
                }
            </script>

            <label class="item-label">内容<span class="check-tips"></span></label>
            <div class="controls">
                <label class="textarea">
                    <textarea name="content"></textarea>
                    <input type="hidden" name="parse" value="0">
                    <link rel="stylesheet" href="/Public/static/kindeditor/default/default.css" />
                    <script charset="utf-8" src="/Public/static/kindeditor/kindeditor-min.js"></script>
                    <script charset="utf-8" src="/Public/static/kindeditor/zh_CN.js"></script>
                    <script type="text/javascript">
                        var editor_content;
                        KindEditor.ready(function(K) {
                            editor_content = K.create('textarea[name="content"]', {
                                allowFileManager : false,
                                themesPath: K.basePath,
                                width: '100%',
                                height: '500px',
                                resizeType: 1,
                                pasteType : 2,
                                urlType : 'absolute',
                                fileManagerJson : '/admin.php/Sale/fileManagerJson.html',
                                //uploadJson : '/admin.php/Sale/uploadJson.html' }
                                uploadJson : '/admin.php/Addons/execute/_addons/EditorForAdmin/_controller/Upload/_action/ke_upimg.html',
                                extraFileUploadParams: {
                                    session_id : 'b9sbk4q2h177konj7j869eshj5'
                                }
                            });
                        });

                        $(function(){
                            //传统表单提交同步
                            $('textarea[name="content"]').closest('form').submit(function(){
                                editor_content.sync();
                            });
                            //ajax提交之前同步
                            $('button[type="submit"],#submit,.ajax-post,#autoSave').click(function(){
                                editor_content.sync();
                            });
                        })
                    </script>

                </label>
            </div>

            <div class="form-item">
            <button class="btn submit-btn ajax-post" id="submit" type="submit" target-form="form-horizontal">确 定</button>
            <button class="btn btn-return" onclick="javascript:history.back(-1);return false;">返 回</button>
        </div>
        </div>
    </form>

        </div>
        <div class="cont-ft">
            <div class="copyright">
                <div class="fl">感谢使用<a href="http://www.onethink.cn" target="_blank">OneThink</a>管理平台</div>
                <div class="fr">V<?php echo (ONETHINK_VERSION); ?></div>
            </div>
        </div>
    </div>
    <!-- /内容区 -->
    <script type="text/javascript">
    (function(){
        var ThinkPHP = window.Think = {
            "ROOT"   : "", //当前网站地址
            "APP"    : "/index.php?s=", //当前项目地址
            "PUBLIC" : "/Public", //项目公共目录地址
            "DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
            "MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
            "VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
        }
    })();
    </script>
    <script type="text/javascript" src="/Public/static/think.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/common.js"></script>
    <script type="text/javascript">
        +function(){
            var $window = $(window), $subnav = $("#subnav"), url;
            $window.resize(function(){
                $("#main").css("min-height", $window.height() - 130);
            }).resize();

            /* 左边菜单高亮 */
            url = window.location.pathname + window.location.search;
            url = url.replace(/(\/(p)\/\d+)|(&p=\d+)|(\/(id)\/\d+)|(&id=\d+)|(\/(group)\/\d+)|(&group=\d+)/, "");
            $subnav.find("a[href='" + url + "']").parent().addClass("current");

            /* 左边菜单显示收起 */
            $("#subnav").on("click", "h3", function(){
                var $this = $(this);
                $this.find(".icon").toggleClass("icon-fold");
                $this.next().slideToggle("fast").siblings(".side-sub-menu:visible").
                      prev("h3").find("i").addClass("icon-fold").end().end().hide();
            });

            $("#subnav h3 a").click(function(e){e.stopPropagation()});

            /* 头部管理员菜单 */
            $(".user-bar").mouseenter(function(){
                var userMenu = $(this).children(".user-menu ");
                userMenu.removeClass("hidden");
                clearTimeout(userMenu.data("timeout"));
            }).mouseleave(function(){
                var userMenu = $(this).children(".user-menu");
                userMenu.data("timeout") && clearTimeout(userMenu.data("timeout"));
                userMenu.data("timeout", setTimeout(function(){userMenu.addClass("hidden")}, 100));
            });

	        /* 表单获取焦点变色 */
	        $("form").on("focus", "input", function(){
		        $(this).addClass('focus');
	        }).on("blur","input",function(){
				        $(this).removeClass('focus');
			        });
		    $("form").on("focus", "textarea", function(){
			    $(this).closest('label').addClass('focus');
		    }).on("blur","textarea",function(){
			    $(this).closest('label').removeClass('focus');
		    });

            // 导航栏超出窗口高度后的模拟滚动条
            var sHeight = $(".sidebar").height();
            var subHeight  = $(".subnav").height();
            var diff = subHeight - sHeight; //250
            var sub = $(".subnav");
            if(diff > 0){
                $(window).mousewheel(function(event, delta){
                    if(delta>0){
                        if(parseInt(sub.css('marginTop'))>-10){
                            sub.css('marginTop','0px');
                        }else{
                            sub.css('marginTop','+='+10);
                        }
                    }else{
                        if(parseInt(sub.css('marginTop'))<'-'+(diff-10)){
                            sub.css('marginTop','-'+(diff-10));
                        }else{
                            sub.css('marginTop','-='+10);
                        }
                    }
                });
            }
        }();
    </script>
    
    <script type="text/javascript">
        //导航高亮
        highlight_subnav('<?php echo U('Sale/index');?>');
    </script>

</body>
</html>