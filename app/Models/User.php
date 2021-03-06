<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'email',
        'password',
        'type_user'
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin(): bool
    {
        return $this->type_user === 1;
    }

    public function isUser(): bool
    {
        return $this->type_user === 0;
    }

    public function carrinhos()
    {
        return $this->hasMany(Carrinho::class, 'usuario_carrinho','id');
    }

    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'usuario_pedido', 'id');
    }
}
