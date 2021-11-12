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
                <tr v-for="pedido in listPedidos" :key="pedido.id">
                    <td>{{ pedido.usuario.name }}</td>
                    <td>
                        {{ pedido.produtos_pedido.replace("//", " - ") }}
                    </td>
                    <td>
                        {{
                            Number(pedido.valor_total).toLocaleString("pt-br", {
                                style: "currency",
                                currency: "BRL",
                            })
                        }}
                    </td>
                    <td>
                        <Link
                            :href="'/admin/detalhes-pedido/' + pedido.numero_pedido"
                            class="text-muted"
                        >
                            <i class="fas fa-search"></i>
                        </Link>
                    </td>
                </tr>
                </tbody>
            </table>
            <audio controls style="display: none">
                <source :src="path+'/notification.mp3'" type="audio/mp3"/>
            </audio>
        </div>

    </div>
</template>

<script>
import Navegacao from "../componentes-admin/Navegacao";
import {Link, usePage} from "@inertiajs/inertia-vue3";

export default {
    name: "Gerenciar-Pedidos",
    components: {Navegacao, Link},
    props: {
        pedidos: Array,
    },
    data() {
        return {
            listPedidos: this.pedidos,
            path: usePage().props.value.path.public,
        };
    },
    methods: {},
    mounted() {
        const self = this;
        Echo.private("pedido.1").listen(".EnviarPedido", function (e) {
            self.listPedidos.push(e.pedido);
            document.querySelector('audio').play()
        });
    },
    created() {
    },
};
</script>

<style scoped>
</style>
