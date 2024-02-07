<template>
    <Head title="Post - Edit" />
    <div class="flex flex-col h-screen">
        <header>
            <nav class="bg-white border-gray-200 px-4 py-2.5 dark:bg-gray-900">
                <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                    <div class="flex items-center">
                        <span class="text-emerald-500 mr-2">
                            <TagIcon />
                        </span>
                        <span class="self-center text-emerald-500 text-2xl font-semibold whitespace-nowrap">smbr - post
                            edition</span>
                    </div>
                    <div class="flex justify-between items-center w-auto order-1">
                        <ul class="flex items-center mt-4 font-medium space-x-8">
                            <Link href="/posts" target="_blank"
                                class="flex py-2 text-gray-800 dark:text-white rounded lg:p-0 hover:text-emerald-500 dark:hover:text-emerald-500 cursor-pointer">
                            Voltar
                            </Link>
                            <li v-if="getTheme() === 'dark'"
                                class="flex items-center text-gray-800 dark:text-white rounded lg:p-0 dark:hover:text-emerald-500 cursor-pointer">
                                <svg @click="toggle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="currentColor" class="w-6 h-6">
                                    <path
                                        d="M12 2.25a.75.75 0 01.75.75v2.25a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM7.5 12a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM18.894 6.166a.75.75 0 00-1.06-1.06l-1.591 1.59a.75.75 0 101.06 1.061l1.591-1.59zM21.75 12a.75.75 0 01-.75.75h-2.25a.75.75 0 010-1.5H21a.75.75 0 01.75.75zM17.834 18.894a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 10-1.061 1.06l1.59 1.591zM12 18a.75.75 0 01.75.75V21a.75.75 0 01-1.5 0v-2.25A.75.75 0 0112 18zM7.758 17.303a.75.75 0 00-1.061-1.06l-1.591 1.59a.75.75 0 001.06 1.061l1.591-1.59zM6 12a.75.75 0 01-.75.75H3a.75.75 0 010-1.5h2.25A.75.75 0 016 12zM6.697 7.757a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 00-1.061 1.06l1.59 1.591z" />
                                </svg>
                            </li>
                            <li v-else
                                class="flex items-center text-gray-800 dark:text-white rounded lg:p-0 hover:text-emerald-500 cursor-pointer">
                                <svg @click="toggle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="currentColor" class="w-6 h-6">
                                    <path fillRule="evenodd"
                                        d="M9.528 1.718a.75.75 0 01.162.819A8.97 8.97 0 009 6a9 9 0 009 9 8.97 8.97 0 003.463-.69.75.75 0 01.981.98 10.503 10.503 0 01-9.694 6.46c-5.799 0-10.5-4.701-10.5-10.5 0-4.368 2.667-8.112 6.46-9.694a.75.75 0 01.818.162z"
                                        clipRule="evenodd" />
                                </svg>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <main class="grow px-5 bg-white dark:bg-gray-900">
            <form @submit.prevent="submit" class="mx-auto max-w-7xl mt-16">
                <div class="mb-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <input type="text" id="name" v-model="form.name.value"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Type post name">
                </div>
                <div class="mb-5">
                    <label for="description"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <input type="text" id="description" v-model="form.description.value"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Type post description">
                </div>
                <div class="mb-5">
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                        category</label>
                    <select id="countries" v-model="form.category.value"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected disabled>Choose an option</option>
                        <option value="technology">Technology</option>
                        <option value="delusions">Delusions</option>
                    </select>
                </div>
                <div class="mb-5">
                    <div
                        class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                        <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                            <textarea id="comment" rows="18" v-model="form.content.value"
                                class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                                placeholder="Write post content"></textarea>
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <ImageUpload @onUploadImage="onUploadImage" />
                </div>
            </form>
        </main>
    </div>
</template>

<script setup lang="ts">
import * as Vue from 'vue';
import { Link, router } from '@inertiajs/vue3';
import { Head } from '@inertiajs/vue3';
import { useTheme } from '@/store/store';
import { useToast } from "vue-toastification";
import { validateForm } from '@/utils/ValidateForm';
import ImageUpload from '@/Components/Forms/Shared/ImageUpload.vue';
import TagIcon from '@/Components/Icons/TagIcon.vue';
import { api } from '@/utils/Api';

const formSchema = Vue.reactive({
    name: { value: '', validation: 'required|min:3' },
    description: { value: '', validation: 'required|min:20|max:100' },
    category: { value: "", validation: 'required|match:delírios,tecnologia' },
    content: { value: [] as string[], validation: "required|array" },
    images: { value: [] as any[], validation: "required|array" }
})

const formValidation = Vue.reactive({
    name: { error: false, message: "" },
    description: { error: false, message: "" },
    category: { error: false, message: "" },
    content: { error: false, message: "" },
    images: { error: false, message: "" }
})

const { getTheme, toggle } = useTheme();
const pending = Vue.ref<boolean>(false);
const toast = useToast();

async function submit() {

    const formValidationResults = validateForm(formSchema);
    Object.assign(formValidation, formValidationResults.results);

    if (formValidationResults.is_valid) {
        try {
            pending.value = true;
            await api.post('api/projects', {
                name: formSchema.name.value,
                description: formSchema.description.value,
                category: formSchema.category.value,
                content: formSchema.content.value,
                images: formSchema.images.value
            }, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                },
                responseType: 'json'
            });
            toast.success('Project created successfully!');
            setTimeout(() => {
                router.get("/posts");
            }, 1500);
        } catch (error) {
            toast.error('An error occurred while creating the project.');
        } finally {
            pending.value = false;
        }
    }
}

function onUploadImage(img_array: any[]) {
    formSchema.images.value = img_array;
}
</script>