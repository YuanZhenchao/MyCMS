<?php
/**
 * SmithCMS
 * @author 城东苑铁匠 yuanzhenchao@aliyun.com
 */
/**
 * SmithCMS
 * @author 城东苑铁匠 yuanzhenchao@aliyun.com
 * @description 加载框架的基类
 */

namespace Core\Lib;

class Base
{
    //获取assin的赋值
    protected $arrAssign;

    //当前模块控制器和方法
    public $strModel;
    public $strClass;
    public $strFunction;

    public function __construct()
    {
        $this->strModel = \Core\Lib\Routes::$strModel;
        $this->strClass = \Core\Lib\Routes::$strClass;
        $this->strFunction = \Core\Lib\Routes::$strFunction;
    }

    //分配变量
    public function assign($key, $value)
    {
        $this->arrAssign[$key] = $value;
    }

    //加载模板
    public function display($name = '')
    {
        //获取模块名 引入模板文件
        $strPath = __APP__ .DS . $this->strModel . DS . 'Views' .DS;
        $strPath .= empty($name) ? $this->strClass . DS . $this->strFunction : str_replace('.', DS, $name);
        $strPath .= '.html';

        //判断 是文件引入 不是就报错
        if (!is_file($strPath)){
            $strMsg = (CONFIGS['core']['DEVELOPER']) ? '没有文件：' . $strPath : CONFIGS['setings']['SHOW_ERRORS'];
            echo $strMsg;
            die;
        } else {
            include $strPath;
            extract($this->arrAssign);
        }
    }
}