<?php
/**
 * Created by PhpStorm.
 * User: d10cn
 * Date: 03-Feb-17
 * Time: 17:52
 */

class Route
{
    protected $routes = [];

    public function setRoute($routes)
    {
        $this->routes = $routes;
    }

    public static function load($file)
    {
        $router = new self();
        require $file;

        return $router;
    }

    public function mapRoute($uri)
    {
        if (array_key_exists($uri, $this->routes)) {
            return $this->routes[$uri];
        }

        throw new Exception('Not found any route');
    }
}