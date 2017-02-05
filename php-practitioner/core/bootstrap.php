<?php
/**
 * Created by PhpStorm.
 * User: d10cn
 * Date: 03-Feb-17
 * Time: 09:44
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);

$config = require 'config.php';
require 'database/Connection.php';
require 'database/QueryBuilder.php';
require 'Request.php';
require 'Route.php';

return new QueryBuilder(
    Connection::make($config['database'])
);