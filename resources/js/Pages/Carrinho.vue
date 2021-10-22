<template>
    <Navegacao/>
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
                        <li v-for="produto in ProdutosInCarrinho" :key="produto.id" class="item">
                            <div class="product-img">
                                <img
                                    src="https://static.baratocoletivo.com.br/2019/0404/oferta_15544082899762_OFERTA.jpg"
                                    alt="Product Image" class="img-size-50">
                            </div>
                            <div class="product-info">
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
                                    <i class="fas fa-trash-alt"></i>
                                </span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <button type="button" class="btn btn-block btn-success btn-flat mt-3">
                Finalizar Pedido
            </button>
        </section>
    </div>
</template>

<script>
import Navegacao from "../componentes/Navegacao";
import {Link} from '@inertiajs/inertia-vue3';
import {Inertia} from "@inertiajs/inertia";

export default {
    name: "Carrinho",
    props: ['ProdutosInCarrinho'],
    components: {
        Navegacao,
        Link
    },
    methods:{
        removerProdDoCarrinho: function (param){
            Inertia.delete('/remover-prod-carrinho/'+param)
        }
    },
    mounted() {
    }
}
</script>

<style scoped>

</style>
