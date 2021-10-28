<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePedidos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_pedido');
            $table->integer('numero_pedido');
            $table->text('produtos_pedido');
            $table->string('troco_pedido')->nullable();
            $table->text('informacoes_entrega');
            $table->decimal('valor_total',10,2);
            $table->integer('status_pedido');
            $table->timestamps();

            $table->foreign('usuario_pedido')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
