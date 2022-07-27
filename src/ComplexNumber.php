<?php

declare(strict_types=1);

namespace App;

use InvalidArgumentException;

/**
 * @property float $real
 * @property float $imaginary
 */
class ComplexNumber
{
    public function __construct(
        private float $real,
        private float $imaginary
    )
    {
    }

    /**
     * @return float
     */
    public function getReal(): float
    {
        return $this->real;
    }

    /**
     * @return float
     */
    public function getImaginary(): float
    {
        return $this->imaginary;
    }

    public function __get(string $property): mixed
    {
        $method = "get{$property}";
        if (method_exists($this, $method) === false) {
            throw new InvalidArgumentException('Such property doesn\'t exist');
        }

        return $this->$method();
    }

    public function __set(string $property, mixed $value): void
    {
        throw new InvalidArgumentException('Operation is forbidden');
    }

    public function __toString(): string
    {
        $string = '';
        if ($this->real !== 0.0) {
            $string = (string) $this->real;
        }
        if ($this->imaginary !== 0.0) {
            if (abs($this->imaginary) !== 1.0) {
                $sign = $this->imaginary > 0.0 ? '+' : '';
                $string .= $sign . $this->imaginary . 'i';
            } else {
                $sign = $this->imaginary < 0.0 ? '-' : '';
                $string .= $sign . 'i';
            }
        }

        if ($string === '') {
            $string = '0.0';
        }
        return $string;
    }
}