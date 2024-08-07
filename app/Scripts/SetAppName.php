<?php

namespace App\Scripts;

use Illuminate\Support\Facades\File;

class SetAppName
{
    public static function set()
    {
        echo "Please provide a name for your application: ";
        $appName = trim(fgets(STDIN));

        $envPath = base_path('.env');
        if (File::exists($envPath)) {
            File::put($envPath, preg_replace(
                '/^APP_NAME=.*$/m',
                'APP_NAME="' . $appName . '"',
                File::get($envPath)
            ));

            echo "Application name set to $appName in .env file.\n";
        } else {
            echo "Error: .env file not found.\n";
        }
    }
}
