<?php

/**
 * @param string $path
 * @return string
 */
function base_path(string $path): string
{
    return realpath(__DIR__ . '/../') . $path;
}
