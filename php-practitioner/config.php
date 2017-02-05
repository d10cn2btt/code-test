<?php
/**
 * Created by PhpStorm.
 * User: d10cn
 * Date: 03-Feb-17
 * Time: 09:44
 */

return [
    'database' => [
        'dbname' => 'laravel-5.3',
        'username' => 'root',
        'password' => 'truong123',
        'connection' => 'mysql:host=127.0.0.1',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        ]
    ]
];