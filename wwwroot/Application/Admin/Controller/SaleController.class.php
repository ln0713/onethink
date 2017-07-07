<?php
/**
 * Created by PhpStorm.
 * User: ln0713
 * Date: 2017/7/6
 * Time: 14:22
 */

namespace Admin\Controller;


use Think\Page;

class SaleController extends AdminController
{
    public function index($page=0){
        /* 获取频道列表 */
        $m = M('Sale');
        $count = $m->count();
        $Page = new Page($count,4);
        $show = $Page->show();
        $list=$m->order('id asc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list', $list);
        $this->assign('page', $show);
        $this->meta_title = '租售管理';
        $this->display();
    }

    //添加
    public function add(){
        if(IS_POST){
            $Sale = D('Sale');
            $data = $Sale->create();
            //获取用户名
            $Sale->name=session('user_auth.username');
            if($data){
                $id = $Sale->add();
                if($id){
                    $this->success('新增成功', U('index'));
                    //记录行为
                    action_log('update_sale', 'sale', $id, UID);
                } else {
                    $this->error('新增失败');
                }
            } else {
                $this->error($Sale->getError());
            }
        } else {
            $this->meta_title = '新增出租';
            $this->display();
        }
    }

    //删除
    public function del(){
        $id = array_unique((array)I('id',0));

        if ( empty($id) ) {
            $this->error('请选择要操作的数据!');
        }

        $map = array('id' => array('in', $id) );
        if(M('Sale')->where($map)->delete()){
            //记录行为
            action_log('update_sale', 'sale', $id, UID);
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }


    //批量删除
    public function dels(){
        $ids=$_GET['ids'];
//        $ids = array_unique((array)I('id',0));
        $map = array('id' => array('in', $ids) );
        M('Sale')->where($map)->delete();
        $this->success('删除成功');
    }
    //修改
    public function edit($id = 0){
        if(IS_POST){
            $Sale = D('Sale');
            $data = $Sale->create();
            //获取用户名
            $Sale->name=session('user_auth.username');
            if($data){
                if($Sale->save()){
                    //记录行为
                    action_log('update_sale', 'sale', $data['id'], UID);
                    $this->success('编辑成功', U('index'));
                } else {
                    $this->error('编辑失败');
                }

            } else {
                $this->error($Sale->getError());
            }
        } else {
            $info = array();
            /* 获取数据 */
            $info = M('Sale')->find($id);

            if(false === $info){
                $this->error('获取配置信息错误');
            }
            $this->assign('info', $info);
            $this->meta_title = '编辑租售';
            $this->display();
        }
    }


}