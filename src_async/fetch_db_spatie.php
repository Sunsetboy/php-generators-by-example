<?php

declare(strict_types=1);
require './db_connect.php';
require './db_queries.php';
require 'vendor/autoload.php';

use Spatie\Async\Pool;

$dsn = sprintf("mysql:host=%s;dbname=%s;charset=utf8mb4", getenv('MYSQL_HOST'), getenv('MYSQL_DATABASE'));

$start = microtime(true);

$pool = Pool::create();
$results = [];

for ($i = 0; $i < 100; $i++) {
    $pool->add(
        function () use ($i, $dsn) {
            if (function_exists('isHashedNumberFound')) {
                echo 'function exists inside the pool' . PHP_EOL;
            }
            $pdo = new PDO($dsn, getenv('MYSQL_USER'), getenv('MYSQL_PASSWORD'));

            $hash = md5((string)($i * 200_000));
            $stmt = $pdo->prepare('SELECT * FROM test_data where hash = :hash');
            $stmt->execute(['hash' => $hash]);
            $row = $stmt->fetch();

            return [$i, $row !== false];
        }
    )->then(function ($output) use (&$results) {
        $results[$output[0]] = $output[1];
    })->catch(function (Throwable $exception) {
        var_dump($exception->getMessage());
    });
}

$pool->wait();
var_dump($results);
echo (microtime(true) - $start) . 's' . PHP_EOL;
