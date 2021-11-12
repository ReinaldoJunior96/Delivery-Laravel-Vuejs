<template>
  <div>
    <div class="card-body login-card-body">
      <div class="d-flex justify-content-center mb-3 mt-2">
        <img width="250" class="" src="image/logo-marca.png" alt="" />
      </div>
      <form v-on:submit.prevent>
        <p class="text-center roboto-condensed mgs-logo">
          Faça seu pedido através dos nosso app
        </p>
        <div
          v-for="erro in this.errors"
          :key="erro"
          class="text-center bg-danger mb-3"
        >
          {{ erro }}
        </div>
        <div class="input-group mb-3">
          <!--<div class="input-group-prepend">
                        <span class="input-group-text border-0"><i class="fas fa-user"></i></span>
                    </div>-->
          <input
            v-model="formLogin.email"
            type="email"
            class="form-control form-control-border text-center campo-login"
            placeholder="Infome seu e-mail"
          />
        </div>
        <div class="input-group mb-3">
          <!--<div class="input-group-prepend">
                        <span class="input-group-text border-0"><i class="fas fa-key"></i></span>
                    </div>-->
          <input
            v-model="formLogin.senha"
            type="password"
            class="form-control form-control-border text-center campo-login"
            placeholder="Senha"
          />
        </div>
        <div class="d-flex justify-content-center">
          <button
            @click="login"
            type="submit"
            class="gradient-button text-white border-0 col-8 roboto-condensed"
          >
            Entrar
          </button>
        </div>
        <div class="text-center roboto-condensed mt-2">
          <a class="criar-conta" href="#">Criar Conta</a>
        </div>
      </form>

      <!-- /.social-auth-links -->
    </div>
    <!-- /.login-card-body -->
  </div>
</template>
<script>
import { axios } from "axios";
import { Inertia } from "@inertiajs/inertia";

export default {
  name: "Welcome",
  props: ["name", "errors"],
  data() {
    return {
      formLogin: {
        _token: document
          .querySelector('meta[name="csrf-token"]')
          .getAttribute("content"),
        email: "cliente@gmail.com",
        senha: "12345",
      },
    };
  },
  methods: {
    login: function () {
      Inertia.post("/", this.formLogin);
    },
  },
  created() {},
};
</script>
<style scoped>
/* Login */
.mgs-logo {
  color: var(--cor-primaria) !important;
}

.fa-user,
.fa-key {
  color: var(--cor-secundaria);
}

.campo-login:focus {
  border-color: #ff398b;
}

.gradient-button {
  margin: 10px;
  padding: 10px 40px;
  text-align: center;
  text-transform: uppercase;
  transition: 0.5s;
  border-radius: 20px;
  display: block;
  background-image: linear-gradient(
    to right,
    var(--cor-primaria),
    var(--cor-primaria)
  ) !important;
  color: #ffffff;
  border: 0;
}

.criar-conta {
  color: var(--cor-primaria);
}
</style>
