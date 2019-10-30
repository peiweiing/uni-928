<?php

namespace Home\Controller;

class SystemMessageController extends CommonController
{

    //查询消息列表
    public function index() {
    
        if($_GET['type'] == 'unread'){
            $order = 'status desc,';
        }else if($_GET['type'] == 'read'){
            $order = 'status asc,';
        }else{
            $order = '';
        }
        
        $list = D('SystemMessage')->field(array('id,title,content,status,addtime'))->order("{$order}addtime desc")->where('userid='.session('user')['id'])->select();
        
        $totalCount = D('SystemMessage')->where('userid='.session('user')['id'])->count();
        $unRead = D('SystemMessage')->where('status=1 and userid='.session('user')['id'])->count();
        
        $this->assign('unRead', $unRead);
        $this->assign('totalCount', $totalCount);
        $this->assign('list', $list);
        $this->display('index');
        
    }
    
    //消息详情，一系列
    public function detail() {
        $find = D("SystemMessage")->field()->find($_GET['id']);
        $find['status'] = 0;

        D('SystemMessage')->data($find)->save();
        $this->assign('find', $find);
        $this->display('detail');
    }
    
    //删除指定消息的操作
    public function del() {
        $ids = explode(',', $_POST['ids']);
        
        foreach($ids as $id) {
            if(!D('SystemMessage')->delete($id)){
                $this->assign('errorInfo', '删除失败!');
                $this->display('Login/systemInfo');     
                exit();
            }
        }
        $this->assign('sysCall', '删除成功!');
        $this->assign('sysUrl', $_SERVER['HTTP_REFERER']);
        $this->display('Login/loginInfo');
    }
    
}
