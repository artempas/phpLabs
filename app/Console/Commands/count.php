<?php

namespace App\Console\Commands;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Console\Command;

class count extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:count {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get number of articles by tag__id';

    /**
     * Execute the console command.
     */
    public function handle(Article $article): void
    {
        $this->info("Found ".Tag::query()->find($this->argument('id'))->articles->count());
    }
}
