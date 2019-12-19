<?php
declare(strict_types=1);

namespace Tests\Kata;


use Kata\Example;
use PHPUnit\Framework\TestCase;

final class ExampleTest extends TestCase
{
    public function testHello(): void
    {
        $example = new Example();

        self::assertEquals('Hello World', $example->sayHi());
    }
}
