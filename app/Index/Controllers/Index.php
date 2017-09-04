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

namespace App\Index\Controllers;

class Index extends Base
{
    /*
     * 默认的模块方法
     */
    public function index()
    {
//        $modelPdo = new \Core\Lib\Model();
//        $strSql = 'SELECT * FROM columns';
//        $objResult = $modelPdo->query($strSql);
//        $data = $objResult->fetchAll();

        $data = 'this is data';
        $this->assign('data',$data);

        $title = 'this is title';
        $this->assign('title',$title);

        $this->display('Index.index');
    }
}