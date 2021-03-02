<?php

declare(strict_types=1);

namespace Slimcms;

class CoreInformation
{
    /**
     * Version of src SlimCMS.
     *
     * @var string
     */
    public static string $version = "0.0.1";

    /**
     * Last release date.
     *
     * @var string
     */
    public static string $lastRelease = "2021-4-14";

    /**
     * Check new release src.
     *
     * @return bool
     */
    public function checkHasUpdate(): bool
    {
        // TODO
        return false;
    }

    /**
     * Update src SlimCMS.
     *
     * @return bool
     */
    public function updateCore(): bool
    {
        // TODO
        return false;
    }
}