<?php

// Aktifkan error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Test autoloader
if (!file_exists(__DIR__ . '/../vendor/autoload.php')) {
    die('ERROR: vendor/autoload.php tidak ditemukan!');
}

require_once __DIR__ . '/../vendor/autoload.php';
echo "Autoloader OK<br>";

// Test bootstrap
if (!file_exists(__DIR__ . '/../bootstrap/app.php')) {
    die('ERROR: bootstrap/app.php tidak ditemukan!');
}
echo "Bootstrap OK<br>";

// Buat storage dirs
$dirs = [
    '/tmp/storage/app/public',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/views',
    '/tmp/storage/logs',
];
foreach ($dirs as $dir) {
    mkdir($dir, 0755, true);
}
echo "Storage OK<br>";

// Boot Laravel
$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->useStoragePath('/tmp/storage');
echo "App OK<br>";

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$request = Illuminate\Http\Request::capture();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);