<?php

class Router {

    private $routes = [];

    public function get($uri, $action) {
        $this->addRoute('GET', $uri, $action);
    }

    public function post($uri, $action) {
        $this->addRoute('POST', $uri, $action);
    }

    private function addRoute($method, $uri, $action) {
        $this->routes[$method][$uri] = $action;
    }

    public function dispatch($uri, $method) {

        // remove barra final
        $uri = rtrim($uri, '/') ?: '/';

        if (isset($this->routes[$method][$uri])) {

            $action = $this->routes[$method][$uri];

            if (is_callable($action)) {
                return $action();
            }

            if (is_array($action)) {
                [$controller, $method] = $action;
                return $controller->$method();
            }
        }

        http_response_code(404);
        echo "404 - Rota não encontrada";
    }
}