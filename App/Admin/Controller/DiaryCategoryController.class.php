<?php
namespace Admin\Controller;

class DiaryCategoryController extends CommonController
{
	public function index() {
		//列表过滤器，生成查询Map对象
		$map = $this->_search();
		if(method_exists($this, '_filter')) {
			$this->_filter($map);
		}
		//判断采用自定义的Model类
		if(!defined(CONTROLLER_NAME)){
		   $model = D(CONTROLLER_NAME);
		}
		
		if(!empty($model)) {
			$this->_list($model, $map, '',true);
		}
		$this->display();
		return;
	}
}