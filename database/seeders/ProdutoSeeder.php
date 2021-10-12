<?php

namespace Database\Seeders;

use App\Models\Produto;
use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produto::create([
            'produto_nome' => 'Sorvete - Copo 200ml',
            'produto_preco' => 1200.20,
            'produto_categoria' => 1,
            'produto_disponibilidade' => false,
            'produto_descricao' => null,
        ]);
    }
}
