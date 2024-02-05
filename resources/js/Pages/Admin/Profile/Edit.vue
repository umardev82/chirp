<script setup>

import InputError from '@/Components/InputError.vue';
import Admin from "@/Layouts/Admin.vue";
import { useForm, usePage } from "@inertiajs/vue3";



const user = usePage().props.auth.user;

const form = useForm({
    name: user.name,
    email: user.email,
    current_password: '',
    password: '',
    password_confirmation: '',
});

const updatePassword = () => {
    form.put(route('password.update'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.password) {
                form.reset('password', 'password_confirmation');
                passwordInput.value.focus();
            }
            if (form.errors.current_password) {
                form.reset('current_password');
                currentPasswordInput.value.focus();
            }
        },
    });
};

</script>

<template>
    <Admin :auth="auth">
        <nav aria-label="Breadcrumb" class="flex mb-4">
            <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a :href="route('admin.dashboard')"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg aria-hidden="true" class="w-3 h-3 me-2.5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-3 h-3 text-gray-400 mx-1 rtl:rotate-180" fill="none"
                            viewBox="0 0 6 10" xmlns="http://www.w3.org/2000/svg">
                            <path d="m1 9 4-4-4-4" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2">Profile Information</span>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="flex justify-between">
            <h2 class="mb-4 text-3xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl">Profile
                Information</h2>
        </div>
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-1">
            <form @submit.prevent="form.patch(route('profile.update'))" class="pb-10">
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-green-700" for="name">Name</label>
                    <input v-model="form.name" id="name"
                        class="border text-green-900 placeholder-green-700 text-sm rounded-lg block w-full p-2.5"
                        placeholder="Domain" type="text" required>
                    <InputError :message="form.errors.domain" class="mt-2" />
                </div>
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-green-700" for="email">Email</label>
                    <input v-model="form.email" id="email"
                        class="border text-green-900 placeholder-green-700 text-sm rounded-lg block w-full p-2.5"
                        placeholder="Email" type="text" required>
                    <InputError :message="form.errors.email" class="mt-2" />
                </div>
                <button type="submit"
                    class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Create</button>
            </form>
        </div>

        <div class="flex justify-between">
            <h2 class="mb-4 text-3xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl">Update Password
            </h2>
        </div>
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-1">
            <form @submit.prevent="updatePassword" class="pb-10">
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-green-700" for="current_password">Current
                        Password</label>
                    <input v-model="form.current_password" id="current_password"
                        class="border text-green-900 placeholder-green-700 text-sm rounded-lg block w-full p-2.5"
                        placeholder="Current Password" type="password" required>
                    <InputError :message="form.errors.current_password" class="mt-2" />
                </div>
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-green-700" for="name">New Password</label>
                    <input v-model="form.password" id="password"
                        class="border text-green-900 placeholder-green-700 text-sm rounded-lg block w-full p-2.5"
                        placeholder="Password" type="password" required>
                    <InputError :message="form.errors.password" class="mt-2" />
                </div>
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-green-700" for="password_confirmation">Confirm
                        Password</label>
                    <input v-model="form.password_confirmation" id="password_confirmation"
                        class="border text-green-900 placeholder-green-700 text-sm rounded-lg block w-full p-2.5"
                        placeholder="Confirm Password" type="password" required>
                    <InputError :message="form.errors.password_confirmation" class="mt-2" />
                </div>
                <button type="submit"
                    class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Create</button>
            </form>
        </div>

    </Admin>
</template>

<style scoped></style>
