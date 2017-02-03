<?php
/**
 * Created by PhpStorm.
 * User: d10cn
 * Date: 03-Feb-17
 * Time: 17:34
 */

$subDomain = 'php-practitioner';

$routes->setRoute([
    $subDomain . '' => 'controller/IndexController.php',
    $subDomain . '/about' => 'controller/AboutController.php',
    $subDomain . '/contact' => 'controller/ContactController.php'
]);