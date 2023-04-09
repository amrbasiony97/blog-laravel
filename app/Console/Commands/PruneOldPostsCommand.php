<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\PruneOldPostsJob;

class PruneOldPostsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:prune-old-posts-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes posts older than 2 years';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        PruneOldPostsJob::dispatch();
    }
}
