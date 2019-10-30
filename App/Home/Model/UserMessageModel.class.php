<?php
namespace Home\Model;

use Think\Model;

class UserMessageModel extends Model
{
	protected $_auto = array(
		array('addtime','time',1,'function'),
	);
	
}
