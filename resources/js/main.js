import './assets/main.css'

import { createApp } from 'vue'
import { createPinia } from 'pinia'

import axios from "axios";
import App from './App.vue'
import router from './router'
import store from './stores/store'

const app = createApp(App)

// Set the Authorization header for all Axios requests
axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('authToken')}`;

app.use(createPinia())
app.use(store)
app.use(router)

app.mount('#app')
