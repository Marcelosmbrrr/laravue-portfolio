<template>
    <div>
        <div class="mb-2">
            <label v-if="!uploadedImagesURL" for="image-upload"
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
        <div v-if="!!uploadedImagesURL" class="flex flex-wrap gap-1">
            <div v-for="imgURL in uploadedImagesURL" class="h-32 w-32 rounded-lg p-0"
                :class="{ 'bg-center bg-cover': imgURL }"
                :style="{ backgroundImage: imgURL ? 'url(' + imgURL + ')' : 'none' }">
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import * as Vue from 'vue';
import { defineEmits } from 'vue';

const emit = defineEmits(['onUploadImage']);
const uploadedImagesURL = Vue.ref<string[] | null>(null);

function onChange(e: any) {
    if (e.currentTarget.files.length > 0) {

        const images = e.currentTarget.files;
        const urls = [];

        for (let i = 0; i < images.length; i++) {
            if (images[i] && images[i].type.startsWith('image/')) {
                const url = URL.createObjectURL(images[i]);
                urls.push(url);
            }
        }

        uploadedImagesURL.value = urls;
        emit('onUploadImage', images);
    }
}

function onRemoveImage() {
    uploadedImagesURL.value = null;
    emit('onUploadImage', null);
}
</script>