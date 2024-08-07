<?php

require __DIR__ . '/vendor/autoload.php';

// Ensure the script is run in the command line
if (php_sapi_name() !== 'cli') {
    exit('This script can only be run from the command line.');
}

// Get the project directory name
$projectName = basename(__DIR__);

// Validate the input
if (empty($projectName)) {
    exit("Project name cannot be empty.\n");
}

// Path to the .env file
$envPath = __DIR__ . '/.env';

// Check if the .env file exists
if (file_exists($envPath)) {
    // Get the content of the .env file
    $envContent = file_get_contents($envPath);

    // Update the APP_NAME in the .env file
    $newEnvContent = preg_replace('/^APP_NAME=.*$/m', 'APP_NAME=' . $projectName . '', $envContent);

    // Save the updated content back to the .env file
    file_put_contents($envPath, $newEnvContent);

    echo "Application name set to $projectName in .env file.\n";
} else {
    echo "Error: .env file not found.\n";
}
