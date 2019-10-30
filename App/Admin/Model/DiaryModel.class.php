<?php
namespace Admin\Model;

use Think\Model;

class DiaryModel extends Model
{
	protected $_auto = array(
		array('addtime','time',1,'function'),
		array('updatetime','time',2,'function'),
	);
	
	protected $_validate = array(
		array('catid','require','必须分类'),
		array('power','require','必须指定阅读权限'),
		array('title','1,30','标题长度为1到30位',0,'length'),
	);
}