<?php

declare(strict_types=1);

require './db_connect.php';

$pdo = getPdo();

function fetchAll(PDO $pdo): array
{
    $sql = 'SELECT * FROM test_data limit 10000';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function getReader(PDO $pdo): Iterator
{
    $sql = 'SELECT * FROM test_data limit 10000';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    foreach ($stmt as $row) {
        yield $row;
    }
}

//foreach (fetchAll($pdo) as $item) {
//    $lastLetter = substr($item['hash'],0,1);
//}

foreach (getReader($pdo) as $item) {
    $lastLetter = substr($item['hash'],0,1);
}

echo 'Memory used: ' . (memory_get_peak_usage(true) / 1024) . ' KB' . PHP_EOL;
