<?php

declare(strict_types=1);

namespace Tests\Support;

use Slimcms\Support\Arr;
use PHPUnit\Framework\TestCase;

class ArrTest extends TestCase
{
    const ARRAY = [
        'name' => 'Alex',
        0 => 1,
        'This' => [
            'is' => [
                'array',
                'no' => 'this is patrick'
            ],
        ],
    ];

    public function testGet(): void
    {
        $this->assertSame(Arr::get('name', self::ARRAY), self::ARRAY['name']);
        $this->assertSame(Arr::get('0', self::ARRAY), self::ARRAY[0]);
        $this->assertSame(Arr::get('This', self::ARRAY), self::ARRAY['This']);
        $this->assertSame(Arr::get('This.is', self::ARRAY), self::ARRAY['This']['is']);
        $this->assertSame(Arr::get('This.is.no', self::ARRAY), self::ARRAY['This']['is']['no']);
    }

    public function testExists(): void
    {
        $this->assertSame(Arr::exists('name', self::ARRAY), true);
        $this->assertSame(Arr::exists('names', self::ARRAY), false);
        $this->assertSame(Arr::exists('This.is.array', self::ARRAY), false);
        $this->assertSame(Arr::exists('This.is.no', self::ARRAY), true);
    }
}
