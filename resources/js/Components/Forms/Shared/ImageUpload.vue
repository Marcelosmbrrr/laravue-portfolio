<template>
    <div>
        <div class="mb-2">
            <label v-if="!image" for="image-upload"
                class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 cursor-pointer">
                Search Image
            </label>
            <button v-else @click="onRemoveImage"
                class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 cursor-pointer">
                Remove Image
            </button>
            <input @change="onChange"
                class="hidden w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                id="image-upload" type="file" multiple>

        </div>
        <div v-if="image" class="h-32 w-32 mt-3 rounded-lg p-0" :class="{ 'bg-center bg-cover': image }"
            :style="{ backgroundImage: image ? 'url(' + image + ')' : 'none' }">
        </div>
    </div>
</template>

<script setup lang="ts">
import * as Vue from 'vue';
import { defineEmits } from 'vue';

const emit = defineEmits(['onUploadImage']);
const image = Vue.ref<string | null>(null);

function onChange(e: any) {
    if (e.currentTarget.files.length > 0) {
        const images: any[] = e.currentTarget.files;
        const imagesURL: any[] = images.map((image) => {
            if (image && image.type.startsWith('image/')) {
                return URL.createObjectURL(image);
            }
        });
        emit('onUploadImage', imagesURL);
    }
}

function onRemoveImage() {
    image.value = null;
    emit('onUploadImage', null);
}
</script>