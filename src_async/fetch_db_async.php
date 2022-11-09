<?php

declare(strict_types=1);

require './db_connect.php';
require './db_queries.php';
require 'vendor/autoload.php';

use Amp\Delayed;
use Amp\Loop;
use function Amp\asyncCall;
$pdo = getPdo();

$results = [];
asyncCall(function () use ($pdo, &$results) {
    for ($i = 0; $i < 10; $i++) {
        var_dump($result = isHashedNumberFound($i * 200_000, $pdo), microtime(true));
        $results[] = $result;
        yield new Delayed(0);
    }
});

$before = microtime(true);
print "-- before Loop::run()" . PHP_EOL;

Loop::run();

print "-- after Loop::run()" . PHP_EOL;
var_dump($results);
echo (microtime(true) - $before) . 's' . PHP_EOL;
