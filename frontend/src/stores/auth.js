// src/store/auth.js
import { defineStore } from 'pinia';

export const useAuthStore = defineStore('auth', {
    state: () => ({
        user: null,
        authenticated: false,
    }),

    actions: {
        login(user) {
            this.user = user;
            this.authenticated = true;
        },

        logout() {
            this.user = null;
            this.authenticated = false;
        },
    },
});
