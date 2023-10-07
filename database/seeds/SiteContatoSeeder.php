<?php

use App\SiteContato;
use Illuminate\Database\Seeder;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // SiteContato::create([
        //     'nome' => 'João',
        //     'telefone' => '839888888',
        //     'email' => 'joao@gmail.com',
        //     'motivo_contato' => 1,
        //     'mensagem' => 'Entrando em contato por aqui'
        // ]);
        factory(SiteContato::class, 100)->create();
    }
}
