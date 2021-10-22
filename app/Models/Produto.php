<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $fillable = [
        'produto_nome','produto_preco','slug','produto_categoria','produto_disponibilidade','produto_descricao'
    ];


    public function carrinhos()
    {
        return $this->hasMany(Carrinho::class, 'produto_carrinho', 'id');
    }
}
