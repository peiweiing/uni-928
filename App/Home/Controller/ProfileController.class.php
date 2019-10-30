<?php
namespace Home\Controller;

class ProfileController extends CommonController
{
	//==================================浏览详细资料================================
	public function index(){

		$mod = M("user_params");
		$user = session("user");//获取session值
		$data = $mod->where("userid=".$user['id'])->find();//查询当前用户的一条资料信息
		//设置学历资料
		$education=array(1=>"中专以下学历",2=>"中专",3=>"大专",4=>"本科",5=>"硕士",6=>"博士",7=>"博士后");
		$this->assign("education",$education[$data['education']]);
		
		$profile = M("profile");
		$info = $profile->where("userid=".$user['id'])->find();//获取当前用户更改的资料
		$shiye = array(0=>"=请选择=",1=>"政府机关",2=>"事业单位",3=>"外企企业",4=>"世界500强",5=>"上市公司",6=>"国有企业",7=>"私有企业",8=>"自有公司");
		$shouru = array(0=>"=请选择=",1=>"福利优越",2=>"奖金丰厚",3=>"事业稳定上升",4=>"事业刚起步",5=>"投资高回报");
		$gongzuo = array(0=>"=请选择=",1=>"轻松稳定",2=>"朝九晚五",3=>"偶尔加班",4=>"经常加班",5=>"偶尔出差",6=>"经常出差",7=>"经常有应酬",8=>"工作时间自由");
		$zhuanye = array(0=>"=请选择=",1=>"计算机类",2=>"电子信息类",3=>"中文类",4=>"外文类",5=>"经济学类",6=>"金融学类",7=>"管理类",8=>"市场营销类",9=>"法学类",10=>"教育类",11=>"社会学类",12=>"历史类",13=>"哲学类",14=>"艺术类",15=>"图书馆类",16=>"情报档案类",17=>"政治类",18=>"数学类",
				19=>"统计类",20=>"物理类",21=>"化学类",22=>"生物类",23=>"食品类",24=>"医学类",25=>"环境类",26=>"地理类",27=>"建筑类",28=>"测绘类",29=>"电气类",30=>"机械类",31=>"其他类");
		$paihang = array(0=>"=请选择=",1=>"独生子女",2=>"老大",3=>"老二",4=>"老三",5=>"老四",6=>"老五及更小",7=>"老幺");
		$xiaofei = array(0=>"=请选择=",1=>"美食",2=>"服装",3=>"娱乐",4=>"出行",5=>"交友",6=>"文化",7=>"教育",8=>"其他");
		$zongjiao = array(0=>"=请选择=",1=>"无宗教信仰",2=>"大乘佛教显宗",3=>"大乘佛教密宗",4=>"小乘佛教",5=>"道教",6=>"儒教",7=>"基督教天主教派",8=>"基督教东正教派",
				9=>"基督教新教派",10=>"犹太教",11=>"伊斯兰教什叶派",12=>"伊斯兰教逊尼派",13=>"印度教",14=>"神道教",15=>"萨满教",16=>"其他宗教信仰");
		
		$language = unserialize($info['language']);
		$lifeskill = unserialize($info['lifeskill']);
		$sports = unserialize($info['sports']);
		$food = unserialize($info['food']);
		$book = unserialize($info['book']);
		$film = unserialize($info['film']);
		$interest = unserialize($info['interest']);
		$travel = unserialize($info['travel']);
		$attention = unserialize($info['attention']);
		$leisure = unserialize($info['leisure']);

		$this->assign("language",$language);
		$this->assign("lifeskill",$lifeskill);
		$this->assign("sports",$sports);
		$this->assign("food",$food);
		$this->assign("book",$book);
		$this->assign("film",$film);
		$this->assign("interest",$interest);
		$this->assign("travel",$travel);
		$this->assign("attention",$attention);
		$this->assign("leisure",$leisure);
		//添加到模板
		$this->assign("shouru",$shouru);
		$this->assign("shiye",$shiye);
		$this->assign("gongzuo",$gongzuo);
		$this->assign("zhuanye",$zhuanye);
		$this->assign("paihang",$paihang);
		$this->assign("xiaofei",$xiaofei);
		$this->assign("zongjiao",$zongjiao);
		$this->assign("companyname",$info['companyname']);
		$this->assign("school",$info['school']);
		$this->assign("schoolyear",$info['schoolyear']);
		$this->assign("info",$info);
		$this->display("index");
	}
	//==================================修改详细资料================================
	public function update(){
		//获取详细资料操作对象
		$profile = M("profile");
		//获取session的值
		$user = session("user");
		//将传来的值添加到数据库
		$data['companyname'] = $_POST['companyname'];
		$data['school'] = $_POST['school'];
		$data['schoolyear'] = $_POST['schoolyear'];
		$data['language'] = serialize($_POST['language']);
		$data['lifeskill'] = serialize($_POST['lifeskill']);
		$data['sports'] = serialize($_POST['sports']);
		$data['food'] = serialize($_POST['food']);
		$data['book'] = serialize($_POST['book']);
		$data['film'] = serialize($_POST['film']);
		$data['interest'] = serialize($_POST['interest']);
		$data['travel'] = serialize($_POST['travel']);
		$data['attention'] = serialize($_POST['attention']);
		$data['leisure'] = serialize($_POST['leisure']);
		$data['companytype'] = $_POST['companytype'];
		$data['income'] = $_POST['income'];
		$data['workstatus'] = $_POST['workstatus'];
		$data['specialty'] = $_POST['specialty'];
		$data['tophome'] = $_POST['tophome'];
		$data['consume'] = $_POST['consume'];
		$data['smoking'] = $_POST['smoking'];
		$data['drinking'] = $_POST['drinking'];
		$data['faith'] = $_POST['faith'];
		$data['workout'] = $_POST['workout'];
		$data['rest'] = $_POST['rest'];
		$data['havechildren'] = $_POST['havechildren'];
		$data['talive'] = $_POST['talive'];
		$data['romantic'] = $_POST['romantic'];
		$data['userid'] = $user['id'];
		$pro = M('profile')->where("userid=".$user['id'])->field('userid')->find();
		
	 	if(empty($pro)){
			$s = M('profile')->add($data);
			$this->assign("sysCall","添加成功！");
			$this->assign("sysUrl",$_SERVER['HTTP_REFERER']);
			$this->display("Login/loginInfo");
		}else{
			$d = M('profile')->where("userid=".$user['id'])->save($data);
			$this->assign("sysCall","修改成功！");
			$this->assign("sysUrl",$_SERVER['HTTP_REFERER']);
			$this->display("Login/loginInfo");
		}
	}
}