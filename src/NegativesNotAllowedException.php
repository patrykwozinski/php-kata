<?php
declare(strict_types=1);

namespace Kata;


use Exception;

final class NegativesNotAllowedException extends Exception
{
    public static function withNumbers(array $negativeNumbers): self
    {
        $message = \sprintf('negatives not allowed: %s', \implode(' ', $negativeNumbers));

        return new self($message);
    }
}
