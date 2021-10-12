<template>
    <div>
        <div class="card-body login-card-body">
            <div class="d-flex justify-content-center mb-3 mt-5">
                <img width="150" class="" src="image/ice-cream-cone.png" alt="">
            </div>

            <form v-on:submit.prevent>
                <div class="input-group mb-3">
                    <input v-model="formLogin.email" type="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input v-model="formLogin.senha" type="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="">
                        <button @click="login" type="submit" class="btn btn-secondary btn-block">Entrar</button>
                    </div>
                </div>
                <div class="text-center mt-5">
                    <p class="mb-1">
                        <a href="forgot-password.html">Criar Conta</a>
                    </p>
                </div>


            </form>
            <!-- /.social-auth-links -->


        </div>
        <!-- /.login-card-body -->
    </div>
</template>
<script>

import {axios} from "axios";
import {Inertia} from "@inertiajs/inertia";

export default {
    name: "Welcome",
    props: ['name', 'errors'],
    data() {
        return {
            formLogin: {
                _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                email: '',
                senha: ''
            },
        }
    },
    methods: {
        login: function () {
            Inertia.post('/', this.formLogin);
        }
    },
    created() {

    }
}
</script>

<style scoped>

</style>
