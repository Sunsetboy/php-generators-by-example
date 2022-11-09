<?php

declare(strict_types=1);

require './db_connect.php';
require './db_queries.php';

$pdo = getPdo();

// sync version of DB fetch: fetching records one by one


$before = microtime(true);
for ($i = 0; $i < 100; $i++) {
    var_dump(isHashedNumberFound($i * 200_000, $pdo), microtime(true));
}
echo (microtime(true) - $before) . 's' . PHP_EOL;
