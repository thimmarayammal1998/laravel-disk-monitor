<?php

namespace Spatie\LaravelDiskMonitor\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use Spatie\LaravelDiskMonitor\LaravelDiskMonitorServiceProvider;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Spatie\\LaravelDiskMonitor\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelDiskMonitorServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        // $app['config']->set('database.default', 'sqlite');
        // $app['config']->set('database.connections.sqlite', [
        //     'driver' => 'sqlite',
        //     'database' => ':memory:',
        //     'prefix' => '',
        // ]);


        // include_once __DIR__.'/../database/migrations/create_laravel_disk_monitor_table.php.stub';
        // (new \CreateLaravelDiskMonitorTable())->up();
    }
}
