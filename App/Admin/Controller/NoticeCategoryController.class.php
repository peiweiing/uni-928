<?php
namespace Admin\Controller;

class NoticeCategoryController extends CommonController
{

    //删掉这个类别，则这个类别下的所有公告都会被删除
    public function del() {
        $mod = D(CONTROLLER_NAME);
        $type = $mod->field(array('typeid'))->find($_GET['id']);
        if($mod->delete($_GET['id'])) {
            if(D('Notice')->where('type='.$type['typeid'])->delete()) {
                echo $this->success('删除成功!', U('NoticeCategory/index'));
            } else {
                echo $this->error('删除失败!');
            }
        } else {
            echo $this->error('删除失败!');
        }
    }
     
    
}
