<template>
    <Navegacao/>

    <div class="content-wrapper p-3">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Cadastro de sorvetes</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form v-on:submit.prevent>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Produto</label>
                                <input v-model="sorvete.nome" type="text" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Preço</label>
                                <input v-model="sorvete.preco" type="text" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- textarea -->
                            <div class="form-group">
                                <label>Descrição </label>
                                <textarea v-model="sorvete.descricao" class="form-control" rows="3"
                                          placeholder="Enter ..."></textarea>
                            </div>
                        </div>
                    </div>
                    <button @click="postSorvete" type="submit" class="btn btn-secondary">Cadastrar</button>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <TabelaProdutos :produtos='sorvetes'/>
    </div>

</template>

<script>
import Navegacao from "../componentes-admin/Navegacao";
import TabelaProdutos from '../componentes-admin/TabelaProdutos'
import {Inertia} from "@inertiajs/inertia";
import {Link} from '@inertiajs/inertia-vue3';

export default {
    name: "Gerenciar-Sorvete",
    components: {Navegacao , Link, TabelaProdutos},
    props: ['sorvetes'],
    data() {
        return {
            sorvete: {
                _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                nome: '',
                preco: '',
                disponibilidade: 0,
                categoria: 1,
                descricao: ''
            },
            formatoMoeda: {minimumFractionDigits: 2, style: 'currency', currency: 'BRL'}
        }
    },
    methods: {
        postSorvete: function () {
            Inertia.post('/admin/produtos', this.sorvete);
            this.sorvete.nome = '';
            this.sorvete.preco = '';
            this.sorvete.descricao = '';
        },

    },
    created() {


    }
}
</script>

<style scoped>

</style>
