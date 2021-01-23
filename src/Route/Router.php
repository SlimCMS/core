<?php

declare(strict_types=1);

namespace Slimcms\Route;

use Closure;
use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use Slimcms\Route\Interfaces\RouterInterface;
use function FastRoute\simpleDispatcher;

class Router implements RouterInterface
{
    /**
     * Map routes.
     *
     * @var array
     */
    private array $map = [];

    /**
     * @inheritDoc
     */
    public function addRoute(string $method, string $path, string|Closure $handle): void
    {
        array_push($this->map, [
           'method' => $method,
           'path' => $path,
           'handle' => $handle,
        ]);
    }

    /**
     * @inheritDoc
     */
    public function get(string $path, string|Closure $handle): void
    {
        $this->addRoute('get', $path, $handle);
    }

    /**
     * @inheritDoc
     */
    public function post(string $path, string|Closure $handle): void
    {
        $this->addRoute('post', $path, $handle);
    }

    /**
     * @inheritDoc
     */
    public function patch(string $path, string|Closure $handle): void
    {
        $this->addRoute('patch', $path, $handle);
    }

    /**
     * @inheritDoc
     */
    public function head(string $path, string|Closure $handle): void
    {
        $this->addRoute('head', $path, $handle);
    }

    /**
     * @inheritDoc
     */
    public function put(string $path, string|Closure $handle): void
    {
        $this->addRoute('put', $path, $handle);
    }

    /**
     * @inheritDoc
     */
    public function delete(string $path, string|Closure $handle): void
    {
        $this->addRoute('delete', $path, $handle);
    }

    /**
     * @return mixed
     */
    public function dispatch(): mixed
    {
        $dispatcher = simpleDispatcher(function (RouteCollector $collector) {
            foreach ($this->map as $data) {
                $collector->addRoute(strtoupper($data['method']), $data['path'], $data['handle']);
            }
        });

        // Fetch method and URI from somewhere
        $httpMethod = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        // Strip query string (?foo=bar) and decode URI
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }

        $uri = rawurldecode($uri);

        $routeInfo = $dispatcher->dispatch($httpMethod, $uri);
        switch ($routeInfo[0]) {
            case Dispatcher::NOT_FOUND:
                echo 'not found';
                break;
            case Dispatcher::METHOD_NOT_ALLOWED:
                $allowedMethods = $routeInfo[1];
                echo '405 Method Not Allowed';
                break;
            case Dispatcher::FOUND:
                $handler = $routeInfo[1];
                $vars = $routeInfo[2];
                echo 'call $handler with $vars';
                break;
        }

        return null;
    }
}