import './bootstrap';

import './assets/main.css'

import { createApp } from 'vue'

import axios from "axios";
import App from './App.vue'
import router from './router'
import store from './stores/store'

import.meta.glob([ '../assets/**', ]);

const app = createApp(App)

// Set the Authorization header for all Axios requests
axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('authToken')}`;

app.use(store)
app.use(router)

app.mount('#app')
