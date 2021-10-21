<template>
    <Navegacao/>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
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
                                <Link :href="'/checkout/'+sorvete.id" class="product-title">{{ sorvete.produto_nome }}
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
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Acaí</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <ul class="products-list product-list-in-card pl-2 pr-2">
                        <li v-for="acai in acaisList" :key="acai.id" class="item">
                            <div class="product-img">
                                <img
                                    src="https://liberal.com.br/wp-content/uploads/2021/03/O-a%C3%A7a%C3%AD-%C3%A9-uma-%C3%B3tima-op%C3%A7%C3%A3o-de-refei%C3%A7%C3%A3o-r%C3%A1pida-e-ainda-pode-ser-turbinado-com-outros-alimentos-como-frutas__Divulga%C3%A7%C3%A3o.jpg"
                                    alt="Product Image" class="img-size-50">
                            </div>
                            <div class="product-info">
                                <a href="javascript:void(0)" class="product-title">{{ acai.produto_nome }}
                                    <span class="badge badge-warning float-right">{{
                                            Number(acai.produto_preco).toLocaleString('pt-br', {
                                                style: 'currency',
                                                currency: 'BRL'
                                            })
                                        }}</span></a>
                                <span class="product-description">
                        Descrição do sorvete se tiver alguma
                      </span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Lanches</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <ul class="products-list product-list-in-card pl-2 pr-2">
                        <li v-for="lanche in lanchesList" :key="lanche.id" class="item">
                            <div class="product-img">
                                <img
                                    src="https://www.sabornamesa.com.br/media/k2/items/cache/b9ad772005653afce4d4bd46c2efe842_XL.jpg"
                                    alt="Product Image" class="img-size-50">
                            </div>
                            <div class="product-info">
                                <a href="javascript:void(0)" class="product-title">{{ lanche.produto_nome }}
                                    <span class="badge badge-warning float-right">{{
                                            Number(lanche.produto_preco).toLocaleString('pt-br', {
                                                style: 'currency',
                                                currency: 'BRL'
                                            })
                                        }}</span></a>
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
</template>

<script>
import Navegacao from "../componentes/Navegacao";
import {Inertia} from "@inertiajs/inertia";
import {Link} from '@inertiajs/inertia-vue3';
import axios from "axios";

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
        atualizarDados: function(){
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
