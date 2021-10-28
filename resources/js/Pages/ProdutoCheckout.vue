<template>
    <Nav :pagina="'Check in'"/>
    <div class="d-flex flex-column vh-100">
        <!-- Main content -->
        <section class="content mt-3 ">
            <div class="card p-2">
                <div class="card-header">
                    <h3 class="card-title text-white mont-serrat"><i class="fas fa-receipt"></i> Confirme seu pedido
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <ul class="products-list product-list-in-card pl-2 pr-2">
                        <li class="item">
                            <span href="javascript:void(0)" class="product-title mont-serrat">
                                {{ produto.produto_nome }}
                                <span class="badge badge-success float-right">
                                            {{
                                        Number(pedidoCarrinho.precoCheckout).toLocaleString('pt-br',
                                            {
                                                style: 'currency',
                                                currency: 'BRL'
                                            })
                                    }}
                                    </span>
                            </span>
                            <span class="product-description roboto-condensed">
                                    Descrição do sorvete se tiver alguma
                                </span>
                        </li>

                    </ul>
                    <div class="btn-group d-flex align-content-end">
                        <button type="button" class="btn btn-default botao-quantidade" @click="removerQtdeProduto">
                            <i class="fas fa-chevron-left"></i>
                        </button>

                        <button type="button" class="btn btn-default" disabled>
                            Quantidade: <span>{{ pedidoCarrinho.qtdeProduto }}</span>
                        </button>

                        <button type="button" class="btn btn-default botao-quantidade" @click="adicionarQtdeProduto">
                            <i class="fas fa-chevron-right"></i>
                        </button>

                    </div>
                </div>
            </div>
            <button @click="adicionarProdutoAoCarrinho" type="button"
                    class="button-to-card btn-flat mt-3 produtoAdicionadoAoCarrinho">
                Adicionar ao carrinho
            </button>
        </section>

    </div>
    <Footer :pageActive="'cardapio'"/>


</template>

<script>
import Nav from "../componentes/Navegacao";
import Footer from "../componentes/Footer";
import {usePage} from "@inertiajs/inertia-vue3";
import axios from "axios";
import {Inertia} from "@inertiajs/inertia";

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
        Nav,
        Footer,

    },
    methods: {
        adicionarProdutoAoCarrinho: function () {
            Inertia.post('/adicionar-ao-carrinho', this.pedidoCarrinho)
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
.card-header {
    background-color: var(--cor-primaria);
}

.product-title {
    color: #733f19;
}

.botao-quantidade {
    border-radius: 20px;
    background-color: rgba(94, 94, 94, 0.68);
    color: #FFFFFF;
}

.button-to-card {
    padding: 10px 40px;
    text-align: center;
    text-transform: uppercase;
    transition: 0.5s;
    width: 100%;
    display: block;
    background-color: #05b44d !important;
    color: #FFFFFF;
    border: 0;
}
</style>
