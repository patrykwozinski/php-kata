<?php
declare(strict_types=1);

namespace Tests\Kata;


use Kata\NegativesNotAllowedException;
use Kata\StringCalculator;
use PHPUnit\Framework\TestCase;

final class StringCalculatorTest extends TestCase
{
    /** @var StringCalculator */
    private $calculator;

    protected function setUp(): void
    {
        $this->calculator = new StringCalculator;
    }

    public function testAddEmptyString(): void
    {
        // Given
        $numbers = '';

        // When
        $result = $this->calculator->add($numbers);

        // Then
        self::assertEquals(0, $result);
    }

    public function testAddOneNumber(): void
    {
        // Given
        $numbers = '7';

        // When
        $result = $this->calculator->add($numbers);

        // Then
        self::assertEquals(7, $result);
    }

    public function testAddNumbersSeparatedByComma(): void
    {
        // Given
        $numbersSeparatedByComma = '1,2,8';

        //When
        $result = $this->calculator->add($numbersSeparatedByComma);

        //Then
        self::assertEquals(11, $result);
    }

    public function testAddWithGivenSeparator(): void
    {
        //Given
        $numbers = '1\n2,3';

        //When
        $result = $this->calculator->add($numbers);

        //Then
        self::assertEquals(6, $result);
    }

    public function testAddNumbersSeparatedByCustoms(): void
    {
        // Given
        $numbers = '//;\n1;2';

        // When
        $result = $this->calculator->add($numbers);

        // Then
        self::assertEquals(3, $result);
    }

    public function testFailAddingNegativesNumbers(): void
    {
        //Given
        $numbers = '1,-2,-3';

        //Expected
        $this->expectException(NegativesNotAllowedException::class);
        $this->expectExceptionMessage('negatives not allowed: -2 -3');

        //When
        $this->calculator->add($numbers);
    }

    public function testAddingIgnoresMoreThan1000(): void
    {
        // Given
        $numbers = '1001, 2';

        // When
        $result = $this->calculator->add($numbers);

        // When
        self::assertEquals(2, $result);
    }
}
