<template>
    <header>
        <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-900">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                <div class="flex items-center">
                    <span class="text-emerald-500 mr-2">
                        <TagIcon />
                    </span>
                    <span class="self-center text-emerald-500 text-2xl font-semibold whitespace-nowrap">smbr</span>
                </div>
                <div class="flex justify-between items-center w-auto order-1">
                    <ul class="flex items-center mt-4 font-medium space-x-8 mt-0">
                        <a href="https://github.com/Marcelosmbrrr" target="_blank"
                            class="block py-2 text-white rounded lg:p-0 dark:text-white hover:text-emerald-500 cursor-pointer">
                            Github 
                        </a>
                        <a href="https://www.linkedin.com/in/marcelosmbr/" target="_blank"
                            class="flex py-2 text-white rounded lg:p-0 dark:text-white hover:text-emerald-500 cursor-pointer">
                            Linkedin 
                        </a>
                        <li
                            class="flex items-center text-white rounded lg:p-0 dark:text-white hover:text-emerald-500 cursor-not-allowed">
                            <span>Idioma: </span>
                            <img src="https://cdn-icons-png.flaticon.com/512/3955/3955549.png" width="35" height="20" />
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</template>

<script setup lang="ts">
import * as Vue from 'vue';
import TagIcon from '@/Components/Icons/TagIcon.vue';

const language = Vue.ref<"pt-br" | "us-eng">("pt-br");
</script>