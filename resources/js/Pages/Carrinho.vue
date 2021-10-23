<template>
    <div class="d-flex flex-column vh-100">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Carrinho</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Confime seu pedido</h3>
                    </div>
                    <div class="card-body p-0">
                        <ul class="products-list product-list-in-card pl-2 pr-2">
                            <li v-for="produto in pedidoUsuario.produtosCarrinho" :key="produto.id" class="item">
                                <Link class="product-title">{{ produto.produto.produto_nome }}
                                    <span class="badge badge-warning float-right">
                                        {{
                                            Number(produto.valor_un_total).toLocaleString('pt-br', {
                                                style: 'currency',
                                                currency: 'BRL'
                                            })
                                        }}
                                    </span>
                                </Link>
                                <span class="product-description">
                                    {{ produto.complemento_produto_carrinho }}
                                </span>
                                <span @click="removerProdDoCarrinho(produto.id)" class="badge mt-2 float-right">
                                    <i class="fas fa-trash-alt produtoRemovidoDoCarrinho"></i>
                                </span>
                            </li>
                        </ul>
                        <ul class="products-list product-list-in-card pl-2 pr-2">
                            <li class="item">
                                <span class="product-title">
                                    Valor do pedido
                                    <span class="badge float-right">
                                        {{
                                            Number(pedidoUsuario.valorTotalPedido).toLocaleString('pt-br', {
                                                style: 'currency',
                                                currency: 'BRL'
                                            })
                                        }}
                                    </span>
                                </span>

                            </li>
                            <li class="item">
                                <span class="product-title">
                                    Taxa de entrega
                                    <span class="badge float-right">
                                        {{
                                            Number(taxaEntrega).toLocaleString('pt-br', {
                                                style: 'currency',
                                                currency: 'BRL'
                                            })
                                        }}
                                    </span>
                                </span>

                            </li>
                            <li class="item">
                                <span class="product-title">
                                    Total a pagar
                                    <span class="badge float-right">
                                        {{
                                            Number(pedidoUsuario.totalAPagar).toLocaleString('pt-br', {
                                                style: 'currency',
                                                currency: 'BRL'
                                            })
                                        }}
                                    </span>
                                </span>

                            </li>
                        </ul>

                    </div>
                </div>
                <div class="form-group">
                    <label>Precisa de troco? Informe para quanto</label>
                    <input v-model="pedidoUsuario.troco" type="text" class="form-control" placeholder="Ex: Troco para 50...">
                </div>
                <div class="form-group">
                    <label>Informações de entrega</label>
                    <textarea class="form-control" rows="3" v-model="pedidoUsuario.informacoesEntrega"
                              placeholder="Informe a rua, ponto de referência, número da casa e etc... "></textarea>
                </div>

                <button type="button" @click="finalizarPedido" id="finalizarPedido" class="btn btn-block btn-success btn-flat mt-3">
                    Finalizar Pedido
                </button>

            </section>
        </div>
        <Footer :pageActive="'carrinho'"/>
    </div>

</template>

<script>
import Navegacao from "../componentes/Navegacao";
import {Link, usePage} from '@inertiajs/inertia-vue3';
import {Inertia} from "@inertiajs/inertia";
import Footer from "../componentes/Footer";
import axios from "axios";

export default {
    name: "Carrinho",
    props: {
        ProdutosInCarrinho: Array
    },
    components: {
        Navegacao,
        Link,
        Footer
    },
    data() {
        return {
            pedidoUsuario: {
                produtosCarrinho: this.ProdutosInCarrinho,
                troco: '',
                informacoesEntrega: '',
                valorTotalPedido: 0,
                totalAPagar: 0,

            },
            taxaEntrega: 2,

        }
    },
    methods: {
        removerProdDoCarrinho: function (param) {
            Inertia.delete('/remover-prod-carrinho/' + param)
            axios.get('/produtos/meu-carrinho/' + usePage().props.value.usuario.logado.id)
                .then(response => {
                    this.pedidoUsuario.produtosCarrinho = response.data
                    this.pedidoUsuario.valorTotalPedido = 0
                    this.pedidoUsuario.produtosCarrinho.forEach(this.calcularPedido)
                    this.pedidoUsuario.totalAPagar = this.pedidoUsuario.valorTotalPedido + this.taxaEntrega
                })
            if (this.ProdutosInCarrinho.length === 1) {
                document.getElementById('finalizarPedido').disabled = true
                document.getElementById('finalizarPedido').innerHTML = 'Carrinho vazio...'
                window.location.href = "/";
            }
        },
        calcularPedido: function (item) {
            this.pedidoUsuario.valorTotalPedido += Number(item.valor_un_total)
        },

        finalizarPedido: function () {
            Inertia.post('/realizar-pedido', this.pedidoUsuario)
        }
    },
    mounted() {
        this.ProdutosInCarrinho.forEach(this.calcularPedido)
        this.pedidoUsuario.totalAPagar = this.pedidoUsuario.valorTotalPedido + this.taxaEntrega

        if(this.ProdutosInCarrinho.length === 0){
            document.getElementById('finalizarPedido').disabled = true
            document.getElementById('finalizarPedido').innerHTML = 'Carrinho vazio...'
        }

    },
}
</script>

<style scoped>

</style>
