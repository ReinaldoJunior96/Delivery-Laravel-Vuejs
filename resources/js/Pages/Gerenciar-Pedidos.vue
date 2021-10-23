<template>
    <Navegacao/>
    <div class="content-wrapper p-3">
        <div class="card-body table-responsive p-0">
            <table class="table table-striped table-valign-middle">
                <thead>
                <tr>
                    <th>Solicitado Por</th>
                    <th>Pedido</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="pedido in pedidos" :key="pedido.id">
                    <td>{{ pedido.usuario.name }}</td>
                    <td>
                        {{ pedido.produtos_pedido.replace('//', ' - ') }}
                    </td>
                    <td>{{ Number(pedido.valor_total).toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}) }}</td>
                    <td>
                        <Link :href="'/admin/detalhes-pedido/'+pedido.id" class="text-muted">
                            <i class="fas fa-search"></i>
                        </Link>
                    </td>

                </tr>
                </tbody>
            </table>
        </div>
        <button @click="teste" type="button" class="btn">aa</button>
    </div>

</template>

<script>
import Navegacao from "../componentes-admin/Navegacao";
import {Inertia} from "@inertiajs/inertia";
import {Link} from '@inertiajs/inertia-vue3';

export default {
    name: "Gerenciar-Pedidos",
    components: {Navegacao, Link},
    props: ['pedidos'],
    data() {
        return {

        }
    },
    methods: {
        teste:function(){
            let exemplo = this.pedidos[0].produtos_pedido
            let mod = exemplo.replace("//","<br>")
            console.log(mod)
        }
    },
    mounted() {
    },
    created() {
    }

}
</script>

<style scoped>

</style>
