<?php

declare(strict_types=1);

function getPdo()
{
    $dsn = sprintf("mysql:host=%s;dbname=%s;charset=utf8mb4", getenv('MYSQL_HOST'), getenv('MYSQL_DATABASE'));
    try {
        $pdo = new PDO($dsn, getenv('MYSQL_USER'), getenv('MYSQL_PASSWORD'));
        return $pdo;
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
}
