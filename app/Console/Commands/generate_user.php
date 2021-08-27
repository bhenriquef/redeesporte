<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Model\Usuario;
use Illuminate\Support\Facades\Hash;

class generate_user extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:generate_user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        Usuario::create([
            'nome' => "teste",
            'email' => "teste@teste.con",
            'senha' => Hash::make("123456"),
            'telefone' => "99999999999",
        ]);

        echo "usuario gerado com sucesso";
    }
}
