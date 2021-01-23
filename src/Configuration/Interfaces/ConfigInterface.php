<?php

declare(strict_types=1);

namespace Slimcms\Configuration\Interfaces;

/**
 * Interface ConfigInterface
 * @package Slimcms\Configuration\Interfaces
 */
interface ConfigInterface
{
    /**
     * @param string $path
     * @return mixed
     */
    public function get(string $path): mixed;

    /**
     * @param string $path
     * @return bool
     */
    public function isset(string $path): bool;
}