<?php

declare(strict_types=1);

use App\ComplexNumber;
use App\ComplexArithmetic;

require __DIR__ . '/vendor/autoload.php';

$complex = new ComplexNumber(1, 2);
$complex2 = new ComplexNumber(3, 4);

$result = ComplexArithmetic::divideBy($complex, $complex2);

echo $result;