<?php

declare(strict_types=1);

require './db_connect.php';

$pdo = getPdo();

for ($i=0; $i<1_000_000; $i++) {
    echo $i . PHP_EOL;
    $sql = "INSERT INTO test_data (hash) VALUES (?)";
    $pdo->prepare($sql)->execute([md5((string)$i)]);
}
