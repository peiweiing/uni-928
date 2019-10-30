<?php

namespace Admin\Controller;

class SystemMessageController extends CommonController
{

	public function _tigger_list(&$list) {
		
		foreach($list as &$v) {
			$sta = D('User')->field(array('username'))->find($v['userid']);
			$v['username'] = $sta['username'];
		}
		$this->assign('msg', array('已读', '未读'));
	}
   
    public function add() {
        $this->display('SystemMessage/add');
    }

    public function insert() {
        //dump($_POST);
        
        //初始条件
        $send = array(
            'u.id=up.userid',
        );
        
        //性别
        if($_POST['gender']) {
            $send[] = "up.gender={$_POST['gender']}";
        }
        //开始年龄段
        if($_POST['startAge']) {
            $send['startAge'] = "up.age > {$_POST['startAge']}";
        }
        //结束年龄段
        if($_POST['endAge']) {
            $send['endAge'] = "up.age < {$_POST['endAge']}";
        }
        //年龄段
        if($_POST['startAge'] && $_POST['endAge']) {
            $send['startAge'] = "up.age > {$_POST['startAge']}";
            $send['endAge'] = "up.age < {$_POST['endAge']}";
        }
        //多少天之内注册过的会员
        if($_POST['regTime'] && ($_POST['regRange'] == 'in')) {
            $send['regTime'] = "u.regtime > ".(time() - ($_POST['regTime'] * 24 * 3600));
        }
        //多少天之前注册过的会员
        if($_POST['regTime'] && ($_POST['regRange'] == 'out')) {
            $send['regTime'] = "u.regtime < ".(time() - ($_POST['regTime'] * 24 * 3600));
        }
        //多少天之内登录过的会员
        if($_POST['loginTime'] && ($_POST['loginRange'] == 'in')) {
            $send['loginTime'] = "u.logintime > ".(time() - ($_POST['loginTime'] * 24 * 3600));
        }
        //多少天之内登录过的会员
        if($_POST['loginTime'] && ($_POST['loginRange'] == 'out')) {
            $send['loginTime'] = "u.logintime < ".(time() - ($_POST['loginTime'] * 24 * 3600));
        }
        //城市
        if($_POST['provinceid']) {
            $send['provinceid'] = "up.provinceid={$_POST['provinceid']}";
        }
        if(count($send) > 0) {
            $sendList = ' where '.implode(' and ', $send);
        }
        $sql = "select u.id from yyw_user u,yyw_user_params up {$sendList}";
        //dump($sql);
        $ids = M()->query($sql);
        //找出他们的id
        $mod = D("SystemMessage");
        foreach($ids as $idItem) {
            if(!$mod->create()) {
                echo $this->error($mod->getError());
                exit();
            }
            $data = array();
            $data['userid'] = $idItem['id'];
            $data['title'] = $_POST['title'];
            $data['content'] = $_POST['content'];
            $data['status'] = 1;
            $data['addtime'] = time();
            if(!$mod->data($data)->add()) {
                echo $this->error('发布失败!');
                exit();
            }
        }
        echo $this->success('发布成功!', U('SystemMessage/index'));
    }
    
    public function del() {
        if(D('SystemMessage')->delete($_GET['id'])){
            $this->success('删除成功!', U('index'));
        }else{
            $this->error('删除失败!');
        }
    }
}
