<template>
    <div class="max-w-7xl px-5 lg:px-0 mx-auto">
        <div class="flex items-center gap-2">
            <div class="text-emerald-400">
                <TagIcon />
            </div>
            <h1 class="text-2xl font-bold text-white"><span class="text-emerald-400">Tecnologias</span> utilizadas</h1>
        </div>
        <div className='flex flex-wrap gap-8 mt-6'>
            <div className="flex flex-col p-1 gap-2 basis-72 h-36">
                <div className='h-auto flex gap-2'>
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg" class="h-10 w-10"
                        alt='html icon' />
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg" class="h-10 w-10"
                        alt='css icon' />
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg"
                        class="h-10 w-10" alt='js icon' />
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/typescript/typescript-original.svg"
                        class="h-10 w-10" alt=' ts icon' />
                </div>
                <div className='h-auto'>
                    <span className='font-semibold dark:text-white'>Frontend Essencial</span>
                </div>
                <div className='h-full w-full text-justify'>
                    <p className='text-sm dark:text-white'>Conheço as linguagens essenciais para desenvolver o frontend.</p>
                </div>
            </div>
            <div className="flex flex-col p-1 gap-2 basis-72 h-36">
                <div className='h-auto flex gap-2'>
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/react/react-original.svg" class="h-10 w-10"
                        alt='react icon' />
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/vuejs/vuejs-original.svg" class="h-10 w-10"
                        alt='vue icon' />
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/angularjs/angularjs-original.svg"
                        class="h-10 w-10" alt='angular icon' />
                </div>
                <div className='h-auto'>
                    <span className='font-semibold dark:text-white'>Frameworks Frontend</span>
                </div>
                <div className='h-full w-full text-justify'>
                    <p className='text-sm dark:text-white'>Tenho cerca de 2 anos de experiência com React e VueJS. Quanto ao
                        Angular, conheço o essencial.</p>
                </div>
            </div>
            <div className="flex flex-col p-1 gap-2 basis-72 h-36">
                <div className='h-auto flex gap-2'>
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nextjs/nextjs-original.svg"
                        class="h-10 w-10 bg-white rounded-full" alt='nextjs icon' />
                    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nuxtjs/nuxtjs-original.svg"
                        class="h-10 w-10" alt='nuxt icon' />
                </div>
                <div className='h-auto'>
                    <span className='font-semibold dark:text-white'>NextJS e Nuxt</span>
                </div>
                <div className='h-full w-full text-justify'>
                    <p className='text-sm dark:text-white'>Conheço e sei utilizar o NextJS, bem como o Nuxt para construir
                        aplicações fullstack com SSR.</p>
                </div>
            </div>
            <div className="flex flex-col p-1 gap-2 basis-72 h-36">
                <div className='h-auto flex gap-2'>
                    <img class="h-10 w-10" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg"
                        alt='php icon' />
                    <img class="h-10 w-10"
                        src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-plain.svg"
                        alt='laravel icon' />
                </div>
                <div className='h-auto'>
                    <span className='font-semibold dark:text-white'>PHP</span>
                </div>
                <div className='h-full w-full text-justify'>
                    <p className='text-sm dark:text-white'>Tenho cerca de 2 de experiência com PHP e Laravel.</p>
                </div>
            </div>
            <div className="flex flex-col p-1 gap-2 basis-72 h-36">
                <div className='h-auto flex gap-2'>
                    <img class="h-10 w-10"
                        src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nodejs/nodejs-original.svg"
                        alt='nodejs icon' />
                    <img class="h-10 w-10" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nestjs/nestjs-plain.svg"
                        alt='nestjs icon' />
                    <img class="h-10 w-10"
                        src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/adonisjs/adonisjs-original.svg"
                        alt='adonisjs icon' />
                </div>
                <div className='h-auto'>
                    <span className='font-semibold dark:text-white'>NodeJS</span>
                </div>
                <div className='h-full w-full text-justify'>
                    <p className='text-sm dark:text-white'>Conheço o ambiente NodeJS e o desenvolvimento de apis com
                        Express, NestJS e AdonisJs.</p>
                </div>
            </div>
            <div className="flex flex-col p-1 gap-2 basis-72 h-36">
                <div className='h-auto flex gap-2'>
                    <img class="h-10 w-10"
                        src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg"
                        alt='mysql icon' />
                    <img class="h-10 w-10"
                        src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/postgresql/postgresql-original.svg"
                        alt='postgre icon' />
                </div>
                <div className='h-auto'>
                    <span className='font-semibold dark:text-white'>Banco de Dados</span>
                </div>
                <div className='h-full w-full text-justify'>
                    <p className='text-sm dark:text-white'>No trabalho e nos estudos utilizo bancos relacionais, como MySQL
                        e PostgreSQL.</p>
                </div>
            </div>
            <div className="flex flex-col p-1 gap-2 basis-72 h-36">
                <div className='h-auto flex gap-2'>
                    <img class="h-10 w-10"
                        src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/docker/docker-original.svg"
                        alt='docker icon' />
                    <img class="h-10 w-10 bg-white rounded-full"
                        src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/github/github-original.svg"
                        alt='github actions icon' />
                    <img class="h-10 w-10"
                        src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/amazonwebservices/amazonwebservices-original.svg"
                        alt='github actions icon' />
                    <img class="h-10 w-10"
                        src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/digitalocean/digitalocean-original.svg"
                        alt='digital-ocean icon' />
                </div>
                <div className='h-auto'>
                    <span className='font-semibold dark:text-white'>DevOps</span>
                </div>
                <div className='h-full w-full text-justify'>
                    <p className='text-sm dark:text-white'>Nesse escopo tenho conhecimento em Docker, CI/CD com
                        Github Actions e Cloud Hosting com AWS e Digital Ocean.</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import * as Vue from 'vue';
import TagIcon from '@/Components/Icons/TagIcon.vue';
</script>