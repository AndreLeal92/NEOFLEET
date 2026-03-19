<?php

class Router {

    private $routes = [];

    public function get($uri, $callback) {
        $this->routes['GET'][$this->normalize($uri)] = $callback;
    }

    private function normalize($uri) {
        // remove barra final (exceto raiz)
        if ($uri !== '/') {
            $uri = rtrim($uri, '/');
        }
        return $uri;
    }

    public function dispatch() {

        $method = $_SERVER['REQUEST_METHOD'];

        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // remove /index.php da URL
        $uri = str_replace('/index.php', '', $uri);

        $uri = $this->normalize($uri);

        if(isset($this->routes[$method][$uri])) {
            call_user_func($this->routes[$method][$uri]);
            return;
        }

        http_response_code(404);
        echo "404 - Página não encontrada";
    }
}