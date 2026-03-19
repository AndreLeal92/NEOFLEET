<?php

class Router {

    private $routes = [];

    public function get($uri, $callback) {
        $this->routes['GET'][$uri] = $callback;
    }

    public function dispatch() {

        $method = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        if(isset($this->routes[$method][$uri])) {
            call_user_func($this->routes[$method][$uri]);
            return;
        }

        http_response_code(404);
        echo "404 - Página não encontrada";
    }
}