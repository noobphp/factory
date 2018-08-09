<?php
namespace Noob\Factory;

/**
 * Created by PhpStorm.
 * User: pxb
 * Date: 2018/8/7
 * Time: 下午2:24
 */

class Factory
{
    protected static $object = [];
    protected static $instruction = [];

    public static function getInstance($class_name)
    {
        if (! in_array($class_name, self::$object)) {
            if (in_array($class_name, self::$instruction)) {
                self::$object[$class_name] = (self::$instruction[$class_name])();
            } else {
                self::$object[$class_name] = new $class_name;
            }
        }
        return self::$object[$class_name];
    }

    public static function setInstruction($title, $content)
    {
        if (is_callable($content)) {
            self::$instruction[$title] = $content;
        } else {
            self::$instruction[$title] = function () use ($content) {
              return new $content;
            };
        }
        return;
    }
}
