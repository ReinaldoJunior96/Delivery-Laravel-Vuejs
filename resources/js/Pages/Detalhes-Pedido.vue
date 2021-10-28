<template>
  <Navegacao />
  <div class="">
    <div class="card card-solid">
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-sm-6">
            <h3 class="d-inline-block d-sm-none">
              Numero Pedido #{{ pedidoSolicitado.numero_pedido }}
            </h3>
          </div>
          <div class="col-12 col-sm-6">
            <h3 class="my-3">
              Solicatado por: {{ pedidoSolicitado.usuario.name }}
            </h3>
            <hr />
            <h4>Descrição</h4>
            <p>{{ pedidoSolicitado.produtos_pedido.replace(" // ", " - ") }}</p>
            <div class="bg-secondary py-2 px-3 mt-4">
              <h4 class="mb-0">Informações de entrega</h4>
              <h4 class="mt-0">
                <small>{{ pedidoSolicitado.informacoes_entrega }}</small>
              </h4>
            </div>
            <div class="bg-success py-2 px-3 mt-4">
              <h4 class="mb-0">
                Valor do pedido:
                {{
                  Number(pedidoSolicitado.valor_total).toLocaleString("pt-br", {
                    style: "currency",
                    currency: "BRL",
                  })
                }}
              </h4>
              <h4 class="mt-0">
                <small>Troco para R$ 80.00 </small>
              </h4>
            </div>

            <div class="mt-4">
              <a class="btn btn-app bg-secondary">
                <span class="badge bg-success">300</span>
                <i class="fas fa-barcode"></i> Receber Pedido
              </a>
              <a class="btn btn-app bg-secondary">
                <span class="badge bg-success">300</span>
                <i class="fas fa-barcode"></i> Saiu para entrega
              </a>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</template>


<script>
import Navegacao from "../componentes-admin/Navegacao";
import { Link, usePage } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import axios from "axios";

export default {
  name: "Detalhes-Pedido",
  components: {
    Navegacao,
  },
  props: {
    pedidoSolicitado: Array,
  },
  data() {
    return {};
  },
  mounted() {
    console.log(this.pedidoSolicitado);
  },
};
</script>

<style scoped>
</style>
