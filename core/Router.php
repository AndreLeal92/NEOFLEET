<?php

class Router {

    private $routes = [];

    // =========================
    // REGISTRO DE ROTAS
    // =========================
    public function get($uri, $callback, $middlewares = []) {
        $this->routes['GET'][$this->normalize($uri)] = [
            'callback' => $callback,
            'middlewares' => $middlewares
        ];
    }

    public function post($uri, $callback, $middlewares = []) {
        $this->routes['POST'][$this->normalize($uri)] = [
            'callback' => $callback,
            'middlewares' => $middlewares
        ];
    }

    // =========================
    // NORMALIZAÇÃO
    // =========================
    private function normalize($uri) {

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

        // remove /public_html
        $uri = str_replace('/public_html', '', $uri);

        if ($uri === '') {
            $uri = '/';
        }

        $uri = $this->normalize($uri);

        // =========================
        // EXECUÇÃO
        // =========================
        if (isset($this->routes[$method][$uri])) {

            $route = $this->routes[$method][$uri];

            // 🔥 EXECUTA MIDDLEWARES
            if (!empty($route['middlewares'])) {
                foreach ($route['middlewares'] as $middleware) {
                    $this->runMiddleware($middleware);
                }
            }

            $callback = $route['callback'];

            // Controller
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

    // =========================
    // MIDDLEWARE EXECUTION
    // =========================
    private function runMiddleware($middleware)
    {
        switch ($middleware) {

            case 'auth':
                require_once __DIR__ . '/../app/middleware/AuthMiddleware.php';
                AuthMiddleware::handle();
                break;

            case 'tenant':
                require_once __DIR__ . '/../app/middleware/TenantMiddleware.php';
                TenantMiddleware::handle();
                break;

            case 'admin':
                require_once __DIR__ . '/../app/middleware/AdminMiddleware.php';
                AdminMiddleware::handle();
                break;
        }
    }
}
