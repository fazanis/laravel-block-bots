<?php

namespace Fazanis\LaravelBlockBots\Console\Commands;

use Fazanis\LaravelBlockBots\Models\Bot;
use Illuminate\Console\Command;

class DeleteListClientCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delelte:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Bot::query()->delete();

        $this->info('Deleted');
    }
}
