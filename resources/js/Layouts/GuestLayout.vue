<template>
    <div class="flex flex-col h-screen">
        <Header />
        <main class="grow bg-gray-900">
            <Hero />
            <TechnologiesList />
            <ProjectsList />
            <slot></slot>
        </main>
        <Footer />
    </div>
</template>

<script setup lang="ts">
import * as Vue from 'vue';
import Header from '@/Components/Layout/Guest/Header.vue';
import Hero from '@/Components/Layout/Guest/Hero.vue';
import TechnologiesList from '@/Components/Layout/Guest/TechnologiesList.vue';
import ProjectsList from '@/Components/Layout/Guest/ProjectsList.vue';
import Footer from '@/Components/Layout/Guest/Footer.vue';
</script>