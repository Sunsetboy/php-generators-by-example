<?php

declare(strict_types=1);

function isHashedNumberFound(int $number, PDO $pdo): bool
{
    $hash = md5((string)$number);
    $stmt = $pdo->prepare('SELECT * FROM test_data where hash = :hash');
    $stmt->execute(['hash' => $hash]);
    $row = $stmt->fetch();

    return $row !== false;
}
