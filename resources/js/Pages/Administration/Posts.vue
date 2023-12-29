<template>
    <Head title="Posts" />
    <AuthenticatedLayout>
        <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
            <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                <!-- Start coding here -->
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                    <div
                        class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                        <div class="w-full md:w-1/2">
                            <form class="flex items-center">
                                <label for="simple-search" class="sr-only">Search</label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                            fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input v-model="search" @keydown="onSubmitSearch" type="text" id="simple-search"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Procurar post" />
                                </div>
                            </form>
                        </div>
                        <div class="w-full flex justify-end gap-1">
                            <CreatePost />
                            <EditPost />
                            <DeleteResource />
                            <button type="button" @click="reload = !reload"
                                class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                <svg class="w-3 h-3 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 18 20">
                                    <path
                                        d="M17 9a1 1 0 0 0-1 1 6.994 6.994 0 0 1-11.89 5H7a1 1 0 0 0 0-2H2.236a1 1 0 0 0-.585.07c-.019.007-.037.011-.055.018-.018.007-.028.006-.04.014-.028.015-.044.042-.069.06A.984.984 0 0 0 1 14v5a1 1 0 1 0 2 0v-2.32A8.977 8.977 0 0 0 18 10a1 1 0 0 0-1-1ZM2 10a6.994 6.994 0 0 1 11.89-5H11a1 1 0 0 0 0 2h4.768a.992.992 0 0 0 .581-.07c.019-.007.037-.011.055-.018.018-.007.027-.006.04-.014.028-.015.044-.042.07-.06A.985.985 0 0 0 17 6V1a1 1 0 1 0-2 0v2.32A8.977 8.977 0 0 0 0 10a1 1 0 1 0 2 0Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">#</th>
                                    <th scope="col" class="px-4 py-3">Nome</th>
                                    <th scope="col" class="px-4 py-3">Descrição</th>
                                    <th scope="col" class="px-4 py-3">Imagem</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="!pending && posts.length > 0" v-for="post in posts"
                                    class="border-b dark:border-gray-700">
                                    <td class="px-4 py-3">
                                        <input :id="String(post.id)" @change="onSelect" type="checkbox"
                                            :checked="selections.map((post) => post.id).includes(post.id)"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </td>
                                    <td class="px-4 py-3">{{ post.name }}</td>
                                    <td class="px-4 py-3">{{ post.description }}</td>
                                    <td class="px-4 py-3">{{ post.image_url }}</td>
                                </tr>
                                <tr v-else-if="!pending && posts.length === 0" class="border-b dark:border-gray-700">
                                    <td colspan="4" class="px-4 py-3 text-center">Nenhum post encontrado</td>
                                </tr>
                                <tr v-else-if="pending" class="border-b dark:border-gray-700">
                                    <td colspan="4" class="px-4 py-3 text-center">Carregando ...</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <nav
                        class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4">
                        <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                            Showing
                            <span class="font-semibold text-gray-900 dark:text-white">1-{{ limit }}</span>
                            of
                            <span class="font-semibold text-gray-900 dark:text-white">{{ totalRecords }}</span>
                        </span>
                        <ul class="inline-flex items-stretch -space-x-px">
                            <li @click="onPreviousPage"
                                class="flex items-center justify-center h-full py-1.5 px-3 ml-0 cursor-pointer text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </li>
                            <li @click="onNextPage"
                                class="flex items-center justify-center h-full py-1.5 px-3 leading-tight cursor-pointer text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </section>
    </AuthenticatedLayout>
</template>

<script setup lang="ts">
import * as Vue from 'vue';
import { api } from '@/utils/Api';
import { Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import CreatePost from '@/Components/Forms/Posts/CreatePost.vue';
import EditPost from '@/Components/Forms/Posts/EditPost.vue';
import DeleteResource from '@/Components/Forms/Shared/DeleteResource.vue';

interface IPost {
    id: number;
    name: string;
    description: string;
    image_url: string;
    content: string[];
    created_at: string;
    updated_at: string;
}

const posts = Vue.ref<IPost[]>([]);
const selections = Vue.ref<IPost[]>([]);
const pending = Vue.ref<boolean>(false);
const limit = Vue.ref<number>(10);
const page = Vue.ref<number>(1);
const search = Vue.ref<string>('');
const reload = Vue.ref<boolean>(false);
const totalPages = Vue.ref<number>(0);
const totalRecords = Vue.ref<number>(0);

Vue.onMounted(() => {
    fetchPosts();
});

Vue.watch([limit, page, reload], () => {
    fetchPosts();
});

async function fetchPosts() {
    try {
        pending.value = true;
        const response = await api.get(`api/posts?limit=${limit.value}&page=${page.value}&search=${search.value}`);
        posts.value = response.data.posts;
        totalPages.value = response.data.pagination.pages;
        totalRecords.value = response.data.pagination.records;
    } catch (error) {
        console.log(error);
    } finally {
        pending.value = false;
    }
}

function onSubmitSearch() {
    if (e.key === 'Enter') {
        page.value = 1;
    }
}

function onSelect(e: Event) {
    console.log(e.currentTarget.id);
}

function onNextPage() {
    if (page.value < totalPages.value) {
        page.value++;
    }
}

function onPreviousPage() {
    if (page.value > 1) {
        page.value--;
    }
}
</script>