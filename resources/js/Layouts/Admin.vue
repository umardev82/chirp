<script setup>

import {Link} from '@inertiajs/vue3';
import Nav from "@/Components/Admin/Nav.vue";
import Aside from "@/Components/Admin/Aside.vue";
import {onMounted} from "vue";
import { initFlowbite } from "flowbite";

let props = defineProps({
    auth: {
        type: Object,
    },
});

onMounted(() => {
    initFlowbite()
});
</script>

<template>
    <Nav :auth="auth" />
    <Aside :auth="auth" />
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <slot />
        </div>
    </div>

</template>

<style scoped>

</style>
