<?php
namespace Home\Controller;

class DiaryCommentController extends CommonController
{
	//个人中心显示日记
	public function index(){
		$comment = D("DiaryComment")->where('diaryid='.$_POST['diaryid'])->select();
		for($i=0;$i<count($comment);$i++){
			$comment[$i]['username'] = D('User')->where('id='.$comment[$i]['cmuserid'])->getField('username');
			$comment[$i]['cmtime'] = date("Y-m-d H:i:s",$comment[$i]['cmtime']);
		}
		for($j=0;$j<count($comment);$j++){
			$comment[$j]['reply'] = D("DiaryReply")->where('comid='.$comment[$j]['id'])->select();
			for($k=0;$k<count($comment[$j]['reply']);$k++){
				if($comment[$j]['reply']!==null){
					$comment[$j]['reply'][$k]['fromusername'] = D('User')->where('id='.$comment[$j]['reply'][$k]['cmuserid'])->getField('username');
					$comment[$j]['reply'][$k]['tousername'] = D('User')->where('id='.$comment[$j]['reply'][$k]['touserid'])->getField('username');
					$comment[$j]['reply'][$k]['addtime'] = date("Y-m-d H:i:s",$comment[$j]['reply'][$k]['addtime']);
				}
			}
		}
		echo json_encode($comment);
		exit();
	}
	//执行添加评论
	public function add(){
		$mod = D("DiaryComment");
		$_POST['cmuserid'] = session('user')['id'];
		if(!$mod->create($_POST)){
			$this->error($mod->getError());
		}
		if($mod->add()){
			$id = $mod->getLastInsId();
			$info = D("DiaryComment")->find($id);
			$info['username'] = D("User")->where("id=".$info['cmuserid'])->getField("username");
			$info['cmtime'] = date("Y-m-d H:i:s",$info['cmtime']);
			echo json_encode($info);
			exit();
		}else{
			echo json_encode('false');
			exit();
		}
	}
	
	//执行用户的评论的删除
	Public function del(){
		$type = $_POST['type'];
		$id = $_POST['id'];

		if($type=='reply_con'){
			$res = M('DiaryReply')->delete($id);
			if($res){
				echo json_encode('true');  
				exit();
			}else{
				echo json_encode('false');
				exit();
			}
		}elseif($type=='comment_con'){
			$res = M('DiaryComment')->where('id='.$id)->delete();
			if($res){
				$result = M('DiaryReply')->where('comid='.$id)->delete();
				echo json_encode('true');
				exit();
			}else{
				echo json_encode('false');
				exit();
			}
		}
		
		
	}
	//检查验证码
	public function checkCode(){
		$res = $this->check_verify($_POST['code']);
		if($res==false){
			echo json_encode('false');
			exit();
		}else{
			echo json_encode('true');
			exit();
		}
		
	}
	
	private function check_verify($code, $id = ''){    
		$verify = new \Think\Verify();   
		return $verify->check($code, $id);
	}
}