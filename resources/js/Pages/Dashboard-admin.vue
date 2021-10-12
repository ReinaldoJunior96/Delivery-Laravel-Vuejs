<template>
    <Navegacao/>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Cardápio</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Sorvetes</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <ul class="products-list product-list-in-card pl-2 pr-2">
                        <li class="item">
                            <div class="product-img">
                                <img
                                    src="https://static.baratocoletivo.com.br/2019/0404/oferta_15544082899762_OFERTA.jpg"
                                    alt="Product Image" class="img-size-50">
                            </div>
                            <div class="product-info">
                                <a href="javascript:void(0)" class="product-title">Nome do sorvete
                                    <span class="badge badge-warning float-right">R$ 2,00</span></a>
                                <span class="product-description">
                        Descrição do sorvete se tiver alguma
                      </span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Acaí</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <ul class="products-list product-list-in-card pl-2 pr-2">
                        <li class="item">
                            <div class="product-img">
                                <img
                                    src="https://liberal.com.br/wp-content/uploads/2021/03/O-a%C3%A7a%C3%AD-%C3%A9-uma-%C3%B3tima-op%C3%A7%C3%A3o-de-refei%C3%A7%C3%A3o-r%C3%A1pida-e-ainda-pode-ser-turbinado-com-outros-alimentos-como-frutas__Divulga%C3%A7%C3%A3o.jpg"
                                    alt="Product Image" class="img-size-50">
                            </div>
                            <div class="product-info">
                                <a href="javascript:void(0)" class="product-title">Nome do sorvete
                                    <span class="badge badge-warning float-right">R$ 2,00</span></a>
                                <span class="product-description">
                        Descrição do sorvete se tiver alguma
                      </span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Lanches</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <ul class="products-list product-list-in-card pl-2 pr-2">
                        <li class="item">
                            <div class="product-img">
                                <img
                                    src="https://www.sabornamesa.com.br/media/k2/items/cache/b9ad772005653afce4d4bd46c2efe842_XL.jpg"
                                    alt="Product Image" class="img-size-50">
                            </div>
                            <div class="product-info">
                                <a href="javascript:void(0)" class="product-title">Nome do sorvete
                                    <span class="badge badge-warning float-right">R$ 2,00</span></a>
                                <span class="product-description">
                        Descrição do sorvete se tiver alguma
                      </span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    </div>
</template>

<script>


import Navegacao from "../componentes-admin/Navegacao";

export default {
    name: "Dashboard-admin",
    components: {Navegacao}
}
</script>

<style scoped>

</style>
