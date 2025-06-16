<?php

namespace App\Jobs\GenerateCatalog;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AbstractJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        $this->onQueue('generate-catalog'); // черга по замовчанню
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
    $this->debug('done');
   }

    protected function debug(string $msg): void // ДОДАНО: тип повернення
    {
        $class = static::class;
        $msg = $msg . " [{$class}]";
        \Log::info($msg);
    }
}