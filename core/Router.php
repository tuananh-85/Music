<?php

class Router
{
    protected $routes;

    public function __construct($routes)
    {
        $this->routes = $routes;
    }

    public function dispatch()
    {
        $r = isset($_GET['r']) ? trim($_GET['r'], '/') : '';
        $route = $r;
        // If route exact match in map
        if (isset($this->routes[$route])) {
            $handler = $this->routes[$route];
        } else {
            // parse controller/action/params from r
            $parts = $route === '' ? [] : explode('/', $route);
            $controller = !empty($parts[0]) ? ucfirst($parts[0]) . 'Controller' : 'HomeController';
            $action = isset($parts[1]) ? $parts[1] : 'index';
            $params = array_slice($parts, 2);
            $handler = $controller . '@' . $action;
            // call
            return $this->callHandler($handler, $params);
        }

        return $this->callHandler($handler, []);
    }

    protected function callHandler($handler, $extraParams = [])
    {
        // handler format: Controller@action
        if (strpos($handler, '@') === false) {
            echo 'Invalid route handler: ' . htmlspecialchars($handler);
            return;
        }
        list($controllerName, $action) = explode('@', $handler);
        $controllerFile = __DIR__ . '/../app/controller/' . $controllerName . '.php';
        if (!file_exists($controllerFile)) {
            echo "Controller file not found: {$controllerFile}";
            return;
        }
        require_once $controllerFile;
        if (!class_exists($controllerName)) {
            echo "Controller class not found: {$controllerName}";
            return;
        }
        $controller = new $controllerName();
        if (!method_exists($controller, $action)) {
            echo "Action not found: {$action} in {$controllerName}";
            return;
        }
        return call_user_func_array([$controller, $action], $extraParams);
    }
}
