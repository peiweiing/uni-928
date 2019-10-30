<?php

//该函数实现根据中文字符串截取,默认截取255个字
//By yjc 2014-10-18
function strdel($str,$start=0,$length=255,$encode='utf-8'){
	$str=strip_tags($str,"<br><br/>");
	$str=mb_substr($str,$start,$length,$encode);
	$len=mb_strlen($str);
	if($len<=$length){
		return $str;
	}
	else{
		return str_pad($str,($len+3),"...");
	}
	
}
function articleType($type){
    switch($type){
        case 1:
            $typename='常见问题'; break;
        case 2:
            $typename='交友须知'; break;
        case 3:
            $typename='关于婚恋'; break;
        case 4:
            $typename='合作联系'; break;
        case 5:
            $typename='帮助中心'; break;
    }
   return $typename;
}

?>
