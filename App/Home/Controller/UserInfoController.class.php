<?php
namespace Home\Controller;
use Think\Controller;

class UserInfoController extends Controller
{
	protected $edu = array("1"=>"中专以下学历","2"=>"中专","3"=>"大专","4"=>"本科","5"=>"硕士","6"=>"博士","7"=>"博士后");
	protected $marry = array("1"=>"单身","2"=>"已婚","3"=>"离异","4"=>"丧偶");
	protected $salary = array("1"=>"2000以下","2"=>"2000-5000元","3"=>"5000-10000元","4"=>"10000-20000元","5"=>"20000元以上","6"=>"保密");
	
	
	/**
	 * 查询单个用户常用账号信息和参数信息
	 * @param $id  String 需要查询的用户id
	 * @param $paramFields  String 自定义需要查询的用户参数字串
	 * return 返回用户信息数组  
	 */
	protected function getUserParams($id,$paramFields){
		
		$user = D('User')->scope('normal')->find($id);
		
		if(isset($paramFields)){
			$param = D("User_params")->field($paramFields)->where("userid=".$id)->find();//如果自定义的字段存在，则查询自定义的字段信息
		}else{
			$param = D("User_params")->scope('normal')->where("userid=".$id)->find();
		}
		
		if(!empty($param['provinceid'])){
			$param['provinceid'] = M("District")->where("id=".$param['provinceid'])->getField("name");
		}
		if(!empty($param['cityid'])){
			$param['cityid'] = M("District")->where("id=".$param['cityid'])->getField("name");
		}
		if(!empty($param['marrystatus'])){
			$param['marrystatus'] = $this->marry[$param['marrystatus']];
		}
		if(!empty($param['education'])){
			$param['education'] = $this->edu[$param['education']];
		}
		if(!empty($param['salary'])){
			$param['salary'] = $this->salary[$param['salary']];
		}
		
		if($param['gender']==1){
			if($user['avatar']==null){
				$user['avatar'] = "male.gif";
			}
			$param['gender'] = '男';
		}else{
			if($user['avatar']==null){
				$user['avatar'] = "female.gif";
			}
			$param['gender'] = '女';
		}
		foreach($param as $key=>$value){
			$user[$key] = $value;
		}
		return $user;
	}
	
}