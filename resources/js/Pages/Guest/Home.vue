<template>
    <Head title="Home" />
    <div class="flex flex-col h-screen">
        <Header />
        <main class="grow bg-white dark:bg-gray-900">
            <Hero />
            <TechnologiesList :technologies="props.technologies" />
            <ProjectsList :projects="props.projects"/>
            <PostsList :posts="props.posts" />
            <slot></slot>
        </main>
        <Footer />
    </div>
</template>

<script setup lang="ts">
import { defineProps } from 'vue';
import { Head } from '@inertiajs/vue3';
import Header from '@/Components/Layout/Guest/Header.vue';
import Hero from '@/Components/Layout/Guest/Hero.vue';
import TechnologiesList from '@/Components/Layout/Guest/TechnologiesList.vue';
import ProjectsList from '@/Components/Layout/Guest/ProjectsList.vue';
import PostsList from '@/Components/Layout/Guest/PostsList.vue';
import Footer from '@/Components/Layout/Guest/Footer.vue';

export interface IProject {
    id: string;
    name: string;
    phase: string;
    description: string;
    technology: string[];
    image_src: string;
}

export interface ITechnology {
    id: string;
    name: string;
    description: string;
    icon: string[];
}

export interface IPost {
    uuid: string;
    name: string;
    description: string;
    category: string;
    image_src: string;
}

const props = defineProps({ projects: Array<IProject>, technologies: Array<ITechnology>, posts: Array<IPost> });
</script>