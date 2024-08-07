<?php

// Include Composer's autoloader
require __DIR__ . '/vendor/autoload.php';

// Ensure the script is run in the command line
if (php_sapi_name() !== 'cli') {
    exit('This script can only be run from the command line.');
}

// Prompt the user for the application name
echo "Please provide a name for your application: ";
$appName = trim(fgets(STDIN));

// Validate the input
if (empty($appName)) {
    exit("Application name cannot be empty.\n");
}

// Path to the .env file
$envPath = __DIR__ . '/.env';

// Check if the .env file exists
if (file_exists($envPath)) {
    // Get the content of the .env file
    $envContent = file_get_contents($envPath);

    // Update the APP_NAME in the .env file
    $newEnvContent = preg_replace('/^APP_NAME=.*$/m', 'APP_NAME="' . $appName . '"', $envContent);

    // Save the updated content back to the .env file
    file_put_contents($envPath, $newEnvContent);

    echo "Application name set to $appName in .env file.\n";
} else {
    echo "Error: .env file not found.\n";
}
