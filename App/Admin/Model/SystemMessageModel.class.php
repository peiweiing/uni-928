<?php

namespace Admin\Model;
use \Think\Model;

class NoticeCategoryModel extends Model
{
    //使用自动完成
    protected $_auto = array(
        array('status', 1),
        array('addtime', 'time', 3, 'function'),
        array('title', 'getTitle', 3, 'callback'),
        array('content', 'getContent', 3, 'callback'),
    );

    

    protected function getTitle() {
        return $_POST['title'];
    }

    protected function getContent() {
        return $_POST['content'];
    }


}
