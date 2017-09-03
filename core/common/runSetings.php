<?php
/**
 * SmithCMS
 * @author 城东苑铁匠 yuanzhenchao@aliyun.com
 * @description 框架运行设置
 */

/**
 * @description 配置信息
 * @param 框架的设置
 * @param 项目的设置
 * @return 合并后的配置信息
 */
$configs = array_merge(require __APP__ .DS  .'configs.php', require __APP__ . DS .'configs.php');
//设置错误显示
ini_set('display_errors',($configs['debug']) ? 'On':'Off');