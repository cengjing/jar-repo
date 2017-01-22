<?php

$file = $_GET['file'];
$config = require_once __DIR__ . '/config.php';

$parts = explode('-', str_replace('/', '', $file));

if (count($parts) != 2) {
        header('HTTP/1.1 404 Not Found');
        exit('404 File Not Found');
}

$base = preg_replace("/[^a-z]/", '', strtolower($parts[0]));
$version = str_replace('.jar.conf', '', $parts[1]);

if (!file_exists(__DIR__ . '/' . $base . '.conf')) {
        header('HTTP/1.1 404 Not Found');
        exit('404 File Not Found');
}

$contents = file_get_contents(__DIR__ . '/' . $base . '.conf');

$contents = str_replace('{{VERSION}}', ucfirst(strtolower($version)), $contents);
$contents = str_replace('{{FILE}}', '{$config['url']}/' . $base . '-' . $version . '.jar', $contents);
$contents = str_replace('{{CONFIG_FILE}}', '{$config['url']}/' . $base . '-' . $version . '.jar.conf', $contents);

header('Content-Type: text/plain');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s T', filemtime(__DIR__ . '/' . $base . '.conf')));
echo $contents;