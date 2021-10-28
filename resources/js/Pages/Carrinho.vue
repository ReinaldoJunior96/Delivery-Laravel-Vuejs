<template>
    <div class="d-flex flex-column">
        <Nav :pagina="'Confirme seu pedido'"/>
        <section class="content mt-3">
            <div class="card p-2">
                <div class="card-header">
                    <h3 class="card-title text-white mont-serrat"><i class="fas fa-shopping-cart"></i> Seu carrinho</h3>
                </div>
                <div class="card-body p-0">
                    <ul class="products-list product-list-in-card pl-2 pr-2 mont-serrat">
                        <li v-for="produto in pedidoUsuario.produtosCarrinho" :key="produto.id" class="item">
                            <span class="">{{ produto.produto.produto_nome }}
                                <span class="badge badge-success float-right">
                                        {{
                                        Number(produto.valor_un_total).toLocaleString('pt-br', {
                                            style: 'currency',
                                            currency: 'BRL'
                                        })
                                    }}
                                    </span>
                            </span>
                            <span class="product-description roboto-condensed">
                                    {{ produto.complemento_produto_carrinho }}
                                </span>
                            <span @click="removerProdDoCarrinho(produto.id)" class="badge mt-2 float-right">
                                    <i class="fas fa-trash-alt produtoRemovidoDoCarrinho"></i>
                                </span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card p-2">
                <div class="card-header">
                    <h3 class="card-title text-white mont-serrat"><i class="fas fa-clipboard-list"></i> Resumo do pedido</h3>
                </div>
                <div class="card-body p-0">
                    <ul class="products-list product-list-in-card pl-2 pr-2 mont-serrat">
                        <li class="item">
                                <span class="">
                                    Valor dos itens no carrinho
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
                        <li class="item ">
                                <span class="">
                                    Taxa de entrega
                                    <span class="badge float-right ">
                                        {{
                                            Number(taxaEntrega).toLocaleString('pt-br', {
                                                style: 'currency',
                                                currency: 'BRL'
                                            })
                                        }}
                                    </span>
                                </span>
                        </li>
                        <li class="item total-pagar">
                                <span class="">
                                    Total a pagar
                                    <span class="badge float-right" style="font-size: 20px">
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
            <div class="form-group p-2 ">
                <label class="text-gray">Precisa de troco? Informe para quanto</label>
                <input v-model="pedidoUsuario.troco" type="text"
                       class="form-control form-control-border " placeholder="Ex: Troco para 50...">
            </div>
            <div class="form-group p-2">
                <label class="text-gray">Informações de entrega</label>
                <textarea class="form-control" rows="3" v-model="pedidoUsuario.informacoesEntrega"
                          placeholder="Informe a rua, ponto de referência, número da casa e etc... "></textarea>
            </div>

            <button type="button" @click="finalizarPedido" id="finalizarPedido"
                    class="btn btn-block btn-success btn-flat mt-3 mont-serrat" style="margin-bottom: 100px">
                Finalizar Pedido
            </button>

        </section>
        <Footer :pageActive="'carrinho'"/>
    </div>

</template>

<script>
import Nav from "../componentes/Navegacao";
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
        Nav,
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

        if (this.ProdutosInCarrinho.length === 0) {
            document.getElementById('finalizarPedido').disabled = true
            document.getElementById('finalizarPedido').innerHTML = 'Carrinho vazio...'
        }

    },
    created() {

    }
}
</script>

<style scoped>
.card-header {
    background-color: #FF398B;
}



</style>
