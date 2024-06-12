<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProsesUploadFile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

    protected $path, $file, $name;
    public function __construct(string $path, $file,string $name)
    {
        $this->path = $path;
        $this->file = $file;
        $this->name = $name;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $file = $this->file->file($this->name);
        $new_name = random_int(100,100000).'-'.$file->getClientOriginalName();
        $file->move($this->path,$new_name);
        return $new_name;
    }
}
