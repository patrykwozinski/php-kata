<?php
declare(strict_types=1);

namespace Kata;


final class Year
{
	/** @var int */
	private $year;

	public function __construct(int $year)
	{
		$this->year = $year;
	}

	public function isLeap(): bool
	{
		return $this->isDividedBy($this->isDividedBy(100) ? 400 : 4);
	}

	private function isDividedBy(int $value): bool
	{
		return 0 === ($this->year % $value);
	}
}
