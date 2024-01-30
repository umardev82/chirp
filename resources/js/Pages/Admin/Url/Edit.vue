<script setup>
import Admin from "@/Layouts/Admin.vue";
import {Link, useForm} from "@inertiajs/vue3";

let props = defineProps({
    auth: {
        type: Object,
    },
    url: {
        type: Object,
    },
});


let form = useForm({
    title: props.url.title,
    original_url: props.url.original_url,
})

</script>

<template>
    <Admin>
        <nav aria-label="Breadcrumb" class="flex mb-4">
            <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a :href="route('admin.dashboard')"
                       class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg aria-hidden="true" class="w-3 h-3 me-2.5" fill="currentColor"
                             viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-3 h-3 text-gray-400 mx-1 rtl:rotate-180"
                             fill="none" viewBox="0 0 6 10" xmlns="http://www.w3.org/2000/svg">
                            <path d="m1 9 4-4-4-4" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="2"/>
                        </svg>
                        <Link :href="route('admin.urls.index')"
                              class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">
                            Locking Content
                        </Link>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-3 h-3 text-gray-400 mx-1 rtl:rotate-180"
                             fill="none" viewBox="0 0 6 10" xmlns="http://www.w3.org/2000/svg">
                            <path d="m1 9 4-4-4-4" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="2"/>
                        </svg>
                        <span
                            class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Create</span>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="flex justify-between">
            <h2 class="mb-4 text-3xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl">
                Update Locking Content
            </h2>
        </div>


        <div class="grid grid-cols-1 gap-6 sm:grid-cols-1">
            <form @submit.prevent="form.put(route('admin.urls.update', url.id))" class="pb-10">
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-green-700"
                           for="username-success">Title</label>
                    <input v-model="form.title" id="title" class="border text-green-900 placeholder-green-700 text-sm rounded-lg block w-full p-2.5"
                           placeholder="Title"
                           type="text" required>
                </div>
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-green-700"
                           for="original_url">URL</label>
                    <input v-model="form.original_url" id="original_url" class="border text-green-900 placeholder-green-700 text-sm rounded-lg block w-full p-2.5"
                           placeholder="https://google.com"
                           type="url" required>
                </div>
                <button type="submit" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                    Update
                </button>

            </form>
        </div>
    </Admin>
</template>

<style scoped>

</style>
