<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarrinhoTabela extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrinhos', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_carrinho')->nullable();
            $table->unsignedBigInteger('usuario_carrinho');
            $table->unsignedBigInteger('produto_carrinho');
            $table->text('complemento_produto_carrinho')->nullable();
            $table->decimal('valor_un_total',10,2);
            $table->timestamps();

            $table->foreign('usuario_carrinho')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('produto_carrinho')->references('id')->on('produtos')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carrinho');
    }
}
