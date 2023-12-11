<template>
    <Head title="Dashboard" />
    <div>
        <h1>Dashboard</h1>
        <p @click="logout">logout</p>
    </div>
</template>

<script setup lang="ts">
import * as Vue from 'vue';
import { Head } from '@inertiajs/vue3';
import { useAuth } from '@/store/store';

const { logout } = useAuth();
</script>