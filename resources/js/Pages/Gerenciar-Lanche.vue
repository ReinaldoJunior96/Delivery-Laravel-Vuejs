<template>
    <Navegacao/>
    <div class="content-wrapper p-3">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Cadastro de Lanches</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form v-on:submit.prevent>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Produto</label>
                                <input v-model="lancheForm.nome" type="text" class="form-control"
                                       placeholder="Enter ...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Preço</label>
                                <InputMoeda :precoPropos='lancheForm.preco' v-model.lazy="lancheForm.preco"
                                       :options="{ currency: 'BRL' }"
                                       type="text" class="form-control"
                                       placeholder="Enter ..."/>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- textarea -->
                            <div class="form-group">
                                <label>Descrição </label>
                                <textarea v-model="lancheForm.descricao" class="form-control" rows="3"
                                          placeholder="Enter ..."></textarea>
                            </div>
                        </div>
                    </div>
                    <button @click="postLanche" type="submit" class="btn btn-secondary">Cadastrar</button>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <TabelaProdutos :produtos='lanche'/>
    </div>

</template>

<script>
import Navegacao from "../componentes-admin/Navegacao";
import TabelaProdutos from '../componentes-admin/TabelaProdutos'
import {Inertia} from "@inertiajs/inertia";
import {Link} from '@inertiajs/inertia-vue3';
import InputMoeda from '../componentes-admin/InputMoeda'

export default {
    name: "Gerenciar-Lanche",
    components: {Navegacao, Link, TabelaProdutos , InputMoeda},
    props: ['lanche'],
    data() {
        return {
            lancheForm: {
                _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                nome: '',
                preco: 0,
                disponibilidade: 0,
                categoria: 3,
                descricao: ''
            },
        }
    },
    methods: {
        postLanche: function () {
            Inertia.post('/admin/produtos', this.lancheForm);
            this.lancheForm.nome = '';
            this.lancheForm.preco = 0;
            this.lancheForm.descricao = '';
        },

    },
}
</script>

<style scoped>

</style>
