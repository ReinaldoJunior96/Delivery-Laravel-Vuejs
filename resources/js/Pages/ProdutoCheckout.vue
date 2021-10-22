<template>
    <Navegacao/>
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
                            <div class="product-img">
                                <img
                                    src="https://static.baratocoletivo.com.br/2019/0404/oferta_15544082899762_OFERTA.jpg"
                                    alt="Product Image" class="img-size-50">
                            </div>
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

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Sabores sorvete</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <ul class="products-list product-list-in-card pl-2 pr-2">
                        <li class="item">
                            <div class="product-img">
                                <img
                                    src="https://www.sabornamesa.com.br/media/k2/items/cache/b9ad772005653afce4d4bd46c2efe842_XL.jpg"
                                    alt="Product Image" class="img-size-50">
                            </div>
                            <div class="product-info">
                                <a href="javascript:void(0)" class="product-title">lanche.produto_nome
                                    <span class="badge badge-warning float-right">
                                            Number(lanche.produto_preco).toLocaleString('pt-br', {
                                                style: 'currency',
                                                currency: 'BRL'
                                            })
                                        </span></a>
                                <span class="product-description">
                                    Descrição do sorvete se tiver alguma
                                </span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Adicionais</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <ul class="products-list product-list-in-card pl-2 pr-2">
                        <li class="item">
                            <div class="product-img">
                                <img
                                    src="https://www.sabornamesa.com.br/media/k2/items/cache/b9ad772005653afce4d4bd46c2efe842_XL.jpg"
                                    alt="Product Image" class="img-size-50">
                            </div>
                            <div class="product-info">
                                <a href="javascript:void(0)" class="product-title">lanche.produto_nome
                                    <span class="badge badge-warning float-right">
                                            Number(lanche.produto_preco).toLocaleString('pt-br', {
                                                style: 'currency',
                                                currency: 'BRL'
                                            })
                                        </span></a>
                                <span class="product-description">
                                    Descrição do sorvete se tiver alguma
                                </span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <button @click="adicionarProdutoAoCarrinho" type="button" class="btn btn-block btn-success btn-flat mt-3">
                Adicionar ao carrinho
            </button>
        </section>
    </div>

</template>

<script>
import Navegacao from "../componentes/Navegacao";
import {Inertia} from "@inertiajs/inertia";
import {usePage} from "@inertiajs/inertia-vue3";

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
        Navegacao
    },
    methods: {
        verificaProduto: function () {
            console.log(this.produto.length)
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
        adicionarProdutoAoCarrinho: function () {
            Inertia.post('/adicionar-ao-carrinho', this.pedidoCarrinho)
        }
    },

}
</script>

<style scoped>

</style>
