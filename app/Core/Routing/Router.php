<?php

namespace App\Core\Routing;

use App\Core\Exceptions\RouteNotFoundException;
use App\Data\Request\RequestInterface;
use App\Presentation\Controllers\ControllerFactory;

class Router
{
    private array $routes = [];

    private string $uri;

    public function __construct(RequestInterface $request)
    {
        $this->uri = $request->getUri();
    }

    public function addRoute($url, $controller, $action)
    {
        $route = new Route();
        $url = '/^' . str_replace('/', '\/', $url) . '$/';
        $route->setUrl($url);
        $route->setController($controller);
        $route->setAction($action);

        $this->routes[] = $route;
    }

    private function getRoutes(): array
    {
        return $this->routes;
    }

    /**
     * @throws \App\Core\Exceptions\ControllerNotFoundException
     * @throws \App\Core\Exceptions\RouteNotFoundException
     * @throws \ReflectionException
     */
    public function run(): void
    {
        $routeInfo = $this->match();
        if (!empty($routeInfo)) {
            $controller = ControllerFactory::create($routeInfo->getController());
            $action = $routeInfo->getAction();
            $args = $routeInfo->getParams();
            call_user_func_array(array($controller, $action), $args);
        } else {
            throw new RouteNotFoundException("Page not found!", 404);
        }
    }

    private function match(): ?Route
    {
        foreach ($this->routes as $route) {
            if (preg_match($route->getUrl(), $this->uri, $params)) {
                array_shift($params);
                $route->setParams($params);

                return $route;
            }
        }
        return null;
    }
}