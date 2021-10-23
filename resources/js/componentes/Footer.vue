<template>
    <footer class="main-footer d-flex justify-content-center align-items-center fixed-bottom">
        <Link >
            <i class="fas fa-ticket-alt"></i>
        </Link>
        <Link  :href="'/meu-carrinho/'+usuario" :class="[pageActive == 'carrinho' ? 'atual' : '' ]" >
            <i class="fas fa-shopping-cart"></i>
        </Link>
        <Link :href="'/'"  :class="[pageActive == 'cardapio' ? 'atual link-inertia'  : '' ]" >
            <i class="fas fa-ice-cream"></i>
        </Link>
        <Link :href="'/logout'" >
            <i class="fas fa-power-off"></i>
        </Link>
        <Link class="">
            <i class="fas fa-user"></i>
        </Link>
    </footer>
</template>

<script>
import Footer from "../componentes-admin/Footer";
import {usePage} from "@inertiajs/inertia-vue3"
import {Link} from '@inertiajs/inertia-vue3';
export default {
    name: "Footer",
    components: {Footer, Link},
    props: {
        pageActive: String
    },
    data(){
        return{
            usuario : usePage().props.value.usuario.logado.id,
        }
    }
}
</script>

<style scoped>
    footer{
        padding: 8px !important;
        gap: 80px;
    }
    footer a{
        font-size: 12px;
    }
    .atual{
        color: white;
        line-height: 40px;
        text-align: center;
        background-color: #f60d5c;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        box-shadow: -1px 1px 5px 2px grey;
    }
</style>
