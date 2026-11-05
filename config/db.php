<?php
/**
 * Database Configuration & Connection Handler
 * Supports:
 *   1. SQLite (zero configuration, works instantly out-of-the-box on localhost / any server)
 *   2. MySQL (standard cPanel, live hosting, or local XAMPP/WAMP)
 */

class Database {
    // Set to 'sqlite' or 'mysql'
    // Can also be overridden by environment variable DB_DRIVER
    private static $driver = 'sqlite';

    // MySQL connection settings (if driver is set to mysql)
    private static $mysqlHost = '127.0.0.1';
    private static $mysqlPort = '3306';
    private static $mysqlDb   = 'khizu_stationery';
    private static $mysqlUser = 'root';
    private static $mysqlPass = '';

    // SQLite file path
    private static $sqlitePath = __DIR__ . '/../database/khizu.sqlite';

    private static $pdo = null;

    public static function getConnection() {
        if (self::$pdo !== null) {
            return self::$pdo;
        }

        $driver = getenv('DB_DRIVER') ?: self::$driver;

        try {
            if ($driver === 'mysql') {
                $host = getenv('DB_HOST') ?: self::$mysqlHost;
                $port = getenv('DB_PORT') ?: self::$mysqlPort;
                $dbname = getenv('DB_NAME') ?: self::$mysqlDb;
                $user = getenv('DB_USER') ?: self::$mysqlUser;
                $pass = getenv('DB_PASS') !== false ? getenv('DB_PASS') : self::$mysqlPass;

                $dsn = "mysql:host={$host};port={$port};dbname={$dbname};charset=utf8mb4";
                self::$pdo = new PDO($dsn, $user, $pass, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ]);
            } else {
                // SQLite default
                $dir = dirname(self::$sqlitePath);
                if (!is_dir($dir)) {
                    mkdir($dir, 0777, true);
                }

                $isNew = !file_exists(self::$sqlitePath);
                $dsn = 'sqlite:' . self::$sqlitePath;
                self::$pdo = new PDO($dsn, null, null, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]);

                // Enable foreign keys in SQLite
                self::$pdo->exec('PRAGMA foreign_keys = ON;');

                // If SQLite database file is newly created or empty, initialize tables and seed data
                if ($isNew || filesize(self::$sqlitePath) === 0) {
                    self::initDatabase();
                }
            }
        } catch (PDOException $e) {
            // Friendly error message with fallback or instructions
            error_log("Database connection error: " . $e->getMessage());
            die(json_encode([
                'success' => false,
                'error' => 'Database connection failed: ' . $e->getMessage()
            ]));
        }

        return self::$pdo;
    }

    /**
     * Initializes database schema and default seeds
     */
    public static function initDatabase() {
        $pdo = self::$pdo;
        $schemaFile = __DIR__ . '/../database/schema.sql';
        $seedFile = __DIR__ . '/../database/seed.sql';

        if (file_exists($schemaFile)) {
            $sql = file_get_contents($schemaFile);
            $pdo->exec($sql);
        }

        if (file_exists($seedFile)) {
            // Check if products already exist
            $chk = $pdo->query("SELECT count(*) as cnt FROM products")->fetch();
            if ($chk && (int)$chk['cnt'] === 0) {
                $seedSql = file_get_contents($seedFile);
                $pdo->exec($seedSql);
            }
        }
    }
}
