<?php
namespace Home\Controller;

class PhotoController extends CommonController
{
	//加载上传页面****************************************************************************//
	public function index(){
		$this->display("index");
	}
	
	//裁剪方法********************************************************************************//
	public function cut(){
		$this->display("cut");
	}
	//上传方法********************************************************************************//
	public function upload(){

		$upload = new \Think\Upload();// 实例化上传类 
		$upload->maxSize = 3145728 ;// 设置附件上传大小
		$upload->exts = array('jpg', 'gif', 'png', 'jpeg');//设置附件上传类型
		$upload->rootPath = './Public/';// 设置附件上传目录 
		$upload->savePath = 'Uploads/pic/';// 设置附件上传目录
		$upload->autoSub = false; //关闭子目录生成
		//$upload->subName  =  array('date', 'Y-m-d'), //子目录生成规则
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
			// 在图片左上角添加水印（水印文件位于Public/images/logo.gif）
			$img->open("./Public/".$file['savepath'].$file['savename'])->water('Public/images/logo.gif',\Think\Image::IMAGE_WATER_SOUTHEAST,50); 
			// 保存到指定的名称地址
			$img->save("./Public/".$file['savepath'].$file['savename']);
                                                      
			//发送上传图片
			$this->assign("pic",$file['savename']);	
			//加载裁剪页
			$this->cut();		
		}	
	}
	/******************************************************************************************/
	//设置形象照片方法
	public function uploadcut($id){
			
		$info = M("user_photo_album");
		
		$array= $info->where("id=".$id)->select();

		$file = $array[0]['uploadimage'];

		//生产缩略图
		$img = new \Think\Image(); 
		// 在图片左上角添加水印（水印文件位于Public/images/logo.gif）
		$img->open("Public/Uploads/pic/".$file)->water('Public/images/logo.gif',\Think\Image::IMAGE_WATER_SOUTHEAST,50); 
		// 保存到指定的名称地址
		$pic = $img->save("Public/Uploads/pic/".$file);
	
		//发送上传图片
		$this->assign("pic",$file);
		//加载裁剪页

		$this->cut();
	}	
	//加载裁剪图片与坐标
	public function doCrop(){  
		$picname = $_POST['picname'];
              
		$cx = $_POST['cx'];
		$cy = $_POST['cy'];
		$cw = $_POST['cw'];
		$ch = $_POST['ch'];
		$image = new \Think\Image();
		$image->open('./Public/Uploads/pic/'.$picname);
		$image->thumb(300,300)->crop($cw,$ch,$cx,$cy)->save('./Public/Uploads/pic/'.$picname);

		//创建user对象
		$user = M("user");
		//为avatar字段赋值
		$avatar['avatar']=$picname;
		//获取当前session中的值
		$person = session("user");
		//提取当前用户id
		$userid= $person['id'];
		//更新头像到用户数据
		$res = $user->where("id=".$userid)->save($avatar);
              
		if($res){
			$mod = M("user_params");
			$ava['avatar'] = 1;
			$mod->where("userid=".$userid)->save($ava);
		}
	}
	//设置头像
	public function set(){
		$user = M("user");
		$person = session("user");
		$userid = $person['id'];
		$pic = $user->where("id=".$userid)->find();
		$_SESSION['user']['avatar'] = $pic['avatar'];
		$this->assign("pic",$pic['avatar']);
		$this->assign("gender",$person['gender']);
		$this->display("index");
	}
	//删除头像
	public function del(){
		$user = M("user");
		$person = session("user");
		$userid = $person['id'];
		$userparams = M("user_params");
		$data['avatar']=null;	
		
		$res = $user->where("id=".$userid)->save($data);
		if($res){
			//如果清除头像成功，将头像状态改为0
			$avatar['avatar'] = 0;
			$userparams->where("userid=".$userid)->save($avatar);
			$this->assign("sysCall","删除成功！");
			$this->assign("sysUrl",$_SERVER['HTTP_REFERER']);
			$this->display("Login/loginInfo");
		}else{
			$this->assign("errorInfo","删除失败！");
			$this->display("Login/systemInfo");
		}
	}
}
