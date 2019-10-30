<?php
namespace Home\Model;

use Think\Model;

class UserParamsModel extends Model
{	
	protected $_scope = array(
		'normal'=>array(
			'field'=>'gender,marrystatus,education,salary,age,height,provinceid,cityid',
		),
	);
	
}
