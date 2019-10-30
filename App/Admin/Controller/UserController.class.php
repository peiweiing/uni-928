<?php

namespace Admin\Controller;

class UserController extends CommonController
{

    //查询用户列表
/*   
   public function index() {
		parent::index();
        //$sql = "select u.*,up.lovestatus from yyw_user u,yyw_user_params up where u.id=up.userid";
        //$list = M()->query($sql);
		$sta = array();
        $list = D('User')->select();
		foreach($list as &$v) {
			$sta = D('UserParams')->field(array('lovestatus', 'gender'))->where('userid='.$v['id'])->find();
			$v['lovestatus'] = $sta['lovestatus'];
			$v['gender'] = $sta['gender'];
			
		}
		
        $this->assign('sta', array('管理员', '启用', '禁用'));
        $this->assign('loveSta', array('关闭征友', '征友进行时'));
        $this->assign("list", $list);
		
        $this->display("User/index");
    }
	*/
	//数据加工
	public function _tigger_list(&$list) {
		foreach($list as &$v) {
			$sta = D('UserParams')->field(array('lovestatus', 'gender'))->where('userid='.$v['id'])->find();
			$v['lovestatus'] = $sta['lovestatus'];
			$v['gender'] = $sta['gender'];

		}
		$this->assign('sta', array('管理员', '启用', '禁用'));
        $this->assign('loveSta', array('关闭征友', '征友进行时'));
	}
    
	
	public function insert() {
		$mod = D('User');
		if(!$mod->create()) {
			$this->error($mod->getError());
		}
		$data = array();
		$data['username'] = $_POST['username'];
		$data['email'] = $_POST['email'];
		$data['password'] = md5($_POST['password']);
		$data['status'] = 0;
		$data['points'] = 0;
		if($mod->data($data)->add()) {
			$this->success('添加成功!', U('index'));
		}else{
			$this->error('添加失败!');
		}
	}
	
	
    //获取修改用户表单界面
    public function edit($act='') {
        // @param $act  根据参数选择修改用户信息还是修改用户密码
        
        if(!$act){
			$sql = "select u.id,u.username,u.email,u.points,u.avatar,u.status,u.emailstatus,up.lovestatus from yyw_user u,yyw_user_params up where u.id=up.userid and u.id=".$_GET['id'];
			
			$res = M()->query($sql);
			//dump($res[0]);
            $this->assign('find', $res[0]);
			
            $this->display('User/editInfo');
        }else{
            $res = D('User')->field('username')->find($_GED['id']);
            $this->assign('findUserName', $res);
            $this->display('User/editPass');
        }
    }
    
    //接收用户信息更改到数据库中
    public function update() {
		//判断是否修改了形象照(上传图片)
		//exit();
		$mod = D('User');
		if(!$mod->create() && !D('UserParams')->create()){
			echo $this->error($mod->getError());
			exit();
		}
		
		//echo $this->success($_FILES['pic']['name']);
		
		$res = D('UserParams')->where('userid='.$_POST['id'])->find();
		$user = array();
		$uparams = array();
		
		$user['id'] = $_POST['id'];
		$user['status'] = $_POST['status'];
		$user['email'] = $_POST['email'];
		$user['points'] = $_POST['points'];
		
		if($_POST['active'] == 'increase') {
			$user['points'] = $_POST['points'] + $_POST['updatePoints'];
		}else{
			$user['points'] = $_POST['points'] - $_POST['updatePoints'];
		}
		
		$uparams['id'] = $res['id'];
		$uparams['lovestatus'] = $_POST['lovestatus'];

		if($_FILES['pic']['error'] == 4){
			//没有编辑图片直接修改信息
			
			//修改某一个(傻傻不分前后) 修改两个
			$userRes = $mod->data($user)->save();
			$uparamsRes = D('UserParams')->data($uparams)->save();
			$itag = ( $userRes && $uparamsRes) || ( $userRes || $uparamsRes );
			
			if($itag) {
				echo $this->success('修改成功!', U('index'));
			}else{
				echo $this->error('修改失败!');
			}
        }else{
            //有图片上传 执行上传 判断是否上传成功 如果成功裁剪
                //执行信息修改    如果信息修改成功则删除旧图片 否则删除新上传的图片
			$upload = new \Think\Upload();// 实例化上传类 
			$upload->maxSize = 3145728 ;// 设置附件上传大小
			$upload->exts = array('jpg', 'gif', 'png', 'jpeg');//设置附件上传类型
			$upload->rootPath = './Public/';// 设置附件上传根目录 
			$upload->savePath = './Uploads/pic/';// 设置附件上传目录
			$upload->autoSub = false; //关闭子目录生成
			
            $info = $upload->upload();
            if(!$info){
                echo $this->error($upload->getError());
            }else{
                //上传图片成功
                $file = $info['pic'];
                //裁剪
                $img = new \Think\Image();
                $img->open("./Public/".$file['savepath'].$file['savename']);
                $img->thumb(300, 300)->save("./Public/".$file['savepath'].$file['savename']);
                
                $user['avatar'] = $file['savename'];

                //找到原来的图片名
                $unlinkFile = $mod->field(array('avatar'))->find($_POST['id']);

				//修改某一个(傻傻不分前后) 修改两个
				$userRes = $mod->data($user)->save();
				$uparamsRes = D('UserParams')->data($uparams)->save();
				$itag = ( $userRes && $uparamsRes) || ( $userRes || $uparamsRes );
				
				if($itag) {
					unlink($upload->rootPath.ltrim($upload->savePath, './').$unlinkFile['avatar']);
                    echo $this->success('修改成功!', U('index'));
				}else{
					unlink($upload->rootPath.$upload->savePath.$file['savename']);
					echo $this->error('修改失败!');
				}
            }
        }
		
    }
    
    //处理删除指定用户的操作
    public function del() {
        if(M('User')->delete($_GET['id'])){
            echo $this->success('删除成功！', U('User/index'));
        }else{
            echo $this->error('删除失败！');
        }
    }
    
}
