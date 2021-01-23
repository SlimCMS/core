<?php

use Slimcms\Route\Interfaces\RouterInterface;

/**
 * @var RouterInterface $route
 */

$route->get('/', function () {
    echo 'work!';
});