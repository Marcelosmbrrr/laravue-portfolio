<template>
    <div>
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="default_size">Upload Image</label>
        <input @change="onChange"
            class="block w-full mb-5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
            id="default_size" type="file">
    </div>
</template>

<script setup lang="ts">
import * as Vue from 'vue';
import { defineEmits } from 'vue';

const emit = defineEmits(['onUploadImage']);

function onChange(e: any) {
    const uploaded_file = e.currentTarget.files[0];
    if (uploaded_file && uploaded_file.type.startsWith('image/')) {
        emit.call('onUploadImage', uploaded_file);
    }
}
</script>