<?php

namespace App\Services;

/**
 * Class Ean13Generator
 * @package App\Services
 *
 * @property array $numbers
 */
class Ean13Generator
{
    private $numbers;

    public function getNextValue(int $value): int
    {
        $firstPart = substr($value, 0, 12);
        $firstPart++;
        $this->numbers = str_split($firstPart);
        $lastNumber = $this->calculateLastNumber();
        $result = $firstPart.$lastNumber;

        return $result;
    }

    private function calculateLastNumber(): int
    {
        $result = $this->sumHalfNumbers(true);
        $result *= 3;
        $result += $this->sumHalfNumbers(false);
        $result %= 10;
        if ($result) {
            $result = 10 - $result;
        }

        return $result;
    }

    private function sumHalfNumbers(bool $even): int
    {
        $sum = 0;
        for ($i = (int) $even; $i < 12; $i += 2) {
            $sum += $this->numbers[$i];
        }

        return $sum;
    }
}
