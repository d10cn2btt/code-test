<?php
/**
 * Created by PhpStorm.
 * User: d10cn
 * Date: 03-Feb-17
 * Time: 09:44
 */

$config = require('config.php');

require('database/Connection.php');
require('database/QueryBuilder.php');
require 'Request.php';
$route = require 'Route.php';

return new QueryBuilder(
    Connection::make($config['database'])
);