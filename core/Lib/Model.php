<?php
/**
 * SmithCMS
 * @author 城东苑铁匠 yuanzhenchao@aliyun.com
 */
/**
 * SmithCMS
 * @author 城东苑铁匠 yuanzhenchao@aliyun.com
 * @description 数据库model类
 */

namespace Core\Lib;

class Model extends \PDO
{
    public function __construct()
    {
        $dsn = 'mysql:host=' . CONFIGS['mysqls']['host'] . ';dbname=' . CONFIGS['mysqls']['dbname'];
        $username = CONFIGS['mysqls']['username'];
        $passwd = CONFIGS['mysqls']['password'];

        //异常处理
        try{
            parent::__construct($dsn, $username, $passwd);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}