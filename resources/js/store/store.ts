import * as Pinia from 'pinia';
import * as Vue from 'vue';
import { router } from '@inertiajs/vue3';
import { api } from '@/utils/Api';

interface User {
    name: string;
    username: string;
}

type Theme = "light" | "dark";

export const useAuth = Pinia.defineStore('auth', () => {

    const user: User = Vue.reactive({ name: "", username: "" });
    const is_authenticated = Vue.ref(false);

    Vue.onMounted(() => {
        getSessionData();
    });

    async function getSessionData() {
        if (localStorage.getItem('auth')) {
            try {
                const { data } = await api.get('api/session');
                Object.assign(user, data.user);
                is_authenticated.value = true;
            } catch (e) {
                console.log(e);
            }
        }
    }

    async function login(form: { username: string, password: string, remember: boolean }) {
        try {
            const { data } = await api.post('api/login', form);
            localStorage.setItem('auth', JSON.stringify(data));
            Object.assign(user, data.user);
            is_authenticated.value = true;
            router.get("projects");
        } catch (e) {
            throw e;
        }
    }

    async function logout() {
        try {
            await api.post('api/logout');
            localStorage.removeItem('auth');
            is_authenticated.value = false;
            router.get("/login");
        } catch (e) {
            throw e;
        }
    }

    return { login, logout, user, is_authenticated }
});

export const useTheme = Pinia.defineStore('theme', () => {

    const theme = Vue.ref<Theme>("dark");

    function toggle() {

        if (theme.value === "dark") {
            document.body.classList.remove("dark");
        } else {
            document.body.classList.add("dark");
        }

        theme.value = theme.value === "light" ? "dark" : "light";
    }

    function getTheme(): Theme {
        return theme.value;
    }

    return { toggle, getTheme }

});