<?php
/**
 * SmithCMS
 * @author 城东苑铁匠 yuanzhenchao@aliyun.com
 * @description 框架的配置文件
 */
return [
    //框架核心配置
    'core' => [
        //开启调试模式
        'DEBUG' => true,
        //开启开发者模式
        'DEVELOPER' => true,
        //默认绑定模块
        'DEFAULT_MODULE' => 'Index',
        //默认绑定控制器
        'DEFAULT_MVC' => 'Controllers',
        //默认绑定类
        'DEFAULT_CLASS' => 'Index',
        //默认绑定方法
        'DEFAULT_FUNCTION' => 'index',
    ],

    //数据库配置信息
    'mysqls' => [
        'host' => 'localhost',
        'dbname' => 'yourDbName',
        'username' => 'yourUserName',
        'password' => 'yourPassWord',
    ],

    //框架的一些提示信息
    'setings' => [
        'SHOW_ERRORS' => '不好意思你的网址打错了',
    ]
];