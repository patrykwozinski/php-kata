<?php
declare(strict_types=1);


namespace Kata;


interface Bank
{
	public function deposit(int $amount): void;

	public function withdraw(int $amount): void;

	public function printStatement(): void;
}
