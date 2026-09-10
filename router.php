<?php
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?: '/';
$full = __DIR__ . $path;

if ($path !== '/' && is_file($full)) {
    return false;
}

if ($path !== '/' && is_dir($full)) {
    $index = rtrim($full, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . 'index.php';
    if (is_file($index)) {
        require $index;
        return true;
    }
}

if ($path === '/' || $path === '') {
    require __DIR__ . '/index.php';
    return true;
}

$slug = ltrim($path, '/');
if (pathinfo($slug, PATHINFO_EXTENSION) === '') {
    $php = __DIR__ . '/' . $slug . '.php';
    if (is_file($php)) {
        require $php;
        return true;
    }
}

http_response_code(404);
echo '404 Not Found';
