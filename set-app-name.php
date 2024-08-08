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

// Define the environment variables to set
$envVariables = [
    'APP_NAME' => $projectName,
    'DB_DATABASE' => $projectName
];

// Path to the .env file
$envPath = __DIR__ . '/.env';

// Check if the .env file exists
if (file_exists($envPath)) {
    // Get the content of the .env file
    $envContent = file_get_contents($envPath);

    // Update each environment variable in the .env file
    foreach ($envVariables as $key => $value) {
        $envContent = preg_replace(
            '/^' . $key . '=.*$/m',
            $key . '=' . $value . '',
            $envContent
        );
    }

    // Save the updated content back to the .env file
    file_put_contents($envPath, $envContent);

    echo "Environment variables set in .env file:\n";
    foreach ($envVariables as $key => $value) {
        echo "$key=$value\n";
    }
} else {
    echo "Error: .env file not found.\n";
}
