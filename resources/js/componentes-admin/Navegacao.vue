<template>
    <nav class="main-header navbar navbar-expand navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                    <i class="fas fa-bars text-black"></i>

                </a>
            </li>
        </ul>
    </nav>
    <aside class="main-sidebar sidebar-light-red elevation-4">
        <!-- Brand Logo -->
        <div class="d-flex justify-content-center mt-3">
            <img :src="path+'/ice-cream-cone.png'" width="100"
                 class="brand-image img-circle elevation-3" style="opacity: .8">
        </div>


        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 d-flex justify-content-center">
                <div class="justify-content-center">
                    <a href="#">Ice Cream da Luisa </a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <Link href="/admin/gerenciar-sorvete" class="nav-link">
                            <img class="nav-icon" :src="path+'/icecreams.png'" alt="">
                            <p>
                                Gerenciar Sorvetes
                            </p>
                        </Link>
                    </li>
                    <li class="nav-item">
                        <Link href="/admin/gerenciar-acai" class="nav-link">
                            <img class="nav-icon" :src="path+'/acai.png'" alt="">
                            <p>
                                Gerenciar Açaí
                            </p>
                        </Link>
                    </li>
                    <li class="nav-item">
                        <Link href="/admin/gerenciar-lanche" class="nav-link">
                            <img class="nav-icon" :src="path+'/fast-food.png'" alt="">
                            <p>
                                Gerenciar Lanches
                            </p>
                        </Link>
                    </li>
                    <li class="nav-item">
                        <Link href="/admin/gerenciar-pedidos" class="nav-link">
                            <img class="nav-icon" :src="path+'/delivery-man.png'" alt="">
                            <p>
                                Pedidos Delivery
                            </p>
                        </Link>
                    </li>
                    <li class="nav-item">
                        <a @click="logout" class="nav-link">
                            <img class="nav-icon" :src="path+'/on-off.png'" alt="">
                            <p>
                                Sair
                            </p>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
</template>

<script>

import {Inertia} from "@inertiajs/inertia";
import {Link, usePage} from '@inertiajs/inertia-vue3';

export default {
    name: "Nav",
    components: { Link },
    data(){
      return{
          path : usePage().props.value.path.public,
      }
    },
    methods: {
        logout: function () {
            Inertia.get('/logout');
        }
    },
    created() {
    }
}
</script>

<style scoped>

</style>
