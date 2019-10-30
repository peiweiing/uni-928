<?php
//生成订单编号
function ordercode(){
	return time().rand(10,99);
}

//支付宝支付接口调用
function alipay($orderno,$ordername,$money,$body="",$show_url=""){
	vendor('alipay.lib.alipay_submit#class');
	
		$alipay_config=C('alipay_config');   
        $seller_email = C('alipay.seller_email');//卖家支付宝帐户,必填
			
        $payment_type = "1"; //支付类型 //必填，不能修改
        $notify_url = C('alipay.notify_url'); //服务器异步通知页面路径
        $return_url = C('alipay.return_url'); //页面跳转同步通知页面路径
        $seller_email = C('alipay.seller_email');//卖家支付宝帐户必填

        $out_trade_no = $orderno;//商户订单号,商户网站订单系统中唯一订单号，必填
        $subject = $ordername; //订单名称,必填 
        $total_fee = $money;//付款金额,必填
        
        $body = "";//订单描述
        $show_url = "";//商品展示地址
        //需以http://开头的完整路径，例如：http://www.xxx.com/myorder.html
       
        $anti_phishing_key = "";//防钓鱼时间戳
        //若要使用请调用类文件submit中的query_timestamp函数
     
        $exter_invoke_ip = "";//客户端的IP地址
        //非局域网的外网IP地址，如：221.0.0.1


	/************************************************************/

	//构造要请求的参数数组，无需改动
	$parameter = array(
		"service" => "create_direct_pay_by_user",
		"partner" => trim($alipay_config['partner']),
		"payment_type"	=> $payment_type,
		"notify_url"	=> $notify_url,
		"return_url"	=> $return_url,
		"seller_email"	=> $seller_email,
		"out_trade_no"	=> $out_trade_no,
		"subject"	=> $subject,
		"total_fee"	=> $total_fee,
		"body"	=> $body,
		"show_url"	=> $show_url,
		"anti_phishing_key"	=> $anti_phishing_key,
		"exter_invoke_ip"	=> $exter_invoke_ip,
		"_input_charset"	=> trim(strtolower($alipay_config['input_charset']))
	);

	//建立请求
	$alipaySubmit = new AlipaySubmit($alipay_config);
	$html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
	echo $html_text;
}

/******************************
支付宝页面跳转同步通知页面
*******************************/
function returnurl(){
	vendor('alipay.lib.alipay_notify#class');
	$alipay_config=C('alipay_config');   
	
	//计算得出通知验证结果
	$alipayNotify = new AlipayNotify($alipay_config);
	$verify_result = $alipayNotify->verifyReturn();
	if($verify_result){//验证成功
		$out_trade_no   = $_GET['out_trade_no'];      //商户订单号
        $trade_no       = $_GET['trade_no'];          //支付宝交易号
        $trade_status   = $_GET['trade_status'];      //交易状态
        $total_fee      = $_GET['total_fee'];         //交易金额
        $notify_id      = $_GET['notify_id'];         //通知校验ID。
        $notify_time    = $_GET['notify_time'];       //通知的发送时间。
        $buyer_email    = $_GET['buyer_email'];       //买家支付宝帐号
		
		$parameter = array(
             "out_trade_no"     => $out_trade_no, //商户订单编号；
             "trade_no"     => $trade_no,     //支付宝交易号；
             "total_fee"     => $total_fee,    //交易金额；
             "trade_status"     => $trade_status, //交易状态
             "notify_id"     => $notify_id,    //通知校验ID。
             "notify_time"   => $notify_time,  //通知的发送时间。
             "buyer_email"   => $buyer_email,  //买家支付宝帐号；
           );
		
		if($_GET['trade_status'] == 'TRADE_FINISHED' || $_GET['trade_status'] == 'TRADE_SUCCESS') {
			return $parameter;
		}else {
			return false;
		}
			
	}else {
		return false;
	}
}

/******************************
服务器异步通知页面方法
其实这里就是将notify_url.php文件中的代码复制过来进行处理       
*******************************/
function notifyurl(){
	vendor('alipay.lib.alipay_notify#class');
	$alipay_config=C('alipay_config');   
	
	//计算得出通知验证结果
	$alipayNotify = new AlipayNotify($alipay_config);
	$verify_result = $alipayNotify->verifyNotify();

	if($verify_result) {//验证成功
		$out_trade_no   = $_POST['out_trade_no'];      //商户订单号
	    $trade_no       = $_POST['trade_no'];          //支付宝交易号
	    $trade_status   = $_POST['trade_status'];      //交易状态
	    $total_fee      = $_POST['total_fee'];         //交易金额
	    $notify_id      = $_POST['notify_id'];         //通知校验ID。
	    $notify_time    = $_POST['notify_time'];       //通知的发送时间。格式为yyyy-MM-dd HH:mm:ss。
	    $buyer_email    = $_POST['buyer_email'];       //买家支付宝帐号；
		
		$parameter = array(
            "out_trade_no"     => $out_trade_no,      //商户订单编号；
            "trade_no"     => $trade_no,          //支付宝交易号；
            "total_fee"      => $total_fee,         //交易金额；
            "trade_status"     => $trade_status,      //交易状态
            "notify_id"      => $notify_id,         //通知校验ID。
            "notify_time"    => $notify_time,       //通知的发送时间。
            "buyer_email"    => $buyer_email,       //买家支付宝帐号
        );
		
		if($_POST['trade_status'] == 'TRADE_FINISHED') {
			//
		}else if ($_POST['trade_status'] == 'TRADE_SUCCESS') {
			return $parameter;
		}	
	}else {
		return false;
	}
}


?>
