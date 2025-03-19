<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Hello extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Hello';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Printing Hello';

    /*Create a new command instance.
    /**
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //print_r($this->options());
        //print_r($this->argument());
        $email1=$this->secret('What is your email id ?');
        echo $email1;
        //echo "\nHello";
        return 0;
    }
}
