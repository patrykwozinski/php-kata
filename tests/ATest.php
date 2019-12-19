<?php
declare(strict_types=1);

namespace Tests\Kata;


use Kata\A;
use PHPUnit\Framework\TestCase;

final class ATest extends TestCase
{
    public function testYo(): void
    {
        $a = new A();

        self::assertTrue($a->b());
    }
}
