<template>
    <Head title="Post View" />
    <div class="flex flex-col h-screen">
        <header>
            <nav class="bg-white border-gray-200 px-4 py-2.5 dark:bg-gray-900">
                <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                    <div class="flex items-center">
                        <span class="text-emerald-500 mr-2">
                            <TagIcon />
                        </span>
                        <span class="self-center text-emerald-500 text-2xl font-semibold whitespace-nowrap">smbr -
                            post</span>
                    </div>
                    <div class="flex justify-between items-center w-auto order-1">
                        <ul class="flex items-center mt-4 font-medium space-x-2">
                            <button @click="onClose"
                                class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-900 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                Voltar
                            </button>
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
            <div class="mx-auto max-w-7xl mt-10">
                <div id="controls-carousel" class="relative w-full">
                    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                        <div class="duration-700 ease-in-out">
                            <img :src="props.post?.image_src"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                    <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">{{
                        props.post?.name }}</h2>
                </div>
                <div class="pb-5">
                    <p v-for="paragraph in props.post?.content"
                        class="font-light text-gray-500 sm:text-xl dark:text-gray-400 mt-3">{{ paragraph }}</p>
                </div>
            </div>
        </main>
    </div>
</template>

<script setup lang="ts">
import * as Vue from 'vue';
import { defineProps, PropType, } from 'vue';
import { Head } from '@inertiajs/vue3';
import { useTheme } from '@/store/store';
import TagIcon from '@/Components/Icons/TagIcon.vue';

interface IPost {
    id: string;
    name: string;
    description: string;
    category: string;
    content: string[];
    image_src: string;
}

const props = defineProps({ post: Object as PropType<IPost> });
const { getTheme, toggle } = useTheme();

function onClose() {
    window.close();
}
</script>