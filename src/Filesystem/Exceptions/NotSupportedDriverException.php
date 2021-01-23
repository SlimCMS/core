<?php

declare(strict_types=1);

namespace Slimcms\Filesystem\Exceptions;

use Exception;

class NotSupportedDriverException extends Exception
{
    /**
     * NotSupportedDriverException constructor.
     * @param string $driver
     */
    public function __construct(string $driver)
    {
        parent::__construct("Driver filesystem `$driver` is not supported", -1);
    }
}