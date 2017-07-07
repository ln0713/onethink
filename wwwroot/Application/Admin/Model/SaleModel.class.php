<?php
/**
 * Created by PhpStorm.
 * User: ln0713
 * Date: 2017/7/6
 * Time: 14:14
 */

namespace Admin\Model;


use Think\Model;

class SaleModel extends Model
{
    protected $_validate = array(
        array('sale_name', 'require', '标题不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),
        array('sale_price', 'require', '价格不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),
        array('sale_time', 'require', '价格不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),
        array('sale_tel', 'require', '价格不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH),
    );
    protected $_auto = array(
        array('sale_add_time', NOW_TIME, self::MODEL_INSERT),
        //array('update_time', NOW_TIME, self::MODEL_BOTH),
        array('status', '1', self::MODEL_INSERT),
    );
}