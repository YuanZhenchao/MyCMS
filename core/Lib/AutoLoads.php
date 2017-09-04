<?php
/**
 * SmithCMS
 * @author 城东苑铁匠 yuanzhenchao@aliyun.com
 */
/**
 * SmithCMS
 * @author 城东苑铁匠 yuanzhenchao@aliyun.com
 * @description 自动引入类文件
 */

namespace Core\Lib;

class AutoLoads
{
    //防止多次引入一个类文件 如多次调用类中不存在的方法
    private static $classMap = [];

    /**
     * @description 主函数
     * @param 自动引入的类
     * @return 实现自动引入文件
     */
    public static function autoLoads($class)
    {
        //判断是否引入过该类
        if (isset(self::$classMap[$class])){
            return true;
        }

        //拼接引入文件的路径
        $arrClassName = str_replace('\\', DS, $class);
        $file = __ROOT__ . DS .lcfirst($arrClassName) . '.php';

        //引入文件
        if (is_file($file)){
            include $file;
            self::$classMap[$class] = 1;
        } else {
            return false;
        }
    }
}
//实现自动加载
spl_autoload_register('\Core\Lib\AutoLoads::autoLoads');