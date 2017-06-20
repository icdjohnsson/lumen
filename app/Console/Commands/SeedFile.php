<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SeedFile extends Command
{
    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'seed:file {--file= : Chose a .json file to seed.}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed database with a specific .json file';

    /**
     * Create a new command instance.
     *
     * @param  \Illuminate\Filesystem\Filesystem  $files
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $this->line('<info>Starting</info> <comment>Starting</comment>');
    }
}
