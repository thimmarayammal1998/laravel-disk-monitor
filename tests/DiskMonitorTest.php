<?php

namespace Spatie\LaravelDiskMonitor\Tests;

use Illuminate\Support\Facades\Storage;
use Spatie\LaravelDiskMonitor\Commands\LaravelDiskMonitorCommand;

class DiskMonitorTest extends TestCase
{
    public function setup() : void {
        parent::setUp();

        Storage::fake('local');
    }
    /** @test */
    public function testing_file_is_exist()
    {
        Storage::disk('local')->put('test.txt','test');
        $this
        ->artisan(LaravelDiskMonitorCommand::class)
        ->assertExitCode($exitCode = 0);
        // $this->assertTrue(true);
    }
}
