<?php
/**
 * Created by PhpStorm.
 * User: d10cn
 * Date: 03-Feb-17
 * Time: 17:34
 */

define('SUBDOMAIN', 'php-practitioner');

$router->setRoute([
    SUBDOMAIN . '' => 'controller/IndexController.php',
    SUBDOMAIN . '/about' => 'controller/AboutController.php',
    SUBDOMAIN . '/contact' => 'controller/ContactController.php'
]);