<template>
    <section class="grid max-w-screen-xl mt-10 px-4 mx-auto lg:gap-8 xl:gap-0 py-20 lg:grid-cols-12">
        <div class="mr-auto place-self-center lg:col-span-7">
            <h1
                class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
                Marcelo<span class="text-red-400">SMBR</span></h1>
            <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                Desenvolvedor Fullstack.
            </p>
            <a href="#" target="_blank"
                class="inline-flex mr-2 items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                Contato
            </a>
            <a href='assets/documents/cv.pdf' target='_blank'
                class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                Currículo
            </a>
        </div>
        <div class="mt-10 lg:mt-0 lg:col-span-5 lg:flex">
            <img src="assets/images/hero-logo/praise.png" class="hover:scale-105 transition duration-500 ease-in-out transform" alt="hero-draw">
        </div>
    </section>
</template>

<script setup lang="ts">
import * as Vue from 'vue';
</script>