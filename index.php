<?php

$files = scandir(__DIR__);
$config = require_once __DIR__ . '/config.php';

$body = "";
$count = 0;

foreach ($files as $file) {
        if (substr($file, -4) === '.jar') {
                $date = gmdate('D, d M Y H:i:s T', filemtime(__DIR__ . '/' . $file));
                $body .= "<tr><td>{$file}</td><td>{$date}</td><td><a href=\"{$config['url']}/{$file}\">{$config['url']}/{$file}</a></td><td><a href=\"{$config['url']}/{$file}.conf\">{$config['url']}/{$file}.conf</a></td></tr>";
                $count++;
        }
}
?>
<!DOCTYPE html>
<html>
<head>
        <title>Jar Repository</title>

        <style>
        th, td {
                padding: 5px ;
        }
        </style>
</head>
<body>

<p style="margin-top: 50px; text-align: center">This repository contains <?php echo $count; ?> different jar files.</p>

<table border="1" style="margin: auto; margin-top: 50px;"">
        <thead>
                <tr>
                        <th>JAR File</th>
                        <th>JAR Date</th>
                        <th>JAR Link</th>
                        <th>JAR Config Link</th>
                </tr>
        </thead>
        <tbody>
                <?php echo $body; ?>
        </tbody>
</table>
</body>
</html>