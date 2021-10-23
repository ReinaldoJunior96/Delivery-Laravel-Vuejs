<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['usuario_pedido','produtos_pedido','troco_pedido','informacoes_entrega','valor_total'];

    public function usuario()
    {
        return $this->hasOne(User::class, 'id', 'usuario_pedido');
    }
}
