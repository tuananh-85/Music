<?php
// config/config.php
// Compute a reasonable BASE_URL at runtime from the script location.
$script = $_SERVER['SCRIPT_NAME'] ?? '';
$base = rtrim(str_replace('/index.php', '', $script), '/');

return [
    'DB_HOST' => '127.0.0.1',
    'DB_NAME' => 'music_db',
    'DB_USER' => 'root',
    'DB_PASS' => '',
    // e.g. '/23N13/Music/public' or computed automatically from script name
    'BASE_URL' => $base,
];
