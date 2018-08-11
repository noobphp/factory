<?php
namespace Noob\Factory;
/**
 * Created by PhpStorm.
 * User: pxb
 * Date: 2018/8/11
 * Time: 下午5:07
 */

interface FactoryInterface
{
    /**
     * 通过class_name获取对象
     * @param $class_name
     * @return mixed
     */
    public static function getInstance($class_name);

    /**
     * 通过说明书来告诉工厂如何制作一个类
     * @param $title
     * @param $content
     * @return mixed
     */
    public static function setInstruction($title, $content);
}
