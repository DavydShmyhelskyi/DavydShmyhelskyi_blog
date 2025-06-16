<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class BlogPostAfterDeleteJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var int
     */
    private $blogPostId;
    
    /**
     * Create a new job instance.
     * 
     * @param int $blogPostId
     */
    public function __construct($blogPostId) // ЗАЛИШЕНО: як в оригіналі
    {
        $this->blogPostId = $blogPostId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void // ВИПРАВЛЕНО: додано тип повернення void
    {
        \Log::warning("Видалено запис в блозі [{$this->blogPostId}]"); // ВИПРАВЛЕНО: logs() замінено на \Log::warning()
    }
}