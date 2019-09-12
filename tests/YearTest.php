<?php
declare(strict_types=1);

namespace Tests\Kata;


use Kata\Year;
use PHPUnit\Framework\TestCase;

final class YearTest extends TestCase
{
	private const YEAR_NOT_DIVISIBLE_BY_4                 = 1997;
	private const YEAR_DIVISIBLE_BY_4                     = 1996;
	private const YEAR_DIVISIBLE_BY_400                   = 1600;
	private const YEAR_DIVISIBLE_BY_4_AND_100_BUT_NOT_400 = 1800;

	/** @var Year */
	private $year;

	public function testYearIsNotLeapWhenNotDivisibleBy4(): void
	{
		$this->givenYear(self::YEAR_NOT_DIVISIBLE_BY_4);
		$this->thenYearIsNotLeap();
	}

	public function testYearIsLeapWhenDivisibleBy4(): void
	{
		$this->givenYear(self::YEAR_DIVISIBLE_BY_4);
		$this->thenYearIsLeap();
	}

	public function testYearIsLeapWhenIsDivisible400(): void
	{
		$this->givenYear(self::YEAR_DIVISIBLE_BY_400);
		$this->thenYearIsLeap();
	}

	public function testYearIsNotLeapWhenDivisibleBy100ButNot400(): void
	{
		$this->givenYear(self::YEAR_DIVISIBLE_BY_4_AND_100_BUT_NOT_400);
		$this->thenYearIsNotLeap();
	}

	private function givenYear(int $year): void
	{
		$this->year = new Year($year);
	}

	private function thenYearIsNotLeap(): void
	{
		self::assertFalse($this->year->isLeap(), 'Shouldn\'t be leap');
	}

	private function thenYearIsLeap(): void
	{
		self::assertTrue($this->year->isLeap(), 'Should be leap');
	}
}
