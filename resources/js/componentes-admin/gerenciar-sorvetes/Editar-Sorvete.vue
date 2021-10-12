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
                        <th>Sorvete</th>
                        <th style="width: 40px">Preço</th>
                        <th>Disponível?</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="sorvete in sorvetes" :key="sorvete.id">
                        <td>{{ sorvete.id }}</td>
                        <td>{{ sorvete.produto_nome }}</td>
                        <td>
                            <span class="badge bg-danger">
                                {{ sorvete.produto_preco }}
                            </span>
                        </td>
                        <td>
                            <input type="checkbox" @click="mudarDisponibilidade(sorvete,sorvete.id)" :checked="sorvete.produto_disponibilidade">
                        </td>
                        <td>
                            <i @click="deleteSorvete(sorvete.id)" class="fas fa-trash-alt"></i>
                        </td>
                        <td>
                            <Link src='/admin/produtos/+sorvete.id/edit'><i class="fas fa-edit text-right"></i></Link>

                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

</template>

<script>
export default {
    name: "Editar-Sorvete"
}
</script>

<style scoped>

</style>
