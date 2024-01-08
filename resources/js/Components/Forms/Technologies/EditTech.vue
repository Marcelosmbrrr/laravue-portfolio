<template>
    <!-- Modal toggle -->
    <button @click="onOpen" type="button"
        class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-emerald-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
        Edit
    </button>

    <!-- Main modal -->
    <div v-if="open"
        class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">

        <div className="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity"></div>

        <div class="relative p-4 w-full mx-auto mt-10 max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Edit Tech
                    </h3>
                    <button @click="open = false" type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="updateProductModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <!-- Modal body -->
                <form @submit.prevent="submit">
                    <div class="flex flex-col mb-4">
                        <div>
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input v-model="form.name.value" type="text" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-emerald-500 dark:focus:border-emerald-500"
                                placeholder="Type name">
                            <span class="text-sm text-red-500">{{ formErrors.name.message }}</span>
                        </div>
                        <div>

                            <label for="technologies"
                                class="block my-4 text-sm font-medium text-gray-900 dark:text-white">Tecnologias</label>

                            <div class="w-full h-32 flex flex-wrap gap-1 pb-3 overflow-y-scroll">
                                <div @click="iconSelection" id="html5/html5-original"
                                    class="flex justify-center items-center h-12 w-12 cursor-pointer border border-gray-500 hover:bg-emerald-400 rounded-lg"
                                    :class="{ 'bg-emerald-400': form.icon.value.includes('html5/html5-original') }">
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg"
                                        class="w-8 h-8" />
                                </div>
                                <div @click="iconSelection" id="css3/css3-original"
                                    class="flex justify-center items-center h-12 w-12 cursor-pointer border border-gray-500 hover:bg-emerald-400 rounded-lg"
                                    :class="{ 'bg-emerald-400': form.icon.value.includes('css3/css3-original') }">
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg"
                                        class="w-8 h-8" />
                                </div>
                                <div @click="iconSelection" id="javascript/javascript-original"
                                    class="flex justify-center items-center h-12 w-12 cursor-pointer border border-gray-500 hover:bg-emerald-400 rounded-lg"
                                    :class="{ 'bg-emerald-400': form.icon.value.includes('javascript/javascript-original') }">
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg"
                                        class="w-8 h-8" />
                                </div>
                                <div @click="iconSelection" id="typescript/typescript-original"
                                    class="flex justify-center items-center h-12 w-12 cursor-pointer border border-gray-500 hover:bg-emerald-400 rounded-lg"
                                    :class="{ 'bg-emerald-400': form.icon.value.includes('typescript/typescript-original') }">
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/typescript/typescript-original.svg"
                                        class="w-8 h-8" />
                                </div>
                                <div @click="iconSelection" id="php/php-original"
                                    class="flex justify-center items-center h-12 w-12 cursor-pointer border border-gray-500 hover:bg-emerald-400 rounded-lg"
                                    :class="{ 'bg-emerald-400': form.icon.value.includes('php/php-original') }">
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg"
                                        class="w-8 h-8" />
                                </div>
                                <div @click="iconSelection" id="tailwindcss/tailwindcss-plain"
                                    class="flex justify-center items-center h-12 w-12 cursor-pointer border border-gray-500 hover:bg-emerald-400 rounded-lg"
                                    :class="{ 'bg-emerald-400': form.icon.value.includes('tailwindcss/tailwindcss-plain') }">
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/tailwindcss/tailwindcss-plain.svg"
                                        class="w-8 h-8" />
                                </div>
                                <div @click="iconSelection" id="react/react-original"
                                    class="flex justify-center items-center h-12 w-12 cursor-pointer border border-gray-500 hover:bg-emerald-400 rounded-lg"
                                    :class="{ 'bg-emerald-400': form.icon.value.includes('react/react-original') }">
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/react/react-original.svg"
                                        class="w-8 h-8" />
                                </div>
                                <div @click="iconSelection" id="vuejs/vuejs-original"
                                    class="flex justify-center items-center h-12 w-12 cursor-pointer border border-gray-500 hover:bg-emerald-400 rounded-lg"
                                    :class="{ 'bg-emerald-400': form.icon.value.includes('vuejs/vuejs-original') }">
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/vuejs/vuejs-original.svg"
                                        class="w-8 h-8" />
                                </div>
                                <div @click="iconSelection" id="angularjs/angularjs-original"
                                    class="flex justify-center items-center h-12 w-12 cursor-pointer border border-gray-500 hover:bg-emerald-400 rounded-lg"
                                    :class="{ 'bg-emerald-400': form.icon.value.includes('angularjs/angularjs-original') }">
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/angularjs/angularjs-original.svg"
                                        class="w-8 h-8" />
                                </div>
                                <div @click="iconSelection" id="nuxtjs/nuxtjs-original"
                                    class="flex justify-center items-center h-12 w-12 cursor-pointer border border-gray-500 hover:bg-emerald-400 rounded-lg"
                                    :class="{ 'bg-emerald-400': form.icon.value.includes('nuxtjs/nuxtjs-original') }">
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nuxtjs/nuxtjs-original.svg"
                                        class="w-8 h-8" />
                                </div>
                                <div @click="iconSelection" id="android/android-plain"
                                    class="flex justify-center items-center h-12 w-12 cursor-pointer border border-gray-500 hover:bg-emerald-400 rounded-lg"
                                    :class="{ 'bg-emerald-400': form.icon.value.includes('android/android-plain') }">
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/android/android-plain.svg"
                                        class="w-8 h-8" />
                                </div>
                                <div @click="iconSelection" id="docker/docker-original"
                                    class="flex justify-center items-center h-12 w-12 cursor-pointer border border-gray-500 hover:bg-emerald-400 rounded-lg"
                                    :class="{ 'bg-emerald-400': form.icon.value.includes('docker/docker-original') }">
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/docker/docker-original.svg"
                                        class="w-8 h-8" />
                                </div>
                                <div @click="iconSelection" id="amazonwebservices/amazonwebservices-original"
                                    class="flex justify-center items-center h-12 w-12 cursor-pointer border border-gray-500 hover:bg-emerald-400 rounded-lg"
                                    :class="{ 'bg-emerald-400': form.icon.value.includes('amazonwebservices/amazonwebservices-original') }">
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/amazonwebservices/amazonwebservices-original.svg"
                                        class="w-8 h-8" />
                                </div>
                                <div @click="iconSelection" id="digitalocean/digitalocean-original"
                                    class="flex justify-center items-center h-12 w-12 cursor-pointer border border-gray-500 hover:bg-emerald-400 rounded-lg"
                                    :class="{ 'bg-emerald-400': form.icon.value.includes('digitalocean/digitalocean-original') }">
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/digitalocean/digitalocean-original.svg"
                                        class="w-8 h-8" />
                                </div>
                                <div @click="iconSelection" id="laravel/laravel-plain"
                                    class="flex justify-center items-center h-12 w-12 cursor-pointer border border-gray-500 hover:bg-emerald-400 rounded-lg"
                                    :class="{ 'bg-emerald-400': form.icon.value.includes('laravel/laravel-plain') }">
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-plain.svg"
                                        class="w-8 h-8" />
                                </div>
                                <div @click="iconSelection" id="nodejs/nodejs-original"
                                    class="flex justify-center items-center h-12 w-12 cursor-pointer border border-gray-500 hover:bg-emerald-400 rounded-lg"
                                    :class="{ 'bg-emerald-400': form.icon.value.includes('nodejs/nodejs-original') }">
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nodejs/nodejs-original.svg"
                                        class="w-8 h-8" />
                                </div>
                                <div @click="iconSelection" id="express/express-original"
                                    class="flex justify-center items-center h-12 w-12 cursor-pointer border border-gray-500 hover:bg-emerald-400 rounded-lg"
                                    :class="{ 'bg-emerald-400': form.icon.value.includes('express/express-original') }">
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/express/express-original.svg"
                                        class="w-8 h-8" />
                                </div>
                                <div @click="iconSelection" id="adonisjs/adonisjs-original"
                                    class="flex justify-center items-center h-12 w-12 cursor-pointer border border-gray-500 hover:bg-emerald-400 rounded-lg"
                                    :class="{ 'bg-emerald-400': form.icon.value.includes('adonisjs/adonisjs-original') }">
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/adonisjs/adonisjs-original.svg"
                                        class="w-8 h-8" />
                                </div>
                                <div @click="iconSelection" id="nestjs/nestjs-plain"
                                    class="flex justify-center items-center h-12 w-12 cursor-pointer border border-gray-500 hover:bg-emerald-400 rounded-lg"
                                    :class="{ 'bg-emerald-400': form.icon.value.includes('nestjs/nestjs-plain') }">
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nestjs/nestjs-plain.svg"
                                        class="w-8 h-8" />
                                </div>
                                <div @click="iconSelection" id="bootstrap/bootstrap-original"
                                    class="flex justify-center items-center h-12 w-12 cursor-pointer border border-gray-500 hover:bg-emerald-400 rounded-lg"
                                    :class="{ 'bg-emerald-400': form.icon.value.includes('bootstrap/bootstrap-original') }">
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg"
                                        class="w-8 h-8" />
                                </div>
                                <div @click="iconSelection" id="java/java-original-wordmark"
                                    class="flex justify-center items-center h-12 w-12 cursor-pointer border border-gray-500 hover:bg-emerald-400 rounded-lg"
                                    :class="{ 'bg-emerald-400': form.icon.value.includes('java/java-original-wordmark') }">
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/java/java-original-wordmark.svg"
                                        class="w-8 h-8" />
                                </div>
                                <div @click="iconSelection" id="jenkins/jenkins-original"
                                    class="flex justify-center items-center h-12 w-12 cursor-pointer border border-gray-500 hover:bg-emerald-400 rounded-lg"
                                    :class="{ 'bg-emerald-400': form.icon.value.includes('jenkins/jenkins-original') }">
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/jenkins/jenkins-original.svg"
                                        class="w-8 h-8" />
                                </div>
                                <div @click="iconSelection" id="jquery/jquery-plain-wordmark"
                                    class="flex justify-center items-center h-12 w-12 cursor-pointer border border-gray-500 hover:bg-emerald-400 rounded-lg"
                                    :class="{ 'bg-emerald-400': form.icon.value.includes('jquery/jquery-plain-wordmark') }">
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/jquery/jquery-plain-wordmark.svg"
                                        class="w-8 h-8" />
                                </div>
                                <div @click="iconSelection" id="kubernetes/kubernetes-plain"
                                    class="flex justify-center items-center h-12 w-12 cursor-pointer border border-gray-500 hover:bg-emerald-400 rounded-lg"
                                    :class="{ 'bg-emerald-400': form.icon.value.includes('kubernetes/kubernetes-plain') }">
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/kubernetes/kubernetes-plain.svg"
                                        class="w-8 h-8" />
                                </div>
                                <div @click="iconSelection" id="nextjs/nextjs-original"
                                    class="flex justify-center items-center h-12 w-12 cursor-pointer border border-gray-500 hover:bg-emerald-400 rounded-lg"
                                    :class="{ 'bg-emerald-400': form.icon.value.includes('nextjs/nextjs-original') }">
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nextjs/nextjs-original.svg"
                                        class="w-8 h-8" />
                                </div>
                                <div @click="iconSelection" id="mysql/mysql-original-wordmark"
                                    class="flex justify-center items-center h-12 w-12 cursor-pointer border border-gray-500 hover:bg-emerald-400 rounded-lg"
                                    :class="{ 'bg-emerald-400': form.icon.value.includes('mysql/mysql-original-wordmark') }">
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original-wordmark.svg"
                                        class="w-8 h-8" />
                                </div>
                                <div @click="iconSelection" id="postgresql/postgresql-original"
                                    class="flex justify-center items-center h-12 w-12 cursor-pointer border border-gray-500 hover:bg-emerald-400 rounded-lg"
                                    :class="{ 'bg-emerald-400': form.icon.value.includes('postgresql/postgresql-original') }">
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/postgresql/postgresql-original.svg"
                                        class="w-8 h-8" />
                                </div>
                                <div @click="iconSelection" id="mongodb/mongodb-original-wordmark"
                                    class="flex justify-center items-center h-12 w-12 cursor-pointer border border-gray-500 hover:bg-emerald-400 rounded-lg"
                                    :class="{ 'bg-emerald-400': form.icon.value.includes('mongodb/mongodb-original-wordmark') }">
                                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mongodb/mongodb-original-wordmark.svg"
                                        class="w-8 h-8" />
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                            <textarea v-model="form.description.value" id="description" rows="5"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-emerald-500 focus:border-emerald-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-emerald-500 dark:focus:border-emerald-500"
                                placeholder="Write a description..."></textarea>
                            <span class="text-sm text-red-500">{{ formErrors.description.message }}</span>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button type="submit"
                            class="text-white bg-emerald-700 hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-emerald-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-emerald-600 dark:hover:bg-emerald-700 dark:focus:ring-emerald-800">
                            {{ pending ? 'Loading ...' : 'Confirm' }}
                        </button>
                        <button @click="open = false" type="button"
                            class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 me-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                            Cancelar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import * as Vue from 'vue';
import { defineProps, PropType } from 'vue';
import { useToast } from "vue-toastification";
import { formValidation } from '@/utils/formValidation';
import { api } from '@/utils/Api';

interface ISelectedTech {
    id: number;
    name: string;
    description: string;
    icon: string[];
}

const props = defineProps({
    tech: Object as PropType<ISelectedTech>
});

interface IForm {
    name: { value: string, validation: string };
    description: { value: string, validation: string };
    icon: { value: string[], validation: string };
}

interface IFormErrors {
    name: { error: boolean; message: string };
    description: { error: boolean; message: string };
    icon: { error: boolean; message: string };
}

const form = Vue.reactive<IForm>({
    name: { value: props.tech?.name, validation: 'required|min:3' },
    description: { value: props.tech?.description, validation: 'required|min:10' },
    icon: { value: props.tech?.icon, validation: "required|min:1" }
});

const formErrors = Vue.reactive<IFormErrors>({
    name: { error: false, message: '' },
    description: { error: false, message: '' },
    icon: { error: false, message: '' }
});

const open = Vue.ref<boolean>(false);
const pending = Vue.ref<boolean>(false);
const toast = useToast();

async function submit() {

    let nameValidation = formValidation(form.name.value, form.name.validation);
    let descriptionValidation = formValidation(form.description.value, form.description.validation);
    let iconValidation = formValidation(form.icon.value, form.icon.validation);

    formErrors.name = nameValidation;
    formErrors.description = descriptionValidation;
    formErrors.icon = iconValidation;

    if (nameValidation.error || descriptionValidation.error || iconValidation.error) {
        return;
    }

    pending.value = true;

    try {
        await api.post('api/projects', {
            name: form.name.value,
            description: form.description.value,
            icon: form.icon.value
        });
        toast.success('Tech created successfully!');
        open.value = false;
    } catch (error) {
        toast.error('An error occurred while creating the tech.');
    } finally {
        pending.value = false;
    }
}

function iconSelection(e: any) {

    let clone = form.icon.value;
    let indexOf = clone.indexOf(e.currentTarget.id); // -1 or index (0 - n)

    if (form.icon.value.length === 0 || !Boolean(indexOf + 1)) {
        clone.push(e.currentTarget.id);
        form.icon.value = clone;
        return;
    }

    clone.splice(indexOf, 1);
    form.icon.value = clone;
}

function onOpen() {
    open.value = true;
}
</script>