<?php

use Noob\Factory\Factory;

require ("../vendor/autoload.php");
/**
 * Created by PhpStorm.
 * User: pxb
 * Date: 2018/8/9
 * Time: 下午1:57
 */


//var_dump(Factory::getInstance(\Noob\Http\Request::class));

Factory::setInstruction(\Noob\Http\Request::class, function () {
    return (new \Noob\Http\Request);
});
var_dump(Factory::getInstance(\Noob\Http\Request::class));

Factory::setInstruction('request', \Noob\Http\Request::class);
//Factory::setInstruction('request', function () {
//    return (new \Noob\Http\Request);
//});
var_dump(Factory::getInstance('request'));
