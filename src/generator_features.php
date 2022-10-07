<?php

declare(strict_types=1);

function createGenerator(): Generator
{
    for ($i = 0; $i < 5; $i++) {
        yield $i;
    }
}

$generator = createGenerator();

var_dump($generator);

//var_dump($generator->current());
//$generator->next(); // 1
//var_dump($generator->current());
//
//$generator->next(); // 2
//$generator->next(); // 3
//$generator->next(); // 4
//$generator->next(); // null
//var_dump($generator->current());
//
//$newGenerator = createGenerator();
//
//foreach ($newGenerator as $item) {
//    var_dump($item);
//}
