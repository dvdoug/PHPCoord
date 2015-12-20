<?php
/**
 * An autoloader for the tests
 */
spl_autoload_register(function ($class) {
    if(!preg_match('|PHPCoord\\\\(?<className>.*)|', $class, $matches)) return;
    $classFile=__DIR__ . '/../' . strtr($matches['className'],array('/'=>'','\\'=>'/')) . '.php';
    if(!file_exists($classFile)) return;
    require_once($classFile);
});