<template>
    <div class="max-w-7xl px-5 lg:px-0 mx-auto">
        <div class="flex items-center gap-2">
            <div class="text-emerald-400">
                <TagIcon />
            </div>
            <h1 class="text-2xl font-bold text-white"><span class="text-emerald-400">Tecnologias</span> utilizadas</h1>
        </div>
        <div className='flex flex-wrap gap-8 mt-6'>

            <div v-for="tech in technologies" className="flex flex-col p-1 gap-2 basis-72 h-36">
                <div className='h-auto flex gap-2'>
                    <img v-for="icon in tech.icon" :src="getIconCdn(icon)" class="h-10 w-10"
                        :alt="`${icon} icon`" />
                </div>
                <div className='h-auto'>
                    <span className='font-semibold dark:text-white'>{{ tech.name }}</span>
                </div>
                <div className='h-full w-full text-justify'>
                    <p className='text-sm dark:text-white'>{{ tech.description }}</p>
                </div>
            </div>

        </div>
    </div>
</template>

<script setup lang="ts">
import * as Vue from 'vue';
import { defineProps } from 'vue';
import TagIcon from '@/Components/Icons/TagIcon.vue';
import { ITechnology } from '@/Pages/Guest/Home.vue';

const { technologies } = defineProps({ technologies: Array<ITechnology> });

function getIconCdn(icon: string) {
    return `https://cdn.jsdelivr.net/gh/devicons/devicon/icons/${icon}/${icon}-original.svg`;
}
</script>