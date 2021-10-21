<template>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tabela de sorvetes cadastrados</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Produto</th>
                    <th style="width: 40px">Preço</th>
                    <th>Disponível?</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="produto in produtos" :key="produto.id">
                    <td>{{ produto.id }}</td>
                    <td>{{ produto.produto_nome }}</td>
                    <td>
                            <span class="badge bg-danger">
                                {{ Number(produto.produto_preco).toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}) }}
                            </span>
                    </td>
                    <td>
                        <input type="checkbox" @click="mudarDisponibilidade(produto,produto.id)"
                               :checked="produto.produto_disponibilidade">
                    </td>
                    <td>
                        <i @click="deleteProduto(produto.id)" class="fas fa-trash-alt"></i>
                    </td>
                    <td>
                        <Link src='/admin/produtos/+produto.id/edit'><i class="fas fa-edit text-right"></i></Link>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</template>

<script>
import {Link} from '@inertiajs/inertia-vue3';
import {Inertia} from "@inertiajs/inertia";

export default {
    name: "TabelaProdutos",
    components: {Link},
    props: ['produtos'],
    methods: {
        deleteProduto: function (id) {
            if (confirm('Você tem certeza que deseja deletar?')) {
                Inertia.delete('/admin/produtos/' + id);
            }
        },
        mudarDisponibilidade: function (data, id) {
            data.produto_disponibilidade = (data.produto_disponibilidade) ? 0 : 1;
            Inertia.put('/admin/produtos/' + id, data);
        }
    },
    created() {

    }
}
</script>

<style scoped>

</style>
