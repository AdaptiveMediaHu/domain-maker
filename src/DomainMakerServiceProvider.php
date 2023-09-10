<?php

namespace RepositorioMaster\DomainMaker;

use Illuminate\Support\ServiceProvider;
use RepositorioMaster\DomainMaker\Console\DomainControllerMakeCommand;
use RepositorioMaster\DomainMaker\Console\DomainEnumMakeCommand;
use RepositorioMaster\DomainMaker\Console\DomainExceptionMakeCommand;
use RepositorioMaster\DomainMaker\Console\DomainFactoryMakeCommand;
use RepositorioMaster\DomainMaker\Console\DomainJobMakeCommand;
use RepositorioMaster\DomainMaker\Console\DomainMakeCommand;
use RepositorioMaster\DomainMaker\Console\DomainModelMakeCommand;
use RepositorioMaster\DomainMaker\Console\DomainRepositoryMakeCommand;
use RepositorioMaster\DomainMaker\Console\DomainRequestMakeCommand;
use RepositorioMaster\DomainMaker\Console\DomainResourceMakeCommand;
use RepositorioMaster\DomainMaker\Console\DomainRouteMakeCommand;
use RepositorioMaster\DomainMaker\Console\DomainServiceMakeCommand;

class DomainMakerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                DomainMakeCommand::class,
                DomainControllerMakeCommand::class,
                DomainRouteMakeCommand::class,
                DomainModelMakeCommand::class,
                DomainFactoryMakeCommand::class,
                DomainRequestMakeCommand::class,
                DomainJobMakeCommand::class,
                DomainResourceMakeCommand::class,
                DomainExceptionMakeCommand::class,
                DomainServiceMakeCommand::class,
                DomainRepositoryMakeCommand::class,
                DomainEnumMakeCommand::class,
            ]);
        }

        $this->publishes([
            __DIR__ . '/stubs/routes.stub' => base_path('stubs/routes.stub')
        ], 'domain-stubs');
    }
}
