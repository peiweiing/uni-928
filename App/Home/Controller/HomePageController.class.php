<?php
namespace Home\Controller;
use Think\Controller;
class HomePageController extends Controller
{
	public function index($id){
		$mod = M("user_params");
		$user = session("user");
		
		$this->assign("logid",$user['id']);
		$this->assign("lookid",json_encode($user['id']));
		$userinfo = $mod->where("userid=".$id)->find();

		$marry = array(1=>"单身",2=>"已婚",3=>"离异",4=>"丧偶");
		$this->assign("marrystatus",$marry[$userinfo['marrystatus']]);
		$zodiac = $userinfo['ageyear'];
		$birthday = $userinfo['agemonth'].".".$userinfo['ageday'];
		$this->assign("birthday",$birthday);
		//对用户年份取余
		$yu = $zodiac%12;
		//============================生肖===================================
		$shuxing = array(0=>'猴',1=>'鸡',2=>'狗',3=>'猪',4=>'鼠',5=>'牛',6=>'虎',7=>'兔',8=>'龙',9=>'蛇',10=>'马',11=>'羊');
		
		$this->assign("shuxing",$shuxing[$yu]);
		
		//设置内心独白
		$con = M("contact_information");
		$info = $con->where("userid=".$user['id'])->find();
		$this->assign("monologue",$info['monologue']);
		//联系资料
		$this->assign("con",$info);

		
		//设置学历资料
		$education=array(1=>"中专以下学历",2=>"中专",3=>"大专",4=>"本科",5=>"硕士",6=>"博士",7=>"博士后");
		$this->assign("education",$education[$userinfo['education']]);
		
		$this->assign("userinfo",$userinfo);
		//详细资料
		$profile = M("profile");

		$info = $profile->where("userid=".$id)->find();
		$hejiu = array(1=>'不喝',2=>'社交需要时喝',3=>'有兴致时喝',4=>'每天都离不开酒');
		$chouyan = array(1=>'吸，很反感吸烟',2=>'不吸，但不反感',3=>'社交时偶尔吸',4=>'每周吸几次',5=>'每天都吸',6=>'有烟瘾');
		$paihang = array(0=>"未透露",1=>"独生子女",2=>"老大",3=>"老二",4=>"老三",5=>"老四",6=>"老五及更小",7=>"老幺");
		$xiaofei = array(0=>"未透露",1=>"美食",2=>"服装",3=>"娱乐",4=>"出行",5=>"交友",6=>"文化",7=>"教育",8=>"其他");
		$zongjiao = array(0=>"未透露",1=>"无宗教信仰",2=>"大乘佛教显宗",3=>"大乘佛教密宗",4=>"小乘佛教",5=>"道教",6=>"儒教",7=>"基督教天主教派",8=>"基督教东正教派",
					9=>"基督教新教派",10=>"犹太教",11=>"伊斯兰教什叶派",12=>"伊斯兰教逊尼派",13=>"印度教",14=>"神道教",15=>"萨满教",16=>"其他宗教信仰");
		$duanlian = array(0=>"未透露",1=>"每天锻炼",2=>"每周至少一次",3=>"每月几次",4=>"没时间锻炼",5=>"集中时间锻炼",6=>"不喜欢锻炼");
		$zuoxi = array(0=>"未透露",1=>"早睡早起很规律",2=>"经常夜猫子",3=>"总是早起鸟",4=>"偶尔懒散一下",5=>"没有规律");
		$haizi = array(0=>"未透露",1=>"愿意",2=>"不愿意",3=>"视情况而定");
		$langman = array(0=>"未透露",1=>"经常",2=>"偶尔",3=>"视情况而定",4=>"从不",5=>"不喜欢");	
		$jineng = array(0=>"未透露",1=>"现实个人目标",2=>"维护朋友圈关系",3=>"装修房屋",4=>"志愿者/义工",5=>"热衷电脑",6=>"保持生活条律",7=>"理财",8=>"在家款待朋友",
					9=>"抚养或照顾孩子",10=>"制造浪漫",11=>"社交活动",12=>"谈生意",13=>"保持健康",14=>"解决冲突",15=>"博闻强识",16=>"对自我长期规划",17=>'在简单中寻求快乐与满足',18=>'文化和艺术',19=>'结交新朋友',20=>'烹饪',21=>'赚钱养家',22=>'保养、修理汽车',23=>'做别人的好朋友和好同事',24=>'其他');
		$sport = array(0=>"未透露",1=>"足球",2=>"篮球",3=>"排球",4=>"网球",5=>"羽毛球",6=>"乒乓球",7=>"壁球",8=>"保龄球",
					9=>"手球",10=>"橄榄球",11=>"棒球",12=>"高尔夫",13=>"健身",14=>"跑步",15=>"自行车",16=>"摩托车",17=>'汽车',18=>'舞蹈',19=>'体操',20=>'跆拳道',21=>'柔道',22=>'空手道',23=>'游泳',24=>'潜水',25=>'水上运动',26=>'航海',27=>'滑雪/滑冰',28=>'拳击',29=>'钓鱼',30=>'瑜伽',31=>'武术',32=>'其它',33=>'不喜欢运动');
		$food = array(0=>"未透露",1=>"中国菜",2=>"印度菜",3=>"泰国菜",4=>"法国菜",5=>"意大利菜",6=>"俄罗斯菜",7=>"日本菜",8=>"烧烤",
					9=>"健康食品",10=>"素食",11=>"快餐",12=>"巧克力和甜品",13=>"其他",14=>"无特别爱好");
		$book = array(0=>"未透露",1=>"校园青春",2=>"文学",3=>"艺术与摄影",4=>"励志与成功",5=>"动漫与幽默",6=>"政治与军事",7=>"哲学与宗教",8=>"历史传记",
					9=>"运动健身",10=>"健康与养生",11=>"烹饪与饮食",12=>"旅游",13=>"投资理财",14=>"婚恋与家庭",15=>"期刊杂志",16=>"娱乐时尚",17=>'人文社科',18=>'自然科学',19=>'收藏与鉴赏',20=>'其他',21=>'什么都看');
		$film = array(0=>"未透露",1=>"爱情",2=>"喜剧",3=>"动作冒险",4=>"古装武侠",5=>"科幻魔幻",6=>"悬疑推理",7=>"惊悚恐怖",8=>"动画",
					9=>"战争",10=>"音乐歌舞",11=>"纪录片",12=>"剧情",13=>"西部",14=>"历史传记",15=>"其他",16=>"什么都看");
		$interest = array(0=>"未透露",1=>"网络",2=>"汽车",3=>"动物",4=>"摄影",5=>"影视",6=>"音乐",7=>"写作",8=>"购物",
					9=>"手工艺",10=>"园艺",11=>"舞蹈",12=>"展览",13=>"烹饪",14=>"读书",15=>"绘画",16=>"计算机",17=>'体育运动',18=>'旅游',19=>'电子游戏',20=>'其他');
		$travel = array(0=>"未透露",1=>"惬意海岛",2=>"名山古刹",3=>"繁华都市",4=>"风情名城",5=>"广袤森林",6=>"高原雪域",7=>"秀美山水",8=>"历史遗迹",
					9=>"江河大川",10=>"峻秀峡谷",11=>"小桥流水人家",12=>"其他选择",13=>"还没想好");
		$attention = array(0=>"未透露",1=>"政治事件",2=>"娱乐八卦",3=>"体育赛事",4=>"理财投资",5=>"相声曲艺",6=>"海选活动",7=>"畅销书",8=>"影视热片",9=>"休闲生活",10=>"行业发展",11=>"其他",12=>"暂无");
		$leisure = array(0=>"未透露",1=>"饭店",2=>"商场",3=>"剧院",4=>"酒吧",5=>"电影院",6=>"音乐会",7=>"迪斯科",8=>"网吧",
					9=>"温泉",10=>"图书馆/书店",11=>"咖啡厅",12=>"游乐场",13=>"卡拉OK",14=>"体育馆",15=>"逛街",16=>"在自己或朋友家里",17=>'其他',18=>'不想说');		
		$yundong = unserialize($info['sports']);
		$shiwu = unserialize($info['food']);
		$shuji = unserialize($info['book']);
		$dianying = unserialize($info['film']);
		$aihao = unserialize($info['interest']);
		$lvyou = unserialize($info['travel']);
		$jiemu = unserialize($info['attention']);
		$yule = unserialize($info['leisure']);
		//遍历运动
		$sp = array();
		foreach($sport as $k=>$v){
			if($yundong[$k] !== null){
				$sp[] = $sport[$yundong[$k]];
			}	
		}
		//遍历食物
		$fo =array();
		foreach($food as $k=>$v){
			if($shiwu[$k] !== null){
				$fo[] = $food[$shiwu[$k]];
			}
		}	
		//遍历书籍
		$bo =array();
		foreach($book as $k=>$v){
			if($shuji[$k] !== null){
				$bo[] = $book[$shuji[$k]];
			}
		}
		//遍历电影
		$fi =array();
		foreach($film as $k=>$v){
			if($dianying[$k] !== null){
				$fi[] = $film[$dianying[$k]];
			}		
		}		
		//遍历兴趣爱好
		$int =array();
		foreach($interest as $k=>$v){
			if($aihao[$k] !== null){
				$int[] = $interest[$aihao[$k]];				
			}
		}	
		//遍历喜欢的旅游
		$tr =array();
		foreach($travel as $k=>$v){
			if($lvyou[$k] !== null){
				$tr[] = $travel[$lvyou[$k]];		
			}
		}		
		//遍历关注的节目
		$at =array();
		foreach($attention as $k=>$v){
			if($jiemu[$k] !== null){
				$at[] = $attention[$jiemu[$k]];		
			}
		}		
		//遍历娱乐
		$le =array();
		foreach($leisure as $k=>$v){
			if($yule[$k] !== null){
				$le[] = $leisure[$yule[$k]];				
			}
		}
		
		$this->assign("sport",$sp);
		$this->assign("food",$fo);
		$this->assign("book",$bo);
		$this->assign("film",$fi);
		$this->assign("interest",$int);
		$this->assign("travel",$tr);
		$this->assign("attention",$at);
		$this->assign("leisure",$le);

		$drinking = $hejiu[$info['drinking']];//是否喝酒
		$smoking = $chouyan[$info['smoking']];//是否抽烟		
		$tophome = $paihang[$info['tophome']];//家中排行		
		$consume = $xiaofei[$info['consume']];//最大消费		
		$faith = $zongjiao[$info['faith']];//宗教信仰		
		$workout = $duanlian[$info['workout']];//锻炼习惯		
		$rest = $zuoxi[$info['rest']];//作息习惯		
		$havechildren = $haizi[$info['havechildren']];//是否要孩子		
		$talive = $haizi[$info['talive']];//是否愿意与父母同住		
		$romantic = $langman[$info['romantic']];//是否愿意与父母同住		
		$lifeskill = array($jineng[$info['lifeskill'][0]],$jineng[$info['lifeskill'][1]],$jineng[$info['lifeskill'][2]],$jineng[$info['lifeskill'][3]],$jineng[$info['lifeskill'][4]]);//生活技能		
		
		$this->assign("drinking",$drinking);
		$this->assign("smoking",$smoking);
		$this->assign("tophome",$tophome);
		$this->assign("consume",$consume);
		$this->assign("faith",$faith);
		$this->assign("workout",$workout);
		$this->assign("rest",$rest);
		$this->assign("havechildren",$havechildren);
		$this->assign("talive",$talive);
		$this->assign("romantic",$romantic);
		$this->assign("lifeskill",$lifeskill);
		
		//修改资料
		$params = M("user_params");
		$logids = $params->where("userid=".$user['id'])->find();
		//判断性别猜下一个感兴趣的人
		if($logids && $logids['gender']==1){
			$nvsheng = $params->where("gender=2")->order("id desc")->select();
			$this->assign("genders",$nvsheng);
		}else{
			$nansheng = $params->where("gender=1")->order("id desc")->select();
			$this->assign("genders",$nansheng);
		}
		
		$userparams = $params->where("userid=".$id)->find();
		$nianxin = array(1=>'2000元以下',2=>'2000~5000元',3=>'5000~10000元',4=>'10000~20000元',5=>'20000元以上');
		$lianai = array(1=>'朋友',2=>'知己',3=>'恋爱',4=>'结婚');
		$xuexing = array(1=>'A型',2=>'B型',3=>'O型',4=>'AB型',5=>'其他');
		$zhufang = array(1=>'暂未购房',2=>'需要时置房',3=>'已购住房',4=>'与人合租',5=>'独自租房',6=>'与父母同住',7=>'住亲朋家',8=>'住单位房');
		$zinv = array(1=>'无小孩',2=>'有,和我住一起',3=>'有,有时和我住一起',4=>'有,不和我住一起');
		
		$salary = $nianxin[$userparams['salary']];//月薪
		$lovesort = $lianai[$userparams['lovesort']];//恋爱类别
		$bloodtype = $xuexing[$userparams['bloodtype']];//血型
		$house = $zhufang[$userparams['house']];//住房情况
		$child = $zinv[$userparams['child']];//是否有子女

		$shi = $userparams['cityid'];
		$sheng = $userparams['provinceid'];
		$dis = M("district");
		$provincial=$dis->where("level=1")->select();
		$city=$dis->where("level=2")->select();
		
		foreach($provincial as $k=>$v){
			if($v['id'] == $sheng){
				$this->assign("sheng",$v['name']);
			}
		}		
		foreach($city as $k=>$v){
			if($v['id'] == $shi){
				$this->assign("shi",$v['name']);
			}
		}		
		
		$this->assign("salary",$salary);
		$this->assign("lovesort",$lovesort);
		$this->assign("bloodtype",$bloodtype);
		$this->assign("house",$house);
		$this->assign("car",$userparams['car']);
		$this->assign("child",$child);

		//用户表
		$users = M("user");
		$usertable = $users->where("id=".$id)->find();

		$this->assign("usertable",$usertable);
		//择友条件
		$sel = M("choose")->where("userid=".$id)->find();

		$weight = unserialize($sel['weight']);
		$education = unserialize($sel['education']);
		$star = unserialize($sel['star']);
		$age = unserialize($sel['age']);
		$hismarriage = unserialize($sel['hismarriage']);
		$type = unserialize($sel['type']);
		$area = unserialize($sel['area']);
		
		$sheng = M("district")->where("id=".$area[0])->find();
		$shi = M("district")->where("id=".$area[1])->find();
		$this->assign("shengs",$sheng);
		$this->assign("shis",$shi);
		
		$hunshi = array(1=>'单身',2=>'已婚',3=>'离异',4=>'丧偶');
		$leibie = array(1=>'朋友',2=>'知己',3=>'恋爱',4=>'结婚');
		$xueli = array(1=>'中专以下学历',2=>'中专',3=>'大专',4=>'本科',5=>'硕士',6=>'博士',7=>'博士后');
		
		$this->assign('id',$id);
		$this->assign('toid',json_encode($id));
		$this->assign("age",$age);
		$this->assign("weight",$weight);
		$this->assign("star",$star);
		$this->assign("education1",$xueli[$education[0]]);
		$this->assign("education2",$xueli[$education[1]]);
		$this->assign("hismarriage1",$hunshi[$hismarriage[0]]);
		$this->assign("hismarriage2",$hunshi[$hismarriage[1]]);
		$this->assign("type1",$leibie[$type[0]]);
		$this->assign("type2",$leibie[$type[1]]);
		$this->assign("sex",$sel['sex']);
		$this->assign("ishead",$sel['ishead']);
		$this->update($id);
		
		//获取礼物信息操作对象
		$mod = M("gifts"); 
		$total = $mod->count(); //获取总数据条数

		//创建分页对象
		$page  = new \Think\Page($total,12);

		//获取所有礼物信息
		$list = $mod->limit($page->firstRow,$page->listRows)->select();

		//放置到模板中
		$this->assign("list",$list);
		$this->assign("pageinfo",$page->show());//将分页信息放置到模板中	
		
		//获取照片数量
		$photo = M("user_photo_album");
		$photonum = $photo->where("userid=".$id)->select();
		$photos = $photo->where("userid=".$id)->order("id desc")->select();
		$this->assign("photonum",count($photonum));		
		$this->assign("photos",$photos);
		$this->assign("image",json_encode($photos));		
		//获取关注人数
		$att = M("attention");
		$attention = $att->where("attenid=".$id)->select();
		$this->assign("att",count($attention));
		//日记数量
		$dia = M("diary");
		$diary = $dia->where("userid=".$id)->select();
		$this->assign("dia",count($diary));		
		//收到的礼物数量
		$gif = M("gift_record");
		$gift = $gif->where("touserid=".$id)->select();
		$this->assign("gif",count($gift));		
		//微播数量
		$wb = M("wbreview");
		$wbreview = $wb->where("uid=".$id)->select();
		$this->assign("wb",count($wbreview));
		//推荐会员
		$userlist = new UserListController();
		$userlist->recommend();
		//关注量
		$by = M("byattention");
		$see = $by->where("uid=".$id)->select();
		$this->assign("see",count($see));
		//访问量
		$m = M("user");
		//setInc用户的访问量加1
		$m->where("id=".$id)->setInc("views");
		$v = $m->where("id=".$id)->find();
		$this->assign("views",$v['views']);
		
		$this->display("index");
	}
	//加载用户信息和礼物
	public function loadpresent(){
		$id = $_POST['id'];
		//获取礼物信息操作对象
		$mod = M("gifts"); 
		$info = $mod->where("giftid=".$id)->find();
		echo json_encode($info);
	}
	//发送礼物
	public function doSend(){
		$mod = M("gift_record");
		$user = session("user");
		
		$gifts = M("gifts"); 
		
		$data['fromuserid'] = $user['id'];//发送礼物用户id
		$data['fromname'] = $user['username'];
		$data['giftid'] = $_POST['id'];	//post过来的礼物id

		$data['touserid'] = $_GET['id'];//get过来的接收礼物者id

		$data['sedtime'] = time();//发送时间
		//礼物信息
		$gifinfo = $gifts->where("giftid=".$_POST['id'])->find();
		$data['giftname'] = $gifinfo['giftname'];
		$data['togiftname'] = $gifinfo['giftname'];
		$data['fromimg'] = $gifinfo['imgurl'];
		$data['toimg'] = $gifinfo['imgurl'];
		$data['points'] = $gifinfo['points'];
		//发送用户信息		
		$userpa = M("user_params");
		$params = $userpa->where("userid=".$user['id'])->find();
		
		$data['fromcity'] = $params['hukou'];//发送者户籍
		$data['fromsex'] = $params['gender'];//发送者性别
		$data['fromage'] = $params['age'];//发送者年龄
		$data['fromstatus'] = $params['marrystatus'];//发送者婚姻状态
		//接收用户信息
		$param = $userpa->where("userid=".$_GET['id'])->find();
		$data['tocity'] = $param['hukou'];//接收者户籍
		$data['tosex'] = $param['gender'];//接收者性别
		$data['toage'] = $param['age'];//接收者年龄
		$data['tostatus'] = $param['marrystatus'];//接收者婚姻状态	
		//接收用户名称
		$users = M("user");
		$tousers = $users->where("id=".$_GET['id'])->find();
		$data['tousername'] = $tousers['username'];

		$info = $mod->data($data)->add();

		//登陆者信息查询
		$loginusers = $users->where("id=".$user['id'])->find();

		//判断是否添加成功
		if(!$info) {
			// 错误提示信息
			echo "<script>window.parent.doreturn('false');</script>"; 
		}elseif($loginusers['points']<$gifinfo['points']){	//用户积分不足时返回信息
			echo "<script>window.parent.doreturn('notok');</script>";
		}else{
			//成功时减积分
			$toend['points']=$loginusers['points']-$gifinfo['points'];
			$users->where("id=".$user['id'])->save($toend);
			echo "<script>window.parent.doreturn();</script>"; 
		}
		exit();		
	}

	//添加看过用户信息
	public function update($id){
		$data['uid'] = session('user')['id'];
		$data['seeid'] = $id;
		if(session('user')['id'] != $id){
			$have = D('see')->field('seeid')->where('uid='.$data['uid'])->select();

			$arr = array();
			for($i=0;$i<count($have);$i++){
				$arr[$i] = $have[$i]['seeid'];
			}
			if(!in_array($id,$arr)){
				$result = D('see')->add($data);
			}
		
		}
	}
}