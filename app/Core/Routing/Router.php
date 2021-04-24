<?php

namespace App\Core\Routing;

use App\Core\Exceptions\ActionNotFoundException;
use App\Core\Exceptions\RouteNotFoundException;
use App\Core\Exceptions\ControllerNotFoundException;
use App\Data\Request\RequestInterface;
use App\Presentation\Controllers\ControllerFactory;

class Router
{
    private array $routes = [];

    private RequestInterface $request;

    public function __construct(RequestInterface $request)
    {
        $this->request = $request;
    }

    public function addRoute(string $url, array $methods, string $controller, string $action)
    {
        $route = new Route();
        $url = '/^' . str_replace('/', '\/', $url) . '$/';
        $route->setUrl($url);
        $route->setMethods($methods);
        $route->setController($controller);
        $route->setAction($action);

        $this->routes[] = $route;
    }

    private function getRoutes(): array
    {
        return $this->routes;
    }

    /**
     * @throws \ReflectionException
     * @throws ActionNotFoundException | RouteNotFoundException | ControllerNotFoundException
     */
    public function run(): void
    {
        $routeInfo = $this->match();
        if (!empty($routeInfo)) {
            $controller = ControllerFactory::create($routeInfo->getController());
            $action = $routeInfo->getAction();
            $methods = $routeInfo->getMethods();
            if (!in_array($this->request->getMethod(), $methods)) {
                throw new ActionNotFoundException('Method Not Allowed', 405);
            }
            $args = $routeInfo->getParams();
            call_user_func_array(array($controller, $action), $args);
        } else {
            throw new RouteNotFoundException("Page Not Found", 404);
        }
    }

    private function match(): ?Route
    {
        foreach ($this->routes as $route) {
            if (preg_match($route->getUrl(), $this->request->getUri(), $params)) {
                array_shift($params);
                $route->setParams($params);

                return $route;
            }
        }
        return null;
    }
}