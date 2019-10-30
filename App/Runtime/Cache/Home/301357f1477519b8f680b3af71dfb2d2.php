<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- 2秒后自动跳转 -->
<?php if($sysUrl || $url != null): ?><!-- 登陆退出走这个 -->
    <?php if($sysUrl != null): ?><meta http-equiv="refresh" content="2;url=<?php echo ($sysUrl); ?>" />
    <?php else: ?>
        <meta http-equiv="refresh" content="2;url=/yyw/index.php/Home/User/view/act/userInfo" /><?php endif; ?>

<?php else: ?>
<!-- 修改资料走这个 -->
<meta http-equiv="refresh" content="2;url=/yyw/index.php/Home/Index/index" /><?php endif; ?>
<title>系统提示</title>
<style>
.alert{background-color:#f1f1f1; width:495px;margin:50px auto; font-size:12px; line-height:24px;}
.alert .alert_body{ border:1px solid #cbcbcb;background-color:#fff; width:475px; height:143px; position:relative; top:-5px; left:-5px; padding:10px;}
.alert .alert_body h3{font-size:14px; font-weight:bold; margin:0;}
.alert .alert_body .alertcont{margin:15px 0 0 85px; background:url(/tpl/static/images/m_alert.png) left center no-repeat; padding:5px 50px; line-height:18px; color:#666; min-height:30px; _height:30px;}
.alert .alert_body .alertcont a{color:#000; text-decoration:none;}
.alert .alert_body .alertcont span{font-size:12px; font-weight:bold; color:#000;}
.alert .alert_body .btn{text-align:center; padding-top:0px;}
.alert .alert_body .btn img{border:0;}
.alert .alert_body .pi2{background:url(/tpl/static/images/m_err.png) left center no-repeat;}
.alert .alert_body .pi1{background:url(/tpl/static/images/m_acc.png) left center no-repeat; padding-left:55px;}

.message{display:block;position:absolute;top:0;left:30%;
left:50%;/*FF IE7*/
top: 50%;/*FF IE7*/
margin-left:-240px!important;/*FF IE7 该值为本身宽的一半 */
margin-top:-70px!important;/*FF IE7 该值为本身高的一半*/
margin-top:0;
position:fixed!important;/*FF IE7*/
position:absolute;/*IE6*/
_top:       expression(eval(document.compatMode &&
            document.compatMode=='CSS1Compat') ?
            documentElement.scrollTop + (document.documentElement.clientHeight-this.offsetHeight)/2 :/*IE6*/
            document.body.scrollTop + (document.body.clientHeight - this.clientHeight)/2);/*IE5 IE5.5*/}
			.message .alert_body{ padding:0; height:163px; width:495px; border:1px solid #dfdfdf;}
.message .alert_body h3{background-color:#fbfbe7; padding:3px 15px;}
</style>
</head>
<body>

<div class="alert message">
  <div class="alert_body">
	    <h3>系统提示</h3>
    <p class="alertcont pi1">
    <span>
            <img src="/yyw/Public/images/ok2.gif" style="float:left;" />
        <?php if($sysCall || $_SESSION['user']!= null): ?><span style="display:block;margin-left:10px;margin-top:10px;">
                <?php if($sysCall != null): echo ($sysCall); ?>
                <?php else: ?>
                    登录成功!<?php endif; ?>
            </span>            
        <?php else: ?>        
            <span style="display:block;margin-left:10px;margin-top:10px;">退出成功</span><?php endif; ?>
        
        
            
    <span>
	</p>
    <?php if($sysUrl || $url != null): if($sysUrl != null): ?><p align="center">
                <a href="<?php echo ($sysUrl); ?>">2秒后 如果你的浏览器没有自动跳转，请点击此链接</a>
            </p>
        <?php else: ?>
            <p align="center">
                <a href="/yyw/index.php/Home/User/view/act/userInfo">2秒后 如果你的浏览器没有自动跳转，请点击此链接</a>
            </p><?php endif; ?>
    <?php else: ?>
        <p align="center">
            <a href="/yyw/index.php/Home/Index/index">2秒后 如果你的浏览器没有自动跳转，请点击此链接</a>
        </p><?php endif; ?>    
    
    </div>
</div>


</body></html>