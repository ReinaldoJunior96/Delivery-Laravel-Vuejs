<template>
    <Navegacao/>

    <div class="content-wrapper p-3">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Cadastro de Acaí</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form v-on:submit.prevent>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Produto</label>
                                <input v-model="acaiForm.nome" type="text" class="form-control"
                                       placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Preço</label>
                                <input v-model="acaiForm.preco" type="text" class="form-control"
                                       placeholder="Enter ...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- textarea -->
                            <div class="form-group">
                                <label>Descrição </label>
                                <textarea v-model="acaiForm.descricao" class="form-control" rows="3"
                                          placeholder="Enter ..."></textarea>
                            </div>
                        </div>
                    </div>
                    <button @click="postAcai" type="submit" class="btn btn-secondary">Cadastrar</button>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <TabelaProdutos :produtos='acai'/>
    </div>

</template>

<script>
import Navegacao from "../componentes-admin/Navegacao";
import TabelaProdutos from '../componentes-admin/TabelaProdutos'
import {Inertia} from "@inertiajs/inertia";
import {Link} from '@inertiajs/inertia-vue3';

export default {
    name: "Gerenciar-Acai",
    components: {Navegacao, Link, TabelaProdutos},
    props: ['acai'],
    data() {
        return {
            acaiForm: {
                _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                nome: '',
                preco: '',
                disponibilidade: 0,
                categoria: 2,
                descricao: ''
            },
        }
    },
    methods: {
        postAcai: function () {
            Inertia.post('/admin/produtos', this.acaiForm);
            this.acaiForm.nome = '';
            this.acaiForm.preco = '';
            this.acaiForm.descricao = '';
        },

    },
}
</script>

<style scoped>

</style>
