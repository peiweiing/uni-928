<?php
namespace Home\Controller;

class DiaryReplyController extends CommonController
{
	public function add(){
		$mod = M('DiaryReply');
		$_POST['cmuserid'] = session('user')['id'];
		$_POST['addtime'] = time();
		
		$mod->create($_POST,1);
		if($mod->add()){
			$info = $mod->find($mod->getLastInsID());
			$info['fromusername'] = D("User")->where("id=".$info['cmuserid'])->getField("username");
			$info['tousername'] = D("User")->where("id=".$info['touserid'])->getField("username");
			echo json_encode($info);
		}else{
			echo json_encode('false');
		}
	}
	
	public function select(){
		$_POST['cmuserid'] = session('user')['id'];
		if($_POST['cmuserid']==$_POST['touserid']){
			echo json_encode('false');
		}else{
			echo json_encode('true');
		}
	}
}