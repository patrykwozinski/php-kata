<?php
declare(strict_types=1);

namespace Kata;



final class StringCalculator
{
    public function add(string $numbers): int
    {
        $separator = ',';

        $slashes = \substr($numbers, 0, 2);
        if ('//' === $slashes) {
            $separator = $numbers[2];
            $numbers = \substr($numbers, 5);
        }

        $numbersWithCommas = \str_replace('\n', $separator, $numbers);
        $separatedNumbers = \explode($separator, $numbersWithCommas);
        $intNumbers = \array_map('intval', $separatedNumbers);

        $negativeNumbers = \array_filter($intNumbers, static function (int $number): bool {
            return $number < 0;
        });

        $numbersInRange = \array_filter($intNumbers, static function(int $number): bool {
           return $number <= 1000;
        });

        if (\count($negativeNumbers) > 0) {
            throw NegativesNotAllowedException::withNumbers($negativeNumbers);
        }

        return \array_sum($numbersInRange);
    }
}
