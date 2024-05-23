<?php

namespace App\Core;

class Router
{
    protected $request;
    protected $routes = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $method = $this->request->method();
        $path = $this->request->path();

        $callback = $this->routes[$method][$path] ?? false;

        if (!$callback) {
            http_response_code(404);
            echo "404 - Not Found";
            return;
        }

        call_user_func($callback);
    }
}
