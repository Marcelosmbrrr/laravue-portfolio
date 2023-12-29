<template>
     <Head title="Login" />
    <section class="bg-gray-50 dark:bg-gray-900">
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
import TagIcon from '@/Components/Icons/TagIcon.vue';
import { formValidation } from '@/utils/formValidation';

interface IForm {
    username: { value: string, type: string };
    password: { value: string, type: string };
    remember: boolean;
}

interface IFormErrors {
    username: { error: boolean; message: string };
    password: { error: boolean; message: string };
}

const form = Vue.reactive<IForm>({
    username: { value: '', type: 'required' },
    password: { value: '', type: 'required' },
    remember: false,
});

const formErrors = Vue.reactive<IFormErrors>({
    username: { error: false, message: '' },
    password: { error: false, message: '' },
});

const { login } = useAuth();
const pending = Vue.ref<boolean>(false);
const toast = useToast();

async function submit() {

    let emailValidation = formValidation(form.username.value, form.username.type);
    let passwordValidation = formValidation(form.password.value, form.password.type);

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