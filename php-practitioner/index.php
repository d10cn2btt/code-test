<?php
/**
 * Created by PhpStorm.
 * User: d10cn
 * Date: 03-Feb-17
 * Time: 09:43
 */
$database = require('core/bootstrap.php');
$routes = new Route();

require('routes.php');

require $routes->mapRoute(Request::getUri());