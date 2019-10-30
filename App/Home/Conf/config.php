<?php
return array(

    //支付宝即时到帐配置参数
	'alipay_config'=>array(
        'partner' =>'20886*',   //这里是你在成功申请支付宝接口后获取到的PID；
		'key'=>'jslhcfvc*',//这里是你在成功申请支付宝接口后获取到的Key
		'sign_type'=>strtoupper('MD5'),
		'input_charset'=> strtolower('utf-8'),
		'cacert'=> getcwd().'\\cacert.pem',
		'transport'=> 'http',
      ),
	  
	 'alipay'  =>array(
		 'seller_email'=>'*@qq.com',//这里是卖家的支付宝账号
		 'notify_url'=>'http://www.xxx.com/Pay/notifyurl', //这里是异步通知页面url
		 'return_url'=>'http://www.xxx.com/Pay/returnurl',//这里是页面跳转通知url
		 'successpage'=>'User/myorder?ordtype=payed', //支付成功跳转到的页面
		 'errorpage'=>'User/myorder?ordtype=unpay',  //支付失败跳转到的页面
		 ),
    
);