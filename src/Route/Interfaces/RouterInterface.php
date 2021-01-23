<?php

declare(strict_types=1);

namespace Slimcms\Route\Interfaces;

use Closure;

interface RouterInterface
{
    /**
     * @param string $method
     * @param string $path
     * @param string|Closure $handle
     */
    public function addRoute(string $method, string $path, string|Closure $handle): void;

    /**
     * @param string $path
     * @param string|Closure $handle
     */
    public function get(string $path, string|Closure $handle): void;

    /**
     * @param string $path
     * @param string|Closure $handle
     */
    public function post(string $path, string|Closure $handle): void;

    /**
     * @param string $path
     * @param string|Closure $handle
     */
    public function patch(string $path, string|Closure $handle): void;

    /**
     * @param string $path
     * @param string|Closure $handle
     */
    public function head(string $path, string|Closure $handle): void;

    /**
     * @param string $path
     * @param string|Closure $handle
     */
    public function put(string $path, string|Closure $handle): void;

    /**
     * @param string $path
     * @param string|Closure $handle
     */
    public function delete(string $path, string|Closure $handle): void;
}