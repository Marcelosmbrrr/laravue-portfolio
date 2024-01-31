<template>
    <Head title="Login" />
    <section class="bg-gray-50 dark:bg-gray-900">

        <div class="absolute top-5 right-5">
            <div v-if="getTheme() === 'dark'" class="text-gray-800 dark:text-white dark:hover:text-emerald-500 cursor-pointer">
                <svg @click="toggle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="w-6 h-6">
                    <path
                        d="M12 2.25a.75.75 0 01.75.75v2.25a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM7.5 12a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM18.894 6.166a.75.75 0 00-1.06-1.06l-1.591 1.59a.75.75 0 101.06 1.061l1.591-1.59zM21.75 12a.75.75 0 01-.75.75h-2.25a.75.75 0 010-1.5H21a.75.75 0 01.75.75zM17.834 18.894a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 10-1.061 1.06l1.59 1.591zM12 18a.75.75 0 01.75.75V21a.75.75 0 01-1.5 0v-2.25A.75.75 0 0112 18zM7.758 17.303a.75.75 0 00-1.061-1.06l-1.591 1.59a.75.75 0 001.06 1.061l1.591-1.59zM6 12a.75.75 0 01-.75.75H3a.75.75 0 010-1.5h2.25A.75.75 0 016 12zM6.697 7.757a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 00-1.061 1.06l1.59 1.591z" />
                </svg>
            </div>
            <div v-else class="text-gray-800 dark:text-white hover:text-emerald-500 cursor-pointer">
                <svg @click="toggle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="w-6 h-6">
                    <path fillRule="evenodd"
                        d="M9.528 1.718a.75.75 0 01.162.819A8.97 8.97 0 009 6a9 9 0 009 9 8.97 8.97 0 003.463-.69.75.75 0 01.981.98 10.503 10.503 0 01-9.694 6.46c-5.799 0-10.5-4.701-10.5-10.5 0-4.368 2.667-8.112 6.46-9.694a.75.75 0 01.818.162z"
                        clipRule="evenodd" />
                </svg>
            </div>
        </div>

        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="flex items-center mb-5">
                <span class="text-emerald-500 mr-2">
                    <TagIcon />
                </span>
                <span class="self-center text-emerald-500 text-2xl font-semibold whitespace-nowrap">smbr</span>
            </div>
            <div
                class="w-full bg-white rounded-lg dark:border md:mt-0 sm:max-w-md xl:p-0 dark:border-gray-700 shadow-[5px_5px_rgba(0,_98,_90,_0.4),_10px_10px_rgba(0,_98,_90,_0.3),_15px_15px_rgba(0,_98,_90,_0.2),_20px_20px_rgba(0,_98,_90,_0.1),_25px_25px_rgba(0,_98,_90,_0.05)]">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                        Acesso de administrador
                    </h1>
                    <form class="space-y-4 md:space-y-6" @submit.prevent="submit">
                        <div>
                            <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Nome de
                                Usuário</label>
                            <input type="text" name="username" id="username" v-model="form.username.value"
                                placeholder="Informe o nome de usuário"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-600 block w-full p-2.5">
                            <span class="text-sm text-red-500">{{ formErrors.username.message }}</span>
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Senha</label>
                            <input type="password" name="password" id="password" v-model="form.password.value"
                                placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-600 block w-full p-2.5">
                            <span class="text-sm text-red-500">{{ formErrors.password.message }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="remember" type="checkbox" v-model="form.remember"
                                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-emerald-300">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="remember" class="block text-sm font-medium text-gray-900">Lembrar</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" :disabled="pending"
                            class="w-full text-white bg-emerald-600 hover:bg-emerald-700 focus:ring-4 focus:outline-none focus:ring-emerald-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-emerald-600 dark:hover:bg-emerald-700 dark:focus:ring-emerald-800">
                            {{ pending ? 'Carregando ...' : 'Acessar' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup lang="ts">
import * as Vue from 'vue';
import { Head } from '@inertiajs/vue3';
import { useToast } from "vue-toastification";
import { useAuth } from '@/store/store';
import { useTheme } from '@/store/store';
import TagIcon from '@/Components/Icons/TagIcon.vue';
import { formValidation } from '@/utils/formValidation';

interface IForm {
    username: { value: string, validation: string };
    password: { value: string, validation: string };
    remember: boolean;
}

interface IFormErrors {
    username: { error: boolean; message: string };
    password: { error: boolean; message: string };
}

const form = Vue.reactive<IForm>({
    username: { value: '', validation: 'required' },
    password: { value: '', validation: 'required' },
    remember: false,
});

const formErrors = Vue.reactive<IFormErrors>({
    username: { error: false, message: '' },
    password: { error: false, message: '' },
});

const { login } = useAuth();
const { getTheme, toggle } = useTheme();
const pending = Vue.ref<boolean>(false);
const toast = useToast();

async function submit() {

    let emailValidation = formValidation(form.username.value, form.username.validation);
    let passwordValidation = formValidation(form.password.value, form.password.validation);

    formErrors.username = emailValidation;
    formErrors.password = passwordValidation;

    if (emailValidation.error || passwordValidation.error) {
        return;
    }

    requestServer();

}

async function requestServer() {
    try {
        pending.value = true;
        await login({ username: form.username.value, password: form.password.value, remember: form.remember });
    } catch (e) {
        pending.value = false;
        requestError(e);
    }
}

function requestError(e: any) {
    console.log(e);
    if (e.response.data.message != undefined) {
        toast.error(e.response.data.message);
    } else {
        toast.error("Erro do servidor.");
    }
}
</script>