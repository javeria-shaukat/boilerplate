<?php

namespace Laravel\BoilerplatePackage;

use Composer\Command\CreateProjectCommand;
use Composer\Plugin\Capability\CommandProvider as CommandProviderCapability;
use Composer\Plugin\PluginInterface;
use Composer\Plugin\Capable;
use Composer\Composer;
use Composer\IO\IOInterface;

class InstallerPlugin implements PluginInterface, Capable
{
    public function activate(Composer $composer, IOInterface $io)
    {
        // No activation actions needed
    }

    public function deactivate(Composer $composer, IOInterface $io)
    {
        // No deactivation actions needed
    }

    public function uninstall(Composer $composer, IOInterface $io)
    {
        // No uninstallation actions needed
    }

    public function getCapabilities()
    {
        return [
            CommandProviderCapability::class => CommandProvider::class,
        ];
    }
}

class CommandProvider implements CommandProviderCapability
{
    public function getCommands()
    {
        return [new \Laravel\BoilerplatePackage\Console\Commands\CreateProjectCommand()];
    }
}
