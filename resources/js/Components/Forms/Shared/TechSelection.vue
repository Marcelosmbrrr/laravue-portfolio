<template>
    <button @click="open = true" type="button"
        class="focus:outline-none text-white bg-emerald-700 hover:bg-emerald-800 focus:ring-4 focus:ring-emerald-300 font-medium rounded-lg text-sm p-2.5 me-2 dark:bg-emerald-600 dark:hover:bg-emerald-700 dark:focus:ring-emerald-800">
        Icons Selection: {{ icons.length  }}
    </button>
</template>

<script setup lang="ts">
import * as Vue from 'vue';

const open = Vue.ref<boolean>(false);
const icons = Vue.ref<string[]>([]);
</script>