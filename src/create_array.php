<?php

declare(strict_types=1);

function createArray($size): array
{
    $arr = [];

    for ($i = 0; $i < $size; $i++) {
        $arr[] = $i;
    }
    return $arr;
}

function createArrayGenerator($size): Generator
{
    for ($i = 0; $i < $size; $i++) {
        yield $i;
    }
}

// calculate a sum of all elements
$sum = 0;

//foreach (createArray(1_000_000) as $item) {
//    $sum += $item;
//}

foreach (createArrayGenerator(1_000_000) as $item) {
    $sum += $item;
}

echo 'Sum: ' . $sum . PHP_EOL;

echo 'Memory used: ' . (memory_get_peak_usage(true) / 1024) . ' KB' . PHP_EOL;
