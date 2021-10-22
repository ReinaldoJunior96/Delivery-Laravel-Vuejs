<?php

namespace Database\Seeders;

use App\Models\Produto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $protuto_n = 'Sorvete Copo 200ml';
        $protuto_k = 'Casquinha Pequena';
        Produto::create([
            'produto_nome' => $protuto_n,
            'slug' => Str::slug($protuto_n),
            'produto_preco' => 5.20,
            'produto_categoria' => 1,
            'produto_disponibilidade' => true,
            'produto_descricao' => null,
        ]);
        Produto::create([
            'produto_nome' => $protuto_k,
            'slug' => Str::slug($protuto_k),
            'produto_preco' => 3.20,
            'produto_categoria' => 1,
            'produto_disponibilidade' => true,
            'produto_descricao' => null,
        ]);
    }
}
