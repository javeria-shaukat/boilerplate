<?php

require __DIR__ . '/vendor/autoload.php';

use Illuminate\Support\Facades\File;

echo "Please provide a name for your application: ";
$appName = trim(fgets(STDIN));

$envPath = __DIR__ . '/.env';
if (file_exists($envPath)) {
    $envContent = file_get_contents($envPath);
    $envContent = preg_replace('/^APP_NAME=.*$/m', 'APP_NAME="' . $appName . '"', $envContent);
    file_put_contents($envPath, $envContent);

    echo "Application name set to $appName in .env file.\n";
} else {
    echo "Error: .env file not found.\n";
}
