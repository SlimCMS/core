<?php

declare(strict_types=1);

namespace Slimcms\Module;

use DI\Container;
use Slimcms\Core;
use Slimcms\Module\Interfaces\ModuleManagerInterface;

class ModuleManager implements ModuleManagerInterface
{
    /**
     * @var array
     */
    private array $modulesIncluded = [];

    /**
     * Scan all modules.
     *
     * @return void
     */
    public function boot(): void
    {
        $authorModules = scandir(base_path('/modules'));

        foreach ($authorModules as $authorModule) {
            if ($authorModule === '.' || $authorModule === '..') {
                continue;
            }

            $nameModules = scandir(base_path('/modules/' . $authorModule));

            foreach ($nameModules as $nameModule) {
                if ($nameModule === '.' || $nameModule === '..') {
                    continue;
                }

                array_push($this->modulesIncluded, "$authorModule/$nameModule");
            }
        }
    }

    /**
     * Inject all modules to app container.
     *
     * @param Container $container
     * @return void
     */
    public function inject(Container &$container): void
    {
        dd($container->make('Slimcms\Admin_panel\Module'));
    }
}