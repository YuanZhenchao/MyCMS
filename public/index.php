<?php
/**
 * SmithCMS
 * @author 城东苑铁匠 yuanzhenchao@aliyun.com
 */

//引入框架的配置文件
define('DS',DIRECTORY_SEPARATOR);
require realpath('../') . DS . 'configs' . DS . 'constant.php';

//引入框架的核心文件
require __CORE__ . DS . 'cores.php';

//运行路由
\Core\Lib\Routes::routes();