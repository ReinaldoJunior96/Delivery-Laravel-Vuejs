<template>
    <div class="text-center p-2 nav-superior">
        <span style="font-size: 30px" class="text-center fredericka title-cardapio ">
            {{ this.pagina }}
        </span>
    </div>
</template>
<script>

import {Link, usePage} from '@inertiajs/inertia-vue3';

export default {
    name: "Nav",
    components: {Link},
    props: ['pagina'],
    data() {
        return {
            path: usePage().props.value.path.public,
        }
    }
}
</script>

<style scoped>

.title-cardapio {
    color: #FF398B;
}

.nav-superior{
    box-shadow: 0px 5px 5px lightgrey !important;
}

</style>
