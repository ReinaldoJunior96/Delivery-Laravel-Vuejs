<template>
    <div class="d-flex flex-column vh-100 teste">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="d-flex justify-content-center mb-3" >
                            <img width="150" class="" src="image/logo-marca.png" alt="">
                        </div>
                        <div class="col-sm-6">
                            <h1>Cardápio Cliente</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Sorvetes</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <ul class="products-list product-list-in-card pl-2 pr-2">

                            <li v-for="sorvete in sorvetesList" :key="sorvete.id" class="item">
                                <div class="product-img">
                                    <img
                                        src="https://static.baratocoletivo.com.br/2019/0404/oferta_15544082899762_OFERTA.jpg"
                                        alt="Product Image" class="img-size-50">
                                </div>
                                <div class="product-info">
                                    <Link :href="'/checkout/'+sorvete.slug" class="product-title">
                                        {{ sorvete.produto_nome }}
                                        <span class="badge badge-warning float-right">{{
                                                Number(sorvete.produto_preco).toLocaleString('pt-br', {
                                                    style: 'currency',
                                                    currency: 'BRL'
                                                })
                                            }}</span>
                                    </Link>
                                    <span class="product-description">
                                    Descrição do sorvete se tiver alguma
                                </span>
                                </div>
                            </li>


                        </ul>
                    </div>
                </div>
            </section>

        </div>
        <Footer :pageActive="'cardapio'"/>
    </div>

</template>

<script>
import Navegacao from "../componentes/Navegacao";
import {Link} from '@inertiajs/inertia-vue3';
import axios from "axios";
import Footer from "../componentes/Footer";

export default {
    name: "Cardapio",
    data() {
        return {
            sorvetesList: [],
            acaisList: [],
            lanchesList: [],
        }
    },
    components: {
        Footer,
        Navegacao,
        Link
    },
    mounted() {
        axios.get('/sorvetes').then(response => this.sorvetesList = response.data)
        axios.get('/acais').then(response => this.acaisList = response.data)
        axios.get('/lanches').then(response => this.lanchesList = response.data)
        //setInterval(this.atualizarDados, 1000)
    },
    methods: {
        atualizarDados: function () {
            axios.get('/sorvetes').then(response => this.sorvetesList = response.data)
            axios.get('/acais').then(response => this.acaisList = response.data)
            axios.get('/lanches').then(response => this.lanchesList = response.data)
        }
    },
    created() {


    }


}
</script>

<style scoped>
</style>
