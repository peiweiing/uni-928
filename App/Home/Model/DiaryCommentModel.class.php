<?php
namespace Home\Model;

use Think\Model;

class DiaryCommentModel extends Model
{
	protected $_auto = array(
		array('cmtime','time',1,'function'),
	);
	
	protected $_validate = array(
		array('content','require','内容不能为空！',),
	);
}
