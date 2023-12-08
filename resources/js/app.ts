import './bootstrap';
import '../css/app.css';

import { createApp, h, DefineComponent } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import Toast, { POSITION } from "vue-toastification";
import { createPinia, setActivePinia } from 'pinia';
import "vue-toastification/dist/index.css";

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';
const pinia = createPinia();
setActivePinia(pinia);

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob<DefineComponent>('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin, ZiggyVue, Ziggy, pinia)
            .use(Toast, {
                transition: "Vue-Toastification__bounce",
                maxToasts: 3,
                newestOnTop: true,
                position: POSITION.BOTTOM_LEFT,
                timeout: 2000
            })
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
