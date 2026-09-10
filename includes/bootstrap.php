<?php

declare(strict_types=1);

function sam_config(): array
{
    static $config;
    if ($config === null) {
        $config = require __DIR__ . '/app-config.php';
    }
    return $config;
}

function sam_db(): PDO
{
    static $pdo;
    if ($pdo instanceof PDO) {
        return $pdo;
    }

    $config = sam_config();
    $dbPath = $config['database']['path'];
    $dbDir = dirname($dbPath);
    if (!is_dir($dbDir)) {
        mkdir($dbDir, 0775, true);
    }

    $pdo = new PDO('sqlite:' . $dbPath);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->exec(
        'CREATE TABLE IF NOT EXISTS enquiries (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            source_page TEXT NOT NULL,
            full_name TEXT NOT NULL,
            first_name TEXT,
            last_name TEXT,
            email TEXT NOT NULL,
            phone TEXT,
            inquiry_type TEXT,
            organization TEXT,
            age TEXT,
            injury TEXT,
            message TEXT,
            status TEXT NOT NULL DEFAULT "new",
            customer_mail_sent INTEGER NOT NULL DEFAULT 0,
            internal_mail_sent INTEGER NOT NULL DEFAULT 0,
            customer_mail_error TEXT,
            internal_mail_error TEXT,
            ip_address TEXT,
            user_agent TEXT,
            payload_json TEXT,
            created_at TEXT NOT NULL
        )'
    );

    return $pdo;
}

function sam_h(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function sam_build_absolute_url(string $path): string
{
    $base = rtrim(sam_config()['site']['base_url'], '/');
    if (preg_match('#^https?://#i', $path)) {
        return $path;
    }
    return $base . '/' . ltrim($path, '/');
}
