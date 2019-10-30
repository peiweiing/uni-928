<?php

namespace Admin\Model;
use Think\Model;

class NoticeModel extends Model
{
	protected $_auto = array(
		array('addtime', 'time', 1, 'function'),
		
	);
}