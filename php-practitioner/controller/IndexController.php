<?php
/**
 * Created by PhpStorm.
 * User: d10cn
 * Date: 03-Feb-17
 * Time: 17:34
 */
$users = $database->selectAll('users');
require 'view/index.view.php';