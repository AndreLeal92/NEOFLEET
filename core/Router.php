<?php

class Router {

    private $routes = [];

    // =========================
    // REGISTRO DE ROTAS
    // =========================
    public function get($uri, $callback) {
        $this->routes['GET'][$this->normalize($uri)] = $callback;
    }

    public function post($uri, $callback) {
        $this->routes['POST'][$this->normalize($uri)] = $callback;
    }

    // =========================
    // NORMALIZAÇÃO
    // =========================
    private function normalize($uri) {

        // remove barra final (exceto raiz)
        if ($uri !== '/') {
            $uri = rtrim($uri, '/');
        }

        return $uri;
    }

    // =========================
    // DISPATCH
    // =========================
    public function dispatch() {

        $method = $_SERVER['REQUEST_METHOD'];

        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // remove /index.php
        $uri = str_replace('/index.php', '', $uri);

        // 🔥 remove /public_html (importante no seu caso)
        $uri = str_replace('/public_html', '', $uri);

        // se vazio vira /
        if ($uri === '') {
            $uri = '/';
        }

        $uri = $this->normalize($uri);

        // =========================
        // EXECUÇÃO
        // =========================
        if (isset($this->routes[$method][$uri])) {

            $callback = $this->routes[$method][$uri];

            // Controller@method
            if (is_array($callback)) {
                return call_user_func($callback);
            }

            // Closure
            return $callback();
        }

        // =========================
        // 404
        // =========================
        http_response_code(404);
        echo "404 - Página não encontrada";
    }
}