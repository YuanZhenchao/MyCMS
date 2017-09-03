<?php
/**
 * SmithCMS
 * @author 城东苑铁匠 yuanzhenchao@aliyun.com
 * @description 框架运行设置 根据项目的配置 实现相应的模式
 */

//合并配置文件开始
//框架配置和项目配置的合并
$arrConfig = array_merge(require __CONFIGS__ .DS .'configs.php', require __APP__ .DS .'configs.php');
//判断用户调用的模块 并合并相应的模块配置
$arrGetModel = explode('/', $_SERVER['REQUEST_URI']);
//如果用户传入了模块 ../的时候没有该文件 ./的时候已经加载
if (isset($arrGetModel[1]) && !empty($arrGetModel[1]) && $arrGetModel[1] != '.'){
    //感觉这里不是很好 url编码格式？？？先实现基础效果之后再考虑
    $resourceFiel = __APP__ . DS . ucfirst($arrGetModel[1]) . DS .'configs.php';
    if (is_file($resourceFiel)){
        $arrConfig = array_merge($arrConfig, require $resourceFiel);
    }
    unset($resourceFiel);//销毁临时变量 用户传入模块的配置
}
unset($arrGetModel);//销毁临时变量 用户传入模块
define('CONFIGS', $arrConfig);//定义函数的配置常量
//合并配置文件结束

//设置php错误显示
ini_set('display_errors',(CONFIGS['core']['DEBUG']) ? 'On':'Off');