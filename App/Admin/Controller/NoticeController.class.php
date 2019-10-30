<?php

namespace Admin\Controller;

class NoticeController extends CommonController
{   
    
    //查询公告列表
    
	
	public function _tigger_list(&$list) {
		
		foreach($list as &$v) {
			$res = D('NoticeCategory')->field('typename')->where('typeid='.$v['type'])->find();
			$v['typename'] = $res['typename'];
		}
		$this->assign('dis', array('隐藏', '可见'));
	}
    
    //获取添加公告表单界面
    public function add() {
		$list = D('NoticeCategory')->select();
		
		$this->assign('list', $list);
        $this->display('add');
    }
	
	
    
    //获取修改公告界面操作
    public function edit() {
        $find = D('Notice')->find($_GET['id']);
        $list = D('NoticeCategory')->field('typeid, typename')->select();
        $this->assign('list', $list);
        $this->assign('find', $find);
        $this->display('edit');
    }
    
    //接收公告信息更改数据库的信息 
    
    
    //执行删除指定公告信息的操作
    public function del() {
        if(D('Notice')->delete($_GET['id'])){
            echo $this->success('删除成功!', U('index'));
        }else{
            echo $this->error('删除失败！');
        }
    }
    
}
