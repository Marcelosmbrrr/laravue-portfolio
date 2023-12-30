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
                        Create Project
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
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input v-model="form.name.value" type="text" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-emerald-500 dark:focus:border-emerald-500"
                                placeholder="Type name">
                            <span class="text-sm text-red-500">{{ formErrors.name.message }}</span>
                        </div>
                        <div>
                            <label for="tech"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Technology</label>
                            <input v-model="form.technology.value" pattern="\w+(?:,\w+)*" type="text" id="tech"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-emerald-500 dark:focus:border-emerald-500"
                                placeholder="Ex: html,css,js">
                            <span class="text-sm text-red-500">{{ formErrors.technology.message }}</span>
                        </div>
                        <div>
                            <label for="phase"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phase</label>
                            <select v-model="form.phase.value" id="phase"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-emerald-500 dark:focus:border-emerald-500">
                                <option value="" disabled>Select an phase</option>
                                <option value="ideia">Idea</option>
                                <option value="planejamento">Planning</option>
                                <option value="development">Development</option>
                                <option value="produção">Production</option>
                                <option value="finalizado">Finished</option>
                            </select>
                            <span class="text-sm text-red-500">{{ formErrors.phase.message }}</span>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                            <textarea v-model="form.description.value" id="description" rows="5"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-emerald-500 focus:border-emerald-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-emerald-500 dark:focus:border-emerald-500"
                                placeholder="Write a description..."></textarea>
                            <span class="text-sm text-red-500">{{ formErrors.description.message }}</span>
                        </div>
                        <ImageUpload @onUploadImage="onUploadImage" />
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
import ImageUpload from '../Shared/ImageUpload.vue';
import { api } from '@/utils/Api';
import { IProject } from '@/Pages/Guest/Home.vue';

const props = defineProps({
    openable: Boolean,
    project: Object as PropType<IProject>
});

interface IForm {
    name: { value: string, validation: string };
    description: { value: string, validation: string };
    phase: { value: "", validation: string };
    technology: { value: string, validation: string };
    image: string
}

interface IFormErrors {
    name: { error: boolean; message: string };
    description: { error: boolean; message: string };
    phase: { error: boolean; message: string };
    technology: { error: boolean; message: string };
}

const form = Vue.reactive<IForm>({
    name: { value: props.project.name, validation: 'required|min:3' },
    description: { value: props.project.description, validation: 'required|min:10' },
    phase: { value: props.project.phase, validation: "required|match:^(ideia|planejamento|desenvolvimento|produção|finalizado)$" },
    technology: { value: props.project.technology, validation: 'required|min:1' },
    image: ""
});

const formErrors = Vue.reactive<IFormErrors>({
    name: { error: false, message: '' },
    description: { error: false, message: '' },
    phase: { error: false, message: '' },
    technology: { error: false, message: '' }
});

const pending = Vue.ref<boolean>(false);
const toast = useToast();

async function submit() {

    let nameValidation = formValidation(form.name.value, form.name.validation);
    let descriptionValidation = formValidation(form.description.value, form.description.validation);
    let phaseValidation = formValidation(form.phase.value, form.phase.validation);
    let technologyValidation = formValidation(form.technology.value.split(","), form.technology.validation);

    formErrors.name = nameValidation;
    formErrors.description = descriptionValidation;
    formErrors.phase = phaseValidation;
    formErrors.technology = technologyValidation;

    if (nameValidation.error || descriptionValidation.error || phaseValidation.error || technologyValidation.error) {
        return;
    }

    pending.value = true;

    try {
        await api.patch('api/projects', {
            name: form.name.value,
            description: form.description.value,
            phase: form.phase.value,
            technology: form.technology.value,
            image: form.image
        });
        toast.success('Project created successfully!');
        open.value = false;
    } catch (error) {
        toast.error('An error occurred while creating the project.');
    } finally {
        pending.value = false;
    }
}

function onOpen() {
    if (props.openable) {
        open.value = true;
    }
}

function onUploadImage(uploaded_file: any) {
    form.image = uploaded_file;
}

const open = Vue.ref<boolean>(false);
</script>