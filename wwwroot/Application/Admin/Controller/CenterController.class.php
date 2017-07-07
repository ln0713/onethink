<?php
/**
 * Created by PhpStorm.
 * User: ln0713
 * Date: 2017/7/6
 * Time: 11:58
 */

namespace Admin\Controller;


use Think\Controller;

class CenterController extends AdminController
{
    public function index(){
        $pid = I('get.pid', 0);
        /* 获取频道列表 */
        $map  = array('status' => array('gt', -1), 'pid'=>$pid);
        $list = M('Channel')->where($map)->order('sort asc,id asc')->select();

        $this->assign('list', $list);
        $this->assign('pid', $pid);
        $this->meta_title = '';
        $this->display();
    }
}