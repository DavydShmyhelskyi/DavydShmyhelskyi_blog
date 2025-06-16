<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\BlogPost; // ДОДАНО: імпорт моделі BlogPost

class BlogPostAfterCreateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var BlogPost
     */
    private $blogPost; // ДОДАНО: властивість для зберігання BlogPost

    /**
     * Create a new job instance.
     */
    public function __construct(BlogPost $blogPost) // ВИПРАВЛЕНО: конструктор приймає BlogPost
    {
        $this->blogPost = $blogPost;
    }

    /**
     * Execute the job.
     */
    public function handle(): void // ВИПРАВЛЕНО: додано тип повернення void
    {
        \Log::info("Створено новий запис в блозі [{$this->blogPost->id}]"); // ВИПРАВЛЕНО: logs() замінено на \Log::info()
    }
}