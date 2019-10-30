<?php

namespace Home\Controller;
use Think\Controller;
//公告不能继承CommonController 首页有公告浏览

class NoticeController extends Controller
{

    //查询公告列表
    public function index() {

        $sql = "select no.id,no.type,no.title,no.display,no.views,no.addtime,ry.typename from yyw_notice no,yyw_notice_category ry where no.type=ry.id order by no.addtime desc limit 5";
        $res = M()->query($sql);

		
        $this->assign('data', $res);
        
    }
    //提供公告列表界面
    public function lists($typeid='') {
		$search = array();
		$search['display'] = array('eq', 1);
		if(!empty($typeid)){
			$search['type'] = array('eq', $typeid);
		}
        
        //做标示输出class属性
		$this->assign('iTag', $typeid);
        //查到类型名称，列表
		
		//$page->
        $list = D('NoticeCategory')->field(array('typeid', 'typename'))->limit(6)->select();
		
		$total = D('Notice')->where($search)->count();
		$page = new \Think\Page($total, 10);
		
        $data = D('Notice')->field(array('id', 'title', 'addtime'))->where($search)->order('addtime desc')->limit($page->firstRow, $page->listRows)->select();
		
		//查询最新日记
		$newDiary = D('Diary')->scope('show,new')->limit(10)->select();
		$this->assign('newdiary',$newDiary);
		
		//推荐会员
		$userList = new UserListController();
		$userList->recommend();
		
		$this->assign('showPage', $page->show());
        $this->assign('list', $list);
        $this->assign('data', $data);
		
        $this->display('lists');
    }
    
    //查看公告详细内容 并提供浏览次数的修改 并且找到他的上一篇跟下一篇
    public function detail() {
        $mod = D('Notice');
        //先修改指定id的浏览次数        
        $views = $mod->field(array('id', 'views'))->find($_GET['id']);
        $views['views']++;
        $mod->data($views)->save();


        


        //侧边栏的类别标题
		$list = D('NoticeCategory')->field(array('typeid', 'typename'))->limit(6)->select();
        
        $find = $mod->find($_GET['id']);
        //显示把字符串转为HTML实体
        $find['content'] = htmlspecialchars_decode($find['content'], ENT_HTML5);

        //先取得他所有的字段
        $fields = $mod->field('content', true)->find();
        $resField = array_keys($fields);
        //相关文章
        $data = $mod->field(array('id', 'title'))->where('display=1')->order($resField[rand(0, count($resField))])->limit(8)->select();

        //上方导航的 首页 >> $typename >> 正文
        $type = D('NoticeCategory')->field(array('typeid', 'typename'))->where('typeid='.$find['type'])->find();
        //dump($type);
        //有了这个id号，找他的属于的类别，所有类别下的。上一篇 下一篇
        
        $pointer = $mod->field(array('id'))->where('type='.$find['type'])->select();
        $xMaxs = array();
        $xMins = array();
        foreach($pointer as $v) {
            if($v['id'] > $_GET['id']) {
                $xMaxs[] = $v['id'];
            }
            if($v['id'] < $_GET['id']){
                $xMins[] = $v['id'];
            }
        }
        $next = min($xMaxs);//下一条
        $prev = max($xMins);//上一条
        
        if($next){
            $nextInfo = $mod->field(array('id', 'title'))->where('type='.$find['type'])->find($next);
            $this->assign('next', $nextInfo);
        }else{
            $this->assign('next', '');
        }
        
        if($prev){
            $prevInfo = $mod->field(array('id', 'title'))->where('type='.$find['type'])->find($prev);
            $this->assign('prev', $prevInfo);
        }else{
            $this->assign('prev', '');
        }
        
		$this->assign('list', $list);
        $this->assign('find', $find);
        $this->assign('data', $data);
        $this->assign('type', $type);
        $this->display('detail');
    }
  
    
}
