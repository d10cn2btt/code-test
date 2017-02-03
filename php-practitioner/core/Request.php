<?php
/**
 * Created by PhpStorm.
 * User: d10cn
 * Date: 03-Feb-17
 * Time: 17:37
 */

class Request
{
    public static function getUri()
    {
        return trim($_SERVER['REQUEST_URI'], "/");
    }
}