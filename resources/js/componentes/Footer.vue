<template>
    <footer class="main-footer d-flex justify-content-center align-items-center fixed-bottom">
        <Link :href="'/meus-pedidos/'+usuario" :class="[pageActive == 'meuspedidos' ? 'atual' : '' ]">
            <i class="fas fa-receipt"></i>
        </Link>
        <Link :href="'/meu-carrinho/'+usuario" :class="[pageActive == 'carrinho' ? 'atual' : '' ]" >
            <i class="fas fa-shopping-bag"></i>
        </Link>
        <Link :href="'/'"  :class="[pageActive == 'cardapio' ? 'atual link-inertia'  : '' ]" >
            <i class="fas fa-ice-cream"></i>
        </Link>
        <Link class="">
            <i class="fas fa-user"></i>
        </Link>
        <Link :href="'/logout'" >
            <i class="fas fa-power-off"></i>
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
        background-color: white;
        padding: 10px !important;
        gap: 45px;
    }
    footer a{
        font-size: 16px;
    }
    footer i{
        color: var(--cor-primaria);
    }
    .atual{
        line-height: 40px;
        text-align: center;
        background-color: #70028f;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        box-shadow: -1px 1px 5px 1px #70028f;
        font-size: 22px;
        transition: 0.5s;
    }
</style>
