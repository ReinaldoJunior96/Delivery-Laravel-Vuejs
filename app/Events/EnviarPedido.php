<?php

namespace App\Events;

use App\Models\Pedido;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EnviarPedido implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $pedido;
    public $usuarioNotificado;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($pedido, int $usuarioNotificado)
    {
        $this->pedido = $pedido;
        $this->usuarioNotificado = $usuarioNotificado;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('pedido.'. $this->usuarioNotificado);
    }

    public function broadcastAs()
    {
        return 'EnviarPedido';
    }

    public function broadcastWith()
    {
        return [
            'pedido'=> $this->pedido,
            'usuario' => $this->pedido->usuario
        ];
    }
}
