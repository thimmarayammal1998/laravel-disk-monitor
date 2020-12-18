<?php

namespace Spatie\LaravelDiskMonitor\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Spatie\LaravelDiskMonitor\Models\DiskMonitorEntry;

class LaravelDiskMonitorCommand extends Command
{
    public $signature = 'disk-monitor:record-metrics';

    public $description = 'My command';

    public function handle()
    {
        $this->comment("Record Metrics");
        $disk_name = Config('laravel-disk-monitor.disk_name');
        $file_count = count(Storage::disk($disk_name)->allFiles());
        DiskMonitorEntry::create([
            "disk_name" => $disk_name,
            "file_count" => $file_count,
        ]);
        $this->comment('All done');
    }
}
