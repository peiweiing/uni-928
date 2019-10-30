<?php
namespace Home\Model;

use Think\Model;

class DiaryModel extends Model
{
	protected $_scope = array(
		'read'=>array(
			'field'=>'id,catid,title,addtime,status,power,views',
			'order'=>'addtime DESC',
		),
		'show'=>array(
			'field'=>'id,title',
		),
		'new'=>array(
			'order'=>'addtime DESC',
		),
		'hot'=>array(
			'order'=>'views DESC',
		),
	);
	protected $_auto = array(
		array('status',1),
		array('addtime','time',1,'function'),
		array('updatetime','time',2,'function'),
	);
	
	protected $_validate = array(
		array('catid','require','必须选择日记分类'),
		array('power','require','必须指定阅读权限'),
		array('title','1,30','标题长度不符！',0,'length'),
	);
}
