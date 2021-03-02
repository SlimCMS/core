<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use Slimcms\Core;

class CoreTest extends TestCase
{
    public function testCreate(): void
    {
        $this->assertIsObject(new Core());
    }
}