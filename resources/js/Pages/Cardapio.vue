<template>
    <div class="d-flex flex-column ">
        <Nav :pagina="'Cardápio'"/>
        <section class="content mt-3">
            <div class="card p-2">
                <div class="card-header">
                    <h3 class="card-title text-white mont-serrat"><i class="fas fa-ice-cream"></i> Sorvetes</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool text-white" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <ul class="products-list product-list-in-card pl-2 pr-2">
                        <li v-for="sorvete in sorvetesList" :key="sorvete.id" class="item mont-serrat">
                            <Link :href="'/checkout/'+sorvete.slug" class="product-title ">
                                {{ sorvete.produto_nome }}
                                <span class="badge badge-success float-right">{{
                                        Number(sorvete.produto_preco).toLocaleString('pt-br', {
                                            style: 'currency',
                                            currency: 'BRL'
                                        })
                                    }}</span>
                            </Link>
                            <span class="product-description roboto-condensed">
                                    Descrição do sorvete se tiver alguma
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <Footer :pageActive="'cardapio'"/>
    </div>

</template>

<script>
import Nav from "../componentes/Navegacao";
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
        Nav,
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
    }
}
</script>

<style scoped>

.card-header {
    background-color: var(--cor-primaria) !important;
}


.product-title {
    color: #733f19;
}

</style>
