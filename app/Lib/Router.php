<?php

namespace app\Lib;

class Router
{
    /**
     * @var array
     */
    private $routes = [];

    function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    public function getController($requestUri, $requestMethod)
    {
        // Do not know controller yet.
        $controllerClassAndAction = [];

        // Try to find controller in routes.
        foreach ($this->routes as $route) {
            $controllerClass = $route['controller'];
            $action = isset($route['action'])
                ? $route['action'].'Action'
                : 'indexAction';

            // If method equals AND path matches
            if (false !== ($arguments = $this->matchRoute($requestMethod, $requestUri, $route))) {
                $controllerClassAndAction = [
                    $controllerClass,
                    $action,
                    $arguments
                ];

                // We found, quit.
                break;
            }
        }

        // If we still do not know, let's use HomeController
        if (empty($controllerClassAndAction)) {
            $controllerClassAndAction = [
                $this->routes['default']['controller'],
                'indexAction',
                [],
            ];
        }

        return $controllerClassAndAction;
    }

    /**
     * @param $requestMethod
     * @param $requestUri
     * @param array $route
     * @return array
     */
    private function matchRoute($requestMethod, $requestUri, array $route)
    {
        if ($route['method'] === $requestMethod
            && preg_match('#'.$route['path'].'#', $requestUri, $matches)) {

            array_shift($matches);
            return $matches;
        }

        return false;
    }
} 