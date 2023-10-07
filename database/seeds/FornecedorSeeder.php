<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $f = new Fornecedor();
        $f->nome = 'Fornecedor 001';
        $f->site = 'f001.com';
        $f->uf = 'CE';
        $f->email = 'f001@g.com';
        $f->save();

        Fornecedor::create(['nome' => 'f002', 'site' => 'f002.com', 'uf' => 'PB', 'email' => 'f002@g.com']);

        DB::table('fornecedores')->insert(['nome' => 'f003', 'site' => 'f003.com', 'uf' => 'P', 'email' => 'f003@g.com']);
    }
}
