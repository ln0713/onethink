<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Wechat\Controller;
use OT\DataDictionary;

/**
 * 前台首页控制器
 * 主要获取首页聚合数据
 */
class IndexController extends WechatController{

	//系统首页
    public function index(){
        $this->display();
    }
    //小区租售
    public function zushou(){
        $Sale = M('Sale');
        $zu=$Sale->where('sale_type=1')->select();
        $shou=$Sale->where('sale_type=2')->select();
        $this->assign('zu',$zu);
        $this->assign('shou',$shou);
        $this->display();
    }
    public function zushou_detail(){
        $id=I('get.id');
        $m=M('sale');
        $detail=$m->where('id='.$id)->select();
        $this->assign('detail',$detail);
        $this->display();
    }

    //小区通知
    public function notice(){
        $m=M('Document');
        $notice=$m->select();
        $this->assign('notice',$notice);
        $this->display();
    }
    public function notice_detail(){
        $id=I('get.id');
        $m=M('Document');
        $ms=M('Document_article');
        $detail=$m->where('id='.$id)->select();
        $article=$ms->where('id='.$id)->select();
        $this->assign('detail',$detail);
        $this->assign('article',$article);
        $this->display();
    }

}