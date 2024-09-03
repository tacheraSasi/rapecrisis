<?php
require_once './parseEnv.php';
// Usage Example
try {
    parseEnv(__DIR__ . '/.env');

    $databaseUrl = getenv('TEST');
    $apiKey = getenv('OPENAI_API_KEY');

    echo "TEST Value: " . ($databaseUrl !== false ? $databaseUrl : "Not set") . PHP_EOL;
    echo "OPENAI_API_KEY: " . ($apiKey !== false ? $apiKey : "Not set") . PHP_EOL;
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
