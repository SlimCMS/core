<?php

declare(strict_types=1);

namespace Slimcms\Filesystem\Exceptions;

use Exception;
use Throwable;

/**
 * Class NotExistsFile
 * @package Slimcms\Filesystem\Exceptions
 */
class NotExistsFile extends Exception
{
    /**
     * NotExistsFile constructor.
     * @param string $path
     */
    public function __construct(string $path)
    {
        parent::__construct("Not exists file by path `$path`", -1);
    }
}