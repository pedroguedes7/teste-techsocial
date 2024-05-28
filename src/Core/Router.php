<?php

namespace App\Core;

class Router
{
    protected $request;
    protected $routes = [];
    protected $beforeMiddleware = [];

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

    public function before($method, $path, $callback)
    {
        $this->beforeMiddleware[] = [
            'method' => strtolower($method),
            'path' => $path,
            'callback' => $callback
        ];
    }

    public function resolve()
    {
        $method = $this->request->method();
        $path = $this->request->path();

        foreach ($this->beforeMiddleware as $middleware) {
            if ($middleware['method'] === $method && $middleware['path'] === $path) {
                call_user_func($middleware['callback'], $this->request);
            }
        }

        $callback = $this->routes[$method][$path] ?? false;

        if (!$callback) {
            http_response_code(404);
            echo "404 - Not Found";
            return;
        }

        call_user_func($callback);
    }
}
