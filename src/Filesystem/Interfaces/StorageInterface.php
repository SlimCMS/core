<?php

declare(strict_types=1);

namespace Slimcms\Filesystem\Interfaces;

/**
 * Interface StorageInterface
 * @package Slimcms\Filesystem\Interfaces
 */
interface StorageInterface
{
    /**
     * @param string $driver
     * @return DriverStorageInterface
     */
    public static function driver(string $driver): DriverStorageInterface;
}