<template>
    <div class="max-w-7xl px-5 md:px-0 mx-auto mt-10">
        <div class="flex items-center gap-2">
            <div class="text-emerald-400">
                <TagIcon />
            </div>
            <h1 class="text-2xl font-bold text-white"><span class="text-emerald-400">Posts</span> recentes</h1>
        </div>
        <div class="flex justify-start flex-wrap pb-3 gap-3 mt-5 cursor-pointer rounded-l-lg">

            <div v-if="posts!.length > 0" v-for="post in posts" :key="post.uuid"
                class="max-w-sm bg-white border border-gray-200 rounded-lg shadow hover:shadow-[5px_5px_rgba(0,_98,_90,_0.4),_10px_10px_rgba(0,_98,_90,_0.3),_15px_15px_rgba(0,_98,_90,_0.2),_20px_20px_rgba(0,_98,_90,_0.1),_25px_25px_rgba(0,_98,_90,_0.05)] dark:bg-gray-800 dark:border-gray-700">
                <div class='relative h-56 overflow-y-hidden'>
                    <img class="rounded-t-lg h-full w-full" :src="post.image_src" alt="post image" />
                </div>
                <div class="p-5">
                    <div class="flex justify-between items-center mb-2">
                        <h5 class="text-2xl mr-2 font-bold tracking-tight text-gray-900 dark:text-white">{{ post.name }}
                        </h5>
                        <div class="bg-emerald-500 text-white text-xs font-medium me-2 px-2.5 py-0.5 rounded">
                            {{ post.category }}</div>
                    </div>
                    <div class="h-20 dark:text-white break-words text-justify mt-2">
                        {{ post.description }}
                    </div>
                </div>
                <a :href="`/posts/guest/${post.uuid}`" target="_blank" class="flex justify-end p-2">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white hover:text-emerald-600 dark:hover:text-emerald-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M18 14v4.8a1.2 1.2 0 0 1-1.2 1.2H5.2A1.2 1.2 0 0 1 4 18.8V7.2A1.2 1.2 0 0 1 5.2 6h4.6m4.4-2H20v5.8m-7.9 2L20 4.2" />
                    </svg>
                </a>
            </div>

            <div v-else>
                <span class="text-gray-800 dark:text-white">Nenhum post encontrado.</span>
            </div>

        </div>
    </div>
</template>

<script setup lang="ts">
import * as Vue from 'vue';
import { defineProps } from 'vue';
import TagIcon from '@/Components/Icons/TagIcon.vue';
import { IPost } from '@/Pages/Guest/Home.vue';

const { posts } = defineProps({ posts: Array<IPost> });
const selectedPost = Vue.ref<string>("0");
</script>