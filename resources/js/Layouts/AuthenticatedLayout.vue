<template>
    <section className='bg-white dark:bg-gray-900 flex flex-col h-screen'>
        <header>
            <nav class="border-gray-200 px-4 lg:px-6 py-2.5">
                <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                    <div class="flex items-center">
                        <span class="text-emerald-500 mr-2">
                            <TagIcon />
                        </span>
                        <span
                            class="self-center text-emerald-500 text-2xl font-semibold whitespace-nowrap">smbr-admin</span>
                    </div>
                    <div class="flex justify-between items-center w-auto order-1">
                        <ul class="flex mt-4 font-medium space-x-8 lg:mt-0">
                            <li>
                                <Link href="/projects"
                                    :class="{ 'text-emerald-500': $page.url === '/projects', 'text-gray-800 dark:text-white': $page.url !== '/projects' }"
                                    class="block py-2 pr-4 pl-3 rounded hover:text-emerald-500 bg-emerald-500 bg-transparent lg:p-0">
                                Projetos
                                </Link>
                            </li>
                            <li>
                                <Link href="/technologies"
                                    :class="{ 'text-emerald-500': $page.url === '/technologies', 'text-gray-800 dark:text-white': $page.url !== '/technologies' }"
                                    class="block py-2 pr-4 pl-3 rounded hover:text-emerald-500 bg-emerald-500 bg-transparent lg:p-0">
                                Tecnologias
                                </Link>
                            </li>
                            <li>
                                <Link href="/posts"
                                    :class="{ 'text-emerald-500': $page.url === '/posts', 'text-gray-800 dark:text-white': $page.url !== '/posts' }"
                                    class="block py-2 pr-4 pl-3 rounded hover:text-emerald-500 bg-emerald-500 bg-transparent lg:p-0">
                                Postagens
                                </Link>
                            </li>
                            <li @click="logout"
                                class="block py-2 pr-4 pl-3 text-gray-800 dark:text-white rounded lg:p-0 hover:text-emerald-500 dark:hover:text-emerald-500 cursor-pointer">
                                Logout
                            </li>
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
        <main class="grow pt-20">
            <slot></slot>
        </main>
    </section>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import TagIcon from '@/Components/Icons/TagIcon.vue';
import { useAuth } from '@/store/store';
import { useTheme } from '@/store/store';

const { logout } = useAuth();
const { getTheme, toggle } = useTheme();
</script>