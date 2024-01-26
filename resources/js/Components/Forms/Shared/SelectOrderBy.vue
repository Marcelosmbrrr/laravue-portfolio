<template>
    <button type="button"
        class="w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-emerald-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
        Order by: {{ selected }}
    </button>
</template>

<script setup lang="ts">
import * as Vue from 'vue';
import { defineProps, PropType } from 'vue';
import { defineEmits } from 'vue';

const props = defineProps({
    options: Array as PropType<string[]>
});

const emit = defineEmits(['onChangeOrderBy']);
const selected = Vue.ref<string>('id');
</script>