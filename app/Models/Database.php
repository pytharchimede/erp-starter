<?php

namespace App\Models;

use PDO;

final class Database
{
    private static ?PDO $pdo = null;

    public static function getConnection(): PDO
    {
        if (self::$pdo instanceof PDO) return self::$pdo;
        $config = require BASE_PATH . '/config/database.php';
        if ($config['driver'] === 'sqlite') {
            self::$pdo = new PDO('sqlite:' . $config['sqlite_path']);
        } else {
            $dsn = sprintf('mysql:host=%s;dbname=%s;charset=%s', $config['host'], $config['database'], $config['charset']);
            self::$pdo = new PDO($dsn, $config['username'], $config['password']);
        }
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return self::$pdo;
    }
}
