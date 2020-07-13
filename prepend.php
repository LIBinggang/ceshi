<?php
/**
 * Created by PhpStorm.
 * User: 灵枢
 * Date: 2018/9/5
 * Time: 下午5:02
 */
require_once dirname(__FILE__) . '/vendor/autoload.php';
use SebastianBergmann\CodeCoverage\CodeCoverage;
$coverage = new CodeCoverage;
# 设置白名单，就是设置你想计算覆盖率的哪些文件夹
$coverage->filter()->addDirectoryToWhitelist(dirname(__FILE__) . '/');

$coverage->start('<Site coverage>');#开始统计
register_shutdown_function('__coverage_stop',$coverage);#注册关闭方法

function __coverage_stop(CodeCoverage $coverage){
    $coverage->stop();#停止统计
    $writer = new \SebastianBergmann\CodeCoverage\Report\Html\Facade;
    # 设置生成代码覆盖率页面的路径
    $writer->process($coverage, dirname(__FILE__) . '/coverage_html');
   }
?>