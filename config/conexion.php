<?php
declare(strict_types=1);

const APP_NAME = 'SIGADEA';

// Datos de MySQL en Railway
const DB_HOST = 'zephyr.proxy.rlwy.net';
const DB_NAME = 'clinica';
const DB_USER = 'root';
const DB_PASS = 'dGkSwdqkiqDQkqDLquJWZANVYVnZVIjZ';
const DB_PORT = 11902;
const DB_CHARSET = 'utf8mb4';

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$conn->set_charset(DB_CHARSET);

define('BASE_PATH', dirname(__DIR__));
define('UPLOAD_PATH', BASE_PATH . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'documents');
define('BACKUP_PATH', BASE_PATH . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'backups');
define('REPORT_PATH', BASE_PATH . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'reports');

date_default_timezone_set('America/Mexico_City');
