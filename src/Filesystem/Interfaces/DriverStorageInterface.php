<?php

declare(strict_types=1);

namespace Slimcms\Filesystem\Interfaces;

use Slimcms\Filesystem\Exceptions\NotExistsFile;

/**
 * Interface DriverStorageInterface
 * @package Slimcms\Filesystem\Interfaces
 */
interface DriverStorageInterface
{
    /**
     * @param string $path
     * @return bool
     */
    public function exists(string $path): bool;

    /**
     * @param string $path
     * @param string $content
     * @throws NotExistsFile
     * @return void
     */
    public function write(string $path, string $content): void;

    /**
     * @param string $path
     * @throws NotExistsFile
     * @return string
     */
    public function getContent(string $path): string;
}