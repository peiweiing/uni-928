<?php
namespace Home\Controller;
use Think\Controller;
class PublicController extends Controller
{ 
	//友情链接
	public function index(){
		$mod = M("friendlink")->select();
		$this->assign('list',$mod);
	}
        
        //文章
        public function _initialize() {
          $article=M('Article');
          $this->cjwt=$article->where('article_type=1')->select();
          $this->jyxz=$article->where('article_type=2')->select();
          $this->gyhl=$article->where('article_type=3')->select();
          $this->hzlx=$article->where('article_type=4')->select();
          $this->bzzx=$article->where('article_type=5')->select();
         }
}