<template>
  <div class="d-flex flex-column">
    <Nav :pagina="'Meus Pedidos'" />
    <section class="content mt-3">
      <div
        v-for="pedido in pedidosDoUsuario"
        :key="pedido.id"
        class="card p-2 collapsed-card"
      >
        <div class="card-header">
          <h3 class="card-title text-white mont-serrat">
            <i class="fas fa-receipt"></i> Pedido Nº {{ pedido.numero_pedido }}
          </h3>
          <div class="card-tools">
            <button
              type="button"
              class="btn btn-tool text-white"
              data-card-widget="collapse"
            >
              <i class="fas fa-plus"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <ul class="products-list product-list-in-card pl-2 pr-2">
            <li class="item mont-serrat">
                {{ pedido.produtos_pedido }}
              <span class="product-description roboto-condensed">
                Descrição do sorvete se tiver alguma
              </span>
            </li>
            <li class="item mont-serrat">
                Total
              <Link :href="/checkout/" class="product-title">
                <span class="badge badge-success float-right">{{
                  Number(40).toLocaleString("pt-br", {
                    style: "currency",
                    currency: "BRL",
                  })
                }}</span>
              </Link>
            </li>
            <li class="item mont-serrat">
                Status do pedido
                <span class="badge badge-warning float-right">
                    {{ pedido.status_pedido }}
                </span>
            </li>
             <li class="item mont-serrat">
                Realizado em
                <span class="float-right">
                    {{  pedido.created_at }}
                </span>
            </li>
          </ul>
        </div>
      </div>
    </section>
    <Footer :pageActive="'meuspedidos'" />
  </div>
</template>

<script>
import Nav from "../componentes/Navegacao";
import { Link } from "@inertiajs/inertia-vue3";
import axios from "axios";
import Footer from "../componentes/Footer";

export default {
  name: "Meus-Pedidos",
  props: {
    pedidosDoUsuario: Array,
  },
  data() {
    return {
    };
  },
  components: {
    Footer,
    Nav,
    Link,
  },
  mounted() {
    console.log(this.pedidosDoUsuario);
  },
  methods: {},
};
</script>

<style scoped>
.card-header {
  background-color: var(--cor-primaria) !important;
}

.product-title {
  color: #733f19;
}
</style>
