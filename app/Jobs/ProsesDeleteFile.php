<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProsesDeleteFile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $path, $image;
    public function __construct($path,$image)
    {
        $this->path = $path;
        $this->image = $image;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $filePath = $this->path . '/' . $this->image;


        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }
}
