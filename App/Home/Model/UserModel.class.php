<?php

namespace Home\Model;
use Think\Model;

class UserModel extends Model
{
	protected $_scope = array(
		'normal'=>array(
			'field'=>'id,username,avatar',
			'order'=>'regtime desc',
		)
	);
    protected $_validate = array(
        array('username', '', "账号已经存在!", 0, 'unique', 1),
        array('confirmpassword', 'password', '确认密码不正确', 0, 'confirm'),
        array('password', '/^[\@A-Za-z0-9\!\#\$\%\^\&\*\.\~]{6,16}$/', '密码格式不正确!', 0),
        array('email', '/^[_.0-9a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,3}$/', '邮箱格式不正确!', 0),
    );
    
    protected $_auto = array(
        //array('password', 'md5', 3, 'function'),
        array('regtime', 'time', 1, 'function'),
        array('logintime', 'time', 1, 'function'),
        array('loginviews', '1'),
    );

    
}
