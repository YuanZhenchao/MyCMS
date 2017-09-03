<?php
/**
 * SmithCMS
 * @author 城东苑铁匠 yuanzhenchao@aliyun.com
 */
/**
 * SmithCMS
 * @author 城东苑铁匠 yuanzhenchao@aliyun.com
 * @description 路由函数
 */

namespace Core\Lib;

class Routes
{
    public function __construct()
    {
        //静态方法运行不调用
    }

    /*
     * 通过解析url 加载项目文件
     */
    public static function routes()
    {
        //模块和方法
        $strModel = CONFIGS['core']['DEFAULT_MODULE'];
        $strClass = CONFIGS['core']['DEFAULT_CLASS'];
        $strFunction = CONFIGS['core']['DEFAULT_FUNCTION'];

        //显示的错误信息
        $strMsg = '';

        //没有网址没有参数 也就是非 网址或网址后跟index.php的状态
        if ($_SERVER['REQUEST_URI'] != '/' && $_SERVER['REQUEST_URI'] != '/index.php'){
            //处理传入的参数判断 模块 类 方法
            $arrUrls = explode('/', substr($_SERVER['REQUEST_URI'],1));

            //后肯定有模块参数 无需判断
            $strModel = ucfirst($arrUrls[0]);
            unset($arrUrls[0]);//之后指针方便读取

            //如果参数中有类名
            if (isset($arrUrls[1]) && !empty($arrUrls[1])){
                $strClass = ucfirst($arrUrls[1]);
                unset($arrUrls[1]);
            } else {
                $strMsg = '没有类参数';
            }

            //如果参数中有方法名
            if (isset($arrUrls[2]) && !empty($arrUrls[2])){
                $strFunction = strtolower($arrUrls[2]);
                unset($arrUrls[2]);
            } else {
                $strMsg = '没有方法参数';
            }
        }

        //判断有没有该类文件
        $resourceFile = __APP__ . DS . $strModel . DS . 'Controllers' . DS . $strClass . '.php';
        //实现参数的传入 如果有参数
        if (is_file($resourceFile)){
            //如果有该文件 实例化方法
            $strNewModelName = '\\App\\' . $strModel . '\\' . $strClass;
            $modelNewModel = new $strNewModelName();

            //判断方法是有合法
            if (!method_exists($modelNewModel, $strFunction)){
                $strMsg = (CONFIGS['core']['DEVELOPER']) ? '没有方法：' . $strFunction : '不好意思你的网址打错了';
                echo $strMsg;
                die;
            }
            //判断有没有参数 如果有
            if (isset($arrUrls) && !empty($arrUrls)){
                //获取的url参数数组 删除偶数的键 保留基数的值
                while($key = key($arrUrls)) {
                    unset($arrUrls[$key]);
                    next($arrUrls);
                }
                //把数组参数 作为回调函数的参数
                call_user_func_array([$modelNewModel, $strFunction], $arrUrls);
            } else {
                $modelNewModel->$strFunction();
            }
        } else {
            $strMsg = (CONFIGS['core']['DEVELOPER']) ? '没有文件：' . $resourceFile : '不好意思你的网址打错了';
            echo $strMsg;
            die;
        }
    }
}