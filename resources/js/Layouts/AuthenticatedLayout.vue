<template>
    <section className='flex flex-col h-screen'>
        <header>
            <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-900">
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
                                    :class="{ 'text-emerald-500': $page.url === '/projects', 'text-white': $page.url !== '/projects' }"
                                    class="block py-2 pr-4 pl-3 rounded hover:text-emerald-500 bg-emerald-500 bg-transparent lg:p-0">
                                Projetos
                                </Link>
                            </li>
                            <li>
                                <Link href="/technologies"
                                    :class="{ 'text-emerald-500': $page.url === '/technologies', 'text-white': $page.url !== '/technologies' }"
                                    class="block py-2 pr-4 pl-3 rounded hover:text-emerald-500 bg-emerald-500 bg-transparent lg:p-0">
                                Tecnologias
                                </Link>
                            </li>
                            <li>
                                <div
                                    :class="{ 'text-emerald-500': $page.url === '/posts', 'text-white': $page.url !== '/posts' }"
                                    class="block py-2 pr-4 pl-3 rounded hover:text-emerald-500 bg-emerald-500 bg-transparent lg:p-0 cursor-not-allowed">
                                Postagens
                                </div>
                            </li>
                            <div @click="logout"
                                class="block py-2 pr-4 pl-3 text-white rounded lg:p-0 hover:text-emerald-500 cursor-pointer">
                                Logout
                            </div>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <main class="grow pt-20 bg-gray-900">
            <slot></slot>
        </main>
    </section>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import TagIcon from '@/Components/Icons/TagIcon.vue';
import Footer from '@/Components/Layout/Guest/Footer.vue';
import { useAuth } from '@/store/store';

const { logout } = useAuth();
</script>