<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model
{
    use HasFactory;

    protected $fillable = ['numero_carrinho','usuario_carrinho','produto_carrinho','complemento_produto_carrinho','valor_un_total'];

    public function produto()
    {
        return $this->hasOne(Produto::class,'id', 'produto_carrinho');
    }

    public function usuario()
    {
        return $this->hasOne(User::class, 'id', 'usuario_carrinho');
    }
    
}
