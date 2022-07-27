<?php

declare(strict_types=1);

namespace App;

use JetBrains\PhpStorm\Pure;

class ComplexArithmetic
{
    /**
     * (x1+iy1)+(x2+iy2)=(x1+x2)+i(y1+y2)
     */
    #[Pure] public static function add(ComplexNumber $a, ComplexNumber $b): ComplexNumber
    {
        $_real = $a->real + $b->real;
        $_imaginary = $a->imaginary + $b->imaginary;

        return new ComplexNumber($_real, $_imaginary);
    }

    /**
     * (x1+iy1)-(x2+iy2)=(x1-x2)+i(y1-y2)
     */
    #[Pure] public static function subtract(ComplexNumber $minuend, ComplexNumber $subtrahend): ComplexNumber
    {
        $_real = $minuend->real - $subtrahend->real;
        $_imaginary = $minuend->imaginary - $subtrahend->imaginary;
        return new ComplexNumber($_real, $_imaginary);
    }

    /**
     * (x1+iy1)(x2+iy2)=x1x2−y1y2+(x1y2+x2y1)i
     */
    #[Pure] public static function multiply(ComplexNumber $multiplicand, ComplexNumber $multiplier): ComplexNumber
    {
        $_real = $multiplicand->getReal() * $multiplier->getReal() - $multiplicand->getImaginary() * $multiplier->getImaginary();
        $_imaginary = $multiplicand->getReal() * $multiplier->getImaginary() + $multiplicand->getImaginary() * $multiplier->getReal();
        return new ComplexNumber($_real, $_imaginary);
    }

    /**
     * x1+iy / x2+iy2 = ((x1x2+y1y2) / (pow(x2)+pow(y2))) + ((y1x2−x1y2) / (pow(x2)+pow(y2)))i
     */
    #[Pure] public static function divideBy(ComplexNumber $dividend, ComplexNumber $divisor): ComplexNumber
    {
        $result_denominator = pow($divisor->real, 2) + pow($divisor->imaginary, 2);
        $_real = ($dividend->real * $divisor->real + $dividend->imaginary * $divisor->imaginary) / $result_denominator;
        $_imaginary = ($dividend->imaginary * $divisor->real - $dividend->real * $divisor->imaginary) / $result_denominator;
        return new ComplexNumber($_real, $_imaginary);
    }

}