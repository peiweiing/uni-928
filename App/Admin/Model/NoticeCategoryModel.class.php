<?php

namespace Admin\Model;
use \Think\Model;

class NoticeCategoryModel extends Model
{
    //使用自动完成
    protected $_auto = array(
        //为typeid赋值，使用当前模型的回调方法getMaxTypeid
        array('typeid', 'getMaxTypeid', 3, 'callback'),
    );

    protected function getMaxTypeid() {
        $maxTypeid = D('NoticeCategory')->field(array('typeid'))->order('id desc')->limit(1)->find();
        $finalTypeid = $maxTypeid['typeid'] + 1;
        return $finalTypeid;
    }

}
