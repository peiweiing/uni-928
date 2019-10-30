<?php
namespace Home\Controller;

use Think\Controller;

class ArticleController extends PublicController{
    
    public function show(){
        $article=M('Article');
        $this->cjwt=$article->where('article_type=1')->select();
        $this->jyxz=$article->where('article_type=2')->select();
        $this->gyhl=$article->where('article_type=3')->select();
        $this->hzlx=$article->where('article_type=4')->select();
        $this->bzzx=$article->where('article_type=5')->select();
        
        $id=I('id');
        $this->info=$article->where('id='.$id)->find();
        
        $this->display();
    }
}

?>
