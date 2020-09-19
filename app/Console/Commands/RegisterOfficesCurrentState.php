<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RegisterOfficesCurrentState extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reg:ocstate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Registra el estado de las Sucursales';

    /**
     * Create a new command instance.
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
        \Log::info('Mi Comando Funciona!');

        /*
           Write your database logic we bellow:
           Item::create(['name'=>'hello new']);
        */

        $this->info('reg:ocstate Ejecutado Exitosamente!');
    }
}
