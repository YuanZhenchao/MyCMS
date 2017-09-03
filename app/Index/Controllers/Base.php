<?php
/**
 * SmithCMS
 * @author 城东苑铁匠 yuanzhenchao@aliyun.com
 */
/**
 * SmithCMS
 * @author 城东苑铁匠 yuanzhenchao@aliyun.com
 * @description 应用的基类
 */

namespace App\Index;

class Base
{
    public function test($a, $b)
    {
        echo '第一个参数:'.$a . '第二个参数：' .$b;
    }
    public function hello()
    {
        echo 'hello';
    }
}