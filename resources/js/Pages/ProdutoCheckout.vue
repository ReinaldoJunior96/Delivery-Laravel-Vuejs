<template>
    <div class="d-flex flex-column vh-100">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Confirme seu pedido</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Confirme seu pedido</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <ul class="products-list product-list-in-card pl-2 pr-2">
                            <li class="item">
                                <div class="product-info">
                                    <a href="javascript:void(0)" class="product-title">
                                        {{ produto.produto_nome }}
                                        <span class="badge badge-warning float-right">
                                            {{
                                                Number(pedidoCarrinho.precoCheckout).toLocaleString('pt-br',
                                                    {
                                                        style: 'currency',
                                                        currency: 'BRL'
                                                    })
                                            }}
                                    </span>
                                    </a>
                                    <span class="product-description">
                                    Descrição do sorvete se tiver alguma
                                </span>
                                </div>
                            </li>

                        </ul>
                        <div class="btn-group d-flex align-content-end">
                            <button type="button" class="btn btn-default" @click="adicionarQtdeProduto"><i
                                class="fas fa-plus"></i></button>
                            <button type="button" class="btn btn-default" disabled>Quantidade: <span>{{
                                    pedidoCarrinho.qtdeProduto
                                }}</span></button>
                            <button type="button" class="btn btn-default" @click="removerQtdeProduto">-</button>
                        </div>
                    </div>
                </div>
                <button @click="adicionarProdutoAoCarrinho" type="button"
                        class="btn btn-block btn-success btn-flat mt-3 produtoAdicionadoAoCarrinho">
                    Adicionar ao carrinho
                </button>
            </section>
        </div>
        <Footer :pageActive="'cardapio'"/>
    </div>

</template>

<script>
import Navegacao from "../componentes/Navegacao";
import Footer from "../componentes/Footer";
import {usePage} from "@inertiajs/inertia-vue3";
import axios from "axios";

export default {
    name: "ProdutoCheckout",
    props: ['produto'],
    data() {
        return {
            pedidoCarrinho: {
                usuario: usePage().props.value.usuario.logado.id,
                _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                produto: this.produto.id,
                qtdeProduto: 1,
                complemento: null,
                precoCheckout: this.produto.produto_preco,
            }
        }
    },
    components: {
        Navegacao,
        Footer
    },
    methods: {
        adicionarProdutoAoCarrinho: function () {
            axios.post('/adicionar-ao-carrinho', this.pedidoCarrinho)
                .then(response => console.log(response.data))
        },
        adicionarQtdeProduto: function () {
            this.pedidoCarrinho.qtdeProduto++
            this.pedidoCarrinho.precoCheckout = this.produto.produto_preco * this.pedidoCarrinho.qtdeProduto
        },
        removerQtdeProduto: function () {
            if (this.pedidoCarrinho.qtdeProduto === 1) {
                return false
            }
            this.pedidoCarrinho.qtdeProduto--
            this.pedidoCarrinho.precoCheckout = this.produto.produto_preco * this.pedidoCarrinho.qtdeProduto
        },

    },

}

</script>

<style scoped>

</style>
