<?php
namespace Noob\Factory;

/**
 * Created by PhpStorm.
 * User: pxb
 * Date: 2018/8/7
 * Time: 下午2:24
 */

class Factory implements FactoryInterface
{
    protected static $object = [];
    protected static $instruction = [];

    public static function getInstance($class_name)
    {
        if (! isset(self::$object[$class_name])) {
            if (isset(self::$instruction[$class_name])) {
                //如果说明书中有，按照说明书制作
                self::$object[$class_name] = (self::$instruction[$class_name])();
            } else {
                self::$object[$class_name] = new $class_name; //默认传入的就是完整命名空间+类名
            }
        }
        return self::$object[$class_name];
    }

    public static function setInstruction($title, $content)
    {
        if (is_callable($content)) {
            self::$instruction[$title] = $content;
        } else {
            //如果不是callback默认是传入的完整命名空间+类名
            self::$instruction[$title] = function () use ($content) {
              return new $content;
            };
        }
        return;
    }
}
