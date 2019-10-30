<?php
namespace Home\Controller;

class PhotoAlbumController extends CommonController
{
	//浏览方法
	public function index(){
		//创建对象
		$image = M("user_photo_album");
		$user = session("user");
		$userid = $user['id'];	

		$total = $image->where("userid=".$userid)->count();
		
		//创建分页对象
		$page  = new \Think\Page($total,4);

		//获取所有礼物信息
		$list = $image->where("userid=".$userid)->order("id desc")->limit($page->firstRow,$page->listRows)->select();

		//放置到模板中
		$this->assign("list",$list);
		$this->assign("image",json_encode($total));
		$this->assign("pageinfo",$page->show());//将分页信息放置到模板中			
		
		//载入相册浏览模板
		$this->display("index");
	}
	
	//删除方法
	public function del($id){
		$mod = M("user_photo_album");
		$res = $mod->where("id=".$id)->delete();
		//判断是否成功
		if($res){
			$this->assign("sysCall","删除成功！");
			$this->assign("sysUrl",$_SERVER['HTTP_REFERER']);
			$this->display("Login/loginInfo");
		}else{
			$this->assign("errorInfo","删除失败！");
			$this->display("Login/systemInfo");
		}
	}
	//编辑方法
	public function edit(){
		$id = $_POST['id'];	
		$info = M("user_photo_album");
		$info->where("userid=".$id)->setInc("views");
		
		$views = $info->where("id=".$id)->find();

		$views['addtime'] = date('Y-m-d',$views['addtime']);
		echo json_encode($views);
	}
	//编辑描述信息
	public function info($id){
		//获取修改描述信息
		$info['info'] = $_POST['info'];

		$mod = M("user_photo_album")->where("id=".$id)->save($info);
		if($mod){
			$this->assign("sysCall","修改成功！");
			$this->assign("sysUrl",$_SERVER['HTTP_REFERER']);
			$this->display("Login/loginInfo");
		}else{
			$this->assign("sysCall","修改失败！");
			$this->assign("sysUrl",$_SERVER['HTTP_REFERER']);
			$this->display("Login/loginInfo");
		}
	}
	//上传图片
	public function upload(){

		$upload = new \Think\Upload();// 实例化上传类 
		$upload->maxSize = 3145728 ;// 设置附件上传大小
		$upload->exts = array('jpg', 'gif', 'png', 'jpeg');//设置附件上传类型
		$upload->rootPath = './Public/';// 设置附件上传目录 
		$upload->savePath = './Uploads/pic/';// 设置附件上传目录
		$upload->autoSub = false; //关闭子目录生成

		// 上传文件
		$info = $upload->upload();
		if(!$info){
			// 上传错误提示错误信息
			$this->error($upload->getError());
		}else{
			$file = $info['pic']; //获取当前文件的上传信息
			$pic = __ROOT__."/Public/".$file['savepath'].$file['savename'];
			
			//生产缩略图
			$img = new \Think\Image(); 
			$img->open("./Public/".$file['savepath'].$file['savename']);
			$img->thumb(300,300)->save("./Public/".$file['savepath'].'c_'.$file['savename']);
			$img->thumb(300,300)->save("./Public/".$file['savepath'].'z_'.$file['savename']);
			
			//创建表单对象
			$album = M("user_photo_album");
			//接收表单数据
			$user = session("user");
			$data['userid'] = $user['id'];
			$data['info'] = $_POST['info'];
			$data['uploadimage'] = $file['savename'];
			$data['addtime'] = time();
			$res = $album->add($data);//写入数据库
			//判断是否成功
			if($res){
				$this->assign("sysCall","添加成功！");
				$this->assign("sysUrl",U("PhotoAlbum/index"));
				$this->display("Login/loginInfo");
			}else{
				$this->assign("errorInfo","添加失败！");
				$this->display("Login/systemInfo");
			}
		}	
	}
}