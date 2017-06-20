<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ExampleCommand extends Command
{
    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'command:name {--flag : A flag without parameter.}
        {--parameter= : Use to require a parameter.}
        {--optional=* : Use to make parameter optional.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Description';

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
        // Command here
        $this->line('<info>Info</info> <comment>Comment</comment>');
    }
}
