<?php

declare(strict_types=1);

namespace Slimcms;

use DI\Container;
use Slimcms\Module\Interfaces\ModuleManagerInterface;
use Slimcms\Module\ModuleManager;
use Slimcms\Route\Interfaces\RouterInterface;
use Slimcms\Route\Router;
use function DI\autowire;

class Core
{
    /** @var Container */
    private Container $container;

    /**
     * Core constructor.
     * @param Container|null $container
     */
    public function __construct(?Container $container = null)
    {
        $this->container = $container ?? new Container();
        $this->injectDependsContainer($this->container);
    }

    /**
     * @param Container $container
     * @return void
     */
    public function injectDependsContainer(Container &$container): void
    {
        $container->set(RouterInterface::class, autowire(Router::class));
        $container->set(ModuleManagerInterface::class, autowire(ModuleManager::class));
    }

    public function webWork(): void
    {
        $moduleManager = $this->container->get(ModuleManagerInterface::class);
        $moduleManager->boot();
        $moduleManager->inject($this->container);
    }
}